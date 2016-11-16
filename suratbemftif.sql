-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Nov 2016 pada 06.43
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratbemftif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `ID_DEPARTEMEN` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`ID_DEPARTEMEN`, `NAMA`, `KETERANGAN`) VALUES
(1, 'Internal Affairs', ''),
(2, 'External Affairs', ''),
(3, 'Student Resource Development', ''),
(4, 'Research and Technology Development', ''),
(5, 'Entrepreneurship', ''),
(6, 'Organization Student Responsibility', ''),
(7, 'Badan Koordinasi Pemandu', ''),
(8, 'Information Media', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `ID_JENIS` int(11) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `KODE` varchar(5) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`ID_JENIS`, `NAMA`, `KODE`, `KETERANGAN`) VALUES
(1, 'Surat Permintaan Kerjasama', 'SPK', ''),
(2, 'Surat Undangan', 'SU', ''),
(3, 'Surat Peminjaman', 'SPi', ''),
(4, 'Surat Keramaian', 'SKr', ''),
(5, 'Surat Permohonan', 'SPm', ''),
(6, 'Surat Keterangan', 'SKet', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `ID` int(11) NOT NULL,
  `ASAL` varchar(50) NOT NULL,
  `JENIS_SURAT` int(11) NOT NULL,
  `LINK` varchar(255) NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`ID`, `ASAL`, `JENIS_SURAT`, `LINK`, `KETERANGAN`) VALUES
(1, 'BEM FTK', 2, 'http://localhost/suratbemf/upload/eksternal/Internal Affairs/11056542_804169496363590_8889743721536821178_n.jpg', 'Surat undangan kajian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomor_surat`
--

CREATE TABLE `nomor_surat` (
  `ID` int(11) NOT NULL,
  `NOMOR_SURAT` int(11) NOT NULL,
  `ID_JENIS` int(11) NOT NULL,
  `ID_PROKER` int(11) NOT NULL,
  `BULAN` varchar(10) NOT NULL,
  `TAHUN` varchar(4) NOT NULL,
  `WAKTU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERNAME` varchar(50) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nomor_surat`
--

INSERT INTO `nomor_surat` (`ID`, `NOMOR_SURAT`, `ID_JENIS`, `ID_PROKER`, `BULAN`, `TAHUN`, `WAKTU`, `USERNAME`, `STATUS`) VALUES
(1, 1, 1, 0, '', '', '0000-00-00 00:00:00', '', 0),
(2, 2, 1, 0, 'XI', '2016', '2015-11-15 17:00:00', 'iabahagia', 0),
(3, 3, 1, 0, 'XI', '2016', '2015-11-15 17:00:00', 'iabahagia', 0),
(4, 4, 1, 0, 'XI', '2016', '2015-11-15 17:00:00', 'iabahagia', 0),
(5, 1, 2, 0, 'XI', '2016', '2015-11-15 17:00:00', 'iabahagia', 0),
(6, 2, 2, 0, 'XI', '2016', '2016-11-15 09:52:57', 'iabahagia', 0),
(7, 3, 2, 0, 'XI', '2016', '2016-11-15 09:55:19', 'iabahagia', 0),
(8, 4, 2, 0, 'XI', '2016', '2016-11-15 09:55:33', 'iabahagia', 0),
(9, 5, 2, 0, 'XI', '2016', '2016-11-15 09:56:47', 'iabahagia', 0),
(10, 6, 2, 0, 'XI', '2016', '2016-11-15 09:56:58', 'iabahagia', 0),
(11, 5, 1, 1, 'XI', '2016', '2016-11-15 10:17:11', 'iabahagia', 0),
(12, 6, 1, 1, 'XI', '2016', '2016-11-16 04:44:16', 'iabahagia', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_kerja`
--

CREATE TABLE `program_kerja` (
  `ID_PROKER` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `KODE_PROKER` varchar(20) NOT NULL,
  `ID_DEPARTEMEN` int(11) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_kerja`
--

INSERT INTO `program_kerja` (`ID_PROKER`, `NAMA`, `KODE_PROKER`, `ID_DEPARTEMEN`, `KETERANGAN`) VALUES
(0, 'Dies Natalis 56', 'DiesNatalis', 1, ''),
(1, 'Health and Care', 'HealthCare', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_eksternal`
--

CREATE TABLE `surat_eksternal` (
  `ID` int(11) NOT NULL,
  `ASAL` varchar(50) NOT NULL,
  `JENIS_SURAT` int(11) NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL,
  `LINK` varchar(255) NOT NULL,
  `ID_DEPARTEMEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_eksternal`
--

INSERT INTO `surat_eksternal` (`ID`, `ASAL`, `JENIS_SURAT`, `KETERANGAN`, `LINK`, `ID_DEPARTEMEN`) VALUES
(1, 'Untitled.png', 1, 'terbaik', 'http://localhost/suratbemf/upload/eksternal/Internal Affairs/11056542_804169496363590_8889743721536821178_n.jpg', 1),
(3, 'Untitled2.png', 1, 'terbaik', 'http://localhost/suratbemf/upload/eksternal/Internal Affairs/Untitled2.png', 0),
(4, 'diagram_kausatik.docx', 3, '', 'http://localhost/suratbemf/upload/eksternal/Internal Affairs/diagram_kausatik.docx', 0),
(5, '11056542_804169496363590_8889743721536821178_n.jpg', 2, '', 'http://localhost/suratbemf/upload/eksternal/Internal Affairs/diagram_kausatik.docx', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_surat`
--

CREATE TABLE `template_surat` (
  `ID` int(11) NOT NULL,
  `NAMA_FILE` varchar(50) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  `LINK` varchar(100) NOT NULL,
  `JENIS_SURAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `template_surat`
--

INSERT INTO `template_surat` (`ID`, `NAMA_FILE`, `KETERANGAN`, `LINK`, `JENIS_SURAT`) VALUES
(1, 'Surat Peminjaman', 'SPi', 'http://localhost/suratbemf/upload/template surat/Surat Peminjaman.docx', 3),
(2, 'Surat Undangan', 'SU', 'http://localhost/suratbemf/upload/template surat/Surat Undangan.docx', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ID_DEPARTEMEN` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `USERNAME`, `PASSWORD`, `ID_DEPARTEMEN`, `role`) VALUES
(1, 'putra', 'd56b699830e77ba53855679cb1d252da', 1, 1),
(2, 'iabahagia', '57e37359afcebea419723558f4d2cc1a', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`ID_DEPARTEMEN`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nomor_surat`
--
ALTER TABLE `nomor_surat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`ID_PROKER`);

--
-- Indexes for table `surat_eksternal`
--
ALTER TABLE `surat_eksternal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `template_surat`
--
ALTER TABLE `template_surat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `ID_DEPARTEMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nomor_surat`
--
ALTER TABLE `nomor_surat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `ID_PROKER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_eksternal`
--
ALTER TABLE `surat_eksternal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `template_surat`
--
ALTER TABLE `template_surat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
