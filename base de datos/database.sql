CREATE TABLE `cursos` (
  `curso_id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(7) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `resumen` varchar(500) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `docente` varchar(50) NOT NULL,
  `imagename` varchar(50) NOT NULL,
  `imagecontent` longblob NOT NULL,
  PRIMARY KEY (`curso_id`)
);