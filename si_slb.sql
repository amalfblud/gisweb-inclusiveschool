-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 09:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_slb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_ptkpd`
--

CREATE TABLE `data_ptkpd` (
  `id_ptkpd` int(11) NOT NULL,
  `guru_laki` int(11) NOT NULL,
  `guru_perem` int(11) NOT NULL,
  `tendik_laki` int(11) NOT NULL,
  `tendik_perem` int(11) NOT NULL,
  `pd_laki` int(11) NOT NULL,
  `pd_perem` int(11) NOT NULL,
  `id_rekap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ptkpd`
--

INSERT INTO `data_ptkpd` (`id_ptkpd`, `guru_laki`, `guru_perem`, `tendik_laki`, `tendik_perem`, `pd_laki`, `pd_perem`, `id_rekap`) VALUES
(6, 4, 12, 1, 4, 138, 126, 6),
(7, 7, 41, 7, 7, 595, 609, 7),
(8, 15, 35, 9, 8, 434, 485, 8),
(9, 2, 5, 4, 3, 80, 48, 9),
(10, 0, 11, 1, 5, 48, 14, 10),
(11, 10, 38, 5, 3, 270, 128, 11),
(12, 1, 10, 3, 4, 70, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_sekolah`
--

CREATE TABLE `gambar_sekolah` (
  `id_gambar` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alt_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_sekolah`
--

INSERT INTO `gambar_sekolah` (`id_gambar`, `id_sekolah`, `gambar`, `alt_text`) VALUES
(148, 77, './img/savedimg/smp5-1.PNG', ''),
(149, 77, './img/savedimg/smp5-2.PNG', ''),
(150, 77, './img/savedimg/smp5-3.PNG', ''),
(151, 78, './img/savedimg/sma4-1.PNG', ''),
(152, 78, './img/savedimg/sma4-2.PNG', ''),
(153, 78, './img/savedimg/sma4-3.PNG', ''),
(154, 79, './img/savedimg/SLB Dharma Kencana 1.PNG', ''),
(155, 79, './img/savedimg/SLB Dharma Kencana 2.PNG', ''),
(156, 79, './img/savedimg/SLB Dharma Kencana 3.PNG', ''),
(157, 79, './img/savedimg/SLB Dharma Kencana 4.PNG', ''),
(160, 80, './img/savedimg/Sekolah Khusus Santo Fransiskus Assisi 1.jpg', ''),
(161, 80, './img/savedimg/Sekolah Khusus Santo Fransiskus Assisi 2.jpg', ''),
(168, 81, './img/savedimg/SLBN 1.jpg', ''),
(169, 81, './img/savedimg/SLBN 2.jpg', ''),
(170, 81, './img/savedimg/SLBN 3.jpg', ''),
(171, 82, './img/savedimg/SLB Tunas Bangsa 1.jpg', ''),
(172, 82, './img/savedimg/SLB Tunas Bangsa 2.jpg', ''),
(173, 82, './img/savedimg/SLB Tunas Bangsa 3.jpg', ''),
(178, 76, './img/savedimg/sd8-1.jpg', 'Gambar Sekolah SDN 008 Balikpapan Kota'),
(179, 76, './img/savedimg/sd8-2.PNG', ''),
(180, 76, './img/savedimg/sd8-3.PNG', '');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `rtrw` varchar(24) NOT NULL,
  `kelurahan` varchar(64) NOT NULL,
  `kecamatan` varchar(64) NOT NULL,
  `kabupaten` varchar(64) NOT NULL,
  `provinsi` varchar(64) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `notelp` varchar(24) NOT NULL,
  `nofaks` varchar(24) NOT NULL,
  `email` varchar(128) NOT NULL,
  `situs` varchar(128) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `rtrw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `notelp`, `nofaks`, `email`, `situs`, `id_sekolah`) VALUES
