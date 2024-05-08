-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 09:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imi_ciamiskab`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_post` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_post` int(11) NOT NULL,
  `author` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `title_slug` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `post_status` enum('Publikasi','Draft') NOT NULL,
  `hits` varchar(250) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `host_check`
--

CREATE TABLE `host_check` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `downtime` int(11) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `host_check`
--

INSERT INTO `host_check` (`id`, `host`, `status`, `downtime`, `owner`, `tipe`) VALUES
(177, '103.110.11.5', 'ONLINE', 0, 'DISKOMINFO', NULL),
(178, '103.110.11.6', 'ONLINE', 0, 'DISKOMINFO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_post`
--

CREATE TABLE `kategori_post` (
  `id_kategori_post` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_post`
--

INSERT INTO `kategori_post` (`id_kategori_post`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Berita', '2023-11-03 04:13:30', '2023-11-03 04:13:35'),
(2, 'Event', '2023-11-03 04:13:37', '2023-11-03 04:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `log_error`
--

CREATE TABLE `log_error` (
  `id` int(11) NOT NULL,
  `id_website` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `kode_error` varchar(255) DEFAULT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `log_error`
--

INSERT INTO `log_error` (`id`, `id_website`, `website`, `kode_error`, `tgl`) VALUES
(5, 1, 'sirnabaya.desa.id', 'SSL_ERROR', '2023-10-31 22:43:21'),
(6, 3, 'pasirnagara.desa.id', 'SSL_ERROR', '2023-10-31 22:43:22'),
(7, 177, 'padaringan.desa.id', 'SSL_ERROR', '2023-10-31 22:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `log_host`
--

CREATE TABLE `log_host` (
  `id` int(11) NOT NULL,
  `id_host` int(11) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `log_ssl`
--

CREATE TABLE `log_ssl` (
  `id` int(11) NOT NULL,
  `id_website` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `kode_error` varchar(255) DEFAULT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `owner` varchar(16) NOT NULL,
  `status` set('Up','Down','','') NOT NULL,
  `date_down` varchar(11) NOT NULL,
  `level` varchar(250) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id_monitoring`, `url`, `owner`, `status`, `date_down`, `level`, `id_skpd`, `created_at`, `updated_at`) VALUES
