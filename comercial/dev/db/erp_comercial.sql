-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.33


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema erp_comercial
--

CREATE DATABASE IF NOT EXISTS erp_comercial;
USE erp_comercial;

--
-- Definition of table `erp_comercial`.`AuthAssignment`
--

DROP TABLE IF EXISTS `erp_comercial`.`AuthAssignment`;
CREATE TABLE  `erp_comercial`.`AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`AuthAssignment`
--

/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
LOCK TABLES `AuthAssignment` WRITE;
INSERT INTO `erp_comercial`.`AuthAssignment` VALUES  ('SuperAdmin','1','',''),
 ('administrador','2',NULL,'N;'),
 ('invitado','3',NULL,'N;');
UNLOCK TABLES;
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`AuthItem`
--

DROP TABLE IF EXISTS `erp_comercial`.`AuthItem`;
CREATE TABLE  `erp_comercial`.`AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`AuthItem`
--

/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
LOCK TABLES `AuthItem` WRITE;
INSERT INTO `erp_comercial`.`AuthItem` VALUES  ('SuperAdmin',2,'','',''),
 ('RbacAssignmentEditor',1,'','',''),
 ('RbacViewer',0,'','',''),
 ('RbacEditor',1,'','',''),
 ('RbacAssignmentViewer',0,'','',''),
 ('RbacAdmin',2,'','',''),
 ('registered',2,'Default role by Yii-conf','return !Yii::app()->user->isGuest;',''),
 ('invitado',2,'',NULL,'N;'),
 ('administrador',2,'',NULL,'N;'),
 ('site',1,'',NULL,'N;'),
 ('siteLogin',0,'Autenticación del sistema.',NULL,'N;'),
 ('siteIndex',0,'Indice del sistema.',NULL,'N;'),
 ('siteError',0,'Autenticacion del sistema.',NULL,'N;'),
 ('siteLogout',0,'Salir del sistema.',NULL,'N;'),
 ('siteCiclo',0,'Seleccionar el ciclo del sistema.',NULL,'N;'),
 ('historial',1,'',NULL,'N;'),
 ('historialIndex',0,'Indice del controlador historial .',NULL,'N;'),
 ('historialView',0,'Vista del controlador historial .',NULL,'N;'),
 ('ciclo',1,'',NULL,'N;'),
 ('cicloIndex',0,'Indice del controlador ciclo .',NULL,'N;'),
 ('cicloView',0,'Vista del controlador ciclo .',NULL,'N;'),
 ('cicloUpdate',0,'Actualizar del controlador ciclo .',NULL,'N;'),
 ('cicloCreate',0,'Crear del controlador ciclo .',NULL,'N;'),
 ('cicloAdmin',0,'Administrador del controlador ciclo .',NULL,'N;'),
 ('cicloDelete',0,'Eliminar del controlador ciclo .',NULL,'N;'),
 ('usuario',1,'',NULL,'N;'),
 ('usuarioIndex',0,'Indice del controlador usuario .',NULL,'N;'),
 ('usuarioView',0,'Vista del controlador usuario .',NULL,'N;'),
 ('usuarioUpdate',0,'Actualizar del controlador usuario .',NULL,'N;'),
 ('usuarioCreate',0,'Crear del controlador usuario .',NULL,'N;'),
 ('usuarioAdmin',0,'Administrador del controlador usuario .',NULL,'N;'),
 ('usuarioDelete',0,'Eliminar del controlador usuario .',NULL,'N;'),
 ('usuarioPass',0,'Cambiar el password del usuario.',NULL,'N;'),
 ('permisos',1,'',NULL,'N;'),
 ('permisosCrea',0,'Crear estructura de permisos.',NULL,'N;'),
 ('permisosCrear',0,'Crear estructura de permisos.',NULL,'N;');
UNLOCK TABLES;
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`AuthItemChild`
--

