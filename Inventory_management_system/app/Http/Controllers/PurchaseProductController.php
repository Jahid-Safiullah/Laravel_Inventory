<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Purchase_product;
use App\Models\Product;
use App\Models\Supplier;
use APP\Models\User;
use Illuminate\Http\Request;


class PurchaseProductController extends Controller
{
    public function index(){
        $supplierData=Supplier::all();
        $productData=Product::all();
        return view('admin\mange_purchase\purchase',compact('supplierData','productData'));
    }
    public function add_purchase_order(Request $request){
        // dd($request);
        // echo"<pre>";
        // print_r($request);
        // exit();
        $purchaseData=new Purchase;
        $purchaseData->suppliers_id=$request->supplier_id;
        $purchase_product_Data=new Purchase_product;
        $purchase_product_Data->product_catagory=$purchaseData->id;
        // $purchase_product_Data->join('contacts', 'Purchase_product.id', '=', 'contacts.user_id')// joining the contacts table , where user_id and contact_user_id are same
        // ->select('users.*', 'contacts.phone')
        // ->get();
        // dd($purchaseData);
        $purchaseData->save();
        return redirect()->route('add_purchase_order');
    }
    public function add_cart(){

    }



    // public function add_product(Request $request){
    //     // print_r($request->all());
    //     // $supplierData=supuplier::all();

    //     $supplierData=new Product;

    //     $supplierData->name=$request->product_name;
    //     $supplierData->description=$request->product_des;

    //     $supplierData->catagory=$request->catagory_name;

    //     $supplierData->unit=$request->unit_name;

    //     $image=$request->product_image;
    //     $imagename=time().'.'.$image->getClientOriginalExtension();
    //     $request->product_image->move('product_image',$imagename);
    //     $supplierData->image=$imagename;

    //     $supplierData->status=$request->status;
    //     $supplierData->sku=$request->sku;
    //     $supplierData->save();
    //     return redirect()->back()->with('message','Product Added Successfully');
    // }



    // public function index(){
    //     // $allProductData = Purchase::all();
    //     return view ('admin\mange_purchase\purchase');
    // }



    // public function edit_product($id){
    //     $viewData= Product::find($id);
    //     $catagoryData=Catagory::all();
    //     $unitData=Unit::all();
    //     // print_r(compact('viewData'));
    //     return view ('admin\manage_product\edit_product',compact('viewData','unitData','catagoryData'));
    // }



    // public function update_product(Request $request, $id){
    //     $viewData= Product::find($id);
    //     // print_r(compact('viewData'));
    //     $viewData->name=$request->supplier_name;
    //     $viewData->email=$request->supplier_email;
    //     $viewData->phone=$request->supplier_phone;
    //     $viewData->address=$request->supplier_address;

    //     $image=$request->supplier_image;
    //     if($image){
    //     $imagename=time().'.'.$image->getClientOriginalExtension();
    //     $request->supplier_image->move('supplier_image',$imagename);
    //     $viewData->image=$imagename;
    //     }

    //     $viewData->status=$request->supplier_status;
    //     $viewData->save();
    //     return redirect()->back()->with('message','Product Added Successfully');
    //     // return view ('admin.manage_suppliers.edit_supplier',compact('viewData'));
    // }



    // public function delete_product($id){

    //         $productData= Product::find($id);
    //         $productData->delete();
    //         return back();

    // }




    // public function searchProduct (Request $request){
    //     // $categories=Catagory::all();
    //     $searchText=$request->Search_Supplier;
    //     $supplierDatas =Product::where('name','LIKE',"%$searchText%");
    //     return view('admin.manage_suppliers.all_supplier',compact('allSupplierData'));
    // }
}
