-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 08:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_method`
--

-- --------------------------------------------------------

--
-- Table structure for table `google_login`
--

CREATE TABLE `google_login` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_login`
--

INSERT INTO `google_login` (`id`, `google_id`, `name`, `email`, `profile_image`) VALUES
(1, '103626097904342689388', 'Hưng Lê Việt', 'hunglv20406c@st.uel.edu.vn', 'https://lh3.googleusercontent.com/a/AATXAJziU45TNZ0FR8IHgX6bwmH1zkunKPnW_mqt2J6p=s96-c'),
(2, '103313915531554945309', 'Việt Hưng Lê', 'younghungold@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GicLNhhuPnZnC87ZtpmKN4iQNDU1Ybn89x0S6UW=s96-c'),
(3, '116543457190747519366', 'Ẩn Danh', 'masterpieceofdivinelight@gmail.com', 'https://lh3.googleusercontent.com/a/AATXAJxQTDtRQ8WTBpm-gJb4oHAAj4s9bGtoSJCvoEg=s96-c'),
(4, '109711689387029278889', 'Việt Hưng Lê', 'viethungitmi@gmail.com', 'https://lh3.googleusercontent.com/a/AATXAJxzAhdirKMZuSEn76GERBBzgrno0e6Ck6bGkj7V=s96-c'),
(5, '112055778502757050537', 'Thanh Phương Nguyễn Thị', 'phuongnn1166@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Gjy2BDUcZajUu2rv50kuo9v0WeGlt-11Hlyrg2R=s96-c');

-- --------------------------------------------------------

--
-- Table structure for table `manual_login`
--

CREATE TABLE `manual_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manual_login`
--

INSERT INTO `manual_login` (`id`, `username`, `password`, `name`, `email`, `profile_image`) VALUES
(2, 'thanhbinhbent', '123456', 'Trần Thanh Bình', 'binhtt20406c@st.uel.edu.vn', 'https://lh3.googleusercontent.com/a/default-user=s800'),
(3, 'a', 'a', 'a', 'a', 'https://lh3.googleusercontent.com/a/default-user=s800');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `google_login`
--
ALTER TABLE `google_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- Indexes for table `manual_login`
--
ALTER TABLE `manual_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `google_login`
--
ALTER TABLE `google_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manual_login`
--
ALTER TABLE `manual_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
