-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 12:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smiles4birthday`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `profile_pic` text NOT NULL,
  `picture_folder` text NOT NULL,
  `parent_occupation` text NOT NULL,
  `household_income` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `wish` text NOT NULL,
  `sponsored` tinyint(1) DEFAULT 0,
  `sponsored_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `name`, `address`, `profile_pic`, `picture_folder`, `parent_occupation`, `household_income`, `birthdate`, `wish`, `sponsored`, `sponsored_by`, `created_at`, `updated_at`) VALUES
(112, 'Deshaun Miller', '7371 Dooley Station Apt. 610\nEast Rafaelaview, IN 54268-8120', 'Art1.jpg', 'ID99', 'Education Administrator', 31171, '2014-05-25', 'Consequatur tempora quasi et laboriosam consequatur debitis eveniet quisquam.', 0, NULL, '2024-04-15 10:00:23', '2024-04-15 10:00:23'),
(113, 'Kamren Parker MD', '105 Abbott Forest\nSouth Stephanieland, MS 22426', 'Art2.jpg', 'ID99', 'Precision Instrument Repairer', 26805, '2014-12-13', 'Inventore nesciunt atque quia dolore ut.', 1, 69, '2024-04-15 10:00:23', '2024-04-15 11:07:01'),
(114, 'Denis Bogan MD', '7971 Kip Forest\nBauchbury, AZ 87513-4869', 'Art1.jpg', 'ID99', 'Parts Salesperson', 34867, '2014-04-28', 'Non aut cupiditate perferendis ab.', 0, NULL, '2024-04-15 10:00:23', '2024-04-15 10:00:23'),
(115, 'Lisette Kassulke', '476 Hudson Corners\nNew Andresland, CO 97358-8533', 'Art4.jpg', 'ID99', 'Coating Machine Operator', 33973, '2014-08-15', 'Cupiditate sit itaque odit nihil est eaque optio.', 1, 69, '2024-04-15 10:00:23', '2024-04-15 11:07:10'),
(116, 'Dr. Lorenza Yundt Jr.', '39774 Romaine Prairie\nEast Kariane, PA 97139', 'Art1.jpg', 'ID99', 'Precision Lens Grinders and Polisher', 46855, '2014-11-22', 'Sit vitae eos vel voluptatem expedita quisquam.', 0, NULL, '2024-04-15 10:00:23', '2024-04-15 10:00:23'),
(117, 'Natasha Wisoky', '9004 Dach Islands Apt. 997\nWest Maddison, CA 22389-3496', 'Art3.jpg', 'ID99', 'Psychology Teacher', 30398, '2014-05-18', 'Quia quasi cum quia totam enim id accusantium.', 0, NULL, '2024-04-15 10:00:23', '2024-04-15 10:00:23'),
(118, 'Anjali Bednar DVM', '46798 Porter Mountain Apt. 960\nPort Vernonside, IA 11638-7071', 'Art3.jpg', 'ID99', 'Chemistry Teacher', 45662, '2015-04-12', 'Ipsum officia omnis qui in molestias nihil.', 1, 69, '2024-04-15 10:00:23', '2024-04-15 11:00:47'),
(119, 'Ms. Selena Marvin DVM', '3316 Amos Pine Suite 778\nWest Ceceliafurt, VT 03694-7751', 'Art1.jpg', 'ID99', 'Pesticide Sprayer', 46216, '2015-01-19', 'Corrupti consectetur earum sunt totam.', 1, 69, '2024-04-15 10:00:23', '2024-04-15 11:04:21'),
(120, 'Ms. Eileen Rau', '83414 Gusikowski Road Apt. 990\nSouth Jerelstad, WI 86611', 'Art3.jpg', 'ID99', 'Telecommunications Line Installer', 29428, '2014-04-20', 'Blanditiis dolorem minus aliquam in animi et tenetur.', 1, 69, '2024-04-15 10:00:23', '2024-04-15 11:00:35'),
(121, 'Birdie Kerluke', '80923 Brisa Mall Apt. 592\nBoscoton, MD 84381-4066', 'Art3.jpg', 'ID99', 'Pest Control Worker', 41473, '2014-11-28', 'Excepturi praesentium rem aut dicta.', 1, 69, '2024-04-15 10:00:23', '2024-04-15 11:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `donation_amount` int(11) NOT NULL,
  `attend` tinyint(1) NOT NULL,
  `identity_disclose` tinyint(1) NOT NULL,
  `details` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
