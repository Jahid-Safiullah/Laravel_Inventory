<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PurchaseProductController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\OrderProductController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('admin.dashbord');
});



Route::get('/add_supplier_form', [SupplierController::class, 'index'])->name('index_supplier');
Route::post('/add_supplier', [SupplierController::class, 'add_supplier'])->name('add_supplier');
Route::get('/all_supplier', [SupplierController::class, 'all_supplier'])->name('all_supplier');
Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit_supplier']);
Route::post('/update_supplier/{id}', [SupplierController::class, 'update_supplier']);
Route::get('/Search_Supplier',[SupplierController::class,'searchSupplier']);



Route::get('/view_cusomer', [CustomerController::class, 'index']);
Route::post('/add_customer', [CustomerController::class, 'add_customer'])->name('add_customer');
Route::get('/all_customer', [CustomerController::class, 'all_customer'])->name('all_customer');
Route::get('/edit_customer/{id}', [CustomerController::class, 'edit_customer']);
Route::post('/update_customer/{id}', [CustomerController::class, 'update_customer']);
Route::get('/due_customer', [CustomerController::class, 'due_customer'])->name('due_customer');
Route::get('/customer_report', [CustomerController::class, 'customer_report'])->name('customer_report');




Route::get('/view_unit_form', [UnitController::class, 'index'])->name('units');
Route::post('/add_unit', [UnitController::class, 'add_unit'])->name('add_unit');
Route::get('/all_units', [UnitController::class, 'all_units'])->name('all_units');
Route::get('/edit_unit/{id}', [UnitController::class, 'edit_unit'])->name('edit_unit');
Route::post('/update_unit/{id}', [UnitController::class, 'update_unit'])->name('update_unit');



Route::get('/view_catagory_form', [CatagoryController::class, 'index'])->name('catagory');
Route::post('/add_catagory', [CatagoryController::class, 'add_catagory'])->name('add_catagory');
Route::get('/all_catagories', [CatagoryController::class, 'all_catagories'])->name('all_catagories');
Route::get('/edit_catagory/{id}', [CatagoryController::class, 'edit_catagory'])->name('edit_catagory');
Route::post('/update_catagory/{id}', [CatagoryController::class, 'update_catagory'])->name('update_catagory');



Route::get('/view_product_form', [ProductController::class, 'index'])->name('product');
Route::post('/add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::get('/all_product', [ProductController::class, 'all_product'])->name('all_product');
Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::post('/update_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);


Route::get('/view_purchase_form', [PurchaseProductController::class, 'index'])->name('purchase');
Route::post('/submit_purchase', [PurchaseProductController::class, 'submit_purchase'])->name('submit_purchase');
Route::get('/all_purchase', [PurchaseProductController::class, 'all_purchase'])->name('all_purchase_product');
Route::get('/purchase-details/{id}', [PurchaseProductController::class, 'showDetails'])->name('purchase.details');
Route::get('/approval_purchase', [PurchaseProductController::class, 'approval_purchase'])->name('approval_purchase');
Route::get('/daily_purchase', [PurchaseProductController::class, 'daily_purchase'])->name('daily_purchase');

//for purchase product--
Route::post('/add_cart', [PurchaseProductController::class, 'add_cart']);





Route::get('/sellsProduct', [SellController::class, 'index'])->name('sellsProduct');
// Route::get('/product-list', 'App\Http\Controllers\SellController@productList')->name('product.list');
Route::post('/product_order/{id}', 'App\Http\Controllers\SellController@addToCart')->name('add_order_to_cart');
Route::delete('/delete_post/{id}', 'App\Http\Controllers\SellController@delete_post');



// Route::get('/edit_product/{id}', [PurchaseProductController::class, 'edit_product'])->name('edit_product');
Route::post('/store_order/{id}', [SellController::class, 'store_order'])->name('store_order');
// Route::get('/delete_product/{id}', [PurchaseProductController::class, 'delete_product']);



//order submit----
Route::post('/place-order', [OrderProductController::class, 'order'])->name('order_submition');
// Route::post('/order_customer', [OrderProductController::class, 'order'])->name('order');
// Route::get('/order_report', [OrderProductController::class, 'o_report'])->name('order_report.order');
Route::get('/order_report', 'App\Http\Controllers\OrderProductController@o_report')->name('order_report.order');


