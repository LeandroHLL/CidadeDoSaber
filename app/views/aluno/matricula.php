<?php
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

    // Buscar uma senha disponível
    $sql_find_senha = "SELECT cod_senha, autenticacao FROM senha WHERE situacao = 'DISPONIVEL' LIMIT 1";
    $result_senha = $conn->query($sql_find_senha);

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
        $stmt_senha = $conn->prepare($sql_update_senha);
        $stmt_senha->bind_param("i", $cod_senha);
        $stmt_senha->execute();

        echo "Matrícula realizada com sucesso!";
    } else {
        echo "Não há senhas disponíveis no momento.";
    }
} else {
    echo "E-mail não encontrado!";
}

// Fechar conexões
$stmt->close();
$conn->close();
?>
