<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $ordercount=Order::count();
        $productscount=Products::count();
        $usercount=User::count();
        $categorycount=Category::count();
        return view('admin.dashboard',compact('ordercount','productscount','usercount','categorycount'));
    }
}
