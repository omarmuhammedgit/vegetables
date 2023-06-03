@extends('layouts.app')
@section('titel')
    سند الصرف
@endsection
@section('contentHeader')
    سند الصرف
@endsection
@section('contentHeaderlink')
    <a href="#">سند الصرف</a>
@endsection
@section('contentHeaderActive')
    اضافة
@endsection
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    <h3 class="card-title card_title_center">اضافة سند الصرف </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('Exchanges.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @php
                                $com_code=auth()->user()->com_code;
                                    $no_support = !empty(\App\Models\ExchangeSupport::where('com_code',$com_code)->latest()->first()->no_support) ? ($no_support = \App\Models\ExchangeSupport::where('com_code',$com_code)->latest()->first()->no_support) : 0000;
                                    // $number_invoice=!empty($)?$number_invoice:0000;
                                    $no_support = str_pad($no_support + 1, 5, 0, STR_PAD_LEFT);
                                @endphp
                                <label for="">رقم السند </label>
                                <input type="text" class="form-control" name="no_support" id="no_support"
                                    value="{{ old('no_support', $no_support) }}">
                                @error('no_support')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="">التاريخ </label>
                                <input type="date" class="form-control" name="date" id="date"
                                    value="@php echo date('Y-m-d') @endphp">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">مصروف لي   </label>
                                <input type="text" class="form-control" name="exchange" id="exchange"
                                    value="{{ old('exchange') }}">
                                @error('exchange')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">المبلغ شامل  الضريبة </label>
                                <input type="text" class="form-control" name="total" id="total"
                                    value="{{ old('total') }}">
                                @error('total')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">مبلغ الضريبة </label>
                                <input type="text" class="form-control" name="tex" id="tex"
                                    value="{{ old('tex') }}">
                                @error('tex')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">البيان </label>
                                <input type="text" class="form-control" name="statement" id="statement"
                                    value="{{ old('statement') }}">
                                @error('statement')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><br>
                        <div class="col-md-4">
                            <label for="">طريقة الدفع </label>
                            <select name="payment" id="payment" class="form-control">
                                <option value="">اختر طريقة الدفع</option>
                                <option @if (old('payment')=="كاش") selected="selected" @endif value="كاش"> كاش</option>
                                <option @if (old('payment')=="شيك") selected="selected" @endif value="شيك"> شيك</option>
                                <option @if (old('payment')=="شبكة") selected="selected" @endif value="شبكة"> شبكة</option>

                            </select>
                            @error('payment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                            <div class="col-md-4">
                                <label for="">رقم الشيك </label>
                                <input type="text" class="form-control" name="number_shek" id="number_shek"
                                    value="{{ old('number_shek') }}">
                                @error('number_shek')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">البنك </label>
                                <input type="text" class="form-control" name="bank" id="bank"
                                    value="{{ old('bank') }}">
                                @error('bank')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                            <button type="button" class="btn btn-success btn-sm" id="printdiv"> طباعة</button>
                            <a href="{{ route('Exchanges.index') }}" class="btn btn-primary btn-sm"> الالغاء</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body" id="print" style="display: none">

                    <div class="row">
                        <div class="col-md-12">

                            <label for="">رقم السند </label>
                            <p  id="no_support2"></p>
                        </div>
                        <div class="col-md-12">
                            <label for="">التاريخ </label>
                            <input type="text" class="form-control" name="date2" id="date"
                                value="@php echo date('Y-m-d') @endphp">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12" style="text-align: center">
                            <label for="">استلم من </label>
                            <p  id="exchange2"></p>
                        </div>
                        <div class="col-md-12" style="text-align: center">
                            <label for="">البيان </label>
                            <p  id="statmenet2"></p>
                        </div></div>
                        <div class="row">
                        <div class="col-md-4">
                            <label for="">طريقة الدفع</label>
                            <p  id="payment2"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="">رقم الشيك</label>
                            <p  id="shek2"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="">اسم البنك  </label>
                            <p id="bank2"></p>
                        </div>

                        <div class="col-md-4">
                            <label for="">المبلغ غير شامل الضريبة</label>
                            <p id="totalnottex"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="">المبلغ الضريبة </label>
                            <p id="tex2"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="">الاجمالي  </label>
                            <p id="total2"></p>
                        </div>
                    </div><br>

            </div>
        </div>
    </div>
@endsection
@section('script')

<script src="{{ asset('assets/admin/js/Exchanges/Exchanges.js') }}"></script>
@endsection
