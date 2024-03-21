// Obtener el botón o elemento que abre el modal
var abrirModalBtn = document.getElementById("abrir-modal-btn");

// Agregar un evento click al botón para abrir el modal
abrirModalBtn.addEventListener("click", function () {
  // Obtener el valor seleccionado del select al hacer clic en el botón
  var idVendedor = document.getElementById("vendedorSelect").value;

  // Realizar la petición AJAX para obtener los datos del servidor
  if (idVendedor.length === 1) {
    fetch("mostrar_datos.php", {
      method: "POST",
      body: new URLSearchParams({
        vendedor: idVendedor,
      }),
    })
      .then(function (response) {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error("Error en la respuesta de la solicitud AJAX");
        }
      })
      .then(function (data) {
        // Crear el modal
        var modalContainer = document.createElement("div");
        modalContainer.setAttribute("id", "modal-container");
        modalContainer.innerHTML =
          "<div class='modal-content'>" +
          //boton de X para cerrar modal
          "<span id='cerrar-modal-btn' style='cursor:pointer;float:right;'>&times;</span>" +
          data +
          "</div>";

        // Agregar el modal al body
        document.body.appendChild(modalContainer);

        // Abrir el modal
      })
      .catch(function (error) {
        console.log("Error en la petición AJAX: " + error.message);
      });
  } else {
    //quitar una clase css y poner otra
    document.getElementById("alert").classList.remove("d-none");
    document.getElementById("alert").classList.add("d-block");
  }
});

//cerrar modal
document.addEventListener("click", function (event) {
  if (event.target.id === "modal-container") {
    document.body.removeChild(document.getElementById("modal-container"));
  }
});

document.addEventListener("click", function (event) {
  if (event.target.id === "cerrar-modal-btn") {
    document.body.removeChild(document.getElementById("modal-container"));
  }
});
