<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\loginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(loginRequest $request){
        if (auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password'),'status'=>1])) {
            return redirect()->route('dashoard');

        }else{
            return redirect()->route('login')->with('error','عفوا اسم المستخدم غير مفعل')->withInput();
        }

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');

        // $admin=new App/Models/Admin();
        // $admin->name='admin';
        // $admin->username='admin';
        // $admin->email='admin@gmail.com';
        // $admin->password=bcrypt('admin');
        // $admin->com_code=2;
        // $admin->save();
    }

}
