-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2014 at 03:58 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','kaprodi') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'kaprodi', '81dc9bdb52d04dc20036dbd8313ed055', 'kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `belajar`
--

CREATE TABLE IF NOT EXISTS `belajar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_kelas` int(10) DEFAULT NULL,
  `status` enum('d','m') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `belajar`
--


-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gelar` varchar(20) NOT NULL,
  `status` enum('tetap','honor') NOT NULL DEFAULT 'tetap',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dosen`
--


--
-- Triggers `dosen`
--
DROP TRIGGER IF EXISTS `del_dsn`;
DELIMITER //
CREATE TRIGGER `del_dsn` AFTER DELETE ON `dosen`
 FOR EACH ROW BEGIN
DELETE FROM belajar
WHERE id_user = old.id AND status = 'd';
DELETE FROM penilaian
WHERE id_dsn = old.id;
DELETE FROM hasil
WHERE id_dosen = old.id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(10) NOT NULL,
  `id_jadwal` int(10) NOT NULL,
  `pedagogik` tinyint(3) NOT NULL,
  `profesional` tinyint(3) NOT NULL,
  `kepribadian` tinyint(3) NOT NULL,
  `sosial` tinyint(3) NOT NULL,
  `all` tinyint(3) NOT NULL,
  `mhs` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hasil`
--


-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `status` enum('mulai','selesai') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jadwal`
--


-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(3) DEFAULT NULL,
  `waktu` enum('pagi','malam','p2k') NOT NULL,
  `semester` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kelas`
--


--
-- Triggers `kelas`
--
DROP TRIGGER IF EXISTS `del_kls`;
DELIMITER //
CREATE TRIGGER `del_kls` AFTER DELETE ON `kelas`
 FOR EACH ROW BEGIN
DELETE FROM belajar
    WHERE id_kelas = old.id;
DELETE FROM penilaian
    WHERE id_kls = old.id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `semester` tinyint(2) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `status` enum('aktif','tidak aktif','lulus') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `mahasiswa`
--


--
-- Triggers `mahasiswa`
--
DROP TRIGGER IF EXISTS `update_kls`;
DELIMITER //
CREATE TRIGGER `update_kls` AFTER UPDATE ON `mahasiswa`
 FOR EACH ROW BEGIN

IF (OLD.status = '' OR OLD.status ='lulus' OR OLD.status='tidak aktif') AND NEW.status = 'aktif'
 THEN 
   INSERT INTO belajar VALUES (NULL,OLD.id,NULL,'m');
   
ELSEIF (NEW.status = '' OR NEW.status ='lulus' OR NEW.status='tidak aktif') AND OLD.status = 'aktif'
 THEN
  DELETE FROM belajar WHERE id_user = OLD.id AND status = 'm';
END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `del_mhs`;
DELIMITER //
CREATE TRIGGER `del_mhs` AFTER DELETE ON `mahasiswa`
 FOR EACH ROW BEGIN
DELETE FROM belajar
    WHERE id_user = old.id AND status='m';
DELETE FROM penilaian
    WHERE id_mhs = old.id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_j` int(10) NOT NULL,
  `id_mhs` int(10) NOT NULL,
  `id_dsn` int(10) NOT NULL,
  `id_kls` int(10) NOT NULL,
  `id_prt` int(10) NOT NULL,
  `nilai` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=499 ;

--
-- Dumping data for table `penilaian`
--


-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(200) NOT NULL,
  `jenis` enum('pedagogik','profesional','kepribadian','sosial') NOT NULL,
  `status` enum('digunakan','dihapus') NOT NULL DEFAULT 'digunakan',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `jenis`, `status`) VALUES
(10, 'Kesungguhan dalam mempersiapkan perkuliahan', 'pedagogik', 'digunakan'),
(21, 'Kemampuan menunjukkan keterkaitan antara bidang keahlian yang diajarkan dengan konteks kehidupan', 'profesional', 'digunakan'),
(20, 'Keluasan wawasan keilmuan', 'profesional', 'digunakan'),
(19, 'Penguasaan bidang keahlian yang menjadi tugas pokoknya', 'profesional', 'digunakan'),
(11, 'Keteraturan dan ketertiban penyelenggaraan perkuliahan', 'pedagogik', 'digunakan'),
(12, 'Kemampuan mengelola kelas', 'pedagogik', 'digunakan'),
(13, 'Kedisiplinan dan kepatuhan terhadap aturan akademik', 'pedagogik', 'digunakan'),
(14, 'Penguasaan media dan teknologi pembelajaran', 'pedagogik', 'digunakan'),
(15, 'Kemampuan melaksanakan penilaian prestasi belajar mahasiswa', 'pedagogik', 'digunakan'),
(16, 'Objektivitas dalam penilaian terhadap mahasiswa', 'pedagogik', 'digunakan'),
(17, 'Kemampuan membimbing mahasiswa', 'pedagogik', 'digunakan'),
(18, 'Berpresepsi positif terhadap kemampuan mahasiswa', 'pedagogik', 'digunakan'),
(22, 'Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan', 'profesional', 'digunakan'),
(24, 'Kesediaan melakukan refleksi dan diskusi (sharing) permasalahan dan pembelajaran yang dihadapi dengan kolega', 'profesional', 'digunakan'),
(25, 'Pelibatan mahasiswa dalam penelitian/kajian dan atau pengembangan/rekaysa/desain yang dilakukan dosen', 'profesional', 'digunakan'),
(27, 'Kemampuan mengikuti perkembangan iptek untuk pemutakhiran pembelajaran', 'profesional', 'digunakan'),
(28, 'Keterlibatan dalam kegiatan ilmiah organisasi profesi', 'profesional', 'digunakan'),
(29, 'Kewibawaan sebagai pribadi dosen', 'kepribadian', 'digunakan'),
(30, 'Kearifan dalam mengambil keputusan', 'kepribadian', 'digunakan'),
(31, 'Menjadi contoh dalam bersikap dan berprilaku', 'kepribadian', 'digunakan'),
(32, 'Satunya kata dan tindakan', 'kepribadian', 'digunakan'),
(33, 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi', 'kepribadian', 'digunakan'),
(34, 'Adil dalam memperlakukan sejawat', 'kepribadian', 'digunakan'),
(35, 'Kemampuan menyampaikan pendapat', 'sosial', 'digunakan'),
(36, 'Kemampuan menerima kritik, saran, dan pendapat orang lain', 'sosial', 'digunakan'),
(37, 'Mudah bergaul di kalangan sejawat, karyawan, dan mahasiswa', 'sosial', 'digunakan'),
(38, 'Mudah bergaul di kalangan masyarakat', 'sosial', 'digunakan'),
(39, 'Toleransi terhadap keberagaman di masyarakat', 'sosial', 'digunakan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
