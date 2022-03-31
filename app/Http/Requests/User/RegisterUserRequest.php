<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];
    }

    /**
     * Display the Messgage if found any error
     *
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First Name field is required',
            'last_name.required' => 'Last Name field is required',
            'email.required' => 'Email field is required',
            'email.unique' => 'Already exists an account registered with this email address.',
            'password.required' => 'Password field is required',
        ];
    }
}
