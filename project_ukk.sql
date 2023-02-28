-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2023 at 11:35 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ukk`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllKelas` ()   BEGIN
SELECT * FROM kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPetugas` ()   BEGIN
SELECT * FROM petugas WHERE level = 'petugas';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllSiswa` ()   BEGIN
SELECT * FROM siswa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllSpp` ()   BEGIN
SELECT * FROM spp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBulanBayar` (IN `in_nisn` INT)   BEGIN
SELECT bulan_bayar FROM pembayaran WHERE nisn = in_nisn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getHistoryByNISN` (IN `in_nisn` INT)   BEGIN
SELECT * FROM pembayaran 
	LEFT JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
    LEFT JOIN spp ON pembayaran.id_spp = spp.id_spp
    WHERE nisn = in_nisn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPetugas` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(25))   BEGIN
SELECT * FROM petugas WHERE username = in_username && password = in_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPetugasById` (IN `in_id_petugas` INT)   BEGIN
SELECT * FROM petugas WHERE id_petugas = in_id_petugas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswa` (IN `in_nis` CHAR(100), IN `in_nisn` CHAR(100))   BEGIN
SELECT * FROM siswa WHERE nis = in_nis && nisn = in_nisn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswaByNisn` (IN `in_nisn` CHAR(10))   BEGIN
SELECT * FROM infoSiswa WHERE nisn = in_nisn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusKelas` (IN `in_id_kelas` INT)   BEGIN
DELETE FROM kelas WHERE id_kelas = in_id_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPembayaran` (IN `in_id_pembayaran` INT)   BEGIN
DELETE FROM pembayaran WHERE id_pembayaran = in_id_pembayaran;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPetugas` (IN `in_id_petugas` INT)   BEGIN
DELETE FROM petugas WHERE id_petugas = in_id_petugas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusSiswa` (IN `in_nisn` CHAR(10))   BEGIN
DELETE FROM siswa WHERE nisn = in_nisn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusSpp` (IN `in_id_spp` INT)   BEGIN
DELETE FROM spp WHERE id_spp = in_id_spp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertKelas` (IN `in_nama_kelas` VARCHAR(10), IN `in_kompetensi_keahlian` VARCHAR(50))   BEGIN
INSERT INTO kelas VALUES(NULL, in_nama_kelas, in_kompetensi_keahlian);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPembayaran` (IN `in_id_petugas` INT, IN `in_nisn` VARCHAR(10), IN `in_tgl_bayar` DATE, IN `in_bulan_bayar` INT(8), IN `in_tahun_bayar` INT(10), IN `in_id_spp` INT)   BEGIN
INSERT INTO pembayaran VALUES(NULL, in_id_petugas, in_nisn, in_tgl_bayar, in_bulan_bayar, in_tahun_bayar, in_id_spp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPetugas` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(25), IN `in_nama` VARCHAR(100), IN `in_level` ENUM('admin','petugas'))   BEGIN
INSERT INTO petugas VALUES(NULL, in_username, in_password, in_nama, in_level);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSiswa` (IN `in_nisn` CHAR(10), IN `in_nis` CHAR(8), IN `in_nama` VARCHAR(35), IN `in_id_kelas` INT, IN `in_alamat` TEXT, IN `in_no_telp` VARCHAR(13), IN `in_id_spp` INT)   BEGIN
INSERT INTO siswa VALUES(in_nisn, in_nis, in_nama, in_id_kelas, in_alamat, in_no_telp, in_id_spp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSpp` (IN `in_tahun` INT, IN `in_nominal` INT)   BEGIN
INSERT INTO spp VALUES(NULL, in_tahun, in_nominal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateKelas` (IN `in_id_kelas` INT, IN `in_nama_kelas` VARCHAR(10), IN `in_kompetensi_keahlian` VARCHAR(50))   BEGIN
UPDATE kelas SET nama_kelas = in_nama_kelas, kompetensi_keahlian = in_kompetensi_keahlian WHERE id_kelas = in_id_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePembayaran` (IN `in_id_pembayaran` INT, IN `in_id_petugas` INT, IN `in_nisn` INT, IN `in_tgl_bayar` DATE, IN `in_bulan_bayar` INT(10), IN `in_tahun_bayar` INT(10), IN `in_id_spp` INT)   BEGIN
UPDATE pembayaran SET id_petugas = in_id_petugas,
					nisn = in_nisn,
                    tgl_bayar = in_tgl_bayar,
                    bulan_bayar = in_bulan_bayar,
                    tahun_bayar = in_tahun_bayar,
                    id_spp = in_id_spp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePetugas` (IN `in_id_petugas` INT, IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(25), IN `in_nama` VARCHAR(100), IN `in_level` ENUM('admin','petugas'))   BEGIN
UPDATE petugas SET username = in_username, password = in_password, nama = in_nama, level = in_level WHERE id_petugas = in_id_petugas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSiswa` (IN `in_nisn` CHAR(10), IN `in_nis` CHAR(8), IN `in_nama` VARCHAR(35), IN `in_id_kelas` INT, IN `in_alamat` TEXT, IN `in_no_telp` VARCHAR(13), IN `in_id_spp` INT)   BEGIN
UPDATE siswa SET nis = in_nis, nama = in_nama, id_kelas = in_id_kelas, alamat = in_alamat, no_telp = in_no_telp, id_spp = in_id_spp WHERE nisn = in_nisn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSpp` (IN `in_id_spp` INT, IN `in_tahun` INT, IN `in_nominal` INT)   BEGIN
UPDATE spp SET tahun = in_tahun, nominal = in_nominal WHERE id_spp = in_id_spp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `infosiswa`
-- (See below for the actual view)
--
CREATE TABLE `infosiswa` (
`nisn` char(10)
,`nis` char(8)
,`nama` varchar(35)
,`id_kelas` int(11)
,`alamat` text
,`no_telp` varchar(13)
,`id_spp` int(11)
,`spp` int(11)
,`tahun` int(11)
,`nominal` int(11)
,`kelas` int(11)
,`nama_kelas` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'XII RPL 2', 'Teknik Komputer dan Informatika'),
(2, 'XII RPL 1', 'Teknik Komputer dan Informatika'),
(5, 'XII MM 1', 'Teknik Komputer dan Informatika'),
(6, 'XII MM 2', 'Teknik Komputer dan Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` int(11) NOT NULL,
  `tahun_bayar` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_bayar`, `tahun_bayar`, `id_spp`) VALUES
(1, 2, '123131', '2023-02-27', 7, 2020, 1),
(2, 2, '123131', '2023-02-27', 8, 2020, 1),
(3, 2, '123131', '2023-02-27', 9, 2020, 1),
(4, 2, '123131', '2023-02-27', 10, 2020, 1),
(5, 2, '123131', '2023-02-27', 11, 2020, 1),
(6, 2, '123131', '2023-02-27', 12, 2020, 1),
(7, 2, '231231', '2023-02-27', 7, 2020, 1),
(8, 2, '231231', '2023-02-27', 8, 2020, 1),
(9, 2, '231231', '2023-02-27', 11, 2020, 1),
(10, 2, '231231', '2023-02-27', 12, 2020, 1),
(11, 2, '231231', '2023-02-27', 4, 2020, 1),
(12, 2, '231231', '2023-02-27', 5, 2020, 1),
(13, 3, '123131', '2023-02-28', 1, 2020, 1),
(14, 3, '123131', '2023-02-28', 5, 2020, 1),
(15, 3, '231231', '2023-02-28', 1, 2020, 1),
(16, 3, '231231', '2023-02-28', 3, 2020, 1),
(17, 3, '231231', '2023-02-28', 6, 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `level`) VALUES
(2, 'tutamirney451', '1234567', 'I Ketut Amirs', 'admin'),
(3, 'udinkurniawan123', '987654321', 'I Putu Asep Udin Kurniawan', 'petugas'),
(5, 'yudikkun123', '123', 'Yudi Anggara', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('123131', '21312', 'Ken Aroks', 1, 'Jalan Kori Agung No. 46, Sading', '3131112', 1),
('231231', '31213', 'Ken Bagus Adikusumo', 1, 'Jl. Kori Agung No. 32, Sading', '08193721312', 1),
('2312321', '31231', 'Ken Jatikusumo', 1, '12313', '081247363', 1),
('2313112', '312331', 'Eka Pradipa Nata', 1, 'Jalan Sugriwa', '1231321', 1),
('4321', '4312', 'Rabu Senin', 6, 'Jl. Raya Puputan', '1238211', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2020, 1000000),
(2, 2022, 1200000);

-- --------------------------------------------------------

--
-- Structure for view `infosiswa`
--
DROP TABLE IF EXISTS `infosiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `infosiswa`  AS SELECT `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`id_kelas` AS `id_kelas`, `siswa`.`alamat` AS `alamat`, `siswa`.`no_telp` AS `no_telp`, `siswa`.`id_spp` AS `id_spp`, `spp`.`id_spp` AS `spp`, `spp`.`tahun` AS `tahun`, `spp`.`nominal` AS `nominal`, `kelas`.`id_kelas` AS `kelas`, `kelas`.`nama_kelas` AS `nama_kelas` FROM ((`siswa` left join `kelas` on((`siswa`.`id_kelas` = `kelas`.`id_kelas`))) left join `spp` on((`siswa`.`id_spp` = `spp`.`id_spp`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_6` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
