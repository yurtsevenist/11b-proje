<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\ProfilePostRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
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
    public function registerPost(RegisterPostRequest $request)
    {
        $request->flash();
        try {
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            toastr()->success('Üyeliğiniz tamamlanmıştır ', 'Başarılı');
            return view('front.login');
        } catch (\Throwable $th) {
            toastr()->error('Beklenmedik bir hata meydana geldi','Hata');
            return redirect()->back();
        }

    }
    public function profilePost(ProfilePostRequest $r)
    {
        try {
            //$user=User::whereId(Auth::user()->id)->first();
            $user=User::find(Auth::user()->id);
            $user->name=$r->name;
            $user->password=Hash::make($r->password);
            $user->save();
            toastr()->success('Bilgileriniz güncellenmiştir', 'Başarılı');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error('Beklenmedik bir hata meydana geldi','Hata');
            return redirect()->back();
        }


    }
    public function userDelete($id)
    {
       $sil= User::whereId($id)->first();
       $sil->delete();
       toastr()->success('Üyeliğiniz Sonlandırılmıştır', 'Başarılı');
       return view('front.home');
    }
    public function detail($id)
    {
        $urun=Product::whereId($id)->first();
        return view('front.detail',compact('urun'));
    }
}
