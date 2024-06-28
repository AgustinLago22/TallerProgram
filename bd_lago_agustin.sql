-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 12:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_lago_agustin`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria_producto`
--

INSERT INTO `categoria_producto` (`id`, `descripcion`) VALUES
(1, 'Cafe'),
(2, 'Cafetera'),
(3, 'Taza');

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `mensaje` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `mail`, `mensaje`) VALUES
(2, 'agustin', 'agustinlago164@gmail.com', 'hola'),
(3, 'Agustin', 'agustinlago164@gmail.com', 'olas'),
(4, 'Agustin', 'agustinlago164@gmail.com', 'hjdfkb'),
(6, 'test', 'test@gmail.com', 'test\r\n'),
(7, 'Agustin', 'agustin@gmail.com', 'asdasda');

-- --------------------------------------------------------

--
-- Table structure for table `envio`
--

CREATE TABLE `envio` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `codPostal` varchar(5) NOT NULL,
  `metodoEnvio` varchar(20) NOT NULL,
  `precioEnvio` float(10,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `envio`
--

INSERT INTO `envio` (`id`, `orderID`, `direccion`, `ciudad`, `provincia`, `codPostal`, `metodoEnvio`, `precioEnvio`, `fecha`) VALUES
(3, 1, 'pago largo 1950', 'corrientes', 'Corrientes', '3400', '1', 4500.00, '2024-06-14'),
(4, 3, 'belgrano 251', 'corrientes', 'corrientes', '3400', '1', 4500.00, '2024-06-14'),
(5, 4, 'belgrano 251', 'Corrientes', 'Corrientes', '3400', '1', 4500.00, '2024-06-14'),
(6, 5, 'belgrano 251', 'corrientes', 'corrientes', '3400', '1', 4500.00, '2024-06-14'),
(7, 6, 'belgrano 251', 'corrientes', 'corrientes', '3400', '1', 4500.00, '2024-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total_venta` float(10,2) NOT NULL,
  `tipoPagoId` int(11) NOT NULL,
  `tarjeta` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `userID`, `fecha`, `total_venta`, `tipoPagoId`, `tarjeta`) VALUES
(1, 2, '2024-06-14 13:21:12', 12500.00, 1, '12345678910'),
(3, 2, '2024-06-14 13:38:15', 25000.00, 1, '12345678910'),
(4, 2, '2024-06-14 13:41:04', 12250.00, 2, '12345678910'),
(5, 2, '2024-06-14 19:22:05', 37500.00, 1, '12345678910'),
(6, 5, '2024-06-15 14:06:51', 24500.00, 1, '12345678910');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderID`, `productID`, `price`, `cantidad`) VALUES
(17, 1, 1, 0.00, 1),
(18, 3, 1, 0.00, 2),
(19, 4, 2, 12250.00, 1),
(20, 5, 1, 12500.00, 3),
(21, 6, 2, 12250.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` double NOT NULL,
  `img` varchar(255) NOT NULL,
  `stock` int(224) DEFAULT NULL,
  `categoriaID` int(11) DEFAULT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nombre`, `descripcion`, `precio`, `img`, `stock`, `categoriaID`, `activado`) VALUES
(1, 'Café Sumatra', 'Café sumatra, con matices de chocolate y canela. 250gr', 12500, 'assets/img/cafe-sumatra.png', 14, 1, 1),
(2, 'Café Colombia', 'Suave, cremoso, sabor balanceado, con notas frutales, leve acidez y cuerpo medio muy aromático, de origen colombiano. 250g', 12250, 'assets/img/cafe_colombia.png', 47, 1, 1),
(3, 'Café Rwanda', 'Este cafe especial ofrece notas de frutas maduras y dulzura natural, enriquecido con matices de chocolate y frutos secos, proviene de rwanda. 250g', 12300, 'assets/img/cafe_rwanda.png', 50, 1, 1),
(5, 'Cafetera moka', 'Cafetera tipo moka marca bialetti, de aluminio con capacidad de 300mL', 140000, 'assets/img/cafetera_moka.png', 15, 2, 1),
(6, 'Cafetera chemex', 'Cafetera tipo chemex hecho con borosilicato, capacidad de 400mL', 70000, 'assets/img/chemex.png', 15, 2, 1),
(7, 'Cafetera aeropress', 'Cafetera tipo aeropress , con capacidad de 296ml ', 130000, 'assets/img/cafetera_aeropress.png', 8, 2, 1),
(8, 'Cafetera french press', 'Cafetera french press , con capacidad de 350mL ', 40000, 'assets/img/cafetera_french.png', 12, 2, 1),
(9, 'Taza Oslo', 'Taza oslo de procelana, combo x3 ', 60000, 'assets/img/taza_oslo.png', 12, 3, 1),
(10, 'Taza Clasica', 'Taza clasica de procelana, combo x3 ', 56000, 'assets/img/taza_clasica.png', 30, 3, 1),
(11, 'Taza Black', 'Taza clasica de procelana, combo x3 ', 61000, 'assets/img/taza_black.png', 16, 3, 1),
(12, 'Vaso Descartable', 'Vaso descartable , combo x10 ', 25000, 'assets/img/taza_descartable.png', 16, 3, 1),
(14, 'Café Brasil', 'Descubre la magia del café brasileño. Este café al probarlo, serás recibido con las jugosas notas de cereza que se fusionan armoniosamente con matices de chocolate. 250gr', 13500, 'assets/img/cafe_brasil.png', 20, 1, 1),
(15, 'Café Perú', 'Café de origen peruano.Al probarlo notas de nuez y caramelo con una acidez llamativa de limoncillo cuando está caliente, complementado por un cuerpo ligero y elegante. A medida que se enfría, surge un retrogusto a fruto seco junto a matices de carame', 12500, 'assets/img/cafe_peru.png', 14, 1, 1),
(16, 'Café México', 'De origen Mexicano . Se caracteriza por su gran variedad de sabores y aromas, que van desde cítricos y chocolate hasta nuez moscada. 250gr', 13000, 'assets/img/cafe_mexico.png', 40, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_pago`
--

INSERT INTO `tipo_pago` (`id`, `descripcion`) VALUES
(1, 'debito'),
(2, 'credito');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `apellido` varchar(64) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `perfilID` int(11) DEFAULT NULL,
  `baja` tinyint(1) DEFAULT 0,
  `password` varchar(100) NOT NULL,
  `loggedIn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `nombre`, `apellido`, `mail`, `usuario`, `perfilID`, `baja`, `password`, `loggedIn`) VALUES
(2, 'Agustin', 'Lago', 'agustinlago164@gmail.com', 'agustinlago', 1, 0, '12345', 0),
(4, 'admin', 'admin', 'admintest@gmail.com', 'admintest', 1, 0, '$2y$10$quYLjRr6GVfCI9LsxZZWneHMBcCXHZRbnKyilHHPunD9D/sGrAac.', 1),
(5, 'Agustin', 'lago', 'agustin@gmail.com', 'agustin', 2, 0, '$2y$10$/UFWFnnblAK3nvtfLGz.UegODuc3BsBQaf/hrGf.5nbUw6Ix0gUP6', 0),
(6, 'Evaluacion', 'un 10', 'evaluacion@gmail.com', 'evaluacion', 2, 0, '$2y$10$kmQzEbt7LkMbTkyMIHhBRODez11L/NIEdO3R0eRV8CaEIRwF62DUG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`orderID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `fk_tipo_pago` (`tipoPagoId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaID` (`categoriaID`);

--
-- Indexes for table `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `perfilID` (`perfilID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_tipo_pago` FOREIGN KEY (`tipoPagoId`) REFERENCES `tipo_pago` (`id`),
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoriaID` FOREIGN KEY (`categoriaID`) REFERENCES `categoria_producto` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `perfilID` FOREIGN KEY (`perfilID`) REFERENCES `perfil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
