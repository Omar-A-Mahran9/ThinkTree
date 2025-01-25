<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
 use App\Http\Resources\Api\HeroesResource;
use App\Http\Resources\Api\PackagesResources;
use App\Http\Resources\TimeResource;
use App\Models\Group;
use App\Models\Ourhero;
use App\Models\Packages;
use Illuminate\Http\Request;

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
 
    if (!$package) {
        return $this->error("Package not found", 404);
    }

    return $this->success("", new PackagesResources($package));
}
 

 
function timeslot(Request $request)
{
    // Validate the input data
    $data = $request->validate([
        'package_id' => 'required|integer|exists:packages,id', // Ensure package_id is valid and exists in the database
        'date' => 'required|date', // Ensure date is a valid date and not in the past
    ]);

    // Retrieve the Group based on package_id and matching date
    $group = Group::whereHas('packages', function ($query) use ($request) {
        // Use the relationship with packages and filter by package_id
        $query->where('packages.id', $request->package_id);
    })
    ->whereHas('day', function ($query) use ($request) {
        // Filter by the provided date in the related Day model
        $query->whereDate('date', $request->date);
    })
    ->first(); // Get the first matching group

    // If no matching group is found, return a 404 response
    if (!$group) {
        return $this->success("", []);
    }

    // Retrieve the times associated with the group
    $times = $group->times;

 
    return $this->success("", TimeResource::collection($times));

}


public function footer(){
    return $this->success('', [
     
        'website_name'=> setting('website_name'),
        'website_description'=> setting('description'),
        'logo'=> asset(getImagePathFromDirectory(setting('logo'), 'Settings', "default.svg")),
        'fav_icon'=> asset(getImagePathFromDirectory(setting('fav_icon'), 'Settings', "default.svg")),

        'instagram_link' => setting('instagram_link'),
        'facebook_link' => setting('facebook_link'),
        'whatsapp_number' => setting('whatsapp_number'),
        'sms_number' => setting('sms_number'),
        'email' => setting('email'),
    

]);
}



 
}
