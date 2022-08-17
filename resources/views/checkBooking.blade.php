@extends('layouts.app')
@section('content')
    <div class="col-md-7">
        <h5>DETALII DESPRE REZERVARE !!!!</h5>
        <form action="<?php echo route('checkout') ?>" method="post">
            @csrf
            <input type="hidden" value="<?= $price ?>" name="price">
            <button type="submit" class="button">Plateste <?= $price ?> Ron</button>
        </form>
    </div>
@endsection
