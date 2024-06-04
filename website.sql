-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'kassem', 'kassemdb2103@gmail.com', '1000', 0),
(0, '', 'ali2@gmail.com', '32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `names` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `guest` int(20) NOT NULL,
  `table_number` int(50) NOT NULL,
  `id` int(100) NOT NULL,
  `nboftables` int(255) NOT NULL,
  `starttime` time(5) NOT NULL,
  `endtime` time(5) NOT NULL,
  `Date` datetime(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`names`, `phone`, `email`, `guest`, `table_number`, `id`, `nboftables`, `starttime`, `endtime`, `Date`) VALUES
('fixed', 0, '', 0, 0, 0, 40, '00:00:00.00000', '00:00:00.00000', '0000-00-00 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 1, 0, 0, '00:00:00.00000', '00:00:00.00000', '0000-00-00 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 2, 0, 0, '20:30:00.00000', '21:30:00.00000', '0000-00-00 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 2, 0, 0, '20:30:00.00000', '21:30:00.00000', '2024-05-08 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 1, 0, 0, '21:40:00.00000', '22:30:00.00000', '2024-05-08 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 1, 0, 0, '21:01:00.00000', '21:19:00.00000', '2024-05-08 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 2, 0, 0, '21:56:00.00000', '22:15:00.00000', '2024-05-08 00:00:00.0000'),
('kassem deeb', 81045813, 'kassemdb2103@gmail.com', 5, 3, 0, 0, '20:51:00.00000', '21:51:00.00000', '2024-05-08 00:00:00.0000');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(100) NOT NULL,
  `catname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(13, 'sandwiches'),
(65, 'pizza');

-- --------------------------------------------------------

--
-- Table structure for table `categoryjobs`
--

CREATE TABLE `categoryjobs` (
  `catid` int(255) NOT NULL,
  `catname` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoryjobs`
--

INSERT INTO `categoryjobs` (`catid`, `catname`, `image`, `salary`, `status`) VALUES
(1, 'chef', 'amr2.jpeg', 300, 'disabled'),
(3, 'hostess', 'amr.jpeg', 500, 'available'),
(12, 'delivery boy', 'cc.jpg', 300, 'available'),
(13, 'cleaner', 'sal.jpeg', 250, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `phone`, `message`) VALUES
('kassem deeb', 'kassemdb2103@gmail.com', '81045813', 'hello'),
('kassem deeb', 'kassemdb2103@gmail.com', '81045813', 'yuiopoiuytkllkjhgbn nhygvfrcvghjkl;lkjytrfvbnmkjhgtyuikmnbvfdertyukm vcdertyuio;lkjhgfdwerthjk,mgfdfghjkl.,mngfdrtjkl,mngfrhjklkjhgertyuioppoiuytrewertyuiop;lkjhgfdsdfghjkl;;lkjhgfddfghjkl;;lkjhgffghjk.kjhgffghjkl;lkjhghjkl;lkjyttjkl;;lkjhfghjkl;lkjhttyjkl;lkjhgfghjkl,mnbvdfghjklkjhgfdfghjkkjhgfghj');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`name`, `email`) VALUES
('kassem', 'kassemdb2103@gmail.com'),
('kassem', 'kassemdb2103@gmail.com'),
('kassem', 'kassemdb2103@gmail.com'),
('kassem', 'kassemdb2103@gmail.com'),
('kassem', 'kassemdb2103@gmail.com'),
('kassem', 'kassemdb2103@gmail.com'),
('kassem', 'kassemdb2103@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dine`
--

CREATE TABLE `dine` (
  `name` varchar(100) NOT NULL,
  `table_number` int(100) NOT NULL,
  `totalproduct` varchar(500) NOT NULL,
  `totalprice` int(200) NOT NULL,
  `nboftables` int(255) NOT NULL,
  `dateandtime` datetime(6) NOT NULL,
  `id` int(100) NOT NULL,
  `nbofdine` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dine`
--

INSERT INTO `dine` (`name`, `table_number`, `totalproduct`, `totalprice`, `nboftables`, `dateandtime`, `id`, `nbofdine`) VALUES
('fixed', 0, '', 0, 40, '0000-00-00 00:00:00.000000', 13, 5),
('kassem', 12, 'fahita (1) ', 6, 0, '2024-05-09 22:59:11.000000', 25, 0),
('kassem', 1, 'fahita (1) ', 6, 0, '2024-05-10 16:07:43.000000', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dinetables`
--

CREATE TABLE `dinetables` (
  `name` varchar(100) NOT NULL,
  `tablenb` int(100) NOT NULL,
  `nboftables` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dinetables`
--

INSERT INTO `dinetables` (`name`, `tablenb`, `nboftables`) VALUES
('fixed', 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `display`
--

CREATE TABLE `display` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `display`
--

INSERT INTO `display` (`name`, `email`, `image`, `message`, `rate`) VALUES
('ahmad', 'ahmad@gmail.com', 'abc.jpeg', 'rewer', 3),
('', 'kassemdb2103@gmail.com', '', '', 0),
('kassem deeb', 'kassemdb2103@gmail.com', 'lbn.jpeg', 'good', 4),
('kassem deeb', 'kassemdb2103@gmail.com', 'lbn.jpeg', 'good', 4),
('ali alhadi', 'alihd@gmail.com', 'tb.jpeg', 'excellent service delicious food', 5),
('yousef', 'yousef@gmail.com', 'casheir.jpg', 'excellent service . strongly recommand t', 4);

-- --------------------------------------------------------

--
-- Table structure for table `displayteam`
--

CREATE TABLE `displayteam` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `jobtype` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `displayteam`
--

INSERT INTO `displayteam` (`fname`, `lname`, `jobtype`, `image`, `id`, `phone`) VALUES
('ali', '', 'chef', 'uploadimg/chef2.jpeg', 27, 81765756);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `message` varchar(40) NOT NULL,
  `rate` int(5) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `image`, `message`, `rate`, `status`) VALUES
('ali alhadi', 'alihd@gmail.com', 'tb.jpeg', 'excellent service delicious food', 5, 'pending'),
('kassem deeb', 'kassemdb2103@gmail.com', 'aboutimg.png', 'excellent service', 5, 'pending'),
('kassem deeb', 'kassemdb2103@gmail.com', 'aboutimg.png', 'excellent service', 5, 'pending'),
('yousef', 'yousef@gmail.com', 'casheir.jpg', 'excellent service . strongly recommand t', 4, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img`) VALUES
('chef2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `jobtype` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id` int(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`fname`, `lname`, `phone`, `email`, `city`, `address`, `jobtype`, `message`, `cv`, `image`, `id`, `status`) VALUES
('ali', 'alhadi', 81765756, 'alihd@gmail.com', 'jbeil', '12,main street', 'chef', '', 'regressionn.pdf', 'aboutimg.png', 8, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `email`, `password`) VALUES
(1, 'ali2@gmail.com', '44');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `name` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nboforders` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`name`, `number`, `email`, `street`, `city`, `total_products`, `totalprice`, `status`, `nboforders`, `id`, `datetime`) VALUES
('fixed', 0, '', '', '', '', 0, '', 1, 15, '2024-05-10 12:15:49.579366'),
('kassem', 81045813, 'kassemdb2103@gmail.com', 'iugyujok', 'khjk', 'fahita (1) ', 8, 'pending', 0, 18, '2024-05-10 12:15:49.579366');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `catid` int(200) NOT NULL,
  `name` varchar(70) NOT NULL,
  `price` int(70) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`catid`, `name`, `price`, `image`, `id`) VALUES
(65, 'margereta pizza', 13, 'download8.jpeg', 21),
(13, 'beef shawarma', 5, 'shaw.jpeg', 12),
(13, 'fahita', 6, 'fahita.jpeg', 24),
(13, 'crispy wrap', 5, 'crispy wrap.jpeg', 26),
(13, 'hotdog', 5, 'hot.jpeg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `table_number` int(255) NOT NULL,
  `totalproduct` varchar(100) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `dateandtime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `name`, `table_number`, `totalproduct`, `totalprice`, `dateandtime`) VALUES
(10, 'kassem', 3, '', 0, '0000-00-00 00:00:00.000000'),
(11, 'kassem', 3, 'fahita (1) ', 6, '0000-00-00 00:00:00.000000'),
(12, 'kassem', 3, '', 0, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `take`
--

CREATE TABLE `take` (
  `name` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `totalproduct` varchar(500) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `nbofusers` int(255) NOT NULL,
  `dateandtime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `take`
--

INSERT INTO `take` (`name`, `phone`, `totalproduct`, `totalprice`, `id`, `nbofusers`, `dateandtime`) VALUES
('fixed', 0, '', 0, 19, 3, '2024-05-10 12:29:29.135409'),
('kassem', 81045813, 'fahita (1) ', 6, 23, 0, '2024-05-10 12:29:29.135409'),
('kassem', 81045813, 'fahita (1) ', 6, 24, 0, '2024-05-10 12:40:33.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(255) NOT NULL,
  `name` varchar(95) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(110) NOT NULL,
  `nbofusers` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `email`, `password`, `nbofusers`) VALUES
(4, 'fixed', '', '', 1),
(8, 'kassem', 'kassemdb2103@gmail.com', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `categoryjobs`
--
ALTER TABLE `categoryjobs`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `dine`
--
ALTER TABLE `dine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `displayteam`
--
ALTER TABLE `displayteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD KEY `catid_fk` (`catid`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take`
--
ALTER TABLE `take`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `categoryjobs`
--
ALTER TABLE `categoryjobs`
  MODIFY `catid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dine`
--
ALTER TABLE `dine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `displayteam`
--
ALTER TABLE `displayteam`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `take`
--
ALTER TABLE `take`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
