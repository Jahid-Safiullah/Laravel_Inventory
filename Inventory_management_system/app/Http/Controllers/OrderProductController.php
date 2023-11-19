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
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;

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
            //  return redirect()->route('print_invoice');
            return redirect()->back()->with('success', 'Order completed successfully');

        }catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();

            // Log the error or handle it as needed
        // \Log::error('Order processing error: ' . $e->getMessage());


            return redirect()->back()->with('error', 'Order not completed');
        }

    }





    public function print_invoice(){

        // $lastCusID=Order_product::max('order_customer_table_id');
        // $order_ricipet=Order_product::where('order_customer_table_id',$lastCusID)->get();
        $order_ricipet=Order_product::with('product','order_cusomer.customer')->get();
        // return $order_ricipet;


        return view('admin\manage_sells\print_invoice',compact('order_ricipet'));
    }





    public function o_report(){


        $all_product=Order_cusomer::with('customer')->get();
        // $all_product=Order_product::with('product','order_cusomer.customer')->get();
        // return $all_product;
        // dd($all_product);
        return view('admin\manage_sells\sells_report',compact('all_product'));
    }




    public function sell_details($id){
           // dd($id);
            //  return $id;
        //$all_product=Order_cusomer::with('customer')->get();
        $allCustomerProduct=Order_product::with('product','order_cusomer.customer')->where('order_customer_table_id',$id)->get();
        // return $allCustomerProduct;
        // dd($all_product);
        return view('admin\manage_sells\sells_details',compact('allCustomerProduct'));
    }




    public function print_pdf($id)
    {
        $allCustomerProduct = Order_product::with('product', 'order_cusomer.customer')->where('order_customer_table_id', $id)->get();

        if ($allCustomerProduct->isEmpty()) {
            // Handle the case where the order product is not found
            abort(404);
        }

        $pdf = PDF::loadView('admin.manage_sells.sells_details', compact('allCustomerProduct'));

        return $pdf->download('Trunk_Voucher.pdf');
    }





    //for show daily/monthly/yearly sell-----
        public function showSells($type)
        {
            $headline = '';
            $all_product = collect(); // Initialize an empty collection

            // Set the headline and fetch records based on the route type
            if ($type === 'today') {
                $headline = 'Today\'s Sell Product List';
                $all_product = Order_cusomer::whereDate('created_at', Carbon::today())->get();
            } elseif ($type === 'monthly') {
                $headline = 'Monthly Sell Product List';
                $all_product = Order_cusomer::whereMonth('created_at', Carbon::now()->month)->get();
            } elseif ($type === 'yearly') {
                $headline = 'Yearly Sell Product List';
                $all_product = Order_cusomer::whereYear('created_at', Carbon::now()->year)->get();
            } else {
                // Handle unknown type (optional)
            }

            return view('admin\manage_sells\todays_sell', compact('headline', 'all_product'));
        }



//for print daily/ monthly/ yearly invoice----
    public function showInvoice($type)
    {
        $headline = '';
        $records = collect(); // Initialize an empty collection

        // Set the headline and fetch records based on the invoice type
        if ($type === 'daily') {
            $headline = 'Daily Invoice';
            $allCustomerProduct=Order_product::with('product','order_cusomer.customer')
                                ->where('order_customer_table_id',$id)
                                ->whereDate('created_at', Carbon::today())->get();

        } elseif ($type === 'monthly') {
            $headline = 'Monthly Invoice';
            $allCustomerProduct=Order_product::with('product','order_cusomer.customer')
                                ->where('order_customer_table_id',$id)
                                ->whereMonth('created_at', Carbon::now()->month)->get();
        } elseif ($type === 'yearly') {
            $headline = 'Yearly Invoice';
            $allCustomerProduct=Order_product::with('product','order_cusomer.customer')
                                ->where('order_customer_table_id',$id)
                                ->whereYear('created_at', Carbon::now()->year)->get();
        } else {
            // Handle unknown type (optional)
        }

        return view('admin\manage_sells\all_invoice', compact('headline', 'allCustomerProduct'));
    }








}


