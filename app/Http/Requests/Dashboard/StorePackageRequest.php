<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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

 
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',

            // Validate name_ar and name_en as required strings, with a length of 255 characters, and unique in the `packages` table
            "name_ar" => ["required", "string", "max:255", "unique:packages", new NotNumbersOnly()],
            "name_en" => ["required", "string", "max:255", "unique:packages", new NotNumbersOnly()],
            
            // Validate description_ar and description_en as optional strings with a max length of 255
            "description_ar" => ["required", "string",  ],
            "description_en" => ["required", "string", ],
            
            // Validate features as an array and each item in the array should be a valid integer (assuming feature IDs are integers)
            "features" => ["required", "array", "min:1"],
            "features.*" => ["integer", "exists:features,id"], // Assuming 'features' table with 'id' column
    
            // Validate outcomes as an array and each item in the array should be a valid integer (assuming outcome IDs are integers)
            "outcomes" => ["required", "array", "min:1"],
            "outcomes.*" => ["integer", "exists:outcomes,id"], // Assuming 'outcomes' table with 'id' column
    
            // Validate price, discount_price, price_per_session, and other numeric fields
            "price" => ["required", "numeric", "min:0"],
            "have_discount" => ["required", "boolean"],
            "discount_price" => ["nullable", "numeric", "min:0", "required_if:have_discount,1"],
       
            "price_per_session" => ["required", "numeric", "min:0"],
            
            // Validate other numeric fields (duration, number of sessions, etc.)
            "duration_monthly" => ["required", "integer", "min:1"],
            "number_of_session_per_week" => ["required", "integer", "min:1"],
            "number_of_levels" => ["required", "integer", "min:1"],
            "number_of_sessions" => ["required", "integer", "min:1"],
            
            // Validate featured field as a boolean (check if the field is marked as 'on')
            'available' => 'required|boolean',
            'featured' => 'boolean',

        ];
    }
    
}
