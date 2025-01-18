<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validationKey = request()->segment(count(request()->segments()));

        $validations =  [
            "main" => [
                'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:512',
                'fav_icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:512',
                'website_name' => 'required|string:255',
                'description' => 'required|string:255',
             ],
            "landing" => [
                'herosection_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:512',
                'certificate_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:512',

                'landing_page.main_section_title_ar' => 'required|string|max:255',
                'landing_page.main_section_title_en' => 'required|string|max:255',
                'landing_page.main_section_description_ar' => 'required|string|max:600',
                'landing_page.main_section_description_en' => 'required|string|max:600',

            ],


            "terms" => [
                'terms_ar' => 'required|string',
                'terms_en' => 'required|string',
                'privacy_ar' => 'required|string',
                'privacy_en' => 'required|string',
            ],
            "contact" => [
           'whatsapp_number' => ['required', 'regex:/^\d+(\.\d+)?$/', 'max:20'],
            'sms_number' => ['required', 'regex:/^\d+(\.\d+)?$/', 'max:20'],

         
                'email' => ['required','email'],
                'address_ar' => ['required'],
                'address_en' => ['required'],
            ],
            "tax" => [
                'tax' => ['required', 'numeric'],
            ],
            "mobile-app" => [
                'instagram_link' => 'required|max:255|url',
                'facebook_link' => 'required|max:255|url',
   
            ],
            'landing-page-content' => [
                'landing_page.main_section_title_ar' => 'required|string|max:255',
                'landing_page.main_section_title_en' => 'required|string|max:255',
                'landing_page.main_section_description_ar' => 'required|string|max:600',
                'landing_page.main_section_description_en' => 'required|string|max:600',
                'landing_page.how_we_are_title_ar' => 'required|string|max:255',
                'landing_page.how_we_are_title_en' => 'required|string|max:255',
                'landing_page.how_we_are_description_ar' => 'required|string|max:600',
                'landing_page.how_we_are_description_en' => 'required|string|max:600',

                'landing_page.why_choose_us_title_1_ar' => 'required|string|max:255',
                'landing_page.why_choose_us_title_1_en' => 'required|string|max:255',
                'landing_page.why_choose_us_description_1_ar' => 'required|string|max:600',
                'landing_page.why_choose_us_description_1_en' => 'required|string|max:600',
                'landing_page.why_choose_us_title_2_ar' => 'required|string|max:255',
                'landing_page.why_choose_us_title_2_en' => 'required|string|max:255',
                'landing_page.why_choose_us_description_2_ar' => 'required|string|max:600',
                'landing_page.why_choose_us_description_2_en' => 'required|string|max:600',
                'landing_page.why_choose_us_title_3_ar' => 'required|string|max:255',
                'landing_page.why_choose_us_title_3_en' => 'required|string|max:255',
                'landing_page.why_choose_us_description_3_ar' => 'required|string|max:600',
                'landing_page.why_choose_us_description_3_en' => 'required|string|max:600',
                'landing_page.why_choose_us_title_4_ar' => 'required|string|max:255',
                'landing_page.why_choose_us_title_4_en' => 'required|string|max:255',
                'landing_page.why_choose_us_description_4_ar' => 'required|string|max:600',
                'landing_page.why_choose_us_description_4_en' => 'required|string|max:600',

                'landing_page.app_features_title_1_ar' => 'required|string|max:255',
                'landing_page.app_features_title_1_en' => 'required|string|max:255',
                'landing_page.app_features_description_1_ar' => 'required|string|max:600',
                'landing_page.app_features_description_1_en' => 'required|string|max:600',
                'landing_page.app_features_title_2_ar' => 'required|string|max:255',
                'landing_page.app_features_title_2_en' => 'required|string|max:255',
                'landing_page.app_features_description_2_ar' => 'required|string|max:600',
                'landing_page.app_features_description_2_en' => 'required|string|max:600',
                'landing_page.app_features_title_3_ar' => 'required|string|max:255',
                'landing_page.app_features_title_3_en' => 'required|string|max:255',
                'landing_page.app_features_description_3_ar' => 'required|string|max:600',
                'landing_page.app_features_description_3_en' => 'required|string|max:600',
                'landing_page.app_features_title_4_ar' => 'required|string|max:255',
                'landing_page.app_features_title_4_en' => 'required|string|max:255',
                'landing_page.app_features_description_4_ar' => 'required|string|max:600',
                'landing_page.app_features_description_4_en' => 'required|string|max:600',
            ],
        ];

        return request()->isMethod('post') ? $validations[$validationKey] : [];
    }
}
