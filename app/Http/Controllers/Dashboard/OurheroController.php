<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreHeroesRequest;
use App\Http\Requests\Dashboard\UpdateHeroesRequest;
use App\Models\City;
use App\Models\Ourhero;
use Illuminate\Http\Request;

class OurheroController extends Controller
{
 
    public function index(Request $request)
    {
        $this->authorize('view_ourheroes');
        if ($request->ajax()){
            return response(getModelData(model: new Ourhero()));
        }
        else
        $cities    = City::select('id', 'name_ar', 'name_en','image')->get();
 
             return view('dashboard.ourheroes.index', compact('cities' ));
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
    public function store(StoreHeroesRequest $request)
    {
        $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "heroes"); 
        Ourhero::create($data);

        return response(["Hero created successfully"]);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeroesRequest $request, Ourhero $ourhero)
    {
        // Validate the incoming request
        $data = $request->validated();
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Upload the new image
            $data['image'] = uploadImageToDirectory($request->file('image'), "heroes");
    
            // Optionally, delete the old image from storage if it exists
            if ($ourhero->image) {
                deleteImageFromDirectory($ourhero->image, "heroes");
            }
        }
    
        // Update the existing 'Ourhero' model with the validated data
        $ourhero->update($data);
    
        // Return a success response
        return response(["Hero updated successfully"], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ourhero $Ourhero)
    {
        $this->authorize('delete_ourheroes');
        $Ourhero->delete();
        return response(["Ourhero deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_ourheroes');
        Ourhero::whereIn('id', $request->selected_items_ids)->delete();
        return response(["Ourhero deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_ourheroes');
        Ourhero::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["Ourhero restored successfully"]);
    }
}
