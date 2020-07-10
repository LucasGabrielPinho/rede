-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jul-2020 às 01:00
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_redesocial`
--
CREATE DATABASE IF NOT EXISTS `bd_redesocial` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_redesocial`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `comentCodigo` int(11) NOT NULL,
  `FK_postCodigo` int(11) NOT NULL,
  `FK_usuCodigo` int(11) NOT NULL,
  `comentario` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`comentCodigo`, `FK_postCodigo`, `FK_usuCodigo`, `comentario`) VALUES
(1, 1, 2, 'TU É UM FERRO SEU PATO'),
(2, 1, 3, 'Joga muito, parece o faker'),
(4, 6, 7, 'Você é noob demais, vamo x1'),
(5, 6, 8, 'Vamo dale entÃ£o'),
(7, 7, 7, 'isso ai Ã© pokemon po'),
(8, 7, 6, 'ah vÃ¡');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_jogos`
--

CREATE TABLE `tb_jogos` (
  `jogCodigo` int(11) NOT NULL,
  `jogNome` varchar(100) COLLATE utf8_bin NOT NULL,
  `jogDesc` varchar(300) COLLATE utf8_bin NOT NULL,
  `jogImg` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_jogos`
--

INSERT INTO `tb_jogos` (`jogCodigo`, `jogNome`, `jogDesc`, `jogImg`) VALUES
(1, 'League of Legends', 'Jogo que faz você passar ódio mortal todos os dias da sua vida.', ''),
(2, 'CS:GO', 'Jogo de tiro com mais hack do que point blank.', ''),
(3, 'Tibia', 'O melhor jogo de RPG já criado na face da terra!', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_likes`
--

CREATE TABLE `tb_likes` (
  `likeCodigo` int(11) NOT NULL,
  `FK_usuCodigo` int(11) NOT NULL,
  `FK_postCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `postCodigo` int(11) NOT NULL,
  `postConteudo` varchar(300) COLLATE utf8_bin NOT NULL,
  `postImg` varchar(300) COLLATE utf8_bin NOT NULL,
  `FK_usuCodigo` int(11) NOT NULL,
  `FK_jogCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`postCodigo`, `postConteudo`, `postImg`, `FK_usuCodigo`, `FK_jogCodigo`) VALUES
(1, 'Jogando LOLZINHO cozamigo', 'WhatsApp Image 2020-06-30 at 09.22.36.jpeg', 7, 1),
(5, 'Jogando o melhor jogo do mundo', 'WhatsApp Image 2020-05-18 at 02.17.15.jpeg', 7, 3),
(6, 'Jogando o jogo com mais cheats na histÃ³ria da humanidade', 'download-counter-strike-png-images-transparent-gallery-advertisement-571.png', 8, 2),
(7, 'UASEHASR', 'Team_Leaders.png', 6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_seguidores`
--

CREATE TABLE `tb_seguidores` (
  `segCodigo` int(11) NOT NULL,
  `FK_usuCodigo` int(11) NOT NULL,
  `FK_usuSegue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usuCodigo` int(11) NOT NULL,
  `usuNome` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuEmail` varchar(80) COLLATE utf8_bin NOT NULL,
  `usuSenha` varchar(30) COLLATE utf8_bin NOT NULL,
  `usuAvatar` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usuCodigo`, `usuNome`, `usuEmail`, `usuSenha`, `usuAvatar`) VALUES
(1, 'Xunda', 'xunda@bol.com.br', 'lula123', 'User.PNG'),
(2, 'Bastião', 'bastiao@yahoo.com.br', 'lula123', '3e2391cf50983e93bd3ba929e2268535.jpg'),
(3, 'Catatau', 'catatau@aol.com.br', 'lula123', 'WhatsApp Image 2020-05-04 at 16.10.06.jpeg'),
(4, 'Rodrigo', 'rodrigo.coninck@hotmail.com', '123', '3e2391cf50983e93bd3ba929e2268535.jpg'),
(6, 'Bruna Gomes', 'dibraldinho@ig.com.br', '456', 'WhatsApp Image 2020-05-04 at 16.10.06.jpeg'),
(7, 'GumÃªrcindo', 'd@d.com', 'lula123', '3e2391cf50983e93bd3ba929e2268535.jpg'),
(8, 'Mario', 'mario@armario.com', 'lula123', '../src/img/default.png'),
(9, 'Dimitri', 'dimitri@rusky.com', 'lula123', '../src/img/default.png'),
(10, 'Bobo', 'b@b.com', 'lula123', '../src/img/default.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuariosjogam`
--

CREATE TABLE `tb_usuariosjogam` (
  `usuJogaCodigo` int(11) NOT NULL,
  `FK_usuCodigo` int(11) NOT NULL,
  `FK_jogCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`comentCodigo`),
  ADD KEY `FK_postCodigoComentario` (`FK_postCodigo`),
  ADD KEY `FK_usuCodigoComentario` (`FK_usuCodigo`);

--
-- Indexes for table `tb_jogos`
--
ALTER TABLE `tb_jogos`
  ADD PRIMARY KEY (`jogCodigo`);

--
-- Indexes for table `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`likeCodigo`),
  ADD KEY `FK_postCodigoLike` (`FK_postCodigo`),
  ADD KEY `FK_usuCodigoLike` (`FK_usuCodigo`);

--
-- Indexes for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD PRIMARY KEY (`postCodigo`),
  ADD KEY `FK_usuCodigoPost` (`FK_usuCodigo`),
  ADD KEY `FK_jogCodigoPost` (`FK_jogCodigo`);

--
-- Indexes for table `tb_seguidores`
--
ALTER TABLE `tb_seguidores`
  ADD PRIMARY KEY (`segCodigo`),
  ADD KEY `FK_usuCodigo` (`FK_usuCodigo`),
  ADD KEY `FK_usuSegue` (`FK_usuSegue`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usuCodigo`),
  ADD UNIQUE KEY `usuEmail` (`usuEmail`);

--
-- Indexes for table `tb_usuariosjogam`
--
ALTER TABLE `tb_usuariosjogam`
  ADD PRIMARY KEY (`usuJogaCodigo`),
  ADD KEY `FK_jogCodigo` (`FK_jogCodigo`),
  ADD KEY `FK_usuCodigoJogo` (`FK_usuCodigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `comentCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jogos`
--
ALTER TABLE `tb_jogos`
  MODIFY `jogCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_likes`
--
ALTER TABLE `tb_likes`
  MODIFY `likeCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  MODIFY `postCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_seguidores`
--
ALTER TABLE `tb_seguidores`
  MODIFY `segCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usuCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_usuariosjogam`
--
ALTER TABLE `tb_usuariosjogam`
  MODIFY `usuJogaCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD CONSTRAINT `FK_postCodigoComentario` FOREIGN KEY (`FK_postCodigo`) REFERENCES `tb_postagens` (`postCodigo`),
  ADD CONSTRAINT `FK_usuCodigoComentario` FOREIGN KEY (`FK_usuCodigo`) REFERENCES `tb_usuarios` (`usuCodigo`);

--
-- Limitadores para a tabela `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD CONSTRAINT `FK_postCodigoLike` FOREIGN KEY (`FK_postCodigo`) REFERENCES `tb_postagens` (`postCodigo`),
  ADD CONSTRAINT `FK_usuCodigoLike` FOREIGN KEY (`FK_usuCodigo`) REFERENCES `tb_usuarios` (`usuCodigo`);

--
-- Limitadores para a tabela `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD CONSTRAINT `FK_jogCodigoPost` FOREIGN KEY (`FK_jogCodigo`) REFERENCES `tb_jogos` (`jogCodigo`),
  ADD CONSTRAINT `FK_usuCodigoPost` FOREIGN KEY (`FK_usuCodigo`) REFERENCES `tb_usuarios` (`usuCodigo`);

--
-- Limitadores para a tabela `tb_seguidores`
--
ALTER TABLE `tb_seguidores`
  ADD CONSTRAINT `FK_usuCodigo` FOREIGN KEY (`FK_usuCodigo`) REFERENCES `tb_usuarios` (`usuCodigo`),
  ADD CONSTRAINT `FK_usuSegue` FOREIGN KEY (`FK_usuSegue`) REFERENCES `tb_usuarios` (`usuCodigo`);

--
-- Limitadores para a tabela `tb_usuariosjogam`
--
ALTER TABLE `tb_usuariosjogam`
  ADD CONSTRAINT `FK_jogCodigo` FOREIGN KEY (`FK_jogCodigo`) REFERENCES `tb_jogos` (`jogCodigo`),
  ADD CONSTRAINT `FK_usuCodigoJogo` FOREIGN KEY (`FK_usuCodigo`) REFERENCES `tb_usuarios` (`usuCodigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
