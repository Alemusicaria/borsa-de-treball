@extends('front.layouts.layout')

@section('estils')
<link href="css/carousel.css" rel="stylesheet">
<link href="css/headers.css" rel="stylesheet">
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
    @include('admin.components.forms.registraralumne')
    <hr class="featurette-divider">
</main>

@endsection

@section('titol_content')
Borsa treball - Registrar Alumne
@endsection

@section('scripts')
@endsection