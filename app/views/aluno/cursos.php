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

// Obtém a instância da conexão
$conn = Conexao::openInstance()->connection;

// Certifique-se de que a classe Curso aceita a conexão no construtor
$cursoModel = new Curso($conn);

$categoriasCoordenacao = $cursoModel->getTodasCoordenacoes();

$nomeCurso = $_POST['nome_curso'] ?? '';
$codCoordenacao = $_POST['cod_coordenacao'] ?? '';

if ($nomeCurso || $codCoordenacao) {
    $cursos = $cursoModel->getCursosComFiltros($nomeCurso, $codCoordenacao);
} else {
    $cursos = $cursoModel->getCursos();
}

// Verificar o número de cursos matriculados pelo usuário
$sql_contagem = "SELECT COUNT(*) AS total FROM cadastro WHERE id = ? AND curso IS NOT NULL";
$stmt_contagem = $conn->prepare($sql_contagem);
$stmt_contagem->bind_param("i", $user['id']);
$stmt_contagem->execute();
$result_contagem = $stmt_contagem->get_result();
$row_contagem = $result_contagem->fetch_assoc();
$total_matriculas = $row_contagem['total'];
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

        <div class="filtro-container">
            <form action="cursos.php" method="POST" class="filtro-form">
                <input type="text" name="nome_curso" class="filtro-input"
                    value="<?php echo htmlspecialchars($nomeCurso); ?>" placeholder="Digite o nome do curso">

                <select name="cod_coordenacao" id="cod_coordenacao" class="filtro-select">
                    <option value="">-- Selecione uma Coordenação --</option>
                    <?php foreach ($categoriasCoordenacao as $categoria): ?>
                        <option value="<?php echo htmlspecialchars($categoria['cod_coordenacao']); ?>"
                            <?php echo ($codCoordenacao == $categoria['cod_coordenacao']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($categoria['nome_coordenacao']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="filtro-button">Filtrar</button>
            </form>
        </div>

        <div class="mensagens">
            <?php
            if (isset($_SESSION['error_message'])) {
                echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";
                unset($_SESSION['error_message']);
            }

            if (isset($_SESSION['success_message'])) {
                echo "<p style='color: green;'>" . $_SESSION['success_message'] . "</p>";
                unset($_SESSION['success_message']);
            }
            ?>
        </div>

        <div class="cursos-container">
            <?php if (empty($cursos)): ?>
                <p>Não há cursos disponíveis no momento.</p>
            <?php else: ?>
                <?php foreach ($cursos as $curso): ?>
                    <?php
                    $sql_verificar = "SELECT * FROM cadastro WHERE id = ? AND curso = ?";
                    $stmt_verificar = $conn->prepare($sql_verificar);
                    $stmt_verificar->bind_param("ii", $user['id'], $curso['cod_curso']);
                    $stmt_verificar->execute();
                    $result_verificar = $stmt_verificar->get_result();
                    $ja_matriculado = $result_verificar->num_rows > 0;
                    $desabilitar = $total_matriculas >= 2 || $ja_matriculado;
                    ?>

                    <div class="curso <?php echo $desabilitar ? 'desabilitado' : ''; ?>"
                        onclick="<?php echo $desabilitar ? '' : 'abrirMatricula(' . $curso['cod_curso'] . ')'; ?>">
                        <h3><?php echo htmlspecialchars($curso['nome_curso']); ?></h3>
                        <p><strong>Informações:</strong> <?php echo htmlspecialchars($curso['informacoes_curso']); ?></p>
                        <p><strong>Coordenação:</strong> <?php echo htmlspecialchars($curso['nome_coordenacao']); ?></p>
                        <?php if ($desabilitar): ?>
                            <p style="color: red;">Indisponível</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div id="modal-matricula" class="modal">
        <div class="modal-conteudo">
            <span class="fechar" onclick="fecharMatricula()">&times;</span>
            <h2>Matricule-se no Curso</h2>
            <form action="../../controllers/class/matricula.php" method="POST" class="form-matricula">
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
