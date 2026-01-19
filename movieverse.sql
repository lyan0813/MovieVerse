-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2026 at 04:18 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movieverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `birthdate`, `gender`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Song Kang', '1994-04-23', 'male', 'actors/S76fmDnwmBaufXJkYe8yEKSfoLpigmi9HYiN4IMh.png', '2026-01-02 20:57:32', '2026-01-02 23:21:38'),
(2, 'Tom Holland', '1996-06-01', 'male', 'actors/iyK6pjb4VaGf7ez2rJKGwlW72Zn7Yga5qIiXy84B.jpg', '2026-01-02 21:16:38', '2026-01-13 04:04:06'),
(3, 'Robert Downey Jr', '1965-04-04', 'male', 'actors/fAyC6l0Tgo2UuPHNrp29eHwpnSCnwDRUMTLAFCfu.jpg', '2026-01-03 01:23:53', '2026-01-03 01:23:53'),
(4, 'Brianne Sidonie Desaulniers', '1989-10-01', 'female', 'actors/Pcp5xzhljaNk9p8F1SKcJwt8k9S9WiDE5A2K8Zet.jpg', '2026-01-11 02:17:02', '2026-01-11 02:20:30'),
(6, 'John Krasinski', '1979-02-10', 'male', 'actors/bMlcVttDus8bMDs3wOv8VdFw37uubsggGA2mm6Vr.jpg', '2026-01-13 08:29:53', '2026-01-13 08:29:53'),
(7, 'Emily Olivia Laura Blunt', '1983-02-23', 'female', 'actors/bwvChXeMI9u7jCqB8cy9DOR6KLHZ6fc9JN4Snj4l.jpg', '2026-01-13 08:33:30', '2026-01-13 08:33:30'),
(8, 'Millicent Simmonds', '2003-03-06', 'female', 'actors/kYBaPiK4aLHR2LHesbbNDluQ3VpkRj3G8HpqsA9V.jpg', '2026-01-13 08:35:41', '2026-01-13 08:35:41'),
(9, 'Noah Casford Jupe', '2005-02-25', 'male', 'actors/tIhtJ921ONP2IZqyc6t61RY3oAif2I7AXcIXuRWq.jpg', '2026-01-13 08:37:21', '2026-01-13 08:37:21'),
(10, 'Christopher Hemsworth AM', '1983-08-11', 'male', 'actors/XT64HxpVM3fVyLxyCZcvIgR11VTBa7Z73HFwI5g8.jpg', '2026-01-13 08:57:51', '2026-01-13 08:57:51'),
(11, 'Kim You-jung', '1999-09-22', 'female', 'actors/Rd2b4TQ0TjhDu2AiAfCXL4JvrCePjpHdelm8Dg5w.jpg', '2026-01-13 09:00:37', '2026-01-13 09:00:37'),
(12, 'Jason Momoa', '1979-08-01', 'male', 'actors/PYo8MMldbNZY1KWI8EpLnpVKOCJatgGgcrwxInqt.jpg', '2026-01-18 08:28:22', '2026-01-18 08:28:22'),
(13, 'Zendaya Maree Stoermer Coleman', '1996-09-01', 'female', 'actors/cFsLrjlDPPGKUHDqXjbLGvhuUdreRlUq8hUuLrZo.jpg', '2026-01-18 18:33:04', '2026-01-18 18:33:04'),
(14, 'Gong Ji-cheol', '1979-07-10', 'male', 'actors/s8GMGC0MOG3VsReVuXhH3Mgui2MErFAuLLCrQl3s.png', '2026-01-18 18:34:32', '2026-01-18 18:34:32'),
(15, 'Scarlett Ingrid Johansson', '1984-11-22', 'female', 'actors/b0gXPlh8KhGUoJfbGoZ3Y9GVJLghEitvlEx0Rpd0.jpg', '2026-01-18 18:35:41', '2026-01-18 18:35:41'),
(16, 'Toma Ikuta', '1984-10-07', 'male', 'actors/lMI1mXWo90aYoiBoObRAzOtfjyF65HhEusznmxOW.jpg', '2026-01-18 18:39:46', '2026-01-18 18:39:46'),
(17, 'Lin Yun', '1996-04-16', 'female', 'actors/0PIIuxKtUVScjv0bgFHZmHPq09uikxdnWLcuYpzp.jpg', '2026-01-18 18:41:54', '2026-01-18 18:41:54'),
(18, 'Liu Yifei', '1987-08-25', 'female', 'actors/8p13WT957efbQmYNNE9bHwAle2Qm3K4pDRTqFcoE.jpg', '2026-01-18 18:42:58', '2026-01-18 18:42:58'),
(19, 'Chanikarn Tangkabodee', '2004-02-20', 'female', 'actors/Fqg3o4uzQZFfT8ZuK6WkyJp8SBAAtgsFXv4fRU68.jpg', '2026-01-18 18:43:45', '2026-01-18 18:43:45'),
(20, 'Poon Mitpakdee', '1999-12-04', 'male', 'actors/EGigJ7VILt4LdVUFpFbFsicKYKsnMuKo4jRdr7ys.jpg', '2026-01-18 18:44:35', '2026-01-18 18:44:35'),
(21, 'Norawit Titicharoenrak', '2004-06-13', 'male', 'actors/oUcAgAGASCd6pwW3QWLwaZP9g06uAz69XfHq1xwD.jpg', '2026-01-18 18:47:11', '2026-01-18 18:47:11'),
(22, 'Phuwin Tangsakyuen', '2003-07-05', 'male', 'actors/4ZldkaxZhrwoDDwnsOnuuHMRZqwfIZDB4OXWfaS7.jpg', '2026-01-18 19:09:56', '2026-01-18 19:09:56'),
(23, 'Korapat Kirdpan', '2000-12-18', 'male', 'actors/BSshoZftgJtIBd0YPr2boX5pzStaaEHIT1xr7fgt.jpg', '2026-01-18 19:14:58', '2026-01-18 19:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `film_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 9, 9, 'ga expect sama si mysterio...', '2026-01-16 18:12:58', '2026-01-16 18:31:29'),
(4, 10, 8, 'KERENN', '2026-01-18 00:36:15', '2026-01-18 00:36:15'),
(5, 7, 8, 'menyala queen!!', '2026-01-18 00:37:21', '2026-01-18 00:37:21'),
(6, 9, 3, 'songkang ganteng banget woyy', '2026-01-18 00:41:23', '2026-01-18 00:41:23'),
(7, 7, 9, 'ciee...Tom Holland sama Zendaya pacaran setelah film ini tayang tauu^^', '2026-01-18 07:40:56', '2026-01-18 07:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `user_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(2, 9, 1, '2026-01-16 18:48:28', '2026-01-16 18:48:28'),
(4, 10, 4, '2026-01-18 00:36:25', '2026-01-18 00:36:25'),
(5, 7, 7, '2026-01-18 07:42:04', '2026-01-18 07:42:04'),
(6, 7, 1, '2026-01-18 07:51:49', '2026-01-18 07:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'South Korea', NULL, NULL),
(2, 'Japan', NULL, NULL),
(3, 'China', NULL, NULL),
(4, 'USA', NULL, '2026-01-11 07:49:05'),
(5, 'Thailand', NULL, NULL),
(6, 'Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `duration` int NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `year`, `duration`, `director`, `description`, `poster`, `trailer`, `country_id`, `created_at`, `updated_at`) VALUES
(2, 'Spiderman: Homecoming', '2017', 133, 'Jon Watts', 'Spider-Man: Homecoming (2017) adalah film pahlawan super MCU yang dibintangi Tom Holland sebagai Peter Parker, yang berfokus pada keseimbangan kehidupan SMA dan tanggung jawab superhero di bawah bimbingan Tony Stark. Peter berusaha membuktikan diri melawan Vulture (Michael Keaton) yang menggunakan teknologi alien. Film ini bernuansa light-hearted dan menonjolkan sisi remaja Peter.', 'posters/EKNXBEB6lYklAAcHshsQSfRKG7pBzfzKgTd04Sjr.jpg', 'trailers/ayYB15XA0WF352tszMijs7iT4pKacCOCmkVvZ6Gr.mp4', 4, '2026-01-02 21:13:03', '2026-01-18 07:04:52'),
(3, 'My Demon', '2023', 139, 'Kim Jang Han', 'My Demon menceritakan kisah romansa fantasi antara pewaris konglomerat dingin bernama Do Do-hee (Kim Yoo-jung) dan iblis tampan bernama Jeong Gu-won (Song Kang), yang terpaksa melakukan pernikahan kontrak setelah Gu-won kehilangan kekuatannya saat bertemu Do-hee.', 'posters/41tsruC1yfHP7azl8u9GSVWJbijbx0T8cMz4Ccid.jpg', 'trailers/iw1zFtiEuI576oWJJCXoCY0nxd8CN1ehLlxYU6oJ.mp4', 1, '2026-01-02 23:54:38', '2026-01-18 07:06:52'),
(4, 'Iron Man', '2008', 126, 'Jon Favreau', 'Iron Man (2008) adalah film pembuka Marvel Cinematic Universe (MCU) yang mengisahkan transformasi Tony Stark, miliarder jenius dan produsen senjata, menjadi pahlawan berbaju besi. Setelah disandera teroris di Afganistan, Stark menciptakan reaktor dan baju tempur untuk melarikan diri, lalu bertekad menggunakan teknologinya demi perdamaian.', 'posters/p7PfmqihCED3lbGw0Sc2h1QIsNG1B162G3crUIEc.jpg', 'trailers/2cfbpTsHRQH6Fz3DUQX0CJOfaO21Wp2GwJuZ1mCr.mp4', 4, '2026-01-03 01:00:48', '2026-01-18 07:35:50'),
(7, 'Thor', '2011', 115, 'Kenneth Branagh', 'Thor (2011) adalah film Marvel yang memperkenalkan Thor, pangeran arogan dari Asgard yang dibuang ke Bumi oleh ayahnya, Odin, karena kesombongannya hampir memicu perang; di Bumi, ia belajar kerendahan hati bersama astrofisikawan Jane Foster, sementara di Asgard, adiknya Loki berambisi merebut takhta, memaksa Thor menemukan kembali palu Mjolnir-nya untuk membuktikan dirinya layak menjadi raja dan pahlawan.', 'posters/uUgBO84L4n0BBjE2RURzfYAzX1o3mTlQtTiMX6IQ.jpg', 'trailers/hAPN96bT7ooBK1uvyPLpSyg3LhQja47cmMFXaNnu.mp4', 4, '2026-01-11 02:10:17', '2026-01-18 07:36:21'),
(8, 'Captain Marvel', '2019', 124, 'Anna Boden, Ryan Fleck', 'Captain Marvel berkisah tentang Carol Danvers, seorang pilot USAF yang mengalami kecelakaan, menyerap energi Tesseract, dan menjadi hibrida Kree-manusia dengan kekuatan super, namun kehilangan ingatan. Bergabung dengan pasukan elit Kree bernama Starforce, ia terlibat dalam perang galaksi melawan Skrull, ras alien shapeshifter, yang membawanya kembali ke Bumi tahun 1990-an, bertemu Nick Fury muda, memulihkan ingatannya, dan menemukan jati dirinya sebagai pahlawan terkuat di alam semesta, menentang Kree untuk melindungi Bumi.', 'posters/Cb4izMCkhYxhXcjLUbsUDLdqXAb31nArs9Twobvv.jpg', 'trailers/wQQc45b5PGqtm7GANXsUbJxoqLbHXHardT3WMzfN.mp4', 4, '2026-01-11 07:09:46', '2026-01-18 07:36:40'),
(9, 'Spiderman: Far From Home', '2019', 129, 'Jon Watts', 'Spider-Man: Far From Home bercerita tentang Peter Parker (Spider-Man) yang berduka atas kematian Tony Stark, mencoba menjalani kehidupan normal saat liburan sekolah di Eropa, namun dipanggil oleh Nick Fury untuk menghadapi ancaman monster Elemental yang muncul akibat ulah Mysterio (Quentin Beck) yang ternyata adalah penipu dengan rencana jahat untuk merebut teknologi Stark, memaksa Peter untuk mengatasi kesedihannya dan menerima takdirnya sebagai pahlawan penerus Iron Man, di tengah konflik pribadi dengan MJ dan teman-temannya.', 'posters/2TBMOBLT8wgYPVsFl6jfbPunkoOYIzYYvt70o7CE.jpg', 'trailers/ssqOfFI5tbzf2jwAodQrgsIfjpGdkVdx1xN1Omhq.mp4', 4, '2026-01-13 03:51:34', '2026-01-18 07:01:24'),
(10, 'A Quiet Place', '2018', 90, 'John Krasinski', 'A Quiet Place bercerita tentang Keluarga Abbott yang berjuang bertahan hidup di dunia pasca-apokaliptik setelah serangan makhluk asing buta tapi punya pendengaran super tajam, memaksa mereka hidup dalam keheningan total, berkomunikasi lewat bahasa isyarat, dan berjalan tanpa alas kaki, di mana sedikit suara saja bisa mengundang kematian dan membawa teror yang menegangkan.', 'posters/C7egMlaeWNCaakPjDjuS102E1jmC24TKuDeQYNAn.jpg', 'trailers/qesLnFpDNaAdIVlRyhoKTEs6ZLDJm27UZBv62gd1.mp4', 4, '2026-01-13 08:42:44', '2026-01-18 07:37:09'),
(11, 'Avengers: Endgame', '2019', 182, 'Anthony Russo, Joe Russo', 'Avengers: Endgame bercerita tentang perjuangan para Avengers yang tersisa untuk membatalkan jentikan jari Thanos yang melenyapkan separuh populasi alam semesta, di mana mereka menemukan harapan melalui perjalanan waktu untuk mengumpulkan Infinity Stones dari masa lalu, yang berujung pada pertempuran epik dan pengorbanan besar dari Tony Stark untuk menyelamatkan segalanya, mengakhiri saga Infinity Stones dengan kemenangan namun juga kesedihan mendalam.', 'posters/H4WPvl7ib3xs4lNMkIflhfRHg9TZNwd3PABMap1C.jpg', 'trailers/FtDpFBoLpa5AI1rDHhbTBudeBRTrNksf1q5sF4MC.mp4', 4, '2026-01-13 21:53:21', '2026-01-18 08:19:36'),
(12, 'Aquaman and the Lost Kingdom', '2023', 124, 'James Wan', 'Aquaman and the Lost Kingdom menceritakan Arthur Curry (Aquaman) yang kini menjadi Raja Atlantis dan ayah, harus menghadapi Black Manta yang semakin kuat dengan kekuatan Black Trident terkutuk untuk membalas dendam. Untuk mengalahkannya, Aquaman terpaksa bekerja sama dengan musuh bebuyutannya, Orm (saudara tirinya), dalam aliansi tak terduga demi melindungi Atlantis dan keluarganya, menciptakan dinamika bromance yang menghibur di tengah ancaman kehancuran.', 'posters/72yejRGu7saDevUMdizUcGDFei7Xr2PfCgkhkyHu.jpg', 'trailers/zxVTLacFibIdUg5cDcRKegwxXh1mjmknonwtpgWM.mp4', 4, '2026-01-18 07:48:40', '2026-01-18 18:28:23'),
(13, 'Aquaman', '2018', 143, 'James Wan', 'Aquaman (2018) berkisah tentang Arthur Curry, setengah manusia setengah Atlantean, yang enggan menerima takdirnya sebagai pewaris tahta Atlantis, namun dipaksa bertindak saat saudara tirinya, Orm, berencana menyerang dunia permukaan, memaksanya mencari Trisula Atlan untuk mencegah perang dan merebut takhtanya dengan bantuan Mera, sambil melawan penjahat Black Manta yang dendam.', 'posters/FygQuwrwkHZkiffMT7qLZnqXuuj02wbeBF3FCad4.jpg', 'trailers/Cav6XsS0YULFVsnMk6hnzYBzVUubKSdK4384rzEC.mp4', 4, '2026-01-18 18:30:57', '2026-01-18 18:30:57'),
(14, 'Train to Busan', '2016', 118, 'Yeon Sang-ho', 'Train to Busan adalah film horor zombie Korea Selatan tentang seorang manajer keuangan, Seok-woo, yang terjebak dalam wabah zombie di kereta KTX saat mengantar putrinya, Soo-an, ke Busan untuk bertemu ibunya. Di dalam kereta, virus menyebar dengan cepat, memaksa Seok-woo dan beberapa penumpang selamat lainnya untuk berjuang mati-matian melawan mayat hidup yang ganas demi mencapai Busan yang dianggap sebagai zona aman terakhir. Film ini menampilkan aksi menegangkan, drama perjuangan ayah-anak, pengorbanan, dan kritik sosial tentang sifat manusia di tengah krisis.', 'posters/XrYAv0hMoINUEioAqVviCoFbMbFtM8DQZ5gW7iyz.jpg', 'trailers/SyFObwd16JVjwMHMektRJfvdeMQF07tDRnvsigao.mp4', 1, '2026-01-19 06:28:21', '2026-01-19 06:28:21'),
(15, 'The Avengers', '2012', 143, 'Joss Whedon', 'The Avengers (2012) bercerita tentang Loki, adik Thor, yang datang ke Bumi untuk mencuri Tesseract, sebuah sumber energi kuat, dengan imbalan pasukan alien Chitauri untuk menaklukkan planet ini. Nick Fury, direktur S.H.I.E.L.D., lalu mengumpulkan pahlawan super ikonik seperti Iron Man, Captain America, Thor, Hulk, Black Widow, dan Hawkeye untuk membentuk tim Avengers dan menghentikan Loki serta invasi aliennya, memaksa mereka belajar bekerja sama sebagai satu tim untuk menyelamatkan dunia.', 'posters/MsMOb7wZjVjPjyJgZ9rt7c00YnuDPSZoBDyEkIjN.jpg', 'trailers/ds2AOPzJEL9ZYS2bl7uQ9XoVuseogJGnb3duplRa.mp4', 4, '2026-01-19 07:02:49', '2026-01-19 07:02:49'),
(16, 'Black Widow', '2021', 133, 'Cate Shortland.', 'Black Widow bercerita tentang Natasha Romanoff yang menjadi buronan setelah peristiwa Captain America: Civil War, ia terpaksa menghadapi masa lalu kelamnya sebagai agen Red Room, bertemu kembali dengan \"keluarganya\" (Yelena, Alexei, Melina), dan melawan penjahat misterius Taskmaster untuk mengungkap konspirasi dan membebaskan wanita lain yang dicuci otaknya dari program Black Widow yang kejam itu, sebelum akhirnya kembali bergabung dengan Avengers dan menghadapi nasibnya di Endgame.', 'posters/Hb6wvxEvfntZ2knL5WPOyUqwx0gZdXmwDG1UkBIX.jpg', 'trailers/G2NZ9uTS28DHKtR1gRNRJcsfXrhIb0HZyDXnIl8s.mp4', 4, '2026-01-19 07:06:11', '2026-01-19 07:06:11'),
(17, 'The Mermaid', '2016', 94, 'Stephen Chow', 'The Mermaid (Mei Ren Yu) menceritakan Shan, seorang putri duyung yang dikirim menyamar sebagai manusia untuk membunuh Liu Xuan, pengembang kaya yang proyek reklamasi lautnya mengancam habitat duyung, namun Shan malah jatuh cinta pada Liu, mengubahnya dari sosok arogan menjadi peduli lingkungan, sementara mereka harus menghadapi ancaman dari kelompok jahat yang ingin memburu duyung demi keuntungan, memicu konflik antara cinta, ambisi, dan pelestarian alam dengan sentuhan komedi khas Stephen Chow.', 'posters/Tc4qgV1DrgP7P0QtYMjypI5IMZzHMfeHH8rPH0pN.jpg', 'trailers/6mcOfecL3YLvw8RJkUly9U3SlDmAcPr9R0zYyKLy.mp4', 3, '2026-01-19 07:14:34', '2026-01-19 07:14:34'),
(18, 'Mulan', '2020', 115, 'Niki Caro', 'Mulan adalah kisah seorang wanita muda Tiongkok pemberani yang menyamar sebagai prajurit laki-laki untuk menggantikan ayahnya yang sudah tua dan sakit dalam perang melawan penjajah, demi menyelamatkan kehormatan dan keluarganya, yang membawanya menemukan kekuatan sejati dan menjadi pahlawan bagi bangsanya. Cerita ini berpusat pada pengorbanan, identitas, dan keberanian dalam menghadapi tradisi patriarki, di mana Mulan harus mengatasi tantangan fisik dan emosional sambil menjaga rahasia besarnya, hingga akhirnya identitasnya terungkap dan ia membuktikan bahwa wanita juga bisa menjadi pelindung negara.', 'posters/80vB3lc84RLrTs9BJXtqGwQtQaQBcF2rv6a6mDHb.jpg', 'trailers/6NZAYztazqhWVveWjHtuspvIfXQOIoeS1GZCoXOe.mp4', 4, '2026-01-19 07:17:40', '2026-01-19 07:28:39'),
(19, 'Ghost in the Shell', '2017', 107, 'Rupert Sanders', 'Ghost in the Shell (GITS) bercerita tentang Major Motoko Kusanagi, seorang agen siber cyborg wanita di Unit Keamanan Publik Seksi 9, yang memburu peretas misterius bernama Puppet Master di Jepang tahun 2029, di mana teknologi sangat maju dan batas antara manusia serta mesin kabur, mengeksplorasi tema identitas, kesadaran, dan kemanusiaan di dunia cybernetic. Pencarian ini mengarah pada konfrontasi filosofis tentang apa artinya menjadi \"hidup\" ketika pikiran dan tubuh dapat dimodifikasi atau diretas, terutama saat Puppet Master mengungkap dirinya sebagai entitas AI yang mengembangkan kesadaran sendiri.', 'posters/IUMiy6O7Iv6qE4EcNkHLK7cMuTDmF3QOzSOlayoG.jpg', 'trailers/FzzlzCKGeEvxfChBwpxndYY1WS8mVR4hUOgLndj4.mp4', 4, '2026-01-19 07:28:08', '2026-01-19 07:28:08'),
(20, 'Demon City', '2025', 107, 'Seiji Tanaka', 'Demon City (2025) adalah film aksi Jepang tentang mantan pembunuh bayaran, Shûhei Sakata, yang dijebak atas pembunuhan keluarga sendiri, lalu menghabiskan 15 tahun di penjara, dan setelah dibebaskan, ia mendapatkan kembali kekuatan fisiknya untuk membalas dendam pada \"iblis\" bertopeng yang menghancurkan hidupnya, saat mereka bersiap membuka kompleks besar di kota pelabuhan yang suram itu.', 'posters/qq3rjWgHYRnR0XSyMynZKbHO0lEr2bv3mGfUkNno.jpg', 'trailers/0TSLNxh2bNnbln0SORFOq646jwluRe2Z0gx8HBUX.mp4', 2, '2026-01-19 07:31:38', '2026-01-19 07:31:38'),
(21, 'The Gifted: Graduation', '2020', 145, 'Waasuthep Ketpetch', 'The Gifted: Graduation melanjutkan kisah Pang dan teman-temannya di Ritdha High School, dua tahun setelah mereka menggulingkan sistem sekolah, di mana kini mereka menjadi senior dan menghadapi siswa Gifted baru yang memicu konflik baru, termasuk kembalinya program Gifted yang diusung Kepala Sekolah, sementara muncul kelompok \"Anti Gifted\" yang mengacaukan segalanya, memaksa mereka bersatu kembali melawan sistem dan dalang di balik semua kekacauan tersebut.', 'posters/bFg95DFth8cue18Y729lwK79o1JtSxKVEFpJNPWM.png', 'trailers/3BldBVgVEh9xCVUpOJo0HqCMwxvS6vEFPqToSlPX.mp4', 5, '2026-01-19 07:41:35', '2026-01-19 08:26:48'),
(22, 'The Dark Dice', '2025', 94, 'Keith Kritsada Kaniwichaphon.', 'The Dark Dice adalah serial drama Thailand tentang sekelompok siswa SMA yang terjebak dalam permainan papan misterius setelah menemukan dadu kuno, di mana mereka harus saling mengalahkan untuk bertahan hidup, mempertaruhkan nyawa dalam tantangan psikologis dan kecerdasan yang menantang mereka untuk mengakali satu sama lain.', 'posters/0OIqcz6Fw0QuBCHhygtVNa4C8pw0Z56sK0BHhYjk.jpg', 'trailers/19lKurX6Ip8SeCMV27JM11RXm2eSFvDRrUQqXzXy.mp4', 5, '2026-01-19 08:26:02', '2026-01-19 08:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `film_actor`
--

CREATE TABLE `film_actor` (
  `id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `actor_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_actor`
--

INSERT INTO `film_actor` (`id`, `film_id`, `actor_id`) VALUES
(6, 2, 2),
(7, 2, 3),
(8, 3, 1),
(12, 3, 11),
(9, 4, 3),
(11, 7, 10),
(10, 8, 4),
(1, 9, 2),
(2, 10, 6),
(3, 10, 7),
(4, 10, 8),
(5, 10, 9),
(13, 11, 2),
(14, 11, 3),
(15, 11, 4),
(16, 11, 10),
(19, 12, 12),
(20, 13, 12),
(21, 14, 14),
(22, 15, 3),
(23, 15, 10),
(24, 15, 15),
(25, 16, 15),
(26, 17, 17),
(27, 18, 18),
(28, 19, 15),
(29, 20, 16),
(30, 21, 19),
(31, 21, 22),
(32, 21, 23),
(33, 22, 19),
(34, 22, 20),
(35, 22, 21);

-- --------------------------------------------------------

--
-- Table structure for table `film_genre`
--

CREATE TABLE `film_genre` (
  `id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `genre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_genre`
--

INSERT INTO `film_genre` (`id`, `film_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(3, 2, 2, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 3, 1, NULL, NULL),
(7, 3, 2, NULL, NULL),
(9, 4, 2, NULL, NULL),
(10, 4, 3, NULL, NULL),
(11, 4, 4, NULL, NULL),
(18, 7, 2, NULL, NULL),
(19, 7, 3, NULL, NULL),
(20, 7, 4, NULL, NULL),
(21, 8, 3, NULL, NULL),
(22, 8, 4, NULL, NULL),
(23, 9, 3, NULL, NULL),
(24, 9, 4, NULL, NULL),
(25, 10, 2, NULL, NULL),
(26, 10, 3, NULL, NULL),
(27, 10, 4, NULL, NULL),
(28, 11, 3, NULL, NULL),
(29, 11, 4, NULL, NULL),
(32, 11, 2, NULL, NULL),
(33, 12, 3, NULL, NULL),
(34, 12, 4, NULL, NULL),
(35, 13, 1, NULL, NULL),
(36, 13, 3, NULL, NULL),
(37, 13, 4, NULL, NULL),
(38, 14, 2, NULL, NULL),
(39, 14, 3, NULL, NULL),
(40, 14, 4, NULL, NULL),
(41, 15, 2, NULL, NULL),
(42, 15, 3, NULL, NULL),
(43, 15, 4, NULL, NULL),
(44, 16, 3, NULL, NULL),
(45, 16, 4, NULL, NULL),
(46, 17, 1, NULL, NULL),
(47, 17, 4, NULL, NULL),
(48, 18, 2, NULL, NULL),
(49, 18, 3, NULL, NULL),
(50, 19, 2, NULL, NULL),
(51, 19, 3, NULL, NULL),
(52, 19, 4, NULL, NULL),
(53, 20, 2, NULL, NULL),
(54, 20, 3, NULL, NULL),
(55, 21, 2, NULL, NULL),
(56, 21, 3, NULL, NULL),
(57, 21, 4, NULL, NULL),
(58, 22, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Romance', NULL, NULL),
(2, 'Drama', NULL, NULL),
(3, 'Action', NULL, NULL),
(4, 'Science-Fiction', NULL, '2026-01-11 02:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_25_000001_create_countries_table', 1),
(5, '2025_12_25_164533_create_films_table', 1),
(6, '2025_12_25_164605_create_genres_table', 1),
(7, '2025_12_25_164626_create_actors_table', 1),
(8, '2025_12_25_164708_create_comments_table', 1),
(9, '2025_12_25_164739_create_film_genre_table', 1),
(10, '2025_12_25_164753_create_film_actor_table', 1),
(11, '2026_01_01_160017_add_duration_to_films_table', 1),
(12, '2026_01_04_083249_add_role_to_users_table', 2),
(13, '2026_01_04_172144_add_username_to_users_table', 3),
(14, '2026_01_09_021926_remove_genre_id_from_films', 4),
(15, '2026_01_13_154424_drop_name_from_users_table', 5),
(16, '2026_01_17_002000_add_no_telp_to_users_table', 6),
(17, '2026_01_17_013659_create_comment_likes_table', 7),
(18, '2026_01_17_035328_add_trailer_to_films_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mWpwLgJvr6aJXplCQAPjTTYyawqBB4B8NY5Z3JJ8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid05seU5vb2NKUTlVWTlIWGlnazN4MXNNV2p5Szd1a09pbXZiZFcyOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hY3RvcnMiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLmFjdG9ycy5pbmRleCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1768320371);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `no_telp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin@gmail.com\r\n', '', NULL, '$2y$12$2ujUPKGQ.bQYh3C3ASxcaOdwdgA60LKILCMxGp.SdUuJPJQGpb0Fe', 'T65dY3bwFX81OuLm7ma4V15P7lsYJ10Jh0ylNRX1VVvhS4xlxL0WSew2GDY5', '2026-01-04 11:56:48', '2026-01-04 11:56:48', 'admin'),
(7, 'Lyan', 'lyan@gmail.com', '081335660754', NULL, '$2y$12$nEzqcYNYb8vi5iUbPVczdeUN10xJwYFIP8ChiqoQTdV72ZR17SazC', NULL, '2026-01-13 11:07:00', '2026-01-13 11:07:00', 'user'),
(9, 'hannie', 'labubu@gmail.com', '083226778356', NULL, '$2y$12$BF3olnXLQFGK/bKj9MNeYOCxQk4WxnwvJ4zLOYtCOwuzKG5OcC1YK', NULL, '2026-01-16 17:28:51', '2026-01-16 17:28:51', 'user'),
(10, 'Ateate', 'ateate@gmail.com', '098117226553', NULL, '$2y$12$tA1NT4DKRUPK/PzV5ibVmO2pdYk.RJ3xX1FwAUbU7kEmkyqL4BKhm', NULL, '2026-01-18 00:35:26', '2026-01-18 00:35:26', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_film_id_foreign` (`film_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_likes_user_id_comment_id_unique` (`user_id`,`comment_id`),
  ADD KEY `comment_likes_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_country_id_foreign` (`country_id`);

--
-- Indexes for table `film_actor`
--
ALTER TABLE `film_actor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `film_actor_film_id_actor_id_unique` (`film_id`,`actor_id`),
  ADD KEY `film_actor_actor_id_foreign` (`actor_id`);

--
-- Indexes for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `film_genre_film_id_genre_id_unique` (`film_id`,`genre_id`),
  ADD KEY `film_genre_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_name_unique` (`name`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `film_actor`
--
ALTER TABLE `film_actor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `film_genre`
--
ALTER TABLE `film_genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film_actor`
--
ALTER TABLE `film_actor`
  ADD CONSTRAINT `film_actor_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_actor_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
