
<?php

header('Content-Type: application/json');

include "confi.php";
error_reporting(0);
$data = array();

$codigo=$_POST['codigo'];
$nombre = $_POST['nombre'];
$foto = $_POST['foto'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$barrio = $_POST['barrio'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$accion = $_POST['accion'];

$count = 0;

if ($accion == "Registrar") {


    $sql_query = "INSERT INTO pacientes( `foto`, `nombre`, `apellido`, `fecha_nacimiento`, `edad`, `direccion`, `barrio`, `telefono`, `ciudad`, `estado`) VALUES ('$foto','$nombre','$apellido','$fecha_nacimiento','$edad','$direccion','$barrio','$telefono','$ciudad',$estado)";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_query($con, $sql)) {
        $data['estado'] = 'success';
        $data['mensaje'] = 'Se ha registrado correctamente el paciente !!!';
        $json_string = json_encode($data);
        echo $json_string;
    } else {
        $data['estado'] = 'error';
        $data['mensaje'] = 'Ha ocurrido un error al registrar el paciente !!!';
        $json_string = json_encode($data);
        echo $json_string;
    }
} else {

    $sql_query = "UPDATE `pacientes` SET foto=$foto',nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',edad='$edad',direccion='$direccion',barrio='$barrio',telefono='$telefono',ciudad='$ciudad',estado=$estado WHERE codigo='$codigo";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_query($con, $sql)) {
        $data['estado'] = 'success';
        $data['mensaje'] = 'Se ha actualizado correctamente el paciente !!!';
        $json_string = json_encode($data);
        echo $json_string;
    } else {
        $data['estado'] = 'error';
        $data['mensaje'] = 'Ha ocurrido un error al actualizar el paciente !!!';
        $json_string = json_encode($data);
        echo $json_string;
    }
}
?>
