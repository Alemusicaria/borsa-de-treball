@php
    // Obtenir tots els estudis
    $estudis = App\Models\Estudis::all();
@endphp
<div class="py-5 text-center">
            <h2>Buscar Oferta</h2>
            <p class="lead">Seleccioneu alguna de les especialitats per veuren les ofertes de treball.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="needs-validation" method="POST" action="{{ route('cercarOferta') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="especialitat" class="form-label">Especialitat</label>
                            <select name="especialitat" class="form-select" id="especialitat">
                                <option value=""></option>
                                @foreach ($estudis as $estudi)
                                <option value= "{{$estudi->estudi_id}}">{{$estudi->nom}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona una especialitat vàlida.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="salari" class="form-label">Salari</label>
                            <select name="salari" class="form-select" id="salari">
                                <option value=""></option>
                                <option>&lt;499€</option>
                                <option>500€-999€</option>
                                <option>1000€-1499€</option>
                                <option>1500€-1999€</option>
                                <option>&gt;2000€</option>
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona un salari vàlid.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="horari" class="form-label">Horari</label>
                            <select name="horari" class="form-select" id="horari">
                                <option value=""></option>
                                <option value ="Mati">Matí</option>
                                <option>Tarda</option>
                                <option>Nit</option>
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona un horari vàlid.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="jornada" class="form-label">Jornada</label>
                            <select name="jornada" class="form-select" id="especialitat">
                                <option value=""></option>
                                <option>Mitja jornada</option>
                                <option>Jornada Completa</option>
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona una especialitat vàlida.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="provincia" class="form-label">Provincia</label>
                            <select name="provincia" class="form-select" id="provincia">
                                <option value=""></option>
                                <option>Barcelona</option>
                                <option>Lleida</option>
                                <option>Tarragona</option>
                                <option>Girona</option>
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona una provincia vàlida.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="ciutat" class="form-label">Ciutat</label>
                            <input name="ciutat" type="text" class="form-control" id="ciutat" placeholder="">
                            <div class="invalid-feedback">
                                Ciutat no vàlida.
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Buscar</button>
                </form>
            </div>
        </div>
        <hr class="featurette-divider">
        </div>
