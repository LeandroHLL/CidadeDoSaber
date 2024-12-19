<?php
session_start(); // Certifique-se de iniciar a sessão
require_once '../../models/class/AdminQuery.php';
require_once '../../controllers/class/AdminQueryController.php';

$controller = new AdminQueryController();

// Carregar os alunos
$alunos = $controller->getAlunos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status de Matrícula</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../../../public/css/templatemo-grad-school.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex overflow-hidden">
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="../../../index.html"><em>Educa</em> Net</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="dashboard.php">Matriculas</a></li>
                <li><a href="adminalunos.php">Alunos</a></li>
                <li><a style="color: red;" href="../admin/loginadm.php" rel="sponsored" class="external">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-1 p-6 overflow-y-auto pt-20">
        <!-- Exibição de mensagens -->
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($_SESSION['success']); ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($_SESSION['error']); ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Conteúdo principal -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Status das Matrículas</h1>
        </div>

        <!-- Barra de Pesquisa e Filtro -->
        <div class="mb-4">
            <div class="flex items-center space-x-4">
                <input id="search" type="text" placeholder="Buscar..." class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                <select id="filter" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">Filtrar por Status</option>
                    <option value="pendente">Pendente</option>
                    <option value="concluida">Concluída</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>
        </div>

        <!-- Tabela de Status de Matrículas -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <table id="enrollmentTable" class="w-full table-auto text-left">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">ID Matrícula</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Nome Aluno</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Email</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Curso</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">CPF</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Status</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Ações</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno) : ?>
                            <tr>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['id_matricula']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['nome']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['email']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['curso_nome']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['cpf']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['status']) ?></td>
                                <td class="px-4 py-2">
                                    <?php if ($aluno['status'] != 'concluida' && $aluno['status'] != 'cancelada') : ?>
                                        <a href="concluir.php?id=<?= $aluno['id_matricula'] ?>&nome=<?= urlencode($aluno['nome']) ?>&email=<?= urlencode($aluno['email']) ?>" class="text-blue-500 hover:underline">Concluir Cadastro</a>
                                    <?php else : ?>
                                        <span class="text-gray-500">Ação indisponível</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-2">
                                    <form action="../../controllers/atualizar_situacao.php" method="post">
                                        <input type="hidden" name="id_aluno_curso" value="<?= htmlspecialchars($aluno['id_matricula']) ?>">
                                        <select name="situacao" class="border rounded px-2 py-1 focus:outline-none focus:ring focus:ring-blue-300">
                                            <option value="pendente" <?= $aluno['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
                                            <option value="concluida" <?= $aluno['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
                                            <option value="cancelada" <?= $aluno['status'] === 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                                        </select>
                                        <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">
                                            Atualizar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search');
            const filterSelect = document.getElementById('filter');
            const table = document.getElementById('enrollmentTable');
            const rows = table.querySelectorAll('tbody tr');

            function filterTable() {
                const searchText = searchInput.value.toLowerCase();
                const filterStatus = filterSelect.value.toLowerCase();

                rows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const rowStatus = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                    const matchesSearch = rowText.includes(searchText);
                    const matchesFilter = !filterStatus || rowStatus.includes(filterStatus);

                    if (matchesSearch && matchesFilter) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterTable);
            filterSelect.addEventListener('change', filterTable);
        });
    </script>
</body>

</html>