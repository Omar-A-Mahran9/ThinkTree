<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
 
use App\Http\Resources\Api\HeroesResource;
use App\Http\Resources\Api\OurlevelResources;
 use App\Http\Resources\Api\PackagesResources;
 
use App\Http\Resources\Api\RateResource;
use App\Http\Resources\Api\SkillsResources;
use App\Http\Resources\Api\VissionsResources;
use App\Http\Resources\Api\whyusResources;
 
use App\Models\customers_rates;
 use App\Models\Ourhero;
use App\Models\Ourlevel;
 use App\Models\Packages;
use App\Models\Skill;
use App\Models\Trip;
use App\Models\Vision;
use App\Models\Whyus;
use Illuminate\Http\Request;

class AboutusInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $skills = Skill::select('id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'image')
        ->orderBy('id', 'ASC') // Replace 'id' with the column you want to sort by
        ->limit(10)
        ->get();

        $visions = Vision::select('id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'image')
        ->orderBy('id', 'ASC') // Replace 'id' with the column you want to sort by
        ->limit(10)
        ->get();

        $TripChild = Trip::select('id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'image','icon' )
        ->limit(10)
        ->get();
 
    
            return $this->success('', [
         
                "TripChild"=>whyusResources::collection($TripChild),
                "skills"=>SkillsResources::collection($skills),
                "visions"=>VissionsResources::collection($visions),
   
 
        ]);
    }
}
