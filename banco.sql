-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.29-0ubuntu0.16.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela laboratorio.exames
CREATE TABLE IF NOT EXISTS `exames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.exames: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `exames` DISABLE KEYS */;
INSERT INTO `exames` (`id`, `descricao`, `preco`, `created_at`, `updated_at`) VALUES
	(1, 'Espermograma', 120.00, NULL, NULL),
	(2, 'Mamografia', 60.00, NULL, NULL);
/*!40000 ALTER TABLE `exames` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.medicos
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.medicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `created_at`, `updated_at`) VALUES
	(1, 'Dr. Marcos', 'Urologista', NULL, NULL),
	(2, 'Dra. Aparecida', 'Ginecologista', NULL, NULL),
	(3, 'Dra. Marina', 'Psiquiatrica', NULL, NULL),
	(4, 'Dr. Pedro', 'Clinico Geral', NULL, NULL);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.migrations: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2020_03_05_163427_create_pacientes_table', 1),
	(4, '2020_03_05_163848_create_medicos_table', 1),
	(5, '2020_03_05_164053_create_posto_coletas_table', 1),
	(6, '2020_03_05_164218_create_exames_table', 1),
	(7, '2020_03_05_164535_create_ordem_servicos_table', 1),
	(8, '2020_03_05_165058_create_ordem_servico_exames_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.ordem_servicos
CREATE TABLE IF NOT EXISTS `ordem_servicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `paciente_id` bigint(20) unsigned NOT NULL,
  `posto_coleta_id` bigint(20) unsigned NOT NULL,
  `medico_id` bigint(20) unsigned NOT NULL,
  `convenio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordem_servicos_paciente_id_index` (`paciente_id`),
  KEY `ordem_servicos_posto_coleta_id_index` (`posto_coleta_id`),
  KEY `ordem_servicos_medico_id_index` (`medico_id`),
  CONSTRAINT `ordem_servicos_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`),
  CONSTRAINT `ordem_servicos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `ordem_servicos_posto_coleta_id_foreign` FOREIGN KEY (`posto_coleta_id`) REFERENCES `posto_coletas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.ordem_servicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ordem_servicos` DISABLE KEYS */;
INSERT INTO `ordem_servicos` (`id`, `paciente_id`, `posto_coleta_id`, `medico_id`, `convenio`, `data`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, 'austa', '2020-03-30', '2020-03-05 18:37:57', '2020-03-05 18:37:57'),
	(2, 2, 1, 1, 'austa', '2020-03-30', '2020-03-05 19:11:21', '2020-03-05 19:11:21');
/*!40000 ALTER TABLE `ordem_servicos` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.ordem_servico_exames
CREATE TABLE IF NOT EXISTS `ordem_servico_exames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ordem_servico_id` bigint(20) unsigned NOT NULL,
  `exame_id` bigint(20) unsigned NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordem_servico_exames_ordem_servico_id_index` (`ordem_servico_id`),
  KEY `ordem_servico_exames_exame_id_index` (`exame_id`),
  CONSTRAINT `ordem_servico_exames_exame_id_foreign` FOREIGN KEY (`exame_id`) REFERENCES `exames` (`id`),
  CONSTRAINT `ordem_servico_exames_ordem_servico_id_foreign` FOREIGN KEY (`ordem_servico_id`) REFERENCES `ordem_servicos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.ordem_servico_exames: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ordem_servico_exames` DISABLE KEYS */;
INSERT INTO `ordem_servico_exames` (`id`, `ordem_servico_id`, `exame_id`, `preco`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 120.00, '2020-03-05 19:11:22', '2020-03-05 19:11:22'),
	(2, 2, 1, 120.00, NULL, NULL);
/*!40000 ALTER TABLE `ordem_servico_exames` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.pacientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`, `nome`, `data_nascimento`, `sexo`, `endereco`, `created_at`, `updated_at`) VALUES
	(1, 'Paulo Henrique', '1986-02-22', 'Masculino', 'Rua 10, 1045, Vila Redentora, Jales', NULL, NULL),
	(2, 'Victor Hgo', '1986-02-22', 'Masculino', 'Rua Manoel de Freitas Assunção, 301, Rios de Spagna, São José do rio preto', NULL, NULL);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.posto_coletas
CREATE TABLE IF NOT EXISTS `posto_coletas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.posto_coletas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posto_coletas` DISABLE KEYS */;
INSERT INTO `posto_coletas` (`id`, `descricao`, `endereco`, `created_at`, `updated_at`) VALUES
	(1, 'Laboratório For Life', 'Rua são judas, 120, Centro. Jão Jospe do Rio Preto', NULL, NULL),
	(2, 'Laboratório Batista', 'Rua 14, 120, Centro, São José do Rio Preto', NULL, NULL);
/*!40000 ALTER TABLE `posto_coletas` ENABLE KEYS */;


-- Copiando estrutura para tabela laboratorio.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laboratorio.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
