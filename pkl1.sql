-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2023 pada 11.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_absensi` date NOT NULL,
  `keterangan` enum('Hadir','Sakit','Izin','Tanpa Keterangan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_siswa`, `tanggal_absensi`, `keterangan`) VALUES
(1, 18867, '2020-08-01', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_kunjungan_pkl`
--

CREATE TABLE `catatan_kunjungan_pkl` (
  `id_catatan_kunjungan_pkl` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `catatan_pembimbing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `id_adm` int(15) NOT NULL,
  `id_admin` int(15) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`id_adm`, `id_admin`, `nama_admin`, `id_jurusan`, `jenis_kelamin`) VALUES
(3, 9090, 'fahmi 123', 1, 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dudi`
--

CREATE TABLE `data_dudi` (
  `id_dudi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_dudi` varchar(255) NOT NULL,
  `alamat_dudi` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_dudi`
--

INSERT INTO `data_dudi` (`id_dudi`, `id_jurusan`, `nama_dudi`, `alamat_dudi`, `kuota`) VALUES
(1, 6, 'tahu', 'Jl. Dr. Soetomo No. 72 Banyuwangi', 3),
(2, 1, 'Bina Usaha Komputer', 'Jl. KH. Wahid Hasyim Genteng', 2),
(4, 1, 'Cakrawala Komputer', 'Jl. Sayu Wiwit No. 73 Banyuwangi', 0),
(57, 1, 'jampoet komputer', 'edqewd', 0),
(60, 6, 'bengkel mobil 1', 'maron kulon', 0),
(61, 1, 'Ridi comp', 'Jl. Ahmad Yani No.152, Mangunharjo, Kec. Mayangan, Kota Probolinggo, Jawa Timur 67217', 3),
(62, 1, 'Rini Electronic Computer', 'Jalan Raya Panglima Sudirman, Jati, Kota Probolinggo, Jawa Timur', 3),
(63, 1, 'Kraksaan Komputer', 'Jl. Imam Bonjol, Klojen, Sidomukti, Kec. Kraksaan, Kabupaten Probolinggo, Jawa Timur 67282', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id_gr` int(11) NOT NULL,
  `id_guru` int(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `id_jurusan` int(15) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_gr`, `id_guru`, `nama_guru`, `id_jurusan`, `jenis_kelamin`) VALUES
(1, 909091, 'hendro', 1, 'laki-laki'),
(2, 1945, 'sis', 1, 'laki-laki'),
(3, 90909, 'nuris', 1, 'laki-laki'),
(4, 80808, 'hafit', 1, 'laki-laki'),
(5, 70707, 'tofan dwi', 1, 'laki-laki'),
(6, 60606, 'adin', 1, 'laki-laki'),
(7, 50505, 'taufik', 1, 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru1`
--

CREATE TABLE `data_guru1` (
  `id_guru` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL DEFAULT 1,
  `nip` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_guru1`
--

INSERT INTO `data_guru1` (`id_guru`, `id_jurusan`, `nip`, `nama_guru`, `jenis_kelamin`, `alamat`) VALUES
(123, 1, '', '123', 'Perempuan', ''),
(501, 7, '19870809 201101 1 009', 'Misbahus Surur, S.ST1', 'Laki-laki', 'dsn. jajang surat rt.02 rw.03 ds. karangbendo kec. rogojampi - Banyuwangi'),
(512, 1, '19870809 201101 1 009', 'Apri Diantono, A.Md', 'Laki-laki', 'Jl. dr. sutomo 45\r\n'),
(521, 1, '', 'Dadang Ferdian, ST', 'Laki-laki', ''),
(576, 1, '19741024 200212 1 007', 'Hari Wahyudi, S.Pd.,MT.', 'Laki-laki', 'Kertosari RT 3 / IV Krajan  Kec. Banyuwangi'),
(595, 1, '', 'Iwan Sapta Yulianto, S.Kom', 'Laki-laki', ''),
(614, 1, '', 'Mursalin, SST.', 'Laki-laki', 'Puri Brawijaya Permai Blok M No 15 Kebalenan Banyuwangi'),
(713, 1, '19840509 201101 2 016', 'Herdian Wijayanti, S.Kom', 'Perempuan', 'Gapangan'),
(724, 1, '19960317 201903 1 002', 'Singgih Adie Kurniawan, S. Pd', 'Laki-laki', 'Rogojampi'),
(909, 1, '', 'Siswanto', 'Laki-laki', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_sw` int(11) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_sw`, `id_siswa`, `nama_siswa`, `id_jurusan`, `kelas`, `jenis_kelamin`) VALUES
(2, 1203021, 'dinda1', 1, 'XI TKJ', 'perempuan'),
(3, 777, 'rofi', 6, 'XI TKRO', 'laki-laki'),
(4, 4567, 'mince', 1, 'XI TKJ', 'laki-laki'),
(5, 7654, 'Madona', 1, 'XI TKJ', 'perempuan'),
(6, 1717, 'herman', 6, 'XI TKRO', 'laki-laki'),
(7, 101, 'yunus', 1, 'XI TKJ ', 'laki-laki'),
(8, 202, 'Aan', 1, 'XI TKJ', 'laki-laki'),
(9, 303, 'fery', 1, 'XI TKJ', 'laki-laki'),
(10, 404, 'rondi', 1, 'XI TKJ', 'laki-laki'),
(11, 101020, 'tt', 1, 'tt', 'laki-laki'),
(12, 1212, 'wawan', 6, 'XI TKRO', 'laki-laki'),
(13, 1313, 'anam', 6, 'XI TKRO', 'laki-laki'),
(14, 1414, 'alan', 6, 'XI TKRO', 'laki-laki'),
(15, 2121, 'wasisto', 1, 'XI TKJ', 'laki-laki'),
(16, 18867, 'kusina', 1, 'XI TKJ', 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa1`
--

CREATE TABLE `data_siswa1` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL DEFAULT 1,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_siswa1`
--

INSERT INTO `data_siswa1` (`id`, `id_siswa`, `nama_siswa`, `id_jurusan`, `kelas`, `jenis_kelamin`) VALUES
(123125, 70901, 'Imdad Alfi Fahmi', 1, 'XI TKJ', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_staf_tu`
--

CREATE TABLE `data_staf_tu` (
  `id_staf_tu` int(11) NOT NULL,
  `nama_staf_tu` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_staf_tu`
--

INSERT INTO `data_staf_tu` (`id_staf_tu`, `nama_staf_tu`, `jenis_kelamin`, `alamat`) VALUES
(234, 'Anggiya', 'P', 'banyuwangi'),
(235, 'anandita', 'P', 'banyuwangi'),
(236, 'WIJI IKA APRILYANI', 'P', ''),
(237, 'VICO ETVEN PAMUNGKAS', 'L', ''),
(238, 'Rizki Idul Fitriansyah', 'L', 'Jelun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_pkl`
--

CREATE TABLE `jurnal_pkl` (
  `id_jurnal_pkl` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kompetensi_dasar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `topik_pekerjaan` varchar(255) NOT NULL,
  `dokumentasi` varchar(255) DEFAULT 'default.jpg',
  `status` enum('Belum Tervalidasi','Tervalidasi','Ditolak') NOT NULL DEFAULT 'Belum Tervalidasi',
  `catatan` varchar(255) DEFAULT 'Belum ada catatan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurnal_pkl`
--

INSERT INTO `jurnal_pkl` (`id_jurnal_pkl`, `id_siswa`, `id_kompetensi_dasar`, `tanggal`, `topik_pekerjaan`, `dokumentasi`, `status`, `catatan`) VALUES
(2, 18867, 49, '2020-08-26', 'Menerapkan K3LH', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(3, 18867, 135, '2020-08-26', 'Buat desain dari bitmap', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(4, 18867, 69, '2020-08-26', 'Mencoba menghidupkan komputer', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(5, 18867, 70, '2020-08-26', 'Melakukan setting BIOS setelah dirakit', '2Qhhdda6Qnbf8RCfUN1XbeG3HcHexpWLjyYM4sj6ZWtRzbXdo3FfQUBdCXc2wXV1znXcJk8r8LaR63u9nvqC.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(6, 18867, 73, '2020-08-26', 'Instalasi aplikasi komputer rakitan', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(7, 18867, 274, '2020-08-26', 'membuat poster iklan dengan menyusun kata-kata promosi', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(8, 18867, 127, '2020-08-26', 'Menata layout pada masing-masing desain poster', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(9, 18867, 140, '2020-08-26', 'Mempelajari jaringan fiber optic', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(10, 18867, 71, '2020-08-26', 'Instalasi sistem operasi jaringan berbasis Linux', 'Instalasi_Sistem_Operasi_Jaringan.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(11, 18867, 284, '2020-08-26', 'Menyusun bahan pekerjaan untuk merakit komputer bagi klien', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(12, 18867, 125, '2020-08-26', 'Penempatan warna-warna pada komposisi layout poster promosi', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(13, 18867, 61, '2020-08-26', 'Mengisi perangkat lunak pada laptop klien', 'default.jpg', 'Belum Tervalidasi', 'Belum ada catatan'),
(14, 4567, 1, '2023-04-23', 'tahu bulat', '1.jpg', 'Belum Tervalidasi', 'Belum ada catatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `nama_panjang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `nama_panjang`) VALUES
(1, 'TKJ', 'Teknik Komputer dan Jaringan'),
(6, 'TKRO', 'Teknik Kendaraan Ringan Otomotif'),
(7, 'AKL', 'Akuntansi Keuangan Lembaga'),
(8, 'TBSM', 'Teknik dan Bisnis Sepeda Motor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetensi_dasar`
--

CREATE TABLE `kompetensi_dasar` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `kompetensi_dasar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kompetensi_dasar`
--

INSERT INTO `kompetensi_dasar` (`id`, `id_mapel`, `kode`, `kompetensi_dasar`) VALUES
(1, 1, '3.1', 'Menerapkan logika dan algoritma komputer'),
(2, 1, '3.2', 'Menerapkan metode peta- minda'),
(3, 1, '3.3', 'Mengevaluasi paragraf deskriptif, argumentatif, naratif, dan persuasif'),
(4, 1, '3.4', 'Menerapkan logika dan operasi perhitungan data'),
(5, 1, '3.5', 'Menganalisis fitur yang tepat untuk pembuatan slide'),
(6, 1, '3.6', 'Menerapkan teknik presentasi yang efektif'),
(7, 1, '3.7', 'Menganalisis pembuatan e- book'),
(8, 1, '3.8', 'Memahami konsep Kewargaan Digital'),
(9, 1, '3.9', 'Menerapkan teknik penelusuran Search Engine'),
(10, 1, '3.10', 'Menganalisis komunikasi'),
(11, 1, '3.11', 'Menganalisis fitur perangkat lunak pembelajaran kolaboratif daring'),
(12, 1, '3.12', 'Merancang dokumen tahap pra-produksi'),
(13, 1, '3.13', 'Menganalisis produksi video, animasi dan/atau musik digital'),
(14, 1, '3.14', 'Mengevaluasi pasca-produksi video, animasi dan/atau musik digital'),
(15, 1, '4.1', 'Menggunakan fungsi-fungsi perintah (Command)'),
(16, 1, '4.2', 'Membuat peta-minda'),
(17, 1, '4.3', 'Menyusun kembali format dokumen pengolah kata'),
(18, 1, '4.4', 'Mengoperasikan perangkat lunak pengolah angka'),
(19, 1, '4.5', 'Membuat slide untuk presentasi'),
(20, 1, '4.6', 'Melakukan presentasi yang efektif'),
(21, 1, '4.7', 'Membuat e-book dengan perangkat lunak e-book editor'),
(22, 1, '4.8', 'Merumuskan etika Kewargaan Digital'),
(23, 1, '4.9', 'Melakukan penelusuran informasi'),
(24, 1, '4.10', 'Melakukan komunikasi sinkron dan asinkron dalam jaringan'),
(25, 1, '4.11', 'Menggunakan fitur untuk pembelajaran kolaboratif daring (kelas maya)'),
(26, 1, '4.12', 'Membuat dokumen tahap pra- produksi'),
(27, 1, '4.13', 'Memroduksi video dan/atau animasi dan/atau musik digital'),
(28, 1, '4.14', 'Membuat laporan hasil pasca- produksi'),
(29, 2, '3.1', 'Memahami sistem bilangan (Desimal, Biner, Heksadesimal)'),
(30, 2, '3.2', 'Menganalisis relasi logika dasar, kombinasi dan sekuensial (NOT, AND, OR); (NOR,NAND,EXOR,EXNOR); (Flip Flop, counter)'),
(31, 2, '3.3', 'Menerapkan operasi logika Aritmatik (Half-Full Adder, Ripple Carry Adder)'),
(32, 2, '3.4', 'Mengklasifikasikan rangkaian Multiplexer, Decoder, Register'),
(33, 2, '3.5', 'Menerapkan elektronika dasar (kelistrikan, komponen elektronika dan skema rangkaian elektronika)'),
(34, 2, '3.6', 'Menerapkan dasar dasar mikrokontroler'),
(35, 2, '3.7', 'Menganalisis blok diagram dari sistem mikro komputer (arsitektur komputer)'),
(36, 2, '3.8', 'Mengevaluasi Perangkat Eksternal / Peripheral'),
(37, 2, '3.9', 'Menganalisis memori berdasarkan karakteristik sistem memori (lokasi,kapasitas, kecepatan, cara akses, tipe fisik)'),
(38, 2, '3.10', 'Menganalisa Struktur CPU dan fungsi CPU'),
(39, 2, '4.1', 'Mengkonversikan sistem bilangan (Desimal, Biner, Heksadesimal) dalam memecahkan masalah konversi'),
(40, 2, '4.2', 'Merangkai fungsi gerbang logika dasar, kombinasi dan sekuensial (NOT, AND, OR);(NOR,NAND,EXOR,EXNOR); melalui ujicoba (Flip Flop, counter)'),
(41, 2, '4.3', 'Mempraktikkan operasi Logik Unit (Half-Full Adder, Ripple Carry Adder)'),
(42, 2, '4.4', 'Mengoperasikan aritmatik dan logik pada Arithmatic Logic Unit (Multiplexer, Decoder, Register)'),
(43, 2, '4.5', 'Mempraktikkan fungsi kelistrikan dan komponen elektronika)'),
(44, 2, '4.6', 'Manipulasi dasar-dasar mikrokontroler (port IO, clock, arsitektur RISK, general purpose RISK, stack pointer, SRAM, EEPROM, SREG)'),
(45, 2, '4.7', 'Menyajikan gambar minimal sistem mikro komputer berdasarkan blok diagram dan sistem rangkaian (arsitektur computer)'),
(46, 2, '4.8', 'Merangkai perangkat eksternal dengan consule unit'),
(47, 2, '4.9', 'Membuat alternatif kebutuhan untuk memodifikasi beberapa memori dalam sistem computer'),
(48, 2, '4.10', 'Menyajikan Rangkaian internal CPU'),
(49, 3, '3.1', 'Menerapkan K3LH disesuaikan dengan lingkungan kerja'),
(50, 3, '3.2', 'Menerapkan perakitan komputer'),
(51, 3, '3.3', 'Menerapkan pengujian perakitan komputer'),
(52, 3, '3.4', 'Menerapkan konfigurasi BIOS pada komputer'),
(53, 3, '3.5', 'Menerapkan instalasi sistem operasi'),
(54, 3, '3.6', 'Menerapkan instalasi driver perangkat keras komputer'),
(55, 3, '3.7', 'Menerapkan instalasi software aplikasi'),
(56, 3, '3.8', 'Menerapkan perawatan perangkat keras komputer'),
(57, 3, '3.9', 'Menganalisis permasalahan pada perangkat keras'),
(58, 3, '3.10', 'Menganalisis permasalahan pada instalasi software aplikasi'),
(59, 3, '3.11', 'Menerapkan instalasi jaringan komputer'),
(60, 3, '3.12', 'Menerapkan pengalamanatan IP pada jaringan komputer'),
(61, 3, '3.13', 'Menerapkan sumber daya berbagi pakai pada jaringan komputer'),
(62, 3, '3.14', 'Menerapkan instalasi koneksi internet pada workstation'),
(63, 3, '3.15', 'Mengevaluasi desain jaringan lokal (LAN)'),
(64, 3, '3.16', 'Menerapkan instalasi jaringan lokal (LAN)'),
(65, 3, '3.17', 'Menerapkan perawatan jaringan lokal (LAN)'),
(66, 3, '3.18', 'Menganalisis permasalahan pada jaringan lokal (LAN)'),
(67, 3, '4.1', 'Melaksanakan K3LH dilingkungan kerja'),
(68, 3, '4.2', 'Merakit komputer'),
(69, 3, '4.3', 'Menguji kinerja komputer'),
(70, 3, '4.4', 'Melakukan seting BIOS'),
(71, 3, '4.5', 'Menginstalasi sistem operasi'),
(72, 3, '4.6', 'Menginstalasi driver perangkat keras komputer'),
(73, 3, '4.7', 'Menginstalasi software aplikasi'),
(74, 3, '4.8', 'Melakukan perawatan perangkat keras komputer'),
(75, 3, '4.9', 'Melakukan perbaikan pada perangkat keras'),
(76, 3, '4.10', 'Mengelola perbaikan pada instalasi software aplikasi'),
(77, 3, '4.11', 'Menginstalasi jaringan komputer'),
(78, 3, '4.12', 'Mengkonfigurasi pengalamatan IP pada jaringan komputer'),
(79, 3, '4.13', 'Menginstalasi sumber daya berbagi pakai pada jaringan komputer'),
(80, 3, '4.14', 'Menginstalasi koneksi internet pada workstation'),
(81, 3, '4.15', 'Mendesain jaringan lokal (LAN)'),
(82, 3, '4.16', 'Menginstalasi jaringan lokal (LAN)'),
(83, 3, '4.17', 'Melakukan perawatan jaringan lokal (LAN)'),
(84, 3, '4.18', 'Mengelola perbaikan pada jaringan lokal (LAN)'),
(85, 4, '3.1', 'Menerapkan alur logika pemrograman komputer'),
(86, 4, '3.2', 'Memahami perangkat lunak bahasa pemrograman'),
(87, 4, '3.3', 'Menerapkan alur pemrograman dengan struktur bahasa pemrograman komputer'),
(88, 4, '3.4', 'Menerapkan penggunaan tipe data, variabel, konstanta, operator, dan ekspresi'),
(89, 4, '3.5', 'Menerapkan operasi aritmatika dan logika'),
(90, 4, '3.6', 'Menerapkan struktur kontrol Percabangan dalam bahasa pemrograman'),
(91, 4, '3.7', 'Menerapkan struktur kontrol Perulangan dalam bahasa pemrograman'),
(92, 4, '3.8', 'Menganalisis penggunaan array untuk penyimpanan data di memori'),
(93, 4, '3.9', 'Menerapkan penggunaan fungsi'),
(94, 4, '3.10', 'Menerapkan pembuatan antar muka (User Intreface) pada aplikasi'),
(95, 4, '3.11', 'Menerapkan berbagai struktur kontrol dalam aplikasi antar muka (User Intreface).'),
(96, 4, '3.12', 'Menganalisis pembuatan aplikasi sederhana berbasis antar muka (User Intreface)'),
(97, 4, '3.13', 'Mengevaluasi debuging pada aplikasi sederhana'),
(98, 4, '3.14', 'Mengevaluasi paket installer aplikasi sederhana'),
(99, 4, '4.1', 'Membuat alur logika pemrograman komputer'),
(100, 4, '4.2', 'Melakukan Instalasi perangkat lunak bahasa pemrograman'),
(101, 4, '4.3', 'Menulis kode pemrogram sesuai dengan aturan dan sintaks bahasa pemrograman'),
(102, 4, '4.4', 'Membuat kode program dengan tipe data, variabel, konstanta, operator dan ekspresi'),
(103, 4, '4.5', 'Membuat kode program dengan operasi aritmatika dan logika'),
(104, 4, '4.6', 'Membuat kode program struktur kontrol percabangan'),
(105, 4, '4.7', 'Membuat kode program struktur kontrol perulangan'),
(106, 4, '4.8', 'Membuat kode program untuk menampilkan kumpulan data array'),
(107, 4, '4.9', 'Membuat kode program menggunakan fungsi'),
(108, 4, '4.10', 'Membuat antar muka (User Intreface) pada aplikasi'),
(109, 4, '4.11', 'Membuat kode program berbagai struktur kontrol dalam aplikasi antar muka (User Intreface).'),
(110, 4, '4.12', 'Membuat aplikasi sederhana berbasis antar muka (User Intreface)'),
(111, 4, '4.13', 'Menggunakan debuging pada aplikasi sederhana'),
(112, 4, '4.14', 'Memformulasikan paket installer aplikasi sederhana'),
(113, 5, '3.1', 'Mendiskusikan unsur-unsur tata letak berupa garis, ilustrasi, tipografi, warna, gelap-terang, tekstur, dan ruang'),
(114, 5, '3.2', 'Mendiskusikan fungsi, dan unsur warna CMYK dan RGB'),
(115, 5, '3.3', 'Mendiskusikan prinsip-prinsip tata letak, antara lain : proporsi, irama (rythm), keseimbangan, kontras, kesatuan (unity), dan harmoni dalam pembuatan desain grafis'),
(116, 5, '3.4', 'Mendiskusikan berbagai format gambar'),
(117, 5, '3.5', 'Menerapkan prosedur scanning gambar/ ilustrasi/teks dalam desain'),
(118, 5, '3.6', 'Menerapkan perangkat lunak pengolah gambar vektor'),
(119, 5, '3.7', 'Menerapkan manipulasi gambar vektor dengan menggunakan fitur efek'),
(120, 5, '3.8', 'Menerapkan pembuatan desain berbasis gambar vektor'),
(121, 5, '3.9', 'Menerapkan perangkat lunak pengolah gambar bitmap (raster)'),
(122, 5, '3.10', 'Menerapkan manipulasi gambar raster dengan menggunakan fitur efek'),
(123, 5, '3.11', 'Mengevaluasi pembuatan desain berbasis gambar bitmap (raster)'),
(124, 5, '3.12', 'Mengevaluasi penggabungan gambar vektor dan bitmap (raster)'),
(125, 5, '4.1', 'Menempatkan unsur-unsur tata letak berupa garis, ilustrasi, tipografi, warna, gelap-terang, tekstur, dan ruang'),
(126, 5, '4.2', 'Menempatkan berbagai fungsi, dan unsur warna CMYK dan RGB.'),
(127, 5, '4.3', 'Menerapkan hasil prinsip- prinsip tata letak, antara lain : proporsi, irama (rythm), keseimbangan, kontras, kesatuan (unity), dan harmoni dalam pembuatan desain grafis'),
(128, 5, '4.4', 'Menempatkan berbagi format gambar'),
(129, 5, '4.5', 'Melakukan proses scanning gambar/ ilustrasi/teks dengan alat scanner dalam desain'),
(130, 5, '4.6', 'Menggunakan perangkat lunak pengolah gambar vektor'),
(131, 5, '4.7', 'Memanipulasi gambar vektor dengan menggunakan fitur efek'),
(132, 5, '4.8', 'Membuat desain berbasis gambar vektor'),
(133, 5, '4.9', 'Menggunakan perangkat lunak pengolah gambar bitmap (raster)'),
(134, 5, '4.10', 'Memanipulasi gambar raster dengan menggunakan fitur efek'),
(135, 5, '4.11', 'Membuat desain berbasis gambar bitmap (raster)'),
(136, 5, '4.12', 'Membuat desain penggabungan gambar vektor dan bitmap (raster)'),
(137, 6, '3.1', 'Menganalisis jaringan berbasis luas'),
(138, 6, '3.2', 'Mengevaluasi jaringan nirkabel'),
(139, 6, '3.3', 'Mengevaluasi permasalahan jaringan nirkabel'),
(140, 6, '3.4', 'Memahami jaringan fiber optic'),
(141, 6, '3.5', 'Mengidentifikasi jenis-jenis kabel fiber optic'),
(142, 6, '3.6', 'Menerapkan fungsi alat kerja fiber optic'),
(143, 6, '3.7', 'Mengevaluasi penyambungan fiber optic'),
(144, 6, '3.8', 'Mengevaluasi perangkat pasif jaringan fiber optic'),
(145, 6, '3.9', 'Mengevaluasi permasalahan jaringan fiber optic'),
(146, 6, '4.1', 'Membuat disain jaringan berbasis luas'),
(147, 6, '4.2', 'Mengkonfigurasi jaringan nirkabel'),
(148, 6, '4.3', 'Memperbaiki jaringan nirkabel'),
(149, 6, '4.4', 'Mengkaji jaringan fiber optic'),
(150, 6, '4.5', 'Menemutunjukkan kabel fiber optic'),
(151, 6, '4.6', 'Menggunakan alat kerja fiber optic'),
(152, 6, '4.7', 'Melakukan sambungan fiber optic'),
(153, 6, '4.8', 'Mengkonfigurasikan perangkat pasif jaringan fiber optic'),
(154, 6, '4.9', 'Melakukan perbaikan jaringan fiber optic'),
(155, 7, '3.1', 'Mengevaluasi VLAN pada jaringan'),
(156, 7, '3.2', 'Mengevaluasi permasalahan VLAN'),
(157, 7, '3.3', 'Memahami proses routing'),
(158, 7, '3.4', 'Mengevaluasi routing statis'),
(159, 7, '3.5', 'Menganalisis permasalahan routing statis'),
(160, 7, '3.6', 'Mengevaluasi routing dinamis'),
(161, 7, '3.7', 'Mengevaluasi permasalahan routing dinamis'),
(162, 7, '3.8', 'Mengevaluasi internet gateway'),
(163, 7, '3.9', 'Menganalisis permasalahan internet gateway'),
(164, 7, '3.10', 'Mengevaluasi firewall jaringan'),
(165, 7, '3.11', 'Menganalisis permasalahan firewall'),
(166, 7, '3.12', 'Mengevaluasi manajemen bandwidth'),
(167, 7, '3.13', 'Menganalisis permasalahan manajemen bandwidth'),
(168, 7, '3.14', 'Mengevaluasi load balancing'),
(169, 7, '3.15', 'Mengevaluasi permasalahan load balancing'),
(170, 7, '3.16', 'Mengevaluasi Proxy Server'),
(171, 7, '3.17', 'Menganalisis permasalahan Proxy Server'),
(172, 7, '4.1', 'Mengkonfigurasi VLAN'),
(173, 7, '4.2', 'Melakukan perbaikan konfigurasi VLAN'),
(174, 7, '4.3', 'Mengkaji jenis-jenis routing'),
(175, 7, '4.4', 'Mengkonfigurasi routing statis'),
(176, 7, '4.5', 'Memperbaiki konfigurasi routing statis'),
(177, 7, '4.6', 'Mengkonfigurasi routing dinamis'),
(178, 7, '4.7', 'Memperbaiki konfigurasi routing dinamis'),
(179, 7, '4.8', 'Mengkonfigurasi NAT'),
(180, 7, '4.9', 'Memperbaiki konfigurasi NAT'),
(181, 7, '4.10', 'Mengkonfigurasi firewall jaringan'),
(182, 7, '4.11', 'Memperbaiki konfigurasi firewall'),
(183, 7, '4.12', 'Mengkonfigurasi manajemen bandwidth'),
(184, 7, '4.13', 'Memperbaiki konfigurasi manajemen bandwidth'),
(185, 7, '4.14', 'Mengkonfigurasi load balancing'),
(186, 7, '4.15', 'Memperbaiki konfigurasi load balancing'),
(187, 7, '4.16', 'Mengkonfigurasi Proxy Server'),
(188, 7, '4.17', 'Memperbaiki konfigurasi Proxy Server'),
(189, 8, '3.1', 'Menerapkan sistem operasi jaringan'),
(190, 8, '3.2', 'Mengevaluasi DHCP Server'),
(191, 8, '3.3', 'Mengevaluasi FTP Server'),
(192, 8, '3.4', 'Mengevaluasi Remote Server'),
(193, 8, '3.5', 'Mengevaluasi File Server'),
(194, 8, '3.6', 'Mengevaluasi Web Server'),
(195, 8, '3.7', 'Mengevaluasi DNS Server'),
(196, 8, '3.8', 'Mengevaluasi Database Server'),
(197, 8, '3.9', 'Mengevaluasi Mail Server'),
(198, 8, '3.10', 'Mengevaluasi Control Panel Hosting'),
(199, 8, '3.11', 'Mengevaluasi Share Hosting Server'),
(200, 8, '3.12', 'Mengevaluasi Virtual Private Server'),
(201, 8, '3.13', 'Mengevaluasi dedicated hosting Server'),
(202, 8, '3.14', 'Mengevaluasi VPN Server'),
(203, 8, '3.15', 'Mengevaluasi sistem kontrol dan monitoring'),
(204, 8, '3.16', 'Mengevaluasi sistem keamanan jaringan'),
(205, 8, '3.17', 'Menganalisis permasalahan sistem administrasi'),
(206, 8, '4.1', 'Menginstalasi sistem operasi jaringan'),
(207, 8, '4.2', 'Mengkonfigurasi DHCP Server'),
(208, 8, '4.3', 'Mengkonfigurasi FTP Server'),
(209, 8, '4.4', 'Mengkonfigurasi Remote Server'),
(210, 8, '4.5', 'Mengkonfigurasi File Server'),
(211, 8, '4.6', 'Mengkonfigurasi Web Server'),
(212, 8, '4.7', 'Mengkonfigurasi DNS Server'),
(213, 8, '4.8', 'Mengkonfigurasi Database Server'),
(214, 8, '4.9', 'Mengkonfigurasi Mail Server'),
(215, 8, '4.10', 'Mengkonfigurasi Control Panel hosting'),
(216, 8, '4.11', 'Mengkonfigurasi Share Hosting Server'),
(217, 8, '4.12', 'Mengkonfigurasi Virtual Private Server'),
(218, 8, '4.13', 'Mengkonfigurasi Dedicated Hosting Server'),
(219, 8, '4.14', 'Mengkonfigurasi VPN Server'),
(220, 8, '4.15', 'Mengkonfigurasi sistem kontrol dan monitoring'),
(221, 8, '4.16', 'Mengkonfigurasi sistem keamanan jaringan'),
(222, 8, '4.17', 'Melakukan perbaikan sistem administrasi'),
(223, 9, '3.1', 'Memahami ragam aplikasi komunikasi data.'),
(224, 9, '3.2', 'Menganalisis berbagai standar komunikasi data.'),
(225, 9, '3.3', 'Menganalisis proses komunikasi data dalam jaringan.'),
(226, 9, '3.4', 'Memahami aspek-aspek teknologi komunikasi data dan suara.'),
(227, 9, '3.5', 'Menganalisis kebutuhan telekomunikasi dalam jaringan.'),
(228, 9, '3.6', 'Menganalisis kebutuhan beban / bandwidth jaringan.'),
(229, 9, '3.7', 'Memahami konsep kerja protokoler Server softswitch.'),
(230, 9, '3.8', 'Memahami diagram rangkaian operasi komunikasi VoIP'),
(231, 9, '3.9', 'Memahami bagan dan konsep kerja Server softswitch berkaitan dengan PBX.'),
(232, 9, '3.10', 'Menerapkan konfigurasi ekstensi dan dial-plan Server softswitch.'),
(233, 9, '3.11', 'Menerapkan prosedur instalasi Server softswitch berbasis session initial protocol (SIP).'),
(234, 9, '3.12', 'Memahami konfigurasi ekstensi dan dial-plan Server softswitch'),
(235, 9, '3.13', 'Memahami fungsi firewall pada jaringan VoIP'),
(236, 9, '3.14', 'Memahami prinsip kerja subscriber internet telepon'),
(237, 9, '3.15', 'Menerapkan konfigurasi pada subscriber internet telepon'),
(238, 9, '3.16', 'Mengevaluasi kerja sistem komunikasi VoIP'),
(239, 9, '3.17', 'Mengevaluasi perawatan sistem komunikasi VoIP'),
(240, 9, '3.18', 'Menganalisis permasalahan sistem komunikasi VoIP'),
(241, 9, '4.1', 'Menyajikan karakteristik ragam aplikasi komunikasi data'),
(242, 9, '4.2', 'Menyajikan berbagai standar komunikasi data'),
(243, 9, '4.3', 'Menyajikan hasil analisis proses komunikasi data'),
(244, 9, '4.4', 'Menalar aspek-aspek teknologi komunikasi data dan suara'),
(245, 9, '4.5', 'Menyajikan hasil analisis kebutuhan telekomunikasi dalam jaringan'),
(246, 9, '4.6', 'Menyajikan hasil analisis kebutuhan beban/bandwidth jaringan'),
(247, 9, '4.7', 'Menalar konsep kerja protokoler Server softswitch'),
(248, 9, '4.8', 'Menalar diagram rangkaian operasi komunikasi VoIP'),
(249, 9, '4.9', 'Menyajikan bagan dan konsep kerja Server softswitch berkaitan dengan PBX.'),
(250, 9, '4.10', 'Melakukan konfigurasi ekstensi dan dial-plan Server softswitch'),
(251, 9, '4.11', 'Menginstalasi Server softswitch berbasis session initial protocol (SIP).'),
(252, 9, '4.12', 'Menyajikan hasil konfigurasi eksistensi dan dial-plan Server softswitch.'),
(253, 9, '4.13', 'Menalar fungsi firewall pada jaringan VoIP'),
(254, 9, '4.14', 'Menalar prinsip kerja subscriber internet telepon'),
(255, 9, '4.15', 'Membuat konfigurasi subscriber internet telepon.'),
(256, 9, '4.16', 'Mengelola kerja sistem komunikasi VoIP'),
(257, 9, '4.17', 'Melakukan perawatan sistem komunikasi VoIP'),
(258, 9, '4.18', 'Melakukan perbaikan sistem komunikasi VoIP'),
(259, 10, '3.1', 'Memahami sikap dan perilaku wirausahawan'),
(260, 10, '3.2', 'Menganalisis peluang usaha produk barang/jasa'),
(261, 10, '3.3', 'Memahami hak atas kekayaan intelektual'),
(262, 10, '3.4', 'Menganalisis konsep desain/prototype dan kemasan produk barang/ jasa'),
(263, 10, '3.5', 'Menganalisis proses kerja pembuatan prototype produk barang/jasa'),
(264, 10, '3.6', 'Menganalisis lembar kerja/ gambar kerja untuk pembuatan prototype produk barang/jasa'),
(265, 10, '3.7', 'Menganalisis biaya produksi prototype produk barang/jasa'),
(266, 10, '3.8', 'Menerapkan proses kerja pembuatan prototype produk barang/jasa'),
(267, 10, '3.9', 'Menentukan pengujian kesesuaian fungsi prototype produk barang/jasa '),
(268, 10, '3.10', 'Menganalisis perencanaan produksi massal'),
(269, 10, '3.11', 'Menentukan indikator keberhasilan tahapan produksi massal'),
(270, 10, '3.12', 'Menerapkan proses produksi massal'),
(271, 10, '3.13', 'Menerapkan metoda perakitan produk barang/jasa'),
(272, 10, '3.14', 'Menganalisis prosedur pengujian kesesuaian fungsi produk barang/jasa'),
(273, 10, '3.15', 'Mengevaluasi kesesuaian hasil produk dengan rancangan'),
(274, 10, '3.16', 'Memahami paparan deskriptif, naratif, argumentatif, atau persuasif tentang produk/jasa'),
(275, 10, '3.17', 'Menentukan media promosi'),
(276, 10, '3.18', 'Menyeleksi strategi pemasaran'),
(277, 10, '3.19', 'Menilai perkembangan usaha'),
(278, 10, '3.20', 'Menentukan standard laporan keuangan'),
(279, 10, '4.1', 'Memresentasikan sikap dan perilaku wirausahawan'),
(280, 10, '4.2', 'Menentukan peluang usaha produk barang/jasa'),
(281, 10, '4.3', 'Memresentasikan hak atas kekayaan intelektual'),
(282, 10, '4.4', 'Membuat desain/prototype dan kemasan produk barang/jasa'),
(283, 10, '4.5', 'Membuat alur dan proses kerja pembuatan prototype produk barang/jasa'),
(284, 10, '4.6', 'Membuat lembar kerja/ gambar kerja untuk pembuatan prototype produk barang/jasa'),
(285, 10, '4.7', 'Menghitung biaya produksi prototype produk barang/jasa'),
(286, 10, '4.8', 'Membuat prototype produk barang/jasa'),
(287, 10, '4.9', 'Menguji prototype produk barang/jasa'),
(288, 10, '4.10', 'Membuat perencanaan produksi massal'),
(289, 10, '4.11', 'Membuat indikator keberhasilan tahapan produksi missal'),
(290, 10, '4.12', 'Melakukan produksi massal'),
(291, 10, '4.13', 'Melakukan perakitan produk barang/jasa'),
(292, 10, '4.14', 'Melakukan pengujian produk barang/jasa'),
(293, 10, '4.15', 'Melakukan pemeriksaan produk sesuai dengan kriteria kelayakan produk/standar operasional'),
(294, 10, '4.16', 'Menyusun paparan deskriptif, naratif, argumentatif, atau persuasif tentang produk/jasa'),
(295, 10, '4.17', 'Membuat media promosi berdasarkan segmentasi pasar'),
(296, 10, '4.18', 'Melakukan pemasaran'),
(297, 10, '4.19', 'Membuat bagan perkembangan usaha'),
(298, 10, '4.20', 'Membuat laporan keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`) VALUES
(1, 'Simulasi dan Komunikasi Digital '),
(2, 'Sistem Komputer '),
(3, 'Komputer dan Jaringan Dasar '),
(4, 'Pemrograman Dasar '),
(5, 'Dasar Desain Grafis '),
(6, 'Teknologi Jaringan Berbasis Luas (WAN) '),
(7, 'Administrasi Infrastruktur Jaringan '),
(8, 'Administrasi Sistem Jaringan '),
(9, 'Teknologi Layanan Jaringan '),
(10, 'Produk Kreatif dan Kewirausahaan ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuanpkl`
--

CREATE TABLE `pengajuanpkl` (
  `id_pengajuanpkl` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_dudi` int(11) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `tanggal_pengajuan` datetime DEFAULT current_timestamp(),
  `tanggal_masuk` date DEFAULT '2023-01-01',
  `tanggal_keluar` date NOT NULL DEFAULT '2023-01-01',
  `id_guru` int(11) NOT NULL DEFAULT 0,
  `status_keanggotaan` enum('Anggota','Ketua Kelompok') NOT NULL DEFAULT 'Anggota',
  `status_validasi` enum('Belum Tervalidasi','Diterima','Ditolak','Proses Pengajuan') NOT NULL DEFAULT 'Belum Tervalidasi',
  `kuota` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuanpkl`
--

INSERT INTO `pengajuanpkl` (`id_pengajuanpkl`, `id_siswa`, `id_dudi`, `durasi`, `tanggal_pengajuan`, `tanggal_masuk`, `tanggal_keluar`, `id_guru`, `status_keanggotaan`, `status_validasi`, `kuota`) VALUES
(9, 120302, 1, '', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 512, 'Anggota', 'Proses Pengajuan', 1),
(10, 1203021, 4, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 909091, 'Anggota', 'Proses Pengajuan', 1),
(11, 7654, 4, '', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 909091, 'Ketua Kelompok', 'Proses Pengajuan', 1),
(12, 4567, 4, '6', '2023-04-30 20:03:40', '2023-05-09', '2023-05-09', 909091, 'Anggota', 'Diterima', 1),
(13, 777, 1, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 909091, 'Ketua Kelompok', 'Proses Pengajuan', 1),
(17, 101, 57, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 1945, 'Anggota', 'Proses Pengajuan', 1),
(18, 202, 57, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 1945, 'Anggota', 'Proses Pengajuan', 1),
(19, 303, 57, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 1945, 'Anggota', 'Proses Pengajuan', 1),
(20, 404, 4, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 909091, 'Anggota', 'Proses Pengajuan', 1),
(21, 1717, 1, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 0, 'Anggota', 'Proses Pengajuan', 1),
(22, 1212, 60, '6', '2023-04-30 20:03:40', '2023-04-30', '2023-10-30', 909091, 'Anggota', 'Proses Pengajuan', 1),
(23, 1313, 60, '4', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 909091, 'Anggota', 'Proses Pengajuan', 1),
(24, 1414, 60, '6', '2023-04-30 20:03:40', '2023-01-01', '2023-01-01', 909091, 'Anggota', 'Proses Pengajuan', 1);

--
-- Trigger `pengajuanpkl`
--
DELIMITER $$
CREATE TRIGGER `TG_kuota_dudi` AFTER INSERT ON `pengajuanpkl` FOR EACH ROW BEGIN
	UPDATE data_dudi SET kuota=kuota-NEW.kuota
    WHERE id_dudi = NEW.id_dudi;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_kuota_dudi1` AFTER DELETE ON `pengajuanpkl` FOR EACH ROW BEGIN
	UPDATE data_dudi SET kuota=kuota+OLD.kuota
    WHERE id_dudi = OLD.id_dudi;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('siswa','admin','pembimbing_dudi','koordinator_jurusan','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id`, `username`, `password`, `role`) VALUES
(82, 2, 'Bina', 'Bina', 'pembimbing_dudi'),
(132, 70901, 'fahmi', '123', 'admin'),
(133, 120302, '120302', '1234', 'siswa'),
(138, 70901, '070901', '123', 'siswa'),
(140, 1203021, 'dinda', '123', 'siswa'),
(145, 909091, 'tempe', '123', 'guru'),
(146, 9090, 'admin', '123', 'admin'),
(147, 777, 'rofi', '123', 'siswa'),
(148, 4567, 'mince', '123', 'siswa'),
(149, 7654, 'madona', '123', 'siswa'),
(150, 1945, 'tt', '123', 'guru'),
(151, 1717, 'herman', '123', 'siswa'),
(152, 4, '4', '4', 'pembimbing_dudi'),
(153, 101, 'yunus', '123', 'siswa'),
(154, 202, 'aan', '123', 'siswa'),
(155, 303, 'fery', '123', 'siswa'),
(156, 404, 'rondi', '123', 'siswa'),
(158, 1212, 'wawan', '123', 'siswa'),
(159, 1313, 'anam', '123', 'siswa'),
(160, 1414, 'alan', '123', 'siswa'),
(161, 2121, 'wasisto', '123', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_pkl`
--

CREATE TABLE `penilaian_pkl` (
  `id_penilaian_pkl` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `aspek_teknis_1` varchar(255) DEFAULT '-',
  `nilai_astek_1` varchar(3) DEFAULT NULL,
  `aspek_teknis_2` varchar(255) DEFAULT '-',
  `nilai_astek_2` varchar(3) DEFAULT NULL,
  `aspek_teknis_3` varchar(255) DEFAULT '-',
  `nilai_astek_3` varchar(3) DEFAULT NULL,
  `aspek_teknis_4` varchar(255) DEFAULT '-',
  `nilai_astek_4` varchar(3) DEFAULT NULL,
  `aspek_teknis_5` varchar(255) DEFAULT '-',
  `nilai_astek_5` varchar(3) DEFAULT NULL,
  `aspek_teknis_6` varchar(255) DEFAULT '-',
  `nilai_astek_6` varchar(3) DEFAULT NULL,
  `aspek_teknis_7` varchar(255) DEFAULT '-',
  `nilai_astek_7` varchar(3) DEFAULT NULL,
  `aspek_teknis_8` varchar(255) DEFAULT '-',
  `nilai_astek_8` varchar(3) DEFAULT NULL,
  `aspek_teknis_9` varchar(255) DEFAULT '-',
  `nilai_astek_9` varchar(3) DEFAULT NULL,
  `aspek_teknis_10` varchar(255) DEFAULT '-',
  `nilai_astek_10` varchar(3) DEFAULT NULL,
  `aspek_teknis_11` varchar(255) DEFAULT '-',
  `nilai_astek_11` varchar(3) DEFAULT NULL,
  `aspek_teknis_12` varchar(255) DEFAULT '-',
  `nilai_astek_12` varchar(3) DEFAULT NULL,
  `aspek_teknis_13` varchar(255) DEFAULT '-',
  `nilai_astek_13` varchar(3) DEFAULT NULL,
  `aspek_teknis_14` varchar(255) DEFAULT '-',
  `nilai_astek_14` varchar(3) DEFAULT NULL,
  `nilai_nontek_disiplin` varchar(3) DEFAULT NULL,
  `nilai_nontek_kerjasama` varchar(3) DEFAULT NULL,
  `nilai_nontek_inisiatif` varchar(3) DEFAULT NULL,
  `nilai_nontek_tanggungjawab` varchar(3) DEFAULT NULL,
  `nilai_nontek_kebersihan_kerapian` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penilaian_pkl`
--

INSERT INTO `penilaian_pkl` (`id_penilaian_pkl`, `id_siswa`, `aspek_teknis_1`, `nilai_astek_1`, `aspek_teknis_2`, `nilai_astek_2`, `aspek_teknis_3`, `nilai_astek_3`, `aspek_teknis_4`, `nilai_astek_4`, `aspek_teknis_5`, `nilai_astek_5`, `aspek_teknis_6`, `nilai_astek_6`, `aspek_teknis_7`, `nilai_astek_7`, `aspek_teknis_8`, `nilai_astek_8`, `aspek_teknis_9`, `nilai_astek_9`, `aspek_teknis_10`, `nilai_astek_10`, `aspek_teknis_11`, `nilai_astek_11`, `aspek_teknis_12`, `nilai_astek_12`, `aspek_teknis_13`, `nilai_astek_13`, `aspek_teknis_14`, `nilai_astek_14`, `nilai_nontek_disiplin`, `nilai_nontek_kerjasama`, `nilai_nontek_inisiatif`, `nilai_nontek_tanggungjawab`, `nilai_nontek_kebersihan_kerapian`) VALUES
(1, 18867, 'Merakit komputer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '80', '80', '80', '80', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_pkl`
--

CREATE TABLE `program_pkl` (
  `id_program_pkl` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kompetensi_dasar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `topik_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program_pkl`
--

INSERT INTO `program_pkl` (`id_program_pkl`, `id_siswa`, `id_kompetensi_dasar`, `tanggal`, `topik_pekerjaan`) VALUES
(1, 18867, 127, '2020-08-25', 'Menyusun beberapa layouting dan pewarnaan pada poster promosi'),
(2, 18867, 49, '2020-08-26', 'menerapkan k3lh saat merakit komputer'),
(3, 18867, 37, '2020-08-26', 'menganalisis kebutuhan komputer untuk kebutuhan ukuran ram'),
(4, 18867, 113, '2020-08-26', 'Menerapkan peletakkan layout pada desain poster promosi'),
(5, 18867, 73, '2020-08-26', 'Instalasi sistem operasi jaringan'),
(6, 18867, 274, '2020-08-26', 'menyusun kata-kata promosi pada desain promosi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `catatan_kunjungan_pkl`
--
ALTER TABLE `catatan_kunjungan_pkl`
  ADD PRIMARY KEY (`id_catatan_kunjungan_pkl`);

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `data_dudi`
--
ALTER TABLE `data_dudi`
  ADD PRIMARY KEY (`id_dudi`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_gr`);

--
-- Indeks untuk tabel `data_guru1`
--
ALTER TABLE `data_guru1`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_sw`);

--
-- Indeks untuk tabel `data_siswa1`
--
ALTER TABLE `data_siswa1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_staf_tu`
--
ALTER TABLE `data_staf_tu`
  ADD PRIMARY KEY (`id_staf_tu`);

--
-- Indeks untuk tabel `jurnal_pkl`
--
ALTER TABLE `jurnal_pkl`
  ADD PRIMARY KEY (`id_jurnal_pkl`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuanpkl`
--
ALTER TABLE `pengajuanpkl`
  ADD PRIMARY KEY (`id_pengajuanpkl`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `penilaian_pkl`
--
ALTER TABLE `penilaian_pkl`
  ADD PRIMARY KEY (`id_penilaian_pkl`);

--
-- Indeks untuk tabel `program_pkl`
--
ALTER TABLE `program_pkl`
  ADD PRIMARY KEY (`id_program_pkl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `catatan_kunjungan_pkl`
--
ALTER TABLE `catatan_kunjungan_pkl`
  MODIFY `id_catatan_kunjungan_pkl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_adm` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_dudi`
--
ALTER TABLE `data_dudi`
  MODIFY `id_dudi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_gr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_guru1`
--
ALTER TABLE `data_guru1`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_sw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_siswa1`
--
ALTER TABLE `data_siswa1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123126;

--
-- AUTO_INCREMENT untuk tabel `jurnal_pkl`
--
ALTER TABLE `jurnal_pkl`
  MODIFY `id_jurnal_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengajuanpkl`
--
ALTER TABLE `pengajuanpkl`
  MODIFY `id_pengajuanpkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `penilaian_pkl`
--
ALTER TABLE `penilaian_pkl`
  MODIFY `id_penilaian_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `program_pkl`
--
ALTER TABLE `program_pkl`
  MODIFY `id_program_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
