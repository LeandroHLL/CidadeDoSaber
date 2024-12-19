<?php

require_once '../../models/class/Conexao.class.php';

// Abrindo a conexão com o banco de dados
$conn = app\models\class\Conexao::openInstance()->connection;


if (isset($_GET['id'])) {
    $id_matricula = $_GET['id'];


    if (!is_numeric($id_matricula)) {
        die("Erro: ID de matrícula inválido.");
    }


    $sql_informacoes = "SELECT informacoes FROM aluno_curso WHERE id = ?";
    $stmt = $conn->prepare($sql_informacoes);
    $stmt->bind_param("i", $id_matricula);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senha_informacoes = $row['informacoes'];



        $sql_senha = "UPDATE senha SET situacao = 'disponivel' WHERE autenticacao = ?";
        $stmt_senha = $conn->prepare($sql_senha);
        $stmt_senha->bind_param("s", $senha_informacoes);
        if (!$stmt_senha->execute()) {
            die("Erro ao atualizar tabela 'senha'.");
        }


        $sql_aluno_curso = "UPDATE aluno_curso SET situacao = 'cancelada' WHERE id = ?";
        $stmt_aluno_curso = $conn->prepare($sql_aluno_curso);
        $stmt_aluno_curso->bind_param("i", $id_matricula);
        if (!$stmt_aluno_curso->execute()) {
            die("Erro ao atualizar tabela 'aluno_curso'.");
        }


        echo "Cadastro cancelado com sucesso.";


        header("Location: dashboard.php");
        exit();
    } else {
        die("Erro: Não foi possível encontrar a senha associada ao aluno.");
    }
} else {
    echo "Parâmetros não encontrados.";
}
