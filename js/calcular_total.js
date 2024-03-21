var productos = [];

function agregarProducto() {
  var select = document.querySelector("#productoSelect");
  var selectedOption = select.options[select.selectedIndex];
  var nombreProducto = selectedOption.textContent;
  var idProducto = selectedOption.value;
  var categoriaProducto = selectedOption.getAttribute("data-categoria");
  var precioProducto = parseFloat(selectedOption.getAttribute("data-precio"));
  var cantidadProducto = parseInt(
    document.querySelector('input[name="cantidad_producto"]').value,
    10
  ); // Asegura la conversión a número

  // Verifica que la cantidad sea un número válido y vendedor sea seleccionado
  if (isNaN(cantidadProducto)) {
    document.getElementById("alert").classList.remove("d-none");
    document.getElementById("alert").classList.add("d-block");
  } else {
    var tablaProductos = document.querySelector("#tablaProductos tbody");
    var nuevaFila = document.createElement("tr");

    var celdaProducto = document.createElement("td");
    celdaProducto.textContent = nombreProducto;
    nuevaFila.appendChild(celdaProducto);

    var celdaCategoria = document.createElement("td");
    celdaCategoria.textContent = categoriaProducto;
    nuevaFila.appendChild(celdaCategoria);

    var celdaPrecio = document.createElement("td");
    celdaPrecio.textContent = precioProducto.toFixed(2);
    nuevaFila.appendChild(celdaPrecio);

    var celdaCantidad = document.createElement("td");
    celdaCantidad.textContent = cantidadProducto;
    nuevaFila.appendChild(celdaCantidad);

    tablaProductos.appendChild(nuevaFila);

    // Calcular subtotal
    var subtotalActual = parseFloat(document.querySelector("#subtotal").value);
    var subtotalProducto = precioProducto * cantidadProducto;
    var nuevoSubtotal = subtotalActual + subtotalProducto;
    document.querySelector("#subtotal").value = nuevoSubtotal.toFixed(2);

    // Calcular total
    var totalActual = parseFloat(document.querySelector("#total").value);
    var iva = nuevoSubtotal * 0.16;
    var nuevoTotal = nuevoSubtotal + iva;
    document.querySelector("#total").value = nuevoTotal.toFixed(2);
    document.querySelector("#iva").value = iva.toFixed(2);

    // Agregar un nuevo producto
    var nuevoProducto = {
      id_producto: idProducto,
      cantidad: cantidadProducto,
      subtotal: precioProducto * cantidadProducto,
    };
    productos.push(nuevoProducto);

    document.querySelector("#datos-productos").value =
      JSON.stringify(productos);
  }

  //
}

// Evento click del botón "Agregar Producto"
document
  .querySelector("#agregarProducto")
  .addEventListener("click", function () {
    agregarProducto();
    // agregar array de productos al input hiden
  });

// Actualizar la categoría al seleccionar un producto
document
  .querySelector("#productoSelect")
  .addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex];
    var categoriaProducto = selectedOption.getAttribute("data-categoria");
    document.querySelector("#categoria_producto").value = categoriaProducto;
  });

// Actualizar el precio al seleccionar un producto
document
  .querySelector("#productoSelect")
  .addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex];
    var precioProducto = selectedOption.getAttribute("data-precio");
    document.querySelector("#precio_producto").value = precioProducto;
  });
