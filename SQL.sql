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

-- Copiando dados para a tabela lolwtf2.categoria: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`cod`, `nome`) VALUES
	(0, 'Celulares');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


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

-- Copiando dados para a tabela lolwtf2.contem: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contem` DISABLE KEYS */;
/*!40000 ALTER TABLE `contem` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.endereco: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`rua`, `num`, `complemento`, `cidade`, `estado`, `cep`, `cod_end`) VALUES
	('Aristides Cooper', '55', 'casa', 'Curitiba', 'PR', '82', 1),
	('rua aleatoria', '12', 'apto 308', 'Curitiba', 'PR', '91.282-490', 2),
	('87986986986986', '9869698686', '97988977', 'dssdfs', 'AC', '23.523-532', 3),
	('98698696986', '8698698698', 'efwf', '235235', 'AC', '23.235-325', 4);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


-- Copiando estrutura para tabela lolwtf2.marca
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.pedido: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`situacao`, `cod_pedido`, `forma_d_entreg`, `forma_d_pag`, `data`, `id_p`, `cod_end`) VALUES
	('carrinho', 1, NULL, NULL, '2013-07-21 18:11:33', 1, 1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.pessoa: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`nome`, `telefone`, `senha`, `email`, `rg`, `cpf`, `nivel_d_aces`, `cod_end`, `id`, `nascimento`) VALUES
	('Rafael Kozar', '(23)0972-3057', 'e10adc3949ba59abbe56e057f20f883e', 'rafael_kozar@hotmail.com', '03.275.903-2', '019.270.372-50', 1, 1, 1, '2013-07-25'),
	('Alexandre Beltzac 2', '0', 'e10adc3949ba59abbe56e057f20f883e', 'lol2@gmail.com', '65546', '111111', 0, 1, 4, '1993-08-11'),
	('Samuel Yuji Yamaguchi', '(92)4719-0271', 'e10adc3949ba59abbe56e057f20f883e', 'samuel@lolwtf.com', '84.910.270-9', '927.507.125-75', 0, 2, 5, '1992-07-09');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lolwtf2.produto: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`nome`, `descricao`, `cod_prod`, `categoria`, `estoque`, `peso`, `cod_marc`, `preco`, `dimensoes`) VALUES
	('Sony Xperia E Dual Chip', 'Smartphone Sony Xperia E Dual Chip C1604 com Google Tela 3,5, 3G + Wi-Fi, Android 4.0, CÃ¢mera 3.2 MP, Processador 1GHz e MemÃ³ria Interna de 4GB ', 11, 0, 334, 100, 1, 499.00, '335x235x325'),
	('iPhone 4S Preto', '   \r\n CÃ¢mera 8.0 Megapixel.\r\n    Display Tela Retina de 3,5".\r\n    Processador A5 Dual Core.\r\n    Sistema Operacional IOS 5.\r\n    Facetime.\r\n    Air Play.\r\n    MemÃ³ria interna de 16GB.\r\n', 32, 0, 120, 100, 2, 1599.00, '141x241x241'),
	('LG Optimus L5 Preto', 'Com o LG Optimus L5, suas tarefas diÃ¡rias ficam muito mais simples. Indo muito alÃ©m de garantir que vocÃª converse com seus amigos, o smartphone abre um leque imenso de possibilidades com suas ferramentas variadas. A cÃ¢mera de 5MP, por exemplo, Ã© perfeita para a realizaÃ§Ã£o de fotos e vÃ­deos. JÃ¡ o Wi-Fi e a compatibilidade do celular com a tecnologia 3G garantem acesso cÃ´modo Ã  internet. VocÃª poderÃ¡ aproveitar toda a fluidez de navegaÃ§Ã£o do Android 4.0, sistema operacional que ainda se destaca pelos vÃ¡rios aplicativos que disponibiliza. A tela touchscreen tambÃ©m colabora para que vocÃª explore as vÃ¡rias funÃ§Ãµes do produto, jÃ¡ que proporciona uma precisÃ£o enorme. Dual chip, o equipamento Ã© econÃ´mico e faz com que vocÃª organize seus contatos de forma eficiente. Para os momentos que pedem uma boa mÃºsica, o MP3 player e o RÃ¡dio FM sÃ£o perfeitos. Por Bluetooth, vocÃª pode compartilhar seus arquivos favoritos, tendo atÃ© 32GB para salvÃ¡-los com cartÃµes MicroSD.', 33, 0, 150, 32432, 5, 549.00, '241x241x241'),
	('LG Optimus L7 Branco', 'Um celular que une beleza e eficiÃªncia. Assim Ã© o LG Optimus L7 que chega em sua casa desbloqueado. Na tela de 4.3 polegadas vocÃª visualiza em alta definiÃ§Ã£o seus sites preferidos na internet. Com esse celular Ã© possÃ­vel conectar-se via Wi-Fi ou 3G e navegar com facilidade e rapidamente graÃ§as ao sistema Android Ice Cream Sandwich 4.0 e ao processador de 1GHz.\r\nEquipado com uma cÃ¢mera integrada com flash e zoom de 4 vezes, o celular Ã© capaz de tirar fotos de atÃ© 5 megapixels e gravar vÃ­deos.\r\nCompartilhe arquivos pelo Bluetooth sem precisar do auxÃ­lio de um cabo. Ainda assim, o celular tem entrada USB para sincronizar os dados com o PC. AlÃ©m de todos esses recursos, o LG Optimus L7 possui a tecnologia DLNA (Digital Living Network Alliance) que lhe permite conectar-se a outros aparelhos eletrÃ´nicos.\r\nSintonize as estaÃ§Ãµes da RÃ¡dio FM, ouÃ§a as suas mÃºsicas preferidas no MP3 Player, utilize o seu telefone mÃ³vel como GPS e muito mais!', 34, 0, 121, 23432, 5, 799.00, '232x535x325'),
	('LG Optimus L3 Dual', 'Simples, prÃ¡tico e bonito, o LG Optimus L3 Dual agrupa funÃ§Ãµes ideais para um smartphone. De fÃ¡cil utilizaÃ§Ã£o e com inÃºmeros recursos, o celular deixa o dia a dia ainda mais funcional para quem quer diversÃ£o ou mesmo trabalhar. O aparelho desbloqueado conta com espaÃ§o para dois chips de operadoras diferentes.\r\n\r\nO celular tem ainda uma cÃ¢mera embutida de 3.2 megapixels para vocÃª registrar aquele momento especial e tambÃ©m poder compartilha-las com as possÃ­veis conexÃµes via 3G e Wi-fi. Esta conectividade permite rapidez e tambÃ©m vÃ¡rios downloads de aplicativos que rodam no celular.\r\n\r\nE para que pensa que com tantas funcionalidades a bateria nÃ£o dura, o LG Optimus Ã© equipado com uma bateria de longa duraÃ§Ã£o. O que chama a atenÃ§Ã£o tambÃ©m Ã© a tela de 3,2 polegadas e o espaÃ§o para utilizaÃ§Ã£o de dois chips.', 35, 0, 124, 0, 5, 349.90, '214x124x121'),
	('Motorola RAZR D1 Preto', 'Motorola RAZRâ„¢ D1 com um design atraente e com recurso de Tv digital e analÃ³gica, captando os canais abertos da sua regiÃ£o. O aparelho conta com acesso a redes GSM e 3G e funciona com dois chips, o que permite o uso de operadoras diferentes, perfeito para quem possui dois nÃºmeros.', 36, 0, 214, 35325, 6, 499.00, '325x523x523'),
	('Nokia Lumia 820 Preto ', 'O Lumia 820 agrada no visual moderno e na sua versatilidade. Um aparelho desenvolvido com tecnologias de ponta o transforma em um poderoso dispositivo mÃ³vel. Sua navegaÃ§Ã£o na web Ã© mais rÃ¡pida graÃ§as ao seu processador de 1.5GHZ Dual-Core Snapdragon â„¢, com Internet Explorer  10, conectividade 3G e para completar ele vem com o Windows Phone 8.Possui cÃ¢mera de 8MP com lentes Carl Zeiss, que garante muito mais qualidade, suas fotos saem clara, nÃ­tida e brilhante. E conta com gravaÃ§Ã£o de vÃ­deo Full HD.', 37, 0, 124, 93252, 4, 1299.00, '241x412x412'),
	('Samsung Galaxy S4', 'A Samsung traz para vocÃª o novo celular Galaxy S4. Esse surpreendente equipamento vai deixar vocÃª realmente surpreso com tamanha quatidade de recursos, pois ele reÃºne o que hÃ¡ de mais moderno no mercado de telecomunicaÃ§Ã£o.\r\n\r\nCom conexÃ£o 4G, esse eficiente aparelho farÃ¡ com que suas atividades pessoais e profissionais fiquem muito mais Ã¡geis de serem elaboradas. Entre as inÃºmeras caracterÃ­sticas existentes no Galaxy S4 destacamos a cÃ¢mera de vÃ­deo com resoluÃ§Ã£o em HD, cÃ¢mera fotogrÃ¡fica com 13MP, processador Snapdragon, memÃ³ria interna de 16 GB, conexÃ£o Wi-Fi, acesso a redes sociais, e muito mais.\r\n\r\nSamsung Galaxy S4 Ã© qualidade, eficiÃªncia, modernidade e funcionalidade em apenas um aparelho. VocÃª vai se apaixonar!', 38, 0, 231, 0, 3, 2449.00, '323x532x525');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
