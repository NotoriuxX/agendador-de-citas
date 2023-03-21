<?php
session_start();
include 'conexion.php';
include 'Verificacion/verificar_sesion.php';


?>
<!DOCTYPE html>
<html lang="en" >
<?php include 'encabezado.php'; ?>  
</html>
<body>
<div class="projects-section">
<div class="timeline">
    <div class="step active">Paso 1: Seleccionar las restriccion de fechas</div>
    <div class="step">Paso 2: Elegir horas</div>
    <div class="step">Paso 3: Configurar otras opciones</div>
    <div class="step">Paso 4: Confirmar y guardar</div>
  </div>
    <div class="proyects-text">
        <h2>Generar calendario de citas</h2>
    </div>
    <div class="proyects-body">
     <form id="date-form" method="post" action="select_hours.php">
                <label for="date-from">Desde:</label>
                <input type="date" id="date-from" name="date-from" />
                <label for="date-to">Hasta:</label>
                <input type="date" id="date-to" name="date-to" />
                <div class="option" style="display: none;">
                    <h3>Seleccionar una opción</h3>
                    <label>
                        <input type="radio" name="option" value="generalizado" /> Días predefinidos
                    </label>
                    <label>
                        <input type="radio" name="option" value="personalizado" /> Personalizado
                    </label>
                </div>
                <div class="generalizado" style="display: none;">
                    <div id="dias-semana-generalizado">
                        <h4>Seleccionar días de la semana</h4>
                        <!-- Agrega el atributo "name" a cada input -->
                        <label><input type="checkbox" name="dias[]" value="lunes"> Lunes</label>
                        <label><input type="checkbox" name="dias[]" value="martes"> Martes</label>
                        <label><input type="checkbox" name="dias[]" value="miercoles"> Miércoles</label>
                        <label><input type="checkbox" name="dias[]" value="jueves"> Jueves</label>
                        <label><input type="checkbox" name="dias[]" value="viernes"> Viernes</label>
                        <label><input type="checkbox" name="dias[]" value="sabado"> Sábado</label>
                        <label><input type="checkbox" name="dias[]" value="domingo"> Domingo</label>
                    </div>
                </div>
                <div class="personalizado" style="display: none;">
                    <div id="dias-semana-personalizado">
                        <h4>Seleccionar días de la semana</h4>
                        <label><input type="checkbox" name="dias[]" value="lunes"> Lunes</label>
                        <label><input type="checkbox" name="dias[]" value="martes"> Martes</label>
                        <label><input type="checkbox" name="dias[]" value="miercoles"> Miércoles</label>
                        <label><input type="checkbox" name="dias[]" value="jueves"> Jueves</label>
                        <label><input type="checkbox" name="dias[]" value="viernes"> Viernes</label>
                        <label><input type="checkbox" name="dias[]" value="sabado"> Sábado</label>
                        <label><input type="checkbox" name="dias[]" value="domingo"> Domingo</label>
                    </div>

                    <h4>Seleccionar días específicos</h4>

                    <label>
                        <input type="checkbox" id="agregar-dias" /> Agregar días
                    </label>
                    <label>
                        <input type="checkbox" id="eliminar-dias" /> Eliminar días
                    </label>
                    <input type="text" id="dias-personalizados-eliminar" name="dias-personalizados-eliminar" placeholder="Seleccione días" style="display: none;" readonly />
                    <input type="text" id="dias-personalizados-agregar" name="dias-personalizados-agregar" placeholder="Seleccione días" style="display: none;" readonly />

                    </div>
                    <button type="submit">Siguiente</button>
                </form>
            </div>
        </div>
</body>


<script src="js/script.js"></script>      
</body>
</html>
