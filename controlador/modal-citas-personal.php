<?php
$inc = include '../controlador/confi.php';
if ($inc) {
    $consulta = "SELECT * FROM personal";
    $resultado = mysqli_query($con, $consulta);
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $codigo = $row['codigo'];
            $nombre = $row['nombre'];
            $tipo = $row['tipo'];
            $estado = $row['estado'];
            ?>
            <tr>
                <td class="id_personal"><?php echo $codigo ?></td>

                <td><?php echo $nombre ?></td>


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
                 <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                          <button  type="button" class="btn btn-success btnPersonal">Seleccionar</button>
                    </div>
                </td>



            </tr>
            <?php
        }
    }
}
?>

