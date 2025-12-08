-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: pabitung
-- ------------------------------------------------------
-- Server version	8.0.44-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berkas_perkaras`
--

DROP TABLE IF EXISTS `berkas_perkaras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berkas_perkaras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panitera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_tangan` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berkas_perkaras`
--

LOCK TABLES `berkas_perkaras` WRITE;
/*!40000 ALTER TABLE `berkas_perkaras` DISABLE KEYS */;
INSERT INTO `berkas_perkaras` VALUES (5,'2025-11-19','214/Pdt.G/2025','1','storage/ttd/ttd_1763563091.png','2025-11-19 14:38:11','2025-11-19 14:38:11'),(6,'2025-11-20','80/Pdt.P/2025','6','storage/ttd/ttd_1763645512.png','2025-11-20 13:31:52','2025-11-20 13:31:52'),(7,'2025-11-20','79/Pdt.P/2025','4','storage/ttd/ttd_1763645669.png','2025-11-20 13:34:29','2025-11-20 13:34:29'),(8,'2025-11-21','216/Pdt.G/2025','2','storage/ttd/ttd_1763728133.png','2025-11-21 12:28:53','2025-11-21 12:28:53'),(9,'2025-11-24','215/Pdt.G/2025','5','storage/ttd/ttd_1763968260.png','2025-11-24 07:11:00','2025-11-24 07:11:00'),(15,'2025-11-28','83/Pdt.P/2025','6','storage/ttd/ttd_1764318217.png','2025-11-28 08:23:37','2025-11-28 08:23:37'),(16,'2025-11-28','81/Pdt.P/2025','6','storage/ttd/ttd_1764318262.png','2025-11-28 08:24:22','2025-11-28 08:24:22'),(17,'2025-11-28','218/Pdt.G/2025','7','storage/ttd/ttd_1764319080.png','2025-11-28 08:38:00','2025-11-28 08:38:00'),(18,'2025-11-28','82/Pdt.P/2025','7','storage/ttd/ttd_1764319116.png','2025-11-28 08:38:36','2025-11-28 08:38:36'),(19,'2025-11-27','220/Pdt.G/2025','2','storage/ttd/ttd_1764322654.png','2025-11-28 09:37:34','2025-11-28 09:37:34'),(20,'2025-11-28','217/Pdt.G/2025/PA.Bitg','3','storage/ttd/ttd_1764322719.png','2025-11-28 09:38:39','2025-11-28 09:38:39'),(21,'2025-11-28','221/Pdt.G/2025/PA.Bitg','3','storage/ttd/ttd_1764322763.png','2025-11-28 09:39:23','2025-11-28 09:39:23');
/*!40000 ALTER TABLE `berkas_perkaras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftar_hadirs`
--

DROP TABLE IF EXISTS `daftar_hadirs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daftar_hadirs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_perkara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penggugat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tergugat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_tangan` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kuasa_hukum_pemohon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuasa_hukum_tergugat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_hadirs`
--

LOCK TABLES `daftar_hadirs` WRITE;
/*!40000 ALTER TABLE `daftar_hadirs` DISABLE KEYS */;
INSERT INTO `daftar_hadirs` VALUES (1,'2025-11-24','212/pdt.6/2025/PA bitung','Cerai Talak','SAHRUL SAMBAYANG','DEVY INDRIYANI','storage/ttd/ttd_1763981722.png','2025-11-24 10:55:22','2025-11-24 10:55:22','Tidak','Tidak');
/*!40000 ALTER TABLE `daftar_hadirs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_08_10_023454_create_perkaras_table',1),(5,'2025_08_11_044047_add_field_majelis_hakim_to_perkaras_table',1),(6,'2025_08_14_143300_add_field_panitera_pengganti_to_perkaras_table',1),(7,'2025_08_15_231836_create_berkas_perkaras_table',1),(8,'2025_08_18_040214_create_daftar_hadirs_table',1),(9,'2025_08_27_125425_add_tanggal_pendaftaran_to_perkaras_table',2),(10,'2025_09_24_182027_add_majelis_hakim_to_perkaras_table',3),(11,'2025_09_26_000001_add_kuasa_hukum_fields_to_daftar_hadirs_table',4),(12,'2025_11_06_103858_add_pemohoni_fields_to_perkaras_table',5),(13,'2025_11_19_145344_add_pemohoniii_fields_to_perkaras_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perkaras`
--

DROP TABLE IF EXISTS `perkaras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perkaras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noperkara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tergugat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuasa_hukum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_pemohon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_tergugat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pemohon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_tergugat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenisHakim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hakimTunggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `majelisHakim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal` date DEFAULT NULL,
  `paniteraPengganti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `juruSita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemohoni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohoniii` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohoniv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pemohonii` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pemohoniii` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pemohoniv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perkaras`
--

LOCK TABLES `perkaras` WRITE;
/*!40000 ALTER TABLE `perkaras` DISABLE KEYS */;
INSERT INTO `perkaras` VALUES (11,'Permohonan Asal Usul Anak','79/Pdt.P/2025/PA.Bitg','Muhammad Ari Bimantora Bin Mustafa Buasirua','-','-','Kelurahan Girian Bawah, Kecamatan Girian, Kota Bitung','-','muhammadaribimantora@gmail.com',NULL,'- email Pemohon II: annisaameliamasari@gmail.com','2025-11-19','2025-11-19 12:48:34','2025-11-24 16:15:44','1',NULL,'1,2,3','2025-11-26','4','3','Annisa Amalia Masari Binti Hamid Masari','','',NULL,NULL,NULL),(12,'Permohonan Dispensasi Kawin','80/Pdt.P/2025/PA.Bitg','Suharyo Bin Syamsul Bachri','-','-','Kecamatan Maesa, Kota Bitung','-','suharyo701@gmail.com',NULL,'- email Pemohon II: muhridho462@gmail.com\r\n- Pemohon III: Jemmy Pangalerang Bin Setsis Pangalerang\r\n- email Pemohon III: megipangalerang@gmail.com\r\n- Pemohon IV: Ramla Humonggio Binti Burhan Humonggio\r\n- email Pemohon IV: askaalfiat@gmail.com','2025-11-19','2025-11-19 12:57:23','2025-11-19 14:20:07','2','3',NULL,'2025-12-02','6','2','Zakia Harun Binti Idris Harun','','',NULL,NULL,NULL),(13,'Cerai Gugat','214/Pdt.G/2025/PA.Bitg','VERONICA CYNTHIA KAUNANG Binti DENNY KAUNANG','WANDRI PATOH Bin JAMRUD PATOH','Adv. Rizal Aneta, S.H','Kelurahan Girian Indah Kecamatan Girian, Kota Bitung','Kelurahan Girian Indah Kecamatan Girian, Kota Bitung','anetariza1807@gmail.com',NULL,'- Pemohon dengan Kuasa Hukum;\r\n- T tidak ada alamat elektronik;','2025-11-19','2025-11-24 15:55:46','2025-11-24 16:13:49','2','3',NULL,'2025-11-27','1','1','-','-','-',NULL,NULL,NULL),(14,'Cerai Talak','215/Pdt.G/2025/PA.Bitg','Reky Paputungan Bin Musa Paputungan','Riska Limonu Binti Sofyan Limonu','-','Kelurahan Winenet Dua, Kecamatan Aertembaga, Kota Bitung','Kelurahan Danowudu, Kecamatan Ranowulu, Kota Bitung','rekypaputungan1988@gmail.com',NULL,'- T tidak ada alamat elektronik','2025-11-21','2025-11-24 16:00:51','2025-11-24 16:14:15','2','3',NULL,'2025-12-03','5','1','-','-','-',NULL,NULL,NULL),(15,'Cerai Talak','216/Pdt.G/2025/PA.Bitg','Michael Basri Bin Rahman Basri','Ana Shirvina Binti Moh. Masyhur','-','Kelurahan Manembo-Nembo Atas, Kecamatan Matuari, Kota Bitung','Kelurahan Kampung Baru, Kecamatan Kusan Hilir, Kabupaten Tanah Bumbu, Provinsi Kalimantan Selatan','michael892196.basri@gmail.com',NULL,'- T tidak ada alamat elektronik\r\n- Lokasi T di Kalimantan Selatan','2025-11-21','2025-11-24 16:06:09','2025-11-24 16:14:34','1',NULL,'1,2,3','2025-12-10','2','2','-','-','-',NULL,NULL,NULL),(16,'Cerai Talak','217/Pdt.G/2025/PA.Bitg','Sofyan Hasan Bin Yasin Hasan','Sasmita Abjul Binti Ramang Abjul','-','Kecamatan Poigar, Kabupaten Bolaan Mongondow','Kelurahan Bitung Tengah, Kecamatan Maesa, Kota Bitung, Provinsi Sulawesi Utara','sofyanhasan1200@gmail.com',NULL,'- Lokasi P di Bolaang Mongondow\r\n- T tidak ada alamat elektronik','2025-11-24','2025-11-24 16:08:49','2025-11-25 08:38:57','2','2',NULL,'2025-12-08','3','3','-','-','-',NULL,NULL,NULL),(17,'Cerai Gugat','218/Pdt.G/2025/PA.Bitg','Sutria Dalango Binti Suaib Dalango','Faris Katili Bin Sariman Katili','-','Kelurahan Wangurer Barat, Kecamatan Madidir, Kota Bitung','Kelurahan Wangurer Barat, Kecamatan Madidir, Kota Bitung','sutriadalango58@gmail.com',NULL,'- T tidak ada alamat elektronik','2025-11-24','2025-11-24 16:10:07','2025-11-25 12:58:42','2','2',NULL,'2025-12-08','7','1','-','-','-',NULL,NULL,NULL),(18,'Permohonan Dispensasi Kawin','81/Pdt.P/2025/PA.Bitg','Yusuf Ilahude Bin Oge Ilahude','-','-','Kelurahan Girian Weru Dua, Kecamatan Girian, Kota Bitung','-','jusuf.alexilahude@gmail.com',NULL,'- Kedua anak masih dibawah umur dan hamil 20 minggu','2025-11-24','2025-11-25 08:44:00','2025-11-25 13:00:37','2','3',NULL,'2025-12-04','6','2','Sriwati Kamumu Binti Ismail Kamumu','Sahrul Marcelion Rahman Mooduto Binti Husen Mooduto','-','ummiafghan46@gmail.com','sahrulmooduto23@gmail.com',NULL),(19,'Permohonan Dispensasi Kawin','82/Pdt.P/2025/PA.Bitg','Abdul Rahman Djufri Kobis Bin Julius Kobis','-','-','Kelurahan Bitung Timur, Kecamatan Maesa, Kota Bitung','-','abdulabdulrahmanjuprikonis@gmail.com',NULL,'- P telah hamil 13 Minggu','2025-11-25','2025-11-26 11:21:19','2025-11-26 12:00:02','2','2',NULL,'2025-12-03','7','3','Linda Thalib Binti Ibrahim Thalib','-','-','lindathalib90@gmail.com',NULL,NULL),(20,'Permohonan Isbat Nikah','83/Pdt.P/2025/PA.Bitg','Mohamad Akbar Maiya Bin Rismanto Maiya','-','-','Kelurahan Girian Indah, Kecamatan Girian, Kota Bitung','-','akbarmaiya18@gmail.com',NULL,'-','2025-11-25','2025-11-26 11:27:56','2025-11-26 12:00:45','1',NULL,'1,2,3','2025-12-15','6','1','Syahrini Bintang Siking Binti Sukardi Siking','-','-','bintangsiking785@gmail.com',NULL,NULL),(21,'Cerai Talak','219/Pdt.G/2025/PA.Bitg','Adji Tri Cahyadi Bin Marsam Tri Wibowo','Weena Maria Magdalena Ratag Binti Johny David Ratag','-','Kelurahan Girian Weru Dua, Kecamatan Girian, Kota Bitung','Desa Ratatotok Selatan, Kecamatan Ratatotok, Kabupaten Minahasa Tenggara','adjicahyadi77@gmail.com',NULL,'T: tidak ada alamat elektronik','2025-11-25','2025-11-26 11:30:14','2025-11-26 12:01:22','2','3',NULL,'2025-12-11','4','3','-','-','-',NULL,NULL,NULL),(22,'Cerai Gugat','220/Pdt.G/2025/PA.Bitg','Sandra Yulianti Tulis alias Sandra Tulis binti Nasir Tulis','Lukman Maluwenseng Bin Weldis Maluwenseng','-','Kelurahan Pinokalan, Kecamatan Ranowulu, Kota Bitung','Desa Temboan, Jaga III, Kecamatan Langowan Selatan, Kabupaten Minahasa','tulissandra450@gmail.com',NULL,'T: tidak ada alamat email','2025-11-25','2025-11-26 11:40:17','2025-11-26 12:03:20','1',NULL,'1,2,3','2025-12-10','2','1','-','-','-',NULL,NULL,NULL),(23,'Cerai Gugat','221/Pdt.G/2025/PA.Bitg','Afrinda Arifin binti Moh Zaenal Arifin','Andika Susanto bin Agung Susanto','Yanto Mandulangi, S.H, Firmansyah Pratama Alim, S.H., M.H., dan NURUL NIQMAH KHUSNUL KHATIMAH MANDULANGI, S.H','Lingkungan I RT 003 RW 001, Manembo-nembo Tengah, Matuari, Kota Bitung','Gemaf, Weda Utara, Kabupaten Halmahera Tengah, Maluku Utara','mandulangiyanto76@gmail.com',NULL,'- Email T : afrindaarifin16@gmail.com;\r\n- Kuasa Hukum P','2025-11-25','2025-11-26 11:44:38','2025-11-26 12:04:18','2','2',NULL,'2025-12-15','3','2','-','-','-',NULL,NULL,NULL);
/*!40000 ALTER TABLE `perkaras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0CPMUH97mBxgvn75pRtGScC19yWkXx0xx7prBz5Y',NULL,'43.131.243.61','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoicGduMjlRNDVkRlYybHp1RXNzYllseUN5T09qVnR0WUVaQXliZ201MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9wYW5pdGVyYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764330315),('1mWHY6osDpqzD5FGbAMonNZON3E9eSm2u7ZtPsuX',NULL,'87.120.191.124','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46','YToyOntzOjY6Il90b2tlbiI7czo0MDoicWtHN3kzSWh3RHNOczBOdThBcUhXMWpQcXJmOVlHNFhaYkdzUTZuQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1764337306),('1Zfr8Dsob1r0RpSwFQskQBNyemxsFsCDnRCFU6kL',NULL,'91.134.73.222','Mozilla/5.0 (compatible; ModatScanner/1.2; +https://modat.io/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVFMS3FJbVloSG92UzExNVMwbTdjVEZuSkZ3REt6ZFZTeXEwU25SbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764323281),('3norlsS9IJ80yl9ZuUntRWYmLDfJpavJsEwqYjcx',NULL,'193.142.147.209','','YTozOntzOjY6Il90b2tlbiI7czo0MDoic0MyZDQ1dFc1U0NKcG5JeFN6OUVzTGEyNjd0SElUZGRmdzhPaWdtSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764179102),('4iWaUDwHyAKPuZmLguGIlLpvl050vTEAUodTa6o9',NULL,'5.187.35.21','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjNMNmtWMWM3TzhSWURwNUI2Z0M3SkwxRXI0VHZXbkFiMWNPaWFIUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764324174),('6aMPG3M2kY0Pmq8v0nriCw0Uu2Bu9DZ5wA6izVRF',NULL,'43.131.32.36','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHl5Mk5za0hsOEU2WmRNU0JpaEhwUVJtalI0ZndXMld5RWx1ZFp3WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764335998),('6JJyg3UE1nv41Lqc8Mv9UgGRvB6f4qbRG352re0v',NULL,'125.161.27.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7','YTozOntzOjY6Il90b2tlbiI7czo0MDoidzh2YmZEd1VDR2JraldzWmhPWmgyZjdRUUVONUkyclZoSFd1WWZyTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764180016),('AgdaSsAorax9CoBbgnUdbRVfReW0ZkLAdJvk60BZ',NULL,'87.120.191.124','Hello World','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDEwYmZuVHZhUllzSDkzYnk3c3V1S1V2M3NRbU1vdW9TaVpYUWR3MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764153238),('AnjLMIzXcv7HlWoiasUckGLLMOL4XKg1aIPcgu4n',NULL,'185.242.226.112','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzhHNzNzZ29xZ0lvSElzTklzTUpBNlNvekd3Y3AzVzVtNnc0YzZSNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764152582),('aVuJX3PfF0YaJwRJhIE4Z1D6QUvlgnfH9bNbFYNf',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFJldW8wWUdNU1FWUVB0VDdHZDJIVkJFelJqNjlXM3dvWnR2RjRObyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764317969),('Ba21BgWoG9MGhRHW53fSSMsPBHQidw9PtMV7KSss',NULL,'119.28.89.249','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkJPdXR1NDY5VGdUVm1kcW5nWFRDY0szNHg0dElVZWY1TGxFN0JFUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9oYWtpbS9lZGl0LzE5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1764333874),('c5zZ3eCZijKpltswwteVCViF6501CfP0a7XHucvi',NULL,'170.106.148.137','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk55cWVENzRQcGp6eWlWeDdzYUM1ZnpMdWpLaEpYbzhBM0lNR0kzdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764328993),('C8NKp0BngSaXY1zPAD2wRz7tgO5N0hVSZdTmU0Zn',NULL,'177.126.59.118','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWhJeWZEeHRvY0plYURGVXRTVGk4bnZuTDF3M3hHMGVTZ0VmclF1UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764174473),('cinp2q1DMLn5Hayc7CceFhPuvgrAo83AyQkh9DQa',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoic0dKSTlOZ3E4UFpJeEJOaVYydE9yTFNxUHg3ZWo0MDVHZkVRZlExQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764333376),('CX3NxDpkpRDnWGDnAoqcgCLyjRfI0TIIOtX4bXpr',NULL,'198.235.24.60','Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlNvb2ZZMWRuMFhjbGVzWmQwQ09xM2dJVVVvQUpEVEE3YkJITHBzZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764326528),('ddGZmpZF6WUdkAvfCV0M5AJUhYnBcvxxrA7wriII',NULL,'85.204.81.98','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiczZGVjQ3Y0ttTjNITEFzOVA2QlRxOVFjMW9UU3VlZU9tUWhFc0x3MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764174030),('dJcrppfHaYNBP3WFphPd0uAlk4G1HVkZfzsrY4zL',NULL,'5.187.35.21','','YTozOntzOjY6Il90b2tlbiI7czo0MDoid2l6cDl0WFl2Z0Z0M3pRSVhYc0hiVkYwbnhmbWlla29yQzVCcTlvOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764163723),('etlyy9Rt7bJneetFS7y6qfougUGuhDlf2A4JTvIu',NULL,'5.187.35.21','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUloY3BYc2JqU3dIbnNpbWFQdlFHbmxzb1ZialB0REt2YjlydkRVUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764155934),('fHQZlA8koVbIV684dY4w3GNpCmBAwroaglC3TBqX',NULL,'87.121.84.52','Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkwybm1NaTVsaWU4Mnd5eWhHdFo5N0piMUx2Q0xVMDNjTE16WlZ2WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764164799),('G36cxWo2YrGoUGOqpQH1o732xcdd4KHguxO65NGk',NULL,'43.133.220.37','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0ExYU5hdGZOZk44NWlIRDVGWVhFMXdQWG5EUzk5QW8zS0pGRUJ6QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9oYWtpbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764336335),('GIZchlLRp8gIIMcet5RRUijB1ARGvR3UbYAQUsH7',NULL,'87.120.191.124','Hello World','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEh5ZmpUelJMZUNJRzgwYmRteWdYOUdhNkhua09Sa2JraUpIdmdLdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764173613),('iZhExBWMLz7rOuGojoSArmROfjsBNv53aVeKQLSY',NULL,'43.155.188.157','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVlBVGJMekNFZEkwcWZKc2FCTFRQSGxnS1J1MVdrWU55b3ZNdXlURCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764159361),('mWXrLje2iraW9aBWJXSvkPaCm5Oyt6mwt4iDbd72',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidHJrUFZFTThCYlBJRjhFeXJMbHJZRWE5OW5HTXZXSWhPV3NjMWtXRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764158668),('n8N6sL71pU4z8vg9xQln3G6qlZS1hZnJOFoXQLnp',NULL,'194.114.136.95','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmtsRUpRZEZHVzZlZnBvUVQ3N3FiejQ4N2JEWDNhWW9YVlUwVHA4aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764190413),('oOZF45whojhOaWAKrhF7e2WP1ysYS2LnX39OS6GR',NULL,'43.157.181.189','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibDBUdUJmMFJvNFB6NkFIRlJoMlcxNDRoVVZiU3VMRnduZjM0UmFVTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764170250),('OrqBDYB6HW0lhOj7ZI8Fhhpu5740XJDmmwRZB0m4',NULL,'198.235.24.43','Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity','YTozOntzOjY6Il90b2tlbiI7czo0MDoibU1LdjFzYVFLYWtVTmJFSDZabUYwRmgzZzl1a2Rsb09MRThubHoyWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764161194),('p1CyUgLo91XkD1HdpDtMnlGZcnTy6Bn6R3TlnVr4',NULL,'34.76.134.123','python-requests/2.32.5','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTdVYkpRNUFhRUZZbk1xa1NXeU9KdkhNRlYxcmlFcDFwTDh2YkcwNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764331584),('pLhCr7OWnhfEkGvYBFhDReVNVqeEAMFWI1E0cDl2',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidDRQRzFMb0tNdlE2c004U3ZORDRFVUNLckJJcTJKQnNJdzNCZ0xINyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764318268),('pqVczdZlyVubpSkiVlaEI3A22fVaHeZ3ebktz3NM',NULL,'43.157.22.109','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnMyVUlmUkJ6ekEzMFVHNDgzWXhlSnhOYlppR0FWblF5QVc3NzRoYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9oYWtpbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764330928),('PrFy4az3QKde9AVJf53CaGFOwqsQYdv9dfT8722r',NULL,'176.65.148.34','Linux Gnu (cow)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2k3NmozbEdySDM4b2VtMUhxNVI3WDBESFhna0JWVFdHbk5aN1o0OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764335687),('PSAFsBFNKuXLqYOWdY3gPrYEzj754JH8XBolnBLx',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieHlsSnVFSlAxSHRGSDFVNjNaeVNOUld5RnFBTDZhM2tpeVFUa1FZVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764322766),('qzL6iisROFwQgXMGfxUm8gV9wqexmivs3Auba1BI',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHMzQ0FYWlF6OU10eWNtaXlacklDNm1EM20xSTlmbU1jUHJRcTNsSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764319129),('R5C82ckVM0avf3odLvSYBAQm6Jr68vVTNxi3Hgfb',NULL,'87.120.191.124','Hello World','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjgyMEVGZG5sQURsUldEYUdibmo5dWhmVFVERlZGa1ptU3ZoOEpwbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764186898),('rDp240Pg2KkQbII3Cl4xTIez7fE23uffruT0M4HE',NULL,'202.47.160.126','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDdHMnhjOGFHY3g1QXhNVzkxZmdPOU5RQ1pwQjlSNTUzc3V4bFZJWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764317975),('rn9FskCt0f5Ic3J9XiHUqiSHe6MyOK7hORTYOHmV',NULL,'185.242.226.112','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidFp1ZVFnSk1ieVJZalJkSzV3UFlPdEVGR0RlOEh2N0lJSWIxNzAzSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764187216),('slcvLMKseB8NTrqbQcFOftLENKRxuj2Uvtmo168s',NULL,'43.155.129.131','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGp4MFQ0Tmx2NUg0YWYxSjdtaTZDVGYySlVCWmlBOUNVZ2FwTzBleiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764181701),('SNOLzCgQALjz9eUYYrLU1QiRkaaCm5efERmFCV3r',NULL,'43.156.156.96','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYktJeVpyblh0N2dDRGZvZmJ1R24xM3pOOUpOdWNoWlh3bXRrb0psUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9oYWtpbS9lZGl0LzE2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1764332665),('Sy0OCY8r1oRBxQRycGmX1q3ePeNu875W1gtHUaJX',NULL,'45.156.87.209','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEIxZmtQQkdMS1FxdkJNem5kc2NkZWZidUdWRng5Y05xQTFHNmpPciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764320409),('u5ApmMvBuEdH44tV7KRFd34kZf7SsKQYH8NJDBNV',NULL,'49.51.132.100','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibHhaSHVDeUtaS2x6bTlNQUx0czYzczVXSm1PdlBNUEx0bWU1dWZINyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9wZW5kaXN0cmlidXNpYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764332249),('uk3SmvNIh2GFbaDuAN7xoY81GKJop3vQjJMjxgLe',NULL,'146.190.57.24','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFdWMEpxNkowdWdHc2VUWERkdm5XejY3ZWYxSXBRNWVLd256UUhBdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764337080),('usx1FCTfHNkYqqIWEySqkOmNo15wXvOf1uVnYtgs',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoialE3Q1dFVlFoRWJhbEVqSmF0WG95Mkphdk9uajFTdzM3bDRQRklVTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9wZW5kaXN0cmlidXNpYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764318014),('uyUpisLQ6C3DAZTGi7pQSYDHZljd9BCeAyNt76H7',NULL,'185.242.226.112','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjN2WWJEdnRMMWtoeHBZajZycVZLNTBoSmxQM09XTGY3ZGRtSFIyeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764323860),('UzwDpE60010u9d3lfbrxEwEBrHoy3a7bXHwsiOpH',NULL,'49.51.47.100','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWgyeU4zM2JiZ1M3WmNSODBrcUxpWkFoN0RDOVZtYWR5TmpnNFYxTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9vcGVyYXRvcnNob3cvc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764335559),('vD91O7ZU2hPWtZ6iQQaH95foSLJAGWrWckuINBaK',NULL,'43.164.196.57','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3U4T0FCZm1TRUcxRWJQcDMxVHBmZWNmVnhHalpTblV0QlFCZllWMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9oYWtpbS9lZGl0LzIyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1764333285),('vjIzACrwtWqXWylRGfmfxDAiEHDhfKVozfske804',NULL,'36.93.13.138','Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoid3d6V3pTYzBZNktjcDVGb0ZwbmROOWF5bjkwUjBqNXhVY3pidTB4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764322655),('VOkvTD6YY781xSYfswyU0f3SfKFCHb6bhVEmqj68',NULL,'103.116.13.229','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidVhMNnhjYkFhZURaY2hUNUU5N1VtaHFmcTlscmtWa3pid2t2R0N2aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9iZXJrYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1764322724),('WiugsvQq9I3OoA3f6Ceog7jQGlGqcoU8ChqnIHUy',NULL,'5.187.35.21','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjRQYVhNMzRueFJJSGZWbWhVSG93Zlg1WmNiNTcyWlpFRmFTN0RGYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764182010),('XEBSL3D9zbkL0G5S1qOHVCjS3AmjBz6C3AGYDmAY',NULL,'5.187.35.21','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1haR28xM3pxdWFCb1FGNUpGbmJSbHl4RjR6andrSEVrV0tTT3NZSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764171288),('XSJdqOiJ6SxBDV5AQHV2bP77TVoirr0zUi5yuGoM',NULL,'202.120.234.42','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHhmT2hKUEU5c3R0alpvSWw4SHlPYVdGalVJQWFPZUV0TjgzTVBtWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764189441),('xz9065fUMAh05yHHyOKJFSqHkmKKmIsNNHUXv5Mo',NULL,'202.120.234.42','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVhCYmpSY0JtTnppSmwxbURiVWV5UkdUVlVQZW5sb20zRjA3QmNQaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764189039),('y2D9vrNqFMIUDPKk2EiyUfYHKL4PfBawk3Jwm0I9',NULL,'5.187.35.21','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWJMOVdORUFDT2hoV1lNQU5aN1pqZEVpNTZCY0F2ZnBTd3Via1I3SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764175360),('yuXzCkC8aESleNruFsiRkSbVpuXvaGAd0YAbi0PG',NULL,'43.157.180.116','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibTFFYjViWVJmV1ZVbG5UUWJoQVlFUzlGZkxKZ3pZSWZMYWk5MWhoUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9vcGVyYXRvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1764331456),('zHqMO00DMFnEOD1tJeemYyjiFLYRHrLBCMXrho7x',NULL,'43.166.255.102','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWtVcGhnQnA3b3JQVVI4WTFIOG5iTzBpS3lxN0FuVlZ4VlFNU3V1VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xNjEuMjQ4LjE5NS4xNi9oYWtpbS9lZGl0LzE4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1764334603),('ZplGIsP5ou7PVIMAgSaLDBnWIH65q8PoRJPGwh1h',NULL,'87.120.191.124','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46','YToyOntzOjY6Il90b2tlbiI7czo0MDoiQWw1S0ZMT3lqSVc4MTdQb1dBRWZZWVBEelMwbjVBY0w1b0NKVU04WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1764317979);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-28 13:50:42
