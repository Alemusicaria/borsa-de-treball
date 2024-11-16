<div class="row">
  <div class="col-md-6 offset-md-3">
    <h2 class="text-center mb-4">Seleccionar tipo de usuario</h2>
    <form action="/registrar" method="POST">
      <div class="mb-3">
        <label for="tipo_usuario" class="form-label">Selecciona el tipo de usuario:</label>
        <select class="form-select" name="tipo_usuario" required>
          <option value="">Selecciona...</option>
          <option value="alumne">Alumne</option>
          <option value="administrador">Administrador</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Continuar</button>
    </form>
  </div>
</div>
