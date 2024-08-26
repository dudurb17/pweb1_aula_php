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


-- Copiando estrutura do banco de dados para db_aula
CREATE DATABASE IF NOT EXISTS `db_aula` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_aula`;

-- Copiando estrutura para tabela db_aula.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `quantidade` int NOT NULL,
  `preco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cnpj` int NOT NULL,
  `peso` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.estoque: ~2 rows (aproximadamente)
INSERT INTO `estoque` (`id`, `nome`, `quantidade`, `preco`, `cnpj`, `peso`) VALUES
	(6, 'Brinquedo', 435, '3434', 1234546676, 230.4),
	(7, 'papagaio', 12, '12', 21323234, 23.4);

-- Copiando estrutura para tabela db_aula.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `quantidade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `valor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cpf` int NOT NULL,
  `data` date NOT NULL,
  `observacao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.pedido: ~8 rows (aproximadamente)
INSERT INTO `pedido` (`id`, `nome`, `quantidade`, `valor`, `cpf`, `data`, `observacao`) VALUES
	(14, 'teste', '23', '34', 34343545, '2023-07-14', 'teste'),
	(16, 'tico', '3434', '3434', 23434545, '2023-06-22', 'seco'),
	(17, 'Murilo', '1233', '34', 43545, '2022-10-20', 'fragil'),
	(18, 'tico', '23', '34', 435465, '2023-07-13', '546'),
	(19, 'Eduardo', '4454', '454', 345, '2023-07-30', '34'),
	(20, 'nadia', '34', '43', 324324234, '2023-04-06', 'seco'),
	(21, 'Eduardo', '5', '43543', 435, '2023-02-07', 'molhado'),
	(23, 'teste', '23', '567', 1232543, '2026-10-04', 'exemplo');

-- Copiando estrutura para tabela db_aula.pet
CREATE TABLE IF NOT EXISTS `pet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `raca` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `idade` int NOT NULL DEFAULT '0',
  `porte` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.pet: ~2 rows (aproximadamente)
INSERT INTO `pet` (`id`, `nome`, `raca`, `idade`, `porte`) VALUES
	(1, 'cabrito', 'pelud', 10, 'med'),
	(6, 'papagaio', 'arara', 123, 'grande');

-- Copiando estrutura para tabela db_aula.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `senha` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.usuario: ~4 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `login`, `senha`) VALUES
	(1, 'Administrado', '49 888008800', 'teste@teste.com', 'admin1', '123'),
	(12, 'Eduardo', '49991767992', 'eduardo.robettibedin@gmail.com', 'dudu', '$2y$10$4HQRH500cvS50Ap6g.IPSe24hVMIcF7BTjFL3WUCZwzQXFkP9TWE2'),
	(16, 'fernando', '49991767992', 'fernando@gmail.com', 'fernando', '$2y$10$LSZasEz11EfGuOTFrvG2fuzB3rPiXHRP9USgy.XdUHFMppmIWpPzm'),
	(17, 'teste', '12334534', 'eduardo@gmail.com', NULL, NULL),
	(18, 'admin', '12323432', 'eduardo@gmail.com', 'admin', '$2y$10$MKmx15ZhqLEpJpgzKLTgbOEdZAr1Knwt06oDhM/gKA1XCiz2lrcj.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
