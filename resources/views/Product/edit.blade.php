@extends('layouts.app')
@section('titel')
    العملاء
@endsection
@section('contentHeader')
العملاء
@endsection
@section('contentHeaderlink')
    <a href="#">العملاء</a>
@endsection
@section('contentHeaderActive')
    تعديل
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
                    <h3 class="card-title card_title_center">تعديل بيانات العميل</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('Product.update',$data['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                               <input type="hidden" name="id" id="id" value="{{ $data['id'] }}">
                                <label for="">كود  الصنف</label>
                                <input type="text" class="form-control" name="code" id="code" value="{{ old('code',$data['code']) }}">
                                @error('code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">اسم الصنف  </label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$data['name']) }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm"> تعديل</button>
                <a href="{{ route('Product.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
