<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
 use App\Http\Resources\Api\HeroesResource;
use App\Http\Resources\Api\PackagesResources;
 use App\Models\Ourhero;
use App\Models\Packages;
 

class dataController extends Controller
{

    function ourheroes(){
        $ourheroes = Ourhero::with('city')->select('id', 'name_ar', 'name_en', 'image', 'age', 'city_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);  // Ensure pagination is applied

        return $this->successWithPagination("", HeroesResource::collection($ourheroes)->response()->getData(true));
}
function packages(){
    $packages = Packages::where('available', 1) // Ensures only rows where available = 1 are selected
    ->orderBy('id', 'ASC') // Orders the results by the 'id' column in ascending order
     ->paginate(3);  // Ensure pagination is applied
 

    return $this->successWithPagination("", PackagesResources::collection($packages)->response()->getData(true));
}
function package($id){
    $package = Packages::find($id); // Get a single record by ID
    dd($package);

    if (!$package) {
        return $this->error("Package not found", 404);
    }

    return $this->success("", new PackagesResources($package));
}
 
}
