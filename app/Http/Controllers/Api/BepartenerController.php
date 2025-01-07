<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreBepartenerRequest;
use App\Models\Bepartener;
use App\Models\PaymentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeWhyUsController extends Controller
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
    public function store(StoreBepartenerRequest $request, $step = null)
    {
        if ($step == 2) {
            // Begin a database transaction
            return DB::transaction(function () use ($request) {
                // Get all data from the request and remove unnecessary fields
                $allData = $request->except(['city_ids', 'BIC_Swift', 'bank_owner_name', 'iban_number', 'address']);
                $cityIds = $request->input('city_ids', []);
    
                // Handle BIC/Swift separately as we need to store it
                $allData['BIC/Swift'] = $request->input('BIC_Swift');
    
                // Handle the bank-related data
                $databankonly = $request->only(['bank_owner_name', 'iban_number', 'address', 'BIC/Swift']);
    
                // Process images if any are uploaded
                $this->uploadImages($request, $allData);
    
                // Create bank record
                $bank = PaymentData::create($databankonly);
                unset($allData['BIC/Swift']);
    
                // Prepare the final data for partner creation
                $allData['payment_data_id'] = $bank->id;
    
                // Create the Bepartener record
                $partener = Bepartener::create($allData);
    
                // Attach cities if they are provided and valid
                if (!empty($cityIds) && is_array($cityIds)) {
                    // Ensure the cityIds are a flat array of integers
                    $cityIds = array_map('intval', $cityIds);
                    $partener->cities()->attach($cityIds);
                }
    
                // Commit the transaction and return success response
                return $this->success('Partner created successfully', $allData);
            });
        }
    
        // Return success for step 1
        return $this->success('Step created successfully');
    }
    
    
    // Helper function to upload images
    private function uploadImages($request, &$allData)
    {
        $images = ['Id_image', 'Personal_image', 'License_image', 'car_paper_image'];
    
        foreach ($images as $imageField) {
            if ($request->hasFile($imageField)) {
                // Upload each image and store its relative path
                $allData[$imageField] = uploadImageToDirectory($request->file($imageField), "Parteners");
            }
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Bepartener $bepartener)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bepartener $bepartener)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bepartener $bepartener)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bepartener $bepartener)
    {
        //
    }
}
