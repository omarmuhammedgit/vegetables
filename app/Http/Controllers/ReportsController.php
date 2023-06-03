<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Models\Customer;
use App\Models\InvoiceCustomer;
use App\Models\Suppler;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function getCustomer(){
        $com_code=auth()->user()->com_code;
        $data=InvoiceCustomer::where('com_code',$com_code)->get();
        return view('reports.customer',compact('data'));
    }
    public function getCustomerAjax (Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $code=$request->code;
            $name=$request->name;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            if ($end_at=='' && $end_at =='') {
                if ($name=='') {
                    $field1='id';
                    $operator1='>';
                    $value1=0;
                } else {
                    $field1='name';
                    $operator1='LIKE';
                    $value1="%{$name}%";
                }
                if ($code =='') {
                    $field2='id';
                    $operator2='>';
                    $value2=0;
                } else {
                    $field2='code';
                    $operator2='=';
                    $value2=$code;
                }


                $customer_id=Customer::where($field1,$operator1,$value1)->where($field2,$operator2,$value2)->where('com_code',$com_code)->first();
                $data=InvoiceCustomer::where('customer_id',$customer_id['id'])->where('com_code',$com_code)->get();
                return view('reports.customerAjax',['data'=>$data]);

            } else {
                if ($name=='') {
                    $field1='id';
                    $operator1='>';
                    $value1=0;
                } else {
                    $field1='name';
                    $operator1='LIKE';
                    $value1="%{$name}%";
                }
                if ($code =='') {
                    $field2='id';
                    $operator2='>';
                    $value2=0;
                } else {
                    $field2='code';
                    $operator2='=';
                    $value2=$code;
                }


                $customer_id=Customer::where($field1,$operator1,$value1)->where($field2,$operator2,$value2)->where('com_code',$com_code)->first()->id;
                $data=InvoiceCustomer::whereBetween('date',[$start_at,$end_at])->where('customer_id',$customer_id)->where('com_code',$com_code)->get();
                return view('reports.customerAjax',['data'=>$data]);
            }
        }
    }

    public function getsuppler(){
        $com_code=auth()->user()->com_code;
        $data=InvoiceCustomer::where('com_code',$com_code)->get();
        return view('reports.suppler',compact('data'));
    }
    public function getsupplerAjax (Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $code=$request->code;
            $name=$request->name;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            if ($end_at=='' && $end_at =='') {
                if ($name=='') {
                    $field1='id';
                    $operator1='>';
                    $value1=0;
                } else {
                    $field1='name';
                    $operator1='LIKE';
                    $value1="%{$name}%";
                }
                if ($code =='') {
                    $field2='id';
                    $operator2='>';
                    $value2=0;
                } else {
                    $field2='code';
                    $operator2='=';
                    $value2=$code;
                }


                $customer_id=Suppler::where($field1,$operator1,$value1)->where($field2,$operator2,$value2)->where('com_code',$com_code)->first();
                $data=InvoiceCustomer::where('customer_id',$customer_id['id'])->where('com_code',$com_code)->get();
                return view('reports.supplerAjax',['data'=>$data]);

            } else {
                if ($name=='') {
                    $field1='id';
                    $operator1='>';
                    $value1=0;
                } else {
                    $field1='name';
                    $operator1='LIKE';
                    $value1="%{$name}%";
                }
                if ($code =='') {
                    $field2='id';
                    $operator2='>';
                    $value2=0;
                } else {
                    $field2='code';
                    $operator2='=';
                    $value2=$code;
                }


                $customer_id=Suppler::where($field1,$operator1,$value1)->where($field2,$operator2,$value2)->where('com_code',$com_code)->first()->id;
                $data=InvoiceCustomer::whereBetween('date',[$start_at,$end_at])->where('customer_id',$customer_id)->where('com_code',$com_code)->get();
                return view('reports.supplerAjax',['data'=>$data]);
            }
        }
    }
    public function exportCustomer(){
        return Excel::download(new CustomerExport,'customers.xlsx');
    }
}
