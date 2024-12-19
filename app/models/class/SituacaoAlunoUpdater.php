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

        // Atualize a consulta para usar o campo 'id' que existe na sua tabela
        $query = "UPDATE aluno_curso SET situacao = ? WHERE id = ?"; // Use 'id' como campo de busca
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $stmt->bind_param("si", $novaSituacao, $idMatricula); // Aqui 'idMatricula' é um inteiro

        if ($stmt->execute()) {
            $resultado = true; // Atualização bem-sucedida
        } else {
            $resultado = false; // Falha na execução
        }

        $stmt->close();
        $conn->close();

        return $resultado;
    }
}
