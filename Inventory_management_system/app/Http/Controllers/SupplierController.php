<?php
namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('admin.manage_suppliers.add_supplier');
    }

    public function add_supplier(Request $request){
        // print_r($request->all());
        // $supplierData=supuplier::all();
        $supplierData=new Supplier;
        $supplierData->name=$request->supplier_name;
        $supplierData->email=$request->supplier_email;
        $supplierData->phone=$request->supplier_phone;
        $supplierData->address=$request->supplier_address;

        $image=$request->supplier_image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->supplier_image->move('supplier_image',$imagename);
        $supplierData->image=$imagename;

        $supplierData->status=$request->supplier_status;
        $supplierData->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }



    public function all_supplier(){
        $allSupplierData = Supplier::all();
        return view ('admin.manage_suppliers.all_supplier',compact('allSupplierData'));
    }



    public function edit_supplier($id){
        $viewData= Supplier::find($id);
        // print_r(compact('viewData'));
        return view ('admin.manage_suppliers.edit_supplier',compact('viewData'));
    }



    public function update_supplier(Request $request, $id){
        $viewData= Supplier::find($id);
        // print_r(compact('viewData'));
        $viewData->name=$request->supplier_name;
        $viewData->email=$request->supplier_email;
        $viewData->phone=$request->supplier_phone;
        $viewData->address=$request->supplier_address;

        $image=$request->supplier_image;

        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->supplier_image->move('supplier_image',$imagename);
        $viewData->image=$imagename;
        }

        $viewData->status=$request->supplier_status;
        $viewData->save();
        return redirect()->back()->with('message','Product Added Successfully');
        // return view ('admin.manage_suppliers.edit_supplier',compact('viewData'));
    }



    public function searchSupplier (Request $request){
        // $categories=Catagory::all();
        $searchText=$request->Search_Supplier;
        $supplierDatas =Supplier::where('name','LIKE',"%$searchText%");
        return view('admin.manage_suppliers.all_supplier',compact('allSupplierData'));
    }
}
