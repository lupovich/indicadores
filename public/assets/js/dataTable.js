$(document).ready(function () 
{
    $('#indicadores').DataTable(
        {
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
                render: function(data) 
                {
                    var editar = '<button class="btn btn-info btn-sm" id="editar" data-id="' + data.id + '" data-action="editar"><i class="bi bi-pencil-square"></i></button>';
                    var eliminar = '<button class="btn btn-warning btn-sm" id="eliminar" data-id="' + data.id + '" data-action="eliminar"><i class="bi bi-trash"></i></button>';
                    return editar + eliminar;
                }
            }
        ],
    });
    $('#indicadores').on('click', 'button', function() 
    {
        var id = $(this).attr('data-id');
        var action = $(this).attr('data-action');
        //console.log(action + id);
        crud(action, id);
    });
});


