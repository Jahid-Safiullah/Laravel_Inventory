<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product(){
        return view('admin\manage_product\all_product');
    }
}
