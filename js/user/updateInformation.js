$(document).ready(function() {
    $("#update-form").submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de manera tradicional
        // Obtener los valores de los campos
        var password = $("#password").val();
        var confirmPassword = $("#confirm-password").val();
        var email = $("#email-address").val();
        var confirmEmail = $("#confirt-email-address").val();
    // Obtiene el ID del usuario desde la URL
    var urlParams = new URLSearchParams(window.location.search);
    var usuarioId = urlParams.get('id');

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
            idUser: usuarioId,
            fullName: $("#full-name").val(),
            userName: $("#user-name").val(),
            password: password,
            email: email,
            facebok:$("#facebook").val(),
            twitter:$("#x").val()
        };

        // Realizar la solicitud AJAX para enviar los datos
        $.ajax({
            url: "include/user/updateUser.php",
            type: "POST",
            data: formData,
            success: function(response) {
                // Procesar la respuesta del servidor (puedes mostrar un mensaje de éxito)
                alert(response);
            },
            error: function() {
                alert("Error al enviar los datos del formulario.");
            }
        });
    });
});