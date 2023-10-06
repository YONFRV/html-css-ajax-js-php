<?php
include ('../configuration/config.php');
if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = $_FILES['imagen']['name'];
    $rutaArchivo = 'C:\xampp\htdocs\Proyect\storage\imageUser\\' .$nombreArchivo;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaArchivo)) {
        // Guarda la URL en la base de datos utilizando MySQL.
        $urlImagen = "\Proyect\storage\imageUser\\".$nombreArchivo; // Reemplaza con la URL real de tu sitio.
        $userId = $_POST['userId'];
        $sql = "UPDATE `user` SET `url_image`=? WHERE  id_user =?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('si', $urlImagen, $userId);
        if ($stmt->execute()) {
            echo json_encode(array('url' => $urlImagen)); // Devuelve la URL de la imagen al cliente.
        } else {
            echo "Error al guardar la URL en la base de datos.";
        }
    } else {
        echo "Error al mover el archivo.";
    }
} else {
    echo "Error al subir la imagen.";
}
?>