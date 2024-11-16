@php
// Obtener el empresa con el ID proporcionado
$empresa = App\Models\Empreses::find(session('userData')->empresa_id);
@endphp
<div class="container">
    @if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif
  <h1>Gestió de Dades - Empresa</h1>
  <form method="post" action="{{ route('updateEmpresa') }}">
    <!-- Aquí se cargarán los datos actuales de la empresa desde la base de datos -->
    <div class="form-group">
      <label for="nom">Nom de l'Empresa</label>
      <input type="text" class="form-control" id="nom" name="nom" value="{{ $empresa->nom}}" required>
    </div>
    <br>
    <div class="form-group">
      <label for="persona_contacte">Persona de Contacte</label>
      <input type="text" class="form-control" id="persona_contacte" name="persona_contacte"
        value="{{ $empresa->persona_contacte }}" required>
    </div>
    <br>
    <div class="form-group">
      <label for="primer_telefon_contacte">Primer Telefon de Contacte</label>
      <input type="tel" class="form-control" id="primer_telefon_contacte" name="primer_telefon_contacte"
        value="{{ $empresa->primer_telefon_contacte }}">
    </div>
    <br>
    <div class="form-group">
      <label for="segon_telefon_contacte">Segon Telefon de Contacte</label>
      <input type="tel" class="form-control" id="segon_telefon_contacte" name="segon_telefon_contacte"
        value="{{ $empresa->segon_telefon_contacte }}">
    </div>
    <br>
    <div class="form-group">
      <label for="adreca">Adreça</label>
      <input type="text" class="form-control" id="adreca" name="adreca" value="{{ $empresa->adreca }}">
    </div>
    <br>
    <div class="form-group">
      <label for="codi_postal">Codi Postal</label>
      <input type="text" class="form-control" id="codi_postal" name="codi_postal" value="{{ $empresa->codi_postal }}"
        required>
    </div>
    <br>
    <div class="form-group">
      <label for="municipi">Municipi</label>
      <input type="text" class="form-control" id="municipi" name="municipi" value="{{ $empresa->municipi }}"
        required>
    </div>
    <br>
    <div class="form-group">
      <label for="provincia">Provincia</label>
      <input type="text" class="form-control" id="provincia" name="provincia" value="{{ $empresa->provincia }}"
        required>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Desar Canvis</button>
  </form>
</div>