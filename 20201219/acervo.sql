-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Dez-2020 às 02:58
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `acervo`
--
CREATE DATABASE IF NOT EXISTS `acervo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `acervo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cod_movimento` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_autor`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_movimento` (`cod_movimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86600113 ;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id_autor`, `nome`, `cod_movimento`, `email`) VALUES
(6793954, 'ConceiÃ§Ã£o Evaristo', 1, 'conceicao@email.com'),
(56748570, 'Rupi Kaur', 5, 'rupi@email.com'),
(63233281, 'Luis Fernando VerÃ­ssimo', 1, 'verissimo@email.com'),
(86600112, 'Igor Pires da Silva', 5, 'igorsilva@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero_literario`
--

CREATE TABLE IF NOT EXISTS `genero_literario` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_genero`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `genero_literario`
--

INSERT INTO `genero_literario` (`id_genero`, `nome`, `descricao`) VALUES
(1, 'Romance', 'Narrativa longa, com escrita em prosa.'),
(2, 'Poema', 'Escrito em versos, que sÃ£o distribuÃ­dos em estrofes.'),
(3, 'Terror', 'Ligado Ã  fantasia e Ã  ficÃ§Ã£o especulativa, e Ã© criado com intuito de causar medo, aterrorizar.'),
(4, 'Suspense', 'Abordam tragÃ©dias e crimes nÃ£o solucionados'),
(5, 'Fantasia', 'Utilizam geralmente fenÃ´menos sobrenaturais, mÃ¡gicos e outros como um elemento primÃ¡rio do enredo, tema ou configuraÃ§Ã£o.'),
(6, 'Conto', 'Possui narrativa curta e tem sua origem da necessidade humana de contar e ouvir histÃ³rias.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitor`
--

CREATE TABLE IF NOT EXISTS `leitor` (
  `id_leitor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_leitor`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `leitor`
--

INSERT INTO `leitor` (`id_leitor`, `nome`, `email`) VALUES
(52072421, 'Fabio Lima', 'fabiolima@email.com'),
(67300466, 'Julia Costa', 'julia@email.com'),
(83385315, 'Claudia Dias', 'cla@email.com'),
(83468771, 'Leandro Gomes', 'le@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `ano_publicacao` int(4) NOT NULL,
  `editora` varchar(60) NOT NULL,
  `cod_autor` int(11) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `cod_autor` (`cod_autor`),
  KEY `cod_genero` (`cod_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `nome`, `ano_publicacao`, `editora`, `cod_autor`, `cod_genero`) VALUES
(1, 'O que o Sol faz com as flores', 2018, 'Planeta', 56748570, 2),
(2, 'Textos cruÃ©is demais para serem lidos rapidamente', 2017, 'Globo Alt', 86600112, 2),
(3, 'As mentiras que os homens contam', 2015, 'Objetiva', 63233281, 6),
(4, 'O nariz e outras cronicas', 2002, 'Atica', 63233281, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento_literario`
--

CREATE TABLE IF NOT EXISTS `movimento_literario` (
  `id_movimento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_movimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `movimento_literario`
--

INSERT INTO `movimento_literario` (`id_movimento`, `nome`) VALUES
(1, 'ContemporÃ¢neo '),
(2, 'Barroco'),
(3, 'Modernismo'),
(4, 'PÃ³s Modernismo'),
(5, 'Sem Movimento Definido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `permissao` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `permissao`) VALUES
(1, 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(6793954, 'conceicao@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(52072421, 'fabiolima@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(56748570, 'rupi@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(63233281, 'verissimo@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(67300466, 'julia@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(83385315, 'cla@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(83468771, 'le@email.com', 'c20ad4d76fe97759aa27a0c99bff6710', 3),
(86600112, 'igorsilva@email.com', '202cb962ac59075b964b07152d234b70', 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`cod_movimento`) REFERENCES `movimento_literario` (`id_movimento`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`cod_autor`) REFERENCES `autor` (`id_autor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`cod_genero`) REFERENCES `genero_literario` (`id_genero`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
