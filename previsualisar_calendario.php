<?php 
session_start();
include 'conexion.php';
include 'Verificacion/verificar_sesion.php';


if (isset($_SESSION['date_from'])) {
    $date_from = $_SESSION['date_from'];
    $date_to = $_SESSION['date_to'];
    $selected_days = $_SESSION['selected_days'];
    $eliminar_dias = $_SESSION['eliminar_dias'];
    $custom_days_to_remove = $_SESSION['custom_days_to_remove'];
    $start_times = $_SESSION['start_times'];
    $end_times = $_SESSION['end_times'];
    $intervals = $_SESSION['intervals'];
    $_SESSION['selected_slots'] = json_decode($_POST['selected-slots-json'], true);
    $_SESSION['created_slots'] = json_decode($_POST['created-slots-json'], true);
} else {
    header("Location: agendar_citas.php");
    exit;
}
$selected_slots = isset($_SESSION['selected_slots']) ? $_SESSION['selected_slots'] : [];
$created_slots = isset($_SESSION['created_slots']) ? $_SESSION['created_slots'] : [];

echo "Fecha desde: " . $date_from . "<br>";
echo "Fecha hasta: " . $date_to . "<br>";
echo "Días seleccionados: " . implode(", ", $selected_days) . "<br>";

echo "Eliminar días: " . ($eliminar_dias ? "Sí" : "No") . "<br>";
echo "Días personalizados a eliminar: " . $custom_days_to_remove . "<br>";

echo "Horas eliminadas: ";
foreach ($selected_slots as $day => $slots) {
    echo $day . ": " . implode(", ", $slots) . "<br>";
}
echo "Horas creadas: ";
foreach ($created_slots as $day => $slots) {
    echo $day . ": " . implode(", ", $slots) . "<br>";
}

foreach ($selected_days as $day) {
    echo "Día: " . $day . "<br>";
    if (isset($start_times[$day])) {
        echo "Horarios de inicio: " . implode(", ", $start_times[$day]) . "<br>";
    }
    if (isset($end_times[$day])) {
        echo "Horarios de finalización: " . implode(", ", $end_times[$day]) . "<br>";
    }
    if (isset($intervals[$day])) {
        echo "Intervalos: " . implode(", ", $intervals[$day]) . "<br>";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en" >
<?php include 'encabezado.php'; ?>  
<head>
    <link rel="stylesheet" href="css/calendario.css">
</head>
<body>
<div class="projects-section">
    <div class="calendario-container" id="calendario-container">
        <div class="top-calendar">
            <div class="button-calendar">
                <button id="anterior"><</button>
                <button id="siguiente">></button>
            </div>
            <h2 id="mes-titulo"></h2>
        </div>
        <div id="dias-semana"></div>
        <div id="calendario"></div>
    </div>
</div>

    <script>
        const dateFrom = '<?php echo $date_from; ?>';
        const dateTo = '<?php echo $date_to; ?>';
        const customDaysToRemove = '<?php echo $custom_days_to_remove; ?>';
    </script>
    <script src="js/calendario.js"></script>
</body>
</html>
