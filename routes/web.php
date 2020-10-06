<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});


Route::get('/entrepreneurs', function() {
    $users = App\Models\User::where('is_entrepreneur', true)->paginate(4);
    return view('entrepreneurs', ['users' => $users]);
});

Route::get('/brands', [App\Http\Controllers\BrandsController::class, 'index']);
Route::post('/brands', [App\Http\Controllers\BrandsController::class, 'store'])->name('brands.create');
Route::get('/brands/create', [App\Http\Controllers\BrandsController::class, 'create']);

Route::get('/products', function() {
    return view('products');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
