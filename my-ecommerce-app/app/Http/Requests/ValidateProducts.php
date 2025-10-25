<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProducts extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'ProductName' => 'required|string|max:255',
            'ProductPrice' => 'required|integer|min:0',
            'PriceCoubon' => 'nullable|integer|min:0',
            'ProductStatus' => 'required|in:0,1',
            'CategoryID' => 'required|integer|exists:category,CategoryID'
        ];
    }

    public function messages()
    {
        return [
            'Image.required' => 'Vui lòng chọn hình ảnh sản phẩm',
            'Image.image' => 'Tệp tải lên phải là hình ảnh',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg hoặc png',
            'ProductName.required' => 'Vui lòng nhập tên sản phẩm',
            'ProductPrice.required' => 'Vui lòng nhập giá sản phẩm',
            'ProductPrice.integer' => 'Giá phải là số nguyên',
            'PriceCoubon.integer' => 'Giá khuyến mãi phải là số nguyên',
            'ProductStatus.in' => 'Trạng thái sản phẩm không hợp lệ',
            'CategoryID.exists' => 'Danh mục không tồn tại',
        ];
    }
}
