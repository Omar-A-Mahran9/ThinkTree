<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreDayRequest;
use App\Http\Requests\Dashboard\StoreTimeRequest;
use App\Http\Requests\Dashboard\UpdateDayRequest;
use App\Http\Requests\Dashboard\UpdateTimeRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
    {
        $count_times = Time::count(); // Get the count of blogs
  
        $this->authorize('view_packages');

        if ($request->ajax())
            return response(getModelData(model: new Time()));
        else
            return view('dashboard.times.index',compact('count_times' ));
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
    public function store(StoreTimeRequest $request)
    {
        $data = $request->validated();
 
        Time::create($data);

        return response(["time created successfully"]);
    }

    
    public function update(UpdateTimeRequest $request, Time $time)
    {
        // Validate the incoming data
        $data = $request->validated();
        
        // Update the Outcome record with the validated data
        $time->update($data);
    
        // Return a response indicating the update was successful
        return response(["time updated successfully"]);
    }
    

    public function destroy( Time $Time)
    {
        $this->authorize('delete_packages');
        $Time->delete();
        return response(["Time deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Time::whereIn('id', $request->selected_items_ids)->delete();
        return response(["Time deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_packages');
        Time::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["Time restored successfully"]);
    }
}
