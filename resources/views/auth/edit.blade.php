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
@section('contentHeaderstatus')
    تعديل
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
                    <h3 class="card-title card_title_center">تعديل بيانات العميل</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('user.update', $data['id']) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" id="id" value="{{ old('id', $data['id']) }}">
                                <label for="">كود </label>
                                <input type="text" class="form-control" name="com_code" id="com_code"
                                    value="{{ old('com_code', $data['com_code']) }}">
                                @error('com_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">الاسم </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $data['name']) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email', $data['email']) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">اسم المستخدم </label>
                                <input type="text" class="form-control" name="username" id="username"
                                    value="{{ old('username', $data['username']) }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">كلمة المرور </label>
                                <input type="password" class="form-control" name="password" id="password"
                                    value="{{ old('password') }}"
                                    placeholder="اترك كلمة المرور فارغة اذا كنت لا تريد تغيرها">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">تاكيد كلمة المرور </label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" value="{{ old('password') }}">

                            </div>

                            <div class="col-md-6"> <label for="">حالة التفعيل </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">اختر الحالة</option>
                                    <option
                                        @if (old('status') == 1) selected="selected" @else @if ($data['status'] == 1) selected="selected" @endif
                                        @endif value="1">مفعل </option>
                                    <option
                                        @if (old('status') == 0 and old('is_master') != null) selected="selected"@else @if ($data['status'] == 0) selected="selected" @endif
                                        @endif value="0">معطل</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm"> تعديل</button>
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
