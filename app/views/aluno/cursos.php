<?php

require_once __DIR__ . '/../../models/class/Conexao.class.php';
require_once __DIR__ . '/../../models/class/Curso.class.php';

use app\models\class\Conexao;
use app\models\class\Curso;


$connection = Conexao::openInstance()->connection;


$cursoModel = new Curso();


$cursos = $cursoModel->getCursos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Cursos</title>
    <link rel="stylesheet" href="../../../public/css/cursosstyles.css">
    <link rel="stylesheet" href="../../../public/css/templatemo-grad-school.css">
</head>

<header class="main-header clearfix" role="header">
    <div class="logo">
        <a href="../../../index.html"><em>Educa</em> Net</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <li><a href="dashboard.php">Perfil</a></li>
            <li><a href="cursos.php">Cursos</a></li>
            <li><a href="../aluno/logout.php" rel="sponsored" class="external">Logout</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="dashboard">
        <h1>Dashboard de Cursos</h1>
        <div class="cursos-container">
            <?php if (empty($cursos)): ?>
                <p>Não há cursos disponíveis no momento.</p>
            <?php else: ?>
                <?php foreach ($cursos as $curso): ?>
                    <div class="curso" onclick="abrirMatricula(<?php echo $curso['cod_curso']; ?>)">
                        <h3><?php echo htmlspecialchars($curso['nome_curso']); ?></h3>
                        <p><strong>Informações:</strong> <?php echo htmlspecialchars($curso['informacoes_curso']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal de Matrícula -->
    <div id="modal-matricula" class="modal">
        <div class="modal-conteudo">
            <span class="fechar" onclick="fecharMatricula()">&times;</span>
            <h2>Matricule-se no Curso</h2>
            <form action="matricula.php" method="POST">
                <input type="hidden" id="cod_curso" name="cod_curso" value="">
                <label for="nome_aluno">Nome do Aluno:</label>
                <input type="text" id="nome_aluno" name="nome_aluno" required>

                <label for="email_aluno">Email do Aluno:</label>
                <input type="email" id="email_aluno" name="email_aluno" required>

                <button type="submit">Matricular</button>
            </form>
        </div>
    </div>

    <script>
        function abrirMatricula(codCurso) {
            document.getElementById('modal-matricula').style.display = 'flex';
            document.getElementById('cod_curso').value = codCurso;
        }

        function fecharMatricula() {
            document.getElementById('modal-matricula').style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('modal-matricula');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };

        document.getElementById('modal-matricula').style.display = 'none';
    </script>

</body>

</html>