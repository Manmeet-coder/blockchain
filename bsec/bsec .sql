-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 03:13 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsec`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(11) NOT NULL,
  `complain_title` varchar(1000) DEFAULT NULL,
  `complain_details` varchar(10000) DEFAULT NULL,
  `complain_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `complain_title`, `complain_details`, `complain_status`) VALUES
(101, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra nisi ullamcorper nisl placerat ullamcorper. Ut in porta velit, non fringilla sem.', 'Nulla facilisi. Mauris lobortis ligula quis odio eleifend efficitur. Sed nec ultricies leo. Nulla mattis blandit interdum. Quisque rutrum lectus vitae purus sagittis luctus. Vestibulum dolor diam, venenatis nec neque vitae, pellentesque condimentum quam. Nunc eleifend, massa vitae finibus euismod, dui orci rhoncus lorem', 'Acyive'),
(102, 'Ut lectus enim, cursus at velit quis, cursus commodo nisi. Vestibulum feugiat maximus pellentesque. Praesent sed sollicitudin ante, eu condimentum erat.', 'Aenean id accumsan leo, vulputate efficitur orci. Nunc nec velit lorem. Vestibulum pharetra mollis nulla, vel iaculis ante lacinia id. Praesent efficitur nisl enim, sit amet viverra ipsum mollis at. Maecenas auctor eget nibh nec interdum. Suspendisse pellentesque, dui vel pharetra semper', 'Closed'),
(103, 'Vivamus eget fermentum elit. Suspendisse erat risus, finibus non mattis a, porttitor sed nibh. Ut egestas nunc a velit posuere, eu convallis quam feugiat. Mauris ac diam commodo, dictum erat at, dapibus erat.', 'Morbi semper vestibulum porta. Donec nisl sem, faucibus ut lacus sit amet, consequat ullamcorper arcu. Pellentesque faucibus pellentesque varius. Phasellus sagittis, turpis ut posuere laoreet, lorem dui tristique neque, et scelerisque arcu erat at nunc. Suspendisse egestas turpis', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `keygen`
--

CREATE TABLE `keygen` (
  `email` varchar(30) NOT NULL,
  `passkey` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keygen`
--

INSERT INTO `keygen` (`email`, `passkey`) VALUES
('', 'TGdb1wX7UNbjvfebmekgdBYNQe76lEfuSur3xyO1eDXczTFd'),
('j@gmail.com', 'ZrYxUgDxMjggp73Lwckx4APCwtUoWINz1ZPgs9BtmDPedXhR'),
('jag@gmail.com', 'C8HdnjQuYtvn49o16XeXcqm4WKS0TSb9MvO7k1JU4Tk6qeXs'),
('user2@gmail.com', 'egaQj4AxL9YLqPxxWMmdiBpbYcKlWHmzvEzUEUhTaQFaufSO'),
('user3@gmail.com', 'K1eC8l2FoXBDI4STj5j3UDZr0BZyEPQ2Pyj5eEEOf62KwTbz'),
('user@gmail.com', 'hruOHQRFg2iAhjJKDAyQ5bqwCMDMM6lYr3gf899nBHIyVilI');

-- --------------------------------------------------------

--
-- Table structure for table `proplist`
--

CREATE TABLE `proplist` (
  `prop_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `level` int(20) NOT NULL,
  `price` int(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `file_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proplist`
--

INSERT INTO `proplist` (`prop_id`, `email`, `location`, `type`, `level`, `price`, `state`, `file_name`) VALUES
(1, 'user2@gmail.com', 'Australia', 'Office', 1, 3450, 'new', './assets/Australiauser2@gmail.com.png'),
(2, 'user2@gmail.com', 'Melbourne', 'Office', 2, 150, 'new', './assets/Melbourneuser2@gmail.com.png'),
(3, 'user2@gmail.com', 'NSW', 'Office', 9, 130, 'new', './assets/NSWuser2@gmail.com.png'),
(4, 'user2@gmail.com', 'Kent Street', '7', 0, 5000, 'new', './assets/Kent_Streetuser2@gmail.com.png');

-- --------------------------------------------------------

--
-- Table structure for table `rent_agreement`
--

CREATE TABLE `rent_agreement` (
  `rent_id` int(11) NOT NULL,
  `prop_id` int(11) DEFAULT NULL,
  `rent_owner` varchar(30) DEFAULT NULL,
  `rent_tenant` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent_agreement`
--

INSERT INTO `rent_agreement` (`rent_id`, `prop_id`, `rent_owner`, `rent_tenant`) VALUES
(1, 3, 'user2@gmail.com', 'user@gmail.com'),
(2, 1, 'user2@gmail.com', 'j@gmail.com'),
(3, 2, 'user2@gmail.com', 'user@gmail.com'),
(4, 1, 'user2@gmail.com', 'user@gmail.com'),
(5, 1, 'user2@gmail.com', 'jag@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reqlist`
--

CREATE TABLE `reqlist` (
  `req_id` int(11) NOT NULL,
  `prop_id` int(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reqlist`
--

INSERT INTO `reqlist` (`req_id`, `prop_id`, `email`) VALUES
(26, 4, 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phno` varchar(1000) NOT NULL,
  `accno` varchar(1000) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `email`, `phno`, `accno`, `password`, `usertype`) VALUES
('', '', 'WUNUYkZQYUNmKzYxVHpTMWdkU0R5UT09OjrlEfhc+OotSJn+Wd1Q1pCI', 'VDJ3WjhGVGRZYSs2Ynhza2I5RFNXZz09OjpyUAtPdx938HuZxg6K8mxa', '', ''),
('Jagdeep', 'j@gmail.com', 'SGtMUDNLTjlwQTUzdmJPRXdkOERydz09OjpTjwSBlNtuFsjFeixlfv9x', 'N0IrcDVFckFnSU9iS2pHSUxMRWxiUT09OjqeWtuO0JxXTj3JDff3ta25', '123', 'tenant'),
('Jagdeep', 'jag@gmail.com', 'S0FwY3BBR01hZzdxM1QwYXhrcDdQZz09OjoqCOR0As76RPGDGQ3TMAZx', 'dzVmZE5wYXF2UGNiMjRQNWY2RzlIQT09Ojq1q4On9E88zW9zQnkwfLb1', '123', 'tenant'),
('User2', 'user2@gmail.com', 'RDdvb0piWjlBOGVZYlY0dTQzMWpEZz09OjrVYBOcj0bVn+wwpM/k7cm+', 'S0ZPSWd3NU9yUEhEVGdKb1RheFMwZz09OjqS+QHJPZgc1QonfWTclJnG', '123', 'owner'),
('user3', 'user3@gmail.com', 'cTQ3RG9IZnhDL2tMVUhUTnVaYjlZdz09Ojox569KaDpe0dApeG9BtSYw', 'VTg5cy9WcE92TzBEc3cxL1pvemtOUT09Ojq301CCZHeBF5i8av67bW3Q', '123', 'tenant'),
('User1', 'user@gmail.com', 'cGlmbVRYdTVTSVFGQXBtMHp3YzNsUT09Ojr6xNXwgnQPNB3Vp1bozDhD', 'UWI2T1UrT24yVmNpdjZTaTcweHNLUT09OjqvPqWLCu7t91SRkqDKXkOL', '123', 'tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `keygen`
--
ALTER TABLE `keygen`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `proplist`
--
ALTER TABLE `proplist`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `rent_agreement`
--
ALTER TABLE `rent_agreement`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `reqlist`
--
ALTER TABLE `reqlist`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proplist`
--
ALTER TABLE `proplist`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rent_agreement`
--
ALTER TABLE `rent_agreement`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reqlist`
--
ALTER TABLE `reqlist`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
