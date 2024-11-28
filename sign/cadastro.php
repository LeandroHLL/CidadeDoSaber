<!-- php -->
<?php

session_start();

$error = isset($_GET['error']) ? $_GET['error'] : '';
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

// Consulta os cursos disponíveis no banco de dados
$sql = "SELECT cod_curso, nome_curso FROM curso";
$result = $conn->query($sql);

if (isset($_GET['curso'])) {
    $cursoSelecionado = $_GET['curso'];
} else {
    $cursoSelecionado = ""; // Valor padrão se nenhum curso for selecionado
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>EducaNet | Cadastro</title>

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
                <li><a href="../index.html">Home</a></li>
                <li class="has-submenu"><a href="../index.html#section2">Sobre Nós</a>
                    <ul class="sub-menu">
                        <li><a href="../index.html#section2">Quem Somos?</a></li>
                        <li><a href="../index.html#section3">Cadastre-se</a></li>
                    </ul>
                </li>
                <li><a href="../index.html/#section4">Cursos</a></li>
                <li><a href="../#section3">Logar</a></li>
            </ul>
        </nav>
    </header>

    <section class="section coming-soon" data-section="section3">
        <div class="container">
            <div class="row justify-content-center">
                <!-- LOGAR -->
                <!-- CADASTRO -->
                <div class="col-md-6">
                    <div class="right-content">
                        <div class="top-content">
                            <h6>Crie sua conta para ter acesso gratuito aos cursos</h6>
                        </div>
                        <form id="registration-form" action="../back/cadastro.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="username" type="text" class="form-control" id="username" placeholder="Usuário" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Senha" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="age" type="number" class="form-control" id="age" placeholder="Idade" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="phone-number" type="text" class="form-control" id="phone-number" placeholder="Número de telefone" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="security-question" type="text" class="form-control" id="security-question" placeholder="Qual é o nome do seu animal de estimação?" required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <fieldset>
                                        <select name="curso" class="form-control" id="curso" required="">
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $idCurso = $row["cod_curso"];
                                                    $nomeCurso = $row["nome_curso"];

                                                    if ($nomeCurso == $cursoSelecionado) {
                                                        echo "<option value='$idCurso' selected>$nomeCurso</option>";
                                                    } else {
                                                        echo "<option value='$idCurso'>$nomeCurso</option>";
                                                    }
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum curso disponível</option>";
                                            }

                                            // Fecha a conexão com o banco de dados
                                            $conn->close();
                                            ?>
                                        </select>
                                        <!--Tratamento de erro, pois somente o email vai ser usado para diferenciar um usuario de outro -->
                                        <?php if (!empty($error) && $error == 'email_exists') : ?>
                                            <div class="error-message" style="color: red;">O email já está sendo utilizado. Por favor, escolha outro email.</div>
                                        <?php endif; ?>
                                    </fieldset>
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
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min"></script>
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