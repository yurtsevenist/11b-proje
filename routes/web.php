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
});

Route::get('login', function () {
    return view('front.login');
});

Route::get('register', function () {
    return view('front.register');
});

Route::get('profil', function () {
    return view('front.profil');
});

Route::post('loginPost', [Controller::class, 'loginPost'])->name('loginPost');
Route::post('registerPost', [Controller::class, 'registerPost'])->name('registerPost');
Route::post('profilePost', [Controller::class, 'profilePost'])->name('profilePost');

Route::get('/userDelete/{id}', [Controller::class, 'userDelete'])->name('userDelete');
Route::get('/detail/{id}', [Controller::class, 'detail'])->name('detail');
Route::get('logOut', [Controller::class, 'logOut'])->name('logOut');
