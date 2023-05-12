@extends('front.layouts.master')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Siparişleriniz</h2>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Products Area Starts ***** -->
<section class="section" id="cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12  shadow p-3 mb-5 rounded">
                <h3 class="text-center text-primary">Siparişleriniz</h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th scope="col">Sipariş Kodu</th>
                            <th scope="col">Sipariş Tarihi</th>
                            <th scope="col">Sipariş Tutarı</th>
                            <th scope="col">Kdv</th>
                            <th scope="col">Kargo</th>
                            <th scope="col">Toplam Tutar</th>
                            <th scope="col">Sipariş Durumu</th>
                            <th scope="col">Teslim Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($syc=0)
                        @php($sum=0)
                        @foreach ($orders as $order )
                            <tr>
                                @php($sum+=$order->sum)
                                <td>{{$syc+=1}}</td>
                                <td>{{$order->ocode}}</td>
                                <td>{{Carbon\Carbon::parse($order->order_date)->format('d-m-Y')}}</td>
                                <td>${{$order->sum-($order->sum*0.08)}}</td>
                                <td>${{$order->sum*0.08}}</td>
                                <td>${{$order->cargo}}</td>
                                <td>${{$order->sum+$order->cargo}}</td>
                                <td>
                                    @if($order->status==0) Hazırlanıyor @elseif($order->status==1) Kargoda
                                    @elseif($order->status==2) Teslim Edildi
                                    @elseif($order->status==-1) İptal
                                    @elseif($order->status==-2) İade
                                    @else
                                    Bilinmiyor
                                    @endif
                                </td>
                                <td>{{Carbon\Carbon::parse($order->delivery)->diffForHumans()}}</td>
                                <td class="text-center">
                                    <a typ="button" class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <hr>
                <div class="row mb-2">

                    <div class="col-md-8">

                    </div>
                     <div class="col-md-4">

                      <p class="text-left">  <b ><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Tüm Siparişleriniz Toplamı:{{round($sum,2)}} $</b>  </p>
                    </div>
                  </div>




            </div>





        </div>
    </div>



</section>
<!-- ***** Products Area Ends ***** -->
@endsection

