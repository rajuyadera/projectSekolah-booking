-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2023 at 03:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_type`
--

CREATE TABLE `bank_type` (
  `id_bank_type` int(11) NOT NULL,
  `bank_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE `card_type` (
  `id_card_type` int(11) NOT NULL,
  `card_type_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `city_name`) VALUES
(1, 'Jakarta'),
(2, 'Bandung'),
(3, 'Makassar'),
(4, 'Surabaya'),
(5, 'Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `full_name`, `email`, `phone`, `address`, `id_user`, `reg_date`) VALUES
(1, 'azis nuromdona maelandi', 'stevenazis71@gmail.com', '', '', 2, '2020-06-10'),
(2, 'raju', 'rajuyaderaa@gmail.com', '', '', 4, '2023-01-26'),
(3, 'rajuyadera', 'raju@gmail.com', '083899790773', 'asd', 5, '2023-01-31'),
(4, 'r', 'r@gmail.com', '', '', 6, '2023-02-13'),
(5, 's', 'silaaa.lyn27@gmail.com', '', '', 7, '2023-02-20'),
(6, 'Raju Yadera', 'rajuyadera@gmail.com', '083899790773', 'Kp. Parung Tanjung 01/12 desa cicadas kec gunung putri', 8, '2023-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `costumer_bank_account`
--

CREATE TABLE `costumer_bank_account` (
  `id_bank` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `bank_type` varchar(100) NOT NULL,
  `bank_account_name` varchar(225) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `costumer_card_account`
--

CREATE TABLE `costumer_card_account` (
  `id_card` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `card_holder` varchar(200) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `card_type` int(11) NOT NULL,
  `exp_date` varchar(100) NOT NULL,
  `ccv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `id_payment_type` int(11) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `buyer_email` varchar(100) NOT NULL,
  `buyer_phone` varchar(100) NOT NULL,
  `status` enum('Tertunda','Terbayar','Batal') NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `id_promo_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `final_price`, `id_payment_type`, `buyer_name`, `buyer_email`, `buyer_phone`, `status`, `order_date`, `order_time`, `id_costumer`, `id_promo_code`) VALUES
(2, 900000, 1, 'raju', 'uftuf@rdzfr.nhb', '078968678', 'Terbayar', '2023-01-26', '08:18:13', 2, 0),
(4, 700000, 1, 'raju', 'uftuf@rdzfr.nhb', '08234234', 'Terbayar', '2023-01-31', '18:14:42', 3, 0),
(7, 50000, 1, 'raju', 'uftuf@rdzfr.nhb', '9801829830', 'Terbayar', '2023-02-06', '15:43:12', 3, 0),
(8, 200000, 1, 'raju', 'raju@gmail.com', '84329475', 'Terbayar', '2023-02-13', '09:09:23', 4, 0),
(9, 90000, 1, 'ryan', 'rawraw@asfas.com', '9801829830', 'Terbayar', '2023-02-15', '18:51:09', 4, 0),
(10, 11111, 1, 'sila', 'silaaa.lyn27@gmail.com', '9801829830', 'Terbayar', '2023-02-20', '11:33:44', 5, 0),
(11, 11111, 1, 'sila', 'silaaa.lyn27@gmail.com', '9801829830', 'Terbayar', '2023-02-20', '15:38:50', 5, 0),
(12, 11111, 1, 'raju', 'asa@asf.asdas', '123', 'Terbayar', '2023-02-20', '17:57:27', 4, 0),
(13, 50000, 1, 'Raju Yadera', 'rajuyaderaa@gmail.com', '083899790773', 'Terbayar', '2023-02-21', '14:07:51', 6, 0),
(14, 50000, 1, '', '', '', 'Tertunda', '2023-02-22', '14:29:42', 6, 0),
(15, 50000, 1, 'Raju Yadera', 'rajuyaderaa@gmail.com', '083899790773', 'Tertunda', '2023-02-22', '14:31:10', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_cancel`
--

CREATE TABLE `order_cancel` (
  `id_order_cancel` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id_passenger` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `p_full_name` varchar(200) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `ticket_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id_passenger`, `id_order`, `p_full_name`, `p_title`, `ticket_code`) VALUES
(1, 1, 'azis nuromdona maelandi', 'Tn', 'TGKIO4HTXBM'),
(2, 2, 'rajuyadera', 'Tn', 'TGLBTGA4YON'),
(3, 3, 'rajuyadera', 'Tn', 'TGRHQKLDOHB'),
(4, 4, 'raju', 'Tn', 'TGUGH4PC0PC'),
(5, 4, '', '', 'TGSGBVBLZWT'),
(6, 4, '', '', 'TGUHA4FWNWZ'),
(7, 5, 'rian', 'Tn', 'TGLDRIKTC62'),
(8, 7, 'raju', 'Tn', 'TGQC5DGKGZV'),
(9, 8, 'rajuyadera', 'Tn', 'TG65SPEWNEV'),
(10, 9, 'rian', 'Ny', 'TGYZAGF1MBM'),
(11, 10, 'sila', 'Ny', 'TG68D4V2SQL'),
(12, 11, 'sila', 'Ny', 'TGTYN7OUX9F'),
(13, 12, 'raju', 'Tn', 'TGQHAY8CNIE'),
(14, 12, '', '', 'TGOA1WSKO95'),
(15, 12, '', '', 'TGZVQHLHXLS'),
(16, 13, 'Raju Yadera', 'Tn', 'TGR2PESRPDR'),
(17, 13, 'Leni Nur Sila', 'Ny', 'TGMQ7GAHC2S'),
(18, 14, '', '', 'TG8M31I7UW1'),
(19, 15, 'Raju Yadera', 'Tn', 'TG9KO1CZZPS');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_payment_type` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id_payment_type` int(11) NOT NULL,
  `payment_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id_payment_type`, `payment_type_name`) VALUES
(1, 'Transfer Bank'),
(2, 'Kartu Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id_place` int(11) NOT NULL,
  `id_transportation_type` int(11) NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `id_city` int(11) NOT NULL,
  `place_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id_place`, `id_transportation_type`, `place_name`, `id_city`, `place_code`) VALUES
(3, 2, 'Manggarai', 1, 'MG'),
(4, 2, 'Gedebage', 2, 'GDB'),
(5, 2, 'Pasar Senen', 1, 'PSE');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id_promo_code` int(11) NOT NULL,
  `promo_code` varchar(50) NOT NULL,
  `promo_percentage` int(11) NOT NULL,
  `promo_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `reservation_code` varchar(100) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_rute`, `reservation_code`, `id_order`) VALUES
(1, 1, '2727737643', 1),
(2, 2, '0154352409', 2),
(3, 2, '3901410047', 3),
(4, 3, '1580230132', 4),
(5, 4, '8666498731', 5),
(6, 4, '1264881622', 7),
(7, 5, '0367249781', 8),
(8, 7, '1786546916', 9),
(9, 8, '4913824901', 10),
(10, 8, '2764452657', 11),
(11, 8, '7270367725', 12),
(12, 9, '9835546217', 13),
(13, 9, '9753688346', 14),
(14, 9, '5096759616', 15);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `depart_at` date NOT NULL,
  `arrive_at` date NOT NULL,
  `depart_time` time NOT NULL,
  `arrive_time` time NOT NULL,
  `id_place_from` int(11) NOT NULL,
  `id_place_to` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_transportation` int(11) NOT NULL,
  `id_transportation_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `depart_at`, `arrive_at`, `depart_time`, `arrive_time`, `id_place_from`, `id_place_to`, `price`, `id_transportation`, `id_transportation_type`) VALUES
(1, '2020-06-10', '2020-06-13', '16:34:00', '18:34:00', 1, 2, 900000, 1, 1),
(3, '2023-01-31', '2023-01-31', '18:10:00', '21:45:00', 3, 4, 700000, 4, 2),
(4, '2023-02-06', '2023-02-06', '08:54:00', '10:55:00', 3, 4, 50000, 4, 2),
(5, '2023-02-13', '2023-02-13', '09:07:00', '15:07:00', 3, 4, 200000, 4, 2),
(6, '2023-02-13', '2023-02-13', '13:17:00', '18:17:00', 3, 4, 80000, 4, 2),
(7, '2023-02-15', '2023-02-15', '18:48:00', '21:48:00', 3, 4, 90000, 4, 2),
(8, '2023-02-20', '2023-02-22', '11:31:00', '01:31:00', 4, 3, 11111, 4, 2),
(9, '2023-02-21', '2023-02-21', '14:05:00', '16:05:00', 5, 4, 50000, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id_transportation` int(11) NOT NULL,
  `transportation_code` varchar(50) NOT NULL,
  `transportation_name` varchar(225) NOT NULL,
  `id_transportation_class` int(11) NOT NULL,
  `id_transportation_type` int(11) NOT NULL,
  `seat_qty` int(11) NOT NULL,
  `id_transportation_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id_transportation`, `transportation_code`, `transportation_name`, `id_transportation_class`, `id_transportation_type`, `seat_qty`, `id_transportation_company`) VALUES
