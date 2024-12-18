<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user = $_SESSION['user'];

require_once __DIR__ . '/../../models/class/Conexao.class.php';
require_once __DIR__ . '/../../models/class/Curso.class.php';

use app\models\class\Conexao;
use app\models\class\Curso;

$cursoModel = new Curso();


$categoriasCoordenacao = $cursoModel->getTodasCoordenacoes();

$nomeCurso = $_POST['nome_curso'] ?? '';
$codCoordenacao = $_POST['cod_coordenacao'] ?? '';

if ($nomeCurso || $codCoordenacao) {
    $cursos = $cursoModel->getCursosComFiltros($nomeCurso, $codCoordenacao);
} else {
    $cursos = $cursoModel->getCursos();
}

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

    <div class="dashboard">
        <h1>Dashboard de Cursos</h1>

        <!-- Formulário de Filtro -->
        <div class="filtro-container">
            <form action="cursos.php" method="POST" class="filtro-form">
                <!-- Filtro por Nome do Curso -->
                <input type="text" name="nome_curso" class="filtro-input"
                    value="<?php echo htmlspecialchars($nomeCurso); ?>"
                    placeholder="Digite o nome do curso">

                <!-- Filtro por Coordenação -->
                <select name="cod_coordenacao" id="cod_coordenacao" class="filtro-select">
                    <option value="">-- Selecione uma Coordenação --</option>
                    <?php foreach ($categoriasCoordenacao as $categoria): ?>
                        <option value="<?php echo htmlspecialchars($categoria['cod_coordenacao']); ?>"
                            <?php echo ($codCoordenacao == $categoria['cod_coordenacao']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($categoria['nome_coordenacao']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Botão de Filtrar -->
                <button type="submit" class="filtro-button">Filtrar</button>
            </form>
        </div>

        <!-- Lista de Cursos -->
        <div class="cursos-container">
            <?php if (empty($cursos)): ?>
                <p>Não há cursos disponíveis no momento.</p>
            <?php else: ?>
                <?php foreach ($cursos as $curso): ?>
                    <div class="curso" onclick="abrirMatricula(<?php echo $curso['cod_curso']; ?>)">
                        <h3><?php echo htmlspecialchars($curso['nome_curso']); ?></h3>
                        <p><strong>Informações:</strong> <?php echo htmlspecialchars($curso['informacoes_curso']); ?></p>
                        <p><strong>Coordenação:</strong> <?php echo htmlspecialchars($curso['nome_coordenacao']); ?></p>
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
            <form action="matricula.php" method="POST" class="form-matricula">
                <input type="hidden" id="cod_curso" name="cod_curso" value="">

                <div class="campo-form">
                    <label for="email_aluno">Confirme seu e-mail:</label>
                    <input type="email" id="email_aluno" name="email_aluno" required>
                </div>

                <button type="submit" class="btn-matricula">Matricular</button>
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