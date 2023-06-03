<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExchangeSupportRequest;
use App\Models\ExchangeSupport;
use Illuminate\Http\Request;

class ExchangeSupportController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
        $data=ExchangeSupport::all();
        return view('Exchanges.index',['data'=>$data]);
    }
    public function create(){
        return view('Exchanges.create');
    }
    public function store(ExchangeSupportRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=ExchangeSupport::where('no_support',$request->no_support)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا رقم السند  مسجل من قبل')->withInput();
            }
            $data_insert['no_support']=$request->no_support;
            $data_insert['date']=$request->date;
            $data_insert['com_code']=$com_code;
            $data_insert['exchange']=$request->exchange;
            $data_insert['total']=$request->total;
            $data_insert['tex']=$request->tex;
            $data_insert['statement']=$request->statement;
            $data_insert['payment']=$request->payment;
            $data_insert['number_shek']=$request->number_shek;
            $data_insert['bank']=$request->bank;

            ExchangeSupport::create($data_insert);
            return redirect()->route('Exchanges.index')->with('add','تمت اضافة البيانات بنجاح');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
    // public function edit($id){
    //     $com_code=auth()->user()->com_code;
    //     $data=CatchSupport::where('id',$id)->where('com_code',$com_code)->first();
    //     return view('CatchSupport.edit',['data'=>$data]);
    // }
    // public function update(CatchSupportRequest $request)
    // {
    //     try {
    //         $com_code=auth()->user()->com_code;
    //         $id=$request->id;
    //         $data=CatchSupport::where('name',$request->name)->where('id','!=',$request->id)->where('com_code',$com_code)->first();
    //         if($data){
    //             return redirect()->back()->with('error','عفوا اسم المورد مسجل من قبل')->withInput();
    //         }
    //         $data_update['name']=$request->name;
    //         $data_update['code']=$request->code;
    //         $data_update['phone']=$request->phone;
    //         $data_update['address']=$request->address;
    //         $data_update['Tex_number']=$request->Tex_number;
    //         $data_update['commercial_record']=$request->commercial_record;
    //         $data_update['name_of_deficience']=$request->name_of_deficience;
    //         $data_update['phone_deficince']=$request->phone_deficince;
    //         $data_update['service_ratio']=$request->service_ratio;
    //         $data_update['custom_field_1']=$request->custom_field_1;
    //         $data_update['custom_field_2']=$request->custom_field_2;
    //         $data_update['custom_field_3']=$request->custom_field_3;

    //         $flag=CatchSupport::find($request->id)->where('com_code',$com_code)->update($data_update);
    //         if($flag){
    //         return redirect()->route('CatchSupport.index')->with('add','تمت تعديل البيانات بنجاح');}
    //     } catch (\Exception $ex) {
    //         return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
    //     }

    // }
    public function ajavSearch(Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $no_support=$request->no_support;
            $exchange=$request->exchange;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            if ($end_at=='' && $end_at =='') {
                if ($exchange=='') {
                    $field1='id';
                    $operator1='>';
                    $value1=0;
                } else {
                    $field1='exchange';
                    $operator1='LIKE';
                    $value1="%{$exchange}%";
                }
                if ($no_support =='') {
                    $field2='id';
                    $operator2='>';
                    $value2=0;
                } else {
                    $field2='no_support';
                    $operator2='=';
                    $value2=$no_support;
                }


                $data=ExchangeSupport::where($field1,$operator1,$value1)->where($field2,$operator2,$value2)->where('com_code',$com_code)->get();
                return view('Exchanges.ajax_search',['data'=>$data]);

            } else {
                if ($exchange=='') {
                    $field1='id';
                    $operator1='>';
                    $value1=0;
                } else {
                    $field1='exchange';
                    $operator1='LIKE';
                    $value1="%{$exchange}%";
                }
                if ($no_support =='') {
                    $field2='id';
                    $operator2='>';
                    $value2=0;
                } else {
                    $field2='no_support';
                    $operator2='=';
                    $value2=$no_support;
                }


                $data=ExchangeSupport::whereBetween('date',[$start_at,$end_at])->where($field1,$operator1,$value1)->where($field2,$operator2,$value2)->where('com_code',$com_code)->get();
                return view('Exchanges.ajax_search',['data'=>$data]);
            }        }
    }

}
