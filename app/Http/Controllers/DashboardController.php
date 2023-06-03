<?php

namespace App\Http\Controllers;

use App\Models\InvoiceCustomer;
use App\Models\InvoiceSuppler;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
        $time=time()-(24*60*60);
        $dateDay=date("Y-m-d",$time);
        $date=date("Y-m-d");
        $total_befor_tex=InvoiceCustomer::whereBetween('date',[$dateDay,$date])->where('com_code',$com_code)->sum('total_befor_tex');
        $total_after_tex=InvoiceCustomer::whereBetween('date',[$dateDay,$date])->where('com_code',$com_code)->sum('total_after_tex');
        $total_tex=InvoiceCustomer::whereBetween('date',[$dateDay,$date])->where('com_code',$com_code)->sum('total_tex');
        $escort_expenses=InvoiceSuppler::whereBetween('date',[$dateDay,$date])->where('com_code',$com_code)->sum('escort_expenses');
        $other_expenses=InvoiceSuppler::whereBetween('date',[$dateDay,$date])->where('com_code',$com_code)->sum('other_expenses');
        $data=InvoiceCustomer::where('com_code',$com_code)->orderBy('id','DESC')->paginate(3);
        $invoice_suppler=InvoiceSuppler::where('com_code',$com_code)->orderBy('id','DESC')->paginate(3);

        return view('home',compact('data','invoice_suppler','other_expenses','escort_expenses','total_tex','total_after_tex','total_befor_tex'));
    }
}
