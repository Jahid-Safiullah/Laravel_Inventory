<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index(){
        return view('admin\manage_catagories\add_catagory');
    }
    public function add_catagory(Request $request){
        // print_r($request->all());
        $unitData=new Catagory;
        
        $unitData->name=$request->catagory_name;
        $unitData->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }


    public function all_catagories(){
        $allUnitData = Catagory::all();
        return view ('admin.manage_catagories.all_catagories',compact('allUnitData'));
    }


    public function edit_catagory($id){
        $viewData= Catagory::find($id);
        // print_r(compact('viewData'));
        return view ('admin.manage_catagories.edit_catagory',compact('viewData'));
    }

    public function update_catagory(Request $request, $id){
        $viewData= Catagory::find($id);
        // print_r(compact('viewData'));
        $viewData->name=$request->catagory_name;
        
        $viewData->save();
        return redirect()->route('all_catagories')->with('message','Catagory Added Successfully');
        
    }
}
