<?php

require_once 'conexao.php';
require_once '../models/Usuario.php';

class UsuarioDAO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }

    public function cadastrar(Usuario $usuario)
    {
        $sql = "
            INSERT INTO usuarios
            (nome, email, senha)
            VALUES
            (:nome, :email, :senha)
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $usuario->getNome(),
            ':email' => $usuario->getEmail(),
            ':senha' => $usuario->getSenha()
        ]);
    }
}
