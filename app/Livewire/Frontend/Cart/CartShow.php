<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{    public $cart,$totalPrice=0;
    public function decreaseQty($cartId){
        $cartData=Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData){
            if($cartData->quantity > 1){
            $cartData->decrement('quantity');
            $this->dispatch('message', [
                'text' => "product added to cart",
                'type'=>'success',
                'status'=>200
            ]);
           }
        }
        else{
            $this->dispatch('message', [
                'text' => "something went wrong",
                'type'=>'error',
                'status'=>400
            ]);

        }
    }
    public function increaseQty($cartId){
        $cartData=Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData){
            if($cartData->product->qty > $cartData->quantity){
            $cartData->increment('quantity');
            $this->dispatch('message', [
                'text' => "qty increased by 1",
                'type'=>'success',
                'status'=>200
            ]);
        }
    }
       else{
            $this->dispatch('message', [
                'text' => "something went wrong",
                'type'=>'error',
                'status'=>400
            ]);

        }
    }

    public function removeCartItem($cartId){
        Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->delete();
        $this->dispatch('cartAddedOrUpdated');
        $this->dispatch('message', [
            'text' => "product deleted from cart",
            'type'=>'success',
            'status'=>200
        ]);

    }
    public function render()
    {
        $this->cart=Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',['cart'=>$this->cart]);
    }
}

