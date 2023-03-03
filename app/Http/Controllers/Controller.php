<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Hoşgeldin '.Auth::user()->name, 'Karşılama');
            return view('front.home');
        }

            toastr()->error('Şifreniz veya kullanıcı adınız hatalı ','Hata');
            return view('front.login');
    }
    public function logOut()
    {
        toastr()->info('Güle Güle '.Auth::user()->name, 'Uğurlama');
        Auth::logout();
        return view('front.home');
    }
}
