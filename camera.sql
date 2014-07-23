-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2013 at 04:48 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `camera`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `rank` tinyint(25) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parentId`, `name`, `alias`, `rank`, `status`) VALUES
(114, 0, 'Footer', 'footer', 0, 1),
(115, 0, 'Giới thiệu', 'gioi-thieu', 0, 1),
(113, 0, 'Header', 'header', 0, 1),
(112, 0, 'Quảng cáo giữa', 'quang-cao-giua', 0, 1),
(109, 0, 'Tin tức', 'tin-tuc', 0, 1),
(110, 0, 'Giải pháp', 'giai-phap', 0, 1),
(111, 0, 'Quảng cáo phải', 'quang-cao-phai', 0, 1),
(118, 0, 'Quảng cáo bottom', 'quang-cao-bottom', 0, 1),
(119, 0, 'Quảng cáo hai bên', 'quang-cao-hai-ben', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'CO',
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `services_offered` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `star` tinyint(4) NOT NULL DEFAULT '4',
  `categoryId` int(11) NOT NULL DEFAULT '0',
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=283224 ;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doc_tab` int(10) NOT NULL,
  `doc_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doc_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doc_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `up_dated` date NOT NULL,
  `create_time` int(50) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `doc_name`, `doc_tab`, `doc_file`, `doc_type`, `doc_size`, `summary`, `up_dated`, `create_time`, `status`) VALUES
(2, 'xcccccccccccccccc', 3, '1364721044_colorbox-master.zip', 'application/zip', '1077955', 'xccccccccccccccccc', '2013-03-31', 0, 0),
(3, 'SSSSSSSSSSSSSS', 3, '1364722658_dxv.doc', 'application/msword', '28672 KB', '', '2013-03-31', 0, 0),
(4, 'ssssssssss', 3, '1364723490_bootstrap.zip', 'application/zip', '84297 bytes', '', '2013-03-31', 0, 0),
(5, 'zzxz', 3, '1364723728_netbiz.doc', 'application/msword', '28672 bytes', '', '2013-03-31', 0, 0),
(6, 'zzzzzzzzzzzzzz', 3, '1364724328_cucna.rar', 'application/rar', '6375857 bytes', '', '2013-03-31', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileId` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `url_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(50) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `fileId`, `name`, `file`, `url_file`, `size`, `status`) VALUES
(2, 1, 'xupload_demo_0.5.1', '/files/20130512/xupload_demo_0.5.1.zip', '', 0, 1),
(4, 0, 'dcccccccc', '', '', 0, 0),
(5, 1, 'Báo giá tháng 1', 'caaaâ', '', 0, 1),
(6, 1, 'Báo giá tháng 1', '', 'xzzzzzzzzzzz', 0, 0),
(7, 2, 'madison', '/files/20130520/madison.zip', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galleryId` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `create_time` int(50) NOT NULL,
  `status` smallint(1) DEFAULT '0',
  `feature` smallint(1) DEFAULT '0',
  `rank` smallint(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`galleryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=227 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `galleryId`, `name`, `image`, `create_time`, `status`, `feature`, `rank`) VALUES
(194, 20250, 'codon1_6', '/upload/20130511/codon1_6.jpg', 20130511, 1, 0, 0),
(195, 17126, 'danbo_2', '/upload/20130511/danbo_2.jpg', 20130511, 1, 0, 0),
(196, 15738, 'codon1_7', '/upload/20130511/codon1_7.jpg', 20130511, 1, 0, 0),
(197, 12938, 'codon1_8', '/upload/20130511/codon1_8.jpg', 20130511, 1, 0, 0),
(198, 9407, 'codon1_9', '/upload/20130511/codon1_9.jpg', 20130511, 1, 0, 0),
(199, 18631, 'danbo_3', '/upload/20130511/danbo_3.jpg', 20130511, 1, 0, 0),
(200, 3359, 'mamcay', '/upload/20130511/mamcay.jpg', 20130511, 1, 0, 0),
(201, 13002, 'danbo_4', '/upload/20130511/danbo_4.jpg', 20130511, 1, 0, 0),
(202, 26801, 'codon_3', '/upload/20130511/codon_3.jpg', 20130511, 1, 0, 0),
(203, 15474, 'avtech_avp325zbp_camera_avtech_AVP325ZBP_dd', '/upload/20130513/avtech_avp325zbp_camera_avtech_AVP325ZBP_dd.png', 20130513, 1, 0, 0),
(204, 4057, 'lg_l321_bp_camera_lg_L321_BP_dd', '/upload/20130513/lg_l321_bp_camera_lg_L321_BP_dd.png', 20130513, 1, 0, 0),
(205, 31248, 'bo_6_camera_questek_dang_dome_tronbo_questek_6dome_dd_1_', '/upload/20130513/bo_6_camera_questek_dang_dome_tronbo_questek_6dome_dd_1_.png', 20130513, 1, 0, 0),
(206, 26570, 'camea', '/upload/20130513/camea.png', 20130513, 1, 0, 0),
(207, 26570, 'lg_l321', '/upload/20130513/lg_l321.png', 20130513, 1, 0, 0),
(208, 26026, 'camera2', '/upload/20130513/camera2.png', 20130513, 1, 0, 0),
(209, 17946, 'dsssssssss', '/upload/20130513/dsssssssss.jpg', 20130513, 1, 0, 0),
(210, 9291, 'camre6', '/upload/20130513/camre6.png', 20130513, 1, 0, 0),
(211, 8311, 'camre6_1', '/upload/20130513/camre6_1.png', 20130513, 1, 0, 0),
(212, 25830, 'camera5', '/upload/20130513/20130513_camera5.png', 20130513, 1, 0, 0),
(213, 30027, 'fgh_1', '/upload/20130513/fgh_1.png', 20130513, 1, 0, 0),
(214, 32370, 'camea_1', '/upload/20130513/camea_1.png', 20130513, 1, 0, 0),
(215, 32370, 'camera2_1', '/upload/20130513/camera2_1.png', 20130513, 1, 0, 0),
(216, 32370, 'dsssssssss_1', '/upload/20130513/dsssssssss_1.jpg', 20130513, 1, 0, 0),
(217, 32370, 'fgh_2', '/upload/20130513/fgh_2.png', 20130513, 1, 0, 0),
(218, 15280, 'camre6_3', '/upload/20130513/camre6_3.png', 20130513, 1, 0, 0),
(219, 17091, 'hinh1', '/upload/20130513/hinh1.jpg', 20130513, 1, 0, 0),
(220, 4030, 'hinh2', '/upload/20130513/hinh2.jpg', 20130513, 1, 0, 0),
(221, 20453, 'hinh3', '/upload/20130513/hinh3.jpg', 20130513, 1, 0, 0),
(222, 20453, 'hinh3_1', '/upload/20130513/hinh3_1.jpg', 20130513, 1, 0, 0),
(223, 32344, 'hinh4', '/upload/20130513/hinh4.jpg', 20130513, 1, 0, 0),
(224, 31899, 'anigif', '/upload/20130515/anigif.gif', 20130515, 1, 0, 0),
(225, 31899, 'anigif2', '/upload/20130515/anigif2.gif', 20130515, 1, 0, 0),
(226, 28566, 'codon', '/upload/20130517/codon.jpg', 20130517, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `userId` int(100) NOT NULL,
  `categoryId` int(100) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(10) NOT NULL,
  `gender` int(2) NOT NULL,
  `working_hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cityId` int(100) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `skills` text COLLATE utf8_unicode_ci NOT NULL,
  `education` smallint(1) NOT NULL,
  `wage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `probation_period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mode` text COLLATE utf8_unicode_ci NOT NULL,
  `required` text COLLATE utf8_unicode_ci NOT NULL,
  `update_time` int(50) NOT NULL,
  `create_time` int(50) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `userId`, `categoryId`, `location`, `alias`, `number`, `gender`, `working_hours`, `cityId`, `content`, `skills`, `education`, `wage`, `job_type`, `probation_period`, `mode`, `required`, `update_time`, `create_time`, `status`) VALUES
