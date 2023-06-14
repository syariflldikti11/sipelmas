-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 11.30
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
('sfsfdsfs', 'sdsd', 'sds', '');

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
('36c2d594-0a7f-11ee-ac0b-c454445434d3', 'saf');

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
('126e341b-f295-11ec-b338-c454445434d3', '6309112608980001', 'Syarif Firdauss', 'banjarmasin', 'xx', 'xx', 'Islam', 'asf', '2022-06-23', 'L', 'Indonesia', 'pns', 'Sudah Menikah', '0011.pdf'),
('18dd6073-09e6-11ee-ab00-55ae67f9aa6a', '6308101008850004', 'ayu', 'handil bakti', 'handil', 'xx', 'Islam', 'Tabalong', '2023-06-13', 'L', 'Indonesia', 'Tenaga Kontrak', 'Sudah Menikah', 'Soal_1_Evaluasi_Materi.pdf');

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
('aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Rusdianto', 'Sekretaris Desa', 'Pantai Hambawang', '8769', '868', '6309112608980002'),
('bced8a73-0c95-11ed-830d-c454445434d3', 'Mahdiyanoor', 'Kepala Desa', 'Pantai Hambawang', '082157876927', '082157876927', '6309112608980001');

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

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_ktp`, `mengadu`, `balasan`, `tgl_pengaduan`, `peng_telpon`) VALUES
('2eqeawe', '126e341b-f295-11ec-b338-c454445434d3', 'as', 'sfd', '2023-06-14 02:34:05', '08'),
('ewrsdfe', '126e341b-f295-11ec-b338-c454445434d3', 'adss', NULL, '2023-04-01 02:40:50', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `role` int(11) NOT NULL,
  `id_pegawai` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `password`, `role`, `id_pegawai`) VALUES
('e954cec8-0a7d-11ee-ac0b-c454445434d3', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a'),
('f080bc72-0a7d-11ee-ac0b-c454445434d3', '21232f297a57a5a743894a0e4a801fc3', 2, 'bced8a73-0c95-11ed-830d-c454445434d3');

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
('96253f73-04e9-11ee-876e-c454445434d3', '2023-06-07', '2023-06-08', 'jjs', '470 / 314/PH/ XII/ 2021', '4__Surat_Keterangan.pdf', '2023-06-07', '', ''),
('ccfab9e9-0a83-11ee-ac0b-c454445434d3', '2023-06-14', '2023-06-14', 'ok', 'xxx', NULL, '2023-06-14', '', '36c2d594-0a7f-11ee-ac0b-c454445434d3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_penugasan`
--

CREATE TABLE `peserta_penugasan` (
  `id_peserta_penugasan` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta_penugasan`
--

INSERT INTO `peserta_penugasan` (`id_peserta_penugasan`, `id_pegawai`, `id_penugasan`) VALUES
('8e55dc97-04eb-11ee-876e-c454445434d3', 'ec3f5a25-fd64-11ed-9f05-ea3c6f7707bf', '96253f73-04e9-11ee-876e-c454445434d3');

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
('08412bca-0a60-11ee-ac0b-c454445434d3', '126e341b-f295-11ec-b338-c454445434d3', '2023-06-14 16:00:00', 'sd', '4__Surat_Keterangan.pdf', '08', 'Proses');

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

--
-- Dumping data untuk tabel `surat_belum_menikah`
--

INSERT INTO `surat_belum_menikah` (`id_surat_belum_menikah`, `no_surat`, `id_ktp`, `bin`, `status_nikah`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('f8028609-0a8a-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 20a21', '126e341b-f295-11ec-b338-c454445434d3', 'as', 'Belum menikah', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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
('894aa5aa-0a8b-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 20a21', '126e341b-f295-11ec-b338-c454445434d3', '', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '', '');

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
('3bd39bd3-0a8a-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 2021', '126e341b-f295-11ec-b338-c454445434d3', 'xxxx', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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

--
-- Dumping data untuk tabel `surat_izin_keramaian`
--

INSERT INTO `surat_izin_keramaian` (`id_surat_izin_keramaian`, `no_surat`, `id_ktp`, `dalam_rangka`, `hari`, `tanggal`, `tempat`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('108de23c-0a8b-11ee-ac0b-c454445434d3', 'xxx', '126e341b-f295-11ec-b338-c454445434d3', 'ads', 'ads', 'adas', 'ads', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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
('0e7f2359-0a88-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 20a21', '126e341b-f295-11ec-b338-c454445434d3', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Selesai', '', '0e7f2359-0a88-11ee-ac0b-c454445434d3.png'),
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

--
-- Dumping data untuk tabel `surat_kehilangan`
--

INSERT INTO `surat_kehilangan` (`id_surat_kehilangan`, `no_surat`, `id_ktp`, `kehilangan`, `tgl_kehilangan`, `tempat`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('9a2a8afc-0a8a-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 20a21', '126e341b-f295-11ec-b338-c454445434d3', 'saf', '2023-06-14', 'Rumah Mempelai', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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
('a328c50f-09f8-11ee-ab00-55ae67f9aa6a', 'aaaasa', 'vv', 'ooo', '2023-06-13', 'Soal_1_Evaluasi_Materi2.pdf', '0000-00-00');

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

--
-- Dumping data untuk tabel `surat_kematian`
--

INSERT INTO `surat_kematian` (`id_surat_kematian`, `no_surat`, `id_ktp`, `hari`, `pukul`, `bertempat`, `dimakamkan`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('c74a0d3d-0a8a-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 2021', '126e341b-f295-11ec-b338-c454445434d3', 'Seninds', 'a', 'jhkkjl', 'asd', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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

--
-- Dumping data untuk tabel `surat_kurang_mampu`
--

INSERT INTO `surat_kurang_mampu` (`id_surat_kurang_mampu`, `no_surat`, `id_ktp`, `peruntukan`, `keperluan`, `penghasilan`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('b17e963f-0a8a-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 2021', '126e341b-f295-11ec-b338-c454445434d3', 'SURAT KETERANGAN MISIKN', 'asf', '2000000', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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
('dda9e5cb-09f6-11ee-ab00-55ae67f9aa6a', 'asdad', 'ada', 'af', '2023-06-13', '2023-06-13', 'Soal_1_Evaluasi_Materi1.pdf');

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

--
-- Dumping data untuk tabel `surat_skck`
--

INSERT INTO `surat_skck` (`id_surat_skck`, `no_surat`, `id_ktp`, `keperluan`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('459d520e-0a8b-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 2021', '18dd6073-09e6-11ee-ab00-55ae67f9aa6a', 'a', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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
-- Dumping data untuk tabel `surat_usaha`
--

INSERT INTO `surat_usaha` (`id_surat_usaha`, `no_surat`, `id_ktp`, `jenis_usaha`, `nama_usaha`, `alamat_usaha`, `tanggal_surat`, `tanda_tangan`, `status`, `file`, `qrcode`) VALUES
('7c458396-0a8a-11ee-ac0b-c454445434d3', '470 / 314/PH/ XII/ 20a21', '126e341b-f295-11ec-b338-c454445434d3', 'sdf', 'arfs', 'ad', '2023-06-14', 'aba2d31d-09e3-11ee-ab00-55ae67f9aa6a', 'Proses', '', '');

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
-- Indeks untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indeks untuk tabel `peserta_penugasan`
--
ALTER TABLE `peserta_penugasan`
  ADD PRIMARY KEY (`id_peserta_penugasan`);

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
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

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
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

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
