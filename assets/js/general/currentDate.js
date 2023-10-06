function mostrarFechaEnTiempoReal() {
    var elementoFecha = document.getElementById("currenDate");
    var fechaActual = new Date();
    var dia = fechaActual.getDate();
    var mes = fechaActual.toLocaleString('en-US', { month: 'long' });
    var anio = fechaActual.getFullYear();
    var fechaFormateada = dia + ' ' + mes + ' ' + anio;
    elementoFecha.textContent = fechaFormateada;
}

// Llamar a la función para mostrar la fecha al cargar la página
mostrarFechaEnTiempoReal();

// Actualizar la fecha cada segundo
setInterval(mostrarFechaEnTiempoReal, 1000);