@php

$estudis = App\Models\Estudis::all();
$ofertaEstudis = App\Models\OfertaEstudis::all();
@endphp

<div class="container mt-5">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif

    <h2>Insertar Oferta</h2>
    <form method="POST" action="{{ route('crearOferta') }}">
        @csrf
        <div class="form-group">
            <label for="horari">Horari</label>
            <select class="form-control" id="horari" name="horari" required>
                <option value="Mati">Mati</option>
                <option value="Tarda">Tarda</option>
                <option value="Nit">Nit</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="incorporacio">Data d'incorporació</label>
            <input type="date" class="form-control" id="incorporacio" name="incorporacio" required>
        </div>
        <br>
        <div class="form-group">
            <label for="sou">Sou</label>
            <input type="number" step="0.01" class="form-control" id="sou" name="sou">
        </div>
        <br>
        <div class="form-group">
            <label for="edat">Edat</label>
            <input type="text" class="form-control" id="edat" name="edat" required>
        </div>
        <br>
        <div class="form-group">
            <label for="idioma1">Idioma 1</label>
            <input type="text" class="form-control" id="idioma1" name="idioma1">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma2">Idioma 2</label>
            <input type="text" class="form-control" id="idioma2" name="idioma2">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma3">Idioma 3</label>
            <input type="text" class="form-control" id="idioma3" name="idioma3">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma4">Idioma 4</label>
            <input type="text" class="form-control" id="idioma4" name="idioma4">
        </div>
        <br>
        <div class="form-group">
            <label for="tipus_contracte">Tipus de Contracte</label>
            <select class="form-control" id="tipus_contracte" name="tipus_contracte" required>
                <option value="Jornada Completa">Jornada Completa</option>
                <option value="Mitja jornada">Mitja Jornada</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="caducitat_oferta">Caducitat de l'Oferta</label>
            <input type="date" class="form-control" id="caducitat_oferta" name="caducitat_oferta" required>
        </div>
        <br>
        <div class="form-group">
            <label for="estudis">Selecció d'Estudis (Mantenir control per a seleccionar més d'un)</label>
            <select class="form-select" id="estudis" name="estudis[]" multiple aria-label="multiple select example">
                @foreach($estudis as $estudi)
                    <option value="{{ $estudi->estudi_id }}">{{ $estudi->nom }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="descripcio">Descripció</label>
            <textarea class="form-control" id="descripcio" name="descripcio" rows="3" required></textarea>
        </div>
        <br>
        <input type="hidden" id="empresa_id" name="idEmpresa" value="{{ session('userData')->empresa_id }}"> <!-- ID de la empresa oculto -->
        <button type="submit" class="btn btn-primary">Inserir Oferta</button>
    </form>
</div>

