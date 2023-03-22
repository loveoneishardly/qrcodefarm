/*
SQLyog Community
MySQL - 8.0.32-0ubuntu0.20.04.2 : Database - qrcodefarm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qrcodefarm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `qrcodefarm`;

/*Table structure for table `dmdonvi` */

DROP TABLE IF EXISTS `dmdonvi`;

CREATE TABLE `dmdonvi` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TENDONVI` varbinary(250) DEFAULT NULL,
  `DIACHI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SODIENTHOAI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dmdonvi` */

insert  into `dmdonvi`(`ID`,`TENDONVI`,`DIACHI`,`SODIENTHOAI`,`EMAIL`,`GHICHU`,`TRANGTHAI`) values 
(1,'Đơn vị 1',NULL,NULL,NULL,NULL,1);

/*Table structure for table `dmvungtrong` */

DROP TABLE IF EXISTS `dmvungtrong`;

CREATE TABLE `dmvungtrong` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDDONVI` int DEFAULT NULL,
  `TENVUNGTRONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAVUNGTRONG` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TENNONGHO` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIACHI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HOPTACXA` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SANPHAMTRONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LOAISANPHAM` int DEFAULT '3',
  `KV_TEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KV_KEHOACH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TITILE_DISPLAY` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SODIENTHOAI` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int DEFAULT '1',
  PRIMARY KEY (`ID`,`MAVUNGTRONG`),
  KEY `IDDONVI` (`IDDONVI`),
  CONSTRAINT `dmvungtrong_ibfk_1` FOREIGN KEY (`IDDONVI`) REFERENCES `dmdonvi` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dmvungtrong` */

insert  into `dmvungtrong`(`ID`,`IDDONVI`,`TENVUNGTRONG`,`MAVUNGTRONG`,`TENNONGHO`,`DIACHI`,`HOPTACXA`,`SANPHAMTRONG`,`GHICHU`,`LOAISANPHAM`,`KV_TEN`,`KV_KEHOACH`,`TITILE_DISPLAY`,`SODIENTHOAI`,`TRANGTHAI`) values 
(1,1,'Vùng trồng lúa','OWGILT','Thạch Hưng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,'0344044227',1),
(2,1,'Vùng trồng lúa','AIAQGE','Lâm Bình Minh','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(3,1,'Vùng trồng lúa','XRIBNL','Sơn Hùng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(4,1,'Vùng trồng lúa','','Lâm Suy','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(5,1,'Vùng trồng lúa','','Khưu Văn Điền','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(6,1,'Vùng trồng lúa','WTODTB','Lâm Huy Cường','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(7,1,'Vùng trồng lúa','PMNQXM','Kim Ben','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(8,1,'Vùng trồng lúa','','Châu Thị Phước','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(9,1,'Vùng trồng lúa','','Triệu Lộc','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(10,1,'Vùng trồng lúa','','Dương Quý','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(11,1,'Vùng trồng lúa','','Thái Sà Rây','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(12,1,'Vùng trồng lúa','GUXGZN','Kim Chành Thu','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa OM5451','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(13,1,'Vùng trồng lúa','','Trần Thanh Bạch','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(14,1,'Vùng trồng lúa','','Thạch Cẩm Nhung','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(15,1,'Vùng trồng lúa','WHWENC','Lý Vỏ','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(16,1,'Vùng trồng lúa','','Cao Văn Tài','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(17,1,'Vùng trồng lúa','QHCNGV','Trần Văn Thời','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(18,1,'Vùng trồng lúa','','Huỳnh Thị La','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(19,1,'Vùng trồng lúa','','Trần Tam','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(20,1,'Vùng trồng lúa','OWGILT','Thạch Hưng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(21,1,'Vùng trồng lúa','AIAQGE','Lâm Bình Minh','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(22,1,'Vùng trồng lúa','','Trà Văn Khương','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(23,1,'Vùng trồng lúa','','Lâm Minh Hiển','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(24,1,'Vùng trồng lúa','PMNQXM','Kim Ben','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(25,1,'Vùng trồng lúa','','Hêng Dên','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa OM5451','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(26,1,'Vùng trồng lúa','','Lâm Ngọc Thương','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(27,1,'Vùng trồng lúa','','Lâm Minh Hiển','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(28,1,'Vùng trồng lúa','','Sơn Quách','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(29,1,'Vùng trồng lúa','TKQVBE','Thạch Sươl','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(30,1,'Vùng trồng lúa','','Châu Dương','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(31,1,'Vùng trồng lúa','CCOXNH','Hêng Pến','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(32,1,'Vùng trồng lúa','','Lý Sà Miết','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(33,1,'Vùng trồng lúa','','Kim Dũng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(34,1,'Vùng trồng lúa','WEUPEJ','Từ Đức Thành','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(35,1,'Vùng trồng lúa','WKORIC','Ông Kim Phước','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(36,1,'Vùng trồng lúa','OWGILT','Thạch Hưng','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(37,1,'Vùng trồng lúa','','Lâm Sanh','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(38,1,'Vùng trồng lúa','','Lâm Kết','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(39,1,'Vùng trồng lúa','PUFLHI','Ngô Văn Thành Em','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa OM5451','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(40,1,'Vùng trồng lúa','','Ông Kim Hậu','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(41,1,'Vùng trồng lúa','','Lâm Thị Yến','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(42,1,'Vùng trồng lúa','','Sơn Thạch','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(43,1,'Vùng trồng lúa','','La Quân','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(44,1,'Vùng trồng lúa','','Dương Hữu Nghĩa','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa OM5451','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(45,1,'Vùng trồng lúa','','Hêng Phến','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa OM5451','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(46,1,'Vùng trồng lúa','SZWFTJ','Từ Thị Kim Vi','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(47,1,'Vùng trồng lúa','','La Sên','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(48,1,'Vùng trồng lúa','','Triệu Khuôn','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(49,1,'Vùng trồng lúa','','Trần Len','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1),
(50,1,'Vùng trồng lúa','','Lâm Thành Sang','Ấp Phước An, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng','Hợp tác xã Nông nghiệp Phước An','Lúa RVT','',1,'Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất lúa',NULL,NULL,1);

/*Table structure for table `kythuatbonphan` */

DROP TABLE IF EXISTS `kythuatbonphan`;

CREATE TABLE `kythuatbonphan` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
  `IDNHATKY` int DEFAULT NULL,
  `SUDUNGPHANBON` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `kythuatbonphan_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `kythuatbonphan_ibfk_2` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kythuatbonphan` */

insert  into `kythuatbonphan`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`SUDUNGPHANBON`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,4,'Loại phân:','2022-09-25',1,''),
(2,1,4,'Loại phân:','2022-10-05',2,''),
(3,1,4,'Loại phân:','2022-10-28',3,''),
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
(33,11,4,'Loại phân:','2022-10-28',3,''),
(34,12,4,'Loại phân:','2022-09-25',1,''),
(35,12,4,'Loại phân:','2022-10-05',2,''),
(36,12,4,'Loại phân:','2022-10-28',3,''),
(37,13,4,'Loại phân:','2022-09-25',1,''),
(38,13,4,'Loại phân:','2022-10-05',2,''),
(39,13,4,'Loại phân:','2022-10-28',3,''),
(40,14,4,'Loại phân:','2022-09-25',1,''),
(41,14,4,'Loại phân:','2022-10-05',2,''),
(42,14,4,'Loại phân:','2022-10-28',3,''),
(43,15,4,'Loại phân:','2022-09-25',1,''),
(44,15,4,'Loại phân:','2022-10-05',2,''),
(45,15,4,'Loại phân:','2022-10-28',3,''),
(46,16,4,'Loại phân:','2022-09-25',1,''),
(47,16,4,'Loại phân:','2022-10-05',2,''),
(48,16,4,'Loại phân:','2022-10-28',3,''),
(49,17,4,'Loại phân:','2022-09-25',1,''),
(50,17,4,'Loại phân:','2022-10-05',2,''),
(51,17,4,'Loại phân:','2022-10-28',3,''),
(52,18,4,'Loại phân:','2022-09-25',1,''),
(53,18,4,'Loại phân:','2022-10-05',2,''),
(54,18,4,'Loại phân:','2022-10-28',3,''),
(55,19,4,'Loại phân:','2022-09-25',1,''),
(56,19,4,'Loại phân:','2022-10-05',2,''),
(57,19,4,'Loại phân:','2022-10-28',3,''),
(58,20,4,'Loại phân:','2022-09-25',1,''),
(59,20,4,'Loại phân:','2022-10-05',2,''),
(60,20,4,'Loại phân:','2022-10-28',3,''),
(61,21,4,'Loại phân:','2022-09-25',1,''),
(62,21,4,'Loại phân:','2022-10-05',2,''),
(63,21,4,'Loại phân:','2022-10-28',3,''),
(64,22,4,'Loại phân:','2022-09-25',1,''),
(65,22,4,'Loại phân:','2022-10-05',2,''),
(66,22,4,'Loại phân:','2022-10-28',3,''),
(67,23,4,'Loại phân:','2022-09-25',1,''),
(68,23,4,'Loại phân:','2022-10-05',2,''),
(69,23,4,'Loại phân:','2022-10-28',3,''),
(70,24,4,'Loại phân:','2022-09-25',1,''),
(71,24,4,'Loại phân:','2022-10-05',2,''),
(72,24,4,'Loại phân:','2022-10-28',3,''),
(73,25,4,'Loại phân:','2022-09-25',1,''),
(74,25,4,'Loại phân:','2022-10-05',2,''),
(75,25,4,'Loại phân:','2022-10-28',3,''),
(76,26,4,'Loại phân:','2022-09-25',1,''),
(77,26,4,'Loại phân:','2022-10-05',2,''),
(78,26,4,'Loại phân:','2022-10-28',3,''),
(79,27,4,'Loại phân:','2022-09-25',1,''),
(80,27,4,'Loại phân:','2022-10-05',2,''),
(81,27,4,'Loại phân:','2022-10-28',3,''),
(82,28,4,'Loại phân:','2022-09-25',1,''),
(83,28,4,'Loại phân:','2022-10-05',2,''),
(84,28,4,'Loại phân:','2022-10-28',3,''),
(85,29,4,'Loại phân:','2022-09-25',1,''),
(86,29,4,'Loại phân:','2022-10-05',2,''),
(87,29,4,'Loại phân:','2022-10-28',3,''),
(88,30,4,'Loại phân:','2022-09-25',1,''),
(89,30,4,'Loại phân:','2022-10-05',2,''),
(90,30,4,'Loại phân:','2022-10-28',3,''),
(91,31,4,'Loại phân:','2022-09-25',1,''),
(92,31,4,'Loại phân:','2022-10-05',2,''),
(93,31,4,'Loại phân:','2022-10-28',3,''),
(94,32,4,'Loại phân:','2022-09-25',1,''),
(95,32,4,'Loại phân:','2022-10-05',2,''),
(96,32,4,'Loại phân:','2022-10-28',3,''),
(97,33,4,'Loại phân:','2022-09-25',1,''),
(98,33,4,'Loại phân:','2022-10-05',2,''),
(99,33,4,'Loại phân:','2022-10-28',3,''),
(100,34,4,'Loại phân:','2022-09-25',1,''),
(101,34,4,'Loại phân:','2022-10-05',2,''),
(102,34,4,'Loại phân:','2022-10-28',3,''),
(103,35,4,'Loại phân:','2022-09-25',1,''),
(104,35,4,'Loại phân:','2022-10-05',2,''),
(105,35,4,'Loại phân:','2022-10-28',3,''),
(106,36,4,'Loại phân:','2022-09-25',1,''),
(107,36,4,'Loại phân:','2022-10-05',2,''),
(108,36,4,'Loại phân:','2022-10-28',3,''),
(109,37,4,'Loại phân:','2022-09-25',1,''),
(110,37,4,'Loại phân:','2022-10-05',2,''),
(111,37,4,'Loại phân:','2022-10-28',3,''),
(112,38,4,'Loại phân:','2022-09-25',1,''),
(113,38,4,'Loại phân:','2022-10-05',2,''),
(114,38,4,'Loại phân:','2022-10-28',3,''),
(115,39,4,'Loại phân:','2022-09-25',1,''),
(116,39,4,'Loại phân:','2022-10-05',2,''),
(117,39,4,'Loại phân:','2022-10-28',3,''),
(118,40,4,'Loại phân:','2022-09-25',1,''),
(119,40,4,'Loại phân:','2022-10-05',2,''),
(120,40,4,'Loại phân:','2022-10-28',3,''),
(121,41,4,'Loại phân:','2022-09-25',1,''),
(122,41,4,'Loại phân:','2022-10-05',2,''),
(123,41,4,'Loại phân:','2022-10-28',3,''),
(124,42,4,'Loại phân:','2022-09-25',1,''),
(125,42,4,'Loại phân:','2022-10-05',2,''),
(126,42,4,'Loại phân:','2022-10-28',3,''),
(127,43,4,'Loại phân:','2022-09-25',1,''),
(128,43,4,'Loại phân:','2022-10-05',2,''),
(129,43,4,'Loại phân:','2022-10-28',3,''),
(130,44,4,'Loại phân:','2022-09-25',1,''),
(131,44,4,'Loại phân:','2022-10-05',2,''),
(132,44,4,'Loại phân:','2022-10-28',3,''),
(133,45,4,'Loại phân:','2022-09-25',1,''),
(134,45,4,'Loại phân:','2022-10-05',2,''),
(135,45,4,'Loại phân:','2022-10-28',3,''),
(136,46,4,'Loại phân:','2022-09-25',1,''),
(137,46,4,'Loại phân:','2022-10-05',2,''),
(138,46,4,'Loại phân:','2022-10-28',3,''),
(139,47,4,'Loại phân:','2022-09-25',1,''),
(140,47,4,'Loại phân:','2022-10-05',2,''),
(141,47,4,'Loại phân:','2022-10-28',3,''),
(142,48,4,'Loại phân:','2022-09-25',1,''),
(143,48,4,'Loại phân:','2022-10-05',2,''),
(144,48,4,'Loại phân:','2022-10-28',3,''),
(145,49,4,'Loại phân:','2022-09-25',1,''),
(146,49,4,'Loại phân:','2022-10-05',2,''),
(147,49,4,'Loại phân:','2022-10-28',3,''),
(148,50,4,'Loại phân:','2022-09-25',1,''),
(149,50,4,'Loại phân:','2022-10-05',2,''),
(150,50,4,'Loại phân:','2022-10-28',3,'');

/*Table structure for table `kythuatsudungthuoc` */

DROP TABLE IF EXISTS `kythuatsudungthuoc`;

CREATE TABLE `kythuatsudungthuoc` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
  `IDNHATKY` int DEFAULT NULL,
  `SUDUNGTHUOC` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `kythuatsudungthuoc_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `kythuatsudungthuoc_ibfk_2` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kythuatsudungthuoc` */

insert  into `kythuatsudungthuoc`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`SUDUNGTHUOC`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(2,1,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(3,1,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(4,1,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(5,1,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(6,1,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(7,2,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(8,2,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(9,2,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(10,2,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(11,2,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(12,2,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(13,3,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(14,3,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(15,3,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(16,3,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(17,3,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(18,3,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(19,4,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(20,4,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(21,4,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(22,4,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(23,4,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(24,4,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(25,5,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(26,5,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(27,5,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(28,5,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(29,5,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(30,5,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(31,6,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(32,6,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(33,6,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(34,6,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(35,6,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(36,6,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(37,7,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(38,7,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(39,7,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(40,7,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(41,7,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(42,7,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(43,8,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(44,8,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(45,8,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(46,8,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(47,8,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(48,8,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(49,9,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(50,9,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(51,9,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(52,9,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(53,9,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(54,9,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(55,10,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(56,10,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(57,10,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(58,10,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(59,10,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(60,10,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(61,11,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(62,11,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(63,11,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(64,11,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(65,11,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(66,11,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(67,12,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(68,12,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(69,12,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(70,12,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(71,12,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(72,12,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(73,13,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(74,13,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(75,13,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(76,13,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(77,13,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(78,13,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(79,14,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(80,14,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(81,14,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(82,14,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(83,14,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(84,14,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(85,15,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(86,15,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(87,15,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(88,15,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(89,15,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(90,15,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(91,16,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(92,16,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(93,16,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(94,16,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(95,16,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(96,16,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(97,17,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(98,17,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(99,17,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(100,17,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(101,17,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(102,17,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(103,18,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(104,18,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(105,18,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(106,18,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(107,18,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(108,18,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(109,19,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(110,19,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(111,19,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(112,19,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(113,19,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(114,19,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(115,20,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(116,20,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(117,20,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(118,20,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(119,20,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(120,20,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(121,21,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(122,21,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(123,21,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(124,21,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(125,21,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(126,21,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(127,22,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(128,22,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(129,22,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(130,22,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(131,22,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(132,22,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(133,23,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(134,23,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(135,23,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(136,23,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(137,23,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(138,23,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(139,24,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(140,24,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(141,24,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(142,24,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(143,24,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(144,24,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(145,25,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(146,25,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(147,25,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(148,25,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(149,25,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(150,25,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(151,26,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(152,26,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(153,26,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(154,26,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(155,26,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(156,26,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(157,27,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(158,27,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(159,27,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(160,27,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(161,27,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(162,27,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(163,28,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(164,28,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(165,28,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(166,28,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(167,28,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(168,28,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(169,29,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(170,29,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(171,29,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(172,29,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(173,29,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(174,29,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(175,30,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(176,30,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(177,30,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(178,30,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(179,30,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(180,30,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(181,31,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(182,31,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(183,31,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(184,31,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(185,31,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(186,31,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(187,32,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(188,32,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(189,32,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(190,32,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(191,32,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(192,32,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(193,33,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(194,33,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(195,33,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(196,33,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(197,33,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(198,33,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(199,34,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(200,34,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(201,34,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(202,34,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(203,34,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(204,34,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(205,35,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(206,35,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(207,35,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(208,35,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(209,35,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(210,35,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(211,36,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(212,36,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(213,36,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(214,36,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(215,36,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(216,36,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(217,37,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(218,37,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(219,37,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(220,37,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(221,37,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(222,37,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(223,38,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(224,38,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(225,38,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(226,38,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(227,38,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(228,38,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(229,39,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(230,39,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(231,39,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(232,39,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(233,39,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(234,39,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(235,40,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(236,40,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(237,40,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(238,40,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(239,40,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(240,40,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(241,41,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(242,41,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(243,41,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(244,41,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(245,41,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(246,41,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(247,42,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(248,42,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(249,42,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(250,42,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(251,42,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(252,42,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(253,43,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(254,43,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(255,43,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(256,43,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(257,43,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(258,43,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(259,44,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(260,44,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(261,44,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(262,44,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(263,44,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(264,44,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(265,45,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(266,45,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(267,45,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(268,45,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(269,45,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(270,45,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(271,46,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(272,46,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(273,46,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(274,46,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(275,46,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(276,46,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(277,47,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(278,47,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(279,47,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(280,47,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(281,47,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(282,47,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(283,48,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(284,48,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(285,48,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(286,48,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(287,48,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(288,48,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(289,49,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(290,49,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(291,49,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(292,49,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(293,49,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(294,49,5,'+ Phun theo thời điểm:','2022-10-26',6,''),
(295,50,5,'+ Thuốc trừ ốc:','2022-10-26',1,''),
(296,50,5,'+ Thuốc trừ cỏ:','2022-10-26',2,''),
(297,50,5,'+ Thuốc trừ bệnh:','2022-10-26',3,''),
(298,50,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','2022-10-26',4,''),
(299,50,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','2022-10-26',5,''),
(300,50,5,'+ Phun theo thời điểm:','2022-10-26',6,'');

/*Table structure for table `loainhatky` */

DROP TABLE IF EXISTS `loainhatky`;

CREATE TABLE `loainhatky` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TENLOAI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SAPXEP` int DEFAULT NULL,
  `TRANGTHAI` int DEFAULT '1',
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
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
  `LOAINHATKY` int DEFAULT NULL COMMENT '1: Bước 1, 2: Bước 2...',
  `TENNHATKY` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BONPHAN` int DEFAULT '0',
  `THUOCBVTV` int DEFAULT '0',
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `LOAINHATKY` (`LOAINHATKY`),
  CONSTRAINT `nhatkysanxuat_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `nhatkysanxuat_ibfk_2` FOREIGN KEY (`LOAINHATKY`) REFERENCES `loainhatky` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nhatkysanxuat` */

insert  into `nhatkysanxuat`(`ID`,`IDVUNGTRONG`,`LOAINHATKY`,`TENNHATKY`,`BONPHAN`,`THUOCBVTV`,`GHICHU`) values 
(1,1,1,'Chọn giống và xử lý giống',0,0,''),
(2,1,2,'Kỹ thuật làm đất',0,0,''),
(3,1,3,'Quản lý nước',0,0,''),
(4,1,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(5,1,5,'Sử dụng thuốc BVTV',0,1,''),
(6,2,1,'Chọn giống và xử lý giống',0,0,''),
(7,2,2,'Kỹ thuật làm đất',0,0,''),
(8,2,3,'Quản lý nước',0,0,''),
(9,2,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(10,2,5,'Sử dụng thuốc BVTV',0,1,''),
(11,3,1,'Chọn giống và xử lý giống',0,0,''),
(12,3,2,'Kỹ thuật làm đất',0,0,''),
(13,3,3,'Quản lý nước',0,0,''),
(14,3,4,'Phân bón và kỹ thuật bón phân',1,0,''),
(15,3,5,'Sử dụng thuốc BVTV',0,1,''),
(16,4,1,'Chọn giống và xử lý giống',0,0,'0'),
(17,4,2,'Kỹ thuật làm đất',0,0,'0'),
(18,4,3,'Quản lý nước',0,0,'0'),
(19,4,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(20,4,5,'Sử dụng thuốc BVTV',0,1,'0'),
(21,5,1,'Chọn giống và xử lý giống',0,0,'0'),
(22,5,2,'Kỹ thuật làm đất',0,0,'0'),
(23,5,3,'Quản lý nước',0,0,'0'),
(24,5,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(25,5,5,'Sử dụng thuốc BVTV',0,1,'0'),
(26,6,1,'Chọn giống và xử lý giống',0,0,'0'),
(27,6,2,'Kỹ thuật làm đất',0,0,'0'),
(28,6,3,'Quản lý nước',0,0,'0'),
(29,6,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(30,6,5,'Sử dụng thuốc BVTV',0,1,'0'),
(31,7,1,'Chọn giống và xử lý giống',0,0,'0'),
(32,7,2,'Kỹ thuật làm đất',0,0,'0'),
(33,7,3,'Quản lý nước',0,0,'0'),
(34,7,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(35,7,5,'Sử dụng thuốc BVTV',0,1,'0'),
(36,8,1,'Chọn giống và xử lý giống',0,0,'0'),
(37,8,2,'Kỹ thuật làm đất',0,0,'0'),
(38,8,3,'Quản lý nước',0,0,'0'),
(39,8,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(40,8,5,'Sử dụng thuốc BVTV',0,1,'0'),
(41,9,1,'Chọn giống và xử lý giống',0,0,'0'),
(42,9,2,'Kỹ thuật làm đất',0,0,'0'),
(43,9,3,'Quản lý nước',0,0,'0'),
(44,9,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(45,9,5,'Sử dụng thuốc BVTV',0,1,'0'),
(46,10,1,'Chọn giống và xử lý giống',0,0,'0'),
(47,10,2,'Kỹ thuật làm đất',0,0,'0'),
(48,10,3,'Quản lý nước',0,0,'0'),
(49,10,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(50,10,5,'Sử dụng thuốc BVTV',0,1,'0'),
(51,11,1,'Chọn giống và xử lý giống',0,0,'0'),
(52,11,2,'Kỹ thuật làm đất',0,0,'0'),
(53,11,3,'Quản lý nước',0,0,'0'),
(54,11,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(55,11,5,'Sử dụng thuốc BVTV',0,1,'0'),
(56,12,1,'Chọn giống và xử lý giống',0,0,'0'),
(57,12,2,'Kỹ thuật làm đất',0,0,'0'),
(58,12,3,'Quản lý nước',0,0,'0'),
(59,12,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(60,12,5,'Sử dụng thuốc BVTV',0,1,'0'),
(61,13,1,'Chọn giống và xử lý giống',0,0,'0'),
(62,13,2,'Kỹ thuật làm đất',0,0,'0'),
(63,13,3,'Quản lý nước',0,0,'0'),
(64,13,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(65,13,5,'Sử dụng thuốc BVTV',0,1,'0'),
(66,14,1,'Chọn giống và xử lý giống',0,0,'0'),
(67,14,2,'Kỹ thuật làm đất',0,0,'0'),
(68,14,3,'Quản lý nước',0,0,'0'),
(69,14,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(70,14,5,'Sử dụng thuốc BVTV',0,1,'0'),
(71,15,1,'Chọn giống và xử lý giống',0,0,'0'),
(72,15,2,'Kỹ thuật làm đất',0,0,'0'),
(73,15,3,'Quản lý nước',0,0,'0'),
(74,15,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(75,15,5,'Sử dụng thuốc BVTV',0,1,'0'),
(76,16,1,'Chọn giống và xử lý giống',0,0,'0'),
(77,16,2,'Kỹ thuật làm đất',0,0,'0'),
(78,16,3,'Quản lý nước',0,0,'0'),
(79,16,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(80,16,5,'Sử dụng thuốc BVTV',0,1,'0'),
(81,17,1,'Chọn giống và xử lý giống',0,0,'0'),
(82,17,2,'Kỹ thuật làm đất',0,0,'0'),
(83,17,3,'Quản lý nước',0,0,'0'),
(84,17,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(85,17,5,'Sử dụng thuốc BVTV',0,1,'0'),
(86,18,1,'Chọn giống và xử lý giống',0,0,'0'),
(87,18,2,'Kỹ thuật làm đất',0,0,'0'),
(88,18,3,'Quản lý nước',0,0,'0'),
(89,18,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(90,18,5,'Sử dụng thuốc BVTV',0,1,'0'),
(91,19,1,'Chọn giống và xử lý giống',0,0,'0'),
(92,19,2,'Kỹ thuật làm đất',0,0,'0'),
(93,19,3,'Quản lý nước',0,0,'0'),
(94,19,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(95,19,5,'Sử dụng thuốc BVTV',0,1,'0'),
(96,20,1,'Chọn giống và xử lý giống',0,0,'0'),
(97,20,2,'Kỹ thuật làm đất',0,0,'0'),
(98,20,3,'Quản lý nước',0,0,'0'),
(99,20,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(100,20,5,'Sử dụng thuốc BVTV',0,1,'0'),
(101,21,1,'Chọn giống và xử lý giống',0,0,'0'),
(102,21,2,'Kỹ thuật làm đất',0,0,'0'),
(103,21,3,'Quản lý nước',0,0,'0'),
(104,21,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(105,21,5,'Sử dụng thuốc BVTV',0,1,'0'),
(106,22,1,'Chọn giống và xử lý giống',0,0,'0'),
(107,22,2,'Kỹ thuật làm đất',0,0,'0'),
(108,22,3,'Quản lý nước',0,0,'0'),
(109,22,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(110,22,5,'Sử dụng thuốc BVTV',0,1,'0'),
(111,23,1,'Chọn giống và xử lý giống',0,0,'0'),
(112,23,2,'Kỹ thuật làm đất',0,0,'0'),
(113,23,3,'Quản lý nước',0,0,'0'),
(114,23,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(115,23,5,'Sử dụng thuốc BVTV',0,1,'0'),
(116,24,1,'Chọn giống và xử lý giống',0,0,'0'),
(117,24,2,'Kỹ thuật làm đất',0,0,'0'),
(118,24,3,'Quản lý nước',0,0,'0'),
(119,24,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(120,24,5,'Sử dụng thuốc BVTV',0,1,'0'),
(121,25,1,'Chọn giống và xử lý giống',0,0,'0'),
(122,25,2,'Kỹ thuật làm đất',0,0,'0'),
(123,25,3,'Quản lý nước',0,0,'0'),
(124,25,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(125,25,5,'Sử dụng thuốc BVTV',0,1,'0'),
(126,26,1,'Chọn giống và xử lý giống',0,0,'0'),
(127,26,2,'Kỹ thuật làm đất',0,0,'0'),
(128,26,3,'Quản lý nước',0,0,'0'),
(129,26,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(130,26,5,'Sử dụng thuốc BVTV',0,1,'0'),
(131,27,1,'Chọn giống và xử lý giống',0,0,'0'),
(132,27,2,'Kỹ thuật làm đất',0,0,'0'),
(133,27,3,'Quản lý nước',0,0,'0'),
(134,27,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(135,27,5,'Sử dụng thuốc BVTV',0,1,'0'),
(136,28,1,'Chọn giống và xử lý giống',0,0,'0'),
(137,28,2,'Kỹ thuật làm đất',0,0,'0'),
(138,28,3,'Quản lý nước',0,0,'0'),
(139,28,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(140,28,5,'Sử dụng thuốc BVTV',0,1,'0'),
(141,29,1,'Chọn giống và xử lý giống',0,0,'0'),
(142,29,2,'Kỹ thuật làm đất',0,0,'0'),
(143,29,3,'Quản lý nước',0,0,'0'),
(144,29,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(145,29,5,'Sử dụng thuốc BVTV',0,1,'0'),
(146,30,1,'Chọn giống và xử lý giống',0,0,'0'),
(147,30,2,'Kỹ thuật làm đất',0,0,'0'),
(148,30,3,'Quản lý nước',0,0,'0'),
(149,30,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(150,30,5,'Sử dụng thuốc BVTV',0,1,'0'),
(151,31,1,'Chọn giống và xử lý giống',0,0,'0'),
(152,31,2,'Kỹ thuật làm đất',0,0,'0'),
(153,31,3,'Quản lý nước',0,0,'0'),
(154,31,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(155,31,5,'Sử dụng thuốc BVTV',0,1,'0'),
(156,32,1,'Chọn giống và xử lý giống',0,0,'0'),
(157,32,2,'Kỹ thuật làm đất',0,0,'0'),
(158,32,3,'Quản lý nước',0,0,'0'),
(159,32,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(160,32,5,'Sử dụng thuốc BVTV',0,1,'0'),
(161,33,1,'Chọn giống và xử lý giống',0,0,'0'),
(162,33,2,'Kỹ thuật làm đất',0,0,'0'),
(163,33,3,'Quản lý nước',0,0,'0'),
(164,33,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(165,33,5,'Sử dụng thuốc BVTV',0,1,'0'),
(166,34,1,'Chọn giống và xử lý giống',0,0,'0'),
(167,34,2,'Kỹ thuật làm đất',0,0,'0'),
(168,34,3,'Quản lý nước',0,0,'0'),
(169,34,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(170,34,5,'Sử dụng thuốc BVTV',0,1,'0'),
(171,35,1,'Chọn giống và xử lý giống',0,0,'0'),
(172,35,2,'Kỹ thuật làm đất',0,0,'0'),
(173,35,3,'Quản lý nước',0,0,'0'),
(174,35,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(175,35,5,'Sử dụng thuốc BVTV',0,1,'0'),
(176,36,1,'Chọn giống và xử lý giống',0,0,'0'),
(177,36,2,'Kỹ thuật làm đất',0,0,'0'),
(178,36,3,'Quản lý nước',0,0,'0'),
(179,36,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(180,36,5,'Sử dụng thuốc BVTV',0,1,'0'),
(181,37,1,'Chọn giống và xử lý giống',0,0,'0'),
(182,37,2,'Kỹ thuật làm đất',0,0,'0'),
(183,37,3,'Quản lý nước',0,0,'0'),
(184,37,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(185,37,5,'Sử dụng thuốc BVTV',0,1,'0'),
(186,38,1,'Chọn giống và xử lý giống',0,0,'0'),
(187,38,2,'Kỹ thuật làm đất',0,0,'0'),
(188,38,3,'Quản lý nước',0,0,'0'),
(189,38,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(190,38,5,'Sử dụng thuốc BVTV',0,1,'0'),
(191,39,1,'Chọn giống và xử lý giống',0,0,'0'),
(192,39,2,'Kỹ thuật làm đất',0,0,'0'),
(193,39,3,'Quản lý nước',0,0,'0'),
(194,39,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(195,39,5,'Sử dụng thuốc BVTV',0,1,'0'),
(196,40,1,'Chọn giống và xử lý giống',0,0,'0'),
(197,40,2,'Kỹ thuật làm đất',0,0,'0'),
(198,40,3,'Quản lý nước',0,0,'0'),
(199,40,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(200,40,5,'Sử dụng thuốc BVTV',0,1,'0'),
(201,41,1,'Chọn giống và xử lý giống',0,0,'0'),
(202,41,2,'Kỹ thuật làm đất',0,0,'0'),
(203,41,3,'Quản lý nước',0,0,'0'),
(204,41,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(205,41,5,'Sử dụng thuốc BVTV',0,1,'0'),
(206,42,1,'Chọn giống và xử lý giống',0,0,'0'),
(207,42,2,'Kỹ thuật làm đất',0,0,'0'),
(208,42,3,'Quản lý nước',0,0,'0'),
(209,42,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(210,42,5,'Sử dụng thuốc BVTV',0,1,'0'),
(211,43,1,'Chọn giống và xử lý giống',0,0,'0'),
(212,43,2,'Kỹ thuật làm đất',0,0,'0'),
(213,43,3,'Quản lý nước',0,0,'0'),
(214,43,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(215,43,5,'Sử dụng thuốc BVTV',0,1,'0'),
(216,44,1,'Chọn giống và xử lý giống',0,0,'0'),
(217,44,2,'Kỹ thuật làm đất',0,0,'0'),
(218,44,3,'Quản lý nước',0,0,'0'),
(219,44,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(220,44,5,'Sử dụng thuốc BVTV',0,1,'0'),
(221,45,1,'Chọn giống và xử lý giống',0,0,'0'),
(222,45,2,'Kỹ thuật làm đất',0,0,'0'),
(223,45,3,'Quản lý nước',0,0,'0'),
(224,45,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(225,45,5,'Sử dụng thuốc BVTV',0,1,'0'),
(226,46,1,'Chọn giống và xử lý giống',0,0,'0'),
(227,46,2,'Kỹ thuật làm đất',0,0,'0'),
(228,46,3,'Quản lý nước',0,0,'0'),
(229,46,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(230,46,5,'Sử dụng thuốc BVTV',0,1,'0'),
(231,47,1,'Chọn giống và xử lý giống',0,0,'0'),
(232,47,2,'Kỹ thuật làm đất',0,0,'0'),
(233,47,3,'Quản lý nước',0,0,'0'),
(234,47,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(235,47,5,'Sử dụng thuốc BVTV',0,1,'0'),
(236,48,1,'Chọn giống và xử lý giống',0,0,'0'),
(237,48,2,'Kỹ thuật làm đất',0,0,'0'),
(238,48,3,'Quản lý nước',0,0,'0'),
(239,48,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(240,48,5,'Sử dụng thuốc BVTV',0,1,'0'),
(241,49,1,'Chọn giống và xử lý giống',0,0,'0'),
(242,49,2,'Kỹ thuật làm đất',0,0,'0'),
(243,49,3,'Quản lý nước',0,0,'0'),
(244,49,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(245,49,5,'Sử dụng thuốc BVTV',0,1,'0'),
(246,50,1,'Chọn giống và xử lý giống',0,0,'0'),
(247,50,2,'Kỹ thuật làm đất',0,0,'0'),
(248,50,3,'Quản lý nước',0,0,'0'),
(249,50,4,'Phân bón và kỹ thuật bón phân',1,0,'0'),
(250,50,5,'Sử dụng thuốc BVTV',0,1,'0');

/*Table structure for table `sudungnhatky` */

DROP TABLE IF EXISTS `sudungnhatky`;

CREATE TABLE `sudungnhatky` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
  `IDNHATKY` int DEFAULT NULL,
  `TENNHATKY` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CACHSUDUNG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `sudungnhatky_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `sudungnhatky_ibfk_2` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungnhatky` */

insert  into `sudungnhatky`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`TENNHATKY`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,1,'+ Tên giống:','RVT','2022-09-17',1,''),
(2,1,1,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(3,1,2,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(4,1,2,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(5,1,2,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(6,1,3,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(7,1,3,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(8,1,3,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(9,1,5,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(10,2,6,'+ Tên giống:','RVT','2022-09-17',1,''),
(11,2,6,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(12,2,7,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(13,2,7,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(14,2,7,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(15,2,8,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(16,2,8,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(17,2,8,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(18,2,10,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(19,3,11,'+ Tên giống:','RVT','2022-09-17',1,''),
(20,3,11,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(21,3,12,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(22,3,12,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(23,3,12,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(24,3,13,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(25,3,13,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(26,3,13,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(27,3,15,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(28,4,16,'+ Tên giống:','RVT','2022-09-17',1,''),
(29,4,16,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(30,4,17,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(31,4,17,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(32,4,17,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(33,4,18,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(34,4,18,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(35,4,18,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(36,4,20,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(37,5,21,'+ Tên giống:','RVT','2022-09-17',1,''),
(38,5,21,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(39,5,22,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(40,5,22,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(41,5,22,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(42,5,23,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(43,5,23,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(44,5,23,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(45,5,25,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(46,6,26,'+ Tên giống:','RVT','2022-09-17',1,''),
(47,6,26,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(48,6,27,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(49,6,27,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(50,6,27,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(51,6,28,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(52,6,28,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(53,6,28,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(54,6,30,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(55,7,31,'+ Tên giống:','RVT','2022-09-17',1,''),
(56,7,31,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(57,7,32,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(58,7,32,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(59,7,32,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(60,7,33,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(61,7,33,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(62,7,33,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(63,7,35,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(64,8,36,'+ Tên giống:','RVT','2022-09-17',1,''),
(65,8,36,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(66,8,37,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(67,8,37,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(68,8,37,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(69,8,38,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(70,8,38,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(71,8,38,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(72,8,40,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(73,9,41,'+ Tên giống:','RVT','2022-09-17',1,''),
(74,9,41,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(75,9,42,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(76,9,42,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(77,9,42,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(78,9,43,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(79,9,43,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(80,9,43,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(81,9,45,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(82,10,46,'+ Tên giống:','RVT','2022-09-17',1,''),
(83,10,46,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(84,10,47,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(85,10,47,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(86,10,47,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(87,10,48,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(88,10,48,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(89,10,48,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(90,10,50,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(91,11,51,'+ Tên giống:','RVT','2022-09-17',1,''),
(92,11,51,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(93,11,52,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(94,11,52,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(95,11,52,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(96,11,53,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(97,11,53,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(98,11,53,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(99,11,55,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(100,12,56,'+ Tên giống:','OM5451','2022-12-22',1,''),
(101,12,56,'+ Xử lý hạt giống:','Ngâm axít','2022-12-22',2,''),
(102,12,57,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-12-28',1,''),
(103,12,57,'+ San sửa mặt bằng đồng ruộng','','2022-12-28',2,''),
(104,12,57,'+ Đánh rãnh nước gieo sạ','','2022-12-28',3,''),
(105,12,58,'+ Nguồn nước tưới:','Nhiễm mặn','2022-12-27',1,''),
(106,12,58,'+ Chủ động tưới tiêu','','2022-12-27',2,''),
(107,12,58,'+ Ứng dụng bơm nước tập trung','','2022-12-27',3,''),
(108,12,60,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(109,13,61,'+ Tên giống:','RVT','2022-09-17',1,''),
(110,13,61,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(111,13,62,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(112,13,62,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(113,13,62,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(114,13,63,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(115,13,63,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(116,13,63,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(117,13,65,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(118,14,66,'+ Tên giống:','RVT','2022-09-17',1,''),
(119,14,66,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(120,14,67,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(121,14,67,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(122,14,67,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(123,14,68,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(124,14,68,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(125,14,68,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(126,14,70,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(127,15,71,'+ Tên giống:','RVT','2022-09-17',1,''),
(128,15,71,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(129,15,72,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(130,15,72,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(131,15,72,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(132,15,73,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(133,15,73,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(134,15,73,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(135,15,75,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(136,16,76,'+ Tên giống:','RVT','2022-12-25',1,''),
(137,16,76,'+ Xử lý hạt giống:','Ngâm axít','2022-12-25',2,''),
(138,16,77,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2023-01-08',1,''),
(139,16,77,'+ San sửa mặt bằng đồng ruộng','','2023-01-08',2,''),
(140,16,77,'+ Đánh rãnh nước gieo sạ','','2023-01-08',3,''),
(141,16,78,'+ Nguồn nước tưới:','Nhiễm mặn','2023-01-02',1,''),
(142,16,78,'+ Chủ động tưới tiêu','','2023-01-02',2,''),
(143,16,78,'+ Ứng dụng bơm nước tập trung','','2023-01-02',3,''),
(144,16,80,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(145,17,81,'+ Tên giống:','RVT','2022-09-17',1,''),
(146,17,81,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(147,17,82,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(148,17,82,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(149,17,82,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(150,17,83,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(151,17,83,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(152,17,83,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(153,17,85,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(154,18,86,'+ Tên giống:','RVT','2022-09-17',1,''),
(155,18,86,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(156,18,87,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(157,18,87,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(158,18,87,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(159,18,88,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(160,18,88,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(161,18,88,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(162,18,90,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(163,19,91,'+ Tên giống:','RVT','2022-09-17',1,''),
(164,19,91,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(165,19,92,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(166,19,92,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(167,19,92,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(168,19,93,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(169,19,93,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(170,19,93,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(171,19,95,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(172,20,96,'+ Tên giống:','RVT','2022-09-17',1,''),
(173,20,96,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(174,20,97,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(175,20,97,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(176,20,97,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(177,20,98,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(178,20,98,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(179,20,98,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(180,20,100,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(181,21,101,'+ Tên giống:','RVT','2022-09-17',1,''),
(182,21,101,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(183,21,102,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(184,21,102,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(185,21,102,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(186,21,103,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(187,21,103,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(188,21,103,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(189,21,105,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(190,22,106,'+ Tên giống:','RVT','2022-09-17',1,''),
(191,22,106,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(192,22,107,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(193,22,107,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(194,22,107,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(195,22,108,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(196,22,108,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(197,22,108,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(198,22,110,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(199,23,111,'+ Tên giống:','RVT','2022-09-17',1,''),
(200,23,111,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(201,23,112,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(202,23,112,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(203,23,112,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(204,23,113,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(205,23,113,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(206,23,113,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(207,23,115,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(208,24,116,'+ Tên giống:','RVT','2022-09-17',1,''),
(209,24,116,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(210,24,117,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(211,24,117,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(212,24,117,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(213,24,118,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(214,24,118,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(215,24,118,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(216,24,120,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(217,25,121,'+ Tên giống:','OM5451','2022-12-22',1,''),
(218,25,121,'+ Xử lý hạt giống:','Ngâm axít','2022-12-22',2,''),
(219,25,122,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-12-28',1,''),
(220,25,122,'+ San sửa mặt bằng đồng ruộng','','2022-12-28',2,''),
(221,25,122,'+ Đánh rãnh nước gieo sạ','','2022-12-28',3,''),
(222,25,123,'+ Nguồn nước tưới:','Nhiễm mặn','2022-12-27',1,''),
(223,25,123,'+ Chủ động tưới tiêu','','2022-12-27',2,''),
(224,25,123,'+ Ứng dụng bơm nước tập trung','','2022-12-27',3,''),
(225,25,125,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(226,26,126,'+ Tên giống:','RVT','2022-09-17',1,''),
(227,26,126,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(228,26,127,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(229,26,127,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(230,26,127,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(231,26,128,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(232,26,128,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(233,26,128,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(234,26,130,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(235,27,131,'+ Tên giống:','RVT','2022-09-17',1,''),
(236,27,131,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(237,27,132,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(238,27,132,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(239,27,132,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(240,27,133,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(241,27,133,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(242,27,133,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(243,27,135,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(244,28,136,'+ Tên giống:','RVT','2022-09-17',1,''),
(245,28,136,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(246,28,137,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(247,28,137,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(248,28,137,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(249,28,138,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(250,28,138,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(251,28,138,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(252,28,140,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(253,29,141,'+ Tên giống:','RVT','2022-09-17',1,''),
(254,29,141,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(255,29,142,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(256,29,142,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(257,29,142,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(258,29,143,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(259,29,143,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(260,29,143,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(261,29,145,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(262,30,146,'+ Tên giống:','RVT','2022-09-17',1,''),
(263,30,146,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(264,30,147,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(265,30,147,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(266,30,147,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(267,30,148,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(268,30,148,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(269,30,148,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(270,30,150,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(271,31,151,'+ Tên giống:','RVT','2022-09-17',1,''),
(272,31,151,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(273,31,152,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(274,31,152,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(275,31,152,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(276,31,153,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(277,31,153,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(278,31,153,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(279,31,155,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(280,32,156,'+ Tên giống:','RVT','2022-09-17',1,''),
(281,32,156,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(282,32,157,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(283,32,157,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(284,32,157,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(285,32,158,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(286,32,158,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(287,32,158,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(288,32,160,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(289,33,161,'+ Tên giống:','RVT','2022-12-25',1,''),
(290,33,161,'+ Xử lý hạt giống:','Ngâm axít','2022-12-25',2,''),
(291,33,162,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2023-01-08',1,''),
(292,33,162,'+ San sửa mặt bằng đồng ruộng','','2023-01-08',2,''),
(293,33,162,'+ Đánh rãnh nước gieo sạ','','2023-01-08',3,''),
(294,33,163,'+ Nguồn nước tưới:','Nhiễm mặn','2023-01-02',1,''),
(295,33,163,'+ Chủ động tưới tiêu','','2023-01-02',2,''),
(296,33,163,'+ Ứng dụng bơm nước tập trung','','2023-01-02',3,''),
(297,33,165,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(298,34,166,'+ Tên giống:','OM5451','2022-12-25',1,''),
(299,34,166,'+ Xử lý hạt giống:','Ngâm axít','2022-12-25',2,''),
(300,34,167,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2023-01-08',1,''),
(301,34,167,'+ San sửa mặt bằng đồng ruộng','','2023-01-08',2,''),
(302,34,167,'+ Đánh rãnh nước gieo sạ','','2023-01-08',3,''),
(303,34,168,'+ Nguồn nước tưới:','Nhiễm mặn','2023-01-02',1,''),
(304,34,168,'+ Chủ động tưới tiêu','','2023-01-02',2,''),
(305,34,168,'+ Ứng dụng bơm nước tập trung','','2023-01-02',3,''),
(306,34,170,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(307,35,171,'+ Tên giống:','RVT','2022-12-25',1,''),
(308,35,171,'+ Xử lý hạt giống:','Ngâm axít','2022-12-25',2,''),
(309,35,172,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2023-01-08',1,''),
(310,35,172,'+ San sửa mặt bằng đồng ruộng','','2023-01-08',2,''),
(311,35,172,'+ Đánh rãnh nước gieo sạ','','2023-01-08',3,''),
(312,35,173,'+ Nguồn nước tưới:','Nhiễm mặn','2023-01-02',1,''),
(313,35,173,'+ Chủ động tưới tiêu','','2023-01-02',2,''),
(314,35,173,'+ Ứng dụng bơm nước tập trung','','2023-01-02',3,''),
(315,35,175,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(316,36,176,'+ Tên giống:','RVT','2022-09-17',1,''),
(317,36,176,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(318,36,177,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(319,36,177,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(320,36,177,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(321,36,178,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(322,36,178,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(323,36,178,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(324,36,180,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(325,37,181,'+ Tên giống:','RVT','2022-09-17',1,''),
(326,37,181,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(327,37,182,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(328,37,182,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(329,37,182,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(330,37,183,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(331,37,183,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(332,37,183,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(333,37,185,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(334,38,186,'+ Tên giống:','RVT','2022-09-17',1,''),
(335,38,186,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(336,38,187,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(337,38,187,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(338,38,187,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(339,38,188,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(340,38,188,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(341,38,188,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(342,38,190,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(343,39,191,'+ Tên giống:','OM5451','2022-12-22',1,''),
(344,39,191,'+ Xử lý hạt giống:','Ngâm axít','2022-12-22',2,''),
(345,39,192,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-12-28',1,''),
(346,39,192,'+ San sửa mặt bằng đồng ruộng','','2022-12-28',2,''),
(347,39,192,'+ Đánh rãnh nước gieo sạ','','2022-12-28',3,''),
(348,39,193,'+ Nguồn nước tưới:','Nhiễm mặn','2022-12-27',1,''),
(349,39,193,'+ Chủ động tưới tiêu','','2022-12-27',2,''),
(350,39,193,'+ Ứng dụng bơm nước tập trung','','2022-12-27',3,''),
(351,39,195,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(352,40,196,'+ Tên giống:','RVT','2022-09-17',1,''),
(353,40,196,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(354,40,197,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(355,40,197,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(356,40,197,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(357,40,198,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(358,40,198,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(359,40,198,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(360,40,200,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(361,41,201,'+ Tên giống:','RVT','2022-09-17',1,''),
(362,41,201,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(363,41,202,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(364,41,202,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(365,41,202,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(366,41,203,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(367,41,203,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(368,41,203,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(369,41,205,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(370,42,206,'+ Tên giống:','RVT','2022-09-17',1,''),
(371,42,206,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(372,42,207,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(373,42,207,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(374,42,207,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(375,42,208,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(376,42,208,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(377,42,208,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(378,42,210,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(379,43,211,'+ Tên giống:','RVT','2022-09-17',1,''),
(380,43,211,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(381,43,212,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(382,43,212,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(383,43,212,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(384,43,213,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(385,43,213,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(386,43,213,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(387,43,215,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(388,44,216,'+ Tên giống:','OM5451','2022-09-17',1,''),
(389,44,216,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(390,44,217,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(391,44,217,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(392,44,217,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(393,44,218,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(394,44,218,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(395,44,218,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(396,44,220,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(397,45,221,'+ Tên giống:','RVT','2022-12-22',1,''),
(398,45,221,'+ Xử lý hạt giống:','Ngâm axít','2022-12-22',2,''),
(399,45,222,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-12-28',1,''),
(400,45,222,'+ San sửa mặt bằng đồng ruộng','','2022-12-28',2,''),
(401,45,222,'+ Đánh rãnh nước gieo sạ','','2022-12-28',3,''),
(402,45,223,'+ Nguồn nước tưới:','Nhiễm mặn','2022-12-27',1,''),
(403,45,223,'+ Chủ động tưới tiêu','','2022-12-27',2,''),
(404,45,223,'+ Ứng dụng bơm nước tập trung','','2022-12-27',3,''),
(405,45,225,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(406,46,226,'+ Tên giống:','RVT','2022-12-25',1,''),
(407,46,226,'+ Xử lý hạt giống:','Ngâm axít','2022-12-25',2,''),
(408,46,227,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2023-01-08',1,''),
(409,46,227,'+ San sửa mặt bằng đồng ruộng','','2023-01-08',2,''),
(410,46,227,'+ Đánh rãnh nước gieo sạ','','2023-01-08',3,''),
(411,46,228,'+ Nguồn nước tưới:','Nhiễm mặn','2023-01-02',1,''),
(412,46,228,'+ Chủ động tưới tiêu','','2023-01-02',2,''),
(413,46,228,'+ Ứng dụng bơm nước tập trung','','2023-01-02',3,''),
(414,46,230,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(415,47,231,'+ Tên giống:','RVT','2022-09-17',1,''),
(416,47,231,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(417,47,232,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(418,47,232,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(419,47,232,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(420,47,233,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(421,47,233,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(422,47,233,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(423,47,235,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(424,48,236,'+ Tên giống:','RVT','2022-09-17',1,''),
(425,48,236,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(426,48,237,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(427,48,237,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(428,48,237,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(429,48,238,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(430,48,238,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(431,48,238,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(432,48,240,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(433,49,241,'+ Tên giống:','RVT','2022-09-17',1,''),
(434,49,241,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(435,49,242,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(436,49,242,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(437,49,242,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(438,49,243,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(439,49,243,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(440,49,243,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(441,49,245,'+ Phun thuốc định kỳ','','2022-10-26',NULL,''),
(442,50,246,'+ Tên giống:','RVT','2022-09-17',1,''),
(443,50,246,'+ Xử lý hạt giống:','Ngâm axít','2022-09-17',2,''),
(444,50,247,'+ Làm đất (cày xới bừa trục), độ xâu lớp cày:','15 cm','2022-08-25',1,''),
(445,50,247,'+ San sửa mặt bằng đồng ruộng','','2022-08-25',2,''),
(446,50,247,'+ Đánh rãnh nước gieo sạ','','2022-08-25',3,''),
(447,50,248,'+ Nguồn nước tưới:','Nhiễm mặn','2022-10-09',1,''),
(448,50,248,'+ Chủ động tưới tiêu','','2022-10-09',2,''),
(449,50,248,'+ Ứng dụng bơm nước tập trung','','2022-10-09',3,''),
(450,50,250,'+ Phun thuốc định kỳ','','2022-10-26',NULL,'');

/*Table structure for table `sudungphanbon` */

DROP TABLE IF EXISTS `sudungphanbon`;

CREATE TABLE `sudungphanbon` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
  `IDNHATKY` int DEFAULT NULL,
  `IDKYTHUATBONPHAN` int DEFAULT NULL,
  `TENPHANBON` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLUONG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CACHSUDUNG` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAYTHUCHIEN` date DEFAULT NULL,
  `SAPXEP` int DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  KEY `IDKYTHUATBONPHAN` (`IDKYTHUATBONPHAN`),
  KEY `IDNHATKY` (`IDNHATKY`),
  CONSTRAINT `sudungphanbon_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`),
  CONSTRAINT `sudungphanbon_ibfk_2` FOREIGN KEY (`IDKYTHUATBONPHAN`) REFERENCES `kythuatbonphan` (`ID`),
  CONSTRAINT `sudungphanbon_ibfk_3` FOREIGN KEY (`IDNHATKY`) REFERENCES `nhatkysanxuat` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungphanbon` */

