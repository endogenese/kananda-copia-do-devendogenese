-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 20-Mar-2015 às 20:22
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `endog103_kananda`
--
CREATE DATABASE IF NOT EXISTS `endog103_kananda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `endog103_kananda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `senha`, `email`, `data_cadastro`) VALUES
(1, 'Fabrício Rribeiro', '39126999a71e4be3762c34de0e40cb3a', 'fabricio.ribeiro@endogenese.com.br', '2014-10-12 00:00:00'),
(21, 'Endogênese Soluções', '39126999a71e4be3762c34de0e40cb3a', 'endogenese@endogenese.com.br', '2015-02-05 18:58:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `imovel` int(11) DEFAULT NULL,
  `mensagem` longtext NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `imovel`, `mensagem`, `telefone`, `data_cadastro`) VALUES
(14, 'fabricio', 'fabricio@gmail.com', NULL, '102030', '222', '2014-11-21 16:54:50'),
(15, 'Fabrício', 'fabricio.ribeiro@ifpa.edu.br', NULL, 'dedaded', '1111', '2014-11-21 17:04:14'),
(16, 'Fabrício', 'fabricio.ribeiro@ifpa.edu.br', NULL, 'dedaded', '1111', '2014-11-21 17:07:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `titulo_site` varchar(100) NOT NULL,
  `logotipo` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `email`, `titulo_site`, `logotipo`, `data_cadastro`) VALUES
(1, 'Kananda Negócios Imobiliários', 'Kananda@kananda.imb.br', 'Kananda Negócios Imobiliários', 'img/site/5509d85266afe.png', '2014-10-22 21:09:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_evento` varchar(60) NOT NULL,
  `descricao_evento` varchar(144) NOT NULL,
  `diretorio` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `titulo_evento`, `descricao_evento`, `diretorio`, `data_cadastro`) VALUES
