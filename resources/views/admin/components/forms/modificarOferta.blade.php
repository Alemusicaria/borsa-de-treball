@php
$oferta = App\Models\Ofertes::find($id);


//AAgafem les ofertes  estudis que tenim seleccionades
$OfertaEstudis = App\Models\OfertaEstudis::where('oferta_id', $id)->get();

$estudisSeleccionats = [];

foreach($OfertaEstudis as $ofertaEstudi) {
    $estudis = App\Models\Estudis::where('estudi_id', $ofertaEstudi->estudi_id)->get();
    
    foreach($estudis as $estudi) {
        $estudisSeleccionats[] = $estudi->estudi_id;
    }
}

//Agafem totes
$OfertaEstudis2 = App\Models\Estudis::All();

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

    <h2>Modificar Oferta</h2>
    <form method="POST" action=" {{route('modificarOferta')}}">
        @csrf
        <div class="form-group">
            <label for="horari">Horari</label>
            <select class="form-control" id="horari" name="horari" required>
                <option value="Mati" {{ $oferta->horari == 'Mati' ? 'selected' : '' }}>Mati</option>
                <option value="Tarda" {{ $oferta->horari == 'Tarda' ? 'selected' : '' }}>Tarda</option>
                <option value="Nit" {{ $oferta->horari == 'Nit' ? 'selected' : '' }}>Nit</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="incorporacio">Data d'incorporació</label>
            <input type="date" class="form-control" id="incorporacio" name="incorporacio" value="{{ $oferta->incorporacio }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="sou">Sou</label>
            <input type="number" step="0.01" class="form-control" id="sou" name="sou" value="{{ $oferta->sou }}">
        </div>
        <br>
        <div class="form-group">
            <label for="edat">Edat</label>
            <input type="text" class="form-control" id="edat" name="edat" value="{{ $oferta->edat }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="idioma1">Idioma 1</label>
            <input type="text" class="form-control" id="idioma1" name="idioma1" value="{{ $oferta->idioma1 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma2">Idioma 2</label>
            <input type="text" class="form-control" id="idioma2" name="idioma2" value="{{ $oferta->idioma2 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma3">Idioma 3</label>
            <input type="text" class="form-control" id="idioma3" name="idioma3" value="{{ $oferta->idioma3 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="idioma4">Idioma 4</label>
            <input type="text" class="form-control" id="idioma4" name="idioma4" value="{{ $oferta->idioma4 }}">
        </div>
        <br>
        <div class="form-group">
            <label for="tipus_contracte">Tipus de Contracte</label>
            <select class="form-control" id="tipus_contracte" name="tipus_contracte" required>
                <option value="Jornada Completa" {{ $oferta->tipus_contracte == 'Jornada Completa' ? 'selected' : '' }}>Jornada Completa</option>
                <option value="Mitja jornada" {{ $oferta->tipus_contracte == 'Mitja jornada' ? 'selected' : '' }}>Mitja Jornada</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="caducitat_oferta">Caducitat de l'Oferta</label>
            <input type="date" class="form-control" id="caducitat_oferta" name="caducitat_oferta" value="{{ $oferta->caducitat_oferta }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="estudis">Selecció d'Estudis (Mantenir control per a seleccionar més d'un)</label>
            <select class="form-select" id="estudis" name="estudis[]" multiple aria-label="multiple select example">
                @foreach($OfertaEstudis2 as $ofertaEstudi)
                    @php
                    $estudis = App\Models\Estudis::where('estudi_id', $ofertaEstudi->estudi_id)->get();
                    @endphp
                
                    
                    @if(in_array($estudis[0]->estudi_id, $estudisSeleccionats))
                        <option selected value="{{ $estudis[0]->estudi_id }}">{{ $estudis[0]->nom }}</option>
                        
                    @endif
                    
                    @if(!in_array($estudis[0]->estudi_id, $estudisSeleccionats))
                        <option value="{{ $estudis[0]->estudi_id }}">{{ $estudis[0]->nom }}</option>
                        
                    @endif
                   
                @endforeach

            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="descripcio">Descripció</label>
            <textarea class="form-control" id="descripcio" name="descripcio" rows="3" required>{{ $oferta->descripcio }}</textarea>
        </div>
        <br>
        <input type="hidden" id="empresa_id" name="idEmpresa" value="{{ session('userData')->empresa_id }}"> <!-- ID de la empresa oculto -->
        <input type="hidden" id="oferta_id" name="oferta_id" value="{{$oferta->oferta_id }}">
        <button type="submit" class="btn btn-primary">Modificar Oferta</button>
    </form>
</div>
