<?php

require_once '../config/conexao.php';

$pdo = Conexao::getConexao();

require_once '../models/Livro.php';

$livro = new Livro($pdo);

$acao = $_REQUEST['acao'] ?? '';

switch($acao)
{
    case 'cadastrar':

        $livro->cadastrar(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano']
        );

        header('Location: ../models/Livro.php');
        break;

    case 'editar':

        $livro->editar(
            $_POST['id'],
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano']
        );

        header('Location: ../models/Livro.php');
        break;

    case 'excluir':

        $livro->excluir($_GET['id']);

        header('Location: ../models/Livro.php');
        break;
}
