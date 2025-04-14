<?php
// Dados de conexão com o banco de dados
$host = 'localhost';      // Endereço do servidor do banco de dados (localhost para ambiente local)
$db = 'glbooks';          // Nome do banco de dados que você vai utilizar
$user = 'root';           // Nome do usuário do banco (padrão do XAMPP é 'root')
$pass = '';               // Senha do usuário (em ambiente local normalmente fica vazia)
$charset = 'utf8mb4';     // Conjunto de caracteres usado (utf8mb4 é melhor por suportar emojis e mais símbolos)

// Monta a string de conexão (Data Source Name - DSN) usada pelo PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Define algumas opções para o PDO
$options = [
    // Ativa o modo de erro do PDO para lançar exceções (facilita identificar erros)
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    // Define o modo de retorno dos dados como array associativo (chave = nome da coluna)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Tenta criar a conexão com o banco de dados usando PDO
try {
    // Cria um novo objeto PDO com as configurações acima
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Se ocorrer algum erro na conexão, o script é interrompido e mostra o erro
    die("Erro na conexão: " . $e->getMessage());
}
?>
