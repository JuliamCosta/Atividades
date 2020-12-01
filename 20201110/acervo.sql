-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 29-Nov-2020 às 22:55
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
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cod_movimento` int(11) NOT NULL,
  PRIMARY KEY (`id_autor`),
  KEY `cod_movimento` (`cod_movimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id_autor`, `nome`, `sobrenome`, `cod_movimento`) VALUES
(1, 'Clarice', 'Lispector', 6),
(4, 'Machado', 'de Assis', 9),
(6, 'Castro ', 'Alves ', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero_literario`
--

CREATE TABLE IF NOT EXISTS `genero_literario` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `genero_literario`
--

INSERT INTO `genero_literario` (`id_genero`, `nome`, `descricao`) VALUES
(4, 'Romance', 'Narrativas longas, com vÃ¡rios conflitos e uma complexa rede de personagens.'),
(6, 'Poema', 'Textos escritos em verso que apresentam visÃµes particulares sobre si, a existÃªncia ou a prÃ³pria linguagem.'),
(7, 'Biografia', 'Narra a histÃ³ria da vida de alguÃ©m.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `ano_publicacao` int(4) NOT NULL,
  `editora` varchar(100) NOT NULL,
  `cod_autor` int(11) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `cod_autor` (`cod_autor`),
  KEY `cod_genero` (`cod_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `nome`, `ano_publicacao`, `editora`, `cod_autor`, `cod_genero`) VALUES
(2, 'De Corpo Inteiro', 1975, 'Rocco', 1, 7),
(3, 'Dom Casmurro', 1899, 'Livraria Garnier', 4, 4),
(5, 'O Navio Negreiro', 1880, 'Nacional', 6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento_literario`
--

CREATE TABLE IF NOT EXISTS `movimento_literario` (
  `id_movimento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_movimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `movimento_literario`
--

INSERT INTO `movimento_literario` (`id_movimento`, `nome`) VALUES
(5, 'Romantismo'),
(6, 'Modernismo'),
(9, 'Realismo');

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
