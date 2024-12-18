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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Aluno</title>
  <link rel="stylesheet" href="../../../public/css/cursosstyles.css">
  <link rel="stylesheet" href="../../../public/css/perfil.css">
  <link rel="stylesheet" href="../../../public/css/templatemo-grad-school.css">
</head>

<body>
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="../../../index.html"><em>Educa</em> Net</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li>
          <span style="color: #F29829;">Olá, <?php echo htmlspecialchars($user['username']); ?>!</span>
        </li>
        <li><a href="dashboard.php">Perfil</a></li>
        <li><a href="cursos.php">Cursos</a></li>
        <li><a style="color: red;" href="../aluno/logout.php" rel="sponsored" class="external">Logout</a></li>
      </ul>
    </nav>
  </header>

  <div class="dashboard-container">
    <!-- Perfil do Usuário -->
    <div class="profile-section">
      <h2>Informações do Usuário:</h2>
      <p><strong>Nome de Usuário:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
      <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
    </div>

    <!-- Meus Cursos -->
    <div class="courses-section">
      <h2>Meus Cursos</h2>
      <p>Você ainda não está matriculado em nenhum curso.</p>
      <!-- Exemplo de Cursos -->
      <table>
        <thead>
          <tr>
            <th>Nome do Curso</th>
            <th>Status da Matrícula</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Curso de Programação</td>
            <td>Matrícula Confirmada</td>
          </tr>
          <tr>
            <td>Curso de Design Gráfico</td>
            <td>Matrícula Pendente</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
