<?php
session_start();
require_once '../../autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $username = $_POST['usuario'];
        $password = $_POST['password'];

        $aluno = new \app\controllers\class\Aluno;
        $aluno->loginC($username, $password);
    } else {
        $_SESSION['error'] = "Por favor, preencha todos os campos!";
        header("Location: ../views/auth/logen.php");
        exit();
    }
}