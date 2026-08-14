<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tax Invoice — {{ $invoice['invoice_number'] ?? '' }}</title>
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
            margin: 13mm 13mm 15mm;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #ffffff;
            color: #2b2925;
            font-family: 'Poppins', 'DejaVu Sans', sans-serif;
            font-size: 8.5px;
            line-height: 1.5;
            margin: 0 13mm;
        }

        table {
            border-collapse: collapse;
        }

        .masthead {
            border-bottom: 3px solid #c9a64d;
            margin-bottom: 15px;
            table-layout: fixed;
            width: 100%;
        }

        .logo-cell {
            background: #5b0d13;
            padding: 9px 12px;
            text-align: center;
            vertical-align: middle;
            width: 25%;
        }

        .brand-logo {
            display: block;
            height: auto;
            margin: 0 auto;
            width: 92px;
        }

        .business-cell {
            background: #5b0d13;
            border-left: 1px solid #7a3439;
            padding: 12px 14px;
            vertical-align: middle;
            width: 40%;
        }

        .document-cell {
            background: #fcf8ef;
            border-right: 1px solid #e8ddc8;
            border-top: 1px solid #e8ddc8;
            padding: 12px 14px;
            text-align: right;
            vertical-align: middle;
            width: 35%;
        }

        .eyebrow {
            color: #f1d27f;
            font-size: 6.8px;
            font-weight: bold;
            letter-spacing: 1.35px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .brand-address {
            color: #f3e7e5;
            font-size: 7.2px;
            line-height: 1.65;
        }

        .brand-address strong {
            color: #ffffff;
            font-weight: bold;
        }

        .document-label {
            color: #25211c;
            font-size: 17px;
            font-weight: bold;
            letter-spacing: 1.8px;
            line-height: 1.2;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .document-number {
            color: #5b0d13;
            font-size: 9px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .verified-tag {
            background: #f7f1e4;
            border: 1px solid #dfc98e;
            border-radius: 10px;
            color: #7b5b18;
            display: inline-block;
            font-size: 6.8px;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 3px 9px;
            text-transform: uppercase;
        }

        .meta-table {
            margin-bottom: 16px;
            table-layout: fixed;
            width: 100%;
        }

        .meta-cell {
            background: #fbfaf8;
            border: 1px solid #e7e1d8;
            padding: 11px 13px;
            vertical-align: top;
            width: 50%;
        }

        .meta-cell.left {
            border-right: 4px solid #ffffff;
        }

        .meta-cell.right {
            border-left: 4px solid #ffffff;
        }

        .section-kicker {
            color: #9a7328;
            font-size: 6.8px;
            font-weight: bold;
            letter-spacing: 1.3px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .meta-name {
            color: #27231f;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .meta-line {
            color: #68625a;
            font-size: 8px;
            margin-bottom: 2px;
        }

        .meta-line strong {
            color: #302c27;
            font-weight: bold;
        }

        .detail-table {
            width: 100%;
        }

        .detail-table td {
            padding-bottom: 3px;
        }

        .detail-label {
            color: #847d73;
            width: 42%;
        }

        .detail-value {
            color: #302c27;
            font-weight: bold;
            text-align: right;
        }

        .items-heading-table {
            margin-bottom: 6px;
            width: 100%;
        }

        .items-heading {
            color: #5b0d13;
            font-size: 8px;
            font-weight: bold;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .items-overview {
            color: #8a8379;
            font-size: 7.2px;
            text-align: right;
        }

        .items-table {
            margin-bottom: 17px;
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
            border-bottom: 2px solid #c9a64d;
            color: #ffffff;
            font-size: 6.8px;
            font-weight: bold;
            letter-spacing: 0.8px;
            padding: 8px;
            text-align: left;
            text-transform: uppercase;
        }

        .items-table td {
            border-bottom: 1px solid #e9e4dc;
            color: #4b4640;
            font-size: 8.3px;
            padding: 9px 8px;
            vertical-align: middle;
        }

        .items-table tbody tr:nth-child(even) td {
            background: #fcfaf6;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .item-index {
            color: #aaa297;
            font-size: 7.5px;
        }

        .item-name {
            color: #29251f;
            font-size: 8.8px;
            font-weight: bold;
        }

        .item-sub {
            color: #8a8379;
            font-size: 7px;
            margin-top: 2px;
        }

        .item-sub strong {
            color: #615a51;
            font-weight: bold;
            letter-spacing: 0.3px;
        }

        .cell-strong {
            color: #29251f !important;
            font-weight: bold;
            white-space: nowrap;
        }

        .purity-tag {
            background: #f8f0dc;
            border: 1px solid #ddc37f;
            border-radius: 3px;
            color: #755517;
            display: inline-block;
            font-size: 7px;
            font-weight: bold;
            padding: 2px 6px;
            white-space: nowrap;
        }

        .summary-table {
            margin-bottom: 20px;
            page-break-inside: avoid;
            table-layout: fixed;
            width: 100%;
        }

        .terms-cell {
            padding-right: 22px;
            vertical-align: top;
            width: 55%;
        }

        .terms-box {
            background: #fcfaf5;
            border-left: 3px solid #c7a04a;
            color: #756e64;
            font-size: 7.5px;
            line-height: 1.65;
            padding: 10px 12px;
        }

        .terms-title {
            color: #4d171a;
            font-size: 7.5px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .summary-cell {
            vertical-align: top;
            width: 45%;
        }

        .calc-table {
            width: 100%;
        }

        .calc-row td {
            border-bottom: 1px solid #eee9e2;
            color: #756e64;
            font-size: 8px;
            padding: 5px 8px;
        }

        .calc-row td.val {
            color: #302c27;
            font-weight: bold;
            text-align: right;
            white-space: nowrap;
        }

        .discount-value {
            color: #9f2f35 !important;
        }

        .grand-total-row td {
            background: #5b0d13;
            border-top: 2px solid #c9a64d;
            color: #ffffff;
            font-size: 9px;
            font-weight: bold;
            padding: 10px 8px;
            text-transform: uppercase;
        }

        .grand-total-row td.val {
            color: #f4d988;
            font-size: 11.5px;
            text-align: right;
            white-space: nowrap;
        }

        .invoice-footer {
            border-top: 1px solid #ddd6cc;
            color: #8b847a;
            font-size: 7px;
            line-height: 1.6;
            padding-top: 10px;
            text-align: center;
        }

        .invoice-footer .thanks {
            color: #5b0d13;
            font-size: 8px;
            font-weight: bold;
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body>
    @php
        $invoiceDate = ! empty($invoice['date'])
            ? date('d M Y', strtotime($invoice['date']))
            : date('d M Y');
        $invoiceItems = collect($invoice['items'] ?? []);
        $itemsSubtotal = $invoiceItems->sum(
            fn (array $item): float => (float) ($item['final_price'] ?? 0),
        );
        $totalNetWeight = $invoiceItems->sum(
            fn (array $item): float => (float) ($item['net_weight'] ?? 0),
        );
        $itemCount = $invoiceItems->count();
    @endphp

    <table class="masthead">
        <tr>
            <td class="logo-cell">
                <img
                    class="brand-logo"
                    src="file://{{ public_path('logo.png') }}"
                    alt="{{ $business['store_name'] ?? 'Maniratn Jewellers' }}"
                >
            </td>
            <td class="business-cell">
                <div class="eyebrow">Hallmarked Jewellery &bull; Digital Vault</div>
                <div class="brand-address">
                    @if(! empty($business['address']))
                        {{ $business['address'] }}<br>
                    @endif
                    @if(! empty($business['phone']))
                        {{ $business['phone'] }}
                    @endif
                    @if(! empty($business['email']))
                        @if(! empty($business['phone'])) &nbsp;&bull;&nbsp; @endif
                        {{ $business['email'] }}
                    @endif
                    @if(! empty($business['gst_number']))
                        <br>GSTIN: <strong>{{ $business['gst_number'] }}</strong>
                    @endif
                </div>
            </td>
            <td class="document-cell">
                <div class="document-label">Tax Invoice</div>
                <div class="document-number">#{{ $invoice['invoice_number'] ?? '—' }}</div>
                <div class="verified-tag">Digital Vault Verified</div>
            </td>
        </tr>
    </table>

    <table class="meta-table">
        <tr>
            <td class="meta-cell left">
                <div class="section-kicker">Billed To</div>
                <div class="meta-name">{{ $invoice['customer']['name'] ?? 'Retail Customer' }}</div>
                @if(! empty($invoice['customer']['mobile']))
                    <div class="meta-line">Phone: <strong>{{ $invoice['customer']['mobile'] }}</strong></div>
                @endif
                @if(! empty($invoice['customer']['city']))
                    <div class="meta-line">City: {{ $invoice['customer']['city'] }}</div>
                @endif
            </td>
            <td class="meta-cell right">
                <div class="section-kicker">Invoice Details</div>
                <table class="detail-table">
                    <tr>
                        <td class="detail-label">Invoice number</td>
                        <td class="detail-value">{{ $invoice['invoice_number'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Issue date</td>
                        <td class="detail-value">{{ $invoiceDate }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Record status</td>
                        <td class="detail-value" style="color: #8a651d;">Verified copy</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="items-heading-table">
        <tr>
            <td class="items-heading">Purchase Details</td>
            <td class="items-overview">
                {{ $itemCount }} {{ $itemCount === 1 ? 'item' : 'items' }}
                &nbsp;&bull;&nbsp;
                {{ number_format($totalNetWeight, 3) }} g total net weight
            </td>
        </tr>
    </table>
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 6%;">#</th>
                <th style="width: 44%;">Item Description</th>
                <th class="text-center" style="width: 14%;">Purity</th>
                <th class="text-right" style="width: 16%;">Net Wt.</th>
                <th class="text-right" style="width: 20%;">Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invoice['items'] ?? [] as $index => $item)
                <tr>
                    <td class="item-index">{{ sprintf('%02d', $index + 1) }}</td>
                    <td>
                        <div class="item-name">{{ $item['description'] ?? 'Jewellery Item' }}</div>
                        @if(! empty($item['huid']))
                            <div class="item-sub">BIS HUID: <strong>{{ $item['huid'] }}</strong></div>
                        @endif
                    </td>
                    <td class="text-center">
                        <span class="purity-tag">{{ $item['purity'] ?? '22K' }}</span>
                    </td>
                    <td class="text-right cell-strong">
                        {{ number_format((float) ($item['net_weight'] ?? 0), 3) }} g
                    </td>
                    <td class="text-right cell-strong">
                        &#8377;&nbsp;{{ number_format((float) ($item['final_price'] ?? 0), 2) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 16px; text-align: center; color: #8b847a;">
                        No line items are available for this invoice.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <table class="summary-table">
        <tr>
            <td class="terms-cell">
                <div class="terms-box">
                    <div class="terms-title">Authenticity Guarantee</div>
                    All precious jewellery conforms to applicable BIS Hallmarking guidelines.<br>
                    This invoice is securely archived in your Maniratn Digital Vault.
                </div>
            </td>
            <td class="summary-cell">
                <table class="calc-table">
                    <tr class="calc-row">
                        <td>Items subtotal</td>
                        <td class="val">&#8377;&nbsp;{{ number_format($itemsSubtotal, 2) }}</td>
                    </tr>
                    @if((float) ($invoice['discount_amount'] ?? 0) > 0)
                        <tr class="calc-row">
                            <td>Discount</td>
                            <td class="val discount-value">&minus;&nbsp;&#8377;&nbsp;{{ number_format((float) $invoice['discount_amount'], 2) }}</td>
                        </tr>
                    @endif
                    @if((float) ($invoice['tax_amount'] ?? 0) > 0)
                        <tr class="calc-row">
                            <td>GST / Tax</td>
                            <td class="val">&#8377;&nbsp;{{ number_format((float) $invoice['tax_amount'], 2) }}</td>
                        </tr>
                    @endif
                    <tr class="grand-total-row">
                        <td>Total Amount</td>
                        <td class="val">&#8377;&nbsp;{{ number_format((float) ($invoice['total_amount'] ?? 0), 2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="invoice-footer">
        <span class="thanks">Thank you for choosing {{ $business['store_name'] ?? 'Maniratn Jewellers' }}</span><br>
        This computer-generated digital tax invoice does not require a signature.
    </div>
</body>
</html>
