  <div class="container">
    <h1>Modificar Dades d'Accés</h1>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ route('updateUsuari') }}">
      <!-- Aquí se cargarán los datos actuales de acceso de la empresa desde la base de datos -->
      <div class="form-group">
        <label for="correo_electronico">Email</label>
        <input type="email" name="email-new" class="form-control" id="correo_electronico" name="correo_electronico" value="" placeholder="Email de l'empresa">
      </div>
      <br>
      <div class="form-group">
        <label for="contrasenya">Contrasenya</label>
        <input type="password" name="password-new" class="form-control" id="contrasenya" name="contrasenya" placeholder="Introdueix la nova contrasenya">
        <br>
        <label for="contrasenya">Contrasenya Actual</label>
        <input type="password" name="password-old" class="form-control" id="contrasenya" name="contrasenya" placeholder="Introdueix la contrasenya actuals" required>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Desar Canvis</button>
    </form>
  </div>