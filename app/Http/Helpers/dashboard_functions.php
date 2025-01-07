<?php


use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Notifications\NewNotification;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewNotificationDashboard;

if (!function_exists('isArabic')) {
    function isArabic(): bool
    {
        return app()->getLocale() == "ar";
    }
}

if (!function_exists('getDirection')) {

    function getDirection()
    {
        return isArabic() ? "rtl" : 'ltr';
    }
}

if (!function_exists('isDarkMode')) {

    function isDarkMode(): bool
    {
        return session('theme_mode') === "dark";
    }
}

if (!function_exists('uploadImageToDirectory')) {

    function uploadImageToDirectory($imageFile, $model = '')
    {
        $model     = Str::plural($model);
        $model     = Str::ucfirst($model);
        $path      = "/Images/$model";
        $imageName = str_replace(' ', '', 'ThinkTree_' . time() . $imageFile->getClientOriginalName());  // Set Image name
        $imageFile->storeAs($path, $imageName, 'public');
        return $imageName;
    }
}

if (!function_exists('updateModelImage')) {

    function updateModelImage($model, $imageFile, $directory)
    {
        deleteImageFromDirectory($model->image, $directory);
        return uploadImageToDirectory($imageFile, $directory);
    }
}


if (!function_exists('formatNumber')) {
    function formatNumber($number)
    {
        if ($number >= 1000 && $number < 1000000) {
            return number_format($number / 1000, 3);
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 3);
        } else {
            return $number;
        }
    }
}

if (!function_exists('deleteImageFromDirectory')) {

    function deleteImageFromDirectory($imageName, $model)
    {
        $model = Str::plural($model);
        $model = Str::ucfirst($model);

        if ($imageName != 'default.png') {
            $path = "/Images/" . $model . '/' . $imageName;
            Storage::disk('public')->delete($path);
        }
    }
}


if (!function_exists('getImagePathFromDirectory')) {

    function getImagePathFromDirectory($imageName = null, $directory = null, $defaultImage = 'default.svg')
    {
        $directory = Str::plural($directory);
        $directory = Str::ucfirst($directory);

        $imagePath         = "/storage/Images/$directory/$imageName";
        $callbackImagePath = "placeholder_images/$directory/$defaultImage";

        if ($imageName && $directory && file_exists(public_path($imagePath)))
            return asset($imagePath);
        else if (file_exists($callbackImagePath))
            return asset($callbackImagePath);
        else
            return asset("/placeholder_images/$defaultImage");
    }
}


if (!function_exists('isTabActive')) {

    function isTabActive($path)
    {
        if (request()->routeIs($path))
            return 'active';
    }
}


if (!function_exists('isTabOpen')) {

    function isTabOpen($path)
    {

        if (request()->segment(2) === $path)
            return 'menu-item-open';
    }
}


if (!function_exists('getClassIfUrlContains')) {
    function getClassIfUrlContains($class, $word)
    {

        if ($word == "/" && count(request()->segments()) == 1)
            return $class;

        return in_array($word, request()->segments()) ? $class : '';
    }
}


if (!function_exists('abilities')) {
    function abilities()
    {
        if (is_null(cache()->get('abilities'))) {
            $abilities = Cache::remember('abilities', 60, function () {
                return auth('admin')->user()->abilities();
            });
        } else {
            $abilities = cache()->get('abilities');
        }


        return $abilities;
    }
}

if (!function_exists('getFullPathOfImagesFromDirectory')) {
    function getFullPathOfImagesFromDirectory($images, $directory)
    {
        $updatedImages = [];
        foreach ($images as $image) {
            array_push($updatedImages, getImagePathFromDirectory($image, $directory));
        }

        return $updatedImages;
    }
}

if (!function_exists('getRelationWithColumns')) {

    function getRelationWithColumns($relations): array
    {
        $relationsWithColumns = [];

        foreach ($relations as $relation => $columns) {
            array_push($relationsWithColumns, $relation . ":" . implode(",", $columns));
        }

        return $relationsWithColumns;
    }
}

if (!function_exists('getDateRangeArray')) { // takes 'Y-m-d - Y-m-d' and returns [ Y-m-d 00:00:00 , Y-m-d 23:59:59 ]

    function getDateRangeArray($dateRange): array
    {
        $dateRange = explode(' - ', $dateRange);

        return [$dateRange[0] . ' 00:00:00', $dateRange[1] . ' 23:59:59'];
    }
}

