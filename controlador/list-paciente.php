
<?php


                                                    $inc =   include '../controlador/confi.php';
                                                if ($inc) {
                                                        $consulta = "SELECT * FROM pacientes";
                                                        $resultado = mysqli_query($con,$consulta);
                                                        if ($resultado) {
                                                                while ($row = $resultado->fetch_array()) {
                                                            $codigo = $row['codigo'];
                                                            $foto = $row['foto'];
                                                            $nombre= $row['nombre'];
                                                            $apellido = $row['apellido'];
                                                            $fecha_nacimiento = $row['fecha_nacimiento'];
                                                            $edad = $row['edad'];
                                                            $direccion = $row['direccion'];
                                                            $barrio = $row['barrio'];
                                                            $telefono = $row['telefono'];
                                                            $ciudad = $row['ciudad'];
                                                            $estado = $row['estado']; 

                                                            ?>
                                                         <tr>
                                                        <td><?php echo $codigo   ?></td>
                                                        <td><img src="<?php echo  $foto?>" height="64px" width="64px" class="rounded-circle" /></td>
                                                         <td><?php echo $nombre   ?></td>
                                                          <td><?php echo $apellido   ?></td>
                                                           <td><?php echo $fecha_nacimiento   ?></td>
                                                           <td><?php echo $edad   ?></td>
                                                            <td><?php echo $direccion   ?></td>
                                                             <td><?php echo $barrio   ?></td>
                                                              <td><?php echo $ciudad   ?></td>
                                                              <td><?php echo $telefono   ?></td>
                                                             <?php
                                                             if($estado== 0){
                                                                 $estado = 'inactivo';
                                                             }else{
                                                                 $estado = 'activo';
                                                             }
                                                            ?>
                                                                <td><?php echo $estado?></td>
                                                          <td>         
                                                       <div class="btn-group" role="group" aria-label="Basic example">
                                                           <a href="form-layout.php?id=<?php echo $codigo ?>"><button   value="Actualizar" type="button" class="btn btn-success">Editar</button></a>
                                                            <button type="button" class="btn btn-danger delete_paciente">Eliminar</button>
                                                        </div>
                                                           </td>
                                                    </tr>
                                                            <?php
                                                            }
                                                        }
                                                }
                                                
?>