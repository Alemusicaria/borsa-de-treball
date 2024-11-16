<div class="py-5 text-center">
            <h2>Buscar Oferta</h2>
            <p class="lead">Seleccioneu alguna de les especialitats per veure'n les ofertes de treball.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="especialitat" class="form-label">Especialitat</label>
                            <select class="form-select" id="especialitat" required>
                                <option value=""></option>
                                <option>Especialitat 1</option>
                                <option>Especialitat 2</option>
                                <option>Especialitat 3</option>
                                <option>Especialitat 4</option>
                                <option>Especialitat 5</option>
                                <option>Especialitat 6</option>
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona una especialitat vàlida.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="salari" class="form-label">Salari</label>
                            <select class="form-select" id="salari" required>
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
                            <select class="form-select" id="horari" required>
                                <option value=""></option>
                                <option>Matí</option>
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
                            <label for="especialitat" class="form-label">Jornada</label>
                            <select class="form-select" id="especialitat" required>
                                <option value=""></option>
                                <option>Mitja jornada</option>
                                <option>Jornada completa</option>
                            </select>
                            <div class="invalid-feedback">
                                Sisplau selecciona una especialitat vàlida.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="provincia" class="form-label">Provincia</label>
                            <select class="form-select" id="provincia" required>
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
                            <input type="text" class="form-control" id="ciutat" placeholder="" required>
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
