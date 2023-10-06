$(document).ready(function() {
    $("#create-form").submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de manera tradicional
        // Obtener los valores de los campos
        var password = $("#password").val();
        var confirmPassword = $("#confirm-password").val();
        var email = $("#email-address").val();
        var confirmEmail = $("#confirt-email-address").val();
        // Crea un objeto FormData para recopilar los datos del formulario.
        var formData = new FormData(this);

        // Agrega la imagen seleccionada al objeto FormData.
        formData.append('imagen', $('#imagen')[0].files[0]);

        if (formData.get('imagen').size > 1048576) {
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
        // Agrega los datos del formulario al objeto FormData
        formData.append('nickname', $("#nickname").val());
        formData.append('fullName', $("#full-name").val());
        formData.append('userName', $("#user-name").val());
        formData.append('password', password);
        formData.append('email', email);
        formData.append('facebook', $("#facebook").val());
        formData.append('twitter', $("#x").val());
        // Realizar la solicitud AJAX para enviar los datos
        $.ajax({
            url: "../include/user/createUser.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
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