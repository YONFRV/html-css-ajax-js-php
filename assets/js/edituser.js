
document.addEventListener("DOMContentLoaded", function() {
    var urlActual = window.location.href;
    var url = new URL(urlActual);
    var idUser = url.searchParams.get('usuario');
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `../index.php?action=byUserEdit&id=${idUser}`, true); // Usar id en lugar de $id
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Procesar la respuesta JSON y llenar el formulario de edición
            const usuario = JSON.parse(xhr.responseText);
            const fullName = document.getElementById("full-name");
            const userName = document.getElementById("user-name");
            const nickname = document.getElementById("nickname");
            const id = document.getElementById("id");
            const image = document.getElementById("image");
            const password = document.getElementById("password");
            const confirmPassword = document.getElementById("confirm-password");
            const emailAddress = document.getElementById("email-address");
            const confirtEmailAddress = document.getElementById("confirt-email-address");
            const facebook = document.getElementById("facebook");
            const x = document.getElementById("x");
            const fullNameInformation = document.getElementById("full-name-information");


            id.value = usuario.id_user;
            fullName.value = usuario.name;
            userName.value = usuario.username;
            password.value = usuario.password;
            image.src = usuario.url_image;
            confirmPassword.value = usuario.password;
            emailAddress.value = usuario.email;
            confirtEmailAddress.value = usuario.email;
            facebook.value = usuario.facebook;
            x.value = usuario.twitter;
            nickname.textContent = usuario.nickname;;
            fullNameInformation.textContent = usuario.name + ' '+usuario.username;
        }
    };
    xhr.send();
});


$(document).ready(function() {
    // Agregar un evento de envío de formulario (si es necesario)
    $("#update-form").submit(function(event) {
        event.preventDefault();
        // Obtener los valores de los campos
        var password = $("#password").val();
        var confirmPassword = $("#confirm-password").val();
        var email = $("#email-address").val();
        var confirmEmail = $("#confirt-email-address").val();
        // Verificar si las contraseñas coinciden
        if (password !== confirmPassword) {
            alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
            return;
        }
     // Verificar si los correos electrónicos coinciden
     if (email !== confirmEmail) {
        alert("Los correos electrónicos no coinciden. Por favor, inténtalo de nuevo.");
        return;
    }

    // Datos del formulario
    var formData = {
        id: $("#id").val(),
        fullName: $("#full-name").val(),
        userName: $("#user-name").val(),
        password: password,
        email: email,
        facebook:$("#facebook").val(),
        twitter:$("#x").val()
    };

// Convertir los datos del formulario a una cadena JSON
var formDataJSON = JSON.stringify(formData);

// Por esta estructura, que utiliza XMLHttpRequest:
const xhr = new XMLHttpRequest();
xhr.open("POST", `../index.php?action=updateUser`, true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
        console.log("Status: " + xhr.status);
        if (xhr.status === 200) {
            // Procesar la respuesta del servidor (puedes mostrar un mensaje de éxito)
            console.log("Respuesta del servidor: " + xhr.responseText);
        } else {
            console.error("Error al enviar los datos del formulario.");
        }
    }
};
xhr.send(formDataJSON);
});
});

function subirImagen() {
    var formData = new FormData();
    formData.append('imagen', document.getElementById('imagen').files[0]);
    const id = document.getElementById("id").value; // Obtén el valor del elemento "id"
    console.log(id);
    formData.append('userId',id);
    if (formData.get('imagen').size > 1048576) {
        alert('La imagen debe ser menor o igual a 1 MB.');
        return;
    }
    $.ajax({
        type: 'POST',
        url: '../index.php?action=updateUserImage',
        data: formData,
        processData: false,  // Evita el procesamiento automático de datos
        contentType: false,  // Evita la configuración automática del tipo de contenido
        success: function(response) {
            // Procesar la respuesta del servidor
            var responseObject = JSON.parse(response);
            alert('Imagen subida con éxito.');
            document.getElementById("image").src = responseObject.url;
        },
        error: function() {
            // Manejar errores
            alert('Error al subir la imagen.');
            location.reload();
        }
    });
}