(5, 5, 9, 'Nhân viên lập trình', '', 0, 1, '', 0, 'dcccccccccccccccccc', '', 2, 'Thỏa thuận', 'Nhân viên', '2 tháng', '', '', 1369864800, 1366969832, 1),
(6, 5, 9, 'Nhân viên PHP', 'nhan-vien-php', 0, 1, '', 0, 'âZZZZZZZZZZZZ', '', 3, '3.000.000 - 5.000.000', '', '', '', '', 1373752800, 1366971395, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titleId` int(11) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `model` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`id`, `title`, `titleId`, `alias`, `content`, `img`, `model`) VALUES
(1, 'camera hồng ngoại 2013', 5, 'san-pham/5-camera-hong-ngoai-2013', 'zzzzzzzzzzzzz', '/upload/2013-04-02/img404.jpg', 1),
(2, 'Camera IP 2013', 6, 'san-pham/6-camera-ip-2013', 'xxxxxxxxxxxx', '/upload/2013-04-02/images858911_anh__23_.jpg', 1),
(3, 'camera', 76, 'album/76-camera', 'Zxxxxxxxxxxxxx', '/upload/2013-04-02/img404.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(11) unsigned DEFAULT NULL,
  `root1` int(11) NOT NULL,
  `lft` int(11) unsigned NOT NULL,
  `rgt` int(11) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `rank` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`),
  KEY `root` (`root`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `root`, `root1`, `lft`, `rgt`, `level`, `name`, `alias`, `description`, `rank`) VALUES
