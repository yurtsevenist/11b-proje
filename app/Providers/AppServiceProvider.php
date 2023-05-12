<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $mycart=0;
        View::composer('*', function ($view) use($auth) {
            $mycart=0;
            if($auth->user())
            $mycart=Cart::where('cid',$auth->user()->id)->whereOcode('notyet')->get()->sum('number');
            $view->with('mycart',$mycart);
        });
    }
}
