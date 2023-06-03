<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceSupplerRequest extends FormRequest
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
            'no_support'=>'required',
            'customer_id'=>'required',
            'name_product'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'total_befor_tex'=>'required',
            'total_tex'=>'required',
            'serivce_rota'=>'required',
            'escort_expenses'=>'required',
            'other_expenses'=>'required',
            // 'total_quantity'=>'required',
            // 'total_not_include_tex'=>'required',
            // 'total_discount'=>'required',
            // 'total_include_tex'=>'required',
            // 'total_tex_suppler'=>'required',
            // 'discount'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'no_support.required'=>'رقم السند مطلوب',
            'customer_id.required'=>'اسم العميل مطلوب',
            'name_product.required'=>'اسم الصنف مطلوب',
            'quantity.required'=>'الكمية  مطلوب',
            'price.required'=>'سعر الوحدة  مطلوب',
            'total_befor_tex.required'=>'السعر اجمالي  مطلوب',
            'total_tex.required'=>'مبلغ الضريبة  مطلوب',
            'serivce_rota.required'=>'نسبة الخدمة  مطلوب',
            'escort_expenses.required'=>'المصروفات الحمالة  مطلوب',
            'other_expenses.required'=>'المصروفات اخرى  مطلوب',
            // 'total_quantity.required'=>'اجمالي الكميات  مطلوب',
            // 'total_not_include_tex.required'=>'اجمالي غير شامل الضريبة  مطلوب',
            // 'total_discount.required'=>'اجمالي الخصم السند مطلوب',
            // 'total_include_tex.required'=>'اجمالي شامل الضريبة مطلوب',
            // 'total_tex_suppler.required'=>'اجمالي الضريبة  مطلوب',
            // 'discount.required'=>'الخصم  مطلوب',
        ];
    }
}
