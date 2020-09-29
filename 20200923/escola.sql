-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 29-Set-2020 às 19:02
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `escola`
--
CREATE DATABASE IF NOT EXISTS `escola` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `escola`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `prontuario` int(8) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  PRIMARY KEY (`prontuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`prontuario`, `nome`, `email`, `data_nasc`, `sexo`) VALUES
(1, 'Joao', 'joao@email.com', '2000-01-01', 'M'),
(2, 'Maria', 'maria@email.com', '1999-02-02', 'F'),
(3, 'Jose', 'jose@email.com', '2000-03-01', 'M'),
(4, 'Antonio', 'antonio@email.com', '1999-05-02', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `cod_prof` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`),
  KEY `cod_prof` (`cod_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome`, `descricao`, `cod_prof`) VALUES
(1, 'Trigonometria', 'Estudo dos triângulos', 1),
(2, 'Química Analítica ', 'quantificação de espécies ou elementos químicos ', 2),
(3, 'Aritmética ', 'parte da matemática que lida com as operações numéricas', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `prontuario` int(8) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `formacao` varchar(100) NOT NULL,
  PRIMARY KEY (`prontuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`prontuario`, `nome`, `formacao`) VALUES
(1, 'Carlos', 'Matemática'),
(2, 'Mariela ', 'Química');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `cod_aluno` int(11) NOT NULL,
  `cod_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id_ad`),
  KEY `cod_aluno` (`cod_aluno`),
  KEY `cod_disciplina` (`cod_disciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_ad`, `cod_aluno`, `cod_disciplina`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 3, 2),
(5, 4, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`cod_prof`) REFERENCES `professor` (`prontuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`prontuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
