-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2017 at 04:59 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET ascii COLLATE ascii_general_ci;
USE `bookstore`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `place_order`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `place_order` (IN `firstName` VARCHAR(25), IN `middleName` VARCHAR(1), IN `lastName` VARCHAR(25), IN `phoneNumber` VARCHAR(10), IN `emailAddress` VARCHAR(255), IN `addressLine1` VARCHAR(255), IN `addressLine2` VARCHAR(255), IN `city` VARCHAR(255), IN `state` VARCHAR(2), IN `zipCode` INT(5), IN `bookISBN` VARCHAR(13), IN `orderTotal` FLOAT, IN `bookQTY` INT(2))  BEGIN
	INSERT INTO Customer(FirstName, MiddleInitial, LastName, PhoneNumber, Email)
    VALUES(firstName, middleName, lastName, phoneNumber, emailAddress);
    
    INSERT INTO Address(Address1, Address2, City, State, ZipCode)
    VALUES(addressLine1, addressLine2, city, state, zipCode);
    
    INSERT INTO Orders(ISBN, Total)
    VALUES(bookISBN, orderTotal);
    
    INSERT INTO BookOrders(ISBN, Quantity)
    VALUES(bookISBN, bookQTY);
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

DROP TABLE IF EXISTS `Address`;
CREATE TABLE `Address` (
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `Address1` varchar(255) NOT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(2) NOT NULL,
  `ZipCode` int(5) NOT NULL COMMENT 'NNNNN'
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`CustomerID`, `Address1`, `Address2`, `City`, `State`, `ZipCode`) VALUES
(19, '3256 S 12th ST', 'Suite 200', 'Doe City', 'hj', 12345),
(20, '3256 S 12th ST', 'Suite 200', 'Doe City', 'hj', 12345),
(21, '12345 E 123ST', 'APT 123', 'Mia', 'VL', 12340),
(25, '12345 E 123ST', 'APT 645', 'Del', 'DL', 12345),
(26, '12345 E 123ST', 'APT 645', 'Del', 'DL', 12345),
(27, '12345 E 123ST', 'APT 645', 'Del', 'DL', 12345),
(28, '342 S 3rd St', 'APT 3504', 'Dale', 'CO', 23017);

-- --------------------------------------------------------

--
-- Table structure for table `AuthorizedUsers`
--

