@extends('layouts.app')
@section('titel')
    اعدادات الضبط العام
@endsection
@section('contentHeader')
    ضبط العام
@endsection
@section('contentHeaderlink')
    <a href="#">الاعدادات</a>
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
                    <h3 class="card-title card_title_center">اضافة اعدادات </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('Setting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4>معلومات المنشاة</h4>
                        <div class="form-group">
                            <label for="">اسم الشركة* </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                                placeholder=" ">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">عنوان الشركة* </label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}"
                                placeholder=" ">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الهاتف* </label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}"
                                placeholder="من فضلك ادخال رقم الهاتف الشركة">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الهاتف 2 </label>
                            <input type="number" name="phone2" id="phone2" class="form-control" value="{{ old('phone2') }}"
                                placeholder="من فضلك ادخال رقم الهاتف 2 الشركة">
                            @error('phone2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم السجيل التجاري* </label>
                            <input type="number" name="no_recode" id="no_recode" class="form-control" value="{{ old('no_recode') }}"
                                placeholder="من فضلك ادخال رقم السجل التجاري الشركة">
                            @error('no_recode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الضريبة *</label>
                            <input type="number" name="no_tex" id="no_tex" class="form-control" value="{{ old('no_tex') }}"
                                placeholder="من فضلك ادخال رقم الضريبة الشركة">
                            @error('no_tex')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">البريد الالكتروني </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                                placeholder="من فضلك ادخال البريد الالكتروني ">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <h4>تهئية العامة </h4>
                            <div class="form-group">
                                <label for="">رمز الفاتورة  </label>
                                <input type="text" name="inv_code" id="inv_code" class="form-control" value="{{ old('inv_code') }}"
                                    placeholder="من فضلك ادخال رمز الفاتورة ">
                                @error('inv_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">رمز العميل  </label>
                                <input type="text" name="cust_code" id="cust_code" class="form-control" value="{{ old('cust_code') }}"
                                    placeholder="من فضلك ادخال رمز العميل ">
                                @error('cust_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">رمز المورد   </label>
                                <input type="text" name="sup_code" id="sup_code" class="form-control" value="{{ old('sup_code') }}"
                                    placeholder="من فضلك ادخال رمز المورد ">
                                @error('sup_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">رمز المنتج </label>
                                <input type="text" name="pro_code" id="pro_code" class="form-control" value="{{ old('pro_code') }}"
                                    placeholder="من فضلك ادخال رمز المنتج ">
                                @error('pro_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">رمز الصرف</label>
                                <input type="text" name="suport_code" id="suport_code" class="form-control" value="{{ old('suport_code') }}"
                                    placeholder="من فضلك ادخال رمز الصرف  ">
                                @error('suport_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">رمز القبض</label>
                                <input type="text" name="catch_code" id="catch_code" class="form-control" value="{{ old('catch_code') }}"
                                    placeholder="من فضلك ادخال رمز القبض  ">
                                @error('catch_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <h4>اسم الضريبة  </h4>
                                <div class="form-group">
                                    <label for="">اسم الضريبة   </label>
                                    <input type="text" name="name_tex" id="name_tex" class="form-control" value="{{ old('name_tex') }}"
                                        placeholder=" ">
                                    @error('name_tex')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">نسبة الضريبة   </label>
                                    <input type="number" name="tex_rote" id="tex_rote" class="form-control" value="{{ old('tex_rote') }}"
                                        placeholder="من فضلك ادخال نسبة الضريبة">
                                    @error('tex_rote')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <h4>نسبة الخدمةالافتراضية   </h4>
                                    <div class="form-group">
                                        <label for="">نسبة الخدمة    </label>
                                        <input type="number" name="service_rote" id="service_rote" class="form-control" value="{{ old('service_rote') }}"
                                            placeholder="من فضلك ادخال نسبة الخدمة ">
                                        @error('service_rote')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <h4>الاسماء المخصصة   </h4>
                                        <div class="form-group">
                                            <label for="">مخصص_1    </label>
                                            <input type="text" name="custom_fiald_1" id="custom_fiald_1" class="form-control" value="{{ old('custom_fiald_1') }}"
                                                placeholder=" ">
                                            @error('custom_fiald_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">مخصص_2    </label>
                                            <input type="text" name="custom_fiald_2" id="custom_fiald_2" class="form-control" value="{{ old('custom_fiald_2') }}"
                                                placeholder="">
                                            @error('custom_fiald_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                <a href="{{ route('Setting.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                </div>

                    </form>


                </div>
            </div>
        </div>
    @endsection
    @section('script')
    @endsection
