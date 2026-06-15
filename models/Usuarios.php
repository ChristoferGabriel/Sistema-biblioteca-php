<?php

class Usuario
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $cpf, $telefone)
    {
        $sql = "INSERT INTO usuarios (nome, cpf, telefone)
                VALUES (:nome, :cpf, :telefone)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':telefone' => $telefone
        ]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuarios";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM usuarios
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nome, $cpf, $telefone)
    {
        $sql = "UPDATE usuarios
                SET nome = :nome,
                    cpf = :cpf,
                    telefone = :telefone
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':telefone' => $telefone
        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM usuarios
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
