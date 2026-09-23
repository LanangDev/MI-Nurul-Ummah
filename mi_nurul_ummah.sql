-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2026 at 07:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mi_nurul_ummah`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id_ekstrakurikuler` int NOT NULL,
  `nama_ekstrakurikuler` varchar(100) NOT NULL,
  `pembina` varchar(100) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `nama_ekstrakurikuler`, `pembina`, `hari`, `waktu`, `tempat`, `keterangan`, `foto`, `status`, `created_at`) VALUES
(1, 'Volly', 'Jibran', 'Jumat', '15.00 - 17.00', 'Lapangan Volly Sekolah', '', 'ekstra_1787117585.png', 'Aktif', '2026-08-19 05:33:05'),
(2, 'Sepak Bola', 'Ricardo ', 'Sabtu', '15.00 - 17.00', 'Lapangan Sekolah', '', 'ekstra_1789430169.png', 'Aktif', '2026-09-14 23:56:09'),
(3, 'Paskibra ', 'Wahyu ', 'Jumat', '14.00 - 18.00', 'Lapangan Sekolah', '', 'ekstra_1789430796.png', 'Aktif', '2026-09-14 23:59:35'),
(4, 'Pramuka Ambalan', 'Rohim', 'Sabtu', '13.00 - 15.00', 'Lapangan Sekolah', '', 'ekstra_1789431182.png', 'Aktif', '2026-09-15 00:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `jumlah` int DEFAULT '1',
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') DEFAULT 'Baik',
  `keterangan` text,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `jumlah`, `kondisi`, `keterangan`, `foto`, `created_at`) VALUES
(1, 'Ruang Kelas', 5, 'Baik', 'Ruang Belajar', '94fa3f09d9786801769474ed154b7d7e.png', '2026-08-19 04:46:39'),
(2, 'Ruang Guru', 2, 'Baik', '', '8c0c7afc91dfdafd5f6fda86616cd593.png', '2026-09-01 06:39:09'),
(3, 'Lapangan Sekolah', 1, 'Baik', '', '2314b3d7617cf78643360bacb2dcd07d.png', '2026-09-15 00:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int NOT NULL,
  `judul_kegiatan` varchar(150) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul_kegiatan`, `tanggal`, `lokasi`, `deskripsi`, `foto`, `created_at`) VALUES
(1, 'Mural Sekolah', '2026-08-17', '', 'Membuat Mural Dengan Tema Cita-Cita Murid', 'galeri_1787145262.jpg', '2026-08-19 13:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nuptk` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `mata_pelajaran` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `status_kepegawaian` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nip`, `nuptk`, `jenis_kelamin`, `jabatan`, `mata_pelajaran`, `pendidikan_terakhir`, `status_kepegawaian`, `foto`, `status`, `created_at`) VALUES
(1, 'Ricardo', '12345', '123456', 'Laki-laki', 'Guru', 'Roblox', 'S3', 'PNS', '20260819032132.jpg', 'Aktif', '2026-08-19 03:04:16'),
(2, 'Bima', '0101010101', '0101010101', 'Laki-laki', 'Guru', 'Efotball', 'S3', 'PNS', '20260914235155.jpg', 'Aktif', '2026-08-19 03:19:35'),
(3, 'Fajri', '0108090706', '01008090706', 'Laki-laki', 'Guru', 'Matematika', 'S3', 'PNS', '20260914235308.jpg', 'Aktif', '2026-09-14 23:53:08'),
(4, 'Jibran', '123456789', '0123456789', 'Laki-laki', 'Guru', 'PS', 'S3', 'PNS', '20260914235433.jpg', 'Aktif', '2026-09-14 23:54:33'),
(5, 'Mikael', '00098762', '00963579875', 'Laki-laki', 'Guru', 'PPLG', 'S3', 'PNS', '20260915113511.jpg', 'Tidak Aktif', '2026-09-15 11:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_prestasi`
--

CREATE TABLE `kategori_prestasi` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_prestasi`
--

INSERT INTO `kategori_prestasi` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `jam_operasional` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `youtube` varchar(250) NOT NULL,
  `tiktok` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_sekolah`, `alamat`, `telepon`, `email`, `website`, `facebook`, `instagram`, `whatsapp`, `jam_operasional`, `created_at`, `youtube`, `tiktok`) VALUES
