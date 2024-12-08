<?php
session_start();
require_once '../../autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nome']) && !empty($_POST['password']) && !empty($_POST['email'])
    && !empty($_POST['numero']) && !empty($_POST['confirm-password'])) {
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $confirmaSenha = $_POST['confirm-password'];

        if($password == $confirmaSenha){
            $aluno = new \app\controllers\class\Aluno;
            $aluno->cadastrarC($nome, $password, $email, $numero);
        }else{
            $_SESSION['error'] = "por favor comfirme a senha denovo!";
            header("Location: ../views/auth/cadastro.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Por favor, preencha todos os campos!";
        header("Location: ../views/auth/cadastro.php");
        exit();
    }
}