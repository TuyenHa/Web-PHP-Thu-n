-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 11 Avril 2017 à 10:19
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quanlybalo`
--

-- --------------------------------------------------------

--
-- Structure de la table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binh_luan` int(11) NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `binhluan`
--

INSERT INTO `binhluan` (`id_binh_luan`, `ho_ten`, `id_san_pham`, `email`, `noi_dung`, `ngay_binh_luan`) VALUES
(121, 'Anh HEHE', 18, 'hehe@gmail.com', '<p>sản phẩm n&agrave;y bao nhi&ecirc;u tiền vậy ad</p>\r\n', '2017-04-09'),
(123, 'hahah', 4, 'haha@gmail.com', '<p>Sản phẩm rất đẹp</p>\r\n', '2017-04-10');

-- --------------------------------------------------------

--
-- Structure de la table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danh_muc` int(10) NOT NULL,
  `ten_danh_muc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danh_muc`, `ten_danh_muc`) VALUES
(30, 'Ba Lo Du Lịch'),
(31, 'Balo Học Sinh'),
(32, 'Balo Sinh Viên'),
(33, 'Balo Thể Thao'),
(36, 'Balo Thời Trang'),
(37, 'Balo Laptop'),
(38, 'Cặp sách giá rẻ'),
(39, 'Túi Đeo Học Sinh'),
(40, 'Túi Đeo Thời Trang');

-- --------------------------------------------------------

--
-- Structure de la table `lienhe`
--

CREATE TABLE `lienhe` (
  `id_lien_he` int(10) NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `dia_chi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_gui` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lienhe`
--

INSERT INTO `lienhe` (`id_lien_he`, `ho_ten`, `sdt`, `dia_chi`, `noi_dung`, `ngay_gui`) VALUES
(7, 'Hà Văn Anh', 123456, 'Hà Nội', '<p>Shop b&aacute;n h&agrave;ng rất chuy&ecirc;n nghiệp</p>\r\n', '2017-04-10');

-- --------------------------------------------------------

--
-- Structure de la table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_san_pham` int(10) NOT NULL,
  `ten_san_pham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `gia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` int(10) NOT NULL,
  `bao_hanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `tinh_trang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dac_biet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anh_san_pham` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sanpham`
--

