<?php

require_once 'Database.php';


$database = new Database();

try {
    $connection = $database->getConnection();
    echo "Conexão bem-sucedida com o banco de dados.";
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
