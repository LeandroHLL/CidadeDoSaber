<?php

namespace app\controllers;

use app\models\class\Curso;

class CursoController
{
    private $cursoModel;

    public function __construct()
    {
        $this->cursoModel = new Curso();
    }

    public function index()
    {

        $cursos = $this->cursoModel->getCursos();


        include '../../views/aluno/cursos.php';
    }
}
