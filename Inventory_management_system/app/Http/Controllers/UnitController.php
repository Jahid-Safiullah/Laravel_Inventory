<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function units(){
        return view('admin.manage_units.add_unit');
    }
}
