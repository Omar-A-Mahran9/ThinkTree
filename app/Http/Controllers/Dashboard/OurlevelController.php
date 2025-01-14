<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreLevelRequest;
use App\Models\Ourlevel;
use Illuminate\Http\Request;

class OurlevelController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_ourlevels');
        if ($request->ajax()){
            return response(getModelData(model: new Ourlevel()));
        }
        else
            return view('dashboard.ourlevels.index');
    }
 

    
    public function store(StoreLevelRequest $request)
    {
        dd($request);
         $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "levels"); 
        Ourlevel::create($data);

        return response(["Level created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ourlevel $ourlevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ourlevel $ourlevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ourlevel $ourlevel)
    {
        dd("omar");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ourlevel $ourlevel)
    {
        $this->authorize('delete_ourlevels');
        $ourlevel->delete();
        return response(["level deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_ourlevels');
        Ourlevel::whereIn('id', $request->selected_items_ids)->delete();
        return response(["level deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_ourlevels');
        Ourlevel::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["level restored successfully"]);
    }


}
