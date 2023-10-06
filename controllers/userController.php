<?php
require_once "models/user/userModel.php";

class userController {
    private $model;

    public function __construct() {
        require_once "config/database.php";
        $this->model = new userModel($conexion);
    }

    public function allUsers() {
        $usuarios = $this->model->allUser();
        header('Content-Type: application/json');
        echo json_encode($usuarios);
    }

    public function byIdUsersEdit($id) {
        $usuario = $this->model->byIdUser($id);
        header('Content-Type: application/json');
        echo json_encode($usuario);
    }
    public function updateUser($data) {
        // Obtener los datos del usuario
        $usuario = $this->model->updateUser($data);
        header('Content-Type: application/json');
        echo json_encode($usuario);
    }
    public function updateUserImage($uploadedFile,$userId) {
        // Obtener los datos del usuario
        error_log("Si llego aqui al controlador");
        $usuario = $this->model->updateUserImage($uploadedFile,$userId);
        header('Content-Type: application/json');
        echo json_encode($usuario);
    }
}
?>