if (!function_exists('getModelData')) {

    function getModelData(Model $model, $relations = [], $orsFilters = [], $andsFilters = [], $searchingColumns = null, $onlyTrashed = false): array
    {

        $columns              = $searchingColumns ?? $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
        $relationsWithColumns = getRelationWithColumns($relations); // this fn takes [ brand => [ id , name ] ] then returns : brand:id,name to use it in with clause

        /** Get the request parameters **/
        $params = request()->all();

        // set passed filters from controller if exist
        if (!$onlyTrashed)
            $model = $model->query()->with($relationsWithColumns);
        else
            $model = $model->query()->onlyTrashed()->with($relationsWithColumns);


        /** Get the count before search **/
        $itemsBeforeSearch = $model->count();

        // general search
        if (isset($params['search']['value'])) {

            if (str_starts_with($params['search']['value'], '0'))
                $params['search']['value'] = substr($params['search']['value'], 1);

            /** search in the original table **/
            foreach ($columns as $column)
                array_push($orsFilters, [$column, 'LIKE', "%" . $params['search']['value'] . "%"]);
        }

        // filter search
        if ($itemsBeforeSearch == $model->count()) {

            $searchingKeys = collect($params['columns'])->transform(function ($entry) {

                return $entry['search']['value'] != null && $entry['search']['value'] != 'all' ? Arr::only($entry, ['data', 'name', 'search']) : null; // return just columns which have search values

            })->whereNotNull()->values();


            /** if request has filters like status **/
            if ($searchingKeys->count() > 0) {

                /** search in the original table **/
                foreach ($searchingKeys as $column) {
                    if (!($column['name'] == 'created_at' or $column['name'] == 'date'))
                        array_push($andsFilters, [$column['name'], '=', $column['search']['value']]);
                    else {
                        if (!str_contains($column['search']['value'], ' - ')) // if date isn't range ( single date )
                            $model->orWhereDate($column['name'], $column['search']['value']);
                        else
                            $model->orWhereBetween($column['name'], getDateRangeArray($column['search']['value']));
                    }
                }
            }
        }

        $model = $model->where(function ($query) use ($orsFilters) {
            foreach ($orsFilters as $filter)
                $query->orWhere([$filter]);
        });

        if ($andsFilters)
            $model->where($andsFilters);

        if (isset($params['order'][0])) {
            $model->orderBy($params['columns'][$params['order'][0]['column']]['data'], $params['order'][0]['dir']);
        }

        $response = [
            "recordsTotal" => $model->count(),
            "recordsFiltered" => $model->count(),
            'data' => $model->skip($params['start'])->take($params['length'])->get()
        ];

        return $response;
    }
}

/**
 * push firebase notification .
 * Author : Khaled
 * created By Khaled @ 15-06-2021
 */
if (!function_exists('storeAndPushNotification')) {
    function storeAndPushNotification($title, $description, $icon, $color, $url)
    {
        /** add notification to first Admin **/
        $date         = \Carbon\Carbon::now()->diffForHumans();
        $notification = new NewNotification($title, $description, $date, $icon, $color, $url);
        $admin        = Admin::first();
        $admin->notify($notification);

        /** push notifications to all admins **/
        $firebaseToken  = Admin::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = "AAAAdaClkUc:APA91bFvu0zGXOeq2_lBLwoHBUGH37Bdk_zBjh8Dg__55nmsWRtwk_njpEzCLc29Ik5S2KHW34vxNiQb2RcihiEJXZVPh8A3FPawZPxVH_MDf06x06VzBPXEt7iKhTur4tbzzg_RD_8H";

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "alert_title" => $title,
                "title" => $title,
                "description" => $description,
                "body" => $description,
                "date" => $date,
                "alert_icon" => $icon,
                "icon" => asset(getImagePathFromDirectory(setting('fav_icon'), 'Settings')),
                "icon_color" => $color,
                "url" => $url,
                "id" => $admin->notifications->last()->id,
            ],
            "webpush" => [
                "fcm_options" => [
                    "link" => $url
                ]
            ]
        ];

        $response = Http::withHeaders([
            "Authorization" => "key=$SERVER_API_KEY",
        ])->post('https://fcm.googleapis.com/fcm/send', $data);

        return $response;
    }
}

if (!function_exists('sendFirebaseNotification')) {
    function sendFirebaseNotification($notificationBody, $type, $token = null, $tokens = [])
    {
        $SERVER_API_KEY = "AAAAdaClkUc:APA91bFvu0zGXOeq2_lBLwoHBUGH37Bdk_zBjh8Dg__55nmsWRtwk_njpEzCLc29Ik5S2KHW34vxNiQb2RcihiEJXZVPh8A3FPawZPxVH_MDf06x06VzBPXEt7iKhTur4tbzzg_RD_8H";

        $data = [
            "notification" => [
                "title" => 'Twelve',
                "body" => $notificationBody,
                "sound" => "default"
            ],
            'data' => [
                "action" => $type
            ],
        ];

        if ($token == null)
            $data['registration_ids'] = $tokens;
        else
            $data['to'] = $token;

        Http::withHeaders([
            'Authorization' => 'key=' . $SERVER_API_KEY,
            'Content-Type' => 'application/json'
        ])->post('https://fcm.googleapis.com/fcm/send', $data);
    }
}

