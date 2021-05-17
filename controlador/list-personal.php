<?php
$inc = include '../controlador/confi.php';
if ($inc) {
    $consulta = "SELECT * FROM personal";
    $resultado = mysqli_query($con, $consulta);
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $codigo = $row['codigo'];
            $foto = $row['foto'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $tipo = $row['tipo'];
            $estado = $row['estado'];

            $trabajando = $row['trabajando'];
            ?>
            <tr>
                <td class="id_personal"><?php echo $codigo ?></td>
                <td><img src="<?php echo $foto ?>" height="64px" width="64px" class="rounded-circle"/></td>
                <td><?php echo $nombre ?></td>
                <td><?php echo $apellido ?></td>

                <td>
                    <?php if ($tipo === 'Medico') { ?>
                        <span class="label label-info"><?php echo $tipo ?></span>
                    <?php } else if ($tipo === 'Fisioterapeuta') { ?>
                        <span class="label label-warning"><?php echo $tipo ?></span>
                    <?php } else { ?>
                        <span class="badge badge-success"><?php echo $tipo ?></span>

                    <?php } ?>
                </td>

                <?php
                if ($estado == 0) {
                    $estado = 'inactivo';
                } else {
                    $estado = 'activo';
                }
                ?>
                <td><?php echo $estado ?></td>
                <?php
                if ($trabajando == 0) {
                    $trabajando = 'Libre';
                } else {
                    $trabajando = 'En servicio';
                }
                ?>
                <td><?php echo $trabajando ?></td>
                <td>         
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="form-personal.php?id=<?php echo $codigo ?>"><button   value="Actualizar" type="button" class="btn btn-success">Editar</button></a>
                        <button type="button" class="btn btn-danger delete_personal">Eliminar</button>
                    </div>
                </td>
            </tr>
            <?php
        }
    }
}
?>

