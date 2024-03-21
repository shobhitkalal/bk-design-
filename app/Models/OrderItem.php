<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class orderItem extends Model
{
    use HasFactory;
    protected $table="order_items";
    protected $fillable=['order_id','product_id','quantity','price'];

    public function product(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
