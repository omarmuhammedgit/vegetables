<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceSupplerRequest;
use App\Models\Customer;
use App\Models\InvoiceCustomer;
use App\Models\InvoiceSuppler;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Suppler;
use Illuminate\Http\Request;

class InvoiceSupplerController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
        $suppler=Suppler::where('com_code',$com_code)->get();
        $customer=Customer::where('com_code',$com_code)->get();
        $product=Product::where('com_code',$com_code)->get();
        $service_rote=Setting::select('service_rote')->where('com_code',$com_code)->first();
        if ($service_rote == null) {
            $service_rote=15;

        }else{

        $service_rote=Setting::where('com_code',$com_code)->first()->service_rote;
        }

        return view('Invoice.invoice',compact('suppler','customer','product','service_rote'));
    }
    public function store(InvoiceSupplerRequest $request)
    {
        $com_code=auth()->user()->com_code;

            $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first();
            if ($invoice_suppler_id == null) {

            $data_insert['no_invoice']=$request->no_invoice;
            $data_insert['suppler_id']=$request->suppler_id;
            $data_insert['date']=$request->date;
            $data_insert['com_code']=$com_code;
            $data_insert['no_support']=$request->no_support;
            $data_insert['total_quantity']=$request->quantity;
            $data_insert['total_not_include_tex']=$request->total_befor_tex;
            $data_insert['total_discount']=$request->discount;
            $data_insert['total_include_tex']=$request->total_after_tex;
            $data_insert['total_tex']=$request->total_tex;
            $data_insert['serivce_rota']=$request->serivce_rota;
            $data_insert['escort_expenses']=$request->escort_expenses;
            $data_insert['other_expenses']=$request->other_expenses;
            $data_insert['statement_expenses']=$request->statement_expenses;
            InvoiceSuppler::create($data_insert);

            $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first()->id;

            $no_invoice = !empty(InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_support) ? ($no_invoice = InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_invoice) : 0000;
            // $number_invoice=!empty($)?$number_invoice:0000;
            $no_invoice = str_pad($no_invoice + 1, 5, 0, STR_PAD_LEFT);

            $data_insert_customer['no_invoice']=$no_invoice;
            $data_insert_customer['suppler_id']=$request->suppler_id;
            $data_insert_customer['name_product']=$request->name_product;
            $data_insert_customer['date']=$request->date;
            $data_insert_customer['com_code']=$com_code;
            $data_insert_customer['quantity']=$request->quantity;
            $data_insert_customer['invoice_suppler_id']=$invoice_suppler_id;
            $data_insert_customer['price']=$request->price;
            $data_insert_customer['total_befor_tex']=$request->total_befor_tex;
            $data_insert_customer['discount']=$request->discount;
            $data_insert_customer['total_after_tex']=$request->total_after_tex;
            $data_insert_customer['total_tex']=$request->total_tex;
            $data_insert_customer['customer_id']=$request->customer_id;
             InvoiceCustomer::create($data_insert_customer);
             $invoice_suppler=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first();
             $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first()->id;
             $invoice_customer=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->get();
             $quantity=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('quantity');
             $total_befor_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_befor_tex');
             $total_after_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_after_tex');
             $total_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_tex');
             $discount=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('discount');
             $setting=Setting::where('com_code',$com_code)->first();

             return view('Invoice.print_invoice',compact('invoice_suppler','invoice_customer','quantity','setting',
             'total_befor_tex','total_after_tex','total_tex','discount'));
            } else {
                $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->first()->id;

                $no_invoice = !empty(InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_support) ? ($no_invoice = InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_invoice) : 0000;
                // $number_invoice=!empty($)?$number_invoice:0000;
                $no_invoice = str_pad($no_invoice + 1, 5, 0, STR_PAD_LEFT);

                $data_insert_customer['no_invoice']=$no_invoice;
                $data_insert_customer['suppler_id']=$request->suppler_id;
                $data_insert_customer['name_product']=$request->name_product;
                $data_insert_customer['date']=$request->date;
                $data_insert_customer['com_code']=$com_code;
                $data_insert_customer['quantity']=$request->quantity;
                $data_insert_customer['invoice_suppler_id']=$invoice_suppler_id;
                $data_insert_customer['price']=$request->price;
                $data_insert_customer['total_befor_tex']=$request->total_befor_tex;
                $data_insert_customer['discount']=$request->discount;
                $data_insert_customer['total_after_tex']=$request->total_after_tex;
                $data_insert_customer['total_tex']=$request->total_tex;
                $data_insert_customer['customer_id']=$request->customer_id;
                 InvoiceCustomer::create($data_insert_customer);
                 $invoice_suppler=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first();
                 $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first()->id;
                 $invoice_customer=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->get();
                 $quantity=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('quantity');
                 $total_befor_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_befor_tex');
                 $total_after_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_after_tex');
                 $total_tex=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('total_tex');
                 $discount=InvoiceCustomer::where('invoice_suppler_id',$invoice_suppler_id)->where('com_code',$com_code)->sum('discount');

                 return view('Invoice.print_invoice',compact('invoice_suppler','invoice_customer','quantity',
                 'total_befor_tex','total_after_tex','total_tex','discount'));
            }




    }
    public function addCustomerAjax(Request $request){
        if ($request->ajax()) {

            $com_code=auth()->user()->com_code;
            $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first();
            if ($invoice_suppler_id == null) {

            $data_insert['no_invoice']=$request->no_invoice;
            $data_insert['com_code']=$com_code;
            $data_insert['suppler_id']=$request->suppler_id;
            $data_insert['date']=$request->date;
            $data_insert['no_support']=$request->no_support;
            $data_insert['total_quantity']=$request->quantity;
            $data_insert['total_not_include_tex']=$request->total_befor_tex;
            $data_insert['total_discount']=$request->discount;
            $data_insert['total_include_tex']=$request->total_after_tex;
            $data_insert['total_tex']=$request->total_tex;
            $data_insert['serivce_rota']=$request->serivce_rota;
            $data_insert['escort_expenses']=$request->escort_expenses;
            $data_insert['other_expenses']=$request->other_expenses;
            $data_insert['statement_expenses']=$request->statement_expenses;

            InvoiceSuppler::create($data_insert);
            // die('ok');

            $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first()->id;

            $no_invoice = !empty(InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_support) ? ($no_invoice = InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_invoice) : 0000;
            // $number_invoice=!empty($)?$number_invoice:0000;
            $no_invoice = str_pad($no_invoice + 1, 5, 0, STR_PAD_LEFT);

            $data_insert_customer['no_invoice']=$request->no_invoice;
            $data_insert_customer['suppler_id']=$request->suppler_id;
            $data_insert_customer['name_product']=$request->name_product;
            $data_insert_customer['date']=$request->date;
            $data_insert_customer['com_code']=$com_code;
            $data_insert_customer['quantity']=$request->quantity;
            $data_insert_customer['invoice_suppler_id']=$invoice_suppler_id;
            $data_insert_customer['price']=$request->price;
            $data_insert_customer['total_befor_tex']=$request->total_befor_tex;
            $data_insert_customer['discount']=$request->discount;
            $data_insert_customer['total_after_tex']=$request->total_after_tex;
            $data_insert_customer['total_tex']=$request->total_tex;
            $data_insert_customer['customer_id']=$request->customer_id;
             InvoiceCustomer::create($data_insert_customer);

        $customer=Customer::where('com_code',$com_code)->get();
        $product=Product::where('com_code',$com_code)->get();
             return view('Invoice.add_customer_ajax',compact('customer','product'));




            } else {
                $invoice_suppler_id=InvoiceSuppler::where('no_invoice',$request->no_invoice)->where('com_code',$com_code)->first()->id;

                $no_invoice = !empty(InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_support) ? ($no_invoice = InvoiceCustomer::latest()->where('com_code',$com_code)->first()->no_invoice) : 0000;
                // $number_invoice=!empty($)?$number_invoice:0000;
                $no_invoice = str_pad($no_invoice + 1, 5, 0, STR_PAD_LEFT);

                $data_insert_customer['no_invoice']=$request->no_invoice;
                $data_insert_customer['suppler_id']=$request->suppler_id;
                $data_insert_customer['name_product']=$request->name_product;
                $data_insert_customer['date']=$request->date;
                $data_insert_customer['com_code']=$com_code;
                $data_insert_customer['quantity']=$request->quantity;
                $data_insert_customer['invoice_suppler_id']=$invoice_suppler_id;
                $data_insert_customer['price']=$request->price;
                $data_insert_customer['total_befor_tex']=$request->total_befor_tex;
                $data_insert_customer['discount']=$request->discount;
                $data_insert_customer['total_after_tex']=$request->total_after_tex;
                $data_insert_customer['total_tex']=$request->total_tex;
                $data_insert_customer['customer_id']=$request->customer_id;
                 InvoiceCustomer::create($data_insert_customer);
                 $customer=Customer::where('com_code',$com_code)->get();
                 $product=Product::where('com_code',$com_code)->get();
                      return view('Invoice.add_customer_ajax',compact('customer','product'));

            }

        }
    }
}
