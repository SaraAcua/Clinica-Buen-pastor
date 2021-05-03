
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
        <title>Clinica - Easy to Customize Bootstrap 4 Admin Template</title>
        <!-- Bootstrap Core CSS -->
        <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- page css -->
        <link href="css/pages/login-register-lock.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <style>
            .my-error-class {
                color:#FF0000;  /* red */
                font-size: 12px;
            }

            .my-valid-class {
                color:#00cc33; /* Green */
                font-size: 18px;
            }x
        </style>
        <!-- You can change the theme colors from here -->
        <link href="css/colors/default.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body class="card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Clinica buen pastor</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <section id="wrapper">
            <div class="login-register" style="background-image:url(../assets/images/background/stethoscope-frame-with-copy-space.jpg);">
                <div class="login-box card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" id="loginform" action="index.php">
                            <h3 class="box-title m-b-20 text-center" style="color: #037682;font-size: 28px;font-weight: bold">Bienvenido</h3>
                            <div class="row justify-content-center align-content-center mb-2">
                                <img src="../assets/images/Tertiary Teaching CLINIC.png"/>
                            </div>
                            <div class="row" id="request-message">

                            </div>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" minlength="3" maxlength="20" name="usuario" type="text" required="" placeholder="Username"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" minlength="4" name="clave" maxlength="20" required="" placeholder="Password"> </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-info pull-left p-t-0">
                                        <input id="checkbox-signup" type="checkbox" class="filled-in chk-col-light-blue">
                                        <label for="checkbox-signup"> Remember me </label>
                                    </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button style="background-color: #20AEE3;color: white;font-weight: bolder" class="btn btn-block btn-lg  btn-rounded" type="submit" id="botoningresar"> <img id="imgLoaderPass" src="../assets/images/spinner/Loader_BK_SVG.svg" alt="x"  width="28" height="18" /> Ingresar</button>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                    <div class="social">
                                        <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                        <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-12 text-center">
                                    Don't have an account? <a href="pages-register.html" class="text-info m-l-5"><b>Sign Up</b></a>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="recoverform" action="index.php">
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <h3>Recover Password</h3>
                                    <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" placeholder="Email"> </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="to-form" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
        <script src="js/jquery.validate.js"></script>
        <script src="js/localization/messages_es.min.js"></script>
        <script src="js/jquery.serializejson.js"></script>
        <script src="js/funciones/login.js"></script>
        <!--Custom JavaScript -->
        <script type="text/javascript">
            $(function () {
                $(".preloader").fadeOut();
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
            // ============================================================== 
            // Login and Recover Password 
            // ============================================================== 
            $('#to-recover').on("click", function () {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });

            $('#to-form').on("click", function () {
                $("#recoverform").slideUp();
                $("#loginform").fadeIn();
            });
        </script>

    </body>

</html>