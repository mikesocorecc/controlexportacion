-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 20:13:31
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codigosmk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogosprecios`
--

CREATE TABLE `catalogosprecios` (
  `id` int(11) NOT NULL,
  `productoid` int(11) NOT NULL,
  `proveedorid` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogosprecios`
--

INSERT INTO `catalogosprecios` (`id`, `productoid`, `proveedorid`, `precio`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '500.00', '2021-04-25 18:48:55', '2021-04-25 18:48:55'),
(2, 1, 1, '450.00', '2021-04-25 19:03:24', '2021-04-25 22:01:20'),
(3, 3, 1, '1250.00', '2021-04-25 20:16:03', '2021-04-25 20:16:03'),
(4, 2, 2, '100.00', '2021-04-26 04:49:49', '2021-04-26 04:49:49'),
(5, 6, 3, '190.00', '2021-04-26 11:29:10', '2021-04-26 11:29:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `fechacompra` date NOT NULL DEFAULT current_timestamp(),
  `totalcompra` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuarioid`, `fechacompra`, `totalcompra`, `created_at`, `updated_at`) VALUES
(9, 1, '2021-04-26', '2900.00', '2021-04-26 03:16:31', '2021-04-26 03:16:31'),
(10, 1, '2021-04-26', '2700.00', '2021-04-26 03:19:48', '2021-04-26 03:19:48'),
(11, 1, '2021-04-26', '900.00', '2021-04-26 04:50:07', '2021-04-26 04:50:07'),
(12, 36, '2021-04-26', '380.00', '2021-04-26 11:29:59', '2021-04-26 11:29:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE `contenedores` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(100) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaArribo` date NOT NULL DEFAULT current_timestamp(),
  `lugarArribo` varchar(255) NOT NULL,
  `aeropuertodestino` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`id`, `identificacion`, `producto`, `cantidad`, `fechaArribo`, `lugarArribo`, `aeropuertodestino`, `created_at`, `updated_at`) VALUES
