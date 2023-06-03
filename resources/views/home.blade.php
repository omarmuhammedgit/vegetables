@extends('layouts.app')
@section('titel')
test title
@endsection
@section('contentHeader')
الرئيسية
@endsection
@section('contentHeaderlink')
<a href="#">الرئيسية</a>
@endsection
@section('contentHeaderActive')
عرض
@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $total_befor_tex }}</h3>

              <p>اجمالي المبيعات </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $total_tex }}<sup style="font-size: 20px"></sup></h3>

              <p>اجمالي الضريبة القيمة المضافة</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $escort_expenses + $other_expenses }}</h3>

              <p>المصاريف</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $total_after_tex }}</h3>

              <p>الصافي</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header ">
                    <a href="{{ route('customer.create') }}" class="btn btn-success">اضافة عميل</a>
                    <h3 class="card-title card_title_center">عرض اخر عملية اضافة العملاء </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @php
                        $i = 1;
                        // $data=[];
                    @endphp

                    @if (@isset($data) && !@empty($data) &&  count($data)>0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead style="background-color: #233490; color:#fff">
                                <tr>
                                    <th> #</th>
                                    <th>اسم العميل</th>
                                    <th>رقم الهاتف </th>
                                    <th>اجمالي المبيعات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->customer->name }}</td>
                                        <td>{{ $info->customer->phone }}</td>
                                        <td>{{ $info->total_after_tex }}</td>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table><br><br>

                        <div class="form-group text-center">
                            <a href="{{ route('customer.index') }}" class="btn btn-info btn-sm"> عرص المذيد</a>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                عفوا لا يوجد بيانات لعرضها
                            </div>
                        @endif
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <a href="{{ route('Suppler.create') }}" class="btn btn-primary">اضافة مورد</a>
                    <h3 class="card-title card_title_center">عرض  اخر عملية اضافة الموردين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if (@isset($invoice_suppler) && !@empty($invoice_suppler) &&  count($invoice_suppler)>0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead style="background-color: #233490; color:#fff">
                                <tr>
                                    <th> #</th>
                                    <th>اسم المورد</th>
                                    <th>رقم الهاتف </th>
                                    <th>اجمالي المبيعات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($invoice_suppler as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->suppler->name }}</td>
                                        <td>{{ $info->suppler->phone }}</td>
                                        <td>{{ $info->total_include_tex }}</td>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table><br><br>

                <div class="form-group text-center">
                    <a href="{{ route('Suppler.index') }}" class="btn btn-info btn-sm"> عرص المذيد</a>
                    </div>
                        @else
                            <div class="alert alert-danger">
                                عفوا لا يوجد بيانات لعرضها
                            </div>
                        @endif

                </div>

            </div>
            <!-- /.col (right) -->
        </div>

    {{-- <div class="row"> --}}
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <a href="{{ route('invoiceSuppler.index') }}" class="btn btn-primary">اضافة فاتورة</a>
                    <h3 class="card-title card_title_center">  عمليات البيع الاخيرة</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($invoice_suppler) && !@empty($invoice_suppler) &&  count($invoice_suppler)>0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th> #</th>
                                    <th>اسم المورد</th>
                                    <th>رقم الجوال</th>
                                    <th>رقم الفاتورة  </th>
                                    <th>مبلغ الفاتورة  </th>
                                    <th> تاريخ البيع</th>
                                    <th>المصروفات </th>
                                    <th>خيارات </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($invoice_suppler as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->suppler->name }}</td>
                                        <td>{{ $info->suppler->phone }}</td>
                                        <td>{{ $info->no_invoice }}</td>
                                        <td>{{ $info->total_include_tex }}</td>
                                        <td>{{ $info->date }}</td>
                                        <td>{{ $info->escort_expenses + $info->other_expenses}}</td>
                                        <td>
                                            <a href="{{ route('Suppler.edit', $info->id) }}" class="btn btn-info"> تعديل</a>
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
    {{-- </div> --}}


    </div>
@endsection
@section('script')

@endsection
