<div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">
    @if (@isset($data) && !@empty($data) && count($data)>0)
    {{-- @empty($data)

    @endempty --}}
    <table id="example2" class="table table-bordered table-hover" >
        <thead  style="background-color: #233490; color:#fff">
            <tr>
                <th>كود العميل  </th>
                <th>اسم العميل </th>
                <th>رقم الجوال</th>
                <th>الرقم الضريبي </th>
                <th>العنوان </th>
                <th>الكميات </th>
                <th>الاجمالي </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $info)
                <tr>
                    <td>{{ $info->customer->code }}</td>
                    <td>{{ $info->customer->name }}</td>
                    <td>{{ $info->customer->phone }}</td>
                    <td>{{ $info->customer->Tex_number }}</td>
                    <td>{{ $info->customer->address }}</td>
                    <td>{{ $info->quantity }}</td>
                    <td>{{ $info->total_after_tex }}</td>

                </tr>
            @endforeach

        </tbody>
    </table>

    @else
        <div class="alert alert-danger">
            عفوا لا يوجد بيانات لعرضها
        </div>

    @endif

</div>
