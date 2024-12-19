<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: ../auth/login.php");
  exit;
}

$user = $_SESSION['user'];

$conn = new mysqli("localhost", "root", "123456cds", "educanet");

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

$sql_usuario = "SELECT * FROM cadastro WHERE id = ?";
$stmt_usuario = $conn->prepare($sql_usuario);
$stmt_usuario->bind_param("i", $user['id']);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();

$sql_cursos = "
  SELECT c.cod_curso, c.nome_curso, c.informacoes_curso, ac.situacao
  FROM aluno_curso ac
  JOIN curso c ON ac.cod_curso = c.cod_curso
  WHERE ac.id_cadastro = ? AND ac.status = 'ativo'";
$stmt_cursos = $conn->prepare($sql_cursos);
$stmt_cursos->bind_param("i", $user['id']);
$stmt_cursos->execute();
$result_cursos = $stmt_cursos->get_result();

$curso_pendente = true;

while ($curso = $result_cursos->fetch_assoc()) {
  if ($curso['situacao'] == 'pendente') {
    $curso_pendente = true;
    break;
  }
}

$stmt_usuario->close();
$stmt_cursos->close();
$conn->close();
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

  <style>
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    .close-btn {
      background: red;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
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
      <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario['phone_number']); ?></p>
      <p><strong>Idade:</strong> <?php echo htmlspecialchars($usuario['age']); ?> anos</p>
    </div>

    <!-- Meus Cursos -->
    <div class="courses-section">
      <h2>Meus Cursos</h2>

      <?php if ($result_cursos->num_rows > 0): ?>
        <table>
          <thead>
            <tr>
              <th>Nome do Curso</th>
              <th>Informações</th>
              <th>Situação da Matrícula</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result_cursos->data_seek(0);
            while ($curso = $result_cursos->fetch_assoc()): ?>
              <tr>
                <td><?php echo htmlspecialchars($curso['nome_curso']); ?></td>
                <td><?php echo htmlspecialchars($curso['informacoes_curso']); ?></td>
                <td class="situacao <?php echo strtolower($curso['situacao']); ?>">
                  <?php echo htmlspecialchars($curso['situacao']); ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p>Você ainda não está matriculado em nenhum curso.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Popup de matrícula pendente -->
  <?php if ($curso_pendente): ?>
    <div class="popup-overlay" id="popup-overlay"></div>
    <div class="popup" id="popup">
      <p style="color: red; font-weight: bold;">Você tem uma ou mais matrículas pendentes! Por favor, dirija-se à Cidade do Saber para concluir sua matrícula dentro de 15 dias, ou sua pré-matrícula expirará.</p>
      <button class="close-btn" onclick="closePopup()">Fechar</button>
    </div>
  <?php endif; ?>

  <!-- Script para controlar o pop-up -->
  <script>
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
      document.getElementById('popup-overlay').style.display = 'none';
    }

    <?php if ($curso_pendente): ?>
      document.getElementById('popup').style.display = 'block';
      document.getElementById('popup-overlay').style.display = 'block';
    <?php endif; ?>
  </script>

  <div class="col-md-6">
    <div id="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.241992831495!2d-38.32476762492816!3d-12.697622287593143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71669d6b50f8b75%3A0x7907c121745628c1!2sCidade%20do%20Saber!5e0!3m2!1spt-BR!2sbr!4v1734586657343!5m2!1spt-BR!2sbr"
        width="100%" height="422px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>

  </div>
  </div>
</body>

</html>