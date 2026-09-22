-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jan-2020 às 15:36
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `situacao` enum('Ativo','Bloqueado') DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`, `situacao`) VALUES
(1, 'Camiseta', 'Ativo'),
(2, 'Tenis', 'Ativo'),
(3, 'Chinelo', 'Ativo'),
(4, 'Bermudas', 'Ativo'),
(5, 'Bonés', 'Ativo'),
(6, 'Óculos', 'Ativo'),
(7, 'Cuecas e Meias', 'Ativo'),
(8, 'Conjuntos', 'Ativo'),
(9, 'Bolsas', 'Ativo'),
(10, 'Blusas', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cpf` varchar(16) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacao` enum('Ativo','Bloqueado') DEFAULT 'Ativo',
  `sexo` enum('M','F') DEFAULT 'M',
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `email`, `senha`, `situacao`, `sexo`, `data_nascimento`, `telefone`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `uf`, `data_cadastro`) VALUES
('111.111.111-11', 'Lucas Inocêncio de França', 'teste@gmail.com', '2e6f9b0d5885b6010f9167787445617f553a735f', 'Ativo', 'M', '2000-01-01', '(12)3333-4444', 'Rua de Teste', '123', 'Centro ', 'São José dos Campos', '12244555', 'SP', '2020-01-11 12:16:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `arquivo` varchar(150) NOT NULL,
  `detalhes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_vendas`
--

DROP TABLE IF EXISTS `item_vendas`;
CREATE TABLE `item_vendas` (
  `id_item` int(11) NOT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nome_produto` varchar(250) NOT NULL,
  `detalhes` text,
  `valor` float(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `situacao` enum('Ativo','Bloqueado') DEFAULT 'Ativo',
  `destaque` enum('S','N') DEFAULT 'N',
  `visitas` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `foto_principal` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_categoria`, `nome_produto`, `detalhes`, `valor`, `quantidade`, `situacao`, `destaque`, `visitas`, `data_cadastro`, `foto_principal`) VALUES
(1, 2, 'Mizuno pro 7', 'tênis para todas as atividades', 400.00, 2, 'Ativo', 'S', 0, '2020-01-12 18:23:55', '_20200109_105029.jpg'),
(2, 2, 'Mizuno pro 6', NULL, 350.00, 2, 'Ativo', 'N', 0, NULL, '_20200109_110335.jpg'),
(3, 2, 'mizuno pro 8', NULL, 450.00, 2, 'Ativo', 'S', 0, NULL, '_20200109_105001.jpg'),
(4, 2, 'mizuno pro 9', NULL, 500.00, 3, 'Ativo', 'S', 0, NULL, '_20200109_105020.jpg'),
(5, 4, 'Bermuda mcd', NULL, 80.00, 2, 'Ativo', 'S', 0, NULL, '_20200109_110401.jpg'),
(6, 8, 'Conjunto ', NULL, 250.00, 1, 'Ativo', 'S', 0, NULL, '_20200109_110410.jpg'),
(7, 1, 'camisa manchester city', NULL, 100.00, 5, 'Ativo', 'S', 0, NULL, '_20200109_104725.jpg'),
(8, 9, 'pochete', 'refletivel', 70.00, 3, 'Ativo', 'S', 0, NULL, '_20200109_104525.jpg'),
(9, 5, 'boné lacoste', NULL, 120.00, 6, 'Ativo', 'S', 0, NULL, '_20200109_104610.jpg'),
(10, 3, 'Chinelo reef', 'Abridor de garrafa', 250.00, 2, 'Ativo', 'S', 0, NULL, '_20200109_110456.jpg'),
(11, 7, 'Calvin klein', NULL, 25.00, 10, 'Ativo', 'S', 0, NULL, '_20200109_104553.jpg'),
(12, 6, 'Óculos oakley', NULL, 90.00, 3, 'Ativo', 'N', 0, NULL, '_20200109_104511.jpg'),
(13, 3, 'Chinelo reef', NULL, 125.00, 4, 'Ativo', 'S', 0, NULL, '_20200109_110448.jpg'),
(14, 3, 'Chinelo reef ', 'abridor de garrafa', 200.00, 2, 'Ativo', 'S', 0, NULL, '_20200109_110433.jpg'),
(15, 3, 'chinelo reef', NULL, 95.00, 3, 'Ativo', 'N', 0, NULL, '_20200109_110422.jpg'),
(16, 4, 'Bermuda mcd', NULL, 80.00, 5, 'Ativo', 'N', 0, NULL, '_20200109_110354.jpg'),
(17, 2, 'Mizuno pro 6', NULL, 350.00, 2, 'Ativo', 'N', 0, NULL, '_20200109_110344.jpg'),
(18, 8, 'Conjunto tommy', NULL, 130.00, 4, 'Ativo', 'S', 0, NULL, '_20200109_110326.jpg'),
(19, 4, 'Bermuda mcd', NULL, 80.00, 3, 'Ativo', 'N', 0, NULL, '_20200109_110317.jpg'),
(20, 4, 'Bermuda volcom', NULL, 80.00, 2, 'Ativo', 'S', 0, NULL, '_20200109_110259.jpg'),
(21, 2, 'Nike air max plus', NULL, 400.00, 2, 'Ativo', 'N', 0, NULL, '_20200109_110307.jpg'),
(22, 2, 'Nike 12 molas', NULL, 500.00, 6, 'Ativo', 'S', 0, NULL, '_20200109_105115.jpg'),
(23, 2, 'Nike air max', NULL, 300.00, 2, 'Ativo', 'N', 0, NULL, '_20200109_105131.jpg'),
(24, 2, 'Nike air max', NULL, 300.00, 2, 'Ativo', 'S', 0, NULL, '_20200109_105124.jpg'),
(25, 2, 'Mizuno pro 6', 'camaleão ', 400.00, 5, 'Ativo', 'S', 0, NULL, '_20200109_105106.jpg'),
(26, 2, 'Nike 12 molas', 'edição ilimitada ', 600.00, 3, 'Ativo', 'S', 0, NULL, '_20200109_105056.jpg'),
(27, 2, 'Mizuno pro 8', NULL, 450.00, 3, 'Ativo', 'S', 0, NULL, '_20200109_105047.jpg'),
(28, 2, 'Mizuno pro 9', NULL, 500.00, 5, 'Ativo', 'S', 0, NULL, '_20200109_105011.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `login` varchar(25) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacao` enum('Ativo','Bloqueado') DEFAULT NULL,
  `acesso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`login`, `nome`, `senha`, `situacao`, `acesso`) VALUES
('admin', 'Lucas Inocêncio de França', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ativo', '2020-01-12 20:30:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `data_venda` datetime DEFAULT NULL,
  `cpf` varchar(16) NOT NULL,
  `forma_pagto` enum('Boleto','Cartão') DEFAULT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `valor_total` float(10,2) DEFAULT NULL,
  `valor_frete` float(5,2) DEFAULT NULL,
  `prazo_entrega` varchar(25) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `situacao` enum('Aberto','Enviado','Entregue') DEFAULT 'Aberto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `FK_id_produto` (`id_produto`);

--
-- Indexes for table `item_vendas`
--
ALTER TABLE `item_vendas`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `FK_id_venda` (`id_venda`),
  ADD KEY `FK_id_produtos` (`id_produto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `FK_id_categoria` (`id_categoria`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `FK_cpf_cliente` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_vendas`
--
ALTER TABLE `item_vendas`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
