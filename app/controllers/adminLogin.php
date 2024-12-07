<?php


session_start();
require_once '../../autoload.php';


// Lógica de controle de ações
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $admin = new app\controllers\class\Admin();

    if ($_POST['action'] === 'Login') {
        $nome_usuario = $_POST['username'];
        $senha = $_POST['password'];
        $admin->Clogin($nome_usuario, $senha);
        
    }
}
