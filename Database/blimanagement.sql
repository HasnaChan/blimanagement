-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 08:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blimanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `DivisiID` char(5) NOT NULL,
  `NamaDivisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`DivisiID`, `NamaDivisi`) VALUES
('D0001', 'Human Resources'),
('D0002', 'Marketing'),
('D0003', 'Accounting'),
('D0004', 'Research Development'),
('D0005', 'IT'),
('D0006', 'Front Office'),
('D0007', 'Bulding Maintenance'),
('D0008', 'Electricity'),
('D0009', 'Learning'),
('D0010', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `Karyawan` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DivisiID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordershuttle`
--

CREATE TABLE `ordershuttle` (
  `OrderID` int(11) NOT NULL,
  `ShuttleID` char(3) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalOrder` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `PengaduanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PICID` int(11) NOT NULL,
  `Perihal` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`PengaduanID`, `UserID`, `PICID`, `Perihal`) VALUES
(2, 1, 383, 'Mic di A802 tidak ada semua'),
(3, 1, 383, 'AC A802 tidak mau nyala'),
(4, 1, 383, 'Stop Contact A802 ada yang copot'),
(5, 1, 383, 'PPPPPPPPPPPPP lampu kedip kedip'),
(6, 1, 383, 'PPPPPPPPPPP WAIPAI MATII GABISA VALO!!!!'),
(9, 1, 383, 'lampu kedip'),
(11, 1, 382, 'spikernya rusak');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `PICID` int(11) NOT NULL,
  `PICBidang` varchar(15) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DivisiID` char(6) NOT NULL,
  `PICpicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`PICID`, `PICBidang`, `UserID`, `DivisiID`, `PICpicture`) VALUES
(382, 'PPTI', 1, 'D0001', 'hasna.jpg'),
(383, 'PPBP', 2, 'D0001', 'denio.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` varchar(6) NOT NULL,
  `NamaProgram` varchar(100) NOT NULL,
  `PICID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `NamaProgram`, `PICID`) VALUES
('09LA', 'PPTI 11', 382),
('09LB', 'PPTI 12', 382),
('09LC', 'PPTI 13', 382);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `ProgramID` varchar(10) NOT NULL,
  `ScheduleName` varchar(50) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Mulai` time NOT NULL,
  `selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `ProgramID`, `ScheduleName`, `Kelas`, `Tanggal`, `Mulai`, `selesai`) VALUES
(16, '09LB', 'Software Engineering', 'A802', '2023-02-16', '13:00:00', '14:30:00'),
(17, '09LB', 'Software Engineering', 'A802', '2023-02-16', '15:00:00', '16:30:00'),
(20, '09LB', 'CB: Kewarganegaraan', 'A801', '2023-02-15', '08:00:00', '09:30:00'),
(21, '09LB', 'Compilation Techniques', 'A802', '2023-02-16', '08:00:00', '09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `shuttle`
--

CREATE TABLE `shuttle` (
  `ShuttleID` char(3) NOT NULL,
  `driverID` char(5) DEFAULT NULL,
  `asal` varchar(30) NOT NULL,
  `Tujuan` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `PlatNomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shuttle`
--

INSERT INTO `shuttle` (`ShuttleID`, `driverID`, `asal`, `Tujuan`, `Tanggal`, `Waktu`, `PlatNomor`) VALUES
('A15', 'DR002', 'BLI', 'Wisma Asia', '2022-11-16', '17:00:00', 'B 3312 ILA'),
('A16', 'DR003', 'BLI', 'Gading Serpong', '2022-11-16', '17:00:00', 'B 1090 AFB'),
('A17', 'DR001', 'BLI', 'Alam Sutera', '2022-11-16', '17:30:00', 'B 8886 SSA'),
('A18', 'DR004', 'BLI', 'Bogor', '2022-11-16', '17:30:00', 'B 7847 WA'),
('A19', 'DR005', 'BLI', 'Bekasi', '2022-11-16', '17:30:00', 'B 520 ISS'),
('A20', 'DR001', 'Alam Sutera', 'BLI', '2022-11-17', '06:30:00', 'B 1283 OMT');

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `DriverID` char(5) NOT NULL,
  `NamaSopir` varchar(55) NOT NULL,
  `NIKDriver` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`DriverID`, `NamaSopir`, `NIKDriver`) VALUES
('DR001', 'Herman Sukanto', '5103051302900007'),
('DR002', 'Jason', '5102101102790004'),
('DR003', 'Suherman', '5103051212920010'),
('DR004', 'Bayu', '5103202801850006'),
('DR005', 'Aris Setiawan', '5103061809810008');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `TimelineID` int(11) NOT NULL,
  `PICID` int(11) NOT NULL,
  `Pengumuman` varchar(255) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`TimelineID`, `PICID`, `Pengumuman`, `Tanggal`, `Waktu`) VALUES
(12, 382, 'Selamat Pagi seluruh mahasiswa PPBP/PPTI yang saya banggakan', '2023-02-12', '11:20:49'),
(13, 383, 'Selamat Pagi Fellas, hari ini kalian akan registrasi sidik jari. Makasi y -Den', '2023-02-12', '11:28:55'),
(14, 383, 'Dears adik2... Menu paket untuk.besok （bisa.dimakan siang dan sore）adalah：   1. Paket nasi.uduk （isi ayam goreng bumbu , Tempe.asam.manis, toping telur dan bawang goreng dan sambel.kacang）@20k/porsi   2. Mie.Goreng Special @15k/porsi   Jika adik2 bersedia', '2023-02-12', '11:29:27'),
(15, 382, 'Dears adik2... Menu paket untuk.besok （bisa.dimakan siang dan sore）adalah：   1. Mie.Goreng Special @15k/porsi   Jika adik2 bersedia pesan , saya.harap.malam ini sdh info.agar saya siapkan bahan2nya, terima kasih 🙏', '2023-02-12', '11:30:48'),
(16, 383, 'KEDAI TERRACE LUPITA CATERING &amp; SNACK BOX  JL. SUNGAI MAMBRAMO NO 77  081211878683 / 081284093251   SABTU 11 FEBRUARI 2023  SPECIAL MENU :  ~ Nasi Udang Mayo - Chicken Karaage - Tumis Buncis : 20k', '2023-02-12', '11:31:15'),
(18, 382, 'selamat pagi', '2023-02-14', '20:37:37'),
(20, 382, 'assalamualaikum', '2023-02-14', '21:29:12'),
(22, 382, 'halooooo', '2023-02-15', '13:53:46'),
(24, 382, 'hi hi hi', '2023-02-15', '15:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `traineemahasiswa`
--

CREATE TABLE `traineemahasiswa` (
  `TraineeMhsID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProgramID` varchar(6) NOT NULL,
  `NIP` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `UserStatus` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Nama`, `UserStatus`, `Email`, `Password`, `CPassword`) VALUES
