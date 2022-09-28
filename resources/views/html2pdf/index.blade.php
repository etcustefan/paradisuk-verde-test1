@extends('layouts.app')
@section('html2pdf')
  <div class="container">
     <div class="col-3">
         <form action="<?php echo route('generatePdf',['download'=>'pdf'])?>" method="get" class="mt-24">
             <button class="button">
                 Generate PDF
             </button>
         </form>
     </div>
  </div>
@endsection
