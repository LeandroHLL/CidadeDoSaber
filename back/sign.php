<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educanet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// formlulário de login
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta o banco de dados para encontrar o usuário correspondente
$sql = "SELECT * FROM cadastro WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // O usuário foi encontrado
    header("Location: ../sesh/sucesso.php");
} else {
    // O usuário não foi encontrado, redireciona para a página de login com mensagem de erro
    header("Location: ../sign/login.php?error=1");
    exit();
}

// Fecha a conexão com o banco de dados
$conn->close();
