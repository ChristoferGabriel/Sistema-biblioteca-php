<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login do Caixa</h1>

    <form method="POST" action="../controllers/LoginController.php">

        <input type="text" name="usuario" placeholder="Usuário" required><br><br>

        <input type="password" name="senha" placeholder="Senha" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>