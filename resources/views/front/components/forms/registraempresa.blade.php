<div class="py-1 text-center">
  <h2>Donar d'alta Empresa</h2>
</div>
<div class="container">

@if(session('error'))
<div class="alert alert-danger text-center">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
  <form class="my-3 mx-auto p-5 border rounded " method="POST" action="{{ route('altaEmpresa') }}">
    @csrf <!-- Añadir este campo oculto para protección CSRF -->
    <div class="justify-content-center row g-3">
      <div class="col-sm-2">
        <!-- Nif -->
        <label class="col-form-label">NIF</label>
      </div>
      <div class="col-auto">
        <input name="nif" type="text" class="form-control" required>
      </div>
    </div>

    <div class=" justify-content-center row g-3 mt-1">
      <div class="col-md-2">
        <!-- Nom -->
        <label class="col-form-label">Nom</label>
      </div>
      <div class="col-auto">
        <input name="nom" type="text" class="form-control" required>
      </div>
    </div>

    <div class=" justify-content-center row g-3 mt-1">
      <div class="col-md-2">

        <!-- Email -->
        <label class="col-form-label">Email</label>
      </div>
      <div class="col-auto">
        <input name="email"  type="email" class="form-control" required>
      </div>
    </div>

    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-2">
        <!-- Persona Contacte -->
        <label class="col-form-label">Persona Contacte</label>
      </div>
      <div class="col-auto">
        <input name="personaContacte" type="text"  class="form-control" required>
      </div>
    </div>
    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-2">

        <!-- Telefon Contacte -->
        <label class="col-form-label">Telefon Contacte</label>
      </div>
      <div class="col-auto">
        <input name="telefonContacte" type="text"  class="form-control" required>
      </div>
    </div>
    <div class=" justify-content-center row g-3 mt-1">
      <div class="col-md-2">

      <!-- Segon Telefon Contacte -->
        <label class="col-form-label">Segon Telefon</label>
      </div>
      <div class="col-auto">
        <input name="segonTelefonContacte" type="text"  class="form-control">
      </div>
    </div>
    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-2">

      <!-- Adreça -->
        <label class="col-form-label">Adreça</label>
      </div>
      <div class="col-auto">
        <input name="adreca" type="text"  class="form-control" required>
      </div>
    </div>
    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-2">

      <!-- Municipi -->
        <label for="municipi" class="col-form-label">Municipi</label>
      </div>
      <div class="col-auto">
        <input name="municipi" type="text"  class="form-control" required>
      </div>
    </div>
    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-2">

      <!-- Codi Postal -->
        <label class="col-form-label">Codi Postal</label>
      </div>
      <div class="col-auto">
        <input name="codiPostal" type="text"  class="form-control" required>
      </div>
    </div>
    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-2">

      <!-- Provincia -->
        <label class="col-form-label">Provincia</label>
      </div>
      <div class="col-md-auto">
        <input name="provincia" type="text" id="province" class="form-control" required>
      </div>
    </div>

    <br>
    <div class="justify-content-center row g-3 mt-1">
      <div class="col-md-auto">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </form>
</div>