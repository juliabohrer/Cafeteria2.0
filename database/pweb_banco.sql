-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para pweb2_2026_1
CREATE DATABASE IF NOT EXISTS `pweb2_2026_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pweb2_2026_1`;

-- Copiando estrutura para tabela pweb2_2026_1.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.categorias: ~4 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nome`, `nivel`, `created_at`, `updated_at`) VALUES
	(1, 'Cafés Gelados', '1', '2026-05-08 20:30:18', '2026-05-08 20:30:18'),
	(2, 'Bebidas Quentes', '1', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(3, 'Bebidas Geladas', '1', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(4, 'Cafés Quentes', '2', '2026-05-08 20:30:19', '2026-05-08 20:30:19');

-- Copiando estrutura para tabela pweb2_2026_1.entregas
CREATE TABLE IF NOT EXISTS `entregas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint unsigned NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entregas_pedido_id_unique` (`pedido_id`),
  CONSTRAINT `entregas_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.entregas: ~5 rows (aproximadamente)
INSERT INTO `entregas` (`id`, `pedido_id`, `endereco`, `status`, `created_at`, `updated_at`) VALUES
	(10, 10, '404 Nicolas Court', 'entregue', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(12, 12, 'Bairro Efapi', 'pendente', '2026-05-08 20:45:15', '2026-05-08 20:45:15'),
	(13, 13, 'Bairro Efapi', 'enviado', '2026-05-08 20:45:27', '2026-05-08 20:45:27'),
	(14, 15, 'Bairro Efapi', 'enviado', '2026-05-08 20:45:44', '2026-05-08 20:45:44'),
	(15, 14, 'Bairro Efapi', 'pendente', '2026-05-12 04:59:32', '2026-05-12 04:59:39');

-- Copiando estrutura para tabela pweb2_2026_1.fornecedors
CREATE TABLE IF NOT EXISTS `fornecedors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.fornecedors: ~10 rows (aproximadamente)
INSERT INTO `fornecedors` (`id`, `nome`, `cnpj`, `telefone`, `created_at`, `updated_at`) VALUES
	(1, 'Vandervort and Sons', '34446303054739', '1-951-459-8938', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(2, 'Nitzsche-Champlin', '43146827508105', '1-619-741-4689', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(3, 'Casper-Fisher', '68273262819069', '281.799.9983', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(4, 'Orn Inc', '36577846705728', '+19284632053', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(5, 'Mohr-Schoen', '20992045252493', '(417) 654-2150', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(6, 'Schneider-Kertzmann', '34922829291227', '(515) 470-4632', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(7, 'Blanda-Paucek', '97246364892629', '629.515.5936', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(8, 'Hackett LLC', '45115114510611', '586-906-1303', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(9, 'Heaney, Swaniawski and Price', '54141315084943', '+1-336-948-9407', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(10, 'Nader LLC', '09778967667841', '708-672-6572', '2026-05-08 20:30:19', '2026-05-08 20:30:19');

-- Copiando estrutura para tabela pweb2_2026_1.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.funcionarios: ~3 rows (aproximadamente)
INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `endereco`, `horario`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Mr. Fern Kuhlman III', '681.386.413-04', '6951 Marks Ramp\nEast Charityville, MT 78263-5909', '18h-00h', 'sem_imagem.png', '2026-05-08 20:30:19', '2026-05-08 20:30:19'),
	(11, 'Virginia Fonseca', '0000000000', 'Bairro São Pedro', '9h-12h', 'imagem/funcionario/20260508391722.jpeg', '2026-05-08 20:39:22', '2026-05-08 20:39:22'),
	(12, 'Ana Castelaa', '880.244.635-90', 'Bairro Efapi', '12h-18h', 'imagem/funcionario/20260508391755.jpeg', '2026-05-08 20:39:45', '2026-05-12 04:55:09');

-- Copiando estrutura para tabela pweb2_2026_1.item_pedidos
CREATE TABLE IF NOT EXISTS `item_pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint unsigned NOT NULL,
  `produto_id` bigint unsigned DEFAULT NULL,
  `quantidade` decimal(8,2) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_pedidos_pedido_id_foreign` (`pedido_id`),
  KEY `item_pedidos_produto_id_foreign` (`produto_id`),
  CONSTRAINT `item_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `item_pedidos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.item_pedidos: ~13 rows (aproximadamente)
INSERT INTO `item_pedidos` (`id`, `pedido_id`, `produto_id`, `quantidade`, `valor_unitario`, `subtotal`, `created_at`, `updated_at`) VALUES
	(24, 10, 7, 4.00, 30.99, 123.96, '2026-05-08 20:43:23', '2026-05-08 20:43:23'),
	(25, 10, 4, 4.00, 46.14, 184.56, '2026-05-08 20:43:23', '2026-05-08 20:43:23'),
	(26, 12, 9, 4.00, 17.97, 71.88, '2026-05-08 20:43:46', '2026-05-08 20:43:46'),
	(27, 12, 7, 1.00, 30.99, 30.99, '2026-05-08 20:43:46', '2026-05-08 20:43:46'),
	(28, 13, 3, 1.00, 36.93, 36.93, '2026-05-08 20:44:01', '2026-05-08 20:44:01'),
	(29, 13, 7, 1.00, 30.99, 30.99, '2026-05-08 20:44:01', '2026-05-08 20:44:01'),
	(30, 14, 3, 1.00, 36.93, 36.93, '2026-05-08 20:44:18', '2026-05-08 20:44:18'),
	(31, 14, 2, 3.00, 20.25, 60.75, '2026-05-08 20:44:18', '2026-05-08 20:44:18'),
	(32, 15, 9, 1.00, 17.97, 17.97, '2026-05-08 20:44:39', '2026-05-08 20:44:39'),
	(33, 15, 4, 1.00, 46.14, 46.14, '2026-05-08 20:44:39', '2026-05-08 20:44:39'),
	(34, 15, 3, 1.00, 36.93, 36.93, '2026-05-08 20:44:39', '2026-05-08 20:44:39'),
	(39, 17, 9, 1.00, 17.97, 17.97, '2026-05-12 05:00:06', '2026-05-12 05:00:06'),
	(40, 17, 3, 1.00, 36.93, 36.93, '2026-05-12 05:00:06', '2026-05-12 05:00:06');

-- Copiando estrutura para tabela pweb2_2026_1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.migrations: ~8 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_03_11_121610_create_categorias_table', 1),
	(2, '2026_03_11_121620_create_funcionarios_table', 1),
	(3, '2026_03_11_121700_create_fornecedors_table', 1),
	(4, '2026_03_11_121706_create_produtos_table', 1),
	(5, '2026_03_12_132807_create_pedidos_table', 1),
	(6, '2026_03_18_022055_create_sessions_table', 1),
	(7, '2026_04_29_193555_create_item_pedidos_table', 1),
	(8, '2026_05_06_161842_create_entregas_table', 1);

-- Copiando estrutura para tabela pweb2_2026_1.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcionario_id` bigint unsigned DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_funcionario_id_foreign` (`funcionario_id`),
  CONSTRAINT `pedidos_funcionario_id_foreign` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.pedidos: ~6 rows (aproximadamente)
INSERT INTO `pedidos` (`id`, `cliente`, `funcionario_id`, `total`, `created_at`, `updated_at`) VALUES
	(10, 'Kylee Hudson', 1, 308.52, '2026-05-08 20:30:19', '2026-05-08 20:43:23'),
	(12, 'Gabriéli Barcelos', 11, 102.87, '2026-05-08 20:43:46', '2026-05-08 20:43:46'),
	(13, 'Heloisa Ribeiro', 1, 67.92, '2026-05-08 20:44:01', '2026-05-08 20:44:01'),
	(14, 'Ana Laura Quinott', 12, 97.68, '2026-05-08 20:44:18', '2026-05-08 20:44:18'),
	(15, 'Heloisa Pacazza', 1, 101.04, '2026-05-08 20:44:39', '2026-05-08 20:44:39'),
	(17, 'teste', 12, 54.90, '2026-05-12 05:00:06', '2026-05-12 05:00:06');

-- Copiando estrutura para tabela pweb2_2026_1.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `preco` decimal(8,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `fornecedor_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`),
  KEY `produtos_fornecedor_id_foreign` (`fornecedor_id`),
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `produtos_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedors` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.produtos: ~5 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria_id`, `fornecedor_id`, `created_at`, `updated_at`) VALUES
	(2, 'Mocha', 'Temporibus laborum nostrum omnis asperiores et.', 20.25, 'sem_imagem.png', 3, 1, '2026-05-08 20:30:19', '2026-05-12 04:55:52'),
	(3, 'Aguaa', 'Quia aut officiis quis deserunt.', 36.93, 'imagem/produto/20260508411744.png', 3, 4, '2026-05-08 20:30:19', '2026-05-12 04:56:00'),
	(4, 'Café Expresso', 'Temporibus velit beatae odio quis quia officia libero.', 46.14, 'imagem/produto/20260508411718.jpg', 4, 8, '2026-05-08 20:30:19', '2026-05-08 20:41:18'),
	(7, 'Chocolate Quente', 'Qui laborum debitis corporis qui dolor.', 30.99, 'imagem/produto/20260508411701.png', 4, 4, '2026-05-08 20:30:19', '2026-05-08 20:41:01'),
	(9, 'Affogato', 'Quod sed sint quisquam.', 17.97, 'imagem/produto/20260508401746.jpg', 3, 2, '2026-05-08 20:30:19', '2026-05-08 20:40:46');

