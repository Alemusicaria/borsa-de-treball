@php
// Obtener el alumno con el ID proporcionado
$alumno = App\Models\Alumne::find(session('userData')->alumne_id);
@endphp

<div class="container">
    @if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif
    <h1>Gestió Perfil</h1>
    <form method="POST" action="{{ route('updateAlumne') }}">
        <div class="form-group">
            <label for="nombre">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Introdueix el teu nom"
                value="{{ $alumno->nom }}">
        </div>
        <br>
        <div class="form-group">
            <label for="apellidos">Cognom</label>
            <input type="text" class="form-control" id="cognom" name="cognom" placeholder="Introdueix el teus cognoms"
                value="{{ $alumno->primer_cognom }}">
        </div>
        <br>
        <div class="form-group">
            <label for="apellidos">Segon Cognom</label>
            <input type="text" class="form-control" id="segon_cognom" name="segon_cognom" placeholder="Introdueix el teus cognoms"
                value="{{ $alumno->segon_cognom }}">
        </div>
        <br>
        <div class="form-group">
            <label for="adreca">Adreça</label>
            <input type="text" class="form-control" id="adreca" name="adreca" placeholder="Introdueix la teva adreça"
                value="{{ $alumno->adreca }}">
        </div>
        <br>
        <div class="form-group">
            <label for="codi_postal">Codi Postal</label>
            <input type="text" class="form-control" id="codi_postal" name="codi_postal" placeholder="Introdueix el teu CP"
                value="{{ $alumno->codi_postal }}">
        </div>
        <br>
        <div class="form-group">
            <label for="municipi">Municipi</label>
            <input type="text" class="form-control" id="municipi" name="municipi" placeholder="Introdueix el teu Municipi"
                value="{{ $alumno->municipi }}">
        </div>
        <br>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Introdueix la provincia"
                value="{{ $alumno->provincia }}">
        </div>
        <br>
        <div class="form-group">
            <label for="telefono">Telefon</label>
            <input type="tel" class="form-control" id="telefono" name="primer_telefon" placeholder="Introdueix un numero de contacte"
                value="{{ $alumno->primer_telefon }}">
        </div>
        <br>
        <div class="form-group">
            <label for="segon_telefon">Segon Telefon</label>
            <input type="tel" class="form-control" id="segon_telefon" name="segon_telefon" placeholder="Introdueix un numero de contacte"
                value="{{ $alumno->segon_telefon }}">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma">Idioma</label>
            <input type="text" class="form-control" id="idioma" name="idioma" placeholder="Introdueix Idioma"
                value="{{ $alumno->idioma1 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="segon_idioma">Segon Idioma</label>
            <input type="text" class="form-control" id="segon_idioma" name="segon_idioma" placeholder="Introdueix un segon idioma"
                value="{{ $alumno->idioma2 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="tercer_idioma">Tercer Idioma</label>
            <input type="text" class="form-control" id="tercer_idioma" name="tercer_idioma" placeholder="Introdueix tercer idioma"
                value="{{ $alumno->idioma3 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="quart_idioma">Quart Idioma</label>
            <input type="text" class="form-control" id="quart_idioma" name="quart_idioma" placeholder="Introdueix un quart idioma"
                value="{{ $alumno->idioma4 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="carnet_conduir">Carnet Conduir</label>
            <input type="tel" class="form-control" id="carnet_conduir" name="carnet_conduir" placeholder="Introdueix si tens carnet"
                value="{{ $alumno->carnet_conduir == 1 ? 'Sí' : 'No' }}">
        </div>
        <br>
        <div class="form-group">
            <label for="experiencia">Experiencia</label>
            <textarea class="form-control" id="experiencia" name="experiencia" rows="3"
                placeholder="Descriu la teva experiencia laboral">{{ $alumno->observacions }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Desar Canvis</button>
    </form>
</div>
