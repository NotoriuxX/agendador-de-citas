<?php
    include '../conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo_electronico = $_POST['correo_electronico'];
    $celular = "+569" . $_POST['celular'];
    $password = $_POST['password'];

    // Cifrar la contraseña antes de insertarla en la base de datos
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Establecer el rol como 'usuario_normal' para nuevos registros
    $rol = 'usuario_normal';

    $query = "INSERT INTO usuarios(nombres, apellidos, correo_electronico, celular, contraseña, rol) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $nombre, $apellido, $correo_electronico, $celular, $password_hash, $rol);

    // Verifica si el correo electrónico ya existe
    $verificar_correo = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico'");
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
            <script>
                alert("Este correo ya existe");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }

    // Verifica si el celular ya existe
    $verificar_celular = mysqli_query($conn, "SELECT * FROM usuarios WHERE celular = '$celular'");
    if (mysqli_num_rows($verificar_celular) > 0) {
        echo '
        <script>
            alert("Este celular ya está registrado, intente con otro");
            window.location = "../login.php";
        </script>
        ';
        exit();
    }

    // Ejecuta la inserción de datos
    $ejecutar = mysqli_stmt_execute($stmt);
    if ($ejecutar) {
        echo '
        <script>
            alert("Usuario registrado exitosamente");
            window.location = "../login.php";
        </script>
        ';
    } else {
        echo '
        <script>
            alert("Inténtelo nuevamente");
            window.location = "../login.php";
        </script>
        ';
    }

    mysqli_close($conn);
?>
