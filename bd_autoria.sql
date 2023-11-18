-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2023 às 00:05
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_Autor` int(11) NOT NULL,
  `NomeAutor` varchar(100) NOT NULL,
  `Sobrenome` varchar(200) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_Autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Miguel', 'de Cervantes Saavedra', 'Miguel.Cervantes@gmail.com', '1547-09-29'),
(2, 'Gabriel', 'García Márquez', 'Gabriel.Marquez@Gmail.com', '1297-03-06'),
(3, 'John', 'Ronald Reuel Tolkien', 'John.Tolkien@Gmail.com', '1892-01-03'),
(4, 'Jane', 'Austen', 'Jane.Austen@gmail.com', '1775-12-16'),
(5, 'Joanne', 'Kathleen Rowling', 'Joanne.Rowling@gmail.com', '1965-07-31'),
(6, 'Agatha', 'Christie', 'agatha.Christie@gmail.com', '1890-09-15'),
(7, 'Haruki', 'Murakami', 'haruki.Murakami@gmail.com', '1949-01-12'),
(8, 'Toni', 'Morrison', 'toni@example.com', '1931-02-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Login` varchar(5) NOT NULL,
  `senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Login`, `senha`) VALUES
('a', 123),
('b', 456);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_Autoria` int(11) NOT NULL,	
  `Cod_Autor` int(11) NOT NULL,
  `Cod_livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_Autoria`,`Cod_Autor`, `Cod_livro`, `DataLancamento`, `Editora`) VALUES
(1, 1, 1, '1605-01-16', 'Livraria José Olympio Editora'),
(2, 2, 2, '1967-05-01', 'Editora Record'),
(3, 3, 3, '1954-07-29', 'Martins Fontes'),
(4, 4, 4, '1813-01-28', 'Martin Claret'),
(5, 5, 5, '1997-06-26', 'Rocco'),
(6, 6, 6, '1934-01-01', 'HarperCollins'),
(7, 7, 7, '2002-09-12', 'Alfaguara'),
(8, 8, 8, '1952-01-01', 'Bertrand Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_livro` int(11) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `ISBN` varchar(25) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'Dom Quixote', 'Romance', '978-85-7326-392-3', 'Português', 500),
(2, 'Cem Anos de Solidão', 'Ficção', '978-85-01-01207-4', 'Espanhol', 400),
(3, 'O Senhor dos Anéis', 'Fantasia', '978-85-9508-635-7', 'Inglês', 1000),
(4, 'Orgulho e Preconceito', 'Romance Clássico', '978-85-440-0182-0', 'Inglês', 350),
(5, 'Harry Potter e a Pedra Filosofal', 'Fantasia', '978-0-7475-3269-9', 'Inglês', 400),
(6, 'Assassinato no Expresso Oriente', 'Mistério', '000.85.209.1244-3', 'Inglês', 300),
(7, 'Kafka à beira-mar', 'Ficção Contemporânea', ' 978-85-6028-142-8', 'Inglês', 400),
(8, 'O Velho e o Mar', 'Literatura Clássica', '978-0-684-80122-3', 'Inglês', 250);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_Autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_livro`);

--
-- Índices para tabela `autoria`
--
ALTER TABLE `autoria`
  ADD PRIMARY KEY (`Cod_Autoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `autoria`
--
ALTER TABLE `autoria`
  MODIFY `Cod_Autoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
