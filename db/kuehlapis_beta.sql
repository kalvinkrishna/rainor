-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2018 at 03:54 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuehlapis_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(9) NOT NULL,
  `phone` char(13) NOT NULL,
  `status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `name`, `email`, `content`, `category`, `phone`, `status`, `date_from`, `date_to`) VALUES
(6, 'dgfdgfdg', 'bincarhrp@gmail.com', '', '', '', 'No', '0000-00-00', NULL),
(7, 'dsfdsfsf', 'bincarhrp@gmail.com', 'pesan', 'feedback', '', 'No', '2018-09-13', NULL),
(8, 'dfgfdgfd', 'bincarhrp@gmail.com', 'pesan', 'Comment', 't4564646456', 'No', '2018-09-13', NULL),
(9, '', '', 'pesan', 'Comment', '', 'Yes', '2018-09-13', '2018-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `customer_dtl_order`
--

CREATE TABLE `customer_dtl_order` (
  `id_dtl_cust_order` int(11) NOT NULL,
  `id_cust_order` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `delivery_timing` char(19) NOT NULL,
  `price` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_dtl_order`
--

INSERT INTO `customer_dtl_order` (`id_dtl_cust_order`, `id_cust_order`, `qty`, `location`, `delivery_timing`, `price`, `product_name`, `date`) VALUES
(1, 21, 5, 'Indonesia', '07:49:00 - 10:49:00', 10, 'Corn Sugar', '2018-08-10'),
(2, 21, 5, 'Indonesia', '07:08:00 - 08:55:00', 10, 'Flour', '2018-08-22'),
(6, 24, 10, 'Indonesia', '07:49:00 - 10:49:00', 10, 'Corn Sugar', '2018-08-22'),
(7, 25, 10, 'Indonesia', '07:08:00 - 08:55:00', 10, 'Flour', '2018-07-26'),
(8, 25, 1, 'Indonesia', '07:49:00 - 10:49:00', 10, 'Corn Sugar', '2018-08-19'),
(9, 26, 10, 'Indonesia', '07:08:00 - 08:55:00', 10, 'Flour', '2018-07-26'),
(10, 26, 1, 'Indonesia', '07:49:00 - 10:49:00', 10, 'Corn Sugar', '2018-08-19'),
(11, 27, 10, 'Indonesia', '07:08:00 - 08:55:00', 10, 'Flour', '2018-07-26'),
(12, 28, 10, 'Indonesia', '07:08:00 - 08:55:00', 10, 'Flour', '2018-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id_cust_order` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_no` char(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id_cust_order`, `full_name`, `mobile_no`, `email`) VALUES
(21, 'wilson', '081327036950', 'kevinnasumi@gmail.com'),
(24, 'wilson', '0867356363', 'kevinnasumi@gmail.com'),
(25, 'wilson', '081327036950', 'kevinnasumi@gmail.com'),
(26, 'wilson', '081231313', 'kevinnasumi@gmail.com'),
(27, 'wilson', '1208913083901', 'lupa@gmail.com'),
(28, 'wilson', '086766', 'bram_jgja@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `aktif`, `location`) VALUES
(4, 'Y', 'Indonesia'),
(8, 'N', 'Ab'),
(9, 'N', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(5) NOT NULL,
  `id_inv` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hp` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `alamat` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kustomer` int(5) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(15) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL,
  `kode_kupon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `harga_kupon` int(11) NOT NULL,
  `jasa_pengiriman` varchar(150) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_inv`, `nama`, `email`, `hp`, `aktif`, `alamat`, `status_order`, `tgl_order`, `jam_order`, `id_kustomer`, `kode_unik`, `id_provinsi`, `id_kecamatan`, `id_kota`, `ongkos_kirim`, `kode_kupon`, `harga_kupon`, `jasa_pengiriman`) VALUES
(279, '', 'Manila', 'manilakristin21@gmail.com ', '08789911121', 'Y', 'Kragilan Sinduadi Mlati Sleman', 'Baru', '2018-09-14', '11:40:14', 0, 0, 0, 0, 0, 0, '', 0, ''),
(278, '', 'name01', 'fery_gideon@yahoo.com', '1', 'Y', 'yishun', 'Baru', '2018-09-13', '23:59:42', 0, 0, 0, 0, 0, 0, '', 0, ''),
(277, '', 'Fena', 'manilakristin21@gmail.com', '087839911122', 'Y', 'Jl.Magelang', 'Baru', '2018-09-13', '17:42:01', 0, 0, 0, 0, 0, 0, '', 0, ''),
(276, '', 'dfgdgdfg', 'bincarhrp@gmail.com', '56765765756', 'Y', 'sdfdsfsfsf', 'Baru', '2018-09-13', '17:27:06', 0, 0, 0, 0, 0, 0, '', 0, ''),
(280, '', 'fery gideon', 'fery_gideon@yahoo.com', '81289446', 'Y', 'yishun1 ', 'Baru', '2018-09-23', '00:19:06', 0, 0, 0, 0, 0, 0, '', 0, ''),
(273, '', 'cvbcvbcv', 'bincarhrp@gmail.com', '57657657', 'N', 'dfgdgdfgfdg', 'Baru', '2018-09-13', '17:11:45', 0, 0, 0, 0, 0, 0, '', 0, ''),
(271, '', 'xcvxcvcx', 'bincarhrp@gmail.com', '34345345', 'N', 'xcvxcvcxvcx', 'Baru', '2018-09-13', '17:04:50', 0, 0, 0, 0, 0, 0, '', 0, ''),
(269, '', 'sfsdfsdfsd', 'bincarhrp@gmail.com', '34534534', 'N', 'sdfsdfsdfdsf', 'Baru', '2018-09-13', '16:55:14', 0, 0, 0, 0, 0, 0, '', 0, ''),
(281, '', 'Eni', 'manilakristin21@gmail.com', '08783991121', 'Y', 'Jl.Magelang', 'Baru', '2018-09-24', '16:15:45', 0, 0, 0, 0, 0, 0, '', 0, ''),
(266, '', 'sdfdsfsd', 'ibelong_2u@yahoo.com', '345435435', 'Y', 'dfgfdgdg', 'Baru', '2018-09-13', '16:28:43', 0, 0, 0, 0, 0, 0, '', 0, ''),
(262, '', 'fghgfhgf', 'ibelong_2u@yahoo.com', '45654645', 'N', 'dfgfdgfd', 'Baru', '2018-09-12', '22:50:44', 0, 0, 0, 0, 0, 0, '', 0, ''),
(263, '', 'werewrwer', 'bincarhrp@gmail.com', '6546546456', 'Y', 'tretetert', 'Baru', '2018-09-12', '22:51:44', 0, 0, 0, 0, 0, 0, '', 0, ''),
(264, '', 'gtyutyuytuyt', 'ibelong_2u@yahoo.com', '456456546', 'N', 'dgdfgfdgfdg', 'Baru', '2018-09-12', '23:08:49', 0, 0, 0, 0, 0, 0, '', 0, ''),
(265, '', 'Bronto', 'manilakristin21@gmail.com', '087839911121', 'Y', 'Jl.Magelang', 'Baru', '2018-09-12', '23:15:45', 0, 0, 0, 0, 0, 0, '', 0, ''),
(282, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:18:46', 0, 0, 0, 0, 0, 0, '', 0, ''),
(283, '', 'mam', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:30:13', 0, 0, 0, 0, 0, 0, '', 0, ''),
(284, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:31:06', 0, 0, 0, 0, 0, 0, '', 0, ''),
(285, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:31:26', 0, 0, 0, 0, 0, 0, '', 0, ''),
(286, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:31:33', 0, 0, 0, 0, 0, 0, '', 0, ''),
(287, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:31:43', 0, 0, 0, 0, 0, 0, '', 0, ''),
(288, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:32:06', 0, 0, 0, 0, 0, 0, '', 0, ''),
(289, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:32:18', 0, 0, 0, 0, 0, 0, '', 0, ''),
(290, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:32:43', 0, 0, 0, 0, 0, 0, '', 0, ''),
(291, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:32:53', 0, 0, 0, 0, 0, 0, '', 0, ''),
(292, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:33:05', 0, 0, 0, 0, 0, 0, '', 0, ''),
(293, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:33:16', 0, 0, 0, 0, 0, 0, '', 0, ''),
(294, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:33:50', 0, 0, 0, 0, 0, 0, '', 0, ''),
(295, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:34:00', 0, 0, 0, 0, 0, 0, '', 0, ''),
(296, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:34:12', 0, 0, 0, 0, 0, 0, '', 0, ''),
(297, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:34:27', 0, 0, 0, 0, 0, 0, '', 0, ''),
(298, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:34:33', 0, 0, 0, 0, 0, 0, '', 0, ''),
(299, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:34:46', 0, 0, 0, 0, 0, 0, '', 0, ''),
(300, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:36:34', 0, 0, 0, 0, 0, 0, '', 0, ''),
(301, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:36:35', 0, 0, 0, 0, 0, 0, '', 0, ''),
(302, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:38:19', 0, 0, 0, 0, 0, 0, '', 0, ''),
(303, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:38:50', 0, 0, 0, 0, 0, 0, '', 0, ''),
(304, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:39:12', 0, 0, 0, 0, 0, 0, '', 0, ''),
(305, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:39:51', 0, 0, 0, 0, 0, 0, '', 0, ''),
(306, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:39:56', 0, 0, 0, 0, 0, 0, '', 0, ''),
(307, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:40:10', 0, 0, 0, 0, 0, 0, '', 0, ''),
(308, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:40:35', 0, 0, 0, 0, 0, 0, '', 0, ''),
(309, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:40:45', 0, 0, 0, 0, 0, 0, '', 0, ''),
(310, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:41:05', 0, 0, 0, 0, 0, 0, '', 0, ''),
(311, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:41:15', 0, 0, 0, 0, 0, 0, '', 0, ''),
(312, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:41:21', 0, 0, 0, 0, 0, 0, '', 0, ''),
(313, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:41:30', 0, 0, 0, 0, 0, 0, '', 0, ''),
(314, '', 'Store Timur', 'calvin.krishna@technopartner.id', '081239163285', 'Y', 'Jalan Kapten Pattimurah No 50 Rt 11 Rw 04', 'Baru', '2018-10-19', '00:43:31', 0, 0, 0, 0, 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_product`, `jumlah`) VALUES
(1, 23, 1),
(1, 25, 2),
(2, 25, 5),
(266, 15, 1),
(266, 16, 1),
(267, 13, 1),
(267, 15, 1),
(267, 17, 0),
(268, 10, 1),
(268, 12, 10),
(268, 15, 1),
(269, 11, 1),
(269, 13, 1),
(269, 15, 1),
(269, 17, 0),
(270, 11, 1),
(270, 15, 1),
(271, 9, 1),
(271, 11, 1),
(271, 13, 1),
(272, 13, 1),
(272, 15, 1),
(273, 9, 1),
(273, 13, 1),
(274, 10, 1),
(274, 12, 1),
(275, 11, 3),
(275, 9, 1),
(275, 13, 1),
(276, 12, 1),
(276, 11, 1),
(276, 10, 2),
(277, 16, 2),
(277, 6, 3),
(278, 3, 2),
(278, 16, 1),
(279, 20, 2),
(280, 3, 1),
(280, 6, 1),
(281, 20, 2),
(282, 47, 7),
(283, 47, 19),
(283, 47, 9),
(283, 47, 18),
(284, 47, 17),
(284, 47, 3),
(284, 47, 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE `orders_temp` (
  `id_orders_temp` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_times` int(11) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `timeorder_temp` int(11) NOT NULL,
  `warna_temp` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `harga_temp` int(11) NOT NULL,
  `diskon_temp` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `id_product`, `id_times`, `id_session`, `jumlah`, `timeorder_temp`, `warna_temp`, `harga_temp`, `diskon_temp`, `subtotal`, `tgl_order_temp`, `jam_order_temp`, `stok_temp`) VALUES
(478, 20, 0, '6b0e0045d05ff64e4fb8a9f83446057d', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(477, 5, 0, '6b0e0045d05ff64e4fb8a9f83446057d', 2, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(476, 15, 0, '6b0e0045d05ff64e4fb8a9f83446057d', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(475, 11, 0, '75804e32b60b7d4f8fc6035f462324d0', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(474, 20, 0, '75804e32b60b7d4f8fc6035f462324d0', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(473, 19, 0, '75804e32b60b7d4f8fc6035f462324d0', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(472, 16, 0, '75804e32b60b7d4f8fc6035f462324d0', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(471, 7, 0, '75804e32b60b7d4f8fc6035f462324d0', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(467, 3, 0, '8acaa4cc64d1734e2ff5edb00c94206a', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(466, 3, 0, '8699308fec8dad0f94bbf44644963aa8', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(465, 7, 0, 'a6335d408cf911278a4ca6a230da643c', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(464, 4, 0, '3697c055ba6be85e8a3aee5ec070cc97', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(463, 4, 0, '2fbc80fcaaa79394b2d503123815f9c7', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(431, 13, 0, '6ce4ac2ea5db8c05e6d48649804360af', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(430, 14, 0, '6445fe04dc9afdf688783baa45d2ace1', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(428, 16, 0, '4790cfe5ee59c4f1474d9850b00e5659', 2, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(427, 15, 0, '13b2cf91178e5a5735fb5573f88fdfec', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(417, 13, 0, 'fe4226b95e3f67e8ec6fa4641c41e517', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(416, 15, 0, 'fe4226b95e3f67e8ec6fa4641c41e517', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(479, 16, 0, '6b0e0045d05ff64e4fb8a9f83446057d', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(480, 19, 0, '6b0e0045d05ff64e4fb8a9f83446057d', 18, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(481, 20, 0, '6cd69d55967d970cdc517a57d75ce668', 1, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(486, 24, 0, '44f553aa167f0f068181d821e10e0592', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(485, 24, 0, 'c1cff560f641ddaeea8a42724da859f6', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(487, 24, 0, 'bfbef51866ce3314d34fdd666dbe96fc', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(488, 24, 0, 'a3e48330102b4e6887baa4fa9f10d848', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(489, 24, 0, 'c286059fe58a7ab9acc8d891bddb6cd9', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(490, 0, 0, 'b32bb98c6f250014c97878a6494a0920', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(491, 47, 0, 'a87d56f9ec5f24066c9c5d241772c14e', 0, 0, '', 0, 0, 0, '0000-00-00', '00:00:00', 0),
(492, 47, 119, 'a87d56f9ec5f24066c9c5d241772c14e', 5, 0, '', 0, 0, 0, '2018-10-18', '19:07:10', 0),
(493, 47, 120, 'a87d56f9ec5f24066c9c5d241772c14e', 7, 0, '', 0, 0, 0, '2018-10-18', '19:03:24', 0),
(494, 47, 123, 'a87d56f9ec5f24066c9c5d241772c14e', 12, 0, '', 0, 0, 0, '2018-10-18', '19:03:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_admin`
--

CREATE TABLE `order_admin` (
  `id_order` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `date_order` date NOT NULL,
  `slot_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_admin`
--

INSERT INTO `order_admin` (`id_order`, `product_name`, `date_order`, `slot_order`) VALUES
(6, 'Flour', '2018-07-26', 6),
(8, 'Corn Sugar', '2018-08-19', 3),
(10, 'Original 1 KG', '2018-09-10', 10),
(11, 'Original 0.5 KG', '2018-09-10', 10),
(12, 'Original 1/4 KG', '2018-09-11', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_time`
--

CREATE TABLE `order_time` (
  `id_dtl_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `delivery_start` time NOT NULL,
  `delivery_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_time`
--

INSERT INTO `order_time` (`id_dtl_order`, `id_order`, `delivery_start`, `delivery_end`) VALUES
(1, 6, '07:08:00', '08:55:00'),
(2, 6, '10:10:00', '15:10:00'),
(3, 8, '07:49:00', '10:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(5) NOT NULL,
  `product_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_description` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `price` double NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `product_description`, `price`, `image`) VALUES
(25, 'Strawberry Cake', 'testts', 15000, '411191.jpg'),
(26, 'xvfxvxcvxc', 'cbcvbcvbcvb', 500000, '442556-cakes-strawberry-cake-wallpaper-2.jpg'),
(47, 'Silit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ornare turpis vestibulum tempus porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce diam erat, consectetur ac mi non, vestibulum aliquam nisl. Suspendisse interdum sem nec tortor rutrum ornare. Nullam lacinia odio libero, at bibendum lacus mollis eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; ', 30000, 'photo_2017-03-06_19-52-02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_avaliable`
--

CREATE TABLE `product_avaliable` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `_dates` date NOT NULL,
  `_from` time NOT NULL,
  `_to` time NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_avaliable`
--

INSERT INTO `product_avaliable` (`id`, `id_product`, `_dates`, `_from`, `_to`, `slot`) VALUES
(119, 47, '2015-03-20', '10:19:00', '10:19:00', 50),
(120, 47, '2015-03-20', '10:19:00', '10:19:00', 30),
(123, 47, '2015-03-20', '10:19:00', '10:19:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_photo`
--

INSERT INTO `product_photo` (`id`, `id_product`, `image`) VALUES
(2, 25, 'blog-image.jpg'),
(3, 25, 'nama_kue_3_productImg.jpg'),
(4, 25, 'images.jpg'),
(5, 25, 'blog-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_session` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `avaliable_date_choose` date NOT NULL,
  `qty` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'ac497cfaba23c4184cb03b97e8c51e0a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `customer_dtl_order`
--
ALTER TABLE `customer_dtl_order`
  ADD PRIMARY KEY (`id_dtl_cust_order`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id_cust_order`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
  ADD PRIMARY KEY (`id_orders_temp`),
  ADD KEY `id_times` (`id_times`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `order_admin`
--
ALTER TABLE `order_admin`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_time`
--
ALTER TABLE `order_time`
  ADD PRIMARY KEY (`id_dtl_order`),
  ADD KEY `FK_order` (`id_order`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_avaliable`
--
ALTER TABLE `product_avaliable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_dtl_order`
--
ALTER TABLE `customer_dtl_order`
  MODIFY `id_dtl_cust_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id_cust_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
  MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `order_admin`
--
ALTER TABLE `order_admin`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_time`
--
ALTER TABLE `order_time`
  MODIFY `id_dtl_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_avaliable`
--
ALTER TABLE `product_avaliable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_time`
--
ALTER TABLE `order_time`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`id_order`) REFERENCES `order_admin` (`id_order`);

--
-- Constraints for table `product_avaliable`
--
ALTER TABLE `product_avaliable`
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON UPDATE CASCADE;

--
-- Constraints for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD CONSTRAINT `fk_photo_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
