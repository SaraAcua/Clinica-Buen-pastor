
$(document).ready(function () {
    listadopacientes();
});


function  listadopacientes() {
    
    
    $("#tablapacientes").DataTable({
        "ajax": {
            "url": '../controlador/list-paciente.php',
            dataSrc: ''
        },
        columnDefs: [{
                "targets": 0,
                "data": 'foto',
                "render": function (data, type, row, meta) {
                    return '<img src="' + data + '" alt="' + data + '"height="64" width="64"/>';
                }
            }
        ],
        "columns": [
            {"data": "foto"},
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "fecha Nac"},
            {"data": "edad"},
            {"data": "direccion"},
            {"data": "barrio"},
            {"data": "telefono"},
            {"data": "ciudad"},
            {"data": "estado"},
            {
                data: null,
                render: function (data, type, row) {
                    return '<button data-id=' + row.Id + ' onclick="BuscarPaciente()" class="btn btn-edit btn-success">Editar</button>';
                }
            }, {
                data: null,
                render: function (data, type, row) {
                    return '<button data-id=' + row.Id + '  onclick="EliminarPaciente()" class="bn btn-del btn-danger">Eliminar</button>';
                }
            }
        ], language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
        }, retrieve: true,
        paging: false
    });
}