<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index(){
        $com_code=auth()->user()->com_code;
        $data=Setting::where('com_code',$com_code)->first();
        return view('Setting.index',['data'=>$data]);
    }
    public function create(){
        return view('Setting.create');
    }
    public function store(SettingRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Setting::where('name',$request->name)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم الشركة  مسجل من قبل')->withInput();
            }
            $data_insert['name']=$request->name;
            $data_insert['com_code']=$com_code;
            $data_insert['phone2']=$request->phone2;
            $data_insert['sup_code']=$request->sup_code;
            $data_insert['no_tex']=$request->no_tex;
            $data_insert['no_recode']=$request->no_recode;
            $data_insert['cust_code']=$request->cust_code;
            $data_insert['inv_code']=$request->inv_code;
            $data_insert['email']=$request->email;
            $data_insert['catch_code']=$request->catch_code;
            $data_insert['phone']=$request->phone;
            $data_insert['address']=$request->address;
            $data_insert['suport_code']=$request->suport_code;
            $data_insert['pro_code']=$request->pro_code;
            $data_insert['added_by']=auth()->user()->name;
            $data_insert['name_tex']=$request->name_tex;
            $data_insert['tex_rote']=$request->tex_rote;
            $data_insert['service_rote']=$request->service_rote;
            $data_insert['custom_fiald_1']=$request->custom_field_1;
            $data_insert['custom_fiald_2']=$request->custom_field_2;

            // $data_insert['date']=date('Y-m-d');

            $flag=Setting::create($data_insert);
            if ($flag) {
                return redirect()->route('Setting.index')->with('add','تمت اضافة البيانات بنجاح');

            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
    public function edit($id){
        $com_code=auth()->user()->com_code;
        $data=Setting::where('id',$id)->where('com_code',$com_code)->first();
        return view('Setting.edit',['data'=>$data]);
    }
    public function update(SettingRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $id=$request->id;
            $data=Setting::where('name',$request->name)->where('id','!=',$request->id)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم المورد مسجل من قبل')->withInput();
            }
            $data_update['name']=$request->name;
            $data_update['com_code']=$com_code;
            $data_update['phone2']=$request->phone2;
            $data_update['sup_code']=$request->sup_code;
            $data_update['no_tex']=$request->no_tex;
            $data_update['no_recode']=$request->no_recode;
            $data_update['cust_code']=$request->cust_code;
            $data_update['inv_code']=$request->inv_code;
            $data_update['email']=$request->email;
            $data_update['catch_code']=$request->catch_code;
            $data_update['phone']=$request->phone;
            $data_update['address']=$request->address;
            $data_update['suport_code']=$request->suport_code;
            $data_update['pro_code']=$request->pro_code;
            $data_update['added_by']=auth()->user()->name;
            $data_update['name_tex']=$request->name_tex;
            $data_update['tex_rote']=$request->tex_rote;
            $data_update['service_rote']=$request->service_rote;
            $data_update['custom_fiald_1']=$request->custom_field_1;
            $data_update['custom_fiald_2']=$request->custom_field_2;

            $flag=Setting::find($request->id)->where('com_code',$com_code)->update($data_update);
            if($flag){
            return redirect()->route('Setting.index')->with('add','تمت تعديل البيانات بنجاح');}
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }

}
