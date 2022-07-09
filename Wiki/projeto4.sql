-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2022 às 01:04
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto4`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id` int(11) NOT NULL,
  `permissao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id`, `permissao`, `created`, `modified`) VALUES
(1, 'comum', '2022-04-13 18:53:42', NULL),
(2, 'administrador', '2022-04-13 18:53:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `nome` varchar(150) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `descricao` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `imagem` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `autor`, `nome`, `descricao`, `imagem`, `usuario_id`, `created`, `modified`) VALUES
(74, 'matheus', 'Review do jogo', 'Nullam lacinia vitae ipsum ac euismod. Duis volutpat ultricies enim in tempus. Phasellus aliquam purus sodales pellentesque varius.  Phasellus aliquam purus sodales pellentesque varius.  Duis volutpat ultricies enim in tempus.', '62bba4316edbf.png', 31, '2022-06-28 21:59:59', '2022-06-28 22:00:33'),
(75, 'matheus', 'Mob diferente', 'Aenean non augue vehicula, maximus lacus vel, rhoncus odio. Donec vel metus sed augue pellentesque aliquam in ac mauris. Donec bibendum nisi justo, a pulvinar justo malesuada at. Quisque porta lacus non purus dignissim, eget posuere velit tristique. In faucibus erat quis turpis ullamcorper viverra. Proin pharetra at erat non vehicula. Quisque porta lacus non purus dignissim, eget posuere velit tristique. In faucibus erat quis turpis ullamcorper viverra. Proin pharetra at erat non vehicula.', '62bba4e337cd9.png', 31, '2022-06-28 22:02:20', '2022-06-28 22:03:31'),
(79, 'roma', 'Meu jogo crashou', 'In eleifend pretium ex. Nulla facilisi. Quisque ante sapien, euismod ut placerat at, suscipit vel risus. Ut placerat maximus erat, a dapibus lectus rhoncus vel. Vivamus mattis ipsum a iaculis tincidunt. Maecenas tincidunt porttitor pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;', '62bbc17d23033.webp', 32, '2022-06-29 00:05:33', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissao_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `permissao_id`, `created`, `modified`) VALUES
(30, 'marcos', '123', 'marcos@gmail.com', 1, '2022-06-28 21:36:50', '2022-06-28 23:38:17'),
(31, 'matheus', '123', 'matheus@gmail.com', 1, '2022-06-28 21:37:01', '2022-06-28 23:38:21'),
(32, 'roma', '123', 'roma@hotmail.com', 2, '2022-06-28 23:26:11', '2022-06-28 23:38:25'),
(33, 'emanuel', '123', 'emanuel@outlook.com', 2, '2022-06-28 23:26:30', '2022-06-28 23:38:30'),
(34, 'tiago', '123', 'tiago@gmail.com', 1, '2022-06-28 23:26:50', '2022-06-28 23:38:35'),
(35, 'pedro', '123', 'pedro404@gmail.com', 1, '2022-06-28 23:27:17', '2022-06-28 23:38:39'),
(36, 'peter', '123', 'pe_ter@gmail.com', 1, '2022-06-28 23:36:34', '2022-06-28 23:38:42'),
(37, 'ana', '123', 'ana@hotmail.com', 1, '2022-06-28 23:37:01', '2022-06-28 23:38:46'),
(38, 'steve', '123', 'steve@outlook.com', 1, '2022-06-28 23:37:25', '2022-06-28 23:40:14'),
(39, 'roger', 'roger', 'roger123@roger.com', 1, '2022-06-28 23:42:43', NULL),
(40, 'admin', '1', 'admin@admin.com', 2, '2022-07-09 20:01:16', '2022-07-09 20:01:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissao_id` (`permissao_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
