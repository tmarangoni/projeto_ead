-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2020 às 04:54
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mais_saude`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario_consulta` time NOT NULL,
  `observacoes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_medico`, `id_paciente`, `data_consulta`, `horario_consulta`, `observacoes`) VALUES
(59, 7, 24, '2020-05-30', '08:00:00', ''),
(68, 6, 2, '2020-06-06', '08:00:00', ''),
(69, 8, 2, '2020-06-18', '11:30:00', ''),
(70, 6, 2, '2020-06-17', '08:00:00', ''),
(71, 6, 39, '2020-05-12', '11:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_usuarios`
--

CREATE TABLE `dados_usuarios` (
  `id` int(100) NOT NULL,
  `img` blob NOT NULL,
  `nomec` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `crm` int(200) DEFAULT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numerocasa` int(10) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_usuarios`
--

INSERT INTO `dados_usuarios` (`id`, `img`, `nomec`, `nascimento`, `rg`, `cpf`, `crm`, `logradouro`, `numerocasa`, `complemento`, `bairro`, `estado`, `cidade`, `cep`, `email`, `telefone`) VALUES
(11, '', 'Lidia Aguilar', '1985-09-12', '45908765345X', '345.729.922-98', 133, 'Rua das Amoras', 34, '', 'Jardins', 'SP', 'Campinas', '13045-355', 'lidia@gmail.com', '1111111111111'),
(13, '', '', '0000-00-00', '', '', NULL, '', 0, NULL, '', '', '', '', '', ''),
(24, '', 'Thiago Soares', '1997-03-19', '22222222222', '40009867829', NULL, 'Rua das Oliveiras', 2905, 'AP12 BL01 ', 'Pq Yolanda', 'SP', 'Campinas', '13045-355', 'adm@gmail.com', '1111-1111'),
(39, '', 'Camila Santos', '1992-07-15', '45678991876X', '47978894557', NULL, 'Rua das Palmeiras', 312, '', 'Jardins', 'SP', 'Campinas', '13045-355', 'paciente@gmail.com', '00)0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_possiveis`
--

CREATE TABLE `horarios_possiveis` (
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horarios_possiveis`
--

INSERT INTO `horarios_possiveis` (`horario`) VALUES
('08:00:00'),
('08:30:00'),
('09:00:00'),
('09:30:00'),
('10:00:00'),
('10:30:00'),
('11:00:00'),
('11:30:00'),
('12:00:00'),
('12:30:00'),
('13:00:00'),
('13:30:00'),
('14:00:00'),
('14:30:00'),
('15:00:00'),
('15:30:00'),
('16:00:00'),
('16:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `nome_medico` varchar(80) NOT NULL,
  `crm` varchar(10) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`id_medico`, `nome_medico`, `crm`, `categoria`, `senha`, `email`) VALUES
(7, 'Carlos Alves', '757472', 'Oftamologista', '$2y$10$0f3oLboOpWQELXoBBV5u8eb6Qx2wkJuXJqDBELqIaCrDKpu9exisO', 'medic@gmail.com'),
(8, 'Francisco Moraes', '757474', 'Cardiologista', '$2y$10$0f3oLboOpWQELXoBBV5u8eb6Qx2wkJuXJqDBELqIaCrDKpu9exisO', 'medico@gmail.com'),
(11, 'Lidia Aguilar', '133', 'Cardiologista', '$2y$10$0f3oLboOpWQELXoBBV5u8eb6Qx2wkJuXJqDBELqIaCrDKpu9exisO', 'lidia@gmail.com'),
(13, 'Marcela Santos', '1234567', 'Nutricionista', '$2y$10$92z4lUi35zWWId5zEOkl0ucB0H5xeH/ePMSJE/sIzlBvxs5Me8ao2', 'teste@teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(80) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `cpf`, `senha`, `email`, `tipo_user`) VALUES
(24, 'Thiago Soares', '40009867829', '$2y$10$2aFUNsELVI3yUfP6Pvz5C.PqB9nXDsCpKz1Y.x1P/UeDQPPWBEQM.', 'adm@gmail.com', 3),
(39, 'Camila Santos', '47978894557', '$2y$10$OV0FiT5u4vtTHlBJXvpeAuZtXrT6i6FgSqEya8o22wBJsiq7HsxhG', 'paciente@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tipo` int(11) NOT NULL,
  `descricao` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_user`
--

INSERT INTO `tipo_user` (`id_tipo`, `descricao`) VALUES
(1, 'paciente'),
(2, 'medico'),
(3, 'administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Índices para tabela `dados_usuarios`
--
ALTER TABLE `dados_usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices para tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  ADD UNIQUE KEY `horario` (`horario`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Índices para tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_all_expired` ON SCHEDULE EVERY 1 DAY STARTS '2020-05-24 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM Consulta WHERE data_consulta < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
