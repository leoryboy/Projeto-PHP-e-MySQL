<?php
    $title = "Sobre Nós";
    $favicon = "assets/favicon3.ico";
    $backgroundImage = "assets/img/about-bg.jpg";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title; ?></title> <!-- Em vez de escrever o título do site direto no HTML, criei uma variável $title e usei <php echo $title; ?>. Assim, se um dia quiser mudar o título, basta alterar a variável. -->
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">GL Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.php">Contato</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="cart.php"><i class="fas fa-shopping-cart carrinho-icone"></i></a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead" style="background-image: url('<?php echo $backgroundImage; ?>')"> <!-- Deixei imagens e ícones dinâmicos. Ao invés de fixar o caminho das imagens e ícones, criei variáveis como $favicon e $backgroundImage. Isso facilita mudanças no futuro. -->
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Sobre Nós</h1>
                        <span class="subheading">É isso que eu faço...</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Bem-vindo à GL Books, o seu espaço dedicado à leitura e ao conhecimento! Somos apaixonados por livros e acreditamos no poder transformador da leitura. Nosso objetivo é oferecer uma vasta seleção de títulos para todos os gostos, desde os clássicos da literatura até os lançamentos mais recentes, passando por gêneros como ficção, não-ficção, autoajuda, negócios, biografias, e muito mais.</p>
                <p>Acreditamos que um bom livro tem o poder de mudar vidas, e é por isso que nos dedicamos a curar e oferecer o melhor conteúdo para nossos clientes. Com o nosso serviço de entrega eficiente e uma curadoria cuidadosa, garantimos que cada livro chegue até você com qualidade e segurança.</p>
                <p>Seja você um leitor ávido ou alguém em busca de um presente especial, temos algo para todos. Explore nosso catálogo e encontre a sua próxima grande leitura!</p>
                <p>Na GL Books, trabalhamos para proporcionar uma experiência de compra única e agradável, com um site fácil de navegar, atendimento dedicado e entrega rápida. Nossa missão é ajudar você a encontrar o livro perfeito para cada momento da sua vida, seja para enriquecer o seu conhecimento ou simplesmente para se divertir.</p>
            </div>
            </div>
        </div>
    </main>

    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
