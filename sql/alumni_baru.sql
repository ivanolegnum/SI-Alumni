/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.5.8 : Database - alumni_baru
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`alumni_baru` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alumni_baru`;

/*Table structure for table `data_alumni` */

DROP TABLE IF EXISTS `data_alumni`;

CREATE TABLE `data_alumni` (
  `id_alumni` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_yudisium` date NOT NULL,
  `tgl_wisuda` date NOT NULL,
  `lama_studi` varchar(10) NOT NULL,
  `ipk` float NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `ponsel` varchar(20) NOT NULL,
  `nama_ot` varchar(255) NOT NULL,
  `alamat_ot` text NOT NULL,
  `telepon_ot` varchar(20) NOT NULL,
  `ponsel_ot` varchar(20) NOT NULL,
  PRIMARY KEY (`id_alumni`),
  UNIQUE KEY `id_user` (`id_user`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `data_alumni_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `data_jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `data_alumni` */

insert  into `data_alumni`(`id_alumni`,`id_user`,`nim`,`nama`,`id_jurusan`,`ttl`,`tgl_daftar`,`tgl_yudisium`,`tgl_wisuda`,`lama_studi`,`ipk`,`alamat`,`email`,`telepon`,`ponsel`,`nama_ot`,`alamat_ot`,`telepon_ot`,`ponsel_ot`) values (1,1,'59081003041','Nurimansyah Rifwan',2,'Jakarta, 03 April 1989','2012-10-10','2012-12-01','2012-12-02','5 Tahun',3.62,'Jl. Pondok Bambu Asri Timur V No. 16','nurimansyah.rifwan@gmail.com','+62711','','Deswita','Jl. Amal No. 34','+62',''),(2,4,'09071003051','Nurimansyah Rifwan',2,'Jakarta, 03 April 1989','2012-10-13','2012-01-01','2012-01-02','4 Tahun',4,'Jladkasd','nurimansyah.rifwan@gmail.com','+62711','+62','Deswita','adadasdf','+62','+62');

/*Table structure for table `data_jurusan` */

DROP TABLE IF EXISTS `data_jurusan`;

CREATE TABLE `data_jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `prodi` enum('D3','S1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `data_jurusan` */

insert  into `data_jurusan`(`id`,`nama`,`prodi`) values (1,'Sistem Informasi Reguler','S1'),(2,'Sistem Informasi Bilingual','S1'),(3,'Sistem Komputer','S1'),(4,'Teknik Informatika Reguler','S1'),(5,'Teknik Informatika Bilingual','S1'),(6,'Komputerisasi Akuntansi','D3'),(7,'Manajemen Informatika','D3'),(8,'Teknik Komputer','D3');

/*Table structure for table `data_pa` */

DROP TABLE IF EXISTS `data_pa`;

CREATE TABLE `data_pa` (
  `id_pa` int(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) DEFAULT NULL,
  `nama_pa` varchar(40) DEFAULT NULL,
  `alamat_pa` varchar(40) DEFAULT NULL,
  `bidang_usaha` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_pa`),
  KEY `FK_data_pa_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_pa` */

insert  into `data_pa`(`id_pa`,`id_user`,`nama_pa`,`alamat_pa`,`bidang_usaha`) values (1,NULL,'pertamana','palembang','bongkar minyak');

/*Table structure for table `data_pekerjaan` */

DROP TABLE IF EXISTS `data_pekerjaan`;

CREATE TABLE `data_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `data_pekerjaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_pekerjaan` */

insert  into `data_pekerjaan`(`id`,`id_user`,`tgl_daftar`,`tempat`,`status`,`alamat`,`jabatan`) values (1,1,'2012-10-10','Universitas Sriwjaya','Aktif','Jl. Srijaya Negara','CEO');

/*Table structure for table `data_user` */

DROP TABLE IF EXISTS `data_user`;

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('alumni','pengguna','admin') NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `data_user` */

insert  into `data_user`(`id`,`username`,`password`,`level`,`status`) values (1,'59081003041','12345','alumni','1'),(2,'admin','admin','admin','1'),(3,'59081003043','qwerty','alumni','0'),(4,'09071003051','basing','alumni','1'),(5,'pertamina','pertamina','pengguna','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
