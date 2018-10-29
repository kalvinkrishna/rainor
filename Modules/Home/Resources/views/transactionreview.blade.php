@extends('home::layouts.master')

@include('home::header')

@section('review')
    <section class='container formcontainer'>
        <h2>Customer Information</h2>
        <div class="row">
            <div class="col-6">    
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$customer['name']}}">
            </div>

            <div class="col-6">    
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$customer['email']}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="exampleInputEmail1">Address</label>
                <textarea name="Address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">{{$customer['Address']}}</textarea>
            </div>
        </div>
        <br>
        <h2>Product Information</h2>
        <div class='row'>
            @foreach($carts['data'] as $cart)
                <div class="col-12">    
                    <div class='col-2'>
                        <img src="{{asset('image/'.$cart->photo[0]->url)}}">
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class='row'>
                <button type="submit" class="btn col-3 btn-primary align-self-center mx-auto">Submit</button>
        </div>

    </div>
    <br>
@endsection