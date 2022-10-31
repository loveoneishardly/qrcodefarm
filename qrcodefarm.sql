/*
SQLyog Community
MySQL - 10.1.37-MariaDB : Database - qrcodefarm
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
  `TRANGTHAI` int(11) DEFAULT '1',
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
  `TRANGTHAI` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `IDDONVI` (`IDDONVI`),
  CONSTRAINT `dmvungtrong_ibfk_1` FOREIGN KEY (`IDDONVI`) REFERENCES `dmdonvi` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dmvungtrong` */

insert  into `dmvungtrong`(`ID`,`IDDONVI`,`TENVUNGTRONG`,`MAVUNGTRONG`,`TENNONGHO`,`DIACHI`,`HOPTACXA`,`SANPHAMTRONG`,`GHICHU`,`TRANGTHAI`) values 
(1,1,'Vùng trồng lúa','','Ngô Văn Thành Em','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.',NULL,1),
(2,1,'Vùng trồng lúa','','Kim Chành Thu','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.',NULL,1),
(3,1,'Vùng trồng lúa','','Trịnh Văn Nghĩa','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(4,1,'Vùng trồng lúa','','Hêng Pến','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(5,1,'Vùng trồng lúa','','Hêng Dêl','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(6,1,'Vùng trồng lúa','','Kim Ben','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(7,1,'Vùng trồng lúa','','Ông Kim Phước','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(8,1,'Vùng trồng lúa','','Từ Thị Kim Vi','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(9,1,'Vùng trồng lúa','','Kim Dũng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(10,1,'Vùng trồng lúa','','Từ Đức Thành','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1),
(11,1,'Vùng trồng lúa','','Cao Văn Tài','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Só','Hợp tác xã Nông nghiệp Phước An.','Lúa OM5451.','',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kythuatbonphan` */

insert  into `kythuatbonphan`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`SUDUNGPHANBON`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,4,'Loại phân:','2022-09-25',1,NULL),
(2,1,4,'Loại phân:','2022-10-05',2,NULL),
(3,1,4,'Loại phân:','2022-10-28',3,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kythuatsudungthuoc` */

insert  into `kythuatsudungthuoc`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`SUDUNGTHUOC`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,5,'+ Thuốc trừ ốc:','2022-10-26',1,NULL),
(2,1,5,'+ Thuốc trừ cỏ:','2022-10-26',2,NULL),
(3,1,5,'+ Thuốc trừ bệnh:','2022-10-26',3,NULL),
(4,1,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,NULL),
(5,1,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,NULL),
(6,1,5,'+ Phun theo thời điểm:','2022-10-26',6,NULL);

/*Table structure for table `loainhatky` */

DROP TABLE IF EXISTS `loainhatky`;

CREATE TABLE `loainhatky` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENLOAI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SAPXEP` int(11) DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT '1',
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
  `BONPHAN` int(11) DEFAULT '0',
  `THUOCBVTV` int(11) DEFAULT '0',
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `LOAINHATKY` (`LOAINHATKY`),
  CONSTRAINT `nhatkysanxuat_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `nhatkysanxuat_ibfk_2` FOREIGN KEY (`LOAINHATKY`) REFERENCES `loainhatky` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10,2,5,'Sử dụng thuốc BVTV',0,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10,2,6,'+ Tên giống:',NULL,'2022-10-31',1,NULL),
(11,2,6,'+ Xử lý hạt giống:','5555','2022-10-31',2,NULL),
(12,2,7,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:',NULL,'2022-10-31',1,NULL),
(13,2,7,'+ San sửa mặt bằng đồng ruộng',NULL,'2022-10-31',2,NULL),
(14,2,8,'+ Nguồn nước tưới:',NULL,'2022-10-31',1,NULL),
(15,2,8,'+ Chủ động tưới tiêu',NULL,'2022-10-31',2,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20,1,4,3,'• Phân Khác:',NULL,NULL,'2022-10-28',6,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungthuoc` */

insert  into `sudungthuoc`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`TENTHUOC`,`GIATRI`,`SOLUONG`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`GHICHU`) values 
(1,1,5,'+ Thuốc trừ ốc:',NULL,NULL,'200 lit/lần/ha.','2022-09-17',NULL),
(2,1,5,'+ Thuốc trừ cỏ:',NULL,NULL,'200 lit/lần/ha.','2022-09-21',NULL),
(3,1,5,'+ Thuốc trừ bệnh:',NULL,NULL,'200 lit/lần/ha.','2022-11-02',NULL),
(4,1,5,'+ Thuốc trừ bệnh:',NULL,NULL,'200 lit/lần/ha.','2022-11-22',NULL),
(5,1,5,'+ Thuốc trừ bệnh:',NULL,NULL,'200 lit/lần/ha.','2022-12-07',NULL),
(6,1,5,'+ Phối hợp thuốc (trừ sâu - bệnh):',NULL,NULL,'200 lit/lần/ha.','2022-11-02',NULL),
(8,1,5,'+ Phối hợp thuốc (trừ rầy - bệnh):',NULL,NULL,'200 lit/lần/ha.','2022-11-22',NULL),
(10,1,5,'+ Phun theo thời điểm:',NULL,NULL,'','0000-00-00',NULL);

/*Table structure for table `tennongho` */

DROP TABLE IF EXISTS `tennongho`;

CREATE TABLE `tennongho` (
  `ID` int(11) DEFAULT NULL,
  `IDVUNGTRONG` int(11) DEFAULT NULL,
  `HOTEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIENTICH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SANLUONGDUKIEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(205) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT '1',
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

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_solannhatky`(
	p_idvungtrong varchar(100),
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
			left join (SELECT nhatky.IDNHATKY, nhatky.IDVUNGTRONG, replace(GROUP_CONCAT('<p class="c-title3">','+ Lần: ',nhatky.STT,'</p>','<p class="c-title4">','-> Ngày thực hiện: ',nhatky.NGAYTHUCHIEN,'</p>','<p class="c-title4">','-> ',nhatky.SUDUNGPHANBON,'</p>',nhatky.CACHSUDUNGPHANBON ORDER BY nhatky.STT),'>,<','><') AS NHATKYPHANBON
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
						SELECT thuocbvtv.IDNHATKY, thuocbvtv.IDVUNGTRONG, CASE WHEN SUM(thuocbvtv.SOLAN) = 0 THEN CONCAT(thuocbvtv.TENTHUOC, ' Không') ELSE CONCAT(thuocbvtv.TENTHUOC, ' ', SUM(thuocbvtv.SOLAN), ' lần') END AS TENTHUOC, CASE WHEN SUM(thuocbvtv.SOLAN) = 0 THEN '' ELSE replace(GROUP_CONCAT('<p class="c-title4">','-> Lần: ',thuocbvtv.STT,'</p>','<p class="c-title6">','• Ngày thực hiện: ',thuocbvtv.NGAYTHUCHIEN,'</p>','<p class="c-title6">','• Số lượng nước phun: ',thuocbvtv.CACHSUDUNGTHUOC,'</p>' ORDER BY thuocbvtv.STT),'>,<','><') end AS CACHSUDUNGTHUOCBVTV
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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
