@extends('layouts.app')
@section('titel')
    سند الصرف
@endsection
@section('contentHeader')
الصرف
@endsection
@section('contentHeaderlink')
    <a href="#">الصرف</a>
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
                    <a href="{{ route('Exchanges.create') }}" class="btn btn-success">اضافة</a>
                    <h3 class="card-title card_title_center">عرض بيانات الصرف</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="ajax_search_url" value="{{ route('Exchanges.ajavSearch') }}">
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
                                <label for="">مصروف لي </label>
                                <input type="text" class="form-control" name="exchange" id="exchange"
                                    value="{{ old('exchange') }}">
                                @error('exchange')
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

                                @error('exchange')
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
                                    <th> #</th>
                                    <th>رقم السند </th>
                                    <th>مصروف لي </th>
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
                                        <td>{{ $info->exchange }}</td>
                                        <td>{{ $info->date }}</td>
                                        <td>{{ $info->payment }}</td>
                                        <td>{{ $info->number_shek }}</td>
                                        <td>{{ $info->bank }}</td>
                                        <td>{{ $info->statement }}</td>

                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
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
<script src="{{ asset('assets/admin/js/Exchanges/Exchanges.js') }}"></script>
@endsection
