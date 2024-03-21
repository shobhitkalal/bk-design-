<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCountNew extends Component
{
    public $cartCount=0;
    protected $listeners=['cartAddedOrUpdated'=>'checkCartCount'];
    public function checkCartCount(){
        if(Auth::check()){
            return $this->cartCount=Cart::where('user_id',auth()->user()->id)->count();
        }
        else { return $this->cartCount=0; }
    }

    public function render()
    {
        $this->cartCount=$this->checkCartCount();

        return view('livewire.frontend.cart.cart-count-new',['cartCount'=>$this->cartCount]);
    }
}
