@extends('front.layouts.master')
@section('content')
  <div class="col-md-4 offset-md-4 rounded shadow mb-5 " style="margin-top:200px;">
    <h2 class="text-center text-primary p-3">Adres Bilgilerim</h2>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    <form action="{{route('adresPost')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="def">Adres Tanımınız</label>
            <input type="text" class="form-control"  name="def" @if($adres!=null) value="{{$adres->def}}" @endif  placeholder="Adres tanımını giriniz (Ev, İş vs.)" required>
          </div>
          <div class="form-group">
            <label for="province">Adres İli</label>
            <input type="text" class="form-control"  name="province" @if($adres!=null) value="{{$adres->province}}" @endif placeholder="Adres İli" required>
          </div>
          <div class="form-group">
            <label for="">Adres İlçesi</label>
            <input type="text" class="form-control"  name="district" @if($adres!=null) value="{{$adres->district}}" @endif placeholder="Adres İlçesi" required>
          </div>
          <div class="form-group">
            <label for="">Adresiniz</label>
            <textarea   class="form-control"  name="address" rows="5"  placeholder="Adresiniz" required>@if($adres!=null) {{$adres->address}} @endif </textarea>
          </div>
          <div class="form-group">
            <label for="">Posta Kodunuz</label>
            <input type="text" class="form-control"  name="pc" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" @if($adres!=null) value="{{$adres->pc}}" @endif placeholder="Posta Kodu">
          </div>
        <button type="submit" class="btn btn-primary btn-block btn-sm">
            @if($adres!=null) Güncelle @else Ekle @endif
        </button>
        <br>



      </form>
  </div>
@endsection
