<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
       return view('admin.manage_customers.add_customer');
    }


    public function add_customer(Request $request){
        $customerData=new Customer;
        $customerData->name=$request->customer_name;
        $customerData->email=$request->customer_email;
        $customerData->phone=$request->customer_phone;
        $customerData->address=$request->customer_address;

        $image=$request->customer_image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->customer_image->move('customer_image',$imagename);
        $customerData->image=$imagename;

        $customerData->status=$request->status;
        $customerData->save();
        return redirect()->back()->with('massage', 'data update sucsessfully');
        // return view ('admin.manage_customers.add_customer');
    }

    public function all_customer(){
        $allCustomerData=Customer::all();
        return view ('admin.manage_customers.all_customers',compact('allCustomerData'));
    }


    public function edit_customer($id){
        $customerData=Customer::find($id);
        return view('admin\manage_customers\edit_cusomer',compact('customerData'));

    }

    public function update_customer(Request $request, $id){
        $updateData=Customer::find($id);
        $updateData->name=$request->customer_name;
        $updateData->email=$request->customer_email;
        $updateData->phone=$request->customer_phone;
        $updateData->address=$request->customer_address;

        $image=$request->customer_image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->customer_image->move('customer_image',$imagename);
        $updateData->image=$imagename;
        }
        $updateData->status=$request->status;
        $updateData->save();
        return redirect()->back()->with('massage', 'data update sucsessfully');
    }


    public function due_customer(){

        return view ('admin.manage_customers.due_customer');
    }

    public function customer_report(){

        return view ('admin.manage_customers.cusomer_report');
    }
}
