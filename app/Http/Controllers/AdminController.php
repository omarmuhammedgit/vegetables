<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    public function index(){
        $data=Admin::all();
        return view('auth.index',['data'=>$data]);
    }
    public function create(){
        return view('auth.create');
    }
    public function store(AdminRequest $request){
        try {
            $data=Admin::where('com_code',$request->com_code)->first();
            if ($data) {
                return redirect()->back()->with('error','عفوا اسم  المستخدم مسجل من قبل')->withInput();
            }
            $data_insert['com-code']=$request->com_code;
            $data_insert['name']=$request->name;
            $data_insert['email']=$request->email;
            $data_insert['username']=$request->username;
            $data_insert['password']=bcrypt($request->password);
            $data_insert['status']=$request->status;
            Admin::create($data_insert);
            return redirect()->route('user.index')->with('add','تمت اضافة المستخدم بنجاح');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا حدث خطا ما'.$ex->getMessage())->withInput();
        }
    }
     public function edit($id){
        $data=Admin::where('id',$id)->first();
        return view('auth.edit',['data'=>$data]);
     }
     public function update(AdminUpdateRequest $request){
        try {
            $data=Admin::where('com_code',$request->com_code)->where('id','!=',$request->id)->first();
            if ($data) {
                return redirect()->back()->with('error','عفوا اسم  المستخدم مسجل من قبل')->withInput();
            }
            $data_update['com-code']=$request->com_code;
            $data_update['name']=$request->name;
            $data_update['email']=$request->email;
            if ($request->password !='') {
                $data_update['password']=bcrypt($request->password);
            }
            $data_update['username']=$request->username;
            $data_update['status']=$request->status;
            Admin::find($request->id)->update($data_update);
            return redirect()->route('user.index')->with('add','تمت اضافة المستخدم بنجاح');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا حدث خطا ما'.$ex->getMessage())->withInput();
        }
    }
}
