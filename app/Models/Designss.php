<?php

namespace App\Models;

use App\Models\DesignImages;
use App\Models\DesignCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designss extends Model
{
    use HasFactory;
    protected $table="designss";
    protected $fillable=["DesignCategory","name","description"];

    public function designs(){
        return $this->belongsTo(DesignCategory::class,'designcategory_id','id');
    }

    public function designImages(){
        return $this->hasMany(DesignImages::class,'design_id','id');
}

}












































































































































