<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function add_supplier(){
        return view('admin\manage_suppliers\add_supplier');
    }
}
