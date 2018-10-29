
@section('header')
    <section class='head container-fluid'>
        <div class='row align-items-center'>
            <section class="logo col-2">
                <a href="{{url('/')}}"><img class='img-responsive' src='{{asset("image/logo-ss-34f2d4dd.png")}}'></a>
            </section>
            <section class='menu-tengah col-8'>
                <div class="navbar justify-content-center">
                    <ul class='nav'>
                        <li class='nav-item'><a class="nav-link active" href="{{url('product/collection/terbaru')}}">terbaru</a></li>
                        <li class='nav-item'><a class="nav-link" href="{{url('product/collection/termurah')}}">termurah</a></li>
                        <li class='nav-item'><a class="nav-link" href="#">terlaris</a></li>
                        <li class='nav-item'><a class="nav-link" href="#">Promo</a></li>
                        <li></li>
                    </ul>
                </div>
            </section>

            <section class='col-2 '>
                <div class="login-daftar">

                    <span class="auth">
                        <a href='#' onClick='openCart()'><span class="oi oi-cart" title="icon name" aria-hidden="true"> (<span class='count'>0</span>) </span></a>
                        <a href="{{url('login')}}"> Masuk /</a>
                        <a href="{{url('register')}}">daftar</a>
                    </span>
                </div>
            </section>

        </div>
      
    </section>

@endsection