<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreOutcomesRequest;
use App\Models\Outcoume;
use Illuminate\Http\Request;

class OutcoumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     

    public function index(Request $request)
    {
        $count_Outcoume = Outcoume::count(); // Get the count of blogs
  
        $this->authorize('view_packages');

        if ($request->ajax())
            return response(getModelData(model: new Outcoume()));
        else
            return view('dashboard.outcomes.index',compact('count_Outcoume' ));
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

        Outcoume::create($data);

        return response(["outcome created successfully"]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Outcoume $outcoume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outcoume $outcoume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outcoume $outcoume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outcoume $outcoume)
    {
        //
    }
}
