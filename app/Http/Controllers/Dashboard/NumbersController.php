<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCityRequest;
use App\Http\Requests\Dashboard\UpdateCityRequest;
use App\Http\Requests\Dashboard\UpdateNumberRequest;
use App\Models\City;
use App\Models\OurNumber;
use Illuminate\Http\Request;

class NumbersController extends Controller
{
    public function index(Request $request)
    {

        $this->authorize('view_numbers');
        $ourNumber=OurNumber::find(1);

        return view('dashboard.numbers.index',compact('ourNumber'));

    }
    public function update(UpdateNumberRequest $request,  )
    {
        $data = $request->validated();
        $ourNumber=OurNumber::find(1);
        $ourNumber->update($data);

        return response()->json(["message" => "Number updated successfully"], 200);
    }
}
