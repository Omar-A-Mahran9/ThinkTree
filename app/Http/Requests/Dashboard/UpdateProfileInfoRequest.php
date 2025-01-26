<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Admin;
use App\Rules\ExistPhone;
use App\Rules\PhoneNumber;
use App\Rules\NotNumbersOnly;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileInfoRequest extends FormRequest
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
        $admin = auth()->user();
        return [
            'name' => ['required', 'string', 'max:255', new NotNumbersOnly()],
            'phone' => ['required', 'string' , new ExistPhone(new Admin(), $admin->id), 'max:20', Rule::unique('admins')->ignore($admin->id)],
        ];
    }
}
