<?php

namespace App\Models;

use App\Models\orderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=['user_id','tracking_no','fullname','email','address','pincode','phone','status_message','payment_mode','payment_id'];

    public function orderItems(){
        return $this->hasMany(orderItem::class,'order_id','id');
    }

}