if (!function_exists('storeAndPushNotificationAdmin')) {

    function storeAndPushNotificationAdmin($isAdmin, $titleAr, $titleEn, $descriptionAr, $descriptionEn, $icon, $color, $url, $vendors = null, $ability = null)
    {
        /** add notification to first Admin **/
        $date         = \Carbon\Carbon::now()->diffForHumans();
        $notification = new NewNotificationDashboard($titleAr, $titleEn, $descriptionAr, $descriptionEn, $date, $icon, $color, $url);
        if ($isAdmin == 1) {
            if ($ability) {
                $admins       = Admin::whereHas('roles.abilities', function ($query) use ($ability) {
                    $query->where('category', $ability);
                })->get();
            } else {
                $admins       = Admin::whereHas('roles', function ($query) {
                    $query->where('id', 1);
                })->get();
            }

            foreach ($admins as $admin) {
                $admin->notify($notification);
            }
        }
        if ($isAdmin == 0) {
            $vendors = Vendor::whereIn('id', $vendors)->get();
            foreach ($vendors as $vendor) {
                $vendor->notify($notification);
            }
        }

        /** push notifications to all admins **/
        $firebaseToken  = Admin::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = "AAAAbJigBxA:APA91bGEFXY9LQAOXAxOQGWaujUO_Wbm6zFf0794ROrbzf3ebjKr-l4uS6MnQIrRe4q4hTTJJx6DjR8kSkXTHHp86iXfiwI_FezdpznCLBlhJMUaMtCqE8rIC3nPv_UHarHqpVw7OpnQ";

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "alert_title" => app()->isLocale('ar') ? $titleAr : $titleEn,
                "title_ar" => $titleAr,
                "title_en" => $titleEn,
                "description_ar" => $descriptionAr,
                "description_en" => $descriptionEn,
                "date" => $date,
                "alert_icon" => $icon,
                "icon" => asset(getImagePathFromDirectory(setting('fav_icon'), 'Settings')),
                "icon_color" => $color,
                "url" => $url,
                // "id" => $admin->notifications->last()->id,
            ],
            "webpush" => [
                "fcm_options" => [
                    "link" => $url
                ]
            ]
        ];

        $response = Http::withHeaders([
            "Authorization" => "key=$SERVER_API_KEY",
        ])->post('https://fcm.googleapis.com/fcm/send', $data);

        return $response;
    }
}
if (!function_exists('generateRandomCode')) {
    function generateRandomCode($length)
    {
        $allCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $allCharacters[rand(0, strlen($allCharacters) - 1)];
        }

        return $code;
    }
}

if (!function_exists('currentCurrency')) {
    function currentCurrency()
    {
        return session('currency_code') ?? config('app.currency_code');
    }
}

if (!function_exists('getCurrencyTransferAmount')) {
    function getCurrencyTransferAmount()
    {
        $currency_name   = Cache::get('currency_name');
        $currency_amount = Cache::get('currency_amount');

        if ($currency_name != currentCurrency()) {
            cache()->forget('currency_name');
            cache()->forget('currency_amount');

            // Fetching JSON
            $req_url       = 'https://api.exchangerate-api.com/v4/latest/USD';
            $response_json = file_get_contents($req_url);

            if (false !== $response_json) {

                // Try/catch for json_decode operation
                try {

                    // Decoding
                    $response_object = json_decode($response_json);

                    // YOUR APPLICATION CODE HERE, e.g.
                    $currency               = currentCurrency();
                    $currencyTransferAmount = round(($response_object->rates->$currency), 2);
                    Cache::put('currency_name', $currency);
                    Cache::put('currency_amount', $currencyTransferAmount);

                    return $currencyTransferAmount;
                } catch (Exception $e) {
                    // Handle JSON parse error...
                }
            }
        }

        return $currency_amount;
    }
}

if (!function_exists('priceAfterTransfer')) {
    function priceAfterTransfer($price)
    {
        $base_price  = $price;
        $final_price = round(($base_price * getCurrencyTransferAmount()), 2);

        return $final_price;
    }
}

if (!function_exists('checkIfProviderAllowQuantity')) {
    function checkIfProviderAllowQuantity($provider, $type)
    {
        if ($provider == 'unipin' && $type == 'voucher') {
            return true;
        }

        return false;
    }
}
