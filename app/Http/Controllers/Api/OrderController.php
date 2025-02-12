<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Chield;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Packages;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function update($id)
    {
        // Find the order by its ID
        $order = Order::find($id);

        // Check if the order exists
        if ($order) {
            // Update the Payment_statue
            $order->Payment_statue = 'Paid';

            // Save the changes to the database
            $order->save();

            // Return a success response
            return $this->success("Success update");
        }
    }

    public function store(OrderRequest $request, $step = null)
    {
        $data = $request->validated();
        if ($step == 1) {
            // Split name into first and last names
            $nameParts = explode(' ', $data['name'], 2);
            $firstName = $nameParts[0];
            $lastName = $nameParts[1] ?? '';

            // Check if customer exists
            $customer = Customer::where('email', $data['email'])
                ->orWhere('phone', $data['phone'])
                ->first();

            if ($customer) {
                $customer->sendOTP();
            } else {
                // Create new customer
                $customerData = [
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "email" => $data['email'],
                    "phone" => $data['phone'],
                ];

                $customer = Customer::create($customerData);
                $customer->sendOTP();
            }

            // Create child record
            $childData = [
                "name" => $data['child_name'],
                "birthdate" => $data['birth_date_of_child'],
                "customer_id" => $customer->id,
            ];

            $child = Chield::create($childData);


            return $this->success("Step 1 success", [
                'id' => $customer->id,
                'otp' => $customer->otp,
            ]);
        } elseif ($step == 2) {
            // Validate OTP
            $customer = Customer::where('email', $data['email'])
            ->orWhere('phone', $data['phone'])
            ->first();
            if ($customer) {
                $otp = $data['otp'];
                $response = $customer->verfiedOTP($otp);

                if ($response === true) {
                    return $this->success("Validate OTP Success");
                } else {
                    return $this->failure("Invalid OTP");
                }
            } else {
                return response()->json(['message' => 'Customer not found.'], 404);
            }
        } elseif ($step == 3) {
            // Check if customer exists
            $customer = Customer::where('email', $data['email'])
            ->orWhere('phone', $data['phone'])
            ->first();

            if ($customer) {
                $lastChild = Chield::where('customer_id', $customer->id)
                ->orderBy('created_at', 'desc') // Or order by 'id' if auto-incremented
                ->first();
            }

            $package = Packages::find($data['package_id']);
            $data['price'] = $package->FinalPrice;

            // Handle optional duration selection
            if ($data['Choose_duration_later'] === 1) {
                $data['group_id'] = null;
                $data['time_id'] = null;
                $data['day_id'] = null;
            }

            $data['customer_id'] = $customer->id;

            $data['chield_id'] = $lastChild->id;
            unset($data['email']);
            unset($data['phone']);

            // Create the order record
            // $order = Order::create($data);
            // Call Paymob to process payment
            $paydata = $this->paymob($data);

            // $handelpaymenturl = $this->handlePaymentRequest($paydata);

            // Mail::to($order->customer->email)->send(new OrderConfirmationMail($order));


            // return $this->success($order, $handelpaymenturl);
        }
    }


    private function paymob($data)
    {
        return  $data;


    }

    // public function handlePaymentRequest($request)
    // {
    //     // Step 1: Get the data from Paymob (assuming you've already obtained it)
    //     $responseData = json_decode($request->content(), true);

    //     // Correctly access the order ID from payment_keys
    //     $clientSecret = $responseData['client_secret'];  // Access the first element of 'payment_keys' and get 'key'

    //     // Step 3: Inject the public key and client secret into the URL
    //     $publicKey = 'egy_pk_test_KC7oMHvRj6a9YDXGnOshbP3GVnoF2zey';  // Replace with your actual public key
    //     $paymobUrl = "https://accept.paymob.com/unifiedcheckout/?publicKey={$publicKey}&clientSecret={$clientSecret}";

    //     // Step 4: Return the URL
    //     return   $paymobUrl ;
    // }



}
