@extends('layouts.app')
@section('content')
    <div class="col-md-7">
            <div class="row">
                <h5>
                    blablalblabla rezervarea blblalbalblab
                </h5>
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="alert error alert-danger text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif


            <form action="<?= route('checkout') ?>" method="get">
                @csrf
                <input type="hidden" value="200" name="price">
                <button id="checkout-button" type="submit" class="button"><span id="button-text">Catre plata</span></button>
            </form>

    </div>


@endsection
