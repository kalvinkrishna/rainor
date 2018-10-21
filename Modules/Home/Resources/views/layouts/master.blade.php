<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>

       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{asset('css/app.css')}}">
       <link rel="stylesheet" href="{{asset('css/custom.css')}}">
       <link href="{{asset('iconic/font/css/open-iconic-bootstrap.css')}}" rel="stylesheet">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/cart.js')}}"></script>
    </head>
    <body style='box-sizing: content-box;'>
        @yield('header')
        @yield('content')
        @yield('footer')
        @yield('cart')
        @yield('review')
        @yield('collection')
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/home.js') }}"></script> --}}
    </body>
</html>
