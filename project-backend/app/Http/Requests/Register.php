<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => 'required|alpha|min:3',
            'phone' => 'min:9|max:9',
            'address'=> 'min:5|alpha_dash',
            'email' => 'required|email|unique:users',
            'avatar' => 'image',
            'password' => 'required|min:6',
        ];
    }

}
