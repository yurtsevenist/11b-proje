    @extends('front.layouts.master')
    @section('content')
        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner" id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <div class="thumb">
                                <div class="inner-content">
                                    <h4>Tüm Ürünlerimiz</h4>
                                    <span>Sizin için özenle seçmiş olduğumuz ürünlerimiz?</span>
                                    <div class="main-border-button">
                                        <a href="{{route('products','all')}}">Şimdi Satın Al!</a>
                                    </div>
                                </div>
                                <img src="{{asset('front')}}/assets/images/left-banner-image.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>Kadın</h4>
                                                <span>Tüm Kadın Ürünlerimiz</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Kadın</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                    <div class="main-border-button">
                                                        <a href="{{route('products','women')}}">Keşfet</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="{{asset('front')}}/assets/images/baner-right-image-01.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>Men</h4>
                                                <span>Best Clothes For Men</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Men</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                    <div class="main-border-button">
                                                        <a href="{{route('products','men')}}">Keşfet</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="{{asset('front')}}/assets/images/baner-right-image-02.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>Çocuk</h4>
                                                <span>Best Clothes For Kids</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Çocuk</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                    <div class="main-border-button">
                                                        <a href="{{route('products','kids')}}">Keşfet</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="{{asset('front')}}/assets/images/baner-right-image-03.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>Accessories</h4>
                                                <span>Best Trend Accessories</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Accessories</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                    <div class="main-border-button">
                                                        <a href="{{route('products','aks')}}">Keşfet</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="{{asset('front')}}/assets/images/baner-right-image-04.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->
        <!-- ***** Men Area Starts ***** -->
        <section class="section" id="men">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Best Erkek</h2>
                            <span>En çok ilgi gören Erkek giyim ürünlerimiz.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="men-item-carousel">
                            <div class="owl-men-item owl-carousel">
                               @foreach ($mens as $men )
                               <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('detail',$men->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{$men->photo}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$men->name}}</h4>
                                    <span>${{$men->price}}</span>
                                    <ul class="stars">
                                    @for ($i=1;$i<=$men->point;$i++)
                                    <li><i class="fa fa-star"></i></li>
                                    @endfor

                                    </ul>
                                </div>
                            </div>
                               @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Men Area Ends ***** -->
        <!-- ***** Women Area Starts ***** -->
        <section class="section" id="women">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Best Kadın</h2>
                            <span>En çok ilgi gören Kadın giyim ürünlerimiz.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="women-item-carousel">
                            <div class="owl-women-item owl-carousel">
                                @foreach ($womens as $women )
                               <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('detail',$women->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{$women->photo}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$women->name}}</h4>
                                    <span>${{$women->price}}</span>
                                    <ul class="stars">
                                    @for ($i=1;$i<=$women->point;$i++)
                                    <li><i class="fa fa-star"></i></li>
                                    @endfor

                                    </ul>
                                </div>
                            </div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Women Area Ends ***** -->
        <!-- ***** Kids Area Starts ***** -->
        <section class="section" id="kids">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Best Çocuk</h2>
                            <span>En çok ilgi gören Çocuk Ürünlerimiz</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kid-item-carousel">
                            <div class="owl-kid-item owl-carousel">
                                @foreach ($kids as $kid )
                                <div class="item">
                                 <div class="thumb">
                                     <div class="hover-content">
                                         <ul>
                                            <li><a href="{{route('detail',$kid->id)}}"><i class="fa fa-eye"></i></a></li>
                                             <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                             <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                         </ul>
                                     </div>
                                     <img src="{{$kid->photo}}" alt="">
                                 </div>
                                 <div class="down-content">
                                     <h4>{{$kid->name}}</h4>
                                     <span>${{$kid->price}}</span>
                                     <ul class="stars">
                                     @for ($i=1;$i<=$kid->point;$i++)
                                     <li><i class="fa fa-star"></i></li>
                                     @endfor

                                     </ul>
                                 </div>
                             </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Kids Area Ends ***** -->
        <!-- ***** Explore Area Starts ***** -->
        <section class="section" id="explore">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <h2>Explore Our Products</h2>
                            <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify or edit this layout. You can convert this template as any kind of ecommerce CMS theme as you wish.</span>
                            <div class="quote">
                                <i class="fa fa-quote-left"></i><p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                            </div>
                            <p>There are 5 pages included in this HexaShop Template and we are providing it to you for absolutely free of charge at our TemplateMo website. There are web development costs for us.</p>
                            <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                            <div class="main-border-button">
                                <a href="products.html">Discover More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="leather">
                                        <h4>Leather Bags</h4>
                                        <span>Latest Collection</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="first-image">
                                        <img src="{{asset('front')}}/assets/images/explore-image-01.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="second-image">
                                        <img src="{{asset('front')}}/assets/images/explore-image-02.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="types">
                                        <h4>Different Types</h4>
                                        <span>Over 304 Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Explore Area Ends ***** -->
    @endsection
