<?php

require_once 'modules/controller.php';

$obj_employee = new employeeController();

$action = $_GET['action'];
$id = $_GET['id'] ? $_GET['id'] : 0;

$employee = $obj_employee->fetch($id);
$first_name= ($employee['first_name'] ? $employee['first_name'] : $_POST['first_name']);
$last_name= ($employee['last_name'] ? $employee['last_name'] : $_POST['last_name']);
$address= ($employee['address'] ? $employee['address'] : $_POST['address']);
$email= ($employee['email'] ? $employee['email'] : $_POST['email']);

?>
<h1><?php echo ($action == 'add' ? 'Registrar nuevo empleado' : 'Editar empleado')?></h1>

<form action="ajax/employeeAjax.php" method="POST" class="row g-3 needs-validation sendFormControl" novalidate>
  <input type="hidden" name="action" value="<?php echo $action ?>">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="first_name" id="validationCustom01" value="<?php echo $first_name?>" required>
    <div class="invalid-feedback">
      Este campo no debe estar vacío.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="last_name" id="validationCustom02" value="<?php echo $last_name?>" required>
    <div class="invalid-feedback">
      Este campo no debe estar vacío.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Dirección</label>
    <textarea class="form-control" name="address" id="validationCustom03" rows="3" required><?php echo $address?></textarea>
    <div class="invalid-feedback">
      Este campo no debe estar vacío.
    </div>
  </div>
  <div class="col-md-6">
    <label for="exampleFormControlInput1" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email?>" placeholder="name@example.com">
    <div class="invalid-feedback">
      Este campo no debe estar vacío.
    </div>
  </div>
  <div class="col-12">
    <button class="btn save-btn" type="submit">Guardar</button>
  </div>
</form>