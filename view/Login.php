<?php
session_start();

if(isset($_SESSION['caixa'])) {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biblioteca</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="login-container">

    <form class="login-card"
          action="../controllers/LoginController.php"
          method="POST">

        <h2> Sistema Biblioteca</h2>

        <label>Email</label>
        <input type="email"
               name="email"
               placeholder="Digite seu email"
               required>

        <label>Senha</label>
        <input type="password"
               name="senha"
               placeholder="Digite sua senha"
               required>

        <button type="submit">
            Entrar
        </button>

        <a href="recuperarSenha.php">
            Esqueci minha senha
        </a>

    </form>

</div>

</body>
</html>