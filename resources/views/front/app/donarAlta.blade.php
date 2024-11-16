@extends('front.layouts.layout')

@section('estils')
<link href="css/carousel.css" rel="stylesheet">
<link href="css/headers.css" rel="stylesheet">
@endsection

@section('content')
@include('front.components.simbols.simbolsIndex')
<main class="flex-grow-1">
    @include('front.components.forms.registraempresa')
</main>

@endsection

@section('titol_content')
Borsa treball - Donar Alta
@endsection

@section('scripts')
@endsection