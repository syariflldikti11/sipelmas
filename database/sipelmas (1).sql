-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2023 pada 00.33
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
('1', 'tes', 'tes', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jenis_kegiatan` varchar(200) NOT NULL,
  `nama_jenis_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('8uewhfwoinsowiqhrfnseoifis', 'Syarif Firdaus', '', '', '', '', '6309112608980001');

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
('f080bc72-0a7d-11ee-ac0b-c454445434d3', '21232f297a57a5a743894a0e4a801fc3', 2, '8uewhfwoinsowiqhrfnseoifis');

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
('91c81f6f-0aae-11ee-8368-7673dcf73f56', '6309112608980002', '827ccb0eea8a706c4c34a16891f84e7b', 'asyarrif@gmail.com', '', 1);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_penugasan`
--

CREATE TABLE `peserta_penugasan` (
  `id_peserta_penugasan` varchar(100) NOT NULL,
  `id_pegawai` char(100) NOT NULL,
  `id_penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanggal_surat` date NOT NULL DEFAULT current_timestamp(),
  `tanda_tangan` char(100) NOT NULL,
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

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_surat`, `perihal`, `tujuan`, `tgl_surat`, `file`, `tgl_kirim_surat`) VALUES
('33ff9b50-39b7-11ee-bc56-878814cdc77d', 'as', 'a', 'sds', '2023-08-14', 'neraca_inspektorat_2022.pdf', '2023-08-17');

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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
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
('17357294-39b7-11ee-bc56-878814cdc77d', 'as', 'a', 'a', '2023-08-20', '2023-08-13', 'neraca_dkp3_2022.pdf');

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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
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
  `tanda_tangan` char(100) NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Proses',
  `file` char(100) NOT NULL,
  `qrcode` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tanda_tangan` char(100) NOT NULL,
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
(1, '12345', 'budi', 'camat', 'x', 50);

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
