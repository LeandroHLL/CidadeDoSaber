"SELECT senha.autenticacao, curso.cod_curso
   FROM senha
   INNER JOIN turma ON turma.cod_turma = senha.cod_turma
   INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
   INNER JOIN curso ON curso.cod_curso = modulo.cod_curso
   WHERE senha.situacao = 'DISPONIVEL' AND turma.cod_periodo_letivo = 7;