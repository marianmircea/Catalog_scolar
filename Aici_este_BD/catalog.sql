-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 06:41 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `absente`
--

CREATE TABLE IF NOT EXISTS `absente` (
  `id_abs` int(3) NOT NULL AUTO_INCREMENT,
  `valoare_abs` varchar(255) CHARACTER SET utf8 NOT NULL,
  `semestru` int(2) NOT NULL,
  `clasa` int(2) NOT NULL,
  `id_materie` int(2) NOT NULL,
  `id_elev` int(3) NOT NULL,
  `data_obtinere` date NOT NULL,
  PRIMARY KEY (`id_abs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `absente`
--

INSERT INTO `absente` (`id_abs`, `valoare_abs`, `semestru`, `clasa`, `id_materie`, `id_elev`, `data_obtinere`) VALUES
(1, '1', 1, 9, 1, 5, '2017-08-15'),
(2, '1', 1, 9, 1, 3, '2017-02-14'),
(3, '1', 2, 12, 1, 7, '2017-09-18'),
(4, '1', 2, 12, 1, 5, '2017-09-18'),
(5, '1', 1, 11, 1, 5, '2017-06-01'),
(9, '1', 2, 10, 5, 8, '2017-01-28'),
(10, '1', 2, 11, 10, 4, '2017-04-29'),
(11, '1', 1, 9, 10, 4, '2017-02-14'),
(12, '1', 1, 9, 10, 4, '2017-02-14'),
(13, '1', 2, 11, 10, 5, '2017-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `elevi`
--

CREATE TABLE IF NOT EXISTS `elevi` (
  `id_elev` int(10) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nr_matricol` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_parinte` int(10) NOT NULL,
  `parola` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_elev`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `elevi`
--

INSERT INTO `elevi` (`id_elev`, `nume`, `prenume`, `email`, `nr_matricol`, `id_parinte`, `parola`) VALUES
(3, 'Mihaescu', 'Cristian', 'micr@yahoo.com', '896', 2, '$2y$10$uNbrSHhNXAXg5Prep4IU2OIuEZ5jSYEsj920gC5ajpuw6EUv1QEua'),
(4, 'David', 'Alina', 'daal@yahoo.com', '721', 3, '$2y$10$fqnyPZTm82s6pY0wr0zx9eOcCQM.LAYQACcorJxwDOWw3djnXhuem'),
(5, 'Silaghi', 'Eugen', 'sieu@yahoo.com', '52', 5, '$2y$10$lKEssa89X4/mXOLMhikFOuxI/6mAIxmn6hvEgmwOA1l62gg4nY6eC'),
(6, 'Burlacu', 'Denisa', 'bude@yahoo.com', '101', 1, '$2y$10$mHCNdrmHDxZ7E6682Y9oJeRx8bLTegi4g2UA8aR.7U2Q8haXgELvO'),
(7, 'Moldovan', 'Adrian', 'moad@yahoo.com', '61', 4, '$2y$10$eYaPQYdndnAnD9E/J4N5aeAxFBC4IdhzgnMVdK83kjjvUGRlPgNNe'),
(8, 'Lupsa', 'Roxana', 'luro@yahoo.com', '16', 6, '$2y$10$T44KI5OBHmg6xrxF7ZuqHOHCDn2iiMiLicqsE3gjwjhOswSoS58E6'),
(9, 'Ionescu', 'Elena', 'ioel@yahoo.com', '890', 1, '$2y$10$OM5WJizMi7QSYs1AlBcKOutbYk/8veVIiJ3XO3qRIkCUuPV.6Sa9G'),
(10, 'Marian', 'Madalina', 'mama@yahoo.com', '998', 8, '$2y$10$sVLTE1HP8ZcNY9lDcsJH.uLCtryCWU6EiWGwGKKO2jrHQOY7Yrriy');

-- --------------------------------------------------------

--
-- Table structure for table `materii`
--

CREATE TABLE IF NOT EXISTS `materii` (
  `id_materie` int(2) NOT NULL AUTO_INCREMENT,
  `nume_materie` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_materie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `materii`
--

INSERT INTO `materii` (`id_materie`, `nume_materie`) VALUES
(1, 'Lb_Romana'),
(2, 'Lb_Engleza'),
(3, 'Lb_Franceza'),
(4, 'Lb_Germana'),
(5, 'Matematica'),
(6, 'Fizica'),
(7, 'Chimia'),
(8, 'Biologia'),
(9, 'Istoria'),
(10, 'Geografia'),
(11, 'Informatica'),
(12, 'St_Socio_Umane'),
(13, 'Religia'),
(14, 'Ed_Muzicala'),
(15, 'Ed_Plastica'),
(16, 'Ed_Fizica_Sport'),
(17, 'Ed_Tehnologica'),
(18, 'TIC_(Tehn_Inform_Comunic)'),
(19, 'Ed_Antreprenoriala'),
(20, 'Latina'),
(21, 'Materie_Specifica_1'),
(22, 'Materie_Specifica_2'),
(23, 'Optional_1'),
(24, 'Optional_2');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id_nota` int(3) NOT NULL AUTO_INCREMENT,
  `clasa` int(2) NOT NULL,
  `semestru` int(2) NOT NULL,
  `valoare_nota` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_materie` int(2) NOT NULL,
  `id_elev` int(3) NOT NULL,
  `data_obtinere` date NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_nota`, `clasa`, `semestru`, `valoare_nota`, `id_materie`, `id_elev`, `data_obtinere`) VALUES
(1, 9, 1, '8', 3, 6, '2017-11-07'),
(2, 10, 2, '7', 2, 4, '2017-11-07'),
(3, 11, 1, '6', 6, 3, '2017-11-07'),
(4, 11, 2, '6', 2, 3, '2017-11-11'),
(5, 10, 2, '7', 8, 6, '2017-11-07'),
(6, 11, 2, '8', 1, 5, '2017-11-07'),
(7, 10, 2, '8', 10, 8, '2017-11-03'),
(8, 12, 1, '5', 10, 3, '2017-04-05'),
(10, 9, 1, '3', 7, 8, '2002-05-20'),
(11, 11, 2, '8', 10, 7, '2017-09-30'),
(17, 11, 2, '9', 5, 4, '2017-04-29'),
(18, 10, 1, '7', 5, 6, '2017-01-28'),
(19, 9, 1, '7', 5, 7, '2017-01-28'),
(20, 10, 1, '10', 10, 7, '2017-02-14'),
(21, 12, 2, '8', 7, 9, '2017-03-15'),
(22, 10, 1, '10', 10, 7, '2017-05-02'),
(23, 11, 2, '9', 10, 7, '2017-12-09'),
(24, 9, 1, '9', 10, 9, '2017-12-09'),
(25, 11, 2, '10', 1, 10, '2017-12-09'),
(26, 11, 1, '7', 10, 7, '2017-12-20'),
(27, 10, 1, '6', 10, 7, '2017-12-05'),
(28, 11, 1, '9', 1, 10, '2017-11-14'),
(32, 9, 1, '10', 10, 9, '2018-02-12'),
(33, 9, 2, '9', 10, 6, '2018-02-12'),
(34, 9, 2, '9', 10, 8, '2018-02-12'),
(35, 9, 2, '9', 10, 7, '2018-02-12'),
(36, 9, 2, '9', 10, 9, '2018-02-12'),
(37, 10, 2, '8', 2, 4, '2018-02-12'),
(38, 10, 2, '9', 2, 6, '2018-02-12'),
(39, 10, 2, '10', 2, 8, '2018-02-12'),
(40, 10, 2, '9', 2, 7, '2018-02-12'),
(43, 10, 1, '1', 2, 9, '2018-02-14'),
(45, 10, 1, '9', 2, 8, '2018-02-14'),
(46, 10, 1, '9', 2, 6, '2018-02-14'),
(47, 10, 1, '10', 2, 4, '2018-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `parinti`
--

CREATE TABLE IF NOT EXISTS `parinti` (
  `id_parinte` int(10) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tel_contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parola` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_parinte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `parinti`
--

INSERT INTO `parinti` (`id_parinte`, `nume`, `prenume`, `email`, `tel_contact`, `parola`) VALUES
(1, 'Ionescu', 'Lucian', 'iolu@yahoo.com', '0741222333', '$2y$10$C7lv6j66.mBa75IUt.rZxuNxofXtYjSTk5ynD0KsK33ycY2rZreue'),
(2, 'Mihali', 'Grigore', 'migr@yahoo.com', '0751555888', '$2y$10$YWiYvedD9mIjqbyNmkZUou7Hq4TJMFgrS7l//xz9m4Q5/9pmk6cyW'),
(3, 'Pop', 'Stefan', 'post@yahoo.com', '0731321654', '$2y$10$fmeXBlZcSUGeoPok27V8aeQ8ra9wTimx14KSIhllw27TH4S5mEVLC'),
(4, 'Moldovan', 'David', 'moda@yahoo.com', '0752333999', '$2y$10$mGmHG7QEuGM5cXYE6NVI2e/gQGL6reLr9l4FkcdIfuIjTQuMD6WIC'),
(5, 'Silaghi', 'Roxana', 'siro@yahoo.com', '0758456000', '$2y$10$A9i3Juqn7FHCoBa4xz39IORF4M7xqjl5Kw9uBeT6U9EnSm.sa7Smq'),
(6, 'Lupsa', 'Natalia', 'luna@yahoo.com', '0755809700', '$2y$10$zhA7ZkN/XJHLeOaK1xTwV.9/Y2PhC076TxsVOi073xinMQ.1oCrqO'),
(7, 'Stefanescu', 'Narcis', 'stna@yahoo.com', '0740321005', '$2y$10$i88g2F.OrgP9i5/Zj3OATuWjYkPj4hVUm331ZtAbXvHuKMDFfx5Je'),
(8, 'Marian', 'Antonina', 'maan@yahoo.com', '0747830120', '$2y$10$XjQwsg44lVBpgFvBxArowe8P8XVO.2u.taL5LR1QsRDUSWY.0ikQe');

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE IF NOT EXISTS `profesori` (
  `id_profesor` int(10) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `materie` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parola` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id_profesor`, `nume`, `prenume`, `email`, `materie`, `parola`) VALUES
(1, 'Enescu', 'Victor', 'envi@yahoo.com', 'Matematica', '$2y$10$UNKB8dllnI6r8iYkF0briuObPjRY0DGCfmhZxc2BbZOoKOE0Nu4Xu'),
(2, 'Moldovan', 'Aurel', 'moau@yahoo.com', 'Istoria', '$2y$10$.Nu/T7G.KqexFQklCzF7kuNWTt1zDCeGzySdayaqhrLGxYwyNGNVe'),
(3, 'Calinescu', 'Daniela', 'cada@yahoo.com', 'Chimia', '$2y$10$Otxrv7QY5a5eBUg2YYljiOAujw2KLHNcA5phk6sgfrTs1ikd9Z9hW'),
(4, 'Muresan', 'Rebeca', 'mure@yahoo.com', 'Lb_Romana', '$2y$10$JjTlO7gd9h6wHxj8WiMp/ekQ.XwfcoewKfAPjnJ09DrzHaqgEkfB2'),
(5, 'Suciu', 'Andreea', 'suan@yahoo.com', 'Geografia', '$2y$10$h.mRRDztYVcZ7RMFUAJum.Yl/GTUQ2P3fAXKEvr8um0rGZZCqCOYu'),
(6, 'Barbu', 'Gheorghe', 'bagh@yahoo.com', 'Lb_Engleza', '$2y$10$xJ3Ya8OYDcjetn9JHke6/edbU8jVcvBykPANtuDvxDWU9cDz7a7fG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
