<?php

namespace App\Models;


use App\Models\products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table="cart";
    protected $fillable=['user_id','product_id','quantity'];

    public function product():BelongsTo{
        return $this->belongsTo(products::class,'product_id','id');
    }
}
