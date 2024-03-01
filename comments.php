<?php
session_start(); // Asegúrate de iniciar la sesión en la parte superior de tu script

?>
<?php include 'nav.php' ?>
<?php
// Incluye la conexión a la base de datos
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['usuario'])) {
    $comment = $_POST['comment'];
    // Insertar comentario directamente sin sanitización
    $sql = "INSERT INTO comments (comment) VALUES ('$comment')";
    mysqli_query($conn, $sql);
}
// Mostrar todos los comentarios
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    echo $row['comment']."<br>"; // Vulnerable a XSS
}
?>
<form method="post">
    Comentario: <textarea name="comment"></textarea><br>
    <input type="submit" value="Enviar">
</form>
