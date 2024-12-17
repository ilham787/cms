-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 10:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `id_caraousel` int NOT NULL,
  `judul` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`id_caraousel`, `judul`, `foto`) VALUES
(7, 'contoh1', '20241212004359.jpg'),
(8, 'contoh2', '20241212005022.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(7, 'Infinix'),
(9, 'Samsung'),
(11, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int NOT NULL,
  `judul_website` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profil_website` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_wa` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `judul_website`, `profil_website`, `instagram`, `facebook`, `email`, `alamat`, `no_wa`) VALUES
(1, 'Hamz77', 'anak mc', 'https://www.instagram.com/me.hamz77/', 'https://www.facebook.com/ilham.n.kristyantoko', 'ilhamnk787@gmail.com', 'Jetal Tegalgede Karanganyar', '6282135877246');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int NOT NULL,
  `judul` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `keterangan`, `foto`, `slug`, `id_kategori`, `tanggal`, `username`) VALUES
(8, 'Xiaomi 14T Pro', '<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Berikut spesifikasi Xiaomi 14T Pro :</h3>\r\n<ul>\r\n<li>Layar AMOLED 6,67 inci, Resolusi&nbsp;2712 x 1220 piksel, Refresh rate:&nbsp;144 Hz</li>\r\n<li>Chipset&nbsp;MediaTek Dimensity 9300+</li>\r\n<li>RAM 12GB,&nbsp; Penyimpanan internal 256GB dan 512GB</li>\r\n<li>Kamera utama 50MP,&nbsp;Kamera ultrawide 12MP,&nbsp;Kamera telefoto 50MP,&nbsp;Kamera depan: 32MP</li>\r\n<li>Kapasitas baterai&nbsp;5000 mAh, Fast charging HyperCharge 120W, HyperCharge nirkabel 50W</li>\r\n<li>Konektivitas&nbsp;5G, Wi-Fi, Bluetooth v5.3, USB Type-c, NFC</li>\r\n<li>Audio speaker stereo, Hi-Res &amp; Hi-Res Audio Wireless, Dolby Atmoss</li>\r\n<li>Sistem operasi&nbsp;Xiaomi HyperOS</li>\r\n<li>Dimensi&nbsp;160.4 x 75.1 x 8.39 mm</li>\r\n<li>Berat&nbsp;209 gram</li>\r\n<li>Warna:&nbsp;Titan Black, Titan Gray</li>\r\n</ul>', '20241119062901.jpg', 'Xiaomi-14T-Pro', '11', '2024-11-19', 'admin'),
(9, 'Samsung S24 Ultra', '<h3>Berikut spesifikasi Samsung S24 Ultra&nbsp;:</h3>\r\n<ul>\r\n<li>Chipset Snapdragon 8 Gen 3 for Galaxy Os Android 14</li>\r\n<li>Display 6.8 inches</li>\r\n<li>Ram / Internal 12 GB / 256 GB</li>\r\n<li>Simcard Dual-SIM</li>\r\n<li>Rear Camera 200 MP + 50 MP + 10 MP + 12 MP</li>\r\n<li>Front Camera 12 MP</li>\r\n<li>Usb Type Type-C</li>\r\n<li>Battery 5000mAh&nbsp;</li>\r\n<li>Garansi Resmi Samsung Electronics Indonesia 1 Tahun.</li>\r\n</ul>', '20241119063205.jpg', 'Samsung-S24-Ultra', '9', '2024-11-19', 'admin'),
(10, 'Redmi Note 13 Pro 5G', '<h3>Berikut spesifikasi Xiaomi 14T Pro :</h3>\r\n<ul>\r\n<li>Prosesor Snapdragon&reg; 7s Gen 2 Mobile Platform Teknologi proses 4 nm CPU: CPU octa-core, hingga 2,4 GHz GPU: Adreno GPU 2.</li>\r\n<li>Penyimpanan &amp; RAM 8+256 GB LPDDR4X + UFS 2.2 3.</li>\r\n<li>Dimensi Tinggi: 161,15 mm Lebar: 74,24 mm Ketebalan: 7,98 mm Bobot: 187 g</li>\r\n<li>Bazel Ultra-Thin untuk pengalaman menonton lebih imersif 4.</li>\r\n<li>Layar Layar AMOLED 6,67&rdquo; Refresh rate: Hingga 120 Hz Kecerahan: Kecerahan puncak 1800 nits Kedalaman warna: 12 bit Rasio kontras: 5.000.000:1 Resolusi: 2712x1220, 446PPI Gamut warna: DCI-P3 100% Corning&reg; Gorilla&reg; Glass Victus&reg; Peredup PWM 1920 Hz Sertifikasi Cahaya Biru Rendah T&Uuml;V Rheinland (Solusi Perangkat Keras) 5.</li>\r\n<li>Kamera Belakang Kamera tripel 200MP+8MP+2MP Kamera utama 200MP OIS f/1,65 Binning 16-in-1 ke dalam satu piksel 2,24 &mu;m yang besar Ukuran sensor 1/1,4&rdquo; Lensa 7P Kamera ultra-lebar 8 MP f/2,2 Kamera makro 2 MP /2,4 Perekaman video dengan kamera belakang 4K 3840x2160 pada kecepatan 30 fps 1080 p 1920x1080 pada kecepatan 30/60 fps 720p 1280x720 pada kecepatan 30 fps 6. Kamera Depan Kamera 16 MPf/2,4 Perekaman video dengan kamera depan 1080 p 1920x1080 pada kecepatan 30/60 fps 720p 1280x720 pada kecepatan 30 fps 7.</li>\r\n<li>Baterai &amp; Pengisian Daya Baterai 5.100 mAh (standar) Mendukung pengisian daya turbo 67 W USB C Pengisi daya bawaan 67 W 8.</li>\r\n<li>Keamanan Sensor sidik jari di layar AI Face Unlock 9.</li>\r\n<li>Jaringan &amp; Konektivitas Dua SIM (SIM nano + SIM nano atau SIM nano + eSIM) Frekuensi jaringan 2G: GSM: 850 900 1.800 1.900 MHz 3G: WCDMA:1/2/4/5/6/8/19 4G: LTE FDD:1/2/3/4/5/7/8/12/13/17/18/19/20/26/28/32/66 4G: LTE TDD:38/40/41 5G: n1/3/5/7/8/20/28/38/40/41/66/77/78 Jaringan Nirkabel Wi-Fi: Wi-Fi 5/Wi-Fi 4/802.11a/b/g Mendukung 2x2 MIMO Wi-Fi Langsung Bluetooth 5.2 10.</li>\r\n<li>Audio Speaker&nbsp;ganda Dolby Atmos&reg; Jack headphone 3,5 mm 11.&nbsp;&nbsp;</li>\r\n<li>Sistem Operasi MIUI 14 Redmi Note 13 Pro 5G.&nbsp;</li>\r\n</ul>', '20241119063713.jpg', 'Redmi-Note-13-Pro-5G', '11', '2024-11-19', 'admin'),
(11, 'Infinix GT 20 Pro', '<h3>Berikut spesifikasi Infinix GT 20 Pro&nbsp;:</h3>\r\n<ul>\r\n<li>Android 14,&nbsp;XOS 14</li>\r\n<li>Chipset: Mediatek Dimensity 8200 Ultra (4 nm) CPU: Octa-core (1x3.1 GHz Cortex-A78 &amp; 3x3.0 GHz Cortex-A78 &amp; 4x2.0 GHz Cortex-A55) GPU: Mali-G610 MC6</li>\r\n<li>RAM: 8 GB, 12 GB Internal&nbsp;Memori: 256 GB, 512 GB (tidak ada slot microSD)</li>\r\n<li>Layar: AMOLED 6.78 inci, 1080 x 2436 piksel, 120 Hz, 1.300 nits, 388 PPI</li>\r\n<li>Kamera utama: 108 MP, f/1.8 (primer, OIS) + 2 MP (makro) + 2 MP (bokeh)</li>\r\n<li>Kamera depan: 32 MP, f/2.2 (wide)</li>\r\n<li>Baterai: 5.000 mAh (fast charging 45 W)</li>\r\n<li>Konektivitas: USB Type-C, Wi-Fi 802.11, Bluetooth 5.4,</li>\r\n<li>Jaringan: Dual SIM (Nano-SIM, dual stand-by)</li>\r\n<li>Dimensi: 164.3 x 75.4 x 8.2 mm</li>\r\n<li>Berat: 194 gram</li>\r\n<li>Warna: Mecha Blue, Mecha Orange, Mecha Silver</li>\r\n</ul>', '20241126024604.jpg', 'Infinix-GT-20-Pro', '7', '2024-11-26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`) VALUES
(1, 'admin', 'Candra', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'user', 'Tapler', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kontributor'),
(10, 'ilham', 'ilham', '202cb962ac59075b964b07152d234b70', 'Admin'),
(11, 'agung', 'agung', '202cb962ac59075b964b07152d234b70', 'Kontributor'),
(12, 'neo', 'neo', '202cb962ac59075b964b07152d234b70', 'Kontributor'),
(13, 'toko', 'toko', '202cb962ac59075b964b07152d234b70', 'Kontributor'),
(14, 'neoo', 'asdsa', '202cb962ac59075b964b07152d234b70', 'Kontributor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD PRIMARY KEY (`id_caraousel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caraousel`
--
ALTER TABLE `caraousel`
  MODIFY `id_caraousel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
