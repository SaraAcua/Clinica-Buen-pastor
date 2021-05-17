/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

   /* console.log("documento");
    $("#botoningresar").click(function(){
        console.log("click");
        var username = $.trim($("#user").val());
        var password = $.trim($("#password").val());
       

        if( username != "" && password !="" ){
            console.log("entro");
            $.ajax({
                url:'controlador/validaruser.php',
                type:'post',
               
                data:{
                    username:username,
                    password:password
                  
                },
                success:function(response){
                window.location="dashboard.php";
                
                }
            });
        }
    });*/

    disablePreloader();

    $('#loginform').validate({
        lang: "es",
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
        },
        submitHandler: function (form, e) {
            e.preventDefault();
            var data = $("#loginform").serializeJSON();
            console.log(data);
            $("#request-message").empty();
            $.ajax({
                data: data,
                url: '../controlador/validaruser.php',
                type: 'post',
                beforeSend: function () {
                    enablePreloader();
                },
                success: function (data) {
                    console.log(data);
                    //console.log(data.estado);
                   if (data.estado === "success") {
                        disablePreloader();
                       // console.log("Todo ok");
                         window.location.replace("dashboard.php");
                    } else {
                        disablePreloader();
                        clearResponseMessage();
                        $("#request-message").append("<div style='text-aling:center;margin-top:2%' class='alert alert-danger col-lg-12 col-sm-12' role='alert'>" + data.mensaje + "</div>");
                    }
                },
                error: function (e) {
                    console.log(data);
                    console.log(e.toString());
                    disablePreloader();
                    clearResponseMessage();
                    $("#request-message").append("<div style='text-aling:center;margin-top:2%' class='alert alert-danger col-lg-12 col-sm-12' role='alert'>" + data.mensaje + "</div>");
                }
            });
            return false;
        }


    });

    function clearFields() {
        $('#loginform')[0].reset();

    }

    function enablePreloader() {
        $("#imgLoaderPass").show();
    }

    function disablePreloader() {
        $("#imgLoaderPass").hide();
    }

    function clearResponseMessage() {
        $("#request-message").empty();
    }




});