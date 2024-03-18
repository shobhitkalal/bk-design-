<?php

namespace App\Models;

use App\Models\Designs;
use App\Models\Designss;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignCategory extends Model
{
    use HasFactory;
    protected $table="designcategory";
    protected $fillable=['name','image','description'];
    public function designs(){
        return $this->hasMany(Designss::class,'designcategory_id','id');
}
}
