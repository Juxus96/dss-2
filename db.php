<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dss";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequear conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
