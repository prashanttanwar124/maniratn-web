<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class CustomerOnboardingController extends Controller
{
    /**
     * Display the VIP Customer Onboarding registration page (Pure lightweight Blade view matching vault).
     */
    public function show(Request $request)
    {
        $code = (string) ($request->query('code') ?: $request->query('token') ?: '');
        $pin = (string) ($request->query('pin') ?: '');

        return view('join', [
            'initialCode' => $code,
            'initialPin' => $pin,
            'store' => [
                'name' => 'Maniratn Jewellers',
                'tagline' => 'Fine Gold & Diamond Jewellery',
                'phone' => '+91 98928 20518',
                'address' => 'Bolinj Rd, Gokul Twp, Virar West, Maharashtra 401303',
            ],
        ]);
    }


    /**
     * Submit walk-in customer details to ERP Website API.
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'token' => ['required', 'string', 'max:100'],
            'pin' => ['nullable', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'dob' => ['required', 'date'],
            'anniversary_date' => ['nullable', 'date'],
            'city' => ['nullable', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:500'],
            'pan_no' => ['nullable', 'string', 'max:20'],
            'aadhaar_no' => ['nullable', 'string', 'max:20'],
        ]);


        $erpBaseUrl = rtrim((string) config('services.erp.url', env('ERP_API_URL', 'http://127.0.0.1:8000')), '/');

        try {
            $response = Http::timeout(8)
                ->acceptJson()
                ->post("{$erpBaseUrl}/api/website/customers/register", $validated);

            if ($response->successful() && $response->json('success')) {
                $data = $response->json();
                $vaultToken = $data['customer']['vault_token'] ?? null;
                $localVaultUrl = $vaultToken ? url("/vault/{$vaultToken}") : null;

                return response()->json([
                    'success' => true,
                    'message' => $data['message'] ?? 'Welcome to Maniratn VIP Club! Your membership is active.',
                    'customer' => $data['customer'] ?? [],
                    'vault_url' => $localVaultUrl,
                ], 201);

            }

            $status = $response->status();
            $errorMsg = $response->json('message') ?? 'Unable to process registration. Please check your details.';

            return response()->json([
                'success' => false,
                'message' => $errorMsg,
                'errors' => $response->json('errors') ?? [],
            ], $status >= 400 && $status < 500 ? $status : 422);
        } catch (\Throwable $e) {
            Log::error('Failed submitting customer onboarding to ERP: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Connection to store system timed out. Please try again or ask counter staff.',
            ], 503);
        }
    }
}
