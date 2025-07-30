<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MonnifyService
{
    public function authenticate()
    {
        $apiKey = env('MONIFY_TEST_API_KEY');
        $secretKey = env('MONIFY_TEST_SECRET_KEY');
        $baseUrl = env('MONIFY_TEST_BASE_URL');
        $walletAccNum = env('MONIFY_TEST_WALLET_ACCOUNT_NUMBER');
        
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode("$apiKey:$secretKey")
        ])->post($baseUrl . '/v1/auth/login');

        $data = $response->json();

        if (!isset($data['responseBody']['accessToken'])) {
            \Log::error('Monnify login failed', $data);
            throw new \Exception('Monnify authentication failed');
        }
        
        return $data['responseBody']['accessToken'];
    }
    
    public function createVirtualAccount($user)
    {
        $token = $this->authenticate();
        $contactCode = env('MONIFY_TEST_CONTACT_CODE');
        $baseUrl = env('MONIFY_TEST_BASE_URL');

        $payload = [
            "accountReference" => "USER_" . $user->id,
            "accountName" => $user->username,
            "currencyCode" => "NGN",
            "contractCode" => $contactCode,
            "customerEmail" => $user->email,
            "customerName" => $user->name,
            // "bvn":"21212121212",
            "getAllAvailableBanks" => true
        ];

        $response = Http::withToken($token)->post($baseUrl . '/v2/bank-transfer/reserved-accounts', $payload);

        $data = $response->json();

        \Log::info('Monnify account creation response:', $data);

        return $data;
    }   
}