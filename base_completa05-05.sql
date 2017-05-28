-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para deliverydb
CREATE DATABASE IF NOT EXISTS `deliverydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `deliverydb`;

-- Volcando estructura para tabla deliverydb.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(45) DEFAULT NULL,
  `cat_descripcion` text,
  `cat_idEstado` int(11) DEFAULT NULL,
  `cat_imagen` varchar(120) DEFAULT NULL,
  `cat_idEstadoVisible` int(11) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.categoria: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT IGNORE INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_idEstado`, `cat_imagen`, `cat_idEstadoVisible`) VALUES
	(1, 'Hamburguesas', 'hamburguesas', 1, 'bugger.jpg', 1),
	(2, 'Empanadas', 'empanada', 1, 'empanadas-1.jpg', 1),
	(3, 'Pizzas a la piedra', 'pizzas', 1, 'pizza.jpg', 1),
	(5, 'Calzones', 'calzones', 1, 'calzone.jpg', 1),
	(6, 'Ensaladas', 'Ensaladas', 1, 'salad.jpg', 1),
	(7, 'Promociones', 'Promociones Varias', 2, 'promosposta.png', 2),
	(8, 'Pizzas Rellenas', 'PIzzas rellenas', 1, 'pizzarellena1.JPG', 1),
	(9, 'Lomos', 'Lomos', 2, '', 2),
	(10, 'Empanadas Gourmet', 'empanadas gourmet', 2, '', 2),
	(11, 'Gaseosas', 'gaseosas', 2, '', 2),
	(12, 'Vinos Tintos', 'vinos tintos', 2, '', 2),
	(13, 'Cervezas', 'cervezas', 2, '', 2),
	(14, 'Sándwichs y al Plato', 'Sándwichs y al Plato', 2, '', 2);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.componente
