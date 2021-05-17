<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <title>Clinica buen pastor - Easy to Customize Bootstrap 4 Admin Template</title>
        <!-- Bootstrap Core CSS -->
        <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        <!-- This page CSS -->
        <!-- chartist CSS -->
        <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
        <!--c3 CSS -->
        <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
        <!--Toaster Popup message CSS -->
        <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- Dashboard 1 Page CSS -->
        <link href="css/pages/dashboard1.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="css/colors/default.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <?php
    include '../controlador/confi.php';
    session_start();

    if (isset($_SESSION['Usuario']) ) {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];

            $sql = "SELECT  * FROM pacientes WHERE codigo='$codigo'";

            if (!$result = mysqli_query($con, $sql))
                die();

            $pacientes = array(); //creamos un array

            while ($row = $result->fetch_assoc()) {
                $codigo = $row['codigo'];
                $foto = $row['foto'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $fecha_nacimiento = $row['fecha_nacimiento'];
                $edad = $row['edad'];
                $direccion = $row['direccion'];
                $barrio = $row['barrio'];
                $telefono = $row['telefono'];
                $ciudad = $row['ciudad'];
                $estado = $row['estado'];
            }
        }
    } else {
        header('Location: index.php');
    }
    ?>

    <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Clinica Buen Pastor</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <?php include './Include/header.php'; ?>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <?php
            include 'Include/sidebar_admin.php';
            ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3 class="text-themecolor">Resgistrar paciente</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Resgistrar paciente</li>
                            </ol>
                        </div>
                        <div class="col-md-7 align-self-center text-right d-none d-md-block">
                            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Crear nuevo</button>
                        </div>
                        <div class="">
                            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Formulario de registro</h4>
                            </div>
                            <div class="card-body">
                                <form id="form-paciente" action="#">
                                    <div class="form-body">
                                        <h3 class="card-title">Informacion del paciente</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <?php if (!isset($_GET["id"])) { ?>
                                                <div class="col-md-12 justified-content-center align-content-center">
                                                    <img id="Img_Paciente" src="../assets/images/users/user_blanco.png"  height="140" width="140" alt="Imagen Usuario">
                                                    <div style="margin-top: 3%">
                                                        <input type="file" id="btn_Subir_Imagen" required  class="form-control-file" accept="image/*" />
                                                        <input id="txtimg64" name="foto" required  type="hidden"/>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <?php if (!empty($foto)) { ?>
                                                    <div class="col-md-12 justified-content-center align-content-center">
                                                        <img id="Img_Paciente" src="<?php echo $foto; ?>"  height="140" width="140" alt="Imagen Usuario">
                                                        <div style="margin-top: 3%">
                                                            <input type="file" id="btn_Subir_Imagen" class="form-control-file" accept="image/*" />
                                                            <input id="txtimg64" value="<?php echo $foto; ?>" name="foto" type="hidden"/>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-md-12 justified-content-center align-content-center">
                                                        <img id="Img_Paciente" height="140" width="140" alt="Imagen Usuario">
                                                        <div style="margin-top: 3%">
                                                            <input type="file" id="btn_Subir_Imagen" class="form-control-file" accept="image/*" />
                                                            <input id="txtimg64"  name="foto" type="hidden"/>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                            <!--/span-->
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                    <?php if (isset($_GET["id"])) { ?>
                                                    <input type="hidden"  name="codigo" required  value="<?php echo $_GET["id"]; ?>">
                                                    <?php } ?>

                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="text" id="nombre" value="<?php echo $nombre; ?>" required   name="nombre" class="form-control" placeholder="nombre">
                                                    <?php } else { ?>
                                                        <input type="text" id="nombre" name="nombre" class="form-control" required  placeholder="nombre">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <label class="control-label" >Apellido</label>

                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="text" id="apellido" name="apellido" required  value="<?php echo $apellido; ?>" class="form-control" placeholder="apellido">
                                                    <?php } else { ?>
                                                        <input type="text" id="apellido" name="apellido"  class="form-control" required  placeholder="apellido">
                                                    <?php } ?>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha nacimiento</label>

                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="date"  required  name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" class="form-control" placeholder="dd/mm/yyyy">
                                                    <?php } else { ?>
                                                        <input type="date"   name="fecha_nacimiento" class="form-control" required  placeholder="dd/mm/yyyy">
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="inputZip">Edad</label>

                                                <?php if (isset($_GET["id"])) { ?>
                                                    <input type="number" name="edad" required  value="<?php echo $edad; ?>" min="0" max="150" class="form-control" id="edad">
                                                <?php } else { ?>
                                                    <input type="number" required  name="edad" min="0" max="150" class="form-control" id="edad">
                                                <?php } ?>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Estado</label>
                                                    <?php if (!isset($_GET["id"])) { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="1" type="radio" name="estado" id="flexRadioDefault1" checked="">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Activo
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="0" type="radio" name="estado" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Inactivo
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="form-check">
                                                            <?php if (intval($estado) == 1) { ?>
                                                                <input class="form-check-input" value="1" type="radio" name="estado" id="flexRadioDefault1" checked="">
                                                            <?php } else { ?>
                                                                <input class="form-check-input" value="1" type="radio" name="estado" id="flexRadioDefault1">
                                                            <?php } ?>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Activo
                                                            </label>
                                                        </div>
                                                        <div class="form-check">

                                                            <?php if (intval($estado) == 0) { ?>
                                                                <input class="form-check-input" value="0" type="radio" name="estado" id="flexRadioDefault2" checked="">
                                                            <?php } else { ?>
                                                                <input class="form-check-input" value="0" type="radio" name="estado" id="flexRadioDefault2">
                                                            <?php } ?>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Inactivo
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <!--/span-->
                                            </div>
                                            <!--/row-->

                                            <!--/row-->

                                            <!--/span-->

                                            <!--/span-->
                                        </div>
                                        <!--/row-->

                                        <h3 class="box-title m-t-40">Datos de residencia</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Direccion</label>
                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="text" id="direccion" required  name="direccion" value="<?php echo $direccion; ?>" class="form-control">
                                                    <?php } else { ?>
                                                        <input type="text" id="direccion" required name="direccion" class="form-control">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Barrio</label>
                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="text" id="barrio" required  value="<?php echo $barrio; ?>" name="barrio" class="form-control">|
                                                    <?php } else { ?>
                                                        <input type="text" id="barrio" required  name="barrio" class="form-control">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="text" id="telefono" required  value="<?php echo $telefono; ?>" name="telefono" class="form-control">
                                                    <?php } else { ?>
                                                        <input type="text" id="telefono" required name="telefono" class="form-control">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">

                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ciudad</label>
                                                    <?php if (!isset($_GET["id"])) { ?>
                                                        <select id="ciudad" name="ciudad" class="form-control custom-select">
                                                            <option>--Seleccione--</option>
                                                            <option>Bogota</option>
                                                            <option>Valledupar</option>
                                                            <option>Barranquilla</option>
                                                        </select>
                                                    <?php } else { ?>
                                                        <select id="ciudad" name="ciudad" class="form-control custom-select">

                                                            <?php if ($ciudad === "Bogota") { ?>
                                                                <option>--Seleccione--</option>
                                                                <option value="Bogota" selected="">Bogota</option>
                                                                <option value="Valledupar">Valledupar</option>
                                                                <option value="Barranquilla">Barranquilla</option>
                                                            <?php } else if ($ciudad === "Valledupar") { ?>
                                                                <option>--Seleccione--</option>
                                                                <option value="Bogota">Bogota</option>
                                                                <option value="Valledupar" selected="">Valledupar</option>
                                                                <option value="Barranquilla">Barranquilla</option>
                                                            <?php } else if ($ciudad === "Barranquilla") { ?>
                                                                <option>--Seleccione--</option>
                                                                <option value="Bogota">Bogota</option>
                                                                <option value="Valledupar">Valledupar</option>
                                                                <option value="Barranquilla" selected="">Barranquilla</option>
                                                            <?php } else { ?>
                                                                <option selected="">--Seleccione--</option>
                                                                <option value="Bogota">Bogota</option>
                                                                <option value="Valledupar">Valledupar</option>
                                                                <option value="Barranquilla">Barranquilla</option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <?php if (!isset($_GET["id"])) { ?>
                                            <input hidden="" name="accion" value="Registrar">
                                            <button type="submit"  class="btn btn-success"  ><img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> <i class="fa fa-check"></i> Registrar</button>
                                        <?php } else { ?>
                                            <input hidden="" name="accion" value="Actualizar">
                                            <button type="submit"   class="btn btn-success"  ><img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> <i class="fa fa-check"></i> Actualizar</button>
                                        <?php } ?> 
                                        <a href="dashboard.php"><button type="button" class="btn btn-inverse">Cancel</button></a> 
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <!-- Row -->









                    <!-- Row -->
                    <!-- Row -->


                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->

                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <?php include './Include/footer.php'; ?>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="../assets/node_modules/jquery/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="../assets/node_modules/bootstrap/js/popper.min.js"></script>
            <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="../assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
            <!--Wave Effects -->
            <script src="js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="js/sidebarmenu.js"></script>
            <!--stickey kit -->
            <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
            <!--Custom JavaScript -->
            <script src="js/custom.min.js"></script>
            <!-- ============================================================== -->
            <!-- Style switcher -->
            <!-- ============================================================== -->
            <script src="../assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="js/jquery.validate.js"></script>
            <script src="js/localization/messages_es.min.js"></script>
            <script src="js/jquery.serializejson.js"></script>

            <script>
                var filesSelected = document.getElementById("btn_Subir_Imagen").files;
                $("#btn_Subir_Imagen").change(function () {
                    var filesSelected = document.getElementById("btn_Subir_Imagen").files;
                    if (filesSelected.length > 0) {
                        var fileToLoad = filesSelected[0];
                        var fileReader = new FileReader();
                        fileReader.onload = function (fileLoadedEvent) {
                            var base64value = fileLoadedEvent.target.result;
                            // console.log(base64value);
                            $("#txtimg64").val(base64value);
                        };
                        fileReader.readAsDataURL(fileToLoad);
                    }
                });
            </script>
            <script>
                $(function () {
                    $('#btn_Subir_Imagen').change(function (e) {
                        addImage(e);
                    });
                    function addImage(e) {
                        var file = e.target.files[0],
                                imageType = /image.*/;
                        if (!file.type.match(imageType))
                            return;
                        var reader = new FileReader();
                        reader.onload = fileOnload;
                        reader.readAsDataURL(file);
                    }

                    function fileOnload(e) {
                        var result = e.target.result;
                        $('#Img_Paciente').attr("src", result);
                    }

                    $("#btn_Subir_Imagen").change(function () {
                        var filesSelected = document.getElementById("btn_Subir_Imagen").files;
                        if (filesSelected.length > 0) {
                            var fileToLoad = filesSelected[0];
                            var fileReader = new FileReader();
                            fileReader.onload = function (fileLoadedEvent) {
                                var base64value = fileLoadedEvent.target.result;
                                $("#txtimg64").val(base64value);
                            };
                            fileReader.readAsDataURL(fileToLoad);
                        }

                    });
                });
            </script>
            <script src="js/funciones/form-paciente.js"></script>
    </body>

</html>