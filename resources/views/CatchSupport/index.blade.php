@extends('layouts.app')
@section('titel')
    عرض الاصناف
@endsection
@section('contentHeader')
    الاصناف
@endsection
@section('contentHeaderlink')
    <a href="#">الاصناف</a>
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
                    <a href="{{ route('CatchSupport.create') }}" class="btn btn-success">اضافة</a>
                    <h3 class="card-title card_title_center">عرض بيانات الاصناف</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="ajax_search_url" value="{{ route('CatchSupport.ajavSearch') }}">
                        <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                            <div class="col-md-6">
                                <label for="">رقم السند </label>
                                <input type="text" class="form-control" name="no_support" id="no_support"
                                    value="{{ old('no_support') }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">المستلم </label>
                                <input type="text" class="form-control" name="receive" id="receive"
                                    value="{{ old('receive') }}">
                                @error('receive')
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
                            <button type="submit" class="btn btn-info btn-sm"> طباعة</button>

                            <button type="submit" class="btn btn-primary btn-sm"> تصدير Exsl </button>

                        </div>
                        <div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">

                    @if (@isset($data) and !@empty($data) and count($data) > 0)
                        <table id="example2" class="table table-bordered table-hover" >
                            <thead  style="background-color: #233490; color:#fff">
                                <tr>
                                    <th> #</th>
                                    <th>رقم السند </th>
                                    <th>المستلم </th>
                                    <th>التاريخ</th>
                                    <th>طريقة الدفع</th>
                                    <th>رقم الشيك</th>
                                    <th>اسم البنك</th>
                                    <th>البيان </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->no_support }}</td>
                                        <td>{{ $info->receive }}</td>
                                        <td>{{ $info->date }}</td>
                                        <td>{{ $info->payment }}</td>
                                        <td>{{ $info->number_shek }}</td>
                                        <td>{{ $info->bank }}</td>
                                        <td>{{ $info->statement }}</td>
                                        <td>
                                            <a href="{{ route('Product.edit', $info->id) }}" class="btn btn-info"> تعديل</a>
                                            <a href="" class="btn btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    @else
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script src="{{ asset('assets/admin/js/CatchSupport/CatchSupport.js') }}"></script>
@endsection
