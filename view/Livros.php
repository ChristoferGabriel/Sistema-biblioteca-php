
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>
    <main class="container" >
    <form class="form d-flex gap-3 mt-3" action="cadastrar.php" method="post">
        <input autocomplete="off" placeholder="Titulo" class="form-control" type="text" name="titulo">
        <input autocomplete="off" placeholder="Autor" class="form-control" type="text" name="autor">
        <input autocomplete="off" class="form-control" type="text" name="ano">
        <input autocomplete="off" class="form-control" type="text" name="quantidade">
        <input type="submit" value="Cadastrar" class btn="btn-sm btn-sucess">
    </form>
</body>
</html>


<?php 
    include('conexao.php');
    $pdo = conectar();

    






?>