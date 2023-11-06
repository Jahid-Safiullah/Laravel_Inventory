<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
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
Route::patch('/add_unit', [UnitController::class, 'add_unit'])->name('add_unit');
// Route::delete('/customer_report', [UnitController::class, 'customer_report'])->name('customer_report');


Route::get('/add_catagories', [CatagoryController::class, 'add_catagories'])->name('add_catagories');
Route::get('/all_catagories', [CatagoryController::class, 'all_catagories'])->name('all_catagories');
// Route::delete('/customer_report', [CatagoryController::class, 'customer_report'])->name('customer_report');


Route::get('/all_product', [ProductController::class, 'all_product'])->name('all_product');
// Route::patch('/edit_supplier', [ProductController::class, 'edit_supplier'])->name('edit_supplier');
// Route::delete('/delete_supplier', [ProductController::class, 'delete_supplier'])->name('delete_supplier');