(14, 'Jl. Jend. Sudirman RT. 22 No. 03, Damai, Balikpapan Kota, Balikpapan, Kalimantan Timur, 76114', '22 / 0', 'Damai', 'Balikpapan Kota', 'Balikpapan', 'Kalimantan Timur', 76114, '0542-410201', '-', '-', '-', 76),
(15, 'JL. Prona II RT. 24 No. 104, Sepinggan Raya, Balikpapan Selatan, Balikpapan, Kalimantan Timur, 76111', '24 / 0', 'Sepinggan Raya', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 76111, '0542-771548', '-', '-', '-', 77),
(16, 'JL. Sepinggan Baru III RT.48 No.36, Sepinggan, Balikpapan Selatan, Balikpapan, Kalimantan Timur, 76115', '48 / 0', 'Sepinggan', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 76115, '0542-780044', '-', 'info@sman4-bpp.sch.id', 'https://sman4-bpp.sch.id/', 78),
(17, 'Jl. Pembangunan RT.38 No.30 Blok A, Telaga Sari, Balikpapan Kota, Balikpapan, Kalimantan Timur, 76111', '38 / 0', 'Telaga Sari', 'Balikpapan Kota', 'Balikpapan', 'Kalimantan Timur', 76111, '0542-410406', '0542-410406', '-', '-', 79),
(18, 'Jl. Mayor (Pol) Zaenal Arifin  RT. 18 No. 40, Damai, Balikpapan Selatan, Balikpapan, Kalimantan Timur, 76114', '18 / 0', 'Damai', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 76114, '0542-8794310', '-', 'skhfransiskusassisi@gmail.com', '-', 80),
(19, 'Jl. Let. Kol. Polisi H.M Asnawi Arbain RT 14, Seppinggan Raya, Balikpapan Selatan, Balikpapan, Kalimantan Timur, 76114', '89 / 0', 'Sepinggan Raya', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 76114, '0542-8879984', '-', '-', '-', 81),
(20, 'Jl. Kutilang RSS Damai III RT. 28, Gn. Bahagia, Balikpapan Selatan, Balikpapan, Kalimantan Timur, 76114', '28 / 0', 'Gunung Bahagia', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 76114, '0542-8870057', '-', '-', 'https://www.slbtunasbangsa.sch.id/', 82);

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `school_year` varchar(128) NOT NULL,
  `subject_name` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `school_year`, `subject_name`, `keterangan`, `id_sekolah`) VALUES