insert  into `sudungphanbon`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`IDKYTHUATBONPHAN`,`TENPHANBON`,`SOLUONG`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`SAPXEP`,`GHICHU`) values 
(1,1,4,1,'• Phân hữu cơ:','','','2022-09-25',1,''),
(2,1,4,1,'• Phân cải tạo đất','','','2022-09-25',2,''),
(3,1,4,1,'• Ure:','3.8 kg','','2022-09-25',3,''),
(4,1,4,1,'• Phân Lân:','','','2022-09-25',4,''),
(5,1,4,1,'• Phân Kali:','','','2022-09-25',5,''),
(6,1,4,1,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(7,1,4,1,'• Phân NPK:','','','2022-09-25',7,''),
(8,1,4,1,'• Phân Khác:','','','2022-09-25',8,''),
(9,1,4,2,'• Phân hữu cơ:','','','2022-10-05',1,''),
(10,1,4,2,'• Phân cải tạo đất','','','2022-10-05',2,''),
(11,1,4,2,'• Ure:','','','2022-10-05',3,''),
(12,1,4,2,'• Phân DAP:','','','2022-10-05',4,''),
(13,1,4,2,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(14,1,4,2,'• Phân Khác:','','','2022-10-05',6,''),
(15,1,4,3,'• Phân hữu cơ:','','','2022-10-28',1,''),
(16,1,4,3,'• Phân cải tạo đất','','','2022-10-28',2,''),
(17,1,4,3,'• Ure:','','','2022-10-28',3,''),
(18,1,4,3,'• Phân DAP:','','','2022-10-28',4,''),
(19,1,4,3,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(20,1,4,3,'• Phân Khác:','','','2022-10-28',6,''),
(21,2,4,4,'• Phân hữu cơ:','','','2022-09-25',1,''),
(22,2,4,4,'• Phân cải tạo đất','','','2022-09-25',2,''),
(23,2,4,4,'• Ure:','3.8 kg','','2022-09-25',3,''),
(24,2,4,4,'• Phân Lân:','','','2022-09-25',4,''),
(25,2,4,4,'• Phân Kali:','','','2022-09-25',5,''),
(26,2,4,4,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(27,2,4,4,'• Phân NPK:','','','2022-09-25',7,''),
(28,2,4,4,'• Phân Khác:','','','2022-09-25',8,''),
(29,2,4,5,'• Phân hữu cơ:','','','2022-10-05',1,''),
(30,2,4,5,'• Phân cải tạo đất','','','2022-10-05',2,''),
(31,2,4,5,'• Ure:','','','2022-10-05',3,''),
(32,2,4,5,'• Phân DAP:','','','2022-10-05',4,''),
(33,2,4,5,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(34,2,4,5,'• Phân Khác:','','','2022-10-05',6,''),
(35,2,4,6,'• Phân hữu cơ:','','','2022-10-28',1,''),
(36,2,4,6,'• Phân cải tạo đất','','','2022-10-28',2,''),
(37,2,4,6,'• Ure:','','','2022-10-28',3,''),
(38,2,4,6,'• Phân DAP:','','','2022-10-28',4,''),
(39,2,4,6,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(40,2,4,6,'• Phân Khác:','','','2022-10-28',6,''),
(41,3,4,7,'• Phân hữu cơ:','','','2022-09-25',1,''),
(42,3,4,7,'• Phân cải tạo đất','','','2022-09-25',2,''),
(43,3,4,7,'• Ure:','3.8 kg','','2022-09-25',3,''),
(44,3,4,7,'• Phân Lân:','','','2022-09-25',4,''),
(45,3,4,7,'• Phân Kali:','','','2022-09-25',5,''),
(46,3,4,7,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(47,3,4,7,'• Phân NPK:','','','2022-09-25',7,''),
(48,3,4,7,'• Phân Khác:','','','2022-09-25',8,''),
(49,3,4,8,'• Phân hữu cơ:','','','2022-10-05',1,''),
(50,3,4,8,'• Phân cải tạo đất','','','2022-10-05',2,''),
(51,3,4,8,'• Ure:','','','2022-10-05',3,''),
(52,3,4,8,'• Phân DAP:','','','2022-10-05',4,''),
(53,3,4,8,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(54,3,4,8,'• Phân Khác:','','','2022-10-05',6,''),
(55,3,4,9,'• Phân hữu cơ:','','','2022-10-28',1,''),
(56,3,4,9,'• Phân cải tạo đất','','','2022-10-28',2,''),
(57,3,4,9,'• Ure:','','','2022-10-28',3,''),
(58,3,4,9,'• Phân DAP:','','','2022-10-28',4,''),
(59,3,4,9,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(60,3,4,9,'• Phân Khác:','','','2022-10-28',6,''),
(61,4,4,10,'• Phân hữu cơ:','','','2022-09-25',1,''),
(62,4,4,10,'• Phân cải tạo đất','','','2022-09-25',2,''),
(63,4,4,10,'• Ure:','3.8 kg','','2022-09-25',3,''),
(64,4,4,10,'• Phân Lân:','','','2022-09-25',4,''),
(65,4,4,10,'• Phân Kali:','','','2022-09-25',5,''),
(66,4,4,10,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(67,4,4,10,'• Phân NPK:','','','2022-09-25',7,''),
(68,4,4,10,'• Phân Khác:','','','2022-09-25',8,''),
(69,4,4,11,'• Phân hữu cơ:','','','2022-10-05',1,''),
(70,4,4,11,'• Phân cải tạo đất','','','2022-10-05',2,''),
(71,4,4,11,'• Ure:','','','2022-10-05',3,''),
(72,4,4,11,'• Phân DAP:','','','2022-10-05',4,''),
(73,4,4,11,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(74,4,4,11,'• Phân Khác:','','','2022-10-05',6,''),
(75,4,4,12,'• Phân hữu cơ:','','','2022-10-28',1,''),
(76,4,4,12,'• Phân cải tạo đất','','','2022-10-28',2,''),
(77,4,4,12,'• Ure:','','','2022-10-28',3,''),
(78,4,4,12,'• Phân DAP:','','','2022-10-28',4,''),
(79,4,4,12,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(80,4,4,12,'• Phân Khác:','','','2022-10-28',6,''),
(81,5,4,13,'• Phân hữu cơ:','','','2022-09-25',1,''),
(82,5,4,13,'• Phân cải tạo đất','','','2022-09-25',2,''),
(83,5,4,13,'• Ure:','3.8 kg','','2022-09-25',3,''),
(84,5,4,13,'• Phân Lân:','','','2022-09-25',4,''),
(85,5,4,13,'• Phân Kali:','','','2022-09-25',5,''),
(86,5,4,13,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(87,5,4,13,'• Phân NPK:','','','2022-09-25',7,''),
(88,5,4,13,'• Phân Khác:','','','2022-09-25',8,''),
(89,5,4,14,'• Phân hữu cơ:','','','2022-10-05',1,''),
(90,5,4,14,'• Phân cải tạo đất','','','2022-10-05',2,''),
(91,5,4,14,'• Ure:','','','2022-10-05',3,''),
(92,5,4,14,'• Phân DAP:','','','2022-10-05',4,''),
(93,5,4,14,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(94,5,4,14,'• Phân Khác:','','','2022-10-05',6,''),
(95,5,4,15,'• Phân hữu cơ:','','','2022-10-28',1,''),
(96,5,4,15,'• Phân cải tạo đất','','','2022-10-28',2,''),
(97,5,4,15,'• Ure:','','','2022-10-28',3,''),
(98,5,4,15,'• Phân DAP:','','','2022-10-28',4,''),
(99,5,4,15,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(100,5,4,15,'• Phân Khác:','','','2022-10-28',6,''),
(101,6,4,16,'• Phân hữu cơ:','','','2022-09-25',1,''),
(102,6,4,16,'• Phân cải tạo đất','','','2022-09-25',2,''),
(103,6,4,16,'• Ure:','3.8 kg','','2022-09-25',3,''),
(104,6,4,16,'• Phân Lân:','','','2022-09-25',4,''),
(105,6,4,16,'• Phân Kali:','','','2022-09-25',5,''),
(106,6,4,16,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(107,6,4,16,'• Phân NPK:','','','2022-09-25',7,''),
(108,6,4,16,'• Phân Khác:','','','2022-09-25',8,''),
(109,6,4,17,'• Phân hữu cơ:','','','2022-10-05',1,''),
(110,6,4,17,'• Phân cải tạo đất','','','2022-10-05',2,''),
(111,6,4,17,'• Ure:','','','2022-10-05',3,''),
(112,6,4,17,'• Phân DAP:','','','2022-10-05',4,''),
(113,6,4,17,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(114,6,4,17,'• Phân Khác:','','','2022-10-05',6,''),
(115,6,4,18,'• Phân hữu cơ:','','','2022-10-28',1,''),
(116,6,4,18,'• Phân cải tạo đất','','','2022-10-28',2,''),
(117,6,4,18,'• Ure:','','','2022-10-28',3,''),
(118,6,4,18,'• Phân DAP:','','','2022-10-28',4,''),
(119,6,4,18,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(120,6,4,18,'• Phân Khác:','','','2022-10-28',6,''),
(121,7,4,19,'• Phân hữu cơ:','','','2022-09-25',1,''),
(122,7,4,19,'• Phân cải tạo đất','','','2022-09-25',2,''),
(123,7,4,19,'• Ure:','3.8 kg','','2022-09-25',3,''),
(124,7,4,19,'• Phân Lân:','','','2022-09-25',4,''),
(125,7,4,19,'• Phân Kali:','','','2022-09-25',5,''),
(126,7,4,19,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(127,7,4,19,'• Phân NPK:','','','2022-09-25',7,''),
(128,7,4,19,'• Phân Khác:','','','2022-09-25',8,''),
(129,7,4,20,'• Phân hữu cơ:','','','2022-10-05',1,''),
(130,7,4,20,'• Phân cải tạo đất','','','2022-10-05',2,''),
(131,7,4,20,'• Ure:','','','2022-10-05',3,''),
(132,7,4,20,'• Phân DAP:','','','2022-10-05',4,''),
(133,7,4,20,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(134,7,4,20,'• Phân Khác:','','','2022-10-05',6,''),
(135,7,4,21,'• Phân hữu cơ:','','','2022-10-28',1,''),
(136,7,4,21,'• Phân cải tạo đất','','','2022-10-28',2,''),
(137,7,4,21,'• Ure:','','','2022-10-28',3,''),
(138,7,4,21,'• Phân DAP:','','','2022-10-28',4,''),
(139,7,4,21,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(140,7,4,21,'• Phân Khác:','','','2022-10-28',6,''),
(141,8,4,22,'• Phân hữu cơ:','','','2022-09-25',1,''),
(142,8,4,22,'• Phân cải tạo đất','','','2022-09-25',2,''),
(143,8,4,22,'• Ure:','3.8 kg','','2022-09-25',3,''),
(144,8,4,22,'• Phân Lân:','','','2022-09-25',4,''),
(145,8,4,22,'• Phân Kali:','','','2022-09-25',5,''),
(146,8,4,22,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(147,8,4,22,'• Phân NPK:','','','2022-09-25',7,''),
(148,8,4,22,'• Phân Khác:','','','2022-09-25',8,''),
(149,8,4,23,'• Phân hữu cơ:','','','2022-10-05',1,''),
(150,8,4,23,'• Phân cải tạo đất','','','2022-10-05',2,''),
(151,8,4,23,'• Ure:','','','2022-10-05',3,''),
(152,8,4,23,'• Phân DAP:','','','2022-10-05',4,''),
(153,8,4,23,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(154,8,4,23,'• Phân Khác:','','','2022-10-05',6,''),
(155,8,4,24,'• Phân hữu cơ:','','','2022-10-28',1,''),
(156,8,4,24,'• Phân cải tạo đất','','','2022-10-28',2,''),
(157,8,4,24,'• Ure:','','','2022-10-28',3,''),
(158,8,4,24,'• Phân DAP:','','','2022-10-28',4,''),
(159,8,4,24,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(160,8,4,24,'• Phân Khác:','','','2022-10-28',6,''),
(161,9,4,25,'• Phân hữu cơ:','','','2022-09-25',1,''),
(162,9,4,25,'• Phân cải tạo đất','','','2022-09-25',2,''),
(163,9,4,25,'• Ure:','3.8 kg','','2022-09-25',3,''),
(164,9,4,25,'• Phân Lân:','','','2022-09-25',4,''),
(165,9,4,25,'• Phân Kali:','','','2022-09-25',5,''),
(166,9,4,25,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(167,9,4,25,'• Phân NPK:','','','2022-09-25',7,''),
(168,9,4,25,'• Phân Khác:','','','2022-09-25',8,''),
(169,9,4,26,'• Phân hữu cơ:','','','2022-10-05',1,''),
(170,9,4,26,'• Phân cải tạo đất','','','2022-10-05',2,''),
(171,9,4,26,'• Ure:','','','2022-10-05',3,''),
(172,9,4,26,'• Phân DAP:','','','2022-10-05',4,''),
(173,9,4,26,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(174,9,4,26,'• Phân Khác:','','','2022-10-05',6,''),
(175,9,4,27,'• Phân hữu cơ:','','','2022-10-28',1,''),
(176,9,4,27,'• Phân cải tạo đất','','','2022-10-28',2,''),
(177,9,4,27,'• Ure:','','','2022-10-28',3,''),
(178,9,4,27,'• Phân DAP:','','','2022-10-28',4,''),
(179,9,4,27,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(180,9,4,27,'• Phân Khác:','','','2022-10-28',6,''),
(181,10,4,28,'• Phân hữu cơ:','','','2022-09-25',1,''),
(182,10,4,28,'• Phân cải tạo đất','','','2022-09-25',2,''),
(183,10,4,28,'• Ure:','3.8 kg','','2022-09-25',3,''),
(184,10,4,28,'• Phân Lân:','','','2022-09-25',4,''),
(185,10,4,28,'• Phân Kali:','','','2022-09-25',5,''),
(186,10,4,28,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(187,10,4,28,'• Phân NPK:','','','2022-09-25',7,''),
(188,10,4,28,'• Phân Khác:','','','2022-09-25',8,''),
(189,10,4,29,'• Phân hữu cơ:','','','2022-10-05',1,''),
(190,10,4,29,'• Phân cải tạo đất','','','2022-10-05',2,''),
(191,10,4,29,'• Ure:','','','2022-10-05',3,''),
(192,10,4,29,'• Phân DAP:','','','2022-10-05',4,''),
(193,10,4,29,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(194,10,4,29,'• Phân Khác:','','','2022-10-05',6,''),
(195,10,4,30,'• Phân hữu cơ:','','','2022-10-28',1,''),
(196,10,4,30,'• Phân cải tạo đất','','','2022-10-28',2,''),
(197,10,4,30,'• Ure:','','','2022-10-28',3,''),
(198,10,4,30,'• Phân DAP:','','','2022-10-28',4,''),
(199,10,4,30,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(200,10,4,30,'• Phân Khác:','','','2022-10-28',6,''),
(201,11,4,31,'• Phân hữu cơ:','','','2022-09-25',1,''),
(202,11,4,31,'• Phân cải tạo đất','','','2022-09-25',2,''),
(203,11,4,31,'• Ure:','3.8 kg','','2022-09-25',3,''),
(204,11,4,31,'• Phân Lân:','','','2022-09-25',4,''),
(205,11,4,31,'• Phân Kali:','','','2022-09-25',5,''),
(206,11,4,31,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(207,11,4,31,'• Phân NPK:','','','2022-09-25',7,''),
(208,11,4,31,'• Phân Khác:','','','2022-09-25',8,''),
(209,11,4,32,'• Phân hữu cơ:','','','2022-10-05',1,''),
(210,11,4,32,'• Phân cải tạo đất','','','2022-10-05',2,''),
(211,11,4,32,'• Ure:','','','2022-10-05',3,''),
(212,11,4,32,'• Phân DAP:','','','2022-10-05',4,''),
(213,11,4,32,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(214,11,4,32,'• Phân Khác:','','','2022-10-05',6,''),
(215,11,4,33,'• Phân hữu cơ:','','','2022-10-28',1,''),
(216,11,4,33,'• Phân cải tạo đất','','','2022-10-28',2,''),
(217,11,4,33,'• Ure:','','','2022-10-28',3,''),
(218,11,4,33,'• Phân DAP:','','','2022-10-28',4,''),
(219,11,4,33,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(220,11,4,33,'• Phân Khác:','','','2022-10-28',6,''),
(221,12,4,34,'• Phân hữu cơ:','','','2022-09-25',1,''),
(222,12,4,34,'• Phân cải tạo đất','','','2022-09-25',2,''),
(223,12,4,34,'• Ure:','3.8 kg','','2022-09-25',3,''),
(224,12,4,34,'• Phân Lân:','','','2022-09-25',4,''),
(225,12,4,34,'• Phân Kali:','','','2022-09-25',5,''),
(226,12,4,34,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(227,12,4,34,'• Phân NPK:','','','2022-09-25',7,''),
(228,12,4,34,'• Phân Khác:','','','2022-09-25',8,''),
(229,12,4,35,'• Phân hữu cơ:','','','2022-10-05',1,''),
(230,12,4,35,'• Phân cải tạo đất','','','2022-10-05',2,''),
(231,12,4,35,'• Ure:','','','2022-10-05',3,''),
(232,12,4,35,'• Phân DAP:','','','2022-10-05',4,''),
(233,12,4,35,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(234,12,4,35,'• Phân Khác:','','','2022-10-05',6,''),
(235,12,4,36,'• Phân hữu cơ:','','','2022-10-28',1,''),
(236,12,4,36,'• Phân cải tạo đất','','','2022-10-28',2,''),
(237,12,4,36,'• Ure:','','','2022-10-28',3,''),
(238,12,4,36,'• Phân DAP:','','','2022-10-28',4,''),
(239,12,4,36,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(240,12,4,36,'• Phân Khác:','','','2022-10-28',6,''),
(241,13,4,37,'• Phân hữu cơ:','','','2022-09-25',1,''),
(242,13,4,37,'• Phân cải tạo đất','','','2022-09-25',2,''),
(243,13,4,37,'• Ure:','3.8 kg','','2022-09-25',3,''),
(244,13,4,37,'• Phân Lân:','','','2022-09-25',4,''),
(245,13,4,37,'• Phân Kali:','','','2022-09-25',5,''),
(246,13,4,37,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(247,13,4,37,'• Phân NPK:','','','2022-09-25',7,''),
(248,13,4,37,'• Phân Khác:','','','2022-09-25',8,''),
(249,13,4,38,'• Phân hữu cơ:','','','2022-10-05',1,''),
(250,13,4,38,'• Phân cải tạo đất','','','2022-10-05',2,''),
(251,13,4,38,'• Ure:','','','2022-10-05',3,''),
(252,13,4,38,'• Phân DAP:','','','2022-10-05',4,''),
(253,13,4,38,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(254,13,4,38,'• Phân Khác:','','','2022-10-05',6,''),
(255,13,4,39,'• Phân hữu cơ:','','','2022-10-28',1,''),
(256,13,4,39,'• Phân cải tạo đất','','','2022-10-28',2,''),
(257,13,4,39,'• Ure:','','','2022-10-28',3,''),
(258,13,4,39,'• Phân DAP:','','','2022-10-28',4,''),
(259,13,4,39,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(260,13,4,39,'• Phân Khác:','','','2022-10-28',6,''),
(261,14,4,40,'• Phân hữu cơ:','','','2022-09-25',1,''),
(262,14,4,40,'• Phân cải tạo đất','','','2022-09-25',2,''),
(263,14,4,40,'• Ure:','3.8 kg','','2022-09-25',3,''),
(264,14,4,40,'• Phân Lân:','','','2022-09-25',4,''),
(265,14,4,40,'• Phân Kali:','','','2022-09-25',5,''),
(266,14,4,40,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(267,14,4,40,'• Phân NPK:','','','2022-09-25',7,''),
(268,14,4,40,'• Phân Khác:','','','2022-09-25',8,''),
(269,14,4,41,'• Phân hữu cơ:','','','2022-10-05',1,''),
(270,14,4,41,'• Phân cải tạo đất','','','2022-10-05',2,''),
(271,14,4,41,'• Ure:','','','2022-10-05',3,''),
(272,14,4,41,'• Phân DAP:','','','2022-10-05',4,''),
(273,14,4,41,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(274,14,4,41,'• Phân Khác:','','','2022-10-05',6,''),
(275,14,4,42,'• Phân hữu cơ:','','','2022-10-28',1,''),
(276,14,4,42,'• Phân cải tạo đất','','','2022-10-28',2,''),
(277,14,4,42,'• Ure:','','','2022-10-28',3,''),
(278,14,4,42,'• Phân DAP:','','','2022-10-28',4,''),
(279,14,4,42,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(280,14,4,42,'• Phân Khác:','','','2022-10-28',6,''),
(281,15,4,43,'• Phân hữu cơ:','','','2022-09-25',1,''),
(282,15,4,43,'• Phân cải tạo đất','','','2022-09-25',2,''),
(283,15,4,43,'• Ure:','3.8 kg','','2022-09-25',3,''),
(284,15,4,43,'• Phân Lân:','','','2022-09-25',4,''),
(285,15,4,43,'• Phân Kali:','','','2022-09-25',5,''),
(286,15,4,43,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(287,15,4,43,'• Phân NPK:','','','2022-09-25',7,''),
(288,15,4,43,'• Phân Khác:','','','2022-09-25',8,''),
(289,15,4,44,'• Phân hữu cơ:','','','2022-10-05',1,''),
(290,15,4,44,'• Phân cải tạo đất','','','2022-10-05',2,''),
(291,15,4,44,'• Ure:','','','2022-10-05',3,''),
(292,15,4,44,'• Phân DAP:','','','2022-10-05',4,''),
(293,15,4,44,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(294,15,4,44,'• Phân Khác:','','','2022-10-05',6,''),
(295,15,4,45,'• Phân hữu cơ:','','','2022-10-28',1,''),
(296,15,4,45,'• Phân cải tạo đất','','','2022-10-28',2,''),
(297,15,4,45,'• Ure:','','','2022-10-28',3,''),
(298,15,4,45,'• Phân DAP:','','','2022-10-28',4,''),
(299,15,4,45,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(300,15,4,45,'• Phân Khác:','','','2022-10-28',6,''),
(301,16,4,46,'• Phân hữu cơ:','','','2022-09-25',1,''),
(302,16,4,46,'• Phân cải tạo đất','','','2022-09-25',2,''),
(303,16,4,46,'• Ure:','3.8 kg','','2022-09-25',3,''),
(304,16,4,46,'• Phân Lân:','','','2022-09-25',4,''),
(305,16,4,46,'• Phân Kali:','','','2022-09-25',5,''),
(306,16,4,46,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(307,16,4,46,'• Phân NPK:','','','2022-09-25',7,''),
(308,16,4,46,'• Phân Khác:','','','2022-09-25',8,''),
(309,16,4,47,'• Phân hữu cơ:','','','2022-10-05',1,''),
(310,16,4,47,'• Phân cải tạo đất','','','2022-10-05',2,''),
(311,16,4,47,'• Ure:','','','2022-10-05',3,''),
(312,16,4,47,'• Phân DAP:','','','2022-10-05',4,''),
(313,16,4,47,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(314,16,4,47,'• Phân Khác:','','','2022-10-05',6,''),
(315,16,4,48,'• Phân hữu cơ:','','','2022-10-28',1,''),
(316,16,4,48,'• Phân cải tạo đất','','','2022-10-28',2,''),
(317,16,4,48,'• Ure:','','','2022-10-28',3,''),
(318,16,4,48,'• Phân DAP:','','','2022-10-28',4,''),
(319,16,4,48,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(320,16,4,48,'• Phân Khác:','','','2022-10-28',6,''),
(321,17,4,49,'• Phân hữu cơ:','','','2022-09-25',1,''),
(322,17,4,49,'• Phân cải tạo đất','','','2022-09-25',2,''),
(323,17,4,49,'• Ure:','3.8 kg','','2022-09-25',3,''),
(324,17,4,49,'• Phân Lân:','','','2022-09-25',4,''),
(325,17,4,49,'• Phân Kali:','','','2022-09-25',5,''),
(326,17,4,49,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(327,17,4,49,'• Phân NPK:','','','2022-09-25',7,''),
(328,17,4,49,'• Phân Khác:','','','2022-09-25',8,''),
(329,17,4,50,'• Phân hữu cơ:','','','2022-10-05',1,''),
(330,17,4,50,'• Phân cải tạo đất','','','2022-10-05',2,''),
(331,17,4,50,'• Ure:','','','2022-10-05',3,''),
(332,17,4,50,'• Phân DAP:','','','2022-10-05',4,''),
(333,17,4,50,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(334,17,4,50,'• Phân Khác:','','','2022-10-05',6,''),
(335,17,4,51,'• Phân hữu cơ:','','','2022-10-28',1,''),
(336,17,4,51,'• Phân cải tạo đất','','','2022-10-28',2,''),
(337,17,4,51,'• Ure:','','','2022-10-28',3,''),
(338,17,4,51,'• Phân DAP:','','','2022-10-28',4,''),
(339,17,4,51,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(340,17,4,51,'• Phân Khác:','','','2022-10-28',6,''),
(341,18,4,52,'• Phân hữu cơ:','','','2022-09-25',1,''),
(342,18,4,52,'• Phân cải tạo đất','','','2022-09-25',2,''),
(343,18,4,52,'• Ure:','3.8 kg','','2022-09-25',3,''),
(344,18,4,52,'• Phân Lân:','','','2022-09-25',4,''),
(345,18,4,52,'• Phân Kali:','','','2022-09-25',5,''),
(346,18,4,52,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(347,18,4,52,'• Phân NPK:','','','2022-09-25',7,''),
(348,18,4,52,'• Phân Khác:','','','2022-09-25',8,''),
(349,18,4,53,'• Phân hữu cơ:','','','2022-10-05',1,''),
(350,18,4,53,'• Phân cải tạo đất','','','2022-10-05',2,''),
(351,18,4,53,'• Ure:','','','2022-10-05',3,''),
(352,18,4,53,'• Phân DAP:','','','2022-10-05',4,''),
(353,18,4,53,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(354,18,4,53,'• Phân Khác:','','','2022-10-05',6,''),
(355,18,4,54,'• Phân hữu cơ:','','','2022-10-28',1,''),
(356,18,4,54,'• Phân cải tạo đất','','','2022-10-28',2,''),
(357,18,4,54,'• Ure:','','','2022-10-28',3,''),
(358,18,4,54,'• Phân DAP:','','','2022-10-28',4,''),
(359,18,4,54,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(360,18,4,54,'• Phân Khác:','','','2022-10-28',6,''),
(361,19,4,55,'• Phân hữu cơ:','','','2022-09-25',1,''),
(362,19,4,55,'• Phân cải tạo đất','','','2022-09-25',2,''),
(363,19,4,55,'• Ure:','3.8 kg','','2022-09-25',3,''),
(364,19,4,55,'• Phân Lân:','','','2022-09-25',4,''),
(365,19,4,55,'• Phân Kali:','','','2022-09-25',5,''),
(366,19,4,55,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(367,19,4,55,'• Phân NPK:','','','2022-09-25',7,''),
(368,19,4,55,'• Phân Khác:','','','2022-09-25',8,''),
(369,19,4,56,'• Phân hữu cơ:','','','2022-10-05',1,''),
(370,19,4,56,'• Phân cải tạo đất','','','2022-10-05',2,''),
(371,19,4,56,'• Ure:','','','2022-10-05',3,''),
(372,19,4,56,'• Phân DAP:','','','2022-10-05',4,''),
(373,19,4,56,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(374,19,4,56,'• Phân Khác:','','','2022-10-05',6,''),
(375,19,4,57,'• Phân hữu cơ:','','','2022-10-28',1,''),
(376,19,4,57,'• Phân cải tạo đất','','','2022-10-28',2,''),
(377,19,4,57,'• Ure:','','','2022-10-28',3,''),
(378,19,4,57,'• Phân DAP:','','','2022-10-28',4,''),
(379,19,4,57,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(380,19,4,57,'• Phân Khác:','','','2022-10-28',6,''),
(381,20,4,58,'• Phân hữu cơ:','','','2022-09-25',1,''),
(382,20,4,58,'• Phân cải tạo đất','','','2022-09-25',2,''),
(383,20,4,58,'• Ure:','3.8 kg','','2022-09-25',3,''),
(384,20,4,58,'• Phân Lân:','','','2022-09-25',4,''),
(385,20,4,58,'• Phân Kali:','','','2022-09-25',5,''),
(386,20,4,58,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(387,20,4,58,'• Phân NPK:','','','2022-09-25',7,''),
(388,20,4,58,'• Phân Khác:','','','2022-09-25',8,''),
(389,20,4,59,'• Phân hữu cơ:','','','2022-10-05',1,''),
(390,20,4,59,'• Phân cải tạo đất','','','2022-10-05',2,''),
(391,20,4,59,'• Ure:','','','2022-10-05',3,''),
(392,20,4,59,'• Phân DAP:','','','2022-10-05',4,''),
(393,20,4,59,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(394,20,4,59,'• Phân Khác:','','','2022-10-05',6,''),
(395,20,4,60,'• Phân hữu cơ:','','','2022-10-28',1,''),
(396,20,4,60,'• Phân cải tạo đất','','','2022-10-28',2,''),
(397,20,4,60,'• Ure:','','','2022-10-28',3,''),
(398,20,4,60,'• Phân DAP:','','','2022-10-28',4,''),
(399,20,4,60,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(400,20,4,60,'• Phân Khác:','','','2022-10-28',6,''),
(401,21,4,61,'• Phân hữu cơ:','','','2022-09-25',1,''),
(402,21,4,61,'• Phân cải tạo đất','','','2022-09-25',2,''),
(403,21,4,61,'• Ure:','3.8 kg','','2022-09-25',3,''),
(404,21,4,61,'• Phân Lân:','','','2022-09-25',4,''),
(405,21,4,61,'• Phân Kali:','','','2022-09-25',5,''),
(406,21,4,61,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(407,21,4,61,'• Phân NPK:','','','2022-09-25',7,''),
(408,21,4,61,'• Phân Khác:','','','2022-09-25',8,''),
(409,21,4,62,'• Phân hữu cơ:','','','2022-10-05',1,''),
(410,21,4,62,'• Phân cải tạo đất','','','2022-10-05',2,''),
(411,21,4,62,'• Ure:','','','2022-10-05',3,''),
(412,21,4,62,'• Phân DAP:','','','2022-10-05',4,''),
(413,21,4,62,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(414,21,4,62,'• Phân Khác:','','','2022-10-05',6,''),
(415,21,4,63,'• Phân hữu cơ:','','','2022-10-28',1,''),
(416,21,4,63,'• Phân cải tạo đất','','','2022-10-28',2,''),
(417,21,4,63,'• Ure:','','','2022-10-28',3,''),
(418,21,4,63,'• Phân DAP:','','','2022-10-28',4,''),
(419,21,4,63,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(420,21,4,63,'• Phân Khác:','','','2022-10-28',6,''),
(421,22,4,64,'• Phân hữu cơ:','','','2022-09-25',1,''),
(422,22,4,64,'• Phân cải tạo đất','','','2022-09-25',2,''),
(423,22,4,64,'• Ure:','3.8 kg','','2022-09-25',3,''),
(424,22,4,64,'• Phân Lân:','','','2022-09-25',4,''),
(425,22,4,64,'• Phân Kali:','','','2022-09-25',5,''),
(426,22,4,64,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(427,22,4,64,'• Phân NPK:','','','2022-09-25',7,''),
(428,22,4,64,'• Phân Khác:','','','2022-09-25',8,''),
(429,22,4,65,'• Phân hữu cơ:','','','2022-10-05',1,''),
(430,22,4,65,'• Phân cải tạo đất','','','2022-10-05',2,''),
(431,22,4,65,'• Ure:','','','2022-10-05',3,''),
(432,22,4,65,'• Phân DAP:','','','2022-10-05',4,''),
(433,22,4,65,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(434,22,4,65,'• Phân Khác:','','','2022-10-05',6,''),
(435,22,4,66,'• Phân hữu cơ:','','','2022-10-28',1,''),
(436,22,4,66,'• Phân cải tạo đất','','','2022-10-28',2,''),
(437,22,4,66,'• Ure:','','','2022-10-28',3,''),
(438,22,4,66,'• Phân DAP:','','','2022-10-28',4,''),
(439,22,4,66,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(440,22,4,66,'• Phân Khác:','','','2022-10-28',6,''),
(441,23,4,67,'• Phân hữu cơ:','','','2022-09-25',1,''),
(442,23,4,67,'• Phân cải tạo đất','','','2022-09-25',2,''),
(443,23,4,67,'• Ure:','3.8 kg','','2022-09-25',3,''),
(444,23,4,67,'• Phân Lân:','','','2022-09-25',4,''),
(445,23,4,67,'• Phân Kali:','','','2022-09-25',5,''),
(446,23,4,67,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(447,23,4,67,'• Phân NPK:','','','2022-09-25',7,''),
(448,23,4,67,'• Phân Khác:','','','2022-09-25',8,''),
(449,23,4,68,'• Phân hữu cơ:','','','2022-10-05',1,''),
(450,23,4,68,'• Phân cải tạo đất','','','2022-10-05',2,''),
(451,23,4,68,'• Ure:','','','2022-10-05',3,''),
(452,23,4,68,'• Phân DAP:','','','2022-10-05',4,''),
(453,23,4,68,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(454,23,4,68,'• Phân Khác:','','','2022-10-05',6,''),
(455,23,4,69,'• Phân hữu cơ:','','','2022-10-28',1,''),
(456,23,4,69,'• Phân cải tạo đất','','','2022-10-28',2,''),
(457,23,4,69,'• Ure:','','','2022-10-28',3,''),
(458,23,4,69,'• Phân DAP:','','','2022-10-28',4,''),
(459,23,4,69,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(460,23,4,69,'• Phân Khác:','','','2022-10-28',6,''),
(461,24,4,70,'• Phân hữu cơ:','','','2022-09-25',1,''),
(462,24,4,70,'• Phân cải tạo đất','','','2022-09-25',2,''),
(463,24,4,70,'• Ure:','3.8 kg','','2022-09-25',3,''),
(464,24,4,70,'• Phân Lân:','','','2022-09-25',4,''),
(465,24,4,70,'• Phân Kali:','','','2022-09-25',5,''),
(466,24,4,70,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(467,24,4,70,'• Phân NPK:','','','2022-09-25',7,''),
(468,24,4,70,'• Phân Khác:','','','2022-09-25',8,''),
(469,24,4,71,'• Phân hữu cơ:','','','2022-10-05',1,''),
(470,24,4,71,'• Phân cải tạo đất','','','2022-10-05',2,''),
(471,24,4,71,'• Ure:','','','2022-10-05',3,''),
(472,24,4,71,'• Phân DAP:','','','2022-10-05',4,''),
(473,24,4,71,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(474,24,4,71,'• Phân Khác:','','','2022-10-05',6,''),
(475,24,4,72,'• Phân hữu cơ:','','','2022-10-28',1,''),
(476,24,4,72,'• Phân cải tạo đất','','','2022-10-28',2,''),
(477,24,4,72,'• Ure:','','','2022-10-28',3,''),
(478,24,4,72,'• Phân DAP:','','','2022-10-28',4,''),
(479,24,4,72,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(480,24,4,72,'• Phân Khác:','','','2022-10-28',6,''),
(481,25,4,73,'• Phân hữu cơ:','','','2022-09-25',1,''),
(482,25,4,73,'• Phân cải tạo đất','','','2022-09-25',2,''),
(483,25,4,73,'• Ure:','3.8 kg','','2022-09-25',3,''),
(484,25,4,73,'• Phân Lân:','','','2022-09-25',4,''),
(485,25,4,73,'• Phân Kali:','','','2022-09-25',5,''),
(486,25,4,73,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(487,25,4,73,'• Phân NPK:','','','2022-09-25',7,''),
(488,25,4,73,'• Phân Khác:','','','2022-09-25',8,''),
(489,25,4,74,'• Phân hữu cơ:','','','2022-10-05',1,''),
(490,25,4,74,'• Phân cải tạo đất','','','2022-10-05',2,''),
(491,25,4,74,'• Ure:','','','2022-10-05',3,''),
(492,25,4,74,'• Phân DAP:','','','2022-10-05',4,''),
(493,25,4,74,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(494,25,4,74,'• Phân Khác:','','','2022-10-05',6,''),
(495,25,4,75,'• Phân hữu cơ:','','','2022-10-28',1,''),
(496,25,4,75,'• Phân cải tạo đất','','','2022-10-28',2,''),
(497,25,4,75,'• Ure:','','','2022-10-28',3,''),
(498,25,4,75,'• Phân DAP:','','','2022-10-28',4,''),
(499,25,4,75,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(500,25,4,75,'• Phân Khác:','','','2022-10-28',6,''),
(501,26,4,76,'• Phân hữu cơ:','','','2022-09-25',1,''),
(502,26,4,76,'• Phân cải tạo đất','','','2022-09-25',2,''),
(503,26,4,76,'• Ure:','3.8 kg','','2022-09-25',3,''),
(504,26,4,76,'• Phân Lân:','','','2022-09-25',4,''),
(505,26,4,76,'• Phân Kali:','','','2022-09-25',5,''),
(506,26,4,76,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(507,26,4,76,'• Phân NPK:','','','2022-09-25',7,''),
(508,26,4,76,'• Phân Khác:','','','2022-09-25',8,''),
(509,26,4,77,'• Phân hữu cơ:','','','2022-10-05',1,''),
(510,26,4,77,'• Phân cải tạo đất','','','2022-10-05',2,''),
(511,26,4,77,'• Ure:','','','2022-10-05',3,''),
(512,26,4,77,'• Phân DAP:','','','2022-10-05',4,''),
(513,26,4,77,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(514,26,4,77,'• Phân Khác:','','','2022-10-05',6,''),
(515,26,4,78,'• Phân hữu cơ:','','','2022-10-28',1,''),
(516,26,4,78,'• Phân cải tạo đất','','','2022-10-28',2,''),
(517,26,4,78,'• Ure:','','','2022-10-28',3,''),
(518,26,4,78,'• Phân DAP:','','','2022-10-28',4,''),
(519,26,4,78,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(520,26,4,78,'• Phân Khác:','','','2022-10-28',6,''),
(521,27,4,79,'• Phân hữu cơ:','','','2022-09-25',1,''),
(522,27,4,79,'• Phân cải tạo đất','','','2022-09-25',2,''),
(523,27,4,79,'• Ure:','3.8 kg','','2022-09-25',3,''),
(524,27,4,79,'• Phân Lân:','','','2022-09-25',4,''),
(525,27,4,79,'• Phân Kali:','','','2022-09-25',5,''),
(526,27,4,79,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(527,27,4,79,'• Phân NPK:','','','2022-09-25',7,''),
(528,27,4,79,'• Phân Khác:','','','2022-09-25',8,''),
(529,27,4,80,'• Phân hữu cơ:','','','2022-10-05',1,''),
(530,27,4,80,'• Phân cải tạo đất','','','2022-10-05',2,''),
(531,27,4,80,'• Ure:','','','2022-10-05',3,''),
(532,27,4,80,'• Phân DAP:','','','2022-10-05',4,''),
(533,27,4,80,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(534,27,4,80,'• Phân Khác:','','','2022-10-05',6,''),
(535,27,4,81,'• Phân hữu cơ:','','','2022-10-28',1,''),
(536,27,4,81,'• Phân cải tạo đất','','','2022-10-28',2,''),
(537,27,4,81,'• Ure:','','','2022-10-28',3,''),
(538,27,4,81,'• Phân DAP:','','','2022-10-28',4,''),
(539,27,4,81,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(540,27,4,81,'• Phân Khác:','','','2022-10-28',6,''),
(541,28,4,82,'• Phân hữu cơ:','','','2022-09-25',1,''),
(542,28,4,82,'• Phân cải tạo đất','','','2022-09-25',2,''),
(543,28,4,82,'• Ure:','3.8 kg','','2022-09-25',3,''),
(544,28,4,82,'• Phân Lân:','','','2022-09-25',4,''),
(545,28,4,82,'• Phân Kali:','','','2022-09-25',5,''),
(546,28,4,82,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(547,28,4,82,'• Phân NPK:','','','2022-09-25',7,''),
(548,28,4,82,'• Phân Khác:','','','2022-09-25',8,''),
(549,28,4,83,'• Phân hữu cơ:','','','2022-10-05',1,''),
(550,28,4,83,'• Phân cải tạo đất','','','2022-10-05',2,''),
(551,28,4,83,'• Ure:','','','2022-10-05',3,''),
(552,28,4,83,'• Phân DAP:','','','2022-10-05',4,''),
(553,28,4,83,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(554,28,4,83,'• Phân Khác:','','','2022-10-05',6,''),
(555,28,4,84,'• Phân hữu cơ:','','','2022-10-28',1,''),
(556,28,4,84,'• Phân cải tạo đất','','','2022-10-28',2,''),
(557,28,4,84,'• Ure:','','','2022-10-28',3,''),
(558,28,4,84,'• Phân DAP:','','','2022-10-28',4,''),
(559,28,4,84,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(560,28,4,84,'• Phân Khác:','','','2022-10-28',6,''),
(561,29,4,85,'• Phân hữu cơ:','','','2022-09-25',1,''),
(562,29,4,85,'• Phân cải tạo đất','','','2022-09-25',2,''),
(563,29,4,85,'• Ure:','3.8 kg','','2022-09-25',3,''),
(564,29,4,85,'• Phân Lân:','','','2022-09-25',4,''),
(565,29,4,85,'• Phân Kali:','','','2022-09-25',5,''),
(566,29,4,85,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(567,29,4,85,'• Phân NPK:','','','2022-09-25',7,''),
(568,29,4,85,'• Phân Khác:','','','2022-09-25',8,''),
(569,29,4,86,'• Phân hữu cơ:','','','2022-10-05',1,''),
(570,29,4,86,'• Phân cải tạo đất','','','2022-10-05',2,''),
(571,29,4,86,'• Ure:','','','2022-10-05',3,''),
(572,29,4,86,'• Phân DAP:','','','2022-10-05',4,''),
(573,29,4,86,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(574,29,4,86,'• Phân Khác:','','','2022-10-05',6,''),
(575,29,4,87,'• Phân hữu cơ:','','','2022-10-28',1,''),
(576,29,4,87,'• Phân cải tạo đất','','','2022-10-28',2,''),
(577,29,4,87,'• Ure:','','','2022-10-28',3,''),
(578,29,4,87,'• Phân DAP:','','','2022-10-28',4,''),
(579,29,4,87,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(580,29,4,87,'• Phân Khác:','','','2022-10-28',6,''),
(581,30,4,88,'• Phân hữu cơ:','','','2022-09-25',1,''),
(582,30,4,88,'• Phân cải tạo đất','','','2022-09-25',2,''),
(583,30,4,88,'• Ure:','3.8 kg','','2022-09-25',3,''),
(584,30,4,88,'• Phân Lân:','','','2022-09-25',4,''),
(585,30,4,88,'• Phân Kali:','','','2022-09-25',5,''),
(586,30,4,88,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(587,30,4,88,'• Phân NPK:','','','2022-09-25',7,''),
(588,30,4,88,'• Phân Khác:','','','2022-09-25',8,''),
(589,30,4,89,'• Phân hữu cơ:','','','2022-10-05',1,''),
(590,30,4,89,'• Phân cải tạo đất','','','2022-10-05',2,''),
(591,30,4,89,'• Ure:','','','2022-10-05',3,''),
(592,30,4,89,'• Phân DAP:','','','2022-10-05',4,''),
(593,30,4,89,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(594,30,4,89,'• Phân Khác:','','','2022-10-05',6,''),
(595,30,4,90,'• Phân hữu cơ:','','','2022-10-28',1,''),
(596,30,4,90,'• Phân cải tạo đất','','','2022-10-28',2,''),
(597,30,4,90,'• Ure:','','','2022-10-28',3,''),
(598,30,4,90,'• Phân DAP:','','','2022-10-28',4,''),
(599,30,4,90,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(600,30,4,90,'• Phân Khác:','','','2022-10-28',6,''),
(601,31,4,91,'• Phân hữu cơ:','','','2022-09-25',1,''),
(602,31,4,91,'• Phân cải tạo đất','','','2022-09-25',2,''),
(603,31,4,91,'• Ure:','3.8 kg','','2022-09-25',3,''),
(604,31,4,91,'• Phân Lân:','','','2022-09-25',4,''),
(605,31,4,91,'• Phân Kali:','','','2022-09-25',5,''),
(606,31,4,91,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(607,31,4,91,'• Phân NPK:','','','2022-09-25',7,''),
(608,31,4,91,'• Phân Khác:','','','2022-09-25',8,''),
(609,31,4,92,'• Phân hữu cơ:','','','2022-10-05',1,''),
(610,31,4,92,'• Phân cải tạo đất','','','2022-10-05',2,''),
(611,31,4,92,'• Ure:','','','2022-10-05',3,''),
(612,31,4,92,'• Phân DAP:','','','2022-10-05',4,''),
(613,31,4,92,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(614,31,4,92,'• Phân Khác:','','','2022-10-05',6,''),
(615,31,4,93,'• Phân hữu cơ:','','','2022-10-28',1,''),
(616,31,4,93,'• Phân cải tạo đất','','','2022-10-28',2,''),
(617,31,4,93,'• Ure:','','','2022-10-28',3,''),
(618,31,4,93,'• Phân DAP:','','','2022-10-28',4,''),
(619,31,4,93,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(620,31,4,93,'• Phân Khác:','','','2022-10-28',6,''),
(621,32,4,94,'• Phân hữu cơ:','','','2022-09-25',1,''),
(622,32,4,94,'• Phân cải tạo đất','','','2022-09-25',2,''),
(623,32,4,94,'• Ure:','3.8 kg','','2022-09-25',3,''),
(624,32,4,94,'• Phân Lân:','','','2022-09-25',4,''),
(625,32,4,94,'• Phân Kali:','','','2022-09-25',5,''),
(626,32,4,94,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(627,32,4,94,'• Phân NPK:','','','2022-09-25',7,''),
(628,32,4,94,'• Phân Khác:','','','2022-09-25',8,''),
(629,32,4,95,'• Phân hữu cơ:','','','2022-10-05',1,''),
(630,32,4,95,'• Phân cải tạo đất','','','2022-10-05',2,''),
(631,32,4,95,'• Ure:','','','2022-10-05',3,''),
(632,32,4,95,'• Phân DAP:','','','2022-10-05',4,''),
(633,32,4,95,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(634,32,4,95,'• Phân Khác:','','','2022-10-05',6,''),
(635,32,4,96,'• Phân hữu cơ:','','','2022-10-28',1,''),
(636,32,4,96,'• Phân cải tạo đất','','','2022-10-28',2,''),
(637,32,4,96,'• Ure:','','','2022-10-28',3,''),
(638,32,4,96,'• Phân DAP:','','','2022-10-28',4,''),
(639,32,4,96,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(640,32,4,96,'• Phân Khác:','','','2022-10-28',6,''),
(641,33,4,97,'• Phân hữu cơ:','','','2022-09-25',1,''),
(642,33,4,97,'• Phân cải tạo đất','','','2022-09-25',2,''),
(643,33,4,97,'• Ure:','3.8 kg','','2022-09-25',3,''),
(644,33,4,97,'• Phân Lân:','','','2022-09-25',4,''),
(645,33,4,97,'• Phân Kali:','','','2022-09-25',5,''),
(646,33,4,97,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(647,33,4,97,'• Phân NPK:','','','2022-09-25',7,''),
(648,33,4,97,'• Phân Khác:','','','2022-09-25',8,''),
(649,33,4,98,'• Phân hữu cơ:','','','2022-10-05',1,''),
(650,33,4,98,'• Phân cải tạo đất','','','2022-10-05',2,''),
(651,33,4,98,'• Ure:','','','2022-10-05',3,''),
(652,33,4,98,'• Phân DAP:','','','2022-10-05',4,''),
(653,33,4,98,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(654,33,4,98,'• Phân Khác:','','','2022-10-05',6,''),
(655,33,4,99,'• Phân hữu cơ:','','','2022-10-28',1,''),
(656,33,4,99,'• Phân cải tạo đất','','','2022-10-28',2,''),
(657,33,4,99,'• Ure:','','','2022-10-28',3,''),
(658,33,4,99,'• Phân DAP:','','','2022-10-28',4,''),
(659,33,4,99,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(660,33,4,99,'• Phân Khác:','','','2022-10-28',6,''),
(661,34,4,100,'• Phân hữu cơ:','','','2022-09-25',1,''),
(662,34,4,100,'• Phân cải tạo đất','','','2022-09-25',2,''),
(663,34,4,100,'• Ure:','3.8 kg','','2022-09-25',3,''),
(664,34,4,100,'• Phân Lân:','','','2022-09-25',4,''),
(665,34,4,100,'• Phân Kali:','','','2022-09-25',5,''),
(666,34,4,100,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(667,34,4,100,'• Phân NPK:','','','2022-09-25',7,''),
(668,34,4,100,'• Phân Khác:','','','2022-09-25',8,''),
(669,34,4,101,'• Phân hữu cơ:','','','2022-10-05',1,''),
(670,34,4,101,'• Phân cải tạo đất','','','2022-10-05',2,''),
(671,34,4,101,'• Ure:','','','2022-10-05',3,''),
(672,34,4,101,'• Phân DAP:','','','2022-10-05',4,''),
(673,34,4,101,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(674,34,4,101,'• Phân Khác:','','','2022-10-05',6,''),
(675,34,4,102,'• Phân hữu cơ:','','','2022-10-28',1,''),
(676,34,4,102,'• Phân cải tạo đất','','','2022-10-28',2,''),
(677,34,4,102,'• Ure:','','','2022-10-28',3,''),
(678,34,4,102,'• Phân DAP:','','','2022-10-28',4,''),
(679,34,4,102,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(680,34,4,102,'• Phân Khác:','','','2022-10-28',6,''),
(681,35,4,103,'• Phân hữu cơ:','','','2022-09-25',1,''),
(682,35,4,103,'• Phân cải tạo đất','','','2022-09-25',2,''),
(683,35,4,103,'• Ure:','3.8 kg','','2022-09-25',3,''),
(684,35,4,103,'• Phân Lân:','','','2022-09-25',4,''),
(685,35,4,103,'• Phân Kali:','','','2022-09-25',5,''),
(686,35,4,103,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(687,35,4,103,'• Phân NPK:','','','2022-09-25',7,''),
(688,35,4,103,'• Phân Khác:','','','2022-09-25',8,''),
(689,35,4,104,'• Phân hữu cơ:','','','2022-10-05',1,''),
(690,35,4,104,'• Phân cải tạo đất','','','2022-10-05',2,''),
(691,35,4,104,'• Ure:','','','2022-10-05',3,''),
(692,35,4,104,'• Phân DAP:','','','2022-10-05',4,''),
(693,35,4,104,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(694,35,4,104,'• Phân Khác:','','','2022-10-05',6,''),
(695,35,4,105,'• Phân hữu cơ:','','','2022-10-28',1,''),
(696,35,4,105,'• Phân cải tạo đất','','','2022-10-28',2,''),
(697,35,4,105,'• Ure:','','','2022-10-28',3,''),
(698,35,4,105,'• Phân DAP:','','','2022-10-28',4,''),
(699,35,4,105,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(700,35,4,105,'• Phân Khác:','','','2022-10-28',6,''),
(701,36,4,106,'• Phân hữu cơ:','','','2022-09-25',1,''),
(702,36,4,106,'• Phân cải tạo đất','','','2022-09-25',2,''),
(703,36,4,106,'• Ure:','3.8 kg','','2022-09-25',3,''),
(704,36,4,106,'• Phân Lân:','','','2022-09-25',4,''),
(705,36,4,106,'• Phân Kali:','','','2022-09-25',5,''),
(706,36,4,106,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(707,36,4,106,'• Phân NPK:','','','2022-09-25',7,''),
(708,36,4,106,'• Phân Khác:','','','2022-09-25',8,''),
(709,36,4,107,'• Phân hữu cơ:','','','2022-10-05',1,''),
(710,36,4,107,'• Phân cải tạo đất','','','2022-10-05',2,''),
(711,36,4,107,'• Ure:','','','2022-10-05',3,''),
(712,36,4,107,'• Phân DAP:','','','2022-10-05',4,''),
(713,36,4,107,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(714,36,4,107,'• Phân Khác:','','','2022-10-05',6,''),
(715,36,4,108,'• Phân hữu cơ:','','','2022-10-28',1,''),
(716,36,4,108,'• Phân cải tạo đất','','','2022-10-28',2,''),
(717,36,4,108,'• Ure:','','','2022-10-28',3,''),
(718,36,4,108,'• Phân DAP:','','','2022-10-28',4,''),
(719,36,4,108,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(720,36,4,108,'• Phân Khác:','','','2022-10-28',6,''),
(721,37,4,109,'• Phân hữu cơ:','','','2022-09-25',1,''),
(722,37,4,109,'• Phân cải tạo đất','','','2022-09-25',2,''),
(723,37,4,109,'• Ure:','3.8 kg','','2022-09-25',3,''),
(724,37,4,109,'• Phân Lân:','','','2022-09-25',4,''),
(725,37,4,109,'• Phân Kali:','','','2022-09-25',5,''),
(726,37,4,109,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(727,37,4,109,'• Phân NPK:','','','2022-09-25',7,''),
(728,37,4,109,'• Phân Khác:','','','2022-09-25',8,''),
(729,37,4,110,'• Phân hữu cơ:','','','2022-10-05',1,''),
(730,37,4,110,'• Phân cải tạo đất','','','2022-10-05',2,''),
(731,37,4,110,'• Ure:','','','2022-10-05',3,''),
(732,37,4,110,'• Phân DAP:','','','2022-10-05',4,''),
(733,37,4,110,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(734,37,4,110,'• Phân Khác:','','','2022-10-05',6,''),
(735,37,4,111,'• Phân hữu cơ:','','','2022-10-28',1,''),
(736,37,4,111,'• Phân cải tạo đất','','','2022-10-28',2,''),
(737,37,4,111,'• Ure:','','','2022-10-28',3,''),
(738,37,4,111,'• Phân DAP:','','','2022-10-28',4,''),
(739,37,4,111,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(740,37,4,111,'• Phân Khác:','','','2022-10-28',6,''),
(741,38,4,112,'• Phân hữu cơ:','','','2022-09-25',1,''),
(742,38,4,112,'• Phân cải tạo đất','','','2022-09-25',2,''),
(743,38,4,112,'• Ure:','3.8 kg','','2022-09-25',3,''),
(744,38,4,112,'• Phân Lân:','','','2022-09-25',4,''),
(745,38,4,112,'• Phân Kali:','','','2022-09-25',5,''),
(746,38,4,112,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(747,38,4,112,'• Phân NPK:','','','2022-09-25',7,''),
(748,38,4,112,'• Phân Khác:','','','2022-09-25',8,''),
(749,38,4,113,'• Phân hữu cơ:','','','2022-10-05',1,''),
(750,38,4,113,'• Phân cải tạo đất','','','2022-10-05',2,''),
(751,38,4,113,'• Ure:','','','2022-10-05',3,''),
(752,38,4,113,'• Phân DAP:','','','2022-10-05',4,''),
(753,38,4,113,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(754,38,4,113,'• Phân Khác:','','','2022-10-05',6,''),
(755,38,4,114,'• Phân hữu cơ:','','','2022-10-28',1,''),
(756,38,4,114,'• Phân cải tạo đất','','','2022-10-28',2,''),
(757,38,4,114,'• Ure:','','','2022-10-28',3,''),
(758,38,4,114,'• Phân DAP:','','','2022-10-28',4,''),
(759,38,4,114,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(760,38,4,114,'• Phân Khác:','','','2022-10-28',6,''),
(761,39,4,115,'• Phân hữu cơ:','','','2022-09-25',1,''),
(762,39,4,115,'• Phân cải tạo đất','','','2022-09-25',2,''),
(763,39,4,115,'• Ure:','3.8 kg','','2022-09-25',3,''),
(764,39,4,115,'• Phân Lân:','','','2022-09-25',4,''),
(765,39,4,115,'• Phân Kali:','','','2022-09-25',5,''),
(766,39,4,115,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(767,39,4,115,'• Phân NPK:','','','2022-09-25',7,''),
(768,39,4,115,'• Phân Khác:','','','2022-09-25',8,''),
(769,39,4,116,'• Phân hữu cơ:','','','2022-10-05',1,''),
(770,39,4,116,'• Phân cải tạo đất','','','2022-10-05',2,''),
(771,39,4,116,'• Ure:','','','2022-10-05',3,''),
(772,39,4,116,'• Phân DAP:','','','2022-10-05',4,''),
(773,39,4,116,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(774,39,4,116,'• Phân Khác:','','','2022-10-05',6,''),
(775,39,4,117,'• Phân hữu cơ:','','','2022-10-28',1,''),
(776,39,4,117,'• Phân cải tạo đất','','','2022-10-28',2,''),
(777,39,4,117,'• Ure:','','','2022-10-28',3,''),
(778,39,4,117,'• Phân DAP:','','','2022-10-28',4,''),
(779,39,4,117,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(780,39,4,117,'• Phân Khác:','','','2022-10-28',6,''),
(781,40,4,118,'• Phân hữu cơ:','','','2022-09-25',1,''),
(782,40,4,118,'• Phân cải tạo đất','','','2022-09-25',2,''),
(783,40,4,118,'• Ure:','3.8 kg','','2022-09-25',3,''),
(784,40,4,118,'• Phân Lân:','','','2022-09-25',4,''),
(785,40,4,118,'• Phân Kali:','','','2022-09-25',5,''),
(786,40,4,118,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(787,40,4,118,'• Phân NPK:','','','2022-09-25',7,''),
(788,40,4,118,'• Phân Khác:','','','2022-09-25',8,''),
(789,40,4,119,'• Phân hữu cơ:','','','2022-10-05',1,''),
(790,40,4,119,'• Phân cải tạo đất','','','2022-10-05',2,''),
(791,40,4,119,'• Ure:','','','2022-10-05',3,''),
(792,40,4,119,'• Phân DAP:','','','2022-10-05',4,''),
(793,40,4,119,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(794,40,4,119,'• Phân Khác:','','','2022-10-05',6,''),
(795,40,4,120,'• Phân hữu cơ:','','','2022-10-28',1,''),
(796,40,4,120,'• Phân cải tạo đất','','','2022-10-28',2,''),
(797,40,4,120,'• Ure:','','','2022-10-28',3,''),
(798,40,4,120,'• Phân DAP:','','','2022-10-28',4,''),
(799,40,4,120,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(800,40,4,120,'• Phân Khác:','','','2022-10-28',6,''),
(801,41,4,121,'• Phân hữu cơ:','','','2022-09-25',1,''),
(802,41,4,121,'• Phân cải tạo đất','','','2022-09-25',2,''),
(803,41,4,121,'• Ure:','3.8 kg','','2022-09-25',3,''),
(804,41,4,121,'• Phân Lân:','','','2022-09-25',4,''),
(805,41,4,121,'• Phân Kali:','','','2022-09-25',5,''),
(806,41,4,121,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(807,41,4,121,'• Phân NPK:','','','2022-09-25',7,''),
(808,41,4,121,'• Phân Khác:','','','2022-09-25',8,''),
(809,41,4,122,'• Phân hữu cơ:','','','2022-10-05',1,''),
(810,41,4,122,'• Phân cải tạo đất','','','2022-10-05',2,''),
(811,41,4,122,'• Ure:','','','2022-10-05',3,''),
(812,41,4,122,'• Phân DAP:','','','2022-10-05',4,''),
(813,41,4,122,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(814,41,4,122,'• Phân Khác:','','','2022-10-05',6,''),
(815,41,4,123,'• Phân hữu cơ:','','','2022-10-28',1,''),
(816,41,4,123,'• Phân cải tạo đất','','','2022-10-28',2,''),
(817,41,4,123,'• Ure:','','','2022-10-28',3,''),
(818,41,4,123,'• Phân DAP:','','','2022-10-28',4,''),
(819,41,4,123,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(820,41,4,123,'• Phân Khác:','','','2022-10-28',6,''),
(821,42,4,124,'• Phân hữu cơ:','','','2022-09-25',1,''),
(822,42,4,124,'• Phân cải tạo đất','','','2022-09-25',2,''),
(823,42,4,124,'• Ure:','3.8 kg','','2022-09-25',3,''),
(824,42,4,124,'• Phân Lân:','','','2022-09-25',4,''),
(825,42,4,124,'• Phân Kali:','','','2022-09-25',5,''),
(826,42,4,124,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(827,42,4,124,'• Phân NPK:','','','2022-09-25',7,''),
(828,42,4,124,'• Phân Khác:','','','2022-09-25',8,''),
(829,42,4,125,'• Phân hữu cơ:','','','2022-10-05',1,''),
(830,42,4,125,'• Phân cải tạo đất','','','2022-10-05',2,''),
(831,42,4,125,'• Ure:','','','2022-10-05',3,''),
(832,42,4,125,'• Phân DAP:','','','2022-10-05',4,''),
(833,42,4,125,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(834,42,4,125,'• Phân Khác:','','','2022-10-05',6,''),
(835,42,4,126,'• Phân hữu cơ:','','','2022-10-28',1,''),
(836,42,4,126,'• Phân cải tạo đất','','','2022-10-28',2,''),
(837,42,4,126,'• Ure:','','','2022-10-28',3,''),
(838,42,4,126,'• Phân DAP:','','','2022-10-28',4,''),
(839,42,4,126,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(840,42,4,126,'• Phân Khác:','','','2022-10-28',6,''),
(841,43,4,127,'• Phân hữu cơ:','','','2022-09-25',1,''),
(842,43,4,127,'• Phân cải tạo đất','','','2022-09-25',2,''),
(843,43,4,127,'• Ure:','3.8 kg','','2022-09-25',3,''),
(844,43,4,127,'• Phân Lân:','','','2022-09-25',4,''),
(845,43,4,127,'• Phân Kali:','','','2022-09-25',5,''),
(846,43,4,127,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(847,43,4,127,'• Phân NPK:','','','2022-09-25',7,''),
(848,43,4,127,'• Phân Khác:','','','2022-09-25',8,''),
(849,43,4,128,'• Phân hữu cơ:','','','2022-10-05',1,''),
(850,43,4,128,'• Phân cải tạo đất','','','2022-10-05',2,''),
(851,43,4,128,'• Ure:','','','2022-10-05',3,''),
(852,43,4,128,'• Phân DAP:','','','2022-10-05',4,''),
(853,43,4,128,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(854,43,4,128,'• Phân Khác:','','','2022-10-05',6,''),
(855,43,4,129,'• Phân hữu cơ:','','','2022-10-28',1,''),
(856,43,4,129,'• Phân cải tạo đất','','','2022-10-28',2,''),
(857,43,4,129,'• Ure:','','','2022-10-28',3,''),
(858,43,4,129,'• Phân DAP:','','','2022-10-28',4,''),
(859,43,4,129,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(860,43,4,129,'• Phân Khác:','','','2022-10-28',6,''),
(861,44,4,130,'• Phân hữu cơ:','','','2022-09-25',1,''),
(862,44,4,130,'• Phân cải tạo đất','','','2022-09-25',2,''),
(863,44,4,130,'• Ure:','3.8 kg','','2022-09-25',3,''),
(864,44,4,130,'• Phân Lân:','','','2022-09-25',4,''),
(865,44,4,130,'• Phân Kali:','','','2022-09-25',5,''),
(866,44,4,130,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(867,44,4,130,'• Phân NPK:','','','2022-09-25',7,''),
(868,44,4,130,'• Phân Khác:','','','2022-09-25',8,''),
(869,44,4,131,'• Phân hữu cơ:','','','2022-10-05',1,''),
(870,44,4,131,'• Phân cải tạo đất','','','2022-10-05',2,''),
(871,44,4,131,'• Ure:','','','2022-10-05',3,''),
(872,44,4,131,'• Phân DAP:','','','2022-10-05',4,''),
(873,44,4,131,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(874,44,4,131,'• Phân Khác:','','','2022-10-05',6,''),
(875,44,4,132,'• Phân hữu cơ:','','','2022-10-28',1,''),
(876,44,4,132,'• Phân cải tạo đất','','','2022-10-28',2,''),
(877,44,4,132,'• Ure:','','','2022-10-28',3,''),
(878,44,4,132,'• Phân DAP:','','','2022-10-28',4,''),
(879,44,4,132,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(880,44,4,132,'• Phân Khác:','','','2022-10-28',6,''),
(881,45,4,133,'• Phân hữu cơ:','','','2022-09-25',1,''),
(882,45,4,133,'• Phân cải tạo đất','','','2022-09-25',2,''),
(883,45,4,133,'• Ure:','3.8 kg','','2022-09-25',3,''),
(884,45,4,133,'• Phân Lân:','','','2022-09-25',4,''),
(885,45,4,133,'• Phân Kali:','','','2022-09-25',5,''),
(886,45,4,133,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(887,45,4,133,'• Phân NPK:','','','2022-09-25',7,''),
(888,45,4,133,'• Phân Khác:','','','2022-09-25',8,''),
(889,45,4,134,'• Phân hữu cơ:','','','2022-10-05',1,''),
(890,45,4,134,'• Phân cải tạo đất','','','2022-10-05',2,''),
(891,45,4,134,'• Ure:','','','2022-10-05',3,''),
(892,45,4,134,'• Phân DAP:','','','2022-10-05',4,''),
(893,45,4,134,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(894,45,4,134,'• Phân Khác:','','','2022-10-05',6,''),
(895,45,4,135,'• Phân hữu cơ:','','','2022-10-28',1,''),
(896,45,4,135,'• Phân cải tạo đất','','','2022-10-28',2,''),
(897,45,4,135,'• Ure:','','','2022-10-28',3,''),
(898,45,4,135,'• Phân DAP:','','','2022-10-28',4,''),
(899,45,4,135,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(900,45,4,135,'• Phân Khác:','','','2022-10-28',6,''),
(901,46,4,136,'• Phân hữu cơ:','','','2022-09-25',1,''),
(902,46,4,136,'• Phân cải tạo đất','','','2022-09-25',2,''),
(903,46,4,136,'• Ure:','3.8 kg','','2022-09-25',3,''),
(904,46,4,136,'• Phân Lân:','','','2022-09-25',4,''),
(905,46,4,136,'• Phân Kali:','','','2022-09-25',5,''),
(906,46,4,136,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(907,46,4,136,'• Phân NPK:','','','2022-09-25',7,''),
(908,46,4,136,'• Phân Khác:','','','2022-09-25',8,''),
(909,46,4,137,'• Phân hữu cơ:','','','2022-10-05',1,''),
(910,46,4,137,'• Phân cải tạo đất','','','2022-10-05',2,''),
(911,46,4,137,'• Ure:','','','2022-10-05',3,''),
(912,46,4,137,'• Phân DAP:','','','2022-10-05',4,''),
(913,46,4,137,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(914,46,4,137,'• Phân Khác:','','','2022-10-05',6,''),
(915,46,4,138,'• Phân hữu cơ:','','','2022-10-28',1,''),
(916,46,4,138,'• Phân cải tạo đất','','','2022-10-28',2,''),
(917,46,4,138,'• Ure:','','','2022-10-28',3,''),
(918,46,4,138,'• Phân DAP:','','','2022-10-28',4,''),
(919,46,4,138,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(920,46,4,138,'• Phân Khác:','','','2022-10-28',6,''),
(921,47,4,139,'• Phân hữu cơ:','','','2022-09-25',1,''),
(922,47,4,139,'• Phân cải tạo đất','','','2022-09-25',2,''),
(923,47,4,139,'• Ure:','3.8 kg','','2022-09-25',3,''),
(924,47,4,139,'• Phân Lân:','','','2022-09-25',4,''),
(925,47,4,139,'• Phân Kali:','','','2022-09-25',5,''),
(926,47,4,139,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(927,47,4,139,'• Phân NPK:','','','2022-09-25',7,''),
(928,47,4,139,'• Phân Khác:','','','2022-09-25',8,''),
(929,47,4,140,'• Phân hữu cơ:','','','2022-10-05',1,''),
(930,47,4,140,'• Phân cải tạo đất','','','2022-10-05',2,''),
(931,47,4,140,'• Ure:','','','2022-10-05',3,''),
(932,47,4,140,'• Phân DAP:','','','2022-10-05',4,''),
(933,47,4,140,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(934,47,4,140,'• Phân Khác:','','','2022-10-05',6,''),
(935,47,4,141,'• Phân hữu cơ:','','','2022-10-28',1,''),
(936,47,4,141,'• Phân cải tạo đất','','','2022-10-28',2,''),
(937,47,4,141,'• Ure:','','','2022-10-28',3,''),
(938,47,4,141,'• Phân DAP:','','','2022-10-28',4,''),
(939,47,4,141,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(940,47,4,141,'• Phân Khác:','','','2022-10-28',6,''),
(941,48,4,142,'• Phân hữu cơ:','','','2022-09-25',1,''),
(942,48,4,142,'• Phân cải tạo đất','','','2022-09-25',2,''),
(943,48,4,142,'• Ure:','3.8 kg','','2022-09-25',3,''),
(944,48,4,142,'• Phân Lân:','','','2022-09-25',4,''),
(945,48,4,142,'• Phân Kali:','','','2022-09-25',5,''),
(946,48,4,142,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(947,48,4,142,'• Phân NPK:','','','2022-09-25',7,''),
(948,48,4,142,'• Phân Khác:','','','2022-09-25',8,''),
(949,48,4,143,'• Phân hữu cơ:','','','2022-10-05',1,''),
(950,48,4,143,'• Phân cải tạo đất','','','2022-10-05',2,''),
(951,48,4,143,'• Ure:','','','2022-10-05',3,''),
(952,48,4,143,'• Phân DAP:','','','2022-10-05',4,''),
(953,48,4,143,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(954,48,4,143,'• Phân Khác:','','','2022-10-05',6,''),
(955,48,4,144,'• Phân hữu cơ:','','','2022-10-28',1,''),
(956,48,4,144,'• Phân cải tạo đất','','','2022-10-28',2,''),
(957,48,4,144,'• Ure:','','','2022-10-28',3,''),
(958,48,4,144,'• Phân DAP:','','','2022-10-28',4,''),
(959,48,4,144,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(960,48,4,144,'• Phân Khác:','','','2022-10-28',6,''),
(961,49,4,145,'• Phân hữu cơ:','','','2022-09-25',1,''),
(962,49,4,145,'• Phân cải tạo đất','','','2022-09-25',2,''),
(963,49,4,145,'• Ure:','3.8 kg','','2022-09-25',3,''),
(964,49,4,145,'• Phân Lân:','','','2022-09-25',4,''),
(965,49,4,145,'• Phân Kali:','','','2022-09-25',5,''),
(966,49,4,145,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(967,49,4,145,'• Phân NPK:','','','2022-09-25',7,''),
(968,49,4,145,'• Phân Khác:','','','2022-09-25',8,''),
(969,49,4,146,'• Phân hữu cơ:','','','2022-10-05',1,''),
(970,49,4,146,'• Phân cải tạo đất','','','2022-10-05',2,''),
(971,49,4,146,'• Ure:','','','2022-10-05',3,''),
(972,49,4,146,'• Phân DAP:','','','2022-10-05',4,''),
(973,49,4,146,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(974,49,4,146,'• Phân Khác:','','','2022-10-05',6,''),
(975,49,4,147,'• Phân hữu cơ:','','','2022-10-28',1,''),
(976,49,4,147,'• Phân cải tạo đất','','','2022-10-28',2,''),
(977,49,4,147,'• Ure:','','','2022-10-28',3,''),
(978,49,4,147,'• Phân DAP:','','','2022-10-28',4,''),
(979,49,4,147,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(980,49,4,147,'• Phân Khác:','','','2022-10-28',6,''),
(981,50,4,148,'• Phân hữu cơ:','','','2022-09-25',1,''),
(982,50,4,148,'• Phân cải tạo đất','','','2022-09-25',2,''),
(983,50,4,148,'• Ure:','3.8 kg','','2022-09-25',3,''),
(984,50,4,148,'• Phân Lân:','','','2022-09-25',4,''),
(985,50,4,148,'• Phân Kali:','','','2022-09-25',5,''),
(986,50,4,148,'• Phân DAP:','2.5 kg','','2022-09-25',6,''),
(987,50,4,148,'• Phân NPK:','','','2022-09-25',7,''),
(988,50,4,148,'• Phân Khác:','','','2022-09-25',8,''),
(989,50,4,149,'• Phân hữu cơ:','','','2022-10-05',1,''),
(990,50,4,149,'• Phân cải tạo đất','','','2022-10-05',2,''),
(991,50,4,149,'• Ure:','','','2022-10-05',3,''),
(992,50,4,149,'• Phân DAP:','','','2022-10-05',4,''),
(993,50,4,149,'• Phân NPK:','11.5 kg','','2022-10-05',5,''),
(994,50,4,149,'• Phân Khác:','','','2022-10-05',6,''),
(995,50,4,150,'• Phân hữu cơ:','','','2022-10-28',1,''),
(996,50,4,150,'• Phân cải tạo đất','','','2022-10-28',2,''),
(997,50,4,150,'• Ure:','','','2022-10-28',3,''),
(998,50,4,150,'• Phân DAP:','','','2022-10-28',4,''),
(999,50,4,150,'• Phân NPK:','11.5 kg','','2022-10-28',5,''),
(1000,50,4,150,'• Phân Khác:','','','2022-10-28',6,'');

/*Table structure for table `sudungthuoc` */

DROP TABLE IF EXISTS `sudungthuoc`;

CREATE TABLE `sudungthuoc` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
  `IDNHATKY` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sudungthuoc` */

insert  into `sudungthuoc`(`ID`,`IDVUNGTRONG`,`IDNHATKY`,`TENTHUOC`,`GIATRI`,`SOLUONG`,`CACHSUDUNG`,`NGAYTHUCHIEN`,`GHICHU`) values 
(1,1,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(2,1,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(3,1,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(4,1,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(5,1,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(6,1,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(7,1,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(8,1,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(9,2,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(10,2,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(11,2,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(12,2,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(13,2,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(14,2,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(15,2,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(16,2,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(17,3,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(18,3,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(19,3,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(20,3,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(21,3,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(22,3,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(23,3,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(24,3,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(25,4,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(26,4,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(27,4,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(28,4,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(29,4,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(30,4,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(31,4,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(32,4,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(33,5,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(34,5,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(35,5,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(36,5,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(37,5,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(38,5,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(39,5,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(40,5,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(41,6,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(42,6,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(43,6,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(44,6,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(45,6,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(46,6,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(47,6,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(48,6,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(49,7,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(50,7,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(51,7,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(52,7,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(53,7,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(54,7,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(55,7,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(56,7,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(57,8,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(58,8,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(59,8,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(60,8,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(61,8,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(62,8,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(63,8,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(64,8,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(65,9,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(66,9,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(67,9,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(68,9,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(69,9,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(70,9,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(71,9,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(72,9,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(73,10,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(74,10,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(75,10,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(76,10,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(77,10,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(78,10,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(79,10,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(80,10,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(81,11,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(82,11,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(83,11,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(84,11,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(85,11,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(86,11,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(87,11,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(88,11,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(89,12,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(90,12,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(91,12,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(92,12,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(93,12,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(94,12,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(95,12,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(96,12,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(97,13,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(98,13,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(99,13,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(100,13,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(101,13,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(102,13,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(103,13,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(104,13,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(105,14,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(106,14,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(107,14,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(108,14,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(109,14,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(110,14,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(111,14,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(112,14,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(113,15,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(114,15,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(115,15,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(116,15,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(117,15,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(118,15,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(119,15,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(120,15,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(121,16,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(122,16,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(123,16,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(124,16,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(125,16,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(126,16,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(127,16,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(128,16,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(129,17,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(130,17,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(131,17,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(132,17,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(133,17,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(134,17,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(135,17,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(136,17,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(137,18,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(138,18,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(139,18,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(140,18,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(141,18,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(142,18,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(143,18,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(144,18,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(145,19,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(146,19,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(147,19,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(148,19,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(149,19,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(150,19,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(151,19,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(152,19,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(153,20,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(154,20,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(155,20,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(156,20,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(157,20,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(158,20,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(159,20,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(160,20,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(161,21,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(162,21,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(163,21,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(164,21,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(165,21,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(166,21,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(167,21,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(168,21,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(169,22,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(170,22,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(171,22,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(172,22,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(173,22,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(174,22,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(175,22,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(176,22,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(177,23,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(178,23,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(179,23,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(180,23,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(181,23,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(182,23,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(183,23,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(184,23,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(185,24,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(186,24,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(187,24,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(188,24,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(189,24,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(190,24,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(191,24,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(192,24,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(193,25,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(194,25,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(195,25,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(196,25,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(197,25,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(198,25,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(199,25,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(200,25,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(201,26,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(202,26,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(203,26,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(204,26,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(205,26,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(206,26,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(207,26,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(208,26,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(209,27,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(210,27,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(211,27,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(212,27,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(213,27,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(214,27,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(215,27,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(216,27,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(217,28,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(218,28,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(219,28,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(220,28,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(221,28,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(222,28,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(223,28,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(224,28,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(225,29,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(226,29,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(227,29,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(228,29,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(229,29,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(230,29,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(231,29,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(232,29,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(233,30,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(234,30,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(235,30,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(236,30,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(237,30,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(238,30,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(239,30,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(240,30,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(241,31,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(242,31,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(243,31,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(244,31,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(245,31,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(246,31,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(247,31,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(248,31,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(249,32,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(250,32,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(251,32,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(252,32,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(253,32,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(254,32,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(255,32,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(256,32,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(257,33,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(258,33,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(259,33,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(260,33,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(261,33,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(262,33,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(263,33,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(264,33,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(265,34,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(266,34,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(267,34,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(268,34,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(269,34,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(270,34,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(271,34,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(272,34,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(273,35,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(274,35,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(275,35,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(276,35,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(277,35,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(278,35,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(279,35,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(280,35,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(281,36,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(282,36,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(283,36,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(284,36,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(285,36,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(286,36,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(287,36,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(288,36,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(289,37,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(290,37,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(291,37,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(292,37,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(293,37,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(294,37,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(295,37,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(296,37,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(297,38,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(298,38,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(299,38,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(300,38,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(301,38,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(302,38,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(303,38,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(304,38,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(305,39,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(306,39,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(307,39,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(308,39,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(309,39,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(310,39,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(311,39,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(312,39,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(313,40,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(314,40,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(315,40,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(316,40,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(317,40,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(318,40,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(319,40,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(320,40,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(321,41,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(322,41,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(323,41,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(324,41,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(325,41,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(326,41,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(327,41,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(328,41,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(329,42,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(330,42,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(331,42,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(332,42,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(333,42,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(334,42,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(335,42,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(336,42,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(337,43,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(338,43,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(339,43,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(340,43,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(341,43,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(342,43,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(343,43,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(344,43,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(345,44,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(346,44,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(347,44,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(348,44,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(349,44,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(350,44,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(351,44,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(352,44,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(353,45,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(354,45,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(355,45,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(356,45,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(357,45,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(358,45,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(359,45,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(360,45,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(361,46,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(362,46,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(363,46,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(364,46,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(365,46,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(366,46,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(367,46,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(368,46,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(369,47,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(370,47,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(371,47,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(372,47,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(373,47,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(374,47,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(375,47,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(376,47,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(377,48,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(378,48,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(379,48,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(380,48,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(381,48,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(382,48,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(383,48,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(384,48,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(385,49,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(386,49,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(387,49,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(388,49,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(389,49,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(390,49,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(391,49,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(392,49,5,'+ Phun theo thời điểm:','','','','2022-11-22',''),
(393,50,5,'+ Thuốc trừ ốc:','','','200 lit/lần/ha.','2022-09-17',''),
(394,50,5,'+ Thuốc trừ cỏ:','','','200 lit/lần/ha.','2022-09-21',''),
(395,50,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-02',''),
(396,50,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-11-22',''),
(397,50,5,'+ Thuốc trừ bệnh:','','','200 lit/lần/ha.','2022-12-07',''),
(398,50,5,'+ Phối hợp thuốc (trừ sâu - bệnh):','','','200 lit/lần/ha.','2022-11-02',''),
(399,50,5,'+ Phối hợp thuốc (trừ rầy - bệnh):','','','200 lit/lần/ha.','2022-11-22',''),
(400,50,5,'+ Phun theo thời điểm:','','','','2022-11-22','');

/*Table structure for table `tennongho` */

DROP TABLE IF EXISTS `tennongho`;

CREATE TABLE `tennongho` (
  `ID` int DEFAULT NULL,
  `IDVUNGTRONG` int DEFAULT NULL,
  `HOTEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIENTICH` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SANLUONGDUKIEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(205) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int DEFAULT '1',
  KEY `IDVUNGTRONG` (`IDVUNGTRONG`),
  CONSTRAINT `tennongho_ibfk_1` FOREIGN KEY (`IDVUNGTRONG`) REFERENCES `dmvungtrong` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tennongho` */

/*Table structure for table `thongtinvungtrong` */

DROP TABLE IF EXISTS `thongtinvungtrong`;

CREATE TABLE `thongtinvungtrong` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDVUNGTRONG` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `thongtinvungtrong` */

insert  into `thongtinvungtrong`(`ID`,`IDVUNGTRONG`,`NGAYSANXUAT`,`DAT_DIENTICH`,`DAT_LOAIDAT`,`DAT_DOPH`,`KV_TEN`,`KV_KEHOACH`,`THUHOACH_NGAY`,`THUHOACH_SANLUONG`,`GHICHU`) values 
(1,1,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(2,2,'2022-10-20','3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(3,3,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(4,4,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(5,5,'2022-10-20','2 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(6,6,'2022-10-20','2 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(7,7,'2022-10-20','0,2 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(8,8,'2022-10-20','1,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(9,9,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(10,10,'2022-10-20','1,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(11,11,'2022-10-20','1,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(12,12,'2023-01-04','0,2 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân muộn','2023-04-06','5.2 tấn',''),
(13,13,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(14,14,'2022-10-20','0,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(15,15,'2022-10-20','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(16,16,'2023-01-11','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT vụ Đông Xuân muộn','2023-04-20','5.5 tấn',''),
(17,17,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(18,18,'2022-10-20','0,7 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(19,19,'2022-10-20','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(20,20,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(21,21,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(22,22,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(23,23,'2022-10-20','1,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(24,24,'2022-10-20','0,2 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(25,25,'2023-01-04','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân muộn','2023-04-06','5.2 tấn',''),
(26,26,'2022-10-20','0,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(27,27,'2022-10-20','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(28,28,'2022-10-20','0,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(29,29,'2022-10-20','1,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(30,30,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(31,31,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(32,32,'2022-10-20','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(33,33,'2023-01-11','0,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT vụ Đông Xuân muộn','2023-04-20','5.5 tấn',''),
(34,34,'2023-01-11','0,3 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT vụ Đông Xuân muộn','2023-04-20','5.5 tấn',''),
(35,35,'2023-01-11','2,4 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT vụ Đông Xuân muộn','2023-04-20','5.5 tấn',''),
(36,36,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(37,37,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(38,38,'2022-10-20','2 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(39,39,'2023-01-04','0,6 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân muộn','2023-04-06','5.2 tấn',''),
(40,40,'2022-10-20','1,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(41,41,'2022-10-20','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(42,42,'2022-10-20','1,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(43,43,'2022-10-20','1 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(44,44,'2022-10-20','1,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa OM5451','2023-01-01','',''),
(45,45,'2023-01-04','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa OM5451 vụ Đông Xuân muộn','2023-04-06','5.2 tấn',''),
(46,46,'2023-01-11','2,4 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT vụ Đông Xuân muộn','2023-04-20','5.5 tấn',''),
(47,47,'2022-10-20','0,9 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(48,48,'2022-10-20','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(49,49,'2022-10-20','0,5 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','',''),
(50,50,'2022-10-20','0,8 ha','cát pha sét','5.5','Khu vực sản xuất Hợp tác xã Nông nghiệp Phước An','Kế hoạch sản xuất Lúa RVT','2023-01-01','','');

/* Function  structure for function  `f_solannhatky` */

/*!50003 DROP FUNCTION IF EXISTS `f_solannhatky` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` FUNCTION `f_solannhatky`(p_idvungtrong VARCHAR(100),
	p_type VARCHAR(100)
) RETURNS varchar(1024) CHARSET utf8mb3
    READS SQL DATA
    DETERMINISTIC
BEGIN
	DECLARE v_number INT(11) DEFAULT 0;
	
	IF p_type = 1 THEN
		SELECT COUNT(ID) INTO v_number
		FROM kythuatbonphan
		WHERE p_idvungtrong = IDVUNGTRONG
		GROUP BY IDNHATKY;
	ELSE
		SELECT COUNT(ID) INTO v_number
		FROM sudungthuoc
		WHERE p_idvungtrong = IDVUNGTRONG
		GROUP BY IDNHATKY;
	END IF;
	
	RETURN CONCAT(v_number, '');
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_thongtinvungtrong` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_thongtinvungtrong` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_load_thongtinvungtrong`(
	p_idvungtrong varchar(150)
)
BEGIN
	SELECT aa.MAVUNGTRONG, aa.TENNONGHO, aa.DIACHI, aa.HOPTACXA, aa.SANPHAMTRONG, date_format(bb.NGAYSANXUAT,'%d/%m/%Y') as NGAYSANXUAT, bb.DAT_DIENTICH, bb.DAT_LOAIDAT, bb.DAT_DOPH, bb.KV_TEN, bb.KV_KEHOACH, DATE_FORMAT(bb.THUHOACH_NGAY,'%d/%m/%Y') as THUHOACH_NGAY, bb.THUHOACH_SANLUONG
	FROM dmvungtrong aa, thongtinvungtrong bb
	WHERE aa.ID = p_idvungtrong AND aa.ID = bb.IDVUNGTRONG AND bb.IDVUNGTRONG = p_idvungtrong;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_dsnhatky` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_dsnhatky` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_load_dsnhatky`(
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

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_load_listvungtrong`(
	p_iddonvi varchar(150)
)
BEGIN
	select * 
	from dmvungtrong
	where IDDONVI = p_iddonvi;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_madinhdanh` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_madinhdanh` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_get_madinhdanh`(
	p_idvungtrong VARCHAR(150)
)
BEGIN
	SELECT MAVUNGTRONG, LOAISANPHAM, MAVUNGTRONG, KV_TEN, KV_KEHOACH, HOPTACXA
	FROM dmvungtrong WHERE ID = p_idvungtrong;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_thongtinnhatky` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_thongtinnhatky` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_load_thongtinnhatky`(
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
			left join (SELECT nhatky.IDNHATKY, nhatky.IDVUNGTRONG, replace(GROUP_CONCAT('<p class="c-title3">','+ Lần: ',nhatky.STT,'</p>','<p class="c-title4">','<i class="fa fa-arrow-right"></i> Ngày thực hiện: ','</p>','<p class="c-title4">','<i class="fa fa-arrow-right"></i> ',nhatky.SUDUNGPHANBON,'</p>',nhatky.CACHSUDUNGPHANBON ORDER BY nhatky.STT),'>,<','><') AS NHATKYPHANBON
					FROM (
						SELECT (@row_n3:=@row_n3 + 1) AS STT, phanbon.IDNHATKY, phanbon.IDVUNGTRONG, phanbon.IDKYTHUATBONPHAN, phanbon.SUDUNGPHANBON, phanbon.CACHSUDUNGPHANBON, phanbon.NGAYTHUCHIEN
						FROM (
							SELECT any_value(aa.IDNHATKY) as IDNHATKY, any_value(aa.IDVUNGTRONG) as IDVUNGTRONG, aa.IDKYTHUATBONPHAN, bb.SUDUNGPHANBON, replace(GROUP_CONCAT('<p class="c-title6">',aa.TENPHANBON,' ',IFNULL(aa.SOLUONG,''),'</p>' ORDER BY aa.SAPXEP),'>,<','><') AS CACHSUDUNGPHANBON, date_format(aa.NGAYTHUCHIEN,'%d/%m/%Y') as NGAYTHUCHIEN
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
						SELECT thuocbvtv.IDNHATKY, thuocbvtv.IDVUNGTRONG, CASE WHEN SUM(thuocbvtv.SOLAN) = 0 THEN CONCAT(thuocbvtv.TENTHUOC, ' Không') ELSE CONCAT(thuocbvtv.TENTHUOC, ' ', SUM(thuocbvtv.SOLAN), ' lần') END AS TENTHUOC, CASE WHEN SUM(thuocbvtv.SOLAN) = 0 THEN '' ELSE replace(GROUP_CONCAT('<p class="c-title4">','<i class="fa fa-arrow-right"></i> Lần: ',thuocbvtv.STT,'</p>','<p class="c-title6">','• Ngày thực hiện: ','</p>','<p class="c-title6">','• Số lượng nước phun: ',thuocbvtv.CACHSUDUNGTHUOC,'</p>' ORDER BY thuocbvtv.STT),'>,<','><') end AS CACHSUDUNGTHUOCBVTV
						FROM (
							SELECT (@row_n3:=CASE WHEN @tenthuoc=aa.TENTHUOC THEN @row_n3+1 ELSE 1 END) AS STT, aa.ID, aa.IDNHATKY, aa.IDVUNGTRONG, @tenthuoc:=aa.TENTHUOC AS TENTHUOC, CASE WHEN IFNULL(aa.CACHSUDUNG,'') = '' THEN 0 ELSE COUNT(aa.TENTHUOC) END AS SOLAN,IFNULL(aa.CACHSUDUNG,'') AS CACHSUDUNGTHUOC, date_format(aa.NGAYTHUCHIEN,'%d/%m/%Y') as NGAYTHUCHIEN
							FROM sudungthuoc aa, (SELECT @row_n3:=0,@tenthuoc:='') AS temp3
							WHERE aa.IDVUNGTRONG = p_idvungtrong AND aa.IDNHATKY = p_idnhatky
							GROUP BY aa.TENTHUOC, aa.ID, aa.IDNHATKY, aa.IDVUNGTRONG, aa.NGAYTHUCHIEN
						) thuocbvtv
						GROUP BY thuocbvtv.IDNHATKY, thuocbvtv.IDVUNGTRONG, thuocbvtv.TENTHUOC
						order by any_value(thuocbvtv.ID), any_value(thuocbvtv.STT)
					) nhatky
					GROUP BY nhatky.IDNHATKY, nhatky.IDVUNGTRONG
				) sdthuoc on sdthuoc.IDVUNGTRONG = cc.IDVUNGTRONG and sdthuoc.IDVUNGTRONG = p_idvungtrong
		, loainhatky dd
		WHERE cc.IDVUNGTRONG = p_idvungtrong AND dd.ID = cc.LOAINHATKY AND cc.LOAINHATKY = p_idnhatky
		ORDER BY any_value(dd.SAPXEP), any_value(ii.SAPXEP)
	) nhatky
	GROUP BY nhatky.IDNHATKY, nhatky.IDVUNGTRONG, nhatky.SUDUNGNHATKY, nhatky.NHATKYPHANBON, nhatky.NHATKYSUDUNGTHUOC, nhatky.NGAYTHUCHIENNHATKY;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_phonenumber` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_phonenumber` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_get_phonenumber`(
	p_madinhdanh VARCHAR(200)
)
BEGIN
	SELECT MAVUNGTRONG, LOAISANPHAM, MAVUNGTRONG, KV_TEN, KV_KEHOACH, HOPTACXA, TENNONGHO, SODIENTHOAI
	FROM dmvungtrong WHERE MAVUNGTRONG = p_madinhdanh;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_check_phonenumber` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_check_phonenumber` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_check_phonenumber`(
    p_sodienthoai VARCHAR(150)
    )
BEGIN
	DECLARE v_check INT(2);
	SELECT COUNT(*) INTO v_check FROM dmvungtrong WHERE SODIENTHOAI = p_sodienthoai;
	
	IF v_check > 0 THEN
		SELECT '1' AS TRANGTHAI, SODIENTHOAI
		FROM dmvungtrong WHERE ifnull(SODIENTHOAI,'-1') = p_sodienthoai
		LIMIT 1;
	ELSE
		SELECT '0' AS TRANGTHAI, '' AS SODIENTHOAI
		FROM DUAL;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_check_codeapi` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_check_codeapi` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_check_codeapi`(
	p_idvungtrong VARCHAR(150)
)
BEGIN
	DECLARE v_check INT(3);
	
	SELECT COUNT(*) INTO v_check
	FROM dmvungtrong WHERE ID = p_idvungtrong AND (MAVUNGTRONG = ' ' OR MAVUNGTRONG = '' OR IFNULL(MAVUNGTRONG,'-1') = '-1');
	
	
	IF v_check > 0 THEN
		SELECT 0 AS result FROM DUAL;
	ELSE
		SELECT 1 AS result FROM DUAL;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_info_phonenumber` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_info_phonenumber` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`minhstg`@`%` PROCEDURE `p_get_info_phonenumber`(
	p_sodienthoai VARCHAR(150)
)
BEGIN
	SELECT MAVUNGTRONG, LOAISANPHAM, MAVUNGTRONG, KV_TEN, KV_KEHOACH, HOPTACXA
	FROM dmvungtrong WHERE SODIENTHOAI = p_sodienthoai;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
