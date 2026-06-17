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

    public function listar()
    {
        $sql = "SELECT * FROM usuarios";

        $stmt = $this->pdo->query($sql);

        $usuarios = [];

        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $usuarios[] = new Usuario(
                $dados['id'],
                $dados['nome'],
                $dados['email'],
                $dados['senha']
            );
        }

        return $usuarios;
    }

    public function buscarPorId($id)
    {
        $sql = "
        SELECT *
        FROM usuarios
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        return new Usuario(
            $dados['id'],
            $dados['nome'],
            $dados['email'],
            $dados['senha']
        );
    }

    public function buscarPorEmail($email)
    {
        $sql = "
        SELECT *
        FROM usuarios
        WHERE email = :email
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':email' => $email
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        return new Usuario(
            $dados['id'],
            $dados['nome'],
            $dados['email'],
            $dados['senha']
        );
    }

    public function editar(Usuario $usuario)
    {
        $sql = "
        UPDATE usuarios
        SET
            nome = :nome,
            email = :email
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $usuario->getNome(),
            ':email' => $usuario->getEmail(),
            ':id' => $usuario->getId()
        ]);
    }

    public function alterarSenha($id, $novaSenha)
    {
        $sql = "
        UPDATE usuarios
        SET senha = :senha
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':senha' => $novaSenha,
            ':id' => $id
        ]);
    }

    public function excluir($id)
    {
        $sql = "
        DELETE FROM usuarios
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function salvarTokenRecuperacao($id, $token)
    {
        $sql = "
        UPDATE usuarios
        SET token_recuperacao = :token
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':token' => $token,
            ':id' => $id
        ]);
    }

    public function buscarPorToken($token)
    {
        $sql = "
        SELECT *
        FROM usuarios
        WHERE token_recuperacao = :token
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':token' => $token
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        return new Usuario(
            $dados['id'],
            $dados['nome'],
            $dados['email'],
            $dados['senha']
        );
    }

    public function alterarSenhaPorToken($token, $senha)
    {
        $sql = "
        UPDATE usuarios
        SET
            senha = :senha,
            token_recuperacao = NULL
        WHERE token_recuperacao = :token
    ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':senha' => $senha,
            ':token' => $token
        ]);
    }
}
