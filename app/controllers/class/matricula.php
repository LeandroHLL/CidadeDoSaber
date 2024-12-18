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

    // Buscar uma senha disponível com base na lógica de junção
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

    // Preparar e executar a consulta com o código do curso
    $stmt_senha = $conn->prepare($sql_find_senha);
    $stmt_senha->bind_param("i", $cod_curso); // Passar o código do curso como parâmetro
    $stmt_senha->execute();
    $result_senha = $stmt_senha->get_result();

    if ($result_senha->num_rows > 0) {
        $row_senha = $result_senha->fetch_assoc();
        $cod_senha = $row_senha['cod_senha'];
        $autenticacao = $row_senha['autenticacao'];

        // Atualizar a tabela cadastro com o código do curso e a autenticação da senha
        $sql_update_cadastro = "UPDATE cadastro SET curso = ?, autenticacao = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update_cadastro);
        $stmt_update->bind_param("isi", $cod_curso, $autenticacao, $id_cadastro);
        $stmt_update->execute();

        // Atualizar o status da senha para "PENDENTE"
        $sql_update_senha = "UPDATE senha SET situacao = 'PENDENTE' WHERE cod_senha = ?";
        $stmt_senha_update = $conn->prepare($sql_update_senha);
        $stmt_senha_update->bind_param("i", $cod_senha);
        $stmt_senha_update->execute();

        $_SESSION['success_message'] = "Matrícula realizada com sucesso!";
    } else {
        $_SESSION['error_message'] = "Não há senhas disponíveis no momento para este curso e período letivo.";
    }

    // Fechar o statement da senha
    $stmt_senha->close();
} else {
    $_SESSION['error_message'] = "E-mail não encontrado!";
}

// Fechar conexões
$stmt->close();
$conn->close();

// Redirecionar de volta para a página de cursos
header("Location: ../../views/aluno/cursos.php");
exit;
