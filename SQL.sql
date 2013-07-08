-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.27 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para lolwtf2
DROP DATABASE IF EXISTS `lolwtf2`;
CREATE DATABASE IF NOT EXISTS `lolwtf2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lolwtf2`;


-- Copiando estrutura para tabela lolwtf2.categoria
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.categoria: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`cod`, `nome`) VALUES
	(0, 'Celulares');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.contem
DROP TABLE IF EXISTS `contem`;
CREATE TABLE IF NOT EXISTS `contem` (
  `quantidade` int(7) NOT NULL,
  `preco` float(8,2) NOT NULL,
  `cod_prod` int(10) NOT NULL,
  `cod_ped` int(10) NOT NULL,
  PRIMARY KEY (`cod_prod`,`cod_ped`),
  KEY `cod_prod` (`cod_prod`),
  KEY `cod_ped` (`cod_ped`),
  CONSTRAINT `contem_ibfk_1` FOREIGN KEY (`cod_prod`) REFERENCES `produto` (`cod_prod`),
  CONSTRAINT `contem_ibfk_2` FOREIGN KEY (`cod_ped`) REFERENCES `pedido` (`cod_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.contem: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `contem` DISABLE KEYS */;
INSERT INTO `contem` (`quantidade`, `preco`, `cod_prod`, `cod_ped`) VALUES
	(4, 4545.00, 11, 2),
	(1, 4545.00, 12, 2),
	(1, 54.00, 14, 2),
	(1, 54.00, 14, 6),
	(7, 545.00, 19, 6),
	(3, 545.00, 23, 6),
	(1, 112.00, 25, 2),
	(1, 545.00, 27, 8),
	(5, 10.00, 28, 2);
/*!40000 ALTER TABLE `contem` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.endereco
DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `rua` varchar(30) NOT NULL,
  `num` varchar(30) NOT NULL,
  `complemento` varchar(500) DEFAULT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` int(8) NOT NULL,
  `cod_end` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_end`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.endereco: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`rua`, `num`, `complemento`, `cidade`, `estado`, `cep`, `cod_end`) VALUES
	('Aristides Cooper', '30', 'casa', 'Curitiba', 'Pa', 82210370, 1);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.marca
DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `codmarc` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`codmarc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.marca: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`codmarc`, `nome`) VALUES
	(1, 'Sony'),
	(2, 'Apple'),
	(3, 'Samsung'),
	(4, 'Nokia'),
	(5, 'LG'),
	(6, 'Motorola');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.pedido
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `situacao` varchar(100) NOT NULL,
  `cod_pedido` int(10) NOT NULL AUTO_INCREMENT,
  `forma_d_entreg` varchar(40) DEFAULT NULL,
  `forma_d_pag` varchar(40) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_p` int(11) NOT NULL,
  `cod_end` int(8) NOT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `id_p` (`id_p`),
  KEY `cod_end` (`cod_end`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `pessoa` (`id`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`cod_end`) REFERENCES `endereco` (`cod_end`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.pedido: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`situacao`, `cod_pedido`, `forma_d_entreg`, `forma_d_pag`, `data`, `id_p`, `cod_end`) VALUES
	('carrinho', 2, NULL, NULL, '2013-07-06 17:16:26', 1, 1),
	('carrinho', 3, NULL, NULL, '2013-07-06 21:52:21', 1, 1),
	('carrinho', 4, NULL, NULL, '2013-07-06 21:52:31', 1, 1),
	('carrinho', 5, NULL, NULL, '2013-07-06 21:52:52', 1, 1),
	('carrinho', 6, NULL, NULL, '2013-07-06 21:54:34', 1, 1),
	('carrinho', 8, NULL, NULL, '2013-07-06 22:38:01', 4, 1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.pessoa
DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `nome` varchar(30) NOT NULL,
  `telefone` int(11) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rg` int(8) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nivel_d_aces` int(5) NOT NULL,
  `cod_end` int(8) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_end` (`cod_end`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`cod_end`) REFERENCES `endereco` (`cod_end`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.pessoa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`nome`, `telefone`, `senha`, `email`, `rg`, `cpf`, `nivel_d_aces`, `cod_end`, `id`, `nascimento`) VALUES
	('adm', 0, '123456', 'rafael_kozar@hotmail.com', 87654321, 2147483647, 5, 1, 1, '0000-00-00'),
	('Alexandre Beltzac', 32551632, '123456', 'lol2@gmail.com', 655465499, 989989999, 0, 1, 4, '1993-08-11');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.produto
DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(10000) DEFAULT NULL,
  `cod_prod` int(10) NOT NULL AUTO_INCREMENT,
  `categoria` int(10) NOT NULL DEFAULT '0',
  `estoque` int(10) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `cod_marc` int(10) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `dimensoes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_prod`),
  KEY `cod_marc` (`cod_marc`),
  KEY `FK_produto_categoria` (`categoria`),
  CONSTRAINT `FK_produto_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`cod`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cod_marc`) REFERENCES `marca` (`codmarc`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.produto: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`nome`, `descricao`, `cod_prod`, `categoria`, `estoque`, `peso`, `cod_marc`, `preco`, `dimensoes`) VALUES
	('lol', 'gfjghj', 11, 0, 12, 10, 1, 4545.00, NULL),
	('lol', 'gfjghj', 12, 0, 12, 10, 1, 4545.00, NULL),
	('tyrty', 'dfdfgdjkjk', 14, 0, 0, 0, 1, 15879.00, ''),
	('lol', 'fsdf', 18, 0, 0, 0, 1, 0.00, NULL),
	('ghjgh', 'fsdf', 19, 0, 454, 10, 1, 545.00, NULL),
	('ghjgh', 'fsdf', 20, 0, 454, 10, 1, 545.00, NULL),
	('ghjgh', 'fsdf', 21, 0, 454, 10, 1, 545.00, NULL),
	('ghjgh', 'fsdf', 22, 0, 454, 10, 1, 545.00, NULL),
	('ghjgh', 'fsdf', 23, 0, 454, 10, 1, 545.00, NULL),
	('ghjgh', 'fsdf', 24, 0, 454, 10, 1, 545.00, NULL),
	('Celular', 'dfdfgdfgdfg', 25, 0, 12, 10, 1, 112.00, NULL),
	('Celular 2', 'ahsdjkashdkasd', 26, 0, 1000, 10, 1, 5464.00, NULL),
	('Celular 3', 'bazinga', 27, 0, 12, 10, 1, 545.00, NULL),
	('Celular 4', 'Finalmente?', 28, 0, 1000, 10, 1, 112.00, 'sdfsdf'),
	('Celular 4', 'Finalmente?', 29, 0, 1000, 10, 1, 112.00, NULL),
	('Celular 4', 'Finalmente?', 30, 0, 1000, 10, 1, 112.00, NULL),
	('Celular 4', 'Finalmente?', 31, 0, 1000, 10, 1, 112.00, '40x40'),
	('Iphone 6', 'gfjghjdf', 32, 0, 120, 10, 2, 5000.00, '5454');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
