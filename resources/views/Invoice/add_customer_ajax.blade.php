<div class="row addCustomerAjax">
<div class="col-md-3">
    <label for="">اسم العميل</label>

    <button type="button" class="btn btn-info btn-flat" title="اضافة عميل جديد"  data-toggle="modal" data-target="#modal-lg">+</button>

    <select name="customer_id" id="customer_id" class="form-control select2">
        <option value="">اختر اسم العميل</option>
        @if (!@empty($customer) && @isset($customer))
            @foreach ($customer as $customer)
                <option @if (old('customer_id') == $customer->id) selected="selected" @endif
                    value="{{ $customer->id }}">{{ $customer->name }} </option>
            @endforeach
        @endif
    </select>
    @error('customer_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">اسم الصنف</label>
    <select name="name_product" id="name_product" class="form-control select2">
        <option value="">اختر اسم الصنف</option>
        @if (!@empty($product) && @isset($product))
            @foreach ($product as $product)
                <option @if (old('name_product') == $product->name) selected="selected" @endif
                    value="{{ $product->name }}">{{ $product->name }} </option>
            @endforeach
        @endif
    </select>
    @error('name_product')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">الكمية </label>
    <input type="text" class="form-control" name="quantity" id="quantity"
        value="{{ old('quantity') }}">
    @error('quantity')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">سعر الوحدة </label>
    <input type="text" class="form-control" name="price" id="price"
        value="{{ old('price') }}">
    @error('price')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">اجمالي السعر</label>
    <input type="text" class="form-control" name="total_befor_tex" id="total_befor_tex"
        value="{{ old('total_befor_tex') }}">
    @error('total_befor_tex')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">الخصم </label>
    <input type="text" class="form-control" name="discount" id="discount"
        value="{{ old('discount',0) }}">
    @error('discount')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">ضريبةالقيمة المضافة </label>
    <input type="text" class="form-control" name="total_tex" id="total_tex"
        value="{{ old('total_tex') }}">
    @error('total_tex')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-3">
    <label for="">السعر شامل الضريبة  </label>
    <input type="text" class="form-control" name="total_after_tex" id="total_after_tex"
        value="{{ old('total_after_tex') }}">
    @error('total_after_tex')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
</div>
