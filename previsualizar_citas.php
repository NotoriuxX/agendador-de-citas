<?php
session_start();
include 'conexion.php';
include 'Verificacion/verificar_sesion.php';


if (isset($_POST['date-from'])) {
    $date_from = $_POST['date-from'];
    $date_to = $_POST['date-to'];
    $selected_days = isset($_POST['dias']) ? explode(',', $_POST['dias']) : [];

    $eliminar_dias = isset($_POST['eliminar-dias']);
    $custom_days_to_remove = isset($_POST['dias-personalizados-eliminar']) ? $_POST['dias-personalizados-eliminar'] : '';
} else {
    header("Location: agendar_citas.php");
    exit;
}

$start_times = $_POST['start_time'];
$end_times = $_POST['end_time'];
$intervals = $_POST['interval'];
var_dump($_POST);
echo "Fecha desde: " . $date_from . "<br>";
echo "Fecha hasta: " . $date_to . "<br>";
echo "Días seleccionados: " . implode(", ", $selected_days) . "<br>";

echo "Eliminar días: " . ($eliminar_dias ? "Sí" : "No") . "<br>";
echo "Días personalizados a eliminar: " . $custom_days_to_remove . "<br>";

foreach ($selected_days as $day) {
    echo "Día: " . $day . "<br>";
    echo "Horarios de inicio: " . $start_times[$day] . "<br>";
    echo "Horarios de finalización: " . $end_times[$day] . "<br>";
    echo "Intervalos: " . $intervals[$day] . "<br>";
    echo "<br>";
}



?>



<!DOCTYPE html>
<html lang="en" >
<?php include 'encabezado.php'; ?>  
<head>
  <link rel="stylesheet" href="css/custom-bootstrap.css">
  
</head>
<body>



<script src="js/script.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/es.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</body>
</html>
