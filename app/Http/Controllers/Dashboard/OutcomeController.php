<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreOutcomesRequest;
use App\Http\Requests\Dashboard\UpdateOutcomesRequest;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
 

    public function index(Request $request)
    {
        $count_Outcome = Outcome::count(); // Get the count of blogs
  
        $this->authorize('view_packages');

        if ($request->ajax())
            return response(getModelData(model: new Outcome()));
        else
            return view('dashboard.outcomes.index',compact('count_Outcome' ));
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
    public function store(StoreOutcomesRequest $request)
    {
        
        $data = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "Outcomes"); 

        Outcome::create($data);

        return response(["outcome created successfully"]);
    }
 
    public function update(UpdateOutcomesRequest $request, Outcome $Outcome)
    {
        // Validate the incoming data
        $data = $request->validated();
        
        // If a new image is uploaded, handle it
        if ($request->hasFile('image')) {
            // You can upload the new image and replace the old one, or handle it as needed
            $data['image'] = uploadImageToDirectory($request->file('image'), "Outcomes");
        }
    
        // Update the Outcome record with the validated data
        $Outcome->update($data);
    
        // Return a response indicating the update was successful
        return response(["Outcome updated successfully"]);
    }
    

    public function destroy(Outcome $Outcome)
    {
        $this->authorize('delete_packages');
        $Outcome->delete();
        return response(["Outcome deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Outcome::whereIn('id', $request->selected_items_ids)->delete();
        return response(["Outcome deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Outcome::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["Outcome restored successfully"]);
    }
}
