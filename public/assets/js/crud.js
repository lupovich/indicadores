function crud(action, id) {
    if (action == 'ver' || action == 'editar') {
        $.ajax({
            url: 'indicador/get/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#nombreIndicador').val(data.nombreIndicador);
                $('#codigoIndicador').val(data.codigoIndicador);
                $('#unidadMedidaIndicador').val(data.unidadMedidaIndicador);
                $('#valorIndicador').val(data.valorIndicador);
                $('#fechaIndicador').val(data.fechaIndicador);

                if (action == 'ver') {
                    // Deshabilitar los campos del formulario
                    $('input').prop('disabled', true);
                    // Cambiar el texto del botón a Actualizar
                    $('button[type="submit"]').text('Actualizar');
                } else {
                    // Habilitar los campos del formulario
                    $('input').prop('disabled', false);
                    // Cambiar el texto del botón a Guardar
                    $('button[type="submit"]').text('Guardar');
                }
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    } else if (action == 'eliminar') {
        $.ajax({
            url: 'indicador/delete/' + id,
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                var result = confirm("¿Estás seguro que quieres eliminar este registro?");
                if (result) {
                    return true;
                } else {
                    return false;
                }
            },
            success: function(data) {
                // Mostrar un mensaje de éxito al usuario
                alert("El registro se ha eliminado correctamente");
                // Recargar la tabla para reflejar los cambios
                location.reload();
            },
            error: function(xhr, status, error) {
                 // Mostrar el mensaje de error que viene del servidor
                 alert(xhr.responseText);
             }
         });
     }
}