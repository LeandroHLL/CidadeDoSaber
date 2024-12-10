<?php

namespace app\models\class;

class Aluno{
    
    
     protected function login($username, $password){
        $query = "SELECT * FROM cadastro WHERE username = ? and password = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $aluno = $result->fetch_assoc();
            Conexao::closeInstance();
            return $aluno;
        }else{
            Conexao::closeInstance();
            return false;
        }
    }

    protected function cadastrar($nome, $senha, $email, $numero){
        
        $query = "SELECT * FROM cadastro WHERE email = ?";
        $stmt = Conexao::openInstance()->connection->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            Conexao::closeInstance();
            return false;
        }else{
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

    protected function inscreverm(\app\controllers\class\aluno $aluno){
        
        $data = $aluno->get_aluno();
        $nome = $data['nome'];//var
        $dataDeNascimento= $data['dataDeNsacimento'];//
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
        $codEscolar = $data['codEscolar'];//int
        $escolariedade = $data['escolariedade'];
        $tamanhoRoupa = $data['tamanhaRoupa'];
        $tamanhaCalcado = $data['tamanhoCalcado'];
        $endereco = $data['endereco'];
        $bairro = $data['bairro'];
        $rendaFamiliar = $data['rendaFamiliar'];
        $bolsaFamilia = $data['bolsaFamalia'];
        $alergia = $data['alergia'];
        $medicacao = $data['medicacao'];
        $query = "SELECT * FROM aluno WHERE cod_bairro = and 
        cod_escola = and 
        cod_escolaridade = and 
        nome_aluno = and 
        data_nascimento = and 
        data_cadastro = and 
        nome_pai = and 
        nome_mae = and 
        sexo = and 
        rg = and 
        cpf = and 
        telefone_residencial = and 
        telefone_celular = and 
        email = and 
        tipo_sanguineo = and 
        estado_civil = and 
        serie_escolar = and 
        turno_escolar = and 
        manequim = and 
        numero_calcado = and 
        endereco =  and 
        numero_endereco =  and 
        possui_alergia = and 
        qual_alergia =  and 
        portador_pne = and 
        qual_pne =  and 
        medicao_controlada = and 
        qual_medicao = and 
        possui_bolsa_familia = and 
        numero_bolsa_familia = and 
        numero_cnis = and 
        renda_familiar =  and 
        ex_aluno = and 
        seduc = and 
        qual_curso_fez =  and 
        obs =  and 
        nome_civil = and 
        responsavel_rg = and 
        responsavel_cpf = and 
        id_cad =";
        $stmt = Conexao::openInstance()->connection->prepare($query);
    }
}



    