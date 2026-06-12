<?php
session_start();

require_once 'config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $pdo = conectar();

    $sql = $pdo->prepare("SELECT * FROM caixa WHERE usuario = :usuario");
        $sql->execute([
        ':usuario' => $_POST['usuario']
    ]);

    $caixa = $sql->fetch(PDO::FETCH_ASSOC);

    if ($caixa) {
        if (password_verify($_POST['senha'], $caixa['senha'])) {
            
            $_SESSION['caixa'] = $caixa['usuario'];
            header("Location: ../views/menu.php");
            exit; 
        }
    }
    echo "Login inválido";

} else {
    header("Location: ../views/login.php");
    exit;
}