-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Mars 2016 à 04:04
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `yeulaptrinh`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Ad` int(255) NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` text COLLATE utf8_unicode_ci NOT NULL,
  `FullName` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`Id_Ad`, `Email`, `PassWord`, `FullName`) VALUES
(1, 'chauminhthien0212@gmail.com', '932bcc400c4b5a0eb470ef60679836e4', 'Admin'),
(2, 'chauminhthien@gmail.com', '932bcc400c4b5a0eb470ef60679836e4', 'Châu Minh Thiện');

-- --------------------------------------------------------

--
-- Structure de la table `cmt`
--

CREATE TABLE IF NOT EXISTS `cmt` (
  `Id_cmt` int(255) NOT NULL,
  `Cmt` text COLLATE utf8_unicode_ci NOT NULL,
  `Id_User` int(255) NOT NULL,
  `Id_post` int(255) NOT NULL,
  `Time_cmt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cmt`
--

INSERT INTO `cmt` (`Id_cmt`, `Cmt`, `Id_User`, `Id_post`, `Time_cmt`) VALUES
(1, 'aaa', 3, 11, '12211111'),
(2, 'test 1', 4, 11, '1111111'),
(3, 'test2', 4, 11, '11111111111111'),
(4, 'test 3', 3, 11, '1111111'),
(5, 'test 5', 4, 11, '11111111111111'),
(6, 'test cmt1', 4, 30, '123456'),
(7, 'tet2', 3, 30, '12346'),
(24, 'test 1', 3, 30, '1455788545'),
(25, 'chán quá de', 3, 28, '1455788625'),
(26, 'chán', 3, 28, '1455788744'),
(27, 'chan nua nè', 3, 28, '1455788750'),
(28, 'ok con de', 3, 28, '1455788757'),
(38, 'test nua nè', 3, 38, '1455866937'),
(40, 'huhuhuhuhu', 3, 27, '1455867029'),
(41, 'test 1', 3, 38, '1455868054'),
(43, 'test 4', 3, 38, '1455868070'),
(44, 'test', 3, 1, '1455868089'),
(46, 'test cmt', 3, 1, '1455868105'),
(47, 'test sua1', 3, 1, '1455868122'),
(48, '111111', 3, 1, '1455868125'),
(50, 'test cmt 1', 3, 3, '1455868175'),
(51, 'xoáaa', 3, 42, '1456584439'),
(54, 'con de', 3, 28, '1457768600'),
(55, 'aaa', 3, 8, '1457768613'),
(56, 'cmt', 3, 1, '1457768664'),
(57, 'acaaaaa', 3, 1, '1457768679'),
(58, 'ascacsaaaa111', 3, 1, '1457768746'),
(59, 'test', 3, 8, '1457768894'),
(78, '123456', 3, 1, '1457770688'),
(79, 'test', 3, 42, '1457770833'),
(80, 'sssss111111111111111', 3, 42, '1457770835'),
(84, 'test', 3, 42, '1457770963'),
(86, 'a', 3, 48, '1457771120'),
(88, 'aaaaabbbbbbbbbb', 3, 48, '1457771124'),
(89, '222222222', 3, 48, '1457771133'),
(90, 'aaaa', 3, 48, '1457776170'),
(91, '11111', 3, 48, '1457776175'),
(92, '1111', 3, 48, '1457776203'),
(93, '222222222222222222222222aaaaa', 3, 48, '1457776207'),
(94, '1111111111', 3, 42, '1457776225');

-- --------------------------------------------------------

--
-- Structure de la table `khoahoc`
--

CREATE TABLE IF NOT EXISTS `khoahoc` (
  `Id_kh` int(255) NOT NULL,
  `Name_kh` text COLLATE utf8_unicode_ci NOT NULL,
  `Name_khong_dau` text COLLATE utf8_unicode_ci NOT NULL,
  `Img_kh` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(255) NOT NULL,
  `Id_Ad` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `khoahoc`
--

INSERT INTO `khoahoc` (`Id_kh`, `Name_kh`, `Name_khong_dau`, `Img_kh`, `time`, `Id_Ad`) VALUES
(2, 'HTML cơ Bản', 'HTML-co-ban', '	aaaaaaaaaaaaaa.png', 1457804199, 1),
(13, 'PHP Cơ Bản', 'PHP-co-ban', 'webphppng.png', 1457531465, 1),
(15, 'Lập Trình C++ Cơ Bản', 'lap-trinh-c-co-ban', 'cpp.png', 1457534154, 1),
(16, 'Lập Trình Java Cơ Bản', 'lap-trinh-java-co-ban', 'java.jpg', 1457535873, 1),
(17, 'Lập Trình Android ', 'lap-trinh-Android ', 'ANDROID__1433417230_14.169.216.56.jpg', 1457536571, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lienhe`
--

CREATE TABLE IF NOT EXISTS `lienhe` (
  `Id_lh` int(255) NOT NULL,
  `FullName` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Tag` text COLLATE utf8_unicode_ci NOT NULL,
  `Noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lienhe`
--

INSERT INTO `lienhe` (`Id_lh`, `FullName`, `Email`, `Phone`, `Tag`, `Noi_dung`, `time`) VALUES
(1, 'Châu Minh Thiện', 'minhthien@gmail.com', '0963501008', 'ascsac', 'sacsacvsadc', '11111111'),
(4, 'sacsacasc', 'savcsadvsdvds', 'kdvmskdlv', 'acvaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', '11111111111111'),
(5, 'acvsavsdvdsv', 'avdvdsvsdv', 'asdvcsadvsdvsdv', 'casvasv', 'aqaaaaaaaaaaaaa', '11111111111111'),
(6, 'Ai My Tran', 'chauminhthien0212@gmail.com', '0963501008', 'ascascasc', 'ascascasc', '1450026106');

-- --------------------------------------------------------

--
-- Structure de la table `noidung`
--

CREATE TABLE IF NOT EXISTS `noidung` (
  `Id_nd` int(255) NOT NULL,
  `Name_nd` text COLLATE utf8_unicode_ci NOT NULL,
  `Name_khong_dau` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `Img_nd` text COLLATE utf8_unicode_ci NOT NULL,
  `Time_nd` text COLLATE utf8_unicode_ci NOT NULL,
  `Id_Ad` int(255) NOT NULL,
  `Id_kh` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `noidung`
--

INSERT INTO `noidung` (`Id_nd`, `Name_nd`, `Name_khong_dau`, `url`, `Img_nd`, `Time_nd`, `Id_Ad`, `Id_kh`) VALUES
(5, 'HTML bài 1: cơ bản về HTML', 'Co-ban-ve-HTML', 'https://www.youtube.com/embed/n2zZuPz9MKU?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450355110', 1, 2),
(7, 'HTML bài 2: Các thẻ table, form, list', 'cac-cap-the-table-form-list', 'https://www.youtube.com/embed/xxgCE8AHuvk?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450355232', 1, 2),
(8, 'HTML bài 3: Các thẻ trong html', 'cac-the-trong-html', 'https://www.youtube.com/embed/5GNe9gVhNDQ?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450355783', 1, 2),
(9, 'HTML bài 4: các thẻ trong html', 'cac-the-trong-html-p2', 'https://www.youtube.com/embed/mQxAEkHImJY?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450355894', 1, 2),
(10, 'HTML bài 5 Practice', 'HTML-pracitce', 'https://www.youtube.com/embed/CheDmiienO4?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450355966', 1, 2),
(11, 'HTML bài 6 Pactice Conts', 'HTML-pactive-conts', 'https://www.youtube.com/embed/EOkzgqft4Yk?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450356202', 1, 2),
(12, 'HTML bài 7: Thiết kế Table Layout', 'thiet-ke-playout', 'https://www.youtube.com/embed/ScaevMLAGBw?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450356300', 1, 2),
(13, 'HTML bài 8: Thiết kế Div Layout', 'thiet-ke-playout-p2', 'https://www.youtube.com/embed/crbYvU3xn_I?list=PLuOlFjICKPR42t3JCRRdPmrZ7HBCi5NYS', 'aaaaaaaaaaaaaa.png', '1450356451', 1, 2),
(15, 'bbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '4.png', '1457528351', 1, 14),
(16, 'PHP Bài 1 Tổng Quan Về PHP', 'Tong-quang-PHP', 'https://www.youtube.com/embed/Exe-XYRwRwM?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457531640', 1, 13),
(17, 'PHP Bài 2 Biến Hằng Kiểu Dữ Liệu', 'PHP-Bai-2-Bien-va-Kieu-Du-Lieu', 'https://www.youtube.com/embed/syzF6yUpvao?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457531756', 1, 13),
(18, 'PHP Bài 4 Làm Việc Với Form (phần 1)', 'PHP-Bai-3-lam-viec-voi-form-p1', 'https://www.youtube.com/embed/PSvks5OJvww?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457531892', 1, 13),
(19, 'PHP Bài 4 Làm Việc Với Form (phần 2)', 'PHP-bai-4-lam-viec-voi-form-p2', 'https://www.youtube.com/embed/nAOQnFNkuFo?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457531989', 1, 13),
(20, 'PHP Bài 5 Câu Lệnh Điều Kiện (phần 1)', 'php-bai-5-cau-lenh-if-p1', 'https://www.youtube.com/embed/66XEogY6rN0?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457532099', 1, 13),
(21, 'PHP Bài 5 Câu Lệnh Điều Kiện (phần 2)', 'php-bai-5-cau-lenh-if-p1', 'https://www.youtube.com/embed/CXSvGPS_Xas?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457532196', 1, 13),
(22, 'PHP Bài 5- Câu Lệnh Điều Kiện (phần 3)', 'php-bai-5-cau-lenh-if-p3', 'https://www.youtube.com/embed/-l8K8yWQnPk?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457532586', 1, 13),
(23, 'PHP Bài 5 Câu Lệnh Điều Kiện (phần 4)', 'php-bai-5-cau-lenh-if-p4', 'https://www.youtube.com/embed/xRShoVE7Ar4?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457532877', 1, 13),
(24, 'PHP Bài 6 Vòng Lặp For', 'php-bai-6-vong-lap-for', 'https://www.youtube.com/embed/za3stUvubJk?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533019', 1, 13),
(25, 'PHP Bài 6 Vòng Lặp While (phần 1)', 'php-bai-6-vong-lap-while-p1', 'https://www.youtube.com/embed/aYk6KqxPqqA?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533081', 1, 13),
(26, 'PHP Bài 6 Vòng Lặp While (phần 2)', 'php-bai-6-vong-lap-while-p2', 'https://www.youtube.com/embed/rFOlrgDPli4?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533377', 1, 13),
(27, 'PHP Bài 6 Vòng Lặp Do While', 'php-bai-6-vong-lap-do-while', 'https://www.youtube.com/embed/y0z0oz0_vvI?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533447', 1, 13),
(28, 'PHP Bài 6 Break và Continue', 'php-bai-6-Break-Continue', 'https://www.youtube.com/embed/SYtbtRMFcRg?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533513', 1, 13),
(29, 'PHP Bài 6 Exercise 1', 'php-bai-6-Exercise-1', 'https://www.youtube.com/embed/4qUeMaRZjfw?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533593', 1, 13),
(30, 'PHP Bài 6 Execrise 2', 'php-bai-6-Exercise-2', 'https://www.youtube.com/embed/ayfw4hwEclY?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533636', 1, 13),
(31, 'PHP Bài 7 Xây Dựng Hàm (phần 1)', 'php-bai-7-xay-dung-ham-p1', 'https://www.youtube.com/embed/eKpFyfwfo5g?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533705', 1, 13),
(32, 'PHP Bài 7 Xây Dựng Hàm (phần 2)', 'php-bai-7-xay-dung-ham-p2', 'https://www.youtube.com/embed/T-zHQJ3ps0E?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533759', 1, 13),
(33, 'PHP Bài 7 Xây Dựng Hàm (phần 3)', 'php-bai-7-xay-dung-ham-p3', 'https://www.youtube.com/embed/tx8q6ywPQog?list=PLP3vsIk7IH51RPGv7Bdecr5DhZhclJU7F', 'vphp.jpg', '1457533844', 1, 13),
(34, 'Bài 1 - Giới thiệu C và Visual Studio', 'bai-1-gioi-thieu', 'https://www.youtube.com/embed/jrn6bXC6sTU?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457534241', 1, 15),
(35, 'Bài 2 - Hello World', 'bai-2-Hello-Word', 'https://www.youtube.com/embed/1PqxYZ6RSOU?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457534736', 1, 15),
(36, 'Bài 3 - Hello world (phần 2)', 'bai-3-hello-world-p2', 'https://www.youtube.com/embed/Wrk0CvqkA8I?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457534836', 1, 15),
(37, 'Bài 4 - Biến và kiểu dữ liệu', 'bai-4-bien-va-kieu', 'https://www.youtube.com/embed/_XLLDzum4yw?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457534898', 1, 15),
(38, 'Bài 5 - CIN (phần 1)', 'bai-5-CIN-p1', 'https://www.youtube.com/embed/Yon_Bj72nGI?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457535240', 1, 15),
(39, 'Bài 6 - CIN (phần 2)', 'bai-6-CIN-p2', 'https://www.youtube.com/embed/Kek_nyb85KA?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457535594', 1, 15),
(40, 'Lập trình Java - 01 Tổng quan lập trình JAVA', 'bai-1-tong-quan-ve-java', 'https://www.youtube.com/embed/KtHt2EOXq9s?list=PLv6GftO355Av6u60DTCvrUe6aXror_bdE', 'javav.jpg', '1457535965', 1, 16),
(41, 'Lập trình Java - 02 Phần mềm học Java', 'bai-2-phan-mem-hoc-java', 'https://www.youtube.com/embed/e6x1NWuVh-4?list=PLv6GftO355Av6u60DTCvrUe6aXror_bdE', 'javav.jpg', '1457536178', 1, 16),
(42, 'Lập trình Java - 03 Chương trình Java đầu tiên', 'bai-3-chuong-trinh-dau-tien', 'https://www.youtube.com/embed/zUQm5xU5ex4?list=PLv6GftO355Av6u60DTCvrUe6aXror_bdE', 'javav.jpg', '1457536239', 1, 16),
(43, 'Lập trình Java - 05 Biến trong Java', 'bai-5-bien-trong-java', 'https://www.youtube.com/embed/JGhCYVvDSqw?list=PLv6GftO355Av6u60DTCvrUe6aXror_bdE', 'javav.jpg', '1457536310', 1, 16),
(44, 'Hướng dẫn lập trình Android với ANDROID STUDIO & GENYMOTION', 'huong-dan-su-dung-Android-studio', 'https://www.youtube.com/embed/wvo59B3hPhM?list=PLzrVYRai0riTlWPxOEhi1-2QmvLiw0DCb', 'adr.jpg', '1457536608', 1, 17),
(45, 'Hướng dẫn lập trình Java cơ bản dành cho Android', 'huong-dan-lap-trinh-java-co-ban-cho-android', 'https://www.youtube.com/embed/BpaI0czgjxM?list=PLzrVYRai0riTlWPxOEhi1-2QmvLiw0DCb', 'adr.jpg', '1457536820', 1, 17),
(46, 'Lập trình Java - 06 Tìm hiểu Package', 'bai-6-tieu-hieu-package', 'https://www.youtube.com/embed/iPrShn4a9vc?list=PLv6GftO355Av6u60DTCvrUe6aXror_bdE', 'javav.jpg', '1457536957', 1, 16),
(47, 'Bài 7 - Khai báo biến, Phép Gán', 'bai-7-khai-bao-bien-va-phep-gan', 'https://www.youtube.com/embed/1npEQOs3--c?list=PLRlbFp7jBO4IwyRIILcX1zacu7T5J2v39', 'cpp.png', '1457537037', 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `Id_post` int(255) NOT NULL,
  `Nd_post` text COLLATE utf8_unicode_ci NOT NULL,
  `Img_post` text COLLATE utf8_unicode_ci NOT NULL,
  `st` int(255) NOT NULL,
  `Time_post` text COLLATE utf8_unicode_ci NOT NULL,
  `Id_User` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`Id_post`, `Nd_post`, `Img_post`, `st`, `Time_post`, `Id_User`) VALUES
(1, 'tet tet te te  a', '', 1, '11111111111111', 3),
(3, ' 1 2 3', 'NET.jpg', 1, '11111111111111', 3),
(8, 'test1', '', 1, '111111111', 4),
(9, 'test post', '', 1, '1111111', 3),
(11, 'test4', '', 1, '1111111', 3),
(27, 'test ', '', 1, '1111111', 4),
(28, 'test sua s', '', 1, '1455690806', 3),
(30, 'test box tes 1', '', 1, '1455690970', 4),
(38, 'đi uống cafe thôi nào anh em ơi', '', 1, '1455710846', 4),
(42, 'Hãy cho Anh nhớ em em nhé N', '', 1, '1455877614', 3),
(48, 'test\n', '', 1, '1457771116', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id_User` int(255) NOT NULL,
  `FullName` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `Img_user` text COLLATE utf8_unicode_ci NOT NULL,
  `Time` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`Id_User`, `FullName`, `Email`, `PassWord`, `Phone`, `Address`, `GioiTinh`, `Img_user`, `Time`) VALUES
(2, 'aaaaaaaaaaaaaaa', 'chauminhthien0212@gmail.com', 'a', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', '', '1111111111111111111'),
(3, 'Bad Boy', 'chauminhthien0212@gmail.com', '932bcc400c4b5a0eb470ef60679836e4', '0963501008', 'Mỏ Cày Nam, Bến Tre', 'Nam', 'cmt_n.jpg', '1450029311'),
(4, 'Test User1', 'chauminhthien@gmail.com', '932bcc400c4b5a0eb470ef60679836e4', '01682273829', 'Mỏ Cày Nam, Bến Tre', 'Nam', 'user1.png', '1455604963'),
(5, 'Sn Hoàng CNTT', 'lamsonhoang@gmail.com', '932bcc400c4b5a0eb470ef60679836e4', '01692255825', 'Trà Vinh', 'Nữ', '10628616_332560486930644_2777000834381564718_n.jpg', '1456282051'),
(6, 'Huỳnh Như CNTT', 'huynhnhu@gmail.com', '932bcc400c4b5a0eb470ef60679836e4', '01682273829', 'Bến Tre', 'Nữ', '1454695_601952869950567_5346728500306419583_n.jpg', '1456282417');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Ad`);

--
-- Index pour la table `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`Id_cmt`);

--
-- Index pour la table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`Id_kh`);

--
-- Index pour la table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`Id_lh`);

--
-- Index pour la table `noidung`
--
ALTER TABLE `noidung`
  ADD PRIMARY KEY (`Id_nd`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id_post`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Ad` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cmt`
--
ALTER TABLE `cmt`
  MODIFY `Id_cmt` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT pour la table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `Id_kh` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `Id_lh` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `noidung`
--
ALTER TABLE `noidung`
  MODIFY `Id_nd` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `Id_post` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
