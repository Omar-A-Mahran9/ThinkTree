<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\blogs;
use App\Models\Chield;
use App\Models\Customer;
use App\Models\customers_rates;
use Illuminate\Http\Request;

class CustomersRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_customersRate');

        $childes = Chield::get(); // Get the count of blogs

         $count_customerRate = customers_rates::count(); // Get the count of blogs
         $visited_site=10000;
         if ($request->ajax()){
         $data = getModelData(model: new customers_rates(), relations: ['child' => ['id', 'name']]);

            return response($data);
         }
        else
            return view('dashboard.customerRate.index',compact('count_customerRate','visited_site','childes'));
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
    public function store(Request $request)
    {
        $this->authorize('update_customersRate');

        $data = $request->validate([
            'child_id' => 'required|exists:chields,id', // Validating customer_id to be unique
            'rate'         => 'required|numeric', // Validating rate
            'status'       => 'required|in:pending,reject,approve', // Validating status
            'comment'       => 'required', // Validating status

        ]);

        $brand = customers_rates::create($data);

        return response(["blog created successfully"]);
    }
    /**
     * Display the specified resource.
     */
    public function show(customers_rates $customers_rates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customers_rates $customers_rates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customers_rates $customers_rates)
    {
        //
    }



    public function destroy(customers_rates $customers_rates)
    {
        $this->authorize('delete_customersRate');

        $customers_rates->delete();
        return response(["customers_rates deleted successfully"]);
    }
}
