<?php

require_once __DIR__ . '/../config/conexao.php';

class Livro
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrar($titulo, $autor, $ano)
    {
        $sql = "INSERT INTO livros(titulo, autor, ano_publicacao)
                VALUES(:titulo, :autor, :ano_publicacao)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano' => $ano
        ]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM livros";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM livros
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $titulo, $autor, $ano)
    {
        $sql = "UPDATE livros
                SET titulo = :titulo,
                    autor = :autor,
                    ano_publicacao = :ano_publicacao
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano' => $ano
        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM livros
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
