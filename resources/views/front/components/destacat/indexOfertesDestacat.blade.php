@php
    // Obtener todas las ofertas
    $ofertes = App\Models\Ofertes::all();
    
    // Filtrar las ofertas por empresas validadas
    $ofertesValidades = $ofertes->filter(function($oferta) {
        $empresa = App\Models\Empreses::find($oferta->empreses_id);
        return $empresa && $empresa->validada == 1;
    });

    // Seleccionar aleatoriamente 3 ofertas validadas
    $ofertesValidades2 = $ofertesValidades->count() >= 3 ? $ofertesValidades->random(3) : $ofertesValidades;
@endphp


<div class="container marketing">
    <div class="row justify-content-center">
        @foreach ($ofertesValidades2 as $oferta)
        <div class="col-lg-4 ">
          <svg class="bd-placeholder-img " width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Marcador de posició" preserveAspectRatio="xMidYMid slice" focusable="false" viewBox="0 0 512 512">
    <title>Marcador de posició</title>
    <path fill="var(--bs-secondary-color)" d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/>
</svg>
            
            <h2 class="fw-normal">{{ $oferta->sou }}</h2>
            <p>{{ $oferta->descripcio }}</p>
            <p><a class="btn btn-secondary" href="{{ route('detalls', ['id' => $oferta->oferta_id]) }}">Veure detalles &raquo;</a></p>
        </div>
        @endforeach
    </div>
</div>
@php 
@endphp





