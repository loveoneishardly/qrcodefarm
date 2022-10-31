/*
SQLyog Community
MySQL - 10.4.21-MariaDB : Database - qrcodefarm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qrcodefarm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `qrcodefarm`;

/*Table structure for table `dmdonvi` */

DROP TABLE IF EXISTS `dmdonvi`;

CREATE TABLE `dmdonvi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENDONVI` varbinary(250) DEFAULT NULL,
  `DIACHI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SODIENTHOAI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dmdonvi` */

insert  into `dmdonvi`(`ID`,`TENDONVI`,`DIACHI`,`SODIENTHOAI`,`EMAIL`,`GHICHU`,`TRANGTHAI`) values 
(1,'Đơn vị 1',NULL,NULL,NULL,NULL,1);

/*Table structure for table `dmvungtrong` */

DROP TABLE IF EXISTS `dmvungtrong`;

CREATE TABLE `dmvungtrong` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDDONVI` int(11) DEFAULT NULL,
  `TENVUNGTRONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAVUNGTRONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TENNONGHO` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIACHI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HOPTACXA` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SANPHAMTRONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `IDDONVI` (`IDDONVI`),
  CONSTRAINT `dmvungtrong_ibfk_1` FOREIGN KEY (`IDDONVI`) REFERENCES `dmdonvi` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dmvungtrong` */

insert  into `dmvungtrong`(`ID`,`IDDONVI`,`TENVUNGTRONG`,`MAVUNGTRONG`,`TENNONGHO`,`DIACHI`,`HOPTACXA`,`SANPHAMTRONG`,`GHICHU`,`TRANGTHAI`) values 
(1,1,'Vùng trồng lúa','','Ngô Văn Thành Em','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.',NULL,1),
(2,1,'Vùng trồng lúa','','Kim Chành Thu','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.',NULL,1),
(3,1,'Vùng trồng lúa','','Trịnh Văn Nghĩa','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(4,1,'Vùng trồng lúa','','Hêng Pến','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(5,1,'Vùng trồng lúa','','Hêng Dêl','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(6,1,'Vùng trồng lúa','','Kim Ben','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(7,1,'Vùng trồng lúa','','Ông Kim Phước','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(8,1,'Vùng trồng lúa','','Từ Thị Kim Vi','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(9,1,'Vùng trồng lúa','','Kim Dũng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(10,1,'Vùng trồng lúa','','Từ Đức Thành','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(11,1,'Vùng trồng lúa','','Cao Văn Tài','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1);

/*Table structure for table `kythuatbonphan` */

DROP TABLE IF EXISTS `kythuatbonphan`;

CREATE TABLE `kythuatbonphan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `IDNHATKY` int(11) DEFAULT NULL,
  `SUDUNGPHANBON` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int(11) DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `kythuatbonphan_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `kythuatbonphan_ibfk_2` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kythuatbonphan` */

insert  into `kythuatbonphan`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`SUDUNGPHANBON`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,4,'Loại phân:','2022-09-25',1,NULL),
(2,1,4,'Loại phân:','2022-10-05',2,NULL),
(3,1,4,'Loại phân:','2022-10-28',3,NULL),
(4,2,4,'Loại phân:','2022-09-25',1,''),
(5,2,4,'Loại phân:','2022-10-05',2,''),
(6,2,4,'Loại phân:','2022-10-28',3,''),
(7,3,4,'Loại phân:','2022-09-25',1,''),
(8,3,4,'Loại phân:','2022-10-05',2,''),
(9,3,4,'Loại phân:','2022-10-28',3,''),
(10,4,4,'Loại phân:','2022-09-25',1,''),
(11,4,4,'Loại phân:','2022-10-05',2,''),
(12,4,4,'Loại phân:','2022-10-28',3,''),
(13,5,4,'Loại phân:','2022-09-25',1,''),
(14,5,4,'Loại phân:','2022-10-05',2,''),
(15,5,4,'Loại phân:','2022-10-28',3,''),
(16,6,4,'Loại phân:','2022-09-25',1,''),
(17,6,4,'Loại phân:','2022-10-05',2,''),
(18,6,4,'Loại phân:','2022-10-28',3,''),
(19,7,4,'Loại phân:','2022-09-25',1,''),
(20,7,4,'Loại phân:','2022-10-05',2,''),
(21,7,4,'Loại phân:','2022-10-28',3,''),
(22,8,4,'Loại phân:','2022-09-25',1,''),
(23,8,4,'Loại phân:','2022-10-05',2,''),
(24,8,4,'Loại phân:','2022-10-28',3,''),
(25,9,4,'Loại phân:','2022-09-25',1,''),
(26,9,4,'Loại phân:','2022-10-05',2,''),
(27,9,4,'Loại phân:','2022-10-28',3,''),
(28,10,4,'Loại phân:','2022-09-25',1,''),
(29,10,4,'Loại phân:','2022-10-05',2,''),
(30,10,4,'Loại phân:','2022-10-28',3,''),
(31,11,4,'Loại phân:','2022-09-25',1,''),
(32,11,4,'Loại phân:','2022-10-05',2,''),
(33,11,4,'Loại phân:','2022-10-28',3,'');

/*Table structure for table `kythuatsudungthuoc` */

DROP TABLE IF EXISTS `kythuatsudungthuoc`;

