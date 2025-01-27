<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Whyus;
use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_children_trip');
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
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'description_ar' => ['required', 'string', 'max:255', new NotNumbersOnly()],
            'description_en' => ['required', 'string', 'max:255', new NotNumbersOnly()],
            'name_ar' => [
                'required', 
                'string', 
                'max:255', 
                'regex:/^[ء-ي]+$/', // Ensure it's Arabic
                // Rule::unique('whyuses')->ignore($whyus->id)
            ],
            'name_en' => [
                'required', 
                'string', 
                'max:255', 
                'regex:/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', // Ensure it's valid English
                // Rule::unique('whyuses')->ignore($whyus->id)
            ],
        ];
    }
}
