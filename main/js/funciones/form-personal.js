/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    disablePreloader();

    $("#form-persona").validate({
        lang: "es",
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
        },
        submitHandler: function (form, e) {
            e.preventDefault();
            var data = $("#form-persona").serializeJSON();
            console.log(data);
            $("#request-message").empty();
            $.ajax({
                data: data,
                url: '../controlador/personal.php',
                type: 'post',
                beforeSend: function () {

                    enablePreloader();
                },
                success: function (data) {
                    console.log(data);
                    Limpiar();
                    disablePreloader();
                    Swal.fire({
                        title: "Registro correcto",
                        icon: "success",
                        confirmButtonText: 'ok'
                    });
                },
                error: function (e) {
                    console.log(data);
                    console.log(e.toString());
                    disablePreloader();
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
        $('#form-persona')[0].reset();

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

    function Limpiar()
    {
        $("#foto").val("");
        $("#nombre").val("");
        $("#apellido").val("");
        $("#tipo").val("");
        $("#trabajo").val("");
        $("#estado").val("");

    }


    $(document).on("click", ".delete_personal", function () {
        var id;
        swal({
            title: "Seguro que desea eliminar el registro?",
            text: "Esta acción no podra ser revertida!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $(this).parents("tr").find("td").each(function () {
                    if ($(this).hasClass("id_personal")) {
                        id = $(this).text();
                    }
                });
                console.log(id);
                var formData = new FormData();
                formData.append("accion", "EliminarP");
                formData.append("codigo", id);

                $.ajax({
                    data: formData,
                    url: '../controlador/personal.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (data) {
                        
                        console.log(data);
                        if(data.estado === "success"){
                            window.location.replace("table-personal.php");
                        }else{
                            swal("Se produjo un error", "El personal tiene asignada citas, no es posible eliminarlo", "error");
                        }
                        
                    }, error: function (data) {
                        swal("Se produjo un error", data, "error");
                    }
                });

            } else {
                console.log("No entro");
            }
        });




    });


});