<?php
    session_start(); // Inicia a sessão

    // Verifica se o usuário está logado
    $is_logged_in = isset($_SESSION['usuario_logado']);
    
    $title = "Home"; // Defina o título da página
    $favicon = "assets/favicon.ico"; // Caminho do ícone da aba
    $backgroundImage = "assets/img/home-bg.jpg"; // Caminho da imagem de fundo

    
    // Mensagem de notificação para ser exibida
    $notificationMessage = isset($_SESSION['notification_message']) ? $_SESSION['notification_message'] : '';
    unset($_SESSION['notification_message']); // Limpa a mensagem após exibição
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Encontre e compre livros de diversos gêneros na nossa loja online.">
        <meta name="author" content="" />
        <title><?php echo $title; ?></title> <!-- Em vez de escrever o título do site direto no HTML, criei uma variável $title e usei <php echo $title; ?>. Assim, se um dia quiser mudar o título, basta alterar a variável. -->
        <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="shortcut icon" href="assets/favicon1.ico" type="image/x-icon">
    </head>
    <body>
         <!-- Notificação-->
         <?php if ($notificationMessage): ?>
            <div id="notification" class="notification show">
                <p id="notificationMessage"><?php echo $notificationMessage; ?></p>
            </div>
        <?php endif; ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">GL Books</a>
                <link rel="shortcut icon" href="assets/favicon2.ico" type="image/x-icon">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.php">Contato</a></li>
                         <!-- Exibe "Logar" se o usuário não estiver logado, e "Sair" se estiver logado -->
                        <?php if (isset($_SESSION['usuario_email'])): ?>
                            <li class="nav-item">
                                <a class="nav-link px-lg-3 py-3 py-lg-4" href="/glbooks/logout.php">Sair</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link px-lg-3 py-3 py-lg-4" href="/glbooks/login.php">Logar</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="cart.php"><i class="fas fa-shopping-cart carrinho-icone"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo $backgroundImage; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Compre seu livro</h1>
                            <span class="subheading">Encontre seu próximo livro favorito entre milhares de opções. Compre agora e mergulhe em novas histórias!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Conteudo da Página-->
        <div class="container px-4 px-lg-500">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-100 col-lg-80 col-xl-70">
                     <!--Post preview-->
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- LIVRO 1 -->
                    <div class="horizontal">
                        <div class="livro">
                            <a href="livros/livro.php?id=1">
                                <img src="assets/img/livro1.jpg" alt="Capa do Amante Sombrio" class="img-fluid"/>
                            </a>
                            <h3 class="post-title">Amante Sombrio</h3>
                            <p class="post-meta">Autora: <a href="#!">Bianca Pohndorf</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=1'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 2 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=2">
                                <img src="assets/img/livro2.jpg" alt="Capa do Entendendo Algoritmo" class="img-fluid"/>
                            </a>
                            <h3 class="post-title">Entendendo Algoritmo</h3>
                            <p class="post-meta">Autor: <a href="#!">Aditya Bhargava</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=2'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 3 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=3">
                                <img src="assets/img/livro3.jpg" alt="Capa do Dinheiro é Emocional" class="img-fluid"/>
                            </a>
                            <h3 class="post-title">Dinheiro é Emocional</h3>
                            <p class="post-meta">Autor: <a href="#!">Tiago Brunet</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=3'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 4 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=4">
                                <img src="assets/img/livro4.jpg" alt="Capa do Basta Sentir" class="img-fluid"/>
                            </a>
                            <h3 class="post-title">Basta Sentir</h3>
                            <p class="post-meta">Autora: <a href="#!">Mariana Rios</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=4'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 5 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=5">
                                <img src="assets/img/livro5.jpg" alt="Capa do Como Conversar com Qualquer Pessoa" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Como Conversar com Qualquer Pessoa</h3>
                            <p class="post-meta">Autora: <a href="#!">Leil Lowndes</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=5'">Ver mais...</button>
                        </div>
                     <!-- LIVRO 6 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=6">
                                <img src="assets/img/livro6.jpg" alt="Capa do Os Segredos da Mente Milionária" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Os Segredos da Mente Milionária</h3>
                            <p class="post-meta">Autor: <a href="#!">T. Harv Eker​</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=6'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 7 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=7">
                                <img src="assets/img/livro7.jpg" alt="Capa do O Homem mais Rico da Babilônia" class="img-fluid" />
                            </a>
                            <h3 class="post-title">O Homem mais Rico da Babilônia</h3>
                            <p class="post-meta">Autor: <a href="#!">George S. Clason</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=7'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 8 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=8">
                                <img src="assets/img/livro8.jpg" alt="Capa do O Que Aconteceu com Annie" class="img-fluid" />
                            </a>
                            <h3 class="post-title">O Que Aconteceu com Annie</h3>
                            <p class="post-meta">Autor: <a href="#!">C. J. Tudor</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=8'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 9 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=9">
                                <img src="assets/img/livro9.jpg" alt="Capa do Verity" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Verity</h3>
                            <p class="post-meta">Autora: <a href="#!"> Colleen Hoover</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=9'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 10 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=10">
                                <img src="assets/img/livro10.jpg" alt="Capa do A Cirurgiã" class="img-fluid" />
                            </a>
                            <h3 class="post-title">A Cirurgiã</h3>
                            <p class="post-meta">Autora: <a href="#!">Leslie Wolfe</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=10'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 11 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=11">
                                <img src="assets/img/livro11.jpg" alt="Capa do Harry Potter e a Pedra Filosofal" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Harry Potter e a Pedra Filosofal</h3>
                            <p class="post-meta">Autora: <a href="#!">J.K. Rowling</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=11'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 12 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=12">
                                <img src="assets/img/livro12.jpg" alt="Capa do Eu, Minha Arma e o Alvo" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Eu, Minha Arma e o Alvo</h3>
                            <p class="post-meta">Autores: <a href="#!">Nathalia Alvitos e André Moragas</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=12'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 13 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=13">
                                <img src="assets/img/livro13.jpg" alt="Capa do Sapiens Uma Breve História da Humanidade" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Sapiens Uma Breve História da Humanidade</h3>
                            <p class="post-meta">Autor: <a href="#!">Yuval Noah Harari</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=13'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 14 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=14">
                                <img src="assets/img/livro14.jpg" alt="Capa do Marketing 4.0 Do Tradicional ao Digital" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Marketing 4.0 Do Tradicional ao Digital</h3>
                            <p class="post-meta">Autores: <a href="#!">Philip Kotler, Hermawan Kartajaya e Iwan Setiawan</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=14'">Ver mais...</button>
                        </div>
                    <!-- LIVRO 15 -->
                        <div class="livro">
                            <a href="livros/livro.php?id=15">
                                <img src="assets/img/livro15.jpg" alt="Capa do Programador Autodidata Guia Definitivo para Programar Profissionalmente" class="img-fluid" />
                            </a>
                            <h3 class="post-title">Programador Autodidata Guia Definitivo para Programar Profissionalmente</h3>
                            <p class="post-meta">Autor: <a href="#!">Cory Althoff</a></p>
                            <button class="btn btn-primary" onclick="location.href='livros/livro.php?id=15'">Ver mais...</button>
                        </div>
                    </div>
                    
                    <!-- Divider-->
                    <hr class="my-4" />
                </div>
            </div>
        </div>
        
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; GL Books 2025</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>