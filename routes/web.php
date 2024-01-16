<?php
use Livewire\Livewire;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
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




// products
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products/create', [ProductController::class, 'store']);
Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);

// categories
Route::resource('/categories', CategoryController::class);
// suppliers
Route::resource('/suppliers', SupplierController::class);
Route::get('suppliers-products', [SupplierController::class, 'showAllSuppliersWithProducts']);

// clients
Route::resource('clients', ClientController::class);





Auth::routes();
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("admin/home",[HomeController::class, 'adminHome'])->name("home.admin");
});

Route::middleware(['auth','user-role:warehouse_staff'])->group(function()
{
    Route::get("warehouse_staff/home",[HomeController::class, 'warehouse_staffHome'])->name("home.warehouse_staff");
});

Route::middleware(['auth','user-role:client'])->group(function()
{
    Route::get("client/home",[HomeController::class, 'clientHome'])->name("home.client");       
});
