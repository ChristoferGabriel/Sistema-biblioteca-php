<?php
    
function conectar(){
    $localhost = "localhost";
    $banco_de_dados = "biblioteca";
    $usuario = "root";
    $senha = "";
    

    try {
        $pdo = new PDO("mysql:host=$localhost;dbname=$banco_de_dados", $usuario, $senha);
        $pdo ->exec("SET CHARACTER SET utf8");
        
    } catch (\Throwable $e) {
        return $e;
        die;
    } 
}





?>