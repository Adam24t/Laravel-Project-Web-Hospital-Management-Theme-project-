-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project_uts
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `Tanggal_Booking` date NOT NULL,
  `ID_Pasien` varchar(20) NOT NULL,
  `ID_Dokter` varchar(15) DEFAULT NULL,
  `ID_Perawat` varchar(15) NOT NULL,
  `ID_Diagnosa` int(15) DEFAULT NULL,
  `ID_Jenis_Booking` int(11) NOT NULL,
  `Deskripsi_Pemeriksaan` varchar(100) DEFAULT NULL,
  `Biaya` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Pasien` (`ID_Pasien`),
  KEY `NIP_Dokter` (`ID_Dokter`),
  KEY `NIP_Perawat` (`ID_Perawat`),
  KEY `Kode_Diagnosa` (`ID_Diagnosa`),
  KEY `ID_Jenis_Booking` (`ID_Jenis_Booking`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID`),
  CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`ID_Perawat`) REFERENCES `perawat` (`ID`),
  CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`ID_Diagnosa`) REFERENCES `diagnosa` (`ID`),
  CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`ID_Jenis_Booking`) REFERENCES `jenis_booking` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (5,'2023-10-22','300000000000000','100000000000000','200000000000001',2,9,'Test',240000),(6,'2023-10-22','300000000000006','100000000000005','200000000000003',2,2,'Test',265000);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftar_tagihan`
--

DROP TABLE IF EXISTS `daftar_tagihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftar_tagihan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pasien` varchar(20) NOT NULL,
  `ID_Rawat_Inap` int(11) DEFAULT NULL,
  `ID_Booking` int(11) DEFAULT NULL,
  `Harga` int(11) NOT NULL,
  `Status` varchar(12) NOT NULL DEFAULT 'Belum lunas',
  PRIMARY KEY (`ID`),
  KEY `ID_Booking` (`ID_Booking`),
  KEY `ID_Pasien` (`ID_Pasien`),
  KEY `ID_Rawat_Inap` (`ID_Rawat_Inap`),
  CONSTRAINT `daftar_tagihan_ibfk_1` FOREIGN KEY (`ID_Booking`) REFERENCES `booking` (`ID`),
  CONSTRAINT `daftar_tagihan_ibfk_2` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID`),
  CONSTRAINT `daftar_tagihan_ibfk_3` FOREIGN KEY (`ID_Rawat_Inap`) REFERENCES `rawat_inap` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_tagihan`
--

LOCK TABLES `daftar_tagihan` WRITE;
/*!40000 ALTER TABLE `daftar_tagihan` DISABLE KEYS */;
INSERT INTO `daftar_tagihan` VALUES (1,'300000000000000',NULL,5,240000,'Lunas'),(2,'300000000000017',1041,NULL,500000,'Lunas'),(3,'300000000000000',1042,NULL,4000000,'Lunas'),(4,'300000000000003',1014,NULL,2000000,'Lunas'),(5,'300000000000077',1028,NULL,500000,'Belum lunas'),(6,'300000000000006',NULL,6,265000,'Belum lunas');
/*!40000 ALTER TABLE `daftar_tagihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnosa`
--

DROP TABLE IF EXISTS `diagnosa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnosa` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `Tanggal_Diagnosa` date DEFAULT NULL,
  `Nama_Diagnosa` varchar(100) DEFAULT NULL,
  `Deskripsi_Diagnosa` varchar(250) DEFAULT NULL,
  `Tindakan_Medis_Yang_Dibutuhkan` text DEFAULT NULL,
  `ID_Obat` varchar(50) DEFAULT NULL,
  `Jumlah_Obat` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Kode_Obat` (`ID_Obat`),
  CONSTRAINT `diagnosa_ibfk_1` FOREIGN KEY (`ID_Obat`) REFERENCES `obat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnosa`
--

