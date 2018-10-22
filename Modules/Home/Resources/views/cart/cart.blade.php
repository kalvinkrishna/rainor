
@section('cart')

    <section class="cartcontroller">
        <div class='buttonclose' onClick="closeCart()">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <section class='container cartcontent'>
            @foreach($cart['data'] as $items => $item)
                <div class="media">
                    @php 
                        $foto = (isset($item->photo[0]->url))? $item->photo[0]->url : "500x500.png";
                    @endphp
                    <span aria-hidden="true" class='deleteProduct' data-items='{{$item->id}}'>×</span>
                    <img class="mr-3 img-thumbnail col-5" src="{{url('image/'.$foto)}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">{{$item->product_name}}</h5>
                        <div class='mt-12'>
                            <span>Hitam</span> - <span>XXL</span>
                        </div>
                        <br>
                        <div class="mt-12">Rp.  {{$item->price}}</div>
    
                        <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class='delete-count' data-items='{{$item->id}}'></button>
                            <input class="quantity" min="0" name="quantity" value="{{$item->count}}" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus plus-count" data-items='{{$item->id}}'></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class='price row align-items-end'>
            <div class='col-8'>
               Total :  Rp. <span class='total'>0</span>
            </div>
            <div class='col-4'>Jumlah Item: <span class="totalbarang"> 1 </span> </div>
            <a href='{{url("/home/next")}}' class='col-12'> <button type="button" class="btn btn-primary col-12">Lanjutkan</button></a>
        </section>
    </section>

    <form action="">
        {{ csrf_field() }}
    </form>
    <input class='hidden base_url' value="{{url('/')}}"/>

@endsection
