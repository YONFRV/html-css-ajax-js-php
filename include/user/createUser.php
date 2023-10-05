<?php
include ('../configuration/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario.
    $nickname = $_POST["nickname"];
    $fullName = $_POST["full-name"];
    $userName = $_POST["user-name"];
    $password = $_POST["password"];
    $emailAddress = $_POST["email-address"];
    $facebook = $_POST["facebook"];
    $x = $_POST["x"];

    // Realiza las validaciones aquí (por ejemplo, contraseña igual, campos no vacíos, etc.).

    // Sube la imagen al servidor.
    $imagenNombre = $_FILES["imagen"]["name"];
    $imagenTmp = $_FILES["imagen"]["tmp_name"];
    $imagenRuta = "ruta/donde/guardar/imagenes/" . $imagenNombre; // Reemplaza con la ruta donde desees guardar la imagen.

    if (move_uploaded_file($imagenTmp, $imagenRuta)) {
        // Conéctate a tu base de datos MySQL y realiza la inserción de los datos.
        $conexion = new mysqli('localhost', 'usuario', 'contraseña', 'basededatos'); // Reemplaza con tus propios valores.

        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }

        $sql = "INSERT INTO `user`( `nickname`, `name`, `username`, `password`, `email`, `url_image`, `facebook`, `twitter`) VALUES ('$nickname','$fullName ','$userName','$password','$email','$rutaArchivo','$facebook','$twitter');";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ssssssss', $nickname, $fullName, $userName, $password, $emailAddress, $facebook, $x, $imagenRuta);

        if ($stmt->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error en el registro: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo "Error al subir la imagen.";
    }
}
?>