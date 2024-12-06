<?php

namespace app\models\class;

class Aluno{
    
    
     protected function login($username, $password){
        $query = "SELECT * FROM cadastro WHERE username = ?, password = ? LIMIT 1";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('s,s', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $aluno = Conexao::fetch($result);
            Conexao::closeInstance();
            return $aluno;
        }else{
                return false;
        }
    }
    
}



    