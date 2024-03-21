// Obtener el elemento del campo de nombre
var nombreInput = document.getElementById("nombre_cliente");

// Agregar un evento keydown al campo de nombre para evitar la escritura de números y caracteres especiales
nombreInput.addEventListener("keydown", function (event) {
  var key = event.key;

  if (!/^[a-zA-Z\s]*$/.test(key)) {
    event.preventDefault();
  }
});

var cedulaRifInput = document.getElementById("cedula_rif_cliente");

cedulaRifInput.addEventListener("keydown", function (event) {
  var key = event.key;

  // Verificar si la tecla presionada es una letra
  if (isNaN(parseInt(key)) && key !== "Backspace") {
    event.preventDefault();
  }
});

var telefonoInput = document.getElementById("telefono_cliente");

telefonoInput.addEventListener("keydown", function (event) {
  var key = event.key;

  // Verificar si la tecla presionada es una letra
  if (isNaN(parseInt(key)) && key !== "Backspace") {
    event.preventDefault();
  }
});

var precioInput = document.getElementById("precio_producto");

precioInput.addEventListener("keydown", function (event) {
  var key = event.key;
  var inputValue = this.value;

  // Verificar si se está intentando ingresar el signo de menos como primer carácter
  if (key === "-" && inputValue === "") {
    event.preventDefault();
  }
});

//validar
