<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function order_cusomer(){
        return $this->belongsTo(Order_cusomer::class,'order_customer_table_id');
    }

    public function customer(){
        return $this->belongsToMany(customer::class);
    }
}
