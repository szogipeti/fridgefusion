<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|min:5|max:100|unique:users,username',
            'email' => 'required|string|email|min:6|max:100|unique:users,email',
            'password' => 'required|string|min:5|max:100|confirmed',
            'password_confirmation' => 'required|string|min:5|max:100|same:password'
        ];
    }
}
