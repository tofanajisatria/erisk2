-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2019 pada 07.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erisk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action_plan`
--

CREATE TABLE `action_plan` (
  `id` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `title` varchar(258) NOT NULL,
  `description` varchar(258) NOT NULL,
  `attachment` varchar(258) DEFAULT NULL,
  `date` date NOT NULL,
  `nilai_action` varchar(258) NOT NULL,
  `PIC` varchar(128) NOT NULL,
  `evidence` varchar(258) NOT NULL,
  `hasil` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `action_plan`
--

INSERT INTO `action_plan` (`id`, `id_evaluation`, `title`, `description`, `attachment`, `date`, `nilai_action`, `PIC`, `evidence`, `hasil`) VALUES
(29, 6, 'test1', ' asdasd', '', '2019-12-31', 'Rp.20000', '-', '-', '-'),
(31, 7, 'ini action plan', 'mencoba menerapkan smt secara menyeluruh ', '', '2019-12-31', 'Rp.20000', 'kabag', '-', '-'),
(32, 8, 'test1', ' hehe', '', '2019-12-31', 'Rp.10000', 'ma', 'belum', 'belum'),
(33, 10, 'ldjal', 'dadasdjk ', '', '2019-12-31', 'Rp.sepuluh ribu', 'ogoy', 'huwaa ', 'huwwoooo'),
(34, 11, '', ' ', '', '0000-00-00', 'Rp.', '', '', ''),
(35, 12, 'Koordinasi dengan CF', 'Meminta List Dokumen Pendukung Keuangan ', '', '2019-08-01', 'Rp.2.000.000', 'ayu', '', ''),
(36, 14, 'test1', ' hello', '', '2019-12-31', 'Rp.1.000.000', 'tof', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `id_identification` int(11) DEFAULT NULL,
  `bagian` varchar(256) NOT NULL,
  `tw` int(11) NOT NULL,
  `review` varchar(256) NOT NULL,
  `approval` varchar(256) NOT NULL,
  `made` varchar(256) NOT NULL,
  `lihat` int(11) NOT NULL,
  `setuju` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `rincian_tgl` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `approval`
--

INSERT INTO `approval` (`id`, `id_identification`, `bagian`, `tw`, `review`, `approval`, `made`, `lihat`, `setuju`, `pesan`, `rincian_tgl`) VALUES
(4, 46, 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 1, 'Tofan Aji Satria', 'Tofan Aji Satria', 'Tofan Aji Satria', 1, 1, '0', '12 July 2019'),
(5, 47, 'Bag. Rendal Audit Urs. Administrasi Rendal Audit', 1, 'Tofan Aji Satria', 'Tofan Aji Satria', 'kyts', 1, 1, '0', '12 July 2019'),
(6, 46, 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 2, 'Tofan Aji Satria', 'Tofan Aji Satria', 'Tofan Aji Satria', 1, 1, '\r\n    hello world', '12 July 2019'),
(7, 49, 'Bag. Keuangan Urs. Administrasi Umum & Rendal keuangan', 1, 'Tofan Aji Satria', 'Tofan Aji Satria', 'Tofan Aji Satria', 1, 1, '0', '15 July 2019'),
(8, 46, 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 2, 'Tofan Aji Satria', 'Tofan Aji Satria', 'Tofan Aji Satria', 1, 1, '0', '16 July 2019'),
(9, 46, 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 3, 'Tofan Aji Satria', 'Tofan Aji Satria', 'Tofan Aji Satria', 1, 1, '0', '16 July 2019'),
(10, 46, 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 4, 'Tofan Aji Satria', 'Tofan Aji Satria', 'Tofan Aji Satria', 1, 1, '0', '16 July 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(200) NOT NULL,
  `bagian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `bagian`) VALUES
