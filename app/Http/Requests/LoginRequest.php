<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'identifier' => 'required',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'identifier.required' => 'The email or username is required.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 6 characters.'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'identifier' => $this->input('identifier')
        ]);
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $identifier = $this->input('identifier');
            $user = User::where('email', $identifier)
                        ->orWhere('username', $identifier)
                        ->first();

            if (!$user) {
                $validator->errors()->add('identifier', 'The selected email or username is invalid.');
            }
        });
    }
}
