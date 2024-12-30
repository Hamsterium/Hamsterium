<?php
$servername = "localhost";
$username = "root";
$password = "9321";
$dbname = "hamsterium";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
