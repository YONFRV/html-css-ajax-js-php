<?php
require_once "controllers/userController.php";

$controller = new userController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'allUsers':
            $controller->allUsers();
            break;
        case 'byUserEdit':
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->byIdUsersEdit($id);
            }
            break;   
        case 'updateUser':
            $data = file_get_contents("php://input");
            if ($data) {
                $controller->updateUser($data);
            }
        break;  
        case 'updateUserImage':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {

                    $uploadedFile = $_FILES['imagen'];
                    $userId = $_POST['userId']; // Si userId se envía como parte del formulario
                    $controller->updateUserImage($uploadedFile,$userId);
                }
        break;  
        // Agrega casos para crear, actualizar y eliminar usuarios
        default:
            // Maneja casos no válidos
    }
} else {
    // Carga la vista principal aquí
    require_once "views/index.php";
}
?>
