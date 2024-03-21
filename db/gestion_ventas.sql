-- Crear la base de datos "gestion_ventas"
CREATE DATABASE gestion_ventas;

-- Usar la base de datos "gestion_ventas"
USE gestion_ventas;


-- Crear la tabla "categorias"
CREATE TABLE categorias (
  id_categoria INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255)
);

-- Crear la tabla "clientes"
CREATE TABLE clientes (
  id_cliente INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  cedula_rif VARCHAR(255) UNIQUE,
  telefono VARCHAR(255),
  direccion VARCHAR(255)
);

-- Crear la tabla "vendedores"
CREATE TABLE vendedores (
  id_vendedor INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255)
);

-- Crear la tabla "productos"
CREATE TABLE productos (
  id_producto INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  id_categoria INT,
  precio DECIMAL(10, 2),
  descuento BOOLEAN,
  impuesto DECIMAL(10, 2) DEFAULT 0.16,
  FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

-- Crear la tabla "ventas"
CREATE TABLE ventas (
  id_venta INT PRIMARY KEY AUTO_INCREMENT,
  id_cliente INT,
  id_vendedor INT,
  fecha DATE,
  subtotal DECIMAL(10, 2),
  impuesto DECIMAL(10, 2),
  total DECIMAL(10, 2),
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_vendedor) REFERENCES vendedores(id_vendedor)
);

-- Crear la tabla "productos_venta"
CREATE TABLE productos_venta (
  id_venta INT,
  id_producto INT,
  cantidad INT,
  subtotal DECIMAL(10, 2),
  FOREIGN KEY (id_venta) REFERENCES ventas(id_venta),
  FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
  PRIMARY KEY (id_venta, id_producto)
);

INSERT INTO `clientes` (`id_cliente`, `nombre`, `cedula_rif`, `telefono`, `direccion`) VALUES
(1, 'prueba', '26779975', '04145768079', 'barrio union');


INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Limpiadores multiusos'),
(2, 'Detergentes'),
(3, 'Desinfectantes'),
(4, 'Abrillantadores'),
(5, 'Lavandería'),
(6, 'Esponjas'),
(7, 'Suavisante'),
(17, 'Limpiadores de cocina');


INSERT INTO `productos` (`id_producto`, `nombre`, `id_categoria`, `precio`, `descuento`) VALUES
(1, 'Limpiador Multiusos', 1, 10.00, 0),
(2, 'Detergente líquido', 2, 8.00, 0),
(3, 'Desinfectante en aerosol', 3, 12.00, 0),
(4, 'Abrillantador para pisos', 4, 10.00, 0),
(5, 'Jabón en polvo', 2, 7.00, 1),
(6, 'Clorox', 3, 2.00, 0),
(7, 'Fabuloso', 1, 10.00, 0),
(8, 'Mr. Clean', 17, 6.00, 0),
(9, 'Ariel', 5, 6.00, 0);

INSERT INTO `vendedores` (`id_vendedor`, `nombre`) VALUES
(1, 'Yovieiker'),
(2, 'Andres');

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_vendedor`, `fecha`, `subtotal`, `impuesto`, `total`) VALUES
(1, 1, 1, '2024-03-21', 528.00, 84.48, 612.48),
(2, 1, 1, '2024-03-21', 100.00, 16.00, 116.00);


INSERT INTO `productos_venta` (`id_venta`, `id_producto`, `cantidad`, `subtotal`) VALUES
(1, 3, 44, 528.00),
(2, 1, 10, 100.00);