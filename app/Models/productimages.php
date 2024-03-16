<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productimages extends Model
{
    use HasFactory;
    protected $table="productimages";
    protected $fillable=['image','product_id'];


}
