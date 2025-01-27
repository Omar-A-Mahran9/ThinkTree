<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateChieldernRequest;
use App\Models\Chield;
use App\Models\children;
use Illuminate\Http\Request;

class childrenController extends Controller
{
    public function index(Request $request)
    {
 
        if ($request->ajax())
        {
            $data = getModelData(model: new Chield());
            return response()->json($data);
        }

        return view('dashboard.childern.index');
    }

    public function update(UpdateChieldernRequest $request,   $Chield)
    {
         $Chieldern=Chield::find($Chield);
        $data = $request->validated();
        
        if ($request->has('image'))
            $data['image'] = uploadImageToDirectory($request->file('image'), "Chields");
         $Chieldern->update($data);

        return response(["chield updated successfully"]);
    }

 
    
 
}
