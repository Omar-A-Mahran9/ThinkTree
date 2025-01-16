<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            "name_ar" => ["required", "string", "max:255", "unique:packages", new NotNumbersOnly()],
            "name_en" => ["required", "string", "max:255", "unique:packages", new NotNumbersOnly()],
            
            "time_ids" => ["required", "array", "min:1"],
            "time_ids.*" => ["integer", "exists:times,id"], // Assuming 'features' table with 'id' column
    
             "day_id" => ["required", "integer", "min:1"],
        
            'available' => 'required|boolean',
 
        ];
    }
    
}
