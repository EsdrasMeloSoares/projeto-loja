-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 18/06/2024 às 03:03
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int NOT NULL,
  `pedido_id` int DEFAULT NULL,
  `produto_id` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id`, `pedido_id`, `produto_id`, `quantidade`, `preco_unitario`) VALUES
(1, 1, 1, 1, 1299.99),
(2, 2, 1, 1, 1299.99),
(3, 3, 1, 1, 1299.99),
(4, 4, 1, 1, 1299.99),
(5, 5, 1, 1, 1299.99),
(6, 7, 1, 1, 1299.99),
(7, 8, 1, 1, 1299.99),
(8, 9, 1, 1, 1299.99),
(9, 19, 1, 1, 1299.99),
(10, 20, 1, 1, 1299.99),
(11, 20, 2, 1, 12.00),
(12, 22, 1, 1, 45.99),
(13, 24, 2, 1, 12.00),
(14, 25, 1, 1, 45.99),
(15, 26, 1, 1, 45.99),
(16, 27, 1, 1, 45.99),
(17, 28, 2, 1, 12.00),
(18, 29, 1, 1, 45.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int NOT NULL,
  `usuario_id` int DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `endereco_entrega` varchar(255) DEFAULT 'N/A',
  `metodo_pagamento` varchar(50) NOT NULL,
  `confirmado` int DEFAULT '1',
  `pedido_chegou` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'false',
  `codigo_pix` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `data_pedido`, `total`, `endereco_entrega`, `metodo_pagamento`, `confirmado`, `pedido_chegou`, `codigo_pix`) VALUES
(1, 1, '2024-05-21 17:28:50', 1299.99, '', '', 1, '0', NULL),
(2, 1, '2024-05-21 17:30:26', 1299.99, 'Pedra Branca', 'cartao_credito', 1, '0', NULL),
(3, 1, '2024-05-21 17:34:35', 1299.99, 'asdadsadasd', 'pix', 1, '0', NULL),
(4, 1, '2024-05-21 17:35:18', 1299.99, 'asdadsadasd', 'pix', 1, '0', NULL),
(5, 1, '2024-05-21 17:37:27', 1299.99, 'asdadsadasd', 'pix', 1, '0', '123456789012345678912345678905'),
(6, 1, '2024-05-21 17:38:02', 1299.99, 'asdadsadasd', 'pix', 1, '0', '123456789012345678912345678906'),
(7, 1, '2024-05-21 17:40:26', 1299.99, 'Pedra Branca', 'pix', 1, '0', '123456789012345678912345678907'),
(8, 1, '2024-05-21 17:47:45', 1299.99, 'Pedra Branca', 'pix', 1, '0', 'CODIGO_PIX_EXEMPLO_8'),
(9, 2, '2024-05-21 19:06:47', 1299.99, '123456789087654', 'pix', 1, '0', '1234567897654329'),
(10, 2, '2024-05-21 19:09:09', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543210'),
(11, 2, '2024-05-21 19:09:16', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543211'),
(12, 2, '2024-05-21 19:09:20', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543212'),
(13, 2, '2024-05-21 19:09:23', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543213'),
(14, 2, '2024-05-21 19:09:26', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543214'),
(15, 2, '2024-05-21 19:09:28', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543215'),
(16, 2, '2024-05-21 19:09:45', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543216'),
(17, 2, '2024-05-21 19:09:48', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543217'),
(18, 2, '2024-05-21 19:10:04', 1299.99, '123456789087654', 'pix', 1, '0', '12345678976543218'),
(19, 2, '2024-05-21 19:10:11', 1299.99, '234567890-=', 'pix', 1, '0', '12345678976543219'),
(20, 1, '2024-05-21 21:38:35', 1311.99, '23457890-=', 'pix', 1, '0', '12345678976543220'),
(21, 1, '2024-05-21 21:39:53', 1311.99, '23457890-=', 'pix', 1, '0', '12345678976543221'),
(22, 1, '2024-05-22 14:33:20', 45.99, 'Pedra Branca', 'pix', 1, '0', '12345678976543222'),
(23, 1, '2024-05-22 14:34:00', 45.99, 'Pedra Branca', 'pix', 1, '0', '12345678976543223'),
(24, 1, '2024-05-22 14:34:18', 12.00, 'Pedra Branca CE', 'pix', 1, '0', '12345678976543224'),
(25, 1, '2024-05-22 14:35:02', 45.99, '234567890', 'pix', 1, '0', '12345678976543225'),
(26, 1, '2024-05-22 14:44:21', 45.99, 'Tra', 'pix', 1, '1', '12345678976543226'),
(27, 1, '2024-05-22 15:00:07', 45.99, '1234567890-=', 'pix', 1, 'nao', '12345678976543227'),
(28, 2, '2024-05-22 15:00:43', 12.00, '2347890-=', 'pix', 1, 'nao', '12345678976543228'),
(29, 1, '2024-06-03 18:58:01', 45.99, 'Furtunato Silva, 144, Bom principio', 'pix', 1, 'false', '12345678976543229');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text,
  `preco` decimal(10,2) DEFAULT NULL,
  `estoque` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `estoque`) VALUES
(1, 'Pneu de caminhão!', 'Pneu de caminhão 12 libras', 45.99, 22),
(2, 'Macaco de pelucia', 'asdfgh', 12.00, 123);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@hits.com', '$2y$10$hA/B33y4JUDdpY1i7edxSePudD2RMQRQ/kIf2/b04.1GpOrmT1KoG', 1),
(2, 'usuario', 'usuario@hits.com', '$2y$10$uTdhP5GBB33LQMKdijjuyOnw0I/sPw0pynYeZbZ8dNMSXReQuLJVq', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
