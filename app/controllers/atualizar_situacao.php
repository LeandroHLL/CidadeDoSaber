<?php
require_once '../models/class/SituacaoAlunoUpdater.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os dados necessários estão presentes
    if (isset($_POST['id_aluno_curso']) && isset($_POST['situacao'])) {
        $idMatricula = $_POST['id_aluno_curso'];
        $novaSituacao = $_POST['situacao'];

        $updater = new SituacaoAlunoUpdater();

        if ($updater->atualizarSituacao($idMatricula, $novaSituacao)) {
            $_SESSION['success'] = "Situação atualizada com sucesso!";
        } else {
            $_SESSION['error'] = "Erro ao atualizar a situação.";
        }
    } else {
        $_SESSION['error'] = "Dados inválidos.";
    }

    header("Location: ../views/admin/dashboard.php");
    exit();
}
