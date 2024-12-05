<?php
session_start();
require_once '../models/Administrador.php';
require_once '../../config/database.php';

class UsuarioController
{
    private $db;
    private $administrador;

    public function __construct()
    {

        $this->db = new Database();
        $this->administrador = new Administrador($this->db->getConnection());
    }

    public function login($nome_usuario, $senha)
    {

        $administrador = $this->administrador->login($nome_usuario, $senha);

        if (is_array($administrador)) {

            $_SESSION['administrador'] = $administrador;
            header('Location: ../views/admin/dashboard.php');
        } else {

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

// Lógica de controle de ações
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $controller = new UsuarioController();

    if ($_POST['action'] === 'Login') {
        $nome_usuario = $_POST['username'];
        $senha = $_POST['password'];
        $controller->login($nome_usuario, $senha);
    }
}
