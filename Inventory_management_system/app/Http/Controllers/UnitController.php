<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('admin.manage_units.add_unit');
    }
    

    // public function add_unit(Request $request){

    //     return view('admin.manage_units.add_unit');
    // }

    public function add_unit(Request $request){
        // print_r($request->all());
        // $supplierData=supuplier::all();
        $unitData=new Unit;
        $unitData->name=$request->unit_name;
       
        $unitData->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

}
