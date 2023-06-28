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

-- Copiando estrutura para tabela db_aula.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `quantidade` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `valor` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.pedido: ~2 rows (aproximadamente)
INSERT INTO `pedido` (`id`, `nome`, `quantidade`, `valor`) VALUES
	(1, 'osso', '20', '10'),
	(7, 'tico', '23', '34'),
	(8, 'teste', '45', '546');

-- Copiando estrutura para tabela db_aula.pet
CREATE TABLE IF NOT EXISTS `pet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `raca` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `idade` int NOT NULL DEFAULT '0',
  `porte` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.pet: ~0 rows (aproximadamente)
INSERT INTO `pet` (`id`, `nome`, `raca`, `idade`, `porte`) VALUES
	(1, 'cabrito', 'peludo', 10, 'med'),
	(4, 'Cachorro', 'pintcher', 5, 'pequeno');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula.usuario: ~4 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `login`, `senha`) VALUES
	(1, 'Administrador', '49 888008800', 'teste@teste.com', 'admin1', '123'),
	(2, 'Jackson Five', '84 8989989', 'lordjackson@gmail.com', 'jackson', '123'),
	(3, 'jackson', '2342342', 'asdas@test.com', 'admin', '$2y$10$DIyFfgrauW5gOHWqIshEsOVDoSoVfE5hV14Te.baQh86BZus5TNkq'),
	(12, 'Eduardo', '49991767992', 'eduardo.robettibedin@gmail.com', 'dudu', '$2y$10$4HQRH500cvS50Ap6g.IPSe24hVMIcF7BTjFL3WUCZwzQXFkP9TWE2');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
