
CREATE TABLE `tcategorias` (
  `IdCategoria` int NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

INSERT INTO `tcategorias` (`IdCategoria`, `Tipo`, `Descripcion`, `Estado`) VALUES
(1, 'Poleras', 'poleras', 1),
(2, 'Jeans', 'Jeans ', 1),
(3, 'Busos', 'Busos', 0);

CREATE TABLE `tcolores` (
  `IdColor` int NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Background` int DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

CREATE TABLE `tcompra` (
  `IdCompra` int NOT NULL,
  `IdUsuario` int DEFAULT NULL,
  `IdProveedor` int DEFAULT NULL,
  `IdMaterialPr` int NOT NULL,
  `Total` int DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

CREATE TABLE `tcontrato` (
  `IdContrato` int NOT NULL,
  `IdUsuario` int NOT NULL,
  `IdCliente` int NOT NULL,
  `Descripcion` varchar(256) NOT NULL,
  `Fecha` date NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FileUrl` varchar(256) NOT NULL,
  `FileSize` int NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

CREATE TABLE `tdetalleventas` (
  `IdDetalleVenta` int NOT NULL,
  `IdVenta` int DEFAULT NULL,
  `IdProducto` int DEFAULT NULL,
  `Cantidad` int DEFAULT NULL,
  `Precio` int DEFAULT NULL,
  `Descuento` int DEFAULT NULL
);

CREATE TABLE `tmaterialpr` (
  `IdMaterialPr` int NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

CREATE TABLE `tmodulos` (
  `IdModulo` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` tinyint(1) NOT NULL
);

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
(10, 'Compras', 1);

CREATE TABLE `tofertas` (
  `IdOferta` int NOT NULL,
  `IdProducto` int DEFAULT NULL,
  `Porcentaje` int DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `Estado` tinyint DEFAULT NULL
);

CREATE TABLE `tpermisos` (
  `IdPermisos` int NOT NULL,
  `IdModulo` int NOT NULL,
  `IdRol` int NOT NULL,
  `r` int NOT NULL,
  `w` int NOT NULL,
  `u` int NOT NULL,
  `d` int NOT NULL
);

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
(281, 1, 1, 1, 1, 1, 1),
(282, 2, 1, 1, 1, 1, 1),
(283, 3, 1, 1, 1, 1, 1),
(284, 4, 1, 1, 1, 1, 1),
(285, 5, 1, 1, 1, 1, 1),
(286, 6, 1, 1, 1, 1, 1),
(287, 7, 1, 1, 1, 1, 1),
(288, 8, 1, 1, 1, 1, 1),
(289, 9, 1, 1, 1, 1, 1),
(290, 10, 1, 1, 1, 1, 1);

CREATE TABLE `tproductocolores` (
  `IdPColor` int NOT NULL,
  `IdColor` int DEFAULT NULL,
  `IdProducto` int DEFAULT NULL
);

CREATE TABLE `tproductos` (
  `IdProducto` int NOT NULL,
  `IdCategoria` int DEFAULT NULL,
  `IdOfertas` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Precio` int DEFAULT NULL,
  `Cantidad` int DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

INSERT INTO `tproductos` (`IdProducto`, `IdCategoria`, `IdOfertas`, `Nombre`, `Color`, `Precio`, `Cantidad`, `foto`, `Descripcion`, `Estado`) VALUES
(36, 1, 1, 'Pantalon', NULL, 50, 100, 'item-1.png', 'poleras', 1),
(37, 1, 1, 'Polera Verde', NULL, 60, 20, 'vede.jpg', 'poleras', 1),
(38, 1, 1, 'Chompa', NULL, 50, 20, 'eea583da64c017ed55edca14b4898128.jpg', 'poleras', 1),
(39, 3, 1, 'Buso ', NULL, 40, 10, 'MicrosoftTeams-image.png', 'Buso Canela', 0),
(40, 2, 1, 'Jean M', NULL, 50, 10, 'Jean-Slim-Jossy-01.jpg', 'Jeans', 1),
(41, 1, 10, 'Poleras', NULL, 1200, 10, 'a.jpg', 'poleras', 1);

CREATE TABLE `tproveedores` (
  `IdProveedor` int NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
);

INSERT INTO `tproveedores` (`IdProveedor`, `Nombre`, `Ciudad`, `Correo`, `Telefono`, `Descripcion`, `Estado`) VALUES
(1, 'Miguel', 'El Alto', 'carloms@gmail.com', '68512458', 'Proveedor del alto xd', 1),
(2, 'Leo', 'El Alto', 'leo@gmail.com', '68512458', 'dfdsaf', 1);

CREATE TABLE `troles` (
  `IdRoles` int NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL
);

INSERT INTO `troles` (`IdRoles`, `Tipo`, `Estado`, `Descripcion`) VALUES
(1, 'Administrador', 1, 'Tiene Todos los permisos'),
(2, 'Clientes', 1, 'Clientes que se registraran dentro de la página Web'),
(3, 'Shorts', 1, '1'),
(5, 'Pruebas', 2, 'xd');

CREATE TABLE `ttallas` (
  `IdTalla` int NOT NULL,
  `Nombre` varchar(10) NOT NULL,
  `Estado` tinyint(1) NOT NULL
);

INSERT INTO `ttallas` (`IdTalla`, `Nombre`, `Estado`) VALUES
(1, 'L', 1),
(2, 'M', 1);

CREATE TABLE `ttallasprecio` (
  `IdPrecioTalla` int NOT NULL,
  `IdTalla` int NOT NULL,
  `IdProducto` int NOT NULL,
  `Precio` float NOT NULL
);

INSERT INTO `ttallasprecio` (`IdPrecioTalla`, `IdTalla`, `IdProducto`, `Precio`) VALUES
(1, 1, 36, 124.99),
(2, 2, 36, 126.99);

CREATE TABLE `tusuarios` (
  `IdUsuario` int NOT NULL,
  `IdRoles` int DEFAULT NULL,
  `ci` varchar(50) DEFAULT NULL,
  `Nit` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `NombreFiscal` varchar(50) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Contrasenia` varchar(555) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Token` varchar(100) DEFAULT NULL
);

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

CREATE TABLE `tventas` (
  `IdVenta` int NOT NULL,
  `IdUsuario` int DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `FechaCompra` datetime DEFAULT NULL,
  `MetodoPago` varchar(255) DEFAULT NULL,
  `Total` int DEFAULT NULL
);

ALTER TABLE `tcategorias`
  ADD PRIMARY KEY (`IdCategoria`);

ALTER TABLE `tcolores`
  ADD PRIMARY KEY (`IdColor`);

ALTER TABLE `tcompra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdMaterialPr` (`IdMaterialPr`);

ALTER TABLE `tcontrato`
  ADD PRIMARY KEY (`IdContrato`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdUsuario` (`IdUsuario`);

ALTER TABLE `tdetalleventas`
  ADD PRIMARY KEY (`IdDetalleVenta`),
  ADD KEY `IdVenta` (`IdVenta`),
  ADD KEY `IdProducto` (`IdProducto`);

ALTER TABLE `tmaterialpr`
  ADD PRIMARY KEY (`IdMaterialPr`);

ALTER TABLE `tmodulos`
  ADD PRIMARY KEY (`IdModulo`);

ALTER TABLE `tofertas`
  ADD PRIMARY KEY (`IdOferta`),
  ADD KEY `IdProducto` (`IdProducto`);

ALTER TABLE `tpermisos`
  ADD PRIMARY KEY (`IdPermisos`),
  ADD KEY `IdModulo` (`IdModulo`),
  ADD KEY `IdRol` (`IdRol`);

ALTER TABLE `tproductocolores`
  ADD PRIMARY KEY (`IdPColor`);

ALTER TABLE `tproductos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoria` (`IdCategoria`),
  ADD KEY `IdOfertas` (`IdOfertas`);

ALTER TABLE `tproveedores`
  ADD PRIMARY KEY (`IdProveedor`);

ALTER TABLE `troles`
  ADD PRIMARY KEY (`IdRoles`);

ALTER TABLE `ttallas`
  ADD PRIMARY KEY (`IdTalla`);

ALTER TABLE `ttallasprecio`
  ADD PRIMARY KEY (`IdPrecioTalla`),
  ADD KEY `IdTalla` (`IdTalla`),
  ADD KEY `IdProducto` (`IdProducto`);

ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRoles` (`IdRoles`);

ALTER TABLE `tventas`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `IdUsuario` (`IdUsuario`);

ALTER TABLE `tcategorias`
  MODIFY `IdCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `tcolores`
  MODIFY `IdColor` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `tcompra`
  MODIFY `IdCompra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tcontrato`
  MODIFY `IdContrato` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `tmaterialpr`
  MODIFY `IdMaterialPr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `tmodulos`
  MODIFY `IdModulo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `tofertas`
  MODIFY `IdOferta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tpermisos`
  MODIFY `IdPermisos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

ALTER TABLE `tproductocolores`
  MODIFY `IdPColor` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `tproductos`
  MODIFY `IdProducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `tproveedores`
  MODIFY `IdProveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `troles`
  MODIFY `IdRoles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `ttallas`
  MODIFY `IdTalla` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `ttallasprecio`
  MODIFY `IdPrecioTalla` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tusuarios`
  MODIFY `IdUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

