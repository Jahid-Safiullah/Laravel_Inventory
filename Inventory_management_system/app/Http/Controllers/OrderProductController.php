<?php
namespace App\Http\Controllers;

use App\Models\Purchase_product;
use App\Models\Order_product;
use App\Models\Order_cusomer;
use App\Models\Customer;
use App\Models\SellsCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function order(Request $request)
     { 
        // exit();
        try {
            // Check if the cart is empty
            if (SellsCart::count() === 0) {
                return redirect()->back()->with('error', 'The cart is empty. Unable to process the order.');
            }
            // Validate the incoming request data
            $request->validate([
                'customer' => 'required|exists:customers,id',
                'paid_amount' => 'required|numeric',
                'date' => 'required|date',
            ]);

        
            // Create an order customer record
            $customerData = new Order_cusomer;
            $customerData->customer_id = $request->customer;
            $customerData->save();
            $order_customer_table_id = $customerData->id;

            // Get the cart data
            $cart = SellsCart::all();
            $orderId = Str::uuid();

            // Loop through the cart and create order product records
            foreach ($cart as $cartdata) {
                $order_product_table = new Order_product;
                $order_product_table->invoice = $orderId;
                $order_product_table->product_id = $cartdata->product_id;
                $order_product_table->order_customer_table_id = $order_customer_table_id;
                $order_product_table->purchase_p_id = $cartdata->purchase_p_id;
                $order_product_table->cart_id = $cartdata->id;
                $order_product_table->quantity = $cartdata->quantity;
                $order_product_table->total_price = $cartdata->total;
                $order_product_table->sub_total = $cartdata->sub_total;
                $order_product_table->paid_amount = $request->paid_amount;
                $order_product_table->date = $request->input('date');
                $order_product_table->save();
            }

            // Delete data from the cart table
            SellsCart::truncate();
            return redirect()->back()->with('success', 'Order completed successfully');
        }catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();

            // Log the error or handle it as needed


            return redirect()->back()->with('error', 'Order not completed');
        }

    }


    public function o_report(){
       
        return view('admin\manage_sells\sells_report',compact('ordered_product'));
    }

}


