<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreFeatureRequest;
use App\Http\Requests\Dashboard\UpdateFeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
    {
        $count_feature = Feature::count(); // Get the count of blogs
  
        $this->authorize('view_packages');

        if ($request->ajax())
            return response(getModelData(model: new Feature()));
        else
            return view('dashboard.features.index',compact('count_feature' ));
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
    public function store(StoreFeatureRequest $request)
    {
        $data = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "Feature"); 

        Feature::create($data);

        return response(["city created successfully"]);
    }

    
    public function update(UpdateFeatureRequest $request, Feature $Feature)
    {
        // Validate the incoming data
        $data = $request->validated();
        
        // If a new image is uploaded, handle it
        if ($request->hasFile('image')) {
            // You can upload the new image and replace the old one, or handle it as needed
            $data['image'] = uploadImageToDirectory($request->file('image'), "Feature");
        }
    
        // Update the Outcome record with the validated data
        $Feature->update($data);
    
        // Return a response indicating the update was successful
        return response(["Feature updated successfully"]);
    }
    

    public function destroy(Feature $Feature)
    {
        $this->authorize('delete_packages');
        $Feature->delete();
        return response(["Feature deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Feature::whereIn('id', $request->selected_items_ids)->delete();
        return response(["Outcome deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Feature::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["Feature restored successfully"]);
    }
}
