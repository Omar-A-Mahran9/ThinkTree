<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreWhyusRequest;
use App\Http\Requests\Dashboard\UpdatePrtnerRequest;
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

 
 

 
    /**
     * Update the specified resource in storage.
     */
 
     public function update(UpdatePrtnerRequest $request, partener $partener)
     {
         $data = $request->validated();
         $partener = request()->route('partner');

             $partenerData=partener::find($partener);

         if ($request->has('image'))
             $data['image'] = uploadImageToDirectory($request->file('image'), "Why us");
 
         $partenerData->update($data);
 
         return response(["partner updated successfully"]);
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
