<?php
require_once '../class/user_class.php';

session_start();

$user = new User();
$username = $_POST['username'];
$password = $_POST['password'];
$logout = $_POST['logout'];
$type = '';
$icon = '';
$title = '';
$text = '';

$res = $user->fetch($username, $password);

if (!isset($logout)) {
    if ($res < 0) {
        $type = 'simple';
        $icon = 'error';
        $title = 'Error';
        $text = 'Datos incorrectos';
    } else {
        $type = 'logged_in';
        $_SESSION['username'] = $username;
    }

    echo json_encode(array('success' => $res, 'type' => $type, 'icon' => $icon, 'title' => $title, 'text' => $text));
} else {
    // Eliminar variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();
    
    echo json_encode(array('success' => 1));
}
