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

-- Copiando estrutura para tabela buscapet.atualizacaos
CREATE TABLE IF NOT EXISTS `atualizacaos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_id` bigint unsigned NOT NULL,
  `dono_id` bigint unsigned NOT NULL,
  `perdido_id` bigint unsigned NOT NULL,
  `data_atualizacao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atualizacaos_status_id_foreign` (`status_id`),
  KEY `atualizacaos_dono_id_foreign` (`dono_id`),
  KEY `atualizacaos_perdido_id_foreign` (`perdido_id`),
  CONSTRAINT `atualizacaos_dono_id_foreign` FOREIGN KEY (`dono_id`) REFERENCES `donos` (`id`),
  CONSTRAINT `atualizacaos_perdido_id_foreign` FOREIGN KEY (`perdido_id`) REFERENCES `perdidos` (`id`),
  CONSTRAINT `atualizacaos_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuss` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.atualizacaos: ~2 rows (aproximadamente)
INSERT INTO `atualizacaos` (`id`, `status_id`, `dono_id`, `perdido_id`, `data_atualizacao`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 3, '1996-12-17', '2024-08-30 16:13:34', '2024-08-30 16:13:34'),
	(2, 1, 1, 2, '1971-06-05', '2024-08-30 16:13:34', '2024-08-30 16:13:34');

-- Copiando estrutura para tabela buscapet.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.categorias: ~3 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Fêmea', '2024-08-30 16:13:34', '2024-08-30 16:13:34'),
	(2, 'Macho', '2024-08-30 16:13:34', '2024-08-30 16:13:34'),
	(3, 'Indefinido', '2024-08-30 16:13:34', '2024-08-30 16:13:34');

-- Copiando estrutura para tabela buscapet.cuidados
CREATE TABLE IF NOT EXISTS `cuidados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.cuidados: ~2 rows (aproximadamente)
INSERT INTO `cuidados` (`id`, `titulo`, `descricao`, `valor`, `created_at`, `updated_at`) VALUES
	(1, 'Como saber se ele está bem', 'Gatinhos e Doguinhos com o fucinho molhado são fortes indícios de que está bem', 'Não custará nada!', '2024-08-30 16:13:34', '2024-08-30 16:13:34'),
	(2, 'Carinho no Gato', 'Gatos gostam de carinho embaixo do pescoço', 'Não custará nada!', '2024-08-30 16:13:34', '2024-08-30 16:13:34');

-- Copiando estrutura para tabela buscapet.doacaos
CREATE TABLE IF NOT EXISTS `doacaos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raca` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caracteristicas` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historia` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saude` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacao` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsavel` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.doacaos: ~2 rows (aproximadamente)
INSERT INTO `doacaos` (`id`, `nome`, `idade`, `raca`, `sexo`, `caracteristicas`, `historia`, `saude`, `observacao`, `responsavel`, `telefone`, `created_at`, `updated_at`, `imagem`) VALUES
	(1, 'Pintadinho', '1 anos', 'Vira-Lata', 'Macho', 'Cachorro branco, com manchas pretas', 'Foi abandonado em uma rua, resgatei mas não posso ficar', 'Ótima, já foi vacinado', 'Ele é super dócil e carente', 'Arthur Lima', '+55 49 94444-3333', '2024-08-30 16:13:34', '2024-08-30 16:13:34', NULL),
	(2, 'Baleia', '5 anos', 'Vira-Lata', 'Fêmea', 'Cachorro caramelo, bem magrinha', 'Foi resgatada de uma casa onde sofria maus tratos', 'Frágil, vacinada mas precisa de cuidados', 'Ele é super dócil, mas tem muito medo', 'Instituto Ajuda', '+55 49 94444-2222', '2024-08-30 16:13:34', '2024-08-30 16:13:34', NULL);

-- Copiando estrutura para tabela buscapet.donos
CREATE TABLE IF NOT EXISTS `donos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.donos: ~2 rows (aproximadamente)
INSERT INTO `donos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Sim', '2024-08-30 16:13:34', '2024-08-30 16:13:34'),
	(2, 'Não', '2024-08-30 16:13:34', '2024-08-30 16:13:34');

