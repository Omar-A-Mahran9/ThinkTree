<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreBepartenerRequest;
use App\Http\Resources\Api\HeroesResource;
use App\Models\Bepartener;
use App\Models\Ourhero;
use App\Models\PaymentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataController extends Controller
{

    function ourheroes(){
        $ourheroes = Ourhero::with('city')->select('id', 'name_ar', 'name_en', 'image', 'age', 'city_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);  // Ensure pagination is applied

        return $this->successWithPagination("", HeroesResource::collection($ourheroes)->response()->getData(true));
}
 
}
