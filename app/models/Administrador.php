<?php
class Administrador
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($nome_usuario, $senha)
    {
        try {
            $query = "SELECT * FROM usuario WHERE nome_usuario = :nome_usuario AND senha = :senha AND situacao = 'ativo' AND perfil = 'admin'";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nome_usuario', $nome_usuario);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            $administrador = $stmt->fetch(PDO::FETCH_ASSOC);
            return $administrador;
        } catch (PDOException $e) {
            return "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    }
}
