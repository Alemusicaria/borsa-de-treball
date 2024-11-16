@extends('front.layouts.layout')

@section('estils')
<link href="css/sign-in.css" rel="stylesheet">
@endsection

@section('content')
@include('front.components.simbols.simbolsIndex')
<main class="form-signin w-100 m-auto">
    @include('front.components.forms.formRecuperarClau')
</main>

@stop

@section('titol_content')
Inici | Recuperació clau
@endsection

@section('scripts')
@stop