<?php

namespace App\Models;

use App\Models\Category;
use App\Models\productimages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=['name','brand','description','qty','selling_price','original_price','status','category_id',];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function ProductImages(){
        return $this->hasMany(productimages::class,'product_id','id');
    }
}

