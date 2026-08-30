<?php

use Illuminate\Support\Facades\Http;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;

test('it renders the vip join onboarding page', function () {
    $response = get(route('join', ['code' => 'karatsetu_test123', 'pin' => '4123']));

    $response->assertOk()
        ->assertViewIs('join')
        ->assertSee('karatsetu_test123')
        ->assertSee('Join Maniratn VIP Club');
});



test('it forwards onboarding submission to erp api successfully', function () {
    Http::fake([
        '*/api/website/customers/register' => Http::response([
            'success' => true,
            'message' => 'Customer registered successfully.',
            'customer' => [
                'id' => 101,
                'name' => 'Aarav Mehta',
                'mobile' => '9820012345',
                'vault_token' => 'vault_test_token_999',
            ],
            'vault_url' => 'https://maniratnjewellers.com/vault/vault_test_token_999',
        ], 201),
    ]);

    $response = postJson(route('join.submit'), [
        'token' => 'karatsetu_test123',
        'name' => 'Aarav Mehta',
        'mobile' => '9820012345',
        'dob' => '1995-05-15',
        'city' => 'Mumbai',
    ]);

    $response->assertStatus(201)
        ->assertJson([
            'success' => true,
            'customer' => [
                'name' => 'Aarav Mehta',
                'mobile' => '9820012345',
            ],
        ]);
});

test('it passes through error from erp api when token is invalid', function () {
    Http::fake([
        '*/api/website/customers/register' => Http::response([
            'success' => false,
            'message' => 'Invalid or expired counter registration token.',
        ], 401),
    ]);

    $response = postJson(route('join.submit'), [
        'token' => 'invalid_token',
        'name' => 'Aarav Mehta',
        'mobile' => '9820012345',
        'dob' => '1995-05-15',
    ]);


    $response->assertStatus(401)
        ->assertJson([
            'success' => false,
            'message' => 'Invalid or expired counter registration token.',
        ]);
});
