@extends('home::layouts.master')

@include('home::header')
@include('home::footer')

@section('content')
    <section class="container">
        <div class="row"></div>
        <div class="row"></div>

        <div class='row' style='text-align:center;'>
            <div class='col-12 content'>
            @foreach($categories as $category)
               <div class='wrap-category'>
                    <h1 class='category'>Fashion {{ $category }}</h1>
                    <div class="subcategories">
                                <ul class='nav subcategory justify-content-center'>
                                        <li class='nav-item'><a class="nav-link active" href="#"> celana </a> </li>
                                        <li class='nav-item'><a class="nav-link active" href="#"> sepatu </a></li>
                                        <li class='nav-item'><a class="nav-link active" href="#"> kaos </a> </li>
                                </ul>
                    </div>
                    <a href="{{url('product/collection/'.$category)}}">Check Koleksi</a>
               </div>
                @foreach($productlist as $product)
                    @if($product->categories == $category)
                    <div class="product container">
                   
                        <div class='items'>
                          
                            <div class="imageslide">
                                    <div id="carouselExampleIndicators{{$product->id}}" class="carousel slide w-50" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach($product->photo as $idx => $photo)
                                                <li data-target="#carouselExampleIndicators{{$product->id}}" data-slide-to="{{$idx}}" class="active"></li>
                                            @endforeach

                                            @if(count($product->photo) <= 0)
                                                <li data-target="#carouselExampleIndicators{{$product->id}}" data-slide-to="{{$idx}}" class="active"></li>
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
                                        <button type='button' class='btn btn-primary btn-lg' onClick='addCart({{$product->id}})' data-items='{{ $product->id }}'>Add to Cart <span class="oi oi-cart" title="icon name" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endforeach
            </div>
        </div>

        <div class="row"></div>
    </section>

@endsection

