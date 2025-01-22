<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_childern_trip');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
             "description_ar" => ["required", "string:255", new NotNumbersOnly()],
            "description_en" => ["required", "string:255", new NotNumbersOnly()],
            "name_ar" => ["required", "string:255", "unique:whyuses", new NotNumbersOnly()],
            "name_en" => ["required", "string:255", "unique:whyuses", new NotNumbersOnly()],
        ];
    }
}
