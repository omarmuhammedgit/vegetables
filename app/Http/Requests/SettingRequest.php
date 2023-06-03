<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'no_recode'=>'required',
            'no_tex'=>'required|min:15',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'اسم الشركة مطلوب',
            'address.required'=>'عنوان الشركة مطلوب',
            'phone.required'=>'رقم الهاتف مطلوب',
            'no_recode.required'=>'رقم السجل التجاري مطلوب',
            'no_tex.required'=>'رقم الضريبي مطلوب',
            'no_tex.min'=>'لا يمكن ان يكون رقم الضريبي اقل من 15 رقم ',
        ];

    }
}
