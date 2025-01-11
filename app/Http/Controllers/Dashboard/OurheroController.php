<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreHeroesRequest;
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
     * Display the specified resource.
     */
    public function show(Ourhero $ourhero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ourhero $ourhero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ourhero $ourhero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ourhero $ourhero)
    {
        //
    }
}
