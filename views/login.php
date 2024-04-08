<h1>Iniciar sesión</h1>

<form action="ajax/userAjax.php" method="POST" class="row g-3 needs-validation sendFormControl login" novalidate>
  <div class="col-md-12">
    <label class="form-label">Nombre de usuario</label>
    <input type="text" class="form-control" name="username" value="" placeholder="username_example" required>
    <div class="invalid-feedback">
      Ingrese nombre de usuario.
    </div>
  </div>
  <div class="col-md-12">
    <label class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="password" value="" required>
    <div class="invalid-feedback">
      Ingrese contraseña.
    </div>
  </div>
  <div class="col-12">
    <button class="btn save-btn" type="submit">Iniciar sesión</button>
  </div>
</form>