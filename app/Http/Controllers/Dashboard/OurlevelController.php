<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreLevelRequest;
use App\Http\Requests\Dashboard\UpdateLevelRequest;
use App\Models\Ourlevel;
use Illuminate\Http\Request;

class OurlevelController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_ourlevels');
        if ($request->ajax()){
            return response(getModelData(model: new Ourlevel()));
        }
        else
            return view('dashboard.ourlevels.index');
    }
 

    
    public function store(StoreLevelRequest $request)
    {
         $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "levels"); 
        Ourlevel::create($data);

        return response(["Level created successfully"]);
    }

 
    public function update(UpdateLevelRequest $request, Ourlevel $ourlevel)
    {
      
        // Validate the incoming request
        $data = $request->validated();
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Assuming the uploadImageToDirectory function will handle the image upload
            $data['image'] = uploadImageToDirectory($request->file('image'), "levels");
    
            // Optionally delete the old image from storage if it exists
            if ($ourlevel->image) {
                deleteImageFromDirectory($ourlevel->image, "levels");
            }
        }
    
        // Update the existing 'Ourlevel' model with the validated data
        $ourlevel->update($data);
    
        // Return a success response
        return response(["Level updated successfully"], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ourlevel $ourlevel)
    {
        $this->authorize('delete_ourlevels');
        $ourlevel->delete();
        return response(["level deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_ourlevels');
        Ourlevel::whereIn('id', $request->selected_items_ids)->delete();
        return response(["level deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_ourlevels');
        Ourlevel::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["level restored successfully"]);
    }


}
