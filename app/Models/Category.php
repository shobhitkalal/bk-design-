<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=['name','image','status','description'];
    public function product(){
        return $this->hasMany(products::class,'category_id','id');
}
}
