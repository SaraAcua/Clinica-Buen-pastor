<?php

include './confi.php';
error_reporting(0);
$data = array();
//header('Content-Type: application/json');
$accion = $_POST['accion'];
$count = 0;
$json_string = "";


if ($accion == "RegistrarP") {
    echo 'entro';

    $foto = $_POST['foto'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $trabajando = $_POST['trabajo'];

    //$sql_query = "INSERT INTO personal( `foto`, `nombre`, `apellido`, `tipo`, `estado`, `trabajando`) VALUES ('$foto','$nombre','$apellido','$tipo','$estado',$trabajando)";
      $sql_query = "INSERT INTO personal( `foto`, `nombre`, `apellido`, `tipo`, `estado`) VALUES ('$foto','$nombre','$apellido','$tipo','$estado')";

    echo $sql_query;
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_query($con, $sql)) {
        $data['estado'] = 'success';
        $data['mensaje'] = 'Se ha registrado correctamente el personal !!!';
        $json_string = json_encode($data);
    } else {
        $data['estado'] = 'error';
        $data['mensaje'] = 'Ha ocurrido un error al registrar el personal !!!';
        $json_string = json_encode($data);
    }

    echo $json_string;
} else {

    $codigo = $_POST['codigo'];
    $foto = $_POST['foto'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $trabajando = $_POST['trabajo'];

    $sql_query = "UPDATE `personal` SET foto='$foto',nombre='$nombre',apellido='$apellido',tipo='$tipo',estado='$estado',trabajando='$trabajando' WHERE codigo='$codigo'";
    echo $sql_query;
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_query($con, $sql)) {
        $data['estado'] = 'success';
        $data['mensaje'] = 'Se ha actualizado correctamente el paciente !!!';
        $json_string = json_encode($data);
    } else {
        $data['estado'] = 'error';
        $data['mensaje'] = 'Ha ocurrido un error al actualizar el paciente !!!';
        $json_string = json_encode($data);
    }

    echo $json_string;
}


?>

