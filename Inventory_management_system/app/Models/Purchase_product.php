<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_product extends Model
{
    use HasFactory;


    protected $table = 'Purchase_products';
    protected $primaryKey = 'id'; 
    // Define the relationship to the Product model
    public function product()
    {
        // return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
