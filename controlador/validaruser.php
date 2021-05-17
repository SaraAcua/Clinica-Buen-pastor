<?php

include "confi.php";
session_start();
error_reporting(0);
$username = mysqli_real_escape_string($con, $_POST['usuario']);
$password = mysqli_real_escape_string($con, $_POST['clave']);

$count = 0;

if ($username != "" && $password != "") {

    $sql_query = "select count(*) as numUsu,Nombre,Apellido,Usuario,rol from Usuario u where u.Usuario = '" . $username . "' and u.Clave = '" . $password . "'";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    header('Content-Type: application/json');
    $count = $row['numUsu'];
    $usuario=$row['Usuario'];
    $nombre = $row['Nombre'];
    $apellido = $row['Apellido'];
    $rol = $row['rol'];
    $data = array();
    if ($count > 0) {
        $_SESSION['Usuario']=$usuario;
        $_SESSION['Nombre'] = $nombre;
        $_SESSION['Apellido'] = $apellido;
        $_SESSION['Rol'] = $rol;
        $_SESSION['validar'] = true;
        $data['estado'] = 'success';
        $data['mensaje'] = 'Acceso correcto';
        $data['Usuario']=$usuario;
        $data['Nombre'] = $nombre;
        $data['Apellido'] = $apellido;
        $data['Rol'] = $rol;
        $data['validar'] = true;
    } else {
        $_SESSION['validar'] = false;
        $data['estado'] = 'error';
        $data['mensaje'] = 'Acceso no autorizado';
    }
}

echo json_encode($data);
?>