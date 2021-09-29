-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 06:05 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nip` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `ket` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `nip`, `tgl`, `jam`, `jam_pulang`, `ket`) VALUES
('2103040001', '123', '2021-03-04', '07:58:00', '16:00:00', ''),
('2103060001', '123', '2021-03-06', '09:36:00', '17:00:00', ''),
('2103060002', '123', '2021-03-06', '09:37:00', '15:00:00', ''),
('2103070001', '456', '2021-03-07', '04:42:00', '05:26:00', ''),
('2103070002', '123', '2021-03-07', '08:02:00', '15:12:00', ''),
('2103080001', '789', '2021-03-08', '08:37:00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` varchar(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `tgl_mulai`, `tgl_selesai`, `nip`, `jenis_cuti`, `ket`) VALUES
('CTI-2103060001', '2021-03-10', '2021-03-16', '123', 'Cuti Sakit', 'Sakit Tipes'),
('CTI-2103080001', '2021-03-08', '2021-03-11', '789', 'Cuti Alasan Penting', 'Tes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin`
--

CREATE TABLE `tb_izin` (
  `id_izin` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jam_keluar` time NOT NULL,
  `ket` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_izin`
--

INSERT INTO `tb_izin` (`id_izin`, `nip`, `tgl`, `jam_keluar`, `ket`) VALUES
('IZN-2103060001', '123', '2021-03-04', '10:03:00', 'Menjemput Anak'),
('IZN-2103070001', '456', '2021-03-07', '23:20:00', 'Mengambil Ijazah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerja`
--

CREATE TABLE `tb_kerja` (
  `id` int(11) NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerja`
--

INSERT INTO `tb_kerja` (`id`, `jam_datang`, `jam_pulang`) VALUES
(1, '08:30:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(150) CHARACTER SET latin1 NOT NULL,
  `jk` varchar(10) CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 NOT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(350) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `jk`, `no_telp`, `jabatan`, `alamat`) VALUES
('123', 'Oman Syahrul', 'laki-laki', '081393131130', 'Pegawai', 'Jln. Sultan Adam, No.24'),
('456', 'Aulia Rahmawati', 'perempuan', '081393131130', 'Kasubag', 'Jln. Samudera, Komp. Permai, No.12'),
('789', 'Ahmad Saidillah', 'laki-laki', '08115012131', 'Pegawai', 'Jln. Ahmad Yani, Komp. Dharma Praja, No.31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_terlambat`
--

CREATE TABLE `tb_terlambat` (
  `id_terlambat` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jam_kerja` time NOT NULL,
  `jam_datang` time NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_terlambat`
--

INSERT INTO `tb_terlambat` (`id_terlambat`, `nip`, `tgl`, `jam_kerja`, `jam_datang`, `ket`) VALUES
('T-2103060001', '123', '2021-03-06', '08:30:00', '09:36:00', ''),
('T-2103080001', '789', '2021-03-08', '08:30:00', '08:37:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin , 2:wp	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `tb_absensi` (`nip`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_kerja`
--
ALTER TABLE `tb_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_terlambat`
--
ALTER TABLE `tb_terlambat`
  ADD PRIMARY KEY (`id_terlambat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

--
-- Constraints for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD CONSTRAINT `tb_cuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

--
-- Constraints for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD CONSTRAINT `tb_izin_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

--
-- Constraints for table `tb_terlambat`
--
ALTER TABLE `tb_terlambat`
  ADD CONSTRAINT `tb_terlambat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
