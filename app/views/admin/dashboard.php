<?php
require_once "../common/header.php";
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status de Matrícula</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex overflow-hidden">
    <main class="flex-1 p-6 overflow-y-auto">
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
                        <tr>
                            <td class="px-4 py-2">001</td>
                            <td class="px-4 py-2">João Silva</td>
                            <td class="px-4 py-2">joao.silva@example.com</td>
                            <td class="px-4 py-2">Engenharia</td>
                            <td class="px-4 py-2">123.456.789-00</td>
                            <td class="px-4 py-2">Rua Exemplo, 123</td>
                            <td class="px-4 py-2" data-status="Aprovado">
                                <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded-full">Aprovado</span>
                            </td>
                            <td class="px-4 py-2">
                                <button class="text-blue-500 hover:underline mr-2"><i class="fas fa-eye"></i> Visualizar</button>
                                <button class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">002</td>
                            <td class="px-4 py-2">Maria Oliveira</td>
                            <td class="px-4 py-2">maria.oliveira@example.com</td>
                            <td class="px-4 py-2">Administração</td>
                            <td class="px-4 py-2">987.654.321-00</td>
                            <td class="px-4 py-2">Av. Principal, 456</td>
                            <td class="px-4 py-2" data-status="Pendente">
                                <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded-full">Pendente</span>
                            </td>
                            <td class="px-4 py-2">
                                <button class="text-blue-500 hover:underline mr-2"><i class="fas fa-eye"></i> Visualizar</button>
                                <button class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Excluir</button>
                            </td>
                        </tr>
                        <!-- Fim do Placeholder -->
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
