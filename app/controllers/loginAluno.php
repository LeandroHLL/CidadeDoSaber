<?php
session_start();
require_once '../../autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $aluno = new \app\controllers\class\Aluno;
        $aluno->loginC($email, $password);
    } else {
        $_SESSION['error'] = "Por favor, preencha todos os campos!";
        header("Location: ../views/auth/login.php");
        exit();
    }
}