(15, 15, 0, 1, 14, 1, 'Camera', 'camera', '', 1),
(16, 16, 0, 1, 2, 1, 'Thiết bị ghi hình', 'thiet-bi-ghi-hinh', '', 2),
(17, 17, 0, 1, 2, 1, 'Báo động báo cháy', 'bao-dong-bao-chay', '', 3),
(18, 18, 0, 1, 2, 1, 'Tổng đài điện thoại', 'tong-dai-dien-thoai', '', 4),
(19, 19, 0, 1, 2, 1, 'Máy chấm công', 'may-cham-cong', '', 5),
(20, 20, 0, 1, 2, 1, 'Chuông cửa có hình', 'chuong-cua-co-hinh', '', 6),
(21, 21, 0, 1, 2, 1, 'Máy bộ đàm', 'may-bo-dam', '', 7),
(22, 22, 0, 1, 2, 1, 'Thiết bị chống sét', 'thiet-bi-chong-set', '', 8),
(23, 23, 0, 1, 2, 1, 'Hộp đèn otô, xe máy', 'hop-den-oto-xe-may', '', 9),
(24, 24, 0, 1, 2, 1, 'Phụ kiện viễn thông', 'phu-kien-vien-thong', '', 11),
(31, 15, 0, 8, 9, 2, 'Camera Vantech', 'camera-vantech', '', 0),
(30, 15, 0, 6, 7, 2, 'Camera Questek', 'camera-questek', '', 0),
(28, 15, 0, 2, 5, 2, 'Camera vdtech', 'camera-vdtech', '', 0),
(32, 15, 0, 10, 11, 2, 'Camera Avtech', 'camera-avtech', '', 4),
(33, 15, 0, 12, 13, 2, 'Camera Escost', 'camera-escost', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `nick` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `name`, `phone`, `nick`, `status`) VALUES
(1, 'Huỳnh Từ Vinh', 127, 'huynhtuvinh87', 1),
(2, 'David Vinh', 905951699, 'huynhtuvinh87', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `imgId` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  `linkImg` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `content_1` text NOT NULL,
  `create_time` int(50) NOT NULL,
  `status` smallint(1) DEFAULT '0',
  `home` smallint(1) DEFAULT '0',
  `rank` smallint(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `categoryId`, `imgId`, `title`, `alias`, `image`, `linkImg`, `content`, `content_1`, `create_time`, `status`, `home`, `rank`) VALUES
(1, 112, 17091, 'Khuyến mãi mới', 'khuyen-mai-moi', 'upload/20130513/hinh1.jpg', '', 'Nội dung tóm tắt', 'Nội dung chi tiết<br />', 1368425286, 1, 0, 1),
(5, 112, 20453, 'Hình 3', 'hinh-3', 'upload/20130513/hinh3.jpg', '', '', 'Nội dung<br />', 1368425872, 1, 0, 3),
(7, 112, 1513, 'Hình 4', 'hinh-4', 'upload/20130513/hinh4.jpg', '', '', 'SXXXXXXXX', 1368426067, 1, 0, 4),
(9, 113, 282, 'Phần giới thiệu trên header', 'phan-gioi-thieu-tren-header', '', '', '', '<h4>CÔNG TY TNHH THƯƠNG MẠI &amp; DỊCH VỤ ANNNET</h4>', 1368431661, 1, 0, NULL),
(10, 114, 18827, 'Phần giới thiệu trên footer', 'phan-gioi-thieu-tren-footer', '', '', '', '<h4>CÔNG TY TNHH THƯƠNG MẠI &amp; DỊCH VỤ ANNNET<br /></h4><h6>Địa chỉ: 15 Mỹ An 19 - Q. Ngũ Hành Sơn - TP. Đà Nẵng</h6><h6>Điện thoai: 0905 951 699</h6>', 1368431868, 1, 0, NULL),
(11, 109, 0, ' Bảo mật di động và 10 lời khuyên bổ ích', 'bao-mat-di-dong-va-10-loi-khuyen-bo-ich', '', 'http://cdn.tinhte.vn/attachments/header-jpg.915324/', 'Với một ổ cứng gắn trong cùng một bộ vỏ, bạn có thể dễ dàng "chế" thành một ổ cứng gắn ngoài theo cá tính, hoặc đơn giản là tận dụng ổ cứng thừa để tạo thành phương tiện lưu trữ tiện lợi.', '<p class="html" align="justify"><span style="font-family:Arial;"><span style="font-size:13px;"><strong>Cổng giao tiếp</strong><br /><br />Hiện nay, hầu hết các ổ cứng gắn trong, thông dụng trên thị trường đều dùng cổng giao tiếp SATA. Nếu bạn có ổ cứng gắn trong cũ và muốn biến ổ cứng này thành ổ cứng gắn ngoài, hãy chú ý cổng giao tiếp. Trước đây các ổ cứng gắn trong thường dùng giao tiếp PATA (IDE), 40 chân.&nbsp;</span></span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/a-435x320.jpg" style="width: 435px; height: 320px;" height="320" width="435" /></span></td></tr></tbody></table><p>&nbsp;</p><p class="html" align="justify"><span style="font-family:Arial;"><span style="font-size:13px;"><strong>Kích thước, dung lượng</strong><br /><br />Ổ cứng dành cho máy tính để bàn thường có kích thước 3,5 inch.&nbsp;Ổ cứng cho máy tính xách tay là loại&nbsp;2,5 inch, nhỏ gọn, tiện dụng nhưng giá thường cao hơn so với ổ cứng 3,5 inch. Tuy nhiên, hiện nay nếu cần dung lượng lưu trữ 2TB, 3TB thì bạn chỉ có lựa chọn ổ cứng 3,5 inch. Vì vậy tùy theo “túi tiền” và tính tiện dụng mà bạn chọn ổ cứng phù hợp nhu cầu.</span></span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/b-480x310.jpg" style="width: 480px; height: 310px;" /></span></td></tr></tbody></table><p>&nbsp;</p><p class="html" align="justify"><span style="font-family:Arial;"><span style="font-size:13px;"><strong>Tốc độ</strong><br /><br />Hiện tốc độ phổ biến của ổ cứng là 7200rpm và 5400rpm (rounds per minute – vòng quay/phút). Tốc độ ổ cứng càng nhanh, nhiệt độ ổ cứng càng cao, tiêu tốn càng nhiều năng lượng, nhưng bù lại khả năng truy xuất (đọc ghi dữ liệu) sẽ tốt hơn. Tùy vào tốc độ ổ cứng mà bạn chọn chất liệu vỏ (case) ngoài phù hợp giúp tản nhiệt tốt.<br /><br /><span style="color: rgb(153, 51, 0);"><strong>Chọn vỏ ngoài</strong></span></span></span></p><p class="html" align="justify"><span style="font-family:Arial;"><span style="font-size:13px;"><strong>Nhựa hay nhôm</strong><br /><br />Vỏ nhựa có giá thành thấp hơn, có thiết kế chống va đập tốt hơn nhôm nhưng khả năng tản nhiệt kém hơn nhôm. Do khả năng tản nhiệt kém, một số vỏ nhựa cho ổ cứng gắn ngoài thường được thiết kế thêm quạt tản nhiệt, điều này đôi lúc sẽ gây khó chịu cho bạn vì tiếng “rì rì” của quạt. Nếu bạn chọn dùng ổ cứng tốc độ 7200rpm, và thường xuyên sử dụng ổ cứng gắn ngoài cho việc lưu trữ, lời khuyên bạn nên chọn vỏ nhôm. Nếu bạn thích độc đáo, cá tính, vỏ nhựa trong suốt phù hợp với bạn.</span></span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/h-369x320.jpg" style="width: 369px; height: 320px;" /></span></td></tr></tbody></table><p>&nbsp;</p><p class="html" align="justify"><span style="font-family:Arial;"><span style="font-size:13px;"><strong>Cổng giao tiếp</strong><br /><br />Hầu hết các ổ cứng hiện nay đều hỗ trợ cổng giao tiếp USB 2.0. Nếu máy tính và các thiết bị kết nối của bạn đều hỗ trợ giao tiếp USB 3.0, hãy đầu tư vỏ ổ cứng gắn ngoài hỗ trợ cổng giao tiếp USB 3.0. USB 3.0 tương thích ngược với các thiết bị giao tiếp cổng USB 2.0, vì vậy bạn không phải lo lắng về sự tương thích.</span></span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/u-399x320.jpg" style="width: 399px; height: 320px;" /></span></td></tr></tbody></table><p>&nbsp;</p><p class="html" align="justify"><span style="font-family:Arial;font-size:13px;">Ngoài cổng giao tiếp USB thông dụng, tùy theo nhu cầu bạn có thể tùy chọn thêm các cổng giao tiếp khác như FireWire, eSATA. Về lý thuyết, tốc độ cổng giao tiếp USB 2.0 là 480Mbps, eSATA 3Gbps, USB 3.0 5Gbps. Giao tiếp FireWire thường dùng trên máy Mac, tốc độ FireWire800 (EEE-1394b) nhanh hơn USB 2.0 nhưng chậm hơn USB 3.0.</span><br /><br /><strong><span style="font-family:Arial;font-size:13px;">Lắp đặt</span></strong></p><p class="html" align="justify"><span style="font-family:Arial;font-size:13px;">Thao tác thực hiện rất đơn giản, chỉ mất vài phút.<br /><br />1. Tháo vít lấy khay đựng ổ cứng ra khỏi vỏ bảo vệ.</span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/x-480x254.jpg" style="width: 480px; height: 254px;" /></span></td></tr></tbody></table><p>&nbsp;</p><p class="html" align="justify"><br /><span style="font-family:Arial;font-size:13px;">2. Gắn ổ cứng vào đầu kết nối. Chú ý thao tác gắn cẩn thận, không quá mạnh tay, đảm bảo các kết nối khít vào nhau.</span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/y-480x320.jpg" style="width: 480px; height: 320px;" /></span></td></tr></tbody></table><p>&nbsp;</p><p class="html" align="justify"><span style="font-family:Arial;font-size:13px;">3. Lắp ổ cứng vào khay, đưa khay vào vỏ bảo vệ, bắt vít cố định. Kết nối ổ cứng gắn ngoài vào máy tính, kiểm tra các cổng giao tiếp, định dạng ổ cứng và lưu trữ dữ liệu.</span><br />&nbsp;</p><p class="html" align="justify">&nbsp;</p><table class="ar-image-center " style="font-size: 11px; color: rgb(0, 0, 0); font-family: verdana;" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td><span style="font-family:Arial;font-size:13px;"><img alt="" class="ar-photo" src="http://pcworld.com.vn/files/articles/2012/1233253/z-480x301.jpg" style="width: 480px; height: 301px;" /></span></td></tr></tbody></table><p>&nbsp;</p><div class="html" style="clear: both;" align="justify">&nbsp; &nbsp;</div>', 1368432710, 1, 0, NULL),
(12, 109, 30009, 'Thẻ khách hàng', 'the-khach-hang', '', 'http://antanhung.com/uploads/Ten-cuop-lay-vang-sau-khi.jpg', '', 'sxxxxxxxxxxxxx', 1368433444, 1, 0, NULL),
(13, 119, 31899, 'Khuyến mãi', 'khuyen-mai', 'upload/20130515/anigif.gif', '', '', 'Nội dung', 1368584569, 1, 0, 1),
(14, 119, 31899, 'Qùa tặng', 'qua-tang', 'upload/20130515/anigif2.gif', '', '', 'Nội dung', 1368584639, 1, 0, 2),
(15, 115, 8842, 'Giới thiệu công ty', 'gioi-thieu-cong-ty', 'upload/20130517/codon.jpg', '', 'ssssssssssssssdx', '<img src="/camera/upload/day_130517/201305170545365703.jpg" alt="" />sdddddddd', 1368762232, 1, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuId` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `price` int(11) DEFAULT '0',
  `warranty` varchar(100) NOT NULL,
  `origin` varchar(250) NOT NULL,
  `content_1` text NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` smallint(1) DEFAULT '0',
  `home` smallint(1) DEFAULT '0',
  `feature` smallint(1) DEFAULT '0',
  `rank` smallint(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `menuId`, `imgId`, `name`, `alias`, `avatar`, `price`, `warranty`, `origin`, `content_1`, `content`, `create_time`, `status`, `home`, `feature`, `rank`) VALUES
(29, 15, 4057, 'sdssssssssss', 'sdssssssssss', 'upload/20130513/lg_l321_bp_camera_lg_L321_BP_dd.png', 123, '12 tháng', 'Việt Nam', 'Nội dung tóm tắt', 'Nội dung chi tiết<br />', 1368417385, 1, 0, 0, 0),
(32, 15, 26570, 'saaaaã', 'saaaaa', 'upload/20130513/camea.png', 0, '', '', 'xaaaaaaaa', 'ãaaaaaaaa', 1368418154, 1, 0, 0, 0),
(33, 15, 26570, 'ssssssssssssss', 'ssssssssssssss', 'upload/20130513/lg_l321.png', NULL, '', '', '', 'ãaaaaaaaa', 1368418381, 1, 0, 0, 0),
(35, 15, 26026, 'Camera 1023', 'camera-1023', 'upload/20130513/camera2.png', NULL, '18 tháng', 'Việt Nam', 'Nội dung tóm tắt', 'Nội dung chi tiết<br />', 1368419023, 1, 0, 0, 0),
(37, 15, 30027, 'Camera 1020123', 'camera-1020123', 'upload/20130513/fgh.png', NULL, '', '', 'Nội dung tóm tắt', 'as', 1368424333, 1, 0, 0, 0),
(38, 15, 32370, 'Camera123', 'camera123', 'upload/20130513/camea.png', NULL, '', '', 'Nội dung tóm tắt', 'Nội dung chi tiết<br />', 1368424698, 1, 1, 1, 0),
(39, 15, 32370, 'Sản phẩm 7', 'san-pham-7', 'upload/20130513/camera2.png', NULL, '12 tháng', 'Việt Nam', '', 'Nội dung chi tiết<br />', 1368424768, 1, 1, 1, 0),
(40, 15, 32370, 'Sản phẩm 8', 'san-pham-8', 'upload/20130513/dsssssssss.jpg', NULL, '', '', '', 'Nội dung chi tiết<br />', 1368424811, 1, 1, 1, 0),
(41, 15, 32370, 'Sản phẩm 9', 'san-pham-9', 'upload/20130513/fgh.png', NULL, '', '', '', 'Nội dung chi tiết<br />', 1368424864, 1, 1, 1, 0),
(42, 15, 15280, 'Camera10', 'camera10', 'upload/20130513/camre6.png', 0, '18 tháng', '', '', 'Nôi dung chi tiết<br />', 1368425078, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userId` int(50) NOT NULL,
  `name_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `scale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `url_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(50) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serId` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `dateCreated` date NOT NULL,
  `status` smallint(1) DEFAULT '0',
  `feature` smallint(1) DEFAULT '0',
  `rank` smallint(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serId`, `name`, `alias`, `image`, `content`, `dateCreated`, `status`, `feature`, `rank`) VALUES
(70, '', ' cccccccccc', 'cccccccccc', '/upload/2013-05-11/140.jpg', 'vdxxxxxxxxxx', '2013-05-11', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `profile`, `status`) VALUES
(1, 'demo', '2e5c7db760a33498023813489cfadc0b', 'webmaster@example.com', NULL, 0),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'huynhtuvinh87@gmail.com', 'admin\r\n', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
