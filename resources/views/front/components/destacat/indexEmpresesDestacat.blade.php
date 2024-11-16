@php

$empresas = App\Models\Empreses::where('validada', 1)->get();

$numEmpreses = $empresas->count();


if ($numEmpreses < 3) {
    $empresas = App\Models\Empreses::where('validada', 1)->get();
} else {

    $empresas = $empresas->random(3);
}
@endphp

<div class="container">

@foreach($empresas as $index => $empresa)
<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading fw-normal lh-1">{{ $empresa->nom }} <span class="text-body-secondary">Descobreix els
        nostres èxits.</span></h2>
    <p class="lead">Descripció de l'empresa 2. Informació fascinant sobre els èxits i la pionera indústria en què
      aquesta empresa destaca.</p>
  </div>
  <div class="col-md-5 order-md-1">
    <img src="/img/empresa{{ $index + 1 }}.jpg" class="featurette-image img-fluid mx-auto" width="500" height="500" alt="Imagen de la empresa">
  </div>
</div>
@endforeach


</div>
