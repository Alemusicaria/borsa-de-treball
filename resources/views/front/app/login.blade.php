
@extends('front.layouts.layout')

@section('estils')
<link href="css/sign-in.css" rel="stylesheet">
@endsection

@section('content')

@include('front.components.simbols.simbolsIndex')
<main class="form-signin w-100 m-auto">
    @include('front.components.forms.iniciarSessio')
    
</main>

@stop

@section('titol_content')
Borsa treball - Iniciar sessió
@endsection

@section('scripts')
@stop