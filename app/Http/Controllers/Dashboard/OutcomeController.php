<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreOutcomesRequest;
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
    /**
     * Display the specified resource.
     */
    public function show(Outcome $Outcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outcome $Outcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outcome $Outcome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outcome $Outcome)
    {
        //
    }
}
