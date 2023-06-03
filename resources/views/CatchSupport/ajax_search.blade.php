<div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">
    @if (@isset($data) && !@empty($data) && count($data)>0)
    {{-- @empty($data)

    @endempty --}}
    <table id="example2" class="table table-bordered table-hover" >
        <thead  style="background-color: #233490; color:#fff">
            <tr>
                <th> #</th>
                <th>رقم السند </th>
                <th>المستلم </th>
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
                    <td>{{ $info->receive }}</td>
                    <td>{{ $info->date }}</td>
                    <td>{{ $info->payment }}</td>
                    <td>{{ $info->number_shek }}</td>
                    <td>{{ $info->bank }}</td>
                    <td>{{ $info->statement }}</td>
                    <td>
                        <a href="{{ route('Product.edit', $info->id) }}" class="btn btn-info"> تعديل</a>
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
