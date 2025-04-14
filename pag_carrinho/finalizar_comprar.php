<?php
session_start();
require_once "../conexao.php"; // ajuste o caminho se necessário

// Verifica se o usuário está logado
if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../login.php");
    exit();
}

$usuario_id = $_SESSION["usuario_id"];
$carrinho = $_SESSION["carrinho"] ?? [];

if (empty($carrinho)) {
    echo "Seu carrinho está vazio.";
    exit();
}

try {
    $pdo->beginTransaction();

    // 1. Calcula o total da compra
    $total = 0;
    foreach ($carrinho as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }

    // 2. Insere o pedido
    $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");
    $stmt->execute([$usuario_id, $total]);
    $pedido_id = $pdo->lastInsertId();

    // 3. Insere os itens do pedido
    $stmtItem = $pdo->prepare("INSERT INTO itens_pedido (pedido_id, livro_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)");

    foreach ($carrinho as $livro_id => $item) {
        $stmtItem->execute([
            $pedido_id,
            $livro_id,
            $item['quantidade'],
            $item['preco']
        ]);
    }

    $pdo->commit();

    // Limpa o carrinho
    unset($_SESSION["carrinho"]);

    // Redireciona para página de sucesso
    header("Location: pedido_sucesso.php");
    exit();

} catch (Exception $e) {
    $pdo->rollBack();
    echo "Erro ao finalizar pedido: " . $e->getMessage();
}
?>
