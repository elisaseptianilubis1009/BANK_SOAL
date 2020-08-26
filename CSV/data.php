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
TRUNCATE tb_mapel;

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `kode_kelas` CHAR(5) NOT NULL,
  `nama_kelas` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id_mapel` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` VARCHAR(30) NOT NULL,
  `kode_kelas` CHAR(5) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

/*Table structure for table `tb_pengambilan_soal` */

DROP TABLE IF EXISTS `tb_pengambilan_soal`;

TRUNCATE tb_tema;

CREATE TABLE `tb_pengambilan_soal` (
  `id_pengguna` CHAR(5) DEFAULT NULL,
  `id_soal` CHAR(5) DEFAULT NULL,
  `nilai` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_download`(
  `id_pengguna` CHAR(5) DEFAULT NULL,
  `id_soal` CHAR(5) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;


/*Data for the table `tb_pengambilan_soal` */

/*Table structure for table `tb_pengguna` */

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `id_pengguna` CHAR(5) NOT NULL,
  `nama_pengguna` VARCHAR(30) DEFAULT NULL,
  `id_status` CHAR(5) DEFAULT NULL,
  `username` VARCHAR(30) DEFAULT NULL,
  `passwordd` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `fk_id_pengg` (`id_status`),
  CONSTRAINT `fk_id_pengg` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */
TRUNCATE tb_pengguna
INSERT INTO tb_pengguna VALUES ("","Elisa","1","admin","a"),("","Julia","2","constributor","c"),("","Ridwan","3","User","u");
/*Table structure for table `tb_soal``tb_tema` */

DROP TABLE IF EXISTS `tb_soal`;

TRUNCATE tb_mapel;
CREATE TABLE `tb_soal` (
  `id_soal` CHAR(5) NOT NULL,
  `soal` VARCHAR(30) DEFAULT NULL,
  `pilih_a` VARCHAR(30) DEFAULT NULL,
  `pilih_b` VARCHAR(30) DEFAULT NULL,
  `pilih_c` VARCHAR(30) DEFAULT NULL,
  `pilih_d` VARCHAR(30) DEFAULT NULL,
  `id_subtema` CHAR(5) DEFAULT NULL,
  `id_pengguna` CHAR(5) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `fk_subtema` (`id_subtema`),
  KEY `fk_pengguna` (`id_pengguna`),
  CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`),
  CONSTRAINT `fk_subtema` FOREIGN KEY (`id_subtema`) REFERENCES `tb_subtema` (`id_tema`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tb_soal` */

/*Table structure for table `tb_status` */

DELETE FROM tb_mapel WHERE id_mapel >=13;

DROP TABLE IF EXISTS `tb_status`;
TRUNCATE tb_kelas;

CREATE TABLE `tb_status` (
  `id_status` CHAR(5) NOT NULL,
  `nama_status` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

/*Table structure for table `tb_subtema` */

DROP TABLE IF EXISTS `tb_subtema`;

TRUNCATE tb_subtema;
INSERT INTO tb_mapel VALUES ("","matematika","1");
INSERT INTO tb_mapel VALUES ("","matematika2","1");
INSERT INTO tb_mapel VALUES ("","matematika3","1");

CREATE TABLE `tb_subtema` (
  `id_subtema` CHAR(5) NOT NULL,
  `nama_subtema` VARCHAR(100) DEFAULT NULL,
  `id_tema` CHAR(5) DEFAULT NULL,
  PRIMARY KEY (`id_subtema`),
  KEY `fk_tema` (`id_tema`),
  CONSTRAINT `fk_tema` FOREIGN KEY (`id_tema`) REFERENCES `tb_tema` (`id_tema`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tb_subtema` */

/*Table structure for table `tb_tema` */

DROP TABLE IF EXISTS `tb_tema`;

CREATE TABLE `tb_tema` (
  `id_tema` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_tema` VARCHAR(100) DEFAULT NULL,
  `id_mapel` CHAR(5) DEFAULT NULL,
  PRIMARY KEY (`id_tema`)
  ) ENGINE=INNODB DEFAULT CHARSET=latin1;
  
  INSERT  INTO tb_mapel VALUES ("","Statistik 0","1");
  INSERT  INTO tb_mapel VALUES ("","Statistik Dasar  0","1");
  INSERT  INTO tb_mapel VALUES ("","Statistik 0","1");
  INSERT  INTO tb_mapel VALUES ("","Statistik Dasar 0","1");
  


INSERT INTO tb_tema VALUES ("1","statistik","1");
INSERT INTO tb_subtema VALUES ("1","statistik","1");
INSERT INTO tb_subtema VALUES ("2","oparasi","1");
INSERT INTO tb_subtema VALUES ("2","oparasi","1");
TRUNCATE tb_mapel;

DELETE FROM tb_pengguna WHERE id_pengguna='4';
INSERT INTO tb_pengguna VALUES ("","Muhammad Ridwan Lubis","3","user","u");

TRUNCATE tb_status;
INSERT INTO tb_status VALUES ("","admin");
INSERT INTO tb_status VALUES ("","constributor");
INSERT INTO tb_status VALUES ("","user");

DELETE FROM tb_status WHERE id_status >3;
`tb_mapel`
DELETE FROM tb_soal WHERE id_soal=3 ;
UPDATE tb_soal SET id_subtema='1' WHERE id_soal='51';
/*Data for the table `tb_tema` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

TRUNCATE tb_mapel;
INSERT INTO tb_mapel VALUES
("","MATEMATIKA","3"),
("","BAHASA INDONESIA","3"),
("","BAHASA INGGRIS","3"),
("","PENDIDIKAN KEWARGANEGARAAN","3"),
("","PENDIDIKAN AGAMA","3"),
("","PENJASKES","3");

TRUNCATE tb_mapel;
INSERT INTO tb_tema VALUES 
("","OPERATOR ARITMATIKA","1"),
("","STATISTIKA","1"),
("","MENGENAL JENIS JENIS BANGUN RUANG","1"),
("","PERBANDINGAN DUA BUAH ANGKA","1"),
("","ANALISA MATEMATIKA","1");

TRUNCATE tb_soal;
INSERT INTO tb_subtema VALUES 
("","OPERATOR PENJUMLAHAN","1"),
("","OPERATOR PENGURANGAN","1"),
("","OPERATOR PERKALIAN","1"),
("","OPERATOR PEMBAGIAN","1"),
("","OPERATOR MODULUS","1");


TRUNCATE tb_soal;
INSERT INTO tb_soal VALUES
("","hasil 1 + 3 =","a. 2","b. 3","c. 4","d. 5","1","1","c. 4"),
("","hasil 1 + 4 =","a. 2","b. 5","c. 4","d. 7","1","1","b. 5"),
("","hasil 1 + 5 =","a. 2","b. 3","c. 6","d. 5","1","1","c. 6"),
("","hasil 1 + 6 =","a. 2","b. 3","c. 4","d. 7","1","1","d. 7"),
("","hasil 1 + 7 =","a. 8","b. 3","c. 4","d. 5","1","1","a. 8"),
INSERT INTO tb_soal VALUES
("","hasil 1 + 8 =","a. 9","b. 3","c. 4","d. 5","1","1","a. 9"),`tb_soal`
("","hasil 1 + 9 =","a. 2","b. 5","c. 10","d. 7","1","1","c. 10"),
("","hasil 1 + 10 =","a. 2","b. 3","c. 11","d. 5","1","1","c. 11"),
("","hasil 1 + 11=","a. 2","b. 3","c. 4","d. 12","1","1","d. 12"),
("","hasil 1 + 12 =","a. 13","b. 3","c. 4","d. 5","1","1","a. 13"),
INSERT INTO tb_soal VALUES
("","hasil 1 + 13 =","a. 14","b. 3","c. 4","d. 5","1","1","a. 14"),
("","hasil 2 + 9 =","a. 2","b. 5","c. 11","d. 7","1","1","c. 11"),
("","hasil 4 + 10 =","a. 2","b. 3","c. 14","d. 5","1","1","c. 14"),
("","hasil 5 + 11=","a. 2","b. 3","c. 4","d. 15","1","1","d. 15"),
("","hasil 2 + 12 =","a. 14","b. 3","c. 4","d. 5","1","1","a. 14"),
("","hasil 6 + 8 =","a. 14","b. 3","c. 4","d. 5","1","1","a. 14"),
("","hasil 6 + 9 =","a. 2","b. 5","c. 15","d. 7","1","1","c. 15"),
("","hasil 4 + 10 =","a. 2","b. 3","c. 14","d. 5","1","1","c. 14"),
("","hasil 3 + 11=","a. 2","b. 3","c. 4","d. 14","1","1","d. 14"),
("","hasil 9 + 12 =","a. 21","b. 3","c. 4","d. 5","1","1","a. 21");