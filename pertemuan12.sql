-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 02:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertemuan12`
--

-- --------------------------------------------------------

--
-- Table structure for table `fashion`
--

CREATE TABLE `fashion` (
  `id` int(10) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fashion`
--

INSERT INTO `fashion` (`id`, `kategori`, `nama`, `harga`, `deskripsi`, `foto`) VALUES
(1, 'Vest', 'Lilac Vest V Neck', 100000, 'ACRYLIC WOOL PREMIUM SUPER TEBAL 5 LAPIS BENANG FIT S - XL TIDAK TERMASUK DALAMAN TB MODEL 155 cm TB model 165cm / BB 47-48 KG (biasa model pakai size S/M/REGULAR)', '_63885d8b55fc8.jpg'),
(3, 'Jeans', 'Jeans Black All Size', 250000, 'Jeans Wanita Polos kulot Korean Reguler DENIM Party. celana jeans wanita 2022 kekinian viral jins. celana kulot wanita 2022 kekinian viral jens. celana jins kulot wanita 2022', '_638861416ee9d.jpg'),
(4, 'Accesories', 'Jam Tangan Pria', 500000, 'Brand : Alexandre Christie Model number : AC3042 Gender : Man Watch Case Material : Stainless Steel And Rubber Case Diameter : 4.5cm Movement : automatic Display Type : Analog', '_6388650790822.png'),
(5, 'Vest', 'Blue Vest V Neck', 100000, 'Description : ACRYLIC WOOL PREMIUM SUPER TEBAL 5 LAPIS BENANG FIT S - XL TIDAK TERMASUK DALAMAN TB MODEL 155 cm TB model 165cm / BB 47-48 KG (biasa model pakai size S/M/REGULAR)', '_6388652e04aa2.jpg'),
(7, 'T-Shirt', 'T-Shirt Oversize Music', 70000, 'Description : NTN bergambar Lengan pendek cotton. kaos tangan panjang pria dan wanita dewasa. kaos jumbo pria dan wanita xxxl ld 130. kaos pria dan wanita murah keren 3pcs 50. kaos polos v neck pria dan wanita cotton.', '_638865c3db6f0.jpg'),
(8, 'Vest', 'Brown Black Vest V Neck', 100000, 'Description : ACRYLIC WOOL PREMIUM SUPER TEBAL 5 LAPIS BENANG FIT S - XL TIDAK TERMASUK DALAMAN TB MODEL 155 cm TB model 165cm / BB 47-48 KG (biasa model pakai size S/M/REGULAR)', '_63886749cdeec.jpg'),
(9, 'Accesories', 'Kalung Liontin Wanita Lv', 150000, 'Berlapis perak. aksesoris kalung wanita hijab kondangan. kalung panjang wanita hijab keren 2022. kalung mutiara korean style cewek. kalung hiasan baju wanita hijab. ', '_6388679f5f457.png'),
(10, 'Suits', 'Suits Black Men', 400000, 'BC - AE ZJYJFC MEN BLAZER Item type: blazer Shape: fit Style: classic Occasion: party, wedding, formal Main material: suede Lining material: polyester Pattern type: solid', '_63887c966c2f5.jpg'),
(11, 'T-Shirt', 'T-Shirt Depression', 70000, 'Description : NTN bergambar Lengan pendek cotton. kaos tangan panjang pria dan wanita dewasa. kaos jumbo pria dan wanita xxxl ld 130. kaos pria dan wanita murah keren 3pcs 50. kaos polos v neck pria dan wanita cotton.', '_63887cdf651fe.jpg'),
(12, 'Accesories', 'Jam Tangan Wanita', 300000, 'Jam Tangan Wanita Alexandre Christie AC 2943 Rosegold Soft Brown Ori Brand : Alexandre Christie Model number : AC2943 Rosegold Soft Brown Case Material : Stainless Steel Strap : Leather Case Diameter : 3.6 cm Movement : Quartz Display Type ', '_63887d969e848.png'),
(13, 'Vest', 'Black Vest V Neck', 100000, 'Description : ACRYLIC WOOL PREMIUM SUPER TEBAL 5 LAPIS BENANG FIT S - XL TIDAK TERMASUK DALAMAN TB MODEL 155 cm TB model 165cm / BB 47-48 KG (biasa model pakai size S/M/REGULAR)', '_63887dd80907f.jpg'),
(14, 'Jeans', 'Jeans Blue All Size', 250000, 'Description : Jeans Wanita Polos kulot Korean Reguler DENIM Party. celana jeans wanita 2022 kekinian viral jins. celana kulot wanita 2022 kekinian viral jens. celana jins kulot wanita 2022', '_63887e14597aa.jpg'),
(15, 'T-Shirt', 'T-Shirt Faith Black', 70000, 'Description : Description : NTN bergambar Lengan pendek cotton. kaos tangan panjang pria dan wanita dewasa. kaos jumbo pria dan wanita xxxl ld 130. kaos pria dan wanita murah keren 3pcs 50. kaos polos v neck pria dan wanita cotton.', '_63887ebf9bf76.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'nabilah', 'nabila', 'nabila@gmail.com', '$2y$10$LvyqSEIEO6Z8SRg0/K0nMOKcgmA6YFxLzF3CdLnP7eyENni.TCdF2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fashion`
--
ALTER TABLE `fashion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fashion`
--
ALTER TABLE `fashion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
