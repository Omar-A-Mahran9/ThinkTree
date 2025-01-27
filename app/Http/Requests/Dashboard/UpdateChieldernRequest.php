<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChieldernRequest extends FormRequest
{
    public function authorize()
    {
        return true;
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
            'name' => ['required', 'string', 'max:255', new NotNumbersOnly()],
            'birthdate' => ['required', 'date'],
         
        ];
    }
}
