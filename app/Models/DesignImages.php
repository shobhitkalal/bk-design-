<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignImages extends Model
{
    use HasFactory;
    protected $table="_designimage";
    protected $fillable=["image","design_id"];
}
