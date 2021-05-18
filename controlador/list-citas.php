
<?php
$inc = include '../controlador/confi.php';
if ($inc) {
    $consulta = "select (select p.nombre from pacientes p where p.codigo = c.idpaciente) as nombrePaciente,(select p.apellido from pacientes p where p.codigo = c.idpaciente) as apellidoPaciente,(select per.nombre from personal per where per.codigo = c.idpersonal) as nombrePersonal,(select per.apellido from personal per where per.codigo = c.idpersonal) as apellidoPersonal,(select per.tipo from personal per where per.codigo = c.idpersonal) as tipoPersonal, c.id as idCita, c.fecha as fechaCita, c.estado as estadoCita  from citas c";
    $resultado = mysqli_query($con, $consulta);
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $idCita = $row['idCita'];
            $nombrePersonal = $row['nombrePersonal'] . ', ' . $row['apellidoPersonal'];
            $tipo = $row['tipoPersonal'];
            $nombrePaciente = $row['nombrePaciente'] . ', ' . $row['apellidoPaciente'];
            $fechaCita = $row['fechaCita'];
            $estadoCita = $row['estadoCita'];
            ?>
            <tr>
                <td><?php echo $idCita ?></td>
                <td><?php echo $nombrePersonal ?></td>
                <td><?php echo $tipo ?></td>
                <td><?php echo $nombrePaciente ?></td>
                <td><?php echo $fechaCita ?></td>
               
                <td>
                    <?php if ($estadoCita === 'En servicio') { ?>
                        <span class="label label-info"><?php echo $estadoCita ?></span>
                    <?php } else if ($estadoCita === 'Atendido') { ?>
                        <span class="label label-success"><?php echo $estadoCita ?></span>
                    <?php } else if ($estadoCita === 'Anulada') { ?>
                        <span class="badge badge-danger"><?php echo $estadoCita ?></span>
                    <?php } else if ($estadoCita === 'Asignado') { ?>
                        <span class="label label-warning"><?php echo $estadoCita ?></span>
                        <?php } else { ?>
                        <span class="label label-danger"><?php echo $estadoCita ?></span>
                    <?php } ?>
                </td>


                <td>         
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="form-citas.php?id=<?php echo $idCita ?>"><button   value="Actualizar" type="button" class="btn btn-success">Editar</button></a>

                    </div>
                </td>
            </tr>
            <?php
        }
    }
}
?>