(1, 'TTNU 984320 0', 3, 2, '2021-04-25', 'Canada', 'Aeropuerto Internacional de Ottawa, Canada', '2021-04-25 20:42:54', '2021-04-26 10:03:52'),
(2, 'EMTU 347965 0', 1, 5, '2021-04-26', 'Guatemala', 'Aeropuerto la aurora', '2021-04-25 21:50:48', '2021-04-26 12:40:34'),
(3, 'TEMU 215324 1', 6, 5, '2021-04-28', 'Servicios Navieros Y Portuarios S.A. Diagonal 6, 10-50 Zona 10, Interamericas Financial Cente', 'Puerto de Virginia, Norfolk', '2021-04-26 11:34:48', '2021-04-26 11:34:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `id` int(11) NOT NULL,
  `compraid` int(11) NOT NULL,
  `productoid` int(11) NOT NULL,
  `proveedorid` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallecompras`
--

INSERT INTO `detallecompras` (`id`, `compraid`, `productoid`, `proveedorid`, `cantidad`, `precio`, `created_at`, `updated_at`) VALUES
(2, 9, 1, 1, 2, '450.00', '2021-04-26 03:16:31', '2021-04-26 03:16:31'),
(3, 9, 1, 2, 4, '500.00', '2021-04-26 03:16:31', '2021-04-26 03:16:31'),
(4, 10, 1, 1, 6, '450.00', '2021-04-26 03:19:48', '2021-04-26 03:19:48'),
(5, 11, 2, 2, 9, '100.00', '2021-04-26 04:50:07', '2021-04-26 04:50:07'),
(6, 12, 6, 3, 2, '190.00', '2021-04-26 11:29:59', '2021-04-26 11:29:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id` int(11) NOT NULL,
  `contenedorid` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL DEFAULT current_timestamp(),
  `paisDestino` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id`, `contenedorid`, `fechaEntrega`, `paisDestino`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-04-28', 'Canada', '2021-04-26 10:15:20', '2021-04-26 10:24:38'),
(3, 3, '2021-05-01', 'Estados unidos EEUU', '2021-04-26 11:35:27', '2021-04-26 11:35:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `presentacion` varchar(50) NOT NULL,
  `volumen` varchar(100) NOT NULL,
  `unidades` varchar(50) NOT NULL,
  `fotografia` varchar(255) NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `sku`, `presentacion`, `volumen`, `unidades`, `fotografia`, `created_at`, `updated_at`) VALUES
(1, 'Velas aromaticas', 'VLA01', 'Velas', '1 lb', '50', '1619393422.jpg', '2021-04-25 06:00:00', '2021-04-26 18:06:39'),
(2, 'Toallas ', 'TOV01', 'Toallas', '11 kg', '100', '1619371375.jpg', '2021-04-25 18:22:55', '2021-04-26 00:40:09'),
(3, ' Airmax Bubble Pack STOCK X Zapatos para Hombres Mujeres ', 'ZPO01', 'Zapatos', '25 k', '25', '1619393872.jpg', '2021-04-26 00:37:52', '2021-04-26 00:38:34'),
(6, 'Frascos de cristal', 'FRC01', 'Frascos', '25 kg', '12', '1619454289.jpg', '2021-04-26 17:24:49', '2021-04-26 17:25:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `telefonoContacto` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `proveedor`, `direccion`, `telefono`, `telefonoContacto`, `created_at`, `updated_at`) VALUES
(1, 'ARTEX DOS MIL', '13 av. 2-18 zona 1, Guatemala, C.A.', '(502) 2387-8902', '(502) 5621-3912', '2021-04-25 18:20:48', '2021-04-25 19:31:37'),
(2, 'ELCATEX', 'Carretera a Puerto Cortes, entrada Colonia La Mora costado N.O. de Zip Choloma, Complejo Zip Tex, Ch', '(504) 2617-7700', '542323423', '2021-04-25 19:25:45', '2021-04-25 19:25:45'),
(3, 'Alimentos C&amp;Q', '7 Avenida 1-53 Zona 2 Mixco Colonia el Tesoro Guatemala - Guatemala', '(+502) 2250 4903', '(+502) 2206 8701', '2021-04-26 11:28:32', '2021-04-26 11:28:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `tipousuario` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `user`, `password`, `image`, `status`, `tipousuario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mike', 'Socorecc', 'mikesocorec@gmail.com', 'admin', '$2y$10$iYj71Bnq4Pcy6bS2jYXq4.l6u6Ei4FGswxZceUVNypwovuKzm1L2C', '1616715616.jpg', 1, 'administrador', '2021-03-24', '2021-04-25', NULL),
(36, 'Kateryn', 'lopez', 'katy@email.com', 'empleado1', '$2y$10$7QziGzuCusVLGph2w7fwIu3fJ/bHftIcl3lwYlfGv3W9/t7CX0jXe', '1619453424.png', 1, 'empleado', '2021-04-26', '2021-04-26', NULL),
(38, 'Kevin', 'Socorec', 'kvn@email.com', 'admin2', '$2y$10$QvSyHbhjwRAgmFwirNpoYuWUaUUFA9Dlz11NbapwuOJs8/x4F36Hq', '1619456526.png', 1, 'administrador', '2021-04-26', '2021-04-26', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogosprecios`
--
ALTER TABLE `catalogosprecios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_precios_productos` (`productoid`),
  ADD KEY `fk_precios_proveedores` (`proveedorid`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_contenedor` (`producto`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_compra` (`compraid`),
  ADD KEY `fk_detalle_producto` (`productoid`),
  ADD KEY `fk_detalle_proveedor` (`proveedorid`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogosprecios`
--
ALTER TABLE `catalogosprecios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `contenedores`
--
ALTER TABLE `contenedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogosprecios`
--
ALTER TABLE `catalogosprecios`
  ADD CONSTRAINT `fk_precios_productos` FOREIGN KEY (`productoid`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_precios_proveedores` FOREIGN KEY (`proveedorid`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD CONSTRAINT `fk_producto_contenedor` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD CONSTRAINT `fk_detalle_compra` FOREIGN KEY (`compraid`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`productoid`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_detalle_proveedor` FOREIGN KEY (`proveedorid`) REFERENCES `proveedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
