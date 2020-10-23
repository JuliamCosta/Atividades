-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Out-2020 às 14:17
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `musicplayer`
--
CREATE DATABASE IF NOT EXISTS `musicplayer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `musicplayer`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banda`
--

CREATE TABLE IF NOT EXISTS `banda` (
  `id_banda` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_banda`),
  KEY `cod_genero` (`cod_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `banda`
--

INSERT INTO `banda` (`id_banda`, `nome`, `cod_genero`) VALUES
(1, 'Maroon 5', 2),
(2, 'One Direction', 2),
(3, 'The Weeknd ', 2),
(4, 'Backstreet Boys', 2),
(5, 'LegiÃ£o Urbana', 3),
(6, 'Pitty', 3),
(7, 'Skank', 3),
(8, 'Tribalistas', 4),
(9, 'Caetano Veloso', 4),
(10, 'ZÃ© Neto e Cristiano', 5),
(11, 'MarÃ­lia MendonÃ§a ', 5),
(12, 'Thiaguinho', 6),
(13, 'PÃ©ricles', 6),
(14, 'Avicii', 1),
(15, 'David Guetta', 1),
(16, 'The Chainsmokers', 1),
(17, 'Marshmello', 1),
(18, 'Pixote', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome`) VALUES
(1, 'EletrÃ´nica'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'MPB'),
(5, 'Sertanejo'),
(6, 'Pagode');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE IF NOT EXISTS `musica` (
  `id_musica` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_banda` int(11) NOT NULL,
  `youtube` text NOT NULL,
  PRIMARY KEY (`id_musica`),
  KEY `cod_banda` (`cod_banda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`id_musica`, `nome`, `cod_banda`, `youtube`) VALUES
(1, 'The Nights', 14, 'UtF6Jej8yb4'),
(3, 'Waiting For Love', 14, 'cHHLHGNpCSA'),
(4, 'Something Just Like This', 16, '_tNU6dpjIyM'),
(5, 'Blinding Lights', 3, 'H64a2ggVIWc'),
(6, 'Starboy', 3, '3_g2un5M350'),
(7, 'Pais E Filhos', 5, 'bvIMBVBRpJU'),
(8, 'Eduardo E MÃ´nica', 5, 'bvIMBVBRpJU'),
(9, 'Na Sua Estante', 6, 'DP3j6hgS4VY'),
(10, 'MÃ¡scara', 6, 'YRf4jZ1ohK8'),
(11, 'Play Hard', 15, '5dbEhBKGOtY'),
(12, 'Ponto Fraco', 12, 'Zl6X0BLV6bk'),
(13, 'Velha InfÃ¢ncia', 8, 'a-p3bnk928A'),
(14, 'JÃ¡ Sei Namorar', 8, 'VmxqhvnfMvI'),
(15, 'Sozinho', 9, 'j9UbE1slI-Q'),
(16, 'Alone', 17, 'ALZHF5UqnU4'),
(17, 'Sutilmente', 7, 'v3SQTOZO36E'),
(18, 'Vamos Fugir', 7, 'hbgBCZkY1jE'),
(19, 'I Want It That Way ', 4, '4fndeDfaWCg'),
(20, 'Saudade Do Meu Ex', 11, 'dHcpB3DsFyM'),
(21, 'End of the Day', 2, 'AsmHz9JCU4M'),
(22, 'Girls Like You', 1, 'aJOTlE1K90k'),
(23, 'Steal My Girl', 2, 'UpsKGvPjAgw'),
(24, 'NotificaÃ§Ã£o Preferida', 10, 'rYKOuKaWEjg'),
(25, 'Armadura', 10, 'jAhkNmaDG0U'),
(26, 'A Farra Perdeu Pro Amor', 10, 'taCMa3v1OEg'),
(27, 'Mande um Sinal', 18, 'AWlj_b_PPj8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica_playlist`
--

CREATE TABLE IF NOT EXISTS `musica_playlist` (
  `id_musica_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `cod_musica` int(11) NOT NULL,
  `cod_playlist` int(11) NOT NULL,
  PRIMARY KEY (`id_musica_playlist`),
  KEY `cod_musica` (`cod_musica`),
  KEY `cod_playlist` (`cod_playlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Extraindo dados da tabela `musica_playlist`
--

INSERT INTO `musica_playlist` (`id_musica_playlist`, `cod_musica`, `cod_playlist`) VALUES
(1, 1, 1),
(2, 11, 1),
(3, 4, 1),
(4, 16, 1),
(5, 22, 1),
(6, 21, 1),
(7, 5, 1),
(8, 6, 1),
(9, 4, 2),
(10, 22, 2),
(11, 23, 2),
(12, 19, 2),
(13, 14, 2),
(14, 12, 2),
(15, 4, 3),
(16, 16, 3),
(17, 6, 3),
(18, 7, 3),
(19, 10, 3),
(20, 18, 3),
(21, 25, 3),
(22, 20, 3),
(23, 7, 4),
(24, 8, 4),
(25, 9, 4),
(26, 18, 4),
(27, 13, 4),
(28, 25, 4),
(29, 26, 4),
(30, 27, 4),
(31, 7, 5),
(32, 8, 5),
(33, 9, 5),
(34, 17, 5),
(35, 18, 5),
(36, 13, 5),
(37, 14, 5),
(38, 15, 5),
(39, 1, 6),
(40, 4, 6),
(41, 16, 6),
(42, 21, 6),
(43, 23, 6),
(44, 5, 6),
(45, 19, 6),
(46, 7, 6),
(47, 18, 6),
(48, 25, 6),
(49, 27, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_playlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `nome`) VALUES
(1, 'Internacionais'),
(2, 'Fofas'),
(3, 'AleatÃ³rias'),
(4, 'Brasileiras'),
(5, 'ClÃ¡ssicas '),
(6, 'Preferidas');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `banda`
--
ALTER TABLE `banda`
  ADD CONSTRAINT `banda_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`cod_banda`) REFERENCES `banda` (`id_banda`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `musica_playlist`
--
ALTER TABLE `musica_playlist`
  ADD CONSTRAINT `musica_playlist_ibfk_1` FOREIGN KEY (`cod_musica`) REFERENCES `musica` (`id_musica`) ON UPDATE CASCADE,
  ADD CONSTRAINT `musica_playlist_ibfk_2` FOREIGN KEY (`cod_playlist`) REFERENCES `playlist` (`id_playlist`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
