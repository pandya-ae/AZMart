-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 04:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(250) NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `provinsi_brg` varchar(50) NOT NULL,
  `kota_brg` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `berat` int(5) NOT NULL,
  `gambar` text NOT NULL,
  `visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `provinsi_brg`, `kota_brg`, `harga`, `stok`, `berat`, `gambar`, `visit`) VALUES
(11, 'Thanksinsomnia Tshirt ', 'Regular fit short sleeve t-shirt with plastisol screenprinted.  material : cotton 20s  Sizechart: S Length 50cm x 70cm x Sl 20cm M Length 52cm x 72cm x Sl 22cm L Length 54cm x 74cm x Sl 24cm   Perhatian: - Produk yang terdaftar selama periode diskon tidak akan mendapat stiker. - Pastikan alamat sudah lengkap & No Hp aktif agar memudahkan kurir dalam pengiriman - Pengembalian barang atau dana dapat dilakukan sampai dengan 3 hari setelah diterima oleh pembeli dan jika dikarenakan kesalahan dari pihak kami; Barang tidak lengkap Salah size Kecacatan pada produk. Mohon untuk direkam saat membuka paket dari kami untuk menjadi bukti. Mohon maaf kami tidak menerima pengembalian jika kesalahan dari pihak pembeli, seperti salah memilih size atau warna atau tidak ada rekaman saat membuka paket.', 'Kaos', '9', 'Kota Bandung', 150000, 15, 500, 'kaos.jpeg', 7),
(12, 'Bape Camo Shark Hoodie', 'Perhatian: Kami adalah ukuran Asia, silakan pilih ukuran yang tepat Anda lihat deskripsi kami di bawah ini dan tabel ukuran di gambar terperinci kami. Yang terbaik adalah memilih 1-2 ukuran lebih tinggi Bape Hoodie: Hoodie gaya kasual populer pria, kaus longgar bermotif Hip-hop dengan bahan katun berkualitas tinggi, bahan sutra membuatnya nyaman dan fleksibel. Fitur: Desain mulut hiu novel ritsleting penuh hingga kepala, sweater berkerudung lengan panjang gaya ritsleting khusus Kesempatan: Sekolah, kerja, olahraga, pantai atau kehidupan sehari-hari, bagus untuk dipakai sebagai hoodie gaya jalanan kasual. Padukan dengan celana pendek denim atau jeans dan sebagainya. Ide Hadiah Hebat: Natal, halloween, tahun baru, hadiah ulang tahun, dll.Kemeja berkerudung kami, Hadiah keren dan spesial untuk diri sendiri dan teman. Sangat keren dengan celana apa pun', 'Jaket', '6', 'Kota Jakarta Pusat', 12000000, 9, 700, 'bape_1.jpg', 3),
(13, 'AJ1 High Travis Scott', 'The Air Jordan I celebrates Travis Scott, hip-hop artist, record label founder and Houston, Texas native. Details on the shoe, including a reverse Swoosh and hidden pouch, help set this edition of the storied sneaker apart for the rapper and producer, and for Cactus Jack Records.', 'Sepatu', '11', 'Kota Surabaya', 25000000, 4, 500, 'jordan_1.jpg', 0),
(14, 'Sukajan', 'Sukajan (the Japanese term used for Souvenir Jacket, also known as Japanese Bomber Jacket) is a clothing type that has successfully become an integral part of popular culture. These sukajan souvenir jackets are known for featuring a characteristic embroidered style. Right now, these yokosuka jackets enjoy immense popularity both as streetwear and high fashion outfits.', 'Jaket', '10', 'Kota Semarang', 9000000, 13, 700, 'sukajan_1.jpg', 0),
(16, 'Gambar', 'Gambar', 'Jaket', '11', 'Kota Batu', 900000, 19, 500, 'pixel-hat-011.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota_asal` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `provinsi`, `kota_asal`, `kurir`, `paket`, `bank`, `tgl_pesan`, `batas_bayar`) VALUES
(30, 'Adam Rizky', 'Jl Dempel Permai', '10', '399', 'jne', 'OKE', 'BCA - XXXXXXXXX', '2021-11-29 15:34:08', '2021-11-30 15:34:08'),
(31, 'Adam', 'Jl Dempel ', '10', '399', 'tiki', 'ONS', 'BCA - XXXXXXXXX', '2021-11-29 22:36:50', '2021-11-30 22:36:50'),
(32, 'Loka', 'Jl Dempel', '21', '3', 'jne', 'REG', 'BCA - XXXXXXXXX', '2021-11-29 22:45:09', '2021-11-30 22:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota_asal` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `provinsi`, `kota_asal`, `kurir`, `bank`, `bukti_pembayaran`) VALUES
(20, 29, 11, 'Thanksinsomnia Tshirt ', 1, 150000, '10', '399', 'jne', 'BCA - XXXXXXXXX', ''),
(21, 29, 12, 'Bape Camo Shark Hoodie', 1, 12000000, '10', '399', 'jne', 'BCA - XXXXXXXXX', ''),
(22, 30, 13, 'AJ1 High Travis Scott', 1, 25000000, '10', '399', 'jne', 'BCA - XXXXXXXXX', ''),
(23, 30, 12, 'Bape Camo Shark Hoodie', 1, 12000000, '10', '399', 'jne', 'BCA - XXXXXXXXX', ''),
(24, 30, 11, 'Thanksinsomnia Tshirt ', 1, 150000, '10', '399', 'jne', 'BCA - XXXXXXXXX', ''),
(25, 30, 14, 'Sukajan', 1, 9000000, '10', '399', 'jne', 'BCA - XXXXXXXXX', ''),
(26, 31, 11, 'Thanksinsomnia Tshirt ', 1, 150000, '10', '399', 'tiki', 'BCA - XXXXXXXXX', ''),
(27, 32, 16, 'Gambar', 1, 900000, '21', '3', 'jne', 'BCA - XXXXXXXXX', '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tracker`
--

CREATE TABLE `tb_tracker` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(3, 'Adam', 'AdamAdmin', '123', 'admin'),
(4, 'Adam', 'Adam666', '123', 'customer'),
(5, 'Loka', 'LokaAdmin', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tracker`
--
ALTER TABLE `tb_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_tracker`
--
ALTER TABLE `tb_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
