<?php
class userModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function allUser() {
        $sql = "SELECT * FROM `user`";
        $result = $this->mysqli->query($sql);
        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }else {
            $response = array("error" => "No se pudieron obtener los datos de usuarios.");
            echo json_encode($response);
        }
        return $users;
    }

    public function byIdUser($usuarioId) {
        $sql = "SELECT * FROM `user` WHERE id_user = $usuarioId";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows > 0) {
                $users = $result->fetch_assoc();
        }else {
            $response = array("error" => "No se pudieron obtener los datos de usuarios.");
            echo json_encode($response);
        }
        return $users;
    }

    
    public function updateUser($dataUserBody) {
        $dataUser = json_decode($dataUserBody);
        $idUser = $dataUser->id;
        $fullName = $dataUser->fullName;
        $userName = $dataUser->userName;
        $password = $dataUser->password;
        $email = $dataUser->email;
        $facebook = $dataUser->facebook;
        $twitter = $dataUser->twitter;
        $sql = "UPDATE `user` SET `name`='$fullName',`username`='$userName',`password`='$password',`email`='$email',`facebook`='$facebook',`twitter`='$twitter' WHERE  id_user =$idUser";
        if ($this->mysqli->query($sql) === TRUE) {
            $sqlSelect = "SELECT * FROM `user` WHERE id_user = $idUser";
            $result = $this->mysqli->query($sql);
            if ($result->num_rows > 0) {
                $users = $result->fetch_assoc();
            }
            echo 'uptualizacion exitoso';
        } else {
            $response = array("error" => "Error al actualizar");
            echo json_encode($response);        }
        return $users;
    }


    public function updateUserImage($uploadedFile, $userId) {
        // Verificar que se haya recibido un archivo válido
        if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
            // Definir la ruta donde se guardará la imagen
            $nombreArchivo = $_FILES['imagen']['name'];
            $rutaArchivo = 'C:\xampp\htdocs\Proyect\uploads\users\\' . $nombreArchivo;
            // Mover el archivo al destino
            if (move_uploaded_file($uploadedFile['tmp_name'], $rutaArchivo)) {
                $urlImagen = "http://localhost/Proyect/uploads/users/" . $nombreArchivo; // Reemplaza con la URL real de tu sitio.
                $sql = "UPDATE `user` SET `url_image`='$urlImagen' WHERE `id_user`='$userId'";
                if ($this->mysqli->query($sql)) {
                    $response = array('url' => $urlImagen);
                    return json_encode($response); 
                } else {
                    echo "Error al guardar la URL en la base de datos.";
                }
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "Error al subir la imagen.";
        }
    }
}