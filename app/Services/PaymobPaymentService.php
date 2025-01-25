<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PaymobPaymentService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function pay($request)
    {

        $body = [
            "amount" => $request->pach,
            "currency" => "EGP",
            "customer_initiated" => true,
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "Test Description",
            "metadata" => ["udf1" => "Metadata 1"],
            "reference" => ["transaction" => "txn_01", "order" => "ord_01"],
            "receipt" => ["email" => true, "sms" => true],
            "customer" => [
                "first_name" => $request->first_name,
                "middle_name" => "test",
                "last_name" => $request->last_name,
                "email" => $request->email,
                "phone" => ["country_code" => 966, "number" => $request->phone]
            ],
            "destinations" => [
                "destination" => $request->destination
            ],
            "merchant" => ["id" => config('tap-payment.merchant_id')],
            "source" => ["id" => "src_all"],
            "post" => ["url" => config('tap-payment.redirection_url')],
            "redirect" => ["url" => config('tap-payment.redirection_url')]
        ];
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer sk_test_Grl31ZYqMC0K9REiz7F8wv24', // working on sk_test_Grl31ZYqMC0K9REiz7F8wv24
            ])->post(config('tap-payment.create_recharge_base_url'), $body);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => __('Server error')
            ]);
        }
        return response()->json([
            'id' => json_decode($response->getBody())->id,
            'status' => json_decode($response->getBody())->status,
            'amount' => json_decode($response->getBody())->amount,
            'transaction_url' => json_decode($response->getBody())->transaction->url,
            'redirection_url' => json_decode($response->getBody())->redirect->url,
        ]);
    }

    public function retrieveCharge($tapID)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer sk_test_dnSU3zvlm19QThs7MWkCDLVY',
            ])->get('https://api.tap.company/v2/charges/' . $tapID);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => __('Server error')
            ]);
        }

        if (property_exists(json_decode($response), 'errors')) {
            return response()->json([
                'status' => null,
                'code' => json_decode($response)->errors[0]->code,
                'message' => json_decode($response)->errors[0]->description,
                'card' => null,
            ]);
        } else {
            $response = json_decode($response->getBody());
        }


        return response()->json([
            'status' => $response->redirect->status,
            'code' => (int) $response->response->code,
            'message' => $response->response->message,
            'card' => $response->source ?? null,
        ]);
    }

    public function addFile($purpose, $title, $filePath)
    {
        try {
            $response = $this->client->request('POST', 'https://api.tap.company/v2/files/', [
                'multipart' => [
                    [
                        'name' => 'purpose',
                        'contents' => $purpose
                    ],
                    [
                        'name' => 'file',
                        'filename' => $filePath->getClientOriginalName(),
                        'contents' => "data:image/jpeg;name=" . $filePath->getClientOriginalName() . ";base64," . base64_encode(file_get_contents($filePath)),
                        'headers' => [
                            'Content-Type' => $filePath->getClientMimeType()
                        ]
                    ],
                    [
                        'name' => 'title',
                        'contents' =>  $title
                    ],
                    [
                        'name' => 'expires_at',
                        'contents' => '1913743462'
                    ],
                    [
                        'name' => 'file_link_create',
                        'contents' => 'true'
                    ]
                ],
                'headers' => [
                    'Authorization' => 'Bearer sk_test_Grl31ZYqMC0K9REiz7F8wv24',
                    'accept' => 'multipart/form-data',
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => __('Server error')
            ]);
        }
        return json_decode($response->getBody())->id;
    }


    public function addBusinessAccount($data)
    {
        $name = $this->splitFullName($data['name']);
        $body = [
            "name" => [
                "ar" => $data['brand_name_ar'],
                "en" => $data['brand_name_en']
            ],
            "type" => "corp",
            "entity" => [
                "legal_name" => [
                    "ar" => $data['brand_name_ar'],
                    "en" => $data['brand_name_en']
                ],
                "is_licensed" => true,
                "not_for_profit" => false,
                "country" => "SA",
                "settlement_by" => "Bank",
                "bank_account" => [
                    "iban" => $data['iban_number']
                ]
            ],
            "contact_person" => [
                "name" => [
                    "first" => $name['first_name'],
                    "last" => $name['last_name']
                ],
                "contact_info" => [
                    "primary" => [
                        "email" => $data['email'],
                        "phone" => [
                            "country_code" => "966",
                            "number" => $data['phone']
                        ]
                    ]
                ],
                "is_authorized" => true,
            ],
            "brands" => [
                [
                    "name" => [
                        "ar" => $data['brand_name_ar'],
                        "en" => $data['brand_name_en']
                    ],
                    "sector" => ["E-Commerce"],
                ]
            ],
        ];
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer sk_test_Grl31ZYqMC0K9REiz7F8wv24',
            ])->post("https://api.tap.company/v2/business", $body);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => __('Server error')
            ]);
        }

        return [
            'id' => json_decode($response->getBody())->id,
            'status' => json_decode($response->getBody())->status,
            'destination_id' => json_decode($response->getBody())->destination_id,
        ];
    }

    public function splitFullName($fullName)
    {
        // Trim any extra spaces
        $fullName = trim($fullName);

        // Split the name by spaces into an array
        $nameParts = explode(' ', $fullName);

        // Get the first name (first element in the array)
        $firstName = $nameParts[0];

        // Get the last name (all remaining elements joined as a string)
        $lastName = count($nameParts) > 1
            ? implode(' ', array_slice($nameParts, 1))
            : '';

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ];
    }
}