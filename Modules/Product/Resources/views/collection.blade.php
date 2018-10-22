@extends('home::layouts.master')

@include('home::header')
@include('home::cart.cart')

@section('collection')
    <section class="container contents">
        <h2 class='text-center text-capitalize'>Collection {{$category}}</h2>
        @foreach($content as $product)
                   
                    <div class="product container">
                   
                        <div class='items'>
                          
                            <div class="imageslide">
                                    <div id="carouselExampleIndicators{{$product->id_product}}" class="carousel slide w-50" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach($product->photo as $idx => $photo)
                                                <li data-target="#carouselExampleIndicators{{$product->id_product}}" data-slide-to="{{$idx}}" class="active"></li>
                                            @endforeach

                                            @if(count($product->photo) <= 0)
                                                <li data-target="#carouselExampleIndicators{{$product->id_product}}" data-slide-to="" class="active"></li>
                                            @endif
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach($product->photo as $idx => $photo)
                                                    <div class="carousel-item {{ ($idx == 0 ) ? 'active' : '' }}">
                                                        <img class="d-block" src="{{asset('image/'.$photo->url)}}" alt="{{asset('image/500x500.png')}}">
                                                    </div>
                                            @endforeach

                                            @if(count($product->photo) <= 0)
                                                <div class="carousel-item active">
                                                        <img class="d-block" src="{{asset('image/500x500.png')}}" alt="{{asset('image/500x500.png')}}">
                                                    </div>
                                            @endif
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                            </div>
                            <div class='col-6 row descript align-items-center'>
                                <div class='col-12 row align-items-center justify-content-end'>
                                    <div class="col-7">
                                        <h4>{{ $product->product_name }}<h4>
                                        <h5>Rp. {{ $product->price }}</h5>
                                    </div>
                                    
                                    <div class="col-5">
                                        <button type='button' class='btn btn-primary btn-lg' onClick='addCart({{$product->id_product}})' data-items='{{ $product->id_product }}'>Add to Cart <span class="oi oi-cart" title="icon name" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            @endforeach
    </section>
@endsection