<?php

session_start();

if(!isset($_SESSION['caixa'])){

    header("Location: login.php");
    exit;

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
</head>
<body>

<h1>Sistema de Biblioteca</h1>

<p>
    Bem-vindo,
    <?php echo htmlspecialchars($_SESSION['caixa']); ?>
</p>

<hr>

<h3>Livros</h3>

<ul>
    <li>
        <a href="livros/cadastrar.php">
            Cadastrar Livro
        </a>
    </li>

    <li>
        <a href="livros/listar.php">
            Listar Livros
        </a>
    </li>
</ul>

<h3>Usuários</h3>

<ul>
    <li>
        <a href="usuarios/cadastrar.php">
            Cadastrar Usuário
        </a>
    </li>

    <li>
        <a href="usuarios/listar.php">
            Listar Usuários
        </a>
    </li>
</ul>

<h3>Empréstimos</h3>

<ul>
    <li>
        <a href="emprestimos/cadastrar.php">
            Realizar Empréstimo
        </a>
    </li>

    <li>
        <a href="emprestimos/listar.php">
            Listar Empréstimos
        </a>
    </li>
</ul>

<hr>

<a href="../controllers/logout.php">
    Sair
</a>

</body>
</html>
