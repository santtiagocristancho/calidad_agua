<?php

include_once('conexion.php');
include_once('funciones.php');

$muestraa1 = $_POST['muestra1'];
$muestraa2 = $_POST['muestra2'];
$muestraa3 = $_POST['muestra3'];
$muestraa4 = $_POST['muestra4'];

if (!isset($_POST['id'])) { 
    $query = "INSERT INTO calidad (muestra1,muestra2, muestra3, muestra4) VALUES($muestraa1, $muestraa2, $muestraa3, $muestraa4)";
} else {
    $query = "UPDATE calidad SET muestra1 = {$muestraa1}, muestra2 = {$muestraa2}, muestra3 = {$muestraa3}, muestra4 = {$muestraa4} WHERE id = {$_POST['id']}";
}

$result = mysqli_query($con, $query);

$muestras = [$_POST['muestra1'], $_POST['muestra2'], $_POST['muestra3'], $_POST['muestra4']];

$promedio       = promedio($muestras);
$maximo         = max($muestras);
$minimo         = min($muestras);

$riesgoPromedio = evaluarRiesgo($promedio);
$riesgoMaximo   = evaluarRiesgo($maximo);
$riesgoMinimo   = evaluarRiesgo($minimo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="style.css">
    <title>Calidad de Agua</title>
</head>

<body class="mt-3">
    <div class="container9">
        <div class="row">
            <div class="col">
                <h2 class="pb-2 border-bottom">Resultados de la medición de calidad del agua</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="">El promedio del nivel de la calidad de Agua: <span class="badge rounded-pill text-bg-primary"><?php echo $promedio ?></span> y su nivel de riesgo es: <?php echo $riesgoPromedio ?></p>
                <p class="">El nivel de riesgo de calidad más alto es: <span class="badge rounded-pill text-bg-primary"><?php echo $maximo ?></span> y su nivel de riesgo es: <?php echo $riesgoMaximo ?> </span></p>
                <p class="">El nivel de riesgo de calidad más bajo es: <span class="badge rounded-pill text-bg-primary"><?php echo $minimo ?></span> y su nivel de riesgo es: <?php echo $riesgoMinimo ?> </span></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="./" class="btn btn-sm btn-outline-primary">Regresar</a>
            </div>
        </div>
    </div>
</body>

</html>