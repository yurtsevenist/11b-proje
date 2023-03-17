<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/css/font-awesome.css">

    <link rel="stylesheet" href="{{asset('front')}}/assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="{{asset('front')}}/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="{{asset('front')}}/assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{asset('front')}}/assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Anasayfa</a></li>
                            <li class="scroll-to-section"><a href="#men">Erkek</a></li>
                            <li class="scroll-to-section"><a href="#women">Kadın</a></li>
                            <li class="scroll-to-section"><a href="#kids">Çocuk</a></li>
                            <li class="scroll-to-section"><a href="#">İletişim</a></li>
                            @auth
                            <li class="submenu">
                                <a href="javascript:;">{{Auth::user()->name}}</a>
                                <ul>
                                    <li><a href="#">Sepetim</a></li>
                                    <li><a href="#">Siparişlerim</a></li>
                                    <li><a href="{{route('logOut')}}">Oturumu Kapat</a></li>

                                </ul>
                            </li>

                            @else
                               <li class="submenu">
                                <a href="javascript:;">Üye İşlemleri</a>
                                <ul>
                                    <li><a href="{{url('login')}}">Oturum Aç</a></li>
                                    <li><a href="{{url('register')}}">Üye Kayıt</a></li>
                                    <li><a href="#">Şifremi Unuttum</a></li>
                                </ul>
                            </li>

                            @endauth
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
