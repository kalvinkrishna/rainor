@extends('home::layouts.master')

@include('home::header')
@include('home::footer')

@section('content')
    <section class="container" style='height:850px;'>
        <div class="row"></div>
        <div class="row"></div>

        <div class='row' style='text-align:center;'>
            <div class='col-12 content'>
                <h3>Kontak Us</h3>
            </div>
        </div>

        <div class="row">
            <div class='col-6 text-right'>
                Email
            </div>
            <div class='col-6'>
                kotaksoraya@soraya.com
            </div>
        </div>

        <div class="row">
            <div class='col-6 text-right'>
                Phone
            </div>
            <div class='col-6'>
                0812391128391
            </div>
        </div>
    </section>

@endsection

