<h1>Vista crear</h1>

  <form action="ajax/userAjax.php" method="POST" class="row g-3 needs-validation employeeFormControl" novalidate>
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Apellido</label>
      <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom03" class="form-label">Dirección</label>
      <textarea class="form-control" id="validationCustom03" rows="3" required></textarea>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-12">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="col-12">
      <button class="btn save-btn" type="submit">Guardar</button>
    </div>
  </form>
