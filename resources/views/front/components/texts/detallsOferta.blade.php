@php
    $empresa = App\Models\Empreses::find($oferta->empreses_id);

    $ofertaEstudis = App\Models\OfertaEstudis::where('oferta_id', $oferta->oferta_id)->get();

    $estudisArray = []; 

    foreach ($ofertaEstudis as $ofertaEstudi) {
        $estudis = App\Models\Estudis::where('estudi_id', $ofertaEstudi->estudi_id)->get();
        $estudisArray = array_merge($estudisArray, $estudis->toArray());
    }

    $usuari = App\Models\Usuaris::find($empresa->usuari_id);

    $idiomas = [];
    if($oferta->idioma1) $idiomas[] = $oferta->idioma1;
    if($oferta->idioma2) $idiomas[] = $oferta->idioma2;
    if($oferta->idioma3) $idiomas[] = $oferta->idioma3;
    if($oferta->idioma4) $idiomas[] = $oferta->idioma4;

    // Asumimos que tienes acceso al $alumne_id en esta vista.
    
    
    $alumne_id = (Auth::check() && Auth::user()->usuari_id !== null) ? Auth::user()->usuari_id : null;
    
@endphp

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Contingut de l'oferta de treball -->
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Oferta de Treball</h3>
                </div>
                <div class="card-body">
                    <!-- Detalls de l'oferta de treball -->
                    <h5 class="card-title">{{ $oferta->titol }}</h5>
                    
                    <p class="card-text">{{ $oferta->descripcio }}</p>
                    <p class="card-text"><strong>Estudis:</strong></p>
                    <ul>
                        @foreach ($estudisArray as $estudi)
                            <li>{{ $estudi['nom'] }}</li> 
                        @endforeach
                    </ul>
                    
                    <p class="card-text"><strong>Llengutges solicitats:</strong> {{ implode(', ', $idiomas) }}</p>
                    <p class="card-text"><strong>Rang d'edat:</strong> {{ $oferta->edat }} anys</p> 
                    <p class="card-text"><strong>Ubicació:</strong> {{ $empresa->municipi }}, {{ $empresa->provincia }}</p>
                    <p class="card-text"><strong>Dia de incorporació:</strong> {{ $oferta->incorporacio }}</p>
                    <p class="card-text"><strong>Horari:</strong> {{ $oferta->horari }}</p>
                    <p class="card-text"><strong>Tipus de contracte:</strong> {{ $oferta->tipus_contracte }}</p>
                    <p class="card-text"><strong>Salari:</strong> {{ $oferta->sou }} € anuals</p>
                    <p class="card-text"><strong>Caducitat de la oferta:</strong> {{ $oferta->caducitat_oferta }}</p>
                    
                    
                    @php
                    
                    if($alumne_id != null){
                    if(Auth::user()->rol == "Alumnes"){
                        $inscrit = App\Models\AlumnesOfertes::where('oferta_id', $oferta->oferta_id)
                                                              ->where('alumne_id', session('userData')->alumne_id)
                                                              ->get();
                    } }
                    
                    @endphp
                   
                    
                    @if($alumne_id != null)
                      @if(Auth::user()->rol == "Alumnes")
                      @if($inscrit->isEmpty())
                          <a href="{{ route('inscriure', ['oferta_id' => $oferta->oferta_id, 'alumne_id' => session('userData')->alumne_id]) }}" class="btn btn-primary">Inscriu-te</a>
                      @else
                          <button class="btn btn-primary" style="background-color: #212529; border-color: #212529;">Ja estàs inscrit!</button>
                      @endif
                    @endif
                   @endif 
                    
                    
                    
                </div>
            </div>

            <!-- Detalls de l'empresa -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Informació de l'Empresa</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $empresa->nom }}</h5>
                    <br>
                    <p class="card-text"><strong>Adreça:</strong> {{ $empresa->adreca }}, {{ $empresa->municipi }}, {{ $empresa->provincia }} ({{ $empresa->codi_postal }})</p>
                    <p class="card-text"><strong>Persona Contacte:</strong> {{$empresa->persona_contacte}} </p>
                    <p class="card-text"><strong>Correu:</strong> {{$usuari->email}} </p>
                    <p class="card-text"><strong>Telefon:</strong> {{ $empresa->primer_telefon_contacte }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
