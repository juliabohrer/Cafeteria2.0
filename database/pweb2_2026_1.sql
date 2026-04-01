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
	(1, 'Bebidas Geladas', '2', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(2, 'Cafés Gelados', '3', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(3, 'Cafés Quentes', '1', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(4, 'Bebidas Quentes', '1', '2026-04-01 14:14:17', '2026-04-01 14:14:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.funcionarios: ~10 rows (aproximadamente)
INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `endereco`, `horario`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Freddie Heidenreich MD', '849.768.940-00', '8540 Porter Village\nSebastianshire, OK 37965', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(2, 'Emmie Hackett', '328.506.545-36', '140 Retha Dale Apt. 436\nBogisichton, KY 36001', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(3, 'Orion Bradtke', '873.468.661-22', '36972 Jaquan Rapid Suite 632\nRobertomouth, IL 73267-9871', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(4, 'Mark Schmeler', '398.578.459-16', '6935 Reinger Cove\nSashabury, OR 99313', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(5, 'Prof. Arne Beier III', '168.487.445-26', '2396 Christiansen Loop Suite 155\nWest Rustymouth, KS 17456-4314', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(6, 'Aurelio Rogahn', '853.044.486-97', '45114 Stevie Heights\nCassinton, MI 20198-5023', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(7, 'Mellie Dibbert', '571.671.714-30', '4167 Barton Trail Suite 420\nWendellview, KY 88612-7283', '6h-12h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(8, 'Abel Gaylord', '463.377.513-61', '86462 Krystel Haven\nSouth Jalon, AL 84323-6295', '12h-18h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(9, 'Lily Considine', '199.691.586-95', '241 Ernser Via Apt. 973\nNorth Treva, KS 05297-6611', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(10, 'Jacey Hansen', '178.528.019-57', '995 Lind Rest Suite 090\nEast Germanberg, FL 23564-6825', '18h-00h', 'sem_imagem.png', '2026-04-01 14:14:17', '2026-04-01 14:14:17');

-- Copiando estrutura para tabela pweb2_2026_1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_03_11_121610_create_categorias_table', 1),
	(2, '2026_03_11_121620_create_funcionarios_table', 1),
	(3, '2026_03_11_121706_create_produtos_table', 1),
	(4, '2026_03_12_132807_create_pedidos_table', 1),
	(5, '2026_03_18_022055_create_sessions_table', 1);

-- Copiando estrutura para tabela pweb2_2026_1.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produto_id` bigint unsigned DEFAULT NULL,
  `funcionario_id` bigint unsigned DEFAULT NULL,
  `quantidade` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_produto_id_foreign` (`produto_id`),
  KEY `pedidos_funcionario_id_foreign` (`funcionario_id`),
  CONSTRAINT `pedidos_funcionario_id_foreign` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pedidos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.pedidos: ~10 rows (aproximadamente)
INSERT INTO `pedidos` (`id`, `cliente`, `produto_id`, `funcionario_id`, `quantidade`, `total`, `created_at`, `updated_at`) VALUES
	(1, 'Dustin Schumm', 6, 5, 1, 73.01, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(2, 'Ms. Chyna Kris', 7, 6, 2, 74.56, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(3, 'Darlene Hyatt', 8, 7, 1, 45.79, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(4, 'Prof. Ella Abbott', 9, 1, 4, 60.70, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(5, 'Mrs. Vicenta Wuckert IV', 10, 1, 5, 46.42, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(6, 'Lorenza Auer', 6, 3, 4, 54.98, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(7, 'Bernadette Hirthe', 4, 9, 2, 81.82, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(8, 'Marjolaine Dooley Sr.', 7, 9, 4, 94.15, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(9, 'Reuben Jacobs', 3, 1, 2, 70.46, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(10, 'Mr. Brooks Murray Sr.', 7, 2, 3, 55.69, '2026-04-01 14:14:17', '2026-04-01 14:14:17');

-- Copiando estrutura para tabela pweb2_2026_1.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `preco` decimal(8,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela pweb2_2026_1.produtos: ~10 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria_id`, `created_at`, `updated_at`) VALUES
	(1, 'Cappuccino', 'Aut eos harum dolor et.', 12.29, 'sem_imagem.png', 1, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(2, 'Mocha', 'Quos inventore ut eum explicabo.', 14.98, 'sem_imagem.png', 3, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(3, 'Café Gelado', 'Velit labore eos deleniti iure quaerat vitae quia suscipit.', 45.10, 'sem_imagem.png', 4, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(4, 'Café Expresso', 'Et perspiciatis quos voluptatem dolor.', 26.41, 'sem_imagem.png', 2, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(5, 'Chocolate Quente', 'Aut dolor eum sed consequuntur in itaque.', 41.04, 'sem_imagem.png', 1, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(6, 'Café Gelado', 'Recusandae accusantium beatae fugiat similique aut voluptatem.', 36.28, 'sem_imagem.png', 3, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(7, 'Chocolate Quente', 'Eaque aut est reiciendis aut.', 8.37, 'sem_imagem.png', 4, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(8, 'Chocolate Quente', 'Consequuntur voluptatum est sit ex incidunt qui est.', 21.40, 'sem_imagem.png', 1, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(9, 'Café Gelado', 'Maiores in minus rerum quo et ea.', 30.97, 'sem_imagem.png', 3, '2026-04-01 14:14:17', '2026-04-01 14:14:17'),
	(10, 'Mocha', 'Tenetur officia id laudantium.', 48.13, 'sem_imagem.png', 1, '2026-04-01 14:14:17', '2026-04-01 14:14:17');

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

-- Copiando dados para a tabela pweb2_2026_1.sessions: ~2 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('gvHXkXtGxDR5bIAsLvZKfu2pTix56kvj5Tx5ZDAz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVZxbHNIZnRWWWxQWUp4TEtpY3I1TnV0OUhLSTJaNFpIZnNwSmxHeCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mdW5jaW9uYXJpby9jcmVhdGUiO3M6NToicm91dGUiO3M6MTg6ImZ1bmNpb25hcmlvLmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1775043183),
	('qd1JuoeMs5KeeBHAem0VztnrnKj5kGzHuBhNhBlV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUtWc1JEakVqc0RkNFZMN0lNVHh3SDJvVnM0NWdNSjVoeHlHem1NViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdXRvIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdXRvLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775062666);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
