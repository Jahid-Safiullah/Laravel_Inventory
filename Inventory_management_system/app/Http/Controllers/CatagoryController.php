<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function all_catagories(){
        return view('admin\manage_catagories\all_catagories');
    }
}
