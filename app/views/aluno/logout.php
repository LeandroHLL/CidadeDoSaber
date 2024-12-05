<?php
session_start();

// Destroi a sessão, fazendo o logout do usuário
session_unset();
session_destroy();

// Redireciona para a página de login
header("Location: ../auth/login.php");
exit;
?>
