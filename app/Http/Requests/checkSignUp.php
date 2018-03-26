<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkSignUp extends FormRequest
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
            'username'=>'required',
            'password'=>'required|min:5|confirmed|max:16',
            'email'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'nhập userName',
            'password.required'=>'nhập password',
            'email.required'=>'nhập email',
            'password.confirmed'=>'nhập password không khớp'
        ];
    }
}
