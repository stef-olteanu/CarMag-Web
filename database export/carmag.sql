-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 08:21 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carmag`
--

-- --------------------------------------------------------

--
-- Table structure for table `autoturisme`
--

CREATE TABLE `autoturisme` (
  `ID` int(11) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Pret` int(11) NOT NULL,
  `An_Fabricatie` int(11) NOT NULL,
  `Kilometri` int(11) NOT NULL,
  `Caroserie` varchar(100) NOT NULL,
  `Capacitate_Cilindrica` int(11) NOT NULL,
  `Putere` int(11) NOT NULL,
  `Cutie_Viteze` varchar(100) NOT NULL,
  `Transmisie` varchar(100) NOT NULL,
  `Combustibil` varchar(100) NOT NULL,
  `Stoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autoturisme`
--

INSERT INTO `autoturisme` (`ID`, `Marca`, `Model`, `Pret`, `An_Fabricatie`, `Kilometri`, `Caroserie`, `Capacitate_Cilindrica`, `Putere`, `Cutie_Viteze`, `Transmisie`, `Combustibil`, `Stoc`) VALUES
(1, 'Lamborghini', 'Urus', 225000, 2018, 1200, 'SUV', 6000, 650, 'Automata', 'Integrala', '', 1),
(2, 'Aston', 'Martin', 125000, 2019, 1500, 'Coupe', 3000, 350, 'Automata', 'Spate', '', 0),
(3, 'Aston', 'Martin', 125000, 2019, 1500, 'Coupe', 3000, 350, 'Automata', 'Spate', '', 0),
(4, 'Mercedes-Benz', 'G Class', 200000, 2019, 1500, 'SUV', 3000, 350, 'Automata', 'Fata', '', 0),
(5, 'Lamborghini', 'Huracan', 25000, 2004, 200000, 'Coupe', 2500, 700, 'Automata', 'Integrala', '', 0),
(6, 'Audi', 'RS7', 500000, 2019, 20000, 'Coupe', 3000, 600, 'Automata', 'Integrala', '', 0),
(7, 'Rolls-Royce', 'Wrait', 900000, 2019, 1500, 'Coupe', 6000, 800, 'Automata', 'Integrala', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carduri`
--

CREATE TABLE `carduri` (
  `ID` int(11) NOT NULL,
  `ID_Detinator` int(11) NOT NULL,
  `NumarCard` varchar(100) NOT NULL,
  `CCV` varchar(100) NOT NULL,
  `Suma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carduri`
--

INSERT INTO `carduri` (`ID`, `ID_Detinator`, `NumarCard`, `CCV`, `Suma`) VALUES
(5, 1, '714468', '229', 275000),
(6, 2, '806315', '336', 275000);

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `ID` int(11) NOT NULL,
  `ID_utilizator` int(11) NOT NULL,
  `ID_produs` int(11) NOT NULL,
  `Cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`ID`, `ID_utilizator`, `ID_produs`, `Cantitate`) VALUES
