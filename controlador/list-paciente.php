<?php

try{
    

require "confi.php";
error_reporting(0);


//generamos la consulta
$sql = "SELECT `codigo`, `foto`, `nombre`, `apellido`, `fecha_nacimiento`, `edad`, `direccion`, `barrio`, `telefono`, `ciudad`, `estado` FROM `pacientes`";

mysqli_set_charset($con, "utf8"); //formato de datos utf8

if (mysqli_query($con, $sql)) {
    echo 'entro';

    $pacientes = array(); //creamos un array

    while ($row = $result->fetch_assoc()) {
        array_push($pacientes, $row);
    }
    
    $json_string = json_encode($pacientes);
    echo $json_string;
}else{
    echo 'No entro'; 
}

} catch (Exception $ex) {
    echo $ex;
}

?>