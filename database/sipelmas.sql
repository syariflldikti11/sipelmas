-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2024 pada 17.53
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipelmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` char(100) NOT NULL,
  `isi_informasi` text NOT NULL,
  `informasi` text NOT NULL,
  `file` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `isi_informasi`, `informasi`, `file`) VALUES
('1', 'Syarat pengusulan layanan lihat pada lampiran di bawah ini', 'tes', 'Syarat_Pelayanan_Kecamatan_Kertak_Hanyar.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jenis_kegiatan` varchar(200) NOT NULL,
  `nama_jenis_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`) VALUES
('09cdf03d-3c36-11ee-bafc-3a9b5dfee47c', 'kegiatan gotong royong'),
('0d5a27b8-3b80-11ee-9f7f-10af40302f5f', 'Pasar Murah dalam rangka pengendalian inflasi pangan'),
('30115e43-3c36-11ee-bafc-3a9b5dfee47c', 'kegiatan pemberdayaan masyarakat desa atau kelurahan'),
('4febfcb0-3c36-11ee-bafc-3a9b5dfee47c', 'kegiatan pemberdayaan masyarakat'),
('65cd73e7-694c-11ee-a9c8-2e316e949946', 'kegiatan gotong royong'),
('8334af40-694c-11ee-a9c8-2e316e949946', 'kegiatan pemberdayaan masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kk`
--

CREATE TABLE `kk` (
  `id_kk` char(100) NOT NULL,
  `no_kk` char(100) NOT NULL,
  `kepala_keluarga` char(100) NOT NULL,
  `alamat_kk` char(100) NOT NULL,
  `desa_kk` char(100) NOT NULL,
  `rt_kk` char(100) NOT NULL,
  `kecamatan` char(100) NOT NULL,
  `kabupaten` char(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `provinsi` char(100) NOT NULL,
  `foto_kk` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kk`
--

INSERT INTO `kk` (`id_kk`, `no_kk`, `kepala_keluarga`, `alamat_kk`, `desa_kk`, `rt_kk`, `kecamatan`, `kabupaten`, `kode_pos`, `provinsi`, `foto_kk`) VALUES
('28b60935-3b6d-11ee-9f7f-10af40302f5f', '6303021312100002', 'muhammad rafi\'i', 'jl.ayani km.7', 'kertak hanyar 1', '06', 'kertak hanyar', 'banjar', 70654, 'kalimantan selatan', 'kk.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktp`
--

CREATE TABLE `ktp` (
  `id_ktp` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `nama` char(100) NOT NULL,
  `alamat` char(100) NOT NULL,
  `desa` char(100) NOT NULL,
  `rt` char(20) NOT NULL,
  `agama` char(100) NOT NULL,
  `tempat_lahir` char(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jkelamin` char(100) NOT NULL,
  `wnegara` char(100) NOT NULL,
  `pekerjaan` char(100) NOT NULL,
  `snikah` char(100) NOT NULL,
  `ftoktp` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ktp`
--

INSERT INTO `ktp` (`id_ktp`, `nik`, `nama`, `alamat`, `desa`, `rt`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jkelamin`, `wnegara`, `pekerjaan`, `snikah`, `ftoktp`) VALUES
('0201511b-3b68-11ee-9f7f-10af40302f5f', '1230795838', 'Gilang', 'mahligai', 'kertak hanyar 1', '05', 'Katolik', 'Banjarmasin', '2000-01-11', 'L', 'Indonesia', 'mahasiswa', 'Belum Menikah', 'jaemin.jpeg'),
('0681d18c-3b6a-11ee-9f7f-10af40302f5f', '1230985832', 'Rahmawati', 'jln. ayani km.6', 'kertak hanyar', '01', 'Islam', 'Banjarmasin', '1998-11-11', 'P', 'Indonesia', 'ibu rt', 'Janda', 'lee-soomin.jpeg'),
('52a093b5-3b66-11ee-9f7f-10af40302f5f', '1297545678', 'Syafina', 'pemurus luar', 'kertak hanyar 1', '12', 'Kristen', 'Banjarmasin', '2001-12-24', 'P', 'Indonesia', 'pengusaha', 'Sudah Menikah', 'yoona.jpeg'),
('5c46d307-4321-11ee-824b-e1aec5cebc40', '1297545663', 'zayyan', 'jln. ayani km.7', 'mahligai', '06', 'Islam', 'Banjarmasin', '2001-07-08', 'L', 'Indonesia', 'mahasiswa', 'Belum Menikah', 'kk1.jpeg'),
('6620acc8-3b67-11ee-9f7f-10af40302f5f', '1974586833', 'Alex', 'manarap', 'kertak hanyar', '10', 'Hindu', 'jakarta', '2000-03-17', 'L', 'Indonesia', 'pengusaha', 'Sudah Menikah', 'jeno.jpeg'),
('736bedd0-3b65-11ee-9f7f-10af40302f5f', '19630675', 'Siti Nur Annisa', 'banjarmasin', 'kertak hanyar', '06', 'Islam', 'Banjarmasin', '2001-01-05', 'P', 'Indonesia', 'mahasiswa', 'Belum Menikah', 'Picture1.png'),
('e60a5097-3b66-11ee-9f7f-10af40302f5f', '19630670', 'zayyan', 'mahligai', 'kertak hanyar', '05', 'Islam', 'Banjarmasin', '1998-07-12', 'L', 'Indonesia', 'pengusaha', 'Duda', 'mark.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pgw` char(100) NOT NULL,
  `nama_peg` char(100) NOT NULL,
  `jabatan` char(100) NOT NULL,
  `alamat_peg` char(100) NOT NULL,
  `telp_peg` char(100) NOT NULL,
  `wa_peg` char(100) NOT NULL,
  `nik` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pgw`, `nama_peg`, `jabatan`, `alamat_peg`, `telp_peg`, `wa_peg`, `nik`) VALUES
('5ae6330e-3b63-11ee-9f7f-10af40302f5f', 'GT. M. Noviar Hidayat ,SSTP ,M.Si', 'Camat', 'Banjarbaru', '081378651298', '081378651298', '198511071 200412 1 002'),
('9a08c31f-3b62-11ee-9f7f-10af40302f5f', 'Siti Nur Annisa', 'Staff', 'jl.ayani km.7', '081347602749', '081347602749', '19630675'),
('b6d748b6-3b62-11ee-9f7f-10af40302f5f', 'ahsa nadia', 'Staff', 'banjarmasin', '082178902376', '082178902376', '19630671');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan_ktp`
--

CREATE TABLE `pelayanan_ktp` (
  `id_buat_ktp` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `nama` char(100) NOT NULL,
  `alamat` char(100) NOT NULL,
  `desa` char(100) NOT NULL,
  `rt` char(20) NOT NULL,
  `agama` char(100) NOT NULL,
  `tempat_lahir` char(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jkelamin` char(100) NOT NULL,
  `wnegara` char(100) NOT NULL,
  `pekerjaan` char(100) NOT NULL,
  `snikah` char(100) NOT NULL,
  `foto` char(100) NOT NULL,
  `kk` char(100) NOT NULL,
  `status` char(20) NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelayanan_ktp`
--

INSERT INTO `pelayanan_ktp` (`id_buat_ktp`, `nik`, `nama`, `alamat`, `desa`, `rt`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jkelamin`, `wnegara`, `pekerjaan`, `snikah`, `foto`, `kk`, `status`) VALUES
('e9619f11-6d63-11ee-989b-c454445434d3', '6309112608980008', 'Syarif Firdaus', 'Kotabaru', 'kayu tangi', '5', 'Islam', 'Tabalonggs', '2023-10-18', 'L', 'Indonesia', 'Tenaga Kontrak', 'Sudah Menikah', 'drk_sd_1_161120.pdf', '1678577097.pdf', 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` char(100) NOT NULL,
  `id_ktp` char(100) DEFAULT NULL,
  `mengadu` text NOT NULL,
  `balasan` text DEFAULT NULL,
  `tgl_pengaduan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `peng_telpon` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_ktp`, `mengadu`, `balasan`, `tgl_pengaduan`, `peng_telpon`) VALUES
('5150eb12-6997-11ee-a879-73fb94f30747', '736bedd0-3b65-11ee-9f7f-10af40302f5f', 'selesai', NULL, '2023-10-13 07:08:32', '082345679821'),
('ee0cd5aa-6997-11ee-a879-73fb94f30747', NULL, 'test', 'baik', '2023-10-13 07:15:23', '081358769012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `role` int(11) NOT NULL,
  `id_pegawai` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `password`, `role`, `id_pegawai`) VALUES
('253fe98a-6d6d-11ee-989b-c454445434d3', 'e0dc1c969db5fa159c0e3ccc290e2314', 4, '5ae6330e-3b63-11ee-9f7f-10af40302f5f'),
('735e7027-3b63-11ee-9f7f-10af40302f5f', '827ccb0eea8a706c4c34a16891f84e7b', 2, '9a08c31f-3b62-11ee-9f7f-10af40302f5f'),
('8667c236-3b63-11ee-9f7f-10af40302f5f', 'e10adc3949ba59abbe56e057f20f883e', 3, 'b6d748b6-3b62-11ee-9f7f-10af40302f5f'),
('baa51fab-3b63-11ee-9f7f-10af40302f5f', 'fcea920f7412b5da7be0cf42b8c93759', 4, '5ae6330e-3b63-11ee-9f7f-10af40302f5f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `telp` char(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nik`, `password`, `email`, `telp`, `role`) VALUES
('58f91786-3a29-11ee-9c76-708bcddc309b', '6308101008850004', '827ccb0eea8a706c4c34a16891f84e7b', 'adie.kopertis11@gmail.com', '', 1),
('91c81f6f-0aae-11ee-8368-7673dcf73f56', '6309112608980002', '827ccb0eea8a706c4c34a16891f84e7b', 'asyarrif@gmail.com', '', 1),
('cd06d7d3-3b6b-11ee-9f7f-10af40302f5f', '19630675', '827ccb0eea8a706c4c34a16891f84e7b', 'annisans1357@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan`
--

CREATE TABLE `penugasan` (
  `id_penugasan` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `nama_penugasan` varchar(200) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `tgl_surat` date NOT NULL,
  `catatan_pimpinan` varchar(200) NOT NULL,
  `id_jenis_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penugasan`
--

INSERT INTO `penugasan` (`id_penugasan`, `tgl_mulai`, `tgl_akhir`, `nama_penugasan`, `no_surat`, `file`, `tgl_surat`, `catatan_pimpinan`, `id_jenis_kegiatan`) VALUES
('4290bad6-3c37-11ee-bafc-3a9b5dfee47c', '2023-08-04', '2023-02-06', 'kegiatan pemberdayaan masyarakat ', 'KP.00/780-UMPEG/KH', NULL, '2023-08-02', '', '4febfcb0-3c36-11ee-bafc-3a9b5dfee47c'),
('59ead658-3bce-11ee-9f7f-10af40302f5f', '2023-08-05', '2023-08-05', 'pasar murah kertak hanyar', '414.4/ 210 / IX / 2023', NULL, '2023-08-01', '', '0d5a27b8-3b80-11ee-9f7f-10af40302f5f'),
('93d933cc-3c36-11ee-bafc-3a9b5dfee47c', '2023-08-02', '2023-08-03', 'kegiatan gotong royong', 'KP.00/903-UMPEG/KH', NULL, '2023-08-01', '', '09cdf03d-3c36-11ee-bafc-3a9b5dfee47c'),
('c41b1513-505b-11ee-9cd0-e321f6735c74', '2023-09-06', '2023-09-02', 'kegiatan gotong royong', 'TM /1607 /PEM ', NULL, '2023-08-02', '', '09cdf03d-3c36-11ee-bafc-3a9b5dfee47c'),
('fa5a94fd-694c-11ee-a9c8-2e316e949946', '2023-10-10', '2023-10-11', 'Pasar Murah dalam rangka pengendalian inflasi pangan', '021/UND/DBH-KH/V/2023', NULL, '2023-10-07', '', '0d5a27b8-3b80-11ee-9f7f-10af40302f5f'),
('fac67ed9-3c36-11ee-bafc-3a9b5dfee47c', '2023-08-05', '2023-08-04', 'pemberdayaan masyarakat desa atau kelurahan', 'KP.00/850-UMPEG/KH', NULL, '2023-08-01', '', '30115e43-3c36-11ee-bafc-3a9b5dfee47c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_penugasan`
--

CREATE TABLE `peserta_penugasan` (
  `id_peserta_penugasan` varchar(100) NOT NULL,
  `id_pegawai` char(100) NOT NULL,
  `id_penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta_penugasan`
--

INSERT INTO `peserta_penugasan` (`id_peserta_penugasan`, `id_pegawai`, `id_penugasan`) VALUES
('5c0a6686-3c20-11ee-bafc-3a9b5dfee47c', '9a08c31f-3b62-11ee-9f7f-10af40302f5f', '59ead658-3bce-11ee-9f7f-10af40302f5f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `tgl_proposal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mengajukan` char(100) NOT NULL,
  `proposal` char(100) NOT NULL,
  `telp` char(100) NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `id_ktp`, `tgl_proposal`, `mengajukan`, `proposal`, `telp`, `status`) VALUES
('8fa533ac-3c38-11ee-bafc-3a9b5dfee47c', '52a093b5-3b66-11ee-9f7f-10af40302f5f', '0000-00-00 00:00:00', 'surat pernyataan', 'SURAT_PERNYATAAN_PROPOSAL_SKRIPSI.pdf', '081345978905', 'Validasi Pimpinan'),
('dfde38d1-3c38-11ee-bafc-3a9b5dfee47c', '736bedd0-3b65-11ee-9f7f-10af40302f5f', '0000-00-00 00:00:00', 'selesai', 'Naskah-Proposal_Skripsi-Siti_Nur_Annisa-19630675.pdf', '081347602749', 'Validasi Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_belum_menikah`
--

CREATE TABLE `surat_belum_menikah` (
  `id_surat_belum_menikah` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `bin` char(100) NOT NULL,
  `status_nikah` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_biodek`
--

CREATE TABLE `surat_biodek` (
  `id_surat_biodek` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `luas_tanah` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL,
  `no_tanah` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_domisili`
--

CREATE TABLE `surat_domisili` (
  `id_surat_domisili` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `alamat_domisili` char(200) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_izin_keramaian`
--

CREATE TABLE `surat_izin_keramaian` (
  `id_surat_izin_keramaian` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `dalam_rangka` char(100) NOT NULL,
  `hari` char(100) NOT NULL,
  `tanggal` char(100) NOT NULL,
  `tempat` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_janda`
--

CREATE TABLE `surat_janda` (
  `id_surat_janda` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kehilangan`
--

CREATE TABLE `surat_kehilangan` (
  `id_surat_kehilangan` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `kehilangan` char(200) NOT NULL,
  `tgl_kehilangan` date NOT NULL,
  `tempat` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `perihal` char(100) NOT NULL,
  `tujuan` char(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `file` varchar(200) NOT NULL,
  `tgl_kirim_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kematian`
--

CREATE TABLE `surat_kematian` (
  `id_surat_kematian` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `hari` char(100) NOT NULL,
  `pukul` char(100) NOT NULL,
  `bertempat` char(100) NOT NULL,
  `dimakamkan` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kurang_mampu`
--

CREATE TABLE `surat_kurang_mampu` (
  `id_surat_kurang_mampu` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `peruntukan` char(100) NOT NULL,
  `keperluan` char(100) NOT NULL,
  `penghasilan` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `pengirim` char(100) NOT NULL,
  `perihal` char(100) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `pengirim`, `perihal`, `tgl_diterima`, `tgl_surat`, `file`) VALUES
('12b3e72a-3b70-11ee-9f7f-10af40302f5f', 'OG.03.01/1630/ORG', 'SEKRETARIAT DAERAH', 'Sosialisasi Perbup tentang Peta Proses Bisnis', '2023-07-23', '2023-07-21', 'undangan_41.png'),
('37f3163d-3b6f-11ee-9f7f-10af40302f5f', 'TM /1607 /PEM', 'SEKRETARIAT DAERAH', 'Ralat Undangan Rapat Koordinasi Urusan Pemerintahan Umum', '2023-08-24', '2023-08-10', 'undangan_2.jpeg'),
('76dac705-3b70-11ee-9f7f-10af40302f5f', 'OG.03.01/1632/ORG', 'SEKRETARIAT DAERAH', 'Sosialisasi Standar Kompetensi Jabatan', '2023-07-23', '2023-07-21', 'undangan_5.png'),
('92e18f06-3b6f-11ee-9f7f-10af40302f5f', 'KM.05.04/863//DKUMPP', 'DINAS KOPERASI, USAHA MIKRO PERINDUSTRIAN DAN PERDAGANGAN', 'Mohon Fasilitasi tempat (Aula) dan Perlengkapannya', '2023-08-17', '2023-08-16', 'undangan_31.png'),
('c75eeec3-3b6e-11ee-9f7f-10af40302f5f', '414/659 /BPD/DPMD', 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', 'Undangan Rapat Koordinasi Batas Desa se Kalimantan Selatan', '2023-08-16', '2023-08-14', 'undangan.jpeg'),
('de03a665-3b70-11ee-9f7f-10af40302f5f', '460/DSFM-1202/DINSOSP3AP2KB/2023', 'DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK,PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', 'Undangan Sosialisasi Penyelengaraan Undian Gratis Berhadiah (UGB)', '2023-08-16', '2023-08-08', 'undangan_6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pindah_datang`
--

CREATE TABLE `surat_pindah_datang` (
  `id_surat_pindah_datang` char(100) NOT NULL,
  `no_kk` char(100) NOT NULL,
  `nama_kk` char(100) NOT NULL,
  `alamat_awal` char(100) NOT NULL,
  `rt_awal` char(100) NOT NULL,
  `rw_awal` char(100) NOT NULL,
  `dusun_awal` char(100) NOT NULL,
  `desa_awal` char(100) NOT NULL,
  `kec_awal` char(100) NOT NULL,
  `kab_awal` char(100) NOT NULL,
  `prov_awal` char(100) NOT NULL,
  `pos_awal` char(100) NOT NULL,
  `telp_awal` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `alasan_pindah` char(100) NOT NULL,
  `alamat_pindah` char(100) NOT NULL,
  `rt_pindah` char(100) NOT NULL,
  `rw_pindah` char(100) NOT NULL,
  `dusun_pindah` char(100) NOT NULL,
  `desa_pindah` char(100) NOT NULL,
  `kec_pindah` char(100) NOT NULL,
  `kab_pindah` char(100) NOT NULL,
  `prov_pindah` char(100) NOT NULL,
  `pos_pindah` char(100) NOT NULL,
  `telp_pindah` char(100) NOT NULL,
  `jenis_kepindahan` char(100) NOT NULL,
  `status_kk_tidak_pindah` char(100) NOT NULL,
  `status_kk_pindah` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL,
  `nik1` text NOT NULL,
  `nik2` text NOT NULL,
  `nik3` text NOT NULL,
  `nik4` text NOT NULL,
  `nik5` text NOT NULL,
  `nik6` text NOT NULL,
  `nik7` text NOT NULL,
  `nama1` text NOT NULL,
  `nama2` text NOT NULL,
  `nama3` text NOT NULL,
  `nama4` text NOT NULL,
  `nama5` text NOT NULL,
  `nama6` text NOT NULL,
  `nama7` text NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `tanda_tangan` char(100) DEFAULT NULL,
  `jenis_permohonan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pindah_keluar`
--

CREATE TABLE `surat_pindah_keluar` (
  `id_surat_pindah_keluar` char(100) NOT NULL,
  `no_kk` char(100) NOT NULL,
  `nama_kk` char(100) NOT NULL,
  `alamat_awal` char(100) NOT NULL,
  `rt_awal` char(100) NOT NULL,
  `rw_awal` char(100) NOT NULL,
  `dusun_awal` char(100) NOT NULL,
  `desa_awal` char(100) NOT NULL,
  `kec_awal` char(100) NOT NULL,
  `kab_awal` char(100) NOT NULL,
  `prov_awal` char(100) NOT NULL,
  `pos_awal` char(100) NOT NULL,
  `telp_awal` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `alasan_pindah` char(100) NOT NULL,
  `alamat_pindah` char(100) NOT NULL,
  `rt_pindah` char(100) NOT NULL,
  `rw_pindah` char(100) NOT NULL,
  `dusun_pindah` char(100) NOT NULL,
  `desa_pindah` char(100) NOT NULL,
  `kec_pindah` char(100) NOT NULL,
  `kab_pindah` char(100) NOT NULL,
  `prov_pindah` char(100) NOT NULL,
  `pos_pindah` char(100) NOT NULL,
  `telp_pindah` char(100) NOT NULL,
  `jenis_kepindahan` char(100) NOT NULL,
  `status_kk_tidak_pindah` char(100) NOT NULL,
  `status_kk_pindah` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL,
  `nik1` text NOT NULL,
  `nik2` text NOT NULL,
  `nik3` text NOT NULL,
  `nik4` text NOT NULL,
  `nik5` text NOT NULL,
  `nik6` text NOT NULL,
  `nik7` text NOT NULL,
  `nama1` text NOT NULL,
  `nama2` text NOT NULL,
  `nama3` text NOT NULL,
  `nama4` text NOT NULL,
  `nama5` text NOT NULL,
  `nama6` text NOT NULL,
  `nama7` text NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `tanda_tangan` char(100) DEFAULT NULL,
  `jenis_permohonan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_skck`
--

CREATE TABLE `surat_skck` (
  `id_surat_skck` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `keperluan` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_skck`
--

INSERT INTO `surat_skck` (`id_surat_skck`, `no_surat`, `id_ktp`, `keperluan`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('b361cc06-c2b4-11ee-b9a5-7f66825833f6', '', '736bedd0-3b65-11ee-9f7f-10af40302f5f', 'PERSYARATAN PENETAPAN NI PPPK FORMASI TAHUN 2023 KOTA BANJARMASIN', '0000-00-00', NULL, 'Proses', '9009bfc35b492340ecbe23625162b900.pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_usaha`
--

CREATE TABLE `surat_usaha` (
  `id_surat_usaha` char(100) NOT NULL,
  `no_surat` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
  `jenis_usaha` char(200) NOT NULL,
  `nama_usaha` char(100) NOT NULL,
  `alamat_usaha` char(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanda_tangan` char(100) DEFAULT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd_laporan`
--

CREATE TABLE `ttd_laporan` (
  `id_ttd` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `lebar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd_laporan`
--

INSERT INTO `ttd_laporan` (`id_ttd`, `nip`, `nama_ttd`, `jabatan`, `file`, `lebar`) VALUES
(1, '198511071 200412 1 002', 'GT. M. Noviar Hidayat ,SSTP ,M.Si', 'plt. Camat Kertak Hanyar,', 'ttd.jpg', 150);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis_kegiatan`);

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id_ktp`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pgw`);

--
-- Indeks untuk tabel `pelayanan_ktp`
--
ALTER TABLE `pelayanan_ktp`
  ADD PRIMARY KEY (`id_buat_ktp`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_ktp` (`id_ktp`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`),
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`);

--
-- Indeks untuk tabel `peserta_penugasan`
--
ALTER TABLE `peserta_penugasan`
  ADD PRIMARY KEY (`id_peserta_penugasan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_penugasan` (`id_penugasan`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `id_ktp` (`id_ktp`);

--
-- Indeks untuk tabel `surat_belum_menikah`
--
ALTER TABLE `surat_belum_menikah`
  ADD PRIMARY KEY (`id_surat_belum_menikah`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_biodek`
--
ALTER TABLE `surat_biodek`
  ADD PRIMARY KEY (`id_surat_biodek`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_domisili`
--
ALTER TABLE `surat_domisili`
  ADD PRIMARY KEY (`id_surat_domisili`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_izin_keramaian`
--
ALTER TABLE `surat_izin_keramaian`
  ADD PRIMARY KEY (`id_surat_izin_keramaian`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_janda`
--
ALTER TABLE `surat_janda`
  ADD PRIMARY KEY (`id_surat_janda`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_kehilangan`
--
ALTER TABLE `surat_kehilangan`
  ADD PRIMARY KEY (`id_surat_kehilangan`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indeks untuk tabel `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD PRIMARY KEY (`id_surat_kematian`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_kurang_mampu`
--
ALTER TABLE `surat_kurang_mampu`
  ADD PRIMARY KEY (`id_surat_kurang_mampu`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indeks untuk tabel `surat_pindah_datang`
--
ALTER TABLE `surat_pindah_datang`
  ADD PRIMARY KEY (`id_surat_pindah_datang`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_pindah_keluar`
--
ALTER TABLE `surat_pindah_keluar`
  ADD PRIMARY KEY (`id_surat_pindah_keluar`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_skck`
--
ALTER TABLE `surat_skck`
  ADD PRIMARY KEY (`id_surat_skck`),
  ADD KEY `id_ktp` (`id_ktp`,`tanda_tangan`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `surat_usaha`
--
ALTER TABLE `surat_usaha`
  ADD PRIMARY KEY (`id_surat_usaha`),
  ADD KEY `id_ktp` (`id_ktp`),
  ADD KEY `tanda_tangan` (`tanda_tangan`);

--
-- Indeks untuk tabel `ttd_laporan`
--
ALTER TABLE `ttd_laporan`
  ADD PRIMARY KEY (`id_ttd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ttd_laporan`
--
ALTER TABLE `ttd_laporan`
  MODIFY `id_ttd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `penugasan_ibfk_1` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`id_jenis_kegiatan`);

--
-- Ketidakleluasaan untuk tabel `peserta_penugasan`
--
ALTER TABLE `peserta_penugasan`
  ADD CONSTRAINT `peserta_penugasan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pgw`),
  ADD CONSTRAINT `peserta_penugasan_ibfk_2` FOREIGN KEY (`id_penugasan`) REFERENCES `penugasan` (`id_penugasan`);

--
-- Ketidakleluasaan untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`);

--
-- Ketidakleluasaan untuk tabel `surat_belum_menikah`
--
ALTER TABLE `surat_belum_menikah`
  ADD CONSTRAINT `surat_belum_menikah_ibfk_1` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_biodek`
--
ALTER TABLE `surat_biodek`
  ADD CONSTRAINT `surat_biodek_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_biodek_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_domisili`
--
ALTER TABLE `surat_domisili`
  ADD CONSTRAINT `surat_domisili_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_domisili_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_izin_keramaian`
--
ALTER TABLE `surat_izin_keramaian`
  ADD CONSTRAINT `surat_izin_keramaian_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_izin_keramaian_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_janda`
--
ALTER TABLE `surat_janda`
  ADD CONSTRAINT `surat_janda_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_janda_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_kehilangan`
--
ALTER TABLE `surat_kehilangan`
  ADD CONSTRAINT `surat_kehilangan_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_kehilangan_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD CONSTRAINT `surat_kematian_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_kematian_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_kurang_mampu`
--
ALTER TABLE `surat_kurang_mampu`
  ADD CONSTRAINT `surat_kurang_mampu_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_kurang_mampu_ibfk_2` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_kurang_mampu_ibfk_3` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_pindah_datang`
--
ALTER TABLE `surat_pindah_datang`
  ADD CONSTRAINT `surat_pindah_datang_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_pindah_datang_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_pindah_keluar`
--
ALTER TABLE `surat_pindah_keluar`
  ADD CONSTRAINT `surat_pindah_keluar_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_pindah_keluar_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_skck`
--
ALTER TABLE `surat_skck`
  ADD CONSTRAINT `surat_skck_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_skck_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);

--
-- Ketidakleluasaan untuk tabel `surat_usaha`
--
ALTER TABLE `surat_usaha`
  ADD CONSTRAINT `surat_usaha_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `ktp` (`id_ktp`),
  ADD CONSTRAINT `surat_usaha_ibfk_2` FOREIGN KEY (`tanda_tangan`) REFERENCES `pegawai` (`id_pgw`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
