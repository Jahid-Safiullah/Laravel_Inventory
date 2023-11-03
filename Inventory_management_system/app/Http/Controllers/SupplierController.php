<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function add_supplier(Request $request){
        // print_r($request->all());
        $supplierData=new supplier;
        $supplierData->name=$request->supplier_name;
        $supplierData->email=$request->supplier_email;
        $supplierData->phone=$request->supplier_phone;
        $supplierData->address=$request->supplier_address;

        $image=$request->supplier_image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->supplier_image->move('supplier_image',$imagename);
        $supplierData->image=$imagename;

        $supplierData->status=$request->supplier_status;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }



    public function all_supplier(){

        return view ('admin.manage_suppliers.all_supplier');
    }



    public function edit_supplier(){

        return view ('admin.manage_suppliers.edit_supplier');
    }



    public function delete_supplier(){

        return view ('admin.manage_suppliers.delete_supplier');
    }
}
