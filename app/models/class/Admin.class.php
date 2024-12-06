<?php

namespace app\models\class;

class Admin extends \app\models\class\Conexao{

    protected function connect(){
       $conexao = Conexao::openInstance();
       return $conexao;
    }

    protected function close($conexao){
        $conexao->Conexao::closeInstance();
    }
    protected function login($nome_usuario, $senha)
    {
        $query = "SELECT * FROM usuario WHERE nome_usuario = $nome_usuario AND senha = $senha AND situacao = 'ativo' AND perfil = 'admin'";
        $conexao = $this->connect();
        $result = $conexao->query($query);
        if($result->num_rows > 0){
            $administrador = $conexao->fetch($query);
            $this->close($conexao);
            return $administrador;
        }else{
            $this->close($conexao);
            return false;
        }
    }
}