-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for deliverydb
CREATE DATABASE IF NOT EXISTS `deliverydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `deliverydb`;

-- Dumping structure for table deliverydb.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(45) DEFAULT NULL,
  `cat_descripcion` text,
  `cat_idEstado` int(11) DEFAULT NULL,
  `cat_imagen` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.categoria: ~4 rows (approximately)
DELETE FROM `categoria`;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_idEstado`, `cat_imagen`) VALUES
	(1, 'milanesas', 'milanesas', 1, NULL),
	(2, 'empanadas', 'empandasa', 1, NULL),
	(3, 'pizas', 'pizzas', 2, NULL),
	(4, 'ensaladas', 'ensaladas', 2, NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Dumping structure for table deliverydb.componente
CREATE TABLE IF NOT EXISTS `componente` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_precio` float NOT NULL,
  `com_idEstado` int(11) NOT NULL,
  `com_Nombre` varchar(45) DEFAULT NULL,
  `com_descripcion` text,
  `com_imagen` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.componente: ~0 rows (approximately)
DELETE FROM `componente`;
/*!40000 ALTER TABLE `componente` DISABLE KEYS */;
/*!40000 ALTER TABLE `componente` ENABLE KEYS */;

-- Dumping structure for table deliverydb.componenteppedido
CREATE TABLE IF NOT EXISTS `componenteppedido` (
  `cpp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpp_idProductoPedido` int(11) NOT NULL,
  `cpp_idComponente` int(11) NOT NULL,
  PRIMARY KEY (`cpp_id`),
  KEY `fk_ComponentePPedido_ProductoPedido1_idx` (`cpp_idProductoPedido`),
  KEY `fk_ComponentePPedido_Componente1_idx` (`cpp_idComponente`),
  CONSTRAINT `fk_ComponentePPedido_Componente1` FOREIGN KEY (`cpp_idComponente`) REFERENCES `componente` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComponentePPedido_ProductoPedido1` FOREIGN KEY (`cpp_idProductoPedido`) REFERENCES `productopedido` (`pp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.componenteppedido: ~0 rows (approximately)
DELETE FROM `componenteppedido`;
/*!40000 ALTER TABLE `componenteppedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `componenteppedido` ENABLE KEYS */;

-- Dumping structure for table deliverydb.componenteproducto
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

-- Dumping data for table deliverydb.componenteproducto: ~0 rows (approximately)
DELETE FROM `componenteproducto`;
/*!40000 ALTER TABLE `componenteproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `componenteproducto` ENABLE KEYS */;

-- Dumping structure for table deliverydb.detallepedido
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.detallepedido: ~0 rows (approximately)
DELETE FROM `detallepedido`;
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;

-- Dumping structure for table deliverydb.diahorario
CREATE TABLE IF NOT EXISTS `diahorario` (
  `dh_id` int(11) NOT NULL,
  `dh_diaSemana` varchar(45) DEFAULT NULL,
  `dh_horaApertura` varchar(45) DEFAULT NULL,
  `dh_horaCierre` varchar(45) DEFAULT NULL,
  `dh_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`dh_id`),
  KEY `fk_DiaHorario_Sucursal1_idx` (`dh_idSucursal`),
  CONSTRAINT `FKdh_idSucursal` FOREIGN KEY (`dh_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.diahorario: ~0 rows (approximately)
DELETE FROM `diahorario`;
/*!40000 ALTER TABLE `diahorario` DISABLE KEYS */;
/*!40000 ALTER TABLE `diahorario` ENABLE KEYS */;

-- Dumping structure for table deliverydb.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `emp_id` int(11) NOT NULL,
  `emp_legajo` varchar(45) DEFAULT NULL,
  `emp_idPersona` int(11) NOT NULL,
  `emp_imagen` varchar(120) NOT NULL,
  `emp_cargo` varchar(45) DEFAULT NULL,
  `emp_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `fk_Empleado_Persona1_idx` (`emp_idPersona`),
  KEY `fk_Empleado_Sucursal1_idx` (`emp_idSucursal`),
  CONSTRAINT `fk_Empleado_Persona1` FOREIGN KEY (`emp_idPersona`) REFERENCES `persona` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleado_Sucursal1` FOREIGN KEY (`emp_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.empleado: ~0 rows (approximately)
DELETE FROM `empleado`;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Dumping structure for table deliverydb.empresa
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

-- Dumping data for table deliverydb.empresa: ~1 rows (approximately)
DELETE FROM `empresa`;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`emp_id`, `Rubro`, `Domicilio`, `Email`, `Pais`, `cuilt`, `telefono`, `logo`, `razonSocial`, `Imagen`) VALUES
	(1, '', '', '', 'null', '', '', '13901452_1631737170472583_6483418430342830576_n.jpg', '', NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Dumping structure for table deliverydb.listaproductopromopedido
CREATE TABLE IF NOT EXISTS `listaproductopromopedido` (
  `ppp_id` int(11) NOT NULL,
  `ppp_idProductoPedido` int(11) NOT NULL,
  `ppp_promoPedido` int(11) NOT NULL,
  PRIMARY KEY (`ppp_id`),
  KEY `fk_ListaProductoPromoPedido_ProductoPedido1_idx` (`ppp_idProductoPedido`),
  KEY `fk_ListaProductoPromoPedido_PromoPedido1_idx` (`ppp_promoPedido`),
  CONSTRAINT `fk_ListaProductoPromoPedido_ProductoPedido1` FOREIGN KEY (`ppp_idProductoPedido`) REFERENCES `productopedido` (`pp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ListaProductoPromoPedido_PromoPedido1` FOREIGN KEY (`ppp_promoPedido`) REFERENCES `promopedido` (`ppro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.listaproductopromopedido: ~0 rows (approximately)
DELETE FROM `listaproductopromopedido`;
/*!40000 ALTER TABLE `listaproductopromopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `listaproductopromopedido` ENABLE KEYS */;

-- Dumping structure for table deliverydb.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `par_id` int(11) NOT NULL,
  `par_zonaEntrega` varchar(45) DEFAULT NULL,
  `par_pedidoMinimo` float DEFAULT NULL,
  `par_tiempoEntrega` int(11) DEFAULT NULL,
  `par_costoEnvio` float DEFAULT NULL,
  `par_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`par_id`),
  KEY `fk_Parametros_Sucursal1_idx` (`par_idSucursal`),
  CONSTRAINT `FKpar_idSucursal ` FOREIGN KEY (`par_idSucursal`) REFERENCES `sucursal` (`suc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.parametros: ~0 rows (approximately)
DELETE FROM `parametros`;
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;

-- Dumping structure for table deliverydb.pedidoencabezado
CREATE TABLE IF NOT EXISTS `pedidoencabezado` (
  `pe_id` int(11) NOT NULL AUTO_INCREMENT,
  `pe_idCliente` varchar(45) DEFAULT NULL,
  `pe_idEmpleado` varchar(45) DEFAULT NULL,
  `pe_aclaraciones` text,
  `pe_comentarios` varchar(45) DEFAULT NULL,
  `pe_idEstado` int(11) DEFAULT NULL,
  `pe_Total` float DEFAULT NULL,
  `Cliente_cli_idPersona` int(11) NOT NULL,
  `Cliente_cli_tel` varchar(45) NOT NULL,
  PRIMARY KEY (`pe_id`),
  UNIQUE KEY `total_UNIQUE` (`pe_Total`),
  KEY `fk_PedidoEncabezado_Cliente1_idx` (`Cliente_cli_idPersona`,`Cliente_cli_tel`),
  CONSTRAINT `fk_PedidoEncabezado_Cliente1` FOREIGN KEY (`Cliente_cli_idPersona`, `Cliente_cli_tel`) REFERENCES `cliente` (`cli_idPersona`, `cli_tel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.pedidoencabezado: ~0 rows (approximately)
DELETE FROM `pedidoencabezado`;
/*!40000 ALTER TABLE `pedidoencabezado` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidoencabezado` ENABLE KEYS */;

-- Dumping structure for table deliverydb.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `per_id` int(11) NOT NULL,
  `per_nombre` varchar(45) NOT NULL,
  `per_email` varchar(45) NOT NULL,
  `per_documento` varchar(45) DEFAULT NULL,
  `per_password` varchar(45) DEFAULT NULL,
  `per_nacionalidad` varchar(45) DEFAULT NULL,
  `per_perfilUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.persona: ~0 rows (approximately)
DELETE FROM `persona`;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Dumping structure for table deliverydb.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_idCategoria` int(11) NOT NULL,
  `prod_codigoProducto` varchar(45) DEFAULT NULL,
  `prod_nombre` varchar(45) DEFAULT NULL,
  `prod_descripcionProducto` text,
  `prod_precioBase` float DEFAULT NULL,
  `prod_maxComponente` int(11) DEFAULT NULL,
  `prod_minComponente` int(11) DEFAULT NULL,
  `prod_idEstado` int(11) DEFAULT NULL,
  `prod_idEstadoVisible` int(11) DEFAULT NULL,
  `prod_idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `fk_Producto_Categoria_idx` (`prod_idCategoria`),
  KEY `fk_Producto_Sucursal1_idx` (`prod_idSucursal`),
  CONSTRAINT `fk_Producto_Categoria0` FOREIGN KEY (`prod_idCategoria`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.producto: ~0 rows (approximately)
DELETE FROM `producto`;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Dumping structure for table deliverydb.productopedido
CREATE TABLE IF NOT EXISTS `productopedido` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_precioBase` float DEFAULT NULL,
  `pp_idProducto` int(11) NOT NULL,
  `pp_idVariedad` int(11) NOT NULL,
  `pp_precioCalc` float DEFAULT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `fk_ProductoPedido_Producto1_idx` (`pp_idProducto`),
  KEY `fk_ProductoPedido_Variedad1_idx` (`pp_idVariedad`),
  CONSTRAINT `fk_ProductoPedido_Producto1` FOREIGN KEY (`pp_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductoPedido_Variedad1` FOREIGN KEY (`pp_idVariedad`) REFERENCES `variedad` (`var_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.productopedido: ~0 rows (approximately)
DELETE FROM `productopedido`;
/*!40000 ALTER TABLE `productopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `productopedido` ENABLE KEYS */;

-- Dumping structure for table deliverydb.productopromo
CREATE TABLE IF NOT EXISTS `productopromo` (
  `ppro_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppro_idPromo` int(11) NOT NULL,
  `ppro_idProducto` int(11) NOT NULL,
  PRIMARY KEY (`ppro_id`),
  KEY `fk_ProductoPromo_Promo1_idx` (`ppro_idPromo`),
  KEY `fk_ProductoPromo_Producto1_idx` (`ppro_idProducto`),
  CONSTRAINT `fk_ProductoPromo_Producto1` FOREIGN KEY (`ppro_idProducto`) REFERENCES `producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductoPromo_Promo1` FOREIGN KEY (`ppro_idPromo`) REFERENCES `promo` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.productopromo: ~0 rows (approximately)
DELETE FROM `productopromo`;
/*!40000 ALTER TABLE `productopromo` DISABLE KEYS */;
/*!40000 ALTER TABLE `productopromo` ENABLE KEYS */;

-- Dumping structure for table deliverydb.promo
CREATE TABLE IF NOT EXISTS `promo` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(45) DEFAULT NULL,
  `pro_descripcion` varchar(45) DEFAULT NULL,
  `pro_precio` float DEFAULT NULL,
  `pro_descuento` float DEFAULT NULL,
  `pro_FechaInicio` date DEFAULT NULL,
  `pro_FechaFin` date DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.promo: ~0 rows (approximately)
DELETE FROM `promo`;
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;

-- Dumping structure for table deliverydb.promopedido
CREATE TABLE IF NOT EXISTS `promopedido` (
  `ppro_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppro_Nombre` varchar(45) DEFAULT NULL,
  `ppro_PrecioUnitario` float DEFAULT NULL,
  `ppro_Cantidad` int(11) DEFAULT NULL,
  `ppro_Total` float NOT NULL,
  `ppro_PrecioBase` float DEFAULT NULL,
  `PedidoEncabezado_pe_id` int(11) NOT NULL,
  PRIMARY KEY (`ppro_id`),
  KEY `fk_PromoPedido_PedidoEncabezado1_idx` (`PedidoEncabezado_pe_id`),
  CONSTRAINT `fk_PromoPedido_PedidoEncabezado1` FOREIGN KEY (`PedidoEncabezado_pe_id`) REFERENCES `pedidoencabezado` (`pe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.promopedido: ~0 rows (approximately)
DELETE FROM `promopedido`;
/*!40000 ALTER TABLE `promopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `promopedido` ENABLE KEYS */;

-- Dumping structure for table deliverydb.sucursal
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

-- Dumping data for table deliverydb.sucursal: ~2 rows (approximately)
DELETE FROM `sucursal`;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` (`suc_id`, `suc_nombre`, `suc_cuit`, `suc_razonSocial`, `suc_idEmpresa`, `suc_direccion`) VALUES
	(4, 'Centro', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167'),
	(6, 'Las Leñas Fondo', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Dumping structure for table deliverydb.tablasrelacion
CREATE TABLE IF NOT EXISTS `tablasrelacion` (
  `idEstado` int(11) NOT NULL,
  `relacion` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `orden` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.tablasrelacion: ~0 rows (approximately)
DELETE FROM `tablasrelacion`;
/*!40000 ALTER TABLE `tablasrelacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tablasrelacion` ENABLE KEYS */;

-- Dumping structure for table deliverydb.variedad
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.variedad: ~0 rows (approximately)
DELETE FROM `variedad`;
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
