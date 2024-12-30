<?php
// Incluye el archivo de conexión a la base de datos
include 'db_connection.php';

// Función para actualizar la puntuación de un usuario
function actualizarPuntuacion($user_id, $new_score) {
    global $conn;
    $sql = "UPDATE rankings SET score = $new_score WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "Puntuación actualizada correctamente";
    } else {
        echo "Error actualizando la puntuación: " . $conn->error;
    }
    $conn->close();
}

// Ejemplo de cómo llamar a la función
$user_id = 1; // Id del usuario que está jugando
$new_score = 100; // Nueva puntuación obtenida por el usuario
actualizarPuntuacion($user_id, $new_score);
?>
