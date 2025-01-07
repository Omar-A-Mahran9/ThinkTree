<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCityRequest;
use App\Http\Requests\Dashboard\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $count_cities = City::count(); // Get the count of blogs
  
        $this->authorize('view_cities');

        if ($request->ajax())
            return response(getModelData(model: new City()));
        else
            return view('dashboard.cities.index',compact('count_cities' ));
    }

    public function store(StoreCityRequest $request)
    {
        $data = $request->validated();
        City::create($data);

        return response(["city created successfully"]);
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);

        return response(["city updated successfully"]);
    }

    public function destroy(City $city)
    {
        $this->authorize('delete_cities');

        $city->delete();

        return response(["city deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_cities');

        City::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected cities deleted successfully"]);
    }
    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_cities');

        City::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["selected cities restored successfully"]);
    }
}
