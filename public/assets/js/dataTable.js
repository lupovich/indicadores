$(document).ready(function () {
    $('#indicadores').DataTable({
        processing: true,
        serverSide: true,
        ajax: '././indicadores',
        columns: [
            { data: 'id', defaultContent: '' },
            { data: 'nombreIndicador', defaultContent: '' },
            { data: 'codigoIndicador', defaultContent: '' },
            { data: 'unidadMedidaIndicador', defaultContent: '' },
            { data: 'valorIndicador', defaultContent: '' },
            { data: 'fechaIndicador', defaultContent: '' },
            { 
                data: null,
                render: function(data) {
                    var ver = '<button class="btn btn-info" data-id="' + data.id + '" data-action="ver">Ver</button>';
                    var editar = '<button class="btn btn-warning" data-id="' + data.id + '" data-action="editar">Editar</button>';
                    var eliminar = '<button class="btn btn-danger" data-id="' + data.id + '" data-action="eliminar">Eliminar</button>';
                    return ver + editar + eliminar;
                }
            }
        ],
    });
});