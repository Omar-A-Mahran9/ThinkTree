<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Requests\Dashboard\UpdateSettingsRequest;
use App\Models\GiftCard;

class SettingController extends Controller
{
    public function changeThemeMode(Request $request)
    {
        session()->put('theme_mode', $request->mode);
        return redirect()->back();
    }

    public function changeLanguage(Request $request)
    {
        session()->put('locale', $request->lang);
        return redirect()->back();
    }

    public function main(UpdateSettingsRequest $request)
    {
        if (request()->isMethod('post')) {
            $data = $request->validated();

            if ($request->hasFile('logo')) {
                deleteImageFromDirectory(setting('logo'), "Settings");
                $data['logo'] =  uploadImageToDirectory($request->logo, "Settings");
            }

            if ($request->hasFile('fav_icon')) {
                deleteImageFromDirectory(setting('fav_icon'), "Settings");
                $data['fav_icon'] =  uploadImageToDirectory($request->fav_icon, "Settings");
            }

            setting($data)->save();
        } else {
            $this->authorize('view_settings');
            return view('dashboard.settings.general-settings.main');
        }
    }

    public function terms(UpdateSettingsRequest $request)
    {
        if ($request->isMethod('post')) {
            setting($request->validated())->save();
        } else {

            $this->authorize('view_settings');
            return view('dashboard.settings.general-settings.terms');
        }
    }

    public function contact(UpdateSettingsRequest $request)
    {
        if ($request->isMethod('post')) {

            setting($request->validated())->save();
        } else {

            $this->authorize('view_settings');
            return view('dashboard.settings.general-settings.contact');
        }
    }

    public function tax(UpdateSettingsRequest $request)
    {
        if ($request->isMethod('post')) {
            setting($request->validated())->save();
        } else {

            $this->authorize('view_settings');
            return view('dashboard.settings.general-settings.tax');
        }
    }

    public function mobileApp(UpdateSettingsRequest $request)
    {
        if ($request->isMethod('post')) {
            setting($request->validated())->save();
        } else {

            $this->authorize('view_settings');
            return view('dashboard.settings.general-settings.mobile-app');
        }
    }

    public function changeTheme($mode)
    {
        Setting::setExtraColumns([
            'user_id' => auth()->id()
        ]);

        setting(['theme_mode' => $mode])->save();
    }

    public function landingPageContent(UpdateSettingsRequest $request)
    {
     
         if ($request->isMethod('post')) {
           $data= $request->validated();
           if ($request->hasFile('herosection_image')) {
            deleteImageFromDirectory(setting('herosection_image'), "Settings");
            $data['herosection_image'] =  uploadImageToDirectory($request->herosection_image, "Settings");
        }
        if ($request->hasFile('certificate_image')) {
            deleteImageFromDirectory(setting('certificate_image'), "Settings");
            $data['certificate_image'] =  uploadImageToDirectory($request->certificate_image, "Settings");
        }
            setting($data)->save();
        } else {
            $this->authorize('view_settings');
            return view('dashboard.settings.general-settings.landing-page-content');
        }
    }
}
