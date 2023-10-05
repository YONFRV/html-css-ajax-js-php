$(document).ready(function() {
    // Obtiene el ID del usuario desde la URL
    var urlParams = new URLSearchParams(window.location.search);
    var usuarioId = urlParams.get('id');
    // Realiza una solicitud Ajax para obtener los datos del usuario
    $.ajax({
        url: "include/user/byUser.php",
        type: "GET",
        dataType: 'json',
        data: { id: usuarioId },
        success: function(data) {
            // Rellena los marcadores de posición con los datos del usuario
            $("#full-name").text(data.name+ ' '+ data.username);
            $("#nickname").text(data.nickname);
            $("#image").attr("src", data.url_image);
            $("#full-name").val(data.name);
            $("#user-name").val(data.username);
            $("#password").val(data.password);
            $("#confirm-password").val(data.password);
            $("#email-address").val(data.email);
            $("#confirt-email-address").val(data.email);
            $("#facebook").val(data.facebook);
            $("#x").val(data.twitter);
        },
        error: function() {
            alert("Error al obtener los datos del usuario.");
        }
    });
});