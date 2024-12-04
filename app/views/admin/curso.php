<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../public/css/templatemo-grad-school.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <title>Aprenda Mais - Cursos</title>
  <link rel="icon" type="image/x-icon" href="./img/Aprenda-Mais-logo.ico">
</head>
<header class="main-header clearfix" role="header">
  <div class="logo">
    <a href="#"><em>Educa</em> Net</a>
  </div>
  <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
  <nav id="menu" class="main-nav" role="navigation">
    <ul class="main-menu">
      <li><a href="../../../index.html">Home</a></li>
      <li class="has-submenu"><a href="#section2">Sobre Nós</a>
        <ul class="sub-menu">
          <li><a href="#section2">Quem Somos?</a></li>
          <li><a href="#section6">Contato</a></li>
        </ul>
      </li>
      <li><a href="#section4">Cursos</a></li>
      <li><a href="../CidadeDoSaber/app/views/auth/login.php" rel="sponsored" class="external">LOGOUT</a></li>
    </ul>
  </nav>
</header>

<body>
  <div class="container">
    <h2>Lista dos Cursos</h2>
    <?php
    if (isset($_GET['message'])) {
      $responseMessage = $_GET['message'];
      echo '<div class="alert alert-danger">' . $responseMessage . '</div>';
    }
    ?>

    <p>
      <a href="../controller/cursoController.php?insert" class="btn btn-success">Cadastrar Novo Curso</a>
    </p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Disciplinas</th>
          <th>Editar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>

          <tr>
            <td><?php echo ($objCurso['nome']); ?></td>
            <td>
              <a href="../controller/disciplinaController.php?insertDisciplina&id=<?php echo $objCurso['idcurso']; ?>&nome=<?php echo $objCurso['nome']; ?>"
                class="btn btn-secondary">Adicionar Disciplina</a>
            </td>
            <td>
              <a href="../controller/cursoController.php?edit&id=<?php echo $objCurso['idcurso']; ?>&nome=<?php echo $objCurso['nome']; ?>"
                class="btn btn-warning">Editar</a>
            </td>
            <td>
              <a href="../controller/cursoController.php?delete&id=<?php echo $objCurso['idcurso']; ?>&nome=<?php echo $objCurso['nome']; ?>"
                class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar este curso?')">Deletar</a>
            </td>
          </tr>

      </tbody>
    </table>
  </div>
</body>

</html>