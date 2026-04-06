<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'description' => 'required',
            'ingredients' => 'nullable',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên món ăn',
            'name.min' => 'Tên món ăn phải có ít nhất :min ký tự',
            'price.required' => 'Vui lòng nhập giá',
            'price.numeric' => 'Giá phải là một số',
            'category.required' => 'Vui lòng chọn danh mục',
            'description.required' => 'Vui lòng nhập mô tả món ăn',
        ];
    }
}
