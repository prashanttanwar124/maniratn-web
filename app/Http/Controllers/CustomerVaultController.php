<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CustomerVaultController extends Controller
{
    /**
     * Fetch customer digital vault data from ERP API and render the luxury web vault.
     */
    public function show(string $token)
    {
        $erpBaseUrl = rtrim(config('services.erp.url', env('ERP_API_URL', 'http://localhost:8000')), '/');

        try {
            $response = Http::timeout(6)
                ->acceptJson()
                ->get("{$erpBaseUrl}/api/website/vault/{$token}");

            if ($response->successful() && $response->json('success')) {
                $data = $response->json();
                $data['token'] = $token;

                return view('vault.show', $data);
            }

            if (config('app.debug') && ! $response->successful() && $response->status() !== 404) {
                return response()->json([
                    'debug_error' => 'ERP API returned failure status',
                    'status' => $response->status(),
                    'erp_url' => "{$erpBaseUrl}/api/website/vault/{$token}",
                    'response' => $response->json() ?? $response->body(),
                ], 500);
            }

            return view('vault.inactive', [
                'token' => $token,
                'message' => $response->json('message') ?? 'Vault pass is currently inactive or not found.',
                'store' => ['name' => 'Maniratn Jewellers'],
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to fetch customer vault from ERP: ' . $e->getMessage());

            if (config('app.debug')) {
                throw $e;
            }

            return view('vault.inactive', [
                'token' => $token,
                'message' => 'Unable to connect to the store vault service. Please try again in a few moments.',
                'store' => ['name' => 'Maniratn Jewellers'],
            ]);
        }
    }

    /**
     * Fetch invoice JSON from ERP API and compile official PDF on the website.
     */
    public function printInvoice(string $token, string $invoice)
    {
        $erpBaseUrl = rtrim(config('services.erp.url', env('ERP_API_URL', 'http://localhost:8000')), '/');

        try {
            $response = Http::timeout(10)
                ->acceptJson()
                ->get("{$erpBaseUrl}/api/website/vault/{$token}/invoices/{$invoice}/print");

            if ($response->successful() && $response->json('success')) {
                $data = $response->json();

                $fontDir = storage_path('fonts');
                if (! is_dir($fontDir)) {
                    @mkdir($fontDir, 0775, true);
                }

                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.tax-invoice', [
                    'invoice' => $data['invoice'] ?? [],
                    'business' => $data['business'] ?? [],
                ])
                ->setPaper('a4', 'portrait')
                ->setOption('fontDir', $fontDir)
                ->setOption('fontCache', $fontDir)
                ->setOption('defaultFont', 'DejaVu Sans')
                ->setOption('isRemoteEnabled', true)
                ->setOption('isHtml5ParserEnabled', true)
                ->setOption('chroot', [public_path(), base_path(), storage_path()]);

                $invoiceNum = $data['invoice']['invoice_number'] ?? 'Invoice';

                return $pdf->stream("Invoice-{$invoiceNum}.pdf", ['Attachment' => false]);
            }

            if ($response->status() === 403) {
                abort(403, $response->json('message') ?? 'Unauthorized access: This invoice does not belong to this vault pass.');
            }

            if ($response->status() === 404) {
                abort(404, $response->json('message') ?? 'Invoice not found.');
            }

            if (config('app.debug')) {
                return response()->json([
                    'debug_error' => 'Failed to fetch invoice from ERP API',
                    'status' => $response->status(),
                    'erp_url' => "{$erpBaseUrl}/api/website/vault/{$token}/invoices/{$invoice}/print",
                    'response' => $response->json() ?? $response->body(),
                ], 500);
            }

            abort(500, 'Unable to load invoice at this time.');
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error('Failed to generate invoice PDF: ' . $e->getMessage());

            if (config('app.debug')) {
                throw $e;
            }

            abort(500, 'Unable to load invoice: ' . $e->getMessage());
        }
    }
}
