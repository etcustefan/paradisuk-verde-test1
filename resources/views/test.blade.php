@extends('layouts.app')
@section('content')
    <div class="col-md-7">
            <div class="row">
                <h5>
                    blablalblabla rezervarea blblalbalblab
                </h5>
            <form action="<?= route('checkout') ?>" method="get">
                <input type="hidden" value="200" name="price">
                <button id="checkout-button" type="submit" class="button"><span id="button-text">Catre plata</span></button>
            </form>

    </div>


@endsection
