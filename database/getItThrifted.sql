-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 13, 2024 at 01:05 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getItThrifted`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bank`
--

CREATE TABLE `Bank` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bank`
--

INSERT INTO `Bank` (`id`, `name`) VALUES
(1, 'Bank of Valletta'),
(2, 'HSBC');

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`id`, `name`) VALUES
(1, 'Malta'),
(6, 'Gozo');

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE `OrderItems` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`id`, `userId`, `orderDate`) VALUES
(2, 10, '2024-01-12'),
(3, 10, '2024-01-12'),
(4, 10, '2024-01-12'),
(5, 10, '2024-01-12'),
(6, 10, '2024-01-12'),
(7, 10, '2024-01-12'),
(8, 10, '2024-01-12'),
(9, 10, '2024-01-12'),
(10, 10, '2024-01-13'),
(11, 10, '2024-01-13'),
(12, 10, '2024-01-13'),
(13, 10, '2024-01-13'),
(14, 10, '2024-01-13'),
(15, 10, '2024-01-13'),
(16, 6, '2024-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `id` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `cardNumber` varchar(20) NOT NULL,
  `accountHolder` varchar(50) NOT NULL,
  `cvv` int(3) NOT NULL,
  `expirationDate` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`id`, `bankId`, `cardNumber`, `accountHolder`, `cvv`, `expirationDate`) VALUES
(1, 1, '1234 1234 1234 1234', 'Thomas Borg', 123, '02/26'),
(2, 2, '9876 9876 9876 9876', 'Maria Vella', 987, '10/28'),
(3, 1, '1234 5678 9012 3456', 'Kyle Schembri', 456, '08/25'),
(4, 1, '6789 6789 9876 9876', 'Laura Busuttil', 693, '09/24'),
(13, 2, '1234 1234 5678 5678', 'Jake Muscat', 123, '02/25'),
(31, 1, '9876 1234 4321 1234', 'Paul Micallef', 563, '12');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `sizeId` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stockQty` int(11) NOT NULL,
  `imgLink` varchar(100) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `uploadDate` date NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `name`, `price`, `sizeId`, `description`, `stockQty`, `imgLink`, `sellerId`, `uploadDate`, `statusId`) VALUES
(1, 'Checked Shirt', 25, 4, 'Carhartt Checked Shirt in Blue', 1, 'assets/thrift1.jpg.webp', 5, '2023-12-20', 2),
(2, 'Zip-Up Navy Blue', 45, 4, 'Hummel Vintage windbreaker in Blue', 1, 'assets/thrift2.heic.webp', 5, '2023-12-20', 2),
(3, 'Lacoste in Grey', 30, 2, 'Lacoste round-neck Grey Sweatshirt', 1, 'assets/thrift3.heic.webp', 5, '2023-12-20', 2),
(4, 'Heavy Jacket in Green', 150, 3, 'Timberland Parka in Green', 1, 'assets/thrift4.heic.webp', 5, '2023-12-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Requests`
--

CREATE TABLE `Requests` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `why` text NOT NULL,
  `productName` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `sellingPrice` float NOT NULL,
  `size` varchar(20) NOT NULL,
  `imageLink` varchar(100) NOT NULL,
  `statusId` int(11) NOT NULL,
  `requestDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'Buyer'),
(2, 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `Size`
--

CREATE TABLE `Size` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Size`
--

INSERT INTO `Size` (`id`, `name`) VALUES
(1, 'Extra Small'),
(2, 'Small'),
(3, 'Medium'),
(4, 'Large'),
(5, 'Extra Large'),
(6, 'XXL'),
(7, 'XXXL');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `Street`
--

CREATE TABLE `Street` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `townId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Street`
--

INSERT INTO `Street` (`id`, `name`, `townId`) VALUES
(1, 'Giovanni Barbara', 1),
(2, 'Maintland', 2),
(3, 'San Gorg', 7),
(4, 'Burlo', 1),
(5, 'Marija Zammit', 4),
(15, 'Andrew Bugeja', 10),
(25, 'Kristu Re', 5),
(27, 'San Pawl', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Town`
--

CREATE TABLE `Town` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Town`
--

INSERT INTO `Town` (`id`, `name`, `countryId`) VALUES
(1, 'Hamrun', 1),
(2, 'Marsa', 1),
(3, 'Santa Venera', 1),
(4, 'Birgu', 1),
(5, 'Bormla', 1),
(6, 'Qawra', 1),
(7, 'Valletta', 1),
(8, 'Birkirkara', 1),
(9, 'Victoria', 6),
(10, 'Xewkija', 6),
(11, 'Munxar', 6),
(12, 'Mellieha', 1),
(13, 'Mgarr', 1),
(14, 'Rabat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `dateOfBirth` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `streetId` int(11) NOT NULL,
  `paymentId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `email`, `password`, `name`, `surname`, `dateOfBirth`, `address`, `streetId`, `paymentId`, `roleId`) VALUES
(1, 'willferr', 'williamferr@gmail.com', '12345', 'Will', 'Ferrante', '2000-05-01', '15', 1, 1, 2),
(2, 'rygal', 'ryangalea@yahoo.com', '9876', 'Ryan', 'Galea', '1996-04-02', '100', 3, 2, 2),
(3, 'marija_zammit', 'zammitmar@gmail.com', '98765', 'Marija', 'Zammit', '1999-10-25', '25', 2, 3, 1),
(4, 'marcopolo', 'polomarco@gmail.com', '33455', 'Marco', 'Polo', '2005-12-25', '33', 5, 4, 1),
(5, 'getitThrifted', 'getitThrifted@gmail.com', '74021', 'Get It Thrifted', 'Malta', '2023-12-20', '15', 1, 1, 2),
(6, 'tanyaspiteri', 'spiteri.tanya@gmail.com', '3435', 'Tanya', 'Spiteri', '1997-08-14', '88', 3, 4, 1),
(10, 'micallefp', 'micallefpaul@gmail.com', '123', 'Paul', 'Micallef', '1995-05-01', '2355', 27, 31, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bank`
--
ALTER TABLE `Bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`) USING BTREE;

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankId` (`bankId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizeId` (`sizeId`),
  ADD KEY `sellerId` (`sellerId`),
  ADD KEY `statusId` (`statusId`);

--
-- Indexes for table `Requests`
--
ALTER TABLE `Requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusId` (`statusId`) USING BTREE,
  ADD KEY `requests_ibfk_2` (`userId`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Size`
--
ALTER TABLE `Size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Street`
--
ALTER TABLE `Street`
  ADD PRIMARY KEY (`id`),
  ADD KEY `street_ibfk_1` (`townId`);

--
-- Indexes for table `Town`
--
ALTER TABLE `Town`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentId` (`paymentId`),
  ADD KEY `streetId` (`streetId`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bank`
--
ALTER TABLE `Bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Requests`
--
ALTER TABLE `Requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Size`
--
ALTER TABLE `Size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Street`
--
ALTER TABLE `Street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Town`
--
ALTER TABLE `Town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bankId`) REFERENCES `Bank` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sizeId`) REFERENCES `Size` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`sellerId`) REFERENCES `Users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`statusId`) REFERENCES `Status` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Requests`
--
ALTER TABLE `Requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`statusId`) REFERENCES `Status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Street`
--
ALTER TABLE `Street`
  ADD CONSTRAINT `street_ibfk_1` FOREIGN KEY (`townId`) REFERENCES `Town` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Town`
--
ALTER TABLE `Town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `Country` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`paymentId`) REFERENCES `Payment` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`streetId`) REFERENCES `Street` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`roleId`) REFERENCES `Role` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
