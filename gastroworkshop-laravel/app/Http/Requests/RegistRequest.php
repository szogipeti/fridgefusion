<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:5|max:100|unique',
            'email' => 'required|string|email|min:6|max:100|unique',
            'password' => 'required|string|min:5|max:100|confirmed|regex:[a-zA-Z\d]'
        ];
    }
}
