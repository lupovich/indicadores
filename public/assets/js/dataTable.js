$(document).ready(function () {
    $('#indicadores').DataTable({
        processing: true,
        serverSide: true,
        ajax: '././indicadores',
        columns: [
            { data: 'id' },
            { data: 'nombreIndicador' },
            { data: 'codigoIndicador' },
            { data: 'unidadMedidaIndicador' },
            { data: 'valorIndicador' },
            { data: 'fechaIndicador' },
        ],
    });
});