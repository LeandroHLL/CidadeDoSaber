<!-- php -->
<?php

session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educanet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: ../sign/login.php");
}
// Puxa do banco os ids :D
$sql1 = "SELECT cod_escolaridade, nome_escolaridade FROM escolaridade";
$result1 = $conn->query($sql1);

$sql2 = "SELECT cod_bairro, nome_bairro FROM bairro";
$result2 = $conn->query($sql2);

$sql3 = "SELECT cod_escola, nome_escola FROM escola";
$result3 = $conn->query($sql3);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>EducaNet | Formulário de Aluno</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">
</head>

<body>


    <!--header-->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="../index.html"><em>Educa</em> Net</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <style>
                    .ola {
                        color: white
                    }

                    .username {
                        color: #F29727
                    }
                </style>
                <?php if (isset($username)) : ?>
                    <a>
                        <li class="username">
                            <span class="ola">Olá </span>
                            <?php echo $username; ?>
                        </li>
                    </a>
                <?php endif; ?>

                <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $username) {
                    echo '<li><a href="../pages/yourpage.php" rel="sponsored" class="external">Sua Página</a></li>';
                } ?>

                <li><a href="../index.html">Home</a></li>
                <li class="has-submenu"><a href="../index.html#section2">Sobre Nós</a>
                    <ul class="sub-menu">
                        <li><a href="../index.html#section2">Quem Somos?</a></li>
                        <li><a href="../index.html#section3">Cadastre-se</a></li>
                    </ul>
                </li>
                <li><a href="../index.html/#section4">Cursos</a></li>
            </ul>
        </nav>
    </header>

    <section class="section coming-soon" data-section="section3">
        <style>
            section.coming-soon {
                background-image: url(../assets/images/choosing-bg.jpg);
                background-size: cover;
                background-color: #172238;
            }
        </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="right-content">
                        <div class="top-content">
                            <h6>Crie sua conta para ter acesso gratuito aos cursos</h6>
                        </div>
                        <?php
                        try {
                            // Código para inserir o registro no banco de dados
                        } catch (mysqli_sql_exception $e) {
                            $errorMessage = $e->getMessage();

                            if (strpos($errorMessage, "Duplicate entry") !== false && strpos($errorMessage, "email") !== false) {
                                // Exibir a mensagem de e-mail já utilizado na tela de cadastro
                                echo "O e-mail informado já está sendo utilizado. Por favor, escolha outro e-mail.";
                            } else {
                                // Outra exceção ocorreu, exibir mensagem genérica de erro
                                echo "Ocorreu um erro durante o cadastro. Por favor, tente novamente mais tarde.";
                            }
                        }
                        ?>
                        <form id="registration-form" action="../back/processar_cadastro.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="nome_aluno" placeholder="Seu Nome Completo" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="date" type="date" class="form-control" id="data_nascimento" placeholder="" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="father" type="text" class="form-control" id="nome_pai" placeholder="Nome do Pai" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="mother" type="text" class="form-control" id="nome_mae" placeholder="Nome da Mãe" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="sex" class="form-control" id="sexo" required="">
                                            <option value="">Sexo</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="rg" type="number" class="form-control" id="rg" placeholder="RG" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="cpf" type="number" class="form-control" id="cpf" placeholder="CPF" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="telefone_residencial" type="tel" class="form-control" id="telefone_residencial" placeholder="Telefone Residencial" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="telefone_celular" type="tel" class="form-control" id="telefone_celular" placeholder="Telefone Celular" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Seu Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="tipo_sanguineo" class="form-control" id="tipo_sanguineo" required="">
                                            <option value="">Selecione o Tipo Sanguíneo</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="NÃO INFORMADO">Não sei</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="estado_civil" class="form-control" id="estado_civil" required="">
                                            <option value="">Selecione o Estado Civil</option>
                                            <option value="Solteiro(a)">Solteiro(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viúvo(a)">Viúvo(a)</option>
                                            <option value="Separado(a)">Separado(a)</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="serie" type="text" class="form-control" id="serie_escolar" placeholder="Serie Escolar" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="cod_escola" class="form-control" id="cod_escola" required="">
                                            <?php
                                            if ($result3->num_rows > 0) {
                                                while ($row = $result3->fetch_assoc()) {
                                                    $idEscola = $row["cod_escola"];
                                                    $nomeEscola = $row["nome_escola"];
                                                    echo "<option value='$idEscola'>$nomeEscola</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum Escola disponível</option>";
                                            }


                                            ?>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="cod_escolaridade" class="form-control" id="cod_escolaridade" required="">
                                            <?php
                                            if ($result1->num_rows > 0) {
                                                while ($row = $result1->fetch_assoc()) {
                                                    $idEscolaridade = $row["cod_escolaridade"];
                                                    $nomeEscolaridade = $row["nome_escolaridade"];
                                                    echo "<option value='$idEscolaridade'>$nomeEscolaridade</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum Escolaridade disponível</option>";
                                            }


                                            ?>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="manequim" class="form-control" id="manequim" required="">
                                            <option value="">Manequim</option>
                                            <option value="PP">PP</option>
                                            <option value="P">P</option>
                                            <option value="M">M</option>
                                            <option value="G">G</option>
                                            <option value="GG">GG</option>
                                            <option value="GGG">Thais Carla</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="numero_calcado" type="number" class="form-control" id="numero_calcado" placeholder="Número do Calçado" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="cod_bairro" class="form-control" id="cod_bairro" required="">
                                            <?php
                                            if ($result2->num_rows > 0) {
                                                while ($row = $result2->fetch_assoc()) {
                                                    $idBairro = $row["cod_bairro"];
                                                    $nomeBairro = $row["nome_bairro"];
                                                    echo "<option value='$idBairro'>$nomeBairro</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum Bairro disponível</option>";
                                            }

                                            // Fecha a conexão com o banco de dados
                                            $conn->close();
                                            ?>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="possui_alergia" id="possui_alergia" class="form-control" required="" onchange="mostrarCampoQualAlergia()">
                                            <option value="">Possui Alergia?</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-12" id="campo_qual_alergia" style="visibility: hidden;">
                                    <fieldset><br>
                                        <input name="qual_alergia" type="text" class="form-control" id="qual_alergia" placeholder="Qual Alergia" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="portador_pne" id="portador_pne" class="form-control" required="" onchange="mostrarCampoQualPNE()">
                                            <option value="">Portador Pne?</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12" id="campo_qual_pne" style="display: none;">
                                    <fieldset>
                                        <input name="qual_pne" type="text" class="form-control" id="qual_pne" placeholder="Qual Pne" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="medicacao_controlada" id="medicacao_controlada" class="form-control" required="" onchange="mostrarCampoQualMedicacao()">
                                            <option value="">Medicação Controlada?</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12" id="campo_qual_medicacao" style="display: none;">
                                    <fieldset>
                                        <input name="qual_medicacao" type="text" class="form-control" id="qual_medicacao" placeholder="Qual Medicação?" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="possui_bolsa_familia" id="possui_bolsa_familia" class="form-control" required="" onchange="mostrarCampoNumeroBolsaFamilia()">
                                            <option value="">Possui Bolsa Família?</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12" id="campo_numero_bolsa_familia" style="display: none;">
                                    <fieldset>
                                        <input name="numero_bolsa_familia" type="number" class="form-control" id="numero_bolsa_familia" placeholder="Número do Bolsa Família" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="numero_cnis" type="number" class="form-control" id="numero_cnis" placeholder="Número do Cnis" >
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="renda_familiar" id="renda_familiar" class="form-control" required="">
                                            <option value="">Renda Familiar</option>
                                            <option value="1 SALÁRIO MÍNIMO">1 SALÁRIO MÍNIMO</option>
                                            <option value="ENTRE 1 À 3 SALÁRIOS MÍNIMOS">ENTRE 1 À 3 SALÁRIOS MÍNIMOS</option>
                                        </select>
                                    </fieldset><br>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <button type="submit" id="registration-submit" class="button">Cadastrar</button>
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <fieldset>
                                        <a href="login.php" class="button">Já possui cadastro? Faça login.</a>
                                    </fieldset>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-copyright"></i> EducaNet 2023
                        <!-- N é um Easter Egg tbm -->
                        | Design: <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" rel="sponsored" target="_parent">Hill</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        function mostrarCampoQualAlergia() {
            var possuiAlergia = document.getElementById("possui_alergia").value;
            var campoQualAlergia = document.getElementById("campo_qual_alergia");

            if (possuiAlergia === "Sim") {
                campoQualAlergia.style.visibility = "visible";
            } else {
                campoQualAlergia.style.visibility = "hidden";
            }
        }

        function mostrarCampoQualPNE() {
            var portadorPNE = document.getElementById("portador_pne").value;
            var campoQualPNE = document.getElementById("campo_qual_pne");

            if (portadorPNE === "Sim") {
                campoQualPNE.style.display = "block";
            } else {
                campoQualPNE.style.display = "none";
            }
        }

        function mostrarCampoQualMedicacao() {
            var medicacaoControlada = document.getElementById("medicacao_controlada").value;
            var campoQualMedicacao = document.getElementById("campo_qual_medicacao");

            if (medicacaoControlada === "Sim") {
                campoQualMedicacao.style.display = "block";
            } else {
                campoQualMedicacao.style.display = "none";
            }
        }

        function mostrarCampoNumeroBolsaFamilia() {
            var possuiBolsaFamilia = document.getElementById("possui_bolsa_familia").value;
            var campoNumeroBolsaFamilia = document.getElementById("campo_numero_bolsa_familia");

            if (possuiBolsaFamilia === "Sim") {
                campoNumeroBolsaFamilia.style.display = "block";
            } else {
                campoNumeroBolsaFamilia.style.display = "none";
            }
        }
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/tabs.js"></script>
    <script src="../assets/js/video.js"></script>
    <script src="../assets/js/slick-slider.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
            if ($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>