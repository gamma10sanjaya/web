-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2021 at 03:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_itembased`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_databuku`
--

CREATE TABLE `tb_databuku` (
  `tb_databuku_id` int(11) NOT NULL,
  `tb_databuku_nama` varchar(256) NOT NULL,
  `tb_databuku_jenis_id` int(11) NOT NULL,
  `tb_databuku_tanggal` varchar(11) NOT NULL,
  `tb_databuku_penulis` varchar(256) NOT NULL,
  `tb_databuku_penerbit` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_databuku`
--

INSERT INTO `tb_databuku` (`tb_databuku_id`, `tb_databuku_nama`, `tb_databuku_jenis_id`, `tb_databuku_tanggal`, `tb_databuku_penulis`, `tb_databuku_penerbit`, `image`, `is_active`) VALUES
(28, 'BUKU CERITA RAKYAT WONOGIRI', 21, '2009', ' Parpal Poerwanto', 'PT. Grasindo', 'File_new_734121789.jpg', 1),
(29, 'SERI SAINS EKOSISTEM', 15, '2020', 'A.Yanuar', 'PT. Bengawan Ilmu.,', 'File_new_1509706089.jpg', 1),
(30, 'PANDUAN MELUKSI DENGAN CAT MINYAK', 13, '2016', 'Philip Berrill', 'PT Indeks', 'File_new_1017388165.jpg', 1),
(31, 'PENEMUAN TENTANG TEKNOLOGI', 15, '2010', 'R Sayidin Hilal', 'PT Graha Bandung Kencana', 'File_new_953529014.jpg', 1),
(32, 'BAHAYA DAN PENCEGAHAN FLU BURUNG', 14, '2009', 'Fajar M.N', 'Mitra utama', 'File_new_1886487062.jpg', 1),
(33, 'BENCANA ALAM BENCANA MANUSIA', 14, '2008', 'Feril Zulhendri', 'Kiara alifiani', 'File_new_335385790.jpg', 1),
(34, 'KUMPULAN DOA LENGKAP', 13, '2011', 'Muhaimin Ahmad', 'CV Aneka Ilmu', 'File_new_432236306.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_databuku_jenis`
--

CREATE TABLE `tb_databuku_jenis` (
  `tb_databuku_jenis_id` int(11) NOT NULL,
  `tb_databuku_jenis_title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_databuku_jenis`
--

INSERT INTO `tb_databuku_jenis` (`tb_databuku_jenis_id`, `tb_databuku_jenis_title`) VALUES
(11, 'Buku Pelajaran'),
(12, 'Biografi'),
(13, 'Buku Referensi'),
(14, 'Buku Literatur'),
(15, 'Ensiklopedia'),
(16, 'Kamus'),
(17, 'Buku Motivasi'),
(18, 'Cerpen'),
(19, 'Novel'),
(20, 'Komik'),
(21, 'Dongeng'),
(22, 'Cerita Gambar'),
(23, 'Cerita Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_databuku_rating`
--

CREATE TABLE `tb_databuku_rating` (
  `tb_databuku_rating_id` int(11) NOT NULL,
  `tb_databuku_id` int(11) NOT NULL,
  `tb_siswa_id` int(11) NOT NULL,
  `tb_databuku_rating_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_databuku_rating`
--

INSERT INTO `tb_databuku_rating` (`tb_databuku_rating_id`, `tb_databuku_id`, `tb_siswa_id`, `tb_databuku_rating_nilai`) VALUES
(1, 11, 1, 5),
(2, 12, 1, 5),
(3, 13, 1, 5),
(4, 14, 1, 5),
(5, 15, 1, 5),
(6, 16, 1, 5),
(7, 17, 1, 5),
(8, 18, 1, 5),
(9, 19, 1, 5),
(10, 20, 1, 5),
(39, 19, 4, 4),
(40, 13, 4, 4),
(41, 16, 4, 2),
(42, 18, 4, 3),
(43, 19, 5, 3),
(44, 15, 5, 3),
(45, 19, 6, 4),
(46, 14, 6, 3),
(47, 17, 6, 3),
(48, 18, 7, 3),
(49, 11, 7, 3),
(50, 11, 8, 3),
(51, 19, 8, 3),
(52, 19, 9, 3),
(53, 14, 9, 4),
(54, 12, 10, 3),
(55, 15, 10, 4),
(56, 16, 10, 1),
(57, 18, 12, 4),
(58, 17, 12, 2),
(59, 18, 13, 4),
(60, 17, 13, 4),
(61, 19, 14, 3),
(62, 11, 14, 2),
(63, 14, 14, 4),
(64, 18, 11, 3),
(65, 11, 13, 4),
(66, 16, 13, 4),
(67, 20, 13, 3),
(68, 20, 10, 3),
(69, 14, 4, 3),
(70, 14, 7, 3),
(71, 21, 1, 5),
(72, 22, 1, 5),
(73, 23, 1, 5),
(74, 24, 1, 5),
(75, 24, 5, 3),
(76, 25, 1, 5),
(77, 26, 1, 5),
(78, 27, 1, 5),
(79, 28, 1, 5),
(80, 29, 1, 5),
(81, 30, 1, 5),
(82, 31, 1, 5),
(83, 32, 1, 5),
(84, 33, 1, 5),
(85, 34, 1, 5),
(86, 34, 15, 4),
(87, 31, 16, 5),
(88, 33, 17, 3),
(89, 28, 15, 4),
(90, 32, 17, 3),
(91, 32, 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gurukelas`
--

CREATE TABLE `tb_gurukelas` (
  `tb_gurukelas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tb_kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gurukelas`
--

INSERT INTO `tb_gurukelas` (`tb_gurukelas_id`, `user_id`, `tb_kelas_id`) VALUES
(7, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `tb_kelas_id` int(11) NOT NULL,
  `tb_kelas_title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`tb_kelas_id`, `tb_kelas_title`) VALUES
(1, 'Kelas 1'),
(2, 'Kelas 2'),
(3, 'Kelas 3'),
(4, 'Kelas 4'),
(5, 'Kelas 5'),
(6, 'Kelas 6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `tb_rombel_id` int(11) NOT NULL,
  `tb_kelas_id` int(11) NOT NULL,
  `tb_rombel_title` varchar(128) NOT NULL,
  `tb_rombel_tahun` varchar(4) NOT NULL,
  `tb_rombel_semester` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rombel`
--

INSERT INTO `tb_rombel` (`tb_rombel_id`, `tb_kelas_id`, `tb_rombel_title`, `tb_rombel_tahun`, `tb_rombel_semester`) VALUES
(3, 6, 'Kelas 6', '2021', 'GASAL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `tb_siswa_id` int(11) NOT NULL,
  `tb_rombel_id` int(11) NOT NULL,
  `tb_siswa_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`tb_siswa_id`, `tb_rombel_id`, `tb_siswa_nama`) VALUES
(1, 0, 'Super Admin'),
(15, 3, 'ADIAS PUTRA PRAYOGA'),
(16, 3, 'DAFA ZUL QHAIRAN'),
(17, 3, 'DITANINGTYAS SEKARAYU MAHESWARI'),
(18, 3, 'IBNU TRI BUWONO'),
(19, 3, 'KARISMA OKTAPIA SOUL KARNAIN'),
(20, 3, 'MUHAMMAD ARIT ALIT JAYAN SAMUDRO'),
(21, 3, 'NOVAL WAHYU PRATAMA'),
(22, 3, 'QUEENSHA REGITA FAIRISH ARZIGMA'),
(23, 3, 'RANDY IKHSAN'),
(24, 3, 'RENO IKHSAN'),
(25, 3, 'VIDHAR NAYA AMAURA'),
(26, 3, 'MUHAMMAD RANGGA ALI WIBOWO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `image`, `user_password`, `user_role_id`, `is_active`, `date_created`) VALUES
(4, 'astrida', 'astridmaulida@gmail.com', '', '$2y$10$d0TrJUuSg8RUZpfIUl85feTasG1Hy9CSQgRA8srnSZc0eif.iq1U2', 1, 1, '2021-06-24'),
(5, 'sunarti', 'sunarti@gmail.com', '', '$2y$10$HXcxyargH9zLhqogIy/Bheh9sNU6bG5P1xTBnK1uiAzXJY6tKETtS', 2, 1, '2021-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `user_access_menu_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`user_access_menu_id`, `user_role_id`, `user_menu_id`) VALUES
(1, 1, 1),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `user_menu_id` int(11) NOT NULL,
  `user_menu_title` varchar(128) NOT NULL,
  `user_menu_icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`user_menu_id`, `user_menu_title`, `user_menu_icon`) VALUES
(1, 'Dashboard', 'feather icon-home'),
(2, 'Sistem', 'feather icon-layers'),
(3, 'User', 'feather icon-user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `user_sub_menu_id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `user_sub_menu_title` varchar(128) NOT NULL,
  `user_sub_menu_url` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`user_sub_menu_id`, `user_menu_id`, `user_sub_menu_title`, `user_sub_menu_url`, `is_active`) VALUES
(1, 1, 'Jenis Buku', 'dashboard/jenisbuku', 1),
(2, 2, 'Manajemen Hak Akses', 'manajemensistem', 1),
(3, 2, 'Manajemen Menu', 'manajemensistem/manajemenmenu', 1),
(4, 1, 'Data Buku', 'dashboard/', 1),
(5, 3, 'Data Guru', 'user/dataguru\r\n', 1),
(6, 3, 'Data Rombel', 'user/rombonganbelajar', 1),
(7, 3, 'Data Siswa', 'user/datasiswa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_databuku`
--
ALTER TABLE `tb_databuku`
  ADD PRIMARY KEY (`tb_databuku_id`);

--
-- Indexes for table `tb_databuku_jenis`
--
ALTER TABLE `tb_databuku_jenis`
  ADD PRIMARY KEY (`tb_databuku_jenis_id`);

--
-- Indexes for table `tb_databuku_rating`
--
ALTER TABLE `tb_databuku_rating`
  ADD PRIMARY KEY (`tb_databuku_rating_id`);

--
-- Indexes for table `tb_gurukelas`
--
ALTER TABLE `tb_gurukelas`
  ADD PRIMARY KEY (`tb_gurukelas_id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`tb_kelas_id`);

--
-- Indexes for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  ADD PRIMARY KEY (`tb_rombel_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`tb_siswa_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`user_access_menu_id`) USING BTREE;

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`user_sub_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_databuku`
--
ALTER TABLE `tb_databuku`
  MODIFY `tb_databuku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_databuku_jenis`
--
ALTER TABLE `tb_databuku_jenis`
  MODIFY `tb_databuku_jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_databuku_rating`
--
ALTER TABLE `tb_databuku_rating`
  MODIFY `tb_databuku_rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_gurukelas`
--
ALTER TABLE `tb_gurukelas`
  MODIFY `tb_gurukelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `tb_kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `tb_rombel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `tb_siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `user_access_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `user_sub_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
