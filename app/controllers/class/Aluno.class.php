<?php

namespace app\controllers\class;

class Aluno extends \app\models\class\Aluno{

    private $nome;
    private $dataDeNsacimento;
    private $pai;
    private $mae;
    private $sexo;
    private $rg;
    private $cpf;
    private $telefoneResidencial;
    private $telefonePrivado;
    private $email;
    private $tipoSangue;
    private $estadoCivil;
    private $serie;
    private $codEscolar;
    private $escolariedade;
    private $tamanhaRoupa;
    private $tamanhoCalcado;
    private $endereco;
    private $bairro;
    private $alergia;
    private $medicacao;
    private $bolsaFamalia;
    private $rendaFamiliar;

    public function cadastrar($nome, $dataDeNsacimento, $pai, $mae, $sexo, $rg, $cpf, $telefoneResidencial,
    $telefonePrivado, $email, $tipoSangue, $estadoCivil, $serie, $codEscolar, $escolariedade, $tamanhaRoupa, $tamanhoCalcado, $endereco, $bairro, $alergia, $medicacao, $bolsaFamalia, $rendaFamiliar) {
        
        if($bolsaFamalia === null){
            $bolsaFamalia = "não possui";
            $this->bolsaFamalia = $bolsaFamalia;
        }
        if($alergia === null){
            $alergia = "não possui";
            $this->alergia = $alergia;
        }
        if($medicacao === null){
            $medicacao = "não possui";
            $this->medicacao = $medicacao;
        }
        
        $this->nome = $nome;
        $this->dataDeNsacimento = $dataDeNsacimento;
        $this->pai = $pai;
        $this->mae = $mae;
        $this->sexo = $sexo;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->telefoneResidencial = $telefoneResidencial;
        $this->telefonePrivado = $telefonePrivado;
        $this->email = $email;
        $this->tipoSangue = $tipoSangue;
        $this->estadoCivil = $estadoCivil;
        $this->serie = $serie;
        $this->codEscolar = $codEscolar;
        $this->escolariedade = $escolariedade;
        $this->tamanhaRoupa = $tamanhaRoupa;
        $this->tamanhoCalcado = $tamanhoCalcado;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->rendaFamiliar = $rendaFamiliar;
        $this->bolsaFamalia = $bolsaFamalia;
        $this->alergia = $alergia;
        $this->medicacao = $medicacao;
        
    }

    // Função para processar o login
    public function loginC($nome, $senha)
    {       
            //echo "Memória inicial: " . memory_get_usage() . " bytes\n";
            $aluno = $this->login($nome, $senha);
            
            if ($aluno) {
                $_SESSION['user'] = $aluno;
                header("Location:../views/aluno/dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Usuário ou senha incorretos!";
                header("Location: ../views/auth/login.php");
                exit();
            }
    }

    public function cadastrarC($nome, $senha, $nomeDeUsuario, $email, $confirmaSenha){
        

    }
}


