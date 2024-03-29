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

    public function all_purchase(){
            $purchaseSupplier=Purchase::all();
            $purchase_product_Data=DB::table('Purchase_products')->join('products', 'Purchase_products.product_id', '=', 'products.id')
            ->select('Purchase_products.id as pp_id','Purchase_products.buy_price','Purchase_products.sell_price','Purchase_products.quantity','products.name','products.unit','products.image','products.status',)
            ->get();
            return view('admin\mange_purchase\all_purchase',compact('purchaseSupplier','purchase_product_Data'));

        }




        public function showDetails($id)
        {
            // Retrieve the purchase product details with its associated product for the specific $id
            // $purchaseProduct = DB::table('Purchase_products')
            //     ->join('products', 'Purchase_products.product_id', '=', 'products.id')
            //     ->where('Purchase_products.id', $id)
            //     ->first(); // Use first() to get a single result
            // $purchaseProduct = Purchase_product::with('product')->findOrFail($id);

            // Debugging: Check the result for the specific $id
            // dd($purchaseProduct);
        
            // Pass the purchase product details to the view
            $showData= Purchase_product::join('products','purchase_products.product_id', 'products.id')->find($id);
            return view('admin\mange_purchase\poduct_dtailes', compact('showData'));
        }
        






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
                              ->where('product_id', $request->input('product_id'))
                              ->where('created_at', '>', now()->subHours(24));
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


    public function submit_purchase(Request $request)
    {
        // return $request->all();
        $request->validate([
            'supplier_id' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);

        $currentDate = Carbon::now();
        $orderId = Str::uuid();



        //purchase supplier---
        $purchaseData = new Purchase;
        $purchaseData->suppliers_id = $request->supplier_id;
        $purchaseData->save();
        $purchases_id=$purchaseData->id;


            //purchase product---
        for($product_id = 0; $product_id < count($request->product_id); $product_id++)
        {
            $purchase_product_Tabel = new Purchase_product;
            $purchase_product_Tabel->purchase_code=$orderId;
            $purchase_product_Tabel->purchases_id=$purchases_id;
            $purchase_product_Tabel->product_id=$request->product_id[$product_id];
            $purchase_product_Tabel->buy_price=$request->buying_price[$product_id];
            $purchase_product_Tabel->sell_price=$request->selling_price[$product_id];
            $purchase_product_Tabel->quantity=$request->quantity[$product_id];
            $purchase_product_Tabel->date=$request->date;
            $purchase_product_Tabel->month= $currentDate->format('m');
            $purchase_product_Tabel->year= $currentDate->format('Y');
            $purchase_product_Tabel->save();


        }
         //for deleting data from cart table which are added in order table.
         Cart::truncate();





         return redirect()->back()->with('success', 'Purchase completed successfully');
    }







    // public function submit_purchase(Request $request){
    //     // dd($request->All());
    //     // echo"<pre>";
    //     // print_r($request);
    //     // exit();
    //     $request->validate([
    //         'supplier_id' => 'required',
    //         'buying_price' => 'required',
    //         'selling_price' => 'required',
    //         'quantity' => 'required',


    //     ]);
    //     $purchaseData=new Purchase;
    //     $purchaseData->suppliers_id= $request->supplier_id;


    //         $product_ids = $request->input('product_id');
    //         $buyingPrices = $request->input('buying_price');
    //         $sellingPrices = $request->input('selling_price');
    //         $quantities = $request->input('quantity');

    //         $purchase_product_Tabel=new Purchase_product;
    //         $currentDate = Carbon::now();
    //         $orderId =Str::uuid();
    //         $cartDatas=cart::all();

    //         $purchase=Purchase::all();
    //         // dd($quantities);


    //         foreach () {

    //         // dd($quantity);

    //         $purchase_product_Tabel->purchase_code= $orderId;
    //         // $purchase_product_Tabel->purchases_id=  $purchase->id;
    //         $purchase_product_Tabel->product_id= $product_id ;
    //         $purchase_product_Tabel->buy_price=  $buyingPrice;
    //         $purchase_product_Tabel->sell_price=  $sellingPrice;
    //         $purchase_product_Tabel->quantity= $quantity;
    //         // $purchase_product_Tabel->total_price=   ;
    //         // $purchase_product_Tabel->dis_price= $request->dis_price;
    //         // $purchase_product_Tabel->paid_price= $request->paid_price;

    //         // $purchase_product_Tabel->month= $currentDate->format('m');
    //         // $purchase_product_Tabel->year= $currentDate->format('Y');

    //         $purchase_product_Tabel->save();

    //         }

    //  }





    //         // $purchase_product_Tabel->purchases_id=  '0';

    //     // foreach($cartDatas as $cartData){
    //     //     $purchase_product_Tabel->purchase_code= $orderId;
    //     //     // $purchase_product_Tabel->purchases_id=  $purchase->id;
    //     //     $purchase_product_Tabel->product_id=   $cartData->product_id;
    //     //     $purchase_product_Tabel->buy_price=  $request->input('buying_price')[$key];
    //     //     $purchase_product_Tabel->sell_price=  $request->input('selling_price')[$key];
    //     //     $purchase_product_Tabel->quantity= $request->input('quantity')[$key];
    //     //     // $purchase_product_Tabel->total_price=   ;
    //     //     // $purchase_product_Tabel->dis_price= $request->dis_price;
    //     //     // $purchase_product_Tabel->paid_price= $request->paid_price;
    //     //     $purchase_product_Tabel->date= $request->date;
    //     //     $purchase_product_Tabel->month= $currentDate->format('m');
    //     //     $purchase_product_Tabel->year= $currentDate->format('Y');

    //     //     $purchase_product_Tabel->save();

    //     //     //for deleting data from cart table which are added in order table.
    //     //     // $cart_id=$cartData->id;
    //     //     // $delete_cart_id=Cart::find($cart_id);
    //     //     // $delete_cart_id->delete();
    //     // }
    //     return redirect()->back()->with('message','Product Added Successfully');

    // }




    public function approval_purchase(){

            $purchaseSupplier=Purchase::all();
            $purchase_product_Data=DB::table('Purchase_products')->join('products', 'Purchase_products.product_id', '=', 'products.id')
            ->get();
            return view('admin\mange_purchase\approval_purchase',compact('purchaseSupplier','purchase_product_Data'));

        }





    public function daily_purchase(){

            $purchaseSupplier=Purchase::all();
            $purchase_product_Data=DB::table('Purchase_products')->join('products', 'Purchase_products.product_id', '=', 'products.id')
                                        ->get();
            return view('admin\mange_purchase\daily_purchase_report',compact('purchaseSupplier','purchase_product_Data'));

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
