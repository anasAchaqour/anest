<?php
use Livewire\Livewire;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\category;
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

Route::get('/in', function () {
    return view('sign-in-up.sign_in');
});
Route::get('/up', function () {
    return view('sign-in-up.sign_up');
});
Route::get('/', function () {
    return view('test');
});


Route::resource('/categories', CategoryController::class);


Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::post('/products/create', [ProductController::class, 'store']);


