<?php

namespace app\models\class;

use app\models\class\Conexao;

class Curso
{
    private $connection;

    public function __construct()
    {
        $this->connection = Conexao::openInstance()->connection;
    }

    // Método para obter todos os cursos
    public function getCursos()
    {
        $sql = 'SELECT curso.cod_curso, curso.nome_curso, curso.informacoes_curso, coordenacao.nome_coordenacao 
                FROM curso
                JOIN coordenacao ON curso.cod_coordenacao = coordenacao.cod_coordenacao';
        $result = $this->connection->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // Método para obter coordenações
    public function getTodasCoordenacoes()
    {
        $sql = 'SELECT cod_coordenacao, nome_coordenacao FROM coordenacao';
        $result = $this->connection->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // Método para filtrar cursos com múltiplos critérios
    public function getCursosComFiltros($nomeCurso, $codCoordenacao)
    {
        $query = "SELECT curso.cod_curso, curso.nome_curso, curso.informacoes_curso, coordenacao.nome_coordenacao 
                  FROM curso
                  JOIN coordenacao ON curso.cod_coordenacao = coordenacao.cod_coordenacao
                  WHERE 1=1"; // Sempre verdadeiro para permitir filtros opcionais

        $params = [];
        $types = '';

        if (!empty($nomeCurso)) {
            $query .= " AND curso.nome_curso LIKE ?";
            $params[] = '%' . $nomeCurso . '%';
            $types .= 's';
        }

        if (!empty($codCoordenacao)) {
            $query .= " AND curso.cod_coordenacao = ?";
            $params[] = $codCoordenacao;
            $types .= 'i'; // Inteiro
        }

        $stmt = $this->connection->prepare($query);

        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $this->connection->error);
        }

        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
