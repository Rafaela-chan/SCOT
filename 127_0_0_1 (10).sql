-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Mar-2023 às 20:45
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgcote`
--
CREATE DATABASE IF NOT EXISTS `sgcote` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sgcote`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id_acesso` int(11) NOT NULL,
  `nome_acesso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id_acesso`, `nome_acesso`) VALUES
(1, 'dev'),
(2, 'admin'),
(3, 'pedag');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudista`
--

CREATE TABLE `conteudista` (
  `id_conteudista` int(11) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `nome_guerra` varchar(200) NOT NULL,
  `nome_completo` varchar(200) NOT NULL,
  `id_om` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteudista`
--

INSERT INTO `conteudista` (`id_conteudista`, `cpf`, `nome_guerra`, `nome_completo`, `id_om`) VALUES
(14, 72306750149, 'Landgraf', 'Saulo Freire Landgraf', 7),
(15, 9478592769, 'Gisele', 'Gisele Cristina Coelho de Oliveira', 8),
(16, 50655671315, 'Magalhães', 'Suzana Marly da Costa Magalhães', 9),
(17, 330742167, 'Pâmela', 'Pâmela Gabrielle Borges', 8),
(18, 5182694695, 'Daniel', 'Thiago Diorgilis Ribeiro Daniel', 10),
(19, 1508731586, 'Ana Moura', 'Ana Maria Garcia Moura', 8),
(20, 81375824015, 'Noschang', 'Julio Cesar Noschang Junior', 11),
(21, 5403262750, 'Santos', 'Marcelo Ferreira dos Santos', 8),
(22, 5357975752, 'Gláucia', 'Gláucia Maria Gomes da Costa de Oliveira', 12),
(23, 8764053750, 'Silvestre', 'Leandro Silvestre Augusto Rocha', 12),
(24, 10027780775, 'Villar', 'Edson dos Santos Villar Júnior', 12),
(25, 9973912608, 'Gusmão', 'Eduardo Gusmão Silvino', 12),
(26, 9254163716, 'Nunes', 'Romulo Nunes Carlos', 11),
(27, 5181474799, 'Lívia', 'Lívia de Souza Fonseca', 12),
(28, 999718797, 'Paulo', 'Paulo Henrique da Conceição', 12),
(29, 11529848610, 'Herbst', 'Fábio Gabriel Gomes Saidel Herbst', 12),
(30, 68042850263, 'Souza', 'Rodrigo Souza Campos', 11),
(31, 11071039679, 'Fortes', 'Nathalia Bernardes Fortes', 1),
(32, 11492318663, 'Tayane', 'Tayane Ferraz de Almeida Batista', 1),
(33, 8214598990, 'Loana Silva', 'Loana Domingos da Silva', 1),
(34, 3153205671, 'Luciana', 'Luciana Cristina Santos Mazur', 1),
(35, 2929248602, 'Cynthia', 'Cynthia Adriadne Santos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(200) NOT NULL,
  `data_inicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `data_inicio`) VALUES
