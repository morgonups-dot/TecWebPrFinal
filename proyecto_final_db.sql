-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.100.101
-- Generation Time: Apr 06, 2026 at 05:32 AM
-- Server version: 12.2.2-MariaDB-ubu2404
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto_final_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `fecha_nacimiento`, `genero`, `created`, `modified`) VALUES
(1, 'Paul', '1991-11-29', 'Masculito', '2026-04-05 23:08:35', '2026-04-05 23:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `ci` varchar(20) NOT NULL,
  `correo_electronico` varchar(150) NOT NULL,
  `departamento` enum('Santa Cruz','La Paz','Cochabamba','Oruro','Potosí','Chuquisaca','Tarija','Beni','Pando') NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `direccion_vivienda` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `telefono_emergencia` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `es_administrador` tinyint(1) DEFAULT 0,
  `idioma_preferido` enum('es','en') DEFAULT 'es',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellido_paterno`, `apellido_materno`, `ci`, `correo_electronico`, `departamento`, `sexo`, `direccion_vivienda`, `telefono`, `telefono_emergencia`, `password`, `es_administrador`, `idioma_preferido`, `created`, `modified`) VALUES
(1, 'Admin', 'Principal', 'Sistema', '1234567-SC', '123', 'Santa Cruz', 'M', 'Av. Beni entre 3er y 4to anillo', '70010203', '70010000', '123', 1, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(2, 'Maria', 'Guzman', 'Rojas', '7654321-LP', 'maria.admin@gmail.com', 'La Paz', 'F', 'Calle Sagarnaga #45', '71020304', '71000000', 'admin456', 1, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(3, 'Carlos', 'Suarez', 'Mendez', '8887776-CB', 'carlos.s@outlook.com', 'Cochabamba', 'M', 'Calle Aroma esq. Ayacucho', '72030405', '72000001', 'user111', 0, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(4, 'Lucia', 'Pardo', 'Salvatierra', '5554443-OR', '321', 'Oruro', 'F', 'Plaza 10 de Febrero', '73040506', '73000002', '321', 0, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(5, 'Jorge', 'Vaca', 'Diez', '1122334-BE', 'jorge_vaca@yahoo.es', 'Beni', 'M', 'Trinidad - Calle Bolivar', '74050607', '74000003', 'user333', 0, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(6, 'Elena', 'Torrico', 'Prado', '9900112-PT', 'elena.t@gmail.com', 'Potosí', 'F', 'Calle Quijarro #12', '75060708', '75000004', 'user444', 0, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(7, 'Fernando', 'Rios', 'Aguilar', '4433221-TJ', 'fer.rios@u-bo.com', 'Tarija', 'M', 'Bario El Molino', '76070809', '76000005', 'user555', 0, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(8, 'Paola', 'Zeballos', 'Hurtado', '6677889-PA', 'paola.z@gmail.com', 'Pando', 'F', 'Cobija - Barrio Centenario', '77080910', '77000006', 'user666', 0, 'es', '2026-04-06 01:20:16', '2026-04-06 01:20:16'),
(9, 'qwe', 'qwe', 'qwe', '000', 'qwe@upds.bo', 'Santa Cruz', 'M', 'qwe', '000', '0000', '$2y$12$l9Px7LrhVrgC4ivtEiN/lOZAkhhIrP1CGejL8qJrEkmJyf4nLk6Ma', 1, 'es', '2026-04-06 03:39:14', '2026-04-06 03:39:14'),
(10, 'asd', 'asd', 'asd', '567', '567@upds.bo', 'La Paz', 'F', 'asd', '567', '567', '$2y$12$6oWJmgINWMNnO6xXWln1u.DGebRleemlICDGJzQhi9yY8A0BToYW6', 0, 'es', '2026-04-06 03:50:40', '2026-04-06 03:50:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
