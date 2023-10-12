-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 09:23 PM
-- Server version: 10.4.27-MariaDB-log
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkkdatabase`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAdmin` (IN `Username` VARCHAR(255) CHARSET utf8mb4)   UPDATE account
SET account.isAdmin = 0 WHERE account.Username = Username$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `setAdmin` (IN `Username` VARCHAR(255) CHARSET utf8mb4)   UPDATE account
SET account.isAdmin = 1 WHERE account.Username = Username$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Balance` double NOT NULL,
  `Password` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Id`, `FirstName`, `LastName`, `Username`, `Balance`, `Password`, `isAdmin`) VALUES
(1000000001, 'Mehmet', 'İvedik', 'mehmet', 4244, '1234', 1),
(1000000007, 'Veli Melih', 'Küçükbaş', 'veli', 300, '123', 0),
(1000000008, 'Serdar', 'Karaca', 'serdar', 3000, '123', 0),
(1000000009, 'Abe', 'Cede', 'abcd', 1, '123', 0),
(1000000011, 'Dokuz Eylül', 'Üniversitesi', 'deukullanıcı', 0, '123', 0),
(1000000012, 'Harun Adem', 'Temur', 'harunademtemur', 680.5, '123', 0),
(1000000013, 'Test', 'Bir', 'test1', 556, '123', 0),
(1000000014, 'sad', 'dad', 'sadasdasd', 500, 'iii', 0),
(1000000017, 'b', 'c', 'a', 1000, 'd', 0),
(1000000023, 'aa', 'aa', 'aa', 0, 'aa', 0),
(1000000024, 'aaa', 'aaa', 'aaa', 0, 'aaa', 0),
(1000000025, 'aaaa', 'aaaa', 'aaaa', 0, 'aaaa', 0),
(1000000026, 'Muzaffer', 'Sevili', 'muzo', 0, 'muzomuzo', 0),
(1000000027, 'ab123', 'ab123', 'ab123', 0, 'ab123', 0),
(1000000028, 'ab124', 'ab124', 'ab124', 0, 'ab124', 0),
(1000000029, 'adem', 'badem', 'adem', 0, 'badem', 0),
(1000000031, 'busonsolsun2', 'busonsolsun2', 'busonsolsun2', 0, 'busonsolsun2', 0),
(1000000033, 'asd', 'dsa', 'denemekullanıcı', 0, '123', 0),
(1000000034, 'hello', 'hello', 'hello', 0, 'hello', 0),
(1000000035, 'hello2', 'hello2', 'hello2', 0, 'hello2', 0),
(1000000038, 'hello3', 'hello3', 'hello3', 0, 'hello3', 0);

--
-- Triggers `account`
--
DELIMITER $$
CREATE TRIGGER `BalanceChange` AFTER UPDATE ON `account` FOR EACH ROW INSERT INTO log (DateTime, AccountID, TransactionType, ChangeAmount) VALUES (now(), NEW.Id, "balance", (NEW.balance - OLD.balance))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DeleteUser` AFTER DELETE ON `account` FOR EACH ROW BEGIN  
INSERT INTO log (`DateTime`, AccountID, TransactionType) VALUES (now(), old.Id, "deleteaccount");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `NewUser` AFTER INSERT ON `account` FOR EACH ROW BEGIN  
INSERT INTO log (`DateTime`, AccountID, TransactionType) VALUES (now(), new.Id, "signup");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `WelcomeBonus` AFTER INSERT ON `account` FOR EACH ROW INSERT INTO ownedcurrency
VALUES ((SELECT Id FROM account ORDER BY Id DESC LIMIT 1), 1, 100)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `admincontact`
-- (See below for the actual view)
--
CREATE TABLE `admincontact` (
`Username` varchar(50)
,`PhoneNo` bigint(20)
,`Email` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `AccountID` int(11) NOT NULL,
  `PhoneNo` bigint(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`AccountID`, `PhoneNo`, `Email`) VALUES
(1000000001, 5351234567, 'mehmet.ivedik@deu.edu.tr');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `CurrencyID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`CurrencyID`, `Name`) VALUES
(1, 'USD'),
(2, 'EUR'),
(3, 'GBP'),
(4, 'CNY'),
(5, 'JPY'),
(6, 'RUB'),
(7, 'CHF'),
(8, 'CAD'),
(9, 'BTC'),
(10, 'ETH'),
(11, 'LTC'),
(12, 'XRP'),
(13, 'BNB'),
(14, 'SOL'),
(15, 'DOGE'),
(16, 'ADA'),
(17, 'LINK'),
(18, 'MATIC'),
(19, 'TRX'),
(20, 'LUNC'),
(21, 'AVAX'),
(22, 'SRP'),
(23, 'SHIB');

-- --------------------------------------------------------

