function importarIndicadores() 
{    
    var token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJQb3N0dWxhY2lvbmVzSldUU2VydmljZUFjY2Vzc1Rva2VuIiwianRpIjoiZTY5MzM4ODQtNjIyNC00NmMwLTlhMTYtYzNlNzkyOTNhYjgyIiwiaWF0IjoiMy8xNy8yMDIzIDM6Mzc6MjAgQU0iLCJVc2VySWQiOiJJZCIsIkRpc3BsYXlOYW1lIjoiUG9zdHVsYW50ZSAyMDIzMDMiLCJVc2VyTmFtZSI6InJvbXVhbGRvZHVxdWUzbXE0d19idG5AaW5kZWVkZW1haWwuY29tIiwiRW1haWwiOiJyb211YWxkb2R1cXVlM21xNHdfYnRuQGluZGVlZGVtYWlsLmNvbSIsImV4cCI6MTY3OTAzODk0MCwiaXNzIjoiaHR0cHM6Ly9zb2x1dG9yaWEuY2wvIiwiYXVkIjoiSldUU2VydmljZVBvc3R1bGFudGUifQ.2DHW7HUAmuI0oU4lkqjfbpqZz7dvJzKIEh7ll3Gm7jk";

    $.ajax({
        url: "https://postulaciones.solutoria.cl/api/indicadores",
        type: "GET",
        beforeSend: function(xhr) 
        {  
        xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: (data) => {

            console.log(data);

            // Convertir los datos en un array
            var array = [];
            for (var key in data) 
            {
                if (data.hasOwnProperty(key)) 
                {
                    array.push([key, data[key]]);
                }
            }

            const csv = arrayToCSV(array);

            $.post("././importar", { csv: csv }, function (response) 
            {
                alert(response);
            }
        );
        },
            error: function(xhr, status, error) 
        {
            console.error(error);
        }
    });
}

function arrayToCSV(data) 
{
    // Obtener los nombres de las propiedades del primer objeto como cabeceras del CSV
    const headers = Object.keys(data[0]).join(',');

    // Obtener los valores de cada objeto como filas del CSV separadas por comas y saltos de línea 
    const rows = data.map(obj => Object.values(obj).join(',')).join('\n');

    // Retornar el string con formato CSV con las cabeceras y las filas 
    return headers + '\n' + rows;
}