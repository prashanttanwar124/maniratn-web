<?php

use Illuminate\Support\Facades\Http;

test('vault page renders correctly when erp api returns valid customer data', function () {
    Http::fake([
        '*/api/website/vault/vault_TEST123' => Http::response([
            'success' => true,
            'customer' => [
                'id' => 1,
                'name' => 'Arjun Solanki',
                'city' => 'Mumbai',
                'membership_id' => 'MNT-001',
                'card_status' => 'ISSUED',
            ],
            'stats' => [
                'total_items' => 2,
                'total_gold_weight' => 12.5,
                'total_silver_weight' => 50.0,
                'total_invoices' => 1,
                'gold_rate_per_gram' => 7000,
                'silver_rate_per_gram' => 90,
                'estimated_gold_value' => 87500,
                'estimated_silver_value' => 4500,
                'total_portfolio_value' => 92000,
            ],
            'items' => [
                [
                    'id' => 1,
                    'invoice_id' => 1,
                    'invoice_number' => 'INV-001',
                    'date' => '2026-08-14',
                    'description' => 'Gold Ring 22K',
                    'category' => 'Ring',
                    'metal' => 'GOLD',
                    'gross_weight' => 12.5,
                    'net_weight' => 12.5,
                    'purity' => '22K',
                    'huid' => 'HUID1234',
                    'rate' => 7000,
                    'making_charges' => 500,
                    'total_price' => 87500,
                ],
            ],
            'invoices' => [
                [
                    'id' => 1,
                    'invoice_number' => 'INV-001',
                    'date' => '2026-08-14',
                    'total_amount' => 87500,
                    'tax_amount' => 2625,
                    'discount_amount' => 0,
                    'items_count' => 1,
                    'download_url' => 'http://127.0.0.1:8000/api/website/vault/vault_TEST123/invoices/1/print',
                ],
            ],
            'gold_schemes' => [],
            'store' => [
                'name' => 'Maniratn Jewellers',
                'phone' => '9892820518',
                'email' => 'hello@maniratnjewellers.com',
                'address' => 'Virar, Mumbai',
                'website' => 'https://maniratnjewellers.com',
            ],
            'latest_rate' => null,
        ], 200),
    ]);

    $response = $this->get(route('vault.show', 'vault_TEST123'));

    $response->assertOk();
});

test('vault page renders inactive view when erp returns 404 or inactive', function () {
    Http::fake([
        '*/api/website/vault/vault_INVALID' => Http::response([
            'success' => false,
            'message' => 'Vault card is inactive or not found.',
        ], 404),
    ]);

    $response = $this->get(route('vault.show', 'vault_INVALID'));

    $response->assertOk();
});

test('tax invoice renders as a pdf with the local invoice font', function () {
    Http::fake([
        '*/api/website/vault/vault_TEST123/invoices/1/print' => Http::response([
            'success' => true,
            'invoice' => [
                'invoice_number' => 'INV-001',
                'date' => '2026-08-14',
                'total_amount' => 90125,
                'tax_amount' => 2625,
                'discount_amount' => 0,
                'customer' => [
                    'name' => 'Arjun Solanki',
                    'mobile' => '9892000000',
                    'city' => 'Mumbai',
                ],
                'items' => [
                    [
                        'description' => 'Gold Ring 22K',
                        'purity' => '22K (916)',
                        'net_weight' => 12.5,
                        'huid' => 'HUID1234',
                        'final_price' => 87500,
                    ],
                ],
            ],
            'business' => [
                'store_name' => 'Maniratn Jewellers',
                'phone' => '9892820518',
                'email' => 'hello@maniratnjewellers.com',
                'address' => 'Virar, Mumbai',
                'gst_number' => '27ABCDE1234F1Z5',
            ],
        ]),
    ]);

    $response = $this->get(route('vault.invoice.print', [
        'token' => 'vault_TEST123',
        'invoice' => 1,
    ]));

    $response
        ->assertOk()
        ->assertHeader('content-type', 'application/pdf');

    expect($response->getContent())
        ->toStartWith('%PDF-')
        ->toContain('Poppins')
        ->toContain('/Subtype /Image');
});
