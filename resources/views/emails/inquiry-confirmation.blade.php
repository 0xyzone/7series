<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seven Series | Inquiry Confirmation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #18181b;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e4e4e7;
        }
        .header {
            background-color: #09090b;
            color: #ffffff;
            padding: 32px 28px;
            text-align: center;
            border-bottom: 4px solid #ed1c24;
        }
        .logo-title {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
            color: #ffffff;
        }
        .logo-sub {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #ed1c24;
            margin-top: 4px;
        }
        .body-content {
            padding: 32px 28px;
        }
        .badge {
            display: inline-block;
            background-color: #fef2f2;
            color: #dc2626;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid #fecaca;
            margin-bottom: 16px;
        }
        h1 {
            font-size: 20px;
            font-weight: 800;
            color: #09090b;
            margin: 0 0 16px;
            text-transform: uppercase;
            letter-spacing: -0.5px;
        }
        p {
            font-size: 14px;
            color: #52525b;
            margin: 0 0 16px;
        }
        .summary-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin: 24px 0;
        }
        .summary-card h2 {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ed1c24;
            margin: 0 0 12px;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .summary-table td {
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .summary-table td:first-child {
            font-weight: 700;
            color: #64748b;
            width: 35%;
        }
        .summary-table td:last-child {
            font-weight: 600;
            color: #0f172a;
        }
        .factory-box {
            background-color: #09090b;
            color: #ffffff;
            border-radius: 12px;
            padding: 20px;
            margin: 24px 0;
        }
        .factory-box h3 {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #ed1c24;
            margin: 0 0 8px;
        }
        .factory-box p {
            color: #d4d4d8;
            font-size: 13px;
            margin: 0 0 4px;
        }
        .footer {
            background-color: #f4f4f5;
            padding: 20px 28px;
            text-align: center;
            border-top: 1px solid #e4e4e7;
            font-size: 12px;
            color: #71717a;
        }
        .footer a {
            color: #ed1c24;
            text-decoration: none;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <!-- Header -->
        <div class="header">
            <div class="logo-title">SEVEN SERIES</div>
            <div class="logo-sub">AUTHENTIC DENIM &bull; GARMENT FACTORY</div>
        </div>

        <!-- Body -->
        <div class="body-content">
            <span class="badge">Reference ID: {{ $referenceId }}</span>
            <h1>Inquiry Confirmed & Received</h1>
            <p>Dear <strong>{{ $inquiry->contact_name }}</strong>,</p>
            <p>
                Thank you for contacting Seven Series. We have received your inquiry at our garment plant in Sitapaila, Kathmandu. Our production and account management team is reviewing your details and will get in touch with you within <strong>24 business hours</strong>.
            </p>

            <!-- Summary Table -->
            <div class="summary-card">
                <h2>Submission Details</h2>
                <table class="summary-table">
                    <tr>
                        <td>Reference Number</td>
                        <td><strong style="color: #ed1c24;">{{ $referenceId }}</strong></td>
                    </tr>
                    <tr>
                        <td>Inquiry Topic</td>
                        <td>{{ $inquiry->company_name ?? $type }}</td>
                    </tr>
                    @if($inquiry->phone)
                    <tr>
                        <td>Contact Number</td>
                        <td>{{ $inquiry->phone }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Contact Email</td>
                        <td>{{ $inquiry->email }}</td>
                    </tr>
                    @if($inquiry->target_volume && $inquiry->target_volume !== 'N/A')
                    <tr>
                        <td>Target Volume</td>
                        <td>{{ $inquiry->target_volume }}</td>
                    </tr>
                    @endif
                    @if($inquiry->notes)
                    <tr>
                        <td>Message / Requirement</td>
                        <td>{{ $inquiry->notes }}</td>
                    </tr>
                    @endif
                </table>
            </div>

            <!-- Factory Location & Hours -->
            <div class="factory-box">
                <h3>Seven Series Factory & Production Unit</h3>
                <p><strong>Location:</strong> Near Padma Colony Main Entrance, Sitapaila, Kathmandu, Nepal</p>
                <p><strong>Factory Hours:</strong> Sunday – Friday (09:00 AM – 06:00 PM)</p>
                <p><strong>Direct Official Email:</strong> <a href="mailto:samparka@7series.com.np" style="color: #ffffff; text-decoration: underline;">samparka@7series.com.np</a></p>
            </div>

            <p style="font-size: 13px; color: #71717a; margin-top: 20px;">
                If you have urgent updates regarding this inquiry, you may reply directly to this email or reach us at <a href="mailto:samparka@7series.com.np" style="color: #ed1c24; font-weight: 700;">samparka@7series.com.np</a> quoting your reference number <strong>{{ $referenceId }}</strong>.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ now()->year }} Seven Series Garment Industry. All rights reserved.</p>
            <p>Official Website: <a href="http://7series">7series.com.np</a></p>
        </div>

    </div>
</body>
</html>
