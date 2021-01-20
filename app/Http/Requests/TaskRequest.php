<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'text' => ['required']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'The "Username" field is required.',
            'username.max' => 'The "Username" may not be greater than 255 characters.',

            'email.required' => 'The "Email" field is required.',
            'email.max' => 'The "Email" may not be greater than 255 characters.',
            'email.email' => 'The "Email" must be a valid email address.',

            'text.required' => 'The "Text" field is required.'
        ];
    }
}
