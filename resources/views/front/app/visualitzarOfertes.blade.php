@extends('front.layouts.layout')

@section('estils')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/3.0.3/css/xxx.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/3.0.3/css/xxxx.css">
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .container {
        flex: 1;
    }
</style>
@endsection

@section('content')
@include('front.components.simbols.simbolsIndex')
@include('front.components.texts.detallsOferta', ['oferta' => $oferta])

@stop


@section('titol_content')
Borsa treball - Detalls oferta
@endsection

@section('scripts')
@stop