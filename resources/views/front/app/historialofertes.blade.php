@extends('front.layouts.layout')

@section('estils')
<link href="css/carousel.css" rel="stylesheet">
<link href="css/headers.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
<style>
    body {
        overflow-x: hidden;
    }

    .py-5 {
        margin-top: 3rem;
    }
</style>
@endsection

@section('content')

@include('front.components.simbols.simbolsIndex')
<main class="flex-grow-1">
    @include('front.components.lists.historial')
    <hr class="featurette-divider">
</main>

@endsection

@section('titol_content')
Borsa treball - Historial
@endsection

@section('scripts')
@endsection