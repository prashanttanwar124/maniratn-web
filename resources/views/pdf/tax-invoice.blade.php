<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tax Invoice — {{ $invoice['invoice_number'] ?? 'Maniratn' }}</title>
    <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: normal;
            src: url("file://{{ public_path('fonts/poppins-regular.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: bold;
            src: url("file://{{ public_path('fonts/poppins-semibold.ttf') }}") format('truetype');
        }

        @page {
            margin: 28pt 36pt 24pt 36pt;
            size: a4 portrait;
        }

        body {
            background: #ffffff;
            color: #2b2824;
            font-family: 'Poppins', 'DejaVu Sans', sans-serif;
            font-size: 8.5px;
            line-height: 1.45;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Top Header / Masthead */
        .masthead {
            border: 1.5px solid #c4922a;
            border-radius: 4px;
            margin-bottom: 14px;
            overflow: hidden;
            table-layout: fixed;
            width: 100%;
        }

        .logo-cell {
            background: #5b0d13;
            padding: 8px 12px;
            text-align: center;
            vertical-align: middle;
            width: 24%;
        }

        .brand-logo {
            display: block;
            height: auto;
            margin: 0 auto;
            max-height: 54px;
            max-width: 95px;
        }

        .business-cell {
            background: #5b0d13;
            border-left: 1px solid #7c262c;
            padding: 10px 14px;
            vertical-align: middle;
            width: 44%;
        }

        .document-cell {
            background: #fdfaf3;
            border-left: 1.5px solid #c4922a;
            padding: 12px 14px;
            text-align: right;
            vertical-align: middle;
            width: 32%;
        }

        .store-title {
            color: #ffffff;
            font-size: 13.5px;
            font-weight: bold;
            letter-spacing: 0.8px;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .eyebrow {
            color: #f3d484;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 0.8px;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .brand-address {
            color: #f7edea;
            font-size: 7.2px;
            line-height: 1.4;
        }

        .brand-address strong {
            color: #ffffff;
            font-weight: bold;
        }

        .document-label {
            color: #5b0d13;
            font-size: 15.5px;
            font-weight: bold;
            letter-spacing: 1px;
            line-height: 1.1;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .document-number {
            color: #2b2824;
            font-size: 9.8px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .verified-badge {
            background: #f5eedc;
            border: 1px solid #d4af37;
            border-radius: 3px;
            color: #7b5b18;
            display: inline-block;
            font-size: 6.8px;
            font-weight: bold;
            letter-spacing: 0.5px;
            padding: 2px 7px;
            text-transform: uppercase;
        }

        /* Void Banner */
        .void-banner {
            background: #fee2e2;
            border: 1.5px solid #dc2626;
            border-radius: 3px;
            color: #991b1b;
            font-weight: bold;
            margin-bottom: 12px;
            padding: 6px 12px;
            text-align: center;
            font-size: 8.5px;
        }

        /* Meta Information Table */
        .meta-table {
            margin-bottom: 14px;
            table-layout: fixed;
            width: 100%;
        }

        .meta-cell {
            background: #faf8f5;
            border: 1px solid #e8e2d8;
            border-radius: 3px;
            padding: 9px 12px;
            vertical-align: top;
            width: 48.5%;
        }

        .meta-cell-spacer {
            width: 3%;
        }

        .section-kicker {
            border-bottom: 1px solid #e2d9cc;
            color: #9a7328;
            font-size: 7.2px;
            font-weight: bold;
            letter-spacing: 0.8px;
            margin-bottom: 6px;
            padding-bottom: 2.5px;
            text-transform: uppercase;
        }

        .meta-name {
            color: #1f1c18;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .meta-line {
            color: #5c564e;
            font-size: 7.8px;
            margin-bottom: 2.5px;
        }

        .meta-line strong {
            color: #272420;
            font-weight: bold;
        }

        .detail-table {
            width: 100%;
        }

        .detail-table td {
            font-size: 7.8px;
            padding-bottom: 2.5px;
        }

        .detail-label {
            color: #787167;
            width: 44%;
        }

        .detail-value {
            color: #25221d;
            font-weight: bold;
            text-align: right;
        }

        .rate-badge {
            background: #fff8e8;
            border: 1px solid #e4ce92;
            border-radius: 2px;
            color: #8c6211;
            display: inline-block;
            font-size: 7.4px;
            font-weight: bold;
            padding: 1px 5px;
        }

        /* Items Section */
        .items-heading-table {
            margin-bottom: 5px;
            width: 100%;
        }

        .items-heading {
            color: #5b0d13;
            font-size: 8.8px;
            font-weight: bold;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .items-overview {
            color: #7b7367;
            font-size: 7.5px;
            text-align: right;
        }

        .items-table {
            border: 1px solid #ebe5dc;
            border-radius: 3px;
            margin-bottom: 14px;
            overflow: hidden;
            table-layout: fixed;
            width: 100%;
        }

        .items-table thead {
            display: table-header-group;
        }

        .items-table tr {
            page-break-inside: avoid;
        }

        .items-table th {
            background: #5b0d13;
            border: 1px solid #5b0d13;
            border-bottom: 2px solid #c4922a;
            color: #ffffff;
            font-size: 7.2px;
            font-weight: bold;
            letter-spacing: 0.4px;
            padding: 6.5px 6px;
            text-align: left;
            text-transform: uppercase;
        }

        .items-table td {
            border: 1px solid #ebe5dc;
            color: #3b3731;
            font-size: 8px;
            padding: 6.5px 6px;
            vertical-align: middle;
        }

        .items-table tbody tr:nth-child(even) td {
            background: #fdfcf9;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .item-index {
            color: #9f968a;
            font-size: 7.4px;
            font-weight: bold;
        }

        .item-name {
            color: #1f1c18;
            font-size: 8.8px;
            font-weight: bold;
        }

        .item-sub {
            color: #7a7266;
            font-size: 7.2px;
            margin-top: 1.5px;
        }

        .huid-tag {
            background: #fcf6e8;
            border: 1px solid #dec688;
            border-radius: 2px;
            color: #7a550d;
            display: inline-block;
            font-size: 6.8px;
            font-weight: bold;
            padding: 0.5px 4px;
        }

        .purity-tag {
            background: #f8f1e0;
            border: 1px solid #dec37b;
            border-radius: 2px;
            color: #785311;
            display: inline-block;
            font-size: 7px;
            font-weight: bold;
            padding: 1px 4.5px;
            white-space: nowrap;
        }

        .cell-bold {
            color: #1f1c18 !important;
            font-weight: bold;
        }

        /* Summary & Calculations */
        .summary-table {
            margin-bottom: 14px;
            page-break-inside: avoid;
            table-layout: fixed;
            width: 100%;
        }

        .left-summary-cell {
            padding-right: 8px;
            vertical-align: top;
            width: 52%;
        }

        .right-summary-cell {
            padding-left: 8px;
            vertical-align: top;
            width: 48%;
        }

        /* Amount in Words Box */
        .words-box {
            background: #fcfbf8;
            border: 1px solid #e8e2d7;
            border-left: 3px solid #c4922a;
            border-radius: 3px;
            margin-bottom: 9px;
            padding: 7px 10px;
        }

        .words-title {
            color: #8c671a;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .words-text {
            color: #27241f;
            font-size: 7.8px;
            font-weight: bold;
            line-height: 1.35;
        }

        /* Payments Table */
        .payment-box {
            background: #faf8f4;
            border: 1px solid #e6ded2;
            border-radius: 3px;
            padding: 7px 10px;
        }

        .payment-title {
            color: #5b0d13;
            font-size: 7.2px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .payment-table {
            width: 100%;
        }

        .payment-table td {
            border-bottom: 1px solid #eee8de;
            color: #534d45;
            font-size: 7.6px;
            padding: 3px 0;
        }

        .payment-table td.amt {
            color: #1f1c18;
            font-weight: bold;
            text-align: right;
        }

        /* Calculation Breakdown */
        .calc-table {
            border: 1px solid #e6dfd3;
            border-radius: 3px;
            overflow: hidden;
            width: 100%;
        }

        .calc-row td {
            background: #fcfbf8;
            border-bottom: 1px solid #eee7db;
            color: #696257;
            font-size: 7.8px;
            padding: 4.5px 8px;
        }

        .calc-row td.val {
            color: #26231e;
            font-weight: bold;
            text-align: right;
            white-space: nowrap;
        }

        .calc-row.discount td {
            color: #9f2329;
        }

        .calc-row.discount td.val {
            color: #9f2329;
        }

        .calc-row.tax td {
            color: #5a5349;
            font-size: 7.6px;
        }

        .grand-total-row td {
            background: #5b0d13;
            border-top: 2px solid #c4922a;
            color: #ffffff;
            font-size: 9px;
            font-weight: bold;
            padding: 7px 8px;
            text-transform: uppercase;
        }

        .grand-total-row td.val {
            color: #f7df96;
            font-size: 11.5px;
            text-align: right;
            white-space: nowrap;
        }

        /* QR Codes & Bottom Modules */
        .bottom-modules {
            border: 1px solid #e7ded2;
            border-radius: 3px;
            margin-bottom: 12px;
            overflow: hidden;
            page-break-inside: avoid;
            table-layout: fixed;
            width: 100%;
        }

        .qr-card {
            background: #faf8f5;
            padding: 7px 10px;
            vertical-align: middle;
        }

        .qr-card.left {
            border-right: 1px solid #e7ded2;
            width: 50%;
        }

        .qr-card.right {
            width: 50%;
        }

        .qr-img {
            border: 1px solid #ddcdba;
            display: block;
            height: 46px;
            width: 46px;
        }

        .qr-title {
            color: #5b0d13;
            font-size: 7.4px;
            font-weight: bold;
            letter-spacing: 0.3px;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .qr-desc {
            color: #6b6459;
            font-size: 7px;
            line-height: 1.3;
        }

        /* Terms Box */
        .terms-box {
            background: #fdfcf9;
            border: 1px solid #e8e1d5;
            border-left: 3px solid #c4922a;
            border-radius: 3px;
            color: #6e675b;
            font-size: 7px;
            line-height: 1.45;
            margin-bottom: 12px;
            page-break-inside: avoid;
            padding: 6px 10px;
        }

        .terms-heading {
            color: #5b0d13;
            font-size: 7.2px;
            font-weight: bold;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        /* Footer */
        .invoice-footer {
            border-top: 1px solid #ded5c7;
            color: #8b8376;
            font-size: 7.2px;
            padding-top: 6px;
            text-align: center;
        }

        .thanks-msg {
            color: #5b0d13;
            font-size: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @php
        $invoiceDate = ! empty($invoice['date'])
            ? date('d M Y', strtotime($invoice['date']))
            : date('d M Y');

        $invoiceItems = collect($invoice['items'] ?? []);
        $totalGrossWeight = $invoiceItems->sum(fn ($i) => (float) ($i['gross_weight'] ?? $i['weight'] ?? 0));
        $totalNetWeight = $invoiceItems->sum(fn ($i) => (float) ($i['net_weight'] ?? $i['weight'] ?? 0));

        $goldItems = $invoiceItems->filter(fn ($i) => strtoupper($i['metal'] ?? 'GOLD') === 'GOLD');
        $silverItems = $invoiceItems->filter(fn ($i) => strtoupper($i['metal'] ?? '') === 'SILVER');
        $totalGoldWeight = $goldItems->sum(fn ($i) => (float) ($i['net_weight'] ?? $i['weight'] ?? 0));
        $totalSilverWeight = $silverItems->sum(fn ($i) => (float) ($i['net_weight'] ?? $i['weight'] ?? 0));

        $subTotal = (float) ($invoice['subtotal'] ?? $invoiceItems->sum(fn ($i) => (float) ($i['final_price'] ?? 0)));
        $discountAmount = (float) ($invoice['discount_amount'] ?? 0);
        $taxAmount = (float) ($invoice['tax_amount'] ?? 0);
        $totalAmount = (float) ($invoice['total_amount'] ?? 0);
        $cgstAmount = round($taxAmount / 2, 2);
        $sgstAmount = $taxAmount - $cgstAmount;

        // Filter transactions strictly for PAYMENT records
        $transactions = collect($invoice['transactions'] ?? [])->filter(function ($t) {
            $type = strtoupper($t['type'] ?? 'PAYMENT');
            return $type === 'PAYMENT' || $type === 'RECEIPT';
        });

        $paidAmount = (float) ($invoice['paid_amount'] ?? 0);
        if ($paidAmount == 0 && $transactions->isEmpty()) {
            $paidAmount = $totalAmount;
        }
        $balanceDue = (float) ($invoice['balance_due'] ?? max($totalAmount - $paidAmount, 0));
        if ($transactions->isEmpty()) {
            $balanceDue = 0;
        }

        $logoBase64 = '';
        if (file_exists(public_path('bill-logo.png'))) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('bill-logo.png')));
        } elseif (file_exists(public_path('logo.png'))) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('logo.png')));
        } elseif (file_exists(public_path('main-logo.png'))) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('main-logo.png')));
        }

        // Amount in words conversion for Indian numbering
        $formatIndianWords = function (float $amount): string {
            $amount = round($amount, 2);
            $rupees = (int) floor($amount);
            $paise = (int) round(($amount - $rupees) * 100);

            $ones = [
                0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five',
                6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine', 10 => 'Ten',
                11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
                16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen'
            ];
            $tens = [
                2 => 'Twenty', 3 => 'Thirty', 4 => 'Forty', 5 => 'Fifty',
                6 => 'Sixty', 7 => 'Seventy', 8 => 'Eighty', 9 => 'Ninety'
            ];

            $convertTwo = function (int $num) use ($ones, $tens): string {
                if ($num < 20) return $ones[$num];
                $t = (int) floor($num / 10);
                $o = $num % 10;
                return $tens[$t] . ($o > 0 ? ' ' . $ones[$o] : '');
            };

            $convertThree = function (int $num) use ($convertTwo, $ones): string {
                $h = (int) floor($num / 100);
                $rem = $num % 100;
                $res = '';
                if ($h > 0) $res .= $ones[$h] . ' Hundred';
                if ($rem > 0) $res .= ($h > 0 ? ' and ' : '') . $convertTwo($rem);
                return $res;
            };

            if ($rupees === 0) {
                $words = 'Zero Rupees';
            } else {
                $parts = [];
                $crores = (int) floor($rupees / 10000000);
                $rupees %= 10000000;
                $lakhs = (int) floor($rupees / 100000);
                $rupees %= 100000;
                $thousands = (int) floor($rupees / 1000);
                $rupees %= 1000;
                $hundreds = $rupees;

                if ($crores > 0) $parts[] = $convertTwo($crores) . ' Crore';
                if ($lakhs > 0) $parts[] = $convertTwo($lakhs) . ' Lakh';
                if ($thousands > 0) $parts[] = $convertTwo($thousands) . ' Thousand';
                if ($hundreds > 0) $parts[] = $convertThree($hundreds);

                $words = 'Rupees ' . implode(' ', array_filter($parts));
            }

            if ($paise > 0) {
                $words .= ' and ' . $convertTwo($paise) . ' Paise';
            }

            return $words . ' Only';
        };

        $amountInWords = $formatIndianWords($totalAmount);
    @endphp

    <!-- Masthead -->
    <table class="masthead">
        <tr>
            <td class="logo-cell">
                @if(! empty($logoBase64))
                    <img
                        class="brand-logo"
                        src="{{ $logoBase64 }}"
                        alt="{{ $business['store_name'] ?? 'Maniratn Jewellers' }}"
                    >
                @else
                    <div style="font-size: 13px; font-weight: bold; color: #ffffff; letter-spacing: 1px; text-transform: uppercase;">
                        {{ $business['store_name'] ?? 'MANIRATN' }}
                    </div>
                @endif
            </td>
            <td class="business-cell">
                <div class="store-title">{{ $business['store_name'] ?? 'Maniratn Jewellers' }}</div>
                <div class="eyebrow">BIS Hallmarked Fine Jewellery &bull; Digital Vault</div>
                <div class="brand-address">
                    @if(! empty($business['address']))
                        {{ $business['address'] }}<br>
                    @endif
                    @if(! empty($business['phone']))
                        Phone: <strong>{{ $business['phone'] }}</strong>
                    @endif
                    @if(! empty($business['email']))
                        &bull; {{ $business['email'] }}
                    @endif
                    @if(! empty($business['gst_number']))
                        <br>GSTIN: <strong>{{ $business['gst_number'] }}</strong> &bull; State: <strong>Maharashtra (27)</strong>
                    @endif
                </div>
            </td>
            <td class="document-cell">
                <div class="document-label">Tax Invoice</div>
                <div class="document-number">#{{ $invoice['invoice_number'] ?? '—' }}</div>
                <div class="verified-badge">Digital Vault Verified</div>
            </td>
        </tr>
    </table>

    <!-- Void / Cancellation Alert if applicable -->
    @if(($invoice['status'] ?? '') === 'CANCELLED')
        <div class="void-banner">
            ⚠️ THIS INVOICE IS VOIDED / CANCELLED
            @if(! empty($invoice['cancellation_mode']))
                — Mode: {{ strtoupper(str_replace('_', ' ', $invoice['cancellation_mode'])) }}
            @endif
            @if(! empty($invoice['cancellation_reason']))
                (Reason: {{ $invoice['cancellation_reason'] }})
            @endif
            @if(! empty($invoice['cancelled_at']))
                on {{ $invoice['cancelled_at'] }}
            @endif
        </div>
    @endif

    <!-- Meta Information: Billed To & Invoice Details -->
    <table class="meta-table">
        <tr>
            <td class="meta-cell">
                <div class="section-kicker">Customer Details (Billed To)</div>
                <div class="meta-name">{{ $invoice['customer']['name'] ?? 'Retail Customer' }}</div>
                @if(! empty($invoice['customer']['mobile']))
                    <div class="meta-line">Mobile: <strong>{{ $invoice['customer']['mobile'] }}</strong></div>
                @endif
                @if(! empty($invoice['customer']['address']))
                    <div class="meta-line">Address: {{ $invoice['customer']['address'] }}</div>
                @elseif(! empty($invoice['customer']['city']))
                    <div class="meta-line">City: {{ $invoice['customer']['city'] }}</div>
                @endif
                @if(! empty($invoice['customer']['pan_no']))
                    <div class="meta-line">Customer PAN: <strong>{{ strtoupper($invoice['customer']['pan_no']) }}</strong></div>
                @endif
                @if(! empty($invoice['customer']['membership_id']))
                    <div class="meta-line">Loyalty / Vault ID: <strong>{{ $invoice['customer']['membership_id'] }}</strong></div>
                @endif
            </td>
            <td class="meta-cell-spacer"></td>
            <td class="meta-cell">
                <div class="section-kicker">Invoice & Rate Details</div>
                <table class="detail-table">
                    <tr>
                        <td class="detail-label">Invoice Number</td>
                        <td class="detail-value">{{ $invoice['invoice_number'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Issue Date</td>
                        <td class="detail-value">{{ $invoiceDate }}</td>
                    </tr>
                    @if(! empty($invoice['gold_rate_applied']) && (float) $invoice['gold_rate_applied'] > 0)
                        <tr>
                            <td class="detail-label">Applied Gold Rate</td>
                            <td class="detail-value">
                                <span class="rate-badge">&#8377;&nbsp;{{ number_format((float) $invoice['gold_rate_applied'], 2) }} / g</span>
                            </td>
                        </tr>
                    @endif
                    @if(! empty($invoice['silver_rate_applied']) && (float) $invoice['silver_rate_applied'] > 0)
                        <tr>
                            <td class="detail-label">Applied Silver Rate</td>
                            <td class="detail-value">
                                <span class="rate-badge">&#8377;&nbsp;{{ number_format((float) $invoice['silver_rate_applied'], 2) }} / g</span>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="detail-label">Sales Representative</td>
                        <td class="detail-value">{{ $invoice['created_by'] ?? 'Sales Staff' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Place of Supply</td>
                        <td class="detail-value">Maharashtra (27)</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Line Items Table -->
    <table class="items-heading-table">
        <tr>
            <td class="items-heading">Purchased Ornaments Breakdown</td>
            <td class="items-overview">
                {{ $invoiceItems->count() }} {{ $invoiceItems->count() === 1 ? 'Item' : 'Items' }}
                &bull; Total Net Wt: <strong>{{ number_format($totalNetWeight, 3) }} g</strong>
                @if($totalGoldWeight > 0)
                    (Gold: {{ number_format($totalGoldWeight, 3) }} g)
                @endif
                @if($totalSilverWeight > 0)
                    (Silver: {{ number_format($totalSilverWeight, 3) }} g)
                @endif
            </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 4%;">#</th>
                <th style="width: 34%;">Description & Details</th>
                <th class="text-center" style="width: 12%;">Purity</th>
                <th class="text-right" style="width: 10%;">Gross Wt.</th>
                <th class="text-right" style="width: 10%;">Net Wt.</th>
                <th class="text-right" style="width: 13%;">Rate (&#8377;/g)</th>
                <th class="text-right" style="width: 12%;">Making</th>
                <th class="text-right" style="width: 15%;">Amount (&#8377;)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invoiceItems as $index => $item)
                @php
                    $gross = (float) ($item['gross_weight'] ?? $item['weight'] ?? 0);
                    $net = (float) ($item['net_weight'] ?? $item['weight'] ?? 0);
                    $rate = (float) ($item['rate'] ?? 0);
                    $making = (float) ($item['making_charges'] ?? 0);
                    $makingType = $item['making_charge_type'] ?? 'percentage';
                    $finalPrice = (float) ($item['final_price'] ?? $item['total_price'] ?? 0);
                @endphp
                <tr>
                    <td class="item-index">{{ sprintf('%02d', $index + 1) }}</td>
                    <td>
                        <div class="item-name">{{ $item['description'] ?? 'Jewellery Ornament' }}</div>
                        <div class="item-sub">
                            @if(! empty($item['category']))
                                <span>{{ $item['category'] }}</span>
                            @endif
                            @if(! empty($item['barcode']))
                                &bull; SKU: <strong>{{ $item['barcode'] }}</strong>
                            @endif
                            @if(! empty($item['huid']))
                                &bull; <span class="huid-tag">BIS HUID: {{ $item['huid'] }}</span>
                            @endif
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="purity-tag">{{ $item['purity'] ?? '22K (916)' }}</span>
                    </td>
                    <td class="text-right">
                        {{ number_format($gross, 3) }} g
                    </td>
                    <td class="text-right cell-bold">
                        {{ number_format($net, 3) }} g
                    </td>
                    <td class="text-right">
                        @if($rate > 0)
                            &#8377;&nbsp;{{ number_format($rate, 2) }}
                        @else
                            —
                        @endif
                    </td>
                    <td class="text-right">
                        @if($makingType === 'flat' || $makingType === 'lump_sum')
                            &#8377;&nbsp;{{ number_format($making, 2) }}
                        @elseif($makingType === 'per_gram')
                            &#8377;&nbsp;{{ number_format($making, 2) }}/g
                        @else
                            {{ $making }}%
                        @endif
                    </td>
                    <td class="text-right cell-bold">
                        &#8377;&nbsp;{{ number_format($finalPrice, 2) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="padding: 14px; text-align: center; color: #7f786d;">
                        No line items recorded for this invoice.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Calculations, Payments & Words Summary -->
    <table class="summary-table">
        <tr>
            <td class="left-summary-cell">
                <!-- Amount in Words -->
                <div class="words-box">
                    <div class="words-title">Total Invoice Amount in Words</div>
                    <div class="words-text">{{ $amountInWords }}</div>
                </div>

                <!-- Payment / Settlement Details -->
                <div class="payment-box">
                    <div class="payment-title">Payment & Settlement Information</div>
                    <table class="payment-table">
                        @if($transactions->isNotEmpty())
                            @foreach($transactions as $txn)
                                <tr>
                                    <td>
                                        <strong>{{ $txn['payment_method'] ?? 'CARD' }}</strong>
                                        @if(! empty($txn['reference_number']))
                                            (Ref: {{ $txn['reference_number'] }})
                                        @endif
                                        @if(! empty($txn['date']))
                                            &bull; {{ $txn['date'] }}
                                        @endif
                                    </td>
                                    <td class="amt">&#8377;&nbsp;{{ number_format((float) ($txn['amount'] ?? 0), 2) }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Payment Status: <strong>Settled in Full</strong></td>
                                <td class="amt">&#8377;&nbsp;{{ number_format($paidAmount, 2) }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td style="padding-top: 3px; font-weight: bold; color: #221e1a;">Total Paid / Settled</td>
                            <td class="amt" style="padding-top: 3px; color: #15803d;">
                                &#8377;&nbsp;{{ number_format($paidAmount, 2) }}
                            </td>
                        </tr>
                        @if($balanceDue > 0.01)
                            <tr>
                                <td style="color: #b91c1c; font-weight: bold;">Balance Due</td>
                                <td class="amt" style="color: #b91c1c;">
                                    &#8377;&nbsp;{{ number_format($balanceDue, 2) }}
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </td>
            <td class="right-summary-cell">
                <table class="calc-table">
                    <tr class="calc-row">
                        <td>Items Gross Subtotal</td>
                        <td class="val">&#8377;&nbsp;{{ number_format($subTotal, 2) }}</td>
                    </tr>
                    @if($discountAmount > 0)
                        <tr class="calc-row discount">
                            <td>
                                Discount
                                @if(! empty($invoice['discount_value']) && ($invoice['discount_type'] ?? '') === 'percentage')
                                    ({{ number_format((float) $invoice['discount_value'], 2) }}%)
                                @endif
                            </td>
                            <td class="val">&minus;&nbsp;&#8377;&nbsp;{{ number_format($discountAmount, 2) }}</td>
                        </tr>
                    @endif
                    @if($taxAmount > 0)
                        <tr class="calc-row tax">
                            <td>CGST (1.5%)</td>
                            <td class="val">&#8377;&nbsp;{{ number_format($cgstAmount, 2) }}</td>
                        </tr>
                        <tr class="calc-row tax">
                            <td>SGST (1.5%)</td>
                            <td class="val">&#8377;&nbsp;{{ number_format($sgstAmount, 2) }}</td>
                        </tr>
                    @endif
                    <tr class="grand-total-row">
                        <td>Grand Total (Incl. GST)</td>
                        <td class="val">&#8377;&nbsp;{{ number_format($totalAmount, 2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Digital Vault & Google Review QR Codes -->
    <table class="bottom-modules">
        <tr>
            <td class="qr-card left">
                <table style="width: 100%;">
                    <tr>
                        @if(! empty($qrCodeBase64))
                            <td style="width: 48px; vertical-align: middle;">
                                <img class="qr-img" src="{{ $qrCodeBase64 }}" alt="Customer Vault QR Code">
                            </td>
                        @endif
                        <td style="vertical-align: middle; padding-left: {{ ! empty($qrCodeBase64) ? '8px' : '0' }};">
                            <div class="qr-title">Digital Vault & Warranty</div>
                            <div class="qr-desc">
                                Scan this QR code to access your digital passbook, lifetime certificates, and portfolio valuation on the Maniratn web portal.
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="qr-card right">
                <table style="width: 100%;">
                    <tr>
                        @if(! empty($googleReviewQrBase64))
                            <td style="width: 48px; vertical-align: middle;">
                                <img class="qr-img" src="{{ $googleReviewQrBase64 }}" alt="Google Review QR Code">
                            </td>
                        @endif
                        <td style="vertical-align: middle; padding-left: {{ ! empty($googleReviewQrBase64) ? '8px' : '0' }};">
                            <div class="qr-title" style="color: #b45309;">
                                Rate Us on Google &bull; &#9733;&#9733;&#9733;&#9733;&#9733;
                            </div>
                            <div class="qr-desc">
                                We value your trust! Scan to share your 5-star jewellery experience on Google Maps.
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Terms & Conditions -->
    <div class="terms-box">
        <div class="terms-heading">Terms & Conditions of Sale</div>
        1. 100% BIS Hallmarked fine jewellery purity guaranteed. Keep this digital invoice for all future exchange and buyback.<br>
        2. Exchange allowed within 7 days in original unworn condition against purchase bill.<br>
        3. Lifetime gold buyback & exchange at prevailing store market rates.
    </div>

    <!-- Footer Note -->
    <div class="invoice-footer">
        <span class="thanks-msg">Thank you for choosing {{ $business['store_name'] ?? 'Maniratn Jewellers' }} &bull; Handcrafted Gold & Silver Since 2007</span>
    </div>
</body>
</html>
