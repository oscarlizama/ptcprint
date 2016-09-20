-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-09-2016 a las 03:27:14
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `punto_print`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `mensajes_iniciar` (IN `asunto` VARCHAR(25), IN `id_cl` INT UNSIGNED, IN `mensaje` VARCHAR(256))  NO SQL
BEGIN
INSERT INTO conversaciones(asunto,id_cliente) VALUES(asunto,id_cl);
INSERT INTO mensajes(id_conversacion,mensaje,emisor) VALUES((SELECT MAX(id_conversacion) FROM conversaciones),mensaje,0);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(10) UNSIGNED NOT NULL,
  `nombre_archivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` mediumblob NOT NULL,
  `tipo_archivo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `id_conversacion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_medida` int(10) UNSIGNED NOT NULL,
  `cantidad` int(4) NOT NULL DEFAULT '0',
  `fecha_solicitud` date NOT NULL,
  `estado_carrito` tinyint(1) NOT NULL DEFAULT '0',
  `recogido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo_cliente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `clave_cliente` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_cliente` tinyint(1) NOT NULL DEFAULT '0',
  `estado_sesion` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `calificacion` decimal(3,2) UNSIGNED NOT NULL,
  `fecha_comentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id_configuracion` int(10) UNSIGNED NOT NULL,
  `nombre_configuracion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `configuracion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_configuracion` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `estado_configuracion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_proveedor`
--

CREATE TABLE `contactos_proveedor` (
  `id_contacto_proveedor` int(10) UNSIGNED NOT NULL,
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `contacto_proveedor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_contacto` int(10) UNSIGNED NOT NULL,
  `estado_contacto_proveedor` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id_conversacion` int(11) UNSIGNED NOT NULL,
  `asunto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguno',
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `fecha_conversacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `nombre_empresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguno',
  `mision` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguna',
  `vision` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguna',
  `valores` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguno',
  `logo_empresa` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(10) UNSIGNED NOT NULL,
  `equipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo_click_equipo` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `estado_equipo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_productos`
--

CREATE TABLE `fotos_productos` (
  `id_foto_producto` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `foto_producto` mediumblob NOT NULL,
  `estado_foto_producto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mano_obra`
--

CREATE TABLE `mano_obra` (
  `id_actividad` int(10) UNSIGNED NOT NULL,
  `actividad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo_hora` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `descripcion_actividad` varchar(259) COLLATE utf8_unicode_ci NOT NULL,
  `estado_obra` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas_producto`
--

CREATE TABLE `medidas_producto` (
  `id_medida` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `medida` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `estado_medida` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(10) UNSIGNED NOT NULL,
  `id_conversacion` int(11) UNSIGNED NOT NULL,
  `mensaje` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `emisor` tinyint(1) NOT NULL,
  `msj_leido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `id_archivo` int(10) UNSIGNED NOT NULL,
  `fecha_pedido` date NOT NULL,
  `estado_pedido` tinyint(1) NOT NULL DEFAULT '0',
  `recogido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(10) UNSIGNED NOT NULL,
  `nombre_permiso` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_configuraciones` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_usuarios` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_permisos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_fotospr` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_clientes` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_informacion_corporativa` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_redes_sociales` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_proveedores` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_facturacion` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_productos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_medidas_productos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_tipo_contactos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_tipo_productos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_mano_obra` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_contactos_proveedor` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `tbl_equipos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `estado_permiso` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `nombre_producto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `calificacion_promedio` decimal(3,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `descripcion_producto` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_producto` int(10) UNSIGNED NOT NULL,
  `estado_producto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `proveedor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_proveedor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado_proveedor` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(10) UNSIGNED NOT NULL,
  `recurso` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo_recurso` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id_red_social` int(10) UNSIGNED NOT NULL,
  `nombre_red_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_red_social` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `icono_red_social` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado_red` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_contacto`
--

CREATE TABLE `tipos_contacto` (
  `id_tipo_contacto` int(10) UNSIGNED NOT NULL,
  `tipo_contacto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado_tipo_contacto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_producto`
--

CREATE TABLE `tipos_producto` (
  `id_tipo_producto` int(10) UNSIGNED NOT NULL,
  `nombre_tipo_producto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icono_producto` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguno',
  `estado_tipo_producto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clave_usuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo_usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_permiso` int(10) UNSIGNED NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL DEFAULT '1',
  `estado_sesion` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_conversacion` (`id_conversacion`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_medida` (`id_medida`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo_cliente` (`correo_cliente`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id_configuracion`),
  ADD UNIQUE KEY `nombre_configuracion` (`nombre_configuracion`);

--
-- Indices de la tabla `contactos_proveedor`
--
ALTER TABLE `contactos_proveedor`
  ADD PRIMARY KEY (`id_contacto_proveedor`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_tipo_contacto` (`id_tipo_contacto`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id_conversacion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `fotos_productos`
--
ALTER TABLE `fotos_productos`
  ADD PRIMARY KEY (`id_foto_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `mano_obra`
--
ALTER TABLE `mano_obra`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `medidas_producto`
--
ALTER TABLE `medidas_producto`
  ADD PRIMARY KEY (`id_medida`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_conversacion` (`id_conversacion`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_archivo` (`id_archivo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_producto` (`nombre_producto`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD UNIQUE KEY `recurso` (`recurso`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id_red_social`),
  ADD UNIQUE KEY `link_red_social` (`link_red_social`);

--
-- Indices de la tabla `tipos_contacto`
--
ALTER TABLE `tipos_contacto`
  ADD PRIMARY KEY (`id_tipo_contacto`),
  ADD UNIQUE KEY `tipo_contacto` (`tipo_contacto`);

--
-- Indices de la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo_usuario` (`correo_usuario`),
  ADD KEY `id_tipo_usuario` (`id_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id_configuracion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contactos_proveedor`
--
ALTER TABLE `contactos_proveedor`
  MODIFY `id_contacto_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id_conversacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fotos_productos`
--
ALTER TABLE `fotos_productos`
  MODIFY `id_foto_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mano_obra`
--
ALTER TABLE `mano_obra`
  MODIFY `id_actividad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medidas_producto`
--
ALTER TABLE `medidas_producto`
  MODIFY `id_medida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id_red_social` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos_contacto`
--
ALTER TABLE `tipos_contacto`
  MODIFY `id_tipo_contacto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  MODIFY `id_tipo_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `fk_conversaciones_archivos` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`);

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `fk_clientes-carritos` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_medidas-carritos` FOREIGN KEY (`id_medida`) REFERENCES `medidas_producto` (`id_medida`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_clientes-comentarios` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_productos-comentarios` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `contactos_proveedor`
--
ALTER TABLE `contactos_proveedor`
  ADD CONSTRAINT `fk_proveedores_contactos-proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `fk_tipos-contacto_contactos-proveedor` FOREIGN KEY (`id_tipo_contacto`) REFERENCES `tipos_contacto` (`id_tipo_contacto`);

--
-- Filtros para la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD CONSTRAINT `fk_clientes_conversaciones` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `fotos_productos`
--
ALTER TABLE `fotos_productos`
  ADD CONSTRAINT `fk_productos-fotos-productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `medidas_producto`
--
ALTER TABLE `medidas_producto`
  ADD CONSTRAINT `fk_productos_medidas-producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_conversaciones_mensajes` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_archivos_pedidos` FOREIGN KEY (`id_archivo`) REFERENCES `archivos` (`id_archivo`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk-tipo-productos-productos` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipos_producto` (`id_tipo_producto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_permisos_usuarios` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
