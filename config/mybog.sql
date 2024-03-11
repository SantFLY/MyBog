CREATE DATABASE  IF NOT EXISTS `mybog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mybog`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mybog
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `arrendamientos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `arrendamientos` (
  `Id_de_arrendamientos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_arrendamientos` varchar(30) NOT NULL,
  `Ubicacion_de_arrendamientos` varchar(50) NOT NULL,
  `Tipos_de_arrendamientos` varchar(30) NOT NULL,
  `Informacion_de_arrendamientos` text NOT NULL,
  `Id_servicio` int NOT NULL,
  PRIMARY KEY (`Id_de_arrendamientos`),
  KEY `Id_servicio` (`Id_servicio`) USING BTREE,
  CONSTRAINT `arrendamientos_ibfk_1` FOREIGN KEY (`Id_servicio`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arrendamientos`
--

LOCK TABLES `arrendamientos` WRITE;
/*!40000 ALTER TABLE `arrendamientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `arrendamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros_comerciales`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `centros_comerciales` (
  `Id_de_centros_comerciales` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_centros_comerciales` varchar(250) NOT NULL,
  `Ubicacion_de_centros_comerciales` varchar(50) NOT NULL,
  `Informacion_de_centros_comerciales` text NOT NULL,
  `Id_entretenimiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_de_centros_comerciales`),
  KEY `Id_entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `centros_comerciales_ibfk_1` FOREIGN KEY (`Id_entretenimiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros_comerciales`
--

LOCK TABLES `centros_comerciales` WRITE;
/*!40000 ALTER TABLE `centros_comerciales` DISABLE KEYS */;
INSERT INTO `centros_comerciales` VALUES (1,'Unicentro','Cra. 15 #124-30, Usaquén, Bogotá','Unicentro Bogotá es un centro comercial de Bogotá, Colombia; fue inaugurado el 27 de abril de 1976, siendo el primer centro comercial de Bogotá. Es uno de los principales y más reconocidos de Colombia, Las tiendas ancla más importantes del centro comercial son, Almacenes Éxito, Cine Colombia, La Bolera, Zara, Panamericana, Pepe Ganga y Falabella.',1,'Usaquén','Unicentro.jpg'),(2,'Andino','Cra. 11 #82-71, Bogotá','Centro comercial de 53.900 metros cuadrados ubicado en el barrio El Retiro, iniciado en 1991 por Pedro Gomez y Cia. y terminado en 1993. Se encuentra en la zona rosa de la ciudad. Esta compuesto por areas de vivienda, comercio, recreacion, trabajo y servicios.',1,'Chapinero','Andino.jpg'),(3,'Atlantis','Cll 80 #13-06, Bogotá','Centro comercial ubicado en Chapinero, fue construido en 1999 e inaugurado un año más tarde. Fue diseñado por Design Group Incorporated. ',1,'Chapinero','Atlantis.jpg'),(4,'Aquarium','Cl. 60 #9-83, Bogotá','El centro comercial abarca una amplia gama de locales que ofrecen desde vestidos para novios y vestidos de cóctel hasta servicios como turismo, bienes raíces, salud, y belleza femenina. Se incluyen también productos y servicios como tecnología, accesorios, marketing, organización de eventos, y restaurante, entre otros. La diversidad de opciones brinda a los clientes acceso a una variedad completa de productos y servicios en un solo lugar.',1,'Chapinero','Aquarium.jpg'),(5,'Chapicentro','Cra. 13 #61-65, Bogotá','Chapicentro es uno de estos centros comerciales, brindan servicios de venta de ropa, maquillaje, comida y otros. Esta ubicado en una de las mejores ubicaciones de esta localidad.',1,'Chapinero','Chapicentro.jpg'),(6,'Lourdes Center','Av Jose Celestino Mutis #9a-87, Bogotá','Centro de comercial con buenas tiendas y servicios. el centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Chapinero','Lourdes Center.jpg'),(7,'Cosmos 64','Cl. 64 #11-37, Bogotá','Centro comercial de la vieja escuela con muchas tiendas pequeñas con dulces, bocadillos calientes y regalos.',1,'Chapinero','Cosmos 64.jpg'),(8,'El Retiro','Cl. 82 #11-75, Bogotá','Bonito centro comercial ubicado cerca a la zona T. Con amplio parqueaderos y ofrecen servicio de lavado. El centro comercial es limpio, bien iluminado y decorado muy lindo!!! Las decoraciones de navidad están súper bonitas.',1,'Chapinero','El Retiro.jpg'),(9,'Plaza 39','Dg. 40a #7-40, Bogotá','Centro comercial con muchas opciones de restaurantes informales, boutiques locales eclécticas y servicios. El Centro comercial está desarrollado en los dos primeros pisos de la torres de vivienda y en las dos casas de conservación denominadas “Alberto Manrique Martin”, catalogadas como bienes de interés cultural de la capital, las casas fueron diseñadas y construidas en los años 40, para la familia Buraglia, por el reconocido ingeniero y arquitecto Albero Manrique Martin.  Integran estos dos ambientes la Plazoleta central de comidas.',1,'Chapinero','Plaza 39.jpg'),(10,'Avenida Chile','Cl. 72 #10-34, Bogotá','Avenida de Chile Centro Comercia y Financiero P.H., es ícono y referente geográfico de la ciudad de Bogotá. Su enfoque Vanguardista, Cosmopolitan y Urbano hace que sus visitantes encuentren una oferta de servicios, productos y entretenimiento. Avenida de Chile Centro Comercia y Financiero es el lugar donde encontrarás actividades de entretenimiento y recreación urbana relacionadas con cultura, música, moda, arte, teatro y educación.',1,'Chapinero','Avenida Chile.jpg'),(11,'Infinitum','Av. Caracas #58-58, Bogotá','En Infinitum puedes disfrutar de lo que más te gusta a tu propio ritmo. Tus marcas y restaurantes favoritos disponibles para ti en un solo lugar.',1,'Chapinero','Infinitum.jpg'),(12,'Centro Mayor','Cl. 38A Sur #34d-51, Bogotá','El centro comercial Centro Mayor es un centro comercial ubicado en la localidad de Antonio Nariño, al sur de Bogotá. Es el centro comercial más grande de Colombia y el cuarto de América Latina después del Centro Santa Fe de la Ciudad de México, Leste Aricanduva, en São Paulo y del Albrook Mall, en Panamá.',1,'Antonio_Nariño','Centro Mayor.jpg'),(13,'Social el Restrepo','Cl. 13 Sur #20-40, Bogotá','Fundado en el año 1991 por un grupo de vendedores informales que antes vendían sus artículos en las calles y quienes se organizaron a través de una agremiación que les permitió el reconocimiento para que el Distrito los reubicara en este punto comercial de la calle 13 sur # 19-20 hace ya 31 años.',1,'Antonio_Nariño','Social el Restrepo.jpg'),(14,'Kilometro 22','Avenida Calle 22 sur #28-71, Bogotá','Centro comercial dedicado para los amantes de las motos, tiendas especializadas en equipamiento y accesorios de alta calidad.',1,'Antonio_Nariño','Kilometro 22.jpg'),(15,'Gran Plaza Bosa','Cl. 65 Sur #51 N° 78 H, Bogotá','Centro comercial tranquilo de varios niveles con diversas tiendas y restaurantes informales, además de un cine.',1,'Bosa','Gran Plaza Bosa.jpg'),(16,'Artesanal Bosa Centro','1 a 65, Cra. 80, Bogotá','Centro comercial con buenas tiendas y servicios. El centro ofrece una experiencia tranquila en un entorno cómodo. Como su nombre lo dice, es un centro comercial dedicado a lo artesanal.',1,'Bosa','Artesanal Bosa Centro.jpg'),(17,'Micentro el Porvenir','Cl. 54f Sur #94-18, Bogotá','El Centro Comercial Micentro El Porvenir nace en el año 2013 ubicado en Bosa el Porvenir en la ciudad de Bogotá. Desarrollado con la premisa de ser un lugar donde toda la comunidad encontrará todo lo necesario para satisfacer sus necesidades.',1,'Bosa','Micentro el Porvenir.jpg'),(18,'Metro Recreo','Cra. 97c #69A-08 Sur, Bogotá','Centro de comercial con buenas tiendas y servicios. El centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Bosa','Metro Recreo.jpg'),(19,'Puerto Marino La Libertad','Calle 58CS #58B-04, Bogotá','Centro comercial con espacio integral que alberga una selección de destacadas tiendas y servicios para satisfacer diversas necesidades y preferencias. Diseñado para brindar una experiencia de compras convencional, el entorno se caracteriza por su comodidad y practicidad. Este lugar se presenta como una solución conveniente para llevar a cabo tanto compras cotidianas como actividades diarias, ofreciendo a los visitantes la oportunidad de disfrutar de un ambiente cómodo y funcional.',1,'Bosa','Puerto Marino La Libertad.jpg'),(20,'Trebolis El Porvenir','Cra 95A 49c Sur-80, Bogotá','Pequeño centro comercial con tiendas y servicios básicos, un cine y misas dominicales.',1,'Bosa','Trebolis El Porvenir.jpg'),(21,'Bs Plaza Comercial','Cl. 57 Sur #20, Bogotá','Pequeño centro comercial con tiendas y servicios básicos',1,'Bosa','Bs Plaza Comercial.jpg'),(22,'Gran Plaza El Ensueño','AV. V/cio, TV 63, Bogotá','Amplio centro comercial con una variedad de tiendas y servicios, restaurantes informales y juegos infantiles.',1,'Ciudad_Bolivar','Gran Plaza El Ensueño.jpg'),(23,'Paseo Villa del Rio','Dg. 57c Sur #62-60, Bogotá','Centro comercial con buenas tiendas y servicios. El centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Ciudad_Bolivar','Paseo Villa del Rio.jpg'),(24,'Bahia Multiplaza','Cl. 68 Sur #47a-10, Bogotá','Centro comercial con espacio integral que alberga una selección de destacadas tiendas y servicios para satisfacer diversas necesidades y preferencias. Diseñado para brindar una experiencia de compras convencional, el entorno se caracteriza por su comodidad y practicidad. Este lugar se presenta como una solución conveniente para llevar a cabo tanto compras cotidianas como actividades diarias, ofreciendo a los visitantes la oportunidad de disfrutar de un ambiente cómodo y funcional.',1,'Ciudad_Bolivar','Bahia Multiplaza.jpg'),(25,'San Andresito Perdomo','CALLE 63 SUR 70 B 40, Bogotá','Espacio comercial que alberga tiendas de calidad y servicios diversos. Proporciona una experiencia de compras convencional en un entorno confortable. Es un destino práctico para realizar tus compras y actividades diarias.',1,'Ciudad_Bolivar','San Andresito Perdomo.jpg'),(26,'Muisca','Cl. 64, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Engativa','Muisca.jpg'),(27,'Diverplaza','Transversal 99 #70A-89, Bogotá','Complejo comercial con una selección destacada de tiendas y servicios. Proporciona una experiencia de compras convencional en un entorno confortable. Es un espacio práctico para realizar tus compras y actividades diarias.',1,'Engativa','Diverplaza.jpg'),(28,'Portal 80','Tv. 100a #80A-20, Bogotá','Centro de compras con tiendas de calidad y servicios variados. Brinda una experiencia de compras convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias. Se encuentra al lado del portal 80 de transmilenio.',1,'Engativa','Portal 80.jpg'),(29,'El Tesoro','Cl. 64 #12119, Bogotá','Complejo comercial que ofrece opciones de tiendas y servicios de alta calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un destino práctico para tus compras y actividades diarias.',1,'Engativa','El Tesoro.jpg'),(30,'San Francisco','Cl. 80 #75-52, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Engativa','San Francisco.jpg'),(31,'Ronda Del Rio','Cl 78B #120 A56, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Engativa','Ronda Del Rio.jpg'),(32,'Plaza 80','Cl. 80 #13, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Engativa','Plaza 80.jpg'),(33,'Primavera Plaza','Av. Medellín #89a-40, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Engativa','Primavera Plaza.jpg'),(34,'Nuestro Bogota','Av. Carrera 86 #55A-75, Bogotá','Centro comercial con buenas tiendas y servicios. El centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Engativa','Nuestro Bogota.jpg'),(35,'Titan Plaza','Av. Boyacá #80-94, Bogotá','Complejo comercial que cuenta con excelentes opciones de tiendas y servicios. Ofrece una experiencia de compra convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Engativa','Titan Plaza.jpg'),(36,'Unicentro de Occidente','Cra. 111c #86-05, Bogotá','Espacio comercial que alberga tiendas de calidad y servicios diversos. Proporciona una experiencia de compras convencional en un entorno confortable. Es un destino práctico para realizar tus compras y actividades diarias.',1,'Engativa','Unicentro de Occidente.jpg'),(37,'Viva','Cra. 104 #14, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Fontibon','Viva.jpg'),(38,'Fiesta','Cra. 100 #18-59, Bogotá','Complejo comercial con una selección destacada de tiendas y servicios. Proporciona una experiencia de compras convencional en un entorno confortable. Es un espacio práctico para realizar tus compras y actividades diarias.',1,'Suba','Fiesta.jpg'),(39,'Hayuelos','Cl. 20 #82-52, Bogotá','Centro de compras con tiendas de calidad y servicios variados. Brinda una experiencia de compras convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Fontibon','Hayuelos.jpg'),(40,'Plaza 100','Cra. 100 #20-59, Bogotá','Complejo comercial que ofrece opciones de tiendas y servicios de alta calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un destino práctico para tus compras y actividades diarias.',1,'Fontibon','Plaza 100.jpg'),(41,'El Nogal','Cra. 100 #2240, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Fontibon','El Nogal.jpg'),(42,'Salitre Plaza','Cra. 68b #24-39, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Fontibon','Salitre Plaza.jpg'),(43,'Multiplaza','Cl 19A #72-57, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Fontibon','Multiplaza.jpg'),(44,'Meridiano 13','Cra. 78 #17-55, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Fontibon','Meridiano 13.jpg'),(45,'El Eden','AV Carrera 72 #12b-18, Bogotá','Centro comercial con buenas tiendas y servicios. El centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Kennedy','El Eden.jpg'),(46,'Plaza de las Americas','Cra. 71d #6-94 Sur, Bogotá','Complejo comercial que cuenta con excelentes opciones de tiendas y servicios. Ofrece una experiencia de compra convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Kennedy','Plaza de las Americas.jpg'),(47,'Tintal Plaza','Cra. 86 #6-37, Bogotá','Espacio comercial que alberga tiendas de calidad y servicios diversos. Proporciona una experiencia de compras convencional en un entorno confortable. Es un destino práctico para realizar tus compras y actividades diarias.',1,'Kennedy','Tintal Plaza.jpg'),(48,'Milenio Plaza','Av. Ciudad de Cali No. 42B - 51 Sur, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Kennedy','Milenio Plaza.jpg'),(49,'Bazaar Alsacia','Cl. 12b #71D - 61, Bogotá','Complejo comercial con una selección destacada de tiendas y servicios. Proporciona una experiencia de compras convencional en un entorno confortable. Es un espacio práctico para realizar tus compras y actividades diarias.',1,'Kennedy','Bazaar Alsacia.jpg'),(50,'Outlet Plaza','Avenida Calle 9 #28, Bogotá','Centro de compras con tiendas de calidad y servicios variados. Brinda una experiencia de compras convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Kennedy','Outlet Plaza.jpg'),(51,'Calle Real De La Candelaria','Cra. 7 #11-76, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Candelaria','Calle Real De La Candelaria.jpg'),(52,'Caravana','Cl. 12 #68, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Candelaria','Caravana.jpg'),(53,'Mallplaza NQS','Ave Cra 30 #19, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Los_Martires','Mallplaza NQS.jpg'),(54,'San Andresito','Cl. 13 #21-61, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Los_Martires','San Andresito.jpg'),(55,'Siete Mares','Cl. 8 #20-30, Bogotá','Centro comercial con buenas tiendas y servicios. el centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Los_Martires','Siete Mares.jpg'),(56,'San Vicente Plaza','Cra. 21 #9-31, Bogotá','Complejo comercial que cuenta con excelentes opciones de tiendas y servicios. Ofrece una experiencia de compra convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Los_Martires','San Vicente Plaza.jpg'),(57,'Shopping Center','Cl. 13 #1566, Bogotá','Espacio comercial que alberga tiendas de calidad y servicios diversos. Proporciona una experiencia de compras convencional en un entorno confortable. Es un destino práctico para realizar tus compras y actividades diarias.',1,'Los_Martires','Shopping Center.jpg'),(58,'San Jose Plaza','Cra. 21 #9A-59, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Los_Martires','San Jose Plaza.jpg'),(59,'Plaza Central','Cra. 65 #11-50, Bogotá','Complejo comercial con una selección destacada de tiendas y servicios. Proporciona una experiencia de compras convencional en un entorno confortable. Es un espacio práctico para realizar tus compras y actividades diarias.',1,'Puente_Aranda','Plaza Central.jpg'),(60,'Fashion Plaza','Cra. 62 #35, Bogotá','Centro de compras con tiendas de calidad y servicios variados. Brinda una experiencia de compras convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Puente_Aranda','Fashion Plaza.jpg'),(61,'Puma C.c Puerto Libre','Cl. 9 #36-23, Bogotá','Complejo comercial que ofrece opciones de tiendas y servicios de alta calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un destino práctico para tus compras y actividades diarias.',1,'Puente_Aranda','Puma C.c Puerto Libre.jpg'),(62,'Rotonda Santa Fe','Cra. 7 #26, Bogotá','Complejo comercial que ofrece opciones de tiendas y servicios de alta calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un destino práctico para tus compras y actividades diarias.',1,'Santa_Fe','Rotonda Santa Fe.jpg'),(63,'San Martin','Cra. 7 #32, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Santa_Fe','San Martin.jpg'),(64,'Centro Suba','Cl. 145 #91-19, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Suba','Centro Suba.jpg'),(65,'Plaza Imperial','Cra. 104 #148-07, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Suba','Plaza Imperial.jpg'),(66,'Bulevar','Ak. 58 #127-59, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Suba','Bulevar.jpg'),(67,'Laguna','Cra. 122d #68A-89, Bogotá','Centro comercial con buenas tiendas y servicios. el centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Suba','Laguna.jpg'),(68,'Subazar','Cl. 145 #91-34, Bogotá','Complejo comercial que cuenta con excelentes opciones de tiendas y servicios. Ofrece una experiencia de compra convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Suba','Subazar.jpg'),(69,'Paseo San Rafael','Cl. 134 #55-30, Bogotá','Espacio comercial que alberga tiendas de calidad y servicios diversos. Proporciona una experiencia de compras convencional en un entorno confortable. Es un destino práctico para realizar tus compras y actividades diarias.',1,'Suba','Paseo San Rafael.jpg'),(70,'Plaza Aventura','Cl. 130 #58-20, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Suba','Plaza Aventura.jpg'),(71,'La Colina','Cra. 58d #146-51, Bogotá','Complejo comercial con una selección destacada de tiendas y servicios. Proporciona una experiencia de compras convencional en un entorno confortable. Es un espacio práctico para realizar tus compras y actividades diarias.',1,'Suba','La Colina.jpg'),(72,'Acuarela','Cl. 145, Bogotá','Centro de compras con tiendas de calidad y servicios variados. Brinda una experiencia de compras convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Suba','Acuarela.jpg'),(73,'Mall 138','Cra. 59a #136-95, Bogotá','Complejo comercial que ofrece opciones de tiendas y servicios de alta calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un destino práctico para tus compras y actividades diarias.',1,'Suba','Mall 138.jpg'),(74,'Santa Fe','Autopista Norte #183, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Suba','Santa Fe.jpg'),(75,'Porto Alegre','Cra. 58 #137B-01, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Suba','Porto Alegre.jpg'),(76,'Galerias','Cl. 53b #25-21, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Teusaquillo','Galerias.jpg'),(77,'Gran Estacion','Ac. 26 #62-47, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Teusaquillo','Gran Estacion.jpg'),(78,'Plaza 54','Cra. 24 #53-73, Bogotá','Centro comercial con buenas tiendas y servicios. el centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias. ',1,'Teusaquillo','Plaza 54.jpg'),(79,'Cipres Plaza','Ak. 50 #22-41, Bogotá','Complejo comercial que cuenta con excelentes opciones de tiendas y servicios. Ofrece una experiencia de compra convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Teusaquillo','Cipres Plaza.jpg'),(80,'Ecocentro','Cra 27 #53-61, Bogotá','Espacio comercial que alberga tiendas de calidad y servicios diversos. Proporciona una experiencia de compras convencional en un entorno confortable. Es un destino práctico para realizar tus compras y actividades diarias.',1,'Teusaquillo','Ecocentro.jpg'),(81,'Quirinal','Cl. 60 #57-22, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Teusaquillo','Quirinal.jpg'),(82,'Venecia','Diagonal 45 #53-25, Bogotá','Complejo comercial con una selección destacada de tiendas y servicios. Proporciona una experiencia de compras convencional en un entorno confortable. Es un espacio práctico para realizar tus compras y actividades diarias.',1,'Tunjuelito','Venecia.jpg'),(83,'Santa Ana Boutique','Ak. 9 #110-50, Bogotá','Centro de compras con tiendas de calidad y servicios variados. Brinda una experiencia de compras convencional en un ambiente cómodo. Se presenta como un lugar práctico para llevar a cabo tus compras y actividades diarias.',1,'Usaquen','Santa Ana Boutique.jpg'),(84,'Usaquen Plaza','Carrera 7 #120-20, Bogotá','Complejo comercial que ofrece opciones de tiendas y servicios de alta calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un destino práctico para tus compras y actividades diarias.',1,'Usaquen','Usaquen Plaza.jpg'),(85,'Hacienda Santa Barbara','Cra. 7 #115-60, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Usaquen','Hacienda Santa Barbara.jpg'),(86,'Cedritos 151','Cl. 150 #16-56, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Usaquen','Cedritos 151.jpg'),(87,'Autopista 184','Autopista Nte. #86, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Usaquen','Autopista 184.jpg'),(88,'Unicentro','Cra. 15 #124-30, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Usaquen','Unicentro.jpg'),(89,'Show Place','Cl 147 #7-70, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Usaquen','Show Place.jpg'),(90,'Altavista','Cl. 58 Sur #1, Bogotá','Centro comercial que destaca por sus buenas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente cómodo. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'Usme','Altavista.jpg'),(91,'Santa Librada','Cl. 75A Sur #18, Bogotá','Espacio de compras que alberga tiendas y servicios de calidad. Proporciona una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para realizar tus compras y actividades diarias.',1,'Usme','Santa Librada.jpg'),(92,'Metrópolis','Ak 68 #75 A – 50, Bogotá','La Ciudadela Comercial Metrópolis Se puede acceder directamente por ella o a través de las estaciones Avenida 68 y Carrera 53 del Sistema TransMilenio.',1,'Barrios_Unidos','Metrópolis.jpg'),(93,'Calle 68','Cl. 68 #17-85, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Barrios_Unidos','Calle 68.jpg'),(94,'Portal Plaza','Cl. 66 #58a7, Bogotá','Complejo comercial que destaca por sus excelentes tiendas y servicios. Brinda una experiencia de compras convencional en un entorno cómodo. Es un espacio práctico para satisfacer tus necesidades diarias.',1,'Barrios_Unidos','Portal Plaza.jpg'),(95,'Iserra 100','Tv. 55 #98a-66, Bogotá','Una mezcla de tiendas y un patio de comidas con cocina internacional, un cine, bancos y servicios personales.',1,'Barrios_Unidos','Iserra 100.jpg'),(96,'Las Rampas','Cra. 24 #67-28, Bogotá','Centro comercial con buenas tiendas y servicios. el centro ofrece una experiencia de compras convencional en un entorno cómodo. Es un lugar práctico para tus compras y actividades diarias.',1,'Barrios_Unidos','Las Rampas.jpg'),(97,'La Estrella','Ac. 44 Sur #9, Bogotá','Centro de compras con buenas opciones de tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Se presenta como un destino práctico para tus compras y actividades diarias.',1,'Rafael_Uribe_Uribe','La Estrella.jpg'),(98,'La Victoria','Ak. 4 Este #20, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'San_Cristobal','La Victoria.jpg'),(99,'Bazar 20 de Julio','Cra. 6 #22 - 25 sur, Bogotá','Centro comercial con destacadas tiendas y servicios. Ofrece una experiencia de compras convencional en un ambiente confortable. Constituye un lugar práctico para satisfacer tus necesidades diarias.',1,'San_Cristobal','Bazar 20 de Julio.jpg');
/*!40000 ALTER TABLE `centros_comerciales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `control` (
  `id` int NOT NULL AUTO_INCREMENT,
  `initialized` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control`
--

LOCK TABLES `control` WRITE;
/*!40000 ALTER TABLE `control` DISABLE KEYS */;
INSERT INTO `control` VALUES (1,0);
/*!40000 ALTER TABLE `control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `cuentas` (
  `Id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Id_servicios` int NOT NULL,
  `Rol` varchar(50) DEFAULT 'Usuario',
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id_Usuario`),
  KEY `Id_servicios` (`Id_servicios`),
  CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`Id_servicios`) REFERENCES `servicios` (`Id_Servicios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (30,'adminl','admin','mybog@gmail.com','$2y$10$KyNjXcFQWpqp3CWMqvu0pO6.c18VMBi02iOgYz4JnOGTFKT9jOxhS',1,'Admin',NULL,0),(53,'Nicolas','Baron','nbaronortiz4@gmail.com','$2y$10$5m3QCuQ1/2mJIomgDtXFe.YAqKxHmumMv.Of8clsVkivY9F2iVurq',1,'Admin',NULL,0),(54,'fabian','jeje','carvajalpitta@gmail.com','$2y$10$TcU7hugZ4HxeANr3VGBzX.xd6SE0hNWoMsjFmmY0iDQaRe4iS2gFu',1,'Usuario',NULL,0),(66,'santiago','polanco','santi01031@outlook.com','$2y$10$lF9Qb8L81vBvvJ1vcAwIxOtgoGNnUGcI1ERIW3CAZizXAzIs3WhpW',1,'Usuario',NULL,0);
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discotecas`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `discotecas` (
  `Id_de_discotecas` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_discotecas` varchar(50) NOT NULL,
  `Ubicacion_de_discotecas` varchar(250) NOT NULL,
  `Informacion_de_discotecas` text NOT NULL,
  `Id_entretenimiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_de_discotecas`),
  KEY `Id_de_entretenimiento` (`Id_entretenimiento`),
  KEY `Id_entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `discotecas_ibfk_1` FOREIGN KEY (`Id_entretenimiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=490 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discotecas`
--

LOCK TABLES `discotecas` WRITE;
/*!40000 ALTER TABLE `discotecas` DISABLE KEYS */;
INSERT INTO `discotecas` VALUES (0,'ADN Disco Bar','Cra 95A #34, Bogotá','Es un lugar muy divertido; tienen varias actividades, buena disposición y excelente servicio. El ambiente del bar es acogedor, con una selección variada de bebidas y un personal amable que contribuye a una experiencia agradable.',1,'Kennedy','ADN Disco Bar.jpg'),(298,'Martina Bar','05 Sur, Cra. 71d #03, Bogota','Martina Bar es un lugar encantador, aunque algunos podrían considerarlo un poco costoso, y a veces aplican detalles en la entrada que no siempre se reflejan en la mesa. Los shows en vivo son definitivamente su punto fuerte, añadiendo un toque especial a la experiencia. Los precios de la carta pueden parecer elevados para la zona, especialmente en el sector de rumba de Plaza de las Américas, cerca del múltiplex. A pesar de ello, es una excelente opción para parejas. Este sitio ofrece la oportunidad perfecta para disfrutar de una noche animada con amigos o en pareja, rumbear hasta el amanecer y sumergirse en la música de moda. La variedad de opciones para bailar, cantar y degustar unos excelentes tequilas garantizan una experiencia divertida. Además, es un lugar con un filtro de seguridad, brindando tranquilidad a los asistentes.',1,'Kennedy','Martina Bar.jpg'),(299,'La zona disco','Av. 1 de Mayo #69b-65, Bogota','La zona disco en Martina Bar es animada y vibrante, con shows en vivo que añaden un toque especial. Aunque algunos podrían encontrar los precios un poco elevados y notar ciertos detalles en la entrada, sigue siendo un lugar excelente para rumbear hasta el amanecer. Perfecto para parejas o salir con amigos, ofrece una experiencia de música de moda, baile y buenos tequilas en un ambiente seguro.',1,'Kennedy','La zona disco.jpg'),(300,'OPEN LUXURY BAR','CALLE 8 SUR # 71D-20, Bogota','OPEN LUXURY BAR es un excelente lugar con una agradable bolirana y chimenea que le añade un toque acogedor. La atención es destacable, lo que lo convierte en un bar altamente recomendado para visitar con amigos.',1,'Kennedy','OPEN LUXURY BAR.jpg'),(301,'Paradaise','61 Sur, Cra. 71d #6, Bogota','Paradaise es un excelente lugar para disfrutar de la vida nocturna en Kennedy. Ofrece buenos precios y un ambiente sano, lo que lo convierte en una opción atractiva para quienes buscan diversión asequible y un ambiente agradable.',1,'Kennedy','Paradaise.jpg'),(302,'XPray Discodemia','Cl. 6 Sur #71 D - 36, Bogota','XPray Discodemia, un lugar vibrante y lleno de energía para disfrutar de la mejor experiencia nocturna. Con un ambiente único y emocionante, ofrece música envolvente, bebidas exquisitas y un espacio perfecto para socializar. ¡Ven y únete a la fiesta en XPray Discodemia, donde cada noche se convierte en una memorable celebración!',1,'Kennedy','XPray Discodemia.jpg'),(303,'Manhattan Club','Cl. 6 Sur #71 D 49, Bogota','Manhattan Club, un rincón urbano donde la sofisticación se encuentra con la diversión. Sumérgete en un ambiente cosmopolita, con música vibrante y cócteles exquisitos. Experimenta la energía única de la noche en este club, donde la elegancia y el entretenimiento se fusionan para ofrecer una experiencia inolvidable. ¡Descubre la esencia de Manhattan en cada momento en el Manhattan Club!',1,'Kennedy','Manhattan Club.jpg'),(304,'Latinos Disco Bar','Av. 1 de Mayo #70B, Bogota','Latinos Disco Bar ofrece un ambiente excepcional, destacando por su amplitud y una atmosfera acogedora. Disfruta de excelentes tragos a precios atractivos, mientras el personal te recibe con hospitalidad. Sumérgete en una experiencia única donde la música, el espacio y la atención se combinan para brindarte momentos inolvidables. ¡Ven y descubre la auténtica fiesta en Latinos Disco Bar!',1,'Kennedy','Latinos Disco Bar.jpg'),(305,'La Celosa Vallenato','A 13 Sur, Cra. 71d #3, Bogota','La Celosa Vallenato, un lugar que celebra la esencia del vallenato con pasión y autenticidad. Sumérgete en un ambiente vibrante, donde la música en vivo te transporta a la esencia misma de este género. Con una atmósfera cálida y acogedora, disfruta de una amplia selección de bebidas y la autenticidad de la cultura vallenata. Ya sea que busques un lugar para bailar o simplemente disfrutar de buena música, La Celosa Vallenato es el destino perfecto para una experiencia auténtica y llena de energía. ¡Vive la pasión del vallenato en cada nota!',1,'Kennedy','La Celosa Vallenato.jpg'),(306,'ROUSS DISCO BAR','Cl. 7a Bis C #78 B - 12. Bogota','Rouss Disco Bar, un espacio vibrante que fusiona la elegancia con la diversión. Sumérgete en un ambiente envolvente, donde la música contagiosa y las bebidas exquisitas te transportan a una experiencia única. Con un toque de sofisticación y atención al detalle, Rouss Disco Bar se presenta como el lugar perfecto para aquellos que buscan una noche memorable. Descubre la combinación perfecta de estilo y entretenimiento en este destino cautivador. ¡Vive la experiencia de Rouss Disco Bar en cada momento!',1,'Kennedy','ROUSS DISCO BAR.jpg'),(307,'Katrina Bar','Cl. 138 #149b 08, Bogota','Katrina Bar emerge como un espacio cautivador donde la diversión se fusiona con un toque de distinción. Este lugar ofrece no solo una experiencia de entretenimiento, sino también una atmósfera única que invita a los visitantes a sumergirse en momentos memorables. Con detalles bien cuidados, Katrina Bar se presenta como un destino que va más allá de la simple diversión, ofreciendo una experiencia distintiva y envolvente para aquellos que buscan algo más en su salida nocturna.',1,'Suba','Katrina Bar.jpg'),(308,'Bonka','14, Cl. 145b #91, Bogota','Bonka de Suba se distingue como un lugar exclusivo en la zona rosa de Suba, ofreciendo un ambiente agradable para sus visitantes. Con eventos en vivo, este establecimiento opera hasta las 5:00 am, funcionando como un club privado que añade un toque distintivo a la experiencia nocturna. La capacidad para albergar a un gran número de personas destaca entre sus características, lo que contribuye a una atmósfera animada. La atención rápida es una prioridad, aunque se menciona que los precios pueden ser elevados.',1,'Suba','Bonka.jpg'),(309,'El patron','Cra. 111 #157-30, Bogota','El Patrón destaca como un bar de alta calidad, con un ambiente amplio y atractivo. Su diseño se destaca por su amplitud y belleza, proporcionando un entorno agradable para sus visitantes. Es reconocido como un excelente lugar para amanecer, ya que su horario de cierre se extiende hasta las 6-6:30 am, ofreciendo a los clientes la oportunidad de disfrutar de la noche hasta altas horas de la madrugada. Además, se menciona que los precios de las bebidas son accesibles, lo que añade un atractivo adicional al lugar. En resumen, El Patrón se presenta como una opción destacada para aquellos que buscan una experiencia nocturna prolongada en un entorno agradable y con bebidas a precios razonables.',1,'Suba','El patron.jpg'),(310,'La Reina Disco Club','a 140c-73, Cra. 104 #140c-1, Bogotá','La Reina Disco Club es un vibrante centro nocturno que ofrece una experiencia única en entretenimiento. Con un ambiente animado y envolvente, este club es conocido por su atmósfera festiva. Ofrece una variada selección de música y eventos en vivo para satisfacer los gustos de su diverso público. La atención rápida y eficiente, junto con precios competitivos, contribuyen a una experiencia positiva para los visitantes. La Reina Disco Club se presenta como un destino emocionante para aquellos que buscan disfrutar de la vida nocturna en un entorno dinámico y lleno de energía.',1,'Suba','La Reina Disco Club.jpg'),(311,'Tokio Urbano','Cra. 91 #145b-38, Bogota','Tokio Urbano, ubicado en Suba, destaca como un espacio dinámico y moderno para la vida nocturna. Con un ambiente vibrante, este lugar ofrece una experiencia única en entretenimiento. La música variada y eventos especiales brindan opciones para diversos gustos, mientras que la atención eficiente y los precios competitivos contribuyen a una experiencia positiva para los visitantes. Tokio Urbano se presenta como un destino emocionante para aquellos que buscan disfrutar de la vida nocturna en Suba, sumergiéndose en un entorno lleno de energía y diversión.',1,'Suba','Tokio Urbano.jpg'),(312,'La Cupula Disco Bar','Cra. 93 #129c 95, Bogotá','La Cúpula Disco Bar es un establecimiento nocturno que ofrece una experiencia vibrante y animada. Con una atmósfera única, se destaca por su ambiente festivo y diverso. La música variada y eventos especiales añaden un toque dinámico a la experiencia. La atención al cliente es un aspecto clave, proporcionando un servicio eficiente. La Cúpula Disco Bar se presenta como un destino emocionante para aquellos que buscan disfrutar de la vida nocturna en un entorno lleno de energía y entretenimiento.',1,'Suba','La Cupula Disco Bar.jpg'),(313,'La Farra','a 145a-48, Cra. 92 #145a2, Bogotá','La Farra de Suba es un destino animado y lleno de energía para disfrutar de la vida nocturna en Suba. Con un ambiente festivo, este establecimiento ofrece una experiencia diversa y emocionante. La música variada y eventos especiales proporcionan opciones para distintos gustos, mientras que la atención al cliente se destaca por su eficiencia. La Farra de Suba se presenta como un lugar dinámico y vibrante, ideal para aquellos que buscan pasar momentos animados en un entorno entretenido y acogedor.',1,'Suba','La Farra.jpg'),(314,'Parranda vallenata','Cra. 145 #145a 41, Bogota','Parranda Vallenata es un grupo excepcional que merece ser recomendado. Su destacada calidad se refleja en su puntualidad y profesionalismo. Brindan una experiencia musical de alto nivel, convirtiendo cualquier evento en una celebración inolvidable. En resumen, Parranda Vallenata no solo destaca por su excelente música, sino también por su confiabilidad y compromiso, asegurando momentos memorables en cada presentación.',1,'Suba','Parranda vallenata.jpg'),(315,'Praga Club','Cl. 145b # 91-20, Bogotá','Praga Club, en términos generales, ofrece una experiencia positiva. No obstante, algunas ocasiones presentan situaciones desafiantes, especialmente cuando no hay límite de ingreso, lo que puede resultar en una aglomeración desproporcionada de personas. Es importante considerar estas circunstancias al planificar una visita, pero en general, el lugar proporciona una experiencia satisfactoria para sus asistentes.',1,'Suba','Praga Club.jpg'),(316,'Open down VIP','Cl. 146a #92-15, Bogota','Open Down VIP se destaca como uno de los mejores lugares en Suba, ofreciendo una experiencia destacada. Con un ambiente atractivo y servicios de calidad, este establecimiento se posiciona como un destino preferido. La reputación positiva sugiere que Open Down VIP brinda momentos memorables y una atmósfera agradable para aquellos que buscan disfrutar de la vida nocturna en Suba.',1,'Suba','Open down VIP.jpg'),(317,'Los Cuates Disco Bar','Cra. 23 # 9 - 45, Bogotá','Los Cuates Disco Bar se distingue como un excelente lugar que ofrece una experiencia musical destacada. La presencia de talentosos cantantes y un sonido genial contribuyen a un ambiente vibrante y agradable. En resumen, Los Cuates Disco Bar se presenta como un destino recomendado para aquellos que buscan disfrutar de la música en un ambiente de calidad.',1,'Los_Martires','Los Cuates Disco Bar.jpg'),(318,'El Poblado Bar','Cl. 9a #22-36. Bogota','El Poblado Bar se presenta como un lugar destacado que ofrece una experiencia nocturna única. Con un ambiente vibrante y acogedor, este establecimiento es conocido por su atención al cliente, una amplia variedad de bebidas y una atmósfera festiva. Ideal para socializar y disfrutar de la música, El Poblado Bar se erige como un destino recomendado para aquellos que buscan vivir la vida nocturna en un entorno animado y agradable.',1,'Los_Martires','El Poblado Bar.jpg'),(319,'Londres A&P Club','Cra. 23 #9 -49,Bogota','Londres A&P Club, ubicado en Los Mártires, se presenta como un lugar que ofrece una experiencia nocturna única. Con un ambiente característico, este establecimiento es conocido por su diversidad musical, atención al cliente y una atmósfera animada. Ideal para aquellos que buscan vivir la vida nocturna en un entorno atractivo y dinámico, Londres A&P Club se destaca como un destino recomendado para disfrutar de buenos momentos en la escena nocturna de Los Mártires.',1,'Los_Martires','Londres A&P Club.jpg'),(320,'Aron Calle 13','Cl. 13 #29 - 26, Bogotá','Aron Calle 13 se destaca como un lugar excelente, con instalaciones impecablemente limpias y un ambiente de alta calidad. Las aseadas instalaciones contribuyen a una experiencia positiva para los visitantes. En resumen, Aron Calle 13 se presenta como un destino destacado que ofrece tanto un entorno agradable como unas instalaciones bien cuidadas para disfrutar de momentos memorables.',1,'Los_Martires','Aron Calle 13.jpg'),(321,'El Club','Av NQS #8-51, Bogotá','El Club ofrece una experiencia positiva con contenido de calidad y creativas ideas. Destacando por su enfoque innovador, proporciona a los asistentes una experiencia enriquecedora. En resumen, El Club se distingue por ofrecer una experiencia agradable, caracterizada por su contenido sólido y conceptos innovadores.',1,'Los_Martires','El Club.jpg'),(322,'El Templo discoteca','Cl 17 Sur #16-77, Bogota','La discoteca El Templo destaca como un lugar que ofrece una experiencia positiva, sugiriendo que una extensión del horario sería una adición genial. En resumen, el establecimiento se presenta como un destino agradable y la sugerencia de prolongar el horario refleja el deseo de ampliar la experiencia positiva para los visitantes.',1,'Los_Martires','El Templo discoteca.jpg'),(323,'PREMIUM DISTRITO BAR','Cra. 17 #18-27,Bogota','Premium Distrito Bar se presenta como un lugar que fusiona un ambiente exclusivo con una selección musical destacada. Con una atmósfera envolvente y cuidada, este establecimiento ofrece a sus visitantes una experiencia única. La combinación de un entorno elegante y una variada selección musical crea el escenario perfecto para disfrutar de la noche.',1,'Los_Martires','PREMIUM DISTRITO BAR.jpg'),(324,'Paradise Disco TK','Cra. 16 #1828, Bogotá','Paradise Disco TK se destaca por ofrecer una experiencia musical variada y envolvente que satisface diferentes gustos. Con un personal atento y profesional, el establecimiento garantiza un servicio de calidad que contribuye al ambiente positivo. En resumen, Paradise Disco TK ofrece tanto una selección musical diversa como un equipo comprometido, creando así un espacio atractivo para disfrutar de la música y la compañía.',1,'Los_Martires','Paradise Disco TK.jpg'),(325,'Bar & Club De Tejo','Cra. 15 Bis #1943, Bogotá','Bar & Club de Tejo \"El Sótano\" se presenta como un lugar único que combina la tradición del tejo con un ambiente de bar y club. Con una atmósfera auténtica, este establecimiento ofrece una experiencia acogedora para los visitantes. La fusión de la cultura del tejo con el ambiente de bar y club crea un espacio distintivo para disfrutar de momentos sociales y entretenidos. En resumen, \"El Sótano\" se destaca por su propuesta única que celebra la diversión, la tradición y la sociabilidad.',1,'Santa_Fe','Bar & Club De Tejo.jpg'),(326,'Londres Bar','Cra. 16 #242, Bogotá','Londres Bar se distingue como un lugar genial y agradable. Con una atmósfera acogedora, este establecimiento ofrece una experiencia positiva para sus visitantes. En resumen, Londres Bar se presenta como un buen lugar para disfrutar de momentos sociales en un ambiente agradable y ameno.',1,'Santa_Fe','Londres Bar.jpg'),(327,'TROYA NIGHT CLUB','Cra. 16a #23-89, Bogotá','Troya Night Club, según la puntuación proporcionada, se destaca en todas las áreas evaluadas. Con una calificación perfecta de 5 en comida, servicio y ambiente, sugiere una experiencia excepcional en general. Este lugar parece ofrecer no solo excelentes opciones gastronómicas sino también un servicio impecable y un ambiente agradable. En resumen, Troya Night Club parece ser una elección sobresaliente para aquellos que buscan una experiencia completa y satisfactoria.',1,'Santa_Fe','TROYA NIGHT CLUB.jpg'),(328,'Salsa Bar','Cra. 13a #2312, Bogotá','Salsa Bar se destaca por ofrecer una amplia variedad de géneros musicales para satisfacer los gustos diversos de sus visitantes. Con una selección musical que va más allá de la salsa, este establecimiento proporciona un ambiente dinámico y animado. En resumen, Salsa Bar es reconocido por su diversidad musical, creando así un espacio versátil y atractivo para los amantes de diferentes estilos musicales.',1,'Santa_Fe','Salsa Bar.jpg'),(329,'Rockola Bar','Cl. 23a #1910, Bogotá','El Rockola Bar es un lugar vibrante y lleno de energía que combina la atmósfera acogedora de un bar con la emoción de la música en vivo. Sus instalaciones destacan por su diseño moderno y ecléctico, creando un ambiente único y atractivo para los amantes de la música y la diversión.',1,'Santa_Fe','Rockola Bar.jpg'),(330,'El Mercantil','Cl 22 #9-45, Bogotá','En el corazón de la ciudad, El Mercantil se destaca como un espacio acogedor que ofrece a sus clientes una experiencia única. Con un ambiente cálido y servicio amigable, este lugar se ha ganado la reputación de ser un refugio para aquellos que buscan comodidad, calidad y precios atractivos. Atmósfera Acogedora: Decoración encantadora y cuidadosamente seleccionada para crear un ambiente acogedor. Espacios bien iluminados y distribuidos para brindar comodidad a los visitantes.',1,'Santa_Fe','El Mercantil.jpg'),(331,'Bar Plaza Garibaldi','Cl. 23 #6 - 45, Bogotá','En el corazón de la ciudad, el Bar Plaza Garibaldi se erige como un ícono de la vida nocturna y la cultura local. Con una mezcla única de tradición y modernidad, este establecimiento ofrece a sus visitantes una experiencia vibrante y auténtica.',1,'Santa_Fe','Bar Plaza Garibaldi.jpg'),(332,'LA ESCALERA BAR CAFÉ Y SON','Cra. 7 #26, Bogotá','Ubicado en un rincón encantador, La Escalera Bar Café y Son se erige como un destino único que fusiona la calidez de un café, la vitalidad de un bar y la magia de la música. Este establecimiento busca proporcionar a sus visitantes una experiencia multisensorial que va más allá de la simple degustación, ofreciendo un ambiente acogedor y vibrante.',1,'Santa_Fe','LA ESCALERA BAR CAFÉ Y SON.jpg'),(333,'Incontro Bar','96, Cra 35 #1h, Bogotá','Incontro Bar se destaca por ofrecer no solo bebidas y comestibles, sino también una experiencia donde la amabilidad y el servicio de calidad son protagonistas. Este establecimiento ha cultivado un ambiente acogedor que invita a los clientes a sentirse bienvenidos y atendidos de manera excepcional.',1,'Puente_Aranda','Incontro Bar.jpg'),(334,'Samoa Bar','Cl. 8 Sur #38-16, Bogotá','El Samoa Bar se erige como un destino destacado que combina un ambiente animado con instalaciones de alta calidad, ofreciendo a sus visitantes una experiencia completa. Desde su diseño moderno hasta su atención meticulosa a los detalles, este establecimiento se presenta como un lugar que va más allá de la simple oferta de bebidas, proporcionando un espacio donde la calidad se encuentra con la comodidad.',1,'Puente_Aranda','Samoa Bar.jpg'),(335,'GATO GRIS','Cl. 8 Sur #40-62, Bogotá','En el corazón de la escena nocturna, el Gato Gris se destaca como un destino que fusiona la excelencia en coctelería con una experiencia musical vibrante. Este establecimiento ha perfeccionado el arte de mezclar bebidas de alta calidad mientras ofrece un entorno envolvente donde la música se convierte en la banda sonora de una noche inolvidable.',1,'Puente_Aranda','GATO GRIS.jpg'),(336,'EL CATADOR','10, Cra. 40b #24, Bogotá','El Catador se erige como un destino distintivo que va más allá de ser simplemente un lugar para degustar. Este establecimiento se presenta como un oasis para los amantes del buen gusto, ofreciendo una experiencia completa que fusiona la excelencia en vinos y comestibles con un ambiente encantador y acogedor.',1,'Puente_Aranda','EL CATADOR.jpg'),(337,'El rincon paisa bar','Cr 52c # 47,Bogotá','El Rincón Paisa Bar se presenta como un enclave que celebra la riqueza cultural y la calidez característica de la región. Este establecimiento es mucho más que un simple bar; es un lugar que busca transportar a sus visitantes a la esencia misma de la hospitalidad paisa, ofreciendo una experiencia auténtica y acogedora.',1,'Puente_Aranda','El rincon paisa bar.jpg'),(338,'Costalitos Bar','Cra. 41A, Bogotá','Costalitos Bar destaca como un lugar donde la excelencia en el servicio es la prioridad, ofreciendo a sus clientes una experiencia única y memorable. Más allá de ser simplemente un bar, este establecimiento se distingue por su atención meticulosa a los detalles y un ambiente que fomenta la satisfacción y comodidad de cada visitante.',1,'Puente_Aranda','Costalitos Bar.jpg'),(339,'dubai bar','Cl. 5a #43a-64, Bogotá','Dubai Bar se posiciona como un lugar vibrante y acogedor, diseñado para ser el punto de encuentro perfecto entre amigos. Con una atmósfera distendida y enfocada en la camaradería, este establecimiento ofrece a sus visitantes la oportunidad de disfrutar de la compañía de amigos, seguir eventos deportivos y disfrutar de un ambiente relajado con bebidas refrescantes.',1,'Puente_Aranda','dubai bar.jpg'),(340,'ZEPPELIN ROCK BAR','Cra. 53f #4a-40, Bogotá','Zeppelin Rock Bar emerge como un santuario para los amantes del rock, fusionando la energía del género musical con una experiencia de bar única. Este establecimiento se presenta como un destino donde la música vibrante y la atmósfera electrizante se combinan para ofrecer a sus visitantes una experiencia inmersiva.',1,'Puente_Aranda','ZEPPELIN ROCK BAR.jpg'),(341,'Hard beer terraza bar','Cra. 56 #4-83, Bogotá','Hard Beer Terraza Ba se presenta como un destino dinámico y vibrante que combina la energía de un bar con la relajación de una terraza al aire libre. Este establecimiento se destaca por ofrecer una experiencia única donde la variedad de cervezas y la atmósfera de la terraza se fusionan para crear momentos memorables.',1,'Puente_Aranda','Hard beer terraza bar.jpg'),(342,'Brazilian Pub','Cra. 55, #2a98, Bogotá','Brazilian Pub se erige como un destino destacado, combinando la autenticidad de la cultura brasileña con un servicio ágil y un ambiente encantador. Este establecimiento busca ofrecer a sus clientes una experiencia excepcional, donde la atención rápida se une a un entorno maravilloso para crear momentos inolvidables.',1,'Puente_Aranda','Brazilian Pub.jpg'),(343,'Presea','Calle 85 # 14 - 43, Bogota','En este bar, puedes pedir su sorprendente laing. Según las opiniones de los usuarios, los precios son razonables. Normalmente es una buena idea probar cosas nuevas, así que disfruta del exótico ambiente. Presea ha logrado un 4,2 según el baremo de valoraciones de Google. La música es buenísima solo reggaetón old school y un poco del nuevo perfecto para una noche de perreo y el ambiente buenísimo, Un sitio único en Latinoamerica, donde podrás vivir la verdadera experiencia del Reggaeton en un ambiente seguro, bien situado y con precios razonables.',1,'Chapinero','Presea.jpg'),(344,'Sutton Club','Carrera 15 # 93-37, Bogota','El bar se encuentra estratégicamente ubicado en el norte de Bogotá, en una de las mejores zonas para la vida nocturna. El lugar ofrece un ambiente atractivo, con una amplia barra que sirve una variada selección de tragos y cócteles. Este bar está ambientado con el estilo de los clubes europeos y de Las Vegas. Maneja una buena tecnología para ofrecer a sus asistentes calidad en el sonido e iluminación. Entre tanto, tiene banda en vivo, un techo corredizo y terraza para fumadores.',1,'Chapinero','Sutton Club.jpg'),(345,'Theatron','Cl. 58 #10-32, Bogotá','Theatron es un conocido complejo de entretenimiento en Bogotá, Colombia. Se presenta como el club nocturno más grande de América Latina y uno de los más grandes del mundo. Theatron cuenta con múltiples salas temáticas, cada una con su propio estilo musical y ambiente, lo que permite a los visitantes disfrutar de una variedad de experiencias en un solo lugar. El complejo está ubicado en un antiguo teatro y tiene capacidad para albergar a miles de personas. Ofrece una amplia gama de eventos y espectáculos, desde presentaciones en vivo hasta fiestas temáticas, convirtiéndolo en un destino popular para aquellos que buscan una noche animada y diversa.',1,'Chapinero','Theatron.jpg'),(346,'Felina','Cl. 65 #13 - 50, Bogotá','Bienvenidos a la selva del perreo, en donde todos tus sentidos se excitaran al ritmo del Dancehall y el Reggaeton. Sentirás el placer del ambiente salvaje, lujurioso y elegante que solo Felina \"La selva del perreo\" te puede ofrecer. Abrimos de jueves a sábado - 8 pm. Te invitamos a que visites nuestra tienda virtual, en donde podrás encontrar maravillosos productos, que te harán lucir como todo un Felino.',1,'Chapinero','Felina.jpg'),(347,'El Bunker Club','Cra. 9a #60-25, Bogota','El Bunker Club se destaca por ser un local amplio y limpio, ofreciendo un servicio de calidad. Los valores para las bebidas son accesibles, lo que lo convierte en una opción atractiva. El ambiente cuenta con una buena ventilación y un espacio generoso. Con un cover de solo $10.000 no consumibles, es una opción económica para acceder al lugar. Además, se preocupa por la comodidad de los visitantes al ofrecer servicios como guardar maletas y chaquetas. Con varios ambientes, El Bunker Club proporciona una experiencia diversa y trabaja hasta las 5 am, brindando a los asistentes la oportunidad de disfrutar de la noche durante un extenso periodo de tiempo.',1,'Chapinero','El Bunker Club.jpg'),(348,'Soko Bar','29, Cl. 51 #7, Bogota','Soko Bar destaca como un excelente bar que atrae a un público diverso, diferenciándose de otros lugares que se centran exclusivamente en reggaetón, perreo y dancehall. La amplitud de su selección musical, que abarca desde merengue hasta bachata, lo convierte en un destino atractivo para personas con diversos gustos musicales. Además, los precios son razonables, lo que lo hace accesible para diferentes grupos de personas. Soko Bar se presenta como un espacio acogedor que ofrece una experiencia musical variada, permitiendo a los visitantes disfrutar de una amplia gama de géneros y estilos.',1,'Chapinero','Soko Bar.jpg'),(349,'Sutton Club','Cra. 15 #93 - 37, Bogota','Sutton Club se distingue por tener medidas de seguridad estrictas, aunque el personal puede parecer serio, esto se hace en beneficio de todos los asistentes. El lugar ofrece muebles de calidad y baños bien mantenidos, contribuyendo a una experiencia positiva. Destaca un segundo piso que proporciona un ambiente ideal para los visitantes. Además, la conveniencia de tener un parqueadero cercano agrega comodidad para los clientes. Se sugiere llamar para confirmar si el parqueadero opera las 24 horas y resolver cualquier pregunta o inquietud que puedas tener. Sutton Club se presenta como un lugar que prioriza la seguridad y la comodidad de sus visitantes.',1,'Chapinero','Sutton Club.jpg'),(350,'Indigo Club 51','Cra. 9 #51-22, Bogota','Indigo Club 51 se destaca como una discoteca con un ambiente vibrante, ofreciendo una variada selección de géneros para bailar. El servicio es reconocido por su amabilidad y rapidez, proporcionando una experiencia positiva para los asistentes. Con dos pisos disponibles, ambos ofrecen diversión, aunque es importante señalar que arriba puede hacer más calor. El establecimiento cobra un cover que varía entre 10k y 20k dependiendo de la hora, ofreciendo opciones flexibles para los visitantes. Indigo Club 51 se presenta como un lugar que brinda opciones para todos los gustos, con la oportunidad de disfrutar de una noche animada en un ambiente agradable.',1,'Chapinero','Indigo Club 51.jpg'),(351,'Fuzion Bar club','Cra. 13 #59-24, Bogota','Fuzion Bar Club se describe como un excelente lugar para disfrutar y divertirse con amigos cercanos. Destaca por su ambiente animado, aunque puede no ser adecuado para personas sensibles. La experiencia compartida fue maravillosa, lo que sugiere que el lugar ofrece momentos memorables y una atmósfera que propicia la diversión.',1,'Chapinero','Fuzion Bar club.jpg'),(352,'Roots Bar 51','Cl. 51 #7-43, Bogotá','La discoteca ofrece un ambiente muy cómodo, según la experiencia vivida. Sin embargo, se señala un inconveniente relacionado con una empleada del lugar. A pesar de que inicialmente se ofreció a traer las bebidas, posteriormente regresó indicando que faltaba dinero, a pesar de que se había contado antes de su partida. Este incidente puede haber generado una situación incómoda para los clientes.',1,'Chapinero','Roots Bar 51.jpg'),(353,'Taboo Bar','Dg. 48 Sur #50-11, Bogotá','Taboo Bar ofrece una experiencia intrigante y posiblemente única. Con un ambiente vibrante y una selección variada de bebidas, este establecimiento busca cautivar a sus visitantes con una atmósfera inigualable, posiblemente combinando elementos de diversión y estilo.',1,'Tunjuelito','Taboo Bar.jpg'),(354,'Roldan Family Bar','Dg. 48 Sur #5230, Bogotá','Roldan Family Bar se presenta como un espacio acogedor diseñado para disfrutar en familia. Con una oferta de bebidas diversa y posiblemente opciones para todas las edades, este bar busca crear un ambiente familiar y relajado.',1,'Tunjuelito','Roldan Family Bar.jpg'),(355,'Alpha Café Bar','Cra. 52c #49A 33 Sur, Bogotá','Alpha Café Bar fusiona la calidez de un café con la energía de un bar. Con una variedad de opciones de bebidas y posiblemente una atmósfera versátil, este establecimiento busca ofrecer una experiencia única que se adapte a diferentes preferencias y momentos del día.',1,'Tunjuelito','Alpha Café Bar.jpg'),(356,'The Office Bar','Dg. 50 Sur #52D-23, Bogotá','The Office Bar se presenta como un lugar que va más allá de ser simplemente un bar. Con un posible enfoque en la profesionalidad, este establecimiento ofrece un ambiente cómodo y posiblemente elegante para aquellos que buscan relajarse después del trabajo.',1,'Tunjuelito','The Office Bar.jpg'),(357,'OASIS CAFÉ BAR','Dg. 49 Sur #53-30, Bogotá','OASIS CAFÉ BAR evoca la sensación de un oasis, ofreciendo a sus visitantes un refugio para relajarse. Con una variedad de bebidas y posiblemente una decoración que sugiere tranquilidad, este bar busca ser un espacio acogedor y rejuvenecedor.',1,'Tunjuelito','OASIS CAFÉ BAR.jpg'),(358,'Bar El Tio','Dg. 47 Sur, Bogotá','Bar El Tio se presenta como un lugar con un toque familiar y acogedor. Con una selección de bebidas que posiblemente refleje la tradición local, este bar busca ser un punto de encuentro para amigos y familiares.',1,'Tunjuelito','Bar El Tio.jpg'),(359,'Las noches de mari bar','Cl. 55 Sur #25-27, Bogotá','Las Noches de Mari Bar promete una experiencia nocturna animada y alegre. Con posibles eventos temáticos y una selección vibrante de bebidas, este establecimiento busca ofrecer noches memorables en un ambiente festivo.',1,'Tunjuelito','Las noches de mari bar.jpg'),(360,'FONDA LA RIOJA','16, Cra. 38a #53, Bogotá','FONDA LA RIOJA se presenta como una fonda que celebra la cultura y posiblemente la gastronomía de la región. Con una oferta de bebidas auténticas y un ambiente que sugiere tradición, este establecimiento busca brindar una experiencia auténtica.',1,'Tunjuelito','FONDA LA RIOJA.jpg'),(361,'La Tienda Azul','Cl. 55 Sur # 36, Bogotá','La Tienda Azul se destaca por su posible encanto y carácter único. Con una variedad de bebidas y una atmósfera que puede reflejar un estilo distintivo, este bar busca ofrecer a sus visitantes una experiencia que va más allá de lo convencional.',1,'Tunjuelito','La Tienda Azul.jpg'),(362,'Quilichao Bar','Cra 20 #37-86, Bogotá','Quilichao Bar es un destino singular que destaca por su ambiente distintivo y posiblemente su personalidad única. Con una oferta variada de bebidas y, quizás, eventos temáticos, este bar busca proporcionar a sus visitantes una experiencia memorable y auténtica en el corazón de la vida nocturna local.',1,'Teusaquillo','Quilichao Bar.jpg'),(363,'LA 40 BAR Colonial','Cra. 16 #39A-95, Bogotá','LA 40 BAR Colonial ofrece una experiencia única al fusionar la rica historia colonial con un ambiente vibrante. Con una amplia selección de bebidas y posiblemente música en vivo, este bar se presenta como un punto de encuentro para aquellos que buscan sumergirse en la tradición y la energía del lugar.',1,'Teusaquillo','LA 40 BAR Colonial.jpg'),(364,'La Estación','Cl. 35 #14-76, Bogotá','La Estación destaca por ser más que un simple bar, ofreciendo a sus visitantes un ambiente acogedor y posiblemente un espacio para disfrutar de la gastronomía. Con una cuidada selección de bebidas y, tal vez, música ambiental, este establecimiento se presenta como un lugar versátil para encuentros sociales.',1,'Teusaquillo','La Estación.jpg'),(365,'WILLY’S Pub','Cl. 37 #13- 11, Bogotá','WILLY’S Pub se posiciona como un destino animado para los amantes de la diversión y la buena música. Con una atmósfera enérgica, selección de bebidas variadas y posiblemente eventos temáticos, este pub busca ofrecer una experiencia vibrante para aquellos que buscan disfrutar de la vida nocturna.',1,'Teusaquillo','WILLY’S Pub.jpg'),(366,'Bar Metro 43','Cl. 43 #14-43, Bogotá','Bar Metro 43 destaca por su ambiente moderno y posiblemente su ubicación céntrica. Con una barra bien surtida y, tal vez, eventos especiales, este establecimiento busca ofrecer a sus clientes una experiencia contemporánea en el corazón de la ciudad.',1,'Teusaquillo','Bar Metro 43.jpg'),(367,'La Oficina','Cl. 47 #14a-08, Bogotá','La Oficina se presenta como un lugar para relajarse y socializar en un entorno posiblemente profesional. Con una oferta de bebidas que puede incluir opciones más refinadas, este establecimiento busca ofrecer una experiencia única que va más allá de la típica salida nocturna.',1,'Teusaquillo','La Oficina.jpg'),(368,'Green Valley','Cl. 50 #19 - 04, Bogotá','Green Valley se presenta como un oasis de relajación y diversión. Con un posible enfoque en bebidas refrescantes y un entorno natural, este establecimiento busca ofrecer a sus visitantes una experiencia tranquila y agradable.',1,'Teusaquillo','Green Valley.jpg'),(369,'11 11 Café Bar','Cra. 21 #52-4, Bogotá','11 11 Café Bar fusiona la cultura del café con un ambiente social. Con una variedad de opciones de café y, posiblemente, música en vivo, este establecimiento se presenta como un lugar acogedor para disfrutar de bebidas y conversaciones.',1,'Teusaquillo','11 11 Café Bar.jpg'),(370,'Tribuna Bar','Cra 27 #53 - 51, Bogotá','Tribuna Bar destaca por su posible enfoque en eventos deportivos y una atmósfera animada. Con una selección de bebidas para disfrutar durante los juegos, este bar se presenta como el lugar ideal para los fanáticos que buscan un ambiente festivo.',1,'Teusaquillo','Tribuna Bar.jpg'),(371,'Viejo Pipe del Campín Bar','Ac. 57 #85, Bogotá','Viejo Pipe del Campín Bar se presenta como un destino con carácter propio, fusionando la tradición del lugar con una atmósfera única. Este bar busca ofrecer a sus visitantes una experiencia auténtica y memorable, tal vez resaltando la historia del Campín. Con una selección cuidada de bebidas, música vibrante, y posiblemente eventos temáticos, este establecimiento se presenta como un rincón especial donde la diversión y la nostalgia se encuentran.',1,'Teusaquillo','Viejo Pipe del Campín Bar.jpg'),(372,'El Irish Pub','Cra. 6a #117-45, Bogotá','El Irish Pub transporta a sus visitantes a la esencia de Irlanda. Con una auténtica selección de cervezas y posiblemente música tradicional, este establecimiento busca ofrecer una experiencia única con el encanto y la hospitalidad irlandesa.',1,'Usaquen','El Irish Pub.jpg'),(374,'Mala Vida Wine Bar','Cra. 7 #115-72, Bogotá','Mala Vida Wine Bar ofrece un rincón especial para los amantes del vino. Con una cuidada selección de vinos y posiblemente una atmósfera elegante, este bar busca ser el destino perfecto para aquellos que disfrutan de una buena copa de vino.',1,'Usaquen','Mala Vida Wine Bar.jpg'),(375,'Mr Bum Audiobar','Cra. 6 #116-56, Bogotá','Mr Bum Audiobar combina la experiencia de un bar con una oferta auditiva única. Con posiblemente eventos temáticos y una selección variada de bebidas, este establecimiento busca ofrecer una experiencia multisensorial para sus visitantes.',1,'Usaquen','Mr Bum Audiobar.jpg'),(376,'Bogota Beer Company','Cra. 6 #119-24, Bogotá','Bogota Beer Company es conocida por su dedicación a la cerveza artesanal. Con una amplia selección de cervezas y posiblemente opciones de maridaje, este establecimiento busca satisfacer los paladares de los amantes de la cerveza con productos locales de calidad.',1,'Usaquen','Bogota Beer Company.jpg'),(377,'Bar Shamua','Av. Cra 19 #114-70, Bogotá','Bar Shamua es un lugar que posiblemente destaca por su atmósfera animada y acogedora. Con una variedad de bebidas y posiblemente eventos en vivo, este bar busca ser un punto de encuentro para la diversión y la socialización.',1,'Usaquen','Bar Shamua.jpg'),(378,'El Monje Bar','Cra. 15a #120-36, Bogotá','El Monje Bar evoca una sensación de misterio y posiblemente tradición. Con una selección de bebidas única y posiblemente un ambiente temático, este bar busca ofrecer a sus visitantes una experiencia memorable y distintiva.',1,'Usaquen','El Monje Bar.jpg'),(379,'Pedro Mandinga Rum Bar','Cl. 117 #6a-05, Bogotá','Pedro Mandinga Rum Bar se especializa en la pasión por el ron. Con una amplia gama de opciones de ron y posiblemente experiencias de cata, este bar busca llevar a sus visitantes en un viaje sensorial a través del fascinante mundo del ron.',1,'Usaquen','Pedro Mandinga Rum Bar.jpg'),(380,'Parrilla Bar','30, Cra. 19 Bis #117, Bogotá','Parrilla Bar fusiona la experiencia de una parrilla con la atmósfera de un bar. Con opciones de bebidas que complementan los sabores de la parrilla y posiblemente música animada, este establecimiento busca ofrecer una experiencia culinaria y social única.',1,'Usaquen','Parrilla Bar.jpg'),(381,'Primos Bar','Cl. 16 Sur #10-21, Bogotá','Primos Bar ofrece un ambiente familiar y amigable. Con una selección variada de bebidas y posiblemente eventos sociales, este bar busca ser un punto de encuentro para amigos y familiares.',1,'Antonio_Nariño','Primos Bar.jpg'),(382,'MILAGROS CANTINA','Cra. 16 #18-04 Sur, Bogotá','MILAGROS CANTINA posiblemente se destaca por su ambiente cantinero auténtico. Con una selección de bebidas y posiblemente música en vivo, este establecimiento busca ofrecer una experiencia acogedora y animada.',1,'Antonio_Nariño','MILAGROS CANTINA.jpg'),(383,'Bar Karaoke Pub','Cra. 12D #16 16 sur, Bogotá','Bar Karaoke Pub combina la diversión del karaoke con la atmósfera de un pub. Con una selección de bebidas y posiblemente un escenario para actuaciones, este lugar busca ser un destino para los amantes del karaoke.',1,'Antonio_Nariño','Bar Karaoke Pub.jpg'),(384,'La bodeguita de patty','Cra. 24D Bis #16-05 sur, Bogota','La bodeguita de patty posiblemente se presenta como un rincón acogedor y local. Con una variedad de bebidas y posiblemente un ambiente familiar, este bar busca ser un lugar para relajarse y disfrutar.',1,'Antonio_Nariño','La bodeguita de patty.jpg'),(385,'Bar La Paisa','Cra 19D #394, Bogotá','Bar La Paisa celebra la cultura paisa. Con una selección auténtica de bebidas y posiblemente eventos culturales, este bar busca ofrecer a sus visitantes una experiencia que refleje las tradiciones de la región paisa.',1,'Antonio_Nariño','Bar La Paisa.jpg'),(386,'Nariño Ranodromo','Cra. 10 #832, Bogotá','Nariño Ranodromo posiblemente se destaca por su atmósfera animada y eventos. Con una variedad de bebidas y posiblemente música en vivo, este establecimiento busca ser un lugar de entretenimiento y socialización.',1,'Antonio_Nariño','Nariño Ranodromo.jpg'),(387,'Bar la chimenea','Dg. 59c Sur #13-33, Bogotá','Bar la chimenea posiblemente ofrece un ambiente cálido y acogedor. Con una selección de bebidas y posiblemente una decoración que sugiere confort, este bar busca ser un refugio para sus visitantes.',1,'Antonio_Nariño','Bar la chimenea.jpg'),(388,'Café Bar La Cantina DyR','Cra. 25 #17 -06 sur, Bogotá','Café Bar La Cantina DyR combina la cultura del café con el ambiente de una cantina. Con opciones de café y posiblemente bebidas especiales, este establecimiento busca ofrecer una experiencia única.',1,'Antonio_Nariño','Café Bar La Cantina DyR.jpg'),(389,'Melina Bar','Cl. 16 Sur #14-86, Bogotá','Melina Bar posiblemente se destaca por su estilo y elegancia. Con una selección cuidada de bebidas y posiblemente música ambiental, este bar busca ser un destino para aquellos que buscan una experiencia más refinada.',1,'Antonio_Nariño','Melina Bar.jpg'),(390,'Café bar j r l','Cl. 27 Sur #32-35, Bogotá','Café bar j r l posiblemente fusiona la cultura del café con un ambiente social. Con una variedad de opciones de café y posiblemente música en vivo, este establecimiento se presenta como un lugar acogedor para disfrutar de bebidas y conversaciones.',1,'Antonio_Nariño','Café bar j r l.jpg'),(391,'Los Betos Bar','Calle 81 sur #8d-66, Bogotá','Los Betos Bar ofrece una experiencia única con un toque local. Con una atmósfera animada y posiblemente una variedad de bebidas locales, este bar busca ser un punto de encuentro para la diversión y la socialización.',1,'Usme','Los Betos Bar.jpg'),(392,'Beraca Café Almirante','Cl. 76 Sur #9A-34, Bogotá','Beraca Café en Almirante combina la calidez de un café con la cultura local. Con una selección de café de calidad y posiblemente opciones de cocina local, este establecimiento busca ofrecer una experiencia acogedora y auténtica.',1,'Usme','Beraca Café Almirante.jpg'),(393,'Bar La Tusa De Ayer','Av Caracas #93 Sur, Bogotá','Bar La Tusa De Ayer posiblemente se destaca por su ambiente nostálgico. Con una selección de bebidas y posiblemente eventos temáticos, este bar busca crear una experiencia que evoque recuerdos y emociones.',1,'Usme','Bar La Tusa De Ayer.jpg'),(394,'Mary’s Bar','Dg. 68 Bis Sur #nº 7-36, Bogotá','Mary’s Bar es un lugar que posiblemente destaca por su ambiente amigable. Con una variedad de bebidas y posiblemente eventos sociales, este bar busca ser un espacio donde la gente se reúna para disfrutar de buenos momentos.',1,'Usme','Mary’s Bar.jpg'),(395,'Succès bar','Cl. 75A Sur #10, Bogotá','Succès Bar busca ofrecer una experiencia exitosa a sus visitantes. Con una atmósfera posiblemente elegante y una selección cuidada de bebidas, este establecimiento busca ser un destino para aquellos que buscan una noche especial.',1,'Usme','Succès bar.jpg'),(396,'Añejos bar','Cl. 72 Sur #37, Bogotá','Añejos Bar se especializa posiblemente en bebidas añejas y un ambiente clásico. Con una oferta de licores y posiblemente música ambiental, este bar busca ser un rincón para los amantes de las bebidas refinadas.',1,'Usme','Añejos bar.jpg'),(397,'Cuarentena Bar','Cl. 74b Sur #0-1 0-53 a, Bogotá','Cuarentena Bar posiblemente ofrece una experiencia única relacionada con la cultura de la cuarentena. Con eventos temáticos y posiblemente una variedad de bebidas, este bar busca brindar a sus visitantes una experiencia memorable y quizás humorística.',1,'Usme','Cuarentena Bar.jpg'),(398,'Monaco Sound Bar','Cl 97 Sur #5 - 11, Bogotá','Monaco Sound Bar busca combinar la experiencia de un bar con la calidad del sonido. Con posiblemente eventos musicales y una selección de bebidas, este establecimiento busca ofrecer a sus visitantes una experiencia auditiva única.',1,'Usme','Monaco Sound Bar.jpg'),(399,'SOHO PUB','# a 76b 71, Cl. 76b Sur, Bogotá','SOHO PUB posiblemente captura el estilo y la energía del famoso distrito londinense. Con una atmósfera moderna y posiblemente una selección ecléctica de bebidas, este pub busca ser un destino cosmopolita para la diversión y la socialización.',1,'Usme','SOHO PUB.jpg'),(400,'Bar Borinquen','car 4, Dg. 56 Sur #23, Usme, Bogotá','Bar Borinquen posiblemente celebra la cultura puertorriqueña. Con una selección de bebidas auténticas y posiblemente eventos culturales, este bar busca ofrecer a sus visitantes una experiencia que refleje la riqueza de Puerto Rico.',1,'Usme','Bar Borinquen.jpg'),(401,'La Mariana Bar barrios','Cra. 28a #63-05, Bogotá','La Mariana Bar barrios posiblemente destaca por su carácter local y animado. Con una variedad de bebidas y posiblemente música en vivo, este bar busca ser un punto de encuentro en los barrios para la diversión y la socialización.',1,'Barrios_Unidos','La Mariana Bar barrios.jpg'),(402,'Vadillo Bar','Cra. 54 #7423, Bogotá','Vadillo Bar posiblemente se caracteriza por su ambiente acogedor. Con una selección de bebidas y posiblemente un enfoque en la atención personalizada, este bar busca ofrecer a sus visitantes una experiencia relajada y amigable.',1,'Barrios_Unidos','Vadillo Bar.jpg'),(403,'LA BODEGUITA','Cra. 24 #8340, Bogotá','LA BODEGUITA posiblemente se presenta como un rincón íntimo y auténtico. Con una variedad de bebidas y posiblemente una atmósfera que refleja el encanto de una bodega, este bar busca ser un espacio especial para sus visitantes.',1,'Barrios_Unidos','LA BODEGUITA.jpg'),(404,'Drinks Bar','Ak 68 #75a, Bogotá','Drinks Bar posiblemente se destaca por su enfoque claro en las bebidas. Con una selección variada y posiblemente eventos temáticos, este establecimiento busca satisfacer los gustos de los amantes de las bebidas de calidad.',1,'Barrios_Unidos','Drinks Bar.jpg'),(405,'Bar Independencia','Cl 63a #16 23, Bogotá','Bar Independencia posiblemente celebra la independencia con un ambiente único. Con una variedad de bebidas y posiblemente eventos relacionados con la historia, este bar busca ofrecer a sus visitantes una experiencia que refleje la libertad y la celebración.',1,'Barrios_Unidos','Bar Independencia.jpg'),(406,'Boliranodromo','Cra. 65b #7212, Bogotá','Boliranodromo posiblemente es conocido por su ambiente animado y eventos especiales. Con una variedad de bebidas y posiblemente actividades recreativas, este lugar busca ser un centro de entretenimiento y diversión.',1,'Barrios_Unidos','Boliranodromo.jpg'),(407,'Bar Infinity 922','Cl. 73 #29-50, Bogotá','Bar Infinity 922 posiblemente se presenta como un lugar moderno y versátil. Con una selección de bebidas y posiblemente eventos contemporáneos, este bar busca ofrecer una experiencia actualizada para sus visitantes.',1,'Barrios_Unidos','Bar Infinity 922.jpg'),(408,'La Oficina - Bar','Cra. 24 #63D-37, Bogotá','La Oficina - Bar posiblemente se destaca por su enfoque profesional y relajado. Con una selección de bebidas y posiblemente un ambiente que refleje un entorno de oficina informal, este bar busca ser un lugar de encuentro después del trabajo.',1,'Barrios_Unidos','La Oficina - Bar.jpg'),(409,'STURGIS PLACE','Cra. 23 #63d 71, Bogotá','STURGIS PLACE posiblemente se caracteriza por su atmósfera única y eventos temáticos. Con una variedad de bebidas y posiblemente una conexión con la cultura Sturgis, este lugar busca ofrecer una experiencia distintiva.',1,'Barrios_Unidos','STURGIS PLACE.jpg'),(410,'BBC - Bodega Bosa Centro','Cra 80C #63-47 Sur, Bogotá','BBC - Bodega Bosa Centro posiblemente se destaca como un punto central en Bosa. Con una variedad de bebidas y posiblemente eventos locales, esta bodega busca ser un punto de encuentro para la comunidad.',1,'Bosa','BBC - Bodega Bosa Centro.jpg'),(411,'BAR LA 07','Cl. 51 Sur #89a-59, Bogotá','BAR LA 07 posiblemente lleva consigo el encanto del barrio. Con una selección local de bebidas y posiblemente un ambiente animado, este bar busca ser un rincón acogedor para los residentes y visitantes.',1,'Bosa','BAR LA 07.jpg'),(412,'Bar La Chama','Cl. 68a Sur #78h 94, Bogotá','Bar La Chama posiblemente destaca por su atmósfera amigable y relajada. Con una variedad de bebidas y posiblemente eventos sociales, este bar busca ser un espacio para disfrutar de buenos momentos entre amigos.',1,'Bosa','Bar La Chama.jpg'),(413,'Bar Dubai','Buenas, Cl. 62 Sur #86 B 34, Bogotá','Bar Dubai posiblemente busca ofrecer una experiencia lujosa y moderna. Con una selección de bebidas de calidad y posiblemente una decoración elegante, este bar busca ser un destino para aquellos que buscan un ambiente sofisticado.',1,'Bosa','Bar Dubai.jpg'),(414,'Bar Del Futbol Y La Pola','Cl. 71b Sur, Bogotá','Bar Del Futbol Y La Pola posiblemente busca ofrecer una experiencia lujosa y moderna. Con una selección de bebidas de calidad y posiblemente una decoración elegante, este bar busca ser un destino para aquellos que buscan un ambiente sofisticado.',1,'Bosa','Bar Del Futbol Y La Pola.jpg'),(415,'LA TERRAZA SALSERA','Calle 65 D Sur # 80 A - 37 4, Bogota','LA TERRAZA SALSERA posiblemente fusiona la pasión por la salsa con un ambiente al aire libre. Con una selección de bebidas y posiblemente música en vivo, esta terraza busca ofrecer a sus visitantes una experiencia única y salsera.',1,'Bosa','LA TERRAZA SALSERA.jpg'),(416,'Cigarrería Bar Gran Imperio','Cra. 80a #64-07 Sur, Bogotá','Cigarrería Bar Gran Imperio posiblemente se destaca por su oferta diversa. Con una selección de bebidas y posiblemente opciones de cigarrillos, este establecimiento busca ser un lugar completo para sus clientes.',1,'Bosa','Cigarrería Bar Gran Imperio.jpg'),(417,'Bar Copas Y Amigos','Cra. 77j #7043, Bogotá','Bar Copas Y Amigos posiblemente destaca por su ambiente sociable. Con una variedad de bebidas y posiblemente eventos temáticos, este bar busca ser un punto de encuentro para hacer nuevas amistades.',1,'Bosa','Bar Copas Y Amigos.jpg'),(418,'LOTUS BAR','Cl. 64 Sur # 83b-04, Bogotá','LOTUS BAR posiblemente busca crear una experiencia única y moderna. Con una selección de bebidas y posiblemente un diseño contemporáneo, este bar busca ser un destino para aquellos que buscan un ambiente vanguardista.',1,'Bosa','LOTUS BAR.jpg'),(419,'Estación Cafe Bar','Cl. 63 Sur #77g-39, Bogotá','Estación Cafe Bar posiblemente fusiona la cultura del café con un ambiente social. Con una variedad de opciones de café y posiblemente eventos temáticos, este establecimiento se presenta como un lugar acogedor para disfrutar de bebidas y conversaciones.',1,'Bosa','Estación Cafe Bar.jpg'),(420,'Bar las Rocas','Cra. 19 #64 - 78 sur, Bogota','Bar las Rocas posiblemente se caracteriza por su conexión con la naturaleza o la roca. Con una variedad de bebidas y posiblemente una atmósfera única, este bar busca ofrecer a sus visitantes una experiencia especial.',1,'Ciudad_Bolivar','Bar las Rocas.jpg'),(421,'Bar y bolirrana los cuñados','Cra. 18v #68c Sur-66, Bogotá','Bar y bolirrana los cuñados posiblemente se presenta como un lugar informal y amigable. Con una selección variada de bebidas y posiblemente opciones de bolirrana, este establecimiento busca ser un punto de encuentro relajado.',1,'Ciudad_Bolivar','Bar y bolirrana los cuñados.jpg'),(422,'El Despacho-Bar','Tv. 20d #61 Sur-1 a 61 Sur-99, Bogotá','El Despacho-Bar posiblemente busca ofrecer una experiencia elegante y profesional. Con una selección de bebidas y posiblemente un ambiente que refleje un entorno de despacho, este bar busca ser un lugar de encuentro para profesionales y aquellos que buscan una experiencia más sofisticada.',1,'Ciudad_Bolivar','El Despacho-Bar.jpg'),(423,'BAR MI SUEÑO DORADO','Cl. 74a Sur #27M-84, Bogotá','BAR MI SUEÑO DORADO posiblemente sugiere un lugar de ensueño. Con una variedad de bebidas y posiblemente una decoración que refleje el sueño dorado, este bar busca ofrecer a sus visitantes una experiencia única y memorable.',1,'Ciudad_Bolivar','BAR MI SUEÑO DORADO.jpg'),(424,'Bar del monte 63','Cl. 63 Sur #72-40, Bogotá','Bar del monte 63 posiblemente se caracteriza por su conexión con la naturaleza o la ubicación en la calle 63. Con una selección de bebidas y posiblemente eventos temáticos, este bar busca ser un rincón especial para sus visitantes.',1,'Ciudad_Bolivar','Bar del monte 63.jpg'),(425,'Tienda Bar La Santa Fe','1 a 61, Cl. 61 Sur, Bogotá','Tienda Bar La Santa Fe posiblemente se presenta como un lugar que fusiona la idea de tienda con la experiencia de un bar. Con opciones de bebidas y posiblemente una oferta diversa, este establecimiento busca ofrecer una experiencia única.',1,'Ciudad_Bolivar','Tienda Bar La Santa Fe.jpg'),(426,'BAR EL ABUELO','Cl. 60a Sur #16D - 03, Bogotá','BAR EL ABUELO posiblemente sugiere un ambiente familiar y tradicional. Con una variedad de bebidas y posiblemente eventos que reflejan la tradición, este bar busca ser un lugar acogedor y nostálgico.',1,'Ciudad_Bolivar','BAR EL ABUELO.jpg'),(427,'Cigarreria Bar La Mona','Cl. 68a Sur #18 # 49, Bogotá','Cigarreria Bar La Mona posiblemente se especializa en ofrecer una variedad de cigarrillos y bebidas. Con opciones diversificadas y posiblemente un ambiente cómodo, este establecimiento busca atender las necesidades de sus clientes.',1,'Ciudad_Bolivar','Cigarreria Bar La Mona.jpg'),(428,'Café bar NIGHT Drinks','Cl. 62B Sur #68-17 sur, Bogotá','Café bar NIGHT Drinks posiblemente combina la cultura del café con bebidas nocturnas. Con opciones de café y posiblemente eventos nocturnos, este establecimiento busca ofrecer una experiencia versátil para sus visitantes.',1,'Ciudad_Bolivar','Café bar NIGHT Drinks.jpg'),(429,'BAR JJ','Cra. 80 #68 b 25, Bogotá','BAR JJ posiblemente es conocido por su ambiente local y amigable. Con una variedad de bebidas y posiblemente eventos sociales, este bar busca ser un punto de encuentro para la comunidad.',1,'Engativa','BAR JJ.jpg'),(430,'BAR CRISTIAN','Cra. 72a Bis #53-21, Bogotá','BAR CRISTIAN posiblemente lleva el nombre de su propietario o tiene una conexión personal. Con una selección de bebidas y posiblemente un ambiente acogedor, este bar busca ofrecer una experiencia cercana y familiar.',1,'Engativa','BAR CRISTIAN.jpg'),(431,'Tequila Bar','Calle 63 #71-39, Bogotá','Tequila Bar posiblemente se especializa en la oferta de tequilas y posiblemente cócteles relacionados. Con una variedad de opciones y posiblemente una atmósfera vibrante, este establecimiento busca ser un destino para los amantes del tequila.',1,'Engativa','Tequila Bar.jpg'),(432,'Mi Tolima Café','Cl. 68 #77a-09, Bogotá','Mi Tolima Café posiblemente combina la cultura del café con un ambiente acogedor. Con opciones de café y posiblemente eventos temáticos, este café bar busca ser un lugar especial para disfrutar de bebidas y buena compañía.',1,'Engativa','Mi Tolima Café.jpg'),(433,'ROCKOLA BAR LA 53','31, Ac 53 #77A, Bogotá','ROCKOLA BAR LA 53 posiblemente se destaca por su conexión con la música y el entretenimiento. Con una selección de bebidas y posiblemente música en vivo, este bar busca ofrecer una experiencia animada y musical.',1,'Engativa','ROCKOLA BAR LA 53.jpg'),(434,'Moes bar','Cl. 70 #77-80, Bogotá','Moes Bar posiblemente lleva un nombre distintivo y podría tener un ambiente característico. Con una variedad de bebidas y posiblemente un toque de personalidad, este bar busca ser un lugar único y memorable.',1,'Engativa','Moes bar.jpg'),(435,'BEER MASTER BAR','Cra. 70b #64B-93, Bogotá','BEER MASTER BAR posiblemente se especializa en cervezas artesanales y una oferta diversificada. Con opciones de cerveza y posiblemente eventos relacionados, este bar busca ser un destino para los amantes de la cerveza de calidad.',1,'Engativa','BEER MASTER BAR.jpg'),(436,'Café bar JEY S','111071, Ac 53 # 73a 70, Bogotá','Café bar JEYS posiblemente combina la cultura del café con opciones de bar. Con una variedad de bebidas y posiblemente un ambiente versátil, este establecimiento busca satisfacer los gustos de una variedad de clientes.',1,'Engativa','Café bar JEY S.jpg'),(437,'BAR LA 85','Tv. 85, Engativá, Bogotá, Cundinamarca','BAR LA 85 posiblemente toma su nombre de la ubicación en la calle 85. Con una variedad de bebidas y posiblemente eventos locales, este bar busca ser un punto de encuentro en esa área específica.',1,'Engativa','BAR LA 85.jpg'),(438,'BAR LA GRAN ESQUINA','Cl 36B Sur #543 5- a, Bogotá','BAR LA GRAN ESQUINA posiblemente se destaca como un lugar espacioso y central. Con una variedad de bebidas y posiblemente eventos sociales, este bar busca ser un punto de encuentro animado.',1,'San_Cristobal','BAR LA GRAN ESQUINA.jpg'),(439,'Rocola Bar Los Buenos Amigos','Cra. 5 #2910, Bogotá','Rocola Bar Los Buenos Amigos posiblemente sugiere un ambiente musical y amistoso. Con una selección de bebidas y posiblemente una máquina de rocola, este bar busca ofrecer entretenimiento y camaradería.',1,'San_Cristobal','Rocola Bar Los Buenos Amigos.jpg'),(440,'La Isla','Cl. 35 Sur #16a58 # 9a, Bogotá','La Isla posiblemente evoca una sensación de escape y relajación. Con una variedad de bebidas y posiblemente una decoración que sugiere un ambiente isleño, este bar busca ser un refugio especial para sus visitantes.',1,'San_Cristobal','La Isla.jpg'),(441,'Coffe & Beer LC','Av primera de mayo 5a-36 sur, Cl. 22 Sur #5a - 32 sur, Bogotá','Coffe & Beer LC posiblemente fusiona la cultura del café con la variedad de cervezas. Con opciones de café y una selección diversa de cervezas, este establecimiento busca ofrecer opciones para diferentes gustos.',1,'San_Cristobal','Coffe & Beer LC.jpg'),(442,'Licorería y Cigarrería Mi Casa Bar','Cra. 6 #19A29sur, San Cristóbal, Bogotá, Cundinamarca','Licorería y Cigarrería Mi Casa Bar posiblemente combina la oferta de licores y cigarrillos con la atmósfera de un bar. Con una variedad de bebidas y posiblemente una selección de productos, este bar busca ser un lugar completo para sus clientes.',1,'San_Cristobal','Licorería y Cigarrería Mi Casa Bar.jpg'),(443,'BAR LAURA BB','Cra. 7, Cl. 25 Sur # 37, Bogotá, Cundinamarca','BAR LAURA BB posiblemente lleva el nombre de su propietaria o tiene una conexión personal. Con una variedad de bebidas y posiblemente un ambiente acogedor, este bar busca ser un espacio cercano y familiar.',1,'San_Cristobal','BAR LAURA BB.jpg'),(444,'Pub Drinks Bar','Cl. 22a Sur, Bogotá','Pub Drinks Bar posiblemente busca recrear la atmósfera de un pub clásico. Con una selección de bebidas y posiblemente un ambiente vintage, este pub busca ofrecer una experiencia tradicional.',1,'San_Cristobal','Pub Drinks Bar.jpg'),(445,'Bar Restaurant Los Dos Mundos','Cra. 4 Este, Cl. 32 Sur #35, Bogotá','Pub Drinks Bar posiblemente busca recrear la atmósfera de un pub clásico. Con una selección de bebidas y posiblemente un ambiente vintage, este pub busca ofrecer una experiencia tradicional.',1,'San_Cristobal','Bar Restaurant Los Dos Mundos.jpg'),(446,'La Cervecería Local del Sumapaz','Cl. 22 #40-44, Cundinamarca','La Cervecería Local del Sumapaz posiblemente se destaca como un establecimiento que celebra la cultura local y la producción artesanal de cerveza en la región del Sumapaz. Con una variedad de cervezas artesanales y posiblemente un ambiente que refleje la identidad de la zona, esta cervecería busca ofrecer a sus visitantes una experiencia auténtica y única. La atención a la calidad de la cerveza y posiblemente la promoción de ingredientes locales podrían ser características distintivas de este lugar. Además, eventos especiales y colaboraciones con la comunidad local podrían contribuir a la atmósfera acogedora y participativa de la Cervecería Local del Sumapaz.',1,'Sumapaz','La Cervecería Local del Sumapaz.jpg'),(447,'Suramerika BAR','Cl. 12b #3-24, Bogotá','Suramerika BAR posiblemente busca representar una fusión cultural y geográfica. Con una variedad de bebidas y posiblemente eventos temáticos, este bar busca ofrecer una experiencia diversa y única.',1,'Rafael_Uribe_Uribe','Suramerika BAR.jpg'),(448,'El Desmadre Cantina Bar','Cra. 10 #8-42, Bogotá','El Desmadre Cantina Bar posiblemente sugiere un ambiente animado y festivo. Con una variedad de bebidas y posiblemente eventos de entretenimiento, este lugar busca ser un destino para aquellos que buscan diversión y desenfreno.',1,'Rafael_Uribe_Uribe','El Desmadre Cantina Bar.jpg'),(449,'Doña Ofelia Gastro Bar','Cra. 4 #17 - 27, Santa Fé, Bogotá, Cundinamarca','Doña Ofelia Gastro-Bar posiblemente fusiona la experiencia gastronómica con la atmósfera de un bar. Con opciones de bebidas y una oferta culinaria diversa, este establecimiento busca ser un lugar donde la comida y la bebida se complementan.',1,'Rafael_Uribe_Uribe','Doña Ofelia Gastro Bar.jpg'),(450,'Cafe Bar La Ubicación','Cl. 12b #3-95, La Candelaria, Bogotá, Cundinamarca','Cafe Bar La Ubicación posiblemente destaca por su ubicación estratégica. Con una variedad de bebidas y posiblemente un ambiente acogedor, este bar busca ser un lugar conveniente y agradable para los visitantes.',1,'Rafael_Uribe_Uribe','Cafe Bar La Ubicación.jpg'),(451,'Híbrido Café Bar','Cra. 3 #81, La Candelaria, Bogotá','Híbrido Café Bar posiblemente fusiona la cultura del café con la de un bar. Con opciones de café y posiblemente eventos culturales, este establecimiento busca ser un punto de encuentro versátil.',1,'Rafael_Uribe_Uribe','Híbrido Café Bar.jpg'),(452,'Triunfo Bar JL','Cl. 26a Sur #20 11 sur, Bogotá','Triunfo Bar JL posiblemente sugiere un ambiente triunfante y victorioso. Con una variedad de bebidas y posiblemente eventos temáticos, este bar busca ser un lugar donde los visitantes se sientan celebrados.',1,'Rafael_Uribe_Uribe','Triunfo Bar JL.jpg'),(453,'Con Esto Tengo Bar','Cra. 24D #22-39 Sur, Rafael Uribe Uribe, Bogotá, Cundinamarca','Con Esto Tengo Bar posiblemente lleva un nombre con un toque de humor o simplicidad. Con una variedad de bebidas y posiblemente eventos sociales, este bar busca ofrecer una experiencia relajada y sin complicaciones.',1,'Rafael_Uribe_Uribe','Con Esto Tengo Bar.jpg'),(454,'Yambeque Bar','Cl. 27a Sur #10d 09, Rafael Uribe Uribe, Bogotá, Dc','Yambeque Bar posiblemente se destaca por su conexión con la música o la cultura latina. Con una variedad de bebidas y posiblemente música en vivo, este bar busca ser un lugar donde los ritmos latinos se disfrutan al máximo.',1,'Rafael_Uribe_Uribe','Yambeque Bar.jpg'),(455,'El Candelario','Cl. 12b #4-94, Bogotá','El Candelario posiblemente es conocido por ser un lugar emblemático en su área. Con una variedad de eventos culturales y posiblemente una oferta diversa de bebidas, este lugar busca ser un centro de actividad y expresión cultural.',1,'Candelaria','El Candelario.jpg'),(456,'BBC PUB CANDELARIA','Cl. 12d #4-02, La Candelaria, Bogotá, Cundinamarca','BBC PUB CANDELARIA posiblemente fusiona la atmósfera británica con el encanto de La Candelaria. Con una selección de bebidas y posiblemente eventos temáticos, este pub busca ser un destino único en el corazón de la ciudad.',1,'Candelaria','BBC PUB CANDELARIA.jpg'),(457,'Doña Ceci','Por Calle 15 y Carrera 3, Cra. 4 #12D-18, La Candelaria, Bogotá','Doña Ceci posiblemente lleva el nombre de su propietaria o tiene una conexión personal. Con una variedad de bebidas y posiblemente un ambiente familiar, este lugar busca ser un espacio acogedor y hogareño.',1,'Candelaria','Doña Ceci.jpg'),(458,'Billares Candelaria Bar Pub','Calle 7#5-32, piso 2, Bogotá, Cundinamarca','\"Billares Candelaria Bar-Pub posiblemente combina el entretenimiento de los billares con la atmósfera de un pub. Con opciones de bebidas y posiblemente mesas de billar, este establecimiento busca ofrecer una experiencia relajada y divertida.\"',1,'Candelaria','Billares Candelaria Bar Pub.jpg'),(459,'Bellagio Bar','Cra. 3 #87, La Candelaria, Bogotá','Bellagio Bar posiblemente busca ofrecer una experiencia elegante y moderna. Con una selección de bebidas de calidad y posiblemente un diseño contemporáneo, este bar busca ser un destino para aquellos que buscan un ambiente sofisticado.',1,'Candelaria','Bellagio Bar.jpg'),(460,'Sophi Bar','Cl. Del Embudo #12b83, La Candelaria, Bogotá, Cundinamarca','Sophi Bar posiblemente sugiere un toque de sofisticación y elegancia. Con una variedad de bebidas y posiblemente un ambiente chic, este bar busca ser un lugar para aquellos que buscan una experiencia más refinada.',1,'Candelaria','Sophi Bar.jpg'),(461,'Híbrido Café Bar','Cra. 3 #81, La Candelaria, Bogotá','Híbrido Café Bar posiblemente fusiona la cultura del café con la de un bar. Con opciones de café y posiblemente eventos culturales, este establecimiento busca ser un punto de encuentro versátil.',1,'Candelaria','Híbrido Café Bar.jpg'),(462,'Bullitas Del Callejón','Cra. 2 # 12b - 66, Bogotá','Bullitas Del Callejón posiblemente es conocido por su ambiente callejero y animado. Con una variedad de bebidas y posiblemente eventos locales, este lugar busca ser un punto de encuentro informal y festivo.',1,'Candelaria','Bullitas Del Callejón.jpg'),(463,'El Sitio Bar Fontibón','Cra. 104 #16b-68, Bogotá','El Sitio Bar Fontibón posiblemente se destaca como un lugar emblemático en Fontibón. Con una variedad de bebidas y posiblemente eventos locales, este bar busca ser un punto de encuentro en la comunidad.',1,'Fontibon','El Sitio Bar Fontibón.jpg'),(464,'Tamarindo Cafe Bar Music','Cl. 25f #99-29, Bogotá','Tamarindo Cafe Bar Music posiblemente fusiona la cultura del café con la música y la atmósfera de un bar. Con opciones de café y posiblemente eventos musicales, este establecimiento busca ofrecer una experiencia única y versátil.',1,'Fontibon','Tamarindo Cafe Bar Music.jpg'),(465,'Bar Donde Lucio','Cl. 19 #105A-15, Fontibón, Bogotá','Bar Donde Lucio posiblemente lleva el nombre de su propietario o tiene una conexión personal. Con una variedad de bebidas y posiblemente un ambiente acogedor, este bar busca ofrecer una experiencia cercana y amigable.',1,'Fontibon','Bar Donde Lucio.jpg'),(466,'Rancho XL','Cl. 20 #99 - 20, Fontibón, Bogotá, Cundinamarca','Rancho XL posiblemente sugiere un lugar espacioso y animado. Con una variedad de bebidas y posiblemente eventos temáticos, este establecimiento busca ser un destino para aquellos que buscan un ambiente festivo.',1,'Fontibon','Rancho XL.jpg'),(467,'La Morena Bar','04, Cl. 25f #99, Bogotá, Cundinamarca','La Morena Bar posiblemente se caracteriza por su ambiente cálido y acogedor. Con una variedad de bebidas y posiblemente música en vivo, este bar busca ser un rincón especial para disfrutar de buenos momentos.',1,'Fontibon','La Morena Bar.jpg'),(468,'Salsa Bar Maelo Y CIGARRERIA','Cra. 100 #23j - 40, Bogotá','Salsa Bar Maelo Y CIGARRERIA posiblemente combina la pasión por la salsa con una oferta diversificada. Con opciones de bebidas y posiblemente una sección de cigarros, este bar busca ser un punto de encuentro para los amantes de la salsa y más.',1,'Fontibon','Salsa Bar Maelo Y CIGARRERIA.jpg'),(469,'La Cañada Restante Pub','Cra. 99 #20-22, Bogotá','La Cañada Restante Pub posiblemente sugiere un ambiente pub con un toque especial. Con una variedad de bebidas y posiblemente una decoración distintiva, este pub busca ofrecer una experiencia única.',1,'Fontibon','La Cañada Restante Pub.jpg'),(470,'Bar Voreka','58, Cra. 102 #17 A, Fontibón, Bogotá','Bar Voreka posiblemente lleva un nombre distintivo y podría tener un enfoque particular. Con una variedad de bebidas y posiblemente un toque personal, este bar busca ser un lugar con carácter propio.',1,'Fontibon','Bar Voreka.jpg'),(471,'La Pinta Parrilla Bar','Cl. 20 #99-40, Bogotá','La Pinta Parrilla Bar posiblemente fusiona la experiencia de una parrilla con la atmósfera de un bar. Con opciones de bebidas que complementan los sabores de la parrilla y posiblemente música animada, este establecimiento busca ofrecer una experiencia culinaria y social única.',1,'Fontibon','La Pinta Parrilla Bar.jpg'),(482,'starbus','calle 13','dada',1,'Chapinero','starbus.png');
/*!40000 ALTER TABLE `discotecas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entretenimiento`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `entretenimiento` (
  `Id_entretenimiento` int NOT NULL AUTO_INCREMENT,
  `Nombre_del_entretenimiento` varchar(30) NOT NULL,
  `Id_Categorias` int NOT NULL,
  PRIMARY KEY (`Id_entretenimiento`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `entretenimiento_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entretenimiento`
--

LOCK TABLES `entretenimiento` WRITE;
/*!40000 ALTER TABLE `entretenimiento` DISABLE KEYS */;
INSERT INTO `entretenimiento` VALUES (1,'Entreteniemiento_general ',4);
/*!40000 ALTER TABLE `entretenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadios`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `estadios` (
  `Id_estadios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_estadios` varchar(250) NOT NULL,
  `Ubicacion_de_estadios` varchar(50) NOT NULL,
  `Tipos_de_estadios` int NOT NULL,
  `Informacion_de_estadios` varchar(250) NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_estadios`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  KEY `Tipos_de_estadios_idx` (`Tipos_de_estadios`),
  CONSTRAINT `estadios_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `Tipos_de_estadios` FOREIGN KEY (`Tipos_de_estadios`) REFERENCES `tipos_de_estadios` (`Id_de_tipos_de_estadios`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadios`
--

LOCK TABLES `estadios` WRITE;
/*!40000 ALTER TABLE `estadios` DISABLE KEYS */;
INSERT INTO `estadios` VALUES (2,'Olaya Herrera','Cra. 21 #9, Bogotá',1,'Tiene aforo para 2.500 espectadores​ y se destaca al recibir cada año el torneo de fútbol aficionado más tradicional de Colombia, el Torneo del Olaya.',1,'Los_Martires','Olaya Herrera.jpg'),(3,'Nemesio Camacho El Campín','Cra. 30 # 57, Bogotá',1,'Conocido simplemente como El Campín, es el estadio de fútbol más grande de Bogotá, sede de Santa Fé y Millonarios.',1,'Teusaquillo','Nemesio Camacho El Campín.jpg'),(4,'Tabora','Cl. 74 #73A-35, Zona 3, Bogotá',1,'Cancha de futbol 11, con gradas en su alrededor y con vallas que la protegen',1,'Engativa','Tabora.jpg'),(5,'Metropolitano de Techo','Cra. 71d, Bogotá',1,'Estadio de fútbol donde juegan como locales La Equidad, equipo de la Primera División del fútbol colombiano que juega desde el Torneo Finalización 2007, además de los equipos Tigres Fútbol Club, Bogotá F.C',1,'Kennedy','Metropolitano de Techo.jpg'),(6,'Alfonso López Pumarejo','Cra 45 #26 - 85, Bogotá',1,'Es un estadio de fútbol de la Universidad Nacional de Colombia ubicado en la Ciudad Universitaria. Lleva el nombre del expresidente Alfonso López Pumarejo, bajo cuyo gobierno se comenzó a construir la Ciudad Universitaria.',1,'Teusaquillo','Alfonso López Pumarejo.jpg'),(7,'Hermes Barros Cabas','Ak 68 #55-45, Bogotá',1,'Es el diamante de béisbol de la ciudad de Bogotá. Se encuentra ubicado sobre la Avenida 68, costado occidental, justo en frente del puente peatonal que colinda con el Parque Metropolitano Simón Bolívar.',1,'Engativa','Hermes Barros Cabas.jpg'),(8,'Compensar','Ak 68 #49A-47, Bogotá',1,'Tiene una capacidad de 4500 espectadores. Fue la sede del desaparecido Academia Fútbol Club, equipo de fútbol profesional que jugó en la Categoría Primera B.',1,'Engativa','Compensar.jpg'),(9,'Atahualpa','Cra. 113 #23c-11, Bogotá',1,'Cancha de futbol 11, con gradas en su alrededor y con vallas que la protegen',1,'Fontibon','Atahualpa.jpg'),(10,'Pijaos de San Luis','Cra. 10 #34 Sur-35 Bogotá',1,'Cancha de futbol 11, con gradas en su alrededor y con vallas que la protegen',1,'Puente Aranda','Pijaos de San Luis.jpg'),(11,'Movistar Arena','Dg. 61c #26-36',1,'Estadio cubierto en Bogotá, Colombia. Fue inaugurado en 2018 y tiene capacidad para 14 000 personas. Se encuentra en el predio que ocupó el Coliseo El Campín, en la avenida NQS con avenida José Celestino Mutis.',1,'Teusaquillo','Movistar Arena.jpg');
/*!40000 ALTER TABLE `estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario_contacto`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `formulario_contacto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario_contacto`
--

LOCK TABLES `formulario_contacto` WRITE;
/*!40000 ALTER TABLE `formulario_contacto` DISABLE KEYS */;
INSERT INTO `formulario_contacto` VALUES (1,'santiago','santi01031@outlook.com','hola que ase','2023-11-19 22:14:41'),(2,'Nicolás','nbaronortiz4@gmail.com','q cojones es esto chaval','2023-11-19 22:17:36'),(3,'Nicolás','nbaronortiz4@gmail.com','q cojones es esto chaval','2023-11-19 22:17:55'),(4,'Nicolás','nbaronortiz4@gmail.com','que te pasa loco','2023-11-19 22:21:07'),(5,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:22:39'),(6,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:23:04'),(7,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:23:08'),(8,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:31:25'),(9,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:31:59'),(10,'Nicolás','nbaronortiz4@gmail.com','asa','2023-11-19 22:32:08'),(11,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:03'),(12,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:04'),(13,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(14,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(15,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(16,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(17,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(18,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(19,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(20,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(21,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(22,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(23,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:07'),(24,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:07'),(25,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:07'),(26,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(27,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(28,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(29,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(30,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(31,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(32,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(33,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(34,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(35,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:10'),(36,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:10'),(37,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:34:49'),(38,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:34:49'),(39,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:34:50'),(40,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:36:24'),(41,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:36:59'),(42,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:36:59'),(43,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:37:00'),(44,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:37:00'),(45,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:18'),(46,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(47,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(48,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(49,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(50,'santiago','santi01031@outlook.com','dfgdf','2023-11-19 22:38:50'),(51,'santiago','danielapolancobuitrago@gmail.com','dfg','2023-11-19 22:39:18'),(52,'santiago','santi01031@outlook.com','no se','2023-11-19 22:40:01'),(53,'santiago','santi01031@outlook.com','fsdfsdf','2023-11-19 22:41:08'),(54,'santiago','santi01031@outlook.com','lol','2023-11-19 22:41:59'),(55,'sd','j.polanco1975@hotmail.com','sadasd','2023-11-19 22:42:38'),(56,'sd','j.polanco1975@hotmail.com','sadasd','2023-11-19 22:42:38'),(57,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:43:51'),(58,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:43:51'),(59,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:44:03'),(60,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:44:03'),(61,'utr','sas@ada.com','sad','2023-11-19 22:44:48'),(62,'Nicolás','nbaronortiz4@gmail.com','pagina zzz','2023-11-24 05:08:52'),(63,'Nicolás','nbaronortiz4@gmail.com','app zzzz','2023-11-24 05:12:10'),(64,'fgh','santi01031@outlook.comfxgb','gb','2023-11-24 05:12:50'),(65,'Nicolás','nbaronortiz4@gmail.com','su pagina no deja registrar establecimientos','2023-11-30 02:17:39'),(66,'Nicolás','nbaronortiz4@gmail.com','sasa','2023-11-30 06:35:21'),(67,'Nicolás','nbaronortiz4@gmail.com','corazones','2023-11-30 06:42:19'),(68,'Nicolás','nbaronortiz4@gmail.com','corazon','2023-11-30 06:42:43'),(69,'Nicolás','nbaronortiz4@gmail.com','corazon','2023-11-30 06:42:56'),(70,'Nicolás','nbaronortiz4@gmail.com','corazon','2023-11-30 06:43:27'),(71,'Nicolás','nbaronortiz4@gmail.com','sasas','2023-11-30 06:44:09'),(72,'Nicolás','nbaronortiz4@gmail.com','sasas','2023-11-30 06:44:19'),(73,'Nicolás','nbaronortiz4@gmail.com','asa','2023-11-30 06:44:55'),(74,'Nicolás','nbaronortiz4@gmail.com','corazon','2023-11-30 07:27:27'),(75,'Nicolás','nbaronortiz4@gmail.com','corazon','2023-11-30 07:28:14'),(76,'Nicolas','nbaronortiz4@gmail.com','adada','2023-12-05 05:40:13'),(77,'Nicolas','nbaronortiz4@gmail.com','weq','2023-12-05 06:47:44');
/*!40000 ALTER TABLE `formulario_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospedaje`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `hospedaje` (
  `Id_de_hospedaje` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_hospedajes` varchar(30) NOT NULL,
  `Ubicacion_de_hospedajes` varchar(50) NOT NULL,
  `Tipos_de_hospedaje` int NOT NULL,
  `Informacion_de_hospedajes` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_hospedaje`),
  KEY `Id_Categorias` (`Id_Categorias`),
  KEY `Tipos_de_hospedaje_idx` (`Tipos_de_hospedaje`),
  CONSTRAINT `hospedaje_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`),
  CONSTRAINT `Tipos_de_hospedaje` FOREIGN KEY (`Tipos_de_hospedaje`) REFERENCES `tipos_de_hospedajes` (`Id_de_tipos_de_hospedajes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospedaje`
--

LOCK TABLES `hospedaje` WRITE;
/*!40000 ALTER TABLE `hospedaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `hospedaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes_establecimiento`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `imagenes_establecimiento` (
  `id_imagen` int NOT NULL AUTO_INCREMENT,
  `id_establecimiento` int NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `ruta_destino` varchar(255) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `id_establecimiento_idx` (`id_establecimiento`),
  CONSTRAINT `fk_id_establecimiento` FOREIGN KEY (`id_establecimiento`) REFERENCES `registro_de_establecimiento` (`Id_registro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_establecimiento`
--

LOCK TABLES `imagenes_establecimiento` WRITE;
/*!40000 ALTER TABLE `imagenes_establecimiento` DISABLE KEYS */;
INSERT INTO `imagenes_establecimiento` VALUES (282,144,'Manulita789654321521.png','./Imagenes/registro_de_establecimiento/Manulita789654321521.png'),(311,148,'juan valdez212345678992.jpg','Imagenes/registro_de_establecimiento/juan valdez212345678992.jpg');
/*!40000 ALTER TABLE `imagenes_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugares_historicos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `lugares_historicos` (
  `Id_lugares_historicos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_lugares_historicos` varchar(30) NOT NULL,
  `Ubicacion_de_lugares_historicos` varchar(50) NOT NULL,
  `Tipos_de_lugares_historicos` varchar(30) NOT NULL,
  `Informacion_de_lugares_historicos` text NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  PRIMARY KEY (`Id_lugares_historicos`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  CONSTRAINT `lugares_historicos_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares_historicos`
--

LOCK TABLES `lugares_historicos` WRITE;
/*!40000 ALTER TABLE `lugares_historicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugares_historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parques`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `parques` (
  `Id_de_parques` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_parques` varchar(250) NOT NULL,
  `Ubicacion_de_parques` varchar(250) NOT NULL,
  `Tipos_de_parques` int NOT NULL,
  `Informacion_de_parques` text NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_de_parques`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  KEY `tipos_de_parques_idx` (`Tipos_de_parques`),
  CONSTRAINT `parques_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `tipos_de_parques` FOREIGN KEY (`Tipos_de_parques`) REFERENCES `tipos_de_parques` (`Id_de_tipos_de_parques`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parques`
--

LOCK TABLES `parques` WRITE;
/*!40000 ALTER TABLE `parques` DISABLE KEYS */;
INSERT INTO `parques` VALUES (1,'Mundo Aventura','Cra. 71d #1-14, Kennedy, Bogotá',1,'Mundo Aventura es uno de los parques de atracciones más populares de Bogotá y ofrece una amplia variedad de emocionantes juegos mecánicos y atracciones para visitantes de todas las edades. El parque es conocido por su ambiente festivo y su capacidad para proporcionar diversión y entretenimiento a toda la familia. Horario de Operación: El horario de Mundo Aventura puede variar según la temporada, por lo que se recomienda verificar los horarios actualizados en el sitio web oficial antes de planificar tu visita.',1,'Kennedy','Mundo Aventura.jpg'),(2,'Salitre Magico',' Avenida El Dorado No. 68D-58, Bogotá',1,'El Parque de Diversiones Salitre Mágico, ubicado en la ciudad de Bogotá, Colombia, ofrece una experiencia emocionante para visitantes de todas las edades. Aquí tienes información sobre horarios y precios:',1,'Engativa','Salitre Magico.jpg'),(3,'Parque Simón Bolívar','Carrera 60 # 63 - 27, Bogotá, Colombia',5,'El Parque Simón Bolívar es uno de los parques más grandes y emblemáticos de Bogotá. Con una extensión de más de 400 hectáreas, este parque ofrece una gran variedad de espacios verdes, lagos, zonas deportivas y áreas de entretenimiento. Es un lugar ideal para relajarse, hacer ejercicio, disfrutar de actividades al aire libre y pasar tiempo en familia.',1,'Engativa','Parque Simón Bolívar.jpg'),(4,'Parque Nacional Enrique Olaya Herrera ','Carrera 7 # 34-45, Bogotá, Colombia',5,'El Parque Nacional Enrique Olaya Herrera, comúnmente conocido como Parque Nacional, es un espacio público icónico en el centro de Bogotá. Este parque es famoso por su fuente central, su monumento al presidente Enrique Olaya Herrera y su ambiente tranquilo en medio de la ciudad. Es un lugar ideal para dar un paseo, relajarse y disfrutar de la naturaleza en el corazón de la ciudad.',1,'Santa_Fe','Parque Nacional Enrique Olaya Herrera .jpg'),(5,'Parque Metropolitano El Virrey','Carrera 15, Calle 88, Barrio El Virrey, Bogotá, Colombia',5,'El Parque El Virrey es uno de los parques urbanos más emblemáticos de Bogotá. Este parque se encuentra en el corazón de la ciudad y ofrece a los visitantes un lugar ideal para hacer ejercicio, pasear, disfrutar del aire libre y relajarse. Es un espacio verde muy querido por los residentes y visitantes.',1,'Chapinero','Parque Metropolitano El Virrey.jpg'),(6,'Parque de los Novios','Carrera 4, Calle 63, Barrio Chapinero, Bogotá, Colombia',5,'El Parque de los Novios, conocido también como Parque El Lago, es un espacio público icónico en el corazón de la localidad de Chapinero en Bogotá. Este parque es especialmente conocido por su hermoso lago artificial y su entorno tranquilo que ofrece a los visitantes un lugar ideal para relajarse y disfrutar de la naturaleza en medio de la ciudad.',1,'Chapinero','Parque de los Novios.jpg'),(7,'Parque El Tunal','Carrera 24C #48A-67 Sur, Bogotá, Colombia',5,'El Parque El Tunal es un espacio verde en el sur de Bogotá que ofrece una variedad de actividades al aire libre para toda la familia. A pesar de no ser tan conocido como otros parques de la ciudad, es un lugar agradable para visitar con bebés debido a su ambiente tranquilo y áreas de juego seguras.',1,'Tunjuelito','Parque El Tunal.jpg'),(8,'Parque de la 93','Carrera 11 #93-46, Bogotá, Colombia',5,'El Parque de la 93 es un parque urbano que se ha convertido en uno de los lugares más populares de Bogotá para la recreación y el entretenimiento. El parque está ubicado en la zona norte de la ciudad y ofrece una amplia gama de actividades y opciones gastronómicas.',1,'Chapinero','Parque de la 93.jpg'),(9,'Parque El Virrey','Carrera 15 con Calle 88, Bogotá, Colombia',5,'El Parque El Virrey es un parque urbano ubicado en el corazón de Bogotá. Es un lugar muy frecuentado por los habitantes locales y visitantes que desean disfrutar de actividades al aire libre, hacer ejercicio o simplemente relajarse en un entorno verde en medio de la ciudad.',1,'Chapinero','Parque El Virrey.jpg'),(10,'Parque de la Independencia','Carrera 7 con Calle 26, Bogotá, Colombia',5,'El Parque de la Independencia, también conocido como Parque Nacional, es uno de los parques más emblemáticos de Bogotá. Este parque tiene una gran importancia histórica y cultural para la ciudad y el país. Fue inaugurado en 1910 para conmemorar el centenario de la independencia de Colombia.',1,'Santa_Fe','Parque de la Independencia.jpg'),(11,'Parque el lago','Av José Celestino Mutis #45',5,'Es un lugar encantador rodeado de naturaleza y árboles, es ideal para caminar, relajarse, meditar, leer o hacer ejercicio. Entre semana es muy tranquilo. Para ir de picnic está genial, incluso para hacer un asado en familia y amigos. Definitivamente es uno de los parques públicos más bellos que tiene Bogotá.',1,'Barrios_unidos','Parque el lago.jpg'),(29,'Parque loca','Calle 56 sur #81 j-40',1,'lesley',1,'Chapinero','Parque loca.jpg');
/*!40000 ALTER TABLE `parques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos_de_alimentos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `puestos_de_alimentos` (
  `Id_Puestos_de_alimentos` int NOT NULL AUTO_INCREMENT,
  `Tipos_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Nombres_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Ubicacion_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Informacion_de_puestos_de_alimentos` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  PRIMARY KEY (`Id_Puestos_de_alimentos`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `puestos_de_alimentos_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos_de_alimentos`
--

LOCK TABLES `puestos_de_alimentos` WRITE;
/*!40000 ALTER TABLE `puestos_de_alimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `puestos_de_alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_de_establecimiento`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `registro_de_establecimiento` (
  `Id_registro` int NOT NULL AUTO_INCREMENT,
  `Nombre_del_establecimiento` varchar(50) NOT NULL,
  `Direccion_de_establecimiento` varchar(50) NOT NULL,
  `Id_Usuario` int NOT NULL,
  `Informacion_adicional` varchar(250) DEFAULT NULL,
  `Nit` varchar(45) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Aprobado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_registro`),
  KEY `Id_usuario_idx` (`Id_Usuario`),
  CONSTRAINT `Id_usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_de_establecimiento`
--

LOCK TABLES `registro_de_establecimiento` WRITE;
/*!40000 ALTER TABLE `registro_de_establecimiento` DISABLE KEYS */;
INSERT INTO `registro_de_establecimiento` VALUES (144,'Manulita','calle 56 b _ sur # 81 c - 40 _ nico',30,'nico','78965432152','Chapinero','Centro_Comercial','3187465551',1),(148,'juan valdez','calle 12 a _ _ # 13 _ - 43 _  ada',53,'adad','21234567899','Kennedy','Centro_Comercial','3505350587',0);
/*!40000 ALTER TABLE `registro_de_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salud`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `salud` (
  `Id_Centros_de_salud` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_centros_de_salud` varchar(30) NOT NULL,
  `Ubicacion_de_centros_de_salud` varchar(50) NOT NULL,
  `Informacion_de_centros_de_salud` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  PRIMARY KEY (`Id_Centros_de_salud`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salud`
--

LOCK TABLES `salud` WRITE;
/*!40000 ALTER TABLE `salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_list`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `schedule_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `Id_usuario_for` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_usuario_for_idx` (`Id_usuario_for`),
  CONSTRAINT `Id_usuario_for` FOREIGN KEY (`Id_usuario_for`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_list`
--

LOCK TABLES `schedule_list` WRITE;
/*!40000 ALTER TABLE `schedule_list` DISABLE KEYS */;
INSERT INTO `schedule_list` VALUES (82,'ada','ada','2023-12-20 05:13:00','2023-12-21 05:13:00',53),(83,'ada','ads','2023-12-21 05:15:00','2023-12-23 05:15:00',53),(89,'mundo avenuad','ada','2023-12-09 05:20:00','2023-12-11 05:20:00',53),(91,'mundo avenu','adad','2023-12-13 05:24:00','2023-12-14 05:24:00',53),(92,'lol','mio','2023-12-08 05:25:00','2023-12-15 05:25:00',30),(93,'mundo avenu','adad','2023-12-13 05:24:00','2023-12-14 05:24:00',53),(94,'mundo avenu','dad','2023-12-22 05:26:00','2023-12-30 05:26:00',53),(95,'lol','mio','2023-12-08 05:25:00','2023-12-15 05:25:00',30),(96,'asds','dsad','2023-12-14 05:45:00','2023-12-15 05:45:00',53);
/*!40000 ALTER TABLE `schedule_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `servicios` (
  `Id_Servicios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_servicios` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Creaccion_de_cuentas'),(2,'Puestos_de_alimentos'),(3,'Hospedajes'),(4,'Entretenimiento'),(5,'Hospitales');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_arrendamientos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_arrendamientos` (
  `Id_de_tipos_de_arrendamientos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipo_de_arrendamientos` varchar(30) NOT NULL,
  `Id_de_arrendamientos` int NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_arrendamientos`),
  KEY `Id_de_arrendamientos` (`Id_de_arrendamientos`),
  CONSTRAINT `tipos_de_arrendamientos_ibfk_1` FOREIGN KEY (`Id_de_arrendamientos`) REFERENCES `arrendamientos` (`Id_de_arrendamientos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_arrendamientos`
--

LOCK TABLES `tipos_de_arrendamientos` WRITE;
/*!40000 ALTER TABLE `tipos_de_arrendamientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_arrendamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_establecimientos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_establecimientos` (
  `Id_de_tipos_de_establecimientos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_tipos_de_establecimientos` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_establecimientos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_establecimientos`
--

LOCK TABLES `tipos_de_establecimientos` WRITE;
/*!40000 ALTER TABLE `tipos_de_establecimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_establecimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_estadios`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_estadios` (
  `Id_de_tipos_de_estadios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_estadios` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_estadios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_estadios`
--

LOCK TABLES `tipos_de_estadios` WRITE;
/*!40000 ALTER TABLE `tipos_de_estadios` DISABLE KEYS */;
INSERT INTO `tipos_de_estadios` VALUES (1,'Estadios_Futbol');
/*!40000 ALTER TABLE `tipos_de_estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_hospedajes`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_hospedajes` (
  `Id_de_tipos_de_hospedajes` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_hospedajes` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_hospedajes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_hospedajes`
--

LOCK TABLES `tipos_de_hospedajes` WRITE;
/*!40000 ALTER TABLE `tipos_de_hospedajes` DISABLE KEYS */;
INSERT INTO `tipos_de_hospedajes` VALUES (1,'Casa'),(2,'Apartementos'),(3,'Hoteles'),(4,'Fincas'),(5,'Hostales');
/*!40000 ALTER TABLE `tipos_de_hospedajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_lugares_historicos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_lugares_historicos` (
  `Id_de_tipos_lugares_historicos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_lugares_historicos` varchar(30) NOT NULL,
  `Id_lugares_historicos` int NOT NULL,
  PRIMARY KEY (`Id_de_tipos_lugares_historicos`),
  KEY `Id_lugares_historicos` (`Id_lugares_historicos`),
  CONSTRAINT `tipos_de_lugares_historicos_ibfk_1` FOREIGN KEY (`Id_lugares_historicos`) REFERENCES `lugares_historicos` (`Id_lugares_historicos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_lugares_historicos`
--

LOCK TABLES `tipos_de_lugares_historicos` WRITE;
/*!40000 ALTER TABLE `tipos_de_lugares_historicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_lugares_historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_parques`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_parques` (
  `Id_de_tipos_de_parques` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_parques` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_parques`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_parques`
--

LOCK TABLES `tipos_de_parques` WRITE;
/*!40000 ALTER TABLE `tipos_de_parques` DISABLE KEYS */;
INSERT INTO `tipos_de_parques` VALUES (1,'Mecanicos'),(2,'Acuaticos'),(3,'Parque infantil'),(4,'Parque para bebés'),(5,'Parque urbano'),(6,'Parque temático');
/*!40000 ALTER TABLE `tipos_de_parques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_puestos_de_alimentos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_puestos_de_alimentos` (
  `Id_tipos_de_puestos_de_alimentos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Id_puestos_de_alimentos` int NOT NULL,
  PRIMARY KEY (`Id_tipos_de_puestos_de_alimentos`),
  KEY `Id_puestos_de_alimentos` (`Id_puestos_de_alimentos`),
  CONSTRAINT `tipos_de_puestos_de_alimentos_ibfk_1` FOREIGN KEY (`Id_puestos_de_alimentos`) REFERENCES `puestos_de_alimentos` (`Id_Puestos_de_alimentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_puestos_de_alimentos`
--

LOCK TABLES `tipos_de_puestos_de_alimentos` WRITE;
/*!40000 ALTER TABLE `tipos_de_puestos_de_alimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_puestos_de_alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification_codes`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `verification_codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
INSERT INTO `verification_codes` VALUES (83,53,'094984');
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07  5:51:48
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07  5:51:48
