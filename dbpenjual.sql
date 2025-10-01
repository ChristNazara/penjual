/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.36-MariaDB : Database - penjualan2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`penjualan2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `penjualan2`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `kodebarang` char(10) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `merek` varchar(20) DEFAULT NULL,
  `hargabeli` double DEFAULT NULL,
  `hargajual` double DEFAULT NULL,
  `stock` int(15) DEFAULT NULL,
  PRIMARY KEY (`kodebarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`kodebarang`,`namabarang`,`merek`,`hargabeli`,`hargajual`,`stock`) values ('B001','Keyboard','Logitec',40000,45000,15),('B002','Mouse','Eyota',25000,30000,13),('B003','Monitor  19 Inch','Lg',1000000,120000,15),('B004','Vga Nvidia gt210','Asus',500000,550000,17),('B005','Sond Card','Asrock',100000,130000,50);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `kodepelanggan` char(10) NOT NULL,
  `namapelanggan` varchar(30) NOT NULL,
  `nohp` int(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodepelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`kodepelanggan`,`namapelanggan`,`nohp`,`alamat`) values ('P001','Abdul',945353,'Cendana'),('P002','Rahmat',45353,'Parak Gadang'),('P003','Sari',3533,'Kolam Indah'),('P004','Ryo',34924,'Parak Laweh'),('P005','Dewanto',57435,'Jundul');

/*Table structure for table `pemasok` */

DROP TABLE IF EXISTS `pemasok`;

CREATE TABLE `pemasok` (
  `kodepemasok` char(10) NOT NULL,
  `namapemasok` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelp` int(15) DEFAULT NULL,
  PRIMARY KEY (`kodepemasok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemasok` */

insert  into `pemasok`(`kodepemasok`,`namapemasok`,`alamat`,`notelp`) values ('S001','PT Bersatu','Tabing',535205),('S002','Indocom','Jln  Proklamasi',535353),('S003','PT King Komputer','Jln Sudirman',353535),('S004','Kharisma Komputer','Jln Chokroaminoto',353533),('S005','J Pc','Lubuk Buaya',353535);

/*Table structure for table `tempbeli` */

DROP TABLE IF EXISTS `tempbeli`;

CREATE TABLE `tempbeli` (
  `idbarang` char(10) NOT NULL,
  `qty` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  KEY `idbarang` (`idbarang`),
  CONSTRAINT `tempbeli_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`kodebarang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tempbeli` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) DEFAULT NULL,
  `hakakses` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=673 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`iduser`,`username`,`password`,`hakakses`) values (667,'dioalparino97','e10adc3949ba59abbe56e057f20f883e','Admin'),(669,'net123','3fde6bb0541387e4ebdadf7c2ff31123','Pegawai'),(670,'lex456','fa371dd1c1c7f265c9e399c57e3f7d20','Kasir'),(671,'aladin232','cb9de17eebbe2f41effeee286260af2b','User'),(672,'Dg34xc','aa23ab90a549b4322bc28b016d9ab043','Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
