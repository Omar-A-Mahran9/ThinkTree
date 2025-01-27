<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreTripRequest;
use App\Http\Requests\Dashboard\UpdateWhyusRequest;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_children_trip');
        if ($request->ajax()){
            return response(getModelData(model: new Trip()));
        }
        else
            return view('dashboard.trip.index');
    }
 

    
    public function store(StoreTripRequest $request)
    {
        $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "trips");
        $data['icon'] = uploadImageToDirectory($request->file('icon'), "trips");
 
        Trip::create($data);

        return response(["Trip created successfully"]);
    }

 
 

 
    public function update(UpdateWhyusRequest $request,   $id)
    {
        $Trip=Trip::find($id);
         // Validate and retrieve the validated data
        $data = $request->validated();
        
        // Handle image file upload (if provided)
        if ($request->hasFile('image')) {
            $data['image'] = uploadImageToDirectory($request->file('image'), "trips");
        }
        
        // Handle icon file upload (if provided)
        if ($request->hasFile('icon')) {
            $data['icon'] = uploadImageToDirectory($request->file('icon'), "trips");
        }
 
        // Update the Whyus model with validated data
        $Trip->update($data);
    
        // Return a JSON response with a success message and the updated model
        return response()->json([
            'message' => 'Trip updated successfully',
         ], 200);
    }
    
    

    public function destroy( $children_trip)
    {
         $Trip=Trip::find($children_trip);
        $this->authorize('delete_children_trip');
        $Trip->delete();
        return response(["Trip deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
         $this->authorize('delete_children_trip');
       $Trip= Trip::whereIn('id', $request->selected_items_ids)->delete();
        return response(["selected Trip deleted successfully"]);
    }
}
