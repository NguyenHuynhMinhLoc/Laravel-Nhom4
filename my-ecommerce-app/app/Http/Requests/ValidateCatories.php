<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCatories extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'CategoryName' => 'required|string|max:255|unique:Category,CategoryName',
        ];
    }

    public function messages()
    {
        return [
            'CategoryName.unique' => "Tên đã tồn tại!",
            'CategoryName.max' => "Quá kí tự cho phép"

        ];
    }
}