DROP TABLE IF EXISTS `erp_comercial`.`AuthItemChild`;
CREATE TABLE  `erp_comercial`.`AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`AuthItemChild`
--

/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
LOCK TABLES `AuthItemChild` WRITE;
INSERT INTO `erp_comercial`.`AuthItemChild` VALUES  ('administrador','ciclo'),
 ('administrador','historial'),
 ('administrador','usuario'),
 ('ciclo','cicloAdmin'),
 ('ciclo','cicloCreate'),
 ('ciclo','cicloDelete'),
 ('ciclo','cicloIndex'),
 ('ciclo','cicloUpdate'),
 ('ciclo','cicloView'),
 ('historial','historialIndex'),
 ('historial','historialView'),
 ('permisos','permisosCrea'),
 ('permisos','permisosCrear'),
 ('RbacAdmin','RbacAssignmentEditor'),
 ('RbacAdmin','RbacEditor'),
 ('RbacAssignmentEditor','RbacAssignmentViewer'),
 ('RbacEditor','RbacViewer'),
 ('registered','site'),
 ('site','siteCiclo'),
 ('site','siteError'),
 ('site','siteIndex'),
 ('site','siteLogin'),
 ('site','siteLogout'),
 ('SuperAdmin','administrador'),
 ('SuperAdmin','permisos'),
 ('SuperAdmin','RbacAdmin'),
 ('usuario','usuarioAdmin'),
 ('usuario','usuarioCreate'),
 ('usuario','usuarioDelete'),
 ('usuario','usuarioIndex'),
 ('usuario','usuarioPass'),
 ('usuario','usuarioUpdate'),
 ('usuario','usuarioView');
UNLOCK TABLES;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`annio`
--

DROP TABLE IF EXISTS `erp_comercial`.`annio`;
CREATE TABLE  `erp_comercial`.`annio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`annio`
--

/*!40000 ALTER TABLE `annio` DISABLE KEYS */;
LOCK TABLES `annio` WRITE;
INSERT INTO `erp_comercial`.`annio` VALUES  (1,2010),
 (2,2011);
UNLOCK TABLES;
/*!40000 ALTER TABLE `annio` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`aprobacion`
--

DROP TABLE IF EXISTS `erp_comercial`.`aprobacion`;
CREATE TABLE  `erp_comercial`.`aprobacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `version_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aprobacion_FKIndex1` (`usuario_id`),
  KEY `aprobacion_FKIndex2` (`version_id`),
  CONSTRAINT `aprobacion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `aprobacion_ibfk_2` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`aprobacion`
--

/*!40000 ALTER TABLE `aprobacion` DISABLE KEYS */;
LOCK TABLES `aprobacion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `aprobacion` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`cambios`
--

DROP TABLE IF EXISTS `erp_comercial`.`cambios`;
CREATE TABLE  `erp_comercial`.`cambios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `version_id` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `elabora_FKIndex1` (`version_id`),
  KEY `elabora_FKIndex2` (`usuario_id`),
  CONSTRAINT `cambios_ibfk_1` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cambios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`cambios`
--

/*!40000 ALTER TABLE `cambios` DISABLE KEYS */;
LOCK TABLES `cambios` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `cambios` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`ciclo`
--

DROP TABLE IF EXISTS `erp_comercial`.`ciclo`;
CREATE TABLE  `erp_comercial`.`ciclo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `annio_id` int(10) unsigned NOT NULL,
  `clave` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ciclo_FKIndex1` (`annio_id`),
  CONSTRAINT `ciclo_ibfk_1` FOREIGN KEY (`annio_id`) REFERENCES `annio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`ciclo`
--

/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
LOCK TABLES `ciclo` WRITE;
INSERT INTO `erp_comercial`.`ciclo` VALUES  (1,1,2010),
 (3,2,2011);
UNLOCK TABLES;
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`clicategoria`
--

DROP TABLE IF EXISTS `erp_comercial`.`clicategoria`;
CREATE TABLE  `erp_comercial`.`clicategoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`clicategoria`
--

