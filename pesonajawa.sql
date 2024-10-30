-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 09:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaKODE` char(4) NOT NULL,
  `beritaNAMA` varchar(60) NOT NULL,
  `beritaKET` varchar(255) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaKODE`, `beritaNAMA`, `beritaKET`, `kategoriKODE`) VALUES
('B101', 'Cuaca', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'K102'),
('B102', 'Banjir', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'K102'),
('B103', 'Bencana', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'K102'),
('B104', 'Makanan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'K103'),
('B105', 'Tarian', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'K101'),
('B106', 'Minuman', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'K103');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` text NOT NULL,
  `destinasiFOTO` char(100) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFOTO`, `kategoriKODE`) VALUES
('D101', 'Bali', 'Bali, surga tropis di Indonesia, memukau dengan keindahan alamnya yang luar biasa. Pantai-pantai eksotis dengan pasir putih, teras sawah hijau yang memukau, dan hutan-hutan lebat menciptakan lanskap yang memikat. Budaya dan tradisi yang kaya tercermin dalam kuil-kuil yang megah, tarian-tarian eksotis, dan upacara keagamaan yang meriah. Selain itu, kehidupan malam yang berwarna-warni, pasar tradisional yang ramai, dan ragam kuliner khas Bali menjadi daya tarik tak terlupakan bagi setiap pengunjung. Bali tidak hanya destinasi pariwisata, tetapi juga sebuah pengalaman magis yang memukau setiap jiwa yang datang mengunjunginya.', 'destinasibali.jpg', 'K102'),
('D102', 'Purwokerto', 'Purwokerto, kota yang memikat di Jawa Tengah, menawarkan pengalaman wisata yang memadukan keindahan alam dan kearifan lokal. Terletak di kaki Gunung Slamet, destinasi ini memikat dengan pesona alamnya yang hijau dan udara sejuk. Wisatawan dapat menikmati keindahan Taman Bunga Wiladatika atau menjelajahi kekayaan sejarah di Benteng Pendem. Selain itu, kuliner khas Purwokerto seperti Sate Blengong dan Sroto Sokaraja menjadi daya tarik tersendiri. Purwokerto mempersembahkan harmoni antara alam, sejarah, dan kelezatan kuliner dalam satu destinasi yang mengesankan.', 'destinasipurwokerto.jpg', 'K101'),
('D103', 'Yogyakarta', 'Yogyakarta, destinasi budaya dan sejarah di Indonesia, memikat pengunjung dengan pesona keindahan alam, seni, dan tradisi. Terkenal sebagai kota pelajar, Yogyakarta menawarkan kekayaan sejarah melalui Candi Prambanan dan Candi Borobudur, yang menjadi warisan dunia UNESCO. Selain itu, suasana kota yang ramah, seni jalanan yang kreatif, serta kelezatan kuliner tradisional seperti gudeg dan bakpia memberikan pengalaman tak terlupakan bagi para wisatawan. Yogyakarta adalah destinasi yang menyatukan keindahan alam, sejarah, dan kehangatan budaya.', 'destinasijogja.jpg', 'K101'),
('D104', 'Sumenep', 'Sumenep, sebuah destinasi di ujung timur Pulau Madura, memukau dengan keindahan alam dan warisan budaya yang kaya. Kota ini menyuguhkan pesona pantai berpasir putih, mercusuar indah, dan kehidupan tradisional yang autentik. Berbagai situs bersejarah, seperti Keraton Sumenep, menambah daya tarik kultural kota ini. Selain itu, kehidupan laut yang kaya membuat Sumenep menjadi surga bagi pecinta snorkeling dan diving. Menelusuri lorong-lorong kota ini, Anda akan merasakan kehangatan dan keunikan masyarakat lokal. Sumenep, destinasi yang tak hanya memanjakan mata tetapi juga hati dengan pesona keaslian dan kebersamaan.', 'destinasisumenep.jpg', 'K102'),
('D105', 'Lombok', 'Lombok, permata tropis Indonesia, menawarkan pesona alam yang menakjubkan. Pantai-pantainya yang memukau dengan pasir putih dan air biru jernih mengundang para wisatawan untuk bersantai. Gunung Rinjani, yang menjulang tinggi, menjadi daya tarik bagi para pendaki petualang. Selain itu, keunikan budaya Sasak dan tradisi-tradisi lokal memberikan pengalaman berbeda bagi pengunjung. Dengan keindahan alamnya yang memesona dan keanekaragaman budayanya, Lombok menjadi destinasi yang tak terlupakan di Indonesia.', 'destinasilombok.jpg', 'K102'),
('D106', 'Palembang', 'Palembang, kota yang memukau di Sumatra Selatan, menawarkan pesona sejarah, budaya, dan kuliner yang kaya. Terkenal dengan ikonnya, Jembatan Ampera, yang melintasi Sungai Musi, memberikan pemandangan kota yang indah terutama saat senja. Palembang juga menyuguhkan kekayaan warisan budaya melalui Museum Sultan Mahmud Badaruddin II dan situs-situs bersejarah seperti Benteng Kuto Besak. Tak lupa, kuliner khas Palembang seperti Pempek dan Mie Celor menjadi daya tarik kuliner yang wajib dicoba bagi para pengunjung. Palembang, destinasi yang memukau dengan harmoni antara masa lalu dan kehidupan kota masa kini.', 'destinasipalembang.jpg', 'K103');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` varchar(100) NOT NULL,
  `hotelALAMAT` varchar(100) NOT NULL,
  `hotelFOTO` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelALAMAT`, `hotelFOTO`, `destinasiKODE`) VALUES
