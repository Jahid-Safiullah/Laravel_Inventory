<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function add_catagories(){
        return view('admin\manage_catagories\add_catagory');
    }

    public function all_catagories(){
        return view('admin\manage_catagories\all_catagories');
    }
}
