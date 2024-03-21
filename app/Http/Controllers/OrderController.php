<?php

namespace App\Http\Controllers\frontend;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Ordercontroller extends Controller
{
    public function index(){
        $orders=order::where('user_id',auth()->user()->id)->get();
        return view('frontend.orders.myorders',compact('orders'));
    }

    public function vieworder($orderid){
        $order=order::where('user_id',auth()->user()->id)->where('id',$orderid)->first();
        return view('frontend.orders.vieworder',compact('order'));
    }
}
