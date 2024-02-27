<?php

use MyApp\data\Database;

require("vendor/autoload.php");
$db = new Database;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="assets/vendor/css/style.css">

</head>

<body>

    <div class="card-1">
        <div id="ventas"></div>
    </div>
    <script>
        function ajax() {
            const http = new XMLHttpRequest();
            const url = '/panaderia/graphics/ganancias-totales/ganancias-meses.php';

            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById('ventas').innerHTML = this.responseText;
                }
            }

            http.open("GET", url);
            http.send();
        }

        ajax();
    </script>


</body>

</html>