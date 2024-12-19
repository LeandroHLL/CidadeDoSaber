-- Criar a tabela de relacionamento entre alunos e cursos
CREATE TABLE `aluno_curso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT, -- Chave primária
  `cod_aluno` INT(11) NOT NULL, -- Chave estrangeira para tabela aluno
  `cod_curso` INT(11) NOT NULL, -- Chave estrangeira para tabela curso
  `data_matricula` DATE NOT NULL, -- Data da matrícula
  `status` VARCHAR(20) DEFAULT 'ativo', -- Status da matrícula (ativo, cancelado, etc.)
  `informacoes` TEXT DEFAULT NULL, -- Informações específicas do curso para o aluno
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`cod_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Alterar a coluna cod_aluno para id_cadastro
ALTER TABLE `aluno_curso`
CHANGE `cod_aluno` `id_cadastro` INT(11) NOT NULL;

-- Alterar a chave estrangeira para referenciar a tabela cadastro
ALTER TABLE `aluno_curso`
DROP FOREIGN KEY `aluno_curso_ibfk_1`;

ALTER TABLE `aluno_curso`
ADD CONSTRAINT `aluno_curso_fk_id_cadastro` FOREIGN KEY (`id_cadastro`) REFERENCES `cadastro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
