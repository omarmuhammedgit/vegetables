@extends('layouts.app')
@section('titel')
    العميل
@endsection
@section('contentHeader')
    العميل
@endsection
@section('contentHeaderlink')
    <a href="{{ route('customer.index') }}">العملاء</a>
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
                    <h3 class="card-title card_title_center">اضافة بيانات العميل</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            @php
                            $com_code=auth()->user()->com_code;
                            $code = !empty(\App\Models\Customer::where('com_code',$com_code)->latest()->first()->code) ? ($code = \App\Models\Customer::where('com_code',$com_code)->latest()->first()->code) : 0000;
                            // $number_invoice=!empty($)?$number_invoice:0000;
                            $code = str_pad($code + 1, 5, 0, STR_PAD_LEFT);
                        @endphp
                            <label for="">كود  العميل</label>
                            <input type="text" class="form-control" name="code" id="code" value="{{ old('code',$code) }}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">اسم العميل</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">العنوان</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الهوية/ سجل التجاري</label>
                            <input type="number" class="form-control" name="commercial_record" id="commercial_record" value="{{ old('commercial_record') }}">
                            @error('commercial_record')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الهاتف</label>
                            <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الضريبي</label>
                            <input type="number" class="form-control" name="Tex_number" id="Tex_number" value="{{ old('Tex_number') }}">
                            @error('Tex_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">اسم المعرف</label>
                            <input type="text" class="form-control" name="name_of_deficience" id="name_of_deficience" value="{{ old('name_of_deficience') }}">
                            @error('name_of_deficience')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الجوال المعرف</label>
                            <input type="number" class="form-control" name="phone_deficince" id="phone_deficince" value="{{ old('phone_deficince') }}">
                            @error('phone_deficince')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">نسبة الخدمة</label>
                            <input type="text" class="form-control" name="service_ratio" id="service_ratio" value="{{ old('service_ratio') }}">
                            @error('service_ratio')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">مخصص_1</label>
                            <input type="text" class="form-control" name="custom_field_1" id="custom_field_1" value="{{ old('custom_field_1') }}">
                            @error('custom_field_1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">مخصص_2</label>
                            <input type="text" class="form-control" name="custom_field_2" id="custom_field_2" value="{{ old('custom_field_2') }}">
                            @error('custom_field_2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">مخصص_3</label>
                            <input type="text" class="form-control" name="custom_field_3" id="custom_field_3" value="{{ old('custom_field_3') }}">
                            @error('custom_field_3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
