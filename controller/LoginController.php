<?php

session_start();

require_once "../config/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM caixa
        WHERE email = :email";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':email' => $email
]);

$caixa = $stmt->fetch(PDO::FETCH_ASSOC);

if($caixa && password_verify($senha, $caixa['senha'])){

    $_SESSION['caixa'] = $caixa['nome'];

    header("Location: ../views/home.php");

}else{

    echo "Email ou senha inválidos.";

}
