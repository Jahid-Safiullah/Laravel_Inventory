<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    public function Product(){
        return $this->belongsTo('App\Product');
    }
    public function Order_cusomer(){
        return $this->belongsTo('App\Order_cusomer');
    }
}
