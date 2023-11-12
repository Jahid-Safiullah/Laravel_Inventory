<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Purchase_product;
use App\Models\Product;
use App\Models\Supplier;
use APP\Models\User;
use App\Models\Cart;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PurchaseProductController extends Controller
{
    public function index(){
        $supplierData=Supplier::all();
        $productData=Product::all();
        $purchase_product_Data=DB::table('Carts')->join('products', 'carts.product_id', '=', 'products.id')
        ->get();
        return view('admin\mange_purchase\purchase',compact('supplierData','productData','purchase_product_Data'));
    }



    public function add_cart(Request $request){
        // dd($request->all());
        $request->validate([

            // 'add_cart_product' => 'required|exists:products,id',
            'product_id' => [
                'required',
                'exists:products,id',
                Rule::unique('Carts')->where(function ($query) use ($request) {
                    return $query
                                //  ->where('user_id', auth()->id())
                                 ->where('product_id', $request->input('product_id'))
                                 ->where('created_at', '>', now()->subHours(24)); // Adjust the time frame as needed
                }),
            ],
            // Other validation rules for your form fields
        ]);
        $purchaseData=new Cart;
        $purchaseData->product_id=$request->product_id;
        // dd($purchaseData);


            $purchaseData->save();
            return redirect()->back();



    }



    public function submit_purchase(Request $request){
        // dd($request);
        // echo"<pre>";
        // print_r($request);
        // exit();
        $request->validate([
            'supplier_id' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'date' => 'required',
            // Add more validation rules as needed
        ]);
        //add supplier_id at purchase tabel
        $purchaseData=new Purchase;
        $purchaseData->suppliers_id= $request->supplier_id;

        $currentDate = Carbon::now();
        $totalPrice=$request->buying_price*$request->quantity;
        $orderId =Str::uuid();
        $cartDatas=cart::all();
        foreach($cartDatas as $cartData){

            $purchase_product_Tabel=new Purchase_product;
            $purchase_product_Tabel->purchase_code= $orderId;
            $purchase_product_Tabel->purchases_id= $request->supplier_id;

            $purchase_product_Tabel->product_id=   $cartData->product_id;
            $purchase_product_Tabel->buy_price=  $request->buying_price;
            $purchase_product_Tabel->sell_price=  $request->selling_price;
            $purchase_product_Tabel->quantity= $request->quantity;
            $purchase_product_Tabel->total_price=  $totalPrice;
            // $purchase_product_Tabel->dis_price= $request->dis_price;
            // $purchase_product_Tabel->paid_price= $request->paid_price;
            $purchase_product_Tabel->date= $request->date;
            $purchase_product_Tabel->month= $currentDate->format('m');
            $purchase_product_Tabel->year= $currentDate->format('Y');


        $purchase_product_Tabel->save();

//for deleting data from cart table which are added in order table.
            $cart_id=$cartData->id;
            $delete_cart_id=Cart::find($cart_id);
            $delete_cart_id->delete();



        }
        return redirect()->back()->with('message','Product Added Successfully');




        // $purchaseData=new Purchase_product;




        // $purchase_product_Data=DB('Carts')->join('products', 'carts.product_id', '=', 'products.id')
        //                         ->get();

        // dd($purchase_product_Data);
        // $purchase_product_Data->save();
        // return redirect()->route('add_purchase_order');
    }




    public function all_purchase(){
    //      $supplierData=Supplier::all();
        $purchaseSupplier=Purchase::all();
        $purchase_product_Data=DB::table('Purchase_products')->join('products', 'Purchase_products.product_id', '=', 'products.id')
        ->get();
        // foreach($purchase_product_Data as $purchase_data){

        return view('admin\mange_purchase\all_purchase',compact('purchaseSupplier','purchase_product_Data'));
    //     return redirect()->back()->with('message','Product Added Successfully');
    }



    public function approval_purchase(){
        //      $supplierData=Supplier::all();
            $purchaseSupplier=Purchase::all();
            $purchase_product_Data=DB::table('Purchase_products')->join('products', 'Purchase_products.product_id', '=', 'products.id')
            ->get();
            // foreach($purchase_product_Data as $purchase_data){

            return view('admin\mange_purchase\approval_purchase',compact('purchaseSupplier','purchase_product_Data'));
        //     return redirect()->back()->with('message','Product Added Successfully');
        }





    public function daily_purchase(){
            //$supplierData=Supplier::all();
            $purchaseSupplier=Purchase::all();
            $purchase_product_Data=DB::table('Purchase_products')->join('products', 'Purchase_products.product_id', '=', 'products.id')
            ->get();
            // foreach($purchase_product_Data as $purchase_data){

               return view('admin\mange_purchase\daily_purchase_report',compact('purchaseSupplier','purchase_product_Data'));
        //  return redirect()->back()->with('message','Product Added Successfully');
        }







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
