@extends('front.layouts.master')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Sepetiniz</h2>
                    <span>Sepetinizdeki Ürünler</span>
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
                <h3 class="text-center text-primary">Sepetim</h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ürün Resmi</th>
                            <th scope="col">Ürün Kodu</th>
                            <th scope="col">Ürün Adı</th>
                            <th scope="col">Birim Fiyat</th>
                            <th scope="col">Adet</th>
                            <th scope="col">Toplam Fiyat</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>

                </table>
                <div class="row">
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary btn-block" type="button"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Sepeti Onayla</button>

                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-outline-danger btn-block" type="button" href=""><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Sepeti Boşalt</a>
                    </div>
                </div>
            </div>





        </div>
    </div>



</section>
<!-- ***** Products Area Ends ***** -->
@endsection

