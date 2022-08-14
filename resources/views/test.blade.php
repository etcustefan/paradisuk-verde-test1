@extends('layouts.app')
@section('content')
    <div class="col-md-7">
        <div class="left border">
            <div class="row">
                <span class="header">Payment</span>
                <div class="icons">
                    <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                    <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                </div>
            </div>
            <form action="<?php echo route('pay') ?>" method="get">
                <input type="hidden" value="200" name="price">
                <button type="submit" class="button">Plateste 200 Ron</button>
            </form>
@endsection
