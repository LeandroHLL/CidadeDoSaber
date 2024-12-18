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
  <div class="col-md-6">
    <div id="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.1332990710084!2d-38.323190335180726!3d-12.704721591031344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71669d92f55f74f%3A0x495525ae0c09983e!2sPrefeitura%20Municipal%20de%20Cama%C3%A7ari!5e0!3m2!1spt-BR!2sbr!4v1686837556079!5m2!1spt-BR!2sbr"
        width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</body>

</html>