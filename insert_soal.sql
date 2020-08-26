/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - db_bank_soal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bank_soal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_bank_soal`;

/*Table structure for table `tb_download` */

DROP TABLE IF EXISTS `tb_download`;

CREATE TABLE `tb_download` (
  `id_pengguna` char(5) DEFAULT NULL,
  `id_soal` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_download` */

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `kode_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`kode_kelas`,`nama_kelas`) values 
(1,'KELAS  I'),
(2,'KELAS  II\r'),
(3,'KELAS  III\r'),
(4,'KELAS  IV\r'),
(5,'KELAS  V\r'),
(6,'KELAS  VI\r');

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(30) NOT NULL,
  `kode_kelas` char(5) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id_mapel`,`nama_mapel`,`kode_kelas`) values 
(1,'MATEMATIKA','1\r'),
(2,'BAHASA INDONESIA','1\r'),
(3,'BAHASA INGGRIS','1\r'),
(4,'PENDIDIKAN KEWARGANEGARAAN','1\r'),
(5,'PENDIDIKAN AGAMA ISLAM','1\r'),
(6,'PENJASKES','1\r'),
(7,'MATEMATIKA','2\r'),
(8,'BAHASA INDONESIA','2\r'),
(9,'BAHASA INGGRIS','2\r'),
(10,'PENDIDIKAN KEWARGANEGARAAN','2\r'),
(11,'PENDIDIKAN AGAMA ISLAM','2\r'),
(12,'PENJASKES','2\r'),
(13,'MATEMATIKA','3\r'),
(14,'BAHASA INDONESIA','3\r'),
(15,'BAHASA INGGRIS','3\r'),
(16,'PENDIDIKAN KEWARGANEGARAAN','3\r'),
(17,'PENDIDIKAN AGAMA ISLAM','3\r'),
(18,'PENJASKES','3\r'),
(19,'MATEMATIKA','4\r'),
(20,'BAHASA INDONESIA','4\r'),
(21,'BAHASA INGGRIS','4\r'),
(22,'PENDIDIKAN KEWARGANEGARAAN','4\r'),
(23,'PENDIDIKAN AGAMA ISLAM','4\r'),
(24,'PENJASKES','4\r'),
(25,'ILMU PENGETAHUAN ALAM','4\r'),
(26,'ILMU PENGETAHUAN SOSIAL','4\r'),
(27,'MATEMATIKA','5\r'),
(28,'BAHASA INDONESIA','5\r'),
(29,'BAHASA INGGRIS','5\r'),
(30,'PENDIDIKAN KEWARGANEGARAAN','5\r'),
(31,'PENDIDIKAN AGAMA ISLAM','5\r'),
(32,'PENJASKES','5\r'),
(33,'ILMU PENGETAHUAN ALAM','5\r'),
(34,'ILMU PENGETAHUAN SOSIAL','5\r'),
(35,'MATEMATIKA','6\r'),
(36,'BAHASA INDONESIA','6\r'),
(37,'BAHASA INGGRIS','6\r'),
(38,'PENDIDIKAN KEWARGANEGARAAN','6\r'),
(39,'PENDIDIKAN AGAMA ISLAM','6\r'),
(40,'PENJASKES','6\r'),
(41,'ILMU PENGETAHUAN ALAM','6\r'),
(42,'ILMU PENGETAHUAN SOSIAL','6\r');

/*Table structure for table `tb_pengambilan_soal` */

DROP TABLE IF EXISTS `tb_pengambilan_soal`;

