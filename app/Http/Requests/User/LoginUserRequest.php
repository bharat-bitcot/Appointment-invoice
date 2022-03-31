<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email,status,1',
            'password' => 'required'
        ];
    }

    /**
     * Messgage
     */
    public function messages()
    {
        return [
            'email.required' => 'Email field is required',
            'password.required' => 'Password field is required',
            'email.exists' => "Email doesn't exists"
        ];
    }


}
