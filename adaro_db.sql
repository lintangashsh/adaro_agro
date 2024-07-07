-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8000
-- Generation Time: Apr 12, 2024 at 05:53 PM
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
-- Database: `db_rkh24`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(128) NOT NULL,
  `price` varchar(256) NOT NULL,
  `product_image` varchar(128) NOT NULL,
  `favorite` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `product_name`, `description`, `category`, `price`, `product_image`, `favorite`) VALUES
(1, 'Bangkit Keju', 'Siapa yang tidak tahu cookies bangkit keju? Cookies yang wajib hadir ketika hari raya di rumah-rumah kita! Crunchy tetapi tetap lembut dimulut ketika dimakan, itulah cookies bangkit keju! Perpaduan rasa bahan susu dengan keju yang menjadi perpaduan nikmat dimulut! Bangkit keju ini juga, spesial buat kamu yang kurang suka dengan rasa manis yang berlebih, karena keju yang digunakan pada cookies ini adalah keju yang dominan asin dan asamnya keju! Percaya deh, kamu ga akan bosen memakannya :)', 'Cookies', '65000', 'Bangket_Keju_1.jpg', 0),
(6, 'Chocolato Espresso', 'Kalau kamu pecinta kopi, brownies ini sangat cocok banget buat kamu. Karena makan brownies ditemenin kopi itu kenikmatan yang hakiki, ya kan? Sekali gigitan ngerasain sensasi coklat dan kopi dalam waktu yang sama, ditambah lagi aroma kopi dari brownies ini kuat banget, siapa coba yang ga suka aroma kopi, kamu suka kan? Soalnya wangi nya healing banget', 'Brownies', '75000', 'IMG_0079_-_Copy1.JPG', 1),
(7, 'Pie Buah', 'Pie buah rumah kue Haviyya mempunyai tekstur yg crunchy pada kulit nya.Perpaduan crunchy dan lembut nya vla yg manis & gurih di sertai buah yang segar, menimbulkan rasa happy bagi yg melihat & mencicipi nya', 'Pie', '5000', 'IMG_0564_-_Copy2.jpg', 1),
(8, 'Brownies Sekat', 'Brownies Sekat ini teksturnya chewy, dipanggang dengan loyang khusus, ditambah berbagai topping menarik untuk menggoda kita supaya milikin dia', 'Brownies', '120000', 'IMG_0078_-_Copy1.JPG', 0),
(9, 'Chocolate Cream Cheese', 'Coklat dan keju itu Perfect Match. Kalau kalian ngga suka keju, waktu makan brownies ini seketika lupa kalo ngga berteman sama keju. Perpaduan coklat dan kejunya bener-bener another level enaknya, Maa syaa Allah. Pernah ngga, jadi ngga bisa berkata-kata setelah makan sesuatu karena enaknya makanan itu? Kalian harus cobain sih gimana rasanya Chocolate Cream Cheese ini', 'Brownies', '120000', 'IMG_0074_-_Copy.JPG', 0),
(10, 'Milk Beng Beng', 'Dari namanya kita udah tau yaa brownies ini mengandung apa\r\nNah, varian ini rasanya lebih light daripada varian yang lain\r\nKarena varian ini ada rasa susunya\r\nJuga ditambah Beng Beng salah satu snack yang enaknya istiqomah hehehe', 'Brownies', '70000', 'IMG_0082_-_Copy.JPG', 0),
(11, 'Oreo Choco Ball', 'Brownies legendnya kita nih. By the way, dia ganti nama. Dulu namanya Melted Brownie\r\nTapi kebanyakan orang manggil dia Brownies Oreo Atau \"Itu kak brownies yang ada bola-bola coklatnya\". So, we decided to change the name\r\nOreo Choco Ball, as many people describe. Walaupun namanya berubah tapi dia tetep seperti yang kamu tau kok \"Melted\". Imagine, kamu potong browniesnya, potong jadi beberapa bagian as much as you want, waktu kamu angkat potongannya kamu bisa liat lelehannya dan insyaa Allah you', 'Brownies', '75000', 'IMG_0072_-_Copy.JPG', 0),
(12, 'Fruity Brownie', 'Pretty, isn\'t it? Looks delicious right? Like how it looks, that\'s how it tastes ❤️ Chocolate mix fruits Yum.. Yum.. ????', 'Brownies', '65000', 'IMG_0073_-_Copy.JPG', 0),
(13, 'Bangkit Mentega', 'Sama seperti saudaranya, bangkit keju! Crunchy and soft nya dari cookies yang satu memang tidak pernah tergantikan terutama ketika hari raya telah tiba. Eits! Tapi jangan salah, karena cookie yang satu ini bisa jadi teman ngemil kamu ketika gabut atau ketika melakukan aktivitas apapun itu mungkin seperti marathon film? marathon drakor? Yes! You can eat it all the time!', 'Cookies', '65000', 'Bangket_Mentega_.jpg', 0),
(14, 'Cappuccino Tart', 'Hah? Cappuccino tart? Kue tart rasa cappuccino gitu? Hahaha kurang lebih cookies ini merupakan sisi crunchy nya dari kue tart. Iya lo kue tart yang biasanya jadi kue ulang tahun itu. Nah, tetapi sekarang kamu bisa ngerasain sensasi makan kue tart dengan perpaduan rasa cappuccino yang lumer dimulut :) Tunggu apalagi? Yuk gas order!', 'Cookies', '75000', 'Cappuccino_Tart_-_Copy.jpg', 0),
(15, 'Choco Chip Almond', 'Siapa yang tidak tahu cookies satu ini? Biasanya kita menyebutnya \'Good Time\' bukan? Yap! Benar sekali! Cookies yang satu ini tentunya masih jadi incaran semua kalangan umur, baik itu anak muda, orang tua, dan tentunya bocil-bocil kematian yang selalu hadir ketika hari raya. Atau bahkan, cookies udah jadi cemilan kita juga ya? Hahaha', 'Cookies', '70000', 'Choco_Chip_Almond_-_Copy.jpg', 0),
(16, 'Chui Kou So', 'On Going', 'Cookies', '65000', 'Chui_Kou_So.jpg', 0),
(17, 'Pie Susu', 'Siapa yang tidak tahu dengan pie susu? Crunhy nya kulit dan pinggiran pie yang menjadi satu perpaduan lengkap dengan isian fla susu yang sangat lumer di dalam mulut :) Pie susu merupakan produk unggulan Rumah Kue Havivya juga lo! Tertarik mencoba kelembutan dan crunchy nya pie susu Havivya? Segera pesan sekarang juga!', 'Pie', '4000', 'Pie_susu_-_Copy.jpeg', 0),
(18, 'Skippy Choco Ball', 'On Going', 'Cookies', '70000', 'Skippy_Choco_Ball_-_Copy3.jpg', 1),
(19, 'Nastar Cup', 'On Going', 'Cookies', '70000', 'Nastar_Cup_-_Copy.jpg', 0),
(20, 'Nastar Premium', 'Yup! Sesuai dengan namanya gais! Nastar Premium Rumah Kue Havivya merupakan produk unggulan kami juga lo! Nastar premium ini berbeda dengan nastar lainnya karena teksturnya yang lebih lembut sampai lumer dimulut dan juga proses pembuatannya yang dibuat dengan penuh kasih sayang dan rasa syukur terutama dalam menyambut hari raya lebaran! Jadi, cookies yang satu ini pastinya menjadi andalan bagi kita semua.', 'Cookies', '80000', 'Nastra_Premium_-_Copy2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_terlaris`
--

CREATE TABLE `tb_produk_terlaris` (
  `id` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `product_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk_terlaris`
--

INSERT INTO `tb_produk_terlaris` (`id`, `product_name`, `description`, `category`, `price`, `product_image`) VALUES
(1, 'Pie Buah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 'Brownies', 15000, 'kue33.jpg'),
(2, 'Skippy Caramel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Brownies', 75000, 'kue3.jpg'),
(4, 'Oreo Choco Ball', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Brownies', 75000, 'kue2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `review` varchar(500) NOT NULL,
  `image_profile` varchar(128) NOT NULL,
  `image_review` varchar(128) NOT NULL,
  `posting_time` int(11) NOT NULL,
  `favorite` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_review`
--

INSERT INTO `tb_review` (`id`, `name`, `review`, `image_profile`, `image_review`, `posting_time`, `favorite`) VALUES
(15, 'M Lintang A W', 'Uji Coba Review Video', 'Profil_Ltg1.png', 'Desktop_2024_03_13_-_15_36_55_0111.mp4', 1712935962, 1),
(16, 'M Lintang A W', 'Uji Review Gambar', 'Profil_Ltg1.png', 'thumbsUp51.png', 1712936497, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_review_detail`
--

CREATE TABLE `tb_review_detail` (
  `id_review` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `review` varchar(500) NOT NULL,
  `image_profile` varchar(128) NOT NULL,
  `image_review` varchar(128) NOT NULL,
  `posting_time` int(11) NOT NULL,
  `favorite` int(1) NOT NULL,
  `agree` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `code_account` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `point` int(10) NOT NULL,
  `referral_code` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `code_account`, `name`, `email`, `image`, `password`, `point`, `referral_code`, `role_id`, `is_active`, `date_created`) VALUES
(3, '99999', 'Daffa Muttaqin', 'daffamuttaqin09@gmail.com', 'Logo-UPI-Universitas-Pendidikan-Indonesia-Original-PNG.png', '$2y$10$4/Da9h2cl.VjjjALLJZwK.UHcSSWJM.l5GaYQKlzGPgiI84AXmxrm', 14, '0', 2, 1, 1657887979),
(38, '762508', 'M Lintang A W', 'lintangashshofa@gmail.com', 'Profil_Ltg1.png', '$2y$10$ln7kntfTQax9uiGJmJ5C2uKvr7fgjBN0cnN6GxSRrrX4gbRtB9KKu', 50, '', 1, 1, 1712831508),
(39, '213748', 'Fauzi Rahman', 'fzirahman@gmail.com', 'Profil_Poji.png', '$2y$10$5KDfNnFIhNGm7U5XBf466OWn2r0YywyC.dHnh3iQOm5HD9BKKCNAy', 0, '', 2, 1, 1712936942);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 2, 'Beranda', 'user', 1),
(2, 2, 'Produk', 'user/produk', 1),
(3, 1, 'Admin', 'admin', 1),
(4, 2, 'Tentang', 'user/tentang', 1),
(5, 2, 'Profil', 'user/profil', 1),
(6, 2, 'Edit Profil', 'user/edit', 0),
(7, 2, 'Ubah Password', 'user/ubah_password', 0),
(8, 2, 'Testimoni', 'user/testimoni', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk_terlaris`
--
ALTER TABLE `tb_produk_terlaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_review_detail`
--
ALTER TABLE `tb_review_detail`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_produk_terlaris`
--
ALTER TABLE `tb_produk_terlaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_review_detail`
--
ALTER TABLE `tb_review_detail`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
