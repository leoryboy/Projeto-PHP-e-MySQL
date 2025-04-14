<?php
session_start(); // Inicia a sessão

require_once("../conexao.php"); // Inclui a conexão com o banco de dados (via PDO)

// Verifica se foi passado um ID válido via GET (ex: livro.php?id=1)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepara a consulta para buscar o livro com o ID informado
    $stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
    $stmt->execute([$id]); // Executa a consulta passando o ID como parâmetro
    $livro = $stmt->fetch(); // Busca o resultado como array associativo

    if (!$livro) {
        // Caso o livro não seja encontrado
        echo "<script>alert('Livro não encontrado!'); window.location.href='../index.php';</script>";
        exit();
    }
} else {
    // Caso o ID não seja válido
    echo "<script>alert('ID inválido!'); window.location.href='../index.php';</script>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Detalhes do livro" />
    <meta name="author" content="GL Books" />
    <title><?php echo htmlspecialchars($livro["titulo"]); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="../css/livro.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/favicon1.ico" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../index.php">GL Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                Menu <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../about.php">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../contact.php">Contato</a></li>

                    <?php if (isset($_SESSION['usuario_email'])): ?>
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="/glbooks/logout.php">Sair</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container px-4 px-lg-5 mt-5">
        <br>
        <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo htmlspecialchars($livro["imagem"]); ?>" alt="<?php echo htmlspecialchars($livro["titulo"]); ?>" class="img-fluid" />
            </div>
            <div class="col-lg-6">
                <h2 class="mb-3"><?php echo htmlspecialchars($livro["titulo"]); ?></h2>
                <h4 class="text-muted mb-3">Autor: <?php echo htmlspecialchars($livro["autor"]); ?></h4>
                <p><strong>Preço:</strong> R$ <?php echo number_format($livro["preco"], 2, ',', '.'); ?></p>
                <h5 class="mt-4">Descrição:</h5>
                <p><?php echo nl2br(htmlspecialchars($livro["descricao"])); ?></p>

                <div class="mt-4">
                    <?php if (isset($_SESSION['usuario_email'])): ?>
                        <a href="../comprar.php?id=<?php echo $livro['id']; ?>" class="btn btn-primary btn-lg">Comprar</a>
                    <?php else: ?>
                        <a href="/glbooks/login.php" class="btn btn-primary btn-lg">Comprar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="border-top mt-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-lg"></i></a></li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; GL Books 2025</div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
