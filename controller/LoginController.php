<?php

session_start();

require_once 'conexao.php';

$pdo = conectar();

$sql = $pdo->prepare(
"SELECT * FROM caixa
WHERE usuario=:usuario");

    $sql->execute([
    ':usuario'=>$_POST['usuario']
    ]);

    $caixa = $sql->fetch();

    if($caixa)
    {
    if(password_verify(
        $_POST['senha'],
        $caixa['senha']
    ))
    {
        $_SESSION['caixa'] =
        $caixa['usuario'];

        header("Location:
        ../views/menu.php");
    }
    }

echo "Login inválido";