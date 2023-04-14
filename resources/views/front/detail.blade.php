@extends('front.layouts.master')
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Ürün Sayfası</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <img src="{{$urun->photo}}" alt="{{Str::slug($urun->name)}}">
                    <img src="{{$urun->photo}}" alt="{{Str::slug($urun->name)}}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{$urun->name}}</h4>
                    <span class="price">${{$urun->price}}</span>
                    <ul class="stars">

                        @for ($i=1;$i<=$urun->point;$i++)
                        <li><i class="fa fa-star"></i></li>
                        @endfor
                    </ul>
                    <span>{{$urun->info}}</span>

                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button"  value="-" class="minus"><input  type="number" id="pnumber" @if($urun->number>0) value="1" step="1" min="1" max="{{$urun->number}}" @else value="0" step="0" min="0" max="0" @endif name="quantity"  title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <h4>Total: $0</h4>
                        @if($urun->number>0)
                         @auth
                         <div class="main-border-button"><a class="add-click"  pid={{$urun->id}} href="#">Sepete Ekle</a></div>
                         @else
                         <div class="main-border-button"><a class=""  pid={{$urun->id}} href="{{route('login')}}">Sepete Ekle</a></div>

                         @endauth
                        @else
                        <div class="main-border-button" ><a class="text-warning">Stokta Yok</a></div>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
@endsection

@section('js')
<script>
    $(function(){
       $('.add-click').click(function(){
        var pnumber = $("#pnumber").val();
         pid=$(this)[0].getAttribute('pid');
        //  console.log(pid);
        $.ajax({
          type:'GET',
          url:'{{route('addCartNumber')}}',
          data:{pid:pid,pnumber:pnumber},
          success:function(data){
            // console.log(data);
             $('#mycart').text('('+data+')')
          },
        })
       });
    });
  </script>
@endsection
