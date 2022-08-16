@extends('layouts.app')
@section('content')
    <div class="col-md-7">
        <h5>DETALII DESPRE REZERVARE !!!!</h5>
        <form action="<?php echo route('checkout') ?>" method="get">
            <input type="hidden" value="<?= $price ?>" name="price">
            <input type="hidden" value="<?= $name ?>" name="name">
            <input type="hidden" value="<?= $phone_number ?>" name="phone_number">
            <input type="hidden" value="<?= $count_fishers ?>" name="count_fishers">
            <input type="hidden" value="<?= $from_date ?>" name="from_date">
            <input type="hidden" value="<?= $to_date ?>" name="to_date">
            <input type="hidden" value="<?= $stand ?>" name="stand">
            <button type="submit" class="button">Plateste <?= $price ?> Ron</button>
        </form>
    </div>
@endsection
