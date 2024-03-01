<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirección si el usuario no está logueado
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? $_SESSION['usuario'];
    $contrasena_actual = $_POST['current_password'];
    $nueva_contrasena = $_POST['new_password'];
    
    // Verificar la contraseña actual
    $sql = "SELECT password FROM users WHERE username = '$usuario'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && $row['password'] == $contrasena_actual) { // Considera hashear las contraseñas
        // Actualizar con la nueva contraseña
        $sql = "UPDATE users SET password = '$nueva_contrasena' WHERE username = '$usuario'";
        if (mysqli_query($conn, $sql)) {
            echo "Contraseña actualizada con éxito.";
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        echo "La contraseña actual no es correcta.";
    }
}
?>
<?php include 'nav.php' ?>
<form method="post">
    Contraseña actual: <input type="password" name="current_password"><br>
    Nueva contraseña: <input type="password" name="new_password"><br>
    <input type="submit" value="Cambiar contraseña">
</form>
