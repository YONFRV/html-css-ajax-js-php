<?php
include ('../configuration/config.php');
$usuarioId = $_GET['id'];
$sql = "SELECT * FROM `user` WHERE id_user = $usuarioId";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
        // Obtiene los datos del usuario como un array asociativo
        $row = $result->fetch_assoc();
    // Establece el encabezado JSON
    header('Content-Type: application/json');

    // Devuelve los datos del usuario en formato JSON
    echo json_encode($row);
} else {
   // Establece el encabezado JSON
   header('Content-Type: application/json');

   // Devuelve un mensaje de error en formato JSON
   echo json_encode(array("error" => "Usuario no encontrado."));
}
// Cierra la conexión a la base de datos
$conexion->close();
?>