(1, 'https://kesbangpol.ciamiskab.go.id/', 'Kesbangpol', 'Up', '', '', 26, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_skpd`
--

CREATE TABLE `ref_skpd` (
  `id_skpd` int(11) NOT NULL,
  `nama_skpd` varchar(200) NOT NULL,
  `nama_skpd_alias` varchar(100) NOT NULL,
  `jenis_skpd` varchar(100) DEFAULT NULL,
  `id_skpd_induk` int(11) DEFAULT NULL,
  `logo_skpd` varchar(255) NOT NULL,
  `telepon_skpd` varchar(255) NOT NULL,
  `email_skpd` varchar(255) NOT NULL,
  `alamat_skpd` text NOT NULL,
  `instagram_skpd` varchar(255) NOT NULL,
  `twitter_skpd` varchar(255) NOT NULL,
  `facebook_skpd` varchar(255) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `kode_pos` varchar(7) NOT NULL,
  `website` varchar(100) NOT NULL,
  `id_kecamatan` varchar(50) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ref_skpd`
--

INSERT INTO `ref_skpd` (`id_skpd`, `nama_skpd`, `nama_skpd_alias`, `jenis_skpd`, `id_skpd_induk`, `logo_skpd`, `telepon_skpd`, `email_skpd`, `alamat_skpd`, `instagram_skpd`, `twitter_skpd`, `facebook_skpd`, `fax`, `kode_pos`, `website`, `id_kecamatan`, `latitude`, `longitude`) VALUES
(1, 'Sekretariat Daerah', 'Setda', 'skpd', 0, 'kosong.png', '(0265) 771511', 'admin@ciamiskab.go.id', 'Jl. Jend. Sudirman No.16, Kel. Ciamis, Kec. Ciamis', '', '', '', '(0265) 771511', '46211', 'https://setda.ciamiskab.go.id/', NULL, '-73.242', '1,083,320'),
(2, 'Sekretariat DPRD', 'Setwan', 'skpd', 0, 'kosong.png', '(0265) 773900', '', 'Jl. Ir. H. Juanda No. 164, Kel. Ciamis, Kec. Ciamis', '@dprdkabupatenciamis', '', '', '(0265) 773900', '46211', 'https://setdprd.ciamiskab.go.id/', NULL, '-73.273', '1,083,519'),
(3, 'Inspektorat', 'Inspektorat', 'skpd', 0, 'kosong.png', '(0265) 771056†', 'inspektoratciamis@gmail.com', 'Jl. Mr. Iwa Kusuma Sumantri No.4, Kertasari, Kec. Ciamis, Kabupaten Ciamis', '@inspektoratciamis_14', '', '', '(0265) 771056†', '46211', 'https://inspektorat.ciamiskab.go.id/', NULL, '-73.268', '1,083,676'),
(4, 'Dinas Pertanian dan Ketahanan Pangan', 'DPKP', 'skpd', 0, 'kosong.png', '(0265) 771024', 'office.dpkpciamis@gmail.com', 'Jl. Lembur Situ No.44, Ciamis, Kec. Ciamis, Kabupaten Ciamis', '@dinaspertaniandankp', '', '', '(0265) 771024', '46211', 'https://dpkp.ciamiskab.go.id/', NULL, '-73.292', '1,083,473'),
(5, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'DPPKBP3A', 'skpd', 0, 'kosong.png', '(0265) 771026', '', 'Jalan Ahmad Yani No.38, Tawangsari, Tawang, Ciamis, Kec. Ciamis, Kabupaten Ciamis', '', '', '', '(0265) 771026', '46112', '', NULL, '-73.263', '1,083,581'),
(6, 'Dinas Kebudayaan, Kepemudaan dan Olahraga', 'Disbudpora', 'skpd', 0, 'kosong.png', '(0265) 772276', 'disbudporaciamis@gmail.com', 'Jl. R.A.A. Kusumahsubrata No. 09 Ciamis', '@disbudpora.ciamis', '', '', '(0265) 772276', '46213', 'http://disbudpora.ciamiskab.go.id/', NULL, '-73.287', '1,083,669'),
(7, 'Dinas Koperasi, Usaha Kecil, Menengah dan Perdagangan', 'DKUKMP', 'skpd', 0, 'kosong.png', '(0265) 771297', '', 'Jl. Jenderal Ahmad Yani No.171, Kertasari, Kec. Ciamis, Kabupaten Ciamis', '@dkukmpciamis', '', '', '(0265) 771297', '46213', 'https://dkukmp.ciamiskab.go.id/', NULL, '-73.256', '1,083,662'),
(8, 'Dinas Pariwisata', 'Dispar', 'skpd', 0, 'kosong.png', '(0265) 771421', '', 'Jl. Mr. Iwa Kusuma Sumantri No.14, Kertasari, Kec. Ciamis, Kabupaten Ciamis', '@disparciamis', '', '', '(0265) 771421', '46213', 'https://dispar.ciamiskab.go.id/', NULL, '-73.287', '1,083,659'),
(9, 'Dinas Sosial', 'Dinsos', 'skpd', 0, 'kosong.png', '(0265) 771096', 'dinassosialcms@gmail.com', 'Jl. Tentara Pelajar No 1-3 Kabupaten Ciamis', '@dinassosial_kab.ciamis', '', '', '(0265) 771096', '', 'https://dinsos.ciamiskab.go.id/', NULL, '-73.286', '1,083,683'),
(10, 'Dinas Kesehatan', 'Dinkes', 'skpd', 0, 'kosong.png', '(0265) 771139', '', 'Jalan Mr. Iwa Kusumasomantri No.12 Ciamis', '@dinkesciamis', '', '', '(0265) 771139', '†46213', 'http://dinkes.ciamiskab.go.id/', NULL, '-73.281', '1,083,663'),
(11, 'Dinas Pendidikan', 'Disdik', 'skpd', 0, 'kosong.png', '(0265) 773709 (0265 778323', '', 'Jl. RAA. Kusumahsubrata No. 3 Ciamis', '', '', '', '(0265) 773709\n(0265) 778323', '46213', 'http://disdik.ciamiskab.go.id/', NULL, '-73.272', '1,083,678'),
(12, 'Dinas Pekerjaan Umum, Penataan Ruang dan Pertanahan', 'DPUPRP', 'skpd', 0, 'kosong.png', '(0265) 771063', '', 'Jl. RAA Sastrawinata No.1, Kertasari, Kec. Ciamis, Kabupaten Ciamis', '', '', '', '(0265) 771063', '46213', 'https://dpuprp.ciamiskab.go.id/', NULL, '-73.281', '1,083,637'),
(13, 'Dinas Perhubungan', 'Dishub', 'skpd', 0, 'kosong.png', '(0265) 758862', '', 'Jl. Otto Iskandardinata, Lingkar Selatan - Benteng Ciamis', '@dishubciamiskab', '', '', '(0265) 758862', '46211', 'https://dishub.ciamiskab.go.id/', NULL, '-73.429', '1,083,426'),
(14, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'DPMPTSP', 'skpd', 0, 'kosong.png', '(0265) 772166', 'dpmptsp.ciamiskab@gmail.com', 'Jl. Dr. Sopandi, No. 68, Ciamis, Kec. Ciamis, Kabupaten Ciamis', '@dpmptspciamis', '', '', '(0265) 772166', '46211', 'https://dpmptsp.ciamiskab.go.id/', NULL, '-73.343', '1,083,576'),
(15, 'Dinas Peternakan dan Perikanan', 'Disnakan', 'skpd', 0, 'kosong.png', '(0265) 771131', '', 'Jl. Yos Sudarso No.74, Ciamis, Kec. Ciamis, Kabupaten Ciamis', '@disnakkan.ciamis', '', '', '(0265) 771131', '46211', 'https://disnakan.ciamiskab.go.id/', NULL, '-73.245', '1,083,589'),
(16, 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Lingkungan Hidup', 'DPRKPLH', 'skpd', 0, 'kosong.png', '(0265) 775815', 'dinasperumahanciamis@gmail.com', 'Jalan RAA. Kusumah Subrata No. 7 Kel. Kertasari Kec. Ciamis (Komplek Perkantoran Kertasari) Ciamis', '@dinasperumahankabciamis', '', '', '(0265) 775815', '46213', 'http://dprkplh.ciamiskab.go.id/', NULL, '-73.271', '1,083,686'),
(17, 'Dinas Kependudukan dan Pencatatan Sipil', 'Disdukcapil', 'skpd', 0, 'kosong.png', '(0265) 772548', '', 'Jl. Tentara Pelajar No.7, Ciamis, Kec. Ciamis, Kabupaten Ciamis', '', '', '', '(0265) 772548', '46211', 'https://disdukcapil.ciamiskab.go.id/', NULL, '-73.282', '1,083,523'),
(18, 'Dinas Komunikasi dan Informatika', 'Diskominfo', 'skpd', 0, 'kosong.png', '(0265) 773000', 'admin@diskominfo.ciamiskab.go.id', 'Jl. Jend. Sudirman No.220, Sindangrasa, Ciamis', '@diskominfo_cms', 'https://twitter.com/DiskominfoCiam1', 'https://www.facebook.com/diskominfo.kabupatenciamis.9', '(0265) 773000', '46215', 'https://diskominfo.ciamiskab.go.id', NULL, '-73.241', '1,083,337'),
(19, 'Dinas Tenaga Kerja', 'Disnaker', 'skpd', 0, 'kosong.png', '(0265) 773998', 'disnaker.kabciamis@gmail.com', 'Jl. Baru Kompleks Perkantoran Kertasari No. 18 Kab. Ciamis', '@disnaker_ciamis', '', '', '(0265) 773998', '46213', 'https://disnaker.ciamiskab.go.id/', NULL, '-73.276', '1,083,670'),
(20, 'Dinas Perpustakaan dan Kearsipan', 'Dispusip', 'skpd', 0, 'kosong.png', '(0265) 771312', '', 'Jl. Galuh I No.2, RT05 RW08 Kel. Ciamis, Kec. Ciamis, Kabupaten Ciamis', '@diperpuskaciamiskab', '', '', '(0265) 771312', '46211', 'http://diperpuska.ciamiskab.go.id/', NULL, '-73.283', '1,083,523'),
(21, 'Dinas Pemberdayaan Masyarakat dan Desa', 'DPMD', 'skpd', 0, 'kosong.png', '', '', 'Jl. Rumah Sakit, Ciamis, Kec. Ciamis, Kabupaten Ciamis', '@dpmd_ciamis', '', '', '', '', 'https://dpmd.ciamiskab.go.id/', NULL, '-73.333', '1,083,605'),
(22, 'Badan Pengelolaan Keuangan Daerah', 'BPKD', 'skpd', 0, 'kosong.png', '(0265) 771032', '', 'Jl. Drs. H. Soejoed No.5A, Kel. Kertasari, Kec. Ciamis', '', '', '', '(0265) 771032', '46213', 'http://bpkd.ciamiskab.go.id/', NULL, '-7,329,356,024', '1,083,658,732'),
(23, 'Badan Perencanaan Pembangunan Daerah', 'Bappeda', 'skpd', 0, 'kosong.png', '(0265) 771109', '', 'Jl. Stasiun No.18, Kel. Ciamis, Kec. Ciamis', '@bappedakab.ciamis', '', '', '(0265) 771109', '46211', 'https://bappeda.ciamiskab.go.id/', NULL, '-73.278', '1,083,560'),
(24, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'BKPSDM', 'skpd', 0, 'kosong.png', '(0265) 776659', '', 'Jl. Sadananya No. 27, Kel. Maleber Kec. Ciamis', '@bkpsdmciamis', '', '', '(0265) 776659', '46214', 'https://bkpsdm.ciamiskab.go.id/', NULL, '-73.193', '1,083,438'),
(25, 'Badan Penanggulangan Bencana Daerah', 'BPBD', 'skpd', 0, 'kosong.png', '(0265) 775815', 'bpbdciamis2@gmail.com', 'Jl. RAA Sastrawinata No.3, Kertasari, Kec. Ciamis, Kabupaten Ciamis', '@pusdalopsbpbdciamis', '', '', '(0265) 775815', '46213', 'https://bpbd.ciamiskab.go.id/', NULL, '-73.28', '1,083,638'),
(26, 'Badan Kesatuan Bangsa dan Politik', 'Bakesbangpol', 'skpd', 0, 'kosong.png', '(0265) 771101', 'kesbangpolciamis@gmail.com', 'Jl. Tentara Pelajar  No. 09 Kel. Ciamis Ciamis', '@kesbangpolciamis09', '', '', '(0265) 771101', '46211', 'https://kesbangpol.ciamiskab.go.id/', NULL, '-7,328,868,256', '1,083,519'),
(27, 'Satuan Polisi Pamong Praja', 'Satpol PP', 'skpd', 0, 'kosong.png', '(0265) 777814†', 'satpol.pp.ciamis@gmail.com', 'Jl. Drs. H. Soejoed No.14 A, Kertasari, Kec. Ciamis, Kabupaten Ciamis', '', '', '', '(0265) 777814†', '46211', 'https://satpolpp.ciamiskab.go.id/', NULL, '-73.301', '1,083,668'),
(28, 'Kecamatan Ciamis', 'Kec Ciamis', 'skpd', 0, 'kosong.png', '(0265) 773117', '', 'Jl. Drs. H. Soejoed No.9, Kel. Kertasari, Kec. Ciamis', '@kecamatan_ciamis', '', '', '(0265) 773117', '46213', 'https://kecamatan-ciamis.ciamiskab.go.id/', NULL, '-73.301', '1,083,655'),
(29, 'Kecamatan Kawali', 'Kec Kawali', 'skpd', 0, 'kosong.png', '(0265) 791473', '', 'Jl. Veteran No.48, Kawali, Kabupaten Ciamis', '@kec_kawali', '', '', '', '46253', 'https://kecamatan-kawali.ciamiskab.go.id/', NULL, '-71.865', '1,083,705'),
(30, 'Kecamatan Panumbangan', 'Kec Panumbangan', 'skpd', 0, 'kosong.png', '(0265) 454092', '', 'Jalan Alun-alun Selatan No. 196 Kecamatan Panumbangan Ciamis', '@panumbangan.kecamatan', '', '', '', '46263', 'https://kecamatan-panumbangan.ciamiskab.go.id/', NULL, '-71.604', '1,082,030'),
(31, 'Kecamatan Rancah', 'Kec Rancah', 'skpd', 0, 'kosong.png', '(0265) 740432', 'kecamatanrancahbetah@gmail.com', 'Jalan Raya Rancah Rajadesa No. 288 Ciamis', '@kecamatanrancah', '', '', '(0265) 740432', '46387', 'http://kecamatan-rancah.ciamiskab.go.id/', NULL, '-71.965', '1,085,077'),
(32, 'Kecamatan Banjarsari', 'Kec Banjarsari', 'skpd', 0, 'kosong.png', '', '', '', '', '', '', '', '46383', 'http://kecamatan-banjarsari.ciamiskab.go.id/', NULL, '-74.815', '1,085,986'),
(33, 'Kecamatan Cijeungjing', 'Kec Cijeungjing', 'skpd', 0, 'kosong.png', '(0265) 773612', '', 'Jl. Ciamis - Banjar No.332, Cijeungjing, Kec. Cijeungjing, Kabupaten Ciamis', '@kecamatancijeungjing', '', '', '', '46271', '', NULL, '-73.336', '1,084,133'),
(34, 'Kecamatan Lakbok', 'Kec Lakbok', 'skpd', 0, 'kosong.png', '(0265) 650300', '', 'Jalan Raya Lakbok No. 597, Lakbok, Sukanagara, Kabupaten Ciamis', '', '', '', '(0265) 650300', '46385', 'https://kecamatan-lakbok.ciamiskab.go.id/', NULL, '-74.03', '1,086,593'),
(35, 'Kecamatan Rajadesa', 'Kec Rajadesa', 'skpd', 0, 'kosong.png', '(0265) 2796054', 'kecamatanrajadesa@gmail.com', 'Jalan Raya Sirnajaya No.10B Rajadesa Ciamis', '@kecamatanrajadesa', '', '', '(0265) 2796054', '46254', 'https://kecamatan-rajadesa.ciamiskab.go.id/', NULL, '-71.683', '1,084,369'),
(36, 'Kecamatan Cikoneng', 'Kec Cikoneng', 'skpd', 0, 'kosong.png', '(0265) 773201', '', 'Jl. Raya Cikoneng No. 163 Cikoneng Ciamis', '@kecamatancikoneng.163', '', '', '(0265) 773201', '46261', 'https://kecamatan-cikoneng.ciamiskab.go.id/', NULL, '-73.109', '1,082,712'),
(37, 'Kecamatan Panawangan', 'Kec Panawangan', 'skpd', 0, 'kosong.png', '', '', 'Jl. Cikijing - Kawali No.77, Panawangan, Kabupaten Ciamis', '@kecamatanpanawangan', '', '', '', '46255', 'https://kecamatan-panawangan.ciamiskab.go.id/', NULL, '-71.225', '1,083,811'),
(38, 'Kecamatan Cipaku', 'Kec Cipaku', 'skpd', 0, 'kosong.png', '', '', 'Jl. Raya Cipaku No.272, Buniseuri, Cipaku, Kabupaten Ciamis', '', '', '', '', '46252', 'https://kecamatan-cipaku.ciamiskab.go.id/', NULL, '-72.405', '1,083,795'),
(39, 'Kecamatan Panjalu', 'Kec Panjalu', 'skpd', 0, 'kosong.png', '(0265) 450157', '', 'Jln. Raya Garahang-Ciater No. 1, Kecamatan Panjalu Kabupaten Ciamis', '@kecamatanpanjalu', '', '', '(0265) 450157', '46264', 'http://kecamatan-panjalu.ciamiskab.go.id/', NULL, '-71.401', '1,082,791'),
(40, 'Kecamatan Sadananya', 'Kec Sadananya', 'skpd', 0, 'kosong.png', '(0265) 775756', 'kecsadananya@ciamiskab.go.id', 'Jalan Raya Sadananya No. 405 Kabupaten Ciamis', '@kecamatan.sadananya', '', '', '(0265) 775756', '46256', 'https://kecamatan-sadananya.ciamiskab.go.id/', NULL, '-72.724', '1,083,237'),
(41, 'Kecamatan Cisaga', 'Kec Cisaga', 'skpd', 0, 'kosong.png', '', '', 'Jl. Ciminyak, Cisaga, Kec. Cisaga, Kabupaten Ciamis', '', '', '', '', '46386', 'https://kecamatan-cisaga.ciamiskab.go.id/', NULL, '-73.423', '1,085,158'),
(42, 'Kecamatan Pamarican', 'Kec Pamarican', 'skpd', 0, 'kosong.png', '(0265) 744600', '', 'Jl. Pahlawan No.07 Pamarican Kabupaten Ciamis', '', '', '', '', '46382', 'https://kecamatan-pamarican.ciamiskab.go.id/', NULL, '-74.586', '1,085,244'),
(43, 'Kecamatan Cihaurbeuti', 'Kec Cihaurbeuti', 'skpd', 0, 'kosong.png', '(0265) 420498', '', 'Jl. Raya†Cihaurbeuti†No.52,†Cihaurbeuti, Ciamis', '', '', '', '(0265) 420498', '46268', 'https://kecamatan-cihaurbeuti.ciamiskab.go.id/', NULL, '-72.151', '1,082,026'),
(44, 'Kecamatan Cimaragas', 'Kec Cimaragas', 'skpd', 0, 'kosong.png', '', '', 'Jl. Manonjaya - Banjar No.264, Cimaragas, Kec. Cimaragas, Kabupaten Ciamis', '@kecamatan.cimaragas', '', '', '', '46381', 'https://kecamatan-cimaragas.ciamiskab.go.id/', NULL, '-73.727', '1,084,638'),
(45, 'Kecamatan Sukadana', 'Kec Sukadana', 'skpd', 0, 'kosong.png', '(0265) 7578330', '', 'Jalan Raya Cisena No. 27 Sukadana Ciamis', '@kecamatan.sukadana', '', '', '(0265) 7578330', '46272', 'https://kecamatan-sukadana.ciamiskab.go.id/', NULL, '-72.637', '1,084,445'),
(46, 'Kecamatan Jatinagara', 'Kec Jatinagara', 'skpd', 0, 'kosong.png', '', '', 'Jl. Raya Jatinagara No.1, Jatinagara, Kec. Jatinagara, Kabupaten Ciamis', '@kecamatan_jatinagara', '', '', '', '46273', 'https://kecamatan-jatinagara.ciamiskab.go.id/', NULL, '-71.732', '1,084,037'),
(47, 'Kecamatan Cidolog', 'Kec Cidolog', 'skpd', 0, 'kosong.png', '(0265) 7549055', '', 'Jl. Cineam - Cidolog, Cidolog, Kec. Cidolog, Kabupaten Ciamis', '', '', '', '', '46352', 'https://kecamatan-cidolog.ciamiskab.go.id/', NULL, '-74.091', '1,084,422'),
(48, 'Kecamatan Baregbeg', 'Kec Baregbeg', 'skpd', 0, 'kosong.png', '(0265) 2752546', 'baregbegkec@gmail.com', 'JL RE. Martadinata No. 301,†Baregbeg, Kabupaten Ciamis', '', '', '', '', '46274', 'https://kecamatan-baregbeg.ciamiskab.go.id/', NULL, '-72.994', '1,083,689'),
(49, 'Kecamatan Sindangkasih', 'Kec Sindangkasih', 'skpd', 0, 'kosong.png', '(0265) 314009', '', 'Jalan Raya Ancol Nomor 77 Desa Sindangkasih Kecamatan Sindangkasih', '', '', '', '', '46268', 'https://kecamatan-sindangkasih.ciamiskab.go.id/', NULL, '-73.009', '1,082,378'),
(50, 'Kecamatan Lumbung', 'Kec Lumbung', 'skpd', 0, 'kosong.png', '', '', 'Jalan Seda Sakti No. 1 Kecamatan Lumbung, Ciamis', '@keclumbung_cms', '', '', '', '46258', 'https://kecamatan-lumbung.ciamiskab.go.id/', NULL, '-71.615', '1,083,319'),
(51, 'Kecamatan Sukamantri', 'Kec Sukamantri', 'skpd', 0, 'kosong.png', '', '', 'Jalan Raya Sukamantri No. 97 Sukamantri Ciamis', '', '', '', '', '46264', 'https://kecamatan-sukamantri.ciamiskab.go.id/', NULL, '-70.896', '1,082,796'),
(52, 'Kecamatan Purwadadi', 'Kec Purwadadi', 'skpd', 0, 'kosong.png', '', '', 'Jl. Lakbok - Sidareja, Purwajaya, Purwadadi, Kabupaten Ciamis', '', '', '', '', '46385', 'https://kecamatan-purwadadi.ciamiskab.go.id/', NULL, '-74.504', '1,086,587'),
(53, 'Kecamatan Tambaksari', 'Kec Tambaksari', 'skpd', 0, 'kosong.png', '', '', 'Jl. Batu Gimbal No. 14,†Desa†Kaso,†Tambaksari, Kaso,†Kabupaten Ciamis', '@kec.tambaksari', '', '', '', '46388', 'http://kecamatan-tambaksari.ciamiskab.go.id/', NULL, '-72.49', '1,085,414'),
(54, 'Kecamatan Banjaranyar', 'Kec Banjaranyar', 'skpd', 0, 'kosong.png', '(0265) 7509020', '', 'Jalan Raya Cigayam No. 272 Banjaranyar†Ciamis', '', '', '', '', '46383', 'https://kecamatan-banjaranyar.ciamiskab.go.id/', NULL, '-75.023', '1,085,512'),
(55, 'Kelurahan Ciamis', 'Kelurahan Ciamis', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(56, 'Kelurahan Kertasari', 'Kelurahan Kertasari', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(57, 'Kelurahan Maleber', 'Kelurahan Maleber', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(58, 'Kelurahan Sindangrasa', 'Kelurahan Sindangrasa', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(59, 'Kelurahan Benteng', 'Kelurahan Benteng', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(60, 'Kelurahan Linggasari', 'Kelurahan Linggasari', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(61, 'Kelurahan Cigembor', 'Kelurahan Cigembor', 'kelurahan', 28, 'kosong.png', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(62, 'Kepala Daerah', 'Kepala Daerah', 'kepala daerah', 0, 'kosong.png', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL),
(63, 'RSUD CIAMIS', 'RSUD Ciamis', 'skpd', 0, 'kosong.png', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(64, 'RSUD KAWALI', 'RSUD Kawali', 'skpd', 0, 'kosong.png', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(98, 'Seluruh Kecamatan', 'Seluruh Kecamatan', 'skpd', 0, 'kosong.png', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(99, 'Seluruh Perangkat Daerah', 'Seluruh Perangkat Daerah', 'skpd', NULL, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(999999, 'BELUM DITENTUKAN', 'BELUM DITENTUKAN', '-', NULL, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(1000000, 'PEMERINTA DAERAH KABUPATEN CIAMIS', 'BUPATI', 'skpd', 0, 'sumedang.png', '082123123123', 'bupati@ciamiskab.go.id', '-', '-', '-', '-', '022123123', '-', '-', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@ciamiskab.go.id', 'admin', NULL, '$2y$10$bcdQXZuwpuczaIfqIat2X.sweTOpyxxdp.XdQLjYiABAY7NdNIwXe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `downtime` int(11) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `host`, `status`, `downtime`, `owner`, `tipe`) VALUES
(1, 'sukamanah-sinkas.desa.id', 'Down', 0, 'Diskominfo', 'Desa'),
(2, 'karangkamulyan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(3, 'kertaharja-cijeungjing.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(4, 'karanganyar-cijeungjing.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(5, 'sukamaju-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(6, 'hujungtiwu.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(7, 'selamanik.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(8, 'sukadana-ciamis.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(9, 'margaharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(10, 'margajaya-sukadana.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(11, 'bunter.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(12, 'ciparigi.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(13, 'rancah.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(14, 'cisontrol.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(15, 'bojonggedang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(16, 'karangpari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(17, 'dadiharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(18, 'situmandala.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(19, 'patakaharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(20, 'mekarsari-tambaksari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(21, 'raksabaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(22, 'danasari-cisaga.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(23, 'saguling.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(24, 'jelat.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(25, 'sukamulya-baregbeg.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(26, 'sukamulya-purwadadi.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(27, 'pawindan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(28, 'cisadap.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(29, 'imbanagararaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(30, 'panyingkiran.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(31, 'nasol.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(32, 'cimari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(33, 'cihalarang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(34, 'kertabumi.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(35, 'cidolog.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(36, 'janggala.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(37, 'hegarmanah-cidolog.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(38, 'jelegong-cidolog.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(39, 'ciparay-cidolog.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(40, 'sukasari-cidolog.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(41, 'sukamulya-chb.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(42, 'sukahurip-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(43, 'sukasetia-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(44, 'sumberjaya-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(45, 'cihaurbeuti-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(46, 'pasirtamiang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(47, 'padamulya-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(48, 'pamokolan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(49, 'sukahaji-cihaurbeuti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(50, 'medanglayang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(51, 'panumbangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(52, 'golat.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(53, 'sindangherang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(54, 'banjarangsana.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(55, 'payungagung.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(56, 'tanjungmulya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(57, 'payungsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(58, 'jayagiri-pnb.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(59, 'kertaraharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(60, 'sindangmukti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(61, 'sindangbarang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(62, 'buanamekar.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(63, 'ciomas.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(64, 'sandingtaman.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(65, 'maparah.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(66, 'mandalare.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(67, 'kawali.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(68, 'talagasari-kawali.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(69, 'karangpawitan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(70, 'winduraja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(71, 'margamulya-kawali.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(72, 'purwasari-kawali.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(73, 'sindangsari-kawali.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(74, 'kawalimukti.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(75, 'selasari-kawali.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(76, 'panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(77, 'sagalaherang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(78, 'nagarapageuh.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(79, 'nagarajati.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(80, 'nagarajaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(81, 'kertayasa.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(82, 'indragiri-panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(83, 'cinyasag-panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(84, 'sadapaingan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(85, 'jagabaya-panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(86, 'gardujaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(87, 'karangpaningal.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(88, 'bangunjaya-panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(89, 'girilaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(90, 'kertajaya-panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(91, 'nagarawangi-panawangan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(92, 'mekarbuana.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(93, 'natanegara.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(94, 'cipaku-ciamis.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(95, 'cieurih-ciamis.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(96, 'pusakasari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(97, 'bangbayang-cipaku.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(98, 'jatinagara.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(99, 'sukanagara-jatinagara.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(100, 'cintanagara.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(101, 'dayeuhluhur.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(102, 'mulyasari-jatinagara.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(103, 'bayasari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(104, 'tanjungsukur.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(105, 'tanjungjaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(106, 'andapraja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(107, 'sukaharja-rajadesa.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(108, 'sukajaya-rajadesa.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(109, 'tigaherang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(110, 'sirnabaya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(111, 'purwaraja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(112, 'kiarapayung.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(113, 'cileungsir.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(114, 'giriharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(115, 'tambaksari-tambaksari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(116, 'kaso.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(117, 'kadupandak-tambaksari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(118, 'sukasari-tambaksari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(119, 'karangpaningal-tambaksari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(120, 'cintaratu-lakbok.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(121, 'sindangangin.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(122, 'tambakreja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(123, 'kalapasawit.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(124, 'kawasen.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(125, 'cicapar.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(126, 'cibadak-ciamis.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(127, 'banjarsari-banjarsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(128, 'sindanghayu.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(129, 'sindangasih-banjarsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(130, 'sindangsari-banjarsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(131, 'ciherang-banjarsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(132, 'purwasari-banjarsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(133, 'ratawangi.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(134, 'ciulu.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(135, 'sukasari-banjarsari.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(136, 'pamarican-pamarican.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(137, 'sukamukti-pamarican.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(138, 'sukajadi-pamarican.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(139, 'sidaharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(140, 'bangunsari-pamarican.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(141, 'sukahurip.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(142, 'pasirnagara-pmrc.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(143, 'beber.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(144, 'bojongmalang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(145, 'jayaraksa.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(146, 'sidamulya-cisaga.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(147, 'kepel-cisaga.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(148, 'wangunjaya-cisaga.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(149, 'tanjungjaya-cisaga.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(150, 'mekarmukti-cisaga.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(151, 'karyamulya.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(152, 'budiasih.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(153, 'budiharja.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(154, 'sukasenang-sindangkasih.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(155, 'wanasigra.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(156, 'sukamaju-baregbeg.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(157, 'petirhilir.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(158, 'pusakanagara.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(159, 'karangampel.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(160, 'sukamantri-sukamantri.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(161, 'cibeureum-ciamis.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(162, 'mekarwangi-sukamantri.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(163, 'cikupa-lumbung.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(164, 'lumbung.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(165, 'lumbungsari-ciamis.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(166, 'rawa.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(167, 'bantardawa.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(168, 'purwadadi-purwadadi.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(169, 'karangpaningal.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(170, 'sidarahayu.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(171, 'padaringan.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(172, 'pasirlawang.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(173, 'kutawaringin-purwadadi.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(174, 'pasawahan-banjaranyar.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(175, 'cikupa-banjaranyar.desa.id', 'UP', 0, 'Diskominfo', 'Desa'),
(176, 'pusakasari.desa.id', 'UP', 0, 'Diskominfo', 'Desa');

-- --------------------------------------------------------

--
-- Table structure for table `website_ssl`
--

CREATE TABLE `website_ssl` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `website_ssl`
--

INSERT INTO `website_ssl` (`id`, `host`, `status`, `owner`, `tipe`, `expiry_date`) VALUES
(1, 'padaringan.desa.id', 'expired', 'Diskominfo', 'Desa', 239),
(2, 'sukajadi-pamarican.desa.id', 'expired', 'Diskominfo', 'Desa', 239),
(3, 'pasirnagara.desa.id', 'certificate', 'Diskominfo', 'Desa', -79),
(4, 'sidarahayu.desa.id', 'expired', 'Diskominfo', 'Desa', 239),
(5, 'cisontrol.desa.id', 'expired', 'Diskominfo', 'Desa', 239),
(177, 'padaringan.desa.id', 'expired', 'Diskominfo', 'Desa', 239);

-- --------------------------------------------------------

--
-- Table structure for table `website_test`
--

CREATE TABLE `website_test` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `downtime` int(11) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `website_test`
--

INSERT INTO `website_test` (`id`, `host`, `status`, `downtime`, `owner`, `tipe`) VALUES
(1, 'sirnabaya.desa.id', 'DOWN', 100, 'Diskominfo', 'Desa'),
(2, 'sukajadi-pamarican.desa.id', 'UP', 100, 'Diskominfo', 'Desa'),
(3, 'pasirnagara.desa.id', 'DOWN', 100, 'Diskominfo', 'Desa'),
(4, 'beber.desa.id', 'UP', 100, 'Diskominfo', 'Desa'),
(5, 'cisontrol.desa.id', 'UP', 100, 'Diskominfo', 'Desa'),
(177, 'padaringan.desa.id', 'DOWN', 100, 'Diskominfo', 'Desa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_kategori_post` (`id_kategori_post`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `host_check`
--
ALTER TABLE `host_check`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kategori_post`
--
ALTER TABLE `kategori_post`
  ADD PRIMARY KEY (`id_kategori_post`);

--
-- Indexes for table `log_error`
--
ALTER TABLE `log_error`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `log_host`
--
ALTER TABLE `log_host`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `log_ssl`
--
ALTER TABLE `log_ssl`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `id_skpd` (`id_skpd`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ref_skpd`
--
ALTER TABLE `ref_skpd`
  ADD PRIMARY KEY (`id_skpd`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `website_ssl`
--
ALTER TABLE `website_ssl`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `website_test`
--
ALTER TABLE `website_test`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_post` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `host_check`
--
ALTER TABLE `host_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `kategori_post`
--
ALTER TABLE `kategori_post`
  MODIFY `id_kategori_post` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_error`
--
ALTER TABLE `log_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_host`
--
ALTER TABLE `log_host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_ssl`
--
ALTER TABLE `log_ssl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_skpd`
--
ALTER TABLE `ref_skpd`
  MODIFY `id_skpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000001;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `website_ssl`
--
ALTER TABLE `website_ssl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `website_test`
--
ALTER TABLE `website_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `SKPD` FOREIGN KEY (`id_skpd`) REFERENCES `ref_skpd` (`id_skpd`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
