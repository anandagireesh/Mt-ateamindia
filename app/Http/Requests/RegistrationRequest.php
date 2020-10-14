<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns',
            'gender' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'First Name cannot be null',
            'lastname.required' => 'Last Name cannot be null',
            'email.required' => 'Email cannot be null',
            'email.email'  => 'Must be a valid email',
            'gender.required' => 'Gender cannot be null',
            'password.required' => 'Password cannot be null',
        ];
    }
}
