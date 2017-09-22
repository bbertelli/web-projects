-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2016 às 17:11
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `link`
--

CREATE TABLE `link` (
  `id` bigint(255) NOT NULL,
  `titulo` text NOT NULL,
  `link` text NOT NULL,
  `data` date NOT NULL,
  `curtido` bigint(255) NOT NULL,
  `visualizado` bigint(255) NOT NULL,
  `tags` text NOT NULL,
  `categoria` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `link`
--

INSERT INTO `link` (`id`, `titulo`, `link`, `data`, `curtido`, `visualizado`, `tags`, `categoria`) VALUES
(1, 'GTA V - O carro MAIS RÁPIDO do MUNDO!', 'https://www.youtube.com/embed/Hq-nZoaB9PI', '2016-08-02', 0, 42, 'carro;veículo;corrida;game', 'Carros'),
(2, 'GTA V Online: DESAFIO do PIOR CARRO DO JOGO!', 'https://www.youtube.com/embed/rm42nXhXxec', '2016-08-02', 7, 73, 'carro;veículo;corrida;game', 'Carros'),
(3, 'COMO LAVAR O CARRO', 'https://www.youtube.com/embed/89CLHnwqPAM', '2016-06-08', 33, 143, 'carro;veículo;corrida;game', 'Carros'),
(4, 'O Melhor Jogo De Carro Do Mundo', 'https://www.youtube.com/embed/qlu3-83wvTY', '2016-05-09', 345, 1233, 'carro;veículo;corrida;game', 'Motos'),
(5, 'TIRO DE RASPÃO EM TANQUE NA SÍRIA', 'https://www.youtube.com/embed/P7nos5tK6kk', '2015-02-10', 6, 29, 'guerra', 'Motos'),
(6, 'STAND UP', 'https://www.youtube.com/embed/aiHDYRHxtgM', '2014-10-15', 0, 0, 'standup', 'Motos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
