-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 09:54 PM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logistik`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(20) NOT NULL,
  `barang` varchar(20) NOT NULL,
  `jml` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `perusahaan` varchar(20) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `biaya` varchar(30) NOT NULL,
  `pengiriman` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `barang`, `jml`, `nama`, `perusahaan`, `alamat_perusahaan`, `keterangan`, `status`, `biaya`, `pengiriman`) VALUES
(3, 'P000', 'Bamper', '100', 'Ferri Achmad Effindri', 'PT. SUKA FAJAR', 'Jl. Berok Raya no 40 Siteba', 'Warna Merah 10 Warna Putih 90', 'Setuju', '100000000', 'Sudah diKirim');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int(20) NOT NULL AUTO_INCREMENT,
  `kode_pengiriman` varchar(50) NOT NULL,
  `kode_pemesanan` varchar(50) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `jml` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `pengiriman` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `kode_pengiriman`, `kode_pemesanan`, `barang`, `jml`, `nama`, `perusahaan`, `tujuan`, `pengiriman`) VALUES
(4, 'K000', 'P000', 'Bamper', '100', 'Ferri Achmad Effindri', 'PT. SUKA FAJAR', 'Jl. Berok Raya no 40', 'Sudah diKirim');

-- --------------------------------------------------------

--
-- Table structure for table `rb_halaman`
--

CREATE TABLE IF NOT EXISTS `rb_halaman` (
  `judul` varchar(255) NOT NULL,
  `halaman` varchar(20) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`halaman`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rb_halaman`
--

INSERT INTO `rb_halaman` (`judul`, `halaman`, `detail`) VALUES
('Selamat Datang Di Halaman Utama Aplikasi Pengiriman Logistik', 'home', 'Aplikasi Pengiriman Logistik merupakan aplikasi yang dapat membantu perusahaan dalam memesan sampai dengan proses pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `rb_login`
--

CREATE TABLE IF NOT EXISTS `rb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'members',
  `email` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_login`
--

INSERT INTO `rb_login` (`username`, `password`, `nama_lengkap`, `perusahaan`, `level`, `email`, `nohp`, `alamat`) VALUES
('joko', 'joko', 'Joko Susilo', '', 'admin', 'admin@gmail.com', '082170214499', 'Jl.Sudirman 21 '),
('lala', 'lala', 'Lala Fernanda', 'PT. Toyota Intercom', 'head', 'lala@gmail.com', '081993448855', 'Jl.Veteran No 21 A'),
('kaka', 'kaka', 'Kaka Wijayanto', 'PT. Sucafindo', 'supplier', 'kaka@gmail.com', '082170214499', 'Jl.Siteba'),
('ferri', '12345', 'Ferri Achmad Effindri', 'PT. SUKA FAJAR', 'customer', 'vendry@gmail.com', '082170214498', 'Jl. Berok Raya no 40 Siteba'),
('yaya', 'yaya', 'Nur Hidayah', 'PT. Toyota Intercom', 'dph', 'nurhidayah@gmail.com', '083177663448', 'Jl.Ujung Gurun No 56');
