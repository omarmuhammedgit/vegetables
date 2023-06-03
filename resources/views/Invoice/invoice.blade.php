@extends('layouts.app')
@section('title')
    اضافة فاتورة المورد
@endsection
@section('contentHeader')
    الفاتورة
@endsection
@section('contentHeaderlink')
    <a href="#">فاتورة المورد</a>
@endsection
@section('contentHeaderActive')
    اضافة
@endsection
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">اضافة فاتورة المورد </h3>
                </div>

                <input type="hidden" id="ajax_search_url" value="{{ route('invoiceSuppler.addCustomerAjax') }}">
                <input type="hidden" id="ajax_addCustomerAjax_url"
                    value="{{ route('customer.addAjaxCustomer') }}">
                <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('invoiceSuppler.store') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-3">

                                @php
                                    $no_invoice = !empty(\App\Models\InvoiceSuppler::latest()->first()->no_support) ? ($no_invoice = \App\Models\InvoiceSuppler::latest()->first()->no_invoice) : 0000;
                                    // $number_invoice=!empty($)?$number_invoice:0000;
                                    $no_invoice = str_pad($no_invoice + 1, 5, 0, STR_PAD_LEFT);
                                @endphp
                                <label for="">رقم الفاتورة </label>
                                <input type="text" class="form-control" name="no_invoice" id="no_invoice"
                                    value="{{ old('no_invoice', $no_invoice) }}">
                                @error('no_invoice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">اسم المورد</label>
                                <select name="suppler_id" id="suppler_id" class="form-control select2">
                                    <option value="">اختر اسم المورد</option>
                                    @if (!@empty($suppler) && @isset($suppler))
                                        @foreach ($suppler as $suppler)
                                            <option @if (old('suppler_id') == $suppler->id) selected="selected" @endif
                                                value="{{ $suppler->id }}">{{ $suppler->name }} </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('suppler_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">التاريخ </label>
                                <input type="date" class="form-control" name="date" id="date"
                                    value="@php echo date('Y-m-d') @endphp">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">رقم السند</label>
                                <input type="text" class="form-control" name="no_support" id="no_support"
                                    value="{{ old('no_support') }}">
                                @error('no_support')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row addCustomerAjax">

                            <div class="col-md-3 " id="addAjax">
                                <label for="">اسم العميل</label>
                                {{-- <span class="input-group-append"> --}}
                                <button type="button" class="btn btn-info btn-flat" title="اضافة عميل جديد"  data-toggle="modal" data-target="#modal-lg">+</button>
                                {{-- </span> --}}
                                <select name="customer_id" id="customer_id" class="form-control select2">
                                    <option value="">اختر اسم العميل</option>
                                    @if (!@empty($customer) && @isset($customer))
                                        @foreach ($customer as $customer)
                                            <option @if (old('customer_id') == $customer->id) selected="selected" @endif
                                                value="{{ $customer->id }}">{{ $customer->name }} </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('customer_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">اسم الصنف</label>
                                <select name="name_product" id="name_product" class="form-control select2">
                                    <option value="">اختر اسم الصنف</option>
                                    @if (!@empty($product) && @isset($product))
                                        @foreach ($product as $product)
                                            <option @if (old('name_product') == $product->name) selected="selected" @endif
                                                value="{{ $product->name }}">{{ $product->name }} </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('name_product')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>
                            <div class="col-md-3">
                                <label for="">الكمية </label>
                                <input type="text" class="form-control" name="quantity" id="quantity"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">سعر الوحدة </label>
                                <input type="text" class="form-control" name="price" id="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">اجمالي السعر</label>
                                <input type="text" class="form-control" name="total_befor_tex" id="total_befor_tex"
                                    value="{{ old('total_befor_tex') }}">
                                @error('total_befor_tex')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">الخصم </label>
                                <input type="text" class="form-control" name="discount" id="discount"
                                    value="{{ old('discount', 0) }}">
                                @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">ضريبةالقيمة المضافة </label>
                                <input type="text" class="form-control" name="total_tex" id="total_tex"
                                    value="{{ old('total_tex') }}">
                                @error('total_tex')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">السعر شامل الضريبة </label>
                                <input type="text" class="form-control" name="total_after_tex" id="total_after_tex"
                                    value="{{ old('total_after_tex') }}">
                                @error('total_after_tex')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="card card-danger">
                                    {{-- <div class="card-header">
                                        <h3 class="card-title">Input masks</h3>
                                    </div> --}}
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="">نسبة الخدمة </label>
                                            <input type="text" class="form-control" name="serivce_rota"
                                                id="serivce_rota" value="{{ old('serivce_rota', $service_rote) }}">
                                            @error('serivce_rota')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">مصروفات الحمالة </label>
                                            <input type="text" class="form-control" name="escort_expenses"
                                                id="escort_expenses" value="{{ old('escort_expenses') }}">
                                            @error('escort_expenses')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">مصروفات اخرى </label>
                                            <input type="text" class="form-control" name="other_expenses"
                                                id="other_expenses" value="{{ old('other_expenses') }}">
                                            @error('other_expenses')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">بيان المصروفات </label>
                                            <input type="text" class="form-control" name="statement_expenses"
                                                id="statement_expenses" value="{{ old('statement_expenses') }}">
                                            @error('statement_expenses')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>
                            <!-- /.col (left) -->
                            {{-- <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Date picker</h3>
                                        <h4>ملخص الدفع</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="">اجمالي الكميات </label>
                                            <input type="text" class="form-control" name="total_quantity"
                                                id="total_quantity" value="{{ old('total_quantity') }}">
                                            @error('total_quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي غير شامل الضريبة القيمة المضافة </label>
                                            <input type="text" class="form-control" name="total_not_include_tex"
                                                id="total_not_include_tex" value="{{ old('total_not_include_tex') }}">
                                            @error('total_not_include_tex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي الخصم </label>
                                            <input type="text" class="form-control" name="total_discount"
                                                id="total_discount" value="{{ old('total_discount') }}">
                                            @error('total_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي الضريبة القيمة المضافة </label>
                                            <input type="text" class="form-control" name="total_include_tex"
                                                id="total_include_tex" value="{{ old('total_include_tex') }}">
                                            @error('total_include_tex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي شامل ضريبة القيمة المضافة </label>
                                            <input type="text" class="form-control" name="total_tex_suppler"
                                                id="total_tex_suppler" value="{{ old('total_tex_suppler') }}">
                                            @error('total_tex_suppler')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col (right) -->
                            </div> --}}


                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm"> حفظ</button>
                            <button type="button" class="btn btn-success btn-sm" id="addCustomer"> اضافة عميل</button>
                        </div>
                    </form>
                    <div class="form-group text-center">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">اضافة عميل</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title card_title_center">اضافة بيانات العميل</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        {{-- <form action="{{ route('customer.store') }}" method="post"> --}}
                                            {{-- @csrf --}}
                                            <div class="form-group">
                                                @php
                                                    $code = !empty(\App\Models\Customer::latest()->first()->code) ? ($code = \App\Models\Customer::latest()->first()->code) : 0000;
                                                    // $number_invoice=!empty($)?$number_invoice:0000;
                                                    $code = str_pad($code + 1, 5, 0, STR_PAD_LEFT);
                                                @endphp
                                                <label for="">كود العميل</label>
                                                <input type="text" class="form-control" name="code" id="code"
                                                    value="{{ old('code', $code) }}">
                                                @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">اسم العميل</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="">العنوان</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                    value="{{ old('address') }}">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">رقم الهوية/ سجل التجاري</label>
                                                <input type="number" class="form-control" name="commercial_record"
                                                    id="commercial_record" value="{{ old('commercial_record') }}">
                                                @error('commercial_record')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">رقم الهاتف</label>
                                                <input type="number" class="form-control" name="phone" id="phone"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">رقم الضريبي</label>
                                                <input type="number" class="form-control" name="Tex_number"
                                                    id="Tex_number" value="{{ old('Tex_number') }}">
                                                @error('Tex_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">اسم المعرف</label>
                                                <input type="text" class="form-control" name="name_of_deficience"
                                                    id="name_of_deficience" value="{{ old('name_of_deficience') }}">
                                                @error('name_of_deficience')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">رقم الجوال المعرف</label>
                                                <input type="number" class="form-control" name="phone_deficince"
                                                    id="phone_deficince" value="{{ old('phone_deficince') }}">
                                                @error('phone_deficince')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">نسبة الخدمة</label>
                                                <input type="text" class="form-control" name="service_ratio"
                                                    id="service_ratio" value="{{ old('service_ratio') }}">
                                                @error('service_ratio')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">مخصص_1</label>
                                                <input type="text" class="form-control" name="custom_field_1"
                                                    id="custom_field_1" value="{{ old('custom_field_1') }}">
                                                @error('custom_field_1')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">مخصص_2</label>
                                                <input type="text" class="form-control" name="custom_field_2"
                                                    id="custom_field_2" value="{{ old('custom_field_2') }}">
                                                @error('custom_field_2')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">مخصص_3</label>
                                                <input type="text" class="form-control" name="custom_field_3"
                                                    id="custom_field_3" value="{{ old('custom_field_3') }}">
                                                @error('custom_field_3')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                                    <a href="{{ route('customer.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الالغاء</button>
                        <button type="button" class="btn btn-primary" id="addNewCustomer">حفظ</button>
                    </div>
                    {{-- </form> --}}

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection
    @section('script')
        <script src="{{ asset('assets/admin/js/invoice/invoices.js') }}"></script>
        {{-- <script src="{{ asset('assets/admin/js/invoice/addcustomer.js') }}"></script> --}}
    @endsection
