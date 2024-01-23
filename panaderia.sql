-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 06:35 AM
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
-- Database: `panaderia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios_quejas`
--

CREATE TABLE `comentarios_quejas` (
  `id_retroalimentacion` int(11) NOT NULL,
  `tipo_retroalimentacion` varchar(40) DEFAULT NULL,
  `descripcion` varchar(400) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_do` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `fecha_detalle` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_orden` int(11) DEFAULT NULL,
  `tipo_entrega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_productos`
--

CREATE TABLE `img_productos` (
  `id_img_productos` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nom_producto` varchar(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_entrega`
--

CREATE TABLE `tipo_entrega` (
  `id_tipo_entrega` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `telefono` int(12) DEFAULT NULL,
  `contrasena` varchar(1000) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `codigo_reset_passwd` int(20) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios_quejas`
--
ALTER TABLE `comentarios_quejas`
  ADD PRIMARY KEY (`id_retroalimentacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `tipo_entrega` (`tipo_entrega`);

--
-- Indexes for table `img_productos`
--
ALTER TABLE `img_productos`
  ADD PRIMARY KEY (`id_img_productos`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  ADD PRIMARY KEY (`id_tipo_entrega`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_personas` (`id_persona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios_quejas`
--
ALTER TABLE `comentarios_quejas`
  MODIFY `id_retroalimentacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_productos`
--
ALTER TABLE `img_productos`
  MODIFY `id_img_productos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  MODIFY `id_tipo_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios_quejas`
--
ALTER TABLE `comentarios_quejas`
  ADD CONSTRAINT `comentarios_quejas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `detalle_orden_ibfk_3` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`),
  ADD CONSTRAINT `detalle_orden_ibfk_4` FOREIGN KEY (`tipo_entrega`) REFERENCES `tipo_entrega` (`id_tipo_entrega`);

--
-- Constraints for table `img_productos`
--
ALTER TABLE `img_productos`
  ADD CONSTRAINT `img_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
