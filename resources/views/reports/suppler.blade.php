@extends('layouts.app')
@section('titel')
    تقرير المورد
@endsection
@section('contentHeader')
    التقارير
@endsection
@section('contentHeaderlink')
    <a href="#">التقارير</a>
@endsection
@section('contentHeaderActive')
    عرض
@endsection
@section('content')

    @if (session()->has('add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
                <div class="card-header ">
                    <a href="{{ route('Suppler.create') }}" class="btn btn-success">اضافة</a>
                    <h3 class="card-title card_title_center">عرض تقارير الموردين </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="ajax_search_url" value="{{ route('report-supplerAjax') }}">
                        <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                            <div class="col-md-6">
                                <label for="">الكود  </label>
                                <input type="text" class="form-control" name="code" id="code"
                                    value="{{ old('code') }}">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="">الاسم </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">من  تاريخ </label>
                                <input type="date" class="form-control" name="start_at" id="start_at"
                                    value=" ">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">لي تاريخ </label>
                                <input type="date" class="form-control" name="end_at" id="end_at"
                                    value=" ">

                                @error('receive')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    </div><br><br>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info btn-sm" id="printReport"> طباعة</button>

                            <button type="submit" class="btn btn-primary btn-sm"> تصدير Exsl </button>

                        </div>
                        <div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">

                    @if (@isset($data) and !@empty($data) and count($data) > 0)
                    <div id="print">
                        <table id="example2" class="table table-bordered table-hover" >
                            <thead  style="background-color: #233490; color:#fff">
                                <tr>
                                    <th>كود المورد  </th>
                                    <th>اسم المورد </th>
                                    <th>رقم الجوال</th>
                                    <th>الرقم الضريبي </th>
                                    <th>العنوان </th>
                                    <th>الكميات </th>
                                    <th>الاجمالي </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $info->customer->code }}</td>
                                        <td>{{ $info->customer->name }}</td>
                                        <td>{{ $info->customer->phone }}</td>
                                        <td>{{ $info->customer->Tex_number }}</td>
                                        <td>{{ $info->customer->address }}</td>
                                        <td>{{ $info->quantity }}</td>
                                        <td>{{ $info->total_after_tex }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script src="{{ asset('assets/admin/js/reports/customer.js') }}"></script>
@endsection
