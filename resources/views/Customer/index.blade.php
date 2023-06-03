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
@if(session()->has('Error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Error') }}</strong>
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
            <a href="{{ route('customer.create') }}" class="btn btn-success">اضافة</a>
          <h3 class="card-title card_title_center" >عرض بيانات  العملاء</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data) &&  count($data)>0)
          <table id="example2" class="table table-bordered table-hover">
            <thead  style="background-color: #233490; color:#fff">
            <tr>
                <th> #</th>
              <th>كود العميل </th>
              <th>اسم العميل</th>
              <th>العنوان</th>
              <th>السجل التجاري </th>
              <th>رقم الهاتف </th>
              <th>رقم الضريبي</th>
              <th>اسم المعرف</th>
              <th>رقم جوال  المعرف </th>
              <th>نسبة الخدمة</th>
              <th>خيارات  </th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($data as $info)
                <tr>
                    <td>{{ $i }}</td>
                    <td><a href="{{ route('customer.check',$info->id) }}">{{ $info->code }}</a></td>
                    <td>{{ $info->name }}</td>
                    <td>{{ $info->address }}</td>
                    <td>{{ $info->commercial_record }}</td>
                    <td>{{ $info->Tex_number }}</td>
                    <td>{{ $info->phone }}</td>
                    <td>{{ $info->name_of_deficience }}</td>
                    <td>{{ $info->phone_deficince }}</td>
                    <td>{{ $info->service_ratio }}</td>
                    <td>
                        <a href="{{ route('customer.print',$info->id) }}" class="btn btn-primary"> طباعة</a>
                        <a href="{{ route('customer.edit',$info->id) }}" class="btn btn-info"> تعديل</a>
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
