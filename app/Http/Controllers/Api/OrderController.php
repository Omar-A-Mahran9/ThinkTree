<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Models\Chield;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request, $step = null)
    {
        $data = $request->validated();
        if($step==1){
        // If $data is an array, use array syntax instead of object syntax
        $nameParts = explode(' ', $data['name'], 2); // Split into two parts by the first space
        $firstName = $nameParts[0]; // The first part of the name
        $lastName = isset($nameParts[1]) ? $nameParts[1] : ''; // The second part, if exists
        
        $customer = Customer::where('email', $data['email'])
        ->orWhere('phone', $data['phone'])
        ->first();
        if ($customer) {
        $customer->sendOTP();
        }
        if (!$customer) {
            $customerdata = [
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $data['email'],
                "phone" => $data['phone'],
            ];
        
            $customer = Customer::create($customerdata);
            $customer->sendOTP();

        }

        $childdata = [
            "name" => $data['child_name'],
            "birthdate" => $data['birth_date_of_child'],
            "customer_id" => $customer->id,
        ];
    
        $child = Chield::create($childdata);
    } elseif ($step == 2) {
        // Find the customer by phone
        $customer = Customer::where('phone', $data['phone'])->first();
        
        // Ensure the customer exists
        if ($customer) {
            // Assuming the validated data is already available in $data
            $otp = $data['otp']; // Access the OTP from the validated data
    
            // Call the verifiedOTP method with the OTP
            $response = $customer->verfiedOTP($otp);
             if( $response===true){
                return $this->success("Validate OTP Success");

            }else{
                return $this->failure("Invalid OTP");

            }
          } else {
            return response()->json(['message' => 'Customer not found.'], 404);
        }
    }
    elseif ($step == 3) {
       dd('omamamaer');
    }
    
    }
    
   
 
}
