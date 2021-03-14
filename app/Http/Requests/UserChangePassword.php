<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Rules\CheckPassword;
use App\Rules\ComparePassword;

class UserChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'current_password' => ['bail','required', 'string', new CheckPassword],
        'new_password' => ['bail','required', 'string', 'min:8', new ComparePassword($this->current_password)],
        're_new_password' => ['bail','required','same:new_password']
        ];
    }
}
