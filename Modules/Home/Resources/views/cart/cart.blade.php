
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
                    <img class="mr-3 img-thumbnail col-5" src="{{url('image/'.$item->photo[0]->url)}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">{{$item->product_name}}</h5>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </p>
                        <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                            <input class="quantity" min="0" name="quantity" value="{{$item->count}}" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class='price row align-items-end'>
            <div class='col-8'>
               Total :  Rp. <span class='total'>0</span>
            </div>
            <div class='col-4'>Jumlah Item: <span> 1 </span> </div>
            <a href='{{url("/home/next")}}' class='col-12'> <button type="button" class="btn btn-primary col-12">Lanjutkan</button></a>
        </section>
    </section>

    <form action="">
        {{ csrf_field() }}
    </form>
    <input class='hidden base_url' value="{{url('/')}}"/>

@endsection
