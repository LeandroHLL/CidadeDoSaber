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

    protected function cadastrar($nome, $senha, $email, $numero){
        
        $query = "SELECT * FROM cadastro WHERE email = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            Conexao::closeInstance();
            return false;
        }else{
            $idade = 1;
            $query = "INSERT INTO cadastro (username, password, email, phone_number, age) VALUES (?,?,?,?,?)";
            $stmt->prepare($query);
            $stmt->bind_param('sssss', $nome, $senha, $email, $numero, $idade);
            $stmt->execute();
            $stmt->close();
            Conexao::closeInstance();
            return true;
        }
    }
    
}



    