<?php

namespace app\models\class;

class Admin{

    protected function login($nome_usuario, $senha)
    {
        $query = "SELECT * FROM usuario WHERE nome_usuario = ? AND senha = ? AND perfil = 'admin'";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('ss', $nome_usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $administrador = $result->fetch_assoc();
            Conexao::closeInstance();
            return $administrador;
        }else{
            Conexao::closeInstance();
            return false;
        }
    }
}