/*!40000 ALTER TABLE `clicategoria` DISABLE KEYS */;
LOCK TABLES `clicategoria` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `clicategoria` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`cliclasificacion`
--

DROP TABLE IF EXISTS `erp_comercial`.`cliclasificacion`;
CREATE TABLE  `erp_comercial`.`cliclasificacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clisubcategoria_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliclasificacion_FKIndex1` (`cliente_id`),
  KEY `cliclasificacion_FKIndex2` (`clisubcategoria_id`),
  CONSTRAINT `cliclasificacion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cliclasificacion_ibfk_2` FOREIGN KEY (`clisubcategoria_id`) REFERENCES `clisubcategoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`cliclasificacion`
--

/*!40000 ALTER TABLE `cliclasificacion` DISABLE KEYS */;
LOCK TABLES `cliclasificacion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `cliclasificacion` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`cliente`
--

DROP TABLE IF EXISTS `erp_comercial`.`cliente`;
CREATE TABLE  `erp_comercial`.`cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `web` varchar(120) NOT NULL,
  `observaciones` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
LOCK TABLES `cliente` WRITE;
INSERT INTO `erp_comercial`.`cliente` VALUES  (1,'FiPa','FiPa Software','http://fipasoft.mx',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`clisubcategoria`
--

DROP TABLE IF EXISTS `erp_comercial`.`clisubcategoria`;
CREATE TABLE  `erp_comercial`.`clisubcategoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clicategoria_id` int(10) unsigned NOT NULL,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isubcategoria_FKIndex1` (`clicategoria_id`),
  CONSTRAINT `clisubcategoria_ibfk_1` FOREIGN KEY (`clicategoria_id`) REFERENCES `clicategoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`clisubcategoria`
--

/*!40000 ALTER TABLE `clisubcategoria` DISABLE KEYS */;
LOCK TABLES `clisubcategoria` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `clisubcategoria` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`concepto`
--

DROP TABLE IF EXISTS `erp_comercial`.`concepto`;
CREATE TABLE  `erp_comercial`.`concepto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `version_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `unitario` double(11,2) NOT NULL,
  `costo` double(11,2) NOT NULL,
  `ganancia` double(11,2) NOT NULL,
  `cantidad` double(12,1) NOT NULL,
  `precio` double(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `concepto_FKIndex1` (`item_id`),
  KEY `concepto_FKIndex2` (`version_id`),
  CONSTRAINT `concepto_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  CONSTRAINT `concepto_ibfk_2` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`concepto`
--

/*!40000 ALTER TABLE `concepto` DISABLE KEYS */;
LOCK TABLES `concepto` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `concepto` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`contacto`
--

DROP TABLE IF EXISTS `erp_comercial`.`contacto`;
CREATE TABLE  `erp_comercial`.`contacto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(5) DEFAULT NULL,
  `cargo` varchar(40) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `ap` varchar(30) DEFAULT NULL,
  `am` varchar(30) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `cel` varchar(10) DEFAULT NULL,
  `domicilio` varchar(254) DEFAULT NULL,
  `trunk` varchar(30) DEFAULT NULL,
  `mail` varchar(70) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `observaciones` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`contacto`
--

/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
LOCK TABLES `contacto` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`contactos`
--

DROP TABLE IF EXISTS `erp_comercial`.`contactos`;
CREATE TABLE  `erp_comercial`.`contactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contacto_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contactos_FKIndex1` (`cliente_id`),
  KEY `contactos_FKIndex2` (`contacto_id`),
  CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contactos_ibfk_2` FOREIGN KEY (`contacto_id`) REFERENCES `contacto` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`contactos`
--

/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
LOCK TABLES `contactos` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`contrato`
--

