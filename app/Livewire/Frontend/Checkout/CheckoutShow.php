<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\orderItem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $totalAmount,$carts;
    public $fullname,$email,$phone,$address,$pincode;
    public $payment_mode,$payment_id=null;
    protected $listeners = ["ValidationForAll",'transcationEmit'=>"PaidOnlineOrder"];
    public function ValidationForAll(){
        $this->validate();
    }
    public function mount(){
       $this->fullname=auth()->user()->name;
       $this->email=auth()->user()->email;
    }

    public function totalCartAmount(){
        $this->totalAmount=0;
        $this->carts=Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $cartItem){
            $this->totalAmount += $cartItem->product->selling_price * $cartItem->quantity;
              }
            return  $this->totalAmount;
    }

    public function rules(){
        return [
            'fullname'=>'required|string|max:12',
            'email'=>'required|string',
            'phone'=>'required|string|min:10|max:10',
            'pincode'=>'required|string|min:6|max:6',
            'address'=>'required|string|max:500'
        ];
    }

    public function placeorder(){
        $this->validate();
        $order=Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>"in progress",
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id
        ]);
        foreach($this->carts as $cartItem){
            $orderItem=orderItem::create([
                    'order_id'=>$order->id,
                    'product_id'=>$cartItem->product->id,
                    'quantity'=>$cartItem->quantity,
                    'price'=>$cartItem->product->selling_price
                ]);
        }
       return $order;

    }

    public function codorder(){
        $this->payment_mode="cash on delivery";
        $codorder= $this->placeorder();
        if($codorder){
            Cart::where('user_id',auth()->user()->id)->delete();
            $this->dispatch('cartAddedOrUpdated');
            $this->dispatch('message', [
                'text' => "Order placed",
                'type'=>'success',
                'status'=>200
            ]);
            return redirect('thank-you');
    }
    else{
        $this->dispatchBrowserEvent('message', [
            'text' => "something went wrong",
            'type'=>'error',
            'status'=>400
        ]);
    }
    }
    public function paidOnlineOrder($id){
        $this->payment_id=$id;
        $this->payment_mode="paid online";
        $onlineorder=$this->placeorder();
        if($onlineorder){
            Cart::where('user_id',auth()->user()->id)->delete();
            $this->emit('cartAddedOrUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => "order placed",
                'type'=>'success',
                'status'=>200
            ]);
            return redirect('/thank-you');
        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => "something went wrong",
                'type'=>'error',
                'status'=>400
            ]);
        }

    }
    public function render()
    {
        $this->totalAmount=$this->totalCartAmount();
        return view('livewire.frontend.checkout.checkout-show',['fullname'=>$this->fullname,'email'=>$this->email]);
    }
}
