<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreVisionRequest;
use App\Http\Requests\Dashboard\UpdateVisionRequest;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_vision');
        if ($request->ajax()){
            return response(getModelData(model: new Vision()));
        }
        else
            return view('dashboard.visions.index');
    }
 

    
    public function store(StoreVisionRequest $request)
    {
         $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "Vision"); 
        Vision::create($data);

        return response(["vision created successfully"]);
    }

 
    public function update(UpdateVisionRequest $request, Vision $vision)
    {
      
        // Validate the incoming request
        $data = $request->validated();
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Assuming the uploadImageToDirectory function will handle the image upload
            $data['image'] = uploadImageToDirectory($request->file('image'), "Vision");
    
            // Optionally delete the old image from storage if it exists
            if ($vision->image) {
                deleteImageFromDirectory($vision->image, "Vision");
            }
        }
    
        // Update the existing 'vision' model with the validated data
        $vision->update($data);
    
        // Return a success response
        return response(["vision updated successfully"], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vision $vision)
    {
        $this->authorize('delete_vision');
        $vision->delete();
        return response(["vision deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_vision');
        Vision::whereIn('id', $request->selected_items_ids)->delete();
        return response(["vision deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_vision');
        Vision::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["vision restored successfully"]);
    }


}