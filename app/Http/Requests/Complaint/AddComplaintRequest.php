<?php

namespace App\Http\Requests\Complaint;

use Illuminate\Foundation\Http\FormRequest;

class AddComplaintRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'condition_type' => 'required',
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
            'title.required' => 'Name field is required',
            'description.required' => 'Description field is required',
            'condition_type.required' => 'Product Condition field is required',
        ];
    }
}
