<?php

session_start();

include '../conexion.php';

$correo = $_POST['correo'];
$password = $_POST['contraseña'];

$query = "SELECT * FROM usuarios WHERE correo_electronico = ?";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, 's', $correo);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['contraseña'];
    
    if (password_verify($password, $stored_password)) {
        $_SESSION['usuario'] = $correo;
        switch ($row['rol']) {
            case 'usuario_normal':
                header('location: ../inicio.php');
                break;

            case 'administrador':
                header('location: ../inicio_admin.php');
                break;

            default:
                exit;
        }
    } else {
        echo '
        <script>
            alert("..Correo electrónico o contraseña incorrectos. Por favor, verifique los datos introducidos.");
            window.location = "../login.php";
        </script>
        ';
        exit();
    }
} else {
    echo '
        <script>
            alert(".Correo electrónico o contraseña incorrectos. Por favor, verifique los datos introducidos.");
            window.location = "../login.php";
        </script>
        ';
        exit();
}
?>
