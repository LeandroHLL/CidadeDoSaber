<?php
session_start();

// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "123456cds", "educanet");

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber os dados do formulário
$email_aluno = $_POST['email_aluno'];
$cod_curso = $_POST['cod_curso'];

// Verificar se o e-mail existe
$sql_check_email = "SELECT id FROM cadastro WHERE email = ?";
$stmt = $conn->prepare($sql_check_email);
$stmt->bind_param("s", $email_aluno);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_cadastro = $row['id'];

    $sql_check_matriculas = "SELECT COUNT(*) AS total FROM aluno_curso WHERE id_cadastro = ?";
    $stmt_check = $conn->prepare($sql_check_matriculas);
    $stmt_check->bind_param("i", $id_cadastro);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row_check = $result_check->fetch_assoc();
    $total_cursos = $row_check['total'];

    if ($total_cursos >= 2) {
        $_SESSION['error_message'] = "Você já está matriculado em 2 cursos. Não é possível adicionar mais.";
        header("Location: ../../views/aluno/cursos.php");
        exit;
    }

    $sql_check_duplicado = "SELECT * FROM aluno_curso WHERE id_cadastro = ? AND cod_curso = ?";
    $stmt_duplicado = $conn->prepare($sql_check_duplicado);
    $stmt_duplicado->bind_param("ii", $id_cadastro, $cod_curso);
    $stmt_duplicado->execute();
    $result_duplicado = $stmt_duplicado->get_result();

    if ($result_duplicado->num_rows > 0) {
        $_SESSION['error_message'] = "Você já está matriculado neste curso.";
        header("Location: ../../views/aluno/cursos.php");
        exit;
    }

    $sql_find_senha = "
    SELECT senha.cod_senha, senha.autenticacao, curso.cod_curso
    FROM senha
    INNER JOIN turma ON turma.cod_turma = senha.cod_turma
    INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
    INNER JOIN curso ON curso.cod_curso = modulo.cod_curso
    WHERE senha.situacao = 'DISPONIVEL' 
    AND turma.cod_periodo_letivo = 7 
    AND curso.cod_curso = ?
    LIMIT 1";

    $stmt_senha = $conn->prepare($sql_find_senha);
    $stmt_senha->bind_param("i", $cod_curso);
    $stmt_senha->execute();
    $result_senha = $stmt_senha->get_result();

    if ($result_senha->num_rows > 0) {
        $row_senha = $result_senha->fetch_assoc();
        $cod_senha = $row_senha['cod_senha'];
        $autenticacao = $row_senha['autenticacao'];

        $sql_insert_matricula = "
        INSERT INTO aluno_curso (id_cadastro, cod_curso, data_matricula, status, informacoes)
        VALUES (?, ?, CURDATE(), 'ativo', ?)";
        $stmt_insert = $conn->prepare($sql_insert_matricula);
        $stmt_insert->bind_param("iis", $id_cadastro, $cod_curso, $autenticacao);
        $stmt_insert->execute();

        // Atualizar o status da senha para "PENDENTE"
        $sql_update_senha = "UPDATE senha SET situacao = 'PENDENTE' WHERE cod_senha = ?";
        $stmt_senha_update = $conn->prepare($sql_update_senha);
        $stmt_senha_update->bind_param("i", $cod_senha);
        $stmt_senha_update->execute();

        $_SESSION['success_message'] = "Matrícula realizada com sucesso!";
    } else {
        $_SESSION['error_message'] = "Não há senhas disponíveis no momento para este curso e período letivo.";
    }

    $stmt_senha->close();
} else {
    $_SESSION['error_message'] = "E-mail não encontrado!";
}

// Fechar conexões
$stmt->close();
$conn->close();

header("Location: ../../views/aluno/cursos.php");
exit;
