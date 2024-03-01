<?php
session_start();
session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    include 'db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    // Ejecución de la consulta sin sanitizar entradas
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['usuario'] = $username; 
        header("Location: comments.php");
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
<?php include 'nav.php' ?>
<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Iniciar Sesión">
</form>