(18, 'Satuan Pengawasan Intern', 'Bag. Rendal Audit Urs. Administrasi Rendal Audit'),
(20, 'Satuan Pengawasan Intern', 'Bag. Rendal Audit Urs. Pengembangan Audit'),
(21, 'Div. Sekretaris Perusahaan', 'Bag. Rendal Strategis Urs. Pendukung Rendal Strategis'),
(22, 'Div. Sekretaris Perusahaan', 'Bag. Hukum Urs. Pengelolaan Informasi & Dukungan Hukum'),
(23, 'Div. Sekretaris Perusahaan', 'Bag. Hukum Urs. Rendal GCG'),
(24, 'Div. Sekretaris Perusahaan', 'Bag. PKBL Urs. Rendal PKBL'),
(25, 'Div. Sekretaris Perusahaan', 'Bag. PKBL Urs. Operasional PKBL'),
(26, 'Div. Sekretaris Perusahaan', 'Bag. Biro Direksi Urs. Sekretaris Direksi'),
(27, 'Div. Sekretaris Perusahaan', 'Bag. Biro Direksi Urs. Administrasi & Keuangan'),
(28, 'Div. Sekretaris Perusahaan', 'Bag. Biro Direksi Urs. Cabang Jakarta'),
(29, 'Div. Sekretaris Perusahaan', 'Bag. Public Relation Urs. Internal & Eksternal Relation'),
(30, 'Div. Sekretaris Perusahaan', 'Bag. Public Relation Urs. Media Handling & Marketing Support'),
(31, 'Div. Pengembangan Bisnis & Produk', ' Bag. Product Development Support Urs. Administrasi Umum'),
(32, 'Div. Pengembangan Bisnis & Produk', ' Bag. Product Development Support Urs. Dokumen Pengembangan '),
(33, 'Div. Pengembangan Bisnis & Produk', ' Bag. Product Development Support Urs. Product Quality Assurance'),
(34, 'Div. Pengembangan Bisnis & Produk', 'Bag. Product Management Urs. Rendal Produk'),
(35, 'Div. Pengembangan Bisnis & Produk', 'Bag. Product Management Urs. Rekayasa dan Dukungan Produk'),
(36, 'Div. Pengembangan Bisnis & Produk', 'Bag. Product Management Urs. RICE & Business Incubator'),
(37, 'Div. Corporate Finance', 'Bag. Strategi Pendanaan Urs. Rendal Keuangan'),
(38, 'Div. Corporate Finance', 'Bag. Strategi Pendanaan Urs. Pengelolaan Dana'),
(39, 'Div. Corporate Finance', 'Bag. Pendanaan Operasional Urs. Bendahara'),
(40, 'Div. Corporate Finance', 'Bag. Pendanaan Operasional Urs. Verifikasi Eksternal'),
(41, 'Div. Corporate Finance', 'Bag. Pendanaan Operasional Urs. Verifikasi Internal'),
(42, 'Div. Corporate Finance', 'Bag. Pajak Urs. Pajak 1'),
(43, 'Div. Corporate Finance', 'Bag. Pajak Urs. Pajak 2'),
(44, 'Div. Corporate Finance', 'Bag. Akuntansi Keuangan Urs. Laporan Keuangan'),
(45, 'Div. Corporate Finance', 'Bag. Akuntansi Keuangan Urs. Akuntansi Umum'),
(46, 'Div. Corporate Finance', 'Bag. Akuntansi Keuangan Urs. Biaya dan Persediaan'),
(47, 'Div. Corporate Finance', 'Bag. Akuntansi Manajemen Urs. Laporan Manajemen'),
(48, 'Div. Corporate Finance', 'Bag. Akuntansi Manajemen Urs. Analisa Laporan Keuangan'),
(49, 'Div. Corporate Finance', 'Bag. Akuntansi Manajemen Urs. Rendal Anggaran'),
(50, 'Div. Human Capital Management & Quality', 'Bag. Quality & Risk Management Urs. Quality Management'),
(51, 'Div. Human Capital Management & Quality', 'Bag. Quality & Risk Management Urs. Sistem Risk Management'),
(52, 'Div. Human Capital Management & Quality', 'Bag. HR Development Urs. Man Power Planning & Manajemen Karir'),
(53, 'Div. Human Capital Management & Quality', 'Bag. HR Development Urs. Manajemen Kinerja & Kompetensi'),
(54, 'Div. Human Capital Management & Quality', 'Bag. HR Development Urs. Pengembangan SDM'),
(55, 'Div. Human Capital Management & Quality', 'Bag. HR Service Urs. Data & Remunerasi SDM'),
(56, 'Div. Human Capital Management & Quality', 'Bag. HR Service Urs. Hubungan Kepegawaian & Pelayanan SDM'),
(57, 'Div. IT & Umum', 'Bag. IT Service Urs. Sistem Informasi'),
(58, 'Div. IT & Umum', 'Bag. IT Service Urs. IT Quality Assurance'),
(59, 'Div. IT & Umum', 'Bag. IT Service Urs. IT Infrastructure'),
(60, 'Div. IT & Umum', 'Bag. IT Service Urs. Administrasi Umum & Arsip Perusahaan'),
(61, 'Div. IT & Umum', 'Bag. Umum Urs. Optimalisasi Properti'),
(62, 'Div. IT & Umum', 'Bag. Umum Urs. Pemeliharaan Properti'),
(63, 'Div. IT & Umum', 'Bag. Umum Urs. Pelayanan Umum & K3LH'),
(64, 'Div. IT & Umum', 'Bag. Pengadaan Korporasi Urs. Rendal Pengadaan'),
(65, 'Div. IT & Umum', 'Bag. Pengadaan Korporasi Urs. Pengadaan'),
(66, 'SBU Broadband', 'Bag. Engineering Urs. Rendal Engineering'),
(67, 'SBU Broadband', 'Bag. Engineering Urs. Kualitas'),
(68, 'SBU Broadband', 'Bag. Proyek Urs. Rendal Proyek'),
(69, 'SBU Broadband', 'Bag. Service Urs. Rendal Sevice'),
(70, 'SBU Broadband', 'Bag. Service Urs. Purna Jual'),
(71, 'SBU Broadband', 'Bag. Keuangan Urs. Administrasi Umum & Pelaporan'),
(72, 'SBU Broadband', 'Bag. Keuangan Urs. Bendahara & Verifikasi'),
(73, 'SBU Broadband', 'Bag. Keuangan Urs. Penagihan, Pajak dan Asuransi'),
(74, 'SBU Broadband', 'Bag. Pengadaan Urs. Rendal Pengadaan'),
(75, 'SBU Broadband', 'Bag. Pengadaan Urs. Pengadaan'),
(76, 'SBU Broadband', 'Bag. Pengadaan Urs. Material Management'),
(77, 'SBU Broadband', 'Bag. Commercial Urs. Sale Administrastion'),
(78, 'SBU Broadband', 'Bag. Commercial Urs. Sale Support'),
(79, 'SBU Smart Energy', 'Bag. Engineering Urs. Rendal Engineering'),
(80, 'SBU Smart Energy', 'Bag. Engineering Urs. Kualitas'),
(81, 'SBU Smart Energy', 'Bag. Proyek Urs. Rendal Proyek'),
(82, 'SBU Smart Energy', 'Bag. Service Urs. Rendal Sevice'),
(83, 'SBU Smart Energy', 'Bag. Service Urs. Purna Jual'),
(84, 'SBU Smart Energy', 'Bag. Keuangan Urs. Administrasi Umum & Pelaporan'),
(85, 'SBU Smart Energy', 'Bag. Keuangan Urs. Bendahara & Verifikasi'),
(86, 'SBU Smart Energy', 'Bag. Keuangan Urs. Penagihan, Pajak dan Asuransi'),
(87, 'SBU Smart Energy', 'Bag. Pengadaan Urs. Rendal Pengadaan'),
(88, 'SBU Smart Energy', 'Bag. Pengadaan Urs. Pengadaan'),
(89, 'SBU Smart Energy', 'Bag. Pengadaan Urs. Material Management'),
(90, 'SBU Smart Energy', 'Bag. Commercial Urs. Sale Administrastion'),
(91, 'SBU Smart Energy', 'Bag. Commercial Urs. Sale Support'),
(92, 'SBU Defense & Digital Service', 'Bag. Engineering Urs. Rendal Engineering'),
(93, 'SBU Defense & Digital Service', 'Bag. Engineering Urs. Kualitas'),
(94, 'SBU Defense & Digital Service', 'Bag. Proyek Urs. Rendal Proyek'),
(95, 'SBU Defense & Digital Service', 'Bag. Service Urs. Rendal Sevice'),
(96, 'SBU Defense & Digital Service', 'Bag. Service Urs. Purna Jual'),
(97, 'SBU Defense & Digital Service', 'Bag. Keuangan Urs. Administrasi Umum & Pelaporan'),
(98, 'SBU Defense & Digital Service', 'Bag. Keuangan Urs. Bendahara & Verifikasi'),
(99, 'SBU Defense & Digital Service', 'Bag. Keuangan Urs. Penagihan, Pajak dan Asuransi'),
(100, 'SBU Defense & Digital Service', 'Bag. Pengadaan Urs. Rendal Pengadaan'),
(101, 'SBU Defense & Digital Service', 'Bag. Pengadaan Urs. Pengadaan'),
(102, 'SBU Defense & Digital Service', 'Bag. Pengadaan Urs. Material Management'),
(103, 'SBU Defense & Digital Service', 'Bag. Commercial Urs. Sale Administrastion'),
(104, 'SBU Defense & Digital Service', 'Bag. Commercial Urs. Sale Support'),
(105, 'Div. Produksi', 'Bag. Rendal dan Kualitas Produksi Urs. Quality Assurance'),
(106, 'Div. Produksi', 'Bag. Rendal dan Kualitas Produksi Urs. Gudang Produksi'),
(107, 'Div. Produksi', 'Bag. Rekayasa Produksi Urs. Rekayasa dan Dukungan Produksi'),
(108, 'Div. Produksi', 'Bag. Rekayasa Produksi Urs. Manajemen Produksi '),
(109, 'Div. Produksi', 'Bag. Keuangan Urs. Administrasi Umum & Rendal keuangan'),
(110, 'Div. Produksi', 'Bag. Keuangan Urs. Bendahara & Verifikasi'),
(111, 'Div. Produksi', 'Bag. Keuangan Urs. Pengadaan Produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `id_riskdetail` int(11) NOT NULL,
  `periode` varchar(3) NOT NULL,
  `tahun` int(4) NOT NULL,
  `likelihood_kini` int(1) NOT NULL,
  `consequence_kini` int(1) NOT NULL,
  `likelihood_sisa` int(1) NOT NULL,
  `consequence_sisa` int(1) NOT NULL,
  `level_kini` varchar(50) NOT NULL,
  `level_sisa` varchar(50) NOT NULL,
  `tanggapan_kini` varchar(128) NOT NULL,
  `tanggapan_sisa` varchar(128) NOT NULL,
  `exiting_control` varchar(258) NOT NULL,
  `rules` varchar(258) DEFAULT NULL,
  `disetujui` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `evaluation`
--

INSERT INTO `evaluation` (`id`, `id_riskdetail`, `periode`, `tahun`, `likelihood_kini`, `consequence_kini`, `likelihood_sisa`, `consequence_sisa`, `level_kini`, `level_sisa`, `tanggapan_kini`, `tanggapan_sisa`, `exiting_control`, `rules`, `disetujui`) VALUES
(6, 63, '1', 2019, 5, 5, 0, 0, 'Ekstrim', '0', 'Unacceptable', '0', '', NULL, NULL),
(7, 64, '1', 2019, 4, 4, 0, 0, 'Ekstrim', '0', 'Unacceptable', '0', 'Prosedur', 'Keputusan Direksi', NULL),
(8, 64, '2', 2019, 4, 4, 4, 3, 'Ekstrim', 'Tinggi', 'Unacceptable', 'Issue', 'Komitmen PIC', 'SMT', NULL),
(9, 64, '1', 2019, 4, 4, 0, 0, 'Ekstrim', '0', 'Unacceptable', '0', 'Petunjuk Kerja', '', NULL),
(10, 65, '1', 2019, 3, 4, 0, 0, 'Ekstrim', '0', 'Unacceptable', '0', 'Petunjuk Kerja', '', NULL),
(11, 64, '3', 2019, 4, 3, 3, 3, 'Tinggi', 'Tinggi', 'Issue', 'Issue', 'Komitmen PIC', '', NULL),
(12, 66, '1', 2019, 2, 3, 0, 0, 'Moderate', '0', 'Supplementary', '0', 'Eskalasi ke Management', '', NULL),
(13, 66, '2', 2019, 2, 3, 2, 2, 'Moderate', 'Rendah', 'Supplementary', 'Acceptable', '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identification`
--

CREATE TABLE `identification` (
  `id` int(11) NOT NULL,
  `divisi` varchar(128) DEFAULT NULL,
  `bagian` varchar(258) DEFAULT NULL,
  `nama_proyek` text NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `pic_proyek` text NOT NULL,
  `pic_akun` text NOT NULL,
  `petugas` text NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` text NOT NULL,
  `waktu` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pengisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identification`
--

INSERT INTO `identification` (`id`, `divisi`, `bagian`, `nama_proyek`, `nama_pelanggan`, `pic_proyek`, `pic_akun`, `petugas`, `tanggal`, `tujuan`, `waktu`, `tahun`, `pengisi`) VALUES
(46, 'Div. Human Capital Management & Quality', 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 'protokol gegas', 'Tofan', 'Aji', 'Satria', 'Tofan Aji Satria', '2019-07-08', 'pencapaian SKU', 1562587359, '2019', 'Tofan Aji Satria'),
(47, 'Satuan Pengawasan Intern', 'Bag. Rendal Audit Urs. Administrasi Rendal Audit', 'coba', 'tofan', 'Aji', 'Satria', 'Ayu t', '2019-07-10', 'hy', 1562720512, '2019', 'kyts'),
(48, 'Div. Human Capital Management & Quality', 'Bag. Quality & Risk Management Urs. Sistem Risk Management', 'coba', 'coba', 'hy', 'hi', 'hi', '2019-12-31', 'ipsodk', 1562722588, '2019', 'Tofan Aji Satria'),
(49, 'Div. Produksi', 'Bag. Keuangan Urs. Administrasi Umum & Rendal keuangan', '-', '', '', '', 'Ayu', '2019-07-15', 'pencapaian SKU', 1563163555, '2019', 'Tofan Aji Satria'),
(53, 'Div. Human Capital Management & Quality', 'Bag. Quality & Risk Management Urs. Sistem Risk Management', '', 'Karyawan/ti', '', '-', 'Tofan Aji Satria', '2019-12-31', 'Mengawal Pelaksanaan Asesment Risiko Di Setiap Divisi/SBU', 1563261519, '2019', 'Tofan Aji Satria');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_risiko`
--

CREATE TABLE `level_risiko` (
  `id` int(11) NOT NULL,
  `kemungkinan` int(11) NOT NULL,
  `konsekuensi` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `tanggapan` varchar(258) NOT NULL,
  `button` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_risiko`
--

INSERT INTO `level_risiko` (`id`, `kemungkinan`, `konsekuensi`, `level`, `tanggapan`, `button`) VALUES
(1, 1, 1, 'Rendah', 'Acceptable', 'btn btn-success'),
(2, 1, 2, 'Rendah', 'Acceptable', 'btn btn-success'),
(3, 1, 3, 'Moderate', 'Supplementary', 'btn btn-warning'),
(4, 1, 4, 'Tinggi', 'Issue', 'btn btn-primary'),
(5, 1, 5, 'Tinggi', 'Issue', 'btn btn-primary'),
(6, 2, 1, 'Rendah', 'Acceptable', 'btn btn-success'),
(7, 2, 2, 'Rendah', 'Acceptable', 'btn btn-success'),
(8, 2, 3, 'Moderate', 'Supplementary', 'btn btn-warning'),
(9, 2, 4, 'Tinggi', 'Issue', 'btn btn-primary'),
(10, 2, 5, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(11, 3, 1, 'Rendah', 'Acceptable', 'btn btn-success'),
(12, 3, 2, 'Moderate', 'Supplementary', 'btn btn-warning'),
(13, 3, 3, 'Tinggi', 'Issue', 'btn btn-primary'),
(14, 3, 4, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(15, 3, 5, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(16, 4, 1, 'Moderate', 'Supplementary', 'btn btn-warning'),
(17, 4, 2, 'Tinggi', 'Issue', 'btn btn-primary'),
(18, 4, 3, 'Tinggi', 'Issue', 'btn btn-primary'),
(19, 4, 4, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(20, 4, 5, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(21, 5, 1, 'Tinggi', 'Issue', 'btn btn-primary'),
(22, 5, 2, 'Tinggi', 'Issue', 'btn btn-primary'),
(23, 5, 3, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(24, 5, 4, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(25, 5, 5, 'Ekstrim', 'Unacceptable', 'btn btn-danger'),
(26, 0, 0, '-', '', 'btn btn-light');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitigasi_berjalan`
--

CREATE TABLE `mitigasi_berjalan` (
  `id` int(11) NOT NULL,
  `exiting_control` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitigasi_berjalan`
--

INSERT INTO `mitigasi_berjalan` (`id`, `exiting_control`) VALUES
(1, 'Prosedur'),
(2, 'Eskalasi ke Management'),
(3, 'Komitmen PIC'),
(4, 'Petunjuk Kerja'),
(5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `id_identifikasi` int(11) NOT NULL,
  `periode_monitoring` int(1) NOT NULL,
  `progress` varchar(11) NOT NULL,
  `status` varchar(258) NOT NULL,
  `keterangan_monitoring` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `one_page`
--

CREATE TABLE `one_page` (
  `id` int(11) NOT NULL,
  `divisi` varchar(258) NOT NULL,
  `bagian` varchar(258) NOT NULL,
  `proyek` varchar(258) NOT NULL,
  `pelanggan` varchar(128) NOT NULL,
  `pic` varchar(128) NOT NULL,
  `akun` varchar(128) NOT NULL,
  `petugas` varchar(128) NOT NULL,
  `tujuan` varchar(258) NOT NULL,
  `tahun` int(4) NOT NULL,
  `triwulan` int(1) NOT NULL,
  `aspek` varchar(128) NOT NULL,
  `profil` varchar(258) NOT NULL,
  `sumber` varchar(258) NOT NULL,
  `keterangan` longtext NOT NULL,
  `kontrol` varchar(128) NOT NULL,
  `uraian` longtext NOT NULL,
  `nilai` varchar(258) NOT NULL,
  `mitigasi` longtext NOT NULL,
  `aturan` varchar(258) NOT NULL,
  `likelihood` int(1) NOT NULL,
  `consequence` int(1) NOT NULL,
  `level` varchar(128) NOT NULL,
  `evidence` longtext NOT NULL,
  `hasil` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `risk_detail`
--

CREATE TABLE `risk_detail` (
  `id` int(11) NOT NULL,
  `id_identifikasi` int(11) NOT NULL,
  `aspek` varchar(50) DEFAULT NULL,
  `profil_risiko` varchar(50) DEFAULT NULL,
  `sumber_risiko` varchar(50) DEFAULT NULL,
  `kontrol` varchar(20) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `konsekuensi` longtext NOT NULL,
  `nilai` varchar(128) NOT NULL,
  `pengisi` varchar(20) NOT NULL,
  `bagian` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `risk_detail`
--

INSERT INTO `risk_detail` (`id`, `id_identifikasi`, `aspek`, `profil_risiko`, `sumber_risiko`, `kontrol`, `keterangan`, `konsekuensi`, `nilai`, `pengisi`, `bagian`) VALUES
(63, 46, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.1. Tidak ideal', 'Controllable', 'a. Penempatan Pegawai tidak sesuai kebutuhan', 'banyak yang mengundurkan diri', 'Rp. 0', 'Tofan Aji Satria', 'Bag. Quality & Risk Management Urs. Sistem Risk Management'),
(64, 46, 'Aspek Keuangan & Akuntansi', '3.1. Risiko Utang/kredit', '3.1.2. Kesulitan mencari sumber dana', 'Controllable', 'a. Risiko Kredit', 'pembengkakan kerugian', 'Rp. 200000000', 'Tofan Aji Satria', 'Bag. Quality & Risk Management Urs. Sistem Risk Management'),
(65, 47, 'Aspek Engineering', '11.3. Risiko Produk', '11.3.4. Kendala pengurusan Hak Paten', 'Controllable', '', 'h', 'Rp. 121120000', 'kyts', 'Bag. Rendal Audit Urs. Administrasi Rendal Audit'),
(66, 49, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'Controllable', 'g. Ketidaklengkapan dokumen pendukung', 'Ditolak di CF', 'Rp. 2.000.000', 'Tofan Aji Satria', 'Bag. Keuangan Urs. Administrasi Umum & Rendal keuangan'),
(67, 53, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.2. Beban kerja tidak seimbang', 'Controllable', 'a. Monitoring berkurangnya tenaga kerja akibat  terminasi tidak dilakukan', '', 'Rp. ', 'Tofan Aji Satria', 'Bag. Quality & Risk Management Urs. Sistem Risk Management'),
(68, 53, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'Controllable', 'a.  Monitoring tindak lanjut risalah rapat Direksi yang kurang maksimal', '', 'Rp. ', 'Tofan Aji Satria', 'Bag. Quality & Risk Management Urs. Sistem Risk Management'),
(69, 53, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'Controllable', 'b. Kekurangcermatan dalam evaluasi Senior Project Manager oleh auditor, kurangnya pemahaman tentang standar performansi mengenai', '', 'Rp. ', 'Tofan Aji Satria', 'Bag. Quality & Risk Management Urs. Sistem Risk Management'),
(71, 53, 'Aspek Pengawasan', '9.4. Pelaporan', '9.4.1. Tidak tepat waktu', 'Controllable', 'c. Keterlambatan entry FIS (financial information system) pada portal BUMN', '', 'Rp. ', 'Tofan Aji Satria', 'Bag. Quality & Risk Management Urs. Sistem Risk Management');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_risiko`
--

CREATE TABLE `sumber_risiko` (
  `id` int(10) NOT NULL,
  `aspek` text NOT NULL,
  `profil_risiko` text NOT NULL,
  `sumber_risiko` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber_risiko`
--

INSERT INTO `sumber_risiko` (`id`, `aspek`, `profil_risiko`, `sumber_risiko`, `keterangan`) VALUES
(1, 'Aspek Produksi', '1.1. Risiko Proses', '1.1.1. Terbakar', '-'),
(2, 'Aspek Produksi', '1.1. Risiko Proses', '1.1.2. Bocor', '-'),
(3, 'Aspek Produksi', '1.1. Risiko Proses', '1.1.3. Meledak', '-'),
(4, 'Aspek Produksi', '1.1. Risiko Proses', '1.1.4. Tidak adanya Quality Assurance & Control (QAC)', '-'),
(5, 'Aspek Produksi', '1.2. Risiko Alat/Equipment', '1.2.1. Rusak', '-'),
(6, 'Aspek Produksi', '1.2. Risiko Alat/Equipment', '1.2.2. Kinerja alat menurun', 'Kondisi peralatan/mesin, bangunan, inventaris kantor yang sudah usang'),
(7, 'Aspek Produksi', '1.2. Risiko Alat/Equipment', '1.2.3. Lack of Sparepart', 'Ketidaktersediaan sparepart / suku cadang'),
(8, 'Aspek Produksi', '1.3. Risiko Bahan', '1.3.1. Tidak sesuai spesifikasi', 'Ketidaksesuaian produk yang dihasilkan dengan spesifikasi '),
(9, 'Aspek Produksi', '1.3. Risiko Bahan', '1.3.2. Tidak tersedia/kelebihan', 'Ketidaktersediaan bahan akan menghambat proses produksi, sedangkan kelebihan bahan pun mengakibatkan pemborosan.'),
(10, 'Aspek Produksi', '1.3. Risiko Bahan', '1.3.3. Mutu tidak baik', 'Kualitas dan kehandalan komponen yang tidak sesuai kebutuhan'),
(11, 'Aspek Produksi', '1.4. Risiko Prasarana', '1.4.1. Tidak tersedia', 'Ketidaktersediaan prasarana akibat supply terhenti dari pihak eksternal'),
(12, 'Aspek Produksi', '1.4. Risiko Prasarana', '1.4.2. Tidak memadai', 'Prasarana ada akan tetapi tidak memadai / kondisinya tidak mendukung untuk produksi'),
(13, 'Aspek Produksi', '1.4. Risiko Prasarana', '1.4.3. Tidak mencukupi', 'Kekurangan jumlah prasarananya'),
(14, 'Aspek Produksi', '1.4. Risiko Prasarana', '1.4.4. Tidak sesuai', 'Ketidaksesuaian perangkat dengan dokumen standar untuk proses sertifikasi'),
(16, 'Aspek Produksi', '1.5. Risiko Lingkungan', '1.5.2. Konsentrasi di atas Nilai Ambang Batas (NAB)', '-'),
(17, 'Aspek Pemasaran', '2.1. Risiko Produk Jual', '2.1.1. Tidak tersedia / belum release', 'Produk yang belum release mempersulit kegiatan pemasaran'),
(18, 'Aspek Pemasaran', '2.1. Risiko Produk Jual', '2.1.2. Jumlah tidak mencukupi', 'Jumlah tidak sesuai dengan kebutuhan kastemer'),
(19, 'Aspek Pemasaran', '2.1. Risiko Produk Jual', '2.1.3. Mutu tidak sesuai', 'Mutu tidak sesuai dengan kebutuhan kastemer'),
(20, 'Aspek Pemasaran', '2.1. Risiko Produk Jual', '2.1.4. Purna Jual', 'Garansi / komplain'),
(21, 'Aspek Pemasaran', '2.2. Risiko Harga Jual', '2.2.1. Low price competitor', 'Kompetitor menawarkan harga yang lebih rendah ke kastemer'),
(22, 'Aspek Pemasaran', '2.2. Risiko Harga Jual', '2.2.2. Salah estimasi (baik dari volume maupun harga satuan itu sendiri)', 'Ketidakkonsistenan pada saat melakukan negosiasi atas harga yang sudah disepakati dengan fungsi solution'),
(23, 'Aspek Pemasaran', '2.2. Risiko Harga Jual', '2.2.3. Penurunan harga karena perubahan Scope of Work / Bill of Quantity', 'Amandemen Kontrak/Surat Pesanan dimana terdapat perubahan SOW yang berpengaruh terhadap perubahan nilai'),
(24, 'Aspek Pemasaran', '2.3. Risiko Dokumen Pendukung', '2.3.1. RKS (Rencana Kerja dan Syarat-syarat) kurang informatif atau kesulitan menerjemahkan RKS', 'RKS yang kurang informatif, termasuk apabila menggunakan bahasa asing menyulitkan penerjemahannya.'),
(25, 'Aspek Pemasaran', '2.4. Risiko Skema Bisnis', '2.4.1. Skema Bisnis yang kurang menguntungkan', 'Skema bisnis lebih banyak menguntungkan pihak kastemer. Seharusnya skema bisnis menguntungkan para pihak'),
(26, 'Aspek Pemasaran', '2.5. Risiko Pasar/Persaingan', '2.5.1. Dikuasai produk pesaing / Persaingan ketat', 'a. Kegagalan pemenangan tender'),
(27, 'Aspek Pemasaran', '2.5. Risiko Pasar/Persaingan', '2.5.1. Dikuasai produk pesaing / Persaingan ketat', 'b. Kebocoran informasi kepada competitor'),
(28, 'Aspek Pemasaran', '2.5. Risiko Pasar/Persaingan', '2.5.1. Dikuasai produk pesaing / Persaingan ketat', 'c. Persaingan dengan competitor yang memproduksi produk sejenis'),
(29, 'Aspek Pemasaran', '2.5. Risiko Pasar/Persaingan', '2.5.2. Segmentasi pasar tidak tepat', 'Produk/jasa yang ditawarkan tidak tepat segmentasi pasarnya sehingga tidak berkembang'),
(30, 'Aspek Pemasaran', '2.5. Risiko Pasar/Persaingan', '2.5.3. Brand image rendah', 'Ketidakmampuan dari produk yang akan dikembangkan untuk bersaing, bertahan dan menghasilkan profit'),
(31, 'Aspek Pemasaran', '2.6. Risiko Pelanggan', '2.6.1. Pelanggan tidak loyal', 'a. Kehilangan pelanggan disebabkan ketidakpuasan implementasi'),
(32, 'Aspek Pemasaran', '2.6. Risiko Pelanggan', '2.6.1. Pelanggan tidak loyal', 'b. Keterlambatan respon klaim'),
(33, 'Aspek Pemasaran', '2.6. Risiko Pelanggan', '2.6.1. Pelanggan tidak loyal', 'c. Keterlambatan penyelesaian perbaikan'),
(34, 'Aspek Pemasaran', '2.6. Risiko Pelanggan', '2.6.1. Pelanggan tidak loyal', 'd. Ketidaksesuaian kualitas hasil pekerjaan'),
(35, 'Aspek Pemasaran', '2.6. Risiko Pelanggan', '2.6.2. Keterbatasan daya beli', 'Budget dari kastemer terbatas'),
(36, 'Aspek Pemasaran', '2.6. Risiko Pelanggan', '2.6.3. Birokrasi yang rumit', 'Birokrasi dari sisi internal atau eksternal terlalu panjang, sehingga membutuhkan waktu yang lama'),
(37, 'Aspek Pemasaran', '2.7. Risiko Promosi', '2.7.1. Tidak tepat sasaran', 'Lokasi promosi atau target promosi tidak tepat sasaran sehingga tidak mendapatkan kastemer'),
(38, 'Aspek Pemasaran', '2.7. Risiko Promosi', '2.7.2. Biaya tinggi', 'Biaya promosi yang diperlukan cukup tinggi'),
(39, 'Aspek Pemasaran', '2.7. Risiko Promosi', '2.7.3. Alat bantu / tools promosi tidak tersedia', 'Alat bantu/tools promosi sangat diperlukan untuk menarik pelanggan, sehingga ketidaktersediaannya akan berpengaruh pada ketertarikan kastemer pada produk/jasa kita'),
(40, 'Aspek Pemasaran', '2.8. Risiko Penelitian Pasar', '2.8.1. Tidak akurat', 'a. Ketidaktepatan pemilihan produk'),
(41, 'Aspek Pemasaran', '2.8. Risiko Penelitian Pasar', '2.8.1. Tidak akurat', 'b. Ketidakakuratan analisis pasar'),
(42, 'Aspek Pemasaran', '2.8. Risiko Penelitian Pasar', '2.8.1. Tidak akurat', 'c. Ketidaktepatan pembuatan studi kelayakan'),
(43, 'Aspek Pemasaran', '2.8. Risiko Penelitian Pasar', '2.8.2. Wilayah penelitian tidak terwakili', 'Pemilihan wilayah penelitian yang tidak memperhatikan kesesuaian produk dan pasarnya.'),
(44, 'Aspek Pemasaran', '2.9. Risiko Regulasi', '2.9.1. Regulasi Pemerintah berubah', 'Amandemen Kontrak/Surat Pesanan untuk menyesuaikan perubahan regulasi.'),
(45, 'Aspek Pemasaran', '2.9. Risiko Regulasi', '2.9.2. Regulasi dan budaya di sisi kastemer berubah', 'Amandemen Kontrak/Surat Pesanan untuk menyesuaikan perubahan regulasi.'),
(46, 'Aspek Pemasaran', '2.9. Risiko Regulasi', '2.9.3. Regulasi di internal perusahaan berubah', 'Amandemen Kontrak/Surat Pesanan untuk menyesuaikan perubahan regulasi.'),
(47, 'Aspek Pemasaran', '2.9. Risiko Regulasi', '2.9.4. Batasan wilayah pemasaran', 'Amandemen Kontrak/Surat Pesanan untuk menyesuaikan perubahan regulasi.'),
(48, 'Aspek Pemasaran', '2.10. Risiko Pelayanan', '2.10.1. Ketidakpuasan', 'Kurangnya pelayanan karena keterbatasan infrastruktur serta fasilitas pendukung yang kurang memadai'),
(49, 'Aspek Pemasaran', '2.10. Risiko Pelayanan', '2.10.2. Corporate image / reputasi buruk', 'a. Menurunnya citra dan reputasi Perusahaan  di mata stakeholder akibat kesalahan penyampaian informasi'),
(50, 'Aspek Pemasaran', '2.10. Risiko Pelayanan', '2.10.2. Corporate image / reputasi buruk', 'b. Keterlambatan penyusunan RJPP dan RKAP yang berdampak kepada tingkat kesehatan perusahaan'),
(51, 'Aspek Keuangan & Akuntansi', '3.1. Risiko Utang/kredit', '3.1.1. Kenaikan tingkat suku bunga', 'Suku bunga yang fluktuatif mengakibatkan ketidakpastian perhitungan nilai'),
(52, 'Aspek Keuangan & Akuntansi', '3.1. Risiko Utang/kredit', '3.1.2. Kesulitan mencari sumber dana', 'a. Risiko Kredit'),
(53, 'Aspek Keuangan & Akuntansi', '3.1. Risiko Utang/kredit', '3.1.1. Kenaikan tingkat suku bunga', 'b. Risiko Regulasi '),
(54, 'Aspek Keuangan & Akuntansi', '3.1. Risiko Utang/kredit', '3.1.3. Nilai hutang yang besar', 'Proyek yang cukup besar mengakibatkan adanya pinjaman / hutang sebagai modal kerja yang cukup besar pula'),
(55, 'Aspek Keuangan & Akuntansi', '3.2. Risiko Piutang', '3.2.1. Macet/tidak tertagih', 'a. Tidak tercapainya tingkat efektifitas penyaluran pinjaman sesuai dengan target yang telah ditetapkan dalam RKAP'),
(56, 'Aspek Keuangan & Akuntansi', '3.2. Risiko Piutang', '3.2.1. Macet/tidak tertagih', 'b. Tidak tercapainya tingkat kolektibilitas pengembalian pinjaman sesuai dengan target yang telah ditetapkan dalam RKAP'),
(57, 'Aspek Keuangan & Akuntansi', '3.2. Risiko Piutang', '3.2.2. Terlambat bayar', 'Kemungkinan terjadinya keterlambatan pembayaran karena budaya / peraturan perusahaan kastemer yang berbeda-beda '),
(58, 'Aspek Keuangan & Akuntansi', '3.2. Risiko Piutang', '3.2.3.  Cara pembayaran yang menyebabkan cash flow lama', 'Cara pembayaran yang disepakati di dalam kontrak berpotensi penerimaan cash cukup lama'),
(59, 'Aspek Keuangan & Akuntansi', '3.3. Risiko Asuransi & Jaminan', '3.3.1. Manfaat tidak optimal', 'Tidak ada syarat penerbitan asuransi di dalam kontrak'),
(60, 'Aspek Keuangan & Akuntansi', '3.3. Risiko Asuransi & Jaminan', '3.3.2. Klaim sulit/lama', 'Klaim karena kehilangan material proyek atau akibat kejadian bukan karena kesalahan sendiri, prosesnya cukup lama'),
(61, 'Aspek Keuangan & Akuntansi', '3.3. Risiko Asuransi & Jaminan', '3.3.3. Biaya/premi mahal', 'Biaya premi yang membebani perusahaan'),
(62, 'Aspek Keuangan & Akuntansi', '3.3. Risiko Asuransi & Jaminan', '3.3.4. Penerbitan Jaminan yang lama', 'Proses penerbitan baik dari sisi internal dan eksternal yang panjang'),
(63, 'Aspek Keuangan & Akuntansi', '3.4. Risiko Pajak', '3.4.1. Denda keterlambatan', 'Keterlambatan penyelesaian proyek'),
(64, 'Aspek Keuangan & Akuntansi', '3.4. Risiko Pajak', '3.4.2. Restitusi sulit/lama', '-'),
(65, 'Aspek Keuangan & Akuntansi', '3.5. Risiko Kurs', '3.5.1. Kenaikan nilai kurs', 'Risiko Perubahan Kurs'),
(66, 'Aspek Keuangan & Akuntansi', '3.6. Risiko Budgeting', '3.6.1. Salah estimasi', 'a. Ketidaktepatan kebijakan akuntansi'),
(67, 'Aspek Keuangan & Akuntansi', '3.6. Risiko Budgeting', '3.6.1. Salah estimasi', 'b. Distorsi akuntansi diakibatkan kesalahan  estimasi, window-dressing dan kegagalan  menangkap realitas ekonomius'),
(68, 'Aspek Keuangan & Akuntansi', '3.6. Risiko Budgeting', '3.6.2. Tidak terkendali', 'a. Realisasi biaya produksi dan operasi yang melebihi rencana anggaran biaya'),
(69, 'Aspek Keuangan & Akuntansi', '3.6. Risiko Budgeting', '3.6.2. Tidak terkendali', 'b. Realisasi biaya overhead yang melebihi rencana anggaran biaya'),
(70, 'Aspek Keuangan & Akuntansi', '3.6. Risiko Budgeting', '3.6.3. Keterbatasan dana/anggaran', 'Risiko Operasional Divisi'),
(71, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.1. Salah catat/posting', 'a. Ketidakakuratan laporan perolehan kontrak dan penjualan'),
(72, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.1. Salah catat/posting', 'b. Ketidakwajaran laporan keuangan'),
(73, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'a. Ketidakakuratan perhitungan harga penawaran'),
(74, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'b. Ketidakakuratan penyusunan rencana anggaran biaya'),
(75, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'c. Ketidakakuratan penyusunan WBS'),
(76, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'd. Ketidakakuratan perhitungan perolehan hasil penjualan'),
(77, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'e. Ketidakakuratan dalam perhitungan, pengalokasian beban-beban yang menjadi tanggung jawabnya '),
(78, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'f.  Ketidakakuratan dokumen transaksi tanggung jawabnya'),
(79, 'Aspek Keuangan & Akuntansi', '3.7. Risiko Pencatatan', '3.7.2. Salah perhitungan ', 'g. Ketidaklengkapan dokumen pendukung'),
(80, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.1. Tidak ideal', 'a. Penempatan Pegawai tidak sesuai kebutuhan'),
(81, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.1. Tidak ideal', 'b. Penempatan Pegawai tidak sesuai persyaratan jabatan'),
(82, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.1. Tidak ideal', 'c. Kesenjangan antara kompetensi karyawan dan persyaratan jabatan'),
(83, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.2. Beban kerja tidak seimbang', 'a. Monitoring berkurangnya tenaga kerja akibat  terminasi tidak dilakukan'),
(84, 'Aspek SDM', '4.1.  Risiko Organisasi', '4.1.2. Beban kerja tidak seimbang', 'b. Jobdesc yang tidak jelas'),
(85, 'Aspek SDM', '4.2. Risiko Rekruitmen', '4.2.1. Tidak akurat', 'Proses rekrutmen dan seleksi tidak sesuai dengan ketentuan yang berlaku'),
(86, 'Aspek SDM', '4.2. Risiko Rekruitmen', '4.2.2. Tidak obyektif', '-'),
(87, 'Aspek SDM', '4.2. Risiko Rekruitmen', '4.2.3. Lamanya proses rekruitmen', 'Proses rekrutmen yang dilakukan secara benar, untuk memperoleh bibit unggul memerlukan waktu yang cukup lama'),
(88, 'Aspek SDM', '4.3. Risiko Mutasi/Rotasi/Promosi', '4.3.1. Tidak sesuai skill/keahlian', 'Proses rekrutmen dan seleksi tidak sesuai dengan ketentuan yang berlaku'),
(89, 'Aspek SDM', '4.3. Risiko Mutasi/Rotasi/Promosi', '4.3.2. Terdapat GAP kompetensi', '-'),
(90, 'Aspek SDM', '4.3. Risiko Mutasi/Rotasi/Promosi', '4.3.3. Kecemburuan sosial', 'Tim kurang solid'),
(91, 'Aspek SDM', '4.4. Risiko Pembinaan dan Pengembangan', '4.4.1. Produktivitas rendah', 'Ketidakcukupan jumlah, kapasitas dan kapabilitas SDM'),
(92, 'Aspek SDM', '4.4. Risiko Pembinaan dan Pengembangan', '4.4.2. Kompetensi buruk', 'Ketidaksesuaian kuantitas dan kompetensi SDM di lapangan'),
(93, 'Aspek SDM', '4.4. Risiko Pembinaan dan Pengembangan', '4.4.3. Perilaku buruk (loyalitas, kedisiplinan)', 'Kurangnya loyalitas ke perusahaan karena mendahulukan kepentingan pribadinya'),
(94, 'Aspek SDM', '4.5. Risiko Kesejahteraan', '4.5.1. Ketidakpuasan/keresahan', 'Beban pekerjaan yang dipikul lebih berat dibandingkan pendapatannya.'),
(95, 'Aspek SDM', '4.5. Risiko Kesejahteraan', '4.5.2. Protes, mogok kerja, sabotase', 'a. Akibat lokasi proyek yang terlalu berat sehingga mengalami kesulitan untuk beradaptasi.'),
(96, 'Aspek SDM', '4.5. Risiko Kesejahteraan', '4.5.2. Protes, mogok kerja, sabotase', 'b. Akibat penghasilan yang tidak sebanding dengan effort yang dikeluarkan'),
(97, 'Aspek SDM', '4.5. Risiko Kesejahteraan', '4.5.2. Protes, mogok kerja, sabotase', 'c. Apabila menggunakan jasa mitra, dikarenakan kondisi keuangan perusahaan yang kurang baik sehingga pembayaran ke mitra menjadi tertunda.'),
(98, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.1. Obsolete/ketinggalan', '-'),
(99, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.2.  Kesulitan implementasi', 'a. Perubahan bisnis tidak teridentifikasi dengan jelas (RKAP).'),
(100, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.2.  Kesulitan implementasi', 'b. Prosedur yang terlalu panjang, mempersulit implementasi'),
(101, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.3. Kelemahan prosedur', 'a. Proses orientasi karyawan/pejabat baru tidak sesuai ketentuan yang berlaku'),
(102, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.3. Kelemahan prosedur', 'b. Proses penilaian, punishment tidak sesuai ketentuan yang berlaku'),
(103, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.3. Kelemahan prosedur', 'c. Pemberian reward tidak berdasarkan kontribusi  dan performansi yang fair'),
(104, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.4. Tidak ada prosedur', 'a. Tidak ada dokumen Perencanaan Kebutuhan Tenaga Kerja'),
(105, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.4. Tidak ada prosedur', 'b. Tidak  ada dokumen  job profile '),
(106, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.4. Tidak ada prosedur', 'c. Tidak ada potret job holder '),
(107, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.4. Tidak ada prosedur', 'd. Karyawan tidak memiliki job profile'),
(108, 'Aspek SDM', '4.6. Risiko Sistem dan Prosedur', '4.6.4. Tidak ada prosedur', 'e. Master data pegawai tidak akurat  dan tidak secure'),
(109, 'Aspek SDM', '4.7. Risiko Kecelakaan Kerja', '4.7.1. Jatuh, terpeleset, terpelanting / tersengat listrik', 'Gangguan keamanan kesehatan dan keselamatan kerja'),
(110, 'Aspek SDM', '4.7. Risiko Kecelakaan Kerja', '4.7.2. Kejatuhan alat / perangkat / bahan baku', '-'),
(111, 'Aspek SDM', '4.7. Risiko Kecelakaan Kerja', '4.7.3. Terjepit, tergilas, tergores, terpotong ', ''),
(112, 'Aspek SDM', '4.7. Risiko Kecelakaan Kerja', '4.7.4. Terkena bahan berbahaya', '-'),
(113, 'Aspek Pengadaan', '5.1. Risiko Proses/ Pembelian', '5.1.1. Tidak ready stock', 'Ketidakakuratan kuantitas'),
(114, 'Aspek Pengadaan', '5.1. Risiko Proses/ Pembelian', '5.1.2. Pasokan tidak kontinyu', 'Kapasitas produksi vendor/supplier tidak sesuai dengan kesepakatan.'),
(115, 'Aspek Pengadaan', '5.1. Risiko Proses/ Pembelian', '5.1.3. Pembelian tertunda', 'a. Ada hambatan pada prosedur internal karena terlalu panjang/lama'),
(116, 'Aspek Pengadaan', '5.1. Risiko Proses/ Pembelian', '5.1.3. Pembelian tertunda', 'b. Kondisi keuangan perusahaan yang kurang baik'),
(117, 'Aspek Pengadaan', '5.1. Risiko Proses/ Pembelian', '5.1.3. Pembelian tertunda', 'c. Cara pembayaran yang mengharuskan adanya uang muka'),
(118, 'Aspek Pengadaan', '5.1. Risiko Proses/ Pembelian', '5.1.4. Proses lama', 'Baik proses internal maupun eksternal.'),
(119, 'Aspek Pengadaan', '5.2. Risiko Kualitas', '5.2.1. Kualitas buruk', 'Spek sudah sesuai dengan requirement, tapi kualitasnya tidak bagus. Baik kualitas material maupun jasa. Vendor / supplier / subkontraktor tidak support juga termasuk di sini.'),
(120, 'Aspek Pengadaan', '5.2. Risiko Kualitas', '5.2.2. Tidak sesuai spesifikasi', 'Spek material & jasa tidak sesuai dikarenakan sebab internal perusahaan ataupun eksternal (vendor/supplier/subkontraktor)'),
(121, 'Aspek Pengadaan', '5.2. Risiko Kualitas', '5.2.3. Spesifikasi tidak standar', '-'),
(122, 'Aspek Pengadaan', '5.3. Risiko Harga Beli', '5.3.1. Kenaikan harga', 'Ketidaksesuaian biaya'),
(123, 'Aspek Pengadaan', '5.3. Risiko Harga Beli', '5.3.2. Harga monopoli', 'Hanya ada 1 vendor/supplier/mitra karena dikejar target waktu dari kastemer'),
(124, 'Aspek Pengadaan', '5.3. Risiko Harga Beli', '5.3.3. Cara pembayaran ke vendor/supplier/mitra tidak back-to-back dengan cara pembayaran dari kastemer', '-'),
(125, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.1. Terlambat / tertunda', 'a. Keterlambatan dan ketidaktepatan tujuan pengiriman material ke lokasi'),
(126, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.1. Terlambat / tertunda', 'b. Kesalahan lokasi pengiriman'),
(127, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.2. Tidak sesuai jadwal', 'a. Kondisi cuaca yang tidak baik'),
(128, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.2. Tidak sesuai jadwal', 'b. Hari besar agama / kepercayaan ataupun hari besar lainnya yang berpengaruh pada mundurnya jadwal pengiriman'),
(129, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.2. Tidak sesuai jadwal', 'c. Adanya peristiwa tertentu seperti unjuk rasa, protes dan sebagainya.'),
(130, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.3. Barang hilang/rusak di jalan', 'Potensi kehilangan barang pada saat distribusi ke lokasi.'),
(131, 'Aspek Pengadaan', '5.4. Risiko Pengiriman / Kedatangan', '5.4.4. Packing', ''),
(132, 'Aspek Pengadaan', '5.5. Risiko Transportasi', '5.5.1. Tarif angkutan naik', 'Akibat harga BBM naik, dan sebagainya'),
(133, 'Aspek Pengadaan', '5.5. Risiko Transportasi', '5.5.2. Sulit mencari angkutan', ''),
(134, 'Aspek Pengadaan', '5.5. Risiko Transportasi', '5.5.3. Angkutan tidak ada / kurang memadai / rusak', ''),
(135, 'Aspek Pengadaan', '5.6. Risiko Penerimaan / Bongkar Muat', '5.6.1. Verifikasi lama/lambat', ''),
(136, 'Aspek Pengadaan', '5.6. Risiko Penerimaan / Bongkar Muat', '5.6.2. Verifikasi tidak akurat', ''),
(137, 'Aspek Pengadaan', '5.6. Risiko Penerimaan / Bongkar Muat', '5.6.3. Demmurage tinggi (penambahan biaya untuk pemakaian kontainer/peti kemas di pelabuhan)', '-'),
(138, 'Aspek Pengadaan', '5.6. Risiko Penerimaan / Bongkar Muat', '5.6.4. Discharging rate rendah (Kecepatan bongkar muat yang rendah)', '-'),
(139, 'Aspek Pengadaan', '5.6. Risiko Penerimaan / Bongkar Muat', '5.6.5. Susut/rusak', '-'),
(140, 'Aspek Pengadaan', '5.7. Risiko Penyimpanan', '5.7.1. Barang hilang', ''),
(141, 'Aspek Pengadaan', '5.7. Risiko Penyimpanan', '5.7.2.  Barang rusak', ''),
(142, 'Aspek Pengadaan', '5.7. Risiko Penyimpanan', '5.7.3. Tidak tertata', '-'),
(143, 'Aspek Pengadaan', '5.7. Risiko Penyimpanan', '5.7.4. Selisih stock (over/under)', 'Buffer stock tidak terserap karena kegagalan tender terutama untuk produk dengan pengadaan buffer stock sebelum penunjukan pemenang'),
(144, 'Aspek Pengadaan', '5.8. Risiko Pencatatan / Dokumentasi', '5.8.1. Pencatatan/dokumentasi tidak kontinyu', 'Tidak ada pencatatan secara periodik'),
(145, 'Aspek Pengadaan', '5.8. Risiko Pencatatan / Dokumentasi', '5.8.2. Pencatatan/dokumentasi tidak konsisten', 'Peristiwa/kejadian/nama barang yang sama, penyebutan di laporannya berbeda-beda'),
(146, 'Aspek Hukum', '6.1. Risiko Perizinan', '6.1.1. Pencabutan Izin Usaha', '-'),
(147, 'Aspek Hukum', '6.1. Risiko Perizinan', '6.1.2. Kesulitan perizinan', 'Kendala penyelesaian perizinan'),
(148, 'Aspek Hukum', '6.1. Risiko Perizinan', '6.1.3. Terjadinya sengketa', '-'),
(149, 'Aspek Hukum', '6.1. Risiko Perizinan', '6.1.4. Penyerobotan aset', '-'),
(150, 'Aspek Hukum', '6.2. Risiko Berperkara', '6.2.1. Pidana', 'Masalah hak kekayaan intelektual dari produk yang akan dikembangkan'),
(151, 'Aspek Hukum', '6.2. Risiko Berperkara', '6.2.2. Kehilangan aset', '-'),
(152, 'Aspek Hukum', '6.2. Risiko Berperkara', '6.2.3. Denda administrasi', 'Penjatuhan hukuman berupa ganti rugi dan pemidanaan'),
(153, 'Aspek Hukum', '6.2. Risiko Berperkara', '6.2.4. Biaya perkara tinggi', '-'),
(154, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.1. Tuntutan/Klaim', 'a. Kelemahan isi kontrak penjualan terkait delivery, affirmative covenant, negative covenant, pemutusan kontrak, denda  keterlambatan, pelanggaran HAKI dan tidak adanya klausul penyesuaian harga yang  diakibatkan oleh perubahan nilai tukar mata uang'),
(155, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.1. Tuntutan/Klaim', 'b. Adanya tuntutan hukum perdata, pidana dan tata usaha negara'),
(156, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.2.   Transaksi batal', '-'),
(157, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.3.  Dispute/perselisihan', 'Pelanggaran perjanjian/kontrak'),
(158, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.4.  Mitra ingkar janji', 'a. Kurang selektif dalam memilih calon customer terkait dengan status legalitas dan kemampuan financial customer'),
(159, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.4.  Mitra ingkar janji', 'b. Pelanggaran perjanjian'),
(160, 'Aspek Hukum', '6.3. Risiko Bertransaksi', '6.3.4.  Mitra ingkar janji', 'c. Terputusnya hubungan dengan mitra kerja'),
(161, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.1.  Pemalsuan produk', ''),
(162, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.2. Pemalsuan identitas', '-'),
(163, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.3. Penyalahgunaan wewenang', 'a. Mengetahui peraturan namun melanggar'),
(164, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.3. Penyalahgunaan wewenang', 'b. Tidak mengetahui peraturan dan sudah pasti melanggar'),
(165, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.3. Penyalahgunaan wewenang', 'c. Ada peraturan namun salah pemahaman'),
(166, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.4. Penyimpangan prosedur', 'a.  SLA (Service Level Agreement) yang tidak optimal dari fungsi terkait (administrasi, teknis, finance, legal) untuk mencapai  target kontrak yang berkualitas'),
(167, 'Aspek Hukum', '6.4. Risiko Penyimpangan /Penyelewengan', '6.4.4. Penyimpangan prosedur', 'b. Kelemahan isi perjanjian'),
(168, 'Aspek Hukum', '6.5. Risiko Keamanan', '6.5.1. Kriminalitas', 'Gangguan keamanan di lokasi proyek'),
(169, 'Aspek Hukum', '6.5. Risiko Keamanan', '6.5.2. Sabotase', '-'),
(170, 'Aspek Hukum', '6.5. Risiko Keamanan', '6.5.3. Provokasi dan demonstrasi', '-'),
(171, 'Aspek Hukum', '6.5. Risiko Keamanan', '6.5.4. Penyusupan', '-'),
(172, 'Aspek Hukum', '6.5. Risiko Keamanan', '6.5.5. Teror', ''),
(173, 'Aspek Hukum', '6.6.  Risiko Komunikasi', '6.6.1. Kesalahpahaman', 'Terjadinya kesalahan dalam penyebaran informasi di internal perusahaan'),
(174, 'Aspek Hukum', '6.6.  Risiko Komunikasi', '6.6.2.  Misi tidak sampai', 'Tidak update pada peraturan yang terakhir berlaku'),
(175, 'Aspek Sistem Informasi', '7.1. Risiko Hardware', '7.1.1. Usang/Obsolete', ''),
(176, 'Aspek Sistem Informasi', '7.1. Risiko Hardware', '7.1.2. Rusak', '-'),
(177, 'Aspek Sistem Informasi', '7.1. Risiko Hardware', '7.1.3. Tidak memadai', ''),
(178, 'Aspek Sistem Informasi', '7.1. Risiko Hardware', '7.1.4. Hilang', '-'),
(179, 'Aspek Sistem Informasi', '7.2. Risiko Software', '7.2.1. Tidak sesuai kebutuhan', ''),
(180, 'Aspek Sistem Informasi', '7.2. Risiko Software', '7.2.2. Kesulitan penyesuaian', '-'),
(181, 'Aspek Sistem Informasi', '7.3. Risiko Brainware', '7.3.1. Jumlah tidak memadai', '-'),
(182, 'Aspek Sistem Informasi', '7.3. Risiko Brainware', '7.3.2. Kompetensi rendah', '-'),
(183, 'Aspek Sistem Informasi', '7.4. Risiko Data', '7.4.1. Tidak terintegrasi', '-'),
(184, 'Aspek Sistem Informasi', '7.4. Risiko Data', '7.4.2. Tidak akurat', 'Data yang dibutuhkan tidak tersedia, sulit diperoleh, terlambat ataupun tidak lengkap'),
(185, 'Aspek Sistem Informasi', '7.5. Risiko Implementasi', '7.5.1. Gagal', '-'),
(186, 'Aspek Sistem Informasi', '7.5. Risiko Implementasi', '7.5.2. Tidak optimal', ''),
(187, 'Aspek Sistem Informasi', '7.6. Risiko Pengolahan/ Proses', '7.6.1. Gangguan listrik/daya', ''),
(188, 'Aspek Sistem Informasi', '7.6. Risiko Pengolahan/ Proses', '7.6.2. Gangguan server dari pihak luar', '-'),
(189, 'Aspek Sistem Informasi', '7.7.  Risiko Penyajian/ Laporan', '7.7.1. Tidak akurat', '-'),
(190, 'Aspek Sistem Informasi', '7.7.  Risiko Penyajian/ Laporan', '7.7.2. Terlambat', '-'),
(191, 'Aspek Sistem Informasi', '7.8. Risiko Keamanan', '7.8.1. Hilang data', 'Tingkat keamanan atas dokumen, fasilitas, aset tetap dan aset bergerak, karena meningkatnya jumlah tenant yang menyewa'),
(192, 'Aspek Sistem Informasi', '7.8. Risiko Keamanan', '7.8.2. Data berubah', '-'),
(193, 'Aspek Sistem Informasi', '7.8. Risiko Keamanan', '7.8.3.  Data sulit mencari', '-'),
(194, 'Aspek Sistem Informasi', '7.9. Risiko Jaringan', '7.9.1. Tidak handal', '-'),
(195, 'Aspek Sistem Informasi', '7.9. Risiko Jaringan', '7.9.2. Gangguan alat/sistem komunikasi', '-'),
(196, 'Aspek Pengembangan', '8.1. Risiko Perencanaan', '8.1.1. Salah desain', 'a. Inkonsistensi/ ketidakakuratan desain'),
(197, 'Aspek Pengembangan', '8.1. Risiko Perencanaan', '8.1.1. Salah desain', 'b. Perubahan desain'),
(198, 'Aspek Pengembangan', '8.1. Risiko Perencanaan', '8.1.2. Salah estimasi', 'a. Ketidaktepatan perencanaan: alokasi SDM, material dan  stock balancing'),
(199, 'Aspek Pengembangan', '8.1. Risiko Perencanaan', '8.1.2. Salah estimasi', 'b. Ketidaktepatan pembuatan jadwal implementasi'),
(200, 'Aspek Pengembangan', '8.1. Risiko Perencanaan', '8.1.2. Salah estimasi', 'c. Ketidakakuratan perhitungan biaya produksi'),
(201, 'Aspek Pengembangan', '8.1. Risiko Perencanaan', '8.1.3. Salah pemilihan teknologi', 'Ketidaktepatan proyeksi teknologi'),
(202, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.1. Mundur', 'a. Terganggunya proses produksi produk yang diperlukan'),
(203, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.1. Mundur', 'b. Kemungkinan terjadinya masalah terkait vendor atau supplier dalam hal pengembangan produk'),
(204, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'a. Keterlambatan penyelesaian produk'),
(205, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'b. Terkendalanya prosedur manajemen pengembangan proyek'),
(206, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'c. Ketidakmampuan mitra untuk melanjutkan penyelesaian proyek'),
(207, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'd. Perubahan prosedur oleh pelanggan'),
(208, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'e. Ketidaktepatan memilih partner'),
(209, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'f. Keterlambatan pembuatan proposal teknis'),
(210, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'g. Keterlambatan waktu Uji Coba Lapangan (UCL)'),
(211, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.2. Terlambat', 'h. Ketidaktersediaan SDM'),
(212, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.3. Gagal', 'a. Terhentinya proyek dengan kondisi SDM sudah tersedia dan sudah terlatih'),
(213, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.3. Gagal', 'b. Terkendalanya pengembangan teknologi produk'),
(214, 'Aspek Pengembangan', '8.2. Risiko Pelaksanaan', '8.2.3. Gagal', 'c. Ketidakmampuan memenuhi isi kontrak'),
(215, 'Aspek Pengembangan', '8.3. Risiko Pengawasan', '8.3.1. Tidak efektif/lemah', 'Ketidakakuratan quality control'),
(216, 'Aspek Pengembangan', '8.3. Risiko Pengawasan', '8.3.2. Tidak profesional', 'Ketidaksesuaian kualitas hasil pekerjaan dengan kontrak penjualan'),
(217, 'Aspek Pengembangan', '8.3. Risiko Pengawasan', '8.3.3. Tidak bermanfaat', '-'),
(218, 'Aspek Pengawasan', '9.1. Risiko Perencanaan', '9.1.1. Tidak akurat', 'a. Ketidakakuratan hasil survey'),
(219, 'Aspek Pengawasan', '9.1. Risiko Perencanaan', '9.1.1. Tidak akurat', 'b. Ketidakakuratan penyusunan bill of quantity (BOQ)'),
(220, 'Aspek Pengawasan', '9.1. Risiko Perencanaan', '9.1.2. Tidak tepat', 'a. Ketidaktepatan penyusunan jadwal rapat Direksi'),
(221, 'Aspek Pengawasan', '9.1. Risiko Perencanaan', '9.1.2. Tidak tepat', 'b. Ketidaktepatan penyusunan fokus objek pemeriksaan, tidak terukurnya rentang kendali dalam hal penyusunan program  kerja pengawasan tahunan dan ketidakselarasan audit program'),
(222, 'Aspek Pengawasan', '9.2. Risiko Pelaksanaan', '9.2.1. Terlalu lama', 'a.  Keterlambatan penyelesaian proyek'),
(223, 'Aspek Pengawasan', '9.2. Risiko Pelaksanaan', '9.2.1. Terlalu lama', 'b. Keterlambatan penyelesaian perencanaan  (survey, BOQ, dan lain-lain)'),
(224, 'Aspek Pengawasan', '9.2. Risiko Pelaksanaan', '9.2.2. Tidak ada hasil', '-'),
(225, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'a.  Monitoring tindak lanjut risalah rapat Direksi yang kurang maksimal'),
(226, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'b. Kekurangcermatan dalam evaluasi Senior Project Manager oleh auditor, kurangnya pemahaman tentang standar performansi mengenai pemenuhan fungsi pelayanan  auditee, kurangnya pemahaman tentang  peraturan yang berlaku baik internal maupun eksternal, tidak adanya tolak ukur / standar kinerja mengenai tingkat efektivitas, efisiensi dan ekonomis suatu kegiatan'),
(227, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'c. Kurangnya pemahaman auditor tentang perkembangan sistem dan prosedur  akuntansi yang berlaku di perusahaan dan yang berlaku secara umum'),
(228, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'd. Kurangnya pemahaman tentang pengelolaan aset perusahaan sehingga salah menerapkan metode penilaian'),
(229, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'e.  Kertas kerja audit tidak mencerminkan  langkah kerja sesuai audit program, tidak dapat digunakan sebagai dasar  penyusunan LHA (Laporan Hasil Audit) dan tidak memuat kesimpulan audit'),
(230, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'f.   Tidak adanya relevansi dari atribut-atribut temuan dalam penyusunan dan review notisi audit'),
(231, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'g.  Terjadinya perbedaan persepsi antara  auditor dan auditee, termasuk ketidakmauan auditee menerima rekomendasi'),
(232, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'h.  Terlambatnya penyusunan dan distribusi  LHA (Laporan Hasil Audit)'),
(233, 'Aspek Pengawasan', '9.3. Risiko Evaluasi', '9.3.1.  Pengembangan temuan lemah', 'i.   Minimnya pemantauan untuk memastikan  tindak lanjut rekomendasi hasil audit intern & ekstern oleh auditee'),
(234, 'Aspek Pengawasan', '9.4. Pelaporan', '9.4.1. Tidak tepat waktu', 'a. Ketidaklengkapan dokumen produksi'),
(235, 'Aspek Pengawasan', '9.4. Pelaporan', '9.4.1. Tidak tepat waktu', 'b. Keterlambatan penyusunan laporan  manajemen bulanan, triwulanan dan tahunan '),
(236, 'Aspek Pengawasan', '9.4. Pelaporan', '9.4.1. Tidak tepat waktu', 'c. Keterlambatan entry FIS (financial information system) pada portal BUMN'),
(237, 'Aspek Pengawasan', '9.4. Pelaporan', '9.4.1. Tidak tepat waktu', 'd. Ketidaktepatan penyusunan risalah rapat Direksi, risalah rapat gabungan (Direksi dan Dewan Komisaris) dan risalah Rapat Umum Pemegang Saham'),
(238, 'Aspek Pengawasan', '9.4. Pelaporan', '9.4.2. Tidak ada nilai tambah', '-'),
(239, 'Aspek Pengawasan', '9.5. Pemantauan Tindak Lanjut', '9.5.1. Tidak efektif', 'Kurangnya kontrol waktu pelaksanaan proyek '),
(240, 'Aspek Pengawasan', '9.5. Pemantauan Tindak Lanjut', '9.5.2.  Tidak dilaksanakan', 'Lemahnya koordinasi dengan pihak internal dan eksternal'),
(241, 'Aspek Pengawasan', '9.6. Risiko Counterpart', '9.6.1. Jadwal mundur', '-'),
(242, 'Aspek Pengawasan', '9.6. Risiko Counterpart', '9.6.2. Temuan banyak', '-'),
(243, 'Aspek Operasi', '10.1. Risiko Perencanaan', '10.1.1. Tidak tepat menyusun jadwal (Plan of Work/POW)', 'Ketidaktepatan penyusunan jadwal implementasi'),
(244, 'Aspek Operasi', '10.1. Risiko Perencanaan', '10.1.2. Tidak tepat menyusun kebutuhan material, SDM, dan lain-lain', 'Kelebihan/kekurangan material/SDM, dan sebagainya'),
(245, 'Aspek Operasi', '10.1. Risiko Perencanaan', '10.1.3. Lahan/lokasi yang disediakan tidak sesuai dengan planning', 'Lahan/lokasi yang sempit, dan sebagainya'),
(246, 'Aspek Operasi', '10.1. Risiko Perencanaan', '10.1.4. Metode perencanaan kurang matang', 'Metode perencanaan tidak memperhatikan potensi cashflow yang lancar dan cepat'),
(247, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.1. Gangguan Keamanan', 'Gangguan keamanan di lokasi proyek'),
(248, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.2. Kendala Perizinan', 'Penolakan dari penduduk setempat/kepala suku/pemerintah setempat'),
(249, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.3. Kualitas tidak sesuai spek', ''),
(250, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.4. Pekerjaan terlambat', 'Keterlambatan penyelesaian proyek'),
(251, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.5. Tidak tersedia sumber daya tepat waktu dan tepat jumlah', 'Ketidaksesuaian kuantitas dan kompetensi SDM di lapangan'),
(252, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.6. Perubahan musim', 'Gangguan cuaca yang cukup ekstrim mengganggu kegiatan di lapangan'),
(253, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.7. Bencana Alam', 'Terjadinya bencana alam : gempa bumi, banjir, kebakaran, tanah longsor, dan sebagainya'),
(254, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.8. Akses ke lokasi yang cukup berat', 'a. Areanya berbatu-batu'),
(255, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.8. Akses ke lokasi yang cukup berat', 'b. Tanahnya lembek/pasir sehingga apabila hujan sangat licin dan mobil bisa tergelincir'),
(256, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.8. Akses ke lokasi yang cukup berat', 'c. Harus menyeberangi pulau sehingga perlu perahu/helikopter/pesawat terbang kecil'),
(257, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.9. Terganggunya komunikasi', 'Sulitnya komunikasi dengan tim di lokasi karena belum adanya sarana prasarana komunikasi yang memadai'),
(258, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.10. Metode pelaksanaan', 'a. Tidak sesuai dengan perencanaan'),
(259, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.10. Metode pelaksanaan', 'b. Kurang memperhatikan hal-hal krusial yang berpengaruh pada mundurnya pembayaran dari kastemer'),
(260, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.11. Risiko Tools & Equipment', 'a. Kurangnya tools/equipment pendukung penyelesaian pekerjaan'),
(261, 'Aspek Operasi', '10.2. Risiko Pelaksanaan', '10.2.11. Risiko Tools & Equipment', 'b. Tools/equipment di lokasi rusak'),
(262, 'Aspek Operasi', '10.3. Risiko Pengawasan', '10.3.1. Kurangnya pengawasan secara rutin', 'Pengawas di lapangan tidak menjalankan tugasnya dengan baik. '),
(263, 'Aspek Operasi', '10.4. Risiko Pelaporan & Dokumentasi', '10.4.1. Ketidakakuratan laporan', 'Data yang digunakan sebagai acuan kurang valid'),
(264, 'Aspek Operasi', '10.4. Risiko Pelaporan & Dokumentasi', '10.4.2. Keterlambatan  penyusunan laporan', 'Sumber data yang didapatkan dari banyak pihak terkait yang tidak sama waktu submission-nya'),
(265, 'Aspek Operasi', '10.4. Risiko Pelaporan & Dokumentasi', '10.4.3. Keterlambatan pembuatan dokumen pendukung penagihan', 'a. Keterlambatan penyelesaian ABD (As Built Drawing)'),
(266, 'Aspek Operasi', '10.4. Risiko Pelaporan & Dokumentasi', '10.4.3. Keterlambatan pembuatan dokumen pendukung penagihan', 'b. Keterlambatan penerbitan BAUT (Berita Acara Uji Terima)'),
(267, 'Aspek Operasi', '10.4. Risiko Pelaporan & Dokumentasi', '10.4.3. Keterlambatan pembuatan dokumen pendukung penagihan', 'c. Keterlambatan penerbitan BAST (Berita Acara Serah Terima)'),
(268, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.1. Gambar desain', 'a. Gambar desain kurang presisi'),
(269, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.1. Gambar desain', 'b. Perubahan desain menyebabkan perubahan gambar desain'),
(270, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.2. Bill of Quantity', 'a. Kesalahan penterjemahan dari gambar desain ke dalam BoQ'),
(271, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.2. Bill of Quantity', 'b. Lamanya waktu penyelesaian BOQ'),
(272, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.2. Bill of Quantity', 'c. Perubahan desain menyebabkan perubahan BOQ'),
(273, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.3. List of Material (LOM)', 'a. List of Material (LOM) lama prosesnya (proses penerbitan Quality Assurance / QA)'),
(274, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.3. List of Material (LOM)', 'b. Tidak disetujuinya material yang diajukan dalam LOM oleh kastemer'),
(275, 'Aspek Engineering', '11.1. Risiko Dokumen Pendukung Teknis', '11.1.4. Bill of Material (BOM)', 'Lamanya waktu penyelesaian Bill of Material (BOM)'),
(276, 'Aspek Engineering', '11.2. Risiko Data', '11.2.1. Data awal kurang valid', 'Kebutuhan data awal untuk desain hanya didapatkan dari kastemer, jadi apabila data tersebut kurang valid, maka desain pun kemungkinan menjadi salah'),
(277, 'Aspek Engineering', '11.3. Risiko Produk', '11.3.1. Desain produk tidak sesuai dengan kebutuhan pasar', ''),
(278, 'Aspek Engineering', '11.3. Risiko Produk', '11.3.2. Lamanya release produk', ''),
(279, 'Aspek Engineering', '11.3. Risiko Produk', '11.3.3. Lamanya sertifikasi produk', ''),
(280, 'Aspek Engineering', '11.3. Risiko Produk', '11.3.4. Kendala pengurusan Hak Paten', ''),
(281, 'Aspek Produksi', '1.2. Risiko Alat/Equipment', '1.2.1. Rusak', '-'),
(282, 'Aspek SDM', '4.3. Risiko Mutasi/Rotasi/Promosi', '4.3.2. Terdapat GAP kompetensi', '-'),
(283, 'Aspek Produksi', '1.5. Risiko Lingkungan', '1.5.1. Pencemaran Lingkungan  (Bising, Bau, Racun, Debu)', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `jabatan` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `jabatan`) VALUES
(5, 'kyts', 'kyts20152016@gmail.com', 'sticker_(8).png', '$2y$10$luCUf7KfTWL8ySarM9P7WeR3F9.lRh1JzXMmi0QcbfHikO3bEjCAS', 2, 1, 1552618197, ''),
(6, 'tofan', 'ayabiknight@gmail.com', 'default.jpg', '$2y$10$N3UYPjPkuMhr.ontc48WmO2.vmS6ZvPzEeBGFpQRVWzAhBVSDaCea', 3, 1, 1552618428, ''),
(7, 'Tofan Aji Satria', 'tofanajisatria@gmail.com', '586b0b3ffcd60cc58909af5a68e44b8e.png', '$2y$10$0ttXt5WXPzXDHGxiXFuELOh6lqmCDfoQ1Itcmw8Uq6T0dZbST.C4m', 1, 1, 1554736297, 'Developer'),
(14, 'e risk', 'flabeosh@gmail.com', 'default.jpg', '$2y$10$9KH5k5bdgrxje2j8RItv8ekALO3n.44HINTFYEXOX06XIJpRNE6Ya', 2, 0, 1558337889, ''),
(15, 'Tofan', 'tofan@gmail.com', 'default.jpg', '$2y$10$9dGVyEjzaYN4bqY/OKOOs.nqjZUBnmuYa4I0hH182E/RBTBDq.l2y', 2, 0, 1560358981, ''),
(16, 'tofan', 'tofanajisatria@gmail.co', 'default.jpg', '$2y$10$0rPe69y7Iv1CHkXLmNFjzOw9dClKPj2iuYpuJiSgDeWU54djsUJou', 2, 0, 1567584765, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(21, 1, 4),
(24, 3, 2),
(25, 1, 3),
(26, 1, 2),
(27, 1, 5),
(29, 2, 4),
(30, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Menu'),
(4, 'pages'),
(5, 'One Page');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'super admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 1, 'Risk Library Management', 'Library', 'fas fa-fw fa-database', 1),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 4, 'Identification', 'pages/identifikasi', 'far fa-fw fa-hourglass', 1),
(10, 4, 'Risk Detail', 'pages/riskDetail', 'fas fa-fw fa-hourglass-start', 1),
(11, 4, 'Evaluation', 'pages/evaluasi', 'fas fa-fw fa-hourglass-half', 1),
(12, 4, 'Mitigation', 'pages/mitigasi', 'fas fa-fw fa-hourglass-end', 1),
(13, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(14, 4, 'Monitoring', 'pages/monitoring', 'fas fa-fw fa-hourglass', 1),
(15, 5, 'Assesment ', 'pages/onePage', 'far fa-fw fa-handshake', 1),
(17, 4, 'Summary', 'pages/summary', 'far fa-fw fa-paper-plane', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'tofanajisatria@gmail.co', 'DqYu7VVKAcCs+Re0Pwuyw7fcsof68gdxZ6e9mXxp0mY=', 1567584765);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `action_plan`
--
ALTER TABLE `action_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level_risiko`
--
ALTER TABLE `level_risiko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitigasi_berjalan`
--
ALTER TABLE `mitigasi_berjalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `one_page`
--
ALTER TABLE `one_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `risk_detail`
--
ALTER TABLE `risk_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sumber_risiko`
--
ALTER TABLE `sumber_risiko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `action_plan`
--
ALTER TABLE `action_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `identification`
--
ALTER TABLE `identification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `level_risiko`
--
ALTER TABLE `level_risiko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `mitigasi_berjalan`
--
ALTER TABLE `mitigasi_berjalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `one_page`
--
ALTER TABLE `one_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `risk_detail`
--
ALTER TABLE `risk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `sumber_risiko`
--
ALTER TABLE `sumber_risiko`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
