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
        <!-- toast CSS -->
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

    if (isset($_SESSION['Usuario'])) {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];

            $sql = "select c.*,(select p.nombre from pacientes p where p.codigo = c.idpaciente) as nombrePaciente,(select p.apellido from pacientes p where p.codigo = c.idpaciente) as apellidoPaciente,(select per.nombre from personal per where per.codigo = c.idpersonal) as nombrePersonal,(select per.apellido from personal per where per.codigo = c.idpersonal) as apellidoPersonal,(select per.tipo from personal per where per.codigo = c.idpersonal) as tipoPersonal, c.id as idCita, c.fecha as fechaCita, c.estado as estadoCita  from citas c where c.id = " . $_GET['id'];

            if (!$result = mysqli_query($con, $sql))
                die();

            $pacientes = array(); //creamos un array

            while ($row = $result->fetch_assoc()) {
                $idCita = $row['idCita'];
                $idPaciente = $row['idpaciente'];
                $idPersonal = $row['idpersonal'];
                $nombrePersonal = $row['nombrePersonal'] . ' ' . $row['apellidoPersonal'];
                $tipo = $row['tipoPersonal'];
                $nombrePaciente = $row['nombrePaciente'] . ' ' . $row['apellidoPaciente'];
                $fechaCita = $row['fechaCita'];
                $estadoCita = $row['estadoCita'];
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
                        <a class="navbar-brand" href="index.html">
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
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                                    <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
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
                                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
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
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
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
                            <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-Box-Close"></i></a>
                                <div class="dropdown-menu animated bounceInDown">
                                    <ul class="mega-dropdown-menu row">
                                        <li class="col-lg-3 col-xlg-2 m-b-30">
                                            <h4 class="m-b-20">CAROUSEL</h4>
                                            <!-- CAROUSEL -->
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <div class="container"> <img class="d-block img-fluid" src="../assets/images/big/img1.jpg" alt="First slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img2.jpg" alt="Second slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img3.jpg" alt="Third slide"></div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                            </div>
                                            <!-- End CAROUSEL -->
                                        </li>
                                        <li class="col-lg-3 m-b-30">
                                            <h4 class="m-b-20">ACCORDION</h4>
                                            <!-- Accordian -->
                                            <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Collapsible Group Item #1
                                                            </a>
                                                        </h5> </div>
                                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Collapsible Group Item #2
                                                            </a>
                                                        </h5> </div>
                                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                Collapsible Group Item #3
                                                            </a>
                                                        </h5> </div>
                                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-lg-3  m-b-30">
                                            <h4 class="m-b-20">CONTACT US</h4>
                                            <!-- Contact -->
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Enter email"> </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </form>
                                        </li>
                                        <li class="col-lg-3 col-xlg-4 m-b-30">
                                            <h4 class="m-b-20">List style</h4>
                                            <!-- List style -->
                                            <ul class="list-style-none">
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
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
                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <ul class="dropdown-user">
                                        <li>
                                            <div class="dw-user-box">
                                                <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                                <div class="u-text">
                                                    <h4>Steave Jobs</h4>
                                                    <p class="text-muted">varun@gmail.com</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                            </div>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
           
            <!-- ============================================================== -->
            <!-- End Topbar header -->
               <?php
            if ($_SESSION['Rol'] == "admin") {
                include './Include/sidebar_admin.php';
            } else {
                include './Include/sidebar_personal.php';
            }
            ?>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
          
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
                            <h3 class="text-themecolor">Agendar cita</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Agendar cita</li>
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
                                    <form id="form-cita" action="#">
                                        <div class="form-body">
                                            <h3 class="card-title">Informacion de la cita</h3>
                                            <hr>
                                            <div class="row p-t-20">
                                                <div class="col-md-6">
                                                    <label >Personal</label>
                                                    <?php if (isset($_GET["id"])) { ?>
                                                        <input type="hidden"  name="id" value="<?php echo $_GET["id"]; ?>">
                                                    <?php } ?>

                                                    <?php if (isset($_GET["id"])) { ?>   
                                                        <div class="input-group mb-3">
                                                            <input readonly=""  type="text" disabled="5" value="<?php echo $nombrePersonal ?>" id="txtNombrePersonal" class="form-control" placeholder="Personal" aria-label="" aria-describedby="basic-addon1">
                                                            <input class="form-control" value="<?php echo $idPersonal ?>"  name="id_Personal"  type="hidden" id="txtidPersonal">
                                                            <div class="input-group-append">
                                                                <button class="btn" disabled="" style="background-color: #14A3E7;color: #ffffff" data-toggle="modal" data-toggle="modal" data-target="#ModalSeleccionarPersonal" type="button">Seleccionar personal</button>
                                                            </div>
                                                        </div>

                                                    <?php } else { ?>
                                                        <div class="input-group mb-3">
                                                            <input readonly=""  type="text" disabled="5"  id="txtNombrePersonal" class="form-control" placeholder="Personal" aria-label="" aria-describedby="basic-addon1">
                                                            <input class="form-control"   name="id_Personal"  type="hidden" id="txtidPersonal">
                                                            <div class="input-group-append">
                                                                <button class="btn" style="background-color: #14A3E7;color: #ffffff" data-toggle="modal" data-toggle="modal" data-target="#ModalSeleccionarPersonal" type="button">Seleccionar personal</button>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <label >Paciente</label>
                                                    <?php if (isset($_GET["id"])) { ?>

                                                        <div class="input-group mb-3">
                                                            <input type="text" required value="<?php echo $nombrePaciente ?>" disabled="5" id="txtNombrePaciente" class="form-control" placeholder="Paciente" aria-label="" aria-describedby="basic-addon1">
                                                            <input class="form-control" value="<?php echo $idPaciente ?>" required  name="id_Paciente" type="hidden" id="txtidPaciente">
                                                            <div class="input-group-append">
                                                                <button disabled=""  required class="btn" style="background-color: #14A3E7;color: #ffffff" data-toggle="modal" data-toggle="modal" data-target="#ModalSeleccionarPaciente" type="button">Seleccionar paciente</button>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="input-group mb-3">
                                                            <input readonly="" type="text" required  disabled="5" id="txtNombrePaciente" class="form-control" placeholder="Paciente" aria-label="" aria-describedby="basic-addon1">
                                                            <input class="form-control" required  name="id_Paciente" type="hidden" id="txtidPaciente">
                                                            <div class="input-group-append">
                                                                <button required class="btn" style="background-color: #14A3E7;color: #ffffff" data-toggle="modal" data-toggle="modal" data-target="#ModalSeleccionarPaciente" type="button">Seleccionar paciente</button>
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">

                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha de cita</label>

                                                        <?php if (isset($_GET["id"])) { ?>
                                                            <input type="date" required readonly=""   name="fecha" value="<?php echo $fechaCita; ?>" class="form-control">
                                                        <?php } else { ?>
                                                            <input type="date"   required   name="fecha" class="form-control" placeholder="dd/mm/yyyy">
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
                                                        <label>Estado</label>
                                                        <?php if (!isset($_GET["id"])) { ?>
                                                            <select id="estado" name="estado" required class="form-control custom-select">
                                                                <option value="">--Seleccione--</option>
                                                                <option>Atendido</option>
                                                                <option>En Servicio</option>
                                                                <option>No Atendido</option>
                                                                <option>Asignado</option>
                                                                <option>Anulada</option>
                                                            </select>
                                                        <?php } else { ?>
                                                            <select id="estado" name="estado" required class="form-control custom-select">

                                                                <?php if ($estado === "Atendido") { ?>
                                                                    <option value="">--Seleccione--</option>
                                                                    <option value="Atendido" selected="">Atendido</option>
                                                                    <option value="En servicio">En Servicio</option>
                                                                    <option value="No Atendido">No Atendido</option>
                                                                    <option value="Asignado">Asignado</option>
                                                                    <option value="Anulada">Anulada</option>
                                                                <?php } else if ($estado === "En Servicio") { ?>
                                                                    <option value="">--Seleccione--</option>
                                                                    <option value="Atendido"  >Atendido</option>
                                                                    <option selected="">En Servicio</option>
                                                                    <option value="No Atendido">No Atendido</option>
                                                                    <option value="Asignado">Asignado</option>
                                                                    <option value="Anulada">Anulada</option>
                                                                <?php } else if ($estado === "No Atendido") { ?>
                                                                    <option    value="">--Seleccione--</option>
                                                                    <option value="No Atendido">Atendido</option>
                                                                    <option value="En servicio">En Servicio</option>
                                                                    <option value="No Atendido" selected="">No Atendido</option>
                                                                    <option value="Asignado">Asignado</option>
                                                                    <option value="Anulada">Anulada</option>
                                                                <?php } else if ($estado === "Asignado") { ?>
                                                                    <option   value="">--Seleccione--</option>
                                                                    <option value="Atendido">Atendido</option>
                                                                    <option value="En servicio">En Servicio</option>
                                                                    <option value="No Atendido">No Atendido</option>
                                                                    <option value="Asignado" selected="">Asignado</option>
                                                                    <option value="Anulada">Anulada</option>
                                                                <?php } else { ?>
                                                                    <option  value="">--Seleccione--</option>
                                                                    <option value="Atendido">Atendido</option>
                                                                    <option value="En servicio">En Servicio</option>
                                                                    <option value="No Atendido">No Atendido</option>
                                                                    <option value="Asignado" >Asignado</option>
                                                                    <option value="Anulada" selected="">Anulada</option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->


                                        <!--/row-->

                                </div>
                                <div class="form-actions">
                                    <?php if (!isset($_GET["id"])) { ?>
                                        <input hidden="" name="accion" value="RegistrarC">
                                        <button type="submit"  class="btn btn-success"  ><img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> <i class="fa fa-check"></i> Registrar</button>
                                    <?php } else { ?>
                                        <input hidden="" name="accion" value="ActualizarC">
                                        <button type="submit"   class="btn btn-success"  ><img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> <i class="fa fa-check"></i> Actualizar</button>
                                    <?php } ?> 
                                    <a href="dashboard.php"><button type="button" class="btn btn-inverse">Cancel</button></a> 
                                </div>
                                </form>


                                <div class="modal fade bd-example-modal-xl" id="ModalSeleccionarPaciente" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Seleccione el Paciente</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center"><h4 style="font-weight: bold;color: #34338E">Lista de Pacientes</h4></div>
                                                <div class="table-responsive-xl">
                                                    <table style="width: 100%" id="Tabla-pacientes"class="table table">
                                                        <thead>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">ID</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Nombre</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Apellido</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Seleccionar</th>
                                                        </thead>
                                                        <tbody id="Cuerpo_Tabla_Color_Modal">
                                                            <?php
                                                            include '../controlador/modal-citas-pacientes.php';
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg" id="ModalSeleccionarPersonal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Seleccione el personal</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center"><h4 style="font-weight: bold;color: #34338E">Lista de Personal</h4></div>
                                                <div class="table-responsive-lg">
                                                    <table style="width: 100%" id="Tabla-Color"class="table table">
                                                        <thead>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">ID</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Nombre</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Tipo</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Estado</th>
                                                        <th style="background-color: #14A3E7;font-weight: bolder;color: white;text-align: center;border: white solid 1px;font-size:18px">Seleccionar</th>
                                                        </thead>
                                                        <tbody id="Cuerpo_Tabla_personal_Modal">
                                                            <?php
                                                            include '../controlador/modal-citas-personal.php';
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
            <?php
            include './Include/footer.php';
            ?>
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
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="js/toastr.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/localization/messages_es.min.js"></script>
    <script src="js/jquery.serializejson.js"></script>
    <script src="js/funciones/form-citas.js"></script>
</body>

</html>