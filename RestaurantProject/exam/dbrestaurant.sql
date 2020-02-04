-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 07:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(11) NOT NULL,
  `Customer_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `Customer_Name`) VALUES
(1, 'Daniel');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `dishId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`dishId`, `name`, `description`, `price`, `image`) VALUES
(1, 'Avocado', 'Avocado salad with olive oil dressing', 10, 'avocado.jpg'),
(2, 'Biryani', 'Chicken and rice', 13, 'biryani.jpg'),
(3, 'Cake', 'Mixed fruit cake with blue icing', 18, 'cake.jpg'),
(4, 'Cupcake', 'Red velvet cupcakes', 4, 'cupcake.jpg'),
(5, 'Dosa', 'South indian dish', 9, 'dosa.jpg'),
(6, 'Fish', 'Slowly braised salmon with side salad', 13, 'fish.jpg'),
(7, 'Fries', 'French fires with dipping sauce', 7, 'fries.jpg'),
(8, 'Fruit Bowl', 'A mix of berries, banana and oats', 15, 'fruitbowl.jpg'),
(9, 'Gulab Jamun', 'Indian Desert', 5, 'gulabjamun.jpg'),
(10, 'Idli', 'South Indian Dish', 9, 'idli.jpg'),
(11, 'Pasta', 'Penne pasta with tomato based sauce', 13, 'pasta.jpg'),
(12, 'Pizza', 'This is pizza', 16, 'pizza.jpg'),
(13, 'Poutine', 'French fries with some kind of sauce', 8, 'poutine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `employeeType` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `employeeType`, `name`) VALUES
(1, 'admin', 'nitisha'),
(3, 'chef', 'kanwal');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `customerName` varchar(20) NOT NULL,
  `dishName` varchar(20) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`customerName`, `dishName`, `comments`, `rating`) VALUES
('Nitisha', 'Agile', 'I want to be swift engineer', 10),
('kanwal', 'hello', 'hello', 10),
('nitisha', 'qwerty', 'qwe', 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `employeeId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`employeeId`, `username`, `password`) VALUES
(1, 'iamadmin', 'iamadmin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `dishId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tableNumber` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `dateTime`) VALUES
(111, '2019-11-28 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `tableNumber` int(11) NOT NULL,
  `tableType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`tableNumber`, `tableType`) VALUES
(101, 2),
(102, 2),
(103, 3),
(104, 3),
(105, 4),
(106, 5);

-- --------------------------------------------------------

--
-- Table structure for table `table_reservation`
--

CREATE TABLE `table_reservation` (
  `tableNumber` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_reservation`
--

INSERT INTO `table_reservation` (`tableNumber`, `reservationId`) VALUES
(102, 111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dishId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`tableNumber`);

--
-- Indexes for table `table_reservation`
--
ALTER TABLE `table_reservation`
  ADD PRIMARY KEY (`tableNumber`,`reservationId`),
  ADD KEY `reservationId` (`reservationId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `employeeID` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`EmployeeId`);

--
-- Constraints for table `table_reservation`
--
ALTER TABLE `table_reservation`
  ADD CONSTRAINT `reservationId` FOREIGN KEY (`reservationId`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `tableNumber` FOREIGN KEY (`tableNumber`) REFERENCES `table` (`tableNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
