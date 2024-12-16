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

    public function getCursosFiltrados($filtro, $valor)
    {

        $validFilters = ['nome_curso', 'nome_coordenacao']; // agora inclui nome da coordenação
        if (!in_array($filtro, $validFilters)) {
            die("Filtro inválido.");
        }


        $query = "SELECT curso.cod_curso, curso.nome_curso, curso.informacoes_curso, coordenacao.nome_coordenacao 
                  FROM curso
                  JOIN coordenacao ON curso.cod_coordenacao = coordenacao.cod_coordenacao
                  WHERE $filtro LIKE ?";
        $stmt = $this->connection->prepare($query);

        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $this->connection->error);
        }


        $valor = "%" . $valor . "%";
        $stmt->bind_param("s", $valor);

        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
