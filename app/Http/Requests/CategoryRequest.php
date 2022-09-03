<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'یک اسم برای کالکشن مورد نظر انتخاب کنید ',
            'name.min'=>'اسم کالکشن باید بیشتر از ۳ حرف باشد',
            'image.required'=>'یک تصویر برای پس زمینه انتخاب کنید'
        ];
    }
}
