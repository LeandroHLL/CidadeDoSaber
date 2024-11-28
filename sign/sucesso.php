<?php
// Iniciar sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header("Location: ../sign/login.php");
    exit();
}

// Estabelecer conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educanet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém o nome do usuário da sessão
$username = $_SESSION['username'];
//Curso selecionado com base no nome do usuário da sessão
$selectedCursoNome = '';
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sqlCurso = "SELECT c.nome_curso
                 FROM cadastro AS cad
                 JOIN curso AS c ON cad.curso = c.cod_curso
                 WHERE cad.username = '$username'";

    $resultCurso = $conn->query($sqlCurso);

    if ($resultCurso->num_rows > 0) {
        $rowCurso = $resultCurso->fetch_assoc();
        $selectedCursoNome = $rowCurso['nome_curso'];
    }
}

// Obtém a autenticação do usuário logado na sessão
$autenticacao = '';
if (isset($_SESSION['username'])) {
    $sqlAutenticacao = "SELECT autenticacao FROM cadastro WHERE username = '{$_SESSION['username']}'";
    $resultAutenticacao = $conn->query($sqlAutenticacao);
    if ($resultAutenticacao->num_rows > 0) {
        $rowAutenticacao = $resultAutenticacao->fetch_assoc();
        $autenticacao = $rowAutenticacao['autenticacao'];
    }
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
    <title>EducaNet | Página do candidato </title>
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
                <style>
                    .external{
                        color:#F29727
                    }
                </style>
                <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $username) {
                    echo '<li><a href="../pages/yourpage.php" rel="sponsored" class="external">Sua Página</a></li>';
                } ?>
                <li><a href="../index.html">Home</a></li>
                <li><a href="index.html/#section4">Cursos</a></li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                    <li><a href="logout.php" rel="sponsored" class="external">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Logar</a></li> <!-- Botão de Logar -->
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="section coming-soon" data-section="section3">
        <style>
            section.coming-soon {
                background-image: url(../assets/images/main-slider-01.jpg);
                background-size: cover;
                background-color: #172238;
            }
        </style>
        <div class="container">
            <div class="row">
                <!-- USUÁRIO LOGADO -->
                <div class="col-md-12">
                    <div class="right-content">
                        <div class="top-content">
                            <style>
                                .cor-V {
                                    color: #F29727
                                }
                            </style>
                            <!-- Exibição para usuario informações sql e de sessão -->
                            <h6>Usuário Logado:<p class="cor-V"> <?php echo $username; ?></p>
                                <a href="../pages/aluno.php" class="button">Continue seu Cadastro</a>
                            </h6>
                            <h6>Curso Escolhido:<p class="cor-V"><?php echo $selectedCursoNome; ?></p>
                            </h6>
                            <h6>Sua Senha:<p style="color: <?php echo (!empty($autenticacao) ? 'inherit' : 'yellow'); ?>"><?php echo (!empty($autenticacao) ? $autenticacao : 'Nenhuma senha disponível no momento, breve abriremos novas turmas'); ?></p>
                            </h6>
                            <style>
                                .red-button {
                                    background-color: red;
                                    color: white;
                                    padding: 10px 20px;
                                    border: none;
                                    text-align: center;
                                    display: inline-block;
                                    font-size: 16px;
                                    border-radius: 4px;
                                    text-decoration: none;
                                    cursor: pointer;
                                }
                            </style>
                            <br>
                            <br>
                        </div>
                        <a href="logout.php" class="red-button">Sair</a> <!-- Botão de logout -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <i class="fa fa-copyright"></i>
                        EducaNet 2023 |
                        Design: <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" rel="sponsored" target="_parent">Hill</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
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