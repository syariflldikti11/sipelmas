-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 11.20
-- Versi server: 10.4.11-MariaDB
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
('', 'sdsd', 'sds', '');

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

--
-- Dumping data untuk tabel `ktp`
--

INSERT INTO `ktp` (`id_ktp`, `nik`, `nama`, `alamat`, `desa`, `rt`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jkelamin`, `wnegara`, `pekerjaan`, `snikah`, `ftoktp`) VALUES
('126e341b-f295-11ec-b338-c454445434d3', '6309112608980001', 'Syarif Firdaus', 'banjarmasin', 'xx', 'xx', 'Islam', 'asf', '2022-06-23', 'L', 'Indonesia', 'pns', 'Sudah Menikah', '0011.pdf');

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
  `wa_peg` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pgw`, `nama_peg`, `jabatan`, `alamat_peg`, `telp_peg`, `wa_peg`) VALUES
('bced8a73-0c95-11ed-830d-c454445434d3', 'Mahdiyanoor', 'Kepala Desa', 'Pantai Hambawang', '082157876927', '082157876927');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` char(100) NOT NULL,
  `id_ktp` char(100) NOT NULL,
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
  `username` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
('wq5r3wdffds', '6309112608980001', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengguna` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `telp` char(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengguna`, `nik`, `password`, `email`, `telp`, `role`) VALUES
('879f7720-0d45-11ed-9e5a-c454445434d3', '6309112608980001', '8cb2237d0679ca88db6464eac60da96345513964', 'syrif.firdaus@gmail.com', '082157876927', 1);

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

--
-- Dumping data untuk tabel `surat_biodek`
--

INSERT INTO `surat_biodek` (`id_surat_biodek`, `no_surat`, `id_ktp`, `luas_tanah`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`, `no_tanah`) VALUES
('f370ca28-0d6b-11ed-9e5a-c454445434d3', '470 / 314/PH/ XII/ 20a21', '126e341b-f295-11ec-b338-c454445434d3', 'ds', '2022-07-27', 'bced8a73-0c95-11ed-830d-c454445434d3', 'Selesai', '', '', 'dsf');

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

--
-- Dumping data untuk tabel `surat_domisili`
--

INSERT INTO `surat_domisili` (`id_surat_domisili`, `no_surat`, `id_ktp`, `alamat_domisili`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('d894a529-0d45-11ed-9e5a-c454445434d3', '470 / 314/PH/ XII/ 2021', '126e341b-f295-11ec-b338-c454445434d3', 'jalan bjm', '2022-07-27', 'bced8a73-0c95-11ed-830d-c454445434d3', 'Selesai', '', 'd894a529-0d45-11ed-9e5a-c454445434d3.png');

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

--
-- Dumping data untuk tabel `surat_janda`
--

INSERT INTO `surat_janda` (`id_surat_janda`, `no_surat`, `id_ktp`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('5d583917-0d5e-11ed-9e5a-c454445434d3', 'aaa', '126e341b-f295-11ec-b338-c454445434d3', '2022-07-27', 'bced8a73-0c95-11ed-830d-c454445434d3', 'Selesai', '', '5d583917-0d5e-11ed-9e5a-c454445434d3.png');

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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pgw`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indeks untuk tabel `surat_belum_menikah`
--
ALTER TABLE `surat_belum_menikah`
  ADD PRIMARY KEY (`id_surat_belum_menikah`);

--
-- Indeks untuk tabel `surat_biodek`
--
ALTER TABLE `surat_biodek`
  ADD PRIMARY KEY (`id_surat_biodek`);

--
-- Indeks untuk tabel `surat_domisili`
--
ALTER TABLE `surat_domisili`
  ADD PRIMARY KEY (`id_surat_domisili`);

--
-- Indeks untuk tabel `surat_izin_keramaian`
--
ALTER TABLE `surat_izin_keramaian`
  ADD PRIMARY KEY (`id_surat_izin_keramaian`);

--
-- Indeks untuk tabel `surat_janda`
--
ALTER TABLE `surat_janda`
  ADD PRIMARY KEY (`id_surat_janda`);

--
-- Indeks untuk tabel `surat_kehilangan`
--
ALTER TABLE `surat_kehilangan`
  ADD PRIMARY KEY (`id_surat_kehilangan`);

--
-- Indeks untuk tabel `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD PRIMARY KEY (`id_surat_kematian`);

--
-- Indeks untuk tabel `surat_kurang_mampu`
--
ALTER TABLE `surat_kurang_mampu`
  ADD PRIMARY KEY (`id_surat_kurang_mampu`);

--
-- Indeks untuk tabel `surat_pindah_datang`
--
ALTER TABLE `surat_pindah_datang`
  ADD PRIMARY KEY (`id_surat_pindah_datang`);

--
-- Indeks untuk tabel `surat_pindah_keluar`
--
ALTER TABLE `surat_pindah_keluar`
  ADD PRIMARY KEY (`id_surat_pindah_keluar`);

--
-- Indeks untuk tabel `surat_skck`
--
ALTER TABLE `surat_skck`
  ADD PRIMARY KEY (`id_surat_skck`);

--
-- Indeks untuk tabel `surat_usaha`
--
ALTER TABLE `surat_usaha`
  ADD PRIMARY KEY (`id_surat_usaha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
