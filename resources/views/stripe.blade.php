@extends('layouts.app')
@section('content')
    <div class="col-md-7">
        <form action="<?php echo route('checkout') ?>" method="get">
            <input type="hidden" value="<? $price ?>" name="price">
            <button type="submit" class="button">Plateste <?= $price ?> Ron</button>
        </form>
    </div>
@endsection
