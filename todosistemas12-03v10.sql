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
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.categoria: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT IGNORE INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_idEstado`, `cat_imagen`) VALUES
	(1, 'Hamburguesas', 'hamburguesas', 1, 'hamburgesas.png'),
	(2, 'Empanadas', 'empanada', 1, 'empanadas.png'),
	(3, 'Pizzas', 'pizzas', 2, 'pizzas.png'),
	(4, 'Ensaladas', 'ensaladas', 2, 'ensaladas.png'),
	(5, 'Calzones', 'calzones', 1, 'calzones.png');
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
  PRIMARY KEY (`cpp_id`),
  KEY `fk_ComponentePPedido_ProductoPedido1_idx` (`cpp_idProductoPedido`),
  KEY `fk_ComponentePPedido_Componente1_idx` (`cpp_idComponente`),
  CONSTRAINT `fk_ComponentePPedido_Componente1` FOREIGN KEY (`cpp_idComponente`) REFERENCES `componente` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComponentePPedido_ProductoPedido1` FOREIGN KEY (`cpp_idProductoPedido`) REFERENCES `productopedido` (`pp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.componenteppedido: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `componenteppedido` DISABLE KEYS */;
INSERT IGNORE INTO `componenteppedido` (`cpp_id`, `cpp_idProductoPedido`, `cpp_idComponente`) VALUES
	(1, 6, 4),
	(2, 6, 6),
	(3, 7, 4);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.componenteproducto: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `componenteproducto` DISABLE KEYS */;
INSERT IGNORE INTO `componenteproducto` (`cp_id`, `cp_idProducto`, `cp_idComponente`) VALUES
	(9, 1, 1),
	(11, 1, 3),
	(14, 2, 4),
	(15, 2, 6),
	(16, 2, 7),
	(17, 2, 5),
	(18, 2, 8),
	(19, 2, 9),
	(20, 2, 10),
	(21, 2, 11),
	(22, 2, 12),
	(23, 2, 13),
	(24, 2, 14),
	(25, 2, 15),
	(26, 2, 16),
	(27, 2, 17),
	(28, 2, 18);
/*!40000 ALTER TABLE `componenteproducto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.datocontacto
CREATE TABLE IF NOT EXISTS `datocontacto` (
  `dcon_id` int(11) NOT NULL AUTO_INCREMENT,
  `dcon_facebook` varchar(45) DEFAULT NULL,
  `dcon_website` varchar(45) DEFAULT NULL,
  `dcon_twitter` varchar(45) DEFAULT NULL,
  `dcon_direccion` tinytext,
  `dcon_idSucursal` int(11) NOT NULL,
  `dcon_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dcon_id`),
  KEY `fk_datoscontacto_sucursal1_idx` (`dcon_idSucursal`),
  CONSTRAINT `fk_datoscontacto_sucursal1` FOREIGN KEY (`dcon_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.datocontacto: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `datocontacto` DISABLE KEYS */;
INSERT IGNORE INTO `datocontacto` (`dcon_id`, `dcon_facebook`, `dcon_website`, `dcon_twitter`, `dcon_direccion`, `dcon_idSucursal`, `dcon_email`) VALUES
	(1, 'facebook1', 'www.pizzacolordelivery.com', 'twiter1', 'Av cordoba 200', 4, 'deliverypc@gmail.com');
/*!40000 ALTER TABLE `datocontacto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.detallepedido
CREATE TABLE IF NOT EXISTS `detallepedido` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `dp_Cantidad` int(11) NOT NULL,
  `dp_PrecioUnitario` float DEFAULT NULL,
  `dp_Total` float DEFAULT NULL,
  `dp_idProductoPedido` int(11) NOT NULL,
  `dp_idPedidoEncabezado` int(11) NOT NULL,
  PRIMARY KEY (`dp_id`),
  KEY `fk_DetallePedido_ProductoPedido1_idx` (`dp_idProductoPedido`),
  KEY `fk_DetallePedido_PedidoEncabezado1_idx` (`dp_idPedidoEncabezado`),
  CONSTRAINT `fk_DetallePedido_PedidoEncabezado1` FOREIGN KEY (`dp_idPedidoEncabezado`) REFERENCES `pedidoencabezado` (`pe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallePedido_ProductoPedido1` FOREIGN KEY (`dp_idProductoPedido`) REFERENCES `productopedido` (`pp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.detallepedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
INSERT IGNORE INTO `detallepedido` (`dp_id`, `dp_Cantidad`, `dp_PrecioUnitario`, `dp_Total`, `dp_idProductoPedido`, `dp_idPedidoEncabezado`) VALUES
	(3, 1, 50, NULL, 5, 13),
	(4, 1, 216, NULL, 7, 14);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.diahorario: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `diahorario` DISABLE KEYS */;
INSERT IGNORE INTO `diahorario` (`dh_id`, `dh_diaSemana`, `dh_horaApertura`, `dh_horaCierre`, `dh_idSucursal`) VALUES
	(1, '1', '11:00', '21:00', 4),
	(3, '2', '10:00', '21:00', 4),
	(4, '3', '10:00', '21:00', 4),
	(5, '4', '10:00', '21:00', 4),
	(6, '5', '10:00', '21:00', 4),
	(7, '6', '10:00', '21:00', 4),
	(8, '0', '10:00', '21:00', 4),
	(10, '2', '20:24', '20:24', 6),
	(11, '2', '20:24', '20:24', 6),
	(12, '2', '20:25', '20:25', 6);
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
  CONSTRAINT `fk_direccion_persona1` FOREIGN KEY (`dir_idPersona`) REFERENCES `persona` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`emp_idPersona`) REFERENCES `persona` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleado_sucursal1` FOREIGN KEY (`emp_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.empleado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT IGNORE INTO `empleado` (`emp_id`, `emp_legajo`, `emp_idPersona`, `emp_imagen`, `emp_cargo`, `emp_idSucursal`) VALUES
	(1, '1', 9, '', 'Administrador', 1);
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

-- Volcando datos para la tabla deliverydb.empresa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT IGNORE INTO `empresa` (`emp_id`, `Rubro`, `Domicilio`, `Email`, `Pais`, `cuilt`, `telefono`, `logo`, `razonSocial`, `Imagen`) VALUES
	(1, 'Gastronimico', 'jj valle 167', 'facundokpo04@gmail.com', 'AR', '20-30405963', '3757420769', 'logo2.jpg', 'Pizza Color', NULL);
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
  `pe_idCliente` varchar(45) DEFAULT NULL,
  `pe_idEmpleado` varchar(45) DEFAULT NULL,
  `pe_aclaraciones` text,
  `pe_comentarios` text,
  `pe_idEstado` int(11) DEFAULT NULL,
  `pe_Total` float DEFAULT NULL,
  `pe_idPersona` int(11) NOT NULL,
  `pe_cli_tel` varchar(45) NOT NULL,
  `pe_idDireccion` int(11) DEFAULT NULL,
  `pe_medioPago` varchar(50) DEFAULT NULL,
  `pe_fechaPedido` datetime DEFAULT NULL,
  PRIMARY KEY (`pe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.pedidoencabezado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidoencabezado` DISABLE KEYS */;
INSERT IGNORE INTO `pedidoencabezado` (`pe_id`, `pe_idCliente`, `pe_idEmpleado`, `pe_aclaraciones`, `pe_comentarios`, `pe_idEstado`, `pe_Total`, `pe_idPersona`, `pe_cli_tel`, `pe_idDireccion`, `pe_medioPago`, `pe_fechaPedido`) VALUES
	(13, '8', NULL, NULL, ' Producto = Muzzarella comentario =undefined\n Producto = Napolitana comentario =undefined\n', 1, NULL, 8, '3758483058', 3, 'Tarjeta Debito', NULL),
	(14, '8', NULL, NULL, ' Producto = Muzzarella comentario =undefined\n', 1, NULL, 8, '3758483058', 3, 'Tarjeta Debito', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.persona: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`per_id`, `per_nombre`, `per_email`, `per_documento`, `per_password`, `per_nacionalidad`, `per_celular`, `per_perfilUsuario`) VALUES
	(8, 'facundo Andres Dominguez', 'facundokpo04@gmail.com', NULL, 'b9249ee15900c72b3938d6b8e3909103', NULL, '3758483058', 'Cliente'),
	(9, 'facundo Andres Dominguez', 'admin@admin.com', NULL, 'b9249ee15900c72b3938d6b8e3909103', NULL, '3758483058', 'Admin');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.producto: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT IGNORE INTO `producto` (`prod_id`, `prod_idCategoria`, `prod_nombre`, `prod_codigoProducto`, `prod_descripcionProducto`, `prod_precioBase`, `prod_maxComponente`, `prod_minComponente`, `prod_idEstado`, `prod_idEstadoVisible`, `prod_idSucursal`, `prod_imagen`) VALUES
	(1, 3, 'Napolitana', '01256', 'Muzzarela, salsa ajo y rodajas de tomate', 120, 0, 0, 1, 1, 4, 'pizzanapolitana.jpg'),
	(2, 3, 'Muzzarella', '01256', 'Muzzarella, salsa y aceitunas', 98, 0, 0, 1, 1, 4, 'pizzamusa.jpg'),
	(3, 3, 'Muzzarella, jamon y tomate', '01', 'Muzzarella, jamon y tomate', 136, 0, 0, 1, 1, 4, 'pizzamargarita.png'),
	(4, 3, 'Fugazzeta', '01256', 'Muzzarella y cebolla', 115, 0, 0, 1, 1, 4, 'pizzafuga.png'),
	(5, 3, 'Muzzarella con morrones', '01256', 'Muzzarella, salsa y morrones', 142, 0, 0, 1, 1, 4, 'pizzacalabresa.png'),
	(6, 3, 'Muzzarella con jamon', '01256', 'Muzzarella, salsa y jamon', 121, 0, 0, 1, 1, 4, 'pizzamusa.jpg'),
	(7, 2, 'Arabe', '01256', 'Muzzarela, salsa y aceitunas', 12.5, 0, 0, 1, 1, 4, 'pizzanapolitana.jpg'),
	(8, 2, 'Carne ', '01256', 'Carne', 12.5, 0, 0, 1, 1, 4, 'empanadacarne.jpg'),
	(9, 2, 'Carne Picante', '01256', 'Carne Picante', 12.5, 0, 0, 1, 1, 4, 'empanadacarne.jpg'),
	(10, 2, 'Pollo', '01256', 'Pollo', 12.5, 0, 0, 1, 1, 4, 'empanadapollo.jpg');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.productopedido
CREATE TABLE IF NOT EXISTS `productopedido` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_precioBase` float DEFAULT NULL,
  `pp_idProducto` int(11) NOT NULL,
  `pp_precioCalc` float DEFAULT NULL,
  `pp_aclaracion` text,
  `pp_idVariedad` int(11) DEFAULT '0',
  PRIMARY KEY (`pp_id`),
  KEY `fk_ProductoPedido_Producto1_idx` (`pp_idProducto`),
  CONSTRAINT `fk_ProductoPedido_Producto1` FOREIGN KEY (`pp_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.productopedido: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `productopedido` DISABLE KEYS */;
INSERT IGNORE INTO `productopedido` (`pp_id`, `pp_precioBase`, `pp_idProducto`, `pp_precioCalc`, `pp_aclaracion`, `pp_idVariedad`) VALUES
	(5, 120, 1, 255, NULL, 3),
	(6, 98, 2, 216, NULL, 2),
	(7, 98, 2, 216, NULL, 1),
	(9, 98, 2, 216, NULL, 1),
	(12, 98, 2, 216, 'nada', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.productopromo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `productopromo` DISABLE KEYS */;
INSERT IGNORE INTO `productopromo` (`ppro_id`, `ppro_idPromo`, `ppro_idProducto`) VALUES
	(3, 1, 1),
	(4, 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.productopromopedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productopromopedido` DISABLE KEYS */;
INSERT IGNORE INTO `productopromopedido` (`ppp_id`, `ppp_idProductoP`, `ppp_idPromoP`) VALUES
	(5, 5, 2),
	(6, 7, 2),
	(7, 7, 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.promo: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
INSERT IGNORE INTO `promo` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_descuento`, `pro_FechaInicio`, `pro_FechaFin`, `pro_imagen`, `pro_idEstado`) VALUES
	(1, 'Promo1', '', 0, 0, '1970-01-01', '1970-01-01', 'promo1.jpg', NULL),
	(2, 'Promo2', NULL, NULL, NULL, '2017-02-23', '2017-02-23', 'promo2.jpg', NULL),
	(3, 'Promo3', NULL, NULL, NULL, '2017-02-23', '2017-02-23', 'promo3.jpg', NULL);
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;

-- Volcando estructura para tabla deliverydb.promopedido
CREATE TABLE IF NOT EXISTS `promopedido` (
  `ppro_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppro_nombre` varchar(45) DEFAULT NULL,
  `ppro_precioUnitario` float DEFAULT NULL,
  `ppro_cantidad` int(11) DEFAULT NULL,
  `ppro_idPromo` int(11) DEFAULT NULL,
  `ppro_idPedidoEncabezado` int(11) DEFAULT NULL,
  `ppro_detallePp` text,
  `ppro_total` float NOT NULL,
  `ppro_precioBase` float DEFAULT NULL,
  `ppro_aclaracion` mediumtext,
  PRIMARY KEY (`ppro_id`),
  KEY `fk_promopedido_promo1_idx` (`ppro_idPromo`),
  KEY `fk_PromoPedido_PedidoEncabezado1_idx` (`ppro_idPedidoEncabezado`),
  CONSTRAINT `fk_PromoPedido_PedidoEncabezado1` FOREIGN KEY (`ppro_idPedidoEncabezado`) REFERENCES `pedidoencabezado` (`pe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_promopedido_promo1` FOREIGN KEY (`ppro_idPromo`) REFERENCES `promo` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.promopedido: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `promopedido` DISABLE KEYS */;
INSERT IGNORE INTO `promopedido` (`ppro_id`, `ppro_nombre`, `ppro_precioUnitario`, `ppro_cantidad`, `ppro_idPromo`, `ppro_idPedidoEncabezado`, `ppro_detallePp`, `ppro_total`, `ppro_precioBase`, `ppro_aclaracion`) VALUES
	(2, 'promo1 ', 150, 1, 1, 13, 'xxx', 150, 120, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.sucursal: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT IGNORE INTO `sucursal` (`suc_id`, `suc_nombre`, `suc_cuit`, `suc_razonSocial`, `suc_idEmpresa`, `suc_direccion`) VALUES
	(4, 'Centro Iguazu', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167'),
	(6, 'Las Leñas Fondo', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167');
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

-- Volcando datos para la tabla deliverydb.tablasrelacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tablasrelacion` DISABLE KEYS */;
INSERT IGNORE INTO `tablasrelacion` (`idEstado`, `relacion`, `descripcion`, `orden`, `valor`) VALUES
	(1, 'pedidoestado', 'Pendiente', 1, '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.telefonocontacto: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `telefonocontacto` DISABLE KEYS */;
INSERT IGNORE INTO `telefonocontacto` (`tcon_id`, `tcon_numero`, `tcon_descripcion`, `tcon_tipo`, `tcon_idDatoContacto`) VALUES
	(1, '3758483058', 'Watapp1', 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla deliverydb.variedad: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
INSERT IGNORE INTO `variedad` (`var_id`, `var_idProducto`, `var_nombre`, `var_descripcion`, `var_tipo`, `var_precio`) VALUES
	(1, 2, 'Grande', NULL, 'Tamaño', 108),
	(2, 2, 'Chica', NULL, 'Tamaño', 98),
	(3, 1, 'Grande', NULL, 'Tamaño', 135),
	(4, 1, 'Chica', NULL, 'Tamaño', 120),
	(5, 3, 'Chica', NULL, 'Tamaño', 136),
	(6, 3, 'Grande', NULL, 'Tamaño', 152),
	(7, 4, 'Chica', NULL, 'Tamaño', 115),
	(8, 4, 'Grande', NULL, 'Tamaño', 126),
	(9, 5, 'Chica', NULL, 'Tamaño', 142),
	(10, 5, 'Grande', NULL, 'Tamaño', 158),
	(11, 6, 'Chica', NULL, 'Tamaño', 121),
	(12, 6, 'Grande', NULL, 'Tamaño', 132);
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