(89, 'year3', 'Bahasa Indonesia', '-', 78),
(90, 'year3', 'Bahasa Inggris', '-', 78),
(91, 'year3', 'Matematika', '-', 78),
(92, 'year3', 'Pendidikan Agama dan Budi Pekerti', '-', 78),
(93, 'year3', 'Pendidikan Kewarganegaraan', '-', 78),
(94, 'year3', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 78),
(95, 'year3', 'Teknologi Informasi dan Komputer', '-', 78),
(96, 'year3', 'Prakarya dan Kewirausahaan', '-', 78),
(97, 'year3', 'Sejarah', '-', 78),
(98, 'year3', 'Fisika', 'Kejuruan Ilmu Pengetahuan Alam (IPA)', 78),
(99, 'year3', 'Kimia', 'Kejuruan Ilmu Pengetahuan Alam (IPA)', 78),
(100, 'year3', 'Biologi', 'Kejuruan Ilmu Pengetahuan Alam (IPA)', 78),
(101, 'year3', 'Geografi', 'Kejuruan Ilmu Pengetahuan Sosial (IPS)', 78),
(102, 'year3', 'Ekonomi', 'Kejuruan Ilmu Pengetahuan Sosial (IPS)', 78),
(103, 'year3', 'Sosiologi', 'Kejuruan Ilmu Pengetahuan Sosial (IPS)', 78),
(119, 'year1', 'Bahasa Indonesia', '-', 78),
(120, 'year1', 'Bahasa Inggris', '-', 78),
(121, 'year1', 'Matematika', '-', 78),
(122, 'year1', 'Ilmu Pengetahuan Alam', '-', 78),
(123, 'year1', 'Ilmu Pengetahuan Sosial', '-', 78),
(124, 'year1', 'Pendidikan Agama dan Budi Pekerti', '-', 78),
(125, 'year1', 'Pendidikan Kewarganegaraan', '-', 78),
(126, 'year1', 'Seni Budaya dan Keterampilan', '-', 78),
(127, 'year1', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 78),
(128, 'year1', 'Teknologi Infromasi dan Komputer', '-', 78),
(129, 'year2', 'Bahasa Indonesia', '-', 78),
(130, 'year2', 'Bahasa Inggris', '-', 78),
(131, 'year2', 'Matematika', '-', 78),
(132, 'year2', 'Pendidikan Agama dan Budi Pekerti', '-', 78),
(133, 'year2', 'Pendidikan Kewarganegaraan', '-', 78),
(134, 'year2', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 78),
(135, 'year2', 'Teknologi Informasi dan Komputer', '-', 78),
(136, 'year2', 'Prakarya dan Kewirausahaan', '-', 78),
(137, 'year2', 'Sejarah', '-', 78),
(138, 'year2', 'Fisika', 'Kejuruan Ilmu Pengetahuan Alam (IPA)', 78),
(139, 'year2', 'Kimia', 'Kejuruan Ilmu Pengetahuan Alam (IPA)', 78),
(140, 'year2', 'Biologi', 'Kejuruan Ilmu Pengetahuan Alam (IPA)', 78),
(141, 'year2', 'Geografi', 'Kejuruan Ilmu Pengetahuan Sosial (IPS)', 78),
(142, 'year2', 'Ekonomi', 'Kejuruan Ilmu Pengetahuan Sosial (IPS)', 78),
(143, 'year2', 'Sosiologi', 'Kejuruan Ilmu Pengetahuan Sosial (IPS)', 78),
(144, 'year1', 'Bahasa Indonesia', '-', 77),
(145, 'year1', 'Bahasa Inggris', '-', 77),
(146, 'year1', 'Matematika', '-', 77),
(147, 'year1', 'Ilmu Pengetahuan Alam', '-', 77),
(148, 'year1', 'Ilmu Pengetahuan Sosial', '-', 77),
(149, 'year1', 'Pendidikan Agama dan Budi Pekerti', '-', 77),
(150, 'year1', 'Pendidikan Kewarganegaraan', '-', 77),
(151, 'year1', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 77),
(152, 'year1', 'Teknologi Informasi dan Komputer', '-', 77),
(153, 'year1', 'Seni Budaya', '-', 77),
(154, 'year2', 'Bahasa Indonesia', '-', 77),
(155, 'year2', 'Bahasa Inggris', '-', 77),
(156, 'year2', 'Matematika', '-', 77),
(157, 'year2', 'Ilmu Pengetahuan Alam', '-', 77),
(158, 'year2', 'Ilmu Pengetahuan Sosial', '-', 77),
(159, 'year2', 'Pendidikan Agama', '-', 77),
(160, 'year2', 'Pendidikan Kewarganegaraan', '-', 77),
(161, 'year2', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 77),
(162, 'year2', 'Teknologi Informasi dan Komunikasi', '-', 77),
(163, 'year2', 'Seni Budaya', '-', 77),
(164, 'year2', 'Prakarya', '-', 77),
(165, 'year3', 'Bahasa Indonesia', '-', 77),
(166, 'year3', 'Bahasa Inggris', '-', 77),
(167, 'year3', 'Matematika', '-', 77),
(168, 'year3', 'Ilmu Pengetahuan Alam', '-', 77),
(169, 'year3', 'Ilmu Pengetahuan Sosial', '-', 77),
(170, 'year3', 'Pendidikan Agama', '-', 77),
(171, 'year3', 'Pendidikan Kewarganegaraan', '-', 77),
(172, 'year3', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 77),
(173, 'year3', 'Teknologi Informasi dan Komputer', '-', 77),
(174, 'year3', 'Seni Budaya', '-', 77),
(175, 'year3', 'Prakarya', '-', 77),
(176, 'year3', 'Bimbingan Konseling', '-', 77),
(177, 'year1', 'Pendidikan Agama dan Budi Pekerti', '-', 76),
(178, 'year1', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 76),
(179, 'year1', 'Bahasa Indonesia', '-', 76),
(180, 'year1', 'Matematika', '-', 76),
(181, 'year1', 'Ilmu Pengetahuan Alam', '-', 76),
(182, 'year1', 'Ilmu Pengetahuan Sosial', '-', 76),
(183, 'year1', 'Seni Budaya dan Keterampilan', '-', 76),
(184, 'year1', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 76),
(185, 'year2', 'Pendidikan Agama dan Budi Pekerti', '-', 76),
(186, 'year2', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 76),
(187, 'year2', 'Bahasa Indonesia', '-', 76),
(188, 'year2', 'Matematika', '-', 76),
(189, 'year2', 'Ilmu Pengetahuan Alam', '-', 76),
(190, 'year2', 'Ilmu Pengetahuan Sosial', '', 76),
(191, 'year2', 'Seni Budaya dan Keterampilan', '-', 76),
(192, 'year2', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 76),
(193, 'year3', 'Pendidikan Agama dan Budi Pekerti', '-', 76),
(194, 'year3', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 76),
(195, 'year3', 'Bahasa Indonesia', '-', 76),
(196, 'year3', 'Matematika', '-', 76),
(197, 'year3', 'Ilmu Pengetahuan Alam', '-', 76),
(198, 'year3', 'Ilmu Pengetahuan Sosial', '-', 76),
(199, 'year3', 'Seni Budaya dan Keterampilan', '-', 76),
(200, 'year3', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 76),
(201, 'year4', 'Pendidikan Agama dan Budi Pekerti', '-', 76),
(202, 'year4', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 76),
(203, 'year4', 'Bahasa Indonesia', '-', 76),
(204, 'year4', 'Bahasa Inggris', '-', 76),
(205, 'year4', 'Matematika', '-', 76),
(206, 'year4', 'Ilmu Pengetahuan Alam', '-', 76),
(207, 'year4', 'Ilmu Pengetahuan Sosial', '-', 76),
(208, 'year4', 'Seni Budaya dan Keterampilan', '-', 76),
(209, 'year4', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 76),
(219, 'year5', 'Pendidikan Agama dan Budi Pekerti', '-', 76),
(220, 'year5', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 76),
(221, 'year5', 'Bahasa Indonesia', '-', 76),
(222, 'year5', 'Bahasa Inggris', '-', 76),
(223, 'year5', 'Matematika', '-', 76),
(224, 'year5', 'Ilmu Pengetahuan Alam', '-', 76),
(225, 'year5', 'Ilmu Pengetahuan Sosial', '-', 76),
(226, 'year5', 'Seni Budaya dan Keterampilan', '-', 76),
(227, 'year5', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 76),
(228, 'year6', 'Pendidikan Agama dan Budi Pekerti', '-', 76),
(229, 'year6', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 76),
(230, 'year6', 'Bahasa Indonesia', '-', 76),
(231, 'year6', 'Bahasa Inggris', '-', 76),
(232, 'year6', 'Matematika', '-', 76),
(233, 'year6', 'Ilmu Pengetahuan Alam', '-', 76),
(234, 'year6', 'Ilmu Pengetahuan Sosial', '-', 76),
(235, 'year6', 'Seni Budaya dan Keterampilan', '-', 76),
(236, 'year6', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '-', 76);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `status` varchar(24) NOT NULL,
  `npsn` int(11) NOT NULL,
  `bentukpend` varchar(64) NOT NULL,
  `statuspem` varchar(64) NOT NULL,
  `tglpen` date NOT NULL,
  `tglskpen` date NOT NULL,
  `skizin` varchar(24) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `status`, `npsn`, `bentukpend`, `statuspem`, `tglpen`, `tglskpen`, `skizin`, `id_sekolah`) VALUES
