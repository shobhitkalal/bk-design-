<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Cdesigns extends Component
{
     public $designs,$designcategory;
     public function mount($designs,$designcategory){
        $this->designs=$designs;
        $this->designcategory=$designcategory;
     }
    public function render()
    {
        return view('livewire.frontend.cdesigns',['designs'=>$this->designs, 'designcategory'=>$this->designcategory]);
    }
}
