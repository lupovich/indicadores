// Controlador
<?php
class Api extends CI_Controller {

    public function index()
    {
        // Obtener los datos de la API
        $url = "https://api.example.com";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Devolver los datos en formato JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>

// Vista
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="container">
        <h1>Consumir una API con jQuery y AJAX</h1>
        <div id="content">
            <!-- Aquí se mostrarán los datos de la API -->
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // Hacer la llamada AJAX al controlador Api
            $.ajax({
                url: "<?php echo base_url('api'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data){
                    // Mostrar los datos de la API en el div content
                    $("#content").html(JSON.stringify(data));
                },
                error: function(error){
                    // Mostrar un mensaje de error en caso de fallar la llamada
                    $("#content").html("Error al consumir la API");
                }
            });
        });
    </script>
</body>
</html>