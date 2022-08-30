<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           "name"=>"required|min:3|max:50",
            "email"=>"required|email:rfc,dns|max:50|unique:users,email",
             'password' => [
                            'required',
                            'max:50',
                            Password::min(8)
                            ->mixedCase()
                            ->numbers()
            ]
        ];
    }
}
