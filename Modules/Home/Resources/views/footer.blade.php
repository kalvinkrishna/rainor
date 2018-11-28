@section('footer')
    @include('home::cart.cart')
    <section class='footer container-fluid'>
        <div class="container">
        <div class='row'>
            
            <div class='col-6 text-center'>
                <ul class="nav flex-column">
                    <li class='nav-link'> <a class="nav-link active" href="#">tentang salestok</a></li>
                    <li class='nav-link'><a class="nav-link" href="#">karir</a></li>
                    <li class='nav-link'><a class="nav-link" href="{{url('home/contact')}}">Kontak Soraya</a></li>
                </ul>
            </div>
            <div class="col-6 text-center">
            
                <ul class="nav flex-column">
                    <li class='nav-link'> <a class="nav-link active" href="#">tentang sista</a></li>
                    <li class='nav-link'><a class="nav-link" href="#">reseller & dropshipper</a></li>
                    <li class='nav-link'><a class="nav-link" href="#">Cara Pemesanan</a></li>
                </ul>
            </div>
        </div>
        </div>
    </section>
@endsection