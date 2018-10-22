-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Out-2018 às 04:37
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32


CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cidade` text NOT NULL,
  `editable` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `nome`, `cidade`, `editable`) VALUES
(1, 'Teste ok', 'Muito bom', 'false'),
(2, 'ads4535', 'tudo3', 'false'),
(3, 'Agora', '', 'false'),
(4, 'Opa', '', 'false');

