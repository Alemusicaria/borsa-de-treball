@php

//Variables locals
$ofertesArray = [];

// Obtener el ID del alumne
$alumneId = session('userData')->alumne_id;



// Obtenir les ofertes del alumne
$alumnesOfertes = App\Models\AlumnesOfertes::where('alumne_id', $alumneId)->get();





foreach ($alumnesOfertes as $oferta) {
    $oferta = App\Models\Ofertes::find($oferta['oferta_id']);
    if ($oferta) {
        $ofertesArray[] = $oferta;
    }
}



@endphp
<div class="container">
    <h1>Historial d'ofertes</h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Descripció</th>
            <th>Data d'Inscripció</th>
            <th>Estat</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ofertesArray as $oferta)
          @php                    
            $alumnesOfertes2 = App\Models\AlumnesOfertes::where('oferta_id', $oferta['oferta_id'])->where('alumne_id', $alumneId)->get();   
          @endphp
          
          
            <tr>
              <td>{{  $oferta['descripcio'] }}</td>
              <td>{{ $alumnesOfertes2[0]->data_interes }}</td>
              
              
              @if($alumnesOfertes2[0]->vist_empresa == 0)
              <td><i class="fa-solid fa-hourglass-half text-warning"></i> En Procès</td>
              @endif
              
              
              @if($alumnesOfertes2[0]->vist_empresa == 1)
              <td><i class="fas fa-check text-success"></i> Acceptat</td>
              @endif
              
              @if($alumnesOfertes2[0]->vist_empresa == 2)
              <td><i class="fas fa-times text-danger"></i> Rebutjat</td>
              @endif
              
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>