CREATE TABLE IF NOT EXISTS `componente` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_precio` float NOT NULL,
  `com_idEstado` int(11) NOT NULL,
  `com_nombre` varchar(45) DEFAULT NULL,
  `com_descripcion` text,
  `com_imagen` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.componente: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `componente` DISABLE KEYS */;
INSERT IGNORE INTO `componente` (`com_id`, `com_precio`, `com_idEstado`, `com_nombre`, `com_descripcion`, `com_imagen`) VALUES
	(1, 10, 1, 'Papas Fritas', 'papas fritas', 'papasfritas.jpg'),
	(2, 10, 1, 'ensaladas', 'ensaladas', NULL),
	(3, 10, 1, 'ensaladas mixta', 'ensaladas', NULL),
	(4, 10, 1, 'Huevo', 'ensaladas', NULL),
	(5, 10, 1, 'AJo', 'ensaladas', NULL),
	(6, 10, 1, 'Anchoas', 'ensaladas', NULL),
	(7, 10, 1, 'Morrones', 'ensaladas', NULL),
	(8, 10, 1, 'Cebolla', 'ensaladas', NULL),
	(9, 10, 1, 'Jamon', 'ensaladas', NULL),
	(10, 10, 1, 'Tomates', 'ensaladas', NULL),
	(11, 10, 1, 'Calabresa', 'ensaladas', NULL),
	(12, 10, 1, 'Roquefort', 'ensaladas', NULL),
	(13, 10, 1, 'Anana', 'ensaladas', NULL),
	(14, 10, 1, 'Palmitos', 'ensaladas', NULL),
	(15, 10, 1, 'Albahaca', 'ensaladas', NULL),
	(16, 10, 1, 'Champignones', 'ensaladas', NULL),
	(17, 10, 1, 'Choclo en Granos', 'ensaladas', NULL),
	(18, 10, 1, 'Muzarella doble', 'ensaladas', NULL);
/*!40000 ALTER TABLE `componente` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.componenteppedido
CREATE TABLE IF NOT EXISTS `componenteppedido` (
  `cpp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpp_idProductoPedido` int(11) NOT NULL,
  `cpp_idComponente` int(11) NOT NULL,
  `cpp_precioComponente` float DEFAULT NULL,
  `cpp_nombreComponente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cpp_id`),
  KEY `fk_ComponentePPedido_ProductoPedido1_idx` (`cpp_idProductoPedido`),
  KEY `fk_ComponentePPedido_Componente1_idx` (`cpp_idComponente`),
  CONSTRAINT `fk_ComponentePPedido_Componente1` FOREIGN KEY (`cpp_idComponente`) REFERENCES `componente` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComponentePPedido_ProductoPedido1` FOREIGN KEY (`cpp_idProductoPedido`) REFERENCES `productopedido` (`pp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.componenteppedido: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `componenteppedido` DISABLE KEYS */;
INSERT IGNORE INTO `componenteppedido` (`cpp_id`, `cpp_idProductoPedido`, `cpp_idComponente`, `cpp_precioComponente`, `cpp_nombreComponente`) VALUES
	(1, 6, 4, NULL, NULL),
	(2, 6, 6, NULL, NULL),
	(3, 7, 4, NULL, NULL);
/*!40000 ALTER TABLE `componenteppedido` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.componenteproducto
CREATE TABLE IF NOT EXISTS `componenteproducto` (
  `cp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_idProducto` int(11) NOT NULL,
  `cp_idComponente` int(11) NOT NULL,
  PRIMARY KEY (`cp_id`),
  KEY `fk_ComponenteProducto_Producto1_idx` (`cp_idProducto`),
  KEY `fk_ComponenteProducto_Componente1_idx` (`cp_idComponente`),
  CONSTRAINT `fk_ComponenteProducto_Componente1` FOREIGN KEY (`cp_idComponente`) REFERENCES `componente` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComponenteProducto_Producto1` FOREIGN KEY (`cp_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.componenteproducto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `componenteproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `componenteproducto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.datocontacto
CREATE TABLE IF NOT EXISTS `datocontacto` (
  `dcon_id` int(11) NOT NULL,
  `dcon_facebook` varchar(45) DEFAULT NULL,
  `dcon_website` varchar(45) DEFAULT NULL,
  `dcon_twitter` varchar(45) DEFAULT NULL,
  `dcon_direccion` varchar(45) DEFAULT NULL,
  `dcon_idSucursal` int(11) NOT NULL,
  `dcon_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dcon_id`),
  KEY `fk_datoscontacto_sucursal1_idx` (`dcon_idSucursal`),
  CONSTRAINT `fk_datoscontacto_sucursal1` FOREIGN KEY (`dcon_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.datocontacto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `datocontacto` DISABLE KEYS */;
INSERT IGNORE INTO `datocontacto` (`dcon_id`, `dcon_facebook`, `dcon_website`, `dcon_twitter`, `dcon_direccion`, `dcon_idSucursal`, `dcon_email`) VALUES
	(3, 'www.facebook.com/pizzacolordelivery', 'www.pizzacolordelivery.com', 'Alguntwitee', 'Cordoba 255 ', 4, 'delivey@gmail.com');
/*!40000 ALTER TABLE `datocontacto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.detallepedido
CREATE TABLE IF NOT EXISTS `detallepedido` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `dp_Cantidad` float NOT NULL,
  `dp_PrecioUnitario` float DEFAULT NULL,
  `dp_Total` float DEFAULT NULL,
  `dp_idProductoPedido` int(11) NOT NULL,
  `dp_idPedidoEncabezado` int(11) NOT NULL,
  PRIMARY KEY (`dp_id`),
  KEY `fk_DetallePedido_ProductoPedido1_idx` (`dp_idProductoPedido`),
  KEY `fk_DetallePedido_PedidoEncabezado1_idx` (`dp_idPedidoEncabezado`),
  CONSTRAINT `fk_DetallePedido_PedidoEncabezado1` FOREIGN KEY (`dp_idPedidoEncabezado`) REFERENCES `pedidoencabezado` (`pe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallePedido_ProductoPedido1` FOREIGN KEY (`dp_idProductoPedido`) REFERENCES `productopedido` (`pp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.detallepedido: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
INSERT IGNORE INTO `detallepedido` (`dp_id`, `dp_Cantidad`, `dp_PrecioUnitario`, `dp_Total`, `dp_idProductoPedido`, `dp_idPedidoEncabezado`) VALUES
	(3, 1, 50, NULL, 5, 13),
	(4, 1, 216, NULL, 7, 14),
	(5, 1, 242, NULL, 8, 15);
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.diahorario
CREATE TABLE IF NOT EXISTS `diahorario` (
  `dh_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_diaSemana` varchar(45) DEFAULT NULL,
  `dh_horaApertura` varchar(45) DEFAULT NULL,
  `dh_horaCierre` varchar(45) DEFAULT NULL,
  `dh_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`dh_id`),
  KEY `fk_DiaHorario_Sucursal1_idx` (`dh_idSucursal`),
  CONSTRAINT `FKdh_idSucursal` FOREIGN KEY (`dh_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.diahorario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `diahorario` DISABLE KEYS */;
INSERT IGNORE INTO `diahorario` (`dh_id`, `dh_diaSemana`, `dh_horaApertura`, `dh_horaCierre`, `dh_idSucursal`) VALUES
	(1, '1', '11:00', '21:00', 4),
	(3, '2', '10:00', '21:00', 4),
	(4, '3', '10:00', '21:00', 4),
	(5, '4', '10:00', '21:00', 4),
	(6, '5', '10:00', '12:00', 4),
	(7, '6', '10:00', '21:00', 4),
	(8, '0', '10:00', '21:00', 4);
/*!40000 ALTER TABLE `diahorario` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.direccion
CREATE TABLE IF NOT EXISTS `direccion` (
  `dir_id` int(11) NOT NULL AUTO_INCREMENT,
  `dir_nombre` varchar(50) DEFAULT NULL,
  `dir_telefonoFijo` varchar(50) DEFAULT NULL,
  `dir_latitud` varchar(50) DEFAULT NULL,
  `dir_longitud` varchar(50) DEFAULT NULL,
  `dir_idPersona` int(11) DEFAULT NULL,
  `dir_direccion` text,
  `dir_aclaracion` text,
  PRIMARY KEY (`dir_id`),
  KEY `fk_direccion_persona1_idx` (`dir_idPersona`),
  CONSTRAINT `fk_direccion_persona1` FOREIGN KEY (`dir_idPersona`) REFERENCES `persona` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.direccion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT IGNORE INTO `direccion` (`dir_id`, `dir_nombre`, `dir_telefonoFijo`, `dir_latitud`, `dir_longitud`, `dir_idPersona`, `dir_direccion`, `dir_aclaracion`) VALUES
	(2, 'Depto', '420769', '13254', '45645', 8, 'jj valle 167', NULL),
	(3, 'Casa', '420769', '13254', '45645', 8, 'jj valle 167', NULL);
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_legajo` varchar(45) DEFAULT NULL,
  `emp_idPersona` int(11) NOT NULL,
  `emp_imagen` varchar(120) NOT NULL,
  `emp_cargo` varchar(45) DEFAULT NULL,
  `emp_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `fk_Empleado_Persona1_idx` (`emp_idPersona`),
  KEY `fk_Empleado_Sucursal1_idx` (`emp_idSucursal`),
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`emp_idPersona`) REFERENCES `persona` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_empleado_sucursal1` FOREIGN KEY (`emp_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.empleado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT IGNORE INTO `empleado` (`emp_id`, `emp_legajo`, `emp_idPersona`, `emp_imagen`, `emp_cargo`, `emp_idSucursal`) VALUES
	(1, '12', 14, '', 'Repartidor', 4),
	(4, '00001', 15, '', 'Encargado', 4);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `emp_id` int(11) NOT NULL DEFAULT '1',
  `Rubro` varchar(50) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `cuilt` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `logo` varchar(120) DEFAULT NULL,
  `razonSocial` varchar(45) DEFAULT NULL,
  `Imagen` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.empresa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT IGNORE INTO `empresa` (`emp_id`, `Rubro`, `Domicilio`, `Email`, `Pais`, `cuilt`, `telefono`, `logo`, `razonSocial`, `Imagen`) VALUES
	(1, 'Gastronimico', 'jj valle 167', 'facundokpo04@gmail.com', 'AR', '20-30405963', '3757420769', 'logo2.jpg', 'Pizza Color Delivery', NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `par_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_zonaEntrega` varchar(45) DEFAULT NULL,
  `par_pedidoMinimo` float DEFAULT NULL,
  `par_tiempoEntrega` int(11) DEFAULT NULL,
  `par_costoEnvio` float DEFAULT NULL,
  `par_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`par_id`),
  KEY `fk_Parametros_Sucursal1_idx` (`par_idSucursal`),
  CONSTRAINT `FKpar_idSucursal ` FOREIGN KEY (`par_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.parametros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
INSERT IGNORE INTO `parametros` (`par_id`, `par_zonaEntrega`, `par_pedidoMinimo`, `par_tiempoEntrega`, `par_costoEnvio`, `par_idSucursal`) VALUES
	(1, 'Todo Iguazu', 250, 34, 0, 4);
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.pedidoencabezado
CREATE TABLE IF NOT EXISTS `pedidoencabezado` (
  `pe_id` int(11) NOT NULL AUTO_INCREMENT,
  `pe_idCliente` varchar(45) DEFAULT '0',
  `pe_idEmpleado` varchar(45) DEFAULT '0',
  `pe_aclaraciones` tinytext,
  `pe_comentarios` tinytext,
  `pe_idEstado` int(11) DEFAULT '1',
  `pe_Total` float DEFAULT '0.1',
  `pe_idPersona` int(11) NOT NULL,
  `pe_cli_tel` varchar(45) NOT NULL,
  `pe_idDireccion` int(11) NOT NULL,
  `pe_medioPago` varchar(50) DEFAULT NULL,
  `pe_fechaPedido` datetime NOT NULL,
  `pe_motivoCancelado` tinytext,
  PRIMARY KEY (`pe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.pedidoencabezado: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidoencabezado` DISABLE KEYS */;
INSERT IGNORE INTO `pedidoencabezado` (`pe_id`, `pe_idCliente`, `pe_idEmpleado`, `pe_aclaraciones`, `pe_comentarios`, `pe_idEstado`, `pe_Total`, `pe_idPersona`, `pe_cli_tel`, `pe_idDireccion`, `pe_medioPago`, `pe_fechaPedido`, `pe_motivoCancelado`) VALUES
	(13, '8', '1', 'sin cebolla', ' Producto = Muzzarella comentario =undefined\n Producto = Napolitana comentario =undefined\n', 3, 120, 8, '3758483058', 3, 'Tarjeta Debito', '2017-04-17 17:39:56', NULL),
	(14, '8', '1', 'sin cebolla', ' Producto = Muzzarella comentario =undefined\n', 3, 150, 8, '3758483058', 3, 'Tarjeta Debito', '2017-04-17 17:39:56', NULL),
	(15, '8', NULL, 'sin cebolla', ' Producto = Muzzarella con jamon comentario =undefined\n', 2, 150, 8, '3758483058', 3, 'Tarjeta Debito', '2017-04-17 17:39:56', 'sin luz en el local disculpe los incovenientes');
/*!40000 ALTER TABLE `pedidoencabezado` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_nombre` varchar(45) NOT NULL,
  `per_email` varchar(45) NOT NULL,
  `per_documento` varchar(45) DEFAULT NULL,
  `per_password` varchar(45) DEFAULT NULL,
  `per_nacionalidad` varchar(45) DEFAULT NULL,
  `per_celular` varchar(45) DEFAULT NULL,
  `per_perfilUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.persona: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`per_id`, `per_nombre`, `per_email`, `per_documento`, `per_password`, `per_nacionalidad`, `per_celular`, `per_perfilUsuario`) VALUES
	(8, 'facundo Andres Dominguez', 'facundokpo04@gmail.com', NULL, 'b9249ee15900c72b3938d6b8e3909103', NULL, '3758483058', 'Cliente'),
	(9, 'facundo Andres Dominguez', 'admin@admin.com', NULL, 'b9249ee15900c72b3938d6b8e3909103', NULL, '3758483058', 'Admin'),
	(14, 'valentino', 'admi@admin.com', '34060319', '1231546', 'AR', NULL, 'Empleado'),
	(15, 'Jorge jara', 'jj@gmail.com', '34060319', '1234', 'AR', NULL, 'Admin');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_idCategoria` int(11) NOT NULL,
  `prod_nombre` varchar(45) DEFAULT NULL,
  `prod_codigoProducto` varchar(45) DEFAULT NULL,
  `prod_descripcionProducto` text,
  `prod_precioBase` float DEFAULT NULL,
  `prod_maxComponente` int(11) DEFAULT NULL,
  `prod_minComponente` int(11) DEFAULT NULL,
  `prod_idEstado` int(11) DEFAULT NULL,
  `prod_idEstadoVisible` int(11) DEFAULT NULL,
  `prod_idSucursal` int(11) NOT NULL,
  `prod_imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `fk_Producto_Categoria_idx` (`prod_idCategoria`),
  KEY `fk_Producto_Sucursal1_idx` (`prod_idSucursal`),
  CONSTRAINT `FK_producto_sucursal` FOREIGN KEY (`prod_idSucursal`) REFERENCES `sucursal` (`suc_id`),
  CONSTRAINT `fk_Producto_Categoria0` FOREIGN KEY (`prod_idCategoria`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.producto: ~80 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT IGNORE INTO `producto` (`prod_id`, `prod_idCategoria`, `prod_nombre`, `prod_codigoProducto`, `prod_descripcionProducto`, `prod_precioBase`, `prod_maxComponente`, `prod_minComponente`, `prod_idEstado`, `prod_idEstadoVisible`, `prod_idSucursal`, `prod_imagen`) VALUES
	(1, 3, 'Napolitana', '0001', 'Muzzarela, salsa ajo y rodajas de tomate', 120, 0, 0, 1, 1, 4, 'napolitana.jpg'),
	(2, 3, 'Muzzarella', '0001', 'Muzzarella, salsa y aceitunas', 100, 0, 0, 1, 1, 4, 'Muzza-c_porcion.png'),
	(3, 3, 'Muzzarella, jamon y tomate', '01', 'Muzzarella, jamon y tomate', 136, 0, 0, 1, 1, 4, 'muzajamontoma.jpg'),
	(4, 3, 'Fugazzeta', '01256', 'Muzzarella y cebolla', 115, 0, 0, 1, 1, 4, 'fugazza.jpg'),
	(5, 3, 'Muzzarella con Morrones', '00001', 'Muzzarella, salsa y morrones', 142, 0, 0, 1, 2, 4, ''),
	(6, 3, 'Muzzarella con jamon', '0001', 'Muzzarella, salsa y jamon', 121, 0, 0, 1, 2, 4, ''),
	(7, 2, 'Pollo', '01256', 'Empanada de pollo', 14, 0, 0, 2, 1, 4, 'pizzanapolitana.jpg'),
	(8, 2, 'Jamon y Queso', '01256', 'Empanada de Jamón y Queso', 14, 0, 0, 1, 1, 4, 'empanadacarne.jpg'),
	(9, 2, 'Queso y Cebolla', '01256', 'Empanda de Queso y Cebolla', 14, 0, 0, 1, 1, 4, 'empanadacarne.jpg'),
	(10, 2, 'Humita', '01256', 'Empanada de Humita', 14, 0, 0, 1, 1, 4, 'empanadapollo.jpg'),
	(11, 7, 'Pizza Grande - Promo', '0002', 'Pizza Grande Promo', 0, 0, 0, 2, 2, 4, ''),
	(12, 3, 'Capresse', '0001', 'Muzarella, Jamon y Tomate', 142, 0, 0, 1, 2, 4, ''),
	(13, 3, 'Calabresa', '00001', 'Muzzarella, Salsa y Calabresa', 152, 0, 0, 2, 1, 4, ''),
	(14, 3, 'Especial ', '', 'Muzarella, Salsa, Jamon y Morrones', 154, 0, 0, 2, 1, 4, ''),
	(15, 3, 'Tropical ', '', 'Muzarella, Salsa, Jamon y anana', 142, 0, 0, 2, 1, 4, ''),
	(16, 3, 'Roquefort', '', 'Muzzarella,Salsa y queso roquefort', 152, 0, 0, 2, 1, 4, ''),
	(17, 3, 'Champignon', '', 'Muzzarella, Salsa, champignon y morrones', 147, 0, 0, 2, 1, 4, ''),
	(18, 3, 'Catupiry', '', 'Muzzarella, Pollo y Queso Catupiry', 152, 0, 0, 2, 1, 4, ''),
	(19, 3, 'Palmitos', '', 'Muzzarella, Salsa, Jamon, Palmitos y Salsa Golf', 152, 0, 0, 2, 1, 4, ''),
	(20, 3, '4 Quesos', '', 'Muzzarella, Roquefort, Provolone y Porsalut', 158, 0, 0, 2, 1, 4, ''),
	(21, 3, 'Parma ', '', 'Muzzarella, Salsa, Rucula, Jamon Crudo y Aceitunas Negras', 168, 0, 0, 2, 1, 4, ''),
	(22, 3, 'Raguza', '', 'Muzzarella,Salsa, Panceta Ahumada y Roquefort', 168, 0, 0, 2, 1, 4, ''),
	(23, 3, 'Vegetariana', '00002', 'Champignon, Cebolla, Morron, Muzzarella y Choclo', 142, 0, 0, 2, 1, 4, ''),
	(24, 3, 'New York Pizza', '', 'Muzzarella, Salsa, Jamón, Hamburguesitas, Huevo frito, Panceta, pepinillos, Lechuga, Tomate, Orégano, Aceitunas y aderezos', 200, 0, 0, 2, 1, 4, ''),
	(25, 3, 'Barbacue Chiken Pizza', '', 'Lomito de pollo asado con bbq. muzzarella, salsa, rucula aceituna y oregano', 165, 0, 0, 2, 1, 4, ''),
	(26, 7, 'Gaseosa 500 ml', '00002', 'Gaseosa 500 ml de Promo', 0, 0, 0, 2, 2, 4, ''),
	(27, 7, 'Hamburguesa completa con fritas -Promo', '0001', 'Hamburguesa completa con fritas de promo', 0, 0, 0, 2, 2, 4, ''),
	(28, 7, 'Lomo completo con fritas - promo', '000001', 'Lomo completo con fritas de promo', 0, 0, 0, 2, 2, 4, ''),
	(29, 7, 'Milanesa Napolitana con Fritas-Promo', '0002', 'Milanesa Napolitana con fritas de promo', 0, 0, 0, 2, 2, 4, ''),
	(30, 7, 'Gaseosa de 1,5 lts-Promo', '0', 'Gaseosa de 1,5 lts de promo', 0, 0, 0, 2, 2, 4, ''),
	(31, 7, 'Empanda - Promo', '0002', 'Empanada de Promo', 0, 0, 0, 2, 2, 4, ''),
	(32, 7, 'Milanesa con fritas', '0002', 'Milanesa con fritas', 0, 1, 1, 2, 2, 4, ''),
	(33, 7, 'Pizza rellena/Calzone', '0002', 'Pizza rellena o calzone', 0, 0, 0, 2, 2, 4, ''),
	(34, 7, 'Bebida 1,5lt/1lt', '0002', 'Bebida 1,5lt/1lt', 0, 0, 0, 2, 2, 4, ''),
	(35, 7, 'Pizza Chica-Promo', '0002', 'Pizza Chica de promo', 0, 0, 0, 2, 2, 4, ''),
	(36, 7, 'Bife Express con Guarnición-Promo', '00002', 'Bife Express con Guarnición de Promo', 0, 0, 0, 2, 2, 4, ''),
	(37, 7, 'Mila a Caballo con Guarnición - Promo', '00002', 'Mila a Caballo con Guarnición  de Promo', 0, 0, 0, 2, 2, 4, ''),
	(38, 7, 'Ensalada de Frutas - Promo', '0002', 'Ensalada de Frutas de Promo', 0, 0, 0, 2, 2, 4, ''),
	(39, 7, 'Bife Color con guarnición - Promo', '00002', 'Bife Color con guarnicion de promo', 0, 0, 0, 2, 2, 4, ''),
	(40, 7, 'Pechuga a la Plancha c/guarnición-Promo', '0002', 'Pechuga a la Plancha c/guarnicion de promo', 0, 0, 0, 2, 2, 4, ''),
	(41, 5, 'Napolitano', '0001', 'Muzarella, ajo, jamón y rodajas de tomate', 158, 0, 0, 2, 1, 4, ''),
	(42, 5, 'Especial', '0002', 'Muzarella, jamón y morrones', 163, 0, 0, 2, 1, 4, ''),
	(43, 5, 'Color', '00001', 'Muzarella, jamón, morrón, palmito, huevo y salsa golf', 172, 0, 0, 2, 1, 4, ''),
	(44, 8, 'Fugazzeta', '0001', 'Muzarella, jamón y cebolla', 189, 0, 0, 2, 1, 4, ''),
	(45, 8, 'Toscana', '0001', 'Muzarella, jamon, morrones y huevo duro.', 194, 0, 0, 2, 1, 4, ''),
	(46, 8, 'Color', '0001', 'Muzzarella, palmitos, jamón, salsa golf y morrones.', 215, 0, 0, 2, 1, 4, ''),
	(47, 9, 'Simple', '0001', 'Lechuga, tomate y papas fritas', 120, 0, 0, 2, 1, 4, ''),
	(48, 9, 'Completo', '00001', 'Lechuga, tomate, queso,  jamón, huevo frito y fritas', 130, 0, 0, 2, 1, 4, ''),
	(49, 1, 'Simple', '0001', 'Lechuga, tomate y papas fritas.', 85, 0, 0, 2, 1, 4, ''),
	(50, 1, 'Completo', '0001', 'lechuga, tomate, queso, jamon, huevo frito y fritas', 95, 0, 0, 2, 1, 4, ''),
	(51, 1, 'Hamburguesa Color', '0001', 'Hamburguesa mixta carne vacuna y bondiola de cerdo, huevo, tomate, lechuga, panceta, queso Cheddar y papas fritas', 115, 0, 0, 2, 1, 4, ''),
	(52, 2, 'Arabe', '0001', 'Carne, Morrón, Cebolla, Limon', 14, 0, 0, 2, 1, 4, ''),
	(53, 2, 'Carne', '0001', 'Empanada de carne', 14, 0, 0, 2, 1, 4, ''),
	(54, 2, 'Carne Picante', '0002', 'Empanada de Carne Picante', 14, 0, 0, 2, 1, 4, ''),
	(55, 2, 'Roquefort', '0001', 'Empanada de Roquefort', 14, 0, 0, 2, 1, 4, ''),
	(56, 2, 'Verduras', '0001', 'Empanada de Verduras', 14, 0, 0, 2, 1, 4, ''),
	(57, 2, 'Capresse', '0001', 'Muzzarella, tomate y albahaca', 14, 0, 0, 2, 1, 4, ''),
	(58, 10, 'Acelga, espinaca y rucula', '0001', 'Empanada de Acelga, espinaca y rucula', 14, 0, 0, 2, 1, 4, ''),
	(59, 10, 'Matambre a la pizza', '0001', 'Matambre a la pizza cortado a cuchillo', 15, 0, 0, 2, 1, 4, ''),
	(60, 10, 'Carne cortada a cuchillo', '0001', 'Empanada de Carne cortada a cuchillo', 18, 0, 0, 2, 1, 4, ''),
	(61, 10, 'Surubi', '0001', 'Empanada de Surubi', 22, 0, 0, 2, 1, 4, ''),
	(62, 6, 'Chicken Caesar', '0001', 'Pollo, rucula, panceta, croctones, parmesano y salsa Caesar', 77, 0, 0, 2, 1, 4, ''),
	(63, 6, 'Color', '0001', 'Pollo, lechuga, tomate, choclo y queso tybo en cubos', 77, 0, 0, 2, 1, 4, ''),
	(64, 11, 'Gaseosa 500 ml', '0001', 'Pepsi, 7up, Mirinda, paso de los Toros, 7up Light, Pepsi Light', 1, 0, 0, 2, 1, 4, ''),
	(65, 11, 'Gaseosas de 1,5 lt.', '0001', 'Pepsi, 7Up, Mirinda, Paso de los Toros', 1, 0, 0, 2, 1, 4, ''),
	(66, 11, 'Agua Saborizada 500ml', '0001', 'Agua Saborizada 500ml', 1, 0, 0, 2, 1, 4, ''),
	(67, 11, 'Agua 500ml', '0001', 'Agua con gas o sin gas 500ml', 1, 0, 0, 2, 1, 4, ''),
	(68, 11, 'Agua 1,5lt', '0001', 'Agua con o sin gas 1,5lt', 1, 0, 0, 2, 1, 4, ''),
	(69, 13, 'Cerveza 330 ml', '0001', 'Quilmes, Stella Artois o Quilmes Stout', 1, 0, 0, 2, 1, 4, ''),
	(70, 13, 'Cerveza 1 lt.', '0001', 'Quilmes, Brahma, Quilmes Stout, Stella Artois, Iguana', 1, 0, 0, 2, 1, 4, ''),
	(71, 12, 'Bravio 3/4 Malbec', '0001', 'Bravio 3/4 Malbec', 1, 0, 0, 2, 1, 4, ''),
	(72, 12, 'Benjamin 3/4 Malbec', '0001', 'Benjamin 3/4 Malbec', 1, 0, 0, 2, 1, 4, ''),
	(73, 12, 'Emilia 3/8 Malbec', '0001', 'Emilia 3/8 Malbec', 1, 0, 0, 2, 1, 4, ''),
	(74, 14, 'Sándwich de Pollo', '0001', 'Pollo, queso, tomate, huevo duro y papas fritas', 90, 0, 0, 2, 1, 4, ''),
	(75, 14, 'Sándwich de Milanesa', '0001', 'Carne, queso, tomate, lechuga, huevo frito y jamon', 110, 0, 0, 2, 1, 4, ''),
	(76, 14, 'Papas Fritas', '0001', 'Papas Fritas', 50, 0, 0, 2, 1, 4, ''),
	(77, 14, 'Papas Cheedar', '0001', 'Queso cheedar, Panceta y Cebollita de Verdeo', 75, 0, 0, 2, 1, 4, ''),
	(78, 14, 'Milanesa con papas fritas', '0001', 'Milanesa con papas fritas de Carne o Pollo', 90, 0, 0, 2, 1, 4, ''),
	(79, 14, 'Milanesa a la napolitana con fritas', '0001', 'Milanesa a la napolitana con fritas de carne o de Pollo', 100, 0, 0, 2, 1, 4, ''),
	(80, 3, 'Color', '0001', 'Muzzarella, jamón, morrón, palmito, huevo y salsa golf', 158, 0, 0, 2, 1, 4, '');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.productopedido
CREATE TABLE IF NOT EXISTS `productopedido` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_precioBase` float DEFAULT '0.1',
  `pp_idProducto` int(11) NOT NULL,
  `pp_precioCalc` float DEFAULT '0.1',
  `pp_aclaracion` tinytext,
  `pp_idVariedad` int(11) DEFAULT '0',
  `pp_nombreVariedad` varchar(45) DEFAULT '',
  `pp_componentes` tinytext,
  PRIMARY KEY (`pp_id`),
  KEY `fk_ProductoPedido_Producto1_idx` (`pp_idProducto`),
  CONSTRAINT `fk_ProductoPedido_Producto1` FOREIGN KEY (`pp_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.productopedido: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `productopedido` DISABLE KEYS */;
INSERT IGNORE INTO `productopedido` (`pp_id`, `pp_precioBase`, `pp_idProducto`, `pp_precioCalc`, `pp_aclaracion`, `pp_idVariedad`, `pp_nombreVariedad`, `pp_componentes`) VALUES
	(5, 120, 1, 255, 'Sin Aclaracion', 14, '', NULL),
	(6, 98, 2, 216, 'Sin Aclaracion', 2, '', NULL),
	(7, 98, 2, 216, 'Sin Aclaracion', 1, '', NULL),
	(8, 121, 6, 242, 'Sin Aclaracion', 11, '', NULL);
/*!40000 ALTER TABLE `productopedido` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.productopromo
CREATE TABLE IF NOT EXISTS `productopromo` (
  `ppro_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppro_idPromo` int(11) NOT NULL,
  `ppro_idProducto` int(11) NOT NULL,
  PRIMARY KEY (`ppro_id`),
  KEY `fk_ProductoPromo_Promo1_idx` (`ppro_idPromo`),
  KEY `fk_ProductoPromo_Producto1_idx` (`ppro_idProducto`),
  CONSTRAINT `fk_ProductoPromo_Producto1` FOREIGN KEY (`ppro_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductoPromo_Promo1` FOREIGN KEY (`ppro_idPromo`) REFERENCES `promo` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.productopromo: ~49 rows (aproximadamente)
/*!40000 ALTER TABLE `productopromo` DISABLE KEYS */;
INSERT IGNORE INTO `productopromo` (`ppro_id`, `ppro_idPromo`, `ppro_idProducto`) VALUES
	(15, 1, 26),
	(16, 1, 27),
	(17, 2, 28),
	(18, 2, 26),
	(19, 3, 29),
	(20, 3, 29),
	(21, 3, 30),
	(22, 6, 31),
	(23, 6, 31),
	(24, 6, 31),
	(25, 6, 31),
	(26, 6, 31),
	(27, 6, 31),
	(28, 6, 31),
	(29, 6, 31),
	(30, 6, 31),
	(31, 6, 31),
	(32, 6, 31),
	(33, 6, 31),
	(34, 6, 30),
	(35, 7, 11),
	(36, 7, 31),
	(37, 7, 31),
	(38, 7, 31),
	(39, 7, 31),
	(40, 7, 31),
	(41, 7, 31),
	(42, 7, 30),
	(43, 8, 32),
	(44, 8, 32),
	(45, 8, 32),
	(47, 8, 30),
	(48, 9, 33),
	(49, 9, 34),
	(50, 10, 11),
	(51, 10, 35),
	(52, 10, 34),
	(53, 11, 36),
	(54, 11, 26),
	(55, 11, 38),
	(56, 12, 39),
	(57, 12, 26),
	(58, 12, 38),
	(60, 14, 26),
	(61, 14, 38),
	(63, 13, 26),
	(64, 13, 38),
	(65, 13, 40),
	(66, 14, 37);
/*!40000 ALTER TABLE `productopromo` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.productopromopedido
CREATE TABLE IF NOT EXISTS `productopromopedido` (
  `ppp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppp_idProductoP` int(11) NOT NULL,
  `ppp_idPromoP` int(11) NOT NULL,
  PRIMARY KEY (`ppp_id`),
  KEY `fk_productopromopedido_productopedido1_idx` (`ppp_idProductoP`),
  KEY `fk_productopromopedido_promopedido1_idx` (`ppp_idPromoP`),
  CONSTRAINT `fk_productopromopedido_productopedido1` FOREIGN KEY (`ppp_idProductoP`) REFERENCES `productopedido` (`pp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productopromopedido_promopedido1` FOREIGN KEY (`ppp_idPromoP`) REFERENCES `promopedido` (`ppro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.productopromopedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `productopromopedido` DISABLE KEYS */;
INSERT IGNORE INTO `productopromopedido` (`ppp_id`, `ppp_idProductoP`, `ppp_idPromoP`) VALUES
	(1, 5, 1),
	(2, 6, 1);
/*!40000 ALTER TABLE `productopromopedido` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.promo
CREATE TABLE IF NOT EXISTS `promo` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(45) DEFAULT NULL,
  `pro_descripcion` varchar(45) DEFAULT NULL,
  `pro_precio` float DEFAULT NULL,
  `pro_descuento` float DEFAULT NULL,
  `pro_FechaInicio` date DEFAULT NULL,
  `pro_FechaFin` date DEFAULT NULL,
  `pro_imagen` varchar(50) DEFAULT NULL,
  `pro_idEstado` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.promo: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
INSERT IGNORE INTO `promo` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_descuento`, `pro_FechaInicio`, `pro_FechaFin`, `pro_imagen`, `pro_idEstado`) VALUES
	(1, 'Combo 1', '1 Hamburguesa completa con fritas + 1 Gaseosa', 110, 20, '1970-01-01', '1970-01-01', 'combo11.jpg', 1),
	(2, 'Combo 2', '1 Lomo completo con fritas + Gaseosa de 500 m', 140, 50, '1970-01-01', '1970-01-01', 'combo2.jpg', 1),
	(3, 'Combo 3', '2 Milanesas Napolitanas con fritas + 1 Gaseos', 240, 40, '1970-01-01', '1970-01-01', 'combo3.jpg', 1),
	(6, 'Combo 4', '12 Empandas + 1 Gaseosa 1,5 lt.', 179, 50, '1970-01-01', '1970-01-01', 'combo4.jpg', 1),
	(7, 'Combo 5', '1 Pizza gr. + 6 Empanadas + 1 Gaseosa 1,5 lt.', 235, 0, '2017-01-04', '1970-01-01', 'combo5.jpg', 1),
	(8, 'Combo 6', '3 Milas con fritas + 1 Gaseosa 1,5 lt.', 299, 50, '2017-04-01', '2017-04-01', 'combo61.jpg', 1),
	(9, 'Combo 7', '1 Pizza rellena o Calzone + 1 Gaseosa 1,5 lt.', 210, 40, '2017-04-02', '2017-04-04', 'combo72.jpg', 1),
	(10, 'Combo 8', '1 Pizza gr. + 1 Pizza ch. + 1 Gaseosa 1,5 lt.', 280, 50, '2017-04-10', '2017-04-11', 'combo81.jpg', 1),
	(11, 'Combo 9', '1 bife Express con guarnicion + 1 Gaseosa 500', 165, 50, '1970-01-01', '1970-01-01', 'combo9.jpg', 1),
	(12, 'Combo 10', '1 Bife Color con guarnicion + 1 Gaseosa 500 m', 145, 50, '1970-01-01', '1970-01-01', 'como10.jpg', 1),
	(13, 'Combo 11', 'Pechuga a la plancha c/ guarn. + 1 Gaseosa 50', 125, 50, '1970-01-01', '2017-01-05', 'combo111.jpg', 1),
	(14, 'Combo 12', 'Mila a caballo con guarnición + 1 Gaseosa 500', 135, 50, '2017-04-01', '1970-01-01', 'combo121.jpg', 1);
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.promopedido
CREATE TABLE IF NOT EXISTS `promopedido` (
  `ppro_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppro_nombre` varchar(45) DEFAULT NULL,
  `ppro_precioUnitario` float DEFAULT NULL,
  `ppro_cantidad` float DEFAULT NULL,
  `ppro_idPromo` int(11) DEFAULT NULL,
  `ppro_idPedidoEncabezado` int(11) DEFAULT NULL,
  `ppro_detallePp` text,
  `ppro_total` float NOT NULL,
  `ppro_precioBase` float DEFAULT NULL,
  `ppro_aclaracion` mediumtext,
  PRIMARY KEY (`ppro_id`),
  KEY `fk_PromoPedido_PedidoEncabezado1_idx` (`ppro_idPedidoEncabezado`),
  KEY `fk_promopedido_promo1_idx` (`ppro_idPromo`),
  CONSTRAINT `fk_PromoPedido_PedidoEncabezado1` FOREIGN KEY (`ppro_idPedidoEncabezado`) REFERENCES `pedidoencabezado` (`pe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_promopedido_promo1` FOREIGN KEY (`ppro_idPromo`) REFERENCES `promo` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.promopedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `promopedido` DISABLE KEYS */;
INSERT IGNORE INTO `promopedido` (`ppro_id`, `ppro_nombre`, `ppro_precioUnitario`, `ppro_cantidad`, `ppro_idPromo`, `ppro_idPedidoEncabezado`, `ppro_detallePp`, `ppro_total`, `ppro_precioBase`, `ppro_aclaracion`) VALUES
	(1, 'Promo1', 150, 1, 1, 13, '..', 150, 130, ' alguna aclaracion');
/*!40000 ALTER TABLE `promopedido` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.sucursal
CREATE TABLE IF NOT EXISTS `sucursal` (
  `suc_id` int(11) NOT NULL AUTO_INCREMENT,
  `suc_nombre` varchar(45) DEFAULT NULL,
  `suc_cuit` varchar(45) DEFAULT NULL,
  `suc_razonSocial` varchar(45) DEFAULT NULL,
  `suc_idEmpresa` int(11) NOT NULL,
  `suc_direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`suc_id`),
  KEY `fk_Sucursal_Empresa1_idx` (`suc_idEmpresa`),
  CONSTRAINT `fk_Sucursal_Empresa1` FOREIGN KEY (`suc_idEmpresa`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.sucursal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT IGNORE INTO `sucursal` (`suc_id`, `suc_nombre`, `suc_cuit`, `suc_razonSocial`, `suc_idEmpresa`, `suc_direccion`) VALUES
	(4, 'Centro Iguazu', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.tablasrelacion
CREATE TABLE IF NOT EXISTS `tablasrelacion` (
  `idEstado` int(11) NOT NULL,
  `relacion` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `orden` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.tablasrelacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tablasrelacion` DISABLE KEYS */;
INSERT IGNORE INTO `tablasrelacion` (`idEstado`, `relacion`, `descripcion`, `orden`, `valor`) VALUES
	(1, 'pedidoestado', 'Pendiente', 1, '1'),
	(2, 'pedidoestado', 'Preparando', 2, '2'),
	(3, 'pedidoestado', 'Enviando', 3, '3'),
	(4, 'pedidoestado', 'Cancelado', 4, '4');
/*!40000 ALTER TABLE `tablasrelacion` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.telefonocontacto
CREATE TABLE IF NOT EXISTS `telefonocontacto` (
  `tcon_id` int(11) NOT NULL AUTO_INCREMENT,
  `tcon_numero` varchar(45) DEFAULT NULL,
  `tcon_descripcion` varchar(45) DEFAULT NULL,
  `tcon_tipo` int(11) DEFAULT NULL,
  `tcon_idDatoContacto` int(11) NOT NULL,
  PRIMARY KEY (`tcon_id`),
  KEY `fk_telefonoscontacto_datoscontacto1_idx` (`tcon_idDatoContacto`),
  CONSTRAINT `fk_telefonoscontacto_datoscontacto1` FOREIGN KEY (`tcon_idDatoContacto`) REFERENCES `datocontacto` (`dcon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.telefonocontacto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `telefonocontacto` DISABLE KEYS */;
INSERT IGNORE INTO `telefonocontacto` (`tcon_id`, `tcon_numero`, `tcon_descripcion`, `tcon_tipo`, `tcon_idDatoContacto`) VALUES
	(3, '3757589636', 'WattApp', 1, 3),
	(4, '3757483058', 'WattApp 2', 1, 3),
	(5, '3757483058', 'WattApp 3', 1, 3),
	(9, '420769', 'Fijo 1', 2, 3);
/*!40000 ALTER TABLE `telefonocontacto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.variedad
CREATE TABLE IF NOT EXISTS `variedad` (
  `var_id` int(11) NOT NULL AUTO_INCREMENT,
  `var_idProducto` int(11) NOT NULL,
  `var_nombre` varchar(45) DEFAULT NULL,
  `var_descripcion` text,
  `var_tipo` varchar(45) DEFAULT NULL,
  `var_precio` float DEFAULT NULL,
  PRIMARY KEY (`var_id`),
  KEY `fk_Variedad_Producto1_idx` (`var_idProducto`),
  CONSTRAINT `fk_Variedad_Producto1` FOREIGN KEY (`var_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.variedad: ~125 rows (aproximadamente)
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
INSERT IGNORE INTO `variedad` (`var_id`, `var_idProducto`, `var_nombre`, `var_descripcion`, `var_tipo`, `var_precio`) VALUES
	(5, 3, 'Chica', 'Pizza Muzzarella,J y T Chica', 'Tamaño', 136),
	(6, 3, 'Grande', 'Pizza Muzzarella Jy T Grande', 'Tamaño', 152),
	(7, 4, 'Chica', 'Fugazzeta Chica', 'Tamaño', 115),
	(8, 4, 'Grande', 'Fugazzeta Grande', 'Tamaño', 126),
	(9, 5, 'Chica', 'Muzarella Chica', 'Tamaño', 142),
	(10, 5, 'Grande', 'Muzarella Grande', 'Tamaño', 158),
	(11, 6, 'Chica', 'Muzarella con Jamon Chica', 'Tamaño', 121),
	(12, 6, 'Grande', 'Muzarella con Jamon Grande', 'Tamaño', 132),
	(17, 11, 'Fugazzeta', 'Pizza Fugazzeta', 'Sabor', 0),
	(18, 11, 'Napolitana', 'Pizza Napolitana', 'Sabor', 0),
	(19, 2, 'Chica', 'Muzzarella Chica', 'Tamaño', 100),
	(20, 2, 'Media Chica', 'Media Muzarella Chica', 'Tamaño', 50),
	(21, 2, 'Grande', 'Muzarella Grande', 'Tamaño', 110),
	(22, 2, 'Media Grande', 'Media Muzarella Grande', 'Tamaño', 55),
	(23, 4, 'Media Chica', 'Media Fugazzeta Chica', 'Tamaño', 58),
	(24, 4, 'Media Grande|', 'Media Fugazzeta Grande', 'Tamaño', 63),
	(25, 6, 'Media Chica', 'Media Muzarella con Jamón Chica', 'Tamaño', 61),
	(26, 6, 'Media Grande', 'Media Muzarella con Jamon Grande', 'Tamaño', 66),
	(27, 5, 'Media Chica', 'Media Muzarella con Morrones Chica', 'Tamaño', 71),
	(28, 5, 'Media Grande', 'Media Muzarella con Morrones Grande', 'Tamaño', 79),
	(29, 1, 'Grande', 'Pizza Napolitana Grande', 'Tamaño', 135),
	(30, 1, 'Chica', 'Pizza Napolitana Chica', 'Tamaño', 120),
	(31, 1, 'Media Grande', 'Media  Pizza Napolitana Grande', 'Tamaño', 68),
	(32, 1, 'Media Chica', 'Media Pizza Napolitana Chica', 'Tamaño', 60),
	(33, 3, 'Media Chica', 'Media Pizza Muzzarella, J y T Chica', 'Tamaño', 68),
	(34, 3, 'Media Grande', 'Media Pizza Muzzarella Grande', 'Tamaño', 76),
	(35, 12, 'Chica', 'Pizza Capresse Chica', 'Tamaño', 142),
	(36, 12, 'Grande', 'Pizza Capresse Grande', 'Tamaño', 152),
	(37, 12, 'Media Chica', 'Media Pizza Capresse Chica', 'Tamaño', 71),
	(38, 12, 'Media Grande', 'Media Pizza Capresse Grande', 'Tamaño', 76),
	(39, 26, 'Pepsi', 'Gaseosa Pepsi', 'Sabor', 0),
	(40, 26, 'Seven Up', 'Gaseosa Seven Up', 'Sabor', 0),
	(41, 26, 'Paso de los Toros', 'Gaseosa Paso de los Toros', 'Sabor', 0),
	(42, 26, 'Miranda', 'Gaseosa Miranda', 'Sabor', 0),
	(43, 29, 'Carne de Ternera', 'Milanesa de carne de ternera', ' Carne', 0),
	(44, 29, 'Carne de Pollo', 'Milanesa de Pollo', 'Carne', 0),
	(45, 30, 'Pepsi', 'Gaseosa pepsi', 'Sabor', 0),
	(46, 30, 'Seven up', 'Gaseosa Seven Up', 'Sabor', 0),
	(47, 30, 'Paso de los Toros', 'Gaseosa paso de los toros', 'Sabor', 0),
	(48, 30, 'Mirinda', 'Gaseosa Mirinda', 'Sabor', 0),
	(49, 31, 'Carne', 'Empanda de Carne', 'Sabor', 0),
	(50, 31, 'Pollo', 'Empanda de pollo', 'Sabor', 0),
	(51, 31, 'Jamon y Queso', 'Empanada de jamon y queso', 'Sabor', 0),
	(52, 11, 'Jamon', 'Pizza de Jamon', 'Sabor', 0),
	(53, 33, 'Pizza rellena Fugazzeta', 'Pizza Rellena Fugazzeta', 'Sabor', 0),
	(54, 33, 'Pizza Rellena Toscana', 'Pizza Rellena Toscana', 'Sabor', 0),
	(55, 33, 'Pizza Rellena Color', 'Pizza Rellena Color', 'Sabor', 0),
	(56, 33, 'Calzone Napolitana', 'Calzone Napolitana', 'Sabor', 0),
	(57, 33, 'Calzone Especial', 'Calzone Especial', 'Sabor', 0),
	(58, 33, 'Calzone Color', 'Calzone Color', 'Sabor', 0),
	(59, 34, 'Pepsi 1,5 lt ', 'Gaseosa Pepsi 1,5 lt ', 'Sabor', 0),
	(60, 34, 'Seven Up 1,5 lt ', 'Gaseosa Seven Up 1,5 lt ', 'Sabor', 0),
	(61, 34, 'Paso de Los Toros 1,5 lt ', 'Gaseosa Paso de Los Toros 1,5 lt ', 'Sabor', 0),
	(62, 34, 'Mirinda 1,5 lt ', 'Gaseosa Mirinda 1,5 lt ', 'Sabor', 0),
	(63, 34, 'Quilmes 1lt', 'Cerveza Quilmes 1lt', 'Sabor', 0),
	(64, 35, 'Napolitana', 'Pizza Chica Napolitana', 'Sabor', 0),
	(65, 35, 'Jamon', 'Pizza Chica Jamon', 'Sabor', 0),
	(66, 35, 'Fugazzeta', 'Pizza Chica de Fugazzeta', 'Sabor', 0),
	(67, 36, 'Con Papas Fritas', 'Con Papas Fritas', 'Guarnicion', 0),
	(68, 36, 'Con Ensalada', 'Con Ensalada', 'Guarnicion', 0),
	(69, 36, 'Con Pure', 'Con Pure', 'Guarnicion', 0),
	(70, 37, 'Con Papas Fritas', 'Con Papas Fritas', 'Guarnicion', 0),
	(71, 37, 'Con Ensalada', 'Con Ensalada', 'Guarnicion', 0),
	(72, 37, 'Con Pure', 'Con Pure', 'Guarnicion', 0),
	(73, 39, 'Con Papas Fritas', 'Con Papas Fritas', 'Guarnicion', 0),
	(74, 39, 'Con Ensalada', 'Con Ensalada', 'Guarnicion', 0),
	(75, 39, 'Con Pure', 'Con Pure', 'Guarnicion', 0),
	(76, 40, 'Con Papas Fritas', 'Con Papas Fritas', 'Guarnicion', 0),
	(77, 40, 'Con Ensalada', 'Con Ensalada', 'Guarnicion', 0),
	(78, 40, 'Con Pure', 'Con Pure', 'Guarnicion', 0),
	(80, 41, 'Chico', 'Calzone Chico', 'Tamaño', 158),
	(81, 41, 'Grande', 'Calzone Grande', 'Tamaño', 184),
	(82, 42, 'Chico', 'Calzone Chico', 'Tamaño', 163),
	(83, 42, 'Grande', 'Calzone Grande', 'Tamaño', 195),
	(84, 43, 'Chico', 'Calzone Color Chico', 'Tamaño', 172),
	(85, 43, 'Grande', 'Calzone Color Grande', 'Tamaño', 205),
	(86, 64, 'Pepsi', 'Pepsi', 'Sabor', 1),
	(87, 64, 'Seven Up', 'Seven Up', 'Sabor', 1),
	(88, 64, 'Mirinda', 'Mirinda', 'Sabor', 1),
	(89, 64, 'Paso de los Toros', 'Paso de los Toros', 'Sabor', 1),
	(90, 64, 'Seven Up Light', 'Seven Up Light', 'Sabor', 1),
	(91, 64, 'Pepsi Light', 'Pepsi Light', 'Sabor', 1),
	(92, 67, 'Con Gas', 'Con Gas', 'Sabor', 1),
	(93, 67, 'Sin Gas', 'Sin Gas', 'Sabor', 1),
	(94, 68, 'Con Gas', 'Con Gas', 'Sabor', 1),
	(95, 68, 'Sin Gas', 'Sin Gas', 'Sabor', 1),
	(96, 69, 'Quilmes Stout', 'Quilmes Stout', 'Sabor', 1),
	(97, 69, 'Stella Artois ', 'Stella Artois ', 'Sabor', 1),
	(98, 69, 'Quilmes', 'Quilmes', 'Sabor', 1),
	(99, 70, 'Quilmes', 'Quilmes', 'Sabor', 1),
	(100, 70, 'Brahma ', 'Brahma ', 'Sabor', 1),
	(101, 70, 'Quilmes Stout', 'Quilmes Stout', 'Sabor', 1),
	(102, 70, 'Stella Artois', 'Stella Artois', 'Sabor', 1),
	(103, 78, 'Pollo', 'Milanesa de Pollo', 'Carne', 93),
	(104, 78, 'Carne', 'Milanesa de Carne', 'Carne', 90),
	(105, 79, 'Pollo', 'Milanesa de Pollo', 'Carne', 100),
	(106, 79, 'Carne', 'Milanesa de carne', 'Carne', 110),
	(107, 13, 'Grande', 'Grande', 'Tamaño', 168),
	(108, 13, 'Chica', 'Chica', 'Tamaño', 152),
	(109, 14, 'Chica', 'Chica', 'Tamaño', 154),
	(110, 14, 'Grande', 'Grande', 'Tamaño', 163),
	(111, 15, 'Chica', 'Chica', 'Tamaño', 142),
	(112, 15, 'Grande', 'Grande', 'Tamaño', 152),
	(113, 16, 'Chica', 'Chica', 'Tamaño', 152),
	(114, 16, 'Grande', 'Grande', 'Tamaño', 168),
	(115, 17, 'Chica', 'Chica', 'Tamaño', 147),
	(116, 17, 'Grande', 'Grande', 'Tamaño', 157),
	(117, 18, 'Chica', 'Chica', 'Tamaño', 152),
	(118, 18, 'Grande', 'Grande', 'Tamaño', 163),
	(119, 19, 'Chica', 'Chica', 'Tamaño', 152),
	(120, 19, 'Grande ', 'Grande', 'Tamaño', 163),
	(121, 20, 'Chica', 'Chica ', 'Tamaño', 158),
	(122, 20, 'Grande', 'Grande', 'Tamaño', 174),
	(123, 80, 'Chica', 'Chica', 'Tamaño', 158),
	(124, 80, 'Grande', 'Grande', 'Tamaño', 174),
	(125, 21, 'Chica', 'Chica', 'Tamaño', 168),
	(126, 21, 'Grande', 'Grande', 'Tamaño', 180),
	(127, 22, 'Chica', 'Chica', 'Tamaño', 168),
	(128, 22, 'Grande', 'Grande', 'Tamaño', 180),
	(129, 23, 'Chica', 'Chica', 'Tamaño', 142),
	(130, 23, 'Grande', 'Grande', 'Tamaño', 158),
	(131, 24, 'Chica', 'Chica', 'Tamaño', 200),
	(132, 24, 'Grande', 'Grande', 'Tamaño', 220),
	(133, 25, 'Chica', 'Chica', 'Tamaño', 165),
	(134, 25, 'Grande', 'Grande', 'Tamaño', 185);
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
