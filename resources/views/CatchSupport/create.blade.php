@extends('layouts.app')
@section('titel')
    سند القبض
@endsection
@section('contentHeader')
    سند القبض
@endsection
@section('contentHeaderlink')
    <a href="#">سند القبض</a>
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
                    <h3 class="card-title card_title_center">اضافة سند قبض </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('CatchSupport.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @php
                                $com_code=auth()->user()->com_code;
                                    $no_support = !empty(\App\Models\CatchSupport::where('com_code',$com_code)->latest()->first()->no_support) ? ($no_support = \App\Models\CatchSupport::where('com_code',$com_code)->latest()->first()->no_support) : 0000;
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
                                <label for="">استلم من  </label>
                                <input type="text" class="form-control" name="receive" id="receive"
                                    value="{{ old('receive') }}">
                                @error('receive')
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script src="{{ asset('assets/admin/js/CatchSupport/CatchSupport.js') }}"></script>
@endsection
