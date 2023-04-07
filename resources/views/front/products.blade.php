@extends('front.layouts.master')
@section('content')
   <!-- ***** Main Banner Area Start ***** -->
   <div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Check Our Products</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>{{$kind}}</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
                @foreach ($uruns as $urun )
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{route('detail',$urun->id)}}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                    @auth
                                    <li><a class="add-click" href="#" pid={{$urun->id}}><i class="fa fa-shopping-cart"></i></a></li>
                                    @else
                                    <li><a class="" href="{{url('login')}}" pid={{$urun->id}}><i class="fa fa-shopping-cart"></i></a></li>
                                    @endauth
                                </ul>
                            </div>
                            <img src="{{$urun->photo}}" alt="">
                        </div>
                        <div class="down-content">
                            <h4>{{$urun->name}}</h4>
                            <span>${{$urun->price}}</span>
                            <ul class="stars">
                                @for ($i=1;$i<=$urun->point;$i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-lg-8 offset-lg-2 d-flex justify-content-center">
                    {!! $uruns->links() !!}
                </div>

        </div>
    </div>
</section>
<!-- ***** Products Area Ends ***** -->
@endsection
@section('js')
@include('front.addCart')
@endsection
