-- --------------------------------------------------------
-- Host:                         localhost
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

-- Dumping structure for table deliverydb.promopedido
CREATE TABLE IF NOT EXISTS `promopedido` (
  `ppro_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppro_Nombre` varchar(45) DEFAULT NULL,
  `ppro_PrecioUnitario` float DEFAULT NULL,
  `ppro_Cantidad` int(11) DEFAULT NULL,
  `ppro_Total` float NOT NULL,
  `ppro_PrecioBase` float DEFAULT NULL,
  `ppro_pe_id` int(11) NOT NULL,
  PRIMARY KEY (`ppro_id`),
  KEY `fk_PromoPedido_PedidoEncabezado1_idx` (`ppro_pe_id`),
  CONSTRAINT `fk_PromoPedido_PedidoEncabezado1` FOREIGN KEY (`ppro_pe_id`) REFERENCES `pedidoencabezado` (`pe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table deliverydb.promopedido: ~0 rows (approximately)
DELETE FROM `promopedido`;
/*!40000 ALTER TABLE `promopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `promopedido` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
