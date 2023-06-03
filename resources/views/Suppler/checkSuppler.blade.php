@extends('layouts.app')
@section('titel')
    فحص عمليات البيع المورد
@endsection
@section('contentHeader')
فحص عمليات البيع
@endsection
@section('contentHeaderlink')
    <a href="{{ route('Suppler.index') }}"> عرص الموردين</a>
@endsection
@section('contentHeaderActive')
    فحص
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
                    <h3 class="card-title card_title_center">عرض عمليات البيع  المورد </h3>
                </div>

                <input type="hidden" id="ajax_search_url" value="{{ route('invoiceSuppler.addCustomerAjax') }}">
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
                                    value="{{ old('no_invoice', $invoice_suppler['no_invoice']) }}">
                                @error('no_invoice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">اسم المورد</label>
                                <input type="text" class="form-control" name="date" id="date"
                                    value="{{ old('', $invoice_suppler->suppler->name) }}">
                                @error('suppler_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">التاريخ </label>
                                <input type="date" class="form-control" name="date" id="date"
                                    value="{{ old('date', $invoice_suppler['date']) }}">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">رقم السند</label>
                                <input type="text" class="form-control" name="no_support" id="no_support"
                                    value="{{ old('no_support', $invoice_suppler['no_support']) }}">
                                @error('no_support')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br><br>
                        <div class="row addCustomerAjax">
                            {{-- @if (@isset($customer) and !@empty($customer) and count($customer) > 0) --}}
                            <table id="example2" class="table table-bordered table-hover" >
                                <thead  style="background-color: #233490; color:#fff">
                                    <tr>
                                        <th>اسم العميل  </th>
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
                                    @foreach ($invoice_customer as $info)
                                        <tr>
                                            <td>{{ $info->customer->name }}</td>
                                            <td>{{ $info->name_product }}</td>
                                            <td>{{ $info->quantity }}</td>
                                            <td>{{ $info->price }}</td>
                                            <td>{{ $info->total_befor_tex }}</td>
                                            <td>{{ $info->total_tex }}</td>
                                            <td>{{ $info->total_after_tex }}</td>
                                            <td>{{ $info->discount }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        {{-- @else
                        @endif --}}
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
                                                id="serivce_rota" value="{{ old('serivce_rota', $invoice_suppler['serivce_rota']) }}">
                                            @error('serivce_rota')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">مصروفات الحمالة </label>
                                            <input type="text" class="form-control" name="escort_expenses"
                                                id="escort_expenses" value="{{ old('escort_expenses', $invoice_suppler['escort_expenses']) }}">
                                            @error('escort_expenses')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">مصروفات اخرى </label>
                                            <input type="text" class="form-control" name="other_expenses"
                                                id="other_expenses" value="{{ old('other_expenses', $invoice_suppler['other_expenses']) }}">
                                            @error('other_expenses')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">بيان المصروفات </label>
                                            <input type="text" class="form-control" name="statement_expenses"
                                                id="statement_expenses" value="{{ old('statement_expenses', $invoice_suppler['statement_expenses']) }}">
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
                    </form>
                </div>
                <div class="form-group text-center" >
                    <a href="{{ route('Suppler.index') }}" class="btn btn-primary btn-sm"> الرجوع </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/invoice/invoice.js') }}"></script>
@endsection
