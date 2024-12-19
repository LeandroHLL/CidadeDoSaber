<?php

class SituacaoAlunoUpdater
{
    private $host = "localhost";
    private $user = "root";
    private $password = "123456cds";
    private $database = "educanet";

    private function conectar()
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        return $conn;
    }

    public function atualizarSituacao($idMatricula, $novaSituacao)
    {
        $conn = $this->conectar();

        $query = "UPDATE aluno_curso SET situacao = ? WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $stmt->bind_param("si", $novaSituacao, $idMatricula);

        if ($stmt->execute()) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        $stmt->close();
        $conn->close();

        return $resultado;
    }
}
