<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class metatagsInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
  
    
            return $this->success('', [
 
                'meta_home' => setting('metatags.description_home_' . request()->header('Content-language', 'ar')),
                'meta_about_us' => setting('metatags.description_about_us_' . request()->header('Content-language', 'ar')),
                'meta_package' => setting('metatags.description_package_' . request()->header('Content-language', 'ar')),
                'keys' => Tag::pluck('name')->implode(', '),
            ]);
    }
}
