<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreWhyusRequest;
use App\Http\Requests\Dashboard\UpdatePrtnerRequest;
use App\Http\Requests\Dashboard\UpdateWhyusRequest;
use App\Models\Whyus;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_whyus');
        if ($request->ajax()){
            return response(getModelData(model: new Whyus()));
        }
        else
            return view('dashboard.whyus.index');
    }
 

    
    public function store(StoreWhyusRequest $request)
    {
         $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "Why_us");
        $data['icon'] = uploadImageToDirectory($request->file('icon'), "Why_us");
 
        Whyus::create($data);

        return response(["Why us created successfully"]);
    }

 
 

 
    public function update(UpdateWhyusRequest $request,   $id)
    {
        $whyus=Whyus::find($id);
         // Validate and retrieve the validated data
        $data = $request->validated();
        
        // Handle image file upload (if provided)
        if ($request->hasFile('image')) {
            $data['image'] = uploadImageToDirectory($request->file('image'), "Why_us");
        }
        
        // Handle icon file upload (if provided)
        if ($request->hasFile('icon')) {
            $data['icon'] = uploadImageToDirectory($request->file('icon'), "Why_us");
        }
 
        // Update the Whyus model with validated data
        $whyus->update($data);
    
        // Return a JSON response with a success message and the updated model
        return response()->json([
            'message' => 'Why Us updated successfully',
         ], 200);
    }
    
    

    public function destroy( $Whyus)
    {
         $Whyuss=Whyus::find($Whyus);
        $this->authorize('delete_whyus');
        $Whyuss->delete();
        return response(["Whyus deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
         $this->authorize('delete_whyus');
       $Whyus= Whyus::whereIn('id', $request->selected_items_ids)->delete();
        return response(["selected Whyus deleted successfully"]);
    }
}
