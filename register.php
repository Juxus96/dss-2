<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    // $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    // if ($email && $username && $password) {
    //     try {
    //         $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    //         $stmt->bind_param("sss", $username, $password_hashed, $email);
    //         if ($stmt->execute()) {
    //             echo "Registro exitoso.";
    //         } else {
    //             echo "Error en el registro.";
    //         }
    //     } catch (mysqli_sql_exception $e) {
    //         error_log("Error en la operación de la base de datos: " . $e->getMessage());
    //         echo "Lo sentimos, ocurrió un error inesperado. Por favor, intenta nuevamente más tarde.";
    //     }
    // }else {
    //     echo "Error con los datos proporcionados.";
    // }
    if (mysqli_query($conn, $sql)) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<?php include 'nav.php' ?>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="text" name="email" required><br>
    <input type="submit" value="Registrarse">
</form>
