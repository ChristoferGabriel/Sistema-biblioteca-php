<?php

class Emprestimo
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrar(
        $livroId,
        $usuarioId,
        $dataPrevista
    )
    {
        $sql = "INSERT INTO emprestimos
                (
                    livro_id,
                    usuario_id,
                    data_emprestimo,
                    data_prevista
                )
                VALUES
                (
                    :livro_id,
                    :usuario_id,
                    CURDATE(),
                    :data_prevista
                )";

        $stmt = $this->pdo->prepare($sql);

        $resultado = $stmt->execute([
            ':livro_id' => $livroId,
            ':usuario_id' => $usuarioId,
            ':data_prevista' => $dataPrevista
        ]);

        if ($resultado) {

            $sqlLivro = "UPDATE livros
                         SET disponivel = 0
                         WHERE id = :id";

            $stmtLivro = $this->pdo->prepare($sqlLivro);

            $stmtLivro->execute([
                ':id' => $livroId
            ]);
        }

        return $resultado;
    }

    public function listar()
    {
        $sql = "SELECT
                    e.*,
                    l.titulo,
                    u.nome
                FROM emprestimos e
                INNER JOIN livros l
                    ON e.livro_id = l.id
                INNER JOIN usuarios u
                    ON e.usuario_id = u.id";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT *
                FROM emprestimos
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function devolver($idEmprestimo)
    {
        $emprestimo = $this->buscarPorId($idEmprestimo);

        if (!$emprestimo) {
            return false;
        }

        $sql = "UPDATE emprestimos
                SET data_devolucao = CURDATE()
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $idEmprestimo
        ]);

        $sqlLivro = "UPDATE livros
                     SET disponivel = 1
                     WHERE id = :id";

        $stmtLivro = $this->pdo->prepare($sqlLivro);

        return $stmtLivro->execute([
            ':id' => $emprestimo['livro_id']
        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM emprestimos
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function verificarAtraso($id)
    {
        $emprestimo = $this->buscarPorId($id);

        if (!$emprestimo) {
            return false;
        }

        if ($emprestimo['data_devolucao'] !== null) {
            return false;
        }

        return strtotime(date('Y-m-d'))
            > strtotime($emprestimo['data_prevista']);
    }
}
