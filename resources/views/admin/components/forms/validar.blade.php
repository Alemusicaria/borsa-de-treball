@php
    // Obtener todas las ofertas
    $empreses = App\Models\Empreses::all();
@endphp


<div class="mt-4 col-md-10 offset-md-1">
    <h1>Empreses</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Estat Validació</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
            

    @foreach($empreses as $empresa)
        <tr>
            <td>{{ $empresa->nom }}</td>
            
            <td>{{ $empresa->validada == 1 ? 'Si' : 'No' }}</td>
            
            <td class="offer-actions">
                <form action="{{ route('validarInvalidarEmpresa') }}" method="POST">
                    @csrf
                    <input type="hidden" name="empresaId" value="{{ $empresa->empresa_id }}">
                    @if($empresa->validada == 1)
                        <button type="submit" class="btn" style="background-color:red;">Invalidar</button>
                    @else
                        <button type="submit" class="btn" style="background-color:green;">Validar</button>
                    @endif
                </form>
            </td>
        </tr>
    @endforeach


             
               
            </tbody>
        </table>
</div>
    