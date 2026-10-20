<?php

namespace App\Http\Controllers;

use App\Mail\InquiryConfirmationMail;
use App\Models\B2bOffering;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\WholesaleInquiry;
use App\Services\FreeSmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WholesaleController extends Controller
{
    /**
     * Display B2B Wholesale Portal.
     */
    public function b2b()
    {
        $offerings = B2bOffering::where('is_active', true)->orderBy('sort_order')->get();
        $products = Product::where('is_active', true)->get();
        return view('b2b', compact('offerings', 'products'));
    }

    /**
     * Alias for catalog view.
     */
    public function catalog()
    {
        return $this->b2b();
    }

    /**
     * Submit Wholesale RFQ Inquiry with 15-minute rate limit, confirmation email, and SMS.
     */
    public function submitInquiry(Request $request)
    {
        // 1. Enforce 15-minute submission rate limit
        $rateLimitResponse = $this->checkRateLimit($request);
        if ($rateLimitResponse) {
            return $rateLimitResponse;
        }

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'business_type' => 'nullable|string|max:100',
            'target_volume' => 'nullable|string|max:100',
            'product_series' => 'nullable|string|max:255',
            'sample_requested' => 'nullable|boolean',
            'notes' => 'nullable|string|max:2000',
        ]);

        $inquiry = WholesaleInquiry::create([
            'company_name' => $validated['company_name'],
            'contact_name' => $validated['contact_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'business_type' => $validated['business_type'] ?? 'Retailer',
            'target_volume' => $validated['target_volume'] ?? '250 - 999 units',
            'product_series' => $validated['product_series'] ?? 'All Series',
            'sample_requested' => $request->boolean('sample_requested'),
            'notes' => $validated['notes'] ?? null,
            'status' => 'new',
        ]);

        $referenceId = '7S-RFQ-' . str_pad($inquiry->id, 5, '0', STR_PAD_LEFT);

        // 2. Lock 15-minute rate limit for this session & IP
        $this->markRateLimit($request);

        // 3. Auto-subscribe business contact to B2B newsletter if not existing
        try {
            Subscriber::firstOrCreate(['email' => $validated['email']]);
        } catch (\Throwable $e) {}

        // 4. Send Confirmation Email to the recipient's provided address
        $this->sendConfirmationEmail($inquiry, $referenceId, 'Wholesale RFQ');

        // 5. Send Free SMS Notification to provided phone number
        $smsResult = $this->sendNotificationSms($inquiry, $referenceId);

        return response()->json([
            'status' => 'success',
            'message' => 'Wholesale inquiry logged. A confirmation email has been sent to ' . $inquiry->email . ', and our factory account manager will contact you within 24 hours.',
            'reference_id' => $referenceId,
            'sms_status' => $smsResult,
        ]);
    }

    /**
     * Submit Contact Form with 15-minute rate limit, confirmation email, and SMS.
     */
    public function submitContact(Request $request)
    {
        // 1. Enforce 15-minute submission rate limit
        $rateLimitResponse = $this->checkRateLimit($request);
        if ($rateLimitResponse) {
            return $rateLimitResponse;
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:3000',
        ]);

        $inquiry = WholesaleInquiry::create([
            'company_name' => $validated['subject'] ?? 'Website Contact',
            'contact_name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'business_type' => 'Contact Inquiry',
            'target_volume' => 'N/A',
            'product_series' => 'Contact Page',
            'sample_requested' => false,
            'notes' => $validated['message'],
            'status' => 'new',
        ]);

        $referenceId = '7S-MSG-' . str_pad($inquiry->id, 5, '0', STR_PAD_LEFT);

        // 2. Lock 15-minute rate limit for this session & IP
        $this->markRateLimit($request);

        try {
            Subscriber::firstOrCreate(['email' => $validated['email']]);
        } catch (\Throwable $e) {}

        // 3. Send Confirmation Email to the recipient's provided address
        $this->sendConfirmationEmail($inquiry, $referenceId, 'Direct Contact');

        // 4. Send Free SMS Notification to provided phone number
        $smsResult = $this->sendNotificationSms($inquiry, $referenceId);

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you! Your message has been received. A confirmation has been sent to ' . $inquiry->email . '.',
            'reference_id' => $referenceId,
            'sms_status' => $smsResult,
        ]);
    }

    /**
     * Check if the current session or IP has submitted within the last 15 minutes (900 seconds).
     */
    protected function checkRateLimit(Request $request)
    {
        $thresholdSeconds = 15 * 60; // 15 minutes = 900 seconds

        $sessionTime = session('last_inquiry_at');
        $ipTime = Cache::get('inquiry_rate_limit_' . md5($request->ip()));

        $latestSubmission = max($sessionTime ?? 0, $ipTime ?? 0);

        if ($latestSubmission && (now()->timestamp - $latestSubmission) < $thresholdSeconds) {
            $elapsedSeconds = now()->timestamp - $latestSubmission;
            $remainingSeconds = $thresholdSeconds - $elapsedSeconds;
            $remainingMinutes = ceil($remainingSeconds / 60);

            return response()->json([
                'status' => 'error',
                'rate_limited' => true,
                'remaining_seconds' => $remainingSeconds,
                'remaining_minutes' => $remainingMinutes,
                'message' => "You have submitted a request recently. To maintain service quality, please wait {$remainingMinutes} minute(s) before submitting another inquiry.",
            ], 429);
        }

        return null;
    }

    /**
     * Record rate limit timestamp in session and cache for 15 minutes.
     */
    protected function markRateLimit(Request $request): void
    {
        $now = now()->timestamp;
        session(['last_inquiry_at' => $now]);
        Cache::put('inquiry_rate_limit_' . md5($request->ip()), $now, now()->addMinutes(15));
    }

    /**
     * Dispatch branded confirmation email to the user.
     */
    protected function sendConfirmationEmail(WholesaleInquiry $inquiry, string $referenceId, string $type): void
    {
        try {
            Mail::to($inquiry->email)->send(new InquiryConfirmationMail($inquiry, $referenceId, $type));
            Log::info("Confirmation email dispatched to {$inquiry->email} [Ref: {$referenceId}]");
        } catch (\Throwable $e) {
            Log::warning("Could not dispatch confirmation email to {$inquiry->email}: " . $e->getMessage());
        }
    }

    /**
     * Dispatch free SMS notification to the user's phone.
     */
    protected function sendNotificationSms(WholesaleInquiry $inquiry, string $referenceId): ?array
    {
        if (empty($inquiry->phone)) {
            return null;
        }

        try {
            $smsService = app(FreeSmsService::class);
            $message = "Seven Series: Namaste {$inquiry->contact_name}, your inquiry has been logged (Ref: {$referenceId}). Our Sitapaila factory team will contact you shortly.";
            return $smsService->send($inquiry->phone, $message);
        } catch (\Throwable $e) {
            Log::warning("SMS dispatch error: " . $e->getMessage());
            return null;
        }
    }
}
