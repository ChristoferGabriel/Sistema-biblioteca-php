<?php
session_start();

if(isset($_SESSION['caixa'])) {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Biblioteca</title>
</head>
<body>

<h2>Login do Caixa</h2>

<form action="../controllers/LoginController.php" method="POST">

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">
        Entrar
    </button>

</form>

<a href="recuperarSenha.php">
    Esqueci minha senha
</a>

</body>
</html>