('H101', 'Hotel Santika Kuta Bali', 'Jalan Raya Kuta No.98, Bali, 80361 Kuta', 'bali.jpg', 'D101'),
('H102', 'Wisata Niaga Hotel', ' Jl. Merdeka No.5, Brubahan, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 5311', 'purwokerto.jpg', 'D102'),
('H103', 'Royal Avila Boutique Resort', 'Jalan Raya Senggigi, Malimbu, Lombok Utara, Nusa Tenggara Barat, Senggigi, Lombok, Indonesia, 83355', 'lombok.jpg', 'D105'),
('H104', 'Ceria Hotel', 'Jl. Ibu Ruswo No.57, Prawirodirjan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 551', 'jogja.jpg', 'D103'),
('H105', 'Griya Adhirasa', 'Jl. Adhirasa No.09, Kothe, Kolor, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69417', 'sumenep.jpg', 'D104'),
('H106', 'Aryaduta Palembang', 'Jl. POM IX, Lorok Pakjo, Kec. Ilir Bar. I, Kota Palembang, Sumatera Selatan 30137', 'palembang.jpg', 'D106');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('K101', 'Budaya', 'Budaya', 'Budaya'),
('K102', 'Alam', 'Alam', 'Alam'),
('K103', 'Kuliner', 'Kuliner', 'Kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `musik`
--

CREATE TABLE `musik` (
  `musikKODE` char(4) NOT NULL,
  `musikNAMA` varchar(100) NOT NULL,
  `musikFOTO` char(100) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musik`
--

INSERT INTO `musik` (`musikKODE`, `musikNAMA`, `musikFOTO`, `destinasiKODE`) VALUES
('M101', 'Rindik', 'rindik.jpg', 'D101'),
('M102', 'Krumpyung', 'krumpyung.jpg', 'D103'),
('M103', 'Calung', 'calung.jpg', 'D102'),
('M104', 'Kempul', 'kempul.jpg', 'D104'),
('M105', 'Genggong', 'genggong.jpg', 'D105'),
('M106', 'Burdah', 'burdah.jpg', 'D106');

-- --------------------------------------------------------

--
-- Table structure for table `oleholeh`
--

CREATE TABLE `oleholeh` (
  `oleholehKODE` char(4) NOT NULL,
  `oleholehTEMPAT` varchar(100) NOT NULL,
  `oleholehNAMA` varchar(100) NOT NULL,
  `oleholehFOTO` char(100) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oleholeh`
--

INSERT INTO `oleholeh` (`oleholehKODE`, `oleholehTEMPAT`, `oleholehNAMA`, `oleholehFOTO`, `destinasiKODE`) VALUES
('O101', 'Joger Jelek', 'Kaos Joger', 'olehjoger.jpg', 'D101'),
('O102', 'Toko Eka Sari', 'Klanting Khas Purwokerto', 'olehklanting.jpg', 'D102'),
('O103', 'Pempek Edy', 'Pempek', 'olehpempek.jpg', 'D106'),
('O104', 'Pasar Beringharjo', 'Batik', 'olehbatik.jpg', 'D103'),
('O105', 'Pasar Kapedi', 'Rengginang Lorjuk', 'olehrengginang.jpg', 'D104'),
('O106', 'Pasar Cakranegara', 'Terasi Lombok', 'olehterasi.jpg', 'D105');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurantKODE` char(4) NOT NULL,
  `restaurantNAMA` varchar(100) NOT NULL,
  `restaurantALAMAT` varchar(100) NOT NULL,
  `restaurantFOTO` char(100) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurantKODE`, `restaurantNAMA`, `restaurantALAMAT`, `restaurantFOTO`, `destinasiKODE`) VALUES
('R101', 'Cretya Sunset', 'Jalan Raya Bresela, Keliki, Gianyar Indonesia', 'restocretya.jpg', 'D101'),
('R102', 'Gudeg Sagan', 'JL Prof. Dr Jl. Prof. Herman Yohanes No.53, Samirono, Caturtunggal, Kec. Depok, Kabupaten Sleman, Da', 'restogudegsagan.jpg', 'D103'),
('R103', 'Tempe Medoan Eco 21', 'Jl. Mayjend Sutoyo No.21 Sawangan, Purwokerto 53131 Indonesia', 'restomendoan.jpg', 'D102'),
('R104', 'Martabak Har', 'Jl. Jenderal Sudirman no. 597A, 18 Ilir, Palembang 30126 Indonesia', 'restohar.jpg', 'D106'),
('R105', 'Warung Bebek Balap', 'Jl. Pepaya Karangdhalem, Karangduak, Kotasumenep, Sumenep, Pulau Madura 69417 Indonesia', 'restobalap.jpg', 'D104'),
('R106', 'SeaSalt Lombok', 'Jalan Raya Pantai Kuta, Kuta, Lombok 83573 Indonesia', 'restoseasalt.jpg', 'D105');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `saranKODE` char(4) NOT NULL,
  `saranNAMA` varchar(100) NOT NULL,
  `saranEMAIL` varchar(100) NOT NULL,
  `saranKOMENTAR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`saranKODE`, `saranNAMA`, `saranEMAIL`, `saranKOMENTAR`) VALUES
('S101', 'Kenaz', 'kenaz2004@gmail.com', 'bagus, rapih'),
('S102', 'Budi', 'budiman@gmail.com', 'KEREN BANGET OMG!'),
('S103', 'Hansen', 'christianlie@gmail.com', 'ganteng bgt yang bikin'),
('S104', 'Pak Wasino', 'wasino@gmail.com', 'Kamu dpt nilai A');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelKODE` char(4) NOT NULL,
  `travelNAMA` varchar(100) NOT NULL,
  `travelRUTE` varchar(225) NOT NULL,
  `travelKENDARAAN` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travelKODE`, `travelNAMA`, `travelRUTE`, `travelKENDARAAN`, `destinasiKODE`) VALUES
('T101', 'Travel A', 'Tanjung Benoa, Puncak Kintamani, dan Pura Tanah Lot', 'mobil.jpg', 'D101'),
('T102', 'Travel B', 'Hutan Pinus Limpakuwus, Taman Langit, dan Pancuran Pitu', 'mobil.jpg', 'D102'),
('T103', 'Travel C', 'Borobudur, Beringharjo, dan Malioboro,', 'mobil.jpg', 'D103'),
('T104', 'Travel D', 'Gili Labak Sumenep dan Spot snorkeling Gili Labak', 'mobil.jpg', 'D104'),
('T105', 'Travel E', 'Pantai pink, Bukit Tangsi, dan Gili Petelu', 'mobil.jpg', 'D105'),
('T106', 'Travel F', 'Jembatan Ampera, Benteng Kuno Besak, dan Pulau Kemaro', 'mobil.jpg', 'D106');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('U001', 'Kenaz', 'pupsaber58@gmail.com', '296a412d03c81b6b1f9a3b9880c7a1fd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaKODE`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelKODE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `musik`
--
ALTER TABLE `musik`
  ADD PRIMARY KEY (`musikKODE`);

--
-- Indexes for table `oleholeh`
--
ALTER TABLE `oleholeh`
  ADD PRIMARY KEY (`oleholehKODE`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurantKODE`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`saranKODE`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
