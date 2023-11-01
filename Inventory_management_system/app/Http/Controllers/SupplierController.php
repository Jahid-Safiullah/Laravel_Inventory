<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function add_supplier(){

        return view ('admin.manage_suppliers.add_supplier');
    }

    public function edit_supplier(){

        return view ('admin.manage_suppliers.edit_supplier');
    }
    public function delete_supplier(){

        return view ('admin.manage_suppliers.delete_supplier');
    }
}
