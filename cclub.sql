-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 06:34 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cclub`
--
CREATE DATABASE IF NOT EXISTS `cclub` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cclub`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(20) NOT NULL,
  `admin_pass` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', '123admin123');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `anggota_id` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_user` varchar(20) NOT NULL,
  `anggota_pass` varchar(30) NOT NULL,
  `anggota_nama` varchar(30) NOT NULL,
  `anggota_bio` text NOT NULL,
  `anggota_ttl` date NOT NULL,
  `anggota_foto` varchar(200) NOT NULL,
  `anggota_foto_tipe` varchar(5) NOT NULL,
  `anggota_foto_size` int(20) NOT NULL,
  PRIMARY KEY (`anggota_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `anggota_user`, `anggota_pass`, `anggota_nama`, `anggota_bio`, `anggota_ttl`, `anggota_foto`, `anggota_foto_tipe`, `anggota_foto_size`) VALUES
(1, 'anggota1', '123123', 'Fano', 'Markisa', '1996-02-10', '', '', 0),
(2, 'anggota2', '123123', 'Fano', 'Markisa', '1996-02-10', '', '', 0),
(3, 'Fano', '123123', 'Fano', 'Markisa', '1996-02-10', '5321353769919_2294416793943055_5047493128727035904_n.jpg', 'image', 245057),
(4, 'Caterpie', '123123', 'Fano', 'Markisa', '1996-02-10', '6458166503519_10157391118366170_4667497606610419712_n.jpg', 'image', 12240),
(5, 'BEWD', '123123', 'Fano', 'Markisa', '1996-02-10', '3326466231859_2104404209685444_2273642935020945408_n.jpg', 'image', 118266),
(6, 'Aku', '123123', 'Fano', 'Markisa', '1996-02-10', '64447Logo.png', 'image', 9352);

-- --------------------------------------------------------

--
-- Table structure for table `anggota_komunitas`
--

CREATE TABLE IF NOT EXISTS `anggota_komunitas` (
  `komunitas_id` int(4) NOT NULL,
  `anggota_id` int(4) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_komunitas`
--

INSERT INTO `anggota_komunitas` (`komunitas_id`, `anggota_id`, `status`) VALUES
(2, 3, 'y'),
(2, 4, 'n'),
(2, 5, 'n'),
(3, 3, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_komunitas`
--

CREATE TABLE IF NOT EXISTS `jenis_komunitas` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_komunitas` varchar(20) NOT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jenis_komunitas`
--

INSERT INTO `jenis_komunitas` (`jenis_id`, `jenis_komunitas`) VALUES
(1, 'musik'),
(2, 'game'),
(3, 'olahraga'),
(4, 'mobil'),
(5, '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_komunitas`
--

CREATE TABLE IF NOT EXISTS `kegiatan_komunitas` (
  `kegiatan_id` int(4) NOT NULL AUTO_INCREMENT,
  `komunitas_id` int(4) NOT NULL,
  `kegiatan_nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_nama` varchar(200) NOT NULL,
  `foto_size` int(20) NOT NULL,
  `foto_tipe` varchar(5) NOT NULL,
  `kegiatan_tgl` date NOT NULL,
  PRIMARY KEY (`kegiatan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kegiatan_komunitas`
--

INSERT INTO `kegiatan_komunitas` (`kegiatan_id`, `komunitas_id`, `kegiatan_nama`, `deskripsi`, `foto_nama`, `foto_size`, `foto_tipe`, `kegiatan_tgl`) VALUES
(13, 2, 'Daily Scrum', '..', '85940IMG_20190320_131707.jpg', 1166146, 'image', '2019-07-11'),
(14, 2, 'Daily Scrum', 'A', '72048IMG_20190320_131532.jpg', 1702780, 'image', '2019-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE IF NOT EXISTS `komunitas` (
  `komunitas_id` int(4) NOT NULL AUTO_INCREMENT,
  `komunitas_user` varchar(20) NOT NULL,
  `komunitas_pass` varchar(30) NOT NULL,
  `komunitas_logo` varchar(200) NOT NULL,
  `komunitas_logo_size` int(20) NOT NULL,
  `komunitas_logo_type` varchar(5) NOT NULL,
  `komunitas_nama` varchar(30) NOT NULL,
  `komunitas_jenis` varchar(20) NOT NULL,
  `komunitas_desk` text NOT NULL,
  `komunitas_status` varchar(1) NOT NULL,
  `komunitas_alamat` text NOT NULL,
  `komunitas_kontak` varchar(14) NOT NULL,
  PRIMARY KEY (`komunitas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`komunitas_id`, `komunitas_user`, `komunitas_pass`, `komunitas_logo`, `komunitas_logo_size`, `komunitas_logo_type`, `komunitas_nama`, `komunitas_jenis`, `komunitas_desk`, `komunitas_status`, `komunitas_alamat`, `komunitas_kontak`) VALUES
(2, 'abcd', 'asdasd', '89462Logo.png', 9352, 'image', 'Community Club', 'Musik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a libero in purus vehicula viverra. Nam massa eros, lacinia vel turpis id, vehicula commodo orci. Fusce dapibus nibh vitae felis elementum, eget blandit turpis laoreet. Ut rhoncus suscipit posuere. Nam venenatis urna id urna tincidunt, ac fringilla elit molestie. Praesent quis efficitur enim, a sollicitudin nulla. Sed ac venenatis lacus. Donec fermentum placerat urna eget lacinia. Maecenas mattis mauris ut enim molestie, id mattis lectus varius.', 'Y', 'Di sana', '08123123123'),
(3, 'abcd', 'ssssss', '38040User Persona - PM.jpg', 47020, 'image', 'dddddd', 'Abcd', 'asdasda', 'N', '', ''),
(5, 'abcd', 'aaaaaaaa', '7101Design Guidelines.jpg', 49296, 'image', 'aaaa', 'mobil', 'asasa', 'Y', '', ''),
(6, 'abcd', 'asdasdasd', '42889User Persona - PM.jpg', 47020, 'image', 'aaaa', 'olahraga', 'aaaaaaaaaaa', 'N', '', ''),
(7, 'abcd', 'aaa', '5889Activity Pilih Citra.jpg', 41243, 'image', 'aaaa', 'olahraga', 'sss', 'N', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
