<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FreeSmsService
{
    /**
     * Send an SMS to the recipient phone using free gateway adapters.
     *
     * @param string|null $phone
     * @param string $message
     * @return array
     */
    public function send(?string $phone, string $message): array
    {
        if (empty($phone)) {
            return [
                'sent' => false,
                'provider' => 'none',
                'reason' => 'No phone number provided',
                'phone' => null,
            ];
        }

        $cleanPhone = $this->formatPhoneNumber($phone);
        $encodedMessage = urlencode($message);
        $whatsappLink = "https://wa.me/" . ltrim($cleanPhone, '+') . "?text=" . $encodedMessage;

        // 1. Check if user has connected a Free Android SMS Gateway (e.g., local Android device with SIM)
        $androidGatewayUrl = config('services.sms.android_gateway_url') ?? env('ANDROID_SMS_GATEWAY_URL');
        if (!empty($androidGatewayUrl)) {
            try {
                $response = Http::timeout(5)->post($androidGatewayUrl, [
                    'to' => $cleanPhone,
                    'message' => $message,
                ]);

                if ($response->successful()) {
                    $this->logSms($cleanPhone, $message, 'android_gateway');
                    return [
                        'sent' => true,
                        'provider' => 'android_gateway',
                        'phone' => $cleanPhone,
                        'whatsapp_link' => $whatsappLink,
                    ];
                }
            } catch (\Throwable $e) {
                Log::warning("Android SMS Gateway request failed: " . $e->getMessage());
            }
        }

        // 2. Try free global Textbelt endpoint (1 free SMS per day per IP)
        try {
            $textbeltResponse = Http::timeout(5)->asForm()->post('https://textbelt.com/text', [
                'phone' => $cleanPhone,
                'message' => $message,
                'key' => 'textbelt',
            ]);

            if ($textbeltResponse->successful() && $textbeltResponse->json('success') === true) {
                $this->logSms($cleanPhone, $message, 'textbelt_free');
                return [
                    'sent' => true,
                    'provider' => 'textbelt_free',
                    'phone' => $cleanPhone,
                    'whatsapp_link' => $whatsappLink,
                ];
            }
        } catch (\Throwable $e) {
            // Ignore textbelt network failures
        }

        // 3. Fallback: Local SMS Logger & WhatsApp Instant Link
        // Since free public SMS APIs frequently restrict free international routing to Nepal (+977),
        // we log the outgoing SMS reliably and provide a 100% free direct WhatsApp notification link.
        $this->logSms($cleanPhone, $message, 'local_sms_logger');

        return [
            'sent' => false,
            'simulated' => true,
            'provider' => 'local_sms_logger',
            'phone' => $cleanPhone,
            'whatsapp_link' => $whatsappLink,
            'note' => 'SMS logged to storage/logs/sms.log. Connect an Android SMS Gateway or use the free WhatsApp notification link.',
        ];
    }

    /**
     * Standardize phone number for carrier delivery (+977 for Nepal).
     */
    protected function formatPhoneNumber(string $phone): string
    {
        $digits = preg_replace('/[^\d+]/', '', $phone);

        // If local 10-digit Nepali mobile number (starts with 98 or 97)
        if (preg_match('/^(98\d{8}|97\d{8})$/', $digits)) {
            return '+977' . $digits;
        }

        // If 0 prefixed local number (e.g. 098...)
        if (preg_match('/^0(98\d{8}|97\d{8})$/', $digits)) {
            return '+977' . substr($digits, 1);
        }

        if (!str_starts_with($digits, '+') && strlen($digits) >= 10) {
            return '+' . $digits;
        }

        return $digits;
    }

    /**
     * Log outgoing SMS records to dedicated log file.
     */
    protected function logSms(string $phone, string $message, string $provider): void
    {
        $logPath = storage_path('logs/sms.log');
        $entry = sprintf(
            "[%s] PROVIDER: %s | TO: %s | MESSAGE: %s%s",
            now()->toDateTimeString(),
            $provider,
            $phone,
            $message,
            PHP_EOL
        );

        @file_put_contents($logPath, $entry, FILE_APPEND);
        Log::info("SMS Dispatched via {$provider} to {$phone}: {$message}");
    }
}
