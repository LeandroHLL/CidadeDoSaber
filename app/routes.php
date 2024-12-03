<?php

$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
    case '/':
        require '../app/views/aluno/dashboard.php';
        break;
    case '/login':
        require '../app/views/auth/login.php';
        break;
    case '/cadastro':
        require '../app/views/auth/cadastro.php';
        break;
    case '/inscricao':
        require '../app/views/aluno/inscricao.php';
        break;
    case '/historico':
        require '../app/views/aluno/historico.php';
        break;
    case '/admin/gerenciar_cursos':
        require '../app/views/admin/gerenciar_cursos.php';
        break;
    default:
        require '../app/views/common/error404.php';
        break;
}
