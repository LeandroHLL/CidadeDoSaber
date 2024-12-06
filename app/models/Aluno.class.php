<?php

namespace app\models\class;

class Aluno extends \app\models\class\Conexao{
    
    
    private function login($username, $password){
        try {
            Conexao::openInstance();
            $query = "SELECT * FROM cadastro WHERE username = :username LIMIT 1";
            $result = Conexao::query($query);
            if($result->num_rows > 0){
                $aluno = Conexao::fetch($query);
                Conexao::closeInstance();
                return $aluno;
            }else{
                return false;
            }
        }
    }
    
}