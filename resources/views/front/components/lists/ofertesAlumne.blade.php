@php
 

// Obtener el ID del alumno de la sesión
$alumneId = session('userData')->alumne_id;

// Obtener el alumno
$alumne = App\Models\Alumne::find($alumneId);

// Obtener los estudios del alumno
$alumnesEstudis = App\Models\AlumnesEstudis::where('alumne_id', $alumneId)->get();

$estudisArray = [];

foreach ($alumnesEstudis as $alumneEstudi) {
    $estudi = App\Models\Estudis::find($alumneEstudi->estudi_id);
    if ($estudi) {
        $estudisArray[] = $estudi;
    }
}

$ofertesArray = [];

foreach ($estudisArray as $estudi) {
    $ofertaEstudis = App\Models\OfertaEstudis::where('estudi_id', $estudi->estudi_id)->get();

    foreach ($ofertaEstudis as $ofertaEstudi) {
        $oferta = App\Models\Ofertes::find($ofertaEstudi->oferta_id);
        if ($oferta) {
            $empresa = App\Models\Empreses::find($oferta->empreses_id);
            if ($empresa && $empresa->validada == 1) {
                $ofertesArray[] = $oferta;
            }
        }
    }
}





//$ofertesArray = collect($ofertesArray)->unique('oferta_id')->values()->all();



@endphp
<div class="container mt-4">
    <h2>Els teus estudis</h2>
    <ul>
        @foreach ($estudisArray as $estudi)
            <li>{{ $estudi->nom }}</li>
        @endforeach
    </ul>
    <h1>Ofertes Disponibles</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Descripció</th>
                    <th>Data de Publicació</th>
                    @if(auth()->check() && auth()->user()->rol == 'Alumnes')
                        <th>Accions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($ofertesArray as $item)
                
                @php                    
                $empresa = App\Models\Empreses::find($oferta->empreses_id);               
                @endphp
                    <tr>
                        <td>{{$empresa->nom }}</td>
                        <td>{{ $item['descripcio'] }}</td>
                        <td>{{ $item['created_at']->format('Y-m-d') }}</td>
                        @if(auth()->check() && auth()->user()->rol == 'Alumnes')
                            <td class="offer-actions">
                                <a href="{{ route('detalls', ['id' => $item['oferta_id']]) }}" class="btn btn-primary">Detalls</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>