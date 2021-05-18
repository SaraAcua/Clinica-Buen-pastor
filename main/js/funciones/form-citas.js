/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {


    disablePreloader();

    $("#form-cita").validate({
        lang: "es",
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
        },
        submitHandler: function (form, e) {
            e.preventDefault();
            var data = $("#form-cita").serializeJSON();
            console.log(data);
            $("#request-message").empty();
            $.ajax({
                data: data,
                url: '../controlador/citas.php',
                type: 'post',
                beforeSend: function () {
                    enablePreloader();
                },
                success: function (data) {
                    console.log(data);
                    //console.log(data.estado);
                    
                        disablePreloader();
                        clearFields();
                        Swal.fire({
                            title: "Se registro correctamente",
                            icon: "success",
                            confirmButtonText: 'ok'
                        });
                    


                },
                error: function (e) {
                    console.log(data);
                    console.log(e.toString());
                    disablePreloader();
                    clearResponseMessage();
                    Swal.fire({
                        title: "Se presento un error",
                        icon: "error",
                        confirmButtonText: 'ok'
                    });
                }
            });
            return false;
        }


    });

    function clearFields() {
        $('#form-cita')[0].reset();

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

    $(document).on("click", ".btnPersonal", function () {
        var personalSeleccionado = new Array();
        var i = 0;

        $(this).parents('tr').find('td').each(function () {
            personalSeleccionado[i] = $(this).html();
            i++;
        });

        $("#txtidPersonal").val(personalSeleccionado[0]);
        $("#txtNombrePersonal").val(personalSeleccionado[1]);
        $.toast({
            heading: 'Personal Seleccionado',
            text: 'Se ha seleccionado correctamente el personal',
            position: 'top-right',
            loaderBg: '#FC7208',
            bgColor: '#14A3E6',
            textColor: 'white',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });
    });



    $(document).on("click", ".btnPaciente", function () {
        var pacienteSeleccionado = new Array();
        var i = 0;

        $(this).parents('tr').find('td').each(function () {
            pacienteSeleccionado[i] = $(this).html();
            i++;
        });

        $("#txtidPaciente").val(pacienteSeleccionado[0]);
        $("#txtNombrePaciente").val(pacienteSeleccionado[1]);
        $.toast({
            heading: 'Paciente Seleccionado',
            text: 'Se ha seleccionado correctamente el paciente',
            position: 'top-right',
            loaderBg: '#FC7208',
            bgColor: '#14A3E6',
            textColor: 'white',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });
    });


});



