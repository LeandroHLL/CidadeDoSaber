<?php
class Database
{
    private $dbName = "educanet";
    private $user = "root";
    private $password = "";
    private $pdo;

    public function __construct()
    {
        try {

            $this->pdo = new PDO("mysql:dbname={$this->dbName}", $this->user, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
