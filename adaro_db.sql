-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8000
-- Generation Time: Aug 03, 2024 at 04:55 AM
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
-- Database: `adaro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` varchar(128) NOT NULL,
  `address` varchar(500) NOT NULL,
  `service` varchar(128) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `id_produk`, `id_user`, `name`, `product_name`, `quantity`, `price`, `address`, `service`, `contact`, `order_date`) VALUES
(11, 2, 41, 'Zona Giawa', 'Broken Orange Pekoe One (BOP I)', 6, '10.5', 'Jl. Setia budi, No. 190E, Kelurahan Tj. Rejo, Kecamatan Medan Sunggal, Kota Medan, Provinsi Sumatera Utara, Indonesia, 20154', 'Lion Parcel', '+62895327466680', '2024-08-03 02:43:47'),
(12, 2, 42, 'Wak Leng', 'Broken Orange Pekoe One (BOP I)', 1, '1.75', 'Medan, Indonesia, 20235', 'SiCepat Express', '+628216867788888', '2024-08-03 02:51:30'),
(13, 3, 42, 'Wak Leng', 'Broken Orange Pekoe (BOP)', 2, '3.5', 'Level 2, Jalan USJ 21/10, Persiaran Kewajipan, 47630 Subang Jaya, Selangor, Malaysia', 'DHL Express', '+6038081789684', '2024-08-03 02:54:46');

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
(1, 'Broken Pekoe Two (BP II)', 'The particles are short, straight and contain more stalks and old leaf bones and peeled off, blackish and reddish in color.', 'Grade II', '3.0', 'bp_II1.png', 0),
(2, 'Broken Orange Pekoe One (BOP I)', 'The particles are short, slightly small, black, twisted, slightly curly, mainly from young leaves, containing a little twisted leaf bones, a little tips or no tip.', 'Grade I', '3.5', 'bop_I1.png', 1),
(3, 'Broken Orange Pekoe (BOP)', 'The particles are short, slightly small, black, twisted, and slightly curly, mainly from young leaves, containing little twisted leaf bones, very few tips, or no tip.', 'Grade I', '3.5', 'bop1.png', 1),
(4, 'Broken Orange Pekoe Fannings (BOPF)', 'The particles are short, smaller, black, twisted, and slightly curly, and contain a lot of tips.', 'Grade I', '3.5', 'bopf.png', 0),
(5, 'Broken Pekoe (BP)', 'The particles are short, straight up from the stalks and young leaves that do not peel off, black and reddish.', 'Grade I', '3.5', 'bp.png', 1),
(6, 'Pekoe Fannings (PF)', 'The particles are short, twisted black, and slightly curly, but larger than fannings.', 'Grade I', '3.5', 'pf.png', 1),
(7, 'Dust One (D I)', 'The particles are small, grainy, and black.', 'Grade I', '3.0', 'd_I.png', 0),
(8, 'Pekoe Fannings Two (PF II)', 'The particles are short, rather small, black, twisted, and slightly curly, but still contain more fiber.', 'Grade II', '3.0', 'pf_II.png', 0),
(9, 'Dust Two (D II)', 'The particles are tiny, still contain much fiber, and reddish.', 'Grade II', '2.8', 'dust_II.png', 0),
(10, 'Dust Four (D IV)', 'The particles are tiny, still contain much fiber, reddish, and slightly sandy.', 'Grade II', '2.8', 'dust_IV.png', 0);

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
(17, 'Zona Giawa', 'Testing image review', 'jona11.jpg', 'thumbsUp.png', 1720390790, 0),
(18, 'Zona Giawa', 'Testing video review', 'jona11.jpg', 'vid_review.mp4', 1720391170, 0),
(19, 'Wak Leng', 'Just order it!', 'whatsapp.png', 'bt2.jpg', 1720393191, 0);

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

--
-- Dumping data for table `tb_review_detail`
--

INSERT INTO `tb_review_detail` (`id_review`, `id_product`, `name`, `review`, `image_profile`, `image_review`, `posting_time`, `favorite`, `agree`) VALUES
(18, 2, 'Wak Leng', 'Have ordered this product for my 20 ft container and still waiting for those things!', 'whatsapp.png', 'BOP_test.jpg', 1720391762, 0, 1),
(19, 4, 'Wak Leng', 'Have ordered this product for my half-20 ft container and still waiting for those things!', 'whatsapp.png', 'BOPF_test_(1).jpg', 1720392927, 0, 0),
(20, 2, 'Wak Leng', '', 'whatsapp.png', '', 1722817112, 0, 2);

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
(41, '380924', 'Zona Giawa', 'zonaalfaris@gmail.com', 'jona11.jpg', '$2y$10$ZpG9DsV.96UoHh8WzOQjV.QDssXDrREa/27wd16/4H7SwPZSdKJRW', 1000, '', 1, 1, 1720381625),
(42, '074512', 'Wak Leng', 'wakleng1314@gmail.com', 'whatsapp.png', '$2y$10$kE8dp1B5aN2QASvvyDBg7e0/s5NkUx3rt/4Is32SdW6bshtI9ne5K', 3, '380924', 2, 1, 1720391598);

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
(1, 2, 'Home', 'user', 1),
(2, 2, 'Products', 'user/produk', 1),
(3, 2, 'Order', 'user/order', 0),
(4, 1, 'Admin', 'admin', 1),
(5, 2, 'About', 'user/tentang', 1),
(6, 2, 'Terms and Conditions', 'user/terms', 1),
(7, 2, 'Profile', 'user/profil', 0),
(8, 2, 'Edit Profile', 'user/edit', 0),
(9, 2, 'Change Password', 'user/ubah_password', 0),
(10, 2, 'Review', 'user/testimoni', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
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
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_review_detail`
--
ALTER TABLE `tb_review_detail`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
