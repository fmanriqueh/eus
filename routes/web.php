<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageSent;

use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::paginate(12);
    return view('index',['products' => $products]);
});

Route::get('/cart', function() {
    return view('cart');
});

Route::get('/entrepreneurs', function() {
    $users = App\Models\User::where('is_entrepreneur', true)->paginate(12);
    return view('entrepreneurs', ['users' => $users]);
});

Route::get('/entrepreneurs/{id}', function($id) {
    $user = App\Models\User::where('id', $id)->first();
    return view('show', ['user' => $user]);
});

Route::post('/send', function(Request $request){

    Mail::to("yeison.manrique.31@gmail.com")->queue(new MessageSent("Test"));

});

Route::get('/brands', [App\Http\Controllers\BrandsController::class, 'index']);
Route::post('/brands', [App\Http\Controllers\BrandsController::class, 'store'])->middleware('auth')->name('brands.store');
Route::get('/brands/create', [App\Http\Controllers\BrandsController::class, 'create'])->middleware('auth');
Route::get('/brands/{id}', [App\Http\Controllers\BrandsController::class, 'show']);
Route::put('/brands/{id}/edit', [App\Http\Controllers\BrandsController::class, 'edit'])->middleware('auth');
// ↑ Check brand's owner
// Route::delete('/brands/{id}', [App\Http\Controllers\BrandsController::class, 'delete'])->middleware('auth');

Route::get('/brands/{id}/products', [App\Http\Controllers\ProductController::class, 'index']);
// ↑ Show products from a brand
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
// ↑ Show all products
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/create', [App\Http\Controllers\ProductController::class, 'create'])->middleware('auth');
Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show']);

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/brands/{id}/products', [App\Http\Controllers\DashboardController::class, 'products']);
