-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb20.awardspace.net
-- Generation Time: 24 Des 2020 pada 12.20
-- Versi Server: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3132214_perawatid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `email`, `username`, `password`, `photo`) VALUES
(1, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', 'admin', '$2y$10$pqK2JyVts5BilaucF48EmeTts3zRU3RXAEwE5uwmF5HjcI/RrAk8O', 'ADMIN-PRID-082119223938.png'),
(6, 'Ayu Anita', 'anitha_ayhu@yahoo.com', 'ayumi', '$2y$10$Dq5z4HxrjQnxY9FVq6lsAejT.2cURpw8ogdkrriZ2seJYuovsLUIK', 'ADMIN-PRID-080319143922.png'),
(12, 'Rahmat Ilham', 'rahmat.ilham44yl@gmail.com', 'rahmat_ryu', '$2y$10$nnL9RqE.y6X3XzscnKXFAOPJcrAy0sy66wqKPXSbg4DgkAJcRC.rS', 'ADMIN-PRID-080319184151.png'),
(14, 'Yui YL', 'yui@mail.com', 'yui123', '$2y$10$0TnQ/7ifzV4B/QJPT7iEp.l107yH1z1FexX.A.BUQtWGKqXnz2M/u', 'ADMIN-PRID-080819105503.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `title`, `image`) VALUES
(1, 'Melayani dengan hati', 'IMG-PRID-080319115945.png'),
(2, 'Pelayana Langsia', 'IMG-PRID-080419183107.png'),
(3, 'Pendampinga Rawat Inap di rs', 'IMG-PRID-081019111417.png'),
(4, 'Perawatan Korban Kecelakaan', 'IMG-PRID-081619091408.png'),
(5, 'Jalinan Perawat Indonesia', 'IMG-PRID-082119142247.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_message`
--

CREATE TABLE `tb_message` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_message`
--

INSERT INTO `tb_message` (`id`, `nama`, `email`, `pesan`, `status`, `created_at`) VALUES
(5, 'Rahmat Ilham', 'rahmat.ilham44yl@gmail.com', 'saya kurang paham di bagian ininya itu', 'read', '2019-08-04 12:01:43'),
(6, 'Harinjg', 'hartono@gmail.com', 'Bagaimana cara menggunakan yang bagian ini ya?', 'read', '2019-08-04 12:06:03'),
(7, 'Azwar Bahar', 'asdfghjk@sd.com', 'Sangat memuaskan sekali semoga bisa terus berkembang', 'read', '2019-08-04 13:02:38'),
(8, 'Muhammad Ilham', 'muh.ilham@gmail.com', 'Saya menyarangkan agar kedepannya lebih bagus lagi menjalani semua yang diamanatkan kepada anda sebagai admin yang yangat bijaksana ok', 'read', '2019-08-04 13:14:36'),
(9, 'Reza Maulana', 'rezaeca@gmail.com', 'Keren sekai bosque', 'read', '2019-08-04 14:39:24'),
(10, 'Cindy Asrini Basri', 'cindy_asrini@gmail.com', 'Ini sangat tidak memudahkan saya bangke sekali', 'read', '2019-08-04 14:51:58'),
(11, 'Miftahul Khair', 'miftahulkhair@gmail.com', 'saya merasa sangat terbantu dengan layanan anda. saya ucpkan terima kasih', 'read', '2019-08-04 15:13:19'),
(13, 'Rahmat Ilham', 'rahamat.ilham44yl@gmail.com', 'Perawat.ID sangan membantu saya. erima kasih atas layanan yang diberikan!', 'read', '2019-08-16 09:37:49'),
(14, 'Wahyuddin Annur', 'yudhi_pujha@yahoo.com', 'Sangan membantu', 'read', '2019-08-16 10:17:00'),
(15, 'Wirna Sintia Rahayu', 'wirna.snr@gmail.com', 'Widih keren bgst', 'read', '2019-08-16 10:19:59'),
(17, 'tes', 'telkom.ind@gmail.com', 'okok', 'read', '2019-08-16 10:28:38'),
(18, 'rtyu', 'telkom.ind@gmail.com', 'rtyu', 'read', '2019-08-16 10:29:40'),
(19, 'Mitsuha', 'mitsuka.yn@gmail.com', 'Kimi no namaewa?', 'read', '2019-08-16 10:49:48'),
(21, 'tes', 'teslagi@gmail.com', 'tesji bang', 'read', '2019-08-16 11:48:25'),
(22, 'lagi', 'telkom.ind@gmail.com', 'tesss', 'read', '2019-08-16 11:49:56'),
(23, 'saya lagi', 'telkom.ind@gmail.com', 'wewewewewe', 'read', '2019-08-16 11:51:44'),
(24, 'Maul', 'dfgh@gh.com', 'sasugawa', 'read', '2019-08-16 11:52:48'),
(25, 'ber', 'telkom.ind@gmail.com', 'asdas', 'read', '2019-08-16 11:53:08'),
(26, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', 'Saya ', 'read', '2019-08-21 15:19:19'),
(27, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', 'Saya dff', 'read', '2019-08-21 15:20:19'),
(28, 'ass', 'rahmat.ilyas142@gmail.com', 'apa', 'read', '2019-08-21 15:20:40'),
(29, 'Rayufug', 'telkom.ind@gmail.com', 'Apa', 'read', '2019-08-21 15:21:57'),
(30, 'Reza Maulana', 'rahmat.ilham44yl@gmail.com', 'Oiii', 'read', '2019-08-21 15:24:53'),
(31, 'Ayu Anita', 'anitha_ayhu@yahoo.co.id', 'rtyjk', 'read', '2019-08-21 15:27:44'),
(32, 'Tes', 'Rahmat.ilyas@yahoo.com', 'Dhdh', 'read', '2019-08-21 15:57:48'),
(33, 'Ayu Anita', 'anitha_ayhu@yahoo.co.id', 'rtyjk', 'read', '2019-08-21 16:10:19'),
(34, 'Riski Yaumal', 'rizka.yaumal@yahio.com', 'Halo assalamualaikummmmm', 'read', '2019-08-22 20:20:09'),
(35, 'Rainych Ran', 'rainych_run@yahoo.co.id', 'Halo yuhu', 'read', '2019-08-22 20:21:20'),
(36, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', 'Sangad memuaskan', 'read', '2019-08-31 00:39:16'),
(37, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', 'Hy Halo Ok', 'read', '2020-12-18 18:28:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `title_news` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `fill_news` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_news`
--

INSERT INTO `tb_news` (`id`, `title_news`, `cover`, `fill_news`, `created_at`, `updated_at`) VALUES
(43, 'Windows dalam versi anime? Ini dia 10 produk terkenal yang diadaptasi ke dalam anime', 'IMG-PRID-072619170912.png', '<p>23456</p><p>dfghjkl;</p><p>ghjkl;</p><p>tgyhjk</p><p></p><p>rrrrrererere\'</p><p>ghjkl</p><p>vbnm yang menjadi semua yang akan kita lakukan</p><p><img src="assets/images/news/content/image_news_43_0.jpg" data-filename="kiritoems.png" style="width: 100%;"><br></p><p><br></p>', '2019-07-27 01:32:04', '2019-08-16 08:13:32'),
(49, 'Hatsune Miku Terlihat di Anime Hyoka. Ini kata produsernya', 'IMG-PRID-072719034257.png', '<p>Para penggemar Anime Hyoka pasti sudah melihat sosok karakter vocloid yang sangat populer, yaitu Hatsune Miku terlihat tampil di dalam serial anime ini, tidak cuma miku saja yang terlihat, tetapi juga terlihat karakter akame dari serial anime Akame ga Kill.</p><p><img src="assets/images/news/content/image_news_49_38.jpg" data-filename="1.png" style="width: 100%;" null="100%;"><br></p><p>Tes Test</p><p><img src="assets/images/news/content/image_news_49_40.jpg" data-filename="1.png" style="width: 100%;" null="997px;"><br></p><p></p>', '2019-07-26 19:42:57', '2019-08-29 05:24:21'),
(50, 'Tips Dokter Agar Tidak Terkecoh Obat Palsu di Apotek', 'IMG-PRID-072719051758.png', '<p>Jakarta - Masih maraknya penjualan obat palsu di beberapa apotek bisa sangat meresahkan, apalagi obat palsu ini cukup sulit dibedakan. Oleh karena itu, ahli penyakit dalam dr Eka Ginanjar, Sp.PD-KKV, FINASIM, FACP membagikan beberapa tips yang bisa digunakan.</p><p>Yang pertama, dr Eka menyarankan untuk membeli obat di tempat resmi yang teregistrasi. Harga mungkin lebih mahal, namun kualitas tentu sudah akan terjamin.</p><p>Kemudian pastikan untuk membeli obat yang sesuai dengan resep dokter. Hindari juga membeli lewat situs jual-beli online, lebih baik membelinya langsung.</p><p>"Kecuali dikasih tahu link dari apotek yang sudah teregistrasi jadi bisa telepon. Bukan yang beli langsung di situs-situs, nggak jelas siapa yang jual dan beli dari mana. Pakai bismillah, karena orang jahat banyak," tuturnya kepada detikHealth melalui sambungan telepon, Jumat (26/7/2019).</p><p>Perhatikan juga kemasan dan efek obat. Menurut dr Eka, dalam kasus obat palsu tersebut kebanyakan obat yang dipalsu adalah obat yang digunakan untuk penyakit kronis. Maka konsumen harus curiga apabila tidak ada efek yang terjadi, misal gula darah tidak turun pada pengidap diabetes.</p><p>Dihubungi terpisah, Prof Dr dr Pradana Soewondo, SpPD-KEMD dari RS Premiere Jatinegara berharap ada penyederhanaan tata niaga perdagangan obat dan pengawasan yang lebih aktif. Dan juga lebih baik untuk menghilangkan sistem harga dua rezim.</p><p>"Hilangkan sistem harga dua rezim, rezim BPJS dan rezim umum reguler. Ini membuat rembesan dan keuntungan bagi pemain-pemain seperti para apoteker yang membeli harga BPJS dijual di jalur umum. Satu harga asli, jangan pakai dua harga tapi kemasan harus sama. Satu pen insulin harga BPJS 87 ribu, harga apotik 200 ribu. Nggak tahu mana yang asli, kemasan sama," tandasnya.</p>', '2019-07-26 21:17:58', '0000-00-00 00:00:00'),
(51, 'Perawat.ID Melakukan Sosialisai Kesehatan di Desa Barugae, Kab. Bulukumba', 'IMG-PRID-081619104401.png', '<p><b>Bulukmba, Senin 12 Agustus 2019. </b>Perawat.ID scuhcycggdt. disana terdapat banyak sekali kegiatan yang diadakan oleh tim yang diiijvh, ihvuygfsfsbhsvyÂ  ytft tsjggsÂ </p><p>Â  Â  Dan salah satu yang menarik perhaian yaitu ketika warga sekitar melakukn aksi pencobaan bunuh diri di pinggir kali yang dangkal sekali<br></p>', '2019-08-16 02:44:01', '2019-08-16 02:46:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_news_content`
--

CREATE TABLE `tb_news_content` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_news_content`
--

INSERT INTO `tb_news_content` (`id`, `id_news`, `image`) VALUES
(29, 43, 'image_news_43_0.jpg'),
(38, 49, 'image_news_49_38.jpg'),
(40, 49, 'image_news_49_40.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_send_message`
--

CREATE TABLE `tb_send_message` (
  `id` int(11) NOT NULL,
  `email_tujuan` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_send_message`
--

INSERT INTO `tb_send_message` (`id`, `email_tujuan`, `subjek`, `pesan`, `created_at`) VALUES
(3, 'rezam5162@gmail.com', 'Balas Komentar', 'Tes ji', '2019-08-07 12:19:20'),
(4, 'rahmat.ilyas142@gmail.com', 'Balas Komentar', '<p>apa juga</p>', '2019-08-21 19:15:11'),
(5, 'rahmat.ilyas142@gmail.com', 'Balas Komentar', '<p>lagi cuk</p>', '2019-08-21 19:44:10'),
(6, 'rahmat.ilyas142@gmail.com', 'Balas Komentar', '<p>tes lagi</p>', '2019-08-21 19:44:56'),
(7, 'rahmat.ilham44yl@gmail.com', 'Balas Komentar', '<p>lalalii</p>', '2019-08-21 20:04:10'),
(8, 'rahmat.ilyas142@gmail.com', 'Balas Komentar', '<p>Mungkaliopiyughiyas</p>', '2019-08-22 20:23:36'),
(9, 'rahmat.ilyas142@gmail.com', 'Yuhuu', '<p>Apa?</p>', '2019-08-27 20:32:17'),
(10, 'rahmat.ilyas142@gmail.com', 'Tes', '<p>Tes</p>', '2020-12-18 18:29:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_message`
--
ALTER TABLE `tb_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news_content`
--
ALTER TABLE `tb_news_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_send_message`
--
ALTER TABLE `tb_send_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_message`
--
ALTER TABLE `tb_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tb_news_content`
--
ALTER TABLE `tb_news_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tb_send_message`
--
ALTER TABLE `tb_send_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
