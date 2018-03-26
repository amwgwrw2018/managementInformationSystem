<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nhutRequest extends FormRequest
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
            'ten'=>'required',
            'tuoi'=>'required',
            

        ];
    }
    public function messages(){
        return [
'ten.required'=>'nhập tên',
'tuoi.required' =>'nhập tuổi'

        ];
    }
}