INSERT INTO `sanpham` (`id_san_pham`, `ten_san_pham`, `id_danh_muc`, `gia`, `mo_ta`, `so_luong`, `bao_hanh`, `khuyen_mai`, `ngay_nhap`, `tinh_trang`, `dac_biet`, `anh_san_pham`) VALUES
(3, 'Balo Đẹp', 32, '120000', '<p>Kh&ocirc;ng c&oacute; g&igrave;&nbsp;cả m&agrave;</p>\r\n', 25, '3 Tháng', 'Không', '2017-04-04', 'Mới', '1', 'balo-laptop-glado-cylinder-blc005-xam-0964-4406462-99dbff4d4d889f10cee71eb53a0bf94e-catalog_233.jpg'),
(4, 'Balo Gogo Bag', 36, '312000', '<p>Balo được l&agrave;m từ vải bố 1680 bền đẹp v&agrave; may một c&aacute;ch tỉ mỉ kh&eacute;o l&eacute;o, d&acirc;y k&eacute;o chắc chắn, đảm bảo độ bền cao trong qu&aacute; tr&igrave;nh sử dụng;<br />\r\nThiết kế trẻ trung gọn g&agrave;ng, năng động tiện lợi cho mọi hoạt động. C&oacute; nhiều ngăn để th&ecirc;m s&aacute;ch vở khi đi học hay bỏ th&ecirc;m đồ d&ugrave;ng c&aacute; nh&acirc;n khi đi c&ocirc;ng t&aacute;c, đặc biệt c&oacute; ngăn chống sốc bảo vệ cho chiếc laptop hoặc Ipad của bạn an to&agrave;n khi gặp phải những va chạm ngo&agrave;i &yacute; muốn v&agrave; đệm tho&aacute;ng kh&iacute; ph&iacute;a sau gi&uacute;p người đeo thoải m&aacute;i hơn khi sử dụng. D&ugrave;ng để đựng laptop đến 15.6&quot;.</p>\r\n', 12, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '1.jpg'),
(5, 'Balo Nam Thời Trang', 30, '390000', '<p>- Chất liệu vải Polyester cao cấp<br />\r\n- Sản phẩm được chia l&agrave;m nhiều ngăn tiện lợi. C&oacute; c&aacute;c ngăn lớn để đựng c&aacute;c vật dụng cần thiết v&agrave; nhiều ngăn nhỏ để đựng giấy tờ, tiền, v&iacute;&hellip; ti&ecirc;̣n dùng khi đi học, l&agrave;m việc.<br />\r\n- Thi&ecirc;́t k&ecirc;́ tinh t&ecirc;́, màu sắc thanh lịch</p>\r\n', 34, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '2.jpg'),
(6, 'Balo Da Nam Thời Trang', 30, '41200', '<p>- Chất liệu vải Polyester cao cấp<br />\r\n- Sản phẩm được chia l&agrave;m nhiều ngăn tiện lợi. C&oacute; c&aacute;c ngăn lớn để đựng c&aacute;c vật dụng cần thiết v&agrave; nhiều ngăn nhỏ để đựng giấy tờ, tiền, v&iacute;&hellip; ti&ecirc;̣n dùng khi đi học, l&agrave;m việc.<br />\r\n- Thi&ecirc;́t k&ecirc;́ tinh t&ecirc;́, màu sắc thanh lịch<br />\r\n- Đường may tỉ mỉ, chắc chắn, tinh tế,t&iacute;nh thẩm mỹ cao.<br />\r\n- Phần d&acirc;y đeo c&oacute; thể điều chỉnh độ ngắn d&agrave;i, được may bằng kỹ thuật gấp m&eacute;p d&acirc;y viền, thiết kế &ocirc;m rất s&aacute;t hai vai, vững chắc.</p>\r\n', 24, '6 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '0', '4.jpg'),
(7, 'Ba Lô Du Lịch, Văn Phòng ', 30, '779000', '<p>Ba l&ocirc; cao c&acirc;́p của thương hi&ecirc;̣u Ronal với gam màu đen-n&acirc;u &acirc;́n tượng và ki&ecirc;̉u dáng hi&ecirc;̣n đại, sẽ đem lại cho bạn vẻ ngoài phong cách và trẻ trung cho những chuy&ecirc;́n đi chơi xa<br />\r\n<br />\r\n- Ch&acirc;́t li&ecirc;̣u vải 1000D cao cấp của Hàn Qu&ocirc;́c<br />\r\n- 1 ngăn phụ ở mặt trước với nhi&ecirc;̀u ngăn nhỏ b&ecirc;n trong<br />\r\n- 1 ngăn chính với ngăn đựng laptop và 1 ngăn lưới<br />\r\n- 1 ngăn phía sau với &ocirc;́ng khoá s&ocirc;́<br />\r\n- Ngăn phụ có khoá kéo mi&ecirc;̣ng và 2 khoá b&acirc;́m<br />\r\n- Có khoá kéo đ&ecirc;̉ tăng di&ecirc;̣n tích sức chứa<br />\r\n- Lưng đeo c&oacute; m&uacute;t đệm và d&acirc;y đeo có th&ecirc;̉ đi&ecirc;̀u chỉnh đ&ocirc;̣ dài và có 1 quai ngang với khoá b&acirc;́m<br />\r\n- Kích thước 45 x 35 x 16 cm</p>\r\n', 23, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '5.jpg'),
(8, 'Balo Vải Nam Nữ Canvas', 36, '389000', '<p>- Bộ sản phẩm bao gồm:&nbsp;1 x Balo<br />\r\n&nbsp;- M&atilde; sản phẩm:&nbsp;BL200<br />\r\n- M&agrave;u:&nbsp;M&agrave;u N&acirc;u , M&agrave;u Xanh R&ecirc;u , M&agrave;u Xanh Dương,M&agrave;u Đen<br />\r\n&nbsp;- K&iacute;ch thước balo (D&agrave;i x Rộng x Cao (cm)): 33 x 12 x 44<br />\r\n&nbsp;- Loại:&nbsp;Ba l&ocirc; đựng laptop, s&aacute;ch vở, giấy tờ,...<br />\r\n- Chất Liệu : Balo Vải Tổng Hợp</p>\r\n', 23, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '6.jpg'),
(9, 'Balo Laptop', 30, '320000', '<p>- Balo được l&agrave;m từ vải bố 1680 bền đẹp, bal&ocirc; laptop được may một c&aacute;ch tỉ mỉ kh&eacute;o l&eacute;o, d&acirc;y k&eacute;o chắc chắn, đảm bảo độ bền cao trong qu&aacute; tr&igrave;nh sử dụng<br />\r\n- Kiểu d&aacute;ng gọn g&agrave;ng, năng động tiện lợi cho mọi hoạt động. C&oacute; nhiều ngăn để th&ecirc;m s&aacute;ch vở khi đi học hay bỏ th&ecirc;m đồ d&ugrave;ng c&aacute; nh&acirc;n khi đi c&ocirc;ng t&aacute;c, đặc biệt c&oacute; ngăn chống sốc bảo vệ cho chiếc laptop của bạn an to&agrave;n khi gặp phải những va chạm ngo&agrave;i &yacute; muốn v&agrave; đệm tho&aacute;ng kh&iacute; ph&iacute;a sau gi&uacute;p người đeo thoải m&aacute;i hơn khi sử dụng. D&ugrave;ng để đựng laptop đến 15.6&quot;.<br />\r\n- Ba l&ocirc; được bảo h&agrave;nh 12 th&aacute;ng theo c&aacute;c ti&ecirc;u ch&iacute; sau:<br />\r\n+ C&ograve;n trong thời gian bảo h&agrave;nh<br />\r\n+ C&oacute; phiếu bảo h&agrave;nh, m&atilde; vạch hợp lệ<br />\r\n+ Bị lỗi kỹ thuật do nh&agrave; sản xuất</p>\r\n', 12, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '7.jpg'),
(10, 'Balo Laptop Đa Năng', 37, '320000', '<p>- Chất liệu vải Polyester cao cấp<br />\r\n- Sản phẩm được chia l&agrave;m nhiều ngăn tiện lợi. C&oacute; c&aacute;c ngăn lớn để đựng c&aacute;c vật dụng cần thiết v&agrave; nhiều ngăn nhỏ để đựng giấy tờ, tiền, v&iacute;&hellip; ti&ecirc;̣n dùng khi đi học, l&agrave;m việc.<br />\r\n- Thi&ecirc;́t k&ecirc;́ tinh t&ecirc;́, màu sắc thanh lịch<br />\r\n- Đường may tỉ mỉ, chắc chắn, tinh tế,t&iacute;nh thẩm mỹ cao.<br />\r\n- Phần d&acirc;y đeo c&oacute; thể điều chỉnh độ ngắn d&agrave;i, được may bằng kỹ thuật gấp m&eacute;p d&acirc;y viền, thiết kế &ocirc;m rất s&aacute;t hai vai, vững chắc.</p>\r\n', 24, '6 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '0', '8.jpg'),
(11, 'Balo Laptop Thời Trang', 37, '320000', '<p>- Balo được l&agrave;m từ vải bố bền đẹp, bal&ocirc; laptop được may một c&aacute;ch tỉ mỉ kh&eacute;o l&eacute;o, d&acirc;y k&eacute;o chắc chắn, đảm bảo độ bền cao trong qu&aacute; tr&igrave;nh sử dụng.<br />\r\n- Balo được thiết kế trẻ trung gọn g&agrave;ng, năng động tiện lợi cho mọi hoạt động. C&oacute; nhiều ngăn để th&ecirc;m s&aacute;ch vở khi đi học hay bỏ th&ecirc;m đồ d&ugrave;ng c&aacute; nh&acirc;n khi đi c&ocirc;ng t&aacute;c, đặc biệt c&oacute; ngăn chống sốc bảo vệ cho chiếc laptop hoặc Ipad của bạn an to&agrave;n khi gặp phải những va chạm ngo&agrave;i &yacute; muốn v&agrave; đệm tho&aacute;ng kh&iacute; ph&iacute;a sau gi&uacute;p người đeo thoải m&aacute;i hơn khi sử dụng. D&ugrave;ng để đựng laptop đến 15.6&quot;.</p>\r\n', 12, '6 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '9.jpg'),
(12, 'Balo Du Lịch Glado', 30, '320000', '<p>Ba l&ocirc; Glado Classical thuộc d&ograve;ng sản phẩm Classical c&oacute; thiết kế đặc biệt với nhiều form d&aacute;ng, m&agrave;u sắc kh&aacute;c nhau, nhưng vẫn giữ được những t&iacute;nh năng ưu việt đặc trưng của sản phẩm Glado: Thời trang, si&ecirc;u nhẹ, trượt nước,... Classical hướng tới phục vụ cho khách hàng sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng, cả nam v&agrave; nữ, những bạn c&oacute; phong c&aacute;ch trẻ trung v&agrave; th&iacute;ch cuộc sống hiện đại, hay đi du lịch. D&ograve;ng sản phẩm Classical sẽ gi&uacute;p bạn thể hiện đẳng cấp ri&ecirc;ng của m&igrave;nh.<br />\r\n<br />\r\n- Ba l&ocirc; được l&agrave;m từ chất liệu Polyester cao cấp trượt nước<br />\r\n- Gồm 1 ngăn ch&iacute;nh v&agrave; 3 ngăn phụ<br />\r\n- C&oacute; ngăn chứa laptop 15.5 inch với lớp m&uacute;t l&oacute;t đảm bảo an to&agrave;n cho chiếc laptop của bạn.<br />\r\n- Mặt trước: 1 ngăn với khóa kéo với kích thước khá lơn giúp bạn chứa được nhi&ecirc;̀u phụ ki&ecirc;̣n nhỏ gọn.<br />\r\n- Ngăn trong: Ngăn đựng laptop ri&ecirc;ng biệt với lớp m&uacute;t PE chống sốc.<br />\r\n- B&ecirc;n hong trái: 1 Ngăn giày được tách ri&ecirc;ng bi&ecirc;̣t với ngăn chứa đ&ocirc;̀, đảm bảo v&ecirc;̣ sinh cho v&acirc;̣t dụng chứa b&ecirc;n trong balo của bạn.<br />\r\n- B&ecirc;n hong phải: 1 Túi đựng bình nước, giúp bạn d&ecirc;̃ dàng mang theo 1 bình nước khi đi du lịch.<br />\r\n- Th&acirc;n sau: Có 1 ngăn nhỏ chứa ví<br />\r\n- Quai đeo: Được may bằng kỹ thuật gấp m&eacute;p d&acirc;y viền, thiết kế &ocirc;m rất s&aacute;t hai vai, chắc chắn, việc nới d&agrave;i &ndash; thu ngắn d&acirc;y đeo v&ocirc; c&ugrave;ng linh hoạt&nbsp;</p>\r\n', 22, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '0', '10.jpg'),
(13, 'Balo MCM kim tuyến ', 32, '185000', '<ul>\r\n	<li>Chất liệu: Da pu cao cấp đ&iacute;nh kim tuyến bền, đẹp + Đường may tinh tế v&agrave; chắc chắn</li>\r\n	<li>K&iacute;ch thước: 20 x 22 x 8cm</li>\r\n	<li>M&agrave;u sắc:&nbsp;<strong>Chỉ c&ograve;n m&agrave;u V&agrave;ng</strong></li>\r\n	<li>Xuất xứ: Quảng Ch&acirc;u</li>\r\n	<li>Đeo balo hoặc đeo ch&eacute;o đều đượ</li>\r\n</ul>\r\n', 22, '2 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '0', '11.jpg'),
(14, 'Balo nữ  sinh viên', 32, '200000', '<p>Sản phẩm ph&ugrave; hợp với c&aacute;c bạn nữ</p>\r\n\r\n<p>+Trẻ trung</p>\r\n\r\n<p>+ Xinh xắn</p>\r\n\r\n<p>+Thời trang</p>\r\n', 23, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '0', '12.jpg'),
(15, 'Balo Unisex', 31, '250000', '<p><strong>Đặc t&iacute;nh nổi bật</strong></p>\r\n\r\n<p><strong>- K&iacute;ch thước&nbsp;43m x 29cm x 15cm&nbsp;rộng r&atilde;i</strong></p>\r\n\r\n<p>Sản phẩm c&oacute; k&iacute;ch thước&nbsp;43m x 29cm x 15cm&nbsp;rộng r&atilde;i, được chia l&agrave;m nhiều ngăn tiện lợi. C&oacute; c&aacute;c ngăn lớn &nbsp;để đựng c&aacute;c vật dụng cần thiết v&agrave; nhiều ngăn nhỏ để đựng giấy tờ, tiền, v&iacute;&hellip; ti&ecirc;̣n dùng khi đi học, l&agrave;m việc</p>\r\n', 35, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '1', '13.jpg'),
(16, 'Balo Thời Trang BL1186', 31, '1850000', '<p>Chất liệu :Vải Canvas hoạ tiết&nbsp;</p>\r\n\r\n<p>m&agrave;u sắc: xanh v&agrave; hồng</p>\r\n\r\n<p>K&iacute;ch Thước: D&agrave;i33cm x&nbsp;ộng 16cm x Cao 39cm</p>\r\n', 23, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-04', 'Mới', '0', '13.png'),
(17, 'Balo Đi Học EXO', 30, '189000', '<p><strong>- K&iacute;ch thước&nbsp;50m x 32cm x 18cm&nbsp;rộng r&atilde;i</strong></p>\r\n\r\n<p>Sản phẩm c&oacute; k&iacute;ch thước&nbsp;50m x 32cm x 18cm&nbsp;rộng r&atilde;i, được chia l&agrave;m nhiều ngăn tiện lợi. C&oacute; c&aacute;c ngăn lớn &nbsp;để đựng c&aacute;c vật dụng cần thiết v&agrave; nhiều ngăn nhỏ để đựng giấy tờ, tiền, v&iacute;&hellip; ti&ecirc;̣n dùng khi đi học, l&agrave;m việc.</p>\r\n', 34, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-10', 'Mới', '0', '14.jpg'),
(18, 'Balo Nữ', 38, '320000', '<p>Balo được l&agrave;m từ da.sản phẩm rất đẹp</p>\r\n', 12, '3 Tháng', 'Sản phẩm này không được áp dụng với voucher hoặc c', '2017-04-06', 'Mới', '0', '15.png'),
(19, 'ávvavavav', 30, '151515', '<p>egegegegeg</p>\r\n', 15, 'wtweg', 'egeg', '2017-04-11', 'feefegeg', '0', 'w620h405f1c1-files-articles-2011-1051248-votay.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tai_khoan` int(10) NOT NULL,
  `tai_khoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` text COLLATE utf8_unicode_ci NOT NULL,
  `que_quan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `phan_quyen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `taikhoan`
--

INSERT INTO `taikhoan` (`id_tai_khoan`, `tai_khoan`, `mat_khau`, `email`, `gioi_tinh`, `ngay_sinh`, `que_quan`, `dia_chi`, `sdt`, `phan_quyen`) VALUES
(53, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', 0, 1),
(56, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'user@gmail.com', 'Nam', '2017-04-03', 'Hà Nội', 'Hà Nội', 123456789, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binh_luan`);

--
-- Index pour la table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Index pour la table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id_lien_he`);

--
-- Index pour la table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_san_pham`);

--
-- Index pour la table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tai_khoan`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT pour la table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danh_muc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id_lien_he` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_san_pham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tai_khoan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
