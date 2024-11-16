@php
    // Obtener todas las ofertas
    
    if(!$ofertes){
    $ofertes = App\Models\Ofertes::all();
    
    // Filtrar las ofertas por empresas validadas
    $ofertes = $ofertes->filter(function($oferta) {
        $empresa = App\Models\Empreses::find($oferta->empreses_id);
        return $empresa && $empresa->validada == 1;
    })->reverse();
    
    
    };
    $now = date('Y-m-d'); // Data actual

    $ofertes = $ofertes->filter(function($oferta) use ($now) {
        // Verificar si la fecha de caducidad de la oferta es igual o mayor a la fecha actual
        return $oferta->caducitat_oferta >= $now;
    });

@endphp
<div class="container mt-4">
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
            @foreach ($ofertes as $oferta)
              @php 
                  $empresa = App\Models\Empreses::find($oferta->empreses_id);
              @endphp
              <tr>
                  <td>{{$empresa->nom }}</td>
                  <td>{{$oferta->descripcio }}</td>
                  <td> {{($oferta->created_at)->format('Y-m-d');}}</td>
                  
                  @if(auth()->check() && auth()->user()->rol == 'Alumnes')
                  <td class="offer-actions">
                      <a href="{{ route('detalls', ['id' => $oferta->oferta_id]) }}" class="btn btn-primary">Detalls</a>
                  </td>
                  @endif  
              </tr>
            @endforeach


            </tbody>
        </table>
    </div>  
</div>
