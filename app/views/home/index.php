<?php
require_once 'conexao.php';

$pdo = Conexao::getConexao();

require_once 'controller/LivroController.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios LIMIT 5");
    $stmt->execute();
    $resultados = $stmt->fetchAll();

    echo "<h1>Conexão com o banco executada com sucesso!</h1>";
    echo "<pre>";
    print_r($resultados);
    echo "</pre>";

} catch (PDOException $e) {
    echo "Erro ao realizar consulta: " . $e->getMessage();
}