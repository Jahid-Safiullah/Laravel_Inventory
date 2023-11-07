<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('admin.manage_units.add_unit');
    }
    


    public function add_unit(Request $request){
        // print_r($request->all());
        $unitData=new unit;
        
        $unitData->name=$request->unit_name;
        $unitData->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }


    public function all_units(){
        $allUnitData = Unit::all();
        return view ('admin.manage_units.units',compact('allUnitData'));
    }


    public function edit_unit($id){
        $viewData= Unit::find($id);
        // print_r(compact('viewData'));
        return view ('admin.manage_units.edit_unit',compact('viewData'));
    }

    public function update_unit(Request $request, $id){
        $viewData= Unit::find($id);
        // print_r(compact('viewData'));
        $viewData->name=$request->unit_name;
        
        $viewData->save();
        return redirect()->back()->with('message','Unit Added Successfully');
        
    }

}