--
-- Stand-in structure for view `highestbalance10`
-- (See below for the actual view)
--
CREATE TABLE `highestbalance10` (
`Id` int(11)
,`FirstName` varchar(30)
,`LastName` varchar(30)
,`Username` varchar(50)
,`Balance` double
,`Password` varchar(50)
,`isAdmin` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `DateTime` datetime NOT NULL,
  `AccountID` int(11) NOT NULL,
  `TransactionType` varchar(255) NOT NULL,
  `ChangeAmount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`DateTime`, `AccountID`, `TransactionType`, `ChangeAmount`) VALUES
('2023-01-03 11:16:37', 1000000038, 'signup', NULL),
('2023-01-03 11:25:16', 1000000030, 'deleteaccount', NULL),
('2023-01-03 11:28:56', 1000000001, 'balance', -300),
('2023-01-03 11:29:51', 1000000001, 'balance', 200),
('2023-01-03 18:12:38', 1000000000, 'deleteaccount', NULL),
('2023-01-03 18:13:31', 1000000007, 'balance', 0),
('2023-01-03 18:14:39', 1000000007, 'balance', 0),
('2023-01-03 18:24:24', 1000000007, 'balance', 0),
('2023-01-03 18:25:05', 1000000007, 'balance', 0),
('2023-01-03 18:25:51', 1000000007, 'balance', 0),
('2023-01-03 18:25:56', 1000000007, 'balance', 0),
('2023-01-03 18:26:00', 1000000007, 'balance', 0),
('2023-01-03 18:40:56', 1000000039, 'signup', NULL),
('2023-01-03 18:42:10', 1000000039, 'deleteaccount', NULL),
('2023-01-03 22:56:39', 1000000001, 'balance', -5),
('2023-01-03 22:56:46', 1000000001, 'balance', -5),
('2023-01-03 22:57:28', 1000000001, 'balance', -5),
('2023-01-03 22:57:39', 1000000001, 'balance', -5),
('2023-01-03 22:58:03', 1000000001, 'balance', -5),
('2023-01-03 23:00:06', 1000000001, 'balance', -200);

-- --------------------------------------------------------

--
-- Table structure for table `ownedcurrency`
--

CREATE TABLE `ownedcurrency` (
  `AccountID` int(11) NOT NULL,
  `CurrencyID` int(11) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `ownedcurrency`
--

INSERT INTO `ownedcurrency` (`AccountID`, `CurrencyID`, `Amount`) VALUES
(1000000023, 1, 100),
(1000000024, 1, 100),
(1000000025, 1, 100),
(1000000026, 1, 100),
(1000000027, 1, 100),
(1000000028, 1, 100),
(1000000029, 1, 100),
(1000000031, 1, 100),
(1000000033, 1, 100),
(1000000001, 1, 47.235863955856),
(1000000001, 2, 14.684202940385),
(1000000034, 1, 100),
(1000000035, 1, 100),
(1000000038, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ownedstocks`
--

CREATE TABLE `ownedstocks` (
  `AccountID` int(11) NOT NULL,
  `StockID` int(11) NOT NULL,
  `Count` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `ownedstocks`
--

INSERT INTO `ownedstocks` (`AccountID`, `StockID`, `Count`) VALUES
(1000000001, 1, 526.5);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `StockID` int(11) NOT NULL,
  `ShortName` varchar(16) NOT NULL,
  `FullName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`StockID`, `ShortName`, `FullName`) VALUES
(1, 'VMK', 'youtube: motogineer\r\n'),
(2, 'MSFT', 'Microsoft'),
(3, 'AAPL', 'Apple'),
(4, 'GOOG', 'Alphabet Inc.'),
(5, 'IBM', 'IBM'),
(6, 'ORCL', 'Oracle'),
(7, 'INTC', 'Intel Corp.'),
(8, 'ADBE', 'Adobe'),
(9, 'AMZN', 'Amazon'),
(10, 'TSLA', 'Tesla, Inc.'),
(11, 'NVDA', 'Nvidia Corp.'),
(12, 'META', 'Meta Platforms'),
(13, 'BABA', 'Alibaba'),
(14, 'AMD', 'Advanced Micro Devices, Inc.'),
(15, 'PYPL', 'PayPal'),
(16, 'ATVI', 'Activision'),
(17, 'EA', 'Electronic Arts'),
(18, 'TTD', 'The Trade Desk'),
(19, 'MTCH', 'Match Group, Inc.'),
(20, 'ZG', 'Zillow Group'),
(21, 'YELP', 'Yelp Inc.'),
(22, 'CRM', 'Salesforce, Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `TransactionType` enum('buy','sell') NOT NULL,
  `ValuableType` enum('stock','currency') NOT NULL,
  `StockID` int(11) DEFAULT NULL,
  `CurrencyID` int(11) DEFAULT NULL,
  `Quantity/Amount` double NOT NULL,
  `Price` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `AccountID`, `Date`, `Time`, `TransactionType`, `ValuableType`, `StockID`, `CurrencyID`, `Quantity/Amount`, `Price`, `Total`) VALUES
(1, 1000000001, '2022-12-21', '22:00:30', 'buy', 'stock', 1, NULL, 501.5, 10, 5015),
(6, 1000000001, '2023-01-02', '17:41:34', 'buy', 'currency', NULL, 1, 10.487676979549, 19.07, 200),
(7, 1000000001, '2023-01-02', '17:48:03', 'buy', 'currency', NULL, 1, 10.487676979549, 19.07, 200),
(8, 1000000001, '2023-01-02', '17:49:24', 'buy', 'currency', NULL, 1, 10.493179433368, 19.06, 200),
(9, 1000000001, '2023-01-02', '17:49:51', 'buy', 'currency', NULL, 1, 10.498687664042, 19.05, 200),
(10, 1000000001, '2023-01-02', '18:17:36', 'buy', 'currency', NULL, 1, 10.487676979549, 19.07, 200),
(11, 1000000001, '2023-01-02', '18:17:57', 'buy', 'currency', NULL, 1, 10.487676979549, 19.07, 200),
(12, 1000000001, '2023-01-02', '18:18:28', 'buy', 'currency', NULL, 2, 14.705882352941, 20.4, 300),
(13, 1000000001, '2023-01-02', '18:18:50', 'buy', 'currency', NULL, 2, 14.713094654242, 20.39, 300),
(14, 1000000001, '2023-01-02', '18:59:47', 'sell', 'currency', NULL, 2, 14.734774066798, 20.36, 300),
(15, 1000000001, '2023-01-03', '11:27:05', 'buy', 'currency', NULL, 1, 10.50972149238, 19.03, 200),
(16, 1000000001, '2023-01-03', '11:28:57', 'buy', 'currency', NULL, 1, 15.756302521008, 19.04, 300),
(17, 1000000001, '2023-01-03', '11:29:51', 'sell', 'currency', NULL, 1, 10.504201680672, 19.04, 200),
(18, 1000000001, '2023-01-03', '22:56:39', 'buy', 'stock', 1, NULL, 5, 1, 5),
(19, 1000000001, '2023-01-03', '22:56:46', 'buy', 'stock', 1, NULL, 5, 1, 5),
(20, 1000000001, '2023-01-03', '22:57:28', 'buy', 'stock', 1, NULL, 5, 1, 5),
(21, 1000000001, '2023-01-03', '22:57:39', 'buy', 'stock', 1, NULL, 5, 1, 5),
(22, 1000000001, '2023-01-03', '22:58:03', 'buy', 'stock', 1, NULL, 5, 1, 5),
(23, 1000000001, '2023-01-03', '23:00:06', 'buy', 'currency', NULL, 1, 10.498687664042, 19.05, 200);

-- --------------------------------------------------------

--
-- Structure for view `admincontact`
--
DROP TABLE IF EXISTS `admincontact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admincontact`  AS SELECT `account`.`Username` AS `Username`, `contact`.`PhoneNo` AS `PhoneNo`, `contact`.`Email` AS `Email` FROM (`account` join `contact` on(`account`.`Id` = `contact`.`AccountID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `highestbalance10`
--
DROP TABLE IF EXISTS `highestbalance10`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `highestbalance10`  AS SELECT `account`.`Id` AS `Id`, `account`.`FirstName` AS `FirstName`, `account`.`LastName` AS `LastName`, `account`.`Username` AS `Username`, `account`.`Balance` AS `Balance`, `account`.`Password` AS `Password`, `account`.`isAdmin` AS `isAdmin` FROM `account` ORDER BY `account`.`Balance` DESC LIMIT 0, 10101010  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `ownedcurrency`
--
ALTER TABLE `ownedcurrency`
  ADD KEY `accountowncrncy` (`AccountID`);

--
-- Indexes for table `ownedstocks`
--
ALTER TABLE `ownedstocks`
  ADD KEY `accountownstcks` (`AccountID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`StockID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `transstocks` (`StockID`),
  ADD KEY `transcurrencies` (`CurrencyID`),
  ADD KEY `transaccount` (`AccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000040;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `StockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `AccountID` FOREIGN KEY (`AccountID`) REFERENCES `account` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `ownedcurrency`
--
ALTER TABLE `ownedcurrency`
  ADD CONSTRAINT `accountowncrncy` FOREIGN KEY (`AccountID`) REFERENCES `account` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `ownedstocks`
--
ALTER TABLE `ownedstocks`
  ADD CONSTRAINT `accountownstcks` FOREIGN KEY (`AccountID`) REFERENCES `account` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaccount` FOREIGN KEY (`AccountID`) REFERENCES `account` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transcurrencies` FOREIGN KEY (`CurrencyID`) REFERENCES `currencies` (`CurrencyID`),
  ADD CONSTRAINT `transstocks` FOREIGN KEY (`StockID`) REFERENCES `stocks` (`StockID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
