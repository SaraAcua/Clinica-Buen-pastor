
<?php

include './confi.php';
error_reporting(0);
$data = array();
//header('Content-Type: application/json');
$accion = $_POST['accion'];
$count = 0;
$json_string = "";
echo $accion;
if ($accion == "RegistrarC") {


    $id_Personal = $_POST['id_Personal'];
    $id_Paciente = $_POST['id_Paciente'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];

    $sql_query = "INSERT INTO `citas`(`idpaciente`, `idpersonal`, `fecha`, `estado`) VALUES ('$id_Paciente','$id_Personal','$fecha','$estado')";

    echo $sql_query;
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_query($con, $sql)) {
        $data['estado'] = 'success';
        $data['mensaje'] = 'Se ha registrado correctamente la cita !!!';
        $json_string = json_encode($data);
    } else {
        $data['estado'] = 'error';
        $data['mensaje'] = 'Ha ocurrido un error al registrar la cita !!!';
        $json_string = json_encode($data);
    }

    echo $json_string;
} else {
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $accion = $_POST['accion'];

    $sql_query = "UPDATE `citas` SET `estado`='".$estado."' WHERE id=".$id;
    echo $sql_query;
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_query($con, $sql)) {
        $data['estado'] = 'success';
        $data['mensaje'] = 'Se ha actualizado correctamente la cita !!!';
        $json_string = json_encode($data);
    } else {
        $data['estado'] = 'error';
        $data['mensaje'] = 'Ha ocurrido un error al actualizar la cita !!!';
        $json_string = json_encode($data);
    }

    echo $json_string;
}
?>


