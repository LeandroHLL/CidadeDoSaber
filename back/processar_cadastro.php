<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $date = $_POST['date'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $sex = $_POST['sex'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $telefone_residencial = $_POST['telefone_residencial'];
    $telefone_celular = $_POST['telefone_celular'];
    $email = $_POST['email'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];
    $estado_civil = $_POST['estado_civil'];
    $serie = $_POST['serie'];
    $cod_escola = $_POST['cod_escola'];
    $cod_escolaridade = $_POST['cod_escolaridade'];
    $manequim = $_POST['manequim'];
    $numero_calcado = $_POST['numero_calcado'];
    $endereco = $_POST['endereco'];
    $cod_bairro = $_POST['cod_bairro'];
    $possui_alergia = $_POST['possui_alergia'];
    $qual_alergia = $_POST['qual_alergia'];
    $portador_pne = $_POST['portador_pne'];
    $qual_pne = $_POST['qual_pne'];
    $medicacao_controlada = $_POST['medicacao_controlada'];
    $qual_medicacao = $_POST['qual_medicacao'];
    $possui_bolsa_familia = $_POST['possui_bolsa_familia'];
    $numero_bolsa_familia = $_POST['numero_bolsa_familia'];
    $numero_cnis = $_POST['numero_cnis'];
    $renda_familiar = $_POST['renda_familiar'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "educanet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO aluno (nome_aluno, data_nascimento, nome_pai, nome_mae, sexo, rg, cpf, telefone_residencial, telefone_celular, email, tipo_sanguineo, estado_civil, serie_escolar, cod_escola, cod_escolaridade, manequim, numero_calcado, endereco, cod_bairro, possui_alergia, qual_alergia, portador_pne, qual_pne, medicao_controlada, qual_medicao, possui_bolsa_familia, numero_bolsa_familia, numero_cnis, renda_familiar)
            VALUES ('$name', '$date', '$father', '$mother', '$sex', '$rg', '$cpf', '$telefone_residencial', '$telefone_celular', '$email', '$tipo_sanguineo', '$estado_civil', '$serie', '$cod_escola', '$cod_escolaridade', '$manequim', '$numero_calcado', '$endereco', '$cod_bairro', '$possui_alergia', '$qual_alergia', '$portador_pne', '$qual_pne', '$medicacao_controlada', '$qual_medicacao', '$possui_bolsa_familia', '$numero_bolsa_familia', '$numero_cnis', '$renda_familiar')";

    if ($conn->query($sql) === true) {
        echo "Concluido com Sucesso.";
        header("Location: ../pages/yourpage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