DROP TABLE IF EXISTS `erp_comercial`.`contrato`;
CREATE TABLE  `erp_comercial`.`contrato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(32) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`contrato`
--

/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
LOCK TABLES `contrato` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`cotiestado`
--

DROP TABLE IF EXISTS `erp_comercial`.`cotiestado`;
CREATE TABLE  `erp_comercial`.`cotiestado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`cotiestado`
--

/*!40000 ALTER TABLE `cotiestado` DISABLE KEYS */;
LOCK TABLES `cotiestado` WRITE;
INSERT INTO `erp_comercial`.`cotiestado` VALUES  (1,'PRO','En proceso'),
 (2,'REV','En revision'),
 (3,'AUT','Autorizada'),
 (4,'RCH','Rechazada'),
 (5,'CAN','Cancelado');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cotiestado` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`cotiestados`
--

DROP TABLE IF EXISTS `erp_comercial`.`cotiestados`;
CREATE TABLE  `erp_comercial`.`cotiestados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cotizacion_id` int(10) unsigned NOT NULL,
  `proestado_id` int(10) unsigned NOT NULL,
  `modified_in` datetime NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ecotizaciones_FKIndex2` (`cotizacion_id`),
  KEY `cotiestados_FKIndex2` (`proestado_id`),
  KEY `cotiestados_FKIndex3` (`proestado_id`),
  CONSTRAINT `cotiestados_ibfk_1` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cotiestados_ibfk_2` FOREIGN KEY (`proestado_id`) REFERENCES `cotiestado` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `cotiestados_ibfk_3` FOREIGN KEY (`proestado_id`) REFERENCES `cotiestado` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`cotiestados`
--

/*!40000 ALTER TABLE `cotiestados` DISABLE KEYS */;
LOCK TABLES `cotiestados` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `cotiestados` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`cotizacion`
--

DROP TABLE IF EXISTS `erp_comercial`.`cotizacion`;
CREATE TABLE  `erp_comercial`.`cotizacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ciclo_id` int(10) unsigned NOT NULL,
  `proestado_id` int(10) unsigned NOT NULL,
  `proyecto_id` int(10) unsigned NOT NULL,
  `nombre` varchar(32) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `saved_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizacion_FKIndex1` (`proyecto_id`),
  KEY `cotizacion_FKIndex2` (`proestado_id`),
  KEY `cotizacion_FKIndex3` (`ciclo_id`),
  CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id`),
  CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`proestado_id`) REFERENCES `cotiestado` (`id`),
  CONSTRAINT `cotizacion_ibfk_3` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`cotizacion`
--

/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
LOCK TABLES `cotizacion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`dfiscal`
--

DROP TABLE IF EXISTS `erp_comercial`.`dfiscal`;
CREATE TABLE  `erp_comercial`.`dfiscal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) unsigned NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  `activo` tinyint(3) unsigned NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `razon` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dfiscal_FKIndex1` (`municipio_id`),
  KEY `dfiscal_FKIndex2` (`cliente_id`),
  CONSTRAINT `dfiscal_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `dfiscal_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`dfiscal`
--

/*!40000 ALTER TABLE `dfiscal` DISABLE KEYS */;
LOCK TABLES `dfiscal` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dfiscal` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`dia`
--

