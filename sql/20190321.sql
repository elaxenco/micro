/*
SQLyog Ultimate v9.63 
MySQL - 5.5.5-10.1.35-MariaDB : Database - micro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`micro` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `micro`;

/*Table structure for table `acceso_temporal` */

DROP TABLE IF EXISTS `acceso_temporal`;

CREATE TABLE `acceso_temporal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartera_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `acceso_temporal` */

/*Table structure for table `avales` */

DROP TABLE IF EXISTS `avales`;

CREATE TABLE `avales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appaterno` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `apmaterno` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('H','M') COLLATE utf8_unicode_ci DEFAULT NULL,
  `IFE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domicilio_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `avales` */

/*Table structure for table `carteras` */

DROP TABLE IF EXISTS `carteras`;

CREATE TABLE `carteras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=1820;

/*Data for the table `carteras` */

insert  into `carteras`(`id`,`descripcion`) values (1,'CARTERA A'),(2,'CARTERA B'),(3,'CARTERA C'),(4,'CARTERA D'),(6,'CARTERA E'),(7,'CARTERA F'),(9,'CARTERA MINGO'),(10,'CARTERA MORA'),(5,'cartera x');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `appaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apmaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` enum('H','M') COLLATE utf8_unicode_ci NOT NULL,
  `IFE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio_ref` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cartera_id` int(11) NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `capturista_id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `hora_registro` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=3276;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`appaterno`,`apmaterno`,`nombre`,`fecha_nacimiento`,`sexo`,`IFE`,`cp`,`colonia`,`calle`,`domicilio_ref`,`cartera_id`,`telefono`,`capturista_id`,`fecha_registro`,`hora_registro`) values (1,'PONCE','AMARILLAS','SERGIO','2019-02-05','H','65223234','8000','SOLIDARIDAD','ETC','FRENTE A TAQUERIA',1,'6672021233',1,'2019-02-28','13:42:08'),(2,'ASDSADDSA','ASDASDSDA','DSSADASD','2019-02-11','H','212132132','8000','SASASASA','SASASA','SSASA',1,'6672021233',1,'2019-02-28','13:42:48'),(3,'BELTRAN','OLGUIN','JOSE BELTRAN','2019-02-26','H','454545','80450','ELDORADO','ELDORADO','ELDORADO',1,'eldorado',1,'2019-02-28','13:46:56'),(4,'ACEDO','ZEPEDA','LUIS GUILLERMO','2019-03-07','H','454512125','80450','ELDORADN','LDNLNDSLND','DNNDLNLN',1,'7540500',1,'2019-02-28','13:48:37'),(5,'CORRALES','GARCIA','ERIK','2019-02-23','H','852963741','80450','CULIACAN','LKDLKLSK','KLKDLKLD',1,'6672552',1,'2019-02-28','13:49:33'),(6,'MEZA','TORRES','JOSE MANUEL','1990-02-01','H','4544211231574','80000','CENTRO','J MARIA MORESLOS ELDORADO','ELDORADO',2,'663251',1,'2019-03-19','19:09:18'),(7,'ESTANLEY','LEYVA','PACO','1990-02-01','H','8529637411','80000','CENTRO ELDORADO','J MARIA','EN TAMALERIA',2,'523654',1,'2019-03-19','19:19:11'),(8,'PONCE','AMARILLAS','SERGIO','1985-03-01','H','','','CENTRO','','OK',9,'016671922059',1,'2019-03-20','20:04:41');

/*Table structure for table `configuraciones` */

DROP TABLE IF EXISTS `configuraciones`;

CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interes` decimal(10,2) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=16384;

/*Data for the table `configuraciones` */

insert  into `configuraciones`(`id`,`interes`,`tipo_id`) values (1,'0.10',3);

/*Table structure for table `corridas` */

DROP TABLE IF EXISTS `corridas`;

