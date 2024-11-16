@php
    use App\Models\Ofertes;
    use App\Models\Empreses;
    use App\Models\AlumnesOfertes;

    // Obtener todas las ofertas
    $ofertes = Ofertes::all();

    // Filtrar las ofertas por empresas validadas
    $empresaId = session('userData')->empresa_id;
    $ofertesValidades = $ofertes->filter(function($oferta) use ($empresaId) {
        $empresa = Empreses::find($oferta->empreses_id);
        return $empresa && $empresa->validada == 1 && $empresa->empresa_id == $empresaId;
    });

    // Invertir el orden de las ofertas
    $ofertesValidades = $ofertesValidades->reverse();
@endphp

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Ofertes Disponibles</h1>
        <a type="button" class="btn btn-primary" href="afegirOferta">Crear Oferta</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descripció</th>
                    <th>Fecha de Publicación</th>
                    <th>Personas Inscritas</th>
                    <th>Accions</th>
                    <th></th>
                    <th></th> 
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ofertesValidades as $oferta)
                    @php 
                        $empresa = Empreses::find($oferta->empreses_id);
                        $inscrits = AlumnesOfertes::where('oferta_id', $oferta->oferta_id)->count();
                    @endphp
                    <tr>
                        <td>{{ $oferta->descripcio }}</td>
                        <td>{{ $oferta->created_at->format('Y-m-d') }}</td>
                        <td>{{ $inscrits }}</td>
                        <td class="offer-actions">
                            <a href="/detallsofertaempresa/{{ $oferta->oferta_id }}" class="btn btn-primary">Detalls</a>
                        </td>
                        <td>
                            <a href="/modificarOferta/{{ $oferta->oferta_id }}" class="btn btn-primary" style="background-color: #3550e8; border-color: #3550e8;">Modificar</a>
                        </td>
                        <td>
                            <a href="{{ route('ocultarOferta', ['oferta_id' => $oferta->oferta_id]) }}" class="btn btn-warning" style="background-color: #fec106; border-color: #fec106;">Ocultar</a>
                        </td>
                        <td>
                            <a href="{{ route('eliminarOferta', ['oferta_id' => $oferta->oferta_id]) }}" class="btn btn-danger" style="background-color: #d93448; border-color: #d93448;">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
