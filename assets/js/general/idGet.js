        // Función para obtener el valor del parámetro "id" de la URL
        function getParameterByName(name) {
            var url = new URL(window.location.href);
            return url.searchParams.get(name);
        }

        // Obtener el valor del parámetro "id" de la URL
        var usuarioId = getParameterByName("id");
        console.log("ID del usuario: " + usuarioId);

        // Almacenar el valor del ID en una variable global
        window.usuarioIdGlobal = usuarioId;