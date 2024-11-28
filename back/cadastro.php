<?php
session_start();
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educanet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém os valores enviados pelo formulário
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$age = $_POST['age'];
$phone_number = $_POST['phone-number'];
$securityAnswer = $_POST['security-question'];
$curso = $_POST['curso'];

// Verifica se o email já está sendo utilizado
$emailExistsQuery = "SELECT * FROM cadastro WHERE email = '$email'";
$emailExistsResult = $conn->query($emailExistsQuery);

if ($emailExistsResult->num_rows > 0) {
    // O email já está sendo utilizado, exiba uma mensagem de erro ou redirecione para a página de cadastro novamente
    header("Location: ../sign/cadastro.php?error=email_exists");
    exit;
}

// Prepara a instrução SQL para inserir os dados no banco de dados
$sql = "INSERT INTO cadastro (username, password, email, age, phone_number, security_answer, curso)
        VALUES ('$username', '$password', '$email', '$age', '$phone_number','$securityAnswer' ,'$curso')";

if ($conn->query($sql) === true) {
    // Executa a consulta SQL para obter os dados de autenticação e cod_curso
    $query = "SELECT senha.autenticacao, curso.cod_curso
   FROM senha
   INNER JOIN turma ON turma.cod_turma = senha.cod_turma
   INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
   INNER JOIN curso ON curso.cod_curso = modulo.cod_curso
   WHERE senha.situacao = 'DISPONIVEL' AND turma.cod_periodo_letivo = 7 AND curso.cod_curso = '$curso'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Atualiza a coluna 'autenticacao' na tabela 'cadastro' com o valor obtido da consulta SQL



        $autenticacao = $row['autenticacao'];
        $updateQuery = "UPDATE cadastro SET autenticacao = '$autenticacao' WHERE username = '$username'";
        $conn->query($updateQuery);

        $_SESSION['username'] = $username;
        //trocar no banco de dados status de autenticacao

        $updateSenhaQuery = "UPDATE senha SET situacao = 'UTILIZADA' WHERE autenticacao = '$autenticacao'";
        $conn->query($updateSenhaQuery);

        header("Location: ../pages/user.php");
    } else {
        header("Location: ../sign/cadastro.php?error=1");
    }
} else {
    header("Location: ../sign/login.php?error=1");
}

// Fecha a conexão com o banco de dados
$conn->close();