DROP TABLE IF EXISTS `AuthorizedUsers`;
CREATE TABLE `AuthorizedUsers` (
  `Username` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `AuthorizedUsers`
--

INSERT INTO `AuthorizedUsers` (`Username`, `Password`, `LastLogin`) VALUES
('Admin', '553361B06F642617F494B6B9D8BAE4E7348A6C6E', '2017-07-06 21:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `BookOrders`
--

DROP TABLE IF EXISTS `BookOrders`;
CREATE TABLE `BookOrders` (
  `TransactionID` int(8) UNSIGNED NOT NULL COMMENT 'NN-NNNNNN',
  `ISBN` varchar(13) NOT NULL COMMENT 'NNN-N-NNNNN-NNN-N',
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

DROP TABLE IF EXISTS `Books`;
CREATE TABLE `Books` (
  `Image` varchar(250) NOT NULL,
  `ISBN` varchar(13) NOT NULL COMMENT 'NNN-N-NNNNN-NNN-N',
  `Title` varchar(100) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Genre` varchar(16) DEFAULT NULL,
  `Publisher` varchar(45) NOT NULL,
  `PublishedYear` date NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Image`, `ISBN`, `Title`, `Author`, `Description`, `Genre`, `Publisher`, `PublishedYear`, `Price`, `Quantity`) VALUES
('img/9780399157233.jpg', '9780399157233', 'Dead or Alive', 'Grant Blackwood', '', NULL, 'Putnam Adult', '2010-12-07', 8.99, 1),
('img/9780399157239.jpg', '9780399157239', 'Testing Book Please Ignore', 'MMD', '', NULL, 'Test Please Ignore', '2017-07-10', 1, 0),
('img/9780399157301.jpg', '9780399157301', 'Against All Enemies', 'Peter Telep', '', NULL, 'Putnam Adult', '2011-07-14', 8.99, 1),
('img/9780399157318.jpg', '9780399157318', 'Locked On', 'Mark Greaney', '', NULL, ' 	Putnam', '2011-12-11', 8.99, 1),
('img/9780399160448.jpg', '9780399160448', 'Search and Destroy', 'Peter Telep', '', NULL, 'Putnam Adult', '2012-07-05', 8.99, 1),
('img/9780399160479.jpg', '9780399160479', 'Command Authority', 'Mark Greaney', '', NULL, 'Putnam Adult', '2013-12-03', 8.99, 0),
('img/9780399173349.jpg', '9780399173349', 'Support And Defend', 'Mark Greaney', '', NULL, 'Putnam Adult', '2014-06-22', 9.99, 0),
('img/9780399173356.jpg', '9780399173356', 'Full Force And Effect', 'Mark Greaney', 'A North Korean ICBM crashes into the Sea of Japan. A veteran CIA officer is murdered in Ho Chi Minh City, and a package of forged documents goes missing.', NULL, 'Putnam Adult', '2014-12-02', 9.99, 0),
('img/9780399175756.jpg', '9780399175756', 'Under Fire', 'Mark Greaney', '', NULL, 'Putnam Adult', '2015-06-16', 9.99, 0),
('img/9780399176760.jpg', '9780399176760', 'Commander In Chief', 'Mark Greaney', '', NULL, 'G. P. Putnam\'s Sons', '2015-12-01', 10.99, 0),
('img/9780425222140.jpg', '9780425222140', 'Tom Clancy\'s EndWar', 'David Michaels', '', NULL, 'Berkley', '2008-02-04', 7.99, 0),
('img/9780425237717.jpg', '9780425237717', 'Tom Clancy\'s EndWar: The Hunted', 'David Michaels', '', NULL, 'Berkley Books', '2011-02-01', 8.99, 0),
('img/9780425262306.jpg', '9780425262306', 'Threat Vector', 'Mark Greaney', '', NULL, 'Berkley Books ', '2012-12-04', 8.99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE `Customer` (
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `MiddleInitial` varchar(1) DEFAULT NULL,
  `LastName` varchar(25) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL COMMENT 'NNN-NNN-NNNN',
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerID`, `FirstName`, `MiddleInitial`, `LastName`, `PhoneNumber`, `Email`) VALUES
(1, 'John', 'I', 'Doe', '5417543010', 'JohnDoe@generciemail.com'),
(8, 'John', 'O', 'Die', '1234443210', 'JohnODoe@Doe.com'),
(9, 'John', 'O', 'Die', '1234443210', 'JohnODoe@Doe.com'),
(10, 'Jane', 'I', 'Del', '1235556678', 'JaneDel@del.com'),
(11, 'Jane', 'I', 'Del', '1235556678', 'JaneDel@del.com'),
(12, 'Jane', 'I', 'Del', '1235556678', 'JaneDel@del.com'),
(13, 'Jane', 'I', 'Del', '1235556678', 'JaneDel@del.com'),
(14, 'ffff', 'f', 'iiiii', '123456789', 'ggg@g.com'),
(15, 'ppppp', 'p', 'ppppp', '1234456777', 'fgh@f.com'),
(16, 'llll', 'l', 'llllll', '0000001234', 'llll@df.co'),
(17, 'llll', 'l', 'llllll', '0000001234', 'llll@df.co'),
(18, 'Jade', 'P', 'Den', '0000001234', 'JadeDen@del.com'),
(19, 'John', 'O', 'Doe', '123456789', 'JaneDel@del.com'),
(20, 'John', 'O', 'Doe', '123456789', 'JaneDel@del.com'),
(21, 'Jane', 'L', 'Dellit', '123456789', '1234asd@cv.bm'),
(22, '', '', '', '', ''),
(23, '', '', '', '', ''),
(24, '', '', '', '', ''),
(25, 'John', 'I', 'Die', '123456789', 'JaneDel@del.com'),
(26, 'John', 'I', 'Die', '123456789', 'JaneDel@del.com'),
(27, 'John', 'I', 'Die', '123456789', 'JaneDel@del.com'),
(28, 'Loren', 'P', 'Dan', '5679871234', 'LorenDan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders` (
  `TransactionID` int(8) UNSIGNED NOT NULL COMMENT 'NN-NNNNNN',
  `Date` datetime NOT NULL,
  `ISBN` varchar(13) NOT NULL COMMENT 'NNN-N-NNNNN-NNN-N',
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`TransactionID`, `Date`, `ISBN`, `CustomerID`, `Total`) VALUES
(100901, '2017-07-06 10:13:29', '9780399160448', 1, 8.99),
(100902, '2017-07-25 19:26:52', '9780399157301', 27, 8.99),
(100903, '2017-07-27 02:37:09', '9780399157233', 28, 17.98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `AuthorizedUsers`
--
ALTER TABLE `AuthorizedUsers`
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `BookOrders`
--
ALTER TABLE `BookOrders`
  ADD KEY `TransactionID` (`TransactionID`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `ISBN` (`ISBN`,`CustomerID`),
  ADD KEY `ISBN_2` (`ISBN`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `TransactionID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'NN-NNNNNN', AUTO_INCREMENT=100904;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);

--
-- Constraints for table `BookOrders`
--
ALTER TABLE `BookOrders`
  ADD CONSTRAINT `BookOrders_ibfk_1` FOREIGN KEY (`TransactionID`) REFERENCES `Orders` (`TransactionID`),
  ADD CONSTRAINT `BookOrders_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `Books` (`ISBN`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `Books` (`ISBN`),
  ADD CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
