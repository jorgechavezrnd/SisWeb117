-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.31 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for CFC
DROP DATABASE IF EXISTS `CFC`;
CREATE DATABASE IF NOT EXISTS `CFC` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `CFC`;

-- Dumping structure for table CFC.Cursos
DROP TABLE IF EXISTS `Cursos`;
CREATE TABLE IF NOT EXISTS `Cursos` (
  `curso_id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(7) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `resumen` varchar(500) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `imagename` varchar(50) DEFAULT NULL,
  `imagecontent` longblob NOT NULL,
  PRIMARY KEY (`curso_id`),
  KEY `FK_Cursos_Docente` (`docente_id`),
  CONSTRAINT `FK_Cursos_Docente` FOREIGN KEY (`docente_id`) REFERENCES `Docente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table CFC.Docente
DROP TABLE IF EXISTS `Docente`;
CREATE TABLE IF NOT EXISTS `Docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
