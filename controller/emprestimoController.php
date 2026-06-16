<?php

require_once '../config/conexao.php';
require_once '../models/Emprestimo.php';

$emprestimo = new Emprestimo($pdo);

$acao = $_REQUEST['acao'] ?? '';

switch($acao)
{
    case 'cadastrar':

        $emprestimo->cadastrar(
            $_POST['livro_id'],
            $_POST['usuario_id'],
            $_POST['data_prevista']
        );

        header(
            'Location: ../views/emprestimos/listar.php'
        );
        break;

    case 'devolver':

        $emprestimo->devolver($_GET['id']);

        header(
            'Location: ../views/emprestimos/listar.php'
        );
        break;

    case 'excluir':

        $emprestimo->excluir($_GET['id']);

        header(
            'Location: ../views/emprestimos/listar.php'
        );
        break;
}

<form action="../../controllers/EmprestimoController.php"
      method="POST">

    <input type="hidden"
           name="acao"
           value="cadastrar">

    <label>Livro:</label>

    <select name="livro_id">

        <?php foreach($livros as $livro): ?>

            <option value="<?= $livro['id'] ?>">
                <?= $livro['titulo'] ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Usuário:</label>

    <select name="usuario_id">

        <?php foreach($usuarios as $usuario): ?>

            <option value="<?= $usuario['id'] ?>">
                <?= $usuario['nome'] ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Data prevista:</label>

    <input type="date"
           name="data_prevista">

    <br><br>

    <button type="submit">
        Emprestar
    </button>

</form>