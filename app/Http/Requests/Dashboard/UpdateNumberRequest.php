<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_numbers');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {



    return [
        'Parents_experiment' => ['required', 'numeric'],
        'Traning_houres' => ['required', 'numeric'],
        'Our_heroes' => ['required', 'numeric'],
        'Heroes_rate' => ['required', 'numeric'],
        'Lessons' => ['required', 'numeric'],
        'Puzzles' => ['required', 'numeric'],
        'Stars' => ['required', 'numeric'],
        'Online' => ['required', 'numeric'],
        'Kids_Played' => ['required', 'numeric'],
        'Games' => ['required', 'numeric'],
    ];
}

}
