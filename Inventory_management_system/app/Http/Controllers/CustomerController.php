<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function add_customer(){
        return view ('admin.manage_customers.add_customer');
    }

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
