-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2024 a las 18:14:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `activo`) VALUES
(1, 'Gorras', 1),
(2, 'Tennis', 1),
(3, 'Camisetas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `password`) VALUES
(1, 'juanjose', 'felipemira');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `img`, `activo`) VALUES
(6, 'Gorra 5 paneles ', '<p>\r\n?Estilo y Comodidad sin Compromisos?\r\nDiseñada pensando en la comodidad y la moda, esta gorra presenta un ajuste perfecto y una visera curva que te protege del sol. Combina fácilmente con cualquier atuendo, ya sea que estés patinando por la ciudad o disfrutando de un día casual.\r\n</p>\r\n<br>\r\n<br>\r\n<p>\r\n?Variedad de Diseños y Colores?\r\nNuestra colección de gorras de 5 paneles upcycle ofrece una amplia gama de colores y estampados, desde los más llamativos hasta los más sutiles. ¡Encuentra la que se adapte a tu estilo único!\r\n</p>', 50.00, 0, 1, 'assets\\img\\images (2).jfif', 1),
(7, 'Camiseta negra oversize \r\n', '<p>?Estilo y Comodidad sin Compromisos?\r\nDiseñada pensando en la comodidad y la moda, esta gorra presenta un ajuste perfecto y una visera curva que te protege del sol. Combina fácilmente con cualquier atuendo, ya sea que estés patinando por la ciudad o disfrutando de un día casual.</p>\r\n<br>\r\n<br>\r\n<p>\r\n?Variedad de Diseños y Colores?\r\nNuestra colección de gorras de 5 paneles upcycle ofrece una amplia gama de colores y estampados, desde los más llamativos hasta los más sutiles. ¡Encuentra la que se adapte a tu estilo único!</p>', 100.00, 0, 2, 'assets\\img\\esa.jpg', 1),
(8, 'GUCCI LIMITADAS', '<p>Los Tenis Gucci son un símbolo de lujo y estilo. Confeccionados con los más finos materiales y la atención al detalle característica de la marca, estos tenis ofrecen una combinación perfecta de comodidad y sofisticación. Desde sus icónicos estilos hasta sus vibrantes colores y detalles distintivos, los Tenis Gucci son el complemento perfecto para cualquier outfit, ya sea casual o elegante. Eleva tu estilo con el prestigio de Gucci en cada paso que des.\r\n</p>\r\n', 100.00, 0, 3, 'assets\\img\\tenis motato.jpg', 1),
(11, 'COACH BEISBOlERA', '<p>\r\nLa Gorra Coach Beisbolera es un accesorio de moda deportiva y elegante que combina calidad, comodidad y estilo. Fabricada con materiales premium, presenta un diseño clásico de seis paneles con visera curva para un ajuste perfecto. Destaca el distintivo logotipo de Coach bordado en la parte frontal, añadiendo un toque de exclusividad. Ideal para protegerse del sol durante actividades al aire libre o para complementar un look urbano con sofisticación y versatilidad.\r\n</p>\r\n<br>\r\n<br>\r\n<p>\r\n\r\n</p>', 300.00, 0, 1, 'assets\\img\\motato.jpg', 1),
(13, 'LV SHOES SKATER ', '<p>Los Tenis Louis Vuitton Skate Azules son una declaración de estilo y lujo. Confeccionados con la meticulosa artesanía de Louis Vuitton, estos tenis combinan elegancia y comodidad. Su diseño presenta un tono azul vibrante que añade un toque moderno a cualquier conjunto. Perfectos para destacar en la calle o para complementar un look casual con un toque de sofisticación distintivo de la marca.\r\n</p>\r\n<br>\r\n<br>\r\n', 900.00, 0, 3, 'assets\\img\\louis-vuitton-lv-skate-blue-low-top-sneakers-1_1024x1024.webp', 1),
(14, 'OSIRIS D3 LIMITADAS', '<p>Estilo y Comodidad sin Compromisos\r\nDiseñada pensando en la comodidad y la moda, esta gorra presenta un ajuste perfecto y una visera curva que te protege del sol. Combina fácilmente con cualquier atuendo, ya sea que estés patinando por la ciudad o disfrutando de un día casual.\r\n</p>\r\n<br>\r\n<br>\r\n<p>\r\n', 500.00, 0, 3, 'assets\\img\\images (1).jfif', 1),
(18, 'GORRA LA', '<p>\r\nLa Gorra Jordan Beisbolera es un accesorio deportivo esencial para cualquier amante del estilo urbano. Con el icónico logotipo de Jordan bordado en la parte frontal, esta gorra combina perfectamente la cultura del baloncesto con el mundo del béisbol. Su diseño clásico de seis paneles y visera curva ofrece un ajuste cómodo y favorecedor. Perfecta para protegerse del sol durante tus actividades al aire libre o para añadir un toque de sofisticación deportiva a tu estilo diario.\r\n</p>\r\n<br>\r\n<br>\r\n<p>\r\n\r\n</p>', 200.00, 0, 1, 'assets\\img\\60493603_1.png', 1),
(20, 'Camiseta HUGO BOSS\r\n', '\r\nDiseñada pensando en la comodidad y la moda, esta gorra presenta un ajuste perfecto y una visera curva que te protege del sol. Combina fácilmente con cualquier atuendo, ya sea que estés patinando por la ciudad o disfrutando de un día casual.\r\n', 800.00, 0, 2, 'assets\\img\\R.jfif', 1),
(23, 'Camiseta tapout\r\n', '', 120.00, 0, 2, 'assets\\img\\tapout.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
