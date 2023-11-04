<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function view_customer_form(){
       return view('admin.manage_customers.add_customer');
    }


    // public function add_customer(Request $request){
    //     $customerData=new Customer;
    //     $customerData->name=$request->customer_name;
    //     $customerData->email=$request->customer_email;
    //     $customerData->phone=$request->customer_phone;
    //     $customerData->address=$request->customer_address;

    //     $image=$request->customer_image;
    //     $imagename=time().'.'.$image->getClientOriginalExtension();
    //     $request->supplier_image->move('customer_image',$imagename);
    //     $customerData->image=$imagename;

    //     $customerData->status=$request->status;
    //     $customerData->save();
    //     return redirect()->back()->with('massage', 'data update sucsessfully');
    //     return view ('admin.manage_customers.add_customer');
    // }

    public function all_customer(){

        return view ('admin.manage_customers.all_customers');
    }

    public function due_customer(){

        return view ('admin.manage_customers.due_customer');
    }

    public function customer_report(){

        return view ('admin.manage_customers.cusomer_report');
    }
}
