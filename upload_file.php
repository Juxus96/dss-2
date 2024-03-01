<?php
session_start(); // Asegúrate de iniciar la sesión en la parte superior de tu script
if (!isset($_SESSION['usuario'])) {
    // Si no hay sesión de usuario, redirige a login.php
    header("Location: login.php");
}
if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . $_POST["fileName"];

    // Intenta mover el archivo subido al directorio de destino
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " ha sido subido.";
    } else {
        echo "Hubo un error subiendo tu archivo.";
    }
}
?>
<?php include 'nav.php' ?>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
  Selecciona un archivo para subir:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input tyep="test" name="fileName" id="fileName">
  <input type="submit" value="Subir Archivo" name="submit">
</form>
