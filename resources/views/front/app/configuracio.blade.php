@extends('front.layouts.layout')

@section('estils')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="css/conf.css" rel="stylesheet">
@endsection

@section('content')
@include('front.components.simbols.simbolsIndex')
<main class="flex-grow-1">
    //@include('front.components.menu.menuconfiguracio')
    
    @role('Administradors')
    
    <h1>Administradors</h1>

    @endrole

    @role('Alumnes')
    
    <h1>Alumnes</h1>

    @endrole
    
    @role('Empreses')
    
    <h1>Empreses</h1>

    @endrole
</main>

@endsection

@section('titol_content')
Borsa treball - Configuracio
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection 