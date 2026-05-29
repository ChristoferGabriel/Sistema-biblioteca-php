<?php 
    session_start();
    require ('conexao.php');






?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>LOGIN</h2>
    <form action="">
        <label>
            Email
            <input type="email" name="E-mail" />

        </label>
    </form>
    <form action="">
        <label>
            Senha
            <input type="password" name="Senha">
        </label>
    </form>
    
    <button type="submit"> Logar </button>
</body> 
</html>

