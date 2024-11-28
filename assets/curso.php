<!-- PHP -->
<?php
            // Conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "atende";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica se a conexão foi estabelecida corretamente
            if ($conn->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            }

            // Consulta os cursos disponíveis no banco de dados
            $sql = "SELECT cod_curso, nome_curso FROM curso";
            $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
      rel="stylesheet"
    />

    <title>EducaNet</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
    <!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
  </head>

  <body>
    <!--header-->
    <header class="main-header clearfix" role="header">
      <div class="logo">
        <a href="#"><em>Educa</em> Net</a>
      </div>
      <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
      <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
          <li><a href="#section1">Home</a></li>
          <li class="has-submenu">
            <a href="#section2">Sobre Nós</a>
            <ul class="sub-menu">
              <li><a href="#section2">Quem Somos?</a></li>
              <li><a href="#section3">Cadastre-se</a></li>
              <!-- <li><a href="" rel="sponsored" class="external">Possivel Link</a></li> -->
            </ul>
          </li>
          <li><a href="#section4">Cursos</a></li>
          <!-- <li><a href="#section5">Video</a></li> -->
          <li><a href="#section6">Logar</a></li>
        </ul>
      </nav>
    </header>

    <!-- ***** Main Banner Area Start ***** -->
    <!-- <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
        <source src="assets/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
        <div class="caption">
          <h6>Graduate School of Management</h6>
          <h2><em>Your</em> Classroom</h2>
          <div class="main-button">
            <div class="scroll-to-section">
              <a href="#section2">Descubra mais</a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- ***** Main Banner Area End ***** -->

    <!-- POPUPS DE MSG -->
    <section class="features">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="features-post">
              <div class="features-content">
                <div class="content-show">
                  <h4><i class="fa fa-pencil"></i>Todos os cursos</h4>
                </div>
                <div class="content-hide">
                  <p>
                    Curabitur id eros vehicula, tincidunt libero eu, lobortis
                    mi. In mollis eros a posuere imperdiet. Donec maximus
                    elementum ex. Cras convallis ex rhoncus, laoreet libero eu,
                    vehicula libero.
                  </p>
                  <p class="hidden-sm">
                    Curabitur id eros vehicula, tincidunt libero eu, lobortis
                    mi. In mollis eros a posuere imperdiet.
                  </p>
                  <div class="scroll-to-section">
                    <a href="#section2">More Info.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="features-post second-features">
              <div class="features-content">
                <div class="content-show">
                  <h4><i class="fa fa-graduation-cap"></i>Virtual Class</h4>
                </div>
                <div class="content-hide">
                  <p>
                    Curabitur id eros vehicula, tincidunt libero eu, lobortis
                    mi. In mollis eros a posuere imperdiet. Donec maximus
                    elementum ex. Cras convallis ex rhoncus, laoreet libero eu,
                    vehicula libero.
                  </p>
                  <p class="hidden-sm">
                    Curabitur id eros vehicula, tincidunt libero eu, lobortis
                    mi. In mollis eros a posuere imperdiet.
                  </p>
                  <div class="scroll-to-section">
                    <a href="#section3">Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="features-post third-features">
              <div class="features-content">
                <div class="content-show">
                  <h4><i class="fa fa-book"></i>Real Meeting</h4>
                </div>
                <div class="content-hide">
                  <p>
                    Curabitur id eros vehicula, tincidunt libero eu, lobortis
                    mi. In mollis eros a posuere imperdiet. Donec maximus
                    elementum ex. Cras convallis ex rhoncus, laoreet libero eu,
                    vehicula libero.
                  </p>
                  <p class="hidden-sm">
                    Curabitur id eros vehicula, tincidunt libero eu, lobortis
                    mi. In mollis eros a posuere imperdiet.
                  </p>
                  <div class="scroll-to-section">
                    <a href="#section4">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- DIV 1 -->
    <section class="section why-us" data-section="section2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Quem Somos ?</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div id="tabs">
              <ul>
                <li><a href="#tabs-1">Instalações e Espaços</a></li>
                <li><a href="#tabs-2">Programas e Atividades</a></li>
                <li><a href="#tabs-3">Parcerias e Projetos Sociais</a></li>
              </ul>
              <section class="tabs-content">
                <article id="tabs-1">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="assets/images/choose-us-image-01.png" alt="" />
                    </div>
                    <div class="col-md-6">
                      <h4>Instalações e Espaços</h4>
                      <p>
                        Instalações disponíveis na Cidade do Saber, como a
                        piscina semiolímpica, quadra poliesportiva, teatro,
                        museu, biblioteca, conservatório de música,
                        brinquedoteca, salas de aula, auditórios, etc.
                      </p>
                    </div>
                  </div>
                </article>
                <article id="tabs-2">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="assets/images/choose-us-image-02.png" alt="" />
                    </div>
                    <div class="col-md-6">
                      <h4>Programas e Atividades</h4>
                      <p>
                        Explore os programas e atividades oferecidos como: Aulas
                        de música, Dança, Luta, Futebol, Ginástica.
                      </p>
                      <!-- <p></p> -->
                    </div>
                  </div>
                </article>
                <article id="tabs-3">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="assets/images/choose-us-image-03.png" alt="" />
                    </div>
                    <div class="col-md-6">
                      <h4>Parcerias e Projetos Sociais</h4>
                      <p>
                        Projeto tem parceria com entidades como a Universidade
                        Federal da Bahia (UFBA), o Teatro Cidade do Saber; o
                        Museu de Ciência e Tecnologia UNICA; a Biblioteca Jorge
                        Amado; o Conservatório de Música; a TV Camaçari Cultura;
                        o Núcleo de Orientação Cultural (NOC)
                      </p>
                    </div>
                  </div>
                </article>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- DIV DE REGISTRO -->
    <section class="section coming-soon" data-section="section3">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="right-content">
              <div class="top-content">
                <h6>
                  Registre sua conta <em>e tenha acesso</em> a todos os cursos
                </h6>
              </div>
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset>
                      <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Seu Nome"
                        required=""
                      />
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input
                        name="email"
                        type="text"
                        class="form-control"
                        id="email"
                        placeholder=" Email"
                        required=""
                      />
                    </fieldset>
                  </div>
                  <style>
                    option:checked{
                        color: darkblue;
                    }
                    select{
                        width: 50%;
                    }
                  </style>
                  <div class="row align-items-end">
                    <fieldset>
                      <select>
                        <option>
                        <?php
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              $idCurso = $row["cod_curso"];
                              $nomeCurso = $row["nome_curso"];
                              echo "<option value='$idCurso'>$nomeCurso</option>";
                          }
                        } else {
                              echo "<option value=''>Nenhum curso disponível</option>";
                          }
              
                          // Fecha a conexão com o banco de dados
                          $conn->close();
                          ?>
                        </option>
                      </select>
                     </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset> 
                      <button type="submit" id="form-submit" class="button">
                        Cadastrar
                      </button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- CARROSSEL -->
    <section class="section courses" data-section="section4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Escolha seu Curso</h2>
            </div>
          </div>
          <div class="owl-carousel owl-theme">
            <div class="item">
              <img src="assets/images/cursos/bateria.jpg" alt="Course #1" />
              <div class="down-content">
                <h4>Bateria</h4>
                <p>
                  <b>(a partir de 12 anos)</b> Descubra o ritmo pulsante da
                  bateria e explore seu potencial musical. Aprenda a tocar
                  diferentes estilos musicais e desenvolva suas habilidades de
                  coordenação e expressão artística.
                </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/teclado.jpeg" alt="Course #2" />
              <div class="down-content">
                <h4>Teclado</h4>
                <p>
                  <b>(12 a 40 anos)</b> Desenvolva suas habilidades musicais no
                  teclado. Aprenda a tocar melodias cativantes, harmonias
                  envolventes e explore diferentes timbres.
                </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/violao.jpeg" alt="Course #3" />
              <div class="down-content">
                <h4>Violão</h4>
                <p>
                  <b>(12 a 40 anos)</b> O violão é um instrumento versátil e
                  popular. Aprenda a dedilhar acordes, criar melodias
                  encantadoras e interpretar músicas de diversos gêneros.
                  Desenvolva sua técnica e desfrute da riqueza sonora desse
                  instrumento.
                </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/canto.jpg" alt="Course #4" />
              <div class="down-content">
                <h4>Canto</h4>
                <p>
                  <b>(a partir de 10 anos)</b> Descubra o poder da sua voz!
                  Aulas de canto ajudam a aprimorar a técnica vocal, ampliar o
                  alcance, melhorar a dicção e expressar emoções através da
                  música.
                </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/teatro.png" alt="" />
              <div class="down-content">
                <h4>Teatro</h4>
                <p>
                  <b>(12 a 17 anos)</b> Aventure-se no mundo mágico do teatro!
                  Desenvolva suas habilidades de interpretação, expressão
                  corporal e improvisação. Aprenda a trabalhar em equipe,
                  explorar personagens e contar histórias.
                </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/flauta.jpg" alt="" />
              <div class="down-content">
                <h4>Flauta</h4>
                <p>
                  <b>(7 a 30 anos)</b>Descubra a doçura da flauta! Aprenda a
                  tocar um instrumento versátil e encantador. Desenvolva sua
                  técnica de sopro, domine as escalas e mergulhe em um mundo de
                  melodias fascinantes.
                </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/trompete.png" alt="" />
              <div class="down-content">
                <h4>Trompete</h4>
                <p><b>(7 a 30 anos)</b> </p>
                <div class="text-button-pay">
                  <a href="#"
                    >Participar <i class="fa fa-angle-double-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/contrabaixo.png" alt="" />
              <div class="down-content">
                <h4>Contrabaixo</h4>
                <p><b>(7 a 30 anos)</b></p>
                <div class="text-button-pay">
                  <a href="#">Participar <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/ballet.jpg" alt="" />
              <div class="down-content">
                <h4>Ballet</h4>
                <p><b>(a partir de 6 anos)</b></p>
                <div class="text-button-pay">
                  <a href="#">Participar <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/cursos/natacao.png" alt="" />
              <div class="down-content">
                <h4>Natação</h4>
                <p><b>(a partir de 8 anos)</b></p>
                <div class="text-button-pay">
                  <a href="#">Participar <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/courses-01.jpg" alt="" />
              <div class="down-content">
                <h4>Inglês</h4>
                <p>
                  Pellentesque ultricies diam magna, auctor cursus lectus
                  pretium nec. Maecenas finibus lobortis enim.
                </p>

                <div class="text-button-pay">
                  <a href="#">Participar <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section contact" data-section="section6">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Entre em contato</h2>
            </div>
          </div>
          <div class="col-md-6">
            <!-- Do you need a working HTML contact-form script?
                	
                    Please visit https://templatemo.com/contact page -->

            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input
                      name="name"
                      type="text"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required=""
                    />
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                    <input
                      name="email"
                      type="text"
                      class="form-control"
                      id="email"
                      placeholder="Your Email"
                      required=""
                    />
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <textarea
                      name="message"
                      rows="6"
                      class="form-control"
                      id="message"
                      placeholder="Your message..."
                      required=""
                    ></textarea>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button">
                      Send Message Now
                    </button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div id="map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.1332990710084!2d-38.323190335180726!3d-12.704721591031344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71669d92f55f74f%3A0x495525ae0c09983e!2sPrefeitura%20Municipal%20de%20Cama%C3%A7ari!5e0!3m2!1spt-BR!2sbr!4v1686837556079!5m2!1spt-BR!2sbr"
                width="100%"
                height="422px"
                frameborder="0"
                style="border: 0"
                allowfullscreen
              ></iframe>
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
              <i class="fa fa-copyright"></i> EducaNet 2023 | Design:
              <a href="" rel="sponsored" target="_parent">Hill</a>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
      //according to loftblog tut
      $(".nav li:first").addClass("active");

      var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
          reqSection = $(".section").filter(
            '[data-section="' + direction + '"]'
          ),
          reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $("body, html").animate(
            {
              scrollTop: reqSectionPos,
            },
            800
          );
        } else {
          $("body, html").scrollTop(reqSectionPos);
        }
      };

      var checkSection = function checkSection() {
        $(".section").each(function () {
          var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data("section"),
              reqLink = $("a").filter("[href*=\\#" + currentId + "]");
            reqLink
              .closest("li")
              .addClass("active")
              .siblings()
              .removeClass("active");
          }
        });
      };

      $(".main-menu, .scroll-to-section").on("click", "a", function (e) {
        if ($(e.target).hasClass("external")) {
          return;
        }
        e.preventDefault();
        $("#menu").removeClass("active");
        showSection($(this).attr("href"), true);
      });

      $(window).scroll(function () {
        checkSection();
      });
    </script>
  </body>
</html>
