<?php

namespace App\Http\Controllers;

use App\Models\B2bOffering;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\WholesaleInquiry;
use Illuminate\Http\Request;

class WholesaleController extends Controller
{
    public function b2b()
    {
        $offerings = B2bOffering::where('is_active', true)->orderBy('sort_order')->get();
        $products = Product::where('is_active', true)->get();
        return view('b2b', compact('offerings', 'products'));
    }

    public function catalog()
    {
        return $this->b2b();
    }

    public function submitInquiry(Request $request)
    {
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

        // Auto-subscribe business contact to B2B newsletter if not existing
        try {
            Subscriber::firstOrCreate(['email' => $validated['email']]);
        } catch (\Exception $e) {
            // Ignore subscriber collision
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Wholesale inquiry logged. Our B2B Account Manager will dispatch your line sheet and contact you within 24 hours.',
            'reference_id' => '7S-RFQ-' . str_pad($inquiry->id, 5, '0', STR_PAD_LEFT),
        ]);
    }
}