(1, 'Madrasah Ibtidaiyah Nurul Ummah', 'Kalimas Bangsri RT 001 RW 001, Kec. Karangpandan, Kab. Karanganyar, Prov. Jawa Tengah.', '085786003543', 'minurma2017@gmail.com', 'https://MI_Nurul_Ummah.sch.id', 'https://www.facebook.com/share/1CLT2HVpym/', 'https://instagram.com/nurulummahmi', '085786003543', 'Senin - Sabtu ( 07.00 - 13.30 WIB )', '2026-08-19 13:30:59', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int NOT NULL,
  `id_user` int NOT NULL,
  `aktivitas` enum('Online','Offline') NOT NULL,
  `waktu` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu`) VALUES
(1, 3, 'Offline', '2026-08-18 08:23:59'),
(2, 3, 'Online', '2026-08-18 08:24:05'),
(3, 3, 'Offline', '2026-08-18 08:39:24'),
(4, 3, 'Online', '2026-08-18 08:39:29'),
(5, 3, 'Offline', '2026-08-18 09:01:34'),
(6, 3, 'Online', '2026-08-18 09:20:00'),
(7, 3, 'Offline', '2026-08-18 09:20:04'),
(8, 3, 'Online', '2026-08-18 09:22:39'),
(9, 3, 'Offline', '2026-08-18 10:20:08'),
(10, 3, 'Online', '2026-08-18 17:38:04'),
(11, 3, 'Offline', '2026-08-18 17:38:27'),
(15, 3, 'Online', '2026-08-18 19:23:45'),
(16, 3, 'Offline', '2026-08-18 20:22:45'),
(17, 3, 'Online', '2026-08-18 20:55:00'),
(18, 3, 'Offline', '2026-08-18 21:47:08'),
(19, 3, 'Online', '2026-08-18 21:49:08'),
(20, 3, 'Online', '2026-08-19 05:57:52'),
(21, 3, 'Offline', '2026-08-19 06:47:54'),
(22, 3, 'Online', '2026-08-19 06:51:20'),
(23, 3, 'Offline', '2026-08-19 07:58:06'),
(24, 3, 'Online', '2026-08-23 23:13:29'),
(26, 3, 'Online', '2026-08-25 21:07:53'),
(27, 3, 'Offline', '2026-08-25 21:09:17'),
(28, 3, 'Online', '2026-08-30 07:37:20'),
(29, 3, 'Offline', '2026-08-30 07:37:29'),
(30, 2, 'Online', '2026-08-30 07:37:38'),
(31, 2, 'Offline', '2026-08-30 07:53:09'),
(32, 3, 'Online', '2026-08-30 08:46:20'),
(33, 3, 'Offline', '2026-08-30 09:11:53'),
(34, 3, 'Online', '2026-08-30 09:35:27'),
(35, 3, 'Online', '2026-08-31 21:30:12'),
(36, 3, 'Offline', '2026-08-31 21:30:30'),
(37, 3, 'Online', '2026-08-31 23:06:03'),
(38, 3, 'Offline', '2026-08-31 23:06:29'),
(39, 3, 'Online', '2026-08-31 23:12:44'),
(40, 3, 'Offline', '2026-08-31 23:26:57'),
(41, 2, 'Online', '2026-08-31 23:27:05'),
(42, 2, 'Offline', '2026-08-31 23:35:03'),
(43, 3, 'Online', '2026-08-31 23:35:10'),
(44, 3, 'Offline', '2026-08-31 23:39:15'),
(45, 3, 'Online', '2026-08-31 23:40:09'),
(46, 3, 'Offline', '2026-08-31 23:41:54'),
(47, 2, 'Online', '2026-08-31 23:42:00'),
(48, 2, 'Offline', '2026-08-31 23:42:45'),
(49, 2, 'Online', '2026-08-31 23:45:48'),
(50, 2, 'Offline', '2026-08-31 23:59:07'),
(51, 3, 'Online', '2026-09-01 06:00:29'),
(52, 3, 'Offline', '2026-09-01 06:00:53'),
(53, 2, 'Online', '2026-09-01 06:01:01'),
(54, 2, 'Offline', '2026-09-01 06:01:09'),
(55, 3, 'Online', '2026-09-14 07:14:06'),
(56, 3, 'Offline', '2026-09-14 07:23:45'),
(57, 2, 'Online', '2026-09-14 07:23:58'),
(58, 2, 'Offline', '2026-09-14 07:25:44'),
(59, 2, 'Online', '2026-09-14 07:25:52'),
(60, 2, 'Offline', '2026-09-14 07:29:51'),
(61, 3, 'Online', '2026-09-14 07:30:00'),
(62, 3, 'Offline', '2026-09-14 08:46:43'),
(63, 2, 'Online', '2026-09-14 08:46:51'),
(64, 2, 'Offline', '2026-09-14 08:55:07'),
(65, 3, 'Online', '2026-09-14 16:50:16'),
(66, 3, 'Offline', '2026-09-14 17:01:28'),
(67, 3, 'Online', '2026-09-14 17:01:46'),
(68, 3, 'Offline', '2026-09-14 17:17:00'),
(69, 3, 'Online', '2026-09-14 17:18:37'),
(70, 3, 'Offline', '2026-09-14 17:19:20'),
(71, 3, 'Online', '2026-09-15 00:00:07'),
(72, 3, 'Offline', '2026-09-15 00:00:42'),
(73, 3, 'Online', '2026-09-15 04:22:21'),
(74, 3, 'Offline', '2026-09-15 04:23:12'),
(75, 3, 'Online', '2026-09-15 04:26:07'),
(76, 3, 'Offline', '2026-09-15 04:30:56'),
(77, 3, 'Online', '2026-09-15 04:33:58'),
(78, 3, 'Offline', '2026-09-15 04:35:31'),
(79, 3, 'Online', '2026-09-15 04:47:17'),
(80, 3, 'Offline', '2026-09-15 04:51:05'),
(81, 3, 'Online', '2026-09-16 07:43:22'),
(82, 3, 'Offline', '2026-09-16 07:44:50'),
(83, 3, 'Online', '2026-09-20 23:41:52'),
(84, 3, 'Offline', '2026-09-20 23:45:05'),
(85, 3, 'Online', '2026-09-21 18:07:07'),
(86, 3, 'Offline', '2026-09-21 18:08:37'),
(87, 2, 'Online', '2026-09-21 18:08:50'),
(88, 2, 'Offline', '2026-09-21 18:11:01'),
(89, 3, 'Online', '2026-09-21 18:11:10'),
(90, 3, 'Offline', '2026-09-21 18:11:39'),
(91, 3, 'Online', '2026-09-21 18:13:15'),
(92, 3, 'Offline', '2026-09-21 18:20:45'),
(93, 3, 'Online', '2026-09-21 18:21:09'),
(94, 3, 'Offline', '2026-09-21 18:25:30'),
(95, 3, 'Online', '2026-09-21 18:27:06'),
(96, 3, 'Offline', '2026-09-21 18:35:28'),
(97, 3, 'Online', '2026-09-21 18:54:13'),
(98, 3, 'Offline', '2026-09-21 18:59:43'),
(99, 3, 'Online', '2026-09-21 21:18:54'),
(100, 3, 'Offline', '2026-09-21 21:19:31'),
(101, 3, 'Online', '2026-09-21 21:19:46'),
(102, 3, 'Offline', '2026-09-21 21:20:24'),
(103, 3, 'Online', '2026-09-21 21:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `tanggal`, `isi`, `foto`, `created_at`) VALUES
(1, 'Upacara 17 Agustus 2026', '2026-08-17', 'Memperingati hari kemerdekan republik indonesia ke 81 ', 'pengumuman_1787145630.jpg', '2026-08-19 13:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id_ppdb` int NOT NULL,
  `foto` varchar(250) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `tahun_ajaran` int NOT NULL,
  `nomor_kordinator` varchar(250) NOT NULL,
  `nama_kordinator` varchar(250) NOT NULL,
  `status` enum('Buka','Tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id_ppdb`, `foto`, `judul`, `tahun_ajaran`, `nomor_kordinator`, `nama_kordinator`, `status`) VALUES
(1, '20260830164852.jpg', 'Peneriman Murid Baru', 2026, '08995260967', 'Bpk.Kaka', 'Tutup'),
(2, '20260830170556.jpg', 'Peneriman Murid Baru', 2027, '08995260967', 'Bpk.imam', 'Buka');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int NOT NULL,
  `judul_prestasi` varchar(250) NOT NULL,
  `id_kategori` int NOT NULL,
  `tingkat` varchar(250) NOT NULL,
  `tahun` int NOT NULL,
  `penyelenggara` varchar(250) NOT NULL,
  `penerima` varchar(250) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `judul_prestasi`, `id_kategori`, `tingkat`, `tahun`, `penyelenggara`, `penerima`, `deskripsi`, `foto`) VALUES
(1, 'Lomba Mural', 1, 'Sekolah', 2026, 'Dinas Pendidikian', 'XII RC', 'Juara 2 Mural Tema Cita - Cita Murid', 'prestasi_1788105633.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id_profil` int NOT NULL,
  `nama_sekolah` varchar(150) DEFAULT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `nsm` varchar(30) DEFAULT NULL,
  `status_sekolah` varchar(30) DEFAULT NULL,
  `jenjang` varchar(50) DEFAULT NULL,
  `akreditasi` varchar(10) DEFAULT NULL,
  `tahun_berdiri` year DEFAULT NULL,
  `alamat` text,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `foto_sekolah` varchar(255) DEFAULT NULL,
  `sejarah` text,
  `visi` text,
  `misi` text,
  `sambutan_kepala` text,
  `foto_kepala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id_profil`, `nama_sekolah`, `npsn`, `nsm`, `status_sekolah`, `jenjang`, `akreditasi`, `tahun_berdiri`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `telepon`, `email`, `website`, `logo`, `foto_sekolah`, `sejarah`, `visi`, `misi`, `sambutan_kepala`, `foto_kepala`) VALUES
(1, 'Madrasah Ibtidaiyah Nurul Ummah', '69977288 ', '111233130069', 'Swasta', 'Madrasah Ibtidaiyah', 'B', 2017, 'Kalimas Bangsri RT 001 RW 001', 'Bangsri', 'Karangpandan', 'Karanganyar', 'Jawa Tengah', '57791', '(0271) 4993471', 'minurma2017@gmail.com', 'https://MI_Nurul_Ummah.sch.id', 'logo_1789472968.png', 'foto_sekolah_1787117979.png', 'Madrasah Ibtidaiyah (MI) Nurul Ummah Bangsri berdiri pada tahun 2017 di Kalimas, Desa Bangsri, Kecamatan Karangpandan, Kabupaten Karanganyar, Jawa Tengah. Sekolah dasar swasta ini didirikan di bawah naungan Yayasan Nurul Ummah Karanganyar guna memperkuat pendidikan Islam berhaluan Ahlus Sunnah wal Jamaah', 'terwujudnya generasi yang berakhlakul karimah, berprestasi, dan unggul dalam teknologi pembelajaran yang mulia', 'Untuk mencapai visi tersebut, misi utama yang dijalankan meliputi:\r\nMenyelenggarakan pendidikan berkualitas yang memadukan ilmu dan agama.\r\nMengembangkan program Tahfidz yang unggul bagi peserta didik.\r\nMembiasakan pengamalan nilai-nilai Islam seperti doa harian, sholat dhuha, dan wirid.\r\nMembentuk sikap percaya diri dan kemandirian pada diri anak.\r\nMewujudkan generasi yang berhaluan Ahlussunnah wal Jamaah.', 'Assalamu’alaikum Warahmatullahi Wabarakatuh.\r\nPuji syukur senantiasa kita panjatkan ke hadirat Allah SWT, karena atas rahmat, taufik, dan hidayah-Nya kita semua masih diberikan kesehatan serta kesempatan untuk terus mengabdi di dunia pendidikan Islam. Shalawat serta salam semoga tercurah limpahkan kepada junjungan kita Nabi Besar Muhammad SAW, keluarganya, para sahabatnya, dan kita selaku umatnya hingga akhir zaman.\r\nSelamat datang di website resmi MI Nurul Ummah. Kehadiran website ini merupakan salah satu bentuk komitmen kami untuk terus meningkatkan mutu pelayanan informasi, transparansi, serta sarana komunikasi antara pihak madrasah dengan orang tua siswa, alumni, dan masyarakat luas.\r\nDi era digital dan perkembangan zaman yang dinamis saat ini, pendidikan dasar memegang peranan yang sangat krusial. MI Nurul Ummah hadir untuk memberikan pendidikan berkualitas yang tidak hanya berfokus pada kecerdasan intelektual, tetapi juga mengintegrasikan nilai-nilai luhur ajaran Islam dalam pembentukan karakter anak sejak dini. Kami bertekad mencetak generasi yang Islami, cerdas, mandiri, dan berakhlakul karimah, sehingga siap menghadapi tantangan masa depan dengan landasan keimanan yang kokoh.\r\nKami mengucapkan terima kasih yang sebesar-besarnya kepada seluruh orang tua siswa dan masyarakat atas kepercayaan yang telah diberikan kepada MI Nurul Ummah sebagai mitra dalam mendidik buah hati tercinta. Semoga kerja sama yang baik ini terus terjalin demi kemajuan bersama dan kesuksesan anak-anak kita.\r\nAkhir kata, mari bersama-sama kita dukung proses pendidikan di MI Nurul Ummah agar senantiasa memberikan manfaat yang luas bagi umat dan bangsa.\r\nWabillahi taufiq wal hidayah,\r\nWassalamu’alaikum Warahmatullahi Wabarakatuh.\r\nKepala MI Nurul Ummah\r\n(Imam)', 'foto_kepala_1787117979.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `role` enum('Kepala_Sekolah','Guru') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `foto`, `role`, `password`) VALUES
(2, 'kaka', 'kaka@gmail.com', '20260818150047.jpg', 'Guru', '$2y$10$GXv61aXtrIf0KglysjaliuJ9tujerX4/8hrD2FMnUQ71U0PULs06.'),
(3, 'imam', 'imam@gmail.com', '20260818150439.jpg', 'Kepala_Sekolah', '$2y$10$XYrO5BkrxkwRthmCSqxgfuFmmd2Qe.UVUud17VxozJFbNdsRjlaAa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id_ekstrakurikuler`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kategori_prestasi`
--
ALTER TABLE `kategori_prestasi`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id_ppdb`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id_ekstrakurikuler` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_prestasi`
--
ALTER TABLE `kategori_prestasi`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id_ppdb` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id_profil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_prestasi` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
