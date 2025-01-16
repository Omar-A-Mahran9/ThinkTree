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
        // Get the validated data as an array
        $data = $request->validated();
    
        // If $data is an array, use array syntax instead of object syntax
        $nameParts = explode(' ', $data['name'], 2); // Split into two parts by the first space
        $firstName = $nameParts[0]; // The first part of the name
        $lastName = isset($nameParts[1]) ? $nameParts[1] : ''; // The second part, if exists
        
        $customer = Customer::where('email', $data['email'])
        ->orWhere('phone', $data['phone'])
        ->first();
        $customer->sendOTP();
        
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
    }
    
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
