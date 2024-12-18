<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status de Matrícula</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../../../public/css/templatemo-grad-school.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex overflow-hidden">
    <!-- Novo header inserido diretamente -->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="../../../index.html"><em>Educa</em> Net</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="dashboard.php">Matriculas</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a style="color: red;" href="../admin/loginadm.php" rel="sponsored" class="external">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-1 p-6 overflow-y-auto pt-20">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Status das Matrículas</h1>
        </div>

        <!-- Barra de Pesquisa e Filtro -->
        <div class="mb-4">
            <div class="flex items-center space-x-4">
                <input id="search" type="text" placeholder="Buscar..." class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                <select id="filter" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">Filtrar por Status</option>
                    <option value="Aprovado">Aprovado</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Rejeitado">Rejeitado</option>
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
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Endereço</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Status</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Placeholder para Dados -->
                        <?php
                        // Exemplo de consulta aos alunos pendentes. Substitua pela sua consulta real
                        $alunos = [
                            ['id' => 1, 'nome' => 'João Silva', 'email' => 'joao.silva@example.com', 'curso' => 'Engenharia', 'cpf' => '123.456.789-00', 'endereco' => 'Rua Exemplo, 123', 'status' => 'Aprovado'],
                            ['id' => 2, 'nome' => 'Maria Oliveira', 'email' => 'maria.oliveira@example.com', 'curso' => 'Administração', 'cpf' => '987.654.321-00', 'endereco' => 'Av. Principal, 456', 'status' => 'Pendente'],
                        ];

                        foreach ($alunos as $aluno) {
                            ?>
                            <tr>
                                <td class="px-4 py-2"><?= $aluno['id'] ?></td>
                                <td class="px-4 py-2"><?= $aluno['nome'] ?></td>
                                <td class="px-4 py-2"><?= $aluno['email'] ?></td>
                                <td class="px-4 py-2"><?= $aluno['curso'] ?></td>
                                <td class="px-4 py-2"><?= $aluno['cpf'] ?></td>
                                <td class="px-4 py-2"><?= $aluno['endereco'] ?></td>
                                <td class="px-4 py-2" data-status="<?= $aluno['status'] ?>">
                                    <span class="bg-<?= $aluno['status'] == 'Aprovado' ? 'green' : ($aluno['status'] == 'Pendente' ? 'yellow' : 'red') ?>-200 text-<?= $aluno['status'] == 'Aprovado' ? 'green' : ($aluno['status'] == 'Pendente' ? 'yellow' : 'red') ?>-800 text-xs px-2 py-1 rounded-full"><?= $aluno['status'] ?></span>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="atualizar_status.php?id=<?= $aluno['id'] ?>&status=Aprovado" class="text-blue-500 hover:underline mr-2">Aprovar</a>
                                    <a href="atualizar_status.php?id=<?= $aluno['id'] ?>&status=Pendente" class="text-yellow-500 hover:underline mr-2">Pendente</a>
                                    <a href="atualizar_status.php?id=<?= $aluno['id'] ?>&status=Rejeitado" class="text-red-500 hover:underline">Rejeitar</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
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
                const filterStatus = filterSelect.value;

                rows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const rowStatus = row.querySelector('[data-status]').getAttribute('data-status');

                    const matchesSearch = rowText.includes(searchText);
                    const matchesFilter = !filterStatus || rowStatus === filterStatus;

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