DROP TABLE IF EXISTS `erp_comercial`.`dia`;
CREATE TABLE  `erp_comercial`.`dia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`dia`
--

/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
LOCK TABLES `dia` WRITE;
INSERT INTO `erp_comercial`.`dia` VALUES  (1,'Lunes'),
 (2,'Martes'),
 (3,'Miercole'),
 (4,'Jueves'),
 (5,'Viernes'),
 (6,'Sabado'),
 (7,'Domingo');
UNLOCK TABLES;
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`estado`
--

DROP TABLE IF EXISTS `erp_comercial`.`estado`;
CREATE TABLE  `erp_comercial`.`estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pais_id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_FKIndex1` (`pais_id`),
  CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`estado`
--

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
LOCK TABLES `estado` WRITE;
INSERT INTO `erp_comercial`.`estado` VALUES  (1,1,'AGUASCALIENTES'),
 (2,1,'BAJA CALIFORNIA'),
 (3,1,'BAJA CALIFORNIA SUR'),
 (4,1,'CAMPECHE'),
 (5,1,'CHIAPAS'),
 (6,1,'CHIHUAHUA'),
 (7,1,'COAHUILA'),
 (8,1,'COLIMA'),
 (9,1,'DISTRITO FEDERAL'),
 (10,1,'DURANGO'),
 (11,1,'ESTADO DE MEXICO'),
 (12,1,'GUANAJUATO'),
 (13,1,'GUERRERO'),
 (14,1,'HIDALGO'),
 (15,1,'JALISCO'),
 (16,1,'MICHOACAN'),
 (17,1,'MORELOS'),
 (18,1,'NAYARIT'),
 (19,1,'NUEVO LEON'),
 (20,1,'OAXACA'),
 (21,1,'PUEBLA'),
 (22,1,'QUERETARO'),
 (23,1,'QUINTANA ROO'),
 (24,1,'SAN LUIS POTOSI'),
 (25,1,'SINALOA'),
 (26,1,'SONORA'),
 (27,1,'TABASCO'),
 (28,1,'TAMAULIPAS'),
 (29,1,'TLAXCALA'),
 (30,1,'VERACRUZ'),
 (31,1,'YUCATAN'),
 (32,1,'ZACATECAS');
UNLOCK TABLES;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`historial`
--

DROP TABLE IF EXISTS `erp_comercial`.`historial`;
CREATE TABLE  `erp_comercial`.`historial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ciclo_id` int(10) unsigned DEFAULT NULL,
  `usuario` varchar(16) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `controlador` varchar(32) NOT NULL,
  `accion` varchar(32) NOT NULL,
  `modelo` varchar(32) NOT NULL,
  `registro` varchar(32) NOT NULL,
  `saved_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `historial_FKIndex1` (`ciclo_id`),
  CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`historial`
--

/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
LOCK TABLES `historial` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`hora`
--

DROP TABLE IF EXISTS `erp_comercial`.`hora`;
CREATE TABLE  `erp_comercial`.`hora` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `monto` double(11,2) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`hora`
--

/*!40000 ALTER TABLE `hora` DISABLE KEYS */;
LOCK TABLES `hora` WRITE;
INSERT INTO `erp_comercial`.`hora` VALUES  (1,'EXT','Extra',520.00,'Aplica en las horas fuera de horario normal o en dias festivos.'),
 (2,'EST','Estandar',360.00,'En horario de 9:00 a 17:00 Lunes a Viernes, no aplica dias festivos o vacaciones.'),
 (3,'PRF','Preferencial',240.00,'Aplica para mejorar una cotizacion o para beneficiar instituciones sin fines de lucro.'),
 (4,'UDG','Preferencial UDG',85.00,'Aplica como cortesia a proyectos de UDG que mantiene un nivel de compra anual considerable.'),
 (5,'GRN','Garantia',0.00,'Se aplica a las horas utilizadas para corregir errores y fallas dentro de garantia.'),
 (6,'CRT','Cortesia',0.00,'Se aplica a modificaciones menores y compensaciones.');
UNLOCK TABLES;
/*!40000 ALTER TABLE `hora` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`icategoria`
--

DROP TABLE IF EXISTS `erp_comercial`.`icategoria`;
CREATE TABLE  `erp_comercial`.`icategoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`icategoria`
--

/*!40000 ALTER TABLE `icategoria` DISABLE KEYS */;
LOCK TABLES `icategoria` WRITE;
INSERT INTO `erp_comercial`.`icategoria` VALUES  (1,'PLN','Planeacion'),
 (2,'DEV','Desarrollo'),
 (3,'CNS','Consultoria'),
 (4,'IMP','Implantacion'),
 (5,'INT','Integracion'),
 (6,'CAP','Capacitacion'),
 (7,'MNT','Mantenimiento'),
 (8,'SPT','Soporte'),
 (9,'PRB','Pruebas'),
 (10,'INN','Innovacion');
