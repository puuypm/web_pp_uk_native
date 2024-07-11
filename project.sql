-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 11:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(30) NOT NULL,
  `nama_gelombang` varchar(100) NOT NULL,
  `aktif` tinyint(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `aktif`, `created_at`, `updated_at`) VALUES
(5, 'Angkatan 4', 0, '2024-06-28 18:40:31', '2024-06-29 16:29:52'),
(7, 'Angkatan 4', 1, '2024-06-28 18:48:05', '2024-06-29 16:29:19'),
(9, 'Angkatan 3', 1, '2024-06-29 03:50:32', '2024-06-29 16:29:14'),
(11, 'Angkatan 2', 1, '2024-06-29 03:57:58', '2024-06-29 16:29:09'),
(12, 'Angkatan 3', 0, '2024-06-29 06:42:39', '2024-06-29 16:29:05'),
(13, 'Angkatan 2', 0, '2024-06-29 06:42:44', '2024-06-29 16:29:00'),
(19, 'Angkatan 1', 1, '2024-06-29 08:26:06', '2024-06-29 16:28:49'),
(20, 'Angkatan 1', 0, '2024-06-29 16:29:32', '2024-06-29 16:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(30) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Operator Komputer', '2024-06-29 16:22:10', '2024-06-29 16:24:38'),
(2, 'Bahasa Inggris', '2024-06-29 16:24:47', '2024-07-08 04:27:12'),
(3, 'Desain Grafis', '2024-06-29 16:24:54', '2024-07-08 04:27:28'),
(4, 'Tata Boga', '2024-06-29 16:25:00', '2024-07-08 04:27:35'),
(5, 'Tata Busana', '2024-06-29 16:25:05', '2024-07-08 04:27:39'),
(6, 'Tata Graha', '2024-06-29 16:25:09', '2024-07-08 04:27:45'),
(7, 'Teknik Pendingin', '2024-06-29 16:25:14', '2024-07-08 04:27:50'),
(8, 'Teknik Komputer', '2024-06-29 16:25:19', '2024-07-08 04:27:56'),
(9, 'Otomotif Sepeda Motor', '2024-06-29 16:25:23', '2024-07-08 04:28:03'),
(10, 'Jaringan Komputer', '2024-06-29 16:25:27', '2024-07-08 04:28:07'),
(11, 'Barista', '2024-06-29 16:25:31', '2024-07-08 04:28:11'),
(12, 'Bahasa Korea', '2024-06-29 16:25:35', '2024-07-08 04:28:14'),
(13, 'Make Up Artist', '2024-06-29 16:25:39', '2024-07-08 04:28:26'),
(14, 'Video Editor', '2024-06-29 16:25:42', '2024-07-08 04:28:30'),
(15, 'Content Creator', '2024-06-29 16:25:46', '2024-07-08 04:28:35'),
(16, 'Web Programming', '2024-06-29 16:25:49', '2024-07-08 04:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(30) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin Pelatihan', '2024-06-29 06:41:28', '2024-07-08 05:09:46'),
(2, 'Peserta', '2024-06-29 07:02:05', '2024-07-08 05:09:52'),
(3, 'Administrator', '2024-06-29 16:32:46', '2024-07-08 05:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `id` int(30) NOT NULL,
  `id_jurusan` int(50) NOT NULL,
  `id_gelombang` int(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan_terakhir` varchar(200) NOT NULL,
  `nama_sekolah` varchar(300) NOT NULL,
  `kejuruan` varchar(300) NOT NULL,
  `nomor_hp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aktivitas_saat_ini` varchar(500) NOT NULL,
  `status` tinyint(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id`, `id_jurusan`, `id_gelombang`, `nama_lengkap`, `nik`, `kartu_keluarga`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `nama_sekolah`, `kejuruan`, `nomor_hp`, `email`, `aktivitas_saat_ini`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 0, 'Galileo', '757853529554', '745758656868', 'Laki-laki', 'Depok', '2013-02-05', 'SMA', 'Gedung Bertingkat', 'Desain Grafis', '081286896986', 'galileo@gmail.com', 'Pegawai', 1, '2024-07-06 19:14:10', '2024-07-08 16:44:22'),
(7, 15, 3, 'Doni', '123456789101112', '524687464351651', 'Laki-laki', 'Solo', '1992-03-25', 'SMA', 'SMAN 34 SOLO', 'Content Creator', '081256994458', 'don1@gmail.com', 'Siswa', 3, '2024-07-08 02:12:34', '2024-07-08 16:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `id_level` int(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `nama_lengkap`, `email`, `password`, `created_at`, `updated_at`) VALUES
(9, 3, 'Donno', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2024-07-08 02:07:32', '2024-07-08 05:34:56'),
(10, 1, 'Kasino', 'pelatihan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2024-07-08 02:08:55', '2024-07-08 05:33:06'),
(11, 2, 'Indro', 'siswa@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2024-07-08 02:09:11', '2024-07-08 05:35:01'),
(18, 2, 'Lala', 'admin123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-07-09 09:36:34', '2024-07-09 09:36:34'),
(19, 1, 'susi', 'susi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-07-09 09:37:59', '2024-07-09 09:37:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_level_` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_level_` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
