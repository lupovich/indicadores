var action;
var id;
$('#indicadoresForm').on('submit', function(e) 
    {
        e.preventDefault(); 
        //console.log("Ok")
        if (action == null && id == null) {
          action = 'guardar';
        }
        crud(action, id);
    }
);
function crud(action, id) {
    if (action == 'editar') {
        $.ajax({
            url: '././indicador/' + id,
            type: 'GET',
            dataType: 'json',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function(data) 
            {
                $('#nombreIndicador').val(data.nombreIndicador);
                $('#codigoIndicador').val(data.codigoIndicador);
                $('#unidadMedidaIndicador').val(data.unidadMedidaIndicador);
                $('#valorIndicador').val(data.valorIndicador);
                var fechaString = data.fechaIndicador; 
                var fecha = Date.parse(fechaString); 
                if (!isNaN(fecha)) 
                { 
                    var fechaDate = new Date(fecha); 
                    var fechaFormateada = fechaDate.toISOString().split('T')[0]; 
                    $('#fechaIndicador').val(fechaFormateada); 
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });

    } else if (action == 'guardar') {
        // Obtener los valores de los campos del formulario
        var nombre = $('#nombreIndicador').val();
        var codigo = $('#codigoIndicador').val();
        var unidad = $('#unidadMedidaIndicador').val();
        var valor = $('#valorIndicador').val();
        var fecha = $('#fechaIndicador').val();
        var data = {
          nombreIndicador: nombre,
          codigoIndicador: codigo,
          unidadMedidaIndicador: unidad,
          valorIndicador: valor,
          fechaIndicador: fecha
        };
        $.ajax({
          url: '././indicador',
          type: 'POST', 
          data: data,
          dataType: 'json',
          headers: {'X-Requested-With': 'XMLHttpRequest'},
          success: function(response) {
            alert('Datos guardados correctamente');
            location.reload();
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
        });
    } else if (action == 'eliminar') {
        $.ajax({
            url: '././indicador/' + id,
            type: 'DELETE',
            dataType: 'json',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            beforeSend: function() {
                var result = confirm("¿Estás seguro que quieres eliminar este registro?");
                if (result) {
                    return true;
                } else {
                    return false;
                }
            },
            success: function(data) 
            {
                alert("El registro se ha eliminado correctamente");
                location.reload();
            },
            error: function(xhr, status, error) {
                 console.log(xhr.responseText);
             }
         });
     }
}