-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/04/2024 às 00:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: ` exemplo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`) VALUES
(1, 'Autor 1'),
(2, 'Autor 2'),
(3, 'Autor 3'),
(4, 'Autor 4'),
(5, 'Autor 5'),
(6, 'Autor 6'),
(7, 'Autor 7'),
(8, 'Autor 8');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(55) NOT NULL,
  `numero` int(11) NOT NULL,
  `pendencia` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `cpf`, `nome`, `telefone`, `email`, `cep`, `rua`, `numero`, `pendencia`) VALUES
(1, '12345678900', 'Fulano de Tal', '123456789', 'fulano@example.com', '12345678', 'Rua A', 123, 0),
(2, '23456789012', 'Ciclano da Silva', '987654321', 'ciclano@example.com', '23456789', 'Rua B', 456, 1),
(3, '34567890123', 'Beltrano Oliveira', '456789012', 'beltrano@example.com', '34567890', 'Rua C', 789, 0),
(4, '45678901234', 'Maria Santos', '789012345', 'maria@example.com', '45678901', 'Rua D', 987, 0),
(5, '56789012345', 'João Silva', '111111111', 'joao@example.com', '56789012', 'Rua E', 234, 1),
(6, '67890123456', 'Ana Souza', '222222222', 'ana@example.com', '67890123', 'Rua F', 345, 0),
(7, '78901234567', 'Pedro Oliveira', '333333333', 'pedro@example.com', '78901234', 'Rua G', 456, 1),
(8, '89012345678', 'Carla Santos', '444444444', 'carla@example.com', '89012345', 'Rua H', 567, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id`, `cnpj`, `nome`, `email`, `telefone`) VALUES
(1, '12345678901234', 'Editora A', 'editora_a@example.com', '123456789'),
(2, '23456789012345', 'Editora B', 'editora_b@example.com', '987654321'),
(3, '34567890123456', 'Editora C', 'editora_c@example.com', '456789012'),
(4, '45678901234567', 'Editora D', 'editora_d@example.com', '789012345'),
(5, '56789012345678', 'Editora E', 'editora_e@example.com', '111111111'),
(6, '67890123456789', 'Editora F', 'editora_f@example.com', '222222222'),
(7, '78901234567890', 'Editora G', 'editora_g@example.com', '333333333'),
(8, '89012345678901', 'Editora H', 'editora_h@example.com', '444444444');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `dt_emprestimo` date NOT NULL,
  `dt_devolucao` date DEFAULT NULL,
  `multa` decimal(2,0) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `dt_emprestimo`, `dt_devolucao`, `multa`, `id_cliente`, `id_livro`) VALUES
(1, '2022-04-25', NULL, NULL, 1, 1),
(2, '2022-04-20', '2022-05-10', 5, 2, 3),
(3, '2022-04-15', NULL, NULL, 3, 2),
(4, '2022-04-10', '2022-05-01', 4, 4, 4),
(5, '2022-04-05', NULL, NULL, 1, 4),
(6, '2022-04-01', '2022-04-15', 3, 2, 2),
(7, '2022-03-25', NULL, NULL, 3, 1),
(8, '2022-03-20', '2022-04-10', 4, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`) VALUES
(1, 'Ficção Científica'),
(2, 'Romance'),
(3, 'Aventura'),
(4, 'Suspense'),
(5, 'Terror'),
(6, 'Fantasia'),
(7, 'Drama'),
(8, 'Mistério');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(75) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `num_pg` int(11) NOT NULL,
  `idioma` varchar(45) NOT NULL,
  `edicao` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `is_emprestado` tinyint(4) DEFAULT NULL,
  `id_editora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `isbn`, `num_pg`, `idioma`, `edicao`, `ano`, `is_emprestado`, `id_editora`) VALUES
(1, 'Livro 1', '9781234567890', 200, 'Português', 1, '2020', 0, 1),
(2, 'Livro 2', '9780987654321', 300, 'Inglês', 2, '2019', 0, 2),
(3, 'Livro 3', '9789876543210', 250, 'Espanhol', 1, '2021', 1, 3),
(4, 'Livro 4', '9780123456789', 150, 'Francês', 3, '2018', 0, 4),
(5, 'Livro 5', '9782345678901', 180, 'Português', 2, '2021', 1, 2),
(6, 'Livro 6', '9783456789012', 220, 'Inglês', 3, '2020', 0, 3),
(7, 'Livro 7', '9784567890123', 280, 'Espanhol', 2, '2019', 1, 4),
(8, 'Livro 8', '9785678901234', 320, 'Francês', 1, '2018', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_has_autor`
--

CREATE TABLE `livro_has_autor` (
  `id_livro` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `livro_has_autor`
--

INSERT INTO `livro_has_autor` (`id_livro`, `id_autor`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_has_genero`
--

CREATE TABLE `livro_has_genero` (
  `id_livro` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `livro_has_genero`
--

INSERT INTO `livro_has_genero` (`id_livro`, `id_genero`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1),
(6, 2),
(7, 3),
(8, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_autor_UNIQUE` (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_editora_UNIQUE` (`id`);

--
-- Índices de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_emprestimo_UNIQUE` (`id`),
  ADD KEY `fk_emprestimo_cliente1_idx` (`id_cliente`),
  ADD KEY `fk_emprestimo_livro1_idx` (`id_livro`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_genero_UNIQUE` (`id`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_livro_UNIQUE` (`id`),
  ADD KEY `fk_livro_editora1_idx` (`id_editora`);

--
-- Índices de tabela `livro_has_autor`
--
ALTER TABLE `livro_has_autor`
  ADD PRIMARY KEY (`id_livro`,`id_autor`),
  ADD KEY `fk_livro_has_autor_autor1_idx` (`id_autor`),
  ADD KEY `fk_livro_has_autor_livro_idx` (`id_livro`);

--
-- Índices de tabela `livro_has_genero`
--
ALTER TABLE `livro_has_genero`
  ADD PRIMARY KEY (`id_livro`,`id_genero`),
  ADD KEY `fk_livro_has_genero_genero1_idx` (`id_genero`),
  ADD KEY `fk_livro_has_genero_livro1_idx` (`id_livro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_emprestimo_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `livro_has_autor`
--
ALTER TABLE `livro_has_autor`
  ADD CONSTRAINT `fk_livro_has_autor_autor1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livro_has_autor_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `livro_has_genero`
--
ALTER TABLE `livro_has_genero`
  ADD CONSTRAINT `fk_livro_has_genero_genero1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livro_has_genero_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
