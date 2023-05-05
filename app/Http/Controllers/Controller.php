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
use App\Models\Cart;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Hoşgeldin '.Auth::user()->name, 'Karşılama');
            return redirect()->route('/');
        }

            toastr()->error('Şifreniz veya kullanıcı adınız hatalı ','Hata');
            return view('front.login');
    }
    public function logOut()
    {
        toastr()->info('Güle Güle '.Auth::user()->name, 'Uğurlama');
        Auth::logout();
        return redirect()->route('/');
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
    public function products($kind)
    {
        if($kind=="all")
        {
            $uruns=Product::orderBy('point','DESC')->paginate(9);
            $kind="Tüm Ürünler";
        }
        else if($kind=="men")
        {
            $uruns=Product::whereCategory('Erkek')->orderBy('created_at','DESC')->paginate(9);;
            $kind="Erkek Kategorisindeki Ürünler";
        }
        else if($kind=="women")
        {
            $uruns=Product::whereCategory('Kadın')->orderBy('created_at','DESC')->paginate(9);;
            $kind="Kadın Kategorisindeki Ürünler";
        }
        else if($kind=="kids")
        {
            $uruns=Product::whereCategory('Çocuk')->orderBy('created_at','DESC')->paginate(9);;
            $kind="Çocuk Kategorisindeki Ürünler";
        }
        else
        {
            $uruns=Product::whereCategory('Aksesuar')->orderBy('created_at','DESC')->paginate(9);;
            $kind="Aksesuar Kategorisindeki Ürünler";
        }
        return view('front.products',compact('uruns','kind'));

    }
    public function addCart(Request $request)
    {
        $product=Product::whereId($request->pid)->first();
        $mycart=0;
        if($product)
        {
            $cart=Cart::wherePid($product->id)->first();
            if(!$cart)//ürün sepette yoksa
            $cart=new Cart;//yeni bir ürün oluştur varsa bu satırı atlayacak
            $cart->cid=Auth::user()->id;
            $cart->pid=$product->id;
            $cart->size=$product->size;
            $cart->number+=1;
            $cart->tprice+=$product->price;
            $cart->save();
            $mycart=Cart::where('cid',Auth::user()->id)->get()->sum('number');
            return response()->json($mycart);
        }
        else
        {
            return response()->json($mycart);
        }
    }
    public function addCartNumber(Request $request)
    {
        $product=Product::whereId($request->pid)->first();
        $mycart=0;
        if($product)
        {
            $cart=Cart::wherePid($product->id)->first();
            if(!$cart)//ürün sepette yoksa
            $cart=new Cart;//yeni bir ürün oluştur varsa bu satırı atlayacak
            $cart->cid=Auth::user()->id;
            $cart->pid=$product->id;
            $cart->size=$product->size;
            $cart->number+=$request->pnumber;
            $cart->tprice+=$product->price;
            $cart->save();
            $mycart=Cart::where('cid',Auth::user()->id)->get()->sum('number');
            return response()->json($mycart);
        }
        else
        {
            return response()->json($mycart);
        }
    }
    public function cart()
    {
        $ocode="notyet";
        $carts=Cart::whereCid(Auth::user()->id)->whereOcode($ocode)->with('getProduct')->orderBy('created_at','ASC')->get();
        return view('front.cart',compact('carts'));
    }
    public function payment()
    {
        $ocode="notyet";
        $cart=Cart::whereCid(Auth::user()->id)->whereOcode($ocode)->get();
        $sum=$cart->sum('tprice');
        $number=$cart->sum('number');
        $cargo=0;
        if($sum<100)
        $cargo=2+(($number-1)*0.5);
        return view('front.payment',compact('sum','cargo'));
    }
    public function cartDelete($id)
    {
        try {
            $cart=Cart::whereId($id)->first();
            $cart->delete();
            toastr()->success('Ürün sepetinizden çıkarıldı', 'Başarılı');

        } catch (\Exception $th) {
            toastr()->error('Beklenmedik bir hata meydana geldi', 'Hata');
        }
        return redirect()->back();

    }
    public function cartAllDelete()
    {
        $carts=Cart::whereCid(Auth::user()->id)->get();
        foreach($carts as $cart)
        {
            $cart->delete();
        }
        toastr()->success('Ürünle sepetinizden çıkarıldı', 'Başarılı');
        return redirect()->back();
    }
}
