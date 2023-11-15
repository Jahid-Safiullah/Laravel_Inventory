<?php

namespace App\Http\Controllers;
use App\Models\Purchase_product;
use App\Models\Sell;
use App\Models\SellsCart;
use App\Models\Order_product;
use App\Models\Order_cusomer;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartData= DB::table('sells_carts')
                        ->join('products', 'sells_carts.product_id', '=', 'products.id')
                       ->join('Purchase_products', 'sells_carts.purchase_p_id', '=', 'Purchase_products.id')
                        // ->select('products.name as p_name','Purchase_products.sell_price as selling_price','sells_carts.total as cart_total','sells_carts.sub_total as s_total','Purchase_products.quantity as purchase_qty','sells_carts.quantity as order_quantity' )
                        ->select('products.name as p_name','sells_carts.total as cart_total','Purchase_products.quantity as purchase_qty','sells_carts.quantity as order_quantity','Purchase_products.sell_price as selling_price' )
                        ->get();
        $productRow=DB::table('Purchase_products')
                        ->join('products', 'Purchase_products.product_id', '=', 'products.id')
                        ->select('products.id as p_id','products.name','products.image','products.description','Purchase_products.id as purchase_id','Purchase_products.sell_price','Purchase_products.dis_price')
                        ->get();
        $customers=Customer::where('status', 1)->select('name', 'id')->get();
        // dd($customer);

        return view('admin\manage_sells\sells', compact('cartData','productRow','customers'));


    }


     // Show the form for creating a new resource.
    public function addToCart(Request $request, $id)
     {
        // echo"<pre>";
        // print_r($id);
        // exit();
        $cartData=Purchase_product::find($id);
        // print_r($cartData);
        // exit();
        $cart=new SellsCart;
        $cart->product_id=$cartData->product_id;
        $cart->purchase_p_id=$cartData->id;
        $cart->quantity=$request->quantity;
        $cart->total=$request->quantity*$cartData->sell_price;
        // $cart->sub_total=$cart->sub_total+$cart->total ;
        // dd($purchaseData);
        $cart->save();
        return redirect()->back();
     }


     // Store a newly created resource in storage.
    public function store_order(Request $request, $id)
    {
         // echo"<pre>";
        // print_r($id);
        // exit();
        $cartData=SellsCart::find($id);
        // print_r($cartData);
        // exit();
        $add_CustomerData=new Order_cusomer;
        $add_ProductData=new Order_product;
        $add_ProductData->invoice=
        $add_ProductData->product_id=
        $add_ProductData->purchase_p_id=
        $add_ProductData->cart_id=
        $add_ProductData->quantity=
        $add_ProductData->total_price=
        $add_ProductData->sub_total=
        $add_ProductData->paid_amount=
        $add_ProductData->discount=
        $add_ProductData->date=

        // dd($purchaseData);
        $cart->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $cartData= SellsCart::all();
        // return view('admin\manage_sells\sells', compact('cartData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sell $sell)
    {
        //
    }
}
