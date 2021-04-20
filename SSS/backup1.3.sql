-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: solicitud
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleado` (
  `idEmpleado` int NOT NULL,
  `Apellido1` varchar(15) NOT NULL,
  `Apellido2` varchar(15) NOT NULL,
  `Nombre1` varchar(15) NOT NULL,
  `Nombre2` varchar(45) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Puesto` varchar(50) NOT NULL,
  `Adscripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'ABARCA','ABRAHAM','ALBERTO','','alberto.aa@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE  COMUNICACIÓN Y EVENTOS'),(2,'ABUNDEZ','PLIEGO','ARTURO','','arturo.ap@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(3,'ADAM','MEDINA','MANUEL','','manuel.am@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(4,'AGUAYO','ALQUICIRA','JESÚS','','jesus.aa@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(5,'AGUILAR','CASTILLO','CARLOS','','carlos.ac@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(6,'ALANIZ','QUEZADA','FELIPE','DE JESÚS','felipe.aq@cenidet.tecnm.mx','DOCENTE','DEPTO. DE CIENCIAS COMPUTACIONALES'),(7,'ALCOCER','ROSADO','WILBERTH','MELCHOR','wilberth.ar@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(8,'ALVARADO','MARTÍNEZ','VÍCTOR','MANUEL','victor.am@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(9,'ARAGÓN','MACHORRO','MAURO','JUAN','mauro.am@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE RECURSOS FINANCIEROS'),(10,'ARAU','ROFFIEL','JAIME','EUGENIO','jaime.ar@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(11,'ARCE','LANDA','JESÚS','','jesus.al@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(12,'ARMAS','LEÓN','GUADALUPE','PATRICIA','patricia.al@cenidet.tecnm.mx','COORDINADORA DE IDIOMAS','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(15,'BLANCO','ORTEGA','ANDRÉS','','andres.bo@cenidet.tecnm.mx','JEFE DEL DEPTO. DE INGENIERÍA  MECÁNICA','DEPTO. DE INGENIERÍA  MECÁNICA'),(16,'BRUNO','CUENCA','ANA','MARÍA','ana.bc@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','CENTRO DE INFORMACIÓN'),(17,'BUENO','NAJERA','ESTEBAN','','esteban.bn@cenidet.tecnm.mx','JEFE DE LA OFICINA DE DIFUSIÓN ','DEPTO. DE  COMUNICACIÓN Y EVENTOS'),(18,'BUSTAMANTE','MENDOZA','IRMA','','irma.bm@cenidet.tecnm.mx','JEFA DE OFICINA DE ADQUISICIONES','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(20,'CALLEJA','GJUMLICH','JORGE','HUGO','jorge.cg@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(22,'CAMARILLO','ORTÍZ','AGUSTÍN','','agustin.co@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DIRECCIÓN'),(23,'CARPINTERO','JIMÉNEZ','JOSÉ','ARTURO','jose.cj@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(24,'CASTILLO','PINEDA','BERTHA','','bertha.cp@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DEPTO. DE SERVICIOS ESCOLARES'),(26,'CHAGOLLA','ARANDA','MIGUEL','ÁNGEL','miguel.ca@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(27,'CHÁVEZ','CHENA','YVONNE','','yvonne.cc@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE INGENIERÍA  MECÁNICA'),(28,'CLAUDIO','SÁNCHEZ','ABRAHAM','','abraham.cs@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(29,'COLÍN','OCAMPO','JORGE','','jorge.co@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(30,'CORTÉS','GARCÍA','CLAUDIA','','claudia.cg@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE INGENIERÍA  MECÁNICA'),(31,'DE LEÓN','ALDACO','SUSANA','ESTEFANY','susana.da@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(33,'DOMINGUEZ','PÉREZ','OSCAR','','oscar.dp@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(34,'ESCOBAR','JIMÉNEZ','RICARDO','FABRICIO','ricardo.ej@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(35,'ESPAÑA','PÉREZ','JUAN','MANUEL','juan.ep@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(36,'FIGUEROA','CISNEROS','HÉCTOR','IGNACIO','hector.fc@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(37,'FLORES','PRIETO','JOSÉ','JASSÓN','jose.fp@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(38,'FRAGOSO','DÍAZ','OLIVIA','GRACIELA','olivia.fd@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE CIENCIAS COMPUTACIONALES'),(39,'GARCIA','MORALES','JARNIEL','','jarniel.gm@cenidet.tecnm.mx','AUXILIAR DE LABORATORIO','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(40,'GARCÍA','BELTRÁN','CARLOS','DANIEL','carlos.gb@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(41,'GARCÍA','GARCÍA','CARLOS','','carlos.gg@cenidet.tecnm.mx','JEFE DE OFICINA DE SERVICIOS GENERALES Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(44,'GARRIDO','RIVERA','GUADALUPE','','guadalupe.gr@cenidet.tecnm.mx','JEFA DEL DEPARTAMENTO DE SERVICIOS ESCOLARES','DEPTO. DE SERVICIOS ESCOLARES'),(45,'GÓMEZ','SANDOVAL','AMERICA','','america.gs@cenidet.tecnm.mx','SUBDIRECTORA DE SERVICIOS ADMINISTRATIVOS','SUBDIRECCIÓN DE SERVICIOS ADMINISTRATIVOS'),(46,'GÓMEZ','AGUILAR','JOSÉ','FRANCISCO','jose.ga@cenidet.tecnm.mx','CATEDERAS CONACYT','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(47,'GÓMEZ','TORRES','MARÍA','ELENA','maria.gt@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DEPTO. DE ORGANIZACIÓN Y SEGUIMIENTO DE ESTUDIOS'),(48,'GONZÁLEZ','ORTEGA','ALFREDO','','alfredo.go@cenidet.tecnm.mx','JEFE DE LABORATORIO','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(49,'GONZÁLEZ','DÍAZ','ALMA','DELIA','alma.gd@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE RECURSOS HUMANOS'),(50,'GONZÁLEZ','ORTEGA','EDILBERTO','','edilberto.go@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(51,'GONZÁLEZ','GARCÍA','MOISÉS','','moises.gg@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(52,'GONZÁLEZ','SERNA','JUAN','GABRIEL','gabriel.gs@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(53,'GONZÁLEZ','FRANCO','NIMROD','','nimrod.gf@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(54,'GONZÁLEZ RUBIO','SANDOVAL','JOSÉ','LUIS','jose.gs@cenidet.tecnm.mx','AUXILIAR DE LABORATORIO','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(55,'GUERRERO','RAMÍREZ','GERARDO','VICENTE','gerardo.gr@cenidet.tecnm.mx','SUBDIRECTOR ACADÉMICO','SUBDIRECCIÓN ACADÉMICA'),(56,'GUERRERO','HERNÁNDEZ','JUANITA','','juanita.gh@cenidet.tecnm.mx','JEFA DEL DEPTO. DE COMUNICACIÓN Y EVENTOS','DEPTO. DE COMUNICACIÓN Y EVENTOS'),(57,'GUILLÉN','RODRÍGUEZ','MARIO','','mario.gr@cenidet.tecnm.mx','DOCENTE','DEPTO. DE CIENCIAS COMPUTACIONALES'),(59,'HERNÁNDEZ','CASTAÑEDA','DANIELA','','daniela.hc@cenidet.tecnm.mx','JEFA DEL DEPTO. DE RECURSO HUMANOS','DEPTO. DE RECURSOS HUMANOS'),(60,'HERNÁNDEZ','GARCÍA','HUMBERTO','','humberto.hg@cenidet.tecnm.mx','DOCENTE','DEPTO. DE CIENCIAS COMPUTACIONALES'),(61,'JIMENEZ','MELQUIADES','VÍCTOR','MANUEL','victor.jm@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(62,'JIMÉNEZ','CASTRO','GERARDO','','gerardo.jc@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE SERVICIOS ESCOLARES'),(63,'JUAREZ','PACHECO','CÁNDIDO','MANUEL','manuel.jp@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(64,'LOMELI','BRUNO','EDUARDO','','eduardo.lb@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(66,'LÓPEZ','LÓPEZ','MA','GUADALUPE','guadalupe.ll@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(67,'LÓPEZ','SÁNCHEZ','MÁXIMO','','maximo.ls@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(68,'LÓPEZ','NAVA','MISAEL','','misael.ln@cenidet.tecnm.mx','SUBDIRECTOR DE PLANEACIÓN Y VINCULACIÓN','SUBDIRECCIÓN DE PLANEACIÓN Y VINCULACIÓN'),(69,'LÓPEZ','SALAZAR','NADIA','GRISEL','nadia.ls@cenidet.tecnm.mx','JEFA DE LA OFICINA DE SERVICIO A USUARIOS','CENTRO DE INFORMACIÓN'),(70,'LOZOYA','PONCE','RICARDO','ELIU','ricardo.lp@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(71,'LUVIANO','JIMÉNEZ','DAVID','','david.lj@cenidet.tecnm.mx','COORDINADOR DE MEDIOS Y METODOS EDUCATIVOS','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(73,'MAGADÁN','SALAZAR','ANDREA','','andrea.ms@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE CIENCIAS COMPUTACIONALES'),(74,'MAQUINAY','DÍAZ','ROSA','OLIVIA','olivia.md@cenidet.tecnm.mx','JEFA DEL DEPARTAMENTO DE RECURSOS FINANCIEROS','DEPTO. DE RECURSOS FINANCIEROS'),(75,'MARTÍNEZ','REBOLLAR','ALICIA','','alicia.mr@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(76,'MARTÍNEZ','RAYÓN','ELADIO','','eladio.mr@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(79,'MEJÍA','LAVALLE','MANUEL','','manuel.ml@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(80,'MENDOZA','ESCOBAR','PEDRO','RAFAEL','pedro.me@cenidet.tecnm.mx','AUXILIAR DE LABORATORIO','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(81,'MÉRIDA','ZAGAL','LILIANA','','liliana.mz@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DEPTO. DE CIENCIAS COMPUTACIONALES'),(82,'MINA','ANTONIO','JESÚS','DARIO','jesus.ma@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(83,'MONDRAGÓN','JAIMES','ARTEMIO','','artemio.mj@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO EN EL ALMACÉN','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(84,'MONDRAGÓN','BELTRÁN','JULIO','CÉSAR','julio.mb@cenidet.tecnm.mx','JEFE DE LA OFICINA DE ALMACEN E INVENTARIOS','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(85,'MORALES','ROSAS','JOSÉ','MANUEL','jose.mr@cenidet.tecnm.mx','JEFE DE LABORATORIO','DEPTO. DE INGENIERÍA  MECÁNICA'),(86,'MORENO','AMADO','MARIO','ALFREDO','mario.ma@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE SERVICIOS ESCOLARES'),(87,'MORENO','BERNAL','PEDRO','','pedro.mb@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(88,'MOYA','ACOSTA','SARA','LILIA','sara.ma@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE INGENIERÍA  MECÁNICA'),(89,'MÚJICA','VARGAS','DANTE','','dante.mv@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(90,'MUÑOZ','MORENO','SILVIA','','silvia.mm@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DEPTO. DE RECURSOS HUMANOS'),(91,'OLIVARES','PEREGRINO','VÍCTOR','HUGO','victor.op@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(92,'ORTIZ','HERNÁNDEZ','JAVIER','','javier.oh@cenidet.tecnm.mx','DOCENTE','DEPTO. DE CIENCIAS COMPUTACIONALES'),(93,'ORTIZ','FUENTES','SILVIA','DEL CARMEN','silvia.of@cenidet.tecnm.mx','JEFA DE OFICINA DE CONTABILIDAD Y PRESUPUESTO','DEPTO. DE RECURSOS FINANCIEROS'),(94,'OSORIO','GORDILLO','GLORIA','LILIA','gloria.og@cenidet.tecnm.mx','DOCENTE','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(95,'PEÑA','JIMÉNEZ','ANA','MARÍA','ana.pj@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','CENTRO DE INFORMACIÓN'),(96,'PEÑA','GALINDO','MARIA','ISABEL DEL ROSARIO','maria.pg@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(97,'PEREZ','SABINO','SILVIA','PATRICIA','patricia.ps@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DIRECCIÓN'),(98,'PÉREZ','MARTÍNEZ','ANA','MARÍA','ana.pm@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVA','DEPTO. DE RECURSOS HUMANOS'),(99,'PÉREZ','SIERRA','CESAR','','cesar.ps@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(100,'PÉREZ','ORTEGA','JOAQUÍN','','joaquin.po@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(101,'PINTO','ELÍAS','RAÚL','','raul.pe@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(102,'PONCE','SILVA','MARIO','','mario.ps@cenidet.tecnm.mx','JEFE DEL DEPTO. DE INGENIERÍA ELECTRÓNICA','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(103,'QUEVEDO','HERNÁNDEZ','KARLA','MARÍA','karla.qh@cenidet.tecnm.mx','JEFA DE LA OFICINA DE ORGANIZACIÓN DE EVENTOS','DEPTO. DE  COMUNICACIÓN Y EVENTOS'),(104,'QUINTERO','MÁRQUEZ','ENRIQUE','','enrique.qm@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(105,'RAMÍREZ','VILLAVICENCIO','BETSABÉ','','betsabe.rv@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE RECURSOS FINANCIEROS'),(106,'RAMÍREZ','ALCÁNTARA','JOSÉ','LUIS','luis.ra@cenidet.tecnm.mx','COORDINADOR DE INVESTIGACIÓN EDUCATIVA','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(107,'REYES','SALGADO','GERARDO','','gerardo.rs@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(108,'REYES','REYES','JUAN','','juan.rr@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(109,'RODRÍGUEZ','LELIS','JOSÉ','MARÍA','jose.rl@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(110,'RODRÍGUEZ','PLIEGO','JOSÉ','LUIS','jose.rp@cenidet.tecnm.mx','DOCENTE','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(111,'ROJAS','PÉREZ','JUAN','CARLOS','juan.rp@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(112,'RUÍZ','ASCENCIO','JOSÉ','','jose.ra@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(114,'RUÍZ','RAMÍREZ','LORENA','','lorena.rr@cenidet.tecnm.mx','SECRETARIA DE FUNCIONARIO DOCENTE','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(115,'SAAVEDRA','BENITEZ','YESICA','IMELDA','yesica.sb@cenidet.tecnm.mx','DIRECTORA','DIRECCIÓN'),(116,'SÁENZ','SÁNCHEZ','SOCORRO','','socorro.ss@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE COMUNICACIÓN Y EVENTOS'),(117,'SALAZAR','RUÍZ','MARÍA','DEL ROCÍO','maria.sr@cenidet.tecnm.mx','SECRETARIA DE FUNCIONARIO DOCENTE','DEPTO. DE INGENIERÍA  MECÁNICA'),(118,'SALGADO','VILLALOBOS','JUAN','CARLOS','juan.sv@cenidet.tecnm.mx','AUXILIAR DE INTENDENCIA Y CHOFER','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(119,'SÁNCHEZ','LIMA','LETICIA','','leticia.sl@cenidet.tecnm.mx','INVESTIGADORA','DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS'),(120,'SANDOVAL','SANDOVAL','ABEL','','abel.ss@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE RECURSOS HUMANOS'),(121,'SANTANA','PERALTA','RAFAEL','','rafael.sp@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE SERVICIOS ESCOLARES'),(122,'SANTAOLAYA','SALGADO','RENÉ','','rene.ss@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE CIENCIAS COMPUTACIONALES'),(124,'SIMA','MOO','EFRAÍN','','efrain.sm@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(127,'SZWEDOWICZ','WASIK','DARIUSZ','SLAWOMIR','dariusz.sd@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(129,'TORRES','RAMÍREZ','MARÍA','REYNA','maria.tr@cenidet.tecnm.mx','JEFA DEL CENTRO DE INFORMACIÓN','DEPTO. CENTRO DE INFORMACIÓN'),(130,'TOVAR','REYES','EZEQUIEL','','ezequiel.tr@cenidet.tecnm.mx','JEFE DEL DEPTO. DE CENTRO DE INFORMACIÓN','CENTRO DE INFORMACIÓN'),(131,'VARGAS','DOMINGUEZ','JOSE','ALFREDO','jose.vd@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS'),(133,'VELA','VALDÉS','LUIS','GERARDO','luis.vv@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  ELECTRÓNICA'),(134,'VELASCO','PÉREZ','EDUARDO','','eduardo.vp@cenidet.tecnm.mx','AUXILIAR DE LABORATORIO','DEPTO. DE INGENIERÍA  MECÁNICA'),(136,'VILLALBA','FLORES','TEODORA','ESTHER','teodora.vf@cenidet.tecnm.mx','JEFA DE OFICINA DE REGISTROS Y CONTROLES','DEPTO. DE RECURSOS HUMANOS'),(137,'VILLANUEVA','TAVIRA','JONATHAN','','jonathan.vt@cenidet.tecnm.mx','DOCENTE','DEPTO. DE INGENIERÍA  MECÁNICA'),(138,'VILLEGAS','RENTERÍA','MARÍA','ELENA','maria.vr@cenidet.tecnm.mx','AUXILIAR ADMINISTRATIVO','DEPTO.  DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN'),(139,'XAMÁN','VILLASEÑOR','JESÚS','PERFECTO','jesus.xv@cenidet.tecnm.mx','INVESTIGADOR','DEPTO. DE INGENIERÍA  MECÁNICA'),(140,'ZAVALA','DURÁN','GLORIA','','gloria.zd@cenidet.tecnm.mx','JEFE DE OFICINA  DE SERVICIOS AL PERSONAL','DEPTO. DE RECURSOS HUMANOS');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `idEstudiante` int NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Area` varchar(25) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'Alejandra Arriola Gómez ','M-Mecánica','M20CE001@cenidet.tecnm.mx'),(2,'Arturo Oswaldo  Cuevas Uribe','M-Mecánica','M20CE002@cenidet.tecnm.mx'),(3,'Irving Abdiel Maldonado Bravo','M-Mecánica','M20CE004@cenidet.tecnm.mx'),(4,'Gerson Marin Cabrera ','M-Mecánica','M20CE005@cenidet.tecnm.mx'),(5,'Kevin Ricardo Miranda Acatitlan ','M-Mecánica','M20CE006@cenidet.tecnm.mx'),(6,'Gabriela Pedraza Jiménez  ','M-Mecánica','M20CE007@cenidet.tecnm.mx'),(7,'Kevin Edson Petatan Bahena ','M-Mecánica','M20CE008@cenidet.tecnm.mx'),(8,'José Antonio Ruiz López','M-Mecánica','M20CE009@cenidet.tecnm.mx'),(9,'Erick Zain Adame Nájera','M-Electrónica','M20CE010@cenidet.tecnm.mx'),(10,'Odalis Barreto','M-Electrónica','M20CE011@cenidet.tecnm.mx'),(11,'Semadar Bojórquez Sánchez','M-Electrónica','M20CE012@cenidet.tecnm.mx'),(12,'Isaí Carreón Martínez','M-Electrónica','M20CE013@cenidet.tecnm.mx'),(13,'Maday De la Rosa Romero','M-Electrónica','M20CE014@cenidet.tecnm.mx'),(14,'Carlos Enrique Domínguez Hernández','M-Electrónica','M20CE015@cenidet.tecnm.mx'),(15,'Brandon Eduardo Garay Ariza','M-Electrónica','M20CE016@cenidet.tecnm.mx'),(16,'Juan Ángel González Flores','M-Electrónica','M20CE017@cenidet.tecnm.mx'),(17,'Jiisi Gonzalo Méndez','M-Electrónica','M20CE018@cenidet.tecnm.mx'),(18,'Edwin Abisay Meza Jimenez','M-Electrónica','M20CE019@cenidet.tecnm.mx'),(19,'David Montalvo de la Cruz','M-Electrónica','M20CE020@cenidet.tecnm.mx'),(20,'Luis Alfredo Hernández Pérez','M-Computación','M20CE038@cenidet.tecnm.mx'),(21,'Jonathan Posada Gómez','M-Electrónica','M20CE022@cenidet.tecnm.mx'),(22,'Oscar Sánchez Vargas','M-Electrónica','M20CE023@cenidet.tecnm.mx'),(23,'Saúl Martín Vazquez Andrade','M-Electrónica','M20CE024@cenidet.tecnm.mx'),(24,'Pedro Chulín Cruz','M-Computación','M20CE029@cenidet.tecnm.mx'),(25,'Sergio Edson Aguado Abaonza','M-Computación','M20CE026@cenidet.tecnm.mx'),(26,'Amado Scott Bello Valle','M-Computación','M20CE027@cenidet.tecnm.mx'),(27,'Yazmín Castro López','M-Computación','M20CE028@cenidet.tecnm.mx'),(28,'Pedro Arturo Vilchis González','M-Electrónica','M20CE025@cenidet.tecnm.mx'),(29,'Leticia Cruz López','M-Computación','M20CE030@cenidet.tecnm.mx'),(30,'Juan Antonio Díaz Díaz','M-Computación','M20CE031@cenidet.tecnm.mx'),(31,'Vanessa Elizabeth Figueroa Goroztieta','M-Computación','M20CE032@cenidet.tecnm.mx'),(32,'Alejandra Flores Robles','M-Computación','M20CE033@cenidet.tecnm.mx'),(33,'Silvia Geraldine García Calderón','M-Computación','M20CE034@cenidet.tecnm.mx'),(34,'Alexis González Álvarez','M-Computación','M20CE035@cenidet.tecnm.mx'),(35,'Guadalupe Guerrero Ruiz','M-Computación','M20CE036@cenidet.tecnm.mx'),(36,'Ricardo Guevara Gordillo','M-Computación','M20CE037@cenidet.tecnm.mx'),(37,'Luis Edgar Ocampo Rodríguez','M-Electrónica','M20CE021@cenidet.tecnm.mx'),(38,'Iván Daniel Joya De la Cruz','M-Computación','M20CE039@cenidet.tecnm.mx'),(39,'Andros Meraz Hernández','M-Computación','M20CE040@cenidet.tecnm.mx'),(40,'Armando Miranda Moilina','M-Computación','M20CE041@cenidet.tecnm.mx'),(41,'Juan Carlos Olguín Santarriaga','M-Computación','M20CE042@cenidet.tecnm.mx'),(42,'Alejandro Ortega Figueroa','M-Computación','M20CE043@cenidet.tecnm.mx'),(43,'Orlando Paredes Cano','M-Computación','M20CE044@cenidet.tecnm.mx'),(44,'Javier Resendiz Santana','M-Computación','M20CE045@cenidet.tecnm.mx'),(45,'Leslie Alejandra Ruiz Bustos','M-Computación','M20CE046@cenidet.tecnm.mx'),(46,'Nancy Salgado Antúnez','M-Computación','M20CE047@cenidet.tecnm.mx'),(47,'Jesús Alfredo Valerio Esteban','M-Computación','M20CE048@cenidet.tecnm.mx'),(48,'Pedro Eusebio Alvarado Mendez ','D-Electrónica','D17CE052@cenidet.tecnm.mx'),(49,'Christian Rios Enriquez ','D-Electrónica','D17CE066@cenidet.tecnm.mx'),(50,'Héctor Martín Cortes Campos ','D-Electrónica','D18CE034@cenidet.tecnm.mx'),(51,'Israel Isaac Zetina Rios ','D-Electrónica','D17CE071@cenidet.tecnm.mx'),(52,'Luis Felipe Avalos Ruiz ','D-Electrónica','D18CE049@cenidet.tecnm.mx'),(53,'Diana Arleth Muñoz Menéndez','D-Electrónica','No Asignado'),(54,'Jesús Antonio Luna Álvarez ','D-Computación','D18CE009@cenidet.tecnm.mx'),(55,'Celia Ramos Palencia ','D-Computación','D17CE041@cenidet.tecnm.mx'),(56,'Ángel Arturo Rendón Castro ','D-Computación','D18CE013@cenidet.tecnm.mx'),(57,'Ariel Eliezer Vázquez Domínguez ','D-Computación','D17CE104@cenidet.tecnm.mx'),(58,'Sergio Eduardo Paez Aguilar ','D-Computación','D16CE012@cenidet.tecnm.mx');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habilidad`
--

DROP TABLE IF EXISTS `habilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `habilidad` (
  `idTecnico` int NOT NULL,
  `Departamento` varchar(45) NOT NULL,
  `Habilidad` varchar(30) NOT NULL,
  `Prioridad` int NOT NULL,
  PRIMARY KEY (`idTecnico`,`Departamento`,`Habilidad`,`Prioridad`),
  CONSTRAINT `habilidad_ibfk_1` FOREIGN KEY (`idTecnico`) REFERENCES `tecnico` (`idTecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habilidad`
--

LOCK TABLES `habilidad` WRITE;
/*!40000 ALTER TABLE `habilidad` DISABLE KEYS */;
INSERT INTO `habilidad` VALUES (1,'','SITIO WEB',1),(2,'','CORREO',2),(2,'','EXAMEN EN LINEA',3),(2,'','MT.PREVENTICO',3),(2,'','PROGRAMACION',1),(2,'','REDES',2),(2,'','SII',1),(2,'','SOFTWARE',3),(3,'','EXAMEN EN LINEA',1),(3,'','MT.PREVENTICO',1),(3,'','REDES',3),(3,'','SOFTWARE',1),(4,'','CORREO',2),(4,'','EXAMEN DE ADMISION',1),(4,'','EXAMEN EN LINEA',1),(4,'','MT.PREVENTICO',1),(4,'','PROGRAMACION',1),(4,'','REDES',1),(4,'','REDES',3),(4,'','REUNIONES DIFUSION',1),(4,'','SITIO WEB',3),(4,'','SOFTWARE',1);
/*!40000 ALTER TABLE `habilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `idRegistro` int NOT NULL AUTO_INCREMENT,
  `CorreoSolic` varchar(30) DEFAULT NULL,
  `idTecnico` int DEFAULT NULL,
  `TipoS` varchar(30) DEFAULT NULL,
  `statusS` varchar(10) DEFAULT 'Espera',
  `FechaR` datetime DEFAULT NULL,
  `FechaL` datetime DEFAULT NULL,
  `Valoracion` int DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Activacion` int DEFAULT '0',
  PRIMARY KEY (`idRegistro`),
  KEY `idTecnico` (`idTecnico`),
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`idTecnico`) REFERENCES `tecnico` (`idTecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tecnico` (
  `idTecnico` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApellidoP` varchar(45) DEFAULT NULL,
  `ApellidoM` varchar(45) DEFAULT NULL,
  `Correo` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`idTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnico`
--

LOCK TABLES `tecnico` WRITE;
/*!40000 ALTER TABLE `tecnico` DISABLE KEYS */;
INSERT INTO `tecnico` VALUES (1,'Alfonso','D´Granda','Trejo','Alfonso.grtr@cenidet.tecnm.mx'),(2,'Alfredo',' Terrazas',' Porcayo','elfredo.trpo@cenidet.tecnm.mx'),(3,'Cecilia',' Lopez',' Romero','cecilia.loro@cenidet.tecnm.mx'),(4,'Hector',' Figueroa ','Cisneros','hector.cishe@cenidet.tecnm.mx'),(5,'Josué',' Ruiz',' Martinez','jose.RuMar@cenidet.tecnm.mx');
/*!40000 ALTER TABLE `tecnico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-20 11:49:26
