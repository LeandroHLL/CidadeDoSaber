<?php
class AlunoModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function checkCredentials($username, $password)
    {
        try {

            $sql = "SELECT * FROM cadastro WHERE username = :username LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();


            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($aluno && $password === $aluno['password']) {
                return $aluno;
            }
            return false;
        } catch (PDOException $e) {
            throw new Exception("Erro ao verificar credenciais: " . $e->getMessage());
        }
    }
}
