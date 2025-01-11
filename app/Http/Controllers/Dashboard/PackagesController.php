<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePackageRequest;
use App\Models\Feature;
use App\Models\Outcome;
use App\Models\Packages;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_packages');
        $features    = Feature::select('id', 'name_ar', 'name_en','image')->get();
        $outcomes    = Outcome::select('id', 'name_ar', 'name_en','image')->get();

        if ($request->ajax()){
            return response(getModelData(model: new Packages()));
        }
        else
            return view('dashboard.packages.index',compact('features','outcomes'));
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
    public function store(StorePackageRequest $request)
    {
        // Validate and retrieve validated data
        $validatedData = $request->validated();
        $validatedData['image'] = uploadImageToDirectory($request->file('image'), "Packages"); 

        
        // Extract specific fields
        $features = $validatedData['features'];
        $outcomes = $validatedData['outcomes'];
    
        // Remove features and outcomes from the main data
        unset($validatedData['features'], $validatedData['outcomes']);
    
        // Create a new package using the remaining validated data
        $package = Packages::create($validatedData);
    
        // Attach features and outcomes to the package
        $package->features()->sync($features);
        $package->outcomes()->sync($outcomes);
    
        // Redirect or respond with success
        return response(["Package created successfully"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Packages $packages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packages $packages)
    {
        //
    }
}
