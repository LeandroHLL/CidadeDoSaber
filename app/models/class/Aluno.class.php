<?php

namespace app\models\class;

class Aluno
{


    protected function login($email, $password)
    {
        // Consulta o banco de dados com base no email e na senha
        $query = "SELECT * FROM cadastro WHERE email = ? AND password = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $aluno = $result->fetch_assoc();
            Conexao::closeInstance();
            return $aluno;
        } else {
            Conexao::closeInstance();
            return false;
        }
    }


    protected function cadastrar($nome, $senha, $email, $numero)
    {

        $query = "SELECT * FROM cadastro WHERE email = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            Conexao::closeInstance();
            return false;
        } else {
            $idade = 1;
            $query = "INSERT INTO cadastro (username, password, email, phone_number, age) VALUES (?,?,?,?,?)";
            $stmt->prepare($query);
            $stmt->bind_param('sssss', $nome, $senha, $email, $numero, $idade);
            $stmt->execute();
            $stmt->close();
            Conexao::closeInstance();
            return true;
        }
    }

    protected function inscreverM(\app\controllers\class\aluno $aluno)
    {

        $data = $aluno->get_aluno();
        $nome = $data['nome']; //var
        $dataDeNascimento = $data['dataDeNsacimento']; //
        $pai = $data['pai'];
        $mae = $data['mae'];
        $sexo = $data['sexo'];
        $rg = $data['rg'];
        $cpf = ['cpf'];
        $tel = $data['telefoneResidencial'];
        $telPrivado = $data['telefonePrivado'];
        $email = $data['email'];
        $tipoSangue = $data['tipoSangue'];
        $estadoCivil = $data['estadoCivil'];
        $serie = $data['serie'];
        $turnoEscolar = $data['turnoEscolar'];
        $codEscola = $data['codEscola']; //int
        $escolariedade = $data['escolariedade'];
        $tamanhoRoupa = $data['tamanhaRoupa'];
        $tamanhoCalcado = $data['tamanhoCalcado'];
        $endereco = $data['endereco'];
        $bairro = $data['bairro'];
        $rendaFamiliar = $data['rendaFamiliar'];
        $bolsaFamilia = $data['bolsaFamalia'];
        $alergia = $data['alergia'];
        $medicacao = $data['medicacao'];
        $PNE = $data['PNE'];


        $query = "SELECT * FROM aluno WHERE rg = ? or cpf = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('ss', $rg, $cpf);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            if ($row['ex_aluno'] !== null) {

                $query = "UPDATE aluno SET endereco = ?, bairro = ?, estadoCivil = ?, email = ?,  telprivado = ?, tamanhoRoupa = ?, tamanhoCalcado = ?, serie = ?, cod_escola = ?, cod_escolariedade = ? WHERE cpf =? and rg =?";
                $stmt->prepare($query);
                $stmt->bind_param('sissssssiiss', $endereco, $bairro, $estadoCivil, $email, $telPrivado, $tamanhoRoupa, $tamanhoCalcado, $serie, $codEscola, $escolariedade, $cpf, $rg);
                $stmt->execute();
                Conexao::closeInstance();
                return "atualiza";
            } else {
                Conexao::closeInstance();
                return "existe";
            }
        } else {

            $inscricao = false;
            $query = "INSERT INTO aluno ( `cod_bairro`, `cod_escola`, `cod_escolaridade`, `nome_aluno`, `data_nascimento`,`nome_pai`, `nome_mae`, `sexo`, `rg`,
            `cpf`, `telefone_residencial`, `telefone_celular`, `email`, `tipo_sanguineo`, `estado_civil`, `serie_escolar`, `turno_escolar`, `manequim`, `numero_calcado`, `endereco`,
            `numero_endereco`, `possui_alergia`, `portador_pne`, `medicao_controlada`,`possui_bolsa_familia`,`renda_familiar`,'inscricao') 
            VALUES ('?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','?')";
            $stmt->prepare($query);
            $stmt->bind_param(
                "iiissssssssssssssssssssssssss",
                $bairro,
                $codEscola,
                $escolariedade,
                $nome,
                $dataDeNascimento,
                $pai,
                $mae,
                $sexo,
                $rg,
                $cpf,
                $tel,
                $telPrivado,
                $email,
                $tipoSangue,
                $estadoCivil,
                $serie,
                $turnoEscolar,
                $tamanhoRoupa,
                $tamanhoCalcado,
                $endereco,
                $alergia,
                $PNE,
                $medicacao,
                $bolsaFamilia,
                $rendaFamiliar,
                $inscricao
            );
            $stmt->execute();
            Conexao::closeInstance();
            return true;
        }
    }

    protected function fetchPendentes(){
        
        $query = "SELECT * FROM aluno WHERE inscricao = 2";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $pendentes = [];
        while ($row = $result->fetch_assoc()) {
            $pendentes[] = $row;
        }
        Conexao::closeInstance();
        return $pendentes;
    }

    protected function fetchAluno($cpf){
        
        $query = "SELECT * FROM aluno WHERE cpf =?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('s', $cpf);
        $stmt->execute();
        $result = $stmt->get_result();
        $aluno = $result->fetch_assoc();
        Conexao::closeInstance();
        return $aluno;
    }

}
