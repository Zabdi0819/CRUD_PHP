<?php
require_once '../modules/controller_ajax.php';

$employee = new employeeControllerAjax();
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$email = $_POST['email'];
$action = $_POST['action'];
$delete = $_GET['delete'];

$type = '';
$icon = '';
$title = '';
$text = '';

if (isset($action)) {
    if ($action == 'add') {
        $res = $employee->create($first_name, $last_name, $address, $email);

        if ($res > 0) {
            $type = 'simple';
            $icon = 'success';
            $title = 'Registro creado';
            $text = 'El empleado se ha registrado correctamente';
        } else {
            $type = 'simple';
            $icon = 'error';
            $title = ($res == -1 ? 'Correo ya registrado' : 'Error');
            $text = ($res == -1 ? 'El correo ingresado ya pertenece a otro empleado' : 'Error al registrar empleado');
        }
    } elseif ($action == 'edit') {
        $res = $employee->update($id, $first_name, $last_name, $address, $email);
        if ($res > 0) {
            $type = 'simple';
            $icon = 'success';
            $title = 'Registro actualizado';
            $text = 'El empleado se ha actualizado correctamente';
        } else {
            $type = 'simple';
            $icon = 'error';
            $title = ($res == -1 ? 'Correo ya registrado' : 'Error');
            $text = ($res == -1 ? 'El correo ingresado ya pertenece a otro empleado' : 'Error al registrar empleado');
        }
    }

    echo json_encode(array('success' => $res, 'type' => $type, 'icon' => $icon, 'title' => $title, 'text' => $text));
} 

if (isset($delete)) {

    $res = $employee->delete($id);
    if ($res > 0) {
        $type = 'simple';
        $icon = 'success';
        $title = 'Registro eliminado';
        $text = 'El empleado se ha eliminado correctamente';
    } else {
        $type = 'simple';
        $icon = 'error';
        $title = 'Error';
        $text = 'Error al eliminar empleado';
    }

    echo json_encode(array('success' => $res, 'type' => $type, 'icon' => $icon, 'title' => $title, 'text' => $text));

}

