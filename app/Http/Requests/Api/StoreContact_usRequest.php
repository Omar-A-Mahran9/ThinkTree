<?php

namespace App\Http\Requests\Api;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class StoreContact_usRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
 
        return [
            'parent_name' => ['required'],
            'child_name' => ['required'],
            'phone' => ['required', 'numeric', 'digits_between:10,15'],
            'message' => ['required']
        ];
    }
}
