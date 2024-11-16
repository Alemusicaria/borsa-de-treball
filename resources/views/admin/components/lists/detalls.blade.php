@php
// Obtener la oferta con el ID proporcionado desde la sesión
//$oferta = App\Models\Ofertes::find($ofertaId);
//$alumnesInscrits = App\Models\AlumnesOfertes::where('oferta_id', $ofertaId)->with('alumne')->get();

@endphp
<div class="container">
    <h1>Detalls de l'Oferta</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $oferta->descripcio }}</h5>
            <p class="card-text">Descripció de l'Oferta: {{ $oferta->descripcio }}</p>
            <p class="card-text">Data de Publicació: {{ $oferta->created_at->format('Y-m-d') }}</p>
        </div>
    </div>

<h2 class="mt-4">Alumnes Inscrits</h2>
  @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Cognom</th>
            <th>Correu Electrònic</th>
            <th>Telèfon</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->nom }}</td>
            <td>{{ $alumno->primer_cognom }} {{ $alumno->segon_cognom }}</td>
            <td>{{ $alumno->usuario->email }}</td>
            <td>{{ $alumno->primer_telefon }}</td>
            <td>
                <a class="btn btn-danger" style="background-color: #d93448; border-color: #d93448;" href="{{ route('rebutjar', ['alumne_id' => $alumno->alumne_id, 'oferta_id' => $oferta->oferta_id]) }}">Rebutjar</a>
                
                <button class="btn btn-primary" onclick="window.location.href='{{ route('contactar', ['alumne_id' => $alumno->alumne_id, 'oferta_id' => $oferta->oferta_id]) }}'">Contactar</button>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
