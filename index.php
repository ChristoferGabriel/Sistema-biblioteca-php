<?php
require_once 'config/conexao.php';

$classe = $_GET['classe'] ?? 'livro';
$acao = $_GET['acao'] ?? 'index';

if ($classe === 'livro') {
    require_once 'controllers/LivroController.php';
    $controller = new LivroController($pdo);
    
    if ($acao === 'index') {
        $controller->index();
    }
} else {
    echo "Página não encontrada!";
}