(15, 'CPIDIM', '2022-07-04'),
(16, 'CASAVPAR', '2022-09-12'),
(17, 'CPT-I', '2022-02-23'),
(18, 'CPT-II', '2022-09-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(200) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `id_curso`) VALUES
(1, 'Ética, valores e Moral', 15),
(2, 'Educação do Guerreiro', 15),
(3, 'Desenvolvimento de Valores no Âmbito do COMAER', 15),
(4, 'Liderança, Conceitos, Modelos e Aplicações', 15),
(5, 'Ensino na Doutrina e Instrução Militar', 15),
(6, 'A Profissão Militar e os Cenários de Guerra', 15),
(7, 'Doutrina e Instrução Militar: Ensino, Perfil do Instrutor e Aplicações', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_conteudista`
--

CREATE TABLE `lista_conteudista` (
  `id_conteudista` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_conteudista`
--

INSERT INTO `lista_conteudista` (`id_conteudista`, `id_curso`) VALUES
(14, 15),
(15, 15),
(16, 15),
(17, 15),
(18, 15),
(19, 15),
(20, 15),
(21, 15),
(22, 16),
(22, 18),
(23, 16),
(24, 16),
(25, 16),
(26, 16),
(27, 16),
(28, 16),
(29, 16),
(30, 16),
(31, 17),
(31, 18),
(32, 17),
(32, 18),
(33, 17),
(33, 18),
(35, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_tutor`
--

CREATE TABLE `lista_tutor` (
  `id_tutor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `om`
--

CREATE TABLE `om` (
  `id_om` int(11) NOT NULL,
  `nome_om` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `om`
--

INSERT INTO `om` (`id_om`, `nome_om`) VALUES
(1, 'CIAAR'),
(2, 'GAP-LS'),
(3, 'PAMA-LS'),
(4, 'PAMA-SP'),
(7, 'AMAN'),
(8, 'DIRENS'),
(9, 'ESG'),
(10, 'EAOAR'),
(11, 'AFA'),
(12, 'DIRAP'),
(13, 'TESTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `nome_guerra` varchar(200) NOT NULL,
  `nome_completo` varchar(200) NOT NULL,
  `id_om` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id_disciplina` int(11) NOT NULL,
  `nome_unidade` varchar(200) NOT NULL,
  `id_unidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `id_acesso` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cpf`, `id_acesso`, `nome_usuario`) VALUES
(24, '08741597842', 2, 'Lobo'),
(25, '28544397832', 2, 'Soares'),
(26, '01373251697', 2, 'Meireles'),
(27, '5510745665', 2, 'Alex'),
(28, '11071039679', 3, 'Fortes'),
(29, '11877526657', 3, 'Maira'),
(30, '5935146614', 3, 'Mislene'),
(31, '10003233740', 2, 'Magnane'),
(32, '8214598990', 3, 'Loana'),
(33, '11492318663', 3, 'Tayane'),
(34, '10151830690', 3, 'Tamires'),
(35, '12008260780', 3, 'Ivna'),
(36, '10485245663', 2, 'Graciano'),
(37, '00098219618', 2, 'Bitarovec'),
(38, '13287220667', 2, 'Aurélio'),
(39, '01594175624', 2, 'Simões'),
(40, '10176013644', 3, 'Bonifacio'),
(41, '31392611873', 3, 'Neila'),
(42, '12600038680', 2, 'H. Nascimento'),
(43, '19380367783', 2, 'Ana Carolina'),
(44, '18868906767', 2, 'Moreira'),
(45, '44912100803', 1, 'de Paula'),
(46, '15570391606', 1, 'Leandro Lucas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id_acesso`);

--
-- Índices para tabela `conteudista`
--
ALTER TABLE `conteudista`
  ADD PRIMARY KEY (`id_conteudista`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_om` (`id_om`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`,`id_curso`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Índices para tabela `lista_conteudista`
--
ALTER TABLE `lista_conteudista`
  ADD PRIMARY KEY (`id_conteudista`,`id_curso`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Índices para tabela `lista_tutor`
--
ALTER TABLE `lista_tutor`
  ADD PRIMARY KEY (`id_tutor`,`id_curso`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Índices para tabela `om`
--
ALTER TABLE `om`
  ADD PRIMARY KEY (`id_om`);

--
-- Índices para tabela `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_om` (`id_om`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id_unidade`,`id_disciplina`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_ibfk_1` (`id_acesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `conteudista`
--
ALTER TABLE `conteudista`
  MODIFY `id_conteudista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `om`
--
ALTER TABLE `om`
  MODIFY `id_om` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conteudista`
--
ALTER TABLE `conteudista`
  ADD CONSTRAINT `conteudista_ibfk_1` FOREIGN KEY (`id_om`) REFERENCES `om` (`id_om`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `lista_conteudista`
--
ALTER TABLE `lista_conteudista`
  ADD CONSTRAINT `lista_conteudista_ibfk_1` FOREIGN KEY (`id_conteudista`) REFERENCES `conteudista` (`id_conteudista`),
  ADD CONSTRAINT `lista_conteudista_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `lista_tutor`
--
ALTER TABLE `lista_tutor`
  ADD CONSTRAINT `lista_tutor_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`),
  ADD CONSTRAINT `lista_tutor_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`id_om`) REFERENCES `om` (`id_om`);

--
-- Limitadores para a tabela `unidade`
--
ALTER TABLE `unidade`
  ADD CONSTRAINT `unidade_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_acesso`) REFERENCES `acesso` (`id_acesso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
