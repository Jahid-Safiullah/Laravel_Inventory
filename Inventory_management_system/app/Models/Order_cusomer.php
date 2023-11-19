<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_cusomer extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo(customer::class);
    }

    public function order_product(){
        return $this->hasMany(Order_product::class,'order_customer_table_id');
    }


}
