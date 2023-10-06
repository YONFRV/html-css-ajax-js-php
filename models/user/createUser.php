<?php
include ('../configuration/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario.
    $nickname = $_POST["nickname"];
    $fullName = $_POST["fullName"];
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $emailAddress = $_POST["email"];
    $facebook = $_POST["facebook"];
    $twitter = $_POST["twitter"];

      if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['imagen']['name'];
        $rutaArchivo = 'C:\xampp\htdocs\Proyect\storage\imageUser\\' .$nombreArchivo;
    
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaArchivo)) {
            // Guarda la URL en la base de datos utilizando MySQL.
            $urlImagen = "\Proyect\storage\imageUser\\".$nombreArchivo; // Reemplaza con la URL real de tu sitio.
            $sql = "INSERT INTO `user`( `nickname`, `name`, `username`, `password`, `email`, `url_image`, `facebook`, `twitter`) VALUES ('$nickname','$fullName ','$userName','$password','$emailAddress','$rutaArchivo','$facebook','$twitter');";
            if ($conexion->query($sql) === TRUE) {
                echo 'user creado exitoso';
            } else {
                echo 'Error al creado: ' . $conexion->error;
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
$conexion->close();
?>