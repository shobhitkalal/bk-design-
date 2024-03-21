<?php


namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Products;

class Cproducts extends Component
{
    public $products,$category;
    public $priceInput='';
    protected $queryString=['priceInput'=>['except'=>'','as'=>'price']];
    public function mount($products,$category){
        $this->products=$products;
        $this->category=$category;
    }
    public function render()
    {
        // return view('livewire.frontend.cproducts',['products'=>$this->products,'category'=>$this->category]);

        // $this->products=Products::where('category_id',$this->category->id)
        // ->when($this->priceInput,function($q){
        //     $q->when($this->priceInput=="above1000",function($q1){
        //         $q1->where("selling_price", ">","1000")->where("selling_price", "<=","2000");
        //     })->when($this->priceInput=="above2000",function($q1){
        //         $q1->where("selling_price", ">","2000")->where("selling_price", "<=","5000");
        //     });
        // })->where('status','1')->get();
return view('livewire.frontend.cproducts',['products'=>$this->products,'category'=>$this->category]);
}
}
