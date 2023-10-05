$(document).ready(function() {
    $("#create-form").submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de manera tradicional
        // Obtener los valores de los campos
        var password = $("#password").val();
        var confirmPassword = $("#confirm-password").val();
        var email = $("#email-address").val();
        var confirmEmail = $("#confirt-email-address").val();
        if ($("#email-address")formData.get('imagen').size > 1048576) {
            alert('La imagen debe ser menor o igual a 1 MB.');
            return;
        }
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
            imagen:document.getElementById('imagen').files[0],
            nickname: $("#nickname").val(),
            fullName: $("#full-name").val(),
            userName: $("#user-name").val(),
            password: password,
            email: email,
            facebok:$("#facebook").val(),
            twitter:$("#x").val()
        };

        // Realizar la solicitud AJAX para enviar los datos
        $.ajax({
            url: "include/user/createUser.php",
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