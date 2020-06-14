-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table writer_venture.follow
DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `Index` int(11) DEFAULT NULL,
  `handle` text NOT NULL,
  `follow` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.follow: 0 rows
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `follow` ENABLE KEYS */;

-- Dumping structure for table writer_venture.msgs
DROP TABLE IF EXISTS `msgs`;
CREATE TABLE IF NOT EXISTS `msgs` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `from` text NOT NULL,
  `to` text NOT NULL,
  `date` text NOT NULL,
  `body` longtext NOT NULL,
  `from_view` text NOT NULL,
  `to_view` text NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.msgs: 0 rows
/*!40000 ALTER TABLE `msgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `msgs` ENABLE KEYS */;

-- Dumping structure for table writer_venture.report
DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `email` text NOT NULL,
  `status` int(11) NOT NULL,
  UNIQUE KEY `Index` (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.report: 0 rows
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

-- Dumping structure for table writer_venture.userdata
DROP TABLE IF EXISTS `userdata`;
CREATE TABLE IF NOT EXISTS `userdata` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `handle` text NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `addr` text NOT NULL,
  `country` text NOT NULL,
  `bio` longtext NOT NULL,
  `intrested` text NOT NULL,
  `email` text NOT NULL,
  `dp` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  UNIQUE KEY `Index` (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.userdata: 0 rows
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdata` ENABLE KEYS */;

-- Dumping structure for table writer_venture.userlogin
DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `handle` text NOT NULL,
  `type` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `ran` text NOT NULL,
  UNIQUE KEY `Index` (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.userlogin: 2 rows
/*!40000 ALTER TABLE `userlogin` DISABLE KEYS */;
INSERT INTO `userlogin` (`Index`, `handle`, `type`, `email`, `password`, `ran`) VALUES
	(2, 'admin', '', 'abhaywani114@gmail.com', '177849a379bc4d3296e617dd5e975ac8', 'f91e24dfe80012e2a7984afa4480a6d6'),
	(3, 'sahil', '', 'sahil@gmail.com', 'b35f8922ff1d54a5aff55a1d4107e245', 'b571ecea16a9824023ee1af16897a582');
/*!40000 ALTER TABLE `userlogin` ENABLE KEYS */;

-- Dumping structure for table writer_venture.verify
DROP TABLE IF EXISTS `verify`;
CREATE TABLE IF NOT EXISTS `verify` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `value` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  UNIQUE KEY `Index` (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.verify: 0 rows
/*!40000 ALTER TABLE `verify` DISABLE KEYS */;
/*!40000 ALTER TABLE `verify` ENABLE KEYS */;

-- Dumping structure for table writer_venture.write_up
DROP TABLE IF EXISTS `write_up`;
CREATE TABLE IF NOT EXISTS `write_up` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `handle` text NOT NULL,
  `url` text NOT NULL,
  `type` text NOT NULL,
  `title` text NOT NULL,
  `body` longtext NOT NULL,
  `desp` longtext NOT NULL,
  `image` text NOT NULL,
  `cat` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  UNIQUE KEY `Index` (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table writer_venture.write_up: 0 rows
/*!40000 ALTER TABLE `write_up` DISABLE KEYS */;
/*!40000 ALTER TABLE `write_up` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
