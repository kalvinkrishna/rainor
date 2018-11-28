@extends('home::layouts.master')

@include('home::header')

@section('review')
    <section class='container formcontainer'>
        <h2>Customer Information</h2>
        <div class="row">
            <div class="col-6">    
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$customer['name']}}">
            </div>

            <div class="col-6">    
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" value="{{$customer['email']}}">
            </div>
        </div>
        <div class='row'>
            <div class="col-12">    
                <label for="exampleInputEmail1">Telephone</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number" value="{{$customer['phonenumber']}}">
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
                    <div class='row product-info'>
                        
                        <div class='col-2 offset-1'>
                            @if(!empty($cart->photo[0]))
                                <img src="{{asset('image/'.$cart->photo[0]->url)}}" class="img-thumbnail"/>
                            @else
                                <img src="{{asset('image/500x500.png')}}" class="img-thumbnail"/>
                            @endif
                        </div>
                        <div class='col-8'>
                            <blockquote class="blockquote">
                                <p class="mb-0">{{$cart->product_name}}</p>
                                <footer class="blockquote-footer">{{$cart->description}} <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <!-- <span>Ukuran : @if(!empty($cart->variantSize)){{$cart->variantSize[0]->key}}@endif </Span> -->
                            <!-- <span>Warna : @if(!empty($cart->variantWarna[0])){{$cart->variantWarna[0]->key}}@endif </Span> -->

                            <p class='lead'><strong>Jumlah Product : {{$cart->count}}</strong></p>
                            <h2>Total : Rp. {{$cart->countprice}}</h2>
                            <textarea class='form-control' placeholder='catatat pengguna'>{{$cart->note}}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <h2>Shipping Information</h2>
        <div class='col-12 shipping'>
            <div class='row'>
                <div class='col-4'>
                    <img class='img-thumbnail mx-auto d-block col-10' src="{{asset('image/shipped.png')}}" alt="">
                    <p class='text-center'>Darat</p>
                </div>
                <div class='col-4'>
                    <img class='img-thumbnail mx-auto d-block col-10' src="{{asset('image/boat-from-front-view.png')}}" alt="">
                    <p class='text-center'>Laut</p>
                </div>
                <div class='col-4'>
                    <img class='img-thumbnail mx-auto d-block col-10' src="{{asset('image/airplane-shape.png')}}" alt="">
                    <p class='text-center'>Udara</p>
                </div>
            </div>
        </div>
        <h2>Payment Method </h2>
        <div class='col-12 payment'>
            <div class='row'>
                <div class='col-12 headerpayment'>
                    <blockquote class="blockquote">
                                    <p class="mb-0">Please make your transaction secure</p>
                                    <footer class="blockquote-footer">{{$cart->description}} <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>

                    <div class='row'>
                        <div class='col-3'>
                            <img class='img-thumbnail' src="{{asset('image/bca-bank-central-asia-logo.png')}}" alt="">
                        </div>
                        <div class='col-3'>
                            <img class='img-thumbnail' src="{{asset('image/1280px-BNI_logo.svg.png')}}" alt="">
                        </div>
                        <div class='col-3'>
                            <img class='img-thumbnail' src="{{asset('image/Logo_BRI.png')}}" alt="">
                        </div>
                        <div class='col-3'>
                            <img class='img-thumbnail' src="{{asset('image/mandiri.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class='row'>
              <a href="thankyou" style='color:#FFFFFF;' class="btn col-3 btn-primary align-self-center mx-auto">Bayar</a>
        </div>

    </div>
    <br>
@endsection