<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class FirebaseNotificationService
{
    private $projectId;
    private $serviceAccountPath;

    public function __construct()
    {
        $this->projectId = "xtraevent-56034";
        $this->serviceAccountPath = public_path('google-firebase-notification/xtraevent-56034-firebase-adminsdk-fbsvc-cee64e261b.json');
    }

    /**
     * Send single FCM message - SAME EXACT PAYLOAD & RESPONSE
     */
    public function sendMessage($token, $title, $body, array $data = [])
    {
        try {
            // Get access token using simple cURL
            $accessToken = $this->getAccessToken();
            
            if (!$accessToken) {
                throw new \Exception('Failed to retrieve access token');
            }

            $fcmUrl = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

            // EXACT SAME PAYLOAD as original
            $payload = [
                'message' => [
                    'token' => $token,
                    'notification' => [
                        'title' => $title ?? "Testing",
                        'body'  => $body ?? "Testing from xtraevent",
                    ],
                    'data' => [
                        'click_action' => '',
                        ...$data // Merge additional data
                    ],
                ],
            ];

            Log::info('FCM Payload:', $payload);

            // Simple Laravel HTTP Client (or cURL below)
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->post($fcmUrl, $payload);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'response' => $response->json(),
                ];
            } else {
                Log::error('FCM Error Response:', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return [
                    'error' => $response->status() . ': ' . $response->body()
                ];
            }

        } catch (\Exception $e) {
            Log::error('FCM Exception: ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Get Firebase access token using simple cURL
     */
    private function getAccessToken()
    {
        $serviceAccount = json_decode(file_get_contents($this->serviceAccountPath), true);
        
        if (!$serviceAccount) {
            Log::error('Invalid service account file');
            return null;
        }

        $jwtHeader = $this->base64UrlEncode(json_encode([
            'alg' => 'RS256',
            'typ' => 'JWT'
        ]));

        $now = time();
        $jwtClaim = $this->base64UrlEncode(json_encode([
            'iss' => $serviceAccount['client_email'],
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
            'aud' => 'https://oauth2.googleapis.com/token',
            'exp' => $now + 3600,
            'iat' => $now
        ]));

        $toSign = $jwtHeader . '.' . $jwtClaim;
        
        // Sign with private key
        $privateKey = $serviceAccount['private_key'];
        $signature = '';
        openssl_sign($toSign, $signature, $privateKey, 'sha256WithRSAEncryption');
        $jwtSignature = $this->base64UrlEncode($signature);

        $jwt = $jwtHeader . '.' . $jwtClaim . '.' . $jwtSignature;

        // Exchange JWT for access token using simple cURL
        $tokenUrl = 'https://oauth2.googleapis.com/token';
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $tokenUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion' => $jwt
            ]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded'
            ],
            CURLOPT_TIMEOUT => 30
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        Log::info('Access Token Response:', ['http_code' => $httpCode, 'response' => $response]);

        if ($httpCode === 200) {
            $tokenData = json_decode($response, true);
            return $tokenData['access_token'] ?? null;
        }

        return null;
    }

    /**
     * Send to multiple tokens - SAME EXACT RESPONSE STRUCTURE
     */
    public function sendMultipleMessage(array $tokens, $title, $body, array $data = [])
    {
        $results = [];

        if (count($tokens) > 0) {
            foreach ($tokens as $token) {
                $result = $this->sendMessage($token, $title, $body, $data);
                $results[] = [
                    'token' => $token,
                    'result' => $result,
                ];
            }
        }

        return $results;
    }

    /**
     * Helper: Base64 URL encode
     */
    private function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
