-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2019 pada 08.27
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `kode` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `status` enum('Approved','Rejected','Pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`kode`, `nik`, `tanggal_awal`, `tanggal_akhir`, `jumlah`, `jenis_cuti`, `ket`, `status`) VALUES
('CT5185', '12132', '2018-06-29', '2018-06-29', '1', 'Cuti Khitan Anak', 'test', 'Approved'),
('CT5628', '10161', '2018-07-06', '2018-07-07', '2', 'Cuti Mendadak', 'test', 'Approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` varchar(10) NOT NULL,
  `nama_dept` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`) VALUES
('D4098', 'Accounting'),
('D5120', 'IT'),
('D5273', 'HRGA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tunjangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `tunjangan`) VALUES
('J2051', 'Supervisor', '350000'),
('J3066', 'Leader', '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id_cuti` varchar(10) NOT NULL,
  `nama_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id_cuti`, `nama_cuti`) VALUES
('VC3007', 'Cuti Khitan Anak'),
('VC3132', 'Cuti Mendadak'),
('VC6503', 'Cuti Melahirkan'),
('VC7268', 'Cuti Hamil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` enum('TETAP','PKWT','PKWTT') NOT NULL,
  `jumlah_cuti` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Superuser','User') NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tanggal_masuk`, `departemen`, `jabatan`, `status`, `jumlah_cuti`, `username`, `password`, `level`, `gambar`) VALUES
('10161', 'Hakko Bio Richard', '2018-04-21', 'IT', 'Supervisor', 'PKWTT', '6', 'hakko', 'fb92eb16a09ed530c91a0e17d9d61a7758754013', 'Admin', 'gambar_admin/5.jpg'),
('10222', 'testing', '2017-07-30', 'HRGA', 'Supervisor', 'TETAP', '0', 'test', 'c4033bff94b567a190e33faa551f411caef444f2', 'Admin', 'gambar_admin/4.jpg'),
('12132', 'test', '2018-06-01', 'Accounting', 'Supervisor', 'PKWTT', '9', 'test', 'c4033bff94b567a190e33faa551f411caef444f2', 'Admin', 'gambar_admin/4.jpg'),
('1232434', 'test', '2018-10-09', 'IT', 'Supervisor', 'PKWTT', '12', 'testing', '4c0d2b951ffabd6f9a10489dc40fc356ec1d26d5', 'Admin', 'gambar_admin/cuti.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
