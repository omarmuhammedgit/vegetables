<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'phone'=>'required',
            // 'commercial_record'=>'required',
            // 'Tex_number'=>'required',
            // 'name_of_deficience'=>'required',
            // 'phone_deficince'=>'required',
            // 'service_ratio'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'اسم العميل مطلوب',
            'phone.required'=>'رقم الهاتف مطلوب',
            // 'commercial_record.required'=>'سجل التجاري  مطلوب',
            // 'Tex_number.required'=>' الرقم الضريبي مطلوب',
            // 'name_of_deficience.required'=>'اسم المعرف مطلوب',
            // 'phone_deficince.required'=>'رقم الجوال المعرف  مطلوب',
            // 'service_ratio.required'=>'نسبة الخدمة مطلوب',

        ];

    }
}
