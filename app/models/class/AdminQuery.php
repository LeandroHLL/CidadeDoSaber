<?php

class AdminQuery
{

    public function obterAlunos()
    {
        $host = "localhost";
        $user = "root";
        $password = "123456cds";
        $database = "educanet";

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        $query = "
            SELECT 
                ac.id AS id_matricula,
                cad.username AS nome,
                cad.email,
                (SELECT nome_curso FROM curso WHERE cod_curso = ac.cod_curso) AS curso_nome,
                cad.phone_number AS cpf,
                cad.age AS endereco,
                ac.situacao AS status
            FROM aluno_curso ac
            JOIN cadastro cad ON ac.id_cadastro = cad.id
        ";

        $result = $conn->query($query);
        $alunos = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $alunos[] = $row;
            }
        }

        $conn->close();

        return $alunos;
    }
}
