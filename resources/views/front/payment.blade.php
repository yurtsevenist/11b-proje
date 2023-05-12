@extends('front.layouts.master')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Ödeme Sayfası</h2>
                    <span>Ödeme Detayları</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Products Area Starts ***** -->
<section class="section" id="cart">
    <div class="container d-flex justify-content-center mt-5 mb-5">



        <div class="row g-3">

          <div class="col-md-6">

            <span>Ödeme Yönetmi</span>
            <div class="card">

              <div class="accordion" id="accordionExample">

                <div class="card">
                  <div class="card-header p-0" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="d-flex align-items-center justify-content-between">

                          <span>Paypal</span>
                          <i class="fa fa-money" aria-hidden="true"></i>

                                                </div>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <input type="text" class="form-control" placeholder="Paypal email">
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header p-0">
                    <h2 class="mb-0">
                      <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="d-flex align-items-center justify-content-between">

                          <span>Credit card</span>
                          <div class="icons">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>

                          </div>

                        </div>
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body payment-card-body">

                      <span class="font-weight-normal card-text">Card Number</span>
                      <div class="input">

                        <i class="fa fa-credit-card"></i>
                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000">

                      </div>

                      <div class="row mt-3 mb-3">

                        <div class="col-md-6">

                          <span class="font-weight-normal card-text">Expiry Date</span>
                          <div class="input">

                            <i class="fa fa-calendar"></i>
                            <input type="text" class="form-control" placeholder="MM/YY">

                          </div>

                        </div>


                        <div class="col-md-6">

                          <span class="font-weight-normal card-text">CVC/CVV</span>
                          <div class="input">

                            <i class="fa fa-lock"></i>
                            <input type="text" class="form-control" placeholder="000">

                          </div>

                        </div>


                      </div>

                      <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>

                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>

          <div class="col-md-6">
              <span>Sipariş Özeti</span>

              <div class="card">

                <div class="d-flex justify-content-between p-3">

                  <div class="d-flex flex-column">

                    <span><i class="fa fa-shopping-cart" aria-hidden="true"> </i> &nbsp;Toplam Tutar
                    </span>
                  </div>

                  <div class="mt-1">
                    <span class="super-price">${{$sum}}</span>

                  </div>

                </div>

                <hr class="mt-0 line">

                <div class="p-3">

                  <div class="d-flex justify-content-between mb-2">

                    <span><i class="fa fa-gift" aria-hidden="true"></i>
                         &nbsp;Kargo Bedeli</span>
                    <span>@if($cargo==0) Kargo Bedava @else ${{$cargo}} @endif</span>

                  </div>




                </div>

                <hr class="mt-0 line">


                <div class="p-3 d-flex justify-content-between">

                  <div class="d-flex flex-column">

                    <span>Ödeyeceğiniz Toplam Tutar</span>
                    <small>Kargo Dahil</small>

                  </div>
                  <span>${{$sum+$cargo}}</span>



                </div>

                <div class="p-3 d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <span>Adresiniz &nbsp;<a title="Adresini güncellemek istiyorsanız tıklayın" href="{{route('adres')}}"><i class="fa fa-pencil text-primary"></i></a></span>
                        <small>{{$adres->def}}</small>
                        <br>
                        <p>{{$adres->province}} {{$adres->district}} {{$adres->address}} Posta Kodu:{{$adres->pc}}</p>
                    </div>
                </div>





              </div>
          </div>

        </div>


      </div>



</section>
<!-- ***** Products Area Ends ***** -->
@endsection

