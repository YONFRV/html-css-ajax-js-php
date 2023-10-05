function subirImagen() {
    var formData = new FormData();
    formData.append('imagen', document.getElementById('imagen').files[0]);
    var urlParams = new URLSearchParams(window.location.search);
    var usuarioId = urlParams.get('id');
    formData.append('userId',usuarioId);
    if (formData.get('imagen').size > 1048576) {
        alert('La imagen debe ser menor o igual a 1 MB.');
        return;
    }
    $.ajax({
        url: 'include/image/updateImage.php', // Reemplaza esto con la URL de tu servidor donde procesarás la imagen.
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            alert('Imagen subida con éxito.');
            location.reload();
            // Aquí puedes manejar la respuesta del servidor, que debe contener la URL de la imagen en la base de datos.
        },
        error: function() {
            alert('Error al subir la imagen.');
        }
    });
}