-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.27 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.0.0.4444
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para lolwtf2
CREATE DATABASE IF NOT EXISTS `lolwtf2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lolwtf2`;


-- Copiando estrutura para tabela lolwtf2.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela lolwtf2.contem
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

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela lolwtf2.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `rua` varchar(30) NOT NULL,
  `num` varchar(30) NOT NULL,
  `complemento` varchar(500) DEFAULT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `cod_end` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela lolwtf2.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `codmarc` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`codmarc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela lolwtf2.pedido
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela lolwtf2.pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `nivel_d_aces` int(5) NOT NULL,
  `cod_end` int(8) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_end` (`cod_end`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`cod_end`) REFERENCES `endereco` (`cod_end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela lolwtf2.produto
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