-- Copiando estrutura para tabela buscapet.encontrados
CREATE TABLE IF NOT EXISTS `encontrados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `caracteristicas` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saude` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.encontrados: ~2 rows (aproximadamente)
INSERT INTO `encontrados` (`id`, `caracteristicas`, `saude`, `telefone`, `created_at`, `updated_at`, `imagem`) VALUES
	(1, 'Cachorro vira-lata macho, de cores preta e branca', 'Bom estado', '+55 49 91111-1111', '2024-08-30 16:13:34', '2024-08-30 16:13:34', NULL),
	(2, 'Gato macho, de cor preta', 'Bom estado, mas parece estar com a pata machucada', '+55 49 92222-1111', '2024-08-30 16:13:34', '2024-08-30 16:13:34', NULL);

-- Copiando estrutura para tabela buscapet.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela buscapet.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.migrations: ~16 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_02_21_192710_create_perdidos_table', 1),
	(6, '2024_03_12_190724_categoria', 1),
	(7, '2024_03_12_200804_add_coluna_perdidos', 1),
	(8, '2024_03_26_185856_add_coluna_perdidos_imagem', 1),
	(9, '2024_04_02_192807_create_statuss_table', 1),
	(10, '2024_04_02_192906_create_donos_table', 1),
	(11, '2024_04_02_192921_create_atualizacaos_table', 1),
	(12, '2024_08_19_030902_create_encontrados_table', 1),
	(13, '2024_08_19_115416_create_doacaos_table', 1),
	(14, '2024_08_26_185856_add_coluna_doacaos_imagem', 1),
	(15, '2024_08_27_185856_add_coluna_encontrados_imagem', 1),
	(16, '2024_08_29_022057_create_cuidados_table', 1);

-- Copiando estrutura para tabela buscapet.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela buscapet.perdidos
CREATE TABLE IF NOT EXISTS `perdidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especie` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raca` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caracteristicas` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porte` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsavel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recompensa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perdidos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `perdidos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.perdidos: ~3 rows (aproximadamente)
INSERT INTO `perdidos` (`id`, `nome`, `idade`, `especie`, `raca`, `caracteristicas`, `porte`, `data`, `local`, `responsavel`, `telefone`, `recompensa`, `created_at`, `updated_at`, `categoria_id`, `imagem`) VALUES
	(1, 'Bob Reinould', '8 anos', 'Cachorro', 'Vira-Lata Caramelo', 'Cachorro vira-lata de cor caramelo, bem gordinho', 'Médio', '2024-08-11', 'Desapareceu próximo ao Celeiro Center', 'Arlindo Cruz', '+55 49 99999-9999', 'R$ 100,00', '2024-08-24 21:26:07', '2024-08-24 21:29:38', 2, NULL),
	(2, 'Joaquina', '3 anos', 'Gata', 'Sem Raça', 'Ela é Laranja', 'Normal', '2024-08-06', 'Desapareceu próximo ao Sicoob do Palmital', 'Ana Bella', '+55 49 88888-9999', 'R$ 200,00', '2024-08-24 21:26:07', '2024-08-24 21:29:38', 1, NULL),
	(3, 'Jorge', '1 ano', 'Calopsita', 'Não sei', 'Amarelo e cinza, com bochechas rosadas', 'Pequeno', '2024-08-01', 'Desapareceu na rua Pernambuco, próximo a escola Severiano', 'Marcelo Rossi', '+55 49 88888-8888', 'R$ 0,00', '2024-08-24 21:26:07', '2024-08-24 21:29:38', 3, NULL);

-- Copiando estrutura para tabela buscapet.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela buscapet.statuss
CREATE TABLE IF NOT EXISTS `statuss` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.statuss: ~2 rows (aproximadamente)
INSERT INTO `statuss` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Ainda Perdido', '2024-08-30 16:13:34', '2024-08-30 16:13:34'),
	(2, 'Encontrado', '2024-08-30 16:13:34', '2024-08-30 16:13:34');

-- Copiando estrutura para tabela buscapet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela buscapet.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, '$2y$12$3iTwds/S4FNciFaTsEfo8OIe1y8DjvTCOPHMCSdIYhS.vy86hCkGK', NULL, '2024-08-30 16:14:22', '2024-08-30 16:14:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
