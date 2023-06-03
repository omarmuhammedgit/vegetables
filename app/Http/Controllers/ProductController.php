<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Suppler;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $com_code=auth()->user()->com_code;
        $data=Product::where('com_code',$com_code)->get();
        return view('Product.index',['data'=>$data]);
    }
    public function create(){
        return view('Product.create');
    }
    public function store(ProductRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Product::where('name',$request->name)->where('com_code',$com_code)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم الصنف مسجل من قبل')->withInput();
            }
            $data_insert['name']=$request->name;
            $data_insert['com_code']=$com_code;
            $data_insert['code']=$request->code;
            $data_insert['date']=date('Y-m-d');
            Product::create($data_insert);
            return redirect()->route('Product.index')->with('add','تمت اضافة البيانات بنجاح');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
    public function edit($id){
        $com_code=auth()->user()->com_code;
        $data=Product::where('id',$id)->where('com_code',$com_code)->first();
        return view('Product.edit',['data'=>$data]);
    }
    public function update(ProductRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Product::where('name',$request->name)->where('id','!=',$request->id)->first();
            if($data){
                return redirect()->back()->with('error','عفوا اسم المورد مسجل من قبل')->withInput();
            }
            $data_update['name']=$request->name;
            $data_update['code']=$request->code;
            $flag=Product::find($request->id)->where('com_code',$com_code)->update($data_update);
            if($flag){
            return redirect()->route('Product.index')->with('add','تمت تعديل البيانات بنجاح');}
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا يوجد خطا ما'.$ex->getMessage())->withInput();
        }

    }
}