CREATE TABLE `tb_pengambilan_soal` (
  `id_pengguna` char(5) DEFAULT NULL,
  `id_soal` char(5) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengambilan_soal` */

insert  into `tb_pengambilan_soal`(`id_pengguna`,`id_soal`,`nilai`) values 
('2','1',0),
('3','5',0),
('4','2',0),
('5','4',0),
('6','3',0);

/*Table structure for table `tb_pengguna` */

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(30) DEFAULT NULL,
  `id_status` char(5) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `passwordd` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `fk_id_pengg` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`id_pengguna`,`nama_pengguna`,`id_status`,`username`,`passwordd`) values 
(1,'Elisa','1','admin','a'),
(2,'Julia','2','constributor','c'),
(3,'Ridwan','3','User','u');

/*Table structure for table `tb_soal` */

DROP TABLE IF EXISTS `tb_soal`;

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` varchar(30) DEFAULT NULL,
  `pilih_a` varchar(30) DEFAULT NULL,
  `pilih_b` varchar(30) DEFAULT NULL,
  `pilih_c` varchar(30) DEFAULT NULL,
  `pilih_d` varchar(30) DEFAULT NULL,
  `id_subtema` char(5) DEFAULT NULL,
  `id_pengguna` char(5) DEFAULT NULL,
  `tb_kunci` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `fk_subtema` (`id_subtema`),
  KEY `fk_pengguna` (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_soal` */

insert  into `tb_soal`(`id_soal`,`soal`,`pilih_a`,`pilih_b`,`pilih_c`,`pilih_d`,`id_subtema`,`id_pengguna`,`tb_kunci`) values 
(1,'Hasil Penjumlahan  1  + 3  =','A.  2','B.  4','C.  6','D.  8','1','1','B.  4\r'),
(2,'3 buah apel + 4 buah apel  =','A.  7  buah apel','B.  4 buah apel','C.  6 buah apel','D.  3 buah apel','1','1','A.  7 buah apel\r'),
(3,'Hasil   5  + 3  =','A.  2','B.  4','C.  6','D.  8','1','1','D. 8\r'),
(4,'6 kucing + 5 kucing  =','A.  2 ekor kucing','B.  4 ekor kucing','C.  11 ekor kucing','D.  12 ekor kucing','1','1','C.  11 ekor kucing\r'),
(5,'Hasil Penjumlahan  2  + 3  =','A.  5','B.  4','C.  6','D.  8','1','1','A.  5\r'),
(6,'Elisa mempunyai keranjang buah','A.  11 buah dikeranjang','B.  12 buah dikeranjang','C.  13 buah dikeranjang','D.  14 buah dikeranjang','1','1','C.  13 buah dikeranjang\r'),
(7,'Ani membeli 10 biji permen, 3 ','A.  7  biji permen','B.  4 biji permen','C.  6 biji permen','D.  3 biji permen','1','1','A.  7  biji permen\r'),
(8,'Hasil   5  + 8 - 4  =','A.  2','B.  4','C.  9','D.  10','1','1','C.  9\r'),
(9,'Berapa hasil (6 - 3) x 5  adal','A.  20','B.  15','C.  11 ','D.  20','1','1','B.  15\r'),
(10,'Hitunglah 200 + 150 + 20 = ber','A.  270','B.  380','C.  370','D.  470','1','1','C.  370\r'),
(11,'Hasil Pengurangan  12  + 8  =','A.  2','B.  4','C.  6','D.  8','1','1','B.  4\r'),
(12,'24 buah apel + 4 buah apel - 1','A.  27  buah apel','B. 24 buah apel','C.  28 buah apel','D.  30 buah apel','1','1','A.  28  buah apel\r'),
(13,'Hasil   dari  5  x 3  =','A.  15','B.  4','C.  6','D.  8','1','1','A. 15\r'),
(14,'Hasil dari  10 x 10 / 5 =','A.  22','B.  20','C.  30','D.  10','1','1','B. 20\r'),
(15,'Hasil Pembagian  100  + 5  =','A.  5','B.  20','C.  6','D.  8','1','1','B.  20\r'),
(16,'Hasil Penjumlahan  24  + 2 / 2','A.  13','B.  4','C.  6','D.  8','1','1','A. 13\r'),
(17,'3 buah apel + 4 buah apel  =','A.  7  buah apel','B.  4 buah apel','C.  6 buah apel','D.  3 buah apel','1','1','A.  7 buah apel\r'),
(18,'Hasil   5  + 3  =','A.  2','B.  4','C.  6','D.  8','1','1','D. 8\r'),
(19,'6 kucing + 5 kucing  =','A.  2 ekor kucing','B.  4 ekor kucing','C.  11 ekor kucing','D.  12 ekor kucing','1','1','C.  11 ekor kucing\r'),
(20,'Hasil Penjumlahan  2  + 3  =','A.  5','B.  4','C.  6','D.  8','1','1','A.  5\r');

/*Table structure for table `tb_status` */

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

insert  into `tb_status`(`id_status`,`nama_status`) values 
(1,'admin'),
(2,'constributor'),
(3,'admin');

/*Table structure for table `tb_subtema` */

DROP TABLE IF EXISTS `tb_subtema`;

CREATE TABLE `tb_subtema` (
  `id_subtema` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subtema` varchar(100) DEFAULT NULL,
  `id_tema` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_subtema`),
  KEY `fk_tema` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_subtema` */

insert  into `tb_subtema`(`id_subtema`,`nama_subtema`,`id_tema`) values 
(1,'SUBBAB  1','1\r'),
(2,'SUBBAB  2','1\r'),
(3,'SUBBAB  3','1\r'),
(4,'SUBBAB  1','2\r'),
(5,'SUBBAB  2','2\r'),
(6,'SUBBAB  3','2\r'),
(7,'SUBBAB  1','3\r'),
(8,'SUBBAB  2','3\r'),
(9,'SUBBAB  3','3\r'),
(10,'SUBBAB  1','4\r'),
(11,'SUBBAB  2','4\r'),
(12,'SUBBAB  3','4\r'),
(13,'SUBBAB  1','5\r'),
(14,'SUBBAB  2','5\r'),
(15,'SUBBAB  3','5\r');

/*Table structure for table `tb_tema` */

DROP TABLE IF EXISTS `tb_tema`;

CREATE TABLE `tb_tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tema` varchar(100) DEFAULT NULL,
  `id_mapel` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tema` */

insert  into `tb_tema`(`id_tema`,`nama_tema`,`id_mapel`) values 
(1,'OPERASI HITUNG BILANGAN CACAH','1\r'),
(2,'PENGENALAN SATUAN WAKTU DAN PANJANG','1\r'),
(3,'MENGENAL BANGUN DATAR ','1\r'),
(4,'NILAI TEMPAT DAN PENGGUNAANNYA','1\r'),
(5,'SATUAN BERAT','1\r');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
