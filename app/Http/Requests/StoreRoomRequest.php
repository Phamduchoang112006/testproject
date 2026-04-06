<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'room_number' => 'required|max:50',
            'type' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:10',
            'is_booked' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'room_number.required' => 'Vui lòng nhập số phòng.',
            'room_number.max' => 'Số phòng không quá :max ký tự.',
            'type.required' => 'Vui lòng chọn loại phòng.',
            'price.required' => 'Hãy nhập giá phòng.',
            'price.numeric' => 'Giá phải là một số hợp lệ.',
            'price.min' => 'Giá phòng không được nhỏ hơn :min.',
            'description.required' => 'Vui lòng cung cấp mô tả ngắn.',
            'description.min' => 'Mô tả phải có ít nhất :min ký tự.',
            'image.image' => 'Dữ liệu phải là định dạng hình ảnh.',
            'image.max' => 'Dung lượng ảnh tối đa là :max KB.',
        ];
    }
}
