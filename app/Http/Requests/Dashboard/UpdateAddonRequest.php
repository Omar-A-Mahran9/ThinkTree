<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAddonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_addonService');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $addon = request()->route('addon');

        return [
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:512',
            "name_ar" => [
                "required",
                "string",
                "max:255",
                 new NotNumbersOnly(),
            ],
            "name_en" => [
                "required",
                "string",
                "max:255",
                 new NotNumbersOnly(),
            ],

            "description_ar" => ["required",   new NotNumbersOnly()  ],
            "description_en" => ["required",  new NotNumbersOnly() ],
            "price" => ["required", "numeric"],
        ];
    }
}
