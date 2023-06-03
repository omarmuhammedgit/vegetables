<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function showdata(){
        return view('show');
    }
    public function showdata1(Request $request){
        foreach($request->AccountName as $value){
        if(!$value==null){
            return $request->checkpay ;
        }}
    }
    public function printInvoices(){
        return view('print_invoices');
    }
}
