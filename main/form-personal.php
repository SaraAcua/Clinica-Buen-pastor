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

    if (isset($_SESSION['Usuario']) && $_SESSION['Usuario'] === "admin") {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];

            $sql = "SELECT  * FROM personal WHERE codigo='$codigo'";

            if (!$result = mysqli_query($con, $sql))
                die();

            $pacientes = array(); //creamos un array

            while ($row = $result->fetch_assoc()) {
                $codigo = $row['codigo'];
                $foto = $row['foto'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $tipo = $row['tipo'];
                $estado = $row['estado'];
                $trabajando = $row['trabajando'];
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

                <?php
                include './Include/header.php';
                ?>

                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="icon-Magnifi-Glass2"></i></a>
                                <form class="app-search">
                                    <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Bell"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Notifications</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Mail"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title">You have 4 new messages</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- mega menu -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- End mega menu -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Language -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                                <div class="dropdown-menu dropdown-menu-right animated bounceInDown"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->

                        </ul>
                    </div>
                </nav>
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
                            <h3 class="text-themecolor">Resgistrar personal</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Registrar personal</li>
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
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="m-b-0 text-white">Formulario de registro</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-persona" action="#">
                                        <div class="form-body">
                                            <h3 class="card-title">Informacion del personal</h3>
                                            <hr>
                                            <div class="row p-t-20">
                                                 <?php if (!isset($_GET["id"])) { ?>
                                                <div class="col-md-12 justified-content-center align-content-center">
                                                    <img id="Img_Personal" src="../assets/images/users/user_blanco.png"  height="140" width="140" alt="Imagen Usuario">
                                                    <div style="margin-top: 3%">
                                                        <input type="file" id="btn_Subir_Imagen" class="form-control-file" accept="image/*" />
                                                        <input id="txtimg64" name="foto" type="hidden"/>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <?php if (!empty($foto)) { ?>
                                                    <div class="col-md-12 justified-content-center align-content-center">
                                                        <img id="Img_Personal"  src="<?php echo $foto; ?>"  height="140" width="140" alt="Imagen Usuario">
                                                        <div style="margin-top: 3%">
                                                            <input type="file" id="btn_Subir_Imagen" class="form-control-file" accept="image/*" />
                                                            <input id="txtimg64" value="<?php echo $foto; ?>" name="foto" type="hidden"/>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-md-12 justified-content-center align-content-center">
                                                        <img id="Img_Personal" height="140" width="140" alt="Imagen Usuario">
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
                                                    <input type="hidden"  name="codigo" value="<?php echo $_GET["id"]; ?>">
                                                    <?php } ?>

                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="text" id="nombre" value="<?php echo $nombre; ?>" required  name="nombre" class="form-control" placeholder="nombre">
                                                    <?php } else { ?>
                                                        <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="nombre">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                                <!--/span-->
                                                <!--/span-->
                                                <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <label class="control-label" >Apellido</label>

                                                    <?php if (isset($_GET["id"])) { ?>
                                                    <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required class="form-control" placeholder="apellido">
                                                    <?php } else { ?>
                                                        <input type="text" id="apellido" name="apellido"  class="form-control" required placeholder="apellido">
                                                    <?php } ?>
                                                </div>
                                            </div>




                                                  <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <?php if (!isset($_GET["id"])) { ?>
                                                        <select id="tipo" name="tipo" required class="form-control custom-select">
                                                            <option value="">--Seleccione--</option>
                                                            <option>Enfermera</option>
                                                            <option>Medico</option>
                                                            <option>Fisioterapeuta</option>
                                                        </select>
                                                    <?php } else { ?>
                                                        <select id="tipo" name="tipo" required class="form-control custom-select">

                                                            <?php if ($tipo === "Enfermera") { ?>
                                                                <option value="">--Seleccione--</option>
                                                                <option value="Enfermera" selected="">Enfermera</option>
                                                                <option value="Medico">Medico</option>
                                                                <option value="Fisioterapeuta">Fisioterapeuta</option>
                                                            <?php } else if ($tipo === "Medico") { ?>
                                                               <option>--Seleccione--</option>
                                                                <option value="Enfermera" >Enfermera</option>
                                                                <option value="Medico" selected="">Medico</option>
                                                                <option value="Fisioterapeuta">Fisioterapeuta</option>
                                                            <?php } else if ($tipo === "Fisioterapeuta") { ?>
                                                              <option>--Seleccione--</option>
                                                                <option value="Enfermera" >Enfermera</option>
                                                                <option value="Medico" >Medico</option>
                                                                <option value="Fisioterapeuta" selected="">Fisioterapeuta</option>
                                                            <?php } else { ?>
                                                                <option selected="">--Seleccione--</option>
                                                                <option value="Enfermera" >Enfermera</option>
                                                                <option value="Medico" >Medico</option>
                                                                <option value="Fisioterapeuta" selected="">Fisioterapeuta</option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>
                                            </div>


                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                    <label class="control-label">Trabajando</label>
                                                    <?php if (!isset($_GET["id"])) { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="1" type="radio" name="trabajando" id="flexRadioDefault1" checked="">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                En servicio
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="0" type="radio" name="trabajando" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Libre
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="form-check">
                                                            <?php if (intval($trabajando) == 1) { ?>
                                                                <input class="form-check-input" value="1" type="radio" name="trabajando" id="flexRadioDefault1" checked="">
                                                            <?php } else { ?>
                                                                <input class="form-check-input" value="1" type="radio" name="trabajando" id="flexRadioDefault1">
                                                            <?php } ?>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                En servicio
                                                            </label>
                                                        </div>
                                                        <div class="form-check">

                                                            <?php if (intval($trabajando) == 0) { ?>
                                                                <input class="form-check-input" value="0" type="radio" name="trabajando" id="flexRadioDefault2" checked="">
                                                            <?php } else { ?>
                                                                <input class="form-check-input" value="0" type="radio" name="trabajando" id="flexRadioDefault2">
                                                            <?php } ?>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Libre
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                    <!--/span-->
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

                                                <!--/span-->
                                            </div>
                                            <!--/row-->

                                            <!--/row-->

                                            <!--/span-->

                                            <!--/span-->
                                        </div>

                                        <!--/row-->




                                </div>
                                <div class="form-actions">
                                    <?php if (!isset($_GET["id"])) { ?>
                                        <input hidden="" name="accion" value="RegistrarP">
                                        <button type="submit"  class="btn btn-success"  ><img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> <i class="fa fa-check"></i> Registrar</button>
                                    <?php } else { ?>
                                        <input hidden="" name="accion" value="ActualizarP">
                                        <button type="submit"   class="btn btn-success"  ><img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> <i class="fa fa-check"></i> Actualizar</button>
                                    <?php } ?> 
                                    <a href="dashboard.php"><button type="button" class="btn btn-inverse">Cancel</button></a> 
                                </div>
                                </form>
                            </div>
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
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme working">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
    </div>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                $('#Img_Personal').attr("src", result);
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
    <script src="js/funciones/form-personal.js"></script>
</body>

</html>