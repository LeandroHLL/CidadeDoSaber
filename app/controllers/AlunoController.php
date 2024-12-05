<?php
session_start();
require_once '../models/AlunoModel.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=educanet', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

class AlunoController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new AlunoModel($pdo);
    }

    // Função para processar o login
    public function login($username, $password)
    {
        try {
            $aluno = $this->model->checkCredentials($username, $password);

            if ($aluno) {
                $_SESSION['user'] = $aluno;
                header("Location:../views/aluno/dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Usuário ou senha incorretos!";
                header("Location: ../views/auth/login.php");
                exit();
            }
        } catch (Exception $e) {
            die("Erro no login: " . $e->getMessage());
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $username = $_POST['usuario'];
        $password = $_POST['password'];

        $controller = new AlunoController($pdo);
        $controller->login($username, $password);
    } else {
        $_SESSION['error'] = "Por favor, preencha todos os campos!";
        header("Location: ../views/auth/logen.php");
        exit();
    }
}
