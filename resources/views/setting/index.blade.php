@extends('layouts.app')
@section('titel')
الاعدادات
@endsection
@section('contentHeader')
الاعدادات
@endsection
@section('contentHeaderlink')
<a href="#">الاعدادات</a>
@endsection
@section('contentHeaderActive')
عرض
@endsection
@section('content')

@if(session()->has('add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
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
        <div class="card-header ">
            @if (@empty($data))
            <a href="{{ route('Setting.create') }}" class="btn btn-success">اضافة</a>

            @else
            <a href="{{ route('Setting.edit',$data['id']) }}" class="btn btn-success">تعديل</a>

            @endif
          <h3 class="card-title card_title_center" >عرض  بيانات  الاعدادات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data))
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="2">معلومات المنشاة</td>
                        </tr>
                        <tr>
                            <td class="width30">اسم الشركة</td>
                            <td>{{ $data['name'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">عنوان الشركة</td>
                            <td>{{ $data['address'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">رقم السجل التجاري </td>
                            <td>{{ $data['no_recode'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">رقم الهاتف الشركة</td>
                            <td>
                            {{ $data['phone'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">رقم الهاتف 2 الشركة</td>
                            <td>
                            {{ $data['phone2'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">عنوان الشركة</td>
                            <td>{{ $data['address'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">تهئية العامة </td>
                        </tr>
                        <tr>
                            <td class="width30">رمز الفاتورة </td>
                            <td>{{ $data['inv_code'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">رمز العميل   </td>
                            <td>{{ $data['cust_code'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">رمز المورد  </td>
                            <td>
                            {{ $data['sup_code'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">رمز المنتج</td>
                            <td>
                            {{ $data['pro_code'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">رمز الصرف</td>
                            <td>
                            {{ $data['suport_code'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">رمز القبض </td>
                            <td>{{ $data['catch_code'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">اسم الصريبة  </td>
                        </tr>
                        <tr>
                            <td class="width30">اسم الضريبة  </td>
                            <td>{{ $data['name_tex'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">نسبة الضريبة    </td>
                            <td>{{ $data['tex_rote'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">نسبة الخدمة الافتراضية   </td>
                        </tr>
                        <tr>
                            <td class="width30">نسبة الخدمة   </td>
                            <td>{{ $data['service_rote'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">الاسماء المخصصة</td>
                        </tr>
                        <tr>
                            <td class="width30">مخصص_1   </td>
                            <td>{{ $data['custom_fiald_1'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">مخصص_2</td>
                            <td>{{ $data['custom_fiald_2'] }}</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">
                    عفوا لا يوجد بيانات لعرضها
                </div>
            @endif
        </div>
      </div>
    </div>
</div>


@endsection
@section('script')

@endsection
