<form method="POST" action="{{ route('recuperar') }}">
  <h1 class="h3 mb-3 fw-normal">Recuperació de contrasenya</h1>
  <p class="mb-4">Introdueix la teva adreça de correu electrònic associada al teu compte.</p>

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

  <div class="form-floating">
    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Correu electrònic</label>
  </div>

  <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Enviar enllaç de recuperació</button>
</form>
<p class="mt-3 mb-3 text-body-secondary">
    Torna a la <a href="/login">pàgina d'inici de sessió</a>.
</p>
<p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>