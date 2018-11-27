@extends('home::form.masterform')
@include('home::header')
@include('home::footer')
@section('form')

<section class="container formcontainer">
<h3>Form Pemesanan</h3>
<form action="{{url('home/review')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama lengkap">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan alamat email">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nomor Telpon</label>
    <input type="text" name="phonenumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor Telpon">
  
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Negara</label>
    <select name="Country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @foreach($country as $country)
            <option value="{{$country->id_country}}">{{$country->name}}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Provinsi</label>
    <select name="State" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @foreach($states as $state)
            <option value = "{{$state->id_state}}">{{$state->name}}</option>
        @endforeach 
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Kabupaten/Kota</label>
    <select name="Cities" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @foreach($cities as $city)
            <option value = "{{$city->id_city}}">{{$city->name}}</option>
        @endforeach 
    </select>
  </div>

  
 
  <div class="form-group">
    <label for="exampleInputEmail1">Alamat Lengkap</label>
    <textarea name="Address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Alamat"></textarea>
  </div>

  <div class='row'>
    <button type="submit" class="btn col-3 btn-primary align-self-center mx-auto">Submit</button>
  </div>
</form>
<br>

</section>
@endsection