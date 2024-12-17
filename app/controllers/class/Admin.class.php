<?php

namespace app\controllers\class;

class Admin extends \app\models\class\Admin{

    private $nome;
    private $senha;
    private $situacao;

    public function getadmin(){
        
        $admin = [];
        $admin['nome'] = $this->nome;
        $admin['senha'] = $this->senha;
        return $admin;
    }

    public function Clogin($nome_usuario, $senha)
    {

        if($administrador = $this->login($nome_usuario, $senha)){
            
            $_SESSION['administrador'] = $administrador;
            $this->nome = $nome_usuario;
            $this->senha = $senha;
            header('Location: ../views/admin/user.php');

        }else {

            $_SESSION['error'] = "Usuário ou senha inválidos!";
            header('Location: ../views/admin/loginadm.php');
        }
    }

    public function logout()
    {
        // Realiza o logout
        session_destroy();
        header('Location: ../views/admin/loegin.php');
    }

}