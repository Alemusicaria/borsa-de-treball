@extends('front.layouts.layout')

@section('estils')
<link href="css/carousel.css" rel="stylesheet">
<link href="css/headers.css" rel="stylesheet">
@endsection

@section('content')
@include('front.components.simbols.simbolsIndex')
<main>
    @include('front.components.slider.sliderIndex')
    @include('front.components.destacat.indexOfertesDestacat')
    @include('front.components.destacat.indexEmpresesDestacat')
    
    <hr class="featurette-divider">
</main>

@stop

@section('titol_content')
Borsa treball - Inici
@endsection

@section('scripts')
@stop