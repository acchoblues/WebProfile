-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jul 2016 pada 19.41
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kdu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`user_id` int(4) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `hp`, `gambar`) VALUES
(2, 'hakko', 'hakko', 'Hakko Bio Richard', '085694984803', 'gambar_admin/admin.jpg'),
(3, 'admin', 'admin', 'Administrator', '085694984803', 'gambar_admin/Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(300) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `isi` varchar(1500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tanggal`, `judul`, `kategori`, `isi`) VALUES
(1, '2016-05-22', 'Maintenance', 'Ducting', 'Maintenance Ducting Kitchen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bap`
--

CREATE TABLE IF NOT EXISTS `bap` (
  `ref_no` varchar(30) NOT NULL,
  `no_po` varchar(30) NOT NULL,
  `id_member` int(4) NOT NULL,
  `id_jenis` int(4) NOT NULL,
  `tgl_order` date NOT NULL,
  `lokasi` varchar(500) NOT NULL,
  `rincian` varchar(1000) NOT NULL,
  `pernyataan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bap`
--

INSERT INTO `bap` (`ref_no`, `no_po`, `id_member`, `id_jenis`, `tgl_order`, `lokasi`, `rincian`, `pernyataan`) VALUES
('255/BAP/CD/IV/16', 'PO12365489756', 1, 3, '2016-05-19', 'Cikarang', '            bla bla bla                  ', 'UD. Kencana Daya Utama telah melaksanakan pekerjaan terebut di atas sesuai standar. Unit tersebut di atas berada dalam keadaan baik, bersih dan siap pakai.'),
('256/BAP/12//45/16', 'PO123456789', 1, 1, '2016-05-17', 'Cikarang', 'belum selesai                                 ', 'pernyataan'),
('658/BC/458/as/49', 'PO5698754621', 3, 3, '2016-05-20', 'Lagoon', ' Dinding, Plafon dan lain lain                             ', '  UD. Kencana Daya Utama telah melaksanakan pekerjaan terebut di atas sesuai standar. Unit tersebut di atas berada dalam keadaan baik, bersih dan siap pakai.                               ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_surat`
--

CREATE TABLE IF NOT EXISTS `detail_surat` (
  `no_surat` varchar(30) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_surat`
--

INSERT INTO `detail_surat` (`no_surat`, `id_produk`, `qty`, `unit`) VALUES
('SJ001', 'Nozzle 1N', '2', 'Ea'),
('SJ001', 'Nozzle', '3', 'Ea'),
('SJ001', 'Nozzle 1N', '1', 'Pcs'),
('asas', 'Nozzle 1N', '1', 'Ea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `garansi`
--

CREATE TABLE IF NOT EXISTS `garansi` (
`id_garansi` int(4) NOT NULL,
  `id_member` int(4) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_expire` date NOT NULL,
  `masa` enum('1 Bulan','3 Bulan','6 Bulan','1 Tahun') NOT NULL,
  `status` enum('Active','Expire') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `garansi`
--

INSERT INTO `garansi` (`id_garansi`, `id_member`, `no_po`, `tgl_order`, `tgl_expire`, `masa`, `status`) VALUES
(2, 1, 'PO123456789', '2016-05-17', '2017-06-08', '1 Tahun', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_proyek`
--

CREATE TABLE IF NOT EXISTS `jadwal_proyek` (
`id_jadwal` int(4) NOT NULL,
  `id_jenis` int(4) NOT NULL,
  `id_member` int(4) NOT NULL,
  `id_teknisi` int(4) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tgl_proyek` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `report` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_proyek`
--

INSERT INTO `jadwal_proyek` (`id_jadwal`, `id_jenis`, `id_member`, `id_teknisi`, `no_po`, `tgl_proyek`, `tgl_selesai`, `report`, `status`) VALUES
(1, 1, 1, 1, 'PO123456789', '2016-05-17', '2016-05-18', 'silahkan di isi', 'Silahkan Di Isi'),
(3, 3, 1, 1, 'PO12365489756', '2016-05-19', '2016-05-20', '                                  silahkan di isi                                  ', 'Silahkan Di Isi'),
(4, 3, 3, 0, 'PO5698754621', '2016-05-20', '2016-05-27', 'silahkan di isi', 'Silahkan Di Isi'),
(5, 2, 3, 0, '032023', '2016-07-25', '2016-07-26', 'Silahkan Di Isi', 'Silahkan Di Isi'),
(6, 2, 4, 0, 'sasa', '2016-07-25', '2016-07-26', 'Silahkan Di Isi', 'Silahkan Di Isi'),
(7, 3, 3, 0, 'sasasasa', '2016-07-25', '2016-07-26', 'Silahkan Di Isi', 'Silahkan Di Isi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_survei`
--

CREATE TABLE IF NOT EXISTS `jadwal_survei` (
  `no_po` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `tanggal_order` date NOT NULL,
  `tanggal_survei` date NOT NULL,
  `id_member` int(10) NOT NULL,
  `id_jenis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
`id_jenis` int(4) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `pekerjaan`) VALUES
(1, 'Instalasi Ansul'),
(2, 'Maintenance Ansul'),
(3, 'Instalasi Ducting'),
(4, 'Maintenance Ducting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'sasa', 0, 'sasa@sasa.com', 'sas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id_member` int(4) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat`, `no_telp`, `email`, `username`, `password`, `gambar`) VALUES
(1, 'Batiqa Hotels', 'Jababeka Estate', 1122336654, 'batiqa@batiqa.com', 'batiqa', 'batiqa', '../admin/gambar_member/a.jpg'),
(3, 'Mercure Hotels', 'Jababeka Estate', 2147483647, 'mercure@mercurehotels.com', 'mercure', 'mercure', '../admin/gambar_member/b.jpg'),
(4, 'asasa', 'asasa', 111111, '', 'asasas', 'asasas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE IF NOT EXISTS `po` (
`id_order` int(10) NOT NULL,
  `no_po` varchar(30) NOT NULL,
  `id_jenis` int(4) NOT NULL,
  `id_member` int(4) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `rincian` varchar(600) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id_order`, `no_po`, `id_jenis`, `id_member`, `lokasi`, `rincian`, `unit`, `qty`, `harga`, `tgl_order`, `tgl_selesai`, `status`) VALUES
(4, 'PO123456789', 1, 1, 'Cikarang', 'belum selesai                                 ', 'ea', '1', 41000000, '2016-05-17', '2016-05-18', 'belum selesai'),
(6, 'PO12365489756', 3, 1, 'Cikarang', '            bla bla bla                  ', 'ea', '1', 1200000, '2016-05-19', '2016-05-20', 'Belum Bayar'),
(7, 'PO5698754621', 3, 3, 'Lagoon', ' Dinding, Plafon dan lain lain                             ', 'ea', '1', 12500000, '2016-05-20', '2016-05-27', 'Sedang dalam Pr'),
(8, '032023', 2, 3, 'sas', '           sasa                   ', 'ea', '1', 123456, '2016-07-25', '2016-07-26', 'belum'),
(9, 'sasa', 2, 4, 'sas', '           sa                   ', '1', '1', 12233435, '2016-07-25', '2016-07-26', 'belum'),
(10, 'sasasasa', 3, 3, 'sasasasa', '        sasa                      ', '1', '1', 111111, '2016-07-25', '2016-07-26', '2121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(4) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `unit`, `harga`) VALUES
(1, 'Nozzle 1N', 'Ea', '20000'),
(4, 'Nozzle', 'ea', '121212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalan`
--

CREATE TABLE IF NOT EXISTS `surat_jalan` (
  `no_surat` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `no_po` varchar(30) NOT NULL,
  `id_member` varchar(50) NOT NULL,
  `attention` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_jalan`
--

INSERT INTO `surat_jalan` (`no_surat`, `tanggal`, `no_po`, `id_member`, `attention`) VALUES
('asas', '2016-07-23', 'PO123456789', 'Mercure Hotels', 'asasa'),
('SJ001', '2016-05-22', 'PO123456789', 'Batiqa Hotels', 'Rudi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE IF NOT EXISTS `teknisi` (
`id_teknisi` int(4) NOT NULL,
  `nama_teknisi` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama_teknisi`, `alamat`, `hp`, `username`, `password`, `gambar`) VALUES
(1, 'niqoweb', 'niqoweb', 2147483647, 'niqoweb', 'niqoweb', '../admin/gambar_teknisi/Penguins.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary`
--

CREATE TABLE IF NOT EXISTS `temporary` (
  `no_surat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `id_member` varchar(50) NOT NULL,
  `attention` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
`id_testi` int(4) NOT NULL,
  `id_member` int(4) NOT NULL,
  `komentar` varchar(300) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `id_member`, `komentar`, `rating`) VALUES
(1, 1, 'sangat merekomendasikan kencana daya utama dalam setiap proyek                                ', '2'),
(2, 3, 'Mantap Pelayanan Prima', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `bap`
--
ALTER TABLE `bap`
 ADD PRIMARY KEY (`ref_no`);

--
-- Indexes for table `garansi`
--
ALTER TABLE `garansi`
 ADD PRIMARY KEY (`id_garansi`);

--
-- Indexes for table `jadwal_proyek`
--
ALTER TABLE `jadwal_proyek`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_survei`
--
ALTER TABLE `jadwal_survei`
 ADD PRIMARY KEY (`no_po`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
 ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
 ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
 ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
 ADD PRIMARY KEY (`id_testi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `garansi`
--
ALTER TABLE `garansi`
MODIFY `id_garansi` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal_proyek`
--
ALTER TABLE `jadwal_proyek`
MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
MODIFY `id_jenis` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id_member` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
MODIFY `id_teknisi` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
MODIFY `id_testi` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
