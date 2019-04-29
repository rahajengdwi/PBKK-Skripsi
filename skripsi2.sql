-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 05:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `favicon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`) VALUES
(1, 'Susantokun', 'member.png', 'admin.png', 'susantokun.com@gmail.com', '081906515912', 'Jl. Tegal Lega No.61 Kost Cherrry 2 Kamar T Bogor Tengah Kota Bogor', 'https://facebook.com/susantokun', 'https://instagram.com/susantokun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Administrator adalah'),
(2, 'Member', 'Member adalah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sidang`
--

CREATE TABLE `tbl_sidang` (
  `id_sidang` int(11) NOT NULL,
  `id_proposal` varchar(100) NOT NULL,
  `dospeng1` varchar(100) DEFAULT NULL,
  `dospeng2` varchar(100) DEFAULT NULL,
  `tanggal_sidang` datetime DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sidang`
--

INSERT INTO `tbl_sidang` (`id_sidang`, `id_proposal`, `dospeng1`, `dospeng2`, `tanggal_sidang`, `nilai`) VALUES
(15, '15', 'Radityo Onggo', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(16, '16', 'Abdul Munif', 'Radityo Onggo', '2019-01-01 00:00:00', NULL),
(17, '17', 'Radityo Onggo', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(18, '31', 'Abdul Munif', 'Radityo Onggo', '2019-04-06 00:00:00', NULL),
(32, '30', 'Fajar Baskoro', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(33, '33', 'Radityo Onggo', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(34, '33', 'Abdul Munif', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(35, '33', 'Nurul Fajrin', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(37, '33', 'Abdul Munif', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(38, '29', 'Radityo Onggo', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(39, '15', 'Fajar Baskoro', '--Dosen Penguji--', '0000-00-00 00:00:00', NULL),
(40, '36', 'Radityo Onggo', 'Fajar Baskoro', '2019-04-07 00:00:00', NULL),
(41, '31', 'Nurul Fajrin', 'Abdul Munif', '2019-04-13 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `activation_code` varchar(50) NOT NULL,
  `forgotten_password_code` varchar(50) NOT NULL,
  `forgotten_password_time` datetime NOT NULL,
  `remember_code` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `photo`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, 'Kaprodi', '$2y$05$WGJb.tDgy7jIhte7sxWGFe4nV/wiBVr7DbSApg2M.W5v1IcoVSWVa', 'Kaprodi', '', 'kaprodi@admin.com', '081906515912', '1526456245974.png', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2018-05-22 20:58:33', 1),
(2, 2, 'Mahasiswa', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', 'Rahajeng', 'Dwi', 'ajeng@mahasiswa.com', '09876545678', '1526517213176.png', '', '', '0000-00-00 00:00:00', '', '2018-05-16 14:31:53', '2018-05-22 21:15:27', 1),
(3, 3, 'Dosen', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', 'Dosen', 'RMK', 'dosen@admin.com', '09876545678', '1526517213176.png', '', '', '0000-00-00 00:00:00', '', '2018-05-16 14:31:53', '2018-05-22 21:15:27', 1),
(4, 4, 'Dosbing', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', 'Dosen', 'Pembimbing', 'dosbing@admin.com', '09876545678', '1526517213176.png', '', '', '0000-00-00 00:00:00', '', '2018-05-16 14:31:53', '2018-05-22 21:15:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nip` int(15) NOT NULL,
  `nama_dosen` varchar(266) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nip`, `nama_dosen`) VALUES
(7890, 'Abdul Munif'),
(111213, 'Radityo Onggo'),
(123456, 'Nurul Fajrin'),
(131415, 'Fajar Baskoro'),
(20221222, 'Nanik Suciati');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proposal`
--

CREATE TABLE `tb_proposal` (
  `id_user` int(11) NOT NULL,
  `prefix` varchar(2) NOT NULL DEFAULT 'TA',
  `id_proposal` int(10) UNSIGNED NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `nrp` varchar(14) NOT NULL,
  `rmk` varchar(5) NOT NULL,
  `judul_ta` text NOT NULL,
  `abstrak_ta` text NOT NULL,
  `kata_kunci_ta` text NOT NULL,
  `pembimbing1_ta` varchar(100) NOT NULL,
  `nip1` varchar(30) DEFAULT NULL,
  `pembimbing2_ta` varchar(100) DEFAULT NULL,
  `nip2` varchar(30) DEFAULT NULL,
  `proposal_ta` blob NOT NULL,
  `referensi_ta` blob,
  `revisi` text,
  `status` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_proposal`
--

INSERT INTO `tb_proposal` (`id_user`, `prefix`, `id_proposal`, `nama_mhs`, `nrp`, `rmk`, `judul_ta`, `abstrak_ta`, `kata_kunci_ta`, `pembimbing1_ta`, `nip1`, `pembimbing2_ta`, `nip2`, `proposal_ta`, `referensi_ta`, `revisi`, `status`, `created_at`, `updated_at`) VALUES
(0, 'TA', 15, 'Nabilah Zaki Lismia', '05111540000020', 'IGS', 'Simulasi Berbicara dalam Bahasa Asing Berbasis Realitas Virtual Menggunakan Speech Recognition, Chatbot, dan Teknologi Google Daydream', 'Simulasi Berbicara dalam Bahasa Asing Berbasis Realitas Virtual Menggunakan Speech Recognition, Chatbot, dan Teknologi Google Daydream\r\n', 'daydream', 'Rizky Januar Akbar, S.Kom., M.Eng.', '198701032014041001', 'Abdul Munif, S.Kom., M.Sc.', '198608232015041004', 0x6c656d6261725f70656e6765736168616e2e706466, NULL, NULL, 'Menunggu Sidang Proposal', '2019-03-08 13:20:22', '2019-03-09 20:54:52'),
(0, 'TA', 16, 'SHAFIRA AISYAH RAHMADHANI', '05111540000098', 'RPL', 'Rancang Bangun Aplikasi Katalog Bersama Perpustakaan ITS Terintegrasi Berbasis Web', 'Rancang Bangun Aplikasi Katalog Bersama Perpustakaan ITS Terintegrasi Berbasis Web', 'katalog', 'Rizky Januar Akbar, S.Kom., M.Eng.', '198701032014041001', 'Radityo Anggoro S.Kom, M.Sc', '198410162008121002', '', NULL, NULL, 'Revisi', NULL, '2019-03-08 19:05:13'),
(0, 'TA', 17, 'Alfindio Muhammad Abdallah', '05111540000164', 'MI', 'Sentiment Analysis pada Tweet berbahasa Indonesia menggunakan fastText dengan metode klasifikasi Naïve Bayes, Decision Tree, dan Random Forest', 'Sentiment Analysis pada Tweet berbahasa Indonesia menggunakan fastText dengan metode klasifikasi Naïve Bayes, Decision Tree, dan Random Forest\r\n', 'Naive Bayes', 'Abdul Munif, S.Kom., M.Sc.', '198608232015041004', '', NULL, 0x50726f706f73616c205441202d205361747269796f204e7567726f686f202d2030353131313534303030303033342e706466, '', NULL, 'Menunggu Sidang Proposal', '2019-03-08 16:00:42', '2019-03-08 21:15:18'),
(0, 'TA', 29, 'Alvin Mudhoffar', '05111540000062', 'RPL', 'Implementasi Otentikasi Single-Factor dan Multi-Factor Berbasis Protokol WebAuthn di Aplikasi myITS Single Sign-On', 'Implementasi Otentikasi Single-Factor dan Multi-Factor Berbasis Protokol WebAuthn di Aplikasi myITS Single Sign-On', 'SSO', 'Rizky Januar Akbar, S.Kom., M.Eng.', '198701032014041001', 'Abdul Munif, S.Kom., M.Sc.', '198608232015041004', 0x50726f706f73616c5f54415f2d5f5361747269796f5f4e7567726f686f5f2d5f30353131313534303030303033342e706466, NULL, NULL, 'Menunggu Sidang Proposal', '2019-03-09 15:32:19', '2019-03-09 15:34:09'),
(0, 'TA', 30, 'Satriyo Nugroho', '05111540000034', 'MI', 'Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing', 'Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing', 'NLP', 'Dr.tech. Ir. R.V.HARI GINARDI, M.Sc.', '196505181992031003', 'Kelly Rossa Sungkono, S.Pd., M,Pd.', '1994201912088', 0x50726f706f73616c5f54415f2d5f5361747269796f5f4e7567726f686f5f2d5f3035313131353430303030303334312e706466, NULL, 'tes revisi lagi', 'Mengusulkan', '2019-03-11 15:05:54', '2019-03-11 16:20:41'),
(2, 'TA', 31, 'Rahajeng', '5115100033', 'KCV', 'segmentasi citra digital', 'contoh abstrak', '', 'Nanik Suciati', '20221222', 'Fajar Baskoro', '131415', 0x7365676d656e74617369206369747261206469676974616c2e706466, NULL, NULL, 'OK', '2019-04-09 09:38:49', '2019-04-09 09:41:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sidang`
--
ALTER TABLE `tbl_sidang`
  ADD PRIMARY KEY (`id_sidang`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD UNIQUE KEY `prefix` (`prefix`,`id_proposal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sidang`
--
ALTER TABLE `tbl_sidang`
  MODIFY `id_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  MODIFY `id_proposal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
