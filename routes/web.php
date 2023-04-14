<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
    $mens=Product::whereCategory('Erkek')->take(5)->orderBy('point','DESC')->get();
    $womens=Product::whereCategory('Kadın')->take(5)->orderBy('point','DESC')->get();
    $kids=Product::whereCategory('Çocuk')->take(5)->orderBy('point','DESC')->get();
    $aks=Product::whereCategory('Aksesuar')->take(5)->orderBy('point','DESC')->get();
    return view('front.home',compact('mens','womens','kids','aks'));
})->name('/');

Route::get('login', function () {
    return view('front.login');
})->name('login');

Route::get('register', function () {
    return view('front.register');
})->name('register');

Route::post('loginPost', [Controller::class, 'loginPost'])->name('loginPost');
Route::post('registerPost', [Controller::class, 'registerPost'])->name('registerPost');
Route::get('/detail/{id}', [Controller::class, 'detail'])->name('detail');
Route::get('/products/{kind}', [Controller::class, 'products'])->name('products');

Route::middleware('auth','verified')->group(function()
{
Route::get('cart',[Controller::class,'cart'])->name('cart');
Route::get('profil', function () {return view('front.profil');})->name('profil');
Route::post('profilePost', [Controller::class, 'profilePost'])->name('profilePost');
Route::get('/userDelete/{id}', [Controller::class, 'userDelete'])->name('userDelete');
Route::get('addCart',[Controller::class,'addCart'])->name('addCart');
Route::get('addCartNumber',[Controller::class,'addCartNumber'])->name('addCartNumber');
Route::get('/cartDelete/{id}', [Controller::class, 'cartDelete'])->name('cartDelete');
Route::get('cartAllDelete',[Controller::class,'cartAllDelete'])->name('cartAllDelete');
Route::get('logOut', [Controller::class, 'logOut'])->name('logOut');
});
