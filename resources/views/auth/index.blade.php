@extends('layouts.app')
@section('titel')
المستخدمين
@endsection
@section('contentHeader')
المستخدمين
@endsection
@section('contentHeaderlink')
<a href="#">المستخدمين</a>
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
            <a href="{{ route('user.create') }}" class="btn btn-success">اضافة</a>
          <h3 class="card-title card_title_center" >عرض  بيانات  المستخدمين</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data) &&  count($data)>0)
          <table id="example2" class="table table-bordered table-hover">
            <thead   style="background-color: #233490; color:#fff">
            <tr>
                <th> #</th>
              <th>كود  </th>
              <th>الاسم </th>
              <th>اسم المستخدم</th>
              <th>البريد الالكتروني </th>
              <th>حالة المستخدم </th>
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
                    <td>{{ $info->com_code }}</td>
                    <td>{{ $info->name }}</td>
                    <td>{{ $info->username }}</td>
                    <td>{{ $info->email }}</td><td>
                        @if ($info->status == 1)
                            مفعل
                        @else
                            معطل
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.edit',$info->id) }}" class="btn btn-info"> تعديل</a>
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
