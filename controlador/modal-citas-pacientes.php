
<?php


                                                    $inc =   include '../controlador/confi.php';
                                                if ($inc) {
                                                        $consulta = "SELECT * FROM pacientes";
                                                        $resultado = mysqli_query($con,$consulta);
                                                        if ($resultado) {
                                                                while ($row = $resultado->fetch_array()) {
                                                            $codigo = $row['codigo'];
                                                          
                                                            $nombre= $row['nombre'];
                                                            $apellido = $row['apellido'];
                                                           

                                                            ?>
                                                         <tr>
                                                        <td><?php echo $codigo   ?></td>
                                                         <td><?php echo $nombre   ?></td>
                                                          <td><?php echo $apellido   ?></td>
                                                           
                                                            
                                                         
                                                    </tr>
                                                            <?php
                                                            }
                                                        }
                                                }
                                                
?>