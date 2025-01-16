<?php

namespace App\Http\Requests\Api;

 use App\Rules\PhoneNumber;
use App\Rules\NotNumbersOnly;


use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
 
    }

 
 public function rules(): array
{
    $currentStep = request()->route('step');

    // Define validation rules for each step
    $stepsRules = [
        1 => [
            "name" => ['required', 'string', 'max:255', new NotNumbersOnly()],
            "email" => ['nullable', 'email'],
            "child_name" => ['required', 'string', 'max:255'],
            "phone" => [
                'required',
                'string',
                'max:20',
                new PhoneNumber(),
            ],
            "birth_date_of_child" => ['required', 'date'],
        ],
        2 => [
            "otp" => ['required', 'numeric', 'digits:6'], // Adjust digits as per requirement
        ],
        3 => [
            "package_id" => ['required', 'numeric', 'exists:packages,id'],
            "day_id" => ['required', 'numeric', 'exists:days,id'],
            "time_id" => ['required', 'numeric', 'exists:times,id'],
            "choose_duration_later" => ['required', 'boolean'],
        ],
    ];

    // Validate step existence
    if (!array_key_exists($currentStep, $stepsRules)) {
        abort(400, __('Invalid step provided.'));
    }

    // Return validation rules for the current step
    return $stepsRules[$currentStep];
}

}
