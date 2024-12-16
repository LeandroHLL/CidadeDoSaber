<?php

namespace app\controllers\class;

class Aluno extends \app\models\class\Aluno
{

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
    private $turnoEscolar;
    private $codEscola;
    private $escolariedade;
    private $tamanhaRoupa;
    private $tamanhoCalcado;
    private $endereco;
    private $bairro;
    private $alergia;
    private $medicacao;
    private $PNE;
    private $bolsaFamalia;
    private $rendaFamiliar;

    public function set(
        $nome,
        $dataDeNsacimento,
        $pai,
        $mae,
        $sexo,
        $rg,
        $cpf,
        $telefoneResidencial,
        $telefonePrivado,
        $email,
        $tipoSangue,
        $estadoCivil,
        $serie,
        $turnoEscolar,
        $codEscola,
        $escolariedade,
        $tamanhaRoupa,
        $tamanhoCalcado,
        $endereco,
        $bairro,
        $alergia,
        $medicacao,
        $bolsaFamalia,
        $rendaFamiliar,
        $PNE
    ) {

        if ($bolsaFamalia === null) {
            $bolsaFamalia = "não possui";
        }
        if ($alergia === null) {
            $alergia = "não possui";
        }
        if ($medicacao === null) {
            $medicacao = "não possui";
        }
        if ($PNE === null) {
            $PNE = "nao possui";
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
        $this->turnoEscolar = $turnoEscolar;
        $this->codEscola = $codEscola;
        $this->escolariedade = $escolariedade;
        $this->tamanhaRoupa = $tamanhaRoupa;
        $this->tamanhoCalcado = $tamanhoCalcado;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->rendaFamiliar = $rendaFamiliar;
        $this->bolsaFamalia = $bolsaFamalia;
        $this->alergia = $alergia;
        $this->medicacao = $medicacao;
        $this->PNE = $PNE;
    }

    public function getaluno()
    {

        $aluno = [];
        $aluno['nome'] = $this->nome;
        $aluno['dataDeNsacimento'] = $this->dataDeNsacimento;
        $aluno['pai'] = $this->pai;
        $aluno['mae'] = $this->mae;
        $aluno['sexo'] = $this->sexo;
        $aluno['rg'] = $this->rg;
        $aluno['cpf'] = $this->cpf;
        $aluno['telefoneResidencial'] = $this->telefoneResidencial;
        $aluno['telefonePrivado'] = $this->telefonePrivado;
        $aluno['email'] = $this->email;
        $aluno['tipoSangue'] = $this->tipoSangue;
        $aluno['estadoCivil'] = $this->estadoCivil;
        $aluno['serie'] = $this->serie;
        $aluno['turnoEscolar'] = $this->turnoEscolar;
        $aluno['codEscola'] = $this->codEscola;
        $aluno['escolariedade'] = $this->escolariedade;
        $aluno['tamanhaRoupa'] = $this->tamanhaRoupa;
        $aluno['tamanhoCalcado'] = $this->tamanhoCalcado;
        $aluno['endereco'] = $this->endereco;
        $aluno['bairro'] = $this->bairro;
        $aluno['rendaFamiliar'] = $this->rendaFamiliar;
        $aluno['bolsaFamalia'] = $this->bolsaFamalia;
        $aluno['alergia'] = $this->alergia;
        $aluno['medicacao'] = $this->medicacao;
        $aluno['PNE'] = $this->PNE;
        return $aluno;
    }

    // Função para processar o login
    public function loginC($email, $senha)
    {
        // Chama o método login usando email e senha
        $aluno = $this->login($email, $senha);

        if ($aluno) {
            // Armazena os dados do aluno na sessão
            $_SESSION['user'] = $aluno;
            header("Location: ../views/aluno/dashboard.php");
            exit();
        } else {
            // Define a mensagem de erro e redireciona
            $_SESSION['error'] = "Email ou senha incorretoes!";
            header("Location: ../views/auth/login.php");
            exit();
        }
    }


    public function cadastrarC($nome, $senha, $email, $numero)
    {

        if (is_string($nome) && is_string($senha) && is_string($email) && is_string($numero)) {
            if ($this->cadastrar($nome, $senha, $email, $numero)) {

                $_SESSION['success'] = "Cadastro realizado com sucesso!";
                unset($_SESSION['error']);
                header("Location:../views/auth/login.php");
                exit();
            } else {
                $_SESSION['error'] = "email invalido!";
                header("Location:../views/auth/cadastro.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Por favor, preencha todos os campos corretamente!";
            header("Location:../views/auth/cadastro.php");
            exit();
        }
    }

    public function inscreverC()
    {

        if ($this->inscreverM($this)) {

            $_SESSION['success'] = "Inscrição realizada com sucesso!";
            unset($_SESSION['error']);
            header("Location:../views/aluno/dashboard.php");
            exit();
        } elseif ($this->inscreverM($this) === 'atualiza') {

            $_SESSION['success'] = "Sua inscrição foi atualizada com sucesso!";
            unset($_SESSION['error']);
            header("Location:../views/aluno/dashboard.php");
            exit();
        } elseif ($this->inscreverM($this) === 'existe') {

            $_SESSION['error'] = "Você já está inscrito nesta turma!";
            header("Location:../views/aluno/dashboard.php");
            exit();
        } else {

            $_SESSION['error'] = "Houve um erro ao tentar inscrever você nesta turma!";
            header("Location:../views/aluno/dashboard.php");
            exit();
        }
    }
}
