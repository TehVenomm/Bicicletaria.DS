-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2018 às 00:56
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bicicletaria_db`
--
CREATE DATABASE IF NOT EXISTS `bicicletaria_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bicicletaria_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `listaperfil`
--

CREATE TABLE `listaperfil` (
  `idListaPerfil` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `listaperfil`
--

INSERT INTO `listaperfil` (`idListaPerfil`, `nome`) VALUES
(1, 'Adm'),
(2, 'Vendedor'),
(3, 'Tecnico'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `idUsuario_Pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nome`, `telefone`, `idUsuario_Pessoa`) VALUES
(2, 'Cliente Numero Dois', '(99) 6666-6666', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `idListaPerfil_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `senha`, `idListaPerfil_Usuario`) VALUES
(3, 'cliente2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4),
(4, 'tecnico1@gmail.com', '6c44e5cd17f0019c64b042e4a745412a', 3),
(5, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listaperfil`
--
ALTER TABLE `listaperfil`
  ADD PRIMARY KEY (`idListaPerfil`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `idUsuario_Pessoa_idx` (`idUsuario_Pessoa`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idListaPerfil_Usuario_idx` (`idListaPerfil_Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listaperfil`
--
ALTER TABLE `listaperfil`
  MODIFY `idListaPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `idUsuario_Pessoa` FOREIGN KEY (`idUsuario_Pessoa`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idListaPerfil_Usuario` FOREIGN KEY (`idListaPerfil_Usuario`) REFERENCES `listaperfil` (`idListaPerfil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
