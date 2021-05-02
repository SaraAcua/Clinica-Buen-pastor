<?php
include "config.php";



$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);



$count=0;

if ($username != "" && $password != ""){

    //$sql_query = "select count(*) as numusu,nombre as nombre,foto from usuarios where user='".$username."' and pass='".$password."'";
    $sql_query = "select count(*) as numusu,name as nombre,image as foto,cargo as position from usuario where usuario='".$username."' and clave='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['numusu'];
    $nombre = $row['nombre'];
    $foto = $row['foto'];
    $cargo = $row['position'];
    
    
   
    if($count > 0){
        $_SESSION['usuario'] = $nombre;
        $_SESSION['foto'] = $foto;
        $_SESSION['rol'] = $cargo;
        $_SESSION['validar'] = true;
       
       
    }else{
        
        $_SESSION['validar'] = false;
    }

}
?>