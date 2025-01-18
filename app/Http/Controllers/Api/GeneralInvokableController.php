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

class GeneralInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ourheroes = Ourhero::with('city')->select('id', 'name_ar', 'name_en', 'image', 'age', 'city_id')
        ->limit(10)
        ->get();

        $whyus = Whyus::select('id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'image','icon' )
        ->limit(10)
        ->get();

        $levels = Ourlevel::select('id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'image')
        ->orderBy('id', 'ASC') // Replace 'id' with the column you want to sort by
        ->limit(10)
        ->get();

        $packages = Packages::where('available', 1) // Ensures only rows where available = 1 are selected
        ->orderBy('id', 'ASC') // Orders the results by the 'id' column in ascending order
        ->limit(3) // Limits the results to 3 rows
        ->get();
        $rate = customers_rates::with(['customer.chields']) // Eager load customer and their chields
        ->select('id', 'customer_id', 'comment', 'rate', 'status')
        ->where('status', 'approve')
        ->get();

    
            return $this->success('', [
                "herosection"=>[
                'image'=> asset(getImagePathFromDirectory(setting('herosection_image'), 'Settings', "default.svg")),
                'title' => setting('landing_page.main_section_title_' . request()->header('Content-language', 'ar')),
                'description' => setting('landing_page.main_section_description_' . request()->header('Content-language', 'ar')),
 
                ],
                "ourheroes"=>HeroesResource::collection($ourheroes),
                "whythinktree"=>whyusResources::collection($whyus),
                "Ourlevel"=>OurlevelResources::collection($levels),
                "Packages"=>PackagesResources::collection($packages),

                'Customer_rate' => RateResource::collection( $rate),

                "Certificate Image"=> asset(getImagePathFromDirectory(setting('certificate_image'), 'Settings', "default.svg")),
                'instagram_link' => setting('instagram_link'),
                'privacy_policy' => setting('privacy_policy_' . request()->header('Content-language')),
                'facebook_link' => setting('facebook_link'),
                'snapchat' => setting('linkedin_link'),
                'youtube_link' => setting('youtube_link'),
                'tiktok_link' =>  setting('tiktok_link'),
                'twitter_link' => setting('twitter_link'),
                'whatsapp_number' => setting('whatsapp_number'),
                'sms_number' => setting('sms_number'),
                'email' => setting('email'),
                'address_ar' => setting('address_ar'),
                'address_en' => setting('address_en'),
                'whatsapp_message_time' => setting('delay_time_seconds'),
                'whatsapp_message' => setting('whatsapp_message'),
                'whatsapp_show' => setting('whatsapp_notification_enabled'),
                'about_us' => [
                    'label' => setting('label_' . request()->header('Content-language')),
                    'description' => setting('about_us_' . request()->header('Content-language')),
                    'video' => setting('youtube_link')

                ],
                'terms_and_condition' => setting('terms_' . request()->header('Content-language')),
                'return_policy' => setting('return_policy_' . request()->header('Content-language')),
                'loyality' => setting('loyality_' . request()->header('Content-language')),

                'tax' => (setting('tax') / 100),

        ]);
    }
}
