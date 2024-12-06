<?php 

namespace app\models\class;

 class Conexao {
    private $connection;
    private static $instance = null;
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PASSWORD = '';
    private const DBNAME = 'educanet';

    // Construtor privado para evitar instância diretamente
    private function __construct()
    {
        $this->connect();
    }

    // Método para estabelecer a conexão
    private function connect()
    {
        $this->connection = new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DBNAME);

        if ($this->connection->connect_error) {
            die("Erro na conexão: " . $this->connection->connect_error);
        }
    }

    // Método estático para obter a instância
    protected private static function openInstance()
    {
        // Se a instância não existir, cria uma nova
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    // Método para fechar a conexão
    protected private static function closeInstance()
    {
        if (self::$instance !== null) {
            self::$instance->connection->close();
            self::$instance = null;
        }
    }

    public static function query($query){
        $instance = self::$instance;
        $result = $instance->connection->query($query);
        return $result;
    }

    public static function fetch($query){
        $result = self::query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
}