<?php

namespace App\Models;

use App\Models\Designss;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignImages extends Model
{
    use HasFactory;
    protected $table="_designimage";
    protected $fillable=["image","design_id"];

    // public function designs(){
    //     return $this->hasMany(Designss::class,'designcategory_id','id');
    // }
}
