<?php
session_start();

if (!isset($_SESSION['caixa'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../../config/conexao.php';
require_once '../../models/Livro.php';

$pdo = Conexao::getConexao();
$livro = new Livro($pdo);

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: listar.php");
    exit;
}

$dados = $livro->buscarPorId($id);

if (!$dados) {
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="../home.php">Biblioteca SixSeven</a>
        <div class="navbar-nav">
            <a class="nav-link active" href="listar.php">Livros</a>
            <a class="nav-link" href="../usuarios/listar.php">Usuários</a>
            <a class="nav-link" href="../emprestimos/listar.php">Empréstimos</a>
            <a class="nav-link text-danger" href="../../controller/logout.php">Sair</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Editar Livro</h4>

                    <form action="../../controller/LivroController.php" method="POST">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']) ?>">

                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control"
                                   value="<?= htmlspecialchars($dados['titulo']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Autor</label>
                            <input type="text" name="autor" class="form-control"
                                   value="<?= htmlspecialchars($dados['autor']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ano de Publicação</label>
                            <input type="number" name="ano" class="form-control"
                                   value="<?= htmlspecialchars($dados['ano_publicacao']) ?>"
                                   min="1000" max="<?= date('Y') ?>" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">Salvar</button>
                            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="m-0">&copy; <?= date('Y') ?> - Sistema de Biblioteca</p>
</footer>
</body>
</html>