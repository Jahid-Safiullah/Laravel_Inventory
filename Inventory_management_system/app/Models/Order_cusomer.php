<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_cusomer extends Model
{
    use HasFactory;
    public function Customer(){
        return $this->belongsTo('App\Customer');
    }

    public function Order_product(){
        return $this->hasMany('App\Order_product');
    }


}