(4, 'KAI', 'Kereta', 2, 2, 50, 14),
(5, 'KAI2', 'KeretaX', 2, 2, 30, 14);

-- --------------------------------------------------------

--
-- Table structure for table `transportation_class`
--

CREATE TABLE `transportation_class` (
  `id_transportation_class` int(11) NOT NULL,
  `id_transportation_type` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation_class`
--

INSERT INTO `transportation_class` (`id_transportation_class`, `id_transportation_type`, `class_name`, `class_price`) VALUES
(2, 2, 'Economy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transportation_company`
--

CREATE TABLE `transportation_company` (
  `id_transportation_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `id_transportation_type` int(11) NOT NULL,
  `company_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation_company`
--

INSERT INTO `transportation_company` (`id_transportation_company`, `company_name`, `id_transportation_type`, `company_logo`) VALUES
(1, 'Air Asia', 1, 'airasia.png'),
(3, 'Air France', 1, 'airfrance.png'),
(4, 'Batik Air', 1, 'batikair.png'),
(5, 'British Air', 1, 'britishair.png'),
(6, 'Citilink', 1, 'citilink.png'),
(7, 'Etihad Air', 1, 'etihadair.png'),
(8, 'Garuda Indonesia', 1, 'garudaindonesia.png'),
(9, 'Lion Air', 1, 'lionair.png'),
(10, 'Malaysia Air', 1, 'malaysiaair.png'),
(11, 'Singapore Air', 1, 'singaporeair.png'),
(12, 'Sriwijaya Air', 1, 'sriwijayaair.png'),
(13, 'All Nippon Air', 1, 'allnipponair.png'),
(14, 'Kereta Api Indonesia', 2, 'kai.jpeg'),
(15, 'Railink', 2, 'railink.png');

-- --------------------------------------------------------

--
-- Table structure for table `transportation_type`
--

CREATE TABLE `transportation_type` (
  `id_transportation_type` int(11) NOT NULL,
  `transportation_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation_type`
--

INSERT INTO `transportation_type` (`id_transportation_type`, `transportation_type_name`) VALUES
(2, 'Kereta Api');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level_id`) VALUES
(1, 'admin', '123', 1),
(2, 'stevenazis71@gmail.com', 'ad64790ed358e4100311525c75fa28af', 2),
(3, 'admin2', '123', 1),
(4, 'rajuyaderaa@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 2),
(5, 'raju@gmail.com', '91ef88ee14019c017ba0a802fc8b94eb', 2),
(6, 'r@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 2),
(7, 'silaaa.lyn27@gmail.com', 'ed985c96afc761320ac10545e9569f91', 2),
(8, 'rajuyadera@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_type`
--
ALTER TABLE `bank_type`
  ADD PRIMARY KEY (`id_bank_type`);

--
-- Indexes for table `card_type`
--
ALTER TABLE `card_type`
  ADD PRIMARY KEY (`id_card_type`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `costumer_bank_account`
--
ALTER TABLE `costumer_bank_account`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `costumer_card_account`
--
ALTER TABLE `costumer_card_account`
  ADD PRIMARY KEY (`id_card`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_cancel`
--
ALTER TABLE `order_cancel`
  ADD PRIMARY KEY (`id_order_cancel`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id_passenger`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id_payment_type`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id_place`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id_promo_code`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id_transportation`);

--
-- Indexes for table `transportation_class`
--
ALTER TABLE `transportation_class`
  ADD PRIMARY KEY (`id_transportation_class`);

--
-- Indexes for table `transportation_company`
--
ALTER TABLE `transportation_company`
  ADD PRIMARY KEY (`id_transportation_company`);

--
-- Indexes for table `transportation_type`
--
ALTER TABLE `transportation_type`
  ADD PRIMARY KEY (`id_transportation_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_type`
--
ALTER TABLE `bank_type`
  MODIFY `id_bank_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_type`
--
ALTER TABLE `card_type`
  MODIFY `id_card_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `costumer_bank_account`
--
ALTER TABLE `costumer_bank_account`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `costumer_card_account`
--
ALTER TABLE `costumer_card_account`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_cancel`
--
ALTER TABLE `order_cancel`
  MODIFY `id_order_cancel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id_passenger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id_payment_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id_promo_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id_transportation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transportation_class`
--
ALTER TABLE `transportation_class`
  MODIFY `id_transportation_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transportation_company`
--
ALTER TABLE `transportation_company`
  MODIFY `id_transportation_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transportation_type`
--
ALTER TABLE `transportation_type`
  MODIFY `id_transportation_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
