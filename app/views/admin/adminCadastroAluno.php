<?php
// Inclui a classe de conexão
require_once '../../models/class/Conexao.class.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados do formulário
    $nome_aluno = $_POST['nome_aluno'];
    $data_nascimento = $_POST['data_nascimento'];
    $nome_pai = $_POST['nome_pai'];
    $nome_mae = $_POST['nome_mae'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone_celular = $_POST['telefone_celular'];
    $endereco = $_POST['endereco'];
    $numero_endereco = $_POST['numero_endereco'];
    $serie_escolar = $_POST['serie_escolar'];
    $turno_escolar = $_POST['turno_escolar'];
    $possui_alergia = $_POST['possui_alergia'];
    $qual_alergia = $_POST['qual_alergia'];
    $ex_aluno = $_POST['ex_aluno'];
    $obs = $_POST['obs'];

    try {
        $conexao = \app\models\class\Conexao::openInstance();
        $connection = $conexao->connection;

        $sql = "INSERT INTO aluno (nome_aluno, data_nascimento, nome_pai, nome_mae, sexo, cpf, email, telefone_celular, endereco, numero_endereco, serie_escolar, turno_escolar, possui_alergia, qual_alergia, ex_aluno, obs)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepara a declaração
        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Erro na preparação da consulta: " . $connection->error);
        }

        $stmt->bind_param(
            'ssssssssssssssss',
            $nome_aluno,
            $data_nascimento,
            $nome_pai,
            $nome_mae,
            $sexo,
            $cpf,
            $email,
            $telefone_celular,
            $endereco,
            $numero_endereco,
            $serie_escolar,
            $turno_escolar,
            $possui_alergia,
            $qual_alergia,
            $ex_aluno,
            $obs
        );

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['success'] = "Aluno cadastrado com sucesso!";
            header("Location: dashboard.php");
            exit();
        } else {
            throw new Exception("Erro ao cadastrar o aluno.");
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Erro: " . $e->getMessage();
        header("Location: concluir.php");
        exit();
    } finally {

        \app\models\class\Conexao::closeInstance();
    }
}
