<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_packages');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
 
        return [
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg', // Image is optional for updates
            
            "name_ar" => [
                "required", 
                "string", 
                "max:255", 
                 new NotNumbersOnly()
            ],
            "name_en" => [
                "required", 
                "string", 
                "max:255", 
                 new NotNumbersOnly()
            ],
            
            "description_ar" => ["required", "string" ],
            "description_en" => ["required", "string" ],
            
            "features" => ["required", "array", "min:1"],
            "features.*" => ["integer", "exists:features,id"],
    
            "outcomes" => ["required", "array", "min:1"],
            "outcomes.*" => ["integer", "exists:outcomes,id"],
    
            "price" => ["required", "numeric", "min:0"],
            "have_discount" => ["required", "boolean"],
            "discount_price" => ["nullable", "numeric", "min:0", "required_if:have_discount,1"],
       
            "price_per_session" => ["required", "numeric", "min:0"],
            
            "duration_monthly" => ["required", "integer", "min:1"],
            "number_of_session_per_week" => ["required", "integer", "min:1"],
            "number_of_levels" => ["required", "integer", "min:1"],
            "number_of_sessions" => ["required", "integer", "min:1"],
            
            'available' => 'required|boolean',
            'featured' => 'boolean',
        ];
    }
}
