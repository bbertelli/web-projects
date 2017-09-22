-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2015 às 16:53
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `painelci`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `titulo`, `data`, `hora`, `obs`) VALUES
(10, 'Almoço', '2015-06-11', '16:20:00', 'Almoço com panutto'),
(11, 'Ler A Biblia', '2015-05-03', '13:20:00', 'pcp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operacao` varchar(45) NOT NULL,
  `query` text NOT NULL,
  `observacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=433 ;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `data_hora`, `operacao`, `query`, `observacao`) VALUES
(167, 'bruno', '2015-03-24 18:41:24', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(168, 'joao', '2015-03-24 18:41:44', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(169, 'joao', '2015-03-24 19:01:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(170, 'bruno', '2015-03-24 19:01:54', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(171, 'joao', '2015-03-24 19:39:32', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(172, 'bruno', '2015-03-24 19:40:14', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(173, 'bruno', '2015-03-26 12:33:35', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(174, 'bruno', '2015-03-26 13:55:21', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(175, 'bruno', '2015-03-26 13:56:01', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(176, 'bruno', '2015-03-26 14:06:03', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(177, 'bruno', '2015-03-26 14:13:19', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(178, 'bruno', '2015-03-26 14:27:02', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(179, 'joao', '2015-03-26 14:28:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(180, 'joao', '2015-03-26 14:30:23', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(181, 'joao', '2015-03-26 14:35:11', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(182, 'bruno', '2015-03-26 14:37:30', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(183, 'joao', '2015-03-26 14:37:45', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(184, 'joao', '2015-03-26 14:47:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(185, 'joao', '2015-03-26 14:48:22', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(186, 'joao', '2015-03-26 14:55:28', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(187, 'joao', '2015-03-26 15:01:08', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(188, 'joao', '2015-03-26 15:02:32', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(189, 'joao', '2015-03-26 15:07:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(190, 'bruno', '2015-03-26 15:07:43', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(191, 'joao', '2015-03-26 15:08:18', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(192, 'bruno', '2015-03-27 13:49:44', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(193, 'bruno', '2015-03-27 14:03:39', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(194, 'joao', '2015-03-27 14:07:04', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(195, 'joao', '2015-03-27 14:07:31', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(196, 'bruno', '2015-03-30 12:14:07', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(197, 'joao', '2015-03-30 12:14:33', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(198, 'bruno', '2015-03-31 18:02:39', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(199, 'bruno', '2015-03-31 18:13:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(200, 'bruno', '2015-03-31 18:49:51', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(201, 'bruno', '2015-04-01 13:09:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(202, 'bruno', '2015-04-01 14:20:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(203, 'bruno', '2015-04-01 18:10:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(204, 'bruno', '2015-04-01 18:22:42', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(205, 'bruno', '2015-04-01 18:25:45', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(206, 'bruno', '2015-04-01 19:21:15', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(207, 'bruno', '2015-04-02 17:21:57', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(208, 'joao', '2015-04-02 17:35:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(209, 'bruno', '2015-04-02 17:37:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(210, 'giu3', '2015-04-02 17:42:47', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(211, 'bruno', '2015-04-02 17:43:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(212, 'giu3', '2015-04-02 17:47:52', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(213, 'bruno', '2015-04-02 18:38:45', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(214, 'joao', '2015-04-02 18:38:59', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(215, 'bruno', '2015-04-02 18:39:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(216, 'joao', '2015-04-02 18:41:43', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(217, 'joao', '2015-04-02 18:43:07', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(218, 'giu3', '2015-04-02 18:43:28', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(219, 'joao', '2015-04-02 18:59:42', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(220, 'giu3', '2015-04-02 19:00:25', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(221, 'giu3', '2015-04-02 19:00:40', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(222, 'joao', '2015-04-02 19:01:40', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(223, 'joao', '2015-04-02 19:01:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(224, 'joao', '2015-04-02 19:02:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(225, 'joao', '2015-04-02 19:19:47', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(226, 'joao', '2015-04-02 19:22:11', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(227, 'bruno', '2015-04-02 19:22:19', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(228, 'joao', '2015-04-02 19:25:40', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(229, 'joao', '2015-04-07 12:20:32', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(230, 'joao', '2015-04-07 12:26:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(231, 'joao', '2015-04-07 12:27:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(232, 'joao', '2015-04-07 12:29:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(233, 'joao', '2015-04-07 12:31:14', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(234, 'joao', '2015-04-07 12:32:23', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(235, 'joao', '2015-04-07 12:33:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(236, 'bruno', '2015-04-07 12:36:37', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(237, 'joao', '2015-04-07 12:42:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(238, 'joao', '2015-04-07 12:44:30', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(239, 'bruno', '2015-04-07 12:50:56', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(240, 'joao', '2015-04-07 12:53:26', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(241, 'joao', '2015-04-07 12:54:02', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(242, 'joao', '2015-04-07 12:54:22', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(243, 'joao', '2015-04-07 12:55:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(244, 'joao', '2015-04-07 12:58:10', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(245, 'joao', '2015-04-07 13:01:11', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(246, 'joao', '2015-04-07 13:06:32', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(247, 'giu3', '2015-04-07 13:20:30', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(248, 'joao', '2015-04-07 13:47:11', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(249, 'bruno', '2015-04-07 14:02:41', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(250, 'joao', '2015-04-07 14:04:31', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(251, 'bruno', '2015-04-07 14:06:13', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(252, 'joao', '2015-04-07 14:07:08', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(253, 'giu3', '2015-04-07 14:11:02', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(254, 'bruno', '2015-04-07 14:19:53', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(255, 'bruno', '2015-04-07 14:20:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(256, 'giu3', '2015-04-07 14:24:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(257, 'giu3', '2015-04-07 14:25:20', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(258, 'giu3', '2015-04-07 14:25:46', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(259, 'bruno', '2015-04-07 14:27:04', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(260, 'bruno', '2015-04-07 14:27:28', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(261, 'bruno', '2015-04-07 17:39:00', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(262, 'bruno', '2015-04-07 17:46:33', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(263, 'bruno', '2015-04-07 18:05:37', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(264, 'joao', '2015-04-07 18:05:50', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(265, 'giu3', '2015-04-07 18:06:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(266, 'bruno', '2015-04-07 18:08:25', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(267, 'giu3', '2015-04-07 18:08:35', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(268, 'joao', '2015-04-07 18:08:43', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(269, 'bruno', '2015-04-07 18:10:31', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(270, 'bruno', '2015-04-07 18:10:42', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(271, 'joao', '2015-04-07 18:11:46', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(272, 'Desconhecido', '2015-04-07 18:25:51', 'Logoff no sistema', 'SELECT titulo, data, hora, obs FROM agenda WHERE data >= ''20150407'' AND data <= ''20150414'' ORDER BY data, hora DESC', 'Logoff efetuado com sucesso'),
(273, 'bruno', '2015-04-07 18:50:34', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(274, 'bruno', '2015-04-07 18:55:55', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(275, 'bruno', '2015-04-07 19:01:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(276, 'bruno', '2015-04-07 19:01:33', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(277, 'bruno', '2015-04-07 19:04:47', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(278, 'bruno', '2015-04-07 19:07:31', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(279, 'bruno', '2015-04-07 19:41:38', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(280, 'bruno', '2015-04-07 19:42:13', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(281, 'bruno', '2015-04-07 19:42:19', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(282, 'bruno', '2015-04-07 19:42:33', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(283, 'bruno', '2015-04-10 13:25:28', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(284, 'bruno', '2015-04-10 13:25:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(285, 'bruno', '2015-04-10 13:27:20', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(286, 'bruno', '2015-04-10 13:27:51', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(287, 'bruno', '2015-04-10 13:29:02', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(288, 'bruno', '2015-04-10 13:31:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(289, 'bruno', '2015-04-10 14:11:30', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(290, 'bruno', '2015-04-10 17:39:00', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(291, 'bruno', '2015-04-10 17:40:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(292, 'bruno', '2015-04-10 17:44:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(293, 'bruno', '2015-04-10 17:51:36', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(294, 'bruno', '2015-04-10 17:57:50', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(295, 'bruno', '2015-04-10 17:58:18', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(296, 'bruno', '2015-04-10 18:49:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(297, 'bruno', '2015-04-10 18:55:13', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(298, 'bruno', '2015-04-10 19:02:44', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(299, 'joao', '2015-04-14 17:41:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(300, 'bruno', '2015-04-14 17:49:32', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(301, 'bruno', '2015-04-14 18:14:55', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(302, 'joao', '2015-04-14 18:15:04', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(303, 'celia', '2015-04-14 18:15:21', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''23''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(304, 'celia', '2015-04-14 18:28:34', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''23''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(305, 'celia', '2015-04-14 18:28:46', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''23''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(306, 'bruno', '2015-04-14 18:28:51', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(307, 'joao', '2015-04-14 18:29:12', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(308, 'bruno', '2015-04-14 18:29:25', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(309, 'giu3', '2015-04-14 18:29:34', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(310, 'bruno', '2015-04-14 19:43:26', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(311, 'bruno', '2015-04-15 19:20:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(312, 'bruno', '2015-04-15 19:48:41', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(313, 'bruno', '2015-04-17 12:16:53', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(314, 'bruno', '2015-04-17 12:56:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(315, 'bruno', '2015-04-17 13:04:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(316, 'joao', '2015-04-17 13:16:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(317, 'bruno', '2015-04-30 17:40:19', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(318, 'bruno', '2015-04-30 18:11:10', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(319, 'bruno', '2015-05-05 18:23:13', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(320, 'bruno', '2015-05-05 18:23:50', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(321, 'bruno', '2015-05-05 19:37:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(322, 'bruno', '2015-05-13 14:00:07', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(323, 'bruno', '2015-05-14 12:43:43', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(324, 'bruno', '2015-05-14 13:11:51', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(325, 'joao', '2015-05-14 13:12:06', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(326, 'bruno', '2015-05-15 11:40:18', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(327, 'joao', '2015-05-15 13:49:17', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(328, 'bruno', '2015-05-18 18:13:42', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(329, 'celia', '2015-05-18 18:14:23', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''23''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(330, 'bruno', '2015-05-22 12:31:14', 'Login no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Login efetuado com sucesso'),
(331, 'bruno', '2015-05-27 12:36:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(332, 'giu3', '2015-05-27 12:36:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(333, 'bruno', '2015-05-27 12:36:36', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(334, 'joao', '2015-05-27 12:36:47', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(335, 'bruno', '2015-05-27 13:48:36', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(336, 'giu3', '2015-05-27 13:49:38', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(337, 'bruno', '2015-05-27 13:50:43', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(338, 'idiogo', '2015-05-27 13:57:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(339, 'idiogo', '2015-05-27 13:58:52', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(340, 'idiogo', '2015-05-27 14:01:22', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(341, 'bruno', '2015-05-27 14:01:40', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(342, 'idiogo', '2015-05-27 14:02:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(343, 'bruno', '2015-05-27 17:37:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(344, 'giu3', '2015-05-27 17:39:21', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(345, 'joao', '2015-05-27 17:47:33', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(346, 'bruno', '2015-05-27 17:49:03', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(347, 'joao', '2015-05-27 17:58:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(348, 'giu3', '2015-05-27 17:59:41', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(349, 'joao', '2015-05-27 18:00:28', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(350, 'giu3', '2015-05-27 18:02:44', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(351, 'bruno', '2015-05-27 18:02:59', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(352, 'joao', '2015-05-27 18:03:44', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(353, 'giu3', '2015-05-27 18:03:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(354, 'bruno', '2015-05-28 12:21:02', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(355, 'joao', '2015-05-28 12:21:14', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(356, 'bruno', '2015-05-28 12:24:35', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(357, 'idiogo', '2015-05-28 12:26:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(358, 'bruno', '2015-05-28 12:58:23', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(359, 'idiogo', '2015-05-28 12:58:41', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(360, 'giu3', '2015-05-28 12:59:22', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(361, 'joao', '2015-05-28 12:59:34', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(362, 'bruno', '2015-05-28 18:18:53', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(363, 'giu3', '2015-05-28 18:19:43', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(364, 'bruno', '2015-06-02 18:32:34', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(365, 'bruno', '2015-06-02 18:53:34', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(366, 'bruno', '2015-06-02 18:53:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(367, 'bruno', '2015-06-02 18:55:24', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(368, 'bruno', '2015-06-02 18:58:35', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(369, 'bruno', '2015-06-02 19:01:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(370, 'joao', '2015-06-02 19:01:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(371, 'bruno', '2015-06-02 19:02:15', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(372, 'idiogo', '2015-06-02 19:02:45', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(373, 'giu3', '2015-06-02 19:03:01', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(374, 'idiogo', '2015-06-02 19:03:47', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(375, 'giu3', '2015-06-02 19:06:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(376, 'bruno', '2015-06-02 19:34:25', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(377, 'giu3', '2015-06-02 19:34:39', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(378, 'idiogo', '2015-06-02 19:34:59', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(379, 'bruno', '2015-06-03 12:03:53', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(380, 'giu3', '2015-06-03 12:16:13', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(381, 'bruno', '2015-06-03 12:16:36', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(382, 'giu3', '2015-06-03 13:13:49', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(383, 'bruno', '2015-06-03 13:32:39', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(384, 'giu3', '2015-06-03 14:12:21', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(385, 'bruno', '2015-06-03 14:12:29', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(386, 'giu3', '2015-06-03 14:25:24', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(387, 'bruno', '2015-06-03 14:25:35', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(388, 'giu3', '2015-06-03 14:26:00', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(389, 'bruno', '2015-06-03 14:26:12', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(390, 'bruno', '2015-06-08 14:43:40', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(391, 'bruno', '2015-06-08 18:50:25', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(392, 'giu3', '2015-06-08 18:54:02', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(393, 'bruno', '2015-06-08 18:54:10', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(394, 'giu3', '2015-06-08 18:54:16', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(395, 'joao', '2015-06-08 18:54:25', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(396, 'idiogo', '2015-06-08 18:55:35', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(397, 'idiogo', '2015-06-08 18:56:47', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''20''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(398, 'bruno', '2015-06-09 12:02:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(399, 'bruno', '2015-06-10 12:30:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(400, 'giu3', '2015-06-10 12:43:53', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(401, 'bruno', '2015-06-10 12:45:58', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(402, 'giu3', '2015-06-10 12:54:55', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(403, 'bruno', '2015-06-10 12:55:57', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(404, 'giu3', '2015-06-10 12:57:37', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(405, 'bruno', '2015-06-10 12:57:56', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(406, 'giu3', '2015-06-10 13:01:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(407, 'bruno', '2015-06-10 13:07:05', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(408, 'bruno', '2015-06-10 17:37:42', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(409, 'giu3', '2015-06-10 17:40:57', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(410, 'bruno', '2015-06-10 17:41:45', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(411, 'giu3', '2015-06-10 17:43:26', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(412, 'bruno', '2015-06-10 17:58:40', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(413, 'bruno', '2015-06-10 18:31:11', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(414, 'giu3', '2015-06-10 18:31:41', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(415, 'bruno', '2015-06-10 18:54:31', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(416, 'bruno', '2015-06-10 19:01:48', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(417, 'bruno', '2015-06-10 19:16:27', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(418, 'bruno', '2015-06-10 19:26:50', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(419, 'bruno', '2015-06-10 19:27:59', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(420, 'bruno', '2015-06-10 19:30:42', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(421, 'bruno', '2015-06-10 19:35:04', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(422, 'joao', '2015-06-11 11:25:12', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''18''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(423, 'bruno', '2015-06-11 11:26:13', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(424, 'giu3', '2015-06-11 11:28:50', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(425, 'bruno', '2015-06-11 13:12:09', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(426, 'giu3', '2015-06-11 13:13:44', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''19''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(427, 'bruno', '2015-06-11 13:17:26', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(428, 'bruno', '2015-06-11 13:18:46', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(429, 'bruno', '2015-06-11 13:41:12', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(430, 'bruno', '2015-06-11 13:52:32', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(431, 'bruno', '2015-06-11 13:56:28', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso'),
(432, 'bruno', '2015-06-11 14:52:10', 'Logoff no sistema', 'SELECT *\nFROM (`usuarios`)\nWHERE `id` =  ''1''\nLIMIT 1', 'Logoff efetuado com sucesso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dpto`
--

CREATE TABLE IF NOT EXISTS `dpto` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `dpto`
--

INSERT INTO `dpto` (`id`, `nome`, `status`) VALUES
(1, 'Administração', 'adm'),
(2, 'Compras', 'com'),
(3, 'RH', 'rh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_recom`
--

CREATE TABLE IF NOT EXISTS `itens_recom` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_recom` int(6) NOT NULL,
  `id_item` tinyint(2) NOT NULL,
  `cod` int(6) NOT NULL,
  `qtd` float(10,2) NOT NULL,
  `saldo` float(10,2) NOT NULL,
  `un` varchar(3) NOT NULL,
  `des` text NOT NULL,
  `cc` varchar(10) NOT NULL,
  `pedido` int(6) NOT NULL,
  `pra` date NOT NULL,
  `sta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=257 ;

--
-- Extraindo dados da tabela `itens_recom`
--

INSERT INTO `itens_recom` (`id`, `id_recom`, `id_item`, `cod`, `qtd`, `saldo`, `un`, `des`, `cc`, `pedido`, `pra`, `sta`) VALUES
(247, 1, 1, 123456, 10.00, 0.00, 'pc', 'Material 1', 'ADM', 0, '2015-05-16', 0),
(248, 2, 1, 654321, 2.00, 0.00, 'pc', 'Material 22', 'PCP', 222555, '2015-05-20', 2),
(249, 2, 2, 189695, 3.00, 0.00, 'pc', 'Material 33', 'ADM', 123456, '2015-05-20', 2),
(250, 3, 1, 123123, 1.00, 0.00, 'mn', 'Manutenção de equipamento', 'man', 0, '2015-05-21', 0),
(251, 4, 1, 123123, 1.00, 0.00, 'pc', 'Material 342', 'adm', 0, '2015-05-28', 0),
(252, 5, 1, 555555, 12.00, 0.00, 'pc', 'Pasta', 'asd', 0, '2015-05-30', 0),
(253, 6, 1, 777777, 1.00, 0.00, 'pc', 'Material 5 TI', 'pcp', 654321, '2015-05-29', 2),
(254, 6, 2, 654321, 2.00, 0.00, 'pc', 'Material 2 TI', 'pcp', 0, '2015-05-29', 9),
(255, 6, 3, 666666, 3.00, 0.00, 'pc', 'Material 3 TI', 'pcp', 123456, '2015-05-29', 2),
(256, 7, 1, 5840, 5000.00, 0.00, 'kg', 'master preto', 'guaina', 123457, '2015-06-11', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perm_cargo`
--

CREATE TABLE IF NOT EXISTS `perm_cargo` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `perm_cargo`
--

INSERT INTO `perm_cargo` (`id`, `nome`, `status`) VALUES
(1, 'Gerente', 'ger'),
(2, 'Supervisor', 'sup'),
(4, 'Líder', 'lid'),
(5, 'Colaborador', 'col'),
(6, 'Compradores', 'com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perm_sis`
--

CREATE TABLE IF NOT EXISTS `perm_sis` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `perm_sis`
--

INSERT INTO `perm_sis` (`id`, `nome`, `status`) VALUES
(1, 'Administrador', 'adm'),
(2, 'Usuário', 'usu'),
(3, 'Super Usuário', 'sup');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perm_tela`
--

CREATE TABLE IF NOT EXISTS `perm_tela` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `perm_tela`
--

INSERT INTO `perm_tela` (`id`, `nome`, `obs`) VALUES
(4, 'recom', 'Nível 1 - gerente | Nível 2 - comprador | Nível 3 - recebedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recado`
--

CREATE TABLE IF NOT EXISTS `recado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `recado` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `recado`
--

INSERT INTO `recado` (`id`, `recado`) VALUES
(1, 'Sistema de intranet versão 07.01, teste de recado para tela inicial.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recom`
--

CREATE TABLE IF NOT EXISTS `recom` (
  `id` int(6) NOT NULL,
  `user_id` tinyint(3) NOT NULL,
  `user_id_dpto` tinyint(3) NOT NULL,
  `ger_id` tinyint(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(25) NOT NULL,
  `msg` text NOT NULL,
  `sta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recom`
--

INSERT INTO `recom` (`id`, `user_id`, `user_id_dpto`, `ger_id`, `data`, `hora`, `ip`, `msg`, `sta`) VALUES
(1, 18, 2, 1, '2015-05-15', '14:29:14', '127.0.0.1', 'Teste de recom', 0),
(2, 18, 2, 1, '2015-05-15', '15:17:25', '127.0.0.1', 'Teste recom 2', 3),
(3, 18, 2, 1, '2015-05-15', '15:36:25', '127.0.0.1', 'manutenção de impressora', 0),
(4, 1, 1, 1, '2015-05-27', '14:36:06', '127.0.0.1', 'recom 212312', 0),
(5, 20, 3, 1, '2015-05-28', '14:25:09', '127.0.0.1', 'rwerwer', 0),
(6, 1, 1, 1, '2015-05-28', '20:16:41', '127.0.0.1', 'teste de recom TI', 3),
(7, 19, 1, 1, '2015-06-10', '19:40:42', '192.168.23.28', 'entregar a cada hora 1.000 kg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tline_recom`
--

CREATE TABLE IF NOT EXISTS `tline_recom` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `recom_id` int(6) NOT NULL,
  `user_id` tinyint(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tline_recom`
--

INSERT INTO `tline_recom` (`id`, `recom_id`, `user_id`, `data`, `hora`, `msg`) VALUES
(1, 3, 18, '2015-05-15', '15:36:25', 'manutenção de impressora'),
(2, 3, 18, '2015-05-15', '16:36:25', 'manutenção de toner também'),
(3, 3, 18, '2015-05-16', '16:36:25', 'manutenção cancelada'),
(4, 4, 1, '2015-05-27', '14:36:06', 'recom 212312'),
(5, 5, 20, '2015-05-28', '14:25:09', 'rwerwer'),
(6, 6, 1, '2015-05-28', '20:16:41', 'teste de recom TI'),
(7, 7, 19, '2015-06-10', '19:40:42', 'entregar a cada hora 1.000 kg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `id_dpto` tinyint(1) NOT NULL,
  `id_perm_cargo` tinyint(1) NOT NULL,
  `id_perm_sis` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dpto` (`id_dpto`) COMMENT 'id dpto'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `ativo`, `id_dpto`, `id_perm_cargo`, `id_perm_sis`) VALUES
(1, 'Bruno Bertelli', 'bruno.ti@coppersteel.com.br', 'bruno', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 1),
(18, 'Joao', 'suporte@coppersteel.com.br', 'joao', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2, 2, 2),
(19, 'Giuliano', 'gmoura@coppersteel.com.br', 'giu3', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 3),
(20, 'Diogo', 'd@d.com', 'idiogo', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_perm_tela`
--

CREATE TABLE IF NOT EXISTS `usuarios_perm_tela` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `tela_id` tinyint(3) NOT NULL,
  `usuario_id` int(6) NOT NULL,
  `perm` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `usuarios_perm_tela`
--

INSERT INTO `usuarios_perm_tela` (`id`, `tela_id`, `usuario_id`, `perm`) VALUES
(1, 4, 1, 1),
(3, 4, 18, 3),
(5, 4, 19, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
