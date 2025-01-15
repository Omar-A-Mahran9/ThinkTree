<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_packages');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "from" => ["required", "date_format:H:i"], // Validates HH:MM format
            "to" => ["required", "date_format:H:i", function ($attribute, $value, $fail) {
                $from = request()->input('from'); // Retrieve the 'from' time
                if ($from && strtotime($value) <= strtotime($from)) {
                    $fail(__('The :attribute must be after the from time.', ['attribute' => $attribute]));
                }
            }],
        ];
    }
    
 
}
