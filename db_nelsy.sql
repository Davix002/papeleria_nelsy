
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-5:00";

CREATE TABLE `productos` (
  `id` int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `producto` varchar(255) NOT NULL,
  `costo_compra` DECIMAL (9,2) NOT NULL,
  `precio_unidad` int(9) NOT NULL,
  `precio_por_mayor` int(9) NOT NULL,
  `existencias` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
);

