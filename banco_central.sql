-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2017 às 23:50
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_central`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bc_agencias`
--

CREATE TABLE `bc_agencias` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `nr_agencia` varchar(5) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `id_uf` int(9) NOT NULL,
  `cep` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `bc_agencias`
--

INSERT INTO `bc_agencias` (`id`, `nome`, `nr_agencia`, `id_banco`, `endereco`, `cidade`, `id_uf`, `cep`) VALUES
(3, 'Agencia Teste', '12345', 12, 'Endereco Teste', 'Cidade Teste', 27, '1234567'),
(4, 'jkdfsajk', '87676', 10, '56yuuihjj', 'ghbjklknbk', 1, '6578900'),
(5, 'ghloijpoiulkhgj', '65897', 10, '566hbhkjhlk', 'fghjkll', 1, '4569870');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bc_bancos`
--

CREATE TABLE `bc_bancos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cnpj` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bc_bancos`
--

INSERT INTO `bc_bancos` (`id`, `codigo`, `nome`, `cnpj`) VALUES
(1, '213', 'Banco Teste', '5852345284'),
(7, '32232', 'wqwqwewq', '323232323'),
(8, '23232', 'kkmjknmnnnmmlmklnkljlj6567', '34567890'),
(10, '121', 'dasdas', '123121'),
(11, '12212', 'defsdfsdfsdf', '32232332'),
(12, '98765', 'hgjklkjhghjkojihgyfghjk', '567898675465');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bc_clientes`
--

CREATE TABLE `bc_clientes` (
  `id` int(9) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(4) NOT NULL,
  `cep` varchar(7) NOT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `telefone` varchar(16) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `id_uf` int(11) NOT NULL,
  `data_inicial` varchar(8) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1',
  `conta` varchar(8) NOT NULL,
  `saldo` decimal(18,2) NOT NULL,
  `data_inclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_conta` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bc_clientes`
--

INSERT INTO `bc_clientes` (`id`, `cpf`, `rg`, `nome`, `rua`, `numero`, `cep`, `complemento`, `telefone`, `cidade`, `id_uf`, `data_inicial`, `id_agencia`, `ativo`, `conta`, `saldo`, `data_inclusao`, `tipo_conta`) VALUES
(6, '34567345673', '4536475436', 'Jardel', 'Linha 5', '3546', '3547578', 'Pra fora', '6876556354758657', 'Agudo City', 1, '12122002', 3, 0, '79277038', '0.00', '2017-05-04 17:36:35', ''),
(7, '34568796869', '7643545796', 'Gui', 'ghjfjhgfg', '4675', '8568578', 'hfgfjhgj', '6575876875758567', 'teste', 1, '12122000', 3, 1, '44252624', '23741.00', '2017-05-04 17:36:35', ''),
(8, '54657895547', '7547646746', 'jhxkjdfjkhkjjkhjhjlkjtes', 'hgffgkjhg', '7467', '567567', 'hjgjkghjgjh', '57889876', 'teste', 1, '12122002', 3, 1, '11538085', '0.00', '2017-05-04 17:36:35', ''),
(9, '47658698967', '6857686897', 'juca', 'jhgg', '7658', '876875', 'hgkjghh', '6857587', 'teste', 1, '12122002', 5, 1, '33431091', '0.00', '2017-05-04 17:38:07', ''),
(10, '56575676575', '6675875765', 'guilherme', '56785656gjhjhj', '7687', '7689768', 'gkjgk', '76987689769876', 'santiago', 1, '12122002', 3, 1, '49932556', '0.00', '2017-05-04 17:40:13', ''),
(11, '23456789345', '3456734567', 'dejair', 'fgvjhbkh', '5678', '45678', 'hcv', '456897', 'ghfjgjgfgdh', 1, '56784564', 3, 1, '25979614', '4.00', '2017-05-04 18:07:09', 'poupanca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bc_estados`
--

CREATE TABLE `bc_estados` (
  `id` int(11) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bc_estados`
--

INSERT INTO `bc_estados` (`id`, `sigla`, `descricao`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bc_retirada_deposito`
--

CREATE TABLE `bc_retirada_deposito` (
  `id` int(11) NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_mov` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bc_retirada_deposito`
--

INSERT INTO `bc_retirada_deposito` (`id`, `valor`, `id_cliente`, `data_hora`, `tipo_mov`) VALUES
(1, '0.00', 0, '2017-05-04 16:43:10', ''),
(2, '120.00', 0, '2017-05-04 17:22:03', 'deposito'),
(3, '46757.00', 11, '2017-05-04 18:29:43', 'deposito'),
(4, '3456.00', 11, '2017-05-04 18:29:47', 'deposito'),
(5, '4567.00', 11, '2017-05-04 18:30:24', 'deposito'),
(6, '12.00', 11, '2017-05-04 18:31:21', 'deposito'),
(7, '21.00', 11, '2017-05-04 18:36:28', 'deposito'),
(8, '21.00', 11, '2017-05-04 18:36:33', 'deposito'),
(9, '23741.00', 7, '2017-05-04 18:36:57', 'deposito'),
(10, '132.00', 11, '2017-05-04 18:42:45', 'deposito'),
(11, '132.00', 11, '2017-05-04 18:43:18', 'deposito'),
(12, '132.00', 11, '2017-05-04 18:46:29', 'deposito'),
(13, '43.00', 11, '2017-05-04 18:46:34', 'deposito'),
(14, '4.00', 11, '2017-05-04 18:47:59', 'retirada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bc_usuarios`
--

CREATE TABLE `bc_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bc_usuarios`
--

INSERT INTO `bc_usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bc_agencias`
--
ALTER TABLE `bc_agencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agencia_banco` (`id_banco`),
  ADD KEY `fk_id_uf` (`id_uf`);

--
-- Indexes for table `bc_bancos`
--
ALTER TABLE `bc_bancos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `uk_cnpj` (`cnpj`),
  ADD UNIQUE KEY `uk_codigo` (`codigo`);

--
-- Indexes for table `bc_clientes`
--
ALTER TABLE `bc_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_conta` (`conta`),
  ADD KEY `fk_id_uf_cliente` (`id_uf`),
  ADD KEY `fk_id_agemcia` (`id_agencia`);

--
-- Indexes for table `bc_estados`
--
ALTER TABLE `bc_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bc_retirada_deposito`
--
ALTER TABLE `bc_retirada_deposito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bc_usuarios`
--
ALTER TABLE `bc_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bc_agencias`
--
ALTER TABLE `bc_agencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bc_bancos`
--
ALTER TABLE `bc_bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bc_clientes`
--
ALTER TABLE `bc_clientes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bc_estados`
--
ALTER TABLE `bc_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `bc_retirada_deposito`
--
ALTER TABLE `bc_retirada_deposito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bc_usuarios`
--
ALTER TABLE `bc_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bc_agencias`
--
ALTER TABLE `bc_agencias`
  ADD CONSTRAINT `fk_agencia_banco` FOREIGN KEY (`id_banco`) REFERENCES `bc_bancos` (`id`),
  ADD CONSTRAINT `fk_id_uf` FOREIGN KEY (`id_uf`) REFERENCES `bc_estados` (`id`);

--
-- Limitadores para a tabela `bc_clientes`
--
ALTER TABLE `bc_clientes`
  ADD CONSTRAINT `fk_id_agemcia` FOREIGN KEY (`id_agencia`) REFERENCES `bc_agencias` (`id`),
  ADD CONSTRAINT `fk_id_uf_cliente` FOREIGN KEY (`id_uf`) REFERENCES `bc_estados` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
