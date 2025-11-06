/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - db_simplecrud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simplecrud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_simplecrud`;

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `id_kategori` int NOT NULL,
  `id_supplier` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int DEFAULT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`nama_barang`,`id_kategori`,`id_supplier`,`harga_beli`,`harga_jual`,`stock`) values 
(1,'EG 1/144 RX-78-2 Gundam',1,1,123000,150000,26),
(2,'EG 1/144 Strike Gundam',1,1,130000,150000,21),
(3,'HG 1/144 XGF-02 Gundam Lfrith',2,2,230000,260000,21),
(4,'HG 1/144 MDX-0003 Gundam Schwarzette',2,2,235000,265000,25),
(5,'RG 1/144 MSN-04 Sazabi',3,1,800000,900000,12),
(6,'MG 1/100 RX-0 Unicorn Gundam (Ver. Ka)',4,1,2000000,2150000,5);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`nama_kategori`) values 
(1,'EG (Entry Grade)'),
(2,'HG (HIgh Grade)'),
(3,'RG (Real Grade)'),
(4,'MG (Master Grade)'),
(5,'PG (Perfect Grade)'),
(6,'SD (Super Deformed)');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak_sup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_sup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`id_supplier`,`nama_supplier`,`kontak_sup`,`alamat_sup`) values 
(1,'Bandai','08123456789','Tokyo, Japan'),
(2,'Kotobukiya','0897654321','Tokyo, Japan'),
(3,'Banpresto','08989896767','Osaka, Japan'),
(4,'Takara Tommy ','0811223344','Tokyo, Japan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