(1, 'Hasna Salsabilla Abdullah', 'PIC', 'HasnaSalsabilla@gmail.com', '$2y$10$IcQyIJQERFvWLIINgZTvuux7M6..4AqXw0p15oACzHxxJCgF9Qy66', '$2y$10$IcQyIJQERFvWLIINgZTvuux7M6..4AqXw0p15oACzHxxJCgF9Qy66'),
(2, 'I Putu Denio Pranatha R', 'PIC', 'PutuDenio@gmail.com', '$2y$10$y5CtCH1afKBPr2WVW55uUeRK3wcZQ7r5GH64lwQc6ls5ITFxfaPp6', '$2y$10$y5CtCH1afKBPr2WVW55uUeRK3wcZQ7r5GH64lwQc6ls5ITFxfaPp6'),
(3, 'Nandatama Bagus Adisaka', 'PIC', 'BagusAdisaka@gmail.com', '$2y$10$bPrQRDEe8enhkG.4D6KxjusAo.SgdMSzkUuSmCla0IbEkdMeQdcze', '$2y$10$bPrQRDEe8enhkG.4D6KxjusAo.SgdMSzkUuSmCla0IbEkdMeQdcze'),
(4, 'William Suryadharma Pangestu', 'PIC', 'WilliamSurya@gmail.com', '$2y$10$qVAUozBMsl9x8BnbaGnjmuIyRxseptkNIvNHvM5136gw6KsGZkKXi', '$2y$10$qVAUozBMsl9x8BnbaGnjmuIyRxseptkNIvNHvM5136gw6KsGZkKXi'),
(5, 'Winita Teukeku Priyanto', 'PIC', 'WinitaPriyanto@gmail.com', '$2y$10$C7SX/m8svYoClll6/Nul1Os4sHtb7FpPHCmmoX58breX5MEaKfAra', '$2y$10$C7SX/m8svYoClll6/Nul1Os4sHtb7FpPHCmmoX58breX5MEaKfAra'),
(6, 'Adzani Cempaka Sari', 'Trainer', 'AdzaniCempaka@gmail.com', '$2y$10$FOyLjvq7nmVeSiyFAM4oRO.wOoC78iK7.Ejz6Om2/6vVqmXbgoiTW', '$2y$10$FOyLjvq7nmVeSiyFAM4oRO.wOoC78iK7.Ejz6Om2/6vVqmXbgoiTW'),
(7, 'Ivan Halim Parmonangan', 'Trainer', 'IvanHalim@gmail.com', '$2y$10$c/SQk1rtzaBRqIb6lwKuBeuAm.HxDUdFYdBh7MMP3PCRCN8Yekd/O', '$2y$10$c/SQk1rtzaBRqIb6lwKuBeuAm.HxDUdFYdBh7MMP3PCRCN8Yekd/O'),
(8, 'Fredy Poernomo', 'Trainer', 'FredyPoernomo@gmail.com', '$2y$10$1JNZL63tcJA1QJTCuuLkduUIyyxgybYfhwHTm5rDmfpwFzKKkEqxe', '$2y$10$1JNZL63tcJA1QJTCuuLkduUIyyxgybYfhwHTm5rDmfpwFzKKkEqxe'),
(9, 'Maria Susan Saragih', 'Trainer', 'SusanSaragih@gmail.com', '$2y$10$3Xs8IT4yLnm79UR0dosvEeMJaJCL089hqXK1qjhwhPl4Vn8XDnsWi', '$2y$10$3Xs8IT4yLnm79UR0dosvEeMJaJCL089hqXK1qjhwhPl4Vn8XDnsWi'),
(10, 'Ayuliana Budiman', 'Trainer', 'Ayuliana@gmail.com', '$2y$10$eg/tGrM.Qyo0PBewJAcjJ./0YwqwvXg4ROeyPdhpDZza6kdFXNSL.', '$2y$10$eg/tGrM.Qyo0PBewJAcjJ./0YwqwvXg4ROeyPdhpDZza6kdFXNSL.'),
(11, 'Chrystalia Glenys Winata Ang', 'Mahasiswa', 'GlenysAng@gmail.com', '$2y$10$ZPSPkOPxs3g2j4uLFxaEc.hbjNkZRGyANOlexCdz01u7FIcK79ZRC', '$2y$10$ZPSPkOPxs3g2j4uLFxaEc.hbjNkZRGyANOlexCdz01u7FIcK79ZRC'),
(12, 'Vanessa Kwandinata', 'Mahasiswa', 'VanessaKwan@gmail.com', '$2y$10$vlyyZreQjseBDjlhz4Yt9.YM0npwQSgPIdJLSeKR2zvS8sdTnXUNa', '$2y$10$vlyyZreQjseBDjlhz4Yt9.YM0npwQSgPIdJLSeKR2zvS8sdTnXUNa'),
(13, 'Ni Putu Intan Paramitha Marchila Audy Dewi', 'Mahasiswa', 'PutuIntan@gmail.com', '$2y$10$BI4nqRiup46dZ33qu9k6veYW9549uJu.vBzx.PrzLOYhZpyZHd8We', '$2y$10$BI4nqRiup46dZ33qu9k6veYW9549uJu.vBzx.PrzLOYhZpyZHd8We'),
(14, 'Nadya Clarine Purba', 'Mahasiswa', 'NadyaClarine@gmail.com', '$2y$10$mmQloI8hRznVxc3hsUHjI.VLdG4Fwj3HXcZ88V.0gmxCuK8hWAxXK', '$2y$10$mmQloI8hRznVxc3hsUHjI.VLdG4Fwj3HXcZ88V.0gmxCuK8hWAxXK'),
(15, 'Jefferson Johan', 'Mahasiswa', 'JeffersonJohan@gmail.com', '$2y$10$VVtDpws2Iawg3dakW5.uEOHyU347/LUQk2qb77eK5Jo5kh/NS1rJa', '$2y$10$VVtDpws2Iawg3dakW5.uEOHyU347/LUQk2qb77eK5Jo5kh/NS1rJa'),
(16, 'PIC', 'PIC', 'pic@gmail.com', '$2y$10$FP1fQIxyAIlLfelDSaAAZev3M/Msex32ZnMmHYhYoWmx0FGA0Dg5a', '$2y$10$FP1fQIxyAIlLfelDSaAAZev3M/Msex32ZnMmHYhYoWmx0FGA0Dg5a'),
(17, 'Anonimus', 'Trainee', 'Anonimus@gmail.com', '$2y$10$Sk8Lb5wnz7IbMQXabGGJZ.ekrSJ3j49yhw6JQtdm3fCRa/nerG32.', '$2y$10$Sk8Lb5wnz7IbMQXabGGJZ.ekrSJ3j49yhw6JQtdm3fCRa/nerG32.');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `VisitorID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProgramID` varchar(6) NOT NULL,
  `NIK` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`DivisiID`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`Karyawan`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `DivisiID` (`DivisiID`);

