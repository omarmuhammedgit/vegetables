@extends('layouts.app')
@section('titel')
    الاصناف
@endsection
@section('contentHeader')
الاصناف
@endsection
@section('contentHeaderlink')
    <a href="#">الاصناف</a>
@endsection
@section('contentHeaderActive')
    اضافة
@endsection
@section('content')

@if(session()->has('error'))
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
                    <h3 class="card-title card_title_center">اضافة صنف جديد </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('Product.store') }}" method="post">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                            @php

                            $com_code=auth()->user()->com_code;
                            $code = !empty(\App\Models\Product::where('com_code',$com_code)->latest()->first()->code) ? ($code = \App\Models\Product::where('com_code',$com_code)->latest()->first()->code) : 0000;
                            $code = str_pad($code + 1, 5, 0, STR_PAD_LEFT);
                        @endphp
                            <label for="">كود  الصنف</label>
                            <input type="text" class="form-control" name="code" id="code" value="{{ old('code',$code) }}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">اسم الصنف  </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                </div>

            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                <a href="{{ route('Product.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
