<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
 
use App\Http\Resources\Api\HeroesResource;
use App\Http\Resources\Api\OurlevelResources;
 use App\Http\Resources\Api\PackagesResources;
 
use App\Http\Resources\Api\RateResource;
 
use App\Http\Resources\Api\whyusResources;
 
use App\Models\customers_rates;
 use App\Models\Ourhero;
use App\Models\Ourlevel;
 use App\Models\Packages;
 
use App\Models\Whyus;
use Illuminate\Http\Request;

class TestInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
 

    
            return $this->success('', [
                 
                'Test_link' => setting('available_test') == 1 ? setting('test_link') : null,

        ]);
    }
}
