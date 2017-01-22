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

-- Volcando datos para la tabla deliverydb.categoria: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_idEstado`, `cat_imagen`) VALUES
	(1, 'milanesas', 'milanesas', 1, NULL),
	(2, 'empanadas', 'empandasa', 1, NULL),
	(3, 'pizas', 'pizzas', 2, NULL),
	(4, 'ensaladas', 'ensaladas', 2, NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.componente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `componente` DISABLE KEYS */;
/*!40000 ALTER TABLE `componente` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.componenteppedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `componenteppedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `componenteppedido` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.componenteproducto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `componenteproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `componenteproducto` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.detallepedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.diahorario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `diahorario` DISABLE KEYS */;
INSERT INTO `diahorario` (`dh_id`, `dh_diaSemana`, `dh_horaApertura`, `dh_horaCierre`, `dh_idSucursal`) VALUES
	(4, 'Lunes', '10:00', '23:00', 4),
	(5, 'Martes', '9:00', '22:00', 4);
/*!40000 ALTER TABLE `diahorario` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.empleado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.empresa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`idEmpresa`, `cuilt`, `telefono`, `logo`, `razonSocial`, `Imagen`, `Rubro`, `Domicilio`, `Email`, `Pais`) VALUES
	(1, '20589634', '375890', 'logo3.jpg', 'Pizza Color Delivery', NULL, 'Gastronomico', 'jj Valle, 167', 'facundokpo04@gmail.com', 'AR');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.listaproductopromopedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `listaproductopromopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `listaproductopromopedido` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.parametros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.pedidoencabezado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidoencabezado` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidoencabezado` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.persona: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.productopedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `productopedido` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.productopromo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productopromo` DISABLE KEYS */;
/*!40000 ALTER TABLE `productopromo` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.promo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.promopedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `promopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `promopedido` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.sucursal: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` (`suc_id`, `suc_nombre`, `suc_cuit`, `suc_razonSocial`, `suc_idEmpresa`, `suc_direccion`) VALUES
	(4, 'Centro', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167'),
	(6, 'Las Leñas Fondo', '2035978', 'Pizza Color Delivery', 1, 'jj valle 167');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.tablasrelacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tablasrelacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tablasrelacion` ENABLE KEYS */;

-- Volcando datos para la tabla deliverydb.variedad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
