@extends('front.layouts.master')
@section('content')
  <div class="col-md-4 offset-md-4 rounded shadow mb-5 " style="margin-top:200px;">
    <h2 class="text-center text-primary p-3">Üye Giriş</h2>
    <form action="{{route('loginPost')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">E-Posta Adresiniz</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="E-Posta Adresiniz">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Şifreniz</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Şifreniz">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="exampleCheck1">Beni Hatırla</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-sm">Giriş</button>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <a class="text-info p-3" href="{{url('register')}}">Üye Ol</a>
            </div>
            <div class="col-md-4 text-center">
                <a class="text-info p-3" href="#">Şifremi Unutum</a>
            </div>
        </div>
        <br>
      </form>
  </div>
@endsection
