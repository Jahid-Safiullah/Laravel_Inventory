<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $catagoryData=Catagory::all();
        $unitData=Unit::all();
        return view('admin\manage_product\add_product',compact('catagoryData','unitData'));
    }


    public function add_product(Request $request){
        // print_r($request->all());
        // $supplierData=supuplier::all();
      
        $supplierData=new Product;
        
        $supplierData->name=$request->product_name;
        $supplierData->description=$request->product_des;

        $supplierData->catagory=$request->catagory_name;

        $supplierData->unit=$request->unit_name;
       
        $image=$request->product_image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->product_image->move('product_image',$imagename);
        $supplierData->image=$imagename;

        $supplierData->status=$request->status;
        $supplierData->sku=$request->sku;
        $supplierData->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }



    public function all_product(){
        $allProductData = Product::all();
        return view ('admin\manage_product\all_product',compact('allProductData'));
    }



    public function edit_product($id){
        $viewData= Product::find($id);
        $catagoryData=Catagory::all();
        $unitData=Unit::all();
        // print_r(compact('viewData'));
        return view ('admin\manage_product\edit_product',compact('viewData','unitData','catagoryData'));
    }



    public function update_product(Request $request, $id){
        $viewData= Product::find($id);
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



    public function searchProduct (Request $request){
        // $categories=Catagory::all();
        $searchText=$request->Search_Supplier;
        $supplierDatas =Product::where('name','LIKE',"%$searchText%");
        return view('admin.manage_suppliers.all_supplier',compact('allSupplierData'));
    }
}
