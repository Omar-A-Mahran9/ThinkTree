<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_ourheroes');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            "name_ar" => ["required", "string:255", "unique:whyuses", new NotNumbersOnly()],
            "name_en" => ["required", "string:255", "unique:whyuses", new NotNumbersOnly()],
            'city_id' => ["required"],
            'age' => ["required"],


        ];
    }
}
