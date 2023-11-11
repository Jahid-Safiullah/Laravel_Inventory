<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PurchaseProductController;
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
Route::post('/add_purchase_order', [PurchaseProductController::class, 'add_purchase_order'])->name('add_purchase_order');


//for purchase product--
Route::post('/add_cart', [PurchaseProductController::class, 'add_cart']);


// Route::get('/all_purchase', [PurchaseProductController::class, 'all_purchase'])->name('all_purchase');
// Route::get('/edit_product/{id}', [PurchaseProductController::class, 'edit_product'])->name('edit_product');
// Route::post('/update_product/{id}', [PurchaseProductController::class, 'update_product'])->name('update_product');
// Route::get('/delete_product/{id}', [PurchaseProductController::class, 'delete_product']);

