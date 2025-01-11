<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreFeatureRequest;
use App\Models\BackageFeature;
use Illuminate\Http\Request;

class BackageFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
    {
        $count_feature = BackageFeature::count(); // Get the count of blogs
  
        $this->authorize('view_packages');

        if ($request->ajax())
            return response(getModelData(model: new BackageFeature()));
        else
            return view('dashboard.features.index',compact('count_feature' ));
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
    public function store(StoreFeatureRequest $request)
    {
        $data = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "Feature"); 

        BackageFeature::create($data);

        return response(["city created successfully"]);
    }
    /**
     * Display the specified resource.
     */
    public function show(BackageFeature $backageFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BackageFeature $backageFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BackageFeature $backageFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BackageFeature $backageFeature)
    {
        //
    }
}
