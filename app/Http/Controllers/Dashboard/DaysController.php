<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreDayRequest;
use App\Http\Requests\Dashboard\StoreFeatureRequest;
use App\Http\Requests\Dashboard\UpdateDayRequest;
use App\Http\Requests\Dashboard\UpdateFeatureRequest;
use App\Models\Day;
use App\Models\Feature;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
    {
        $count_days = Day::count(); // Get the count of blogs
  
        $this->authorize('view_packages');

        if ($request->ajax())
            return response(getModelData(model: new Day()));
        else
            return view('dashboard.days.index',compact('count_days' ));
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
    public function store(StoreDayRequest $request)
    {
        $data = $request->validated();
 
        Day::create($data);

        return response(["Day created successfully"]);
    }

    
    public function update(UpdateDayRequest $request, Day $day)
    {
        // Validate the incoming data
        $data = $request->validated();
        
        // Update the Outcome record with the validated data
        $day->update($data);
    
        // Return a response indicating the update was successful
        return response(["Day updated successfully"]);
    }
    

    public function destroy( Day $day)
    {
        $this->authorize('delete_packages');
        $day->delete();
        return response(["Day deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Day::whereIn('id', $request->selected_items_ids)->delete();
        return response(["Day deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Day::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["Day restored successfully"]);
    }
}
