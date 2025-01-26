<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Admin;
use App\Rules\ExistPhone;
use App\Rules\PhoneNumber;
use App\Rules\NotNumbersOnly;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return abilities()->contains('update_admins');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $admin = $this->route('admin');

        return [
            'name' => ['required', 'string', 'max:255', new NotNumbersOnly()],
            'phone' => ['required', 'string', 'regex:/^[0-9]+$/', 'max:20', Rule::unique('admins')->ignore($admin->id), new ExistPhone(new Admin(), $admin->id)],
            'email' => ['required', 'string', 'email', Rule::unique('admins')->ignore($admin->id)],
            'roles' => ['required', 'array', 'min:1'],
            'password' => ['nullable', 'exclude_if:password,null', 'string', 'min:8', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/', 'confirmed'],
            'password_confirmation' => ['nullable', 'exclude_if:password_confirmation,null', 'same:password'],
        ];
    }
}
