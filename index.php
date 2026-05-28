<?php 
    include('conexao.php');
    $pdo = conectar();

    $TABELA = "usuarios";

    $id = 1;
    $stmt = $pdo->prepare("SELECT * FROM $TABELA WHERE id = :id" );
    $stmt->execute(array( ":id" => $id));
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $key){
        var_dump($key);
    }






?>