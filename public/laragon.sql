-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para colegio
CREATE DATABASE IF NOT EXISTS `colegio` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `colegio`;

-- Volcando estructura para tabla colegio.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ALUMNO_RUT` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_NOMBRES` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_AP_PATERNO` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_AP_MATERNO` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_EMAIL` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_FEC_NAC` date NOT NULL,
  `ALUMNO_DOMICILIO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CIUDAD_ID` bigint(20) unsigned NOT NULL,
  `ALUMNO_FONO_CEL` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_FONO_FIJO` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ALUMNO_SEXO` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALUMNO_IMG` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ALUMNO_INGRESO` date NOT NULL,
  `ALUMNO_RETIRO` date DEFAULT NULL,
  `ALUMNO_PASSWORD` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PREVISION_ID` bigint(20) unsigned NOT NULL,
  `SANGRE_ID` bigint(20) unsigned NOT NULL,
  `ALUMNO_FLAG` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla colegio.alumnos: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id`, `ALUMNO_RUT`, `ALUMNO_NOMBRES`, `ALUMNO_AP_PATERNO`, `ALUMNO_AP_MATERNO`, `ALUMNO_EMAIL`, `ALUMNO_FEC_NAC`, `ALUMNO_DOMICILIO`, `CIUDAD_ID`, `ALUMNO_FONO_CEL`, `ALUMNO_FONO_FIJO`, `ALUMNO_SEXO`, `ALUMNO_IMG`, `ALUMNO_INGRESO`, `ALUMNO_RETIRO`, `ALUMNO_PASSWORD`, `PREVISION_ID`, `SANGRE_ID`, `ALUMNO_FLAG`, `created_at`, `updated_at`) VALUES
	(1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 0, '2020-10-17 18:42:56', '2020-10-17 18:42:56'),
	(2, '133578749', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 0, '2020-10-17 19:07:38', '2020-10-17 19:07:38'),
	(3, '133578749', 'ÑANDÚ\'S NOMBRE', 'ÑANDÚ\'S PATERNO', 'ÑANDÚ\'S MATERNO', 'MANUEL2112@HOTMAIL.COM', '1978-09-30', 'ÑANDÚ\'S NOMBRE', 28, '+56942194756', NULL, 'M', 'public/yi0etWP0rfpOw3mBc3n6gggDJmSDph6KuokfZcAI.jpeg', '1978-09-30', NULL, 'ñandú\'s nombre', 1, 10, 1, '2020-10-17 19:11:26', '2020-10-26 19:58:44'),
	(4, '133578749', 'ÑANDÚ\'S NOMBRE', 'ÑANDÚ\'S PATERNO', 'ÑANDÚ\'S MATERNO', 'MANUEL2112@HOTMAIL.COM', '1978-09-30', 'ÑANDÚ\'S NOMBRE', 28, '+56942194756', NULL, 'M', 'public/aAylyVJj4HMRijk2dUpc8H2Bm5YMdS7I92hRy4i9.jpeg', '1978-09-30', NULL, 'ñandú\'s nombre', 1, 7, 1, '2020-10-17 19:11:55', '2020-10-26 20:01:46'),
	(5, '133578749', 'ÑANDÚ\'S NOMBRE', 'ÑANDÚ\'S PATERNO', 'ÑANDÚ\'S MATERNO', 'MANUEL2112@HOTMAIL.COM', '1978-09-30', 'ÑANDÚ\'S NOMBRE', 27, '+56942194756', NULL, 'M', 'public/v6kPRPWrAVilhS4HRWTSPVBBu9lLLEwP0tD8PKRs.png', '1978-09-30', NULL, 'ñandú\'s nombre', 1, 7, 1, '2020-10-17 19:13:07', '2020-10-26 20:11:12'),
	(6, '12.345.678-5', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 1, '2020-10-17 19:13:28', '2020-10-17 19:13:28'),
	(7, '13.357.874-9', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 1, '2020-10-17 19:14:29', '2020-10-17 19:14:29'),
	(8, '5.553.278-8', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 1, '2020-10-17 19:15:19', '2020-10-17 19:15:19'),
	(9, '05.553.278-8', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 1, '2020-10-17 19:21:42', '2020-10-17 19:21:42'),
	(10, '13.357.874-9', 'ñandú\'s nombre', 'ñandú\'s paterno', 'ñandú\'s materno', 'manuel2112@hotmail.com', '1978-09-30', 'ñandú\'s nombre', 1, 'ñandú\'s nombre', 'ñandú\'s nombre', 'M', NULL, '1978-09-30', NULL, 'ñandú\'s nombre', 1, 1, 1, '2020-10-17 19:22:02', '2020-10-17 19:22:02'),
	(11, '13.357.874-9', 'manuel alejandro', 'vargas', 'zenteno', 'manuel2112@hotmail.com', '1978-09-30', 'manuel alejandro', 1, 'manuel alejandro', 'manuel alejandro', 'M', NULL, '1978-09-30', NULL, 'manuel alejandro', 1, 1, 1, '2020-10-21 14:50:15', '2020-10-21 14:50:15'),
	(12, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENOÀÈÌÒÙIÙ`Ñ', 'MANUEL2112@HOTMAIL.COM', '2020-10-21', 'manuel alejandro', 1, 'manuel alejandro', 'manuel alejandro', 'M', NULL, '1978-09-30', NULL, 'manuel alejandro', 1, 1, 1, '2020-10-21 14:52:02', '2020-10-21 14:52:02'),
	(13, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-10-07', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 1, 'MANUEL ALEJANDRO', 'MANUEL ALEJANDRO', 'M', NULL, '1978-09-30', NULL, 'MANUEL ALEJANDRO', 1, 1, 1, '2020-10-21 15:04:44', '2020-10-21 15:04:44'),
	(14, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENOÀÈÌÒÙIÙ`Ñ', 'MANUEL2112@HOTMAIL.COM', '2020-09-30', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 19, 'MANUEL ALEJANDRO', 'MANUEL ALEJANDRO', 'M', NULL, '1978-09-30', NULL, 'MANUEL ALEJANDRO', 1, 1, 1, '2020-10-21 15:25:08', '2020-10-21 15:25:08'),
	(15, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-09-30', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 19, '+56942194756', 'MANUEL ALEJANDRO', 'M', NULL, '1978-09-30', NULL, 'MANUEL ALEJANDRO', 1, 1, 1, '2020-10-21 17:33:08', '2020-10-21 17:33:08'),
	(16, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-10-06', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 28, '+56942194756', NULL, 'M', NULL, '1978-09-30', NULL, 'MANUEL ALEJANDRO', 1, 1, 1, '2020-10-21 17:46:09', '2020-10-21 17:46:09'),
	(17, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-10-21', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 20, '+56942194756', '32944804', 'M', NULL, '1978-09-30', NULL, 'MANUEL ALEJANDRO', 1, 1, 1, '2020-10-21 17:48:03', '2020-10-21 17:48:03'),
	(18, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-10-06', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 24, '+56942194756', NULL, 'F', NULL, '1978-09-30', NULL, 'MANUEL ALEJANDRO', 1, 1, 1, '2020-10-21 18:10:19', '2020-10-21 18:10:19'),
	(19, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENOÀÈÌÒÙIÙ`Ñ', 'MANUEL2112@HOTMAIL.COM', '2020-10-01', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 28, '+56942194756', NULL, 'M', NULL, '2020-10-01', NULL, '2020-10-21', 1, 9, 1, '2020-10-21 18:19:36', '2020-10-26 19:36:54'),
	(20, '13.357.874-9', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-10-07', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 19, '+56942194756', NULL, 'F', 'public/F2OM1HZ4STUmX6k4LVngLfO1tPm3XKrF2dfgEjnQ.png', '2020-10-07', NULL, '3573738492c56a24200363655439db1c', 1, 4, 1, '2020-10-21 18:23:31', '2020-10-26 19:30:08'),
	(21, '13.357.874-9', 'MANUEL ALEJANDRO EDIT', 'VARGAS EDIT', 'ZENTENO EDIT', 'MANUEL21122@HOTMAIL.COM', '1978-09-30', 'RAMÒN ANGEL JARA 579 BELLOTO EDIT', 19, '+56942194756', NULL, 'F', 'public/dN0zd6JTFUCepfkMM1KYAIqJBgEMIBrt9uzFZijV.jpeg', '2020-10-23', NULL, '4240bbf451924068e9d99f4d19be99bb', 4, 5, 1, '2020-10-21 18:39:17', '2020-10-26 19:29:43'),
	(22, '22.222.222-2', 'MANUEL ALEJANDRO', 'VARGAS', 'ZENTENO', 'MANUEL2112@HOTMAIL.COM', '2020-10-01', 'RAMÒN ANGEL JARA 579 BELLOTO ÀÈÌÒÙÑÑ', 28, '+56942194756', '942194756', 'M', 'public/sLKAyWg7pkectt15WkaCFjCzrUUAVB4j1W91ZGWG.jpeg', '2020-10-01', NULL, 'f61f253cd8dd4718dd2e166fb0a0b82c', 6, 8, 1, '2020-10-26 18:50:30', '2020-10-26 19:19:44');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.alumno_apoderado
CREATE TABLE IF NOT EXISTS `alumno_apoderado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_ALUMNO` bigint(20) NOT NULL,
  `ID_APODERADO` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.alumno_apoderado: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `alumno_apoderado` DISABLE KEYS */;
INSERT INTO `alumno_apoderado` (`id`, `ID_ALUMNO`, `ID_APODERADO`, `created_at`, `updated_at`) VALUES
	(1, 14, 8, '2020-11-02 18:38:48', '2020-11-02 18:38:48'),
	(2, 3, 8, '2020-11-02 19:00:42', '2020-11-02 19:00:42'),
	(3, 13, 8, '2020-11-02 19:01:01', '2020-11-02 19:01:01'),
	(5, 8, 8, '2020-11-03 14:00:41', '2020-11-03 14:00:41');
/*!40000 ALTER TABLE `alumno_apoderado` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.apoderado
CREATE TABLE IF NOT EXISTS `apoderado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `APODERADO_RUT` char(16) NOT NULL,
  `APODERADO_NOMBRES` char(64) NOT NULL,
  `APODERADO_AP_PATERNO` char(64) NOT NULL,
  `APODERADO_AP_MATERNO` char(64) NOT NULL,
  `TIPO_APODERADO_ID` bigint(20) NOT NULL,
  `APODERADO_FEC_NAC` date DEFAULT NULL,
  `APODERADO_DOMICILIO` char(255) NOT NULL,
  `CIUDAD_ID` bigint(20) NOT NULL,
  `APODERADO_EMAIL` char(128) DEFAULT NULL,
  `APODERADO_FONO_CEL` char(16) NOT NULL,
  `APODERADO_FONO_FIJO` char(16) DEFAULT NULL,
  `APODERADO_TRABAJO` char(128) DEFAULT NULL,
  `APODERADO_FONO_TRABAJO` char(16) DEFAULT NULL,
  `APODERADO_IMG` char(128) DEFAULT NULL,
  `APODERADO_EX_ALUMNO` tinyint(1) DEFAULT '0',
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `APODERADO_FLAG` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.apoderado: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `apoderado` DISABLE KEYS */;
INSERT INTO `apoderado` (`id`, `APODERADO_RUT`, `APODERADO_NOMBRES`, `APODERADO_AP_PATERNO`, `APODERADO_AP_MATERNO`, `TIPO_APODERADO_ID`, `APODERADO_FEC_NAC`, `APODERADO_DOMICILIO`, `CIUDAD_ID`, `APODERADO_EMAIL`, `APODERADO_FONO_CEL`, `APODERADO_FONO_FIJO`, `APODERADO_TRABAJO`, `APODERADO_FONO_TRABAJO`, `APODERADO_IMG`, `APODERADO_EX_ALUMNO`, `updated_at`, `created_at`, `APODERADO_FLAG`) VALUES
	(1, '13.357.874-9', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '1978-09-30', 'RAMON ANGEL JARA 579', 20, 'manuel2112@hotmail.com', '+56942194756', '333333333', 'casa', '942194756', 'public/4BicOif65JWrzL8nsW2swoNdNH8FH7T82yWyFnEC.png', 1, '2020-10-30 20:43:23', '2020-10-30 18:26:24', 1),
	(2, '11.111.111-1', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-01', 'RAMON ANGEL JARA 579', 28, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, 'public/zUw2wZPJEQRUCxMPK4AOck2xfm1n8tkKgT5fJkKb.png', 0, '2020-10-30 19:24:54', '2020-10-30 18:29:11', 1),
	(3, '22.222.222-2', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-08', 'RAMON ANGEL JARA 579', 19, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, NULL, 1, '2020-10-30 18:32:28', '2020-10-30 18:32:28', 1),
	(4, '33.333.333-3', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-09', 'RAMON ANGEL JARA 579', 24, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, 'public/1qlldPESu1s3wVwU3nD391OKOwlN1D3tYL81U5wx.png', 0, '2020-10-30 18:37:15', '2020-10-30 18:37:15', 1),
	(5, '07.153.278-K', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-16', 'RAMON ANGEL JARA 579', 20, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, '', 0, '2020-10-30 18:38:17', '2020-10-30 18:38:17', 1),
	(6, '44.444.444-4', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-15', 'RAMON ANGEL JARA 579', 19, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, '', 0, '2020-10-30 18:39:14', '2020-10-30 18:39:14', 1),
	(7, '55.555.555-5', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-15', 'RAMON ANGEL JARA 579', 19, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, NULL, 0, '2020-10-30 18:40:03', '2020-10-30 18:40:03', 0),
	(8, '66.666.666-6', 'MANUEL', 'VARGAS', 'ZENTENO', 4, '2020-10-17', 'RAMON ANGEL JARA 579', 20, 'manuel2112@hotmail.com', '+56942194756', NULL, NULL, NULL, 'public/nJdlJSZzwMO2vy7ffor54e403ARbzdXGyTSM4alq.png', 1, '2020-10-30 18:41:29', '2020-10-30 18:41:29', 1);
/*!40000 ALTER TABLE `apoderado` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.ciudad
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CIUDAD_NOMBRE` varchar(64) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `CIUDAD_FLAG` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.ciudad: ~29 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` (`id`, `CIUDAD_NOMBRE`, `updated_at`, `created_at`, `CIUDAD_FLAG`) VALUES
	(1, 'BELLOTO', '2020-10-18 20:58:44', '2020-10-18 15:54:25', 0),
	(2, 'QUILPUé', '2020-10-18 15:55:42', '2020-10-18 15:55:42', 0),
	(3, 'QUILPUÉ', '2020-10-18 15:56:13', '2020-10-18 15:56:13', 0),
	(4, 'QUILPUE', '2020-10-18 16:45:16', '2020-10-18 16:45:16', 0),
	(5, 'VIÑA', '2020-10-18 16:47:10', '2020-10-18 16:47:10', 0),
	(6, 'VALPO', '2020-10-18 16:47:59', '2020-10-18 16:47:59', 0),
	(7, 'CONCON', '2020-10-18 16:48:42', '2020-10-18 16:48:42', 0),
	(8, 'CONCON', '2020-10-18 16:48:48', '2020-10-18 16:48:48', 0),
	(9, 'QUILPUEX2X', '2020-10-18 22:42:49', '2020-10-18 16:51:45', 0),
	(10, 'QUILPUEX2', '2020-10-18 22:41:33', '2020-10-18 17:08:24', 0),
	(11, 'QUILPUEX2', '2020-10-18 17:08:46', '2020-10-18 17:08:46', 0),
	(12, 'VIÑA DEL MAR', '2020-10-18 17:10:12', '2020-10-18 17:10:12', 0),
	(13, 'SANTIAGO', '2020-10-18 18:17:54', '2020-10-18 18:17:54', 0),
	(14, 'VALDIVIA', '2020-10-18 18:19:13', '2020-10-18 18:19:13', 0),
	(15, 'ÑANDÚ\'S', '2020-10-18 18:20:13', '2020-10-18 18:20:13', 0),
	(16, 'PANCHITO', '2020-10-18 18:21:24', '2020-10-18 18:21:24', 0),
	(17, 'PAPIPA', '2020-10-18 18:21:45', '2020-10-18 18:21:45', 0),
	(18, 'QUINTERO', '2020-10-18 21:21:57', '2020-10-18 21:21:57', 0),
	(19, 'QUILPUÉ', '2020-10-27 14:58:29', '2020-10-19 00:02:12', 1),
	(20, 'VIÑA DEL MAR', '2020-10-19 00:06:50', '2020-10-19 00:02:19', 1),
	(21, 'A', '2020-10-19 00:02:26', '2020-10-19 00:02:26', 0),
	(22, 'B', '2020-10-19 00:02:33', '2020-10-19 00:02:33', 0),
	(23, 'C', '2020-10-19 00:02:39', '2020-10-19 00:02:39', 0),
	(24, 'VILLA ALEMANA', '2020-10-19 00:06:41', '2020-10-19 00:02:44', 1),
	(25, 'XXXX', '2020-10-19 00:07:06', '2020-10-19 00:07:06', 0),
	(26, 'XXX', '2020-10-19 00:09:28', '2020-10-19 00:09:28', 0),
	(27, 'VALPARAÍSO', '2020-10-19 00:13:49', '2020-10-19 00:13:49', 1),
	(28, 'CONCON', '2020-10-19 00:14:00', '2020-10-19 00:14:00', 1),
	(29, 'XXX', '2020-10-19 00:20:07', '2020-10-19 00:20:07', 0);
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.colegio
CREATE TABLE IF NOT EXISTS `colegio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COLEGIO_NOMBRE` varchar(64) NOT NULL,
  `COLEGIO_DIRECCION` varchar(128) NOT NULL,
  `CIUDAD_ID` bigint(20) NOT NULL,
  `COLEGIO_FONO_FIJO` char(16) DEFAULT NULL,
  `COLEGIO_FONO_CEL` char(16) DEFAULT NULL,
  `COLEGIO_EMAIL` char(128) DEFAULT NULL,
  `COLEGIO_LOGO` varchar(128) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.colegio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `colegio` DISABLE KEYS */;
INSERT INTO `colegio` (`id`, `COLEGIO_NOMBRE`, `COLEGIO_DIRECCION`, `CIUDAD_ID`, `COLEGIO_FONO_FIJO`, `COLEGIO_FONO_CEL`, `COLEGIO_EMAIL`, `COLEGIO_LOGO`, `updated_at`, `created_at`) VALUES
	(1, 'COLEGIO ÑANDÚ\'S', 'ÑANDÚ\'S DIRECCION', 19, NULL, NULL, 'COLEGIO@COLE.CL', 'public/XSqJIk7GiHR59PhSu1lmpZ5iNooGjn60wqgPzTyT.png', '2020-10-27 14:58:13', '2020-10-27 14:47:46');
/*!40000 ALTER TABLE `colegio` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla colegio.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2020_10_16_145726_create_alumnos_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.prevision
CREATE TABLE IF NOT EXISTS `prevision` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `PREVISION_NOMBRE` varchar(64) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `PREVISION_FLAG` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.prevision: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `prevision` DISABLE KEYS */;
INSERT INTO `prevision` (`id`, `PREVISION_NOMBRE`, `updated_at`, `created_at`, `PREVISION_FLAG`) VALUES
	(1, 'FONASA', '2020-10-19 17:49:30', '2020-10-19 17:49:30', 1),
	(2, 'CONSALUD', '2020-10-19 17:56:42', '2020-10-19 17:56:42', 1),
	(3, 'BANMÉDICA', '2020-10-19 17:56:52', '2020-10-19 17:56:52', 1),
	(4, 'DIPRECA', '2020-10-19 17:57:00', '2020-10-19 17:57:00', 1),
	(5, 'CAPREDENA', '2020-10-19 17:57:08', '2020-10-19 17:57:08', 1),
	(6, 'CRUZ BLANCA', '2020-10-20 12:40:53', '2020-10-19 17:57:16', 1),
	(7, 'XXXX', '2020-10-19 17:57:21', '2020-10-19 17:57:21', 0),
	(8, 'MASVIDA', '2020-10-19 18:07:46', '2020-10-19 17:57:28', 1),
	(9, 'VIDA TRES', '2020-10-19 18:08:12', '2020-10-19 17:57:32', 1),
	(10, 'C', '2020-10-19 17:57:37', '2020-10-19 17:57:37', 0),
	(11, 'XXX', '2020-10-19 18:19:52', '2020-10-19 18:19:52', 0);
/*!40000 ALTER TABLE `prevision` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.tipoapoderado
CREATE TABLE IF NOT EXISTS `tipoapoderado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `TIPO_APODERADO_NOMBRE` char(50) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `TIPO_APODERADO_FLAG` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.tipoapoderado: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoapoderado` DISABLE KEYS */;
INSERT INTO `tipoapoderado` (`id`, `TIPO_APODERADO_NOMBRE`, `updated_at`, `created_at`, `TIPO_APODERADO_FLAG`) VALUES
	(1, 'MADRE', '2020-10-29 18:43:44', '2020-10-29 18:34:26', 1),
	(2, 'PADRE', '2020-10-29 18:43:29', '2020-10-29 18:34:48', 1),
	(3, 'ÑANDÚ\'S', '2020-10-29 18:44:35', '2020-10-29 18:44:35', 0),
	(4, 'TÍ@', '2020-10-29 18:48:27', '2020-10-29 18:48:27', 1),
	(5, 'ABUEL@', '2020-10-29 18:48:42', '2020-10-29 18:48:42', 1),
	(6, 'TUTOR(A)', '2020-10-29 18:58:09', '2020-10-29 18:58:09', 1),
	(7, 'SOSTENEDOR(A)', '2020-10-29 18:58:22', '2020-10-29 18:58:22', 1);
/*!40000 ALTER TABLE `tipoapoderado` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.tiposangre
CREATE TABLE IF NOT EXISTS `tiposangre` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `TIPO_SANGRE_NOMBRE` varchar(64) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `TIPO_SANGRE_FLAG` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla colegio.tiposangre: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tiposangre` DISABLE KEYS */;
INSERT INTO `tiposangre` (`id`, `TIPO_SANGRE_NOMBRE`, `updated_at`, `created_at`, `TIPO_SANGRE_FLAG`) VALUES
	(1, 'XX', '2020-10-19 19:31:26', '2020-10-19 19:31:26', 0),
	(2, 'ÑANDÚ\'S', '2020-10-20 12:35:41', '2020-10-20 12:19:39', 0),
	(3, 'O NEGATIVO', '2020-10-20 12:36:11', '2020-10-20 12:36:11', 1),
	(4, 'O POSITIVO', '2020-10-20 12:36:26', '2020-10-20 12:36:26', 1),
	(5, 'A NEGATIVO', '2020-10-20 12:36:36', '2020-10-20 12:36:36', 1),
	(6, 'A POSITIVO', '2020-10-20 12:36:46', '2020-10-20 12:36:46', 1),
	(7, 'B NEGATIVO', '2020-10-20 12:36:59', '2020-10-20 12:36:59', 1),
	(8, 'B POSITIVO', '2020-10-20 12:37:08', '2020-10-20 12:37:08', 1),
	(9, 'AB NEGATIVO', '2020-10-20 12:37:18', '2020-10-20 12:37:18', 1),
	(10, 'AB POSITIVO', '2020-10-20 12:37:27', '2020-10-20 12:37:27', 1),
	(11, 'XX', '2020-10-29 18:46:55', '2020-10-29 18:46:55', 0);
/*!40000 ALTER TABLE `tiposangre` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
