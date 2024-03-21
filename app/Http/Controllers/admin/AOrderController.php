<?php

namespace App\Http\Controllers\Admin;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AOrderController extends Controller
{
    public function index(){
           $orders=order::paginate(5);
           return view('admin.orders.orders',compact('orders'));
    }
    public function vieworder($orderid){
           $order=Order::where('id',$orderid)->first();
           return view('admin.orders.vieworders',compact('order'));
    }

    public function generateinvoice($orderid){
        $order=Order::where('id',$orderid)->first();
        return view('admin.orders.generate-invoice',compact('order'));
    }

    public function downloadinvoice($id){
        $order=Order::FindOrFail($id);
        $data=['order'=>$order];
        $pdf = Pdf::loadView('admin.orders.generate-invoice',$data);
        $today=Carbon::now()->format('Y-m-d');
        return $pdf->download('invoice'.$order->id.'-'.$today.'.pdf');
    }

    public function updatestatus($orderid,Request $request){
        $order=Order::where('id',$orderid)->first();
        if($order){
            $order->update([
                'status_message'=>$request->order_status
            ]);
        }
        return redirect('/admin/orders')->with('message','order status updated');
    }
    public function sendmail($orderid){
        $order=Order::find($orderid);
        $data=['order'=>$order];
        $pdf=Pdf::loadview('admin.orders.generate-invoice',$data);
        $data1['order']=$order;
        $data1['pdf']=$pdf;
        $data1['subject']=$order->status_message;
        try{
            Mail::to($order->email)->send(new InvoiceOrderMailable($data1));
            return redirect('/admin/orders')->with('message','invoice mail sent successfully');
        }
        catch(\exception $e){
            return redirect('admin.orders')->with('message','something went wrong');
        }
     }

    }



