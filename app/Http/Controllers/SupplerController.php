<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplerRequest;
use App\Models\InvoiceCustomer;
use App\Models\InvoiceSuppler;
use App\Models\Suppler;
use Illuminate\Http\Request;

class SupplerController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
        $data=Suppler::where('com_code',$com_code)->get();
        return view('Suppler.index',['data'=>$data]);
    }
    public function create(){
        return view('Suppler.create');
    }
    public function store(SupplerRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Suppler::where('name',$request->name)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم المورد مسجل من قبل')->withInput();
            }
            $data_insert['name']=$request->name;
            $data_insert['com_code']=$com_code;
            $data_insert['code']=$request->code;
            $data_insert['phone']=$request->phone;
            $data_insert['address']=$request->address;
            $data_insert['Tex_number']=$request->Tex_number;
            $data_insert['commercial_record']=$request->commercial_record;
            $data_insert['name_of_deficience']=$request->name_of_deficience;
            $data_insert['phone_deficince']=$request->phone_deficince;
            $data_insert['service_ratio']=$request->service_ratio;
            $data_insert['tex_ratio']=$request->tex_ratio;
            $data_insert['custom_field_1']=$request->custom_field_1;
            $data_insert['custom_field_2']=$request->custom_field_2;
            $data_insert['custom_field_3']=$request->custom_field_3;
            $data_insert['date']=date('Y-m-d');
            Suppler::create($data_insert);
            return redirect()->route('Suppler.index')->with('add','تمت اضافة البيانات بنجاح');
        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','  عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
    public function edit($id){
        $com_code=auth()->user()->com_code;
        $data=Suppler::where('id',$id)->where('com_code',$com_code)->first();
        return view('Suppler.edit',['data'=>$data]);
    }
    public function update(SupplerRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $id=$request->id;
            $data=Suppler::where('name',$request->name)->where('id','!=',$request->id)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم المورد مسجل من قبل')->withInput();
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
            $data_update['tex_ratio']=$request->tex_ratio;
            $data_update['custom_field_1']=$request->custom_field_1;
            $data_update['custom_field_2']=$request->custom_field_2;
            $data_update['custom_field_3']=$request->custom_field_3;

            $flag=Suppler::find($request->id)->where('com_code',$com_code)->update($data_update);
            if($flag){
            return redirect()->route('Suppler.index')->with('add','تمت تعديل البيانات بنجاح');}
        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
    public function check($id){
        $com_code=auth()->user()->com_code;

        $invoice_suppler=InvoiceSuppler::where('suppler_id',$id)->where('com_code',$com_code)->first();
        if ($invoice_suppler == '') {
            return redirect()->back()->with('Error','عفوا لم يتم اجراء عملية  بيع حتى الان');
        }
        $invoice_suppler_id=InvoiceSuppler::where('suppler_id',$id)->where('com_code',$com_code)->first()->id;
        $invoice_customer=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->get();
        $quantity=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('quantity');
        $total_befor_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_befor_tex');
        $total_after_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_after_tex');
        $total_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_tex');
        $discount=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('discount');

        return view('Suppler.checkSuppler',compact('invoice_suppler','invoice_customer','quantity',
        'total_befor_tex','total_after_tex','total_tex','discount'));
    }
}
