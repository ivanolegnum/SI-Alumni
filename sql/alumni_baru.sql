-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2012 at 02:20 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumni_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_alumni`
--

CREATE TABLE IF NOT EXISTS `data_alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_yudisium` date NOT NULL,
  `tgl_wisuda` date NOT NULL,
  `lama_studi` varchar(10) NOT NULL,
  `ipk` float NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `ponsel` varchar(20) NOT NULL,
  `nama_ot` varchar(255) NOT NULL,
  `alamat_ot` text NOT NULL,
  `telepon_ot` varchar(20) NOT NULL,
  `ponsel_ot` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_alumni`
--

INSERT INTO `data_alumni` (`id`, `id_user`, `nim`, `nama`, `id_jurusan`, `ttl`, `tgl_daftar`, `tgl_yudisium`, `tgl_wisuda`, `lama_studi`, `ipk`, `alamat`, `email`, `telepon`, `ponsel`, `nama_ot`, `alamat_ot`, `telepon_ot`, `ponsel_ot`) VALUES
(1, 1, '59081003041', 'Nurimansyah Rifwan', 2, 'Jakarta, 03 April 1989', '2012-10-10', '2012-12-01', '2012-12-02', '5 Tahun', 3.62, 'Jl. Pondok Bambu Asri Timur V No. 16', 'nurimansyah.rifwan@gmail.com', '+62711', '', 'Deswita', 'Jl. Amal No. 34', '+62', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE IF NOT EXISTS `data_jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `prodi` enum('D3','S1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id`, `nama`, `prodi`) VALUES
(1, 'Sistem Informasi Reguler', 'S1'),
(2, 'Sistem Informasi Bilingual', 'S1'),
(3, 'Sistem Komputer', 'S1'),
(4, 'Teknik Informatika Reguler', 'S1'),
(5, 'Teknik Informatika Bilingual', 'S1'),
(6, 'Komputerisasi Akuntansi', 'D3'),
(7, 'Manajemen Informatika', 'D3'),
(8, 'Teknik Komputer', 'D3');

-- --------------------------------------------------------

--
-- Table structure for table `data_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `data_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_pekerjaan`
--

INSERT INTO `data_pekerjaan` (`id`, `id_user`, `tgl_daftar`, `tempat`, `status`, `alamat`, `jabatan`) VALUES
(1, 1, '2012-10-10', 'Universitas Sriwjaya', 'Aktif', 'Jl. Srijaya Negara', 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('alumni','pengguna','admin') NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `username`, `password`, `level`, `status`) VALUES
(1, '59081003041', '12345', 'alumni', '1'),
(2, 'admin', 'admin', 'admin', '1'),
(3, '59081003043', 'qwerty', 'alumni', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_alumni`
--
ALTER TABLE `data_alumni`
  ADD CONSTRAINT `data_alumni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_alumni_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `data_jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD CONSTRAINT `data_pekerjaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
