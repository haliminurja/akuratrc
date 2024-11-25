-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 05:30 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbakurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int NOT NULL,
  `id_kategori` int DEFAULT NULL,
  `id_petugas` int DEFAULT NULL,
  `judul` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `foto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` smallint UNSIGNED NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri_foto`
--

CREATE TABLE `tb_galeri_foto` (
  `id_foto` int NOT NULL,
  `id_petugas` int NOT NULL,
  `judul_foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_galeri_foto`
--

INSERT INTO `tb_galeri_foto` (`id_foto`, `id_petugas`, `judul_foto`, `foto`, `deskripsi`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'coba 1', '2024112514374.jpg', 'coba 1 2 3', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri_video`
--

CREATE TABLE `tb_galeri_video` (
  `id_video` int NOT NULL,
  `id_petugas` int NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_galeri_video`
--

INSERT INTO `tb_galeri_video` (`id_video`, `id_petugas`, `judul`, `deskripsi`, `link`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'D\'Masiv - Merindukanmu', 'AKU ingat kaauu selalu adaaaaaaaa', 'e86Whn8TaMg', 'y', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_header`
--

CREATE TABLE `tb_header` (
  `id_header` int NOT NULL,
  `id_petugas` int NOT NULL,
  `pesan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_header`
--

INSERT INTO `tb_header` (`id_header`, `id_petugas`, `pesan`, `deskripsi`, `foto`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Menemukan Tren, Membentuk Strategi dan Mendorong Pertumbuhan Melalui Periklanan', 'Mengungkap tren terkini dan menyediakan wawasan berbasis data, kami membantu organisasi merancang strategi yang efektif dan mendorong pertumbuhan berk', '2024112514517.png', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_jabatan`
--

CREATE TABLE `tb_jenis_jabatan` (
  `id_jenis_jabatan` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jenis_jabatan`
--

INSERT INTO `tb_jenis_jabatan` (`id_jenis_jabatan`, `id_petugas`, `nama_jabatan`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Komisaris', 'y', NULL, NULL),
(2, 1, 'Direktur Utama', 'y', NULL, NULL),
(3, 1, 'Direktur', 'y', NULL, NULL),
(4, 1, 'Wakil Direktur', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_layanan`
--

CREATE TABLE `tb_jenis_layanan` (
  `id_jenis_layanan` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama_layanan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jenis_layanan`
--

INSERT INTO `tb_jenis_layanan` (`id_jenis_layanan`, `id_petugas`, `nama_layanan`, `deskripsi`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Layanan Riset', 'Menyediakan jasa untuk membantu individu dan organisasi dalam merancang, melaksanakan, dan menganalisis survei untuk mengumpulkan data dari responden.', 'y', NULL, NULL),
(2, 1, 'Layanan Strategi', 'Menyediakan solusi untuk membantu individu dan organisasi, termasuk strategi personal branding untuk membangun citra diri, strategi kampanye pemilu un', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_berita`
--

CREATE TABLE `tb_kategori_berita` (
  `id_kategori` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori_berita`
--

INSERT INTO `tb_kategori_berita` (`id_kategori`, `id_petugas`, `nama_kategori`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Kategori Berita 1', 'y', NULL, NULL),
(2, 1, 'Kategori Berita 2', 'y', NULL, NULL),
(3, 1, 'Kategori Berita 3', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int NOT NULL,
  `id_petugas` int NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `id_petugas`, `alamat`, `maps`, `email`, `telp`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Juanda Regency blok DD-12, Dabean, Pabean, Sedati, Sidoarjo Regency, East Java 61253', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7913.740681526787!2d112.766755!3d-7.368427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e50564f1e649%3A0x4fea490616af9b2d!2sGrha%20Askara!5e0!3m2!1sid!2sid!4v1732512113380!5m2!1sid!2sid', '-', '-', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id_layanan` int NOT NULL,
  `id_jenis_layanan` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama_layanan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`id_layanan`, `id_jenis_layanan`, `id_petugas`, `nama_layanan`, `deskripsi`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 1, 'SURVEI', '-', 'y', NULL, NULL),
(2, 1, 1, 'QUICK COUNT', '-', 'y', NULL, NULL),
(3, 1, 1, 'RISET MEDIA', '-', 'y', NULL, NULL),
(4, 1, 1, 'RISET DIGITAL', '-', 'y', NULL, NULL),
(5, 1, 1, 'RISET PASAR', '-', 'y', NULL, NULL),
(6, 1, 1, 'RISET KUALITATIF', '-', 'y', NULL, NULL),
(7, 2, 1, 'Strategi Personal Branding', '-', 'y', NULL, NULL),
(8, 2, 1, 'Strategi Kampanye Pemilu', '-', 'y', NULL, NULL),
(9, 2, 1, 'Strategi Kebijakan Marketing', '-', 'y', NULL, NULL),
(10, 2, 1, 'Strategi Kampanye Media', '-', 'y', NULL, NULL),
(11, 2, 1, 'Strategi Kampanye Digital', '-', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan_mitra`
--

CREATE TABLE `tb_layanan_mitra` (
  `id_layanan_mitra` int NOT NULL,
  `id_mitra` int NOT NULL,
  `id_layanan` int NOT NULL,
  `id_petugas` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` datetime NOT NULL,
  `status` enum('p','s','b') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_misi`
--

CREATE TABLE `tb_misi` (
  `id_misi` int NOT NULL,
  `id_visi` int NOT NULL,
  `id_petugas` int NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_misi`
--

INSERT INTO `tb_misi` (`id_misi`, `id_visi`, `id_petugas`, `deskripsi`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 1, 'Melaksanakan penelitian yang objektif, inovatif, dan berdasarkan metodologi yang teruji, dengan tujuan menghasilkan data dan analisis yang akurat.', 'y', NULL, NULL),
(2, 1, 1, 'Menyediakan hasil riset yang dapat diandalkan bagi pemerintah, sektor swasta, dan lembaga masyarakat untuk pengambilan keputusan yang informatif dan t', 'y', NULL, NULL),
(3, 1, 1, 'Mengembangkan kemampuan dan keterampilan peneliti melalui pelatihan, kolaborasi, dan pengembangan teknologi riset mutakhir.', 'y', NULL, NULL),
(4, 1, 1, 'Menyebarkan hasil riset secara luas melalui publikasi ilmiah, seminar, dan kerja sama dengan media untuk meningkatkan pemahaman masyarakat terhadap is', 'y', NULL, NULL),
(5, 1, 1, 'Menjalin hubungan dengan lembaga akademik, pemerintah, dan organisasi internasional untuk memperluas jaringan riset dan bertukar pengetahuan.', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mitra`
--

CREATE TABLE `tb_mitra` (
  `id_mitra` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama_mitra` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_mitra` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_mitra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_mitra` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mitra`
--

INSERT INTO `tb_mitra` (`id_mitra`, `id_petugas`, `nama_mitra`, `alamat_mitra`, `kabupaten`, `deskripsi_mitra`, `foto_mitra`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Universitas Nurul jadid', 'Jl. PP Nurul Jadid, Dusun Tj. Lor, Karanganyar, Kec. Paiton, Kabupaten Probolinggo, Jawa Timur 67291', 'Probolinggo', '-', '2024112539303.png', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int NOT NULL,
  `nama_petugas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `alamat`, `telp`, `email`, `username`, `password`, `status`, `create_at`, `update_at`) VALUES
(1, 'Ahmad Halimi', 'Kraksaaan - Probolinggo - Jawa Timur - Indonesia', '082244867448', 'ahmadhalimi@unuja.ac.id', 'halimi', '$2y$12$KCjquee0G8rPWm/JX0J9Qe4nitqjsztZOeFGkE2DihdNi6vb0gYkS', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sejarah`
--

CREATE TABLE `tb_sejarah` (
  `id_sejarah` int NOT NULL,
  `id_petugas` int NOT NULL,
  `deskripsi_sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sejarah`
--

INSERT INTO `tb_sejarah` (`id_sejarah`, `id_petugas`, `deskripsi_sejarah`, `tahun`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Mengungkap tren terkini dan menyediakan wawasan berbasis data, kami membantu organisasi merancang strategi yang efektif dan mendorong pertumbuhan berkelanjutan melalui riset yang akurat dan andal, disesuaikan dengan tantangan serta tujuan spesifik', '2024', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_struktur`
--

CREATE TABLE `tb_struktur` (
  `id_struktur` int NOT NULL,
  `id_jenis_jabatan` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ig` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_struktur`
--

INSERT INTO `tb_struktur` (`id_struktur`, `id_jenis_jabatan`, `id_petugas`, `nama`, `alamat`, `telp`, `email`, `fb`, `ig`, `foto`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 1, 'M. Noer Fadli Hidayat, M.Kom', '-', '-', '-', '-', '-', '2024112571613.jpg', 'y', NULL, NULL),
(2, 2, 1, 'Dr. H. Chusnul Mualli, M.Pd', '-', '-', '-', '-', '-', '2024112555906.jpg', 'y', NULL, NULL),
(3, 3, 1, 'Zainal Arifin, M.Kom', '-', '-', '-', '-', '-', '2024112571623.jpg', 'y', NULL, NULL),
(4, 4, 1, 'Dr. Ahmad Fawaid, M.Th.I', '-', '-', '-', '-', '-', '2024112561436.jpg', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_visi`
--

CREATE TABLE `tb_visi` (
  `id_visi` int NOT NULL,
  `id_petugas` int NOT NULL,
  `deskripsi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_awal` year NOT NULL,
  `tahun_akhir` year NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_visi`
--

INSERT INTO `tb_visi` (`id_visi`, `id_petugas`, `deskripsi`, `tahun_awal`, `tahun_akhir`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Menjadi pusat penelitian terkemuka yang menghasilkan riset berkualitas tinggi dan akurat untuk mendukung pengambilan keputusan yang berdampak positif bagi masyarakat, pemerintah, dan sektor swasta', '2024', '2029', 'y', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `idkategoriberita_idx` (`id_kategori`),
  ADD KEY `idpetugas4_idx` (`id_petugas`);

--
-- Indexes for table `tb_galeri_foto`
--
ALTER TABLE `tb_galeri_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `idpetugas7_idx` (`id_petugas`);

--
-- Indexes for table `tb_galeri_video`
--
ALTER TABLE `tb_galeri_video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `idpetugas10_idx` (`id_petugas`);

--
-- Indexes for table `tb_header`
--
ALTER TABLE `tb_header`
  ADD PRIMARY KEY (`id_header`),
  ADD KEY `idpetugas12_idx` (`id_petugas`);

--
-- Indexes for table `tb_jenis_jabatan`
--
ALTER TABLE `tb_jenis_jabatan`
  ADD PRIMARY KEY (`id_jenis_jabatan`),
  ADD KEY `idpetugas_idx` (`id_petugas`);

--
-- Indexes for table `tb_jenis_layanan`
--
ALTER TABLE `tb_jenis_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`),
  ADD KEY `idpetugas2_idx` (`id_petugas`);

--
-- Indexes for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `idpetugas5_idx` (`id_petugas`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `idpetugas8_idx` (`id_petugas`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `idjenislayanan_idx` (`id_jenis_layanan`),
  ADD KEY `idpetugas11_idx` (`id_petugas`);

--
-- Indexes for table `tb_layanan_mitra`
--
ALTER TABLE `tb_layanan_mitra`
  ADD PRIMARY KEY (`id_layanan_mitra`),
  ADD KEY `id_layanan1_idx` (`id_layanan`),
  ADD KEY `id_petugas1_idx` (`id_petugas`),
  ADD KEY `id_mitra1_idx` (`id_mitra`);

--
-- Indexes for table `tb_misi`
--
ALTER TABLE `tb_misi`
  ADD PRIMARY KEY (`id_misi`),
  ADD KEY `idvisi_idx` (`id_visi`),
  ADD KEY `idpetugas13_idx` (`id_petugas`);

--
-- Indexes for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD KEY `idpetugas1_idx` (`id_petugas`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  ADD PRIMARY KEY (`id_sejarah`),
  ADD KEY `idpetugas3_idx` (`id_petugas`);

--
-- Indexes for table `tb_struktur`
--
ALTER TABLE `tb_struktur`
  ADD PRIMARY KEY (`id_struktur`),
  ADD KEY `idjenisjabatan_idx` (`id_jenis_jabatan`),
  ADD KEY `idpetugas6_idx` (`id_petugas`);

--
-- Indexes for table `tb_visi`
--
ALTER TABLE `tb_visi`
  ADD PRIMARY KEY (`id_visi`),
  ADD KEY `idpetugas9_idx` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_galeri_foto`
--
ALTER TABLE `tb_galeri_foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_galeri_video`
--
ALTER TABLE `tb_galeri_video`
  MODIFY `id_video` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_header`
--
ALTER TABLE `tb_header`
  MODIFY `id_header` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenis_jabatan`
--
ALTER TABLE `tb_jenis_jabatan`
  MODIFY `id_jenis_jabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis_layanan`
--
ALTER TABLE `tb_jenis_layanan`
  MODIFY `id_jenis_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_layanan_mitra`
--
ALTER TABLE `tb_layanan_mitra`
  MODIFY `id_layanan_mitra` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_misi`
--
ALTER TABLE `tb_misi`
  MODIFY `id_misi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id_mitra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  MODIFY `id_sejarah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_struktur`
--
ALTER TABLE `tb_struktur`
  MODIFY `id_struktur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_visi`
--
ALTER TABLE `tb_visi`
  MODIFY `id_visi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `idkategoriberita` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori_berita` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idpetugas4` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_galeri_foto`
--
ALTER TABLE `tb_galeri_foto`
  ADD CONSTRAINT `idpetugas7` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_galeri_video`
--
ALTER TABLE `tb_galeri_video`
  ADD CONSTRAINT `idpetugas10` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_header`
--
ALTER TABLE `tb_header`
  ADD CONSTRAINT `idpetugas12` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jenis_jabatan`
--
ALTER TABLE `tb_jenis_jabatan`
  ADD CONSTRAINT `idpetugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jenis_layanan`
--
ALTER TABLE `tb_jenis_layanan`
  ADD CONSTRAINT `idpetugas2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD CONSTRAINT `idpetugas5` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD CONSTRAINT `idpetugas8` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD CONSTRAINT `idjenislayanan` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `tb_jenis_layanan` (`id_jenis_layanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idpetugas11` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_layanan_mitra`
--
ALTER TABLE `tb_layanan_mitra`
  ADD CONSTRAINT `id_layanan1` FOREIGN KEY (`id_layanan`) REFERENCES `tb_layanan` (`id_layanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_mitra1` FOREIGN KEY (`id_mitra`) REFERENCES `tb_mitra` (`id_mitra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_petugas1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_misi`
--
ALTER TABLE `tb_misi`
  ADD CONSTRAINT `idpetugas13` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idvisi` FOREIGN KEY (`id_visi`) REFERENCES `tb_visi` (`id_visi`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD CONSTRAINT `idpetugas1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  ADD CONSTRAINT `idpetugas3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_struktur`
--
ALTER TABLE `tb_struktur`
  ADD CONSTRAINT `idjenisjabatan` FOREIGN KEY (`id_jenis_jabatan`) REFERENCES `tb_jenis_jabatan` (`id_jenis_jabatan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idpetugas6` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_visi`
--
ALTER TABLE `tb_visi`
  ADD CONSTRAINT `idpetugas9` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
