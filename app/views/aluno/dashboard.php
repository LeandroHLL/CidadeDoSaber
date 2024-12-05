<?php
session_start();

// Verifica se o usuário está logado, caso contrário, redireciona para o login
if (!isset($_SESSION['user'])) {
  header("Location: ../auth/login.php");
  exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>

<body>
  <h1>Bem-vindo ao Dashboard!</h1>

  <h2>Informações do Usuário:</h2>
  <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
  <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>

  <a href="logout.php">Sair</a>
</body>

</html>