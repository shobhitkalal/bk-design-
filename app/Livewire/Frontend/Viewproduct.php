<?php

namespace App\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Viewproduct extends Component
{   public $product,$category;
    public $qtyCount=1;
    public function mount($product,$category){
        $this->product=$product;
        $this->category=$category;
    }

    public function decrementQty(){
        if($this->qtyCount>1)
           $this->qtyCount--;
   }
   public function incrementQty(){
       if($this->qtyCount < $this->product->qty)
               $this->qtyCount++;
       else {
           $this->dispatch('message',[
               'text'=>"only ".$this->product->qty." available",
               'type'=>'warning',
               'status'=>401
           ]);
       }
   }
    public function addToCart($productid){
        if(Auth::check()){
            if($this->product->where('id',$productid)->where('status','1')->exists()){
                Cart::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$productid,
                    'quantity'=>$this->qtyCount
                ]);
                $this->dispatch('cartAddedOrUpdated');
                $this->dispatch('message', [
                    'text' => "product added to cart",
                    'type'=>'success',
                    'status'=>200
                ]);
            }
            else {
                $this->dispatch('message', [
                    'text' => "product does not exists",
                    'type'=>'warning',
                    'status'=>401
                ]);
            }
        }
        else{
            $this->dispatch('message', [
                'text' => "please login first",
                'type'=>'error',
                'status'=>404
            ]);
        }
        if(Auth::check()){
                if($this->product->where('id',$productid)->exists()){
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productid)->exists()){
                         $this->dispatch('message',[
                        'text'=>"product already added to cart",
                        'type'=>'warning',
                        'status'=>404
                    ]);
                    }
                    else {
                        Cart::create([
                            'user_id'=>Auth::user()->id,
                            'product_id'=>$productid,
                            'quantity'=>$this->qtyCount
                        ]);
                        $this->emit('cartAddedOrUpdated');
                    }
                }
                else {
                    $this->dispatch('message',[
                        'text'=>"product does not exists",
                        'type'=>'warning',
                        'status'=>404
                    ]);
                }
        }
        else {
            $this->dispatch('message',[
                'text'=>"please login first",
                'type'=>'error',
                'status'=>404
            ]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.viewproduct',['product'=>$this->product,'category'=>$this->category]);
    }
}
