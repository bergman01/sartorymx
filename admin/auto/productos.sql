-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2015 a las 06:46:48
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(100) NOT NULL,
  `modelo_producto` varchar(30) NOT NULL,
  `precio_venta` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5460 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre_producto`, `modelo_producto`, `precio_venta`) VALUES
(2, '002', 'Samsung Galaxy Tab 4', 'SM-T330', 170),
(3, '003', 'SAMSUNG GALAXY TAB', 'GT-P1000', 50),
(4, '004', 'Computadora todo en uno Core I5 6gb 1tb', 'DP700AD', 1000),
(5, '005', 'Laptop Dell Inspiron 17.3 Pulgadas Intel Core I5 8gb 1tb', '17R-5735', 550),
(6, '006', 'Toshiba Satellite  Dvd + - Rw Intel @ 2,58 Ghz 4 Gb 500Gb 15,6', 'C55-B5100', 330),
(7, '007', 'Mouse inalambrico', '', 7),
(8, '008', 'Cargador de BaterÃ­a Para Hp Compaq & Pavilion Laptop', 'CAHP250', 15),
(9, '009', 'Bocinas bluetooth', '', 12),
(10, '010', 'Monitor LCD LED 23"', 'S23C200B', 226),
(11, '011', 'Macbook Pro13.3" Laptop Intel Core I5 4gb 500gb', 'MD101', 950),
(12, '012', 'Impresor matricial 24 pines', 'LQ590', 350),
(13, '013', 'Impresora Matricial-Monocromo', 'LX-350', 235);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`), ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5460;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
