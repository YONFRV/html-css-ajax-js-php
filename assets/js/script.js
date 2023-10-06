document.addEventListener("DOMContentLoaded", function() {
 // Obtener la tabla de usuarios
 const tablaUsuarios = document.getElementById("usuarios");


    // Función para cargar usuarios
    function loadUsers() {
        // Realizar una solicitud AJAX para obtener la lista de usuarios
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "index.php?action=allUsers", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Procesar la respuesta JSON y actualizar la tabla de usuarios
                const usuarios = JSON.parse(xhr.responseText);
                updateTabla(usuarios);
            }
        };
        xhr.send();
    }

    // Función para actualizar la tabla de usuarios
    function updateTabla(usuarios) {
        // Limpiar la tabla
        while (tablaUsuarios.rows.length > 1) {
            tablaUsuarios.deleteRow(1);
        }

        // Llenar la tabla con los datos de usuarios
        usuarios.forEach(function(usuario) {
            const fila = tablaUsuarios.insertRow();
            fila.insertCell(0).textContent = usuario.name;
            fila.insertCell(1).textContent = usuario.nickname;
            fila.insertCell(2).textContent = usuario.email;
            const acciones = fila.insertCell(3);
            acciones.innerHTML = `
                <button onclick="idUserEdit(${usuario.id_user})">Editar</button>
            `;
        });
    }


    // Llamar a la función para cargar usuarios cuando se carga la página
    loadUsers();
});

function idUserEdit(id) {
    // Realizar una solicitud AJAX para obtener los datos del usuario
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `index.php?action=byUserEdit&id=${id}`, true); // Usar id en lugar de $id
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Procesar la respuesta JSON y llenar el formulario de edición
            const usuario = JSON.parse(xhr.responseText);
            const usuarioJSON = JSON.stringify(usuario);
            window.location.href = `../Proyect/views/editUser.php?usuario=${usuario.id_user}`;
        }
    };
    xhr.send();
}