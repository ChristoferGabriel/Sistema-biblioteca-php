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