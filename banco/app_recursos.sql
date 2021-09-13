-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2021 às 04:09
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_recursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id_dados` int(20) NOT NULL,
  `cepOrigem` int(8) NOT NULL,
  `cepDestino` int(8) NOT NULL,
  `distanciaCalculada` varchar(40) NOT NULL,
  `horaCadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `horaAlteracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id_dados`, `cepOrigem`, `cepDestino`, `distanciaCalculada`, `horaCadastro`, `horaAlteracao`) VALUES
(22, 90230260, 91790131, '1 Km 0 metros', '2021-09-12 23:40:15', '0000-00-00 00:00:00'),
(23, 91790425, 91790240, '0 Km 500 metros', '2021-09-13 01:29:02', '0000-00-00 00:00:00'),
(24, 91793540, 91790427, '4 Km 700 metros', '2021-09-13 01:30:07', '2021-09-12 22:31:54'),
(25, 91792150, 91790240, '1 Km 200 metros', '2021-09-13 01:30:40', '0000-00-00 00:00:00'),
(26, 91790820, 91790425, '4 Km 200 metros', '2021-09-13 01:31:16', '0000-00-00 00:00:00'),
(27, 91790425, 0, '0 Km 500 metros', '2021-09-13 01:48:02', '2021-09-12 22:48:57'),
(28, 91790425, 0, '', '2021-09-13 01:49:14', '0000-00-00 00:00:00'),
(29, 0, 0, '', '2021-09-13 01:49:24', '0000-00-00 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id_dados`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id_dados` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