LOCK TABLES `diagnosa` WRITE;
/*!40000 ALTER TABLE `diagnosa` DISABLE KEYS */;
INSERT INTO `diagnosa` VALUES (2,'2023-10-20','Test','Test','Test','10005',2);
/*!40000 ALTER TABLE `diagnosa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokter` (
  `ID` varchar(15) NOT NULL,
  `Nama_Dokter` varchar(100) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `No_HP` varchar(13) NOT NULL,
  `ID_Spesialisasi` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_spesialisasi_dokter` (`ID_Spesialisasi`),
  CONSTRAINT `fk_spesialisasi_dokter` FOREIGN KEY (`ID_Spesialisasi`) REFERENCES `spesialisasi_dokter` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` VALUES ('100000000000000','Arsenal Callahan','1982-11-25','Laki-laki','P.O. Box 387, 7873 Ligula. Road','0857364258867',3),('100000000000001','Harlan Bushee','1974-10-26','Laki-laki','Ap #112-9655 Vel St.','0852624560585',3),('100000000000002','Madeson Huff','1988-07-22','Perempuan','P.O. Box 950, 2406 Rutrum Avenue','0815013114814',5),('100000000000003','Adam O\'Neill','1965-05-31','Laki-laki','Ap #396-6382 Tempus Av.','0857524020311',2),('100000000000004','Bell Noel','1970-09-05','Perempuan','Ap #940-1909 Semper Avenue','0837446151405',4),('100000000000005','Amir Durham','1970-12-14','Perempuan','5473 Lacinia Street','0859187207354',4),('100000000000006','Celeste Glenn','1982-01-30','Laki-laki','379-2157 Elit. Rd.','0825832864347',3),('100000000000007','Whoopi Riddle','1966-12-18','Perempuan','593-2073 Enim. Road','0882631621616',4),('100000000000008','Kay Airbender','1966-06-02','Perempuan','Ap #489-123 Lobortis Road','0811773483931',6),('100000000000009','Jordan Witt','1979-08-06','Perempuan','985-5944 Ut Avenue','0858841300385',4),('100000000000010','Lucius Ayala','1982-10-11','Laki-laki','4438 Eu St.','0805919531871',7),('100000000000011','Jerry Rowland','1990-03-24','Perempuan','P.O. Box 529, 1052 Taciti St.','0845173872717',1),('100000000000012','Clark Compton','1980-12-23','Laki-laki','P.O. Box 137, 3369 Dolor Rd.','0812925620131',3),('100000000000013','Jeanette Santana','1981-07-28','Perempuan','Ap #267-3136 Faucibus Rd.','0834255462886',6),('100000000000014','Sebastian Bartlett','1970-07-28','Laki-laki','Ap #438-682 Urna Street','0856652850251',7),('100000000000015','Logan Burton','1989-08-15','Perempuan','P.O. Box 157, 551 Euismod Avenue','0813676105226',6),('100000000000016','John Stokes','1965-08-29','Perempuan','Ap #544-665 Massa. Street','0883581746414',4),('100000000000017','Carla Alvarado','1969-12-01','Laki-laki','Ap #348-1560 Varius. Ave','0828352166167',1),('100000000000018','Reese Hurley','1975-02-24','Perempuan','547-2638 Molestie Road','0863781324166',5),('100000000000019','Stephen Sherman','1974-05-27','Laki-laki','P.O. Box 995, 9880 Enim. Rd.','0835182390527',7),('100000000000020','Hakeem Grant','1984-07-15','Perempuan','Ap #445-4063 Neque St.','0817753121347',4),('100000000000021','Lucy Raymond','1978-01-31','Perempuan','432-125 Tristique Av.','0883056717968',6),('100000000000022','Abdul Mayer','1990-08-03','Perempuan','P.O. Box 115, 8760 Scelerisque Rd.','0803353683154',2),('100000000000023','Abdul Frazier','1969-06-06','Perempuan','P.O. Box 725, 2077 Vestibulum Road','0833316286304',7),('100000000000024','Laura Glass','1987-07-31','Laki-laki','349-9488 Tellus Rd.','0884434521345',2),('100000000000025','Aaron Chandler','1969-05-31','Perempuan','P.O. Box 339, 4861 Praesent Avenue','0817373317712',1),('100000000000026','Finn Brennan','1975-11-08','Perempuan','107-9988 Varius Road','0863403595787',2),('100000000000027','Reed Barnes','1969-12-01','Laki-laki','Ap #577-1116 Consectetuer, Rd.','0856556013958',5),('100000000000028','Fiona Gilliam','1966-04-20','Laki-laki','Ap #486-5875 Placerat Avenue','0882425345885',2),('100000000000029','Roanna Preston','1981-12-05','Perempuan','Ap #489-402 Quisque Road','0872137822182',2),('100000000000030','Bruce Hardin','1986-04-11','Laki-laki','Ap #183-1668 Nulla. St.','0850145141134',2),('100000000000031','Lynn Weaver','1965-10-15','Perempuan','P.O. Box 260, 9697 In Avenue','0886733597151',4),('100000000000032','Bo Chaney','1978-01-22','Laki-laki','P.O. Box 601, 4751 Aliquet Rd.','0851347469676',4),('100000000000033','Orson Merrill','1982-03-26','Perempuan','Ap #432-724 Egestas. St.','0805554434453',2),('100000000000034','Jameson Mccray','1980-11-13','Perempuan','Ap #752-8079 Aenean Av.','0814775276765',6),('100000000000035','Shafira Klein','1982-04-28','Perempuan','P.O. Box 564, 3719 Bibendum St.','0875587037884',5),('100000000000036','Veda Collier','1970-11-01','Laki-laki','P.O. Box 668, 3446 Dui. Road','0884296300995',3),('100000000000037','Claire Odom','1981-07-17','Laki-laki','621-639 Vel Street','0845835273744',6),('100000000000038','Samantha Curry','1985-07-01','Perempuan','226-9512 Ut Street','0822853522577',1),('100000000000039','Reagan Medina','1982-04-18','Perempuan','Ap #713-6186 Sed Av.','0854320886181',6),('100000000000040','Teagan Hendricks','1967-07-30','Perempuan','P.O. Box 611, 5684 Aliquet Street','0828539773189',6),('100000000000041','Armando Hanson','1985-07-11','Laki-laki','667-5279 Eleifend Street','0847678425382',5),('100000000000042','Nicholas Pugh','1976-10-14','Laki-laki','693-9348 Eros. St.','0868397491226',3),('100000000000043','Germane Salazar','1980-06-11','Laki-laki','730-9791 Sapien, St.','0861787167813',4),('100000000000044','Uta Kirk','1975-07-28','Laki-laki','171-2826 Vivamus Ave','0886207583126',5),('100000000000045','Brynne Green','1965-09-12','Perempuan','Ap #955-3776 Ipsum Avenue','0814255785752',4),('100000000000046','Kasper Hurley','1987-12-20','Perempuan','P.O. Box 767, 7501 A Avenue','0865752366537',2),('100000000000047','Jakeem Bentley','1971-08-28','Perempuan','Ap #322-4015 Penatibus Street','0847042268080',6),('100000000000048','Sarah Donovan','1973-05-02','Laki-laki','978-360 Nascetur Rd.','0813216360664',2),('100000000000049','Chiquita Meyers','1989-12-12','Perempuan','Ap #610-160 Sollicitudin Avenue','0883281515340',2),('100000000000050','Isaiah Steele','1968-08-30','Perempuan','2949 Sollicitudin St.','0839952537694',5),('100000000000051','Coby Jennings','1965-02-04','Laki-laki','6510 Magna. Ave','0855460634627',3),('100000000000052','Mechelle Chavez','1968-04-06','Perempuan','540-7884 Eget Rd.','0818386719403',1),('100000000000053','Chastity Hunt','1972-08-25','Laki-laki','Ap #885-3654 Venenatis St.','0826114665743',5),('100000000000054','Porter Sweet','1974-10-26','Perempuan','P.O. Box 531, 4199 Odio Rd.','0828216138756',6),('100000000000055','Dorothy Vazquez','1972-01-15','Laki-laki','598-8408 Molestie Av.','0854263599651',3),('100000000000056','Silas Sandoval','1984-11-24','Laki-laki','887-7363 Aliquam Street','0800032940558',5),('100000000000057','Zoe Chan','1965-03-12','Perempuan','P.O. Box 319, 2397 Sed St.','0871830691810',6),('100000000000058','Gisela Anderson','1986-02-20','Perempuan','P.O. Box 433, 8771 Praesent Rd.','0835441337651',5),('100000000000059','Regina Woods','1985-06-20','Laki-laki','P.O. Box 292, 8951 Arcu St.','0820731761737',7),('100000000000060','Mira Reeves','1971-07-08','Laki-laki','7783 Ipsum Avenue','0825348620917',7),('100000000000061','Ferdinand Whitehead','1965-06-06','Perempuan','Ap #381-9088 Fermentum St.','0845905461134',4),('100000000000062','Jaquelyn Hartman','1984-04-10','Perempuan','Ap #434-5260 Fusce St.','0846064522872',6),('100000000000063','Darryl Weaver','1969-10-28','Laki-laki','Ap #745-7072 Nunc St.','0835026724646',6),('100000000000064','Slade Wallace','1990-06-21','Perempuan','Ap #727-6693 Magnis Street','0802678123627',5),('100000000000065','Glenna Goodman','1983-12-30','Perempuan','285-9165 Mauris Rd.','0824925523572',3),('100000000000066','Oleg Hayden','1976-05-10','Laki-laki','571-2041 Interdum Ave','0858634903946',4),('100000000000067','Reese George','1969-12-18','Laki-laki','864-5616 A, Road','0817341887526',3),('100000000000068','Indira Case','1973-09-23','Laki-laki','992-3003 Erat. St.','0834251814128',2),('100000000000069','Levi Boone','1985-12-27','Laki-laki','6971 Metus Rd.','0841634797576',3),('100000000000070','Xandra Hansen','1978-06-14','Laki-laki','8743 Scelerisque Ave','0829014494371',1),('100000000000071','Coby Steele','1971-04-28','Perempuan','3625 Lobortis. Street','0839985157813',6),('100000000000072','Giselle Hudson','1967-01-05','Perempuan','101-625 Nibh St.','0826135880482',4),('100000000000073','Piper Moses','1973-11-08','Perempuan','312-9751 Est Av.','0827637267135',3),('100000000000074','Evan Norman','1975-06-26','Laki-laki','P.O. Box 292, 2367 Purus. Rd.','0831744523313',5),('100000000000075','Rhoda Ingram','1970-06-13','Perempuan','666-6085 Elit, Av.','0825225975794',4),('100000000000076','Rebecca Finch','1968-02-13','Perempuan','366-3689 At, Rd.','0803683180766',7),('100000000000077','Timothy Morgan','1986-09-19','Laki-laki','751-7095 Malesuada St.','0833733054187',5),('100000000000078','Flynn Allen','1976-08-03','Laki-laki','Ap #384-8953 Sodales Avenue','0896794097508',7),('100000000000079','Brenda Myers','1965-01-17','Perempuan','945-4042 Accumsan Avenue','0887932523743',7),('100000000000080','Channing Fletcher','1978-01-21','Laki-laki','Ap #603-6598 Enim Rd.','0888364130351',1),('100000000000081','Clinton Spencer','1977-06-06','Laki-laki','Ap #444-5406 Volutpat. Ave','0844485034294',6),('100000000000082','Dennis Boyd','1979-10-07','Perempuan','233-7767 Neque. Ave','0841180568110',1),('100000000000083','Reece Carter','1986-05-25','Laki-laki','Ap #299-8533 Risus. St.','0887452695763',7),('100000000000084','Tanner Weiss','1976-01-16','Perempuan','P.O. Box 546, 574 Gravida Street','0833137602364',3),('100000000000085','Brent Stephenson','1975-07-10','Perempuan','981-336 Torquent Rd.','0884367936210',1),('100000000000086','Barrett Boyer','1971-09-19','Laki-laki','109-7514 Ornare, Road','0851794315094',4),('100000000000087','Jemima Pennington','1981-07-02','Laki-laki','500 Facilisis, St.','0887844733298',7),('100000000000088','Dylan Atkins','1990-10-01','Perempuan','5850 Tortor, St.','0881611520968',7),('100000000000089','Tyrone Adams','1990-04-26','Laki-laki','525-6335 Neque Avenue','0862351459612',4),('100000000000090','Bree Mcknight','1987-02-19','Perempuan','6866 Diam St.','0834664336132',6),('100000000000091','Angelica Jacobs','1977-09-14','Perempuan','Ap #699-9875 Arcu. St.','0898427586284',2),('100000000000092','David Macias','1978-05-14','Laki-laki','8470 Egestas Avenue','0869730625775',7),('100000000000093','Chadwick Gilbert','1982-01-19','Laki-laki','799-5384 Cum Ave','0843773721257',4),('100000000000094','Leo Hull','1980-04-22','Laki-laki','677-6941 Metus. St.','0878481745609',3),('100000000000095','Fatima English','1966-10-17','Laki-laki','Ap #158-2622 Ut St.','0827442769775',2),('100000000000096','Austin Bennett','1990-07-11','Laki-laki','992-5796 In Rd.','0828487836697',5),('100000000000097','Ora Hoffman','1984-06-19','Laki-laki','641-8169 Eros St.','0821620272958',3),('100000000000098','Austin Delaney','1965-08-27','Perempuan','756-9368 Curabitur St.','0830933461488',5),('100000000000099','Vincent Duffy','1980-08-09','Perempuan','365-537 Vestibulum StREE','0844624570125',3),('100000000000892','Ralph Watson','1997-09-09','Laki-laki','New York','082186374909',3),('100000000009890','Levi Moony','1980-10-28','Laki-laki','Surabaya','0821397354901',7);
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_booking`
--

DROP TABLE IF EXISTS `jenis_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_booking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Jenis_Booking` varchar(50) NOT NULL,
  `Biaya` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_booking`
--

LOCK TABLES `jenis_booking` WRITE;
/*!40000 ALTER TABLE `jenis_booking` DISABLE KEYS */;
INSERT INTO `jenis_booking` VALUES (1,'Pelayanan Psikiatri',100000),(2,'Pelayanan NAPZA',75000),(3,'Pelayanan Konseling dan Psikoterapi',75000),(4,'Pelayanan Psikologi Klinis',100000),(5,'Pelayanan Kesehatan Jiwa Masyarakat',120000),(6,'Pelayanan Keperawatan Jiwa',75000),(7,'Pelayanan Keperawatan Napza',80000),(8,'Pelayanan Psikometri',75000),(9,'Pelayanan Gangguan Mental Organik',50000);
/*!40000 ALTER TABLE `jenis_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obat` (
  `ID` varchar(20) NOT NULL,
  `Nama_Obat` varchar(100) NOT NULL,
  `Deskripsi_Obat` varchar(250) DEFAULT NULL,
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obat`
--

LOCK TABLES `obat` WRITE;
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` VALUES ('1000','Obat','Obat bagus',160000),('10001','nascetur ridiculus mus.','tellus lorem eu metus. In lorem.',180000),('10002','Donec','pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus',35000),('10003','aliquet, sem','tincidunt orci quis lectus. Nullam suscipit, est ac',175000),('10004','Donec','Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat',15000),('10005','ipsum nunc','aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est',95000),('10006','scelerisque, lorem','arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc',50000),('10007','nunc','ante dictum cursus. Nunc mauris elit, dictum eu, eleifend',135000),('10008','cursus et,','Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis',135000),('10009','rhoncus. Proin','vitae velit egestas lacinia. Sed congue, elit sed',85000),('10040','lacus. Mauris non','diam luctus lobortis. Class aptent taciti sociosqu',185000),('10041','in, hendrerit','egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non,',110000),('10042','et','elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in',160000),('10043','vulputate mauris sagittis','Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices.',95000),('10044','varius','enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu,',165000),('10045','amet ornare','et tristique pellentesque, tellus sem mollis dui, in sodales',165000),('10046','aliquam iaculis, lacus','lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit',130000),('10047','rutrum','Mauris non dui nec urna suscipit nonummy. Fusce',140000),('10048','semper auctor.','Nunc lectus pede, ultrices a,',115000),('10049','libero lacus,','Curabitur dictum. Phasellus in felis. Nulla',145000),('10060','nibh. Phasellus','arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida',190000),('10061','ipsum','rutrum magna. Cras convallis convallis dolor. Quisque tincidunt',125000),('10062','gravida molestie','dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit',50000),('10063','orci sem eget','ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet,',35000),('10064','netus et','lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc',20000),('10065','massa. Mauris','ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim.',155000),('10066','Nunc','Vestibulum ante ipsum primis in faucibus orci',160000),('10067','nec,','natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean',140000),('10068','eu enim.','In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et',20000),('10069','a','ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget,',40000),('10070','velit.','Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean',130000),('10071','Praesent eu dui.','sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra',135000),('10072','ipsum','consequat purus. Maecenas libero est, congue',90000),('10073','Sed nec metus','enim consequat purus. Maecenas libero est, congue a, aliquet vel,',25000),('10074','eu tellus','felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit',35000),('10075','sed pede','eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed,',80000),('10076','lectus quis','id, libero. Donec consectetuer mauris id sapien.',95000),('10077','magna a','Duis mi enim, condimentum eget, volutpat',35000),('10078','convallis, ante','at sem molestie sodales. Mauris blandit',60000),('10079','vitae, sodales','fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi',180000),('10080','Nunc commodo','elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum purus, accumsan interdum libero dui',165000),('10081','faucibus orci','odio vel est tempor bibendum. Donec',90000),('10082','Aliquam nisl. Nulla','arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.',115000),('10083','nec','sem, vitae aliquam eros turpis non enim. Mauris quis turpis',110000),('10084','Curabitur vel lectus.','Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus',195000),('10085','vitae','a, facilisis non, bibendum sed, est. Nunc',75000),('10086','ridiculus','et, magna. Praesent interdum ligula eu',140000),('10087','nisi nibh','Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient',95000),('10088','lectus sit','lectus sit amet luctus vulputate, nisi sem',50000),('10089','enim. Etiam','augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan',135000),('10090','rutrum lorem','sem. Pellentesque ut ipsum ac mi eleifend egestas.',145000),('10091','Nam tempor diam','feugiat tellus lorem eu metus. In',130000),('10092','turpis nec mauris','Etiam ligula tortor, dictum eu, placerat',190000),('10093','Phasellus','Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu.',190000),('10094','nisi','vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor',180000),('10095','dapibus','consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque',135000),('10096','Donec','nec, eleifend non, dapibus rutrum, justo. Praesent luctus.',115000),('10097','Pellentesque','nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis',155000),('10098','natoque penatibus','eu, placerat eget, venenatis a, magna. Lorem ipsum dolor',50000);
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien` (
  `ID` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Kontak_Darurat` varchar(13) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` VALUES ('300000000000000','Colleen Jenkinsy','1996-07-29','P.O. Box 163, 9082 Sed Rdoad','Perempuan','0800707866838'),('300000000000001','Cynthia Hines','1983-12-26','Ap #273-6270 Porttitor St.','Perempuan','0825992286313'),('300000000000002','Ann Leach','1951-08-23','850-5479 Porta Ave','Perempuan','0897734202708'),('300000000000003','Maite Roth','1976-05-10','Ap #537-2997 Vitae Rd.','Perempuan','0837622353451'),('300000000000004','Paula Daugherty','1966-10-16','8877 Nonummy Avenue','Perempuan','0826763785320'),('300000000000005','Maite Gardner','1955-08-28','802-4038 Quis Rd.','Perempuan','0875484145755'),('300000000000006','Harper Peters','1966-07-20','813-1960 Orci. Street','Perempuan','0825443920478'),('300000000000007','Avram Conrad','1951-11-25','4704 Eu, Road','Perempuan','0831534261553'),('300000000000008','Chloe Bates','1999-01-21','188-2554 Sit Road','Perempuan','0852165985126'),('300000000000009','Maya Aguilar','1962-08-12','777-8786 Enim. Ave','Perempuan','0868662166134'),('300000000000010','Robin Frederick','1960-10-26','455-4799 Sed Ave','Perempuan','0839266787750'),('300000000000011','Kareem Drake','1959-10-11','P.O. Box 670, 2983 Arcu. St.','Perempuan','0855124470234'),('300000000000012','Daphne Woodard','1952-10-31','P.O. Box 415, 405 Laoreet St.','Perempuan','0801934855201'),('300000000000013','Jarrod Austin','1998-04-20','1442 Phasellus Avenue','Laki-laki','0866089306778'),('300000000000014','Amal Booth','1998-08-21','9795 Suscipit Avenue','Perempuan','0807423487724'),('300000000000015','Finn Rowland','1985-06-22','9965 Sem. Av.','Laki-laki','0846455995240'),('300000000000016','Rogan Harper','1977-06-22','Ap #485-1849 Quisque Street','Perempuan','0818125201148'),('300000000000017','Calista Flynn','1978-01-17','P.O. Box 172, 6008 Montes, Av.','Laki-laki','0877843785788'),('300000000000018','Preston Cote','1983-02-03','P.O. Box 272, 4758 Odio St.','Laki-laki','0873568102247'),('300000000000019','Troy Kerr','2000-03-17','873-9496 Diam. St.','Perempuan','0873817144218'),('300000000000020','Venus Copeland','1963-12-10','547-4952 Proin St.','Perempuan','0807529723769'),('300000000000021','Merrill Payne','1999-05-09','Ap #982-2048 Tincidunt, St.','Laki-laki','0881708297564'),('300000000000022','Jelani Downs','1996-11-24','Ap #590-1000 Sem. Rd.','Laki-laki','0886540380013'),('300000000000023','Xanthus Walls','1973-05-02','P.O. Box 702, 9863 Nisi St.','Perempuan','0827368823681'),('300000000000024','Cara Mills','1973-10-21','Ap #702-3907 Ultricies Ave','Perempuan','0845521333627'),('300000000000025','Camden Carson','1972-05-30','8352 Lorem, Rd.','Laki-laki','0840996613186'),('300000000000026','Regina Wolf','1983-05-29','7653 Nisl. Ave','Perempuan','0857649648463'),('300000000000027','Tatum Dickerson','1989-06-02','5006 Convallis St.','Laki-laki','0824771386756'),('300000000000028','Lacy Nicholson','1969-03-09','Ap #224-8122 Sem Ave','Laki-laki','0831427734951'),('300000000000029','Walter Merrill','2000-09-02','P.O. Box 870, 7897 Blandit Rd.','Laki-laki','0867785443979'),('300000000000030','Amber Neal','1996-12-23','Ap #855-3891 Euismod Ave','Laki-laki','0864623160852'),('300000000000031','August Warner','2000-01-18','609-9479 Fringilla. Rd.','Laki-laki','0869475726057'),('300000000000032','Linus Reese','1981-07-25','2997 Fringilla Av.','Perempuan','0854003750136'),('300000000000033','Steel Valentine','1959-10-20','Ap #248-499 Purus Av.','Laki-laki','0840228154800'),('300000000000034','Knox Mcknight','1998-11-16','912-8454 Sem St.','Laki-laki','0851798718178'),('300000000000035','Hasad Bailey','1959-08-12','Ap #375-8285 Ligula. St.','Laki-laki','0841972597382'),('300000000000036','Quemby Lopez','1954-08-25','603-7301 Rutrum, Street','Perempuan','0865127407654'),('300000000000037','Raymond Leon','1972-03-19','P.O. Box 718, 9070 Vitae Street','Laki-laki','0875988835659'),('300000000000038','Jermaine Barrett','1991-02-26','871-9255 Amet Road','Laki-laki','0868716647794'),('300000000000039','Eric Riley','2000-07-19','P.O. Box 878, 5688 Hendrerit Av.','Laki-laki','0878303783764'),('300000000000040','Tamara Prince','1979-09-19','P.O. Box 799, 7101 Fermentum Rd.','Laki-laki','0842838865861'),('300000000000041','Quin Hall','1958-12-29','552-6496 Nulla Rd.','Perempuan','0827365652254'),('300000000000042','Channing Daniel','1972-07-26','770-8122 Tempor Av.','Perempuan','0899738576779'),('300000000000043','Linus Haynes','1952-01-26','P.O. Box 234, 6256 Ut, St.','Laki-laki','0890935292646'),('300000000000044','Jeanette Mcintyre','1955-07-20','Ap #848-5123 Mauris Ave','Laki-laki','0809222578244'),('300000000000045','Sawyer Chaney','1957-09-08','598-1496 Vehicula. Ave','Perempuan','0830149874853'),('300000000000046','Keaton Langley','1973-12-26','150 Et Av.','Perempuan','0845675579435'),('300000000000047','Jin Morin','1975-02-01','995-2221 Nec, Rd.','Laki-laki','0855027158933'),('300000000000048','Orson Potter','1963-04-22','635-8435 Senectus Street','Laki-laki','0806460746560'),('300000000000049','Keane Fry','1992-06-14','2768 Mauris St.','Laki-laki','0857876422717'),('300000000000050','Meghan Mcdowell','1971-09-24','7151 Aliquet Ave','Laki-laki','0884517744129'),('300000000000051','James Padilla','1980-06-26','Ap #603-4205 Habitant Avenue','Laki-laki','0833996214668'),('300000000000052','Zahir Molina','1952-03-10','7615 In Road','Laki-laki','0830249274672'),('300000000000053','Debra Carson','1963-10-10','Ap #990-510 In Rd.','Perempuan','0849571832602'),('300000000000054','Giacomo Wilcox','1952-06-14','347-9690 Ornare, Ave','Laki-laki','0845554854107'),('300000000000055','Hyacinth Slater','1968-07-10','6177 Phasellus Rd.','Laki-laki','0860395958718'),('300000000000056','Odessa Mcintyre','1985-10-08','Ap #106-1723 Gravida Avenue','Perempuan','0892776246713'),('300000000000057','Jamal Rivers','1952-09-07','P.O. Box 427, 7195 Leo. Rd.','Laki-laki','0805053302895'),('300000000000058','Bianca Daniel','1962-01-25','5424 Non Ave','Laki-laki','0868914153333'),('300000000000059','Hollee Mclean','1968-08-26','232-4556 Lacus. Rd.','Perempuan','0826586510729'),('300000000000060','Cullen Palmer','1965-12-30','254-300 Non Road','Laki-laki','0866152469670'),('300000000000061','Burke Rosales','1993-08-29','522-3594 Vulputate, Street','Perempuan','0894862312691'),('300000000000062','Jelani Cole','1986-09-18','1466 Non, St.','Perempuan','0872488613684'),('300000000000063','Josephine Frost','1952-06-19','Ap #926-1190 Sem St.','Perempuan','0886417190602'),('300000000000064','Kenneth Burt','1982-01-21','4424 Aliquam Street','Perempuan','0834354318318'),('300000000000065','Russell Bender','1951-07-21','P.O. Box 361, 7946 Non Rd.','Laki-laki','0827577316567'),('300000000000066','April Lynch','1962-08-06','2986 Sapien. St.','Laki-laki','0897882878386'),('300000000000067','Axel Keith','1958-04-27','P.O. Box 166, 4380 Hendrerit St.','Laki-laki','0839515640777'),('300000000000068','Hilel Tyson','1995-12-15','P.O. Box 793, 2280 Interdum St.','Laki-laki','0879864337575'),('300000000000069','Olga Wilkerson','1992-01-23','P.O. Box 888, 5709 Morbi St.','Perempuan','0889380154516'),('300000000000070','Kibo Chandler','1984-09-21','892-9379 Est, Road','Laki-laki','0856358606565'),('300000000000071','Xenos Camacho','2000-09-22','201-9946 Molestie Ave','Perempuan','0874244165156'),('300000000000072','Lucius Odom','2000-01-03','Ap #163-9513 Pharetra St.','Laki-laki','0860532950573'),('300000000000073','Miriam Johnston','1951-06-16','Ap #627-5894 Gravida Road','Perempuan','0828137364303'),('300000000000074','MacKensie Mcfarland','2000-03-06','Ap #904-6454 Blandit Av.','Perempuan','0885353888181'),('300000000000075','Addison Herrera','1956-10-04','P.O. Box 783, 8449 Conubia Avenue','Laki-laki','0885698533313'),('300000000000076','Drake Salas','1986-10-05','1197 Malesuada St.','Perempuan','0838414393582'),('300000000000077','Zia Houston','1997-07-12','P.O. Box 887, 4651 Orci. Rd.','Perempuan','0830134376341'),('300000000000078','Lucy Jones','1964-06-30','Ap #358-4604 Vehicula. Ave','Perempuan','0817384338985'),('300000000000079','Bertha Madden','2000-01-12','P.O. Box 834, 2662 At, Ave','Perempuan','0844740384823'),('300000000000080','Serina Peterson','1985-04-12','Ap #236-8904 Ullamcorper. St.','Perempuan','0852121211756'),('300000000000081','Hilary Henson','1969-11-30','722-5328 Cras Av.','Perempuan','0839313416827'),('300000000000082','Jada Shields','1973-09-30','263-7961 Montes, Avenue','Perempuan','0849527103212'),('300000000000083','Hanna Salazar','1953-01-10','308-2606 Ut Rd.','Laki-laki','0801532322733'),('300000000000084','Glenna Houston','1952-04-04','Ap #775-6113 Facilisi. Street','Perempuan','0824276784315'),('300000000000085','Allistair Lane','1988-12-01','Ap #147-5512 Molestie Street','Perempuan','0823669617113'),('300000000000086','Garrison Brooks','1990-07-23','Ap #553-3959 Aliquet, St.','Laki-laki','0808412346582'),('300000000000087','Raven Ashley','1973-04-22','121-9268 Nisi Ave','Perempuan','0851563325151'),('300000000000088','Boris Justice','1970-09-12','Ap #636-2043 Id Rd.','Perempuan','0881345113382'),('300000000000089','Kiayada Campbell','1962-07-20','131-1152 Mauris St.','Perempuan','0847366078827'),('300000000000090','Melanie Sellers','1981-11-13','937-5224 Convallis Street','Laki-laki','0858688201582'),('300000000000091','Melinda Wade','1951-01-29','Ap #825-2233 Praesent Rd.','Laki-laki','0863259335056'),('300000000000092','Hunter Collins','1985-06-28','7062 Et Road','Laki-laki','0898342844573'),('300000000000093','Marah Mcbride','1960-07-31','Ap #751-1150 Sem Ave','Perempuan','0819428863237'),('300000000000094','Prescott Vega','1971-08-28','Ap #292-4633 Sed Rd.','Perempuan','0885878677678'),('300000000000095','Alec Soto','2000-02-21','Ap #917-2050 Arcu. Avenue','Laki-laki','0897189133025'),('300000000000096','Herman Short','1970-05-09','Ap #305-240 Sapien Ave','Perempuan','0810941483585'),('300000000000097','Wylie Kelley','1974-08-21','Ap #123-2690 Elit, Street','Laki-laki','0874652933658'),('300000000000098','Kermit Poole','1965-02-17','Ap #125-6417 Sed, Avenue','Perempuan','0838573856205'),('300000000000099','Kitra Collier','1989-02-20','252-5069 Phasellus St.','Perempuan','0882114436884'),('300000000000890','Kevin Spacey','1978-12-25','Jember','Laki-laki','085678495903'),('300000000000899','Malone','2005-05-17','Jalan Medokan Asri Utara XII','Laki-laki','085678495909');
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perawat`
--

DROP TABLE IF EXISTS `perawat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perawat` (
  `ID` varchar(15) NOT NULL,
  `Nama_Perawat` varchar(100) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `No_HP` varchar(13) NOT NULL,
  `ID_Spesialisasi` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_spesialisasi_perawat` (`ID_Spesialisasi`),
  CONSTRAINT `fk_spesialisasi_perawat` FOREIGN KEY (`ID_Spesialisasi`) REFERENCES `spesialisasi_perawat` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perawat`
--

LOCK TABLES `perawat` WRITE;
/*!40000 ALTER TABLE `perawat` DISABLE KEYS */;
INSERT INTO `perawat` VALUES ('200000000000001','Roth James','1969-12-26','Laki-laki','2581 Tellus. Av.','0872216235281',1),('200000000000002','Wayne Mccormick','1969-04-11','Perempuan','934-8882 Quis Road','0845567327663',1),('200000000000003','Adam Horne','1977-10-03','Perempuan','P.O. Box 848, 7373 Luctus Street','0813258580522',3),('200000000000004','Mufutau Mcdowell','1977-06-26','Laki-laki','P.O. Box 909, 9208 Feugiat Road','0844430733802',1),('200000000000005','Ezra Norris','1988-04-10','Laki-laki','448-9254 Risus. Ave','0834329824747',2),('200000000000006','Briar Macdonald','1973-04-20','Laki-laki','2024 Feugiat. Rd.','0871826084293',2),('200000000000007','Nero Sawyer','1969-01-17','Laki-laki','Ap #290-7855 Semper Road','0865468666119',1),('200000000000008','Daniel Hanson','1972-12-26','Laki-laki','552-6950 Donec Street','0834585818965',2),('200000000000009','Garth Sullivan','1980-06-29','Perempuan','Ap #199-4446 Dictum Rd.','0882644218694',1),('200000000000010','Dale Roberts','1965-11-21','Laki-laki','389-2060 Vehicula Street','0897054593784',3),('200000000000011','Raven Orr','1983-12-28','Perempuan','Ap #637-4950 Cubilia St.','0878118914434',3),('200000000000012','Lacey Mcbride','1984-07-31','Laki-laki','Ap #247-5833 Ut St.','0833121132336',3),('200000000000014','Drake Mcmahon','1986-11-06','Perempuan','4728 Viverra. Street','0850529447425',3),('200000000000015','Ruth Mendez','1973-01-07','Laki-laki','P.O. Box 677, 7939 Et Road','0833466331801',1),('200000000000016','Alana Andrews','1970-06-02','Perempuan','229-8156 Augue Av.','0894851485594',1),('200000000000017','Emma Ortiz','1973-02-06','Perempuan','4472 Eu, Road','0881443311554',2),('200000000000018','Ronan Solis','1967-05-31','Laki-laki','P.O. Box 462, 5648 Imperdiet Rd.','0849770492628',3),('200000000000019','Ainsley Frost','1975-11-28','Laki-laki','Ap #249-3639 Ullamcorper. Avenue','0839971528373',2),('200000000000021','Haviva Hancock','1972-04-15','Laki-laki','Ap #204-424 Mauris Rd.','0845758058117',1),('200000000000022','Harrison Neal','1970-11-21','Perempuan','Ap #368-7423 Amet St.','0820853237553',2),('200000000000023','Rigel Wong','1983-02-27','Perempuan','Ap #559-8350 Non, Av.','0891546888097',3),('200000000000024','Arthur Goodman','1984-11-22','Laki-laki','P.O. Box 576, 3181 Lobortis Rd.','0846443351739',2),('200000000000025','Nero Ewing','1965-05-01','Laki-laki','P.O. Box 789, 5017 Pellentesque, Avenue','0856858131019',2),('200000000000026','Jescie Landry','1983-06-12','Perempuan','Ap #572-3362 Mi Avenue','0824511711734',2),('200000000000027','Boris Garza','1972-12-30','Laki-laki','486 Mollis Av.','0862745695927',1),('200000000000028','Colleen Hutchinson','1985-03-24','Laki-laki','8489 Facilisis St.','0836401660565',3),('200000000000029','Naomi Lott','1986-12-26','Perempuan','632-767 Tellus Street','0827516301957',1),('200000000000030','Jennifer Spencer','1984-09-12','Laki-laki','Ap #633-2251 Lorem Road','0854192432182',1),('200000000000031','April Nielsen','1983-05-27','Perempuan','863-7636 Vivamus Street','0868737418710',3),('200000000000032','Rebecca Harper','1984-10-29','Perempuan','870-6260 Tellus Rd.','0814251412810',2),('200000000000033','Tanya Steele','1978-11-16','Perempuan','P.O. Box 115, 2935 Vestibulum St.','0819548558622',3),('200000000000034','Ariel Mclean','1985-02-01','Perempuan','8795 Ipsum Av.','0837947514166',1),('200000000000035','Nichole Vang','1975-02-16','Perempuan','P.O. Box 736, 9780 Ut Ave','0857844168136',2),('200000000000036','Benjamin Hawkins','1984-10-12','Perempuan','P.O. Box 109, 9136 Risus. Avenue','0882421126957',3),('200000000000037','Megan Hughes','1983-12-30','Laki-laki','1547 Felis Road','0888838241111',1),('200000000000038','Allistair Oneal','1980-10-05','Laki-laki','Ap #180-9282 Non Ave','0883118918236',1),('200000000000039','August Reeves','1983-09-07','Perempuan','Ap #952-4205 Nulla. Av.','0862323110268',1),('200000000000040','Rahim Mcguire','1968-08-11','Laki-laki','488-8560 A Rd.','0819481573778',2),('200000000000041','Eagan Bridges','1968-03-17','Laki-laki','Ap #114-9811 Condimentum. Rd.','0843389218314',3),('200000000000042','Elliott Weeks','1974-12-06','Laki-laki','324-1971 Nibh Ave','0834134475512',2),('200000000000043','Kelly Pruitt','1984-02-26','Perempuan','161-4231 Blandit. Avenue','0812557769416',3),('200000000000044','Edan Mcfarland','1989-01-10','Perempuan','379-4593 Justo. Rd.','0826928837667',3),('200000000000045','Colette Levy','1986-10-13','Perempuan','Ap #164-7121 Libero Av.','0882338944246',1),('200000000000046','Hedda Smith','1968-05-14','Laki-laki','5914 Nunc Road','0831781341638',1),('200000000000047','Sierra Battle','1975-08-13','Laki-laki','8355 Scelerisque Street','0888365357831',3),('200000000000048','Jackson Mcfarland','1968-07-31','Laki-laki','535-4434 Pede Road','0813856123571',3),('200000000000049','Ivor Morse','1988-04-28','Perempuan','394-1933 Neque Av.','0866176473129',1),('200000000000050','Olga Valdez','1980-03-08','Laki-laki','184-6040 Proin Road','0894248345745',2),('200000000000051','Quon Henderson','1975-04-11','Laki-laki','2261 Massa. Av.','0824685324863',3),('200000000000052','Amelia Middleton','1967-05-20','Laki-laki','Ap #442-6106 Facilisis Avenue','0868487733761',1),('200000000000053','India Ramirez','1986-04-26','Laki-laki','P.O. Box 863, 3108 Mauris Av.','0881572253222',3),('200000000000054','Mary Huber','1974-09-02','Perempuan','7883 Accumsan Rd.','0844114863330',2),('200000000000055','Jin Franco','1988-07-06','Perempuan','419-9382 Lacinia Rd.','0811523258958',1),('200000000000056','Harlan Leach','1969-10-18','Perempuan','432-3787 Eget Ave','0822730245313',2),('200000000000057','Zelda Oneal','1976-07-04','Laki-laki','338-8525 Sagittis Rd.','0847847707261',3),('200000000000058','Lacey Prince','1969-03-23','Laki-laki','4926 Arcu. St.','0897444232922',1),('200000000000059','Leigh Welch','1977-02-04','Laki-laki','800-3313 Ligula. Rd.','0854982379386',3),('200000000000060','Marsden Armstrong','1974-08-20','Laki-laki','Ap #557-7018 Euismod St.','0899762871646',3),('200000000000061','Ahmed Warren','1987-07-23','Laki-laki','575-1648 Interdum. Rd.','0851357545171',3),('200000000000062','Flavia Thomas','1965-07-03','Perempuan','P.O. Box 499, 6417 Molestie St.','0839248269236',1),('200000000000063','Ronan Best','1984-05-07','Perempuan','P.O. Box 562, 7672 Donec Avenue','0860517824511',3),('200000000000064','Kessie Schultz','1980-07-28','Laki-laki','980-4860 Sem Av.','0855450735277',1),('200000000000065','Garth Sweeney','1973-12-09','Perempuan','6863 Ac Avenue','0875257757554',2),('200000000000066','Illiana Phelps','1989-03-14','Perempuan','415-7279 Nunc Ave','0887986346628',2),('200000000000067','Fletcher Stephens','1984-09-14','Perempuan','597-6643 Donec Avenue','0877164887836',2),('200000000000068','Stella Joyce','1979-04-30','Perempuan','Ap #241-935 Cras Avenue','0821452288237',2),('200000000000069','Gil Holder','1974-10-03','Perempuan','199-9562 Ornare, Avenue','0812395573553',1),('200000000000070','Zephania Buckner','1986-01-10','Laki-laki','769-4316 Ut, Av.','0833129264453',1),('200000000000071','Gannon Potts','1979-05-22','Perempuan','654-7231 Sit Avenue','0876847914970',2),('200000000000072','Venus Heath','1971-09-20','Laki-laki','P.O. Box 384, 7513 Nunc Street','0836431626513',3),('200000000000073','Courtney Henson','1977-07-26','Perempuan','292-4696 Lacus. St.','0843570333144',1),('200000000000074','Reed Stanley','1969-06-08','Laki-laki','843-8943 Ipsum Rd.','0832688460638',2),('200000000000075','Ima Orr','1982-04-28','Laki-laki','159-1514 Velit. Rd.','0860854838376',2),('200000000000076','Moana Madden','1966-01-21','Perempuan','P.O. Box 521, 3168 Luctus Road','0888208640667',2),('200000000000077','Dana Myers','1983-03-04','Laki-laki','Ap #669-4791 Aenean Ave','0814169246741',1),('200000000000078','Inez Black','1978-01-30','Laki-laki','307-4566 Purus Road','0847019261304',1),('200000000000079','Castor Santiago','1966-01-24','Perempuan','983-8366 Malesuada Av.','0817863322081',1),('200000000000080','Tobias Fuller','1971-12-29','Perempuan','Ap #462-373 Laoreet St.','0877211863616',1),('200000000000081','Nelle Baird','1987-05-13','Laki-laki','Ap #553-8137 Mi. Rd.','0837254624344',1),('200000000000082','Maxwell Kirk','1977-06-28','Perempuan','P.O. Box 824, 1808 Arcu. St.','0825867657209',1),('200000000000083','Jena Oneal','1977-01-20','Perempuan','Ap #495-6651 Volutpat. Avenue','0841534422113',1),('200000000000084','Winter Cole','1969-06-09','Perempuan','391-6734 Duis Road','0846821133157',1),('200000000000085','Pascale Buckley','1965-11-11','Perempuan','Ap #320-7930 Felis Rd.','0838564442382',1),('200000000000086','Dane Oneal','1981-08-19','Perempuan','Ap #630-2566 Lobortis Rd.','0879797454667',3),('200000000000087','Jesse Stevens','1968-07-29','Laki-laki','Ap #990-1273 Donec St.','0864761504622',2),('200000000000088','Zeph Greene','1982-09-28','Perempuan','P.O. Box 461, 7694 Ante Ave','0821263595454',1),('200000000000089','Brooke Cooley','1978-11-24','Laki-laki','P.O. Box 150, 2534 Aliquam Road','0888288209168',2),('200000000000090','Roth Calhoun','1984-07-10','Perempuan','Ap #632-5094 Et Av.','0869548348511',3),('200000000000091','Hope Carney','1981-03-27','Perempuan','5108 A, St.','0838703236628',2),('200000000000092','Ursa Mcmahon','1972-12-04','Laki-laki','P.O. Box 654, 8749 Quis Ave','0863416835864',3),('200000000000093','Haley Cochran','1969-10-28','Laki-laki','150-8231 A Avenue','0877931435431',1),('200000000000094','Dieter Hunt','1974-04-25','Laki-laki','501-2903 Libero Ave','0864621265313',1),('200000000000095','Geoffrey Rich','1975-02-16','Perempuan','P.O. Box 813, 7154 Sem St.','0866858755748',3),('200000000000096','Dacey Duncan','1971-02-08','Laki-laki','Ap #527-6171 Amet St.','0872630459093',2),('200000000000097','Brynn Mcintosh','1970-01-01','Perempuan','P.O. Box 771, 7126 Purus. Av.','0807410403737',3),('200000000000098','Aimee Howell','1974-04-07','Perempuan','Ap #973-4311 Eget, St.','0866155877376',3),('200000000000099','Arsenio Sanders','1988-10-06','Laki-laki','P.O. Box 450, 928 Vel St.','0869895442834',1),('200000000000895','Kuki Kiku','1990-12-07','Perempuan','Jember','082162358901',1),('200000000010890','Levi Moon','2023-10-15','Laki-laki','Surabaya','082132354901',2);
/*!40000 ALTER TABLE `perawat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap`
--

DROP TABLE IF EXISTS `rawat_inap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `ID_Pasien` varchar(20) DEFAULT NULL,
  `ID_Ruangan` int(15) DEFAULT NULL,
  `Tanggal_Masuk` date DEFAULT NULL,
  `Tanggal_Keluar` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Pasien` (`ID_Pasien`),
  KEY `Kode_Ruangan` (`ID_Ruangan`),
  CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID`),
  CONSTRAINT `rawat_inap_ibfk_2` FOREIGN KEY (`ID_Ruangan`) REFERENCES `ruangan` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1052 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap`
--

LOCK TABLES `rawat_inap` WRITE;
/*!40000 ALTER TABLE `rawat_inap` DISABLE KEYS */;
INSERT INTO `rawat_inap` VALUES (1011,'300000000000000',1,'2023-10-18','2023-10-21'),(1012,'300000000000001',1,'2023-10-18','2023-10-21'),(1013,'300000000000002',1,'2023-10-18','2023-10-21'),(1014,'300000000000003',1,'2023-10-18','2023-10-22'),(1028,'300000000000077',1,'2023-10-21','2023-10-22'),(1035,'300000000000000',1,'2023-10-21','2023-10-22'),(1041,'300000000000017',1,'2023-10-21','2023-10-22'),(1042,'300000000000000',3,'2023-10-12','2023-10-22'),(1043,'300000000000068',1,'2023-10-22',NULL),(1044,'300000000000044',1,'2023-10-22',NULL),(1045,'300000000000041',1,'2023-10-18',NULL),(1046,'300000000000015',1,'2023-10-22',NULL),(1047,'300000000000006',1,'2023-10-22',NULL),(1048,'300000000000049',1,'2023-10-22',NULL),(1049,'300000000000014',1,'2023-10-22',NULL),(1050,'300000000000038',1,'2023-10-22',NULL),(1051,'300000000000008',1,'2023-10-22',NULL);
/*!40000 ALTER TABLE `rawat_inap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruangan`
--

DROP TABLE IF EXISTS `ruangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruangan` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `Jenis_Ruangan` varchar(50) NOT NULL,
  `Kapasitas_Ruangan` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Tersedia',
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruangan`
--

LOCK TABLES `ruangan` WRITE;
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
INSERT INTO `ruangan` VALUES (1,'Ruang PICU',10,'Penuh',500000),(2,'Ruang Cendrawasih',23,'Tersedia',450000),(3,'Ruang Melati',32,'Tersedia',400000),(4,'Ruang Kutilang',50,'Tersedia',350000),(5,'Ruang NAPZA',10,'Tersedia',500000);
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spesialisasi_dokter`
--

DROP TABLE IF EXISTS `spesialisasi_dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spesialisasi_dokter` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Bidang_Spesialisasi` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spesialisasi_dokter`
--

LOCK TABLES `spesialisasi_dokter` WRITE;
/*!40000 ALTER TABLE `spesialisasi_dokter` DISABLE KEYS */;
INSERT INTO `spesialisasi_dokter` VALUES (1,'Spesialis Saraf'),(2,'Spesialis Radiologi'),(3,'Spesialis Kedokteran Jiwa'),(4,'Spesialis Anestesi'),(5,'Psikolog'),(6,'Dokter Umum'),(7,'Dokter Gigi');
/*!40000 ALTER TABLE `spesialisasi_dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spesialisasi_perawat`
--

DROP TABLE IF EXISTS `spesialisasi_perawat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spesialisasi_perawat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Bidang_Spesialisasi` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spesialisasi_perawat`
--

LOCK TABLES `spesialisasi_perawat` WRITE;
/*!40000 ALTER TABLE `spesialisasi_perawat` DISABLE KEYS */;
INSERT INTO `spesialisasi_perawat` VALUES (1,'Keperawatan Jiwa'),(2,'Keperawatan Anak'),(3,'Tidak Ada'),(4,'Keperawatan Lansia');
/*!40000 ALTER TABLE `spesialisasi_perawat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagihan`
--

DROP TABLE IF EXISTS `tagihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagihan` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `ID_Pasien` varchar(20) NOT NULL,
  `Tanggal_Transaksi` date DEFAULT NULL,
  `Jumlah_Transaksi` varchar(20) NOT NULL,
  `Status` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Belum lunas',
  PRIMARY KEY (`ID`),
  KEY `ID_Pasien` (`ID_Pasien`),
  CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagihan`
--

LOCK TABLES `tagihan` WRITE;
/*!40000 ALTER TABLE `tagihan` DISABLE KEYS */;
INSERT INTO `tagihan` VALUES (2,'300000000000003','2023-10-22','2000000','Lunas'),(6,'300000000000006',NULL,'265000','Belum lunas'),(7,'300000000000077',NULL,'500000','Belum lunas');
/*!40000 ALTER TABLE `tagihan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-22 14:19:28
