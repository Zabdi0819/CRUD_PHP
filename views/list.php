<?php
require_once 'modules/controller.php';

$obj_employee = new employeeController();

?>

<h1>Lista de empleados</h1>

<table class="table">
    <thead>
        <tr>
            <th class="table-secondary" scope="col">#</th>
            <th class="table-secondary" scope="col">Nombre</th>
            <th class="table-secondary" scope="col">Apellido</th>
            <th class="table-secondary" scope="col">Domicilio</th>
            <th class="table-secondary" scope="col">Correo electrónico</th>
            <th class="table-secondary" scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $employe_list = $obj_employee->index();
        foreach ($employe_list as $employee) {
            $id = $employee[0];
            $name = $employee[1].' '.$employee[2];
            print '<tr>';
            foreach ($employee as $value) {
        ?>
                
                <td scope="row"><?php echo $value?></td>
                
        <?php
            }
            print '<td><a href="?view=form&action=edit&id='.$id.'" class="btn btn-outline-success">Ver/Editar</a>&ensp;';
            print '<button type="button" class="btn btn-danger" onClick="delete_ajax(\''.$name.'\', \''.$id.'\')">Eliminar</button></td>';
            print '</tr>';
        }

        ?>
    </tbody>
</table>