-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2024 às 00:53
-- Versão do servidor: 11.3.0-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `educanet`
--
CREATE DATABASE IF NOT EXISTS `educanet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `educanet`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alergia`
--

CREATE TABLE `alergia` (
  `cod_alergia` int(11) NOT NULL,
  `nome_alergia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `cod_aluno` int(11) NOT NULL,
  `cod_bairro` int(11) DEFAULT NULL,
  `cod_escola` int(11) DEFAULT NULL,
  `cod_escolaridade` int(11) DEFAULT NULL,
  `nome_aluno` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome_pai` varchar(50) DEFAULT NULL,
  `nome_mae` varchar(50) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone_residencial` varchar(20) DEFAULT NULL,
  `telefone_celular` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo_sanguineo` varchar(15) DEFAULT NULL,
  `estado_civil` varchar(15) DEFAULT NULL,
  `serie_escolar` varchar(15) DEFAULT NULL,
  `turno_escolar` varchar(15) DEFAULT NULL,
  `manequim` varchar(2) DEFAULT NULL,
  `numero_calcado` varchar(2) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero_endereco` varchar(15) DEFAULT NULL,
  `possui_alergia` varchar(15) DEFAULT NULL,
  `qual_alergia` varchar(50) DEFAULT NULL,
  `portador_pne` varchar(15) DEFAULT NULL,
  `qual_pne` varchar(50) DEFAULT NULL,
  `medicao_controlada` varchar(50) DEFAULT NULL,
  `qual_medicao` varchar(50) DEFAULT NULL,
  `possui_bolsa_familia` varchar(15) DEFAULT NULL,
  `numero_bolsa_familia` varchar(16) DEFAULT NULL,
  `numero_cnis` varchar(15) DEFAULT NULL,
  `renda_familiar` varchar(50) DEFAULT NULL,
  `ex_aluno` varchar(5) DEFAULT NULL,
  `seduc` varchar(5) DEFAULT NULL,
  `qual_curso_fez` varchar(50) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `nome_civil` varchar(50) DEFAULT NULL,
  `responsavel_rg` varchar(20) DEFAULT NULL,
  `responsavel_cpf` varchar(20) DEFAULT NULL,
  `id_cad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `anexo`
--

CREATE TABLE `anexo` (
  `cod_anexo` int(11) NOT NULL,
  `cod_aluno` int(11) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `arquivo` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autorizacao`
--

CREATE TABLE `autorizacao` (
  `cod_autorizacao` int(11) NOT NULL,
  `cod_usuario_autorizador` int(11) DEFAULT NULL,
  `cod_turma` int(11) DEFAULT NULL,
  `cod_turma_aluno` int(11) DEFAULT NULL,
  `nome_proponente` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairro`
--

CREATE TABLE `bairro` (
  `cod_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(50) DEFAULT NULL,
  `localidade` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `curso` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `autenticacao` varchar(20) DEFAULT NULL,
  `security_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `coordenacao`
--

CREATE TABLE `coordenacao` (
  `cod_coordenacao` int(11) NOT NULL,
  `cod_diretoria` int(11) NOT NULL,
  `nome_coordenacao` varchar(50) DEFAULT NULL,
  `nome_responsavel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `cod_coordenacao` int(11) NOT NULL,
  `nome_curso` varchar(50) DEFAULT NULL,
  `informacoes_curso` varchar(100) DEFAULT NULL,
  `ementa` varchar(800) DEFAULT NULL,
  `objetivo` varchar(255) DEFAULT NULL,
  `conteudo_programatico` varchar(1200) DEFAULT NULL,
  `metodologia` varchar(1200) DEFAULT NULL,
  `recursos_utilizados` varchar(500) DEFAULT NULL,
  `sistematica_avaliacao` varchar(255) DEFAULT NULL,
  `referencias` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretoria`
--

CREATE TABLE `diretoria` (
  `cod_diretoria` int(11) NOT NULL,
  `nome_diretoria` varchar(50) DEFAULT NULL,
  `nome_responsavel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `escola`
--

CREATE TABLE `escola` (
  `cod_escola` int(11) NOT NULL,
  `nome_escola` varchar(50) DEFAULT NULL,
  `rede` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolaridade`
--

CREATE TABLE `escolaridade` (
  `cod_escolaridade` int(11) NOT NULL,
  `nome_escolaridade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `local_aula`
--

CREATE TABLE `local_aula` (
  `cod_local` int(11) NOT NULL,
  `nome_local` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `log_sistema`
--

CREATE TABLE `log_sistema` (
  `cod_log` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `operacao` varchar(30) DEFAULT NULL,
  `nome_operacao` varchar(60) DEFAULT NULL,
  `data_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `codCurso` int(11) NOT NULL,
  `codModulo` int(11) NOT NULL,
  `codTurma` int(11) NOT NULL,
  `codSenha` int(11) NOT NULL,
  `cod_periodo_letivo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo`
--

CREATE TABLE `modulo` (
  `cod_modulo` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `nome_modulo` varchar(50) DEFAULT NULL,
  `situacao_modulo` varchar(25) DEFAULT NULL,
  `conteudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodo_letivo`
--

CREATE TABLE `periodo_letivo` (
  `cod_periodo_letivo` int(11) NOT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_termino` date DEFAULT NULL,
  `metas_educacao` varchar(255) DEFAULT NULL,
  `metas_cultura` varchar(255) DEFAULT NULL,
  `metas_esporte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `cod_professor` int(11) NOT NULL,
  `nome_professor` varchar(50) DEFAULT NULL,
  `area_formacao` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `senha`
--

CREATE TABLE `senha` (
  `cod_senha` int(11) NOT NULL,
  `cod_turma` int(11) DEFAULT NULL,
  `numero_senha` varchar(20) DEFAULT NULL,
  `autenticacao` varchar(20) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `situacao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `cod_solicitacao` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_aluno` int(11) DEFAULT NULL,
  `tipo_solicitacao` varchar(50) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `cod_turma` int(11) NOT NULL,
  `cod_periodo_letivo` int(11) DEFAULT NULL,
  `cod_modulo` int(11) DEFAULT NULL,
  `cod_local` int(11) DEFAULT NULL,
  `cod_professor` int(11) DEFAULT NULL,
  `nome_turma` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_termino` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `faixa_etaria_inicial` date DEFAULT NULL,
  `faixa_etaria_final` date DEFAULT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `nome_faixa_etaria` varchar(50) DEFAULT NULL,
  `dias_de_aula` varchar(50) DEFAULT NULL,
  `qtd_aluno` int(11) DEFAULT NULL,
  `idade_minima` int(11) DEFAULT NULL,
  `idade_maxima` int(11) DEFAULT NULL,
  `situacao` varchar(10) DEFAULT 'ABERTA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_aluno`
--

CREATE TABLE `turma_aluno` (
  `cod_turma_aluno` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL,
  `cod_aluno` int(11) NOT NULL,
  `situacao` varchar(20) DEFAULT NULL,
  `autenticacao` varchar(20) DEFAULT NULL,
  `data_matricula` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nome_completo` varchar(50) DEFAULT NULL,
  `perfil` varchar(30) DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alergia`
--
ALTER TABLE `alergia`
  ADD PRIMARY KEY (`cod_alergia`),
  ADD UNIQUE KEY `nome_alergia` (`nome_alergia`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`cod_aluno`),
  ADD KEY `cod_bairro` (`cod_bairro`),
  ADD KEY `cod_escolaridade` (`cod_escolaridade`),
  ADD KEY `cod_escola` (`cod_escola`),
  ADD KEY `id_cad` (`id_cad`);

--
-- Índices de tabela `anexo`
--
ALTER TABLE `anexo`
  ADD PRIMARY KEY (`cod_anexo`),
  ADD KEY `cod_aluno` (`cod_aluno`);

--
-- Índices de tabela `autorizacao`
--
ALTER TABLE `autorizacao`
  ADD PRIMARY KEY (`cod_autorizacao`);

--
-- Índices de tabela `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`cod_bairro`),
  ADD UNIQUE KEY `nome_bairro` (`nome_bairro`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `curso` (`curso`);

--
-- Índices de tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD PRIMARY KEY (`cod_coordenacao`),
  ADD KEY `cod_diretoria` (`cod_diretoria`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`),
  ADD KEY `cod_coordenacao` (`cod_coordenacao`);

--
-- Índices de tabela `diretoria`
--
ALTER TABLE `diretoria`
  ADD PRIMARY KEY (`cod_diretoria`);

--
-- Índices de tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`cod_escola`),
  ADD UNIQUE KEY `nome_escola` (`nome_escola`);

--
-- Índices de tabela `escolaridade`
--
ALTER TABLE `escolaridade`
  ADD PRIMARY KEY (`cod_escolaridade`),
  ADD UNIQUE KEY `nome_escolaridade` (`nome_escolaridade`);

--
-- Índices de tabela `local_aula`
--
ALTER TABLE `local_aula`
  ADD PRIMARY KEY (`cod_local`),
  ADD UNIQUE KEY `nome_local` (`nome_local`);

--
-- Índices de tabela `log_sistema`
--
ALTER TABLE `log_sistema`
  ADD PRIMARY KEY (`cod_log`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `matricula`
--
ALTER TABLE `matricula`
  ADD KEY `id` (`id`),
  ADD KEY `cod_curso` (`codCurso`),
  ADD KEY `cod_modulo` (`codModulo`),
  ADD KEY `cod_turma` (`codTurma`),
  ADD KEY `cod_senha` (`codSenha`),
  ADD KEY `fk_matricula_periodo_letivo` (`cod_periodo_letivo`);

--
-- Índices de tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`cod_modulo`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Índices de tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  ADD PRIMARY KEY (`cod_periodo_letivo`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod_professor`);

--
-- Índices de tabela `senha`
--
ALTER TABLE `senha`
  ADD PRIMARY KEY (`cod_senha`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Índices de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`cod_solicitacao`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`),
  ADD KEY `cod_periodo_letivo` (`cod_periodo_letivo`),
  ADD KEY `cod_modulo` (`cod_modulo`),
  ADD KEY `cod_local` (`cod_local`),
  ADD KEY `cod_professor` (`cod_professor`);

--
-- Índices de tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD PRIMARY KEY (`cod_turma_aluno`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `nome_usuario` (`nome_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alergia`
--
ALTER TABLE `alergia`
  MODIFY `cod_alergia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `cod_aluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `anexo`
--
ALTER TABLE `anexo`
  MODIFY `cod_anexo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `autorizacao`
--
ALTER TABLE `autorizacao`
  MODIFY `cod_autorizacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bairro`
--
ALTER TABLE `bairro`
  MODIFY `cod_bairro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  MODIFY `cod_coordenacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `diretoria`
--
ALTER TABLE `diretoria`
  MODIFY `cod_diretoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `cod_escola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `escolaridade`
--
ALTER TABLE `escolaridade`
  MODIFY `cod_escolaridade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `local_aula`
--
ALTER TABLE `local_aula`
  MODIFY `cod_local` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_sistema`
--
ALTER TABLE `log_sistema`
  MODIFY `cod_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `cod_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  MODIFY `cod_periodo_letivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `cod_professor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `senha`
--
ALTER TABLE `senha`
  MODIFY `cod_senha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `cod_solicitacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  MODIFY `cod_turma_aluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`cod_bairro`) REFERENCES `bairro` (`cod_bairro`),
  ADD CONSTRAINT `aluno_ibfk_2` FOREIGN KEY (`cod_escolaridade`) REFERENCES `escolaridade` (`cod_escolaridade`),
  ADD CONSTRAINT `aluno_ibfk_3` FOREIGN KEY (`cod_escola`) REFERENCES `escola` (`cod_escola`),
  ADD CONSTRAINT `aluno_ibfk_4` FOREIGN KEY (`id_cad`) REFERENCES `cadastro` (`id`);

--
-- Restrições para tabelas `anexo`
--
ALTER TABLE `anexo`
  ADD CONSTRAINT `anexo_ibfk_1` FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`cod_aluno`);

--
-- Restrições para tabelas `cadastro`
--
ALTER TABLE `cadastro`
  ADD CONSTRAINT `cadastro_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`cod_curso`);

--
-- Restrições para tabelas `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD CONSTRAINT `coordenacao_ibfk_1` FOREIGN KEY (`cod_diretoria`) REFERENCES `diretoria` (`cod_diretoria`);

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`cod_coordenacao`) REFERENCES `coordenacao` (`cod_coordenacao`);

--
-- Restrições para tabelas `log_sistema`
--
ALTER TABLE `log_sistema`
  ADD CONSTRAINT `log_sistema_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Restrições para tabelas `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_matricula_periodo_letivo` FOREIGN KEY (`cod_periodo_letivo`) REFERENCES `periodo_letivo` (`cod_periodo_letivo`),
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cadastro` (`id`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`cod_curso`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`codModulo`) REFERENCES `modulo` (`cod_modulo`),
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`codTurma`) REFERENCES `turma` (`cod_turma`),
  ADD CONSTRAINT `matricula_ibfk_5` FOREIGN KEY (`codSenha`) REFERENCES `senha` (`cod_senha`);

--
-- Restrições para tabelas `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);

--
-- Restrições para tabelas `senha`
--
ALTER TABLE `senha`
  ADD CONSTRAINT `senha_ibfk_1` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`),
  ADD CONSTRAINT `senha_ibfk_2` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`);

--
-- Restrições para tabelas `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `solicitacao_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_periodo_letivo`) REFERENCES `periodo_letivo` (`cod_periodo_letivo`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`cod_modulo`) REFERENCES `modulo` (`cod_modulo`),
  ADD CONSTRAINT `turma_ibfk_3` FOREIGN KEY (`cod_local`) REFERENCES `local_aula` (`cod_local`),
  ADD CONSTRAINT `turma_ibfk_4` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`cod_professor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
