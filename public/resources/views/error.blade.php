@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h5 class="align-items-baseline">Rezervare esuata ! Locurile alese nu sunt disponibile in data respectiva !</h5>
            <a class="text-decoration-none ms-2 btn btn-danger w-25" href="<?php echo url('/') ?>">Incearca din nou</a>
        </div>
    </div>
@endsection
