@extends('front.layouts.master')
@section('content')
  <div class="col-md-4 offset-md-4 rounded shadow mb-5 " style="margin-top:200px;">
    <h2 class="text-center text-primary p-3">Üye Kayıt</h2>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    <form action="{{route('registerPost')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Adınız Soyadınız</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  placeholder="Adnız Soyadınız" required>
          </div>
        <div class="form-group">
          <label for="email">E-Posta Adresiniz</label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" aria-describedby="emailHelp" required placeholder="E-Posta Adresiniz">
        </div>
        <div class="form-group">
          <label for="password">Şifreniz</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Şifreniz" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Şifre Tekrar</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifrenizi tekrar giriniz" required>
          </div>
        <button type="submit" class="btn btn-primary btn-block btn-sm">Kayıt Ol</button>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <a class="text-info p-3" href="{{url('login')}}">Üye Giriş</a>
            </div>
            <div class="col-md-4 text-center">
                <a class="text-info p-3" href="#">Şifremi Unutum</a>
            </div>
        </div>
        <br>
      </form>
  </div>
@endsection
