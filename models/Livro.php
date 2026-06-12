<?php
class Livro {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function listar() {
        $sql = "SELECT * FROM livros ORDER BY titulo ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function cadastrar($titulo, $autor, $ano_publicacao) {
        $sql = "INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (:titulo, :autor, :ano_publicacao)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano_publicacao' => $ano_publicacao
        ]);
    }
}