@extends('home::layouts.master')

@include('home::header')
@include('home::footer')

@section('content')
    <section class="container">
        <div class="row"></div>
        <div class="row"></div>

        <div class='row' style='text-align:center;'>
            <div class='col-12 content'>
            @foreach($productlist as $idx => $product)
               <div class='wrap-category'>
                    <h1 class='category'>Fashion {{ $idx }}</h1>
                    <div class="subcategories">
                                <ul class='nav subcategory justify-content-center'>
                                    @foreach($product as $value)
                                        @foreach($value["subCategories"] as $tes)
                                            <a href="{{url('product/collection/'.$idx.'/'.$tes)}}" class='subcategories'> {{$tes}}</a>
                                        @endforeach
                                    @endforeach
                                </ul>
                    </div>
               </div>
                
               @foreach($product as $value) 
                    <div class="product container">
                    @if($value['isBanner'])
                    <div class='items'>
                        <a href="{{url('product/collection/'.$idx)}}">
                        <div class="imageslide">
                                <div id="carouselExampleIndicators{{$value['id']}}" class="carousel slide w-50" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($value["photo"] as $idxs => $photo)
                                            <li data-target="#carouselExampleIndicators{{$value['id']}}" data-slide-to="{{$idxs}}" class="active"></li>
                                        @endforeach

                                        @if(count($value["photo"]) <= 0)
                                            <li data-target="#carouselExampleIndicators{{$value['id']}}" data-slide-to="{{$idxs}}" class="active"></li>
                                        @endif
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($value["photo"] as $idxs => $photo)
                                                <div class="carousel-item {{ ($idxs == 0 ) ? 'active' : '' }}">
                                                    <img class="d-block" src="{{asset('image/'.$photo->url)}}" alt="{{asset('image/500x500.png')}}">
                                                </div>
                                        @endforeach

                                        @if(count($value["photo"]) <= 0)
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
                        </a>
                   
                    </div>
                    @endif
                </div>
               @endforeach 
        @endforeach
            </div>
        </div>

        <div class="row"></div>
    </section>

@endsection

