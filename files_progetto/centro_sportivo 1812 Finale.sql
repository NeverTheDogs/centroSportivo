# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: centro_sportivo
# Generation Time: 2017-12-08 10:49:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table compenso_accumulato
# ------------------------------------------------------------

DROP TABLE IF EXISTS `compenso_accumulato`;

CREATE TABLE `compenso_accumulato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_turni` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_turni` (`id_turni`),
  CONSTRAINT `compenso_accumulato_ibfk_1` FOREIGN KEY (`id_turni`) REFERENCES `turni` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

LOCK TABLES `compenso_accumulato` WRITE;
/*!40000 ALTER TABLE `compenso_accumulato` DISABLE KEYS */;

INSERT INTO `compenso_accumulato` (`id`, `id_turni`, `totale`)
VALUES
	(32,72,35),
	(33,73,35),
	(34,74,45),
	(35,75,35),
	(36,76,35),
	(37,77,35),
	(38,78,35);

/*!40000 ALTER TABLE `compenso_accumulato` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table conferme
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conferme`;

CREATE TABLE `conferme` (
  `numero` varchar(10) NOT NULL DEFAULT '',
  `codice` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table fascia
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fascia`;

CREATE TABLE `fascia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dalle` int(11) NOT NULL,
  `alle` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `fascia` WRITE;
/*!40000 ALTER TABLE `fascia` DISABLE KEYS */;

INSERT INTO `fascia` (`id`, `dalle`, `alle`)
VALUES
	(1,8,13),
	(2,13,18),
	(3,18,22);

/*!40000 ALTER TABLE `fascia` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fatture
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fatture`;

CREATE TABLE `fatture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fornisce` int(11) DEFAULT NULL,
  `id_prenotazioni` int(11) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT '',
  `orario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `totale` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fornisce` (`id_fornisce`),
  KEY `id_prenotazioni` (`id_prenotazioni`),
  CONSTRAINT `fatture_ibfk_1` FOREIGN KEY (`id_fornisce`) REFERENCES `fornisce` (`id`),
  CONSTRAINT `fatture_ibfk_2` FOREIGN KEY (`id_prenotazioni`) REFERENCES `prenotazioni` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

LOCK TABLES `fatture` WRITE;
/*!40000 ALTER TABLE `fatture` DISABLE KEYS */;

INSERT INTO `fatture` (`id`, `id_fornisce`, `id_prenotazioni`, `tipo`, `orario`, `totale`)
VALUES
	(64,NULL,80,'Entrata','2017-11-20 18:21:14',20),
	(65,NULL,81,'Entrata','2017-11-20 18:44:50',76),
	(66,NULL,82,'Entrata','2017-11-20 18:46:33',90),
	(67,NULL,83,'Entrata','2017-11-20 19:04:07',50),
	(68,NULL,84,'Entrata','2017-11-20 19:04:59',70),
	(69,1,NULL,'Uscita','2017-11-23 13:35:57',120),
	(70,NULL,NULL,'Entrata','2017-12-04 18:06:50',116),
	(74,NULL,89,'Entrata','2017-11-29 13:08:01',36),
	(75,1,NULL,'Uscita','2017-11-29 15:03:46',400),
	(76,NULL,90,'Entrata','2017-11-29 16:52:53',30),
	(77,1,NULL,'Uscita','2017-11-29 17:20:58',160);

/*!40000 ALTER TABLE `fatture` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fornisce
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fornisce`;

CREATE TABLE `fornisce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fornitore` int(11) NOT NULL,
  `id_servizi` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `committente` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id_fornitore` (`id_fornitore`),
  KEY `id_servizi` (`id_servizi`),
  KEY `committente` (`committente`),
  CONSTRAINT `fornisce_ibfk_1` FOREIGN KEY (`id_fornitore`) REFERENCES `fornitore` (`id`),
  CONSTRAINT `fornisce_ibfk_2` FOREIGN KEY (`id_servizi`) REFERENCES `servizi` (`id`),
  CONSTRAINT `fornisce_ibfk_3` FOREIGN KEY (`committente`) REFERENCES `persone` (`codice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `fornisce` WRITE;
/*!40000 ALTER TABLE `fornisce` DISABLE KEYS */;

INSERT INTO `fornisce` (`id`, `id_fornitore`, `id_servizi`, `quantita`, `committente`)
VALUES
	(1,2,5,12,'mlomlo00a00b000z'),
	(2,2,12,20,'CSTCST91B21F158T'),
	(3,2,13,20,'CPPBMB00M00M000A');

/*!40000 ALTER TABLE `fornisce` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fornitore
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fornitore`;

CREATE TABLE `fornitore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `ditta` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `fornitore` WRITE;
/*!40000 ALTER TABLE `fornitore` DISABLE KEYS */;

INSERT INTO `fornitore` (`id`, `nome`, `ditta`)
VALUES
	(1,'Tony Puty','Cipster s.p.a.'),
	(2,'Minicu Babbu','Poppy s.r.l.'),
	(3,'Binnu Tagghia','Sgherri s.a.s.');

/*!40000 ALTER TABLE `fornitore` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mansione
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mansione`;

CREATE TABLE `mansione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `compenso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `mansione` WRITE;
/*!40000 ALTER TABLE `mansione` DISABLE KEYS */;

INSERT INTO `mansione` (`id`, `nome`, `compenso`)
VALUES
	(1,'Bagnino',9),
	(2,'Barista',7),
	(3,'Inserviente',7),
	(4,'Segretario',8);

/*!40000 ALTER TABLE `mansione` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table persone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `persone`;

CREATE TABLE `persone` (
  `codice` varchar(16) NOT NULL DEFAULT '',
  `telefono` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL DEFAULT '',
  `indirizzo` varchar(100) DEFAULT '',
  `tipo` varchar(100) DEFAULT '',
  `sesso` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`codice`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `persone` WRITE;
/*!40000 ALTER TABLE `persone` DISABLE KEYS */;

INSERT INTO `persone` (`codice`, `telefono`, `email`, `nome`, `cognome`, `indirizzo`, `tipo`, `sesso`)
VALUES
	('abcabc21h84d158d','0000000000','Sonotroppoforte@gmail.com','Alessandro','Del Piero','Padova via/piazza nonlaconosco  10','Cliente','M'),
	('CCRCRR00A00A000A','9021903189','cristianeddu@santu.org','Cristianeddu','Santu','Messina via/piazza del Santo 0000','Cliente','M'),
	('CPPBMB00M00M000A','3129024309','capa@bomba.org','Bomba','Capa','Messina via/piazza degli Ulivi 1234','Dipendente','M'),
	('cstcst91b21f158t','3456819655','cstcst91b21f158t@studenti.unime.it','Cristian','Costa','Santa Teresa di Riva via/piazza armando diaz 14a','Amministratore','M'),
	('DMNDMN00A00B000Z','1123112331','damianeddu@mala.org','Daminano','Mala','Messina via/piazza Giostra 666','Dipendente','M'),
	('FRANTS90A09F213P','0921838997','fraento@gmail.com','Antonella','Frazzica','Santa Teresa Di Riva via/piazza Armando Diaz 14/A','Cliente','F'),
	('GCECEF21A21A123A','0921099230','giaco@mino.com','Giaco','Mino',' via/piazza  ','Dipendente','M'),
	('IMMRTA12A11A123O','1213289598','immortal@gmail.com','TALE','IMMOR','Paradiso via/piazza dei cieli 0000','Cliente','M'),
	('JVVJVV12P21P213R','1234241234','juventino@gmail.com','Tino','Juven','Torino via/piazza dello Stadio 0','Cliente',''),
	('mlomlo00a00b000z','0987654321','melo@vota','Melo','Votalacqua','Acqualand via/piazza annacquata 88','Dipendente','M'),
	('NNNNNN00A00B000Z','8998998998','nanni@passia.org','nanni','passia','Fantaland via/piazza fasulla 123','Dipendente','m'),
	('NTTNTT00A00B000Z','1231231231','ninetta@travagghia.org','Ninetta','Fassapella','Messina via/piazza Europa 1999','Dipendente','F'),
	('PAPAPAPAPAPAPAPA','3407711503','para@culo.org','culo','para',' via/piazza  ','Cliente','F'),
	('SARNON00A00B000A','9218123218','sarino@nono.org','Sarino','Nono','Messina via/piazza del Santo 333','Cliente','M'),
	('trvtrv00a00b000z','1234567890','zappa@pala.org','Turi','Travagghia','Zappaland via/piazza agraria 69','Dipendente','M');

/*!40000 ALTER TABLE `persone` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table prenotazioni
# ------------------------------------------------------------

DROP TABLE IF EXISTS `prenotazioni`;

CREATE TABLE `prenotazioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persone` varchar(16) NOT NULL DEFAULT '',
  `id_superfici` int(11) NOT NULL,
  `id_richiesti` int(11) DEFAULT NULL,
  `id_fatture` int(11) DEFAULT NULL,
  `orario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dalle` int(11) NOT NULL,
  `alle` int(11) NOT NULL,
  `giorno` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_superfici` (`id_superfici`),
  KEY `id_fatture` (`id_fatture`),
  KEY `id_richiesti` (`id_richiesti`),
  KEY `prenotazioni_ibfk_1` (`id_persone`),
  CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`id_persone`) REFERENCES `persone` (`codice`),
  CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`id_superfici`) REFERENCES `superfici` (`id`),
  CONSTRAINT `prenotazioni_ibfk_4` FOREIGN KEY (`id_fatture`) REFERENCES `fatture` (`id`),
  CONSTRAINT `prenotazioni_ibfk_5` FOREIGN KEY (`id_richiesti`) REFERENCES `richiesti` (`id_prenotazioni`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

LOCK TABLES `prenotazioni` WRITE;
/*!40000 ALTER TABLE `prenotazioni` DISABLE KEYS */;

INSERT INTO `prenotazioni` (`id`, `id_persone`, `id_superfici`, `id_richiesti`, `id_fatture`, `orario`, `dalle`, `alle`, `giorno`)
VALUES
	(80,'CSTCST91B21F158T',11,NULL,64,'2017-11-20 18:21:14',9,10,'2017-11-20'),
	(81,'CSTCST91B21F158T',11,81,65,'2017-11-20 18:44:50',9,10,'2017-11-21'),
	(82,'CSTCST91B21F158T',11,82,66,'2017-11-20 18:46:33',14,15,'2017-11-20'),
	(83,'CSTCST91B21F158T',1,83,67,'2017-11-20 19:04:07',9,10,'2017-11-20'),
	(84,'CSTCST91B21F158T',1,84,68,'2017-11-20 19:04:59',15,16,'2017-11-20'),
	(85,'PAPAPAPAPAPAPAPA',6,85,70,'2017-11-28 13:06:55',20,21,'2017-11-29'),
	(89,'CSTCST91B21F158T',1,89,74,'2017-11-29 13:08:01',9,10,'2017-11-29'),
	(90,'CSTCST91B21F158T',1,NULL,76,'2017-11-29 16:52:53',10,11,'2017-11-29');

/*!40000 ALTER TABLE `prenotazioni` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table richiesti
# ------------------------------------------------------------

DROP TABLE IF EXISTS `richiesti`;

CREATE TABLE `richiesti` (
  `id_prenotazioni` int(11) NOT NULL,
  `id_servizi` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  KEY `id_prenotazioni` (`id_prenotazioni`),
  KEY `id_servizi` (`id_servizi`),
  CONSTRAINT `richiesti_ibfk_1` FOREIGN KEY (`id_prenotazioni`) REFERENCES `prenotazioni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `richiesti_ibfk_2` FOREIGN KEY (`id_servizi`) REFERENCES `servizi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `richiesti` WRITE;
/*!40000 ALTER TABLE `richiesti` DISABLE KEYS */;

INSERT INTO `richiesti` (`id_prenotazioni`, `id_servizi`, `totale`)
VALUES
	(81,4,4),
	(81,16,4),
	(82,13,7),
	(83,1,10),
	(84,1,10),
	(84,4,5),
	(85,1,5),
	(85,14,12),
	(89,14,2);

/*!40000 ALTER TABLE `richiesti` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table servizi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `servizi`;

CREATE TABLE `servizi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL DEFAULT '',
  `nome` varchar(100) NOT NULL DEFAULT '',
  `prezzo_ven` int(11) DEFAULT NULL,
  `prezzo_acq` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fornitore` (`id_fornitore`),
  CONSTRAINT `servizi_ibfk_1` FOREIGN KEY (`id_fornitore`) REFERENCES `fornitore` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

LOCK TABLES `servizi` WRITE;
/*!40000 ALTER TABLE `servizi` DISABLE KEYS */;

INSERT INTO `servizi` (`id`, `tipo`, `nome`, `prezzo_ven`, `prezzo_acq`, `totale`, `id_fornitore`)
VALUES
	(1,'vendita','Acqua',2,1,128,1),
	(2,'vendita','Cocacola',3,2,68,1),
	(3,'vendita','Fanta',3,2,36,1),
	(4,'vendita','Gatorade',4,3,40,1),
	(5,'vendita-consumo','Pallone-Calcio',15,10,12,2),
	(6,'consumo','Rete-Calcio x2',NULL,25,0,2),
	(7,'consumo','Lampade-fari',NULL,15,0,2),
	(8,'consumo','Detersivo-pavimenti',NULL,3,0,3),
	(9,'consumo','Detersivo-bagni',NULL,3,0,3),
	(10,'vendita','Bagnoschiuma',2,1,0,3),
	(11,'consumo','Detersivo-indumenti',NULL,3,40,3),
	(12,'consumo','Gomma',NULL,20,20,2),
	(13,'vendita-consumo','Guanti',10,8,20,2),
	(14,'vendita','Barretta',3,2,19,1),
	(15,'vendita-consumo','Pallone-Volley',10,8,0,2),
	(16,'vendita-consumo','Pallone-Basket',10,8,0,2),
	(17,'vendita','Cuffietta',5,3,0,2),
	(18,'vendita','Palle-Tennis x5',5,3,0,2),
	(19,'consumo','Rete-Volley',NULL,20,0,2),
	(20,'consumo','Cloro x50',NULL,10,0,2),
	(21,'vendita','Ciabatte',5,3,0,2);

/*!40000 ALTER TABLE `servizi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table superfici
# ------------------------------------------------------------

DROP TABLE IF EXISTS `superfici`;

CREATE TABLE `superfici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL DEFAULT '',
  `prezzo` int(11) NOT NULL,
  `zona` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`),
  KEY `zona` (`zona`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

LOCK TABLES `superfici` WRITE;
/*!40000 ALTER TABLE `superfici` DISABLE KEYS */;

INSERT INTO `superfici` (`id`, `tipo`, `prezzo`, `zona`)
VALUES
	(1,'TENNIS 1',30,'Esterno-Tennis'),
	(2,'TENNIS 2',30,'Esterno-Tennis'),
	(3,'CALCIO A 7',60,'Esterno-Calcio'),
	(4,'CALCIO A 5',50,'Esterno-Calcio'),
	(5,'BASKET',60,'Interno-Palestra'),
	(6,'VOLLEY',60,'Interno-Palestra'),
	(7,'CORSIA 1 (PISCINA)',10,'Interno-Piscina'),
	(8,'CORSIA 2 (PISCINA)',10,'Interno-Piscina'),
	(9,'CORSIA 3 (PISCINA)',10,'Interno-Piscina'),
	(10,'CORSIA 4 (PISCINA)',10,'Interno-Piscina'),
	(11,'CORSIA 5 (PISCINA)',10,'Interno-Piscina'),
	(12,'SEGRETERIA',0,'Segreteria'),
	(13,'BAR',0,'Bar');

/*!40000 ALTER TABLE `superfici` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table turni
# ------------------------------------------------------------

DROP TABLE IF EXISTS `turni`;

CREATE TABLE `turni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fascia` int(11) NOT NULL,
  `id_persone` varchar(16) NOT NULL DEFAULT '',
  `id_mansione` int(11) NOT NULL,
  `zona_superfici` varchar(100) NOT NULL DEFAULT '',
  `giorno` date NOT NULL,
  `entrata` timestamp NULL DEFAULT NULL,
  `uscita` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fascia` (`id_fascia`),
  KEY `id_persone` (`id_persone`),
  KEY `id_mansione` (`id_mansione`),
  KEY `zona_superfici` (`zona_superfici`),
  CONSTRAINT `turni_ibfk_1` FOREIGN KEY (`id_fascia`) REFERENCES `fascia` (`id`),
  CONSTRAINT `turni_ibfk_2` FOREIGN KEY (`id_persone`) REFERENCES `persone` (`codice`),
  CONSTRAINT `turni_ibfk_4` FOREIGN KEY (`id_mansione`) REFERENCES `mansione` (`id`),
  CONSTRAINT `turni_ibfk_5` FOREIGN KEY (`zona_superfici`) REFERENCES `superfici` (`zona`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

LOCK TABLES `turni` WRITE;
/*!40000 ALTER TABLE `turni` DISABLE KEYS */;

INSERT INTO `turni` (`id`, `id_fascia`, `id_persone`, `id_mansione`, `zona_superfici`, `giorno`, `entrata`, `uscita`)
VALUES
	(72,1,'DMNDMN00A00B000Z',2,'Bar','2017-11-23',NULL,NULL),
	(73,2,'mlomlo00a00b000z',2,'Bar','2017-11-23',NULL,NULL),
	(74,1,'trvtrv00a00b000z',1,'Interno-Piscina','2017-11-23',NULL,NULL),
	(75,1,'DMNDMN00A00B000Z',2,'Bar','2017-11-24',NULL,NULL),
	(76,1,'CPPBMB00M00M000A',2,'Bar','2017-11-28',NULL,NULL),
	(77,1,'CPPBMB00M00M000A',2,'Bar','2017-11-29',NULL,NULL),
	(78,1,'trvtrv00a00b000z',3,'Esterno-Calcio','2017-11-29',NULL,NULL);

/*!40000 ALTER TABLE `turni` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utenti
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utenti`;

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL DEFAULT '',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `permesso` int(1) NOT NULL,
  `codice_persone` varchar(16) NOT NULL DEFAULT '',
  `confermato` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `codice` (`codice_persone`),
  CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`codice_persone`) REFERENCES `persone` (`codice`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;

INSERT INTO `utenti` (`id`, `user`, `pass`, `permesso`, `codice_persone`, `confermato`)
VALUES
	(1,'pippo','b2395c8bb56b4d31a95679e510ad3d8c',1,'CSTCST91B21F158T','1'),
	(2,'turitravagghia','ec0b368758472b125f9a74bcc18d401c',2,'trvtrv00a00b000z','1'),
	(3,'melovota','eb438222e6d8649c5bdb931f4915ae37',2,'mlomlo00a00b000z','1'),
	(4,'Antonio','6c505931d123a913856e47c5ccd2c276',3,'abcabc21h84d158d','1'),
	(5,'nannipassia','ae526a35212e7484af68782a568f6049',2,'NNNNNN00A00B000Z','1'),
	(6,'Ninettaa','4b8a2e876ed2b49f658c11bc6ed2b90a',2,'NTTNTT00A00B000Z','1'),
	(7,'damianeddu','042f3f38a1ff62b4a1372bc29a19ee4a',2,'DMNDMN00A00B000Z','1'),
	(8,'sarinono','a12d2e891158ba77f2465644b0084d89',3,'SARNON00A00B000A','1'),
	(9,'cristianeddu','595c6f484be1984137a64cef04f267a7',3,'CCRCRR00A00A000A','1'),
	(10,'capaebomba','03346e6ad55d1598ca7a64c7276eda59',2,'CPPBMB00M00M000A','1'),
	(11,'antonella','1a637bb96a57f7de54243680ab01795f',3,'FRANTS90A09F213P','1'),
	(12,'immortale','d9a1439a1f42416be6b3e22ca11fc2fc',3,'IMMRTA12A11A123O','1'),
	(13,'juventino','e09998bd22c3d8c59e424e6970b9e7a2',3,'JVVJVV12P21P213R','1'),
	(16,'Giacomino','cae6146393888353dbba88873ad00207',2,'GCECEF21A21A123A','1'),
	(19,'paraculo','b2395c8bb56b4d31a95679e510ad3d8c',3,'PAPAPAPAPAPAPAPA','1');

/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
