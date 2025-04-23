<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrinho - GL Books</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon8.ico" />
    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Fab -->
    <div class="fixed-bottom text-end p-2">
            <a class="social-icon icon-fab" href="https://api.whatsapp.com/send?phone=5511952836058" target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">GL Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">Sobre nós</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.php">Contato</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="cart.php"><i class="fas fa-shopping-cart carrinho-icone"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner do topo -->
    <header class="masthead" style="background-image: url('assets/img/post-bg.png'); height: 200px;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading text-center">
                        <h1>Carrinho de Compras</h1>
                        <span class="subheading">Confira seus livros antes de finalizar</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main class="container py-5">
        <?php
        session_start();

            // Mensagem de notificação para ser exibida
            $notificationMessage = isset($_SESSION['notification_message']) ? $_SESSION['notification_message'] : '';
            unset($_SESSION['notification_message']); // Limpa a mensagem após exibição
            ?>

            <!-- Notificação -->
            <?php if ($notificationMessage): ?>
                <div id="notification" class="notification show">
                    <p id="notificationMessage"><?php echo $notificationMessage; ?></p>
                </div>
                <script>
                    showNotification("<?php echo $notificationMessage; ?>", "success");
                </script>
            <?php endif;

        // Verifica se há uma mensagem de sucesso (item removido)
        if (isset($_SESSION['message'])):
            echo "<div class='alert alert-info'>{$_SESSION['message']}</div>";
            unset($_SESSION['message']);
        endif;

        if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) === 0):
        ?>
            <div class="text-center">
                <h2>Seu carrinho da GL Books está vazio.</h2>
                <p>Deseja olhar alguns livros?</p>
                <a href="index.php" class="btn btn-primary mt-3"><i class="fas fa-book-open"></i> Continuar Comprando</a>
            </div>
        <?php else: ?>
            <div class="row">
                <?php
                $totalGeral = 0;
                foreach ($_SESSION['carrinho'] as $id => $item):
                    $subtotal = $item['preco'] * $item['quantidade'];
                    $totalGeral += $subtotal;
                ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow">
                            <?php
                            // Extrai apenas o nome da imagem, removendo qualquer caminho como "../assets/img/"
                            $imagemNome = basename($item['imagem']);
                            // Monta o caminho completo para exibir a imagem corretamente na pasta assets/img/
                            $caminhoImagem = "assets/img/" . $imagemNome;
                            ?>

                            <?php if (!empty($item['imagem'])): ?>
                                <img src="<?= htmlspecialchars($caminhoImagem) ?>" class="card-img-top img-fluid mb-3" alt="Capa do livro" style="max-height: 200px; object-fit: contain;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($item['titulo']) ?></h5>
                                <p class="card-text">Preço: <strong>R$ <?= number_format($item['preco'], 2, ',', '.') ?></strong></p>
                                <p class="card-text">Quantidade: <?= $item['quantidade'] ?></p>
                                <p class="card-text">Subtotal: <strong>R$ <?= number_format($subtotal, 2, ',', '.') ?></strong></p>
                                <a href="pag_carrinho/remover_carrinho.php?id=<?= $id ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Remover</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-end mt-4">
                <h4>Total: <strong>R$ <?= number_format($totalGeral, 2, ',', '.') ?></strong></h4>
                <a href="finalizar_compra.php" class="btn btn-success btn-lg mt-3"><i class="fas fa-credit-card"></i> Finalizar Compra</a>
            </div>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="border-top mt-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x fa-inverse"></i></span></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i></span></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-github fa-stack-1x fa-inverse"></i></span></a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; GL Books 2025</div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core JS -->
    <script src="js/scripts.js"></script>
    <script>
        // Garante que a função só será chamada depois que a página e os scripts forem carregados
        window.addEventListener('DOMContentLoaded', function () {
            showNotification("<?php echo $notificationMessage; ?>", "success");
        });
    </script>
</body>
</html>