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

        $sql = 'SELECT cod_curso, nome_curso, informacoes_curso FROM curso';
        $result = $this->connection->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
