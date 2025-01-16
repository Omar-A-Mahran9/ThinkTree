<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreGroupRequest;
use App\Http\Requests\Dashboard\UpdateGroupRequest;
use App\Http\Requests\Dashboard\UpdatePackageRequest;
use App\Models\Day;
 use App\Models\Group;
 use App\Models\Packages;
use App\Models\Time;
use Illuminate\Http\Request;
 
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_packages');
        $times    = Time::select('id', 'from', 'to')->get();
        $days    = Day::select('id', 'name_ar', 'name_en')->get();

        if ($request->ajax()){
            return response(getModelData(model: new Group(), relations: ['day' => ['id', 'name_ar', 'name_en','created_at'],'times' => ['id', 'from', 'from','created_at']]));
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
    public function store(StoreGroupRequest $request)
    {
        // Validate and retrieve validated data
        $validatedData = $request->validated();
         // Extract specific fields
         $times = $validatedData['time_ids'];
    
        // Remove features and outcomes from the main data
        unset($validatedData['time_ids']);
    
        // Create a new package using the remaining validated data
        $group = Group::create($validatedData);
    
        // Attach features and outcomes to the package
         $group->times()->sync($times);
    
        // Redirect or respond with success
        return response(["Group created successfully"]);

    }

 
/**
 * Update the specified resource in storage.
 */
public function update(UpdateGroupRequest $request, $id)
{
    $group =Group::find($id);
     // Validate and retrieve validated data
    $validatedData = $request->validated();
 

     // Extract specific fields
     $times = $validatedData['time_ids'];
    
     // Remove features and outcomes from the main data
     unset($validatedData['time_ids']);
 
    // Update the package using the remaining validated data
    $group->update($validatedData);

    // Sync features and outcomes with the package
    $group->times()->sync($times);
 
    // Redirect or respond with success
    return response(["Group updated successfully"], 200);
}

public function destroy($id)
{
    // Find the package by its ID
    $group = Group::find($id);

    // Check if the package exists
    if (!$group) {
        return response(["group not found"], 404);
    }

    // Delete related features and outcomes (if any)
    $group->times()->detach();
 
 
    // Delete the package
    $group->delete();

    // Return success response
    return response(["group deleted successfully"], 200);
}

        
}
