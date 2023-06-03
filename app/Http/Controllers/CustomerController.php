<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\InvoiceCustomer;
use App\Models\InvoiceSuppler;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Suppler;
use Illuminate\Http\Request;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;

class CustomerController extends Controller
{

    public function index(){
        $com_code=auth()->user()->com_code;
        $data=Customer::where('com_code',$com_code)->get();
        return view('Customer.index',['data'=>$data]);
    }
    public function create(){
        return view('Customer.create');
    }
    public function store(CustomerRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Customer::where('name',$request->name)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم العميل مسجل من قبل')->withInput();
            }
            $data_insert['name']=$request->name;
            $data_insert['code']=$request->code;
            $data_insert['com_code']=$com_code;
            $data_insert['phone']=$request->phone;
            $data_insert['address']=$request->address;
            $data_insert['Tex_number']=$request->Tex_number;
            $data_insert['commercial_record']=$request->commercial_record;
            $data_insert['name_of_deficience']=$request->name_of_deficience;
            $data_insert['phone_deficince']=$request->phone_deficince;
            $data_insert['service_ratio']=$request->service_ratio;
            $data_insert['custom_field_1']=$request->custom_field_1;
            $data_insert['custom_field_2']=$request->custom_field_2;
            $data_insert['custom_field_3']=$request->custom_field_3;
            $data_insert['date']=date('Y-m-d');
            Customer::create($data_insert);
            return redirect()->route('customer.index')->with('add','تمت اضافة البيانات بنجاح');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
    public function edit($id){
        $com_code=auth()->user()->com_code;
        $data=Customer::where('id',$id)->first();
        return view('Customer.edit',['data'=>$data]);
    }
    public function update(CustomerRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Customer::where('name',$request->name)->where('id','!=',$request->id)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم العميل مسجل من قبل')->withInput();
            }
            $data_update['name']=$request->name;
            $data_update['code']=$request->code;
            $data_update['phone']=$request->phone;
            $data_update['address']=$request->address;
            $data_update['Tex_number']=$request->Tex_number;
            $data_update['commercial_record']=$request->commercial_record;
            $data_update['name_of_deficience']=$request->name_of_deficience;
            $data_update['phone_deficince']=$request->phone_deficince;
            $data_update['service_ratio']=$request->service_ratio;
            $data_update['custom_field_1']=$request->custom_field_1;
            $data_update['custom_field_2']=$request->custom_field_2;
            $data_update['custom_field_3']=$request->custom_field_3;

            $flag=Customer::find($request->id)->where('com_code',$com_code)->update($data_update);
            if($flag){
            return redirect()->route('customer.index')->with('add','تمت تعديل البيانات بنجاح');}
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }

    public function check($id){
        $com_code=auth()->user()->com_code;

        $invoice_customer=InvoiceCustomer::select('date','customer_id','no_invoice')->where('customer_id',$id)->where('com_code',$com_code)->first();
        $data=InvoiceCustomer::where('customer_id',$id)->get();
        // $invoice_suppler=InvoiceCustomer::select('invoice_suppler_id')->where('customer_id',$id)->where('com_code',$com_code)->get();
        if ($invoice_customer == '') {
            return redirect()->back()->with('Error','عفوا لم يتم اجراء عملية  بيع حتى الان');
        }
        $quantity=InvoiceCustomer::where('customer_id',$id)->where('com_code',$com_code)->sum('quantity');
        $total_befor_tex=InvoiceCustomer::where('customer_id',$id)->where('com_code',$com_code)->sum('total_befor_tex');
        $total_after_tex=InvoiceCustomer::where('customer_id',$id)->where('com_code',$com_code)->sum('total_after_tex');
        $total_tex=InvoiceCustomer::where('customer_id',$id)->where('com_code',$com_code)->sum('total_tex');
        $discount=InvoiceCustomer::where('customer_id',$id)->where('com_code',$com_code)->sum('discount');

        return view('Customer.checkCustomer',compact('invoice_customer','data','quantity',
        'total_befor_tex','total_after_tex','total_tex','discount'));
    }

    public function print($id){
        $com_code=auth()->user()->com_code;

        $invoice_customer=InvoiceCustomer::select('date','customer_id','no_invoice')->where('customer_id',$id)->where('com_code',$com_code)->first();
        if ($invoice_customer == '') {
            return redirect()->back()->with('Error','عفوا لم يتم اجراء عملية  بيع حتى الان');
        }
        $invoice_suppler=InvoiceCustomer::where('customer_id',$id)->where('com_code',$com_code)->latest()->first()->invoice_suppler_id;
        $data=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler)->where('customer_id',$id)->where('com_code',$com_code)->get();

        $quantity=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler)->where('customer_id',$id)->where('com_code',$com_code)->sum('quantity');
        $total_befor_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler)->where('customer_id',$id)->where('com_code',$com_code)->sum('total_befor_tex');
        $total_after_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler)->where('customer_id',$id)->where('com_code',$com_code)->sum('total_after_tex');
        $total_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler)->where('customer_id',$id)->where('com_code',$com_code)->sum('total_tex');
        $discount=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler)->where('customer_id',$id)->where('com_code',$com_code)->sum('discount');
        $setting=Setting::where('com_code',$com_code)->first();
         $date=date("Y-m-d h:i:s");
        if ($setting) {
            // data:image/png;base64, .........
            $displayQRCodeAsBase64 = GenerateQrCode::fromArray([
                new Seller($setting['name']), // seller name
                new TaxNumber($setting['1234567891']), // seller tax number
                new InvoiceDate($date), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
                new InvoiceTotalAmount($total_after_tex), // invoice total amount
                new InvoiceTaxAmount($total_tex) // invoice tax amount
                // TODO :: Support others tags
            ])->render();

        } else {
            $displayQRCodeAsBase64=[];

        }



        return view('Customer.print',compact('invoice_customer','data','quantity','setting',
        'total_befor_tex','total_after_tex','total_tex','discount','displayQRCodeAsBase64'));
    }
    public function addAjaxCustomer(Request $request){
        if($request->ajax()){
            // try {
                $com_code=auth()->user()->com_code;
                $data=Customer::where('name',$request->name)->where('com_code',$com_code)->first();
                if($data){
                    return redirect()->back()->with('error','عفوا اسم العميل مسجل من قبل')->withInput();
                }
                $data_insert['name']=$request->name;
                $data_insert['code']=$request->code;
                $data_insert['com_code']=$com_code;
                $data_insert['phone']=$request->phone;
                $data_insert['address']=$request->address;
                $data_insert['Tex_number']=$request->Tex_number;
                $data_insert['commercial_record']=$request->commercial_record;
                $data_insert['name_of_deficience']=$request->name_of_deficience;
                $data_insert['phone_deficince']=$request->phone_deficince;
                $data_insert['service_ratio']=$request->service_ratio;
                $data_insert['custom_field_1']=$request->custom_field_1;
                $data_insert['custom_field_2']=$request->custom_field_2;
                // $data_insert['custom_field_3']=$request->custom_field_3;
                $data_insert['date']=date('Y-m-d');
                Customer::create($data_insert);
                $customer=Customer::where('com_code',$com_code)->orderBy('id','DESC')->get();
                $product=Product::where('com_code',$com_code)->get();

                return view('Invoice.addAjaxCustomer',compact('customer','product'));
            // } catch (\Exception $ex) {
            //     return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
            // }


        }
    }
}
