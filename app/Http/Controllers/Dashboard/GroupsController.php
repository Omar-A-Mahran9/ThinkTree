<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePackageRequest;
use App\Http\Requests\Dashboard\UpdatePackageRequest;
use App\Models\Day;
use App\Models\Feature;
use App\Models\Group;
use App\Models\Outcome;
use App\Models\Packages;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_packages');
        $times    = Time::select('id', 'from', 'from')->get();
        $days    = Day::select('id', 'name_ar', 'name_en')->get();

        if ($request->ajax()){
            return response(getModelData(model: new Group(), relations: ['days' => ['id', 'name_ar', 'name_en','created_at'],'times' => ['id', 'from', 'from','created_at']]));
        }
        else
            return view('dashboard.groups.index',compact('times','days'));
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
 * Update the specified resource in storage.
 */
public function update(UpdatePackageRequest $request, $id)
{
    $packages =Packages::find($id);
     // Validate and retrieve validated data
    $validatedData = $request->validated();

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image if needed
        if ($packages->image) {
            deleteImageFromDirectory($packages->image, "Packages"); // Implement this helper to remove the old image
        }

        // Upload the new image
        $validatedData['image'] = uploadImageToDirectory($request->file('image'), "Packages");
    }

    // Extract specific fields
    $features = $validatedData['features'] ?? [];
    $outcomes = $validatedData['outcomes'] ?? [];

    // Remove features and outcomes from the main data
    unset($validatedData['features'], $validatedData['outcomes']);

    // Update the package using the remaining validated data
    $packages->update($validatedData);

    // Sync features and outcomes with the package
    $packages->features()->sync($features);
    $packages->outcomes()->sync($outcomes);

    // Redirect or respond with success
    return response(["Package updated successfully"], 200);
}

public function destroy($id)
{
    // Find the package by its ID
    $package = Packages::find($id);

    // Check if the package exists
    if (!$package) {
        return response(["Package not found"], 404);
    }

    // Delete related features and outcomes (if any)
    $package->features()->detach();
    $package->outcomes()->detach();

    // Handle image deletion if the package has an associated image
    if ($package->image) {
        deleteImageFromDirectory($package->image, "Packages");
    }

    // Delete the package
    $package->delete();

    // Return success response
    return response(["Package deleted successfully"], 200);
}

        
}
