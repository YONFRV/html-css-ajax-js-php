<?php
include ('../configuration/config.php');
// Recibir los datos del formulario
$idUser = $_POST['idUser'];
$fullName = $_POST['fullName'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$email = $_POST['email'];
$twitter= $_POST['twitter'];
$facebook= $_POST['facebok'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$sql = "UPDATE `user` SET `name`='$fullName',`username`='$userName',`password`='$password',`email`='$email',`facebook`='$facebook',`twitter`='$twitter' WHERE  id_user =$idUser";
if ($conexion->query($sql) === TRUE) {
    echo 'uptualizacion exitoso';
} else {
    echo 'Error al actualizar: ' . $conexion->error;
}
$conexion->close();
?>