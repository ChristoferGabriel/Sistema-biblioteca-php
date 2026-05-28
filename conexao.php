<?php

function conectar()
{

    $localhost = "127.0.0.1";
    $banco_de_dados = "biblioteca";
    $usuario = "root";
    $senha = "";

    try {
        $pdo = new PDO("mysql:host=$localhost;port=3307;dbname=$banco_de_dados", $usuario, $senha);
        $pdo ->exec("SET CHARACTER SET utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES utf8");

        return $pdo;

    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());

    }
}


?>