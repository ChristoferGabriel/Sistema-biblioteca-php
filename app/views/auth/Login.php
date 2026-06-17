<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biblioteca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-5">

            <div class="card shadow p-4">

                <h2 class="text-center mb-4">
                    Login
                </h2>

                <?php if(isset($_SESSION['erro'])): ?>

                    <div class="alert alert-danger">
                        <?= $_SESSION['erro']; ?>
                    </div>

                    <?php unset($_SESSION['erro']); ?>

                <?php endif; ?>

                <form action="?rota=autenticar" method="POST">

                    <div class="mb-3">

                        <label class="form-label">
                            E-mail
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Senha
                        </label>

                        <input
                            type="password"
                            name="senha"
                            class="form-control"
                            required>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Entrar

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <a href="?rota=cadastro">
                        Criar conta
                    </a>

                    <br><br>

                    <a href="?rota=esqueciSenha">
                        Esqueci minha senha
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>