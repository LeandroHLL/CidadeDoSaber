<?php

class AdminQueryController
{

    public function getAlunos()
    {
        // Instancia o Model AdminQuery
        $adminQuery = new AdminQuery();
        $alunos = $adminQuery->obterAlunos();

        return $alunos;
    }
}
