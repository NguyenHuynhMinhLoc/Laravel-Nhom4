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
            'ProductPrice' => 'required|integer|min:0|max:99999999999',
            'PriceCoubon' => 'nullable|integer|min:0|max:100',
            'ProductStatus' => 'required|in:0,1',
            'CategoryID' => 'required|integer|exists:category,CategoryID',
            'Quantity' => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'Image.image' => 'Tệp tải lên phải là hình ảnh',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg hoặc png',
            'ProductName.max' => 'Tên sản phẩm chỉ tối đa :max kí tự',
            'ProductPrice.integer' => 'Giá phải là số nguyên',
            'ProductPrice.max' => 'Gía sản phẩm tối đa :max kí tự',
            'PriceCoubon.integer' => 'Giá khuyến mãi phải là số nguyên',
            'PriceCoubon.min'=>'Gía khuyến mãi không được nhập số âm',
            'PriceCoubon.max'=>'Gía khuyến mãi chỉ tối đa 100% ',
            'ProductStatus.in' => 'Trạng thái sản phẩm không hợp lệ',
            'CategoryID.exists' => 'Danh mục không tồn tại',
            'Quantity.interger'=>'Số lượng phải là số nguyên',
            'Quantity.min'=>'Số lượng không được âm',

        ];
    }
}