CREATE TABLE `kythuatsudungthuoc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `IDNHATKY` int(11) DEFAULT NULL,
  `SUDUNGTHUOC` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int(11) DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `kythuatsudungthuoc_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `kythuatsudungthuoc_ibfk_2` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kythuatsudungthuoc` */

insert  into `kythuatsudungthuoc`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`SUDUNGTHUOC`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(2,1,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(3,1,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(4,1,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(5,1,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(6,1,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(7,2,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(8,2,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(9,2,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(10,2,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(11,2,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(12,2,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(13,3,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(14,3,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(15,3,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(16,3,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(17,3,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(18,3,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(19,4,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(20,4,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(21,4,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(22,4,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(23,4,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(24,4,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(25,5,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(26,5,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(27,5,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(28,5,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(29,5,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(30,5,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(31,6,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(32,6,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(33,6,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(34,6,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(35,6,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(36,6,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(37,7,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(38,7,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(39,7,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(40,7,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(41,7,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(42,7,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(43,8,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(44,8,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(45,8,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(46,8,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(47,8,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(48,8,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(49,9,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(50,9,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(51,9,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(52,9,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(53,9,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(54,9,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(55,10,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(56,10,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(57,10,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(58,10,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(59,10,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(60,10,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL),
(61,11,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(62,11,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(63,11,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(64,11,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(65,11,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(66,11,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL);

/*Table structure for table `loainhatky` */

DROP TABLE IF EXISTS `loainhatky`;

CREATE TABLE `loainhatky` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENLOAI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SAPXEP` int(11) DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `loainhatky` */

insert  into `loainhatky`(`ID`,`TENLOAI`,`GHICHU`,`SAPXEP`,`TRANGTHAI`) values 
(1,'Bước 1',NULL,1,1),
(2,'Bước 2',NULL,2,1),
(3,'Bước 3',NULL,3,1),
(4,'Bước 4',NULL,4,1),
(5,'Bước 5',NULL,5,1),
(6,'Bước 6',NULL,6,1),
(7,'Bước 7',NULL,7,1),
(8,'Bước 8',NULL,8,1),
(9,'Bước 9',NULL,9,1),
(10,'Bước 10',NULL,10,1);

/*Table structure for table `nhatkysanxuat` */

DROP TABLE IF EXISTS `nhatkysanxuat`;

CREATE TABLE `nhatkysanxuat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `LOAINHATKY` int(11) DEFAULT NULL COMMENT '1: Bước 1, 2: Bước 2...',
  `TENNHATKY` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BONPHAN` int(11) DEFAULT 0,
  `THUOCBVTV` int(11) DEFAULT 0,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `LOAINHATKY` (`LOAINHATKY`),
  CONSTRAINT `nhatkysanxuat_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `nhatkysanxuat_ibfk_2` FOREIGN KEY (`LOAINHATKY`) REFERENCES `loainhatky` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nhatkysanxuat` */

