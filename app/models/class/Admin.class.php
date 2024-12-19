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

    protected function comfirmarInscricao($codAluno)
    {

        $query = "SELECT * FROM aluno WHERE cod_aluno = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('i', $codAluno);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $query = "UPDATE aluno SET inscricao = 1 WHERE cod_aluno = ?";
            $stmt->prepare($query);
            $stmt->bind_param('i', $codAluno);
            $stmt->execute();
            Conexao::closeInstance();
            return true;
        } else {
            Conexao::closeInstance();
            return false;
        }
    }

    protected function rejeitarInscricao($codAluno)
    {

        $query = "SELECT * FROM aluno WHERE cod_aluno = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('i',$codAluno);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $query = "UPDATE aluno SET inscricao = 3 WHERE cod_aluno = ?";
            $stmt->prepare($query);
            $stmt->bind_param('i',$codAluno);
            $stmt->execute();
            Conexao::closeInstance();
            return true;
        } else {
            Conexao::closeInstance();
            return false;
        }
    }
}