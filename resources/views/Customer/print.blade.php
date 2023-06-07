@extends('layouts.app')
@section('title')
    طباعة عمليات البيع العميل
@endsection
<link rel="stylesheet" href="{{ asset('assets/admin/js/printInvoice/css/printInvoice.css') }}">
@section('contentHeader')
طباعة عمليات البيع
@endsection
@section('contentHeaderlink')
    <a href="{{ route('customer.index') }}">عرض العميل</a>
@endsection
@section('contentHeaderActive')
    طباعة
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
                    <h3 class="card-title card_title_center">عرض عمليات البيع  العميل </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body"  id="print">

                    @if ($setting != '')

                    <h3 class="card-title card_title_center">اسم الشركة :   </h3>
                    <h3 class="card-title card_title_center">عنوان الشركة : البيع العميل </h3>
                    <h3 class="card-title card_title_center">رقم السجل التجاري : البيع العميل </h3>
                    <h3 class="card-title card_title_center">رقم التواصل : البيع العميل </h3>

                    @endif
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <small class="float-right"> تاريخ الفاتورة  :{{  $invoice_customer['date'] }}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">

                    <address>
                      <strong>اسم العميل: {{ $invoice_customer->customer->name }}  </strong><br>
                      رقم التواصل: {{ $invoice_customer->customer->phone }}  <br>
                      رقم الضريبي : {{ $invoice_customer->customer->Tex_number }}  <br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <address>
                      <strong>فاتورة ضريبية مبسطة</strong><br>
                      رقم الفاتورة : {{ $invoice_customer['no_invoice'] }}<br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <img src="{{$displayQRCodeAsBase64 }}" alt="">
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

              <!-- /.invoice -->

                        <br><br>
                        <div class="row addCustomerAjax">
                            <table id="example2" class="table table-bordered table-hover" >
                                <thead  style="background-color: #233490; color:#fff">
                                    <tr>
                                        <th>اسم المورد   </th>
                                        <th>اسم الصنف </th>
                                        <th>الكمية</th>
                                        <th>سعر الوحدة </th>
                                        <th>السعر غير شامل الضريبة </th>
                                        <th>قمية الضريبة </th>
                                        <th>السعر شامل ضريبة </th>
                                        <th>الخصم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $info)
                                        <tr>

                                            <td>{{ $info->suppler->name }}</td>
                                            <td>{{ $info['name_product'] }}</td>
                                            <td>{{ $info['quantity'] }}</td>
                                            <td>{{ $info['price'] }}</td>
                                            <td>{{ $info['total_befor_tex'] }}</td>
                                            <td>{{ $info['total_tex'] }}</td>
                                            <td>{{ $info['total_after_tex'] }}</td>
                                            <td>{{ $info['discount'] }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        {{-- @else
                        @endif --}}
                        </div><br><br>
                        <div class="row">

                            <!-- /.col (left) -->
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>ملخص الدفع</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="">اجمالي الكميات </label>
                                            <input type="text" class="form-control" name="total_quantity"
                                                id="total_quantity" value="{{ old('total_quantity',$quantity) }}">
                                            @error('total_quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي غير شامل الضريبة القيمة المضافة </label>
                                            <input type="text" class="form-control" name="total_not_include_tex"
                                                id="total_not_include_tex" value="{{ old('total_not_include_tex',$total_befor_tex) }}">
                                            @error('total_not_include_tex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي الخصم </label>
                                            <input type="text" class="form-control" name="total_discount"
                                                id="total_discount" value="{{ old('total_discount',$discount) }}">
                                            @error('total_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي الضريبة القيمة المضافة </label>
                                            <input type="text" class="form-control" name="total_include_tex"
                                                id="total_include_tex" value="{{ old('total_include_tex',$total_tex) }}">
                                            @error('total_include_tex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">اجمالي شامل ضريبة القيمة المضافة </label>
                                            <input type="text" class="form-control" name="total_tex_suppler"
                                                id="total_tex_suppler" value="{{ old('total_tex_suppler',$total_after_tex) }}">
                                            @error('total_tex_suppler')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col (right) -->
                            </div>
                </div>
                <div class="form-group text-center" id="hideButton" >
                    <button type="click" class="btn btn-primary btn-sm" id="printInvoice"> طباعة </button>
                    <a href="{{ route('customer.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/admin/js/printInvoice/printInvoice.js') }}"></script>
@endsection
