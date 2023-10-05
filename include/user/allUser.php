<?php
include ('../configuration/config.php');
$sql = "SELECT * FROM `user`";
$result = $conexion->query($sql);
$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
$conexion->close();
header('Content-Type: application/json');
echo json_encode($users);
?>