CREATE TABLE `corridas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL DEFAULT '0',
  `desembolso_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `np` int(11) NOT NULL,
  `pago_completo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `capital` decimal(10,2) NOT NULL DEFAULT '0.00',
  `interes` decimal(10,2) NOT NULL DEFAULT '0.00',
  `seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pago_capital` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pago_interes` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pago_seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `saldo` (`saldo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `corridas` */

insert  into `corridas`(`id`,`cliente_id`,`desembolso_id`,`fecha_pago`,`np`,`pago_completo`,`capital`,`interes`,`seguro`,`pago_capital`,`pago_interes`,`pago_seguro`,`saldo`) values (1,5,1,'2019-03-23',1,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(2,5,1,'2019-03-30',2,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(3,5,1,'2019-04-06',3,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(4,5,1,'2019-04-13',4,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(5,5,1,'2019-04-20',5,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(6,5,1,'2019-04-27',6,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(7,5,1,'2019-05-04',7,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(8,5,1,'2019-05-11',8,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(9,5,1,'2019-05-18',9,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(10,5,1,'2019-05-25',10,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(11,5,1,'2019-06-01',11,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(12,5,1,'2019-06-08',12,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(13,5,1,'2019-06-15',13,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00'),(14,5,1,'2019-06-22',14,'535.00','322.00','193.00','20.00','0.00','0.00','0.00','535.00');

/*Table structure for table `corridas_tipo_a` */

DROP TABLE IF EXISTS `corridas_tipo_a`;

CREATE TABLE `corridas_tipo_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desembolso_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `np` int(11) NOT NULL,
  `pago_completo` decimal(10,2) NOT NULL,
  `capital` decimal(10,2) NOT NULL,
  `interes` decimal(10,2) NOT NULL,
  `seguro` decimal(10,2) NOT NULL,
  `pago_capital` decimal(10,2) NOT NULL,
  `pago_interes` decimal(10,2) NOT NULL,
  `pago_seguro` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saldo` (`saldo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `corridas_tipo_a` */

/*Table structure for table `corridas_tipo_c` */

DROP TABLE IF EXISTS `corridas_tipo_c`;

CREATE TABLE `corridas_tipo_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL DEFAULT '0',
  `desembolso_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `pago_completo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `capital` decimal(10,2) NOT NULL DEFAULT '0.00',
  `interes` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estatus_id` int(2) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `corridas_tipo_c` */

insert  into `corridas_tipo_c`(`id`,`cliente_id`,`desembolso_id`,`fecha_pago`,`pago_completo`,`capital`,`interes`,`estatus_id`) values (6,8,3,'2019-03-31','7700.00','7000.00','700.00',5);

/*Table structure for table `departamentos` */

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `departamentos` (
  `Puesto` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `departamentos` */

insert  into `departamentos`(`Puesto`,`Descripcion`) values (1,'Sistemas'),(2,'Mercadotecnia'),(3,'Credito'),(4,'Contabilidad');

/*Table structure for table `desembolsos` */

DROP TABLE IF EXISTS `desembolsos`;

CREATE TABLE `desembolsos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `primer_pago` date DEFAULT NULL,
  `capital` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pago_completo` decimal(10,2) NOT NULL,
  `pago_capital` decimal(10,2) NOT NULL,
  `pago_interes` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pago_seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estatus_id` int(2) DEFAULT '5',
  `tipo_id` int(2) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `capturista_id` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `desembolsos` */

insert  into `desembolsos`(`id`,`fecha`,`primer_pago`,`capital`,`pago_completo`,`pago_capital`,`pago_interes`,`pago_seguro`,`estatus_id`,`tipo_id`,`cliente_id`,`capturista_id`,`fecha_registro`,`hora_registro`) values (1,'2019-03-20','2019-03-23','4500.00','535.00','322.00','193.00','20.00',5,1,5,1,'2019-03-20','20:14:48'),(3,'2019-03-20','2019-03-31','7000.00','7700.00','7000.00','0.00','0.00',5,3,8,1,'2019-03-20','20:09:41');

/*Table structure for table `detalles_cte_aval` */

DROP TABLE IF EXISTS `detalles_cte_aval`;

CREATE TABLE `detalles_cte_aval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `aval_id` int(11) NOT NULL,
  `estatus_id` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `capturista_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `detalles_cte_aval` */

/*Table structure for table `detalles_user_cartera` */

DROP TABLE IF EXISTS `detalles_user_cartera`;

CREATE TABLE `detalles_user_cartera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `cartera_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `detalles_user_cartera` */

/*Table structure for table `detalles_usuario_cartera` */

DROP TABLE IF EXISTS `detalles_usuario_cartera`;

CREATE TABLE `detalles_usuario_cartera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `cartera_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=3276;

/*Data for the table `detalles_usuario_cartera` */

insert  into `detalles_usuario_cartera`(`id`,`usuario_id`,`cartera_id`) values (1,11,1),(2,1,3),(3,3,2),(4,4,4),(5,2,9);

/*Table structure for table `dias_corte` */

DROP TABLE IF EXISTS `dias_corte`;

CREATE TABLE `dias_corte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_mes` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_id` (`tipo_id`),
  CONSTRAINT `dias_corte_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_prestamo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=4096;

/*Data for the table `dias_corte` */

insert  into `dias_corte`(`id`,`dia_mes`,`tipo_id`) values (1,5,2),(2,20,2),(3,5,3),(4,20,3);

/*Table structure for table `domicilios` */

DROP TABLE IF EXISTS `domicilios`;

CREATE TABLE `domicilios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Código Postal` int(11) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Municipio` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Tipo de Asentamiento` varchar(255) DEFAULT NULL,
  `Asentamiento` varchar(255) DEFAULT NULL,
  `Clave de Oficina` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=832 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=119;

/*Data for the table `domicilios` */

insert  into `domicilios`(`id`,`Código Postal`,`Estado`,`Municipio`,`Ciudad`,`Tipo de Asentamiento`,`Asentamiento`,`Clave de Oficina`) values (1,80301,'Sinaloa','Culiacán',NULL,'Pueblo','La Higuerita (Las Higueras de Culiacán)',80001),(2,80302,'Sinaloa','Culiacán',NULL,'Ranchería','La Higuera',80001),(3,80304,'Sinaloa','Culiacán',NULL,'Pueblo','La Higuerita',80001),(4,80305,'Sinaloa','Culiacán',NULL,'Ranchería','El Sifón',80001),(5,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Jardines de San Bartolome',80307),(6,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Rosita',80307),(7,80384,'Sinaloa','Culiacán',NULL,'Ranchería','El Pozo',80001),(8,80385,'Sinaloa','Culiacán',NULL,'Ranchería','La Noria',80001),(9,80393,'Sinaloa','Culiacán',NULL,'Ranchería','Abuya y Ceuta 2',80001),(10,80399,'Sinaloa','Culiacán',NULL,'Ranchería','Las Huertas',80001),(11,80400,'Sinaloa','Culiacán','Quilá','Colonia','Ampliación Unión (Nueva)',80401),(12,80408,'Sinaloa','Culiacán','Quilá','Colonia','Cedros',80401),(13,80408,'Sinaloa','Culiacán','Quilá','Fraccionamiento','La Candelaria',80401),(14,80410,'Sinaloa','Culiacán',NULL,'Pueblo','El Carrizal Dos',80001),(15,80430,'Sinaloa','Culiacán',NULL,'Ranchería','Campo el Seis',80431),(16,80430,'Sinaloa','Culiacán',NULL,'Ejido','Los Becos (Duranguito)',80431),(17,80430,'Sinaloa','Culiacán',NULL,'Colonia','Benito Juárez Norte',80431),(18,80430,'Sinaloa','Culiacán',NULL,'Colonia','Villa Rica',80431),(19,80430,'Sinaloa','Culiacán',NULL,'Colonia','S.T.A.S.A.C.',80431),(20,80430,'Sinaloa','Culiacán',NULL,'Colonia','Veracruz',80431),(21,80434,'Sinaloa','Culiacán',NULL,'Ejido','Campo El Toro',80431),(22,80449,'Sinaloa','Culiacán',NULL,'Ranchería','La Bebelama San Lorenzo',80001),(23,80450,'Sinaloa','Culiacán',NULL,'Colonia','Adolfo Ruiz Cortines',80456),(24,80450,'Sinaloa','Culiacán',NULL,'Pueblo','Las Arenitas',80456),(25,80383,'Sinaloa','Culiacán',NULL,'Ranchería','Los Brasiles',80001),(26,80384,'Sinaloa','Culiacán',NULL,'Ranchería','Portezuelo',80001),(27,80386,'Sinaloa','Culiacán',NULL,'Ranchería','Las Milpas 2',80001),(28,80386,'Sinaloa','Culiacán',NULL,'Ranchería','El Ciruelar',80001),(29,80394,'Sinaloa','Culiacán',NULL,'Ranchería','El Álamo',80001),(30,80398,'Sinaloa','Culiacán',NULL,'Ranchería','El Gato',80001),(31,80402,'Sinaloa','Culiacán','Quilá','Colonia','Alto de Quilá (San Francisco)',80401),(32,80405,'Sinaloa','Culiacán','Quilá','Colonia','Ejidal',80401),(33,80411,'Sinaloa','Culiacán',NULL,'Ranchería','El Porvenir',80001),(34,80430,'Sinaloa','Culiacán',NULL,'Colonia','Nuevas Cañitas',80431),(35,80430,'Sinaloa','Culiacán',NULL,'Colonia','Barrio Estación',80431),(36,80435,'Sinaloa','Culiacán',NULL,'Ejido','Campo Gobierno II',80431),(37,80443,'Sinaloa','Culiacán',NULL,'Ranchería','Los Vasitos',80001),(38,80450,'Sinaloa','Culiacán',NULL,'Colonia','La Huertita',80456),(39,80450,'Sinaloa','Culiacán',NULL,'Colonia','Navito',80456),(40,80450,'Sinaloa','Culiacán',NULL,'Colonia','Los Payes',80456),(41,80450,'Sinaloa','Culiacán',NULL,'Colonia','Ampliación Navito',80456),(42,80450,'Sinaloa','Culiacán',NULL,'Colonia','INFONAVIT San Diego',80456),(43,80450,'Sinaloa','Culiacán',NULL,'Colonia','Mariano Escobedo',80456),(44,80450,'Sinaloa','Culiacán',NULL,'Pueblo','Nuevo Higueral',80456),(45,80453,'Sinaloa','Culiacán',NULL,'Pueblo','Leopoldo Sanchez Celis',80456),(46,80460,'Sinaloa','Culiacán',NULL,'Ranchería','Jacola',80456),(47,80460,'Sinaloa','Culiacán',NULL,'Ranchería','Las Güeras',80456),(48,80492,'Sinaloa','Culiacán',NULL,'Colonia','26 de Abril',80321),(49,80450,'Sinaloa','Culiacán',NULL,'Colonia','5° Álvarez',80456),(50,80450,'Sinaloa','Culiacán',NULL,'Colonia','Bombas de Redo',80456),(51,80460,'Sinaloa','Culiacán',NULL,'Pueblo','El Melón (San Alejandro)',80456),(52,80466,'Sinaloa','Culiacán',NULL,'Pueblo','Rebeca',80456),(53,80467,'Sinaloa','Culiacán',NULL,'Ranchería','El Cuervo',80456),(54,80468,'Sinaloa','Culiacán',NULL,'Pueblo','Península de Villamoros',80379),(55,80470,'Sinaloa','Culiacán',NULL,'Ranchería','Walamito',80001),(56,80484,'Sinaloa','Culiacán',NULL,'Pueblo','Pueblos Unidos',80456),(57,80491,'Sinaloa','Culiacán',NULL,'Estación','Obispo',80456),(58,80491,'Sinaloa','Culiacán',NULL,'Ranchería','San Isidro',80456),(59,80491,'Sinaloa','Culiacán',NULL,'Ranchería','Nuevo Rosarito',80456),(60,80498,'Sinaloa','Culiacán',NULL,'Ranchería','Cospita',80001),(61,80010,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Universidad',80011),(62,80010,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Fresnos',80011),(63,80014,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Lomas de Tamazula',80011),(64,80016,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Juan de Dios Bátiz',80011),(65,80016,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas Del Pedregal',80011),(66,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Fermín',80011),(67,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Olivos',80011),(68,80027,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Campestre Los Laureles',80011),(69,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Sauces',80011),(70,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas de Culiacán',80011),(71,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Campestre Tres Ríos',80011),(72,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','10 de Abril',80011),(73,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Cimas del Humaya',80011),(74,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Heraclio Bernal',80011),(75,80040,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Chapultepec',80011),(76,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Margarita',80011),(77,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Enrique Félix Castro',80001),(78,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Conquista del Rey',80001),(79,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Praderas Del Rey',80001),(80,80064,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Limita de Hitaje',80011),(81,80088,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Satélite',80061),(82,80090,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Vegas',80061),(83,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Álamos',80005),(84,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Ángel',80005),(85,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Misión del Álamo',80005),(86,80105,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Recursos Hidráulicos',80001),(87,80130,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Aeropuerto',80307),(88,80130,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Helechos',80307),(89,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas Del Manantial',80307),(90,80143,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Terranova',80307),(91,80143,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privadas la Estancia',80307),(92,80144,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Joyas del Valle',80307),(93,80159,'Sinaloa','Culiacán','Culiacán Rosales','Unidad habitacional','INFONAVIT Las Flores',80005),(94,80160,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Salvador Alvarado',80005),(95,80170,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','ISSSTE Insurgentes',80005),(96,80176,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas Del Parque',80001),(97,80180,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','PEMEX',80005),(98,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paseos del Rey',80005),(99,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Casa Blanca',80005),(100,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa del Roble',80005),(101,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines Del Valle',80005),(102,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Chulavista',80005),(103,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Parque Andares',80005),(104,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Renato Vega Alvarado',80005),(105,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Barrio de San Luis',80005),(106,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Isla del Oeste',80005),(107,80226,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','IMSS',80001),(108,80247,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Del Real',80061),(109,80247,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Camino Real',80061),(110,80248,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Rincón Feliz',80001),(111,80270,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Margarita',80001),(112,80280,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Mezquitillo',80001),(113,80290,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Providencia',80001),(114,80295,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Alturas del Sur',80001),(115,80300,'Sinaloa','Culiacán',NULL,'Pueblo','Culiacancito',80001),(116,80300,'Sinaloa','Culiacán',NULL,'Estación','Rosales',80001),(117,80300,'Sinaloa','Culiacán',NULL,'Colonia','Insurgentes',80001),(118,80300,'Sinaloa','Culiacán',NULL,'Pueblo','El Diez',80001),(119,80300,'Sinaloa','Culiacán',NULL,'Colonia','Jesús Manuel Camez Valdez',80001),(120,80300,'Sinaloa','Culiacán',NULL,'Ejido','Empaque La Pequeña Joya',80001),(121,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Demetrio Vallejo',80307),(122,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Compuerta',80307),(123,80316,'Sinaloa','Culiacán',NULL,'Ranchería','Tecolotes',80001),(124,80319,'Sinaloa','Culiacán',NULL,'Ranchería','Agua Caliente de los Monzon',80011),(125,80384,'Sinaloa','Culiacán',NULL,'Pueblo','Imala',80001),(126,80385,'Sinaloa','Culiacán',NULL,'Ranchería','La Esmeralda',80001),(127,80386,'Sinaloa','Culiacán',NULL,'Ranchería','Los Mayos',80001),(128,80390,'Sinaloa','Culiacán',NULL,'Pueblo','Baila',80001),(129,80391,'Sinaloa','Culiacán',NULL,'Pueblo','Alcoyonqui',80001),(130,80394,'Sinaloa','Culiacán',NULL,'Pueblo','El Salate',80001),(131,80410,'Sinaloa','Culiacán',NULL,'Ejido','El Carrizal',80001),(132,80410,'Sinaloa','Culiacán',NULL,'Pueblo','Las Tapias',80001),(133,80416,'Sinaloa','Culiacán',NULL,'Ranchería','La Pitahayita',80001),(134,80419,'Sinaloa','Culiacán',NULL,'Pueblo','Libertad (Piramo)',80401),(135,80420,'Sinaloa','Culiacán',NULL,'Colonia','Veracruz',80431),(136,80430,'Sinaloa','Culiacán',NULL,'Colonia','Constituyentes',80431),(137,80430,'Sinaloa','Culiacán',NULL,'Colonia','Las Carpas',80431),(138,80430,'Sinaloa','Culiacán',NULL,'Colonia','INFONAVIT 88',80431),(139,80430,'Sinaloa','Culiacán',NULL,'Colonia','Ignacio Zaragoza',80431),(140,80430,'Sinaloa','Culiacán',NULL,'Colonia','Renato Vega Amador',80431),(141,80434,'Sinaloa','Culiacán',NULL,'Ejido','Campo Nota',80431),(142,80434,'Sinaloa','Culiacán',NULL,'Poblado comunal','Campo Paredes',80431),(143,80434,'Sinaloa','Culiacán',NULL,'Ejido','Empaque del Valle',80431),(144,80434,'Sinaloa','Culiacán',NULL,'Ejido','Santa Lourdes',80431),(145,80439,'Sinaloa','Culiacán',NULL,'Pueblo','Mezquitillo 2',80431),(146,80440,'Sinaloa','Culiacán',NULL,'Pueblo','El Salado',80001),(147,80443,'Sinaloa','Culiacán',NULL,'Ranchería','El Vichi de Abajo',80001),(148,80447,'Sinaloa','Culiacán',NULL,'Pueblo','San Lorenzo Nuevo',80001),(149,80450,'Sinaloa','Culiacán',NULL,'Ranchería','El Higueral',80456),(150,80450,'Sinaloa','Culiacán',NULL,'Colonia','Fidel Velázquez',80456),(151,80450,'Sinaloa','Culiacán',NULL,'Poblado comunal','Santo Niño',80456),(152,80451,'Sinaloa','Culiacán',NULL,'Ranchería','La Chilla',80456),(153,80453,'Sinaloa','Culiacán',NULL,'Ejido','Rebeca II (Metesaca)',80456),(154,80455,'Sinaloa','Culiacán',NULL,'Pueblo','Guadalupe Victoria',80431),(155,80467,'Sinaloa','Culiacán',NULL,'Ejido','Soyatita',80456),(156,80470,'Sinaloa','Culiacán',NULL,'Ranchería','Estancia de los Garcia',80001),(157,80475,'Sinaloa','Culiacán',NULL,'Pueblo','San Lorenzo',80001),(158,80480,'Sinaloa','Culiacán',NULL,'Ranchería','Oso Nuevo',80401),(159,80489,'Sinaloa','Culiacán',NULL,'Ranchería','Higueras de Abuya',80001),(160,80490,'Sinaloa','Culiacán',NULL,'Ejido','El Sinaloense',80456),(161,80490,'Sinaloa','Culiacán',NULL,'Colonia','Emancipación',80456),(162,80490,'Sinaloa','Culiacán',NULL,'Ejido','Francisco Villa',80456),(163,80491,'Sinaloa','Culiacán',NULL,'Ejido','Santa Refugio',80456),(164,80493,'Sinaloa','Culiacán',NULL,'Ranchería','La Guasima',80321),(165,80496,'Sinaloa','Culiacán',NULL,'Ranchería','Chiqueritos',80001),(166,80010,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Arboledas',80011),(167,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Albaterra',80011),(168,80015,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Residencial Hacienda',80011),(169,80018,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bosques Del Álamo',80011),(170,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda Alameda',80011),(171,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Cerezas',80011),(172,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda Los Huertos',80011),(173,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privada La Rivera',80011),(174,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas Del Humaya II',80011),(175,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón Real',80011),(176,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Cumbre Real',80011),(177,80034,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Cisnes',80011),(178,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privada Del Real',80011),(179,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Rioja',80001),(180,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines del Río',80001),(181,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country del Río III',80001),(182,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country del Río IV',80001),(183,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT FTS',80001),(184,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón Colonial',80001),(185,80060,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Aurora',80061),(186,80063,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Viñedos',80061),(187,80063,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Quinta Americana',80061),(188,80064,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Verona',80011),(189,80065,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Banus',80061),(190,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real del Álamo',80005),(191,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Magnolias Residencial',80005),(192,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Inés',80005),(193,80106,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Cantera',80005),(194,80129,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Palacio de Gobierno Del Estado de Sinaloa',80001),(195,80140,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Bachigualato',80307),(196,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda de La Mora',80307),(197,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Residencial Santa Sofía',80307),(198,80150,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Palmillas Residencial',80005),(199,80177,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colina del Rey',80005),(200,80177,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Cúspide',80005),(201,80179,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Cañadas',80005),(202,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Barrancos IV',80005),(203,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Dos Puntas',80005),(204,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Belcantto',80005),(205,80194,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Plutarco Elias Calles',80005),(206,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle de Amapa',80005),(207,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas de San Isidro Sección Cumbres del Sur',80005),(208,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','22 de Diciembre',80005),(209,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Francisco Alarcon Fregoso',80005),(210,80225,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Instituto Tecnológico Regional de Culiacán',80001),(211,80230,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Antonio Rosales',80001),(212,80246,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Vista Hermosa',80001),(213,80247,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Valentino',80061),(214,80249,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','El Pipila',80061),(215,80249,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Amistad',80061),(216,80249,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Ampliación El Barrio',80061),(217,80260,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Rafael Buelna',80001),(218,80300,'Sinaloa','Culiacán',NULL,'Ranchería','El Carrizalejo',80001),(219,80301,'Sinaloa','Culiacán',NULL,'Fraccionamiento','Huertos del Pedregal',80001),(220,80303,'Sinaloa','Culiacán',NULL,'Ranchería','Adolfo Lopez Mateos',80001),(221,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','20 de Noviembre',80307),(222,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Agustina Ramirez',80307),(223,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Aguaruto Viejo',80307),(224,80308,'Sinaloa','Culiacán','Culiacán Rosales','Ejido','Campo Batán',80307),(225,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Amapas',80307),(226,80309,'Sinaloa','Culiacán',NULL,'Ejido','Campo San Javier',80307),(227,80311,'Sinaloa','Culiacán',NULL,'Ranchería','Bagrecitos',80001),(228,80314,'Sinaloa','Culiacán',NULL,'Ejido','Zalate de Los Ibarra',80001),(229,80383,'Sinaloa','Culiacán',NULL,'Ranchería','Puerto Rico (El Reparito)',80001),(230,80383,'Sinaloa','Culiacán',NULL,'Ranchería','El Espinal',80001),(231,80385,'Sinaloa','Culiacán',NULL,'Pueblo','El Limón de Tellaeche',80001),(232,80411,'Sinaloa','Culiacán',NULL,'Ranchería','Las Tranquitas',80001),(233,80419,'Sinaloa','Culiacán',NULL,'Pueblo','Tierra y Libertad',80401),(234,80419,'Sinaloa','Culiacán',NULL,'Ejido','Tierra y Libertad Dos',80401),(235,80419,'Sinaloa','Culiacán',NULL,'Pueblo','La Reforma',80401),(236,80430,'Sinaloa','Culiacán',NULL,'Ejido','Mezquitillo',80431),(237,80430,'Sinaloa','Culiacán',NULL,'Colonia','Cañitas',80431),(238,80430,'Sinaloa','Culiacán',NULL,'Ejido','Campo Arbaco',80431),(239,80430,'Sinaloa','Culiacán',NULL,'Colonia','INFONAVIT Alondras',80431),(240,80434,'Sinaloa','Culiacán',NULL,'Ejido','Campo Cuarenta y Cuatro',80431),(241,80434,'Sinaloa','Culiacán',NULL,'Pueblo','Las Isabeles',80431),(242,80450,'Sinaloa','Culiacán',NULL,'Colonia','Jardines del Sol',80456),(243,80450,'Sinaloa','Culiacán',NULL,'Ranchería','Las Piedritas',80456),(244,80450,'Sinaloa','Culiacán',NULL,'Ampliación','Aviación',80456),(245,80450,'Sinaloa','Culiacán',NULL,'Colonia','Huerta de Redo 1',80456),(246,80450,'Sinaloa','Culiacán',NULL,'Colonia','La Cuchilla',80456),(247,80450,'Sinaloa','Culiacán',NULL,'Poblado comunal','El Robalar',80456),(248,80460,'Sinaloa','Culiacán',NULL,'Ejido','Portacaeli',80456),(249,80460,'Sinaloa','Culiacán',NULL,'Ejido','Nicolás Bravo',80456),(250,80463,'Sinaloa','Culiacán',NULL,'Ranchería','Heraclio Bernal',80456),(251,80000,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Centro Sinaloa',80001),(252,80010,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','6 de Enero',80011),(253,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Amorada',80011),(254,80015,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Ruben Jaramillo',80011),(255,80015,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Lomas Del Magisterio',80011),(256,80016,'Sinaloa','Culiacán','Culiacán Rosales','Ampliación','Buena Vista',80011),(257,80017,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','El Mirador',80011),(258,80018,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Los Alamitos',80011),(259,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Huertos',80011),(260,80019,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Girasoles',80011),(261,80020,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Humaya',80011),(262,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','STASE',80011),(263,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Pueblo Bonito',80011),(264,80024,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Oficinas Corporativas Ley S.A.',80011),(265,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Brisas de Humaya',80011),(266,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','STASE II',80011),(267,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas de La Rivera',80011),(268,80027,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Almendros',80011),(269,80028,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Agustina Ramirez',80011),(270,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Fincas del Humaya',80011),(271,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Fe',80011),(272,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Sección Cumbres',80011),(273,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines de Santa Fe',80011),(274,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bosque Encinos',80011),(275,80030,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Gabriel Leyva',80011),(276,80030,'Sinaloa','Culiacán','Culiacán Rosales','Condominio','Riverside',80011),(277,80050,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Juntas de Humaya',80001),(278,80050,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Valle Del Rio',80001),(279,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle Alto',80001),(280,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Mallorca Residencial',80001),(281,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country del Río II',80001),(282,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Universidad 94',80001),(283,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Azaleas Residencial',80001),(284,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Pradera Dorada II',80001),(285,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Portalegre',80001),(286,80060,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Periodista',80061),(287,80063,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Amapas',80061),(288,80080,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Punto Oriente',80061),(289,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Portales Del Country',80005),(290,80102,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Secretaria de Agricultura Ganadería y Desarrollo Rural',80001),(291,80103,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Unidad de Servicios Educativos A Descentralizar',80001),(292,80104,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Tabachines',80005),(293,80107,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country Tres Ríos',80005),(294,80110,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','El Vallado',80005),(295,80130,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Andalucía',80307),(296,80135,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda San Juan',80307),(297,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas de Cortés',80307),(298,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paraíso',80307),(299,80143,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valles Del Sol',80307),(300,80143,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Fernando',80307),(301,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Stanza Solare',80307),(302,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Torre Dorada',80307),(303,80159,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Serena',80005),(304,80178,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Victoria',80005),(305,80179,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas del Bosque',80005),(306,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Clara',80005),(307,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Balcones Del Valle',80005),(308,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Barrancos II',80005),(309,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Susana',80005),(310,80190,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Josefa Ortiz de Dominguez',80005),(311,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Capistrano Residencial',80005),(312,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas Paraíso',80005),(313,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas de San Isidro',80005),(314,80197,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Progreso',80005),(315,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Francisco Labastida Ochoa',80005),(316,80199,'Sinaloa','Culiacán','Culiacán Rosales','Residencial','La Primavera',80005),(317,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Campos Elíseos',80005),(318,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real de Minas',80005),(319,80227,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Montebello Sección Dalí',80001),(320,80230,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Melchor Ocampo',80001),(321,80247,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','5 de Febrero',80061),(322,80247,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Torralba',80061),(323,80247,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Florenza',80061),(324,80248,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Revolución',80001),(325,80280,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','21 de Marzo',80001),(326,80280,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Cascada',80001),(327,80296,'Sinaloa','Culiacán','Culiacán Rosales','Ampliación','Antonio Toledo Corro',80001),(328,80299,'Sinaloa','Culiacán','Culiacán Rosales','Zona comercial','Mercado de Abastos',80001),(329,80300,'Sinaloa','Culiacán',NULL,'Colonia','El Ranchito',80001),(330,80300,'Sinaloa','Culiacán',NULL,'Ejido','Campo El Huarache',80001),(331,80300,'Sinaloa','Culiacán',NULL,'Fraccionamiento','Costa del Sol',80001),(332,80301,'Sinaloa','Culiacán',NULL,'Pueblo','Bellavista',80001),(333,80301,'Sinaloa','Culiacán',NULL,'Pueblo','La Presita',80001),(334,80301,'Sinaloa','Culiacán',NULL,'Pueblo','Bacurimi',80001),(335,80301,'Sinaloa','Culiacán',NULL,'Ranchería','Campo Morelia',80001),(336,80302,'Sinaloa','Culiacán',NULL,'Pueblo','La Campana',80001),(337,80304,'Sinaloa','Culiacán',NULL,'Pueblo','Acapulco',80001),(338,80304,'Sinaloa','Culiacán',NULL,'Pueblo','Paredones',80001),(339,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Nueva',80307),(340,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Ceiba',80307),(341,80309,'Sinaloa','Culiacán',NULL,'Pueblo','San Juan',80307),(342,80316,'Sinaloa','Culiacán',NULL,'Ranchería','San Rafael',80001),(343,80317,'Sinaloa','Culiacán',NULL,'Ranchería','Tepuchito',80001),(344,80318,'Sinaloa','Culiacán',NULL,'Ranchería','Agua Blanca',80011),(345,80387,'Sinaloa','Culiacán',NULL,'Ranchería','Las Vinoramas',80001),(346,80398,'Sinaloa','Culiacán',NULL,'Ejido','Campo El Sol (Campo Pegaso)',80001),(347,80398,'Sinaloa','Culiacán',NULL,'Ejido','Canán',80001),(348,80403,'Sinaloa','Culiacán','Quilá','Colonia','Unión',80401),(349,80408,'Sinaloa','Culiacán','Quilá','Colonia','Bellavista',80401),(350,80430,'Sinaloa','Culiacán',NULL,'Estación','El Alhuate',80431),(351,80430,'Sinaloa','Culiacán',NULL,'Colonia','18 de Marzo',80431),(352,80430,'Sinaloa','Culiacán',NULL,'Colonia','Juan de Dios Bátiz',80431),(353,80430,'Sinaloa','Culiacán',NULL,'Colonia','Solidaridad',80431),(354,80430,'Sinaloa','Culiacán',NULL,'Fraccionamiento','San Ángel',80431),(355,80430,'Sinaloa','Culiacán',NULL,'Colonia','INFONAVIT Prados del Sol',80431),(356,80430,'Sinaloa','Culiacán',NULL,'Colonia','Los Chinitos',80431),(357,80434,'Sinaloa','Culiacán',NULL,'Ejido','Campo El Conejo (Campo Esperazna)',80431),(358,80439,'Sinaloa','Culiacán',NULL,'Ejido','Mezquitillo (La Curva)',80431),(359,80450,'Sinaloa','Culiacán',NULL,'Colonia','Lienzo Charro',80456),(360,80450,'Sinaloa','Culiacán',NULL,'Colonia','Quinto Patio',80456),(361,80450,'Sinaloa','Culiacán',NULL,'Colonia','Alejandro Redo',80456),(362,80450,'Sinaloa','Culiacán',NULL,'Colonia','La Aviación',80456),(363,80450,'Sinaloa','Culiacán',NULL,'Ejido','Campo Champo',80456),(364,80453,'Sinaloa','Culiacán',NULL,'Pueblo','El Manguito',80456),(365,80454,'Sinaloa','Culiacán',NULL,'Rancho','Santa Rita (Tableta)',80456),(366,80454,'Sinaloa','Culiacán',NULL,'Ejido','La Flor',80456),(367,80457,'Sinaloa','Culiacán',NULL,'Ejido','El Rosarito',80456),(368,80460,'Sinaloa','Culiacán',NULL,'Hacienda','El Camalote',80456),(369,80467,'Sinaloa','Culiacán',NULL,'Pueblo','El Conchal',80456),(370,80467,'Sinaloa','Culiacán',NULL,'Pueblo','Soyatita (Cruz Segunda)',80456),(371,80475,'Sinaloa','Culiacán',NULL,'Pueblo','Tabala',80001),(372,80480,'Sinaloa','Culiacán',NULL,'Ranchería','La Loma',80401),(373,80481,'Sinaloa','Culiacán',NULL,'Ranchería','Las Flores',80001),(374,80491,'Sinaloa','Culiacán',NULL,'Ejido','El Retiro',80456),(375,80492,'Sinaloa','Culiacán',NULL,'Villa','Villa Adolfo Lopez Mateos',80321),(376,80007,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Universidad Autónoma de Sinaloa',80001),(377,80015,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Campestre',80011),(378,80015,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Solidaridad',80011),(379,80018,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Espacios Marsella',80011),(380,80019,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Los Mezcales',80011),(381,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','STASE III',80011),(382,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Nueva Vizcaya',80011),(383,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas de la Rivera Segunda Sección',80011),(384,80027,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','3 Ríos',80011),(385,80027,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Altamira',80011),(386,80028,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Campestre San Jorge',80011),(387,80030,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Burócrata',80011),(388,80034,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Comunicadores',80011),(389,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Riberas de Tamazula',80011),(390,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Stanza Toscana',80001),(391,80054,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Horizontes',80001),(392,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Solidaridad',80001),(393,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Acueducto',80001),(394,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Pedregal de San Angel',80001),(395,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Altos Bacurimi',80001),(396,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa del Cedro',80001),(397,80059,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','CANACO',80001),(398,80059,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Espacios Barcelona',80001),(399,80059,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Praderas del Humaya',80001),(400,80060,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Quintas',80061),(401,80064,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Haciendas del Río',80011),(402,80065,'Sinaloa','Culiacán','Culiacán Rosales','Pueblo','Músala Isla Bonita',80061),(403,80065,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Banus 360',80061),(404,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines Tres Ríos',80005),(405,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Residencial San José',80005),(406,80104,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Flores',80005),(407,80107,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Flores',80005),(408,80120,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Industrial Bravo',80005),(409,80135,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','San Javier',80307),(410,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Mañanitas',80307),(411,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Luis Residencial',80307),(412,80013,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Ciudad Universitaria',80011),(413,80013,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Obrero Campesino',80011),(414,80013,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Universitaria',80011),(415,80014,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Buena Vista',80011),(416,80014,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Rosario Uzarraga',80011),(417,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Maralago',80011),(418,80015,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Villa Del Sol',80011),(419,80015,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Grecia',80011),(420,80016,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Interlomas',80011),(421,80019,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Rotarismo',80011),(422,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Humaya',80011),(423,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bosques del Humaya',80011),(424,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines del Rey',80011),(425,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Humaya del Super',80011),(426,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Portafe',80011),(427,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Cascada',80011),(428,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Portanova',80011),(429,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Colinas Del Humaya',80011),(430,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','FOVISSSTE Humaya',80011),(431,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Fe Real',80011),(432,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Chapultepec Del Rio',80011),(433,80050,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Hermanos Flores Magón',80001),(434,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas Del Rio Elite',80001),(435,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Prados de Occidente',80001),(436,80054,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','4 de Marzo',80001),(437,80054,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Montecarlo Residencial',80001),(438,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas San Antonio',80001),(439,80059,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Barcelona Sección Villa Barcelona',80001),(440,80060,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Campiña',80061),(441,80070,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Vicente Guerrero',80061),(442,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Patios 1',80005),(443,80100,'Sinaloa','Culiacán','Culiacán Rosales','Residencial','Las Moras',80005),(444,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Dunas',80005),(445,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Condesa',80005),(446,80104,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real Del Country',80005),(447,80105,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Vallado Viejo',80001),(448,80109,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Unidad de Servicios Estatales',80005),(449,80135,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Nuevo Bachigualato',80307),(450,80139,'Sinaloa','Culiacán','Culiacán Rosales','Aeropuerto','Culiacán (Culiacán)',80307),(451,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Campo Bello',80307),(452,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Diego',80307),(453,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Alondras',80307),(454,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bugambilias',80307),(455,80155,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda Molino de Flores',80005),(456,80170,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Nuevo Culiacán',80005),(457,80177,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Loma Linda',80005),(458,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Portales',80005),(459,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Barrancos III',80005),(460,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Centenario',80005),(461,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','El Olivar',80005),(462,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Azucena',80005),(463,80190,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Aquiles Serdán',80005),(464,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paseo Azteca',80005),(465,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas del Bosque',80005),(466,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Bonita',80005),(467,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Barrio de San Anselmo',80005),(468,80220,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Guadalupe',80001),(469,80228,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas de San Miguel',80001),(470,80240,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','San Juan',80001),(471,80246,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Banjercito',80001),(472,80247,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','7 Gotas',80061),(473,80250,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas de Guadalupe',80001),(474,80280,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Renato Vega Amador',80001),(475,80290,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Lázaro Cárdenas',80001),(476,80290,'Sinaloa','Culiacán','Culiacán Rosales','Ampliación','Lázaro Cárdenas',80001),(477,80290,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Simon Bolívar',80001),(478,80295,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Ilusiones',80001),(479,80295,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Miguel de La Madrid',80001),(480,80296,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Antonio Toledo Corro',80001),(481,80301,'Sinaloa','Culiacán',NULL,'Fraccionamiento','Cantabria',80001),(482,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Luis Donaldo Colosio',80307),(483,80313,'Sinaloa','Culiacán',NULL,'Pueblo','La Anona',80001),(484,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Luis Residencial II',80307),(485,80143,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Bárbara',80307),(486,80144,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Torres Aeropuerto',80307),(487,80145,'Sinaloa','Culiacán','Culiacán Rosales','Zona industrial','Parque Industrial Orión',80307),(488,80150,'Sinaloa','Culiacán','Culiacán Rosales','Zona industrial','Parque Industrial CANACINTRA II',80005),(489,80150,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón San Rafael',80005),(490,80159,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Palmas',80005),(491,80178,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Carlos',80005),(492,80180,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Gustavo Díaz Ordaz',80005),(493,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Loma Bonita',80005),(494,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT Barrancos',80005),(495,80190,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Adolfo Ruiz Cortinez',80005),(496,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Antonio Nakayama',80005),(497,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Finisterra',80005),(498,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real Del Parque',80005),(499,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Urbi Villa del Sol',80005),(500,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Prados Residencial',80005),(501,80197,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Esthela Ortiz de Toledo',80005),(502,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Prados Del Sol',80005),(503,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda Del Valle',80005),(504,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Ibérica',80005),(505,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Barrio San Francisco',80005),(506,80247,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Portareal',80061),(507,80249,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Campesina El Barrio',80061),(508,80249,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Constitución CROC',80061),(509,80295,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Nueva Galicia',80001),(510,80296,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','12 de Diciembre',80001),(511,80296,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','8 de Febrero',80001),(512,80296,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Prados Del Sur',80001),(513,80297,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Nuevo México',80001),(514,80300,'Sinaloa','Culiacán',NULL,'Ranchería','El Quemadito',80001),(515,80300,'Sinaloa','Culiacán',NULL,'Ejido','Campo Esperanza',80001),(516,80300,'Sinaloa','Culiacán',NULL,'Pueblo','Argentina Dos',80001),(517,80300,'Sinaloa','Culiacán',NULL,'Ejido','Campo El Cardenal I',80001),(518,80300,'Sinaloa','Culiacán',NULL,'Parque industrial','El Trébol',80001),(519,80303,'Sinaloa','Culiacán',NULL,'Ejido','Campo San Emilio',80001),(520,80305,'Sinaloa','Culiacán',NULL,'Ranchería','Palos Blancos',80001),(521,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Aguaruto Centro',80307),(522,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Miguel Hidalgo',80307),(523,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Presidentes de México',80307),(524,80309,'Sinaloa','Culiacán',NULL,'Pueblo','San Antonio',80307),(525,80310,'Sinaloa','Culiacán',NULL,'Pueblo','Jesús María',80001),(526,80315,'Sinaloa','Culiacán',NULL,'Poblado comunal','Paso del Norte',80011),(527,80383,'Sinaloa','Culiacán',NULL,'Ranchería','Tomo',80001),(528,80384,'Sinaloa','Culiacán',NULL,'Pueblo','Los Naranjos',80001),(529,80394,'Sinaloa','Culiacán',NULL,'Pueblo','La Guamuchilera',80001),(530,80396,'Sinaloa','Culiacán',NULL,'Ranchería','San Román',80001),(531,80398,'Sinaloa','Culiacán',NULL,'Ranchería','San Rafael de Costa Rica',80001),(532,80398,'Sinaloa','Culiacán',NULL,'Ejido','Campo Nuevo México',80001),(533,80398,'Sinaloa','Culiacán',NULL,'Ejido','NCPE El 30',80001),(534,80415,'Sinaloa','Culiacán',NULL,'Ejido','Campo Laguna',80001),(535,80419,'Sinaloa','Culiacán',NULL,'Pueblo','Tierra y Libertad 1',80401),(536,80419,'Sinaloa','Culiacán',NULL,'Ejido','Comanito',80401),(537,80430,'Sinaloa','Culiacán',NULL,'Colonia','Centro',80431),(538,80430,'Sinaloa','Culiacán',NULL,'Ejido','Los Becos',80431),(539,80430,'Sinaloa','Culiacán',NULL,'Colonia','Benito Juárez Sur',80431),(540,80430,'Sinaloa','Culiacán',NULL,'Colonia','Popular',80431),(541,80430,'Sinaloa','Culiacán',NULL,'Ejido','Campo Santa Lucía',80431),(542,80430,'Sinaloa','Culiacán',NULL,'Colonia','Las Piedritas',80431),(543,80430,'Sinaloa','Culiacán',NULL,'Colonia','Francisco Villa',80431),(544,80434,'Sinaloa','Culiacán',NULL,'Ranchería','Campo 5 y Medio',80431),(545,80439,'Sinaloa','Culiacán',NULL,'Ranchería','Campo Mezquitillo 2',80431),(546,80439,'Sinaloa','Culiacán',NULL,'Ejido','Campo Eureka',80431),(547,80441,'Sinaloa','Culiacán',NULL,'Ranchería','El Vizcaíno',80001),(548,80442,'Sinaloa','Culiacán',NULL,'Ranchería','La Estancia de los Burgos',80001),(549,80450,'Sinaloa','Culiacán',NULL,'Fraccionamiento','Villa Eldorado',80456),(550,80450,'Sinaloa','Culiacán',NULL,'Colonia','Ruben Jaramillo',80456),(551,80450,'Sinaloa','Culiacán',NULL,'Ejido','Campo San Martín',80456),(552,80452,'Sinaloa','Culiacán',NULL,'Pueblo','Mezquitillo Nuevo',80431),(553,80453,'Sinaloa','Culiacán',NULL,'Pueblo','Las Tres Gotas de Agua',80456),(554,80463,'Sinaloa','Culiacán',NULL,'Ranchería','La Cruz Del Dorado',80456),(555,80464,'Sinaloa','Culiacán',NULL,'Ranchería','La Constancia',80456),(556,80470,'Sinaloa','Culiacán',NULL,'Ranchería','Tacuichamona',80001),(557,80483,'Sinaloa','Culiacán',NULL,'Pueblo','Oso Viejo',80401),(558,80485,'Sinaloa','Culiacán',NULL,'Estación','Emiliano Zapata O Estación Obispo',80456),(559,80490,'Sinaloa','Culiacán',NULL,'Ranchería','Campo Agrícola San Miguel',80456),(560,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Zona Dorada II',80011),(561,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Sfera Residencial',80011),(562,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Angeles',80011),(563,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Floresta',80011),(564,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Zona Dorada',80011),(565,80016,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Américas',80011),(566,80016,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas del Sol Duplex',80011),(567,80018,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lirios del Río',80011),(568,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda los Huertos Sección Bosques de la Colina',80011),(569,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Alameda',80011),(570,80020,'Sinaloa','Culiacán','Culiacán Rosales','Zona comercial','Desarrollo Urbano 3 Ríos',80011),(571,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Riberas del Humaya',80011),(572,80026,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','ISSSTESIN',80011),(573,80027,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Cuauhtémoc',80011),(574,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Elena',80011),(575,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Fontana',80011),(576,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Balcones Del Humaya',80011),(577,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Puerta',80011),(578,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Los Cerritos',80011),(579,80030,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privada La Joya',80011),(580,80030,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Parque Alameda',80011),(581,80030,'Sinaloa','Culiacán','Culiacán Rosales','Residencial','Los Olivos',80011),(582,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bosques Del Rio',80001),(583,80054,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Pradera Dorada 3a Etapa',80001),(584,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón Del Humaya',80001),(585,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Stanza Castilla',80001),(586,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Conquista',80001),(587,80058,'Sinaloa','Culiacán','Culiacán Rosales','Residencial','Diamante',80001),(588,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bonaterra',80001),(589,80080,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Genaro Estrada',80061),(590,80107,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country Courts',80005),(591,80120,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Popular',80005),(592,80130,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Altos de Bachigualato',80307),(593,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Danubio',80307),(594,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real San Ángel',80307),(595,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paseos del Valle',80307),(596,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Versalles',80307),(597,80150,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón Las Palmas',80005),(598,80150,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Palma Dorada',80005),(599,80170,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Virreyes SC',80005),(600,80177,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privada Del Rey',80005),(601,80177,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Misión San Fernando',80005),(602,80178,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Palomas',80005),(603,80179,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Ventana',80005),(604,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paseo de los Arcos',80005),(605,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Casas Lindas',80005),(606,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Del Camino',80005),(607,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Sebastián',80005),(608,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Miravalle',80005),(609,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Colonial',80005),(610,80190,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Independencia',80005),(611,80194,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Ferrocarrilera',80005),(612,80194,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Colinas del Sol',80005),(613,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Francisco I. Madero',80005),(614,80210,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Benito Juárez',80061),(615,80240,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Guadalupe Victoria',80001),(616,80248,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Esperanza',80001),(617,80248,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Servidor Publico Municipal',80001),(618,80279,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','República Mexicana',80001),(619,80280,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Estrella Nueva Galicia',80001),(620,80300,'Sinaloa','Culiacán',NULL,'Ejido','Los Huizaches',80001),(621,80300,'Sinaloa','Culiacán',NULL,'Ejido','Campo El Chorizo',80001),(622,80303,'Sinaloa','Culiacán',NULL,'Rancho','Estación Vitaruto',80001),(623,80305,'Sinaloa','Culiacán',NULL,'Pueblo','El Limón de los Ramos',80001),(624,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Palmas',80307),(625,80380,'Sinaloa','Culiacán',NULL,'Ranchería','Sanalona',80001),(626,80402,'Sinaloa','Culiacán','Quilá','Colonia','Santa María',80401),(627,80419,'Sinaloa','Culiacán',NULL,'Ranchería','Valle Escondido',80401),(628,80430,'Sinaloa','Culiacán',NULL,'Fraccionamiento','Prados del Sol',80431),(629,80430,'Sinaloa','Culiacán',NULL,'Ranchería','Arkadia Uno (El Siete)',80431),(630,80430,'Sinaloa','Culiacán',NULL,'Pueblo','Miguel Valdez Quintero (El Corazón)',80431),(631,80430,'Sinaloa','Culiacán',NULL,'Colonia','Sinaloa',80431),(632,80430,'Sinaloa','Culiacán',NULL,'Colonia','General Zapata',80431),(633,80430,'Sinaloa','Culiacán',NULL,'Colonia','Ingenio',80431),(634,80430,'Sinaloa','Culiacán',NULL,'Colonia','Independencia',80431),(635,80430,'Sinaloa','Culiacán',NULL,'Colonia','Revolución',80431),(636,80434,'Sinaloa','Culiacán',NULL,'Ejido','Campo Isabelitas',80431),(637,80441,'Sinaloa','Culiacán',NULL,'Ranchería','Monte Verde de Villa',80001),(638,80444,'Sinaloa','Culiacán',NULL,'Pueblo','El Realito',80001),(639,80450,'Sinaloa','Culiacán',NULL,'Colonia','Eldorado Viejo',80456),(640,80450,'Sinaloa','Culiacán',NULL,'Colonia','Renato Vega Amador',80456),(641,80450,'Sinaloa','Culiacán',NULL,'Ranchería','San Diego',80456),(642,80450,'Sinaloa','Culiacán',NULL,'Colonia','Los Cuartos',80456),(643,80450,'Sinaloa','Culiacán',NULL,'Colonia','Huerta de Redo 2',80456),(644,80450,'Sinaloa','Culiacán',NULL,'Colonia','INFONAVIT San Diego 2',80456),(645,80450,'Sinaloa','Culiacán',NULL,'Pueblo','El Saucito Nuevo',80456),(646,80454,'Sinaloa','Culiacán',NULL,'Ejido','La Flor (Metesaca)',80456),(647,80460,'Sinaloa','Culiacán',NULL,'Ranchería','Laguna de Canachi',80456),(648,80460,'Sinaloa','Culiacán',NULL,'Ejido','El Huinacaxtle',80456),(649,80463,'Sinaloa','Culiacán',NULL,'Ejido','Loma y Tecomate',80456),(650,80480,'Sinaloa','Culiacán',NULL,'Estación','Quila',80401),(651,80496,'Sinaloa','Culiacán',NULL,'Estación','Abuya',80001),(652,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle del Agua',80011),(653,80015,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas de San Jerónimo',80011),(654,80016,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas del Sol',80011),(655,80017,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Jesús Valdez Aldana',80011),(656,80019,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Loma de Rodriguera',80011),(657,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Canarias',80011),(658,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Alegranza',80011),(659,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Pedregal del Humaya',80011),(660,80029,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real de Santa Fe',80011),(661,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Lomas Del Humaya',80011),(662,80029,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Santa Rosa',80011),(663,80030,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Tierra Blanca',80011),(664,80034,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón Alameda',80011),(665,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','FOVISSSTE Abelardo de La Torre',80011),(666,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paseo Del Rio',80011),(667,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Teresa',80011),(668,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas Del Rio',80001),(669,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country del Río I',80001),(670,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Avellaneda',80001),(671,80054,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Del Humaya',80001),(672,80055,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Universidad 94 II',80001),(673,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Florencio',80001),(674,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas Victoria',80001),(675,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valencia',80001),(676,80058,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','9 de Marzo',80001),(677,80063,'Sinaloa','Culiacán','Culiacán Rosales','Residencial','Los Pinos',80061),(678,80080,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','INFONAVIT El Barrio',80061),(679,80090,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Miguel Hidalgo',80061),(680,80093,'Sinaloa','Culiacán','Culiacán Rosales','Zona federal','Novena Zona Militar',80061),(681,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Country Álamos',80005),(682,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Paloma',80005),(683,80128,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Los Pinos',80005),(684,80130,'Sinaloa','Culiacán','Culiacán Rosales','Conjunto habitacional','Bachigualato',80307),(685,80135,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Rocio',80307),(686,80135,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas del Campo',80307),(687,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Terrazas',80307),(688,80143,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real San Sebastián',80307),(689,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privada Real del Valle',80307),(690,80145,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valles Españoles',80307),(691,80150,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','San Rafael',80005),(692,80155,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Fuentes Del Valle',80005),(693,80159,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Contenta',80005),(694,80160,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Industrial El Palmito',80005),(695,80170,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Morelos',80005),(696,80176,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Balcones de San Miguel',80001),(697,80177,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Alteza',80005),(698,80178,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Cañadas',80005),(699,80180,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Libertad',80005),(700,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Girasoles',80005),(701,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Agustin',80005),(702,80189,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón de Santa Rosa',80005),(703,80190,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Adolfo Lopez Mateos',80005),(704,80194,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Domingo Rubí',80005),(705,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle de Encino',80005),(706,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle Real',80005),(707,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Amado Nervo',80005),(708,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Buenos Aires',80005),(709,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Barrio San José',80005),(710,80199,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Barrio San Agustín',80005),(711,80227,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Montebello',80001),(712,80230,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','5 de Mayo',80001),(713,80246,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Florida',80001),(714,80246,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Laureles Pinos',80001),(715,80246,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Coloradas',80001),(716,80270,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','10 de Mayo',80001),(717,80290,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Huertas',80001),(718,80294,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Córcega',80001),(719,80296,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Costera',80001),(720,80000,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Centro',80001),(721,80010,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Ignacio Allende',80011),(722,80010,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Vicente Lombardo Toledano',80011),(723,80014,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Agrarista Mexicana',80011),(724,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Portabelo',80011),(725,80014,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Nueva Galaxia',80011),(726,80014,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Las Glorias',80011),(727,80016,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','16 de Septiembre',80011),(728,80017,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Montesierra',80011),(729,80018,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Las Cucas',80011),(730,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Ciruelos',80011),(731,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines de La Sierra',80011),(732,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Paseo Alameda',80011),(733,80019,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Hacienda Arboledas',80011),(734,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','FOVISSSTE Diamante',80011),(735,80020,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Bonanza',80011),(736,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa del Pedregal',80011),(737,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Jardines Del Pedregal',80011),(738,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas del Humaya',80011),(739,80025,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','La Ribera Residencial',80011),(740,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Tulipanes',80011),(741,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas Verdes',80011),(742,80028,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privada La Rinconada',80011),(743,80030,'Sinaloa','Culiacán','Culiacán Rosales','Residencial','Portales Del Rio',80011),(744,80040,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','La Lima',80011),(745,80040,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Real de Chapultepec',80011),(746,80050,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Culiacán Tres Ríos',80001),(747,80054,'Sinaloa','Culiacán','Culiacán Rosales','Zona industrial','Parque Industrial CANACINTRA I',80001),(748,80054,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Misiones',80001),(749,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Pradera Dorada',80001),(750,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villas Santa Anita',80001),(751,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rancho Contento',80001),(752,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Santa Aynes',80001),(753,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle Dorado',80001),(754,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Prados de La Conquista',80001),(755,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Urbivilla del Prado',80001),(756,80058,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Acueducto III',80001),(757,80080,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','El Barrio',80061),(758,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Puerta de Hierro',80005),(759,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Privanzas',80005),(760,80100,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Los Patios 2',80005),(761,80101,'Sinaloa','Culiacán','Culiacán Rosales','Gran usuario','Centro Sct Sinaloa',80001),(762,80104,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Palermo',80005),(763,80106,'Sinaloa','Culiacán','Culiacán Rosales','Zona comercial','Central Internacional Milenium',80005),(764,80110,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Francisco Villa',80005),(765,80110,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Lomas del Boulevard',80005),(766,80140,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Valle Bonito',80307),(767,80155,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón del Valle',80005),(768,80180,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Parque Industrial Nueva Estación',80005),(769,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Villa Verde',80005),(770,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Vinoramas',80005),(771,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Mont Blanc',80005),(772,80184,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Cipriano',80005),(773,80184,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Villa Dorada',80005),(774,80197,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Felipe Ángeles',80005),(775,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Rincón Del Parque',80005),(776,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Esmeralda Life',80005),(777,80197,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Perisur',80005),(778,80199,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Diana Laura Riojas de Colosio',80005),(779,80200,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Jorge Almada',80001),(780,80200,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Miguel Alemán',80001),(781,80246,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','San Benito',80001),(782,80246,'Sinaloa','Culiacán','Culiacán Rosales','Fraccionamiento','Laureles',80001),(783,80260,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Emiliano Zapata',80001),(784,80260,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Sinaloa',80001),(785,80298,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Huizaches',80001),(786,80300,'Sinaloa','Culiacán',NULL,'Colonia','Loma de los Huizaches',80001),(787,80300,'Sinaloa','Culiacán',NULL,'Colonia','Unión Antorchista',80001),(788,80300,'Sinaloa','Culiacán',NULL,'Ranchería','Campo La Flor',80001),(789,80300,'Sinaloa','Culiacán',NULL,'Ejido','Campo Patricia',80001),(790,80300,'Sinaloa','Culiacán',NULL,'Pueblo','El Pinole',80001),(791,80300,'Sinaloa','Culiacán',NULL,'Ejido','Campo La Baqueta',80001),(792,80305,'Sinaloa','Culiacán',NULL,'Ejido','La Palmita',80001),(793,80308,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','Villegas',80307),(794,80317,'Sinaloa','Culiacán',NULL,'Ranchería','Tachinolpa',80001),(795,80318,'Sinaloa','Culiacán',NULL,'Congregación','Tepuche',80011),(796,80384,'Sinaloa','Culiacán',NULL,'Rancho','El Rincón',80001),(797,80384,'Sinaloa','Culiacán',NULL,'Ranchería','Mezquitita',80001),(798,80385,'Sinaloa','Culiacán',NULL,'Ranchería','Carboneras',80001),(799,80390,'Sinaloa','Culiacán',NULL,'Ranchería','El Tule',80001),(800,80390,'Sinaloa','Culiacán',NULL,'Ranchería','Laguna Colorada',80001),(801,80394,'Sinaloa','Culiacán',NULL,'Ranchería','La Mora',80001),(802,80397,'Sinaloa','Culiacán',NULL,'Ranchería','Las Flechas',80001),(803,80398,'Sinaloa','Culiacán',NULL,'Ranchería','La Pedrera',80001),(804,80398,'Sinaloa','Culiacán',NULL,'Ranchería','Las Bateas',80001),(805,80399,'Sinaloa','Culiacán',NULL,'Ranchería','Tecomate 1',80001),(806,80400,'Sinaloa','Culiacán','Quilá','Colonia','Quilá Centro',80401),(807,80409,'Sinaloa','Culiacán','Quilá','Colonia','Emiliano Zapata',80401),(808,80409,'Sinaloa','Culiacán','Quilá','Colonia','Aviación',80401),(809,80411,'Sinaloa','Culiacán',NULL,'Ranchería','Lo de Bartolo',80001),(810,80415,'Sinaloa','Culiacán',NULL,'Ranchería','Campo La Laguna',80001),(811,80415,'Sinaloa','Culiacán',NULL,'Ranchería','La Palma',80001),(812,80417,'Sinaloa','Culiacán',NULL,'Ranchería','Las Milpas 1',80001),(813,80430,'Sinaloa','Culiacán',NULL,'Ejido','Campo San Marcos',80431),(814,80430,'Sinaloa','Culiacán',NULL,'Colonia','Solidaridad Campesina',80431),(815,80430,'Sinaloa','Culiacán',NULL,'Colonia','El Real',80431),(816,80430,'Sinaloa','Culiacán',NULL,'Colonia','Magisterial',80431),(817,80430,'Sinaloa','Culiacán',NULL,'Colonia','Loma Linda',80431),(818,80433,'Sinaloa','Culiacán',NULL,'Pueblo','Nuevo',80431),(819,80450,'Sinaloa','Culiacán',NULL,'Colonia','La Arboleda',80456),(820,80450,'Sinaloa','Culiacán',NULL,'Colonia','Centro',80456),(821,80450,'Sinaloa','Culiacán',NULL,'Ranchería','San Manuel',80456),(822,80450,'Sinaloa','Culiacán',NULL,'Colonia','El Chorrito',80456),(823,80450,'Sinaloa','Culiacán',NULL,'Colonia','Rastro Viejo',80456),(824,80450,'Sinaloa','Culiacán',NULL,'Ejido','San Joaquín',80456),(825,80450,'Sinaloa','Culiacán',NULL,'Colonia','Benito Juárez',80456),(826,80450,'Sinaloa','Culiacán',NULL,'Fraccionamiento','Bicentenario',80456),(827,80455,'Sinaloa','Culiacán',NULL,'Ranchería','Navito',80431),(828,80465,'Sinaloa','Culiacán',NULL,'Pueblo','La Arrocera',80456),(829,80297,'Sinaloa','Culiacán','Culiacán Rosales','Colonia','CNOP',80001),(830,80300,'Sinaloa','Culiacán',NULL,'Ranchería','Laberinto',80001),(831,80300,'Sinaloa','Culiacán',NULL,'Ejido','La Primavera',80001);

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `Clave_Emp` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ApPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ApMaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FecNac` date NOT NULL,
  `Departamento` int(11) NOT NULL,
  `Sueldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Clave_Emp`),
  KEY `Departamento` (`Departamento`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`Puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `empleados` */

insert  into `empleados`(`Clave_Emp`,`Nombre`,`ApPaterno`,`ApMaterno`,`FecNac`,`Departamento`,`Sueldo`) values (3,'SERGIO','PONCE','AMARILLAS','1985-01-01',3,'100.00'),(4,'AXEL ENRIQUE','CORTEZ','RUIZ','1992-06-26',1,'1000.00');

/*Table structure for table `estatus` */

DROP TABLE IF EXISTS `estatus`;

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=5461;

/*Data for the table `estatus` */

insert  into `estatus`(`id`,`descripcion`) values (2,'FINALIZADO'),(5,'ACTIVO'),(6,'BAJA');

/*Table structure for table `importes` */

DROP TABLE IF EXISTS `importes`;

CREATE TABLE `importes` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `importe` decimal(10,2) NOT NULL,
  `interes` decimal(10,2) DEFAULT NULL,
  `semanas` int(2) DEFAULT '0',
  `quincenas` int(2) DEFAULT '0',
  `pago_completo` decimal(10,2) DEFAULT NULL,
  `pago_capital` decimal(10,2) DEFAULT NULL,
  `pago_interes` decimal(10,2) DEFAULT NULL,
  `seguro` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `totalSeguro` decimal(10,2) DEFAULT NULL,
  `tipo_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=1365;

/*Data for the table `importes` */

insert  into `importes`(`id`,`importe`,`interes`,`semanas`,`quincenas`,`pago_completo`,`pago_capital`,`pago_interes`,`seguro`,`total`,`totalSeguro`,`tipo_id`) values (1,'2500.00','1500.00',14,0,'306.00','179.00','107.00','20.00','4000.00','4280.00',1),(2,'3000.00','1800.00',14,0,'363.00','215.00','128.00','20.00','4800.00','5080.00',1),(3,'3500.00','2100.00',14,0,'420.00','250.00','150.00','20.00','5600.00','5880.00',1),(4,'4000.00','2400.00',14,0,'478.00','286.00','172.00','20.00','6400.00','6680.00',1),(5,'4500.00','2700.00',14,0,'535.00','322.00','193.00','20.00','7200.00','7480.00',1),(6,'5000.00','3000.00',14,0,'592.00','358.00','214.00','20.00','8000.00','8280.00',1),(7,'2500.00','1500.00',0,8,'540.00','0.00','0.00','40.00','4000.00','4320.00',2),(8,'3000.00','1800.00',0,8,'640.00','0.00','0.00','40.00','4800.00','5120.00',2),(9,'3500.00','2100.00',0,8,'740.00','0.00','0.00','40.00','5600.00','5920.00',2),(10,'4000.00','2400.00',0,8,'840.00','0.00','0.00','40.00','6400.00','6720.00',2),(11,'4500.00','2700.00',0,8,'940.00','0.00','0.00','40.00','7200.00','7520.00',2),(12,'5000.00','3000.00',0,8,'1040.00','0.00','0.00','40.00','8000.00','8320.00',2);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menu` */

/*Table structure for table `menu_accesos` */

DROP TABLE IF EXISTS `menu_accesos`;

CREATE TABLE `menu_accesos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menu_accesos` */

/*Table structure for table `montos` */

DROP TABLE IF EXISTS `montos`;

CREATE TABLE `montos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capital` decimal(10,2) NOT NULL,
  `interes` decimal(10,2) DEFAULT NULL,
  `capital_interes` decimal(10,2) DEFAULT NULL,
  `pago_completo` decimal(10,2) DEFAULT NULL,
  `capital_s` decimal(10,2) DEFAULT NULL,
  `interes_s` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=2730;

/*Data for the table `montos` */

insert  into `montos`(`id`,`capital`,`interes`,`capital_interes`,`pago_completo`,`capital_s`,`interes_s`) values (1,'2500.00','1000.00','3500.00','250.00','180.00','70.00'),(2,'3000.00','1200.00','4200.00','300.00','216.00','84.00'),(3,'3500.00','1400.00','4900.00','350.00','252.00','98.00'),(4,'4000.00','1600.00','5600.00','400.00','288.00','112.00'),(5,'4500.00','1800.00','6300.00','450.00','324.00','126.00'),(6,'5000.00','2000.00','7000.00','500.00','360.00','140.00');

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `pago_completo` decimal(10,2) DEFAULT NULL,
  `pago_capital` decimal(10,2) DEFAULT NULL,
  `pago_interes` decimal(10,2) DEFAULT NULL,
  `pago_seguro` decimal(10,2) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `desembolso_id` decimal(10,2) DEFAULT NULL,
  `tipo_pago` enum('N','P') COLLATE utf8_unicode_ci DEFAULT 'N',
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pagos` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=8192;

/*Data for the table `roles` */

insert  into `roles`(`id`,`descripcion`) values (1,'ADMIN'),(2,'COORINADOR');

/*Table structure for table `tipo_prestamo` */

DROP TABLE IF EXISTS `tipo_prestamo`;

CREATE TABLE `tipo_prestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dias` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=5461;

/*Data for the table `tipo_prestamo` */

insert  into `tipo_prestamo`(`id`,`descripcion`,`dias`) values (1,'SEMANAL',7),(2,'QUINCENAL',15),(3,'DIEZ PORCIENTO',15);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appaterno` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apmaterno` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `autorizacion` enum('S','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `admin` enum('S','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `autorizacion_esp` enum('S','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `User` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=1638;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`appaterno`,`apmaterno`,`nombre`,`usuario`,`password`,`estatus_id`,`autorizacion`,`admin`,`autorizacion_esp`,`rol_id`) values (1,'CORTEZ','CORTEZ','AXEL ENRIQUE','AXEL','05b8caaf6ba6f4bdb68675ab8b893bda',5,'S','S','S',1),(2,'JUAREZ','JUAREZ','DALIA ZULEMA','DALIAJUAREZ','25f9e794323b453885f5181f1b624d0b',5,'N','N','N',2),(3,'PONCE','PONCE','SERGIO','SERGIOPONCE','5e543256c480ac577d30f76f9120eb74',5,'N','N','N',2),(4,'ADSSADASD','ADSSADASD','SSASDASD','PERROAGUAYO','5e543256c480ac577d30f76f9120eb74',5,'N','N','N',2),(5,'ASDSDSDADSASAD','SASDADSAD','SDASSADSSDA','852365','25d55ad283aa400af464c76d713c07ad',5,'N','N','N',1),(6,'SDDSASDA','SSADSADSDA','SASDSASD','SADDASDADSA','25d55ad283aa400af464c76d713c07ad',5,'N','N','N',1),(7,'SDASDSDA','SDSADD','SASSDSA','SADSASADSAD','25d55ad283aa400af464c76d713c07ad',5,'N','N','N',2),(8,'CORTEZ RUIZ','DSSDAADSSD','AXEL ENRIQUE','AXEL ENRIQUE CORTEZ ','dd04049cf900f641ad64212a3fdeff6e',5,'N','N','N',2),(10,'CORTEZ RUIZ','DSSDAADSSD','AXEL ENRIQUE','DARKLESSSS','dd04049cf900f641ad64212a3fdeff6e',5,'N','N','N',2),(11,'PEREZ','PEREZ','EDUARDO','159236478','ba7a18f464e805a3073b93aea743e1b2',5,'N','N','N',2);

/*Table structure for table `v_estadodecuentacliente` */

DROP TABLE IF EXISTS `v_estadodecuentacliente`;

/*!50001 DROP VIEW IF EXISTS `v_estadodecuentacliente` */;
/*!50001 DROP TABLE IF EXISTS `v_estadodecuentacliente` */;

/*!50001 CREATE TABLE  `v_estadodecuentacliente`(
 `desembolso_id` int(11) ,
 `cliente_id` int(11) ,
 `capital` decimal(10,2) ,
 `pago_completo` decimal(10,2) ,
 `saldoVencido` decimal(32,2) ,
 `pagoExigible` decimal(32,2) ,
 `saldoTotal` decimal(32,2) 
)*/;

/*View structure for view v_estadodecuentacliente */

/*!50001 DROP TABLE IF EXISTS `v_estadodecuentacliente` */;
/*!50001 DROP VIEW IF EXISTS `v_estadodecuentacliente` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_estadodecuentacliente` AS (select `d`.`id` AS `desembolso_id`,`d`.`cliente_id` AS `cliente_id`,`d`.`capital` AS `capital`,`d`.`pago_completo` AS `pago_completo`,(case when (`d`.`tipo_id` < 3) then ifnull((select sum(`corridas`.`saldo`) from `corridas` where ((`corridas`.`desembolso_id` = `d`.`id`) and (`corridas`.`fecha_pago` < curdate()))),0) when (`d`.`tipo_id` = 3) then ifnull((select `corridas_tipo_c`.`pago_completo` from `corridas_tipo_c` where ((`corridas_tipo_c`.`desembolso_id` = `d`.`id`) and (`corridas_tipo_c`.`fecha_pago` <= curdate()) and (`corridas_tipo_c`.`estatus_id` = 5))),0) end) AS `saldoVencido`,(case when (`d`.`tipo_id` < 3) then ifnull((select sum(`corridas`.`saldo`) from `corridas` where ((`corridas`.`desembolso_id` = `d`.`id`) and (`corridas`.`fecha_pago` <= curdate()))),0) when (`d`.`tipo_id` = 3) then ifnull((select `corridas_tipo_c`.`pago_completo` from `corridas_tipo_c` where ((`corridas_tipo_c`.`desembolso_id` = `d`.`id`) and (`corridas_tipo_c`.`fecha_pago` <= curdate()) and (`corridas_tipo_c`.`estatus_id` = 5))),0) end) AS `pagoExigible`,(case when (`d`.`tipo_id` < 3) then ifnull((select sum(`corridas`.`saldo`) from `corridas` where ((`corridas`.`desembolso_id` = `d`.`id`) and (`corridas`.`fecha_pago` <> 0))),0) when (`d`.`tipo_id` = 3) then ifnull((select `corridas_tipo_c`.`pago_completo` from `corridas_tipo_c` where ((`corridas_tipo_c`.`desembolso_id` = `d`.`id`) and (`corridas_tipo_c`.`estatus_id` = 5))),0) end) AS `saldoTotal` from `desembolsos` `d` where (`d`.`estatus_id` = 5)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