--
-- Indexes for table `ordershuttle`
--
ALTER TABLE `ordershuttle`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ShuttleID` (`ShuttleID`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`PengaduanID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PICID` (`PICID`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`PICID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `DivisiID` (`DivisiID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`),
  ADD KEY `PICID` (`PICID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `ProgramID` (`ProgramID`);

--
-- Indexes for table `shuttle`
--
ALTER TABLE `shuttle`
  ADD PRIMARY KEY (`ShuttleID`),
  ADD KEY `DriverID` (`driverID`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`DriverID`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`TimelineID`),
  ADD KEY `PICID` (`PICID`);

--
-- Indexes for table `traineemahasiswa`
--
ALTER TABLE `traineemahasiswa`
  ADD PRIMARY KEY (`TraineeMhsID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProgramID` (`ProgramID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UC_email` (`Email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`VisitorID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProgramID` (`ProgramID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordershuttle`
--
ALTER TABLE `ordershuttle`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `PengaduanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `TimelineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `VisitorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`DivisiID`) REFERENCES `divisi` (`DivisiID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordershuttle`
--
ALTER TABLE `ordershuttle`
  ADD CONSTRAINT `ordershuttle_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordershuttle_ibfk_2` FOREIGN KEY (`ShuttleID`) REFERENCES `shuttle` (`ShuttleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`PICID`) REFERENCES `pic` (`PICID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pic`
--
ALTER TABLE `pic`
  ADD CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pic_ibfk_2` FOREIGN KEY (`DivisiID`) REFERENCES `divisi` (`DivisiID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`PICID`) REFERENCES `pic` (`PICID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `timeline_ibfk_1` FOREIGN KEY (`PICID`) REFERENCES `pic` (`PICID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traineemahasiswa`
--
ALTER TABLE `traineemahasiswa`
  ADD CONSTRAINT `traineemahasiswa_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traineemahasiswa_ibfk_2` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_ibfk_2` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
