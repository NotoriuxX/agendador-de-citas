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


function calculate_time_slots($start_time, $end_time, $interval) {
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    $interval = new DateInterval("PT" . $interval . "M");
    $slots = [];

    // Comprueba si el horario de finalización es al día siguiente
    if ($start > $end) {
        $end->add(new DateInterval("P1D"));
    }

    for ($time = $start; $time < $end; $time->add($interval)) {
        $slots[] = $time->format('H:i');
    }

    return $slots;
}
function sort_time_asc($a, $b) {
    $time_a = strtotime($a);
    $time_b = strtotime($b);
    
    return $time_a - $time_b;
}






echo "Fecha desde: " . $date_from . "<br>";
echo "Fecha hasta: " . $date_to . "<br>";
echo "Días seleccionados: " . implode(", ", $selected_days) . "<br>";

echo "Eliminar días: " . ($eliminar_dias ? "Sí" : "No") . "<br>";
echo "Días personalizados a eliminar: " . $custom_days_to_remove . "<br>";

foreach ($selected_days as $day) {
    echo "Día: " . $day . "<br>";
    echo "Horarios de inicio: " . implode(", ", $start_times[$day]) . "<br>";
    echo "Horarios de finalización: " . implode(", ", $end_times[$day]) . "<br>";
    echo "Intervalos: " . implode(", ", $intervals[$day]) . "<br>";
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
<div class="projects-section">
<div class="timeline">
        <div class="step ">Paso 1: Seleccionar Días</div>
        <div class="step ">Paso 2: Elegir ranco horas</div>
        <div class="step active">Paso 3: Previsualizar Horas</div>
        <div class="step">Paso 4: Confirmar y guardar</div>
</div>

    <div class="custom-container">
        
    <div class="custom-container-top">
        <div class="toggle-delete-container">
            <input type="checkbox" id="toggle-delete-mode">
            <label for="toggle-delete-mode">Eliminar horas</label>
        </div>
        <div class="custom-container-top-buttom">
            <strong>Horas eliminadas:</strong>
            <div class="hours-removed-container">
                <span id="selected-slots"></span>
            </div>
        </div>
    </div>

        
        <?php foreach ($selected_days as $day): ?>
        <div class="container-hors">
            <div class="day">
                <h4 class="btn btn-link" type="button" aria-controls="<?php echo 'collapse-' . $day; ?>"><?php echo $day; ?></h4>
            </div>
            <div class="hors">

                <?php
                $all_slots = [];
                for ($i = 0; $i < count($start_times[$day]); $i++) {
                    $slots = calculate_time_slots($start_times[$day][$i], $end_times[$day][$i], $intervals[$day][$i]);
                    $all_slots = array_merge($all_slots, $slots);
                }
                usort($all_slots, 'sort_time_asc');
                foreach ($all_slots as $slot) {
                    echo '<input type="checkbox" class="slot-checkbox" data-day="' . $day . '" value="' . $slot . '" hidden>';
                    echo '<span class="slot-label" data-day="' . $day . '">' . $slot . '</span> ';
                }
                
                
                ?>

            </div>
        </div>
        <?php endforeach; ?>
        <div class="navigation-buttons">
        <button type="submit" class="btn btn-back" >Atrás</button>
        <button type="submit" class="btn btn-next">Siguiente</button>
      </div>
        
    </div>
</div>


<script src="js/script.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/es.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</body>
</html>
