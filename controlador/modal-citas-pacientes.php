
<?php
$inc = include '../controlador/confi.php';
if ($inc) {
    $consulta = "SELECT * FROM pacientes";
    $resultado = mysqli_query($con, $consulta);
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $codigo = $row['codigo'];

            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            ?>
            <tr>
                <td><?php echo $codigo ?></td>
                <td><?php echo $nombre ?></td>
                <td><?php echo $apellido ?></td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                       <button   type="button" class="btn btn-success btnPaciente">Seleccionar</button>
                    </div>
                </td>

            </tr>
            <?php
        }
    }
}
?>