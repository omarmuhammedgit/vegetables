<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatchSupportRequest extends FormRequest
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
            'receive'=>'required',
            'total'=>'required',
            'tex'=>'required',
            'payment'=>'required',
            'number_shek'=>'required',
            'bank'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'receive.required'=>'اسم المستلم مطلوب',
            'total.required'=>'المبلغ شامل الضريبة  مطلوب',
            'tex.required'=>'مبلغ الضريبة  مطلوب',
            'payment.required'=>' طريقة الدفع  مطلوب',
            'number_shek.required'=>'رقم الشيك  مطلوب',
            'bank.required'=>'اسم البنك   مطلوب',

        ];

    }
}
