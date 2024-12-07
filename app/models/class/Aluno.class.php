<?php

namespace app\models\class;

class Aluno{
    
    
     protected function login($username, $password){
        $query = "SELECT * FROM cadastro WHERE username = ? and password = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $aluno = $result->fetch_assoc();
            Conexao::closeInstance();
            return $aluno;
        }else{
            Conexao::closeInstance();
            return false;
        }
    }

    protected function cadastra
    
}



    