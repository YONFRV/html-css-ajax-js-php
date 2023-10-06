  fetch('sections/menu.html')
    .then(response => response.text())
    .then(data => {
      document.getElementById('menu').innerHTML = data;
    });

    document.addEventListener("DOMContentLoaded", function() {
      const contenido = document.getElementById("contenido");
  
      function cargarPagina(pagina) {
          fetch(pagina + '.html')
              .then(response => response.text())
              .then(data => {
                  contenido.innerHTML = data;
              })
              .catch(error => {
                  console.error('Error al cargar la página:', error);
              });
      }
  
      document.getElementById("create-user").addEventListener("click", function(event) {
          event.preventDefault();
          console.log("ingrelso")
          cargarPagina('sections/createUser');
      });
      
      document.getElementById("index").addEventListener("click", function(event) {
        event.preventDefault();
        cargarPagina('sections/allUser');
    });

  });