insert  into `nhatkysanxuat`(`ID`,`IDVUNGTRONG`,`LOAINHATKY`,`TENNHATKY`,`BONPHAN`,`THUOCBVTV`,`GHICHU`) values 
(1,1,1,'Chọn giống và xử lý giống',0,0,NULL),
(2,1,2,'Kỹ thuật làm đất',0,0,NULL),
(3,1,3,'Quản lý nước',0,0,NULL),
(4,1,4,'Phân bón và kỹ thuật bón phân',1,0,NULL),
(5,1,5,'Sử dụng thuốc BVTV',0,1,NULL),
(6,2,1,'Chọn giống và xử lý giống',0,0,NULL),
(7,2,2,'Kỹ thuật làm đất',0,0,NULL),
(8,2,3,'Quản lý nước',0,0,NULL),
(9,2,4,'Phân bón và kỹ thuật bón phân',1,0,NULL),
(10,2,5,'Sử dụng thuốc BVTV',0,1,NULL),
(11,3,1,'Chọn giống và xử lý giống',0,0,''),
(12,3,2,'Kỹ thuật làm đất',0,0,''),
(13,3,3,'Quản lý nước',0,0,''),
(14,3,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(15,3,5,'Sử dụng thuốc BVTV',0,1,''),
(16,4,1,'Chọn giống và xử lý giống',0,0,''),
(17,4,2,'Kỹ thuật làm đất',0,0,''),
(18,4,3,'Quản lý nước',0,0,''),
(19,4,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(20,4,5,'Sử dụng thuốc BVTV',0,1,''),
(21,5,1,'Chọn giống và xử lý giống',0,0,''),
(22,5,2,'Kỹ thuật làm đất',0,0,''),
(23,5,3,'Quản lý nước',0,0,''),
(24,5,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(25,5,5,'Sử dụng thuốc BVTV',0,1,''),
(26,6,1,'Chọn giống và xử lý giống',0,0,''),
(27,6,2,'Kỹ thuật làm đất',0,0,''),
(28,6,3,'Quản lý nước',0,0,''),
(29,6,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(30,6,5,'Sử dụng thuốc BVTV',0,1,''),
(31,7,1,'Chọn giống và xử lý giống',0,0,''),
(32,7,2,'Kỹ thuật làm đất',0,0,''),
(33,7,3,'Quản lý nước',0,0,''),
(34,7,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(35,7,5,'Sử dụng thuốc BVTV',0,1,''),
(36,8,1,'Chọn giống và xử lý giống',0,0,''),
(37,8,2,'Kỹ thuật làm đất',0,0,''),
(38,8,3,'Quản lý nước',0,0,''),
(39,8,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(40,8,5,'Sử dụng thuốc BVTV',0,1,''),
(41,9,1,'Chọn giống và xử lý giống',0,0,''),
(42,9,2,'Kỹ thuật làm đất',0,0,''),
(43,9,3,'Quản lý nước',0,0,''),
(44,9,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(45,9,5,'Sử dụng thuốc BVTV',0,1,''),
(46,10,1,'Chọn giống và xử lý giống',0,0,''),
(47,10,2,'Kỹ thuật làm đất',0,0,''),
(48,10,3,'Quản lý nước',0,0,''),
(49,10,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(50,10,5,'Sử dụng thuốc BVTV',0,1,''),
(51,11,1,'Chọn giống và xử lý giống',0,0,''),
(52,11,2,'Kỹ thuật làm đất',0,0,''),
(53,11,3,'Quản lý nước',0,0,''),
(54,11,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(55,11,5,'Sử dụng thuốc BVTV',0,1,'');

/*Table structure for table `sudungnhatky` */

DROP TABLE IF EXISTS `sudungnhatky`;

CREATE TABLE `sudungnhatky` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `IDNHATKY` int(11) DEFAULT NULL,
  `TENNHATKY` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CACHSUDUNG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int(11) DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `sudungnhatky_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `sudungnhatky_ibfk_2` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungnhatky` */

insert  into `sudungnhatky`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`TENNHATKY`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,1,'+ Tên giống:','OM5451.','2022-09-17',1,''),
(2,1,1,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,''),
(3,1,2,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(4,1,2,'+ San sửa mặt bằng đồng ruộng',NULL,'2022-08-25',2,''),
(5,1,2,'+ Đánh rãnh nước gieo sạ',NULL,'2022-08-25',3,''),
(6,1,3,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(7,1,3,'+ Chủ động tưới tiêu',NULL,'2022-10-09',2,''),
(8,1,3,'+ Ứng dụng bơm nước tập trung',NULL,'2022-10-09',3,''),
(9,1,5,'+ Phun thuốc định kỳ',NULL,'2022-10-26',NULL,NULL),
(10,2,6,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(11,2,6,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(12,2,7,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(13,2,7,'+ San sửa mặt bằng đồng ruộng',NULL,'2022-08-25',2,NULL),
(14,2,7,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(15,2,8,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(16,2,8,'+ Chủ động tưới tiêu',NULL,'2022-10-09',2,NULL),
(17,2,8,'+ Ứng dụng bơm nước tập trung',NULL,'2022-10-09',3,NULL),
(18,2,10,'+ Phun thuốc định kỳ',NULL,'2022-10-26',NULL,NULL),
(19,3,11,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(20,3,11,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(21,3,12,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(22,3,12,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(23,3,12,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(24,3,13,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(25,3,13,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(26,3,13,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(27,3,15,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(28,4,16,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(29,4,16,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(30,4,17,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(31,4,17,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(32,4,17,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(33,4,18,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(34,4,18,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(35,4,18,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(36,4,20,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(37,5,21,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(38,5,21,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(39,5,22,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(40,5,22,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(41,5,22,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(42,5,23,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(43,5,23,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(44,5,23,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(45,5,25,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(46,6,26,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(47,6,26,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(48,6,27,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(49,6,27,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(50,6,27,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(51,6,28,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(52,6,28,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(53,6,28,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(54,6,30,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(55,7,31,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(56,7,31,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(57,7,32,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(58,7,32,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(59,7,32,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(60,7,33,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(61,7,33,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(62,7,33,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(63,7,35,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(64,8,36,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(65,8,36,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(66,8,37,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(67,8,37,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(68,8,37,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(69,8,38,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(70,8,38,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(71,8,38,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(72,8,40,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(73,9,41,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(74,9,41,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(75,9,42,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(76,9,42,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(77,9,42,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(78,9,43,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(79,9,43,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(80,9,43,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(81,9,45,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(82,10,46,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(83,10,46,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(84,10,47,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(85,10,47,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(86,10,47,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(87,10,48,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(88,10,48,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(89,10,48,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(90,10,50,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL),
(91,11,51,'+ Tên giống:','OM5451.','2022-09-17',1,NULL),
(92,11,51,'+ Xử lý hạt giống:','Ngâm axít.','2022-09-17',2,NULL),
(93,11,52,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,NULL),
(94,11,52,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,NULL),
(95,11,52,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,NULL),
(96,11,53,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,NULL),
(97,11,53,'+ Chủ động tưới tiêu','','2022-10-09',2,NULL),
(98,11,53,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,NULL),
(99,11,55,'+ Phun thuốc định kỳ','','2022-10-26',NULL,NULL);

/*Table structure for table `sudungphanbon` */

DROP TABLE IF EXISTS `sudungphanbon`;

CREATE TABLE `sudungphanbon` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `IDNHATKY` int(11) DEFAULT NULL,
  `IDKYTHUATBONPHAN` int(11) DEFAULT NULL,
  `TENPHANBON` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLUONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CACHSUDUNG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int(11) DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDKYTHUATBONPHAN` (`IDKYTHUATBONPHAN`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `sudungphanbon_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `sudungphanbon_ibfk_2` FOREIGN KEY (`IDKYTHUATBONPHAN`) REFERENCES `kythuatbonphan` (`ID`),
  CONSTRAINT `sudungphanbon_ibfk_3` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungphanbon` */

insert  into `sudungphanbon`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`IDKYTHUATBONPHAN`,`TENPHANBON`,`SOLUONG`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,4,1,'• Phân hữu cơ:',NULL,NULL,'2022-09-25',1,NULL),
(2,1,4,1,'• Phân cải tạo đất',NULL,NULL,'2022-09-25',2,NULL),
(3,1,4,1,'• Ure:','3.8 kg',NULL,'2022-09-25',3,NULL),
(4,1,4,1,'• Phân Lân:',NULL,NULL,'2022-09-25',4,NULL),
(5,1,4,1,'• Phân Kali:',NULL,NULL,'2022-09-25',5,NULL),
(6,1,4,1,'• Phân DAP:','2.5 kg',NULL,'2022-09-25',6,NULL),
(7,1,4,1,'• Phân NPK:',NULL,NULL,'2022-09-25',7,NULL),
(8,1,4,1,'• Phân Khác:','',NULL,'2022-09-25',8,NULL),
(9,1,4,2,'• Phân hữu cơ:',NULL,NULL,'2022-10-05',1,NULL),
(10,1,4,2,'• Phân cải tạo đất',NULL,NULL,'2022-10-05',2,NULL),
(11,1,4,2,'• Ure:',NULL,NULL,'2022-10-05',3,NULL),
(12,1,4,2,'• Phân DAP:',NULL,NULL,'2022-10-05',4,NULL),
(13,1,4,2,'• Phân NPK:','11.5 kg',NULL,'2022-10-05',5,NULL),
(14,1,4,2,'• Phân Khác:',NULL,NULL,'2022-10-05',6,NULL),
(15,1,4,3,'• Phân hữu cơ:',NULL,NULL,'2022-10-28',1,NULL),
(16,1,4,3,'• Phân cải tạo đất',NULL,NULL,'2022-10-28',2,NULL),
(17,1,4,3,'• Ure:',NULL,NULL,'2022-10-28',3,NULL),
(18,1,4,3,'• Phân DAP:',NULL,NULL,'2022-10-28',4,NULL),
(19,1,4,3,'• Phân NPK:','11.5 kg',NULL,'2022-10-28',5,NULL),
(20,1,4,3,'• Phân Khác:',NULL,NULL,'2022-10-28',6,NULL),
(21,2,4,4,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(22,2,4,4,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(23,2,4,4,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(24,2,4,4,'• Phân Lân:','','','2022-09-25',4,NULL),
(25,2,4,4,'• Phân Kali:','','','2022-09-25',5,NULL),
(26,2,4,4,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(27,2,4,4,'• Phân NPK:','','','2022-09-25',7,NULL),
(28,2,4,4,'• Phân Khác:','','','2022-09-25',8,NULL),
(29,2,4,5,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(30,2,4,5,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(31,2,4,5,'• Ure:','','','2022-10-05',3,NULL),
(32,2,4,5,'• Phân DAP:','','','2022-10-05',4,NULL),
(33,2,4,5,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(34,2,4,5,'• Phân Khác:','','','2022-10-05',6,NULL),
(35,2,4,6,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(36,2,4,6,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(37,2,4,6,'• Ure:','','','2022-10-28',3,NULL),
(38,2,4,6,'• Phân DAP:','','','2022-10-28',4,NULL),
(39,2,4,6,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(40,2,4,6,'• Phân Khác:','','','2022-10-28',6,NULL),
(41,3,4,7,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(42,3,4,7,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(43,3,4,7,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(44,3,4,7,'• Phân Lân:','','','2022-09-25',4,NULL),
(45,3,4,7,'• Phân Kali:','','','2022-09-25',5,NULL),
(46,3,4,7,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(47,3,4,7,'• Phân NPK:','','','2022-09-25',7,NULL),
(48,3,4,7,'• Phân Khác:','','','2022-09-25',8,NULL),
(49,3,4,8,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(50,3,4,8,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(51,3,4,8,'• Ure:','','','2022-10-05',3,NULL),
(52,3,4,8,'• Phân DAP:','','','2022-10-05',4,NULL),
(53,3,4,8,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(54,3,4,8,'• Phân Khác:','','','2022-10-05',6,NULL),
(55,3,4,9,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(56,3,4,9,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(57,3,4,9,'• Ure:','','','2022-10-28',3,NULL),
(58,3,4,9,'• Phân DAP:','','','2022-10-28',4,NULL),
(59,3,4,9,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(60,3,4,9,'• Phân Khác:','','','2022-10-28',6,NULL),
(61,4,4,10,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(62,4,4,10,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(63,4,4,10,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(64,4,4,10,'• Phân Lân:','','','2022-09-25',4,NULL),
(65,4,4,10,'• Phân Kali:','','','2022-09-25',5,NULL),
(66,4,4,10,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(67,4,4,10,'• Phân NPK:','','','2022-09-25',7,NULL),
(68,4,4,10,'• Phân Khác:','','','2022-09-25',8,NULL),
(69,4,4,11,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(70,4,4,11,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(71,4,4,11,'• Ure:','','','2022-10-05',3,NULL),
(72,4,4,11,'• Phân DAP:','','','2022-10-05',4,NULL),
(73,4,4,11,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(74,4,4,11,'• Phân Khác:','','','2022-10-05',6,NULL),
(75,4,4,12,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(76,4,4,12,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(77,4,4,12,'• Ure:','','','2022-10-28',3,NULL),
(78,4,4,12,'• Phân DAP:','','','2022-10-28',4,NULL),
(79,4,4,12,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(80,4,4,12,'• Phân Khác:','','','2022-10-28',6,NULL),
(81,5,4,13,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(82,5,4,13,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(83,5,4,13,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(84,5,4,13,'• Phân Lân:','','','2022-09-25',4,NULL),
(85,5,4,13,'• Phân Kali:','','','2022-09-25',5,NULL),
(86,5,4,13,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(87,5,4,13,'• Phân NPK:','','','2022-09-25',7,NULL),
(88,5,4,13,'• Phân Khác:','','','2022-09-25',8,NULL),
(89,5,4,14,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(90,5,4,14,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(91,5,4,14,'• Ure:','','','2022-10-05',3,NULL),
(92,5,4,14,'• Phân DAP:','','','2022-10-05',4,NULL),
(93,5,4,14,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(94,5,4,14,'• Phân Khác:','','','2022-10-05',6,NULL),
(95,5,4,15,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(96,5,4,15,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(97,5,4,15,'• Ure:','','','2022-10-28',3,NULL),
(98,5,4,15,'• Phân DAP:','','','2022-10-28',4,NULL),
(99,5,4,15,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(100,5,4,15,'• Phân Khác:','','','2022-10-28',6,NULL),
(101,6,4,16,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(102,6,4,16,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(103,6,4,16,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(104,6,4,16,'• Phân Lân:','','','2022-09-25',4,NULL),
(105,6,4,16,'• Phân Kali:','','','2022-09-25',5,NULL),
(106,6,4,16,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(107,6,4,16,'• Phân NPK:','','','2022-09-25',7,NULL),
(108,6,4,16,'• Phân Khác:','','','2022-09-25',8,NULL),
(109,6,4,17,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(110,6,4,17,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(111,6,4,17,'• Ure:','','','2022-10-05',3,NULL),
(112,6,4,17,'• Phân DAP:','','','2022-10-05',4,NULL),
(113,6,4,17,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(114,6,4,17,'• Phân Khác:','','','2022-10-05',6,NULL),
(115,6,4,18,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(116,6,4,18,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(117,6,4,18,'• Ure:','','','2022-10-28',3,NULL),
(118,6,4,18,'• Phân DAP:','','','2022-10-28',4,NULL),
(119,6,4,18,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(120,6,4,18,'• Phân Khác:','','','2022-10-28',6,NULL),
(121,7,4,19,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(122,7,4,19,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(123,7,4,19,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(124,7,4,19,'• Phân Lân:','','','2022-09-25',4,NULL),
(125,7,4,19,'• Phân Kali:','','','2022-09-25',5,NULL),
(126,7,4,19,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(127,7,4,19,'• Phân NPK:','','','2022-09-25',7,NULL),
(128,7,4,19,'• Phân Khác:','','','2022-09-25',8,NULL),
(129,7,4,20,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(130,7,4,20,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(131,7,4,20,'• Ure:','','','2022-10-05',3,NULL),
(132,7,4,20,'• Phân DAP:','','','2022-10-05',4,NULL),
(133,7,4,20,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(134,7,4,20,'• Phân Khác:','','','2022-10-05',6,NULL),
(135,7,4,21,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(136,7,4,21,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(137,7,4,21,'• Ure:','','','2022-10-28',3,NULL),
(138,7,4,21,'• Phân DAP:','','','2022-10-28',4,NULL),
(139,7,4,21,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(140,7,4,21,'• Phân Khác:','','','2022-10-28',6,NULL),
(141,8,4,22,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(142,8,4,22,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(143,8,4,22,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(144,8,4,22,'• Phân Lân:','','','2022-09-25',4,NULL),
(145,8,4,22,'• Phân Kali:','','','2022-09-25',5,NULL),
(146,8,4,22,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(147,8,4,22,'• Phân NPK:','','','2022-09-25',7,NULL),
(148,8,4,22,'• Phân Khác:','','','2022-09-25',8,NULL),
(149,8,4,23,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(150,8,4,23,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(151,8,4,23,'• Ure:','','','2022-10-05',3,NULL),
(152,8,4,23,'• Phân DAP:','','','2022-10-05',4,NULL),
(153,8,4,23,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(154,8,4,23,'• Phân Khác:','','','2022-10-05',6,NULL),
(155,8,4,24,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(156,8,4,24,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(157,8,4,24,'• Ure:','','','2022-10-28',3,NULL),
(158,8,4,24,'• Phân DAP:','','','2022-10-28',4,NULL),
(159,8,4,24,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(160,8,4,24,'• Phân Khác:','','','2022-10-28',6,NULL),
(161,9,4,25,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(162,9,4,25,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(163,9,4,25,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(164,9,4,25,'• Phân Lân:','','','2022-09-25',4,NULL),
(165,9,4,25,'• Phân Kali:','','','2022-09-25',5,NULL),
(166,9,4,25,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(167,9,4,25,'• Phân NPK:','','','2022-09-25',7,NULL),
(168,9,4,25,'• Phân Khác:','','','2022-09-25',8,NULL),
(169,9,4,26,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(170,9,4,26,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(171,9,4,26,'• Ure:','','','2022-10-05',3,NULL),
(172,9,4,26,'• Phân DAP:','','','2022-10-05',4,NULL),
(173,9,4,26,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(174,9,4,26,'• Phân Khác:','','','2022-10-05',6,NULL),
(175,9,4,27,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(176,9,4,27,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(177,9,4,27,'• Ure:','','','2022-10-28',3,NULL),
(178,9,4,27,'• Phân DAP:','','','2022-10-28',4,NULL),
(179,9,4,27,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(180,9,4,27,'• Phân Khác:','','','2022-10-28',6,NULL),
(181,10,4,28,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(182,10,4,28,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(183,10,4,28,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(184,10,4,28,'• Phân Lân:','','','2022-09-25',4,NULL),
(185,10,4,28,'• Phân Kali:','','','2022-09-25',5,NULL),
(186,10,4,28,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(187,10,4,28,'• Phân NPK:','','','2022-09-25',7,NULL),
(188,10,4,28,'• Phân Khác:','','','2022-09-25',8,NULL),
(189,10,4,29,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(190,10,4,29,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(191,10,4,29,'• Ure:','','','2022-10-05',3,NULL),
(192,10,4,29,'• Phân DAP:','','','2022-10-05',4,NULL),
(193,10,4,29,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(194,10,4,29,'• Phân Khác:','','','2022-10-05',6,NULL),
(195,10,4,30,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(196,10,4,30,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(197,10,4,30,'• Ure:','','','2022-10-28',3,NULL),
(198,10,4,30,'• Phân DAP:','','','2022-10-28',4,NULL),
(199,10,4,30,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(200,10,4,30,'• Phân Khác:','','','2022-10-28',6,NULL),
(201,11,4,31,'• Phân hữu cơ:','','','2022-09-25',1,NULL),
(202,11,4,31,'• Phân cải tạo đất','','','2022-09-25',2,NULL),
(203,11,4,31,'• Ure:','3.8 kg','','2022-09-25',3,NULL),
(204,11,4,31,'• Phân Lân:','','','2022-09-25',4,NULL),
(205,11,4,31,'• Phân Kali:','','','2022-09-25',5,NULL),
(206,11,4,31,'• Phân DAP:','2.5 kg','','2022-09-25',6,NULL),
(207,11,4,31,'• Phân NPK:','','','2022-09-25',7,NULL),
(208,11,4,31,'• Phân Khác:','','','2022-09-25',8,NULL),
(209,11,4,32,'• Phân hữu cơ:','','','2022-10-05',1,NULL),
(210,11,4,32,'• Phân cải tạo đất','','','2022-10-05',2,NULL),
(211,11,4,32,'• Ure:','','','2022-10-05',3,NULL),
(212,11,4,32,'• Phân DAP:','','','2022-10-05',4,NULL),
(213,11,4,32,'• Phân NPK:','11.5 kg','','2022-10-05',5,NULL),
(214,11,4,32,'• Phân Khác:','','','2022-10-05',6,NULL),
(216,11,4,33,'• Phân hữu cơ:','','','2022-10-28',1,NULL),
(217,11,4,33,'• Phân cải tạo đất','','','2022-10-28',2,NULL),
(218,11,4,33,'• Ure:','','','2022-10-28',3,NULL),
(219,11,4,33,'• Phân DAP:','','','2022-10-28',4,NULL),
(220,11,4,33,'• Phân NPK:','11.5 kg','','2022-10-28',5,NULL),
(221,11,4,33,'• Phân Khác:','','','2022-10-28',6,NULL);

/*Table structure for table `sudungthuoc` */

DROP TABLE IF EXISTS `sudungthuoc`;

CREATE TABLE `sudungthuoc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `IDNHATKY` int(11) DEFAULT NULL,
  `TENTHUOC` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GIATRI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLUONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CACHSUDUNG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `sudungthuoc_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `sudungthuoc_ibfk_3` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungthuoc` */

insert  into `sudungthuoc`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`TENTHUOC`,`GIATRI`,`SOLUONG`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`GHICHU`) values 
(1,1,5,'+ Thuốc trừ ốc:',NULL,NULL,'200 lit/lần/ha.','2022-09-17',NULL),
(2,1,5,'+ Thuốc trừ cỏ:',NULL,NULL,'200 lit/lần/ha.','2022-09-21',NULL),
(3,1,5,'+ Thuốc trừ bệnh:',NULL,NULL,'200 lit/lần/ha.','2022-11-02',NULL),
(4,1,5,'+ Thuốc trừ bệnh:',NULL,NULL,'200 lit/lần/ha.','2022-11-22',NULL),
(5,1,5,'+ Thuốc trừ bệnh:',NULL,NULL,'200 lit/lần/ha.','2022-12-07',NULL),
(6,1,5,'+ Phối hợp thuốc (trừ sâu - bệnh):',NULL,NULL,'200 lit/lần/ha.','2022-11-02',NULL),
(8,1,5,'+ Phối hợp thuốc (trừ rầy - bệnh):',NULL,NULL,'200 lit/lần/ha.','2022-11-22',NULL),
(10,1,5,'+ Phun theo thời điểm:',NULL,NULL,'','0000-00-00',NULL),
(12,2,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(13,2,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(14,2,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(15,2,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(16,2,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(17,2,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(18,2,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(19,2,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(20,3,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(21,3,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(22,3,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(23,3,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(24,3,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(25,3,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(26,3,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(27,3,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(28,4,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(29,4,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(30,4,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(31,4,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(32,4,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(33,4,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(34,4,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(35,4,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(36,5,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(37,5,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(38,5,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(39,5,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(40,5,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(41,5,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(42,5,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(43,5,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(44,6,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(45,6,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(46,6,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(47,6,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(48,6,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(49,6,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(50,6,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(51,6,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(52,7,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(53,7,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(54,7,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(55,7,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(56,7,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(57,7,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(58,7,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(59,7,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(60,8,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(61,8,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(62,8,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(63,8,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(64,8,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(65,8,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(66,8,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(67,8,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(68,9,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(69,9,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(70,9,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(71,9,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(72,9,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(73,9,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(74,9,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(75,9,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(76,10,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(77,10,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(78,10,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(79,10,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(80,10,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(81,10,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(82,10,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(83,10,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL),
(84,11,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',NULL),
(85,11,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',NULL),
(86,11,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',NULL),
(87,11,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',NULL),
(88,11,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',NULL),
(89,11,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',NULL),
(90,11,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',NULL),
(91,11,5,'+ Phun theo thời điểm:','','','','0000-00-00',NULL);

/*Table structure for table `tennongho` */

DROP TABLE IF EXISTS `tennongho`;

CREATE TABLE `tennongho` (
  `ID` int(11) DEFAULT NULL,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `HOTEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIENTICH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SANLUONGDUKIEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(205) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT 1,
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  CONSTRAINT `tennongho_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tennongho` */

/*Table structure for table `thongtinvungtrong` */

DROP TABLE IF EXISTS `thongtinvungtrong`;

CREATE TABLE `thongtinvungtrong` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `NGAYSANXUAT` date DEFAULT NULL,
  `DAT_DIENTICH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DAT_LOAIDAT` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DAT_DOPH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KV_TEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KV_KEHOACH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `THUHOACH_NGAY` date DEFAULT NULL,
  `THUHOACH_SANLUONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  CONSTRAINT `thongtinvungtrong_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `thongtinvungtrong` */

insert  into `thongtinvungtrong`(`ID`,`IDVUNGTRONG`,`NGAYSANXUAT`,`DAT_DIENTICH`,`DAT_LOAIDAT`,`DAT_DOPH`,`KV_TEN`,`KV_KEHOACH`,`THUHOACH_NGAY`,`THUHOACH_SANLUONG`,`GHICHU`) values 
(1,1,'2022-09-18','2 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','14 tấn',NULL),
(2,2,'2022-09-18','0.5 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','3.5 tấn',NULL),
(3,1,'2022-09-18','2 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','14 tấn',''),
(4,2,'2022-09-18','0.5 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','3.5 tấn',''),
(5,3,'2022-09-18','2.5 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','17.5 tấn',''),
(6,4,'2022-09-18','2 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','14 tấn',''),
(7,5,'2022-09-18','1 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','7 tấn',''),
(8,6,'2022-09-18','1.5 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','10.5 tấn',''),
(9,7,'2022-09-18','3 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','21 tấn',''),
(10,8,'2022-09-18','2.5 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','17.5 tấn',''),
(11,9,'2022-09-18','2 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','14 tấn',''),
(12,10,'2022-09-18','1 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','7 tấn',''),
(13,11,'2022-09-18','0.8 ha','cát pha sét.','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An.','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân sớm.','2022-12-25','5.6 tấn','');

/* Function  structure for function  `f_solannhatky` */

/*!50003 DROP FUNCTION IF EXISTS `f_solannhatky` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_solannhatky`(p_idvungtrong varchar(100),
	p_type varchar(100)
) RETURNS varchar(1024) CHARSET utf8
BEGIN
	DECLARE v_number int(11) DEFAULT 0;
	
	if p_type = 1 then
		select count(ID) into v_number
		from kythuatbonphan
		where p_idvungtrong = IDVUNGTRONG
		group by IDNHATKY;
	else
		SELECT COUNT(ID) INTO v_number
		FROM sudungthuoc
		WHERE p_idvungtrong = IDVUNGTRONG
		GROUP BY IDNHATKY;
	end if;
	
	return concat(v_number, '');
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_dsnhatky` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_dsnhatky` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_load_dsnhatky`(
	p_idvungtrong VARCHAR(150)
    )
BEGIN
	select ID, TENNHATKY
	from nhatkysanxuat
	where IDVUNGTRONG = p_idvungtrong;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_listvungtrong` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_listvungtrong` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_load_listvungtrong`(
	p_iddonvi varchar(150)
)
BEGIN
	select * 
	from dmvungtrong
	where IDDONVI = p_iddonvi;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_thongtinnhatky` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_thongtinnhatky` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_load_thongtinnhatky`(
	p_idvungtrong VARCHAR(150),
	p_idnhatky VARCHAR(150)
)
BEGIN
	SET SESSION group_concat_max_len = 1000000;
	
	SELECT f_solannhatky(p_idvungtrong,1) as SOLANBONPHAN, f_solannhatky(p_idvungtrong,2) AS SOLANSUDUNGTHUOC, nhatky.IDNHATKY, nhatky.IDVUNGTRONG, nhatky.SUDUNGNHATKY, case when nhatky.BONPHAN = 1 then nhatky.NHATKYPHANBON when nhatky.THUOCBVTV = 1 then nhatky.NHATKYSUDUNGTHUOC else replace(group_concat('<p class="c-title3">',nhatky.TENNHATKY,' ',nhatky.CACHSUDUNGNHATKY,'</p>'),'>,<','><') end as TENNHATKY, nhatky.NGAYTHUCHIENNHATKY
	FROM (
		SELECT cc.ID AS IDNHATKY, cc.IDVUNGTRONG, cc.BONPHAN, cc.THUOCBVTV, CONCAT('- ',dd.TENLOAI,': ',cc.TENNHATKY) AS SUDUNGNHATKY, ii.TENNHATKY, IFNULL(ii.CACHSUDUNG,'') AS CACHSUDUNGNHATKY, DATE_FORMAT(ii.NGAYTHUCHIEN,'%d/%m/%Y') AS NGAYTHUCHIENNHATKY, dd.SAPXEP AS SAPXEPLOAINHATKY, ii.SAPXEP AS SAPXEPNHATKY, sdphan.NHATKYPHANBON, sdthuoc.NHATKYSUDUNGTHUOC
		FROM nhatkysanxuat cc
			LEFT JOIN sudungnhatky ii ON ii.IDNHATKY = cc.ID AND ii.IDVUNGTRONG = p_idvungtrong
			left join (SELECT nhatky.IDNHATKY, nhatky.IDVUNGTRONG, replace(GROUP_CONCAT('<p class="c-title3">','+ Lần: ',nhatky.STT,'</p>','<p class="c-title4">','<i class="fa fa-arrow-right"></i> Ngày thực hiện: ',nhatky.NGAYTHUCHIEN,'</p>','<p class="c-title4">','<i class="fa fa-arrow-right"></i> ',nhatky.SUDUNGPHANBON,'</p>',nhatky.CACHSUDUNGPHANBON ORDER BY nhatky.STT),'>,<','><') AS NHATKYPHANBON
					FROM (
						SELECT (@row_n3:=@row_n3 + 1) AS STT, phanbon.IDNHATKY, phanbon.IDVUNGTRONG, phanbon.IDKYTHUATBONPHAN, phanbon.SUDUNGPHANBON, phanbon.CACHSUDUNGPHANBON, phanbon.NGAYTHUCHIEN
						FROM (
							SELECT aa.IDNHATKY, aa.IDVUNGTRONG, aa.IDKYTHUATBONPHAN, bb.SUDUNGPHANBON, replace(GROUP_CONCAT('<p class="c-title6">',aa.TENPHANBON,' ',IFNULL(aa.SOLUONG,''),'</p>' ORDER BY aa.SAPXEP),'>,<','><') AS CACHSUDUNGPHANBON, date_format(aa.NGAYTHUCHIEN,'%d/%m/%Y') as NGAYTHUCHIEN
							FROM sudungphanbon aa, kythuatbonphan bb
							WHERE aa.IDVUNGTRONG = p_idvungtrong AND aa.IDNHATKY = p_idnhatky
							AND bb.ID = aa.IDKYTHUATBONPHAN AND bb.IDVUNGTRONG = p_idvungtrong
							GROUP BY bb.SUDUNGPHANBON, aa.IDKYTHUATBONPHAN,aa.NGAYTHUCHIEN
						) phanbon,(SELECT @row_n3:=0) AS temp3
					) nhatky
					GROUP BY nhatky.IDNHATKY, nhatky.IDVUNGTRONG
				) sdphan on sdphan.IDVUNGTRONG = cc.IDVUNGTRONG and sdphan.IDVUNGTRONG = p_idvungtrong
			left join (SELECT nhatky.IDNHATKY, nhatky.IDVUNGTRONG, replace(GROUP_CONCAT('<p class="c-title3">',nhatky.TENTHUOC,'</p>',nhatky.CACHSUDUNGTHUOCBVTV),'>,<','><') AS NHATKYSUDUNGTHUOC
					FROM (
						SELECT thuocbvtv.IDNHATKY, thuocbvtv.IDVUNGTRONG, CASE WHEN SUM(thuocbvtv.SOLAN) = 0 THEN CONCAT(thuocbvtv.TENTHUOC, ' Không') ELSE CONCAT(thuocbvtv.TENTHUOC, ' ', SUM(thuocbvtv.SOLAN), ' lần') END AS TENTHUOC, CASE WHEN SUM(thuocbvtv.SOLAN) = 0 THEN '' ELSE replace(GROUP_CONCAT('<p class="c-title4">','<i class="fa fa-arrow-right"></i> Lần: ',thuocbvtv.STT,'</p>','<p class="c-title6">','• Ngày thực hiện: ',thuocbvtv.NGAYTHUCHIEN,'</p>','<p class="c-title6">','• Số lượng nước phun: ',thuocbvtv.CACHSUDUNGTHUOC,'</p>' ORDER BY thuocbvtv.STT),'>,<','><') end AS CACHSUDUNGTHUOCBVTV
						FROM (
							SELECT (@row_n3:=CASE WHEN @tenthuoc=aa.TENTHUOC THEN @row_n3+1 ELSE 1 END) AS STT, aa.ID, aa.IDNHATKY, aa.IDVUNGTRONG, @tenthuoc:=aa.TENTHUOC AS TENTHUOC, CASE WHEN IFNULL(aa.CACHSUDUNG,'') = '' THEN 0 ELSE COUNT(aa.TENTHUOC) END AS SOLAN,IFNULL(aa.CACHSUDUNG,'') AS CACHSUDUNGTHUOC, date_format(aa.NGAYTHUCHIEN,'%d/%m/%Y') as NGAYTHUCHIEN
							FROM sudungthuoc aa, (SELECT @row_n3:=0,@tenthuoc:='') AS temp3
							WHERE aa.IDVUNGTRONG = p_idvungtrong AND aa.IDNHATKY = p_idnhatky
							GROUP BY aa.TENTHUOC, aa.ID, aa.IDNHATKY, aa.IDVUNGTRONG, aa.NGAYTHUCHIEN
						) thuocbvtv
						GROUP BY thuocbvtv.IDNHATKY, thuocbvtv.IDVUNGTRONG, thuocbvtv.TENTHUOC
						order by thuocbvtv.ID, thuocbvtv.STT
					) nhatky
					GROUP BY nhatky.IDNHATKY, nhatky.IDVUNGTRONG
				) sdthuoc on sdthuoc.IDVUNGTRONG = cc.IDVUNGTRONG and sdthuoc.IDVUNGTRONG = p_idvungtrong
		, loainhatky dd
		WHERE cc.IDVUNGTRONG = p_idvungtrong AND dd.ID = cc.LOAINHATKY AND cc.LOAINHATKY = p_idnhatky
		ORDER BY dd.SAPXEP, ii.SAPXEP
	) nhatky
	GROUP BY nhatky.IDNHATKY, nhatky.IDVUNGTRONG, nhatky.SUDUNGNHATKY, nhatky.NGAYTHUCHIENNHATKY;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_thongtinvungtrong` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_thongtinvungtrong` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_load_thongtinvungtrong`(
	p_idvungtrong varchar(150)
)
BEGIN
	SELECT aa.MAVUNGTRONG, aa.TENNONGHO, aa.DIACHI, aa.HOPTACXA, aa.SANPHAMTRONG, date_format(bb.NGAYSANXUAT,'%d/%m/%Y') as NGAYSANXUAT, bb.DAT_DIENTICH, bb.DAT_LOAIDAT, bb.DAT_DOPH, bb.KV_TEN, bb.KV_KEHOACH, DATE_FORMAT(bb.THUHOACH_NGAY,'%d/%m/%Y') as THUHOACH_NGAY, bb.THUHOACH_SANLUONG
	FROM dmvungtrong aa, thongtinvungtrong bb
	WHERE aa.ID = p_idvungtrong AND aa.ID = bb.IDVUNGTRONG AND bb.IDVUNGTRONG = p_idvungtrong;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
