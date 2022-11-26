-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 21:37:52
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcategorias`
--

CREATE TABLE `tcategorias` (
  `IdCategoria` int(11) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tcategorias`
--

INSERT INTO `tcategorias` (`IdCategoria`, `Tipo`, `Descripcion`, `Estado`) VALUES
(1, 'Poleras', 'poleras', 1),
(2, 'Jeans', 'Jeans ', 1),
(3, 'Busos', 'Busos', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcolores`
--

CREATE TABLE `tcolores` (
  `IdColor` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Background` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcompra`
--

CREATE TABLE `tcompra` (
  `IdCompra` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `IdProveedor` int(11) DEFAULT NULL,
  `IdMaterialPr` int(11) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcontrato`
--

CREATE TABLE `tcontrato` (
  `IdContrato` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FileUrl` varchar(256) NOT NULL,
  `FileSize` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `tcontrato`
--

INSERT INTO `tcontrato` (`IdContrato`, `IdUsuario`, `IdCliente`, `Descripcion`, `Fecha`, `FileName`, `FileUrl`, `FileSize`, `Estado`) VALUES
(1, 4, 7, 'esto es un contrato personal', '2022-11-24', 'contrato.pdf', './Assets/archivos/contratos/contrato.pdf', 6664758, 1),
(2, 4, 12, 'esto es un docx', '2022-11-24', 'contrato.docx', './Assets/archivos/contratos/contrato.docx', 681643, 1),
(3, 4, 7, 'esto es del 30 de 12 de 2022', '2022-12-30', 'FUNCIONAMIENTO DEL DISCO DUR1.pdf', './Assets/archivos/contratos/FUNCIONAMIENTO DEL DISCO DUR1.pdf', 64396, 1),
(4, 4, 12, 'perro', '0000-00-00', 'CLASE  ESPEJO MAPA.pdf', './Assets/archivos/contratos/CLASE  ESPEJO MAPA.pdf', 266261, 1),
(5, 4, 10, 'perro', '2022-11-24', 'ADMINISTRACION.docx', './Assets/archivos/contratos/ADMINISTRACION.docx', 249203, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalleventas`
--

CREATE TABLE `tdetalleventas` (
  `IdDetalleVenta` int(11) NOT NULL,
  `IdVenta` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmaterialpr`
--

CREATE TABLE `tmaterialpr` (
  `IdMaterialPr` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulos`
--

CREATE TABLE `tmodulos` (
  `IdModulo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tmodulos`
--

INSERT INTO `tmodulos` (`IdModulo`, `Nombre`, `Estado`) VALUES
(1, 'Dashboard', 1),
(2, 'Usuarios', 1),
(3, 'Clientes', 1),
(4, 'Productos', 1),
(5, 'Inventario', 1),
(6, 'Roles', 1),
(7, 'Categorías', 1),
(8, 'Proveedores', 1),
(9, 'Materiales', 1),
(10, 'Compras', 1),
(11, 'Ofertas', 1),
(12, 'Contratos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tofertas`
--

CREATE TABLE `tofertas` (
  `IdOferta` int(11) NOT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `Porcentaje` int(11) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpermisos`
--

CREATE TABLE `tpermisos` (
  `IdPermisos` int(11) NOT NULL,
  `IdModulo` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tpermisos`
--

INSERT INTO `tpermisos` (`IdPermisos`, `IdModulo`, `IdRol`, `r`, `w`, `u`, `d`) VALUES
(201, 1, 2, 1, 0, 0, 0),
(202, 2, 2, 0, 0, 0, 0),
(203, 3, 2, 0, 0, 0, 0),
(204, 4, 2, 0, 0, 0, 0),
(205, 5, 2, 0, 0, 0, 0),
(206, 6, 2, 0, 0, 0, 0),
(207, 7, 2, 0, 0, 0, 0),
(208, 8, 2, 0, 0, 0, 0),
(209, 9, 2, 0, 0, 0, 0),
(210, 10, 2, 0, 0, 0, 0),
(291, 1, 1, 1, 1, 1, 1),
(292, 2, 1, 1, 1, 1, 1),
(293, 3, 1, 1, 1, 1, 1),
(294, 4, 1, 1, 1, 1, 1),
(295, 5, 1, 1, 1, 1, 1),
(296, 6, 1, 1, 1, 1, 1),
(297, 7, 1, 1, 1, 1, 1),
(298, 8, 1, 1, 1, 1, 1),
(299, 9, 1, 1, 1, 1, 1),
(300, 10, 1, 1, 1, 1, 1),
(301, 11, 1, 1, 1, 1, 1),
(302, 12, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductocolores`
--

CREATE TABLE `tproductocolores` (
  `IdPColor` int(11) NOT NULL,
  `IdColor` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductos`
--

CREATE TABLE `tproductos` (
  `IdProducto` int(11) NOT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `IdOfertas` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tproductos`
--

INSERT INTO `tproductos` (`IdProducto`, `IdCategoria`, `IdOfertas`, `Nombre`, `Color`, `Precio`, `Cantidad`, `foto`, `Descripcion`, `Estado`) VALUES
(36, 1, 1, 'Pantalon', NULL, 50, 100, 'item-1.png', 'poleras', 1),
(37, 1, 1, 'Polera Verde', NULL, 60, 20, 'vede.jpg', 'poleras', 1),
(38, 1, 1, 'Chompa', NULL, 50, 20, 'eea583da64c017ed55edca14b4898128.jpg', 'poleras', 1),
(39, 3, 1, 'Buso ', NULL, 40, 10, 'MicrosoftTeams-image.png', 'Buso Canela', 0),
(40, 2, 1, 'Jean M', NULL, 50, 10, 'Jean-Slim-Jossy-01.jpg', 'Jeans', 1),
(41, 1, 10, 'Poleras', NULL, 1200, 10, 'a.jpg', 'poleras', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedores`
--

CREATE TABLE `tproveedores` (
  `IdProveedor` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tproveedores`
--

INSERT INTO `tproveedores` (`IdProveedor`, `Nombre`, `Ciudad`, `Correo`, `Telefono`, `Descripcion`, `Estado`) VALUES
(1, 'Miguel', 'El Alto', 'carloms@gmail.com', '68512458', 'Proveedor del alto xd', 1),
(2, 'Leo', 'El Alto', 'leo@gmail.com', '68512458', 'dfdsaf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `troles`
--

CREATE TABLE `troles` (
  `IdRoles` int(11) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `troles`
--

INSERT INTO `troles` (`IdRoles`, `Tipo`, `Estado`, `Descripcion`) VALUES
(1, 'Administrador', 1, 'Tiene Todos los permisos'),
(2, 'Clientes', 1, 'Clientes que se registraran dentro de la página Web'),
(3, 'Shorts', 1, '1'),
(5, 'Pruebas', 2, 'xd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttallas`
--

CREATE TABLE `ttallas` (
  `IdTalla` int(11) NOT NULL,
  `Nombre` varchar(10) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ttallas`
--

INSERT INTO `ttallas` (`IdTalla`, `Nombre`, `Estado`) VALUES
(1, 'L', 1),
(2, 'M', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttallasprecio`
--

CREATE TABLE `ttallasprecio` (
  `IdPrecioTalla` int(11) NOT NULL,
  `IdTalla` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ttallasprecio`
--

INSERT INTO `ttallasprecio` (`IdPrecioTalla`, `IdTalla`, `IdProducto`, `Precio`) VALUES
(1, 1, 36, 124.99),
(2, 2, 36, 126.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE `tusuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdRoles` int(11) DEFAULT NULL,
  `ci` varchar(50) DEFAULT NULL,
  `Nit` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `NombreFiscal` varchar(50) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Contrasenia` varchar(555) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`IdUsuario`, `IdRoles`, `ci`, `Nit`, `Nombre`, `NombreFiscal`, `Apellido`, `Telefono`, `Correo`, `Direccion`, `Contrasenia`, `Estado`, `Token`) VALUES
(1, 1, '2454235', 2147483647, 'Jose Maria', 'Jose Mayta', 'Mayta Daza', 67016437, 'mayta5544@gmail.com', 'Av 6 de Marzo', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 'e763da91f87cb82b37e2-95673f85ccd121a6a152-00b64278614f30258738-a3feb5c84c9f877159d2'),
(2, 2, NULL, NULL, 'Ariel merma', NULL, 'Quispe', NULL, 'ar@gmail.com', NULL, '12345', 1, NULL),
(3, 2, NULL, NULL, 'Carlos xd', NULL, 'Vallejoss', NULL, 'carloms@gmail.com', NULL, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, NULL),
(4, 1, NULL, NULL, 'Admin', NULL, 'Admin', NULL, 'admin@gmail.com', NULL, '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1, ''),
(5, 2, NULL, NULL, 'Mois', NULL, 'Vallejos', NULL, 'ca@gmail.com', NULL, '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1, NULL),
(6, 4, NULL, NULL, 'ca', NULL, 'caclklkl', NULL, 'cac@gmail.com', NULL, '12345647', 1, NULL),
(7, 2, NULL, NULL, 'Raul', NULL, 'Sarja', NULL, 'raul@gmail.com', NULL, '12345678', 1, NULL),
(9, 5, NULL, NULL, 'Alvaro', NULL, 'Peres', NULL, 'alper@gmail.com', NULL, '12345678', 1, NULL),
(10, 2, '2454235', 546355423, 'Abdias', 'Abdías Quispe', 'Quispe', 68512458, 'abdias@gmail.com', 'Av 6 de Marzo', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, NULL),
(11, 2, '2454235', 54635, 'Ariel', 'Ariel Merma', 'Quispe', 68512458, 'merma@gmail.com', 'Av 6 de Marzo', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, NULL),
(12, 2, '0876785', 87756876, 'Mercedes', 'Mercedes Merlo', 'Merlo', 68512458, 'merlo@gmail.com', 'Av 6 de Marzo', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tventas`
--

CREATE TABLE `tventas` (
  `IdVenta` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `FechaCompra` datetime DEFAULT NULL,
  `MetodoPago` varchar(255) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tcategorias`
--
ALTER TABLE `tcategorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `tcolores`
--
ALTER TABLE `tcolores`
  ADD PRIMARY KEY (`IdColor`);

--
-- Indices de la tabla `tcompra`
--
ALTER TABLE `tcompra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdMaterialPr` (`IdMaterialPr`);

--
-- Indices de la tabla `tcontrato`
--
ALTER TABLE `tcontrato`
  ADD PRIMARY KEY (`IdContrato`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `tdetalleventas`
--
ALTER TABLE `tdetalleventas`
  ADD PRIMARY KEY (`IdDetalleVenta`),
  ADD KEY `IdVenta` (`IdVenta`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `tmaterialpr`
--
ALTER TABLE `tmaterialpr`
  ADD PRIMARY KEY (`IdMaterialPr`);

--
-- Indices de la tabla `tmodulos`
--
ALTER TABLE `tmodulos`
  ADD PRIMARY KEY (`IdModulo`);

--
-- Indices de la tabla `tofertas`
--
ALTER TABLE `tofertas`
  ADD PRIMARY KEY (`IdOferta`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `tpermisos`
--
ALTER TABLE `tpermisos`
  ADD PRIMARY KEY (`IdPermisos`),
  ADD KEY `IdModulo` (`IdModulo`),
  ADD KEY `IdRol` (`IdRol`);

--
-- Indices de la tabla `tproductocolores`
--
ALTER TABLE `tproductocolores`
  ADD PRIMARY KEY (`IdPColor`);

--
-- Indices de la tabla `tproductos`
--
ALTER TABLE `tproductos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoria` (`IdCategoria`),
  ADD KEY `IdOfertas` (`IdOfertas`);

--
-- Indices de la tabla `tproveedores`
--
ALTER TABLE `tproveedores`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `troles`
--
ALTER TABLE `troles`
  ADD PRIMARY KEY (`IdRoles`);

--
-- Indices de la tabla `ttallas`
--
ALTER TABLE `ttallas`
  ADD PRIMARY KEY (`IdTalla`);

--
-- Indices de la tabla `ttallasprecio`
--
ALTER TABLE `ttallasprecio`
  ADD PRIMARY KEY (`IdPrecioTalla`),
  ADD KEY `IdTalla` (`IdTalla`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRoles` (`IdRoles`);

--
-- Indices de la tabla `tventas`
--
ALTER TABLE `tventas`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tcategorias`
--
ALTER TABLE `tcategorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tcolores`
--
ALTER TABLE `tcolores`
  MODIFY `IdColor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tcompra`
--
ALTER TABLE `tcompra`
  MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tcontrato`
--
ALTER TABLE `tcontrato`
  MODIFY `IdContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tmaterialpr`
--
ALTER TABLE `tmaterialpr`
  MODIFY `IdMaterialPr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tmodulos`
--
ALTER TABLE `tmodulos`
  MODIFY `IdModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tofertas`
--
ALTER TABLE `tofertas`
  MODIFY `IdOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tpermisos`
--
ALTER TABLE `tpermisos`
  MODIFY `IdPermisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT de la tabla `tproductocolores`
--
ALTER TABLE `tproductocolores`
  MODIFY `IdPColor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tproductos`
--
ALTER TABLE `tproductos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tproveedores`
--
ALTER TABLE `tproveedores`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `troles`
--
ALTER TABLE `troles`
  MODIFY `IdRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ttallas`
--
ALTER TABLE `ttallas`
  MODIFY `IdTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ttallasprecio`
--
ALTER TABLE `ttallasprecio`
  MODIFY `IdPrecioTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
