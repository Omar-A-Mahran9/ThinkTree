<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Admin;
use App\Rules\ExistPhone;
use App\Rules\PhoneNumber;
use App\Rules\NotNumbersOnly;
use App\Rules\ExistButDeleted;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return abilities()->contains('create_admins');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', new NotNumbersOnly()],
            'phone' => ['required', 'string', 'max:20', new ExistButDeleted(new Admin()), 'unique:admins', new ExistPhone(new Admin())],
            'email' => ['required', 'string', 'email:rfc,dns', new ExistButDeleted(new Admin()), 'unique:admins'],
            'roles' => ['required', 'array', 'min:1'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }
}
