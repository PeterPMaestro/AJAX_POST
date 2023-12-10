

// POST


var formulario = document.getElementById("formulario");

formulario.addEventListener('submit', function(e){
   e.preventDefault(); //evitamos que envíe los datos por el navegador por defecto.
   var datos = new FormData(formulario);
   
                        // Enviamos los datos del formularios
   fetch('gestor.php', {
      method: 'POST',
      body: datos
   })                   //recibimos el paquete de respuesta.
   .then(function(response) {
      if(response.ok) {
          return response.json()
      } else {
          throw "Error en la llamada Ajax";
      }
   })                   //extraemos los datos.
   .then(function(data) {
           
         document.getElementById('mensaje').innerHTML = data; 
   })
   .catch(function(err) {
      console.log(err);
   }); 
})