(88, 'Titulo', 'Descrição do evento', 'img/eventos/88-Titulo', '2015-02-05 19:27:32'),
(92, 'ra', 'reee', 'img/eventos/92-ra', '2015-03-18 20:43:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_evento`
--

CREATE TABLE IF NOT EXISTS `foto_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `descricao_foto` varchar(144) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Extraindo dados da tabela `foto_evento`
--

INSERT INTO `foto_evento` (`id`, `id_evento`, `arquivo`, `descricao_foto`, `data_cadastro`) VALUES
(81, 0, 'img/eventos/81-kananda/5452b55f29d47.jpg', 'm', '2014-10-30 22:02:07'),
(101, 88, 'img/eventos/88-Titulo/54d3c4247d949.jpg', 'DESCRIÇÃO OBRIGATÓRIA...', '2015-02-05 19:27:32'),
(102, 88, 'img/eventos/88-Titulo/54d3c424a0267.jpg', 'DESCRIÇÃO OBRIGATÓRIA...', '2015-02-05 19:27:32'),
(103, 88, 'img/eventos/88-Titulo/54d3c424b5bc1.jpg', 'DESCRIÇÃO OBRIGATÓRIA...', '2015-02-05 19:27:32'),
(104, 88, 'img/eventos/88-Titulo/54d3c424e1517.jpg', 'DESCRIÇÃO OBRIGATÓRIA...', '2015-02-05 19:27:32'),
(106, 92, 'img/eventos/92-ra/5509e370d24e5.jpg', '', '2015-03-18 20:43:28'),
(107, 92, 'img/eventos/92-ra/5509e370db1b0.jpg', '', '2015-03-18 20:43:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_produto`
--

CREATE TABLE IF NOT EXISTS `foto_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `foto_produto`
--

INSERT INTO `foto_produto` (`id`, `id_produto`, `arquivo`, `data_cadastro`) VALUES
(15, 3, 'img/imoveis/3-333/545a8a4bb224d.png', '2014-10-31 14:32:50'),
(16, 2, 'img/imoveis/2-222/545a89c415d8f.png', '2014-11-02 20:17:38'),
(19, 3, 'img/imoveis/3-333/5456919a54f95.jpg', '2014-11-02 20:18:34'),
(20, 4, 'img/imoveis/4-444/545a89cf4e00e.png', '2014-11-03 19:30:44'),
(21, 4, 'img/imoveis/4-444/545a446f74f7b.jpg', '2014-11-05 15:38:23'),
(23, 6, 'img/imoveis/6-12345/545a9360386f3.png', '2014-11-05 21:15:12'),
(24, 2, 'img/imoveis/2-222/545aa83b2fccc.jpg', '2014-11-05 22:44:11'),
(25, 8, 'img/imoveis/8-777/545d252a34a56.png', '2014-11-07 19:54:02'),
(26, 9, 'img/imoveis/9-000/545d2534bd062.png', '2014-11-07 19:54:31'),
(27, 10, 'img/imoveis/10-909090/545d253eb49e4.png', '2014-11-07 19:54:55'),
(28, 11, 'img/imoveis/11-787878/545d2546515be.png', '2014-11-07 19:55:40'),
(29, 12, 'img/imoveis/12-8989/545d254e3cf63.png', '2014-11-07 19:56:44'),
(30, 13, 'img/imoveis/13-56565/545d255776383.png', '2014-11-07 19:57:04'),
(31, 14, 'img/imoveis/14-90990/545d44317f6f1.png', '2014-11-07 22:14:09'),
(32, 15, 'img/imoveis/15-9093/545d44498d329.png', '2014-11-07 22:14:33'),
(33, 16, 'img/imoveis/16-8/545d446444540.png', '2014-11-07 22:15:00'),
(34, 17, 'img/imoveis/17-55656/545d44766cdd8.png', '2014-11-07 22:15:18'),
(35, 18, 'img/imoveis/18-34312/545d44a78f7ca.png', '2014-11-07 22:16:07'),
(36, 19, 'img/imoveis/19-121212/545d44bedcf60.png', '2014-11-07 22:16:30'),
(37, 20, 'img/imoveis/20-332/545d478353a30.png', '2014-11-07 22:28:19'),
(38, 21, 'img/imoveis/21-8777/54634bde51daa.jpg', '2014-11-07 22:29:19'),
(39, 22, 'img/imoveis/22-784/54634c99f174f.jpg', '2014-11-07 22:29:53'),
(40, 23, 'img/imoveis/23-129/545d47f78cec9.png', '2014-11-07 22:30:15'),
(41, 24, 'img/imoveis/24-1971/54634ba16fc40.jpg', '2014-11-07 22:30:36'),
(42, 20, 'img/imoveis/20-332/546124f148d26.png', '2014-11-10 20:49:53'),
(43, 20, 'img/imoveis/20-332/54612520a259b.png', '2014-11-10 20:50:40'),
(44, 20, 'img/imoveis/20-332/54612520ba089.jpg', '2014-11-10 20:50:40'),
(45, 25, 'img/imoveis/25-86764/54649dc1aa099.jpg', '2014-11-13 12:02:09'),
(46, 24, 'img/imoveis/24-1971/550ac13b82820.jpg', '2015-03-19 12:29:47'),
(47, 24, 'img/imoveis/24-1971/550ac13b8ef14.jpg', '2015-03-19 12:29:47'),
(48, 24, 'img/imoveis/24-1971/550c143d3688d.jpg', '2015-03-20 12:36:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` int(11) NOT NULL,
  `tipo_imovel` varchar(25) NOT NULL,
  `finalidade` varchar(10) NOT NULL,
  `quartos` int(11) NOT NULL,
  `garagem` int(11) NOT NULL,
  `area_edi` varchar(20) NOT NULL,
  `area_ter` varchar(20) NOT NULL,
  `perimetro_l` varchar(20) NOT NULL,
  `perimetro_c` varchar(20) NOT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `suites` int(11) NOT NULL,
  `banheiros` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `num` varchar(6) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `bairro` varchar(80) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `descricao` longtext NOT NULL,
  `video` varchar(100) DEFAULT NULL,
  `diretorio` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia` (`referencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `referencia`, `tipo_imovel`, `finalidade`, `quartos`, `garagem`, `area_edi`, `area_ter`, `perimetro_l`, `perimetro_c`, `latitude`, `longitude`, `suites`, `banheiros`, `categoria`, `logradouro`, `num`, `complemento`, `bairro`, `cidade`, `uf`, `descricao`, `video`, `diretorio`, `data_cadastro`) VALUES
