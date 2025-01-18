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
    
   
            return $this->success("Step 1 success");
        } elseif ($step == 2) {
            // Validate OTP
            $customer = Customer::where('phone', $data['phone'])->first();
    
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

    
            // Handle optional duration selection
            if ($data['Choose_duration_later'] === 1) {
                $data['package_id'] = null;
                $data['group_id'] = null;
                $data['time_id'] = null;
                $data['day_id'] = null;
            }

                 $data['customer_id'] = $customer->id;

                 $data['chield_id'] = $lastChild->id;

                 unset($data['email'], $data['phone']);
 
            $order = Order::create($data);
       
            return $this->success("Step 3 success");
        }
    }
    
    
   
 
}