(18, 'Negeri', 30402860, 'SD', 'Pemerintah Daerah', '1975-07-01', '1975-07-01', '420/2386/Disdikbud', 76),
(19, 'Negeri', 30401474, 'SMP', 'Pemerintah Daerah', '1978-11-24', '1978-11-24', '037/0/01978', 77),
(20, 'Negeri', 30401488, 'SMA', 'Pemerintah Daerah', '2016-05-04', '2016-05-04', '420/1317/SKT/V/2016', 78),
(21, 'Swasta', 30402882, 'SLB', 'Yayasan', '2004-11-10', '2004-11-10', '424/3204/111/2004', 79),
(22, 'Swasta', 69965143, 'SLB', 'Yayasan', '2016-08-16', '2016-08-16', '421.9/2890/Disdik.II/201', 80),
(23, 'Negeri', 30401525, 'SLB', 'Pemerintah Daerah', '2006-04-19', '2006-04-19', '800/K.1737/IV/2006', 81),
(24, 'Swasta', 30402883, 'SLB', 'Yayasan', '1999-04-19', '1999-04-19', '800/K.173/IV/2006', 82);

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `r_pimpinan` int(11) NOT NULL,
  `r_guru` int(11) NOT NULL,
  `r_kelas` int(11) NOT NULL,
  `r_perpus` int(11) NOT NULL,
  `r_labo` int(11) NOT NULL,
  `r_prak` int(11) NOT NULL,
  `r_ibadah` int(11) NOT NULL,
  `r_uks` int(11) NOT NULL,
  `r_tu` int(11) NOT NULL,
  `r_bk` int(11) NOT NULL,
  `r_osis` int(11) NOT NULL,
  `r_toilet` int(11) NOT NULL,
  `r_gudang` int(11) NOT NULL,
  `r_berolahraga` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id_rekap`, `r_pimpinan`, `r_guru`, `r_kelas`, `r_perpus`, `r_labo`, `r_prak`, `r_ibadah`, `r_uks`, `r_tu`, `r_bk`, `r_osis`, `r_toilet`, `r_gudang`, `r_berolahraga`, `id_sekolah`) VALUES
(6, 1, 1, 7, 1, 0, 0, 1, 1, 1, 0, 0, 4, 1, 0, 76),
(7, 1, 1, 32, 1, 5, 0, 1, 1, 1, 1, 1, 36, 2, 1, 77),
(8, 1, 2, 31, 1, 8, 0, 1, 1, 1, 1, 1, 44, 1, 1, 78),
(9, 1, 1, 9, 1, 1, 0, 1, 0, 1, 0, 0, 4, 1, 0, 79),
(10, 1, 1, 14, 1, 1, 1, 0, 1, 1, 1, 0, 21, 2, 1, 80),
(11, 1, 1, 43, 1, 0, 0, 0, 1, 1, 0, 0, 11, 0, 0, 81),
(12, 1, 1, 9, 1, 1, 1, 1, 1, 1, 1, 0, 4, 0, 0, 82);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(128) NOT NULL,
  `nama_kepsek` varchar(128) NOT NULL,
  `akreditasi` varchar(5) NOT NULL,
  `kebsus` varchar(64) NOT NULL,
  `kurikulum` varchar(64) NOT NULL,
  `latitude` varchar(64) NOT NULL,
  `longitude` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `nama_kepsek`, `akreditasi`, `kebsus`, `kurikulum`, `latitude`, `longitude`) VALUES
(76, 'SD NEGERI 008 BALIKPAPAN KOTA', 'Rahayu Purwaningsih', 'A', 'K, Q', 'SD 2013 & Merdeka', '-1.2713543', '116.8575616'),
(77, 'SMP NEGERI 5 BALIKPAPAN', 'Wisnugroho Suronto', 'A', 'K', 'SMP 2013', '-1.259979', '116.9099229'),
(78, 'SMAN 4 BALIKPAPAN SELATAN', 'Agus Ikhsan', 'A', 'C1, K', 'SMA 2013 Bhs&Budaya', '-1.2441096', '116.9019177'),
(79, 'SLB DHARMA KENCANA BALIKPAPAN', 'Tutik Suwarni', 'B', 'B, C, C1, D, F, H, K, P, Q', 'TKLB 2013', '-1.2607243', '116.8295101'),
(80, 'Sekolah Khusus Santo Fransiskus Assisi', 'Damayanti Nahampun', 'B', 'B, C, D, H, Q', 'TKLB 2013', '-1.2525853', '116.8559269'),
(81, 'SLBN BALIKPAPAN', 'Mulyono', 'A', 'A, B, C, D, P, Q', 'TKLB 2013', '-1.249321', '116.8881595'),
(82, 'SLB TUNAS BANGSA', 'Yuliatin Chasanah', 'B', 'B, C1, D, E, P, Q', 'Pendidikan Khusus SMALB 2013', '-1.2454689', '116.8881175');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ptkpd`
--
ALTER TABLE `data_ptkpd`
  ADD PRIMARY KEY (`id_ptkpd`),
  ADD KEY `id_rekap` (`id_rekap`);

--
-- Indexes for table `gambar_sekolah`
--
ALTER TABLE `gambar_sekolah`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `fk_kontak_sekolah` (`id_sekolah`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`),
  ADD KEY `fk_kurikulum_sekolah` (`id_sekolah`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `fk_profil_sekolah` (`id_sekolah`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_ptkpd`
--
ALTER TABLE `data_ptkpd`
  MODIFY `id_ptkpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gambar_sekolah`
--
ALTER TABLE `gambar_sekolah`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_ptkpd`
--
ALTER TABLE `data_ptkpd`
  ADD CONSTRAINT `data_ptkpd_ibfk_1` FOREIGN KEY (`id_rekap`) REFERENCES `rekap` (`id_rekap`);

--
-- Constraints for table `gambar_sekolah`
--
ALTER TABLE `gambar_sekolah`
  ADD CONSTRAINT `gambar_sekolah_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `fk_kontak_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD CONSTRAINT `fk_kurikulum_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_profil_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `rekap_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