UNLOCK TABLES;
/*!40000 ALTER TABLE `icategoria` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`isubcategoria`
--

DROP TABLE IF EXISTS `erp_comercial`.`isubcategoria`;
CREATE TABLE  `erp_comercial`.`isubcategoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clicategoria_id` int(10) unsigned NOT NULL,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isubcategoria_FKIndex1` (`clicategoria_id`),
  CONSTRAINT `isubcategoria_ibfk_1` FOREIGN KEY (`clicategoria_id`) REFERENCES `icategoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`isubcategoria`
--

/*!40000 ALTER TABLE `isubcategoria` DISABLE KEYS */;
LOCK TABLES `isubcategoria` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `isubcategoria` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`item`
--

DROP TABLE IF EXISTS `erp_comercial`.`item`;
CREATE TABLE  `erp_comercial`.`item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `moneda_id` int(10) unsigned NOT NULL,
  `clisubcategoria_id` int(10) unsigned NOT NULL,
  `itipo_id` int(10) unsigned NOT NULL,
  `activo` tinyint(3) unsigned NOT NULL,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo` double(11,2) NOT NULL,
  `horas` double(12,1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_FKIndex1` (`itipo_id`),
  KEY `item_FKIndex2` (`clisubcategoria_id`),
  KEY `item_FKIndex3` (`moneda_id`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`itipo_id`) REFERENCES `itipo` (`id`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`clisubcategoria_id`) REFERENCES `isubcategoria` (`id`),
  CONSTRAINT `item_ibfk_3` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`item`
--

/*!40000 ALTER TABLE `item` DISABLE KEYS */;
LOCK TABLES `item` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`itipo`
--

DROP TABLE IF EXISTS `erp_comercial`.`itipo`;
CREATE TABLE  `erp_comercial`.`itipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`itipo`
--

/*!40000 ALTER TABLE `itipo` DISABLE KEYS */;
LOCK TABLES `itipo` WRITE;
INSERT INTO `erp_comercial`.`itipo` VALUES  (1,'PRO','Producto'),
 (2,'SVC','Servicio');
UNLOCK TABLES;
/*!40000 ALTER TABLE `itipo` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`mes`
--

DROP TABLE IF EXISTS `erp_comercial`.`mes`;
CREATE TABLE  `erp_comercial`.`mes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`mes`
--

/*!40000 ALTER TABLE `mes` DISABLE KEYS */;
LOCK TABLES `mes` WRITE;
INSERT INTO `erp_comercial`.`mes` VALUES  (1,'Enero'),
 (2,'Febrero'),
 (3,'Marzo'),
 (4,'Abril'),
 (5,'Mayo'),
 (6,'Junio'),
 (7,'Julio'),
 (8,'Agosto'),
 (9,'Septiembre'),
 (10,'Octubre'),
 (11,'Noviembre'),
 (12,'Diciembre');
UNLOCK TABLES;
/*!40000 ALTER TABLE `mes` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`moneda`
--

DROP TABLE IF EXISTS `erp_comercial`.`moneda`;
CREATE TABLE  `erp_comercial`.`moneda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `valor` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`moneda`
--

/*!40000 ALTER TABLE `moneda` DISABLE KEYS */;
LOCK TABLES `moneda` WRITE;
INSERT INTO `erp_comercial`.`moneda` VALUES  (1,'MXN','Pesos mexicanos'),
 (2,'USD','Dolares american');
UNLOCK TABLES;
/*!40000 ALTER TABLE `moneda` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`municipio`
--

DROP TABLE IF EXISTS `erp_comercial`.`municipio`;
CREATE TABLE  `erp_comercial`.`municipio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado_id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipio_FKIndex1` (`estado_id`),
  CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`municipio`
--

/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
LOCK TABLES `municipio` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`pais`
--

DROP TABLE IF EXISTS `erp_comercial`.`pais`;
CREATE TABLE  `erp_comercial`.`pais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`pais`
--

/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
LOCK TABLES `pais` WRITE;
INSERT INTO `erp_comercial`.`pais` VALUES  (1,'MEXICO','MEX');
UNLOCK TABLES;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`proestado`
--

DROP TABLE IF EXISTS `erp_comercial`.`proestado`;
CREATE TABLE  `erp_comercial`.`proestado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`proestado`
--

/*!40000 ALTER TABLE `proestado` DISABLE KEYS */;
LOCK TABLES `proestado` WRITE;
INSERT INTO `erp_comercial`.`proestado` VALUES  (1,'INI','Inicial'),
 (2,'TRM','En tramite'),
 (3,'AUT','Autorizado'),
 (4,'TRN','Transferido'),
 (5,'DSC','Descontado'),
 (6,'CAN','Cancelado');
UNLOCK TABLES;
/*!40000 ALTER TABLE `proestado` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`proestados`
--

DROP TABLE IF EXISTS `erp_comercial`.`proestados`;
CREATE TABLE  `erp_comercial`.`proestados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proestado_id` int(10) unsigned NOT NULL,
  `modified_in` datetime NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cotiestados_FKIndex1` (`proestado_id`),
  CONSTRAINT `proestados_ibfk_1` FOREIGN KEY (`proestado_id`) REFERENCES `proestado` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`proestados`
--

/*!40000 ALTER TABLE `proestados` DISABLE KEYS */;
LOCK TABLES `proestados` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `proestados` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`proyecto`
--

DROP TABLE IF EXISTS `erp_comercial`.`proyecto`;
CREATE TABLE  `erp_comercial`.`proyecto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proestado_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `clave` varchar(8) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto_FKIndex1` (`cliente_id`),
  KEY `proyecto_FKIndex2` (`proestado_id`),
  CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`proestado_id`) REFERENCES `proestado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`proyecto`
--

/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
LOCK TABLES `proyecto` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`usuario`
--

DROP TABLE IF EXISTS `erp_comercial`.`usuario`;
CREATE TABLE  `erp_comercial`.`usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ap` varchar(20) NOT NULL,
  `am` varchar(20) NOT NULL,
  `mail` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
LOCK TABLES `usuario` WRITE;
INSERT INTO `erp_comercial`.`usuario` VALUES  (1,'root','d033e22ae348aeb5660fc2140aec35850c4da997','_','_','_','_'),
 (2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin','_','_','_'),
 (3,'Guest','Guest','Guest','_','_','_');
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`venta`
--

DROP TABLE IF EXISTS `erp_comercial`.`venta`;
CREATE TABLE  `erp_comercial`.`venta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contrato_id` int(10) unsigned NOT NULL,
  `version_id` int(10) unsigned NOT NULL,
  `consecutivo` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `observaciones` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contrato_FKIndex1` (`version_id`),
  KEY `venta_FKIndex2` (`contrato_id`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`),
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`venta`
--

/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
LOCK TABLES `venta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;


--
-- Definition of table `erp_comercial`.`version`
--

DROP TABLE IF EXISTS `erp_comercial`.`version`;
CREATE TABLE  `erp_comercial`.`version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genera` int(10) unsigned NOT NULL,
  `cotizacion_id` int(10) unsigned NOT NULL,
  `consecutivo` int(10) unsigned DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `observaciones` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `version_FKIndex1` (`cotizacion_id`),
  KEY `version_FKIndex2` (`genera`),
  CONSTRAINT `version_ibfk_1` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizacion` (`id`),
  CONSTRAINT `version_ibfk_2` FOREIGN KEY (`genera`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erp_comercial`.`version`
--

/*!40000 ALTER TABLE `version` DISABLE KEYS */;
LOCK TABLES `version` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `version` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
