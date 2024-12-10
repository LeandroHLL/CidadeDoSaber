<?php

require_once "../../autoload.php";
session_start();

$curso = $_SESSION['curso'];

$aluno = new \app\controllers\class\Aluno;
$aluno->inscrever();

