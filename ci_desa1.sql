-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 07:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_desa1`
--

-- --------------------------------------------------------

--
-- Table structure for table `belum_menikah`
--

CREATE TABLE `belum_menikah` (
  `id_belum_menikah` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `tanggal_belum_menikah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cerai_mati`
--

CREATE TABLE `cerai_mati` (
  `id_cerai_mati` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `tanggal_cerai_mati` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `no_surat_rt` varchar(255) DEFAULT NULL,
  `tanggal_domisili` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menikah`
--

CREATE TABLE `menikah` (
  `id_menikah` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `tanggal_menikah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `nama_pejabat` varchar(255) NOT NULL,
  `jabatan_pejabat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `nama_pejabat`, `jabatan_pejabat`) VALUES
(1, 'SAHARI', 'Kepala Desa'),
(2, 'RAGIL AYU N.', 'Sekretaris Desa'),
(3, 'KARTONO', 'Kasi. Pemerintahan'),
(4, 'SUWARI', 'Kasi. Kesejahteraan'),
(5, 'RANGGA YOGA P.', 'Kasi. Pelayanan'),
(6, 'SUWARDI', 'Kaur. TU & Umum'),
(7, 'SUBANDI', 'Kaur. Keuangan'),
(8, 'DADY AGUS S.', 'Kaur. Perencanaan'),
(9, 'PUTUT DWI JATMIKO', 'Kepala Dusun Perning'),
(10, 'WAHYU S.', 'Kepala Dusun Seloguno'),
(11, 'M. IMAM KHOLIQ', 'Kepala Dusun Sumber Gondang'),
(12, 'NANDA IMELIANA, S.E.', 'Staf/Operator'),
(13, 'FRANKY HADI S.', 'Staf/Operator');

-- --------------------------------------------------------

--
-- Table structure for table `pemasangan_listrik`
--

CREATE TABLE `pemasangan_listrik` (
  `id_pemasangan_listrik` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `daya` varchar(128) DEFAULT NULL,
  `tanggal_pemasangan_listrik` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint(16) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `hubungan_keluarga` varchar(128) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status_perkawinan` varchar(128) NOT NULL,
  `kewarganegaraan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `keperluan_penghasilan` text DEFAULT NULL,
  `jumlah_penghasilan` int(11) NOT NULL,
  `tanggal_penghasilan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pindahdatang`
--

CREATE TABLE `pindahdatang` (
  `no_kk` bigint(20) NOT NULL,
  `nama_kepala_keluarga` varchar(128) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `alasan_pindah` varchar(100) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `jenis_pindah` varchar(100) NOT NULL,
  `klasifikasi_pindah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pkh`
--

CREATE TABLE `pkh` (
  `id` int(11) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama_kk` varchar(255) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `lansia` tinyint(1) NOT NULL,
  `anak_sekolah` tinyint(1) NOT NULL,
  `balita` tinyint(1) NOT NULL,
  `keputusan` enum('Layak','Tidak Layak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `keterangan` varchar(512) DEFAULT NULL,
  `tanggal_sktm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(11) NOT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_usaha` varchar(255) DEFAULT NULL,
  `sejak_usaha` varchar(4) NOT NULL,
  `tanggal_usaha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_petugas`, `level`) VALUES
('admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  ADD PRIMARY KEY (`id_belum_menikah`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD PRIMARY KEY (`id_cerai_mati`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `menikah`
--
ALTER TABLE `menikah`
  ADD PRIMARY KEY (`id_menikah`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `pemasangan_listrik`
--
ALTER TABLE `pemasangan_listrik`
  ADD PRIMARY KEY (`id_pemasangan_listrik`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `pindahdatang`
--
ALTER TABLE `pindahdatang`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `pkh`
--
ALTER TABLE `pkh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  MODIFY `id_belum_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasangan_listrik`
--
ALTER TABLE `pemasangan_listrik`
  MODIFY `id_pemasangan_listrik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pkh`
--
ALTER TABLE `pkh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2651;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  ADD CONSTRAINT `belum_menikah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `belum_menikah_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD CONSTRAINT `cerai_mati_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `cerai_mati_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `domisili`
--
ALTER TABLE `domisili`
  ADD CONSTRAINT `domisili_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `domisili_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `menikah`
--
ALTER TABLE `menikah`
  ADD CONSTRAINT `menikah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `menikah_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `pemasangan_listrik`
--
ALTER TABLE `pemasangan_listrik`
  ADD CONSTRAINT `pemasangan_listrik_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `pemasangan_listrik_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD CONSTRAINT `penghasilan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `penghasilan_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `sktm`
--
ALTER TABLE `sktm`
  ADD CONSTRAINT `sktm_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `sktm_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `usaha_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `pejabat` (`id_pejabat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
