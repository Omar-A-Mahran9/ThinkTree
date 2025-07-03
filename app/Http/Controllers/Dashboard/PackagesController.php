<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePackageRequest;
use App\Http\Requests\Dashboard\UpdatePackageRequest;
use App\Models\Currency;
use App\Models\Feature;
use App\Models\Group;
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
        $groups    = Group::select('id', 'name_ar', 'name_en')->get();
    $currencies = Currency::all(); // <-- add this

        if ($request->ajax()){
            return response(getModelData(model: new Packages(), relations: ['features' => ['id', 'name_ar', 'name_en','created_at'],'outcomes' => ['id', 'name_ar', 'name_en','created_at'],'groups' => ['id', 'name_ar', 'name_en','created_at']]));
        }
        else
            return view('dashboard.packages.index',compact('features','outcomes','groups','currencies'));
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
        $groups = $validatedData['groups'];

        // Remove features and outcomes from the main data
        unset($validatedData['features'], $validatedData['outcomes'], $validatedData['groups']);

        // Create a new package using the remaining validated data
        $package = Packages::create($validatedData);

        // Attach features and outcomes to the package
        $package->features()->sync($features);
        $package->outcomes()->sync($outcomes);
        $package->groups()->sync($groups);

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
    $groups = $validatedData['groups']?? [];

    // Remove features and outcomes from the main data
    unset($validatedData['features'], $validatedData['outcomes'], $validatedData['groups']);

    // Update the package using the remaining validated data
    $packages->update($validatedData);

    // Sync features and outcomes with the package
    $packages->features()->sync($features);
    $packages->outcomes()->sync($outcomes);
    $packages->groups()->sync($groups);

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
    $package->groups()->detach();

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