-- Copiando estrutura para tabela pweb2_2026_1.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.sessions: ~4 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('4Gy6uazHNOvBhXJgbju2lpg3nPQhlWOabk4a8Nta', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.119.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUR4TnVJQURnbFladVllTVJtWEJ5cmdaWnRMWHdSU3Y4NlZqeHB1UyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778550816),
	('8SMxTuvPhzaAaVQPqRKJIUqi2Pu0Uj1Ah0bcZLC8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEh0VXB2cDFaYTkxS2J3SkFTbEpHMzdVOVdHR210NE85Q0hIU01CcyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZWRpZG8vY3JlYXRlIjtzOjU6InJvdXRlIjtzOjEzOiJwZWRpZG8uY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778264073),
	('QkYEcNTJ4LE9xUSxbHD3fMKS45cO30bGfnaS9dc1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.119.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHNrbDhjQ2x4UHRjR29sNkc1eEMxcko3NzhUWmp1b0g1ZXZlTXk3diI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778261427),
	('t477Huxfr4mTsKata1yBz1hAn6lA8CKdipkHjshh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3g5QkRqZlZqV0RTZjZNbllEZXVWNkRHdm1rV0FPa0xYbm1TdWVqRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbnRyZWdhIjtzOjU6InJvdXRlIjtzOjEzOiJlbnRyZWdhLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778551241);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
