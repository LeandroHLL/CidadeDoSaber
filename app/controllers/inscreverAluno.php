<?php

require_once "../../autoload.php";
session_start();

$curso = $_SESSION['curso'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $aluno = new \app\controllers\class\Aluno;
    $aluno->set($_POST['nome'], $_POST['data'], $_POST['pai'], $_POST['mae'], $_POST['sexo'], $_POST['rg'], $_POST['cpf'], $_POST['telR'], $_POST['telPf'], $_POST['email'], $_POST['sangue'],
     $_POST['estadoCivil'], $_POST['serie'], $_POST['turnoEscolar'], $_POST['codEscola'], $_POST['escolariedade'], $_POST['Ttoupa'], $_POST['Tcalcado'], $_POST['endereco']
    ,$_POST['bairro'], $_POST['alergia'], $_POST['medicacao'], $_POST['bolsaFamalia'], $_POST['rendaFamiliar'], $_POST['PNE']);
    $aluno->inscreverC();

    
    

}


