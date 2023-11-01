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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/add_supplier', [SupplierController::class, 'add_supplier'])->name('add_supplier');
Route::get('/edit_supplier', [SupplierController::class, 'edit_supplier'])->name('edit_supplier');
Route::delete('/delete_supplier', [SupplierController::class, 'delete_supplier'])->name('delete_supplier');


Route::get('/all_customer', [CustomerController::class, 'all_customer'])->name('all_customer');
Route::get('/due_customer', [CustomerController::class, 'due_customer'])->name('due_customer');
Route::get('/customer_report', [CustomerController::class, 'customer_report'])->name('customer_report');


Route::get('/units', [UnitController::class, 'units'])->name('units');
// Route::patch('/due_customer', [UnitController::class, 'due_customer'])->name('due_customer');
// Route::delete('/customer_report', [UnitController::class, 'customer_report'])->name('customer_report');


Route::get('/all_catagories', [CatagoryController::class, 'all_catagories'])->name('all_catagories');
// Route::patch('/due_customer', [CatagoryController::class, 'due_customer'])->name('due_customer');
// Route::delete('/customer_report', [CatagoryController::class, 'customer_report'])->name('customer_report');


Route::get('/all_product', [ProductController::class, 'all_product'])->name('all_product');
// Route::patch('/edit_supplier', [ProductController::class, 'edit_supplier'])->name('edit_supplier');
// Route::delete('/delete_supplier', [ProductController::class, 'delete_supplier'])->name('delete_supplier');