(2, 222, 'LOTEAMENTO', 'VENDA', 1, 1, '1', '152', '1', '1', '-4.265851', '-55.9810', 1, 1, 'CASA TERREA', '1', '1', '1', 'BOA ESPERANÇA', 'ITAITUBA', '', 'imóvel a alugar\r\n', '1', 'img/imoveis/2-222', '2014-10-31 11:40:07'),
(3, 333, 'CASA PARA ALUGAR', 'VENDA', 1, 1, '302', '1', '1', '1', '-4.275843', '-55.987138', 1, 1, 'APARTAMENTO', '1', '1', '1', 'NOVA ITAITUBA', 'ITAITUBA', '', 'imóvel a venda', '1', 'img/imoveis/3-333', '2014-10-31 14:32:50'),
(4, 444, 'CASA A VENDA', 'VENDA', 3, 1, '1', '402', '1', '1', '-4.275843', '-55.994347', 1, 1, 'CASA TERREA', '1', '1', '1', 'BELA VISTA', 'ITAITUBA', '', 'descrição 4 descrição 4  sds sd sd sd de sd sd descrição 4 sd sd descrição 4sd sd descrição 4sd sd descrição 4sd sd descrição 4sd sd descrição 4descrição 4 descrição 4 descrição descrição 4 dff dfdf', '1', 'img/imoveis/4-444', '2014-11-03 19:30:43'),
(6, 12345, 'AREAS PORTUARIA', 'VENDA', 0, 0, '120 m²', '100 m²', '121 metros', '121 metros', '', NULL, 0, 0, 'CASA TERREA', 'logradouro', 's/n', NULL, 'BELA VISTA', 'ITAITUBA', '', 'loteamento', NULL, 'img/imoveis/6-12345', '2014-11-05 21:15:12'),
(8, 777, 'AREAS PORTUARIA', 'VENDA', 1, 1, '1', '1', '1', '1', NULL, NULL, 1, 1, 'CASA TERREA', '1', '1', '1', 'BELA VISTA', 'ITAITUBA', '', '1', '1', 'img/imoveis/8-777', '2014-11-07 19:54:02'),
(9, 0, 'AREAS PORTUARIA', 'VENDA', 1, 1, '1', '1', '1', '1', NULL, NULL, 1, 1, 'CASA TERREA', '1', '1', '1', 'BELA VISTA', 'ITAITUBA', '', '1', '1', 'img/imoveis/9-000', '2014-11-07 19:54:31'),
(10, 909090, 'AREAS PORTUARIA', 'VENDA', 1, 1, '1', '1', '1', '1', NULL, NULL, 1, 1, 'CASA TERREA', '1', '1', '1', 'BELA VISTA', 'ITAITUBA', '', '11', '1', 'img/imoveis/10-909090', '2014-11-07 19:54:55'),
(11, 787878, 'AREAS PORTUARIA', 'VENDA', 3, 3, '3', '3', '3', '3', NULL, NULL, 3, 3, 'CASA TERREA', '3', '3', '3', 'BELA VISTA', 'ITAITUBA', '', '3', '3', 'img/imoveis/11-787878', '2014-11-07 19:55:40'),
(12, 8989, 'AREAS PORTUARIA', 'VENDA', 7, 7, '77', '7', '7', '7', NULL, NULL, 7, 7, 'CASA TERREA', '7', '7', '7', 'BELA VISTA', 'ITAITUBA', '', '7', NULL, 'img/imoveis/12-8989', '2014-11-07 19:56:43'),
(13, 56565, 'AREAS PORTUARIA', 'VENDA', 9, 9, '9', '9', '9', '9', NULL, NULL, 9, 9, 'CASA TERREA', '9', '9', '9', 'BELA VISTA', 'ITAITUBA', '', '9', '9', 'img/imoveis/13-56565', '2014-11-07 19:57:04'),
(14, 90990, 'TERRENO RURAL', 'VENDA', 1, 1, '1', '1', '1', '1', NULL, NULL, 1, 1, 'CASA TERREA', '1', '1', '1', 'BELA VISTA', 'ITAITUBA', '', '1', '1', 'img/imoveis/14-90990', '2014-11-07 22:14:09'),
(15, 9093, 'LOTEAMENTO', 'VENDA', 12, 2, '2', '2', '2', '2', NULL, NULL, 2, 2, 'CASA TERREA', '2', '2', '2', 'BELA VISTA', 'ITAITUBA', '', '2', '2', 'img/imoveis/15-9093', '2014-11-07 22:14:33'),
(16, 8, 'AREAS PORTUARIA', 'VENDA', 8, 8, '8', '8', '8', '8', NULL, NULL, 8, 8, 'CASA TERREA', '8', '8', '8', 'BELA VISTA', 'ITAITUBA', '', '8', '8', 'img/imoveis/16-8', '2014-11-07 22:15:00'),
(17, 55656, 'AREAS PORTUARIA', 'VENDA', 9, 9, '9', '9', '9', '9', '-4.280637', '-55.991693', 9, 9, 'CASA TERREA', '9', '9', '9', 'BELA VISTA', 'ITAITUBA', '', '9', '9', 'img/imoveis/17-55656', '2014-11-07 22:15:18'),
(18, 34312, 'AREAS PORTUARIA', 'VENDA', 88, 8, '8', '8', '8', '8', NULL, NULL, 8, 8, 'CASA TERREA', '8', '8', '8', 'BELA VISTA', 'ITAITUBA', '', '8', '8', 'img/imoveis/18-34312', '2014-11-07 22:16:07'),
(19, 121212, 'AREAS PORTUARIA', 'VENDA', 90, 9, '9', '9', '9', '9', NULL, NULL, 9, 9, 'CASA TERREA', '9', '9', '9', 'BELA VISTA', 'ITAITUBA', '', '9', '9', 'img/imoveis/19-121212', '2014-11-07 22:16:30'),
(20, 332, 'CASA A VENDA', 'VENDA', 4, 4, '5', '5', '5', '5', NULL, NULL, 4, 4, 'CASA TERREA', '4', '4', '4', 'BELA VISTA', 'ITAITUBA', '', '5', '//www.youtube.com/embed/gCYcHz2k5x0', 'img/imoveis/20-332', '2014-11-07 22:28:19'),
(21, 8777, 'CASA PARA ALUGAR', 'VENDA', 7, 7, '7', '7', '7', '7', NULL, NULL, 7, 7, 'CASA TERREA', '7', '7', '7', 'BELA VISTA', 'ITAITUBA', '', '7', NULL, 'img/imoveis/21-8777', '2014-11-07 22:29:19'),
(22, 784, 'TERRENO RURAL', 'VENDA', 8, 8, '8', '8', '8', '8', '-4.223973', '-56.003494', 8, 8, 'CASA TERREA', '8', '8', '88', 'BELA VISTA', 'ITAITUBA', '', '8', '8', 'img/imoveis/22-784', '2014-11-07 22:29:53'),
(23, 129, 'CASA A VENDA', 'VENDA', 4, 9, '9', '9', '9', '9', NULL, NULL, 9, 9, 'CASA TERREA', '9', '9', '9', 'BELA VISTA', 'ITAITUBA', '', '9', '9', 'img/imoveis/23-129', '2014-11-07 22:30:15'),
(24, 1971, 'CASA A VENDA', 'VENDA', 7, 7, '151515.1', '151515.1', '111.11 metros', '111.11 metros', '-4.257437', '-55.994608', 2, 7, 'CASA TERREA', '7', '7', '7', 'BELA VISTA', 'ITAITUBA', '', '<p>7 textando plugin :D...<strong>kkkkkkkkkk</strong> ^^</p>', '7', 'img/imoveis/24-1971', '2014-11-07 22:30:35'),
(25, 86764, 'TERRENO URBANO', 'VENDA', 1, 1, '414444.4', '444444.4', '444.44 metros', '444.44 metros', '-4.281578', '-56.001949', 1, 1, 'CASA TERREA', '1', '1', '1', 'BELA VISTA', 'ITAITUBA', '', '<p>1</p>', '1', 'img/imoveis/25-86764', '2014-11-13 12:02:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide` varchar(50) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Extraindo dados da tabela `slideshow`
--

INSERT INTO `slideshow` (`id`, `slide`, `titulo`, `descricao`, `data_cadastro`) VALUES
(75, 'img/site/5509d0bad1931.jpg', NULL, NULL, '2015-03-18 19:23:38'),
(76, 'img/site/5509d0e216c18.jpg', NULL, NULL, '2015-03-18 19:24:18'),
(77, 'img/site/5509d0e220b4b.jpg', NULL, NULL, '2015-03-18 19:24:18'),
(78, 'img/site/5509d0e22a0de.jpg', NULL, NULL, '2015-03-18 19:24:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