(2, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plati`
--

CREATE TABLE `plati` (
  `ID` int(11) NOT NULL,
  `Id_Utilizator` int(11) NOT NULL,
  `Suma` int(11) NOT NULL,
  `Judet` varchar(100) NOT NULL,
  `Localitate` varchar(100) NOT NULL,
  `Adresa` varchar(1000) NOT NULL,
  `Data_Tranzactie` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plati`
--

INSERT INTO `plati` (`ID`, `Id_Utilizator`, `Suma`, `Judet`, `Localitate`, `Adresa`, `Data_Tranzactie`) VALUES
(1, 1, 225000, 'Bucuresti', 'Bucuresti', 'Academia Tehnica Militara', '2019/05/13'),
(2, 2, 225000, 'N/a', 'n/a', 'n/a', '2019/05/13');

-- --------------------------------------------------------

--
-- Table structure for table `pozeauto`
--

CREATE TABLE `pozeauto` (
  `ID` int(11) NOT NULL,
  `ID_Auto` int(11) NOT NULL,
  `Poza1` varchar(1000) NOT NULL,
  `Poza2` varchar(1000) NOT NULL,
  `Poza3` varchar(1000) NOT NULL,
  `Poza4` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pozeauto`
--

INSERT INTO `pozeauto` (`ID`, `ID_Auto`, `Poza1`, `Poza2`, `Poza3`, `Poza4`) VALUES
(1, 1, '../Images/urus.jpg', '../Images/urusback.jpg', '../Images/urusinterior.jpg', '../Images/urusside.jpg'),
(2, 2, '../Images/aston.jpg', '../Images/astonback.jpg', '../Images/astoninterior.jpg', '../Images/astonside.jpg'),
(3, 2, '../Images/aston.jpg', '../Images/astonback.jpg', '../Images/astoninterior.jpg', '../Images/astonside.jpg'),
(4, 4, '../Images/g.jpg', '../Images/gback.jpg', '../Images/ginterior.jpg', '../Images/gside.jpg'),
(5, 5, '../Images/lambo.jpg', '../Images/lamboback.jpg', '../Images/lambointerior.jpg', '../Images/lamboside.jpg'),
(6, 6, '../Images/rs7.jpg', '../Images/rs7back.jpg', '../Images/rs7interior.jpg', '../Images/rs7side.jpg'),
(7, 7, '../Images/wraith.jpg', '../Images/wraithback.jpg', '../Images/wraithinterior.jpg', '../Images/wraithside.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `Id_Utilizator` int(11) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Prenume` varchar(100) NOT NULL,
  `Varsta` int(11) NOT NULL,
  `Numar_Telefon` varchar(100) NOT NULL,
  `Judet` varchar(100) NOT NULL,
  `Localitate` varchar(100) NOT NULL,
  `Adresa` varchar(1000) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Parola` varchar(1000) NOT NULL,
  `Rank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`Id_Utilizator`, `Nume`, `Prenume`, `Varsta`, `Numar_Telefon`, `Judet`, `Localitate`, `Adresa`, `Mail`, `Parola`, `Rank`) VALUES
(1, 'Olteanu', 'Stefan', 20, '0731332675', 'Bucuresti', 'Bucuresti', 'Academia Tehnica Militara', 'stfn_olteanu@yahoo.com', '$2y$10$jMxLPf6cecYJSzo/1i8WUuqQ61Rm4npkz3Nm2YGcoOKLEFas0Xhy.', 'admin'),
(2, 'Popescu', 'Stefan', 0, '0731332676', 'N/a', 'n/a', 'n/a', 'stef@yahoo.com', '$2y$10$wfFTOKW.BWrIlwSsLUJPK.Dao0WcsvDjhEymMPcJi.7WbzNHy9qBe', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoturisme`
--
ALTER TABLE `autoturisme`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `carduri`
--
ALTER TABLE `carduri`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Detinator` (`ID_Detinator`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_utilizator` (`ID_utilizator`),
  ADD KEY `ID_produs` (`ID_produs`);

--
-- Indexes for table `plati`
--
ALTER TABLE `plati`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Id_Utilizator` (`Id_Utilizator`);

--
-- Indexes for table `pozeauto`
--
ALTER TABLE `pozeauto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_AUTO` (`ID_Auto`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`Id_Utilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autoturisme`
--
ALTER TABLE `autoturisme`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carduri`
--
ALTER TABLE `carduri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plati`
--
ALTER TABLE `plati`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pozeauto`
--
ALTER TABLE `pozeauto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `Id_Utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carduri`
--
ALTER TABLE `carduri`
  ADD CONSTRAINT `carduri_ibfk_1` FOREIGN KEY (`ID_Detinator`) REFERENCES `utilizatori` (`Id_Utilizator`);

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`ID_utilizator`) REFERENCES `utilizatori` (`Id_Utilizator`),
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`ID_produs`) REFERENCES `autoturisme` (`ID`);

--
-- Constraints for table `plati`
--
ALTER TABLE `plati`
  ADD CONSTRAINT `plati_ibfk_1` FOREIGN KEY (`Id_Utilizator`) REFERENCES `utilizatori` (`Id_Utilizator`);

--
-- Constraints for table `pozeauto`
--
ALTER TABLE `pozeauto`
  ADD CONSTRAINT `pozeauto_ibfk_1` FOREIGN KEY (`ID_AUTO`) REFERENCES `autoturisme` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
