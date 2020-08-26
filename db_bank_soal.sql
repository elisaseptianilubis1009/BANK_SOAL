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

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `kode_kelas` char(5) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id_mapel` char(5) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `kode_kelas` char(5) NOT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `fk_kelas` (`kode_kelas`),
  CONSTRAINT `fk_kelas` FOREIGN KEY (`kode_kelas`) REFERENCES `tb_kelas` (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

/*Table structure for table `tb_pengambilan_soal` */

DROP TABLE IF EXISTS `tb_pengambilan_soal`;

CREATE TABLE `tb_pengambilan_soal` (
  `id_pengguna` char(5) DEFAULT NULL,
  `id_soal` char(5) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengambilan_soal` */

/*Table structure for table `tb_pengguna` */

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `id_pengguna` char(5) NOT NULL,
  `nama_pengguna` varchar(30) DEFAULT NULL,
  `id_status` char(5) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `passwordd` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `fk_id_pengg` (`id_status`),
  CONSTRAINT `fk_id_pengg` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

/*Table structure for table `tb_soal` */

DROP TABLE IF EXISTS `tb_soal`;

CREATE TABLE `tb_soal` (
  `id_soal` char(5) NOT NULL,
  `soal` varchar(30) DEFAULT NULL,
  `pilih_a` varchar(30) DEFAULT NULL,
  `pilih_b` varchar(30) DEFAULT NULL,
  `pilih_c` varchar(30) DEFAULT NULL,
  `pilih_d` varchar(30) DEFAULT NULL,
  `id_subtema` char(5) DEFAULT NULL,
  `id_pengguna` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `fk_subtema` (`id_subtema`),
  KEY `fk_pengguna` (`id_pengguna`),
  CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`),
  CONSTRAINT `fk_subtema` FOREIGN KEY (`id_subtema`) REFERENCES `tb_subtema` (`id_tema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_soal` */

/*Table structure for table `tb_status` */

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `id_status` char(5) NOT NULL,
  `nama_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

/*Table structure for table `tb_subtema` */

DROP TABLE IF EXISTS `tb_subtema`;

CREATE TABLE `tb_subtema` (
  `id_subtema` char(5) NOT NULL,
  `nama_subtema` varchar(100) DEFAULT NULL,
  `id_tema` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_subtema`),
  KEY `fk_tema` (`id_tema`),
  CONSTRAINT `fk_tema` FOREIGN KEY (`id_tema`) REFERENCES `tb_tema` (`id_tema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_subtema` */

/*Table structure for table `tb_tema` */

DROP TABLE IF EXISTS `tb_tema`;

CREATE TABLE `tb_tema` (
  `id_tema` char(5) NOT NULL,
  `nama_tema` varchar(100) DEFAULT NULL,
  `id_mapel` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_tema`),
  KEY `fk_mapel` (`id_mapel`),
